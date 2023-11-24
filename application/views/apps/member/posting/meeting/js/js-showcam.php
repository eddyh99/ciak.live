<style>
video::-webkit-media-controls-fullscreen-button, video::-webkit-media-controls-play-button, video::-webkit-media-controls-pausebutton {
    display: none;
}

.modal-backdrop {
    z-index: 98 !important;
}
audio::-webkit-media-controls-timeline,
video::-webkit-media-controls-timeline {
    display: none;
}
audio::-webkit-media-controls,
video::-webkit-media-controls {
    display: none;
}
</style>
<script src="https://muazkhan.com:9001/dist/RTCMultiConnection.js"></script>
<script src="https://muazkhan.com:9001/node_modules/webrtc-adapter/out/adapter.js"></script>
<script src="https://muazkhan.com:9001/socket.io/socket.io.js"></script>
<script>

$("#btncamera").attr("disabled","true");

var url=new URL(window.location.href);
var room_id = url.searchParams.get("room_id");
var performer=false;
var camera=true;
var is_joined=false;
var statusPayperMinutes = false;

$.ajax({
    url: "<?=base_url()?>meeting/cekroomcam",
    type: "post",
    data: "room="+room_id,
    success: function (response) {
        console.log(response);
        var data=JSON.parse(response);
        console.log(data);
        if (data.performer===true){
            $('#load-edit-profile').hide()
            $("#btnopen").show();
            $("#btnopen").html('<i class="fas fa-sign-in-alt"></i> Start');
            performer=true;
        }else if (data.performer===false){
            $('#load-edit-profile').hide()
            $("#btnopen").show();
            $("#btnopen").html('<i class="fas fa-sign-in-alt"></i> Join');
            $("#costjoin").html("This show will cost "+data.price+" XEUR");
            $("#notifjoin").html("Balance will be deducted from your wallet");
            performer=false;
        }
    },
    error: function (request, status, error) {
        alert(request.responseText);
        window.location.href="<?=base_url()?>homepage";
    }
});

$("#btnopen").on("click",function(){
    console.log(performer);
    if (!performer){
        $("#confirmjoin").modal("show");
    }else if (performer){
        connection.checkPresence(room_id, function(isRoomExist, roomid) {
            if (isRoomExist === false) {
                connection.open(roomid);
                $("#btnopen").attr("disabled","true");
                $("#btncamera").removeAttr("disabled");
            }
        });
    }
})

function payperminutes(){
    if(!performer){
        $.ajax({
            url: "<?=base_url()?>meeting/confirmjoin",
            type: "post",
            data: "room="+room_id,
            success: function (response) {
                console.log(response);
                console.log("PAY");
            },
            error: function (request, status, error) {
                alert(request.responseText);
                window.location.href="<?=base_url()?>homepage"
            }
        });
    }
}

setInterval(()=>{
        console.log(statusPayperMinutes);
        if(statusPayperMinutes === true){
            payperminutes()
        }else{
            return;
        }
    }, 58000
);

$("#btnconfirm").on("click",function(){
    $("#confirmjoin").modal("hide");
    connection.checkPresence(room_id, function(isRoomExist, roomid) {
        if (isRoomExist === true) {
            console.log(isRoomExist);
            console.log("MASUK CAM");
            $("#btnopen").attr("disabled","true");
            $("#btncamera").removeAttr("disabled");
            payperminutes();
            statusPayperMinutes = true;
        } else {
            alert("Performer not open the room");
        }
    });
})



$("#btncamera").on("click",function(){
    if (camera===true){
        $("#remote-video-container").hide();
        $("#btncamera").html('<i id="offonvid" class="fas fa-video"></i> Show Camera');
        camera=false;
    }else{
        $("#remote-video-container").show()
        $("#btncamera").html('<i id="offonvid" class="fas fa-video-slash"></i> Hide Camera');
        camera=true;
    }
})

$("#btnleave").on("click",function(){
    $("#local-video-container").empty();
    $("#remote-video-container").empty();

    connection.getAllParticipants().forEach(function(pid) {
        connection.disconnectWith(pid);
    });

    connection.attachStreams.forEach(function(localStream) {
        localStream.stop();
    });

    connection.closeSocket();
    window.location.href="<?=base_url()?>my"
})


var connection = new RTCMultiConnection();
connection.socketURL = 'https://muazkhan.com:9001/';
connection.socketMessageEvent = 'cam-2-cam';
connection.maxParticipantsAllowed = 2;
connection.session = {
    audio: true,
    video: true
};
connection.iceServers= [
    {
        urls: [ "stun:ss-turn2.xirsys.com" ]
    }, {
        username: "9T_lKSp8c-na_my7tOf58N-Owq3KBK3s1BrEX2aYSS_AvrBdUOK6YnOvlHfgo8IBAAAAAGIzscxtM3JjNG43Mw==",
        credential: "09335c34-a63f-11ec-b20c-0242ac140004",
        urls: [
            "turn:ss-turn2.xirsys.com:80?transport=udp",
            "turn:ss-turn2.xirsys.com:3478?transport=udp",
            "turn:ss-turn2.xirsys.com:80?transport=tcp",
            "turn:ss-turn2.xirsys.com:3478?transport=tcp",
            "turns:ss-turn2.xirsys.com:443?transport=tcp",
            "turns:ss-turn2.xirsys.com:5349?transport=tcp"
            ]
    }];


connection.sdpConstraints.mandatory = {
    OfferToReceiveAudio: true,
    OfferToReceiveVideo: true
};

// STAR_FIX_VIDEO_AUTO_PAUSE_ISSUES
// via: https://github.com/muaz-khan/RTCMultiConnection/issues/778#issuecomment-524853468
var bitrates = 512;
var resolutions = 'Ultra-HD';
var videoConstraints = {};

if (resolutions == 'HD') {
    videoConstraints = {
        width: {
            ideal: 1280
        },
        height: {
            ideal: 720
        },
        frameRate: 30
    };
}

if (resolutions == 'Ultra-HD') {
    videoConstraints = {
        width: {
            ideal: 1920
        },
        height: {
            ideal: 1080
        },
        frameRate: 30
    };
}

connection.mediaConstraints = {
    video: videoConstraints,
    audio: true
};

var CodecsHandler = connection.CodecsHandler;

connection.processSdp = function(sdp) {
    var codecs = 'vp8';
    
    if (codecs.length) {
        sdp = CodecsHandler.preferCodec(sdp, codecs.toLowerCase());
    }

    if (resolutions == 'HD') {
        sdp = CodecsHandler.setApplicationSpecificBandwidth(sdp, {
            audio: 128,
            video: bitrates,
            screen: bitrates
        });

        sdp = CodecsHandler.setVideoBitrates(sdp, {
            min: bitrates * 8 * 1024,
            max: bitrates * 8 * 1024,
        });
    }

    if (resolutions == 'Ultra-HD') {
        sdp = CodecsHandler.setApplicationSpecificBandwidth(sdp, {
            audio: 128,
            video: bitrates,
            screen: bitrates
        });

        sdp = CodecsHandler.setVideoBitrates(sdp, {
            min: bitrates * 8 * 1024,
            max: bitrates * 8 * 1024,
        });
    }

    return sdp;
};
// END_FIX_VIDEO_AUTO_PAUSE_ISSUES


connection.onstream = function(event) {
    var video = event.mediaElement;
    if(event.type === 'local') {
        $("#local-video-container").append(video);
        var local=$("#local-video-container > video").attr("id");
        $("video#"+local).css("height","200px");
        $("video#"+local).css("width","200px");
        $("#local-video-container > video").on("click",function(e){
         e.preventDefault();   
        })
    }
    
    if (event.type==='remote'){
        $("#remote-video-container").append(video);
        var remote=$("#remote-video-container > video").attr("id");
        $("video#"+remote).css("height","75vh");
        $("video#"+remote).css("width","100%");
        $("video#"+remote).css("object-fit","contain");
        $("#remote-video-container > video").on("click",function(e){
         e.preventDefault();   
        })
    }

    if(event.type === 'local') {
      connection.socket.on('disconnect', function() {
        if(!connection.getAllParticipants().length) {
          location.reload();
        }
      });
    }
};

connection.onstreamended = function(event) {
    connection.getAllParticipants().forEach(function(pid) {
        connection.disconnectWith(pid);
    });

    // stop all local cameras
    connection.attachStreams.forEach(function(localStream) {
        localStream.stop();
    });

    // close socket.io connection
    connection.closeSocket();   
};

connection.onMediaError = function(e) {
    if (e.message === 'Concurrent mic process limit.') {
        if (DetectRTC.audioInputDevices.length <= 1) {
            alert('Please select external microphone');
            return;
        }

        var secondaryMic = DetectRTC.audioInputDevices[1].deviceId;
        connection.mediaConstraints.audio = {
            deviceId: secondaryMic
        };

        connection.join(connection.sessionid);
    }
};

// setInterval(function () {
//     if ((performer==false) && (is_joined==true)){
//         connection.checkPresence(room_id, function(isRoomExist, roomid, error) {
//         if (isRoomExist === true) {
//             $.get("<?=base_url()?>broadcast/paycam", {roomid: room_id}).done(function(data){
//                 if (data==0){
//                     alert("Insufficient Balance");
//                     $("#btnleave").click();   
//                 }
//             });
//         }
//     });
//     }
// }, 61000);

// detect 2G
if(navigator.connection &&
   navigator.connection.type === 'cellular' &&
   navigator.connection.downlinkMax <= 0.115) {
  alert('2G is not supported. Please use a better internet service.');
}
</script>