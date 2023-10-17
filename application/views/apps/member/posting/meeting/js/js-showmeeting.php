<style>
.toast {
    color:white;
    background:rgba(0,0,0,0.8);
    top:50%;
    left: 50%;
    position: fixed;
    transform: translate(-50%, -50%);
    z-index: 9999;
}

video::-webkit-media-controls-fullscreen-button, video::-webkit-media-controls-play-button, video::-webkit-media-controls-pausebutton {
    display: none;
}

.modal-backdrop {
    z-index: 98 !important;
}
::-webkit-scrollbar {
  -webkit-appearance: none;
  width: 10px;
}

::-webkit-scrollbar-thumb {
  border-radius: 5px;
  background-color: rgba(0,0,0,.5);
  -webkit-box-shadow: 0 0 1px rgba(255,255,255,.5);
}

#conversation-panel {
    overflow: scroll;
    margin-bottom: 10px;
    text-align: left;
    overflow: auto;
    border-top: 1px solid #ffffff;
    width: 100%;
}

#conversation-panel .message {
    border-bottom: 1px solid #ffffff;
    padding: 5px 10px;
}

#conversation-panel .message img, #conversation-panel .message video, #conversation-panel .message iframe {
    max-width: 100%;
}

.main-live-camera {
    width:100%; 
    height:55vh; 
    object-fit:contain;
}

.main-live-chating {
    height:25vh;
}

#videos-container {
    /* display: inline-block; */
    text-align: center;
}

@media (min-width: 768px) {
    .main-live-camera {
        width:100%; 
        height:60vh; 
        object-fit:contain;
    }

    .main-live-chating {
        height:30vh;
    }
}

@media (min-width: 992px) {
    .main-live-camera {
        width:100%; 
        height:80vh; 
        object-fit:contain;
    }
    .main-live-chating {
        height:75vh;
    }
}

.select2 {
    width:100%!important;
}


</style>

<link rel="stylesheet" href="<?=base_url()?>assets/css/getHTMLMediaElement.css">
<script src="<?=base_url()?>assets/js/getHTMLMediaElement.js"></script>
<script src="https://muazkhan.com:9001/dist/RTCMultiConnection.js"></script>
<script src="https://muazkhan.com:9001/node_modules/webrtc-adapter/out/adapter.js"></script>
<script src="https://muazkhan.com:9001/socket.io/socket.io.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<script>
function inviteuser(input,room,username){
    $.ajax({
            url: "<?=base_url()?>meeting/inviteuser?guestid="+input+"&room="+room,
            success: function(data, response) {
                console.log(data);
                alert("member "+username+" is successfully invited");
                $("#otherperformer").modal("hide");
            }
        });
}

$("#btninvite").on("click",function(){
    $("#otherperformer").modal("show");
});

$('#suggestionslist').hide();
//setup before functions
var typingTimer;                //timer identifier
var doneTypingInterval = 5000;  //time in ms, 5 seconds for example
var $input = $('#search_data');

//on keyup, start the countdown
$input.on('keyup', function () {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(doneTyping(), doneTypingInterval);
});

//on keydown, clear the countdown 
$input.on('keydown', function () {
  clearTimeout(typingTimer);
});

//user is "finished typing," do something
function doneTyping () {
    console.log("100 finish");
  //do something
    var input=$('#search_data').val();
    if (input.length < 3) {
        $('#suggestionslist').hide();
    } else {
        console.log("200 search");
        $.ajax({
            url: "<?=base_url()?>meeting/follower_search?term="+input+"&room_id="+room_id,
            success: function(data, response) {
                $('.spinner-search').hide();
                $('.fa-magnifying-glass').show();
                console.log(response);
                // return success
                if (data.length > 0) {
                    $('#suggestionslist').html(data);
                    $('#suggestionslist').show();
                }
            }
        });
    
    }  
}

$.fn.select2.defaults.set( "theme", "bootstrap" );
// ......................................................
// ..................Konfigurasi.............
// ......................................................

var connection = new RTCMultiConnection();
connection.socketURL = 'https://muazkhan.com:9001/';
connection.socketMessageEvent = 'live-meeting';
var conversationPanel = document.getElementById('conversation-panel');

connection.session = {
    audio: true,
    video: true,
    data: true
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


// ......................................................
// ......................Handling Room-ID................
// ......................................................

var url=new URL(window.location.href);
var room_id = url.searchParams.get("room_id");
var performer=false;
var camera=true;

$.ajax({
    url: "<?=base_url()?>meeting/cekroommeeting",
    type: "post",
    data: "room="+room_id,
    success: function (response) {
        var data=JSON.parse(response);
        connection.extra.userFullName = data.username;
        if (data.performer===true){
            $("#btnopen").html('<i class="fas fa-sign-in-alt"></i> Start');      
            $("#btninvite").show();
            $("#broadcast-viewers-counter").html('Online viewers: <b>0 User</b>');
            performer=true;
            connection.extra.roomOwner = true;
            connection.extra.broadCaster = true;
        }else if (data.performer===false){
            $("#broadcast-viewers-counter").html('Online viewers: <b>0 User</b>');
            $("#btnopen").html('<i class="fas fa-sign-in-alt"></i> Join');
            $("#btninvite").hide();
            performer=false;
            connection.extra.roomOwner = false;
            connection.extra.broadCaster = true;
        }else{
            $("#btnopen").html("Join");
            $("#btninvite").hide();
            performer=false;
            connection.extra.roomOwner = false;
            connection.extra.broadCaster = false;
        }
    }
});

$("#btnopen").on("click",function(){
    $("#txt-chat-message").removeAttr("disabled");
    $("#btn-chat-message").removeAttr("disabled");
    if (!connection.extra.roomOwner){
        $("#broadcast-viewers-counter").html('Online viewers: <b>1 User</b>');
        if (connection.extra.broadCaster){
            console.log("100 - extra broadcaster");
            
            connection.sdpConstraints.mandatory = {
                OfferToReceiveAudio: false,
                OfferToReceiveVideo: false
            };
            connection.checkPresence(room_id, function(isRoomExist, roomid) {
                if (isRoomExist === true) {
                    connection.join(roomid);
                    $("#btnopen").attr("disabled","true");
                    $("#btncamera").removeAttr("disabled");
                } else {
                    alert("Performer not open the room");
                }
            });
        }else{
            connection.dontCaptureUserMedia = true;
            connection.session.oneway = true;
            connection.sdpConstraints.mandatory = {
                OfferToReceiveAudio: true,
                OfferToReceiveVideo: true
            };
            connection.checkPresence(room_id, function(isRoomExist, roomid) {
                if (isRoomExist === true) {
                    connection.join(roomid);
                    afterConnectingSocket();
                    $("#btnopen").attr("disabled","true");
                    $("#btncamera").removeAttr("disabled");
                } else {
                    alert("Performer not open the room");
                }
            });
        }
    }else{
        console.log("200 - performer");
        connection.extra.broadcastuser = 0;
        $("#broadcast-viewers-counter").html('Online viewers: <b>1 User</b>');
        connection.checkPresence(room_id, function(isRoomExist, roomid) {
            if (isRoomExist === false) {
                connection.open(roomid);
                $("#btnopen").attr("disabled","true");
                $("#btncamera").removeAttr("disabled");
            }
        });
    }
});

connection.onExtraDataUpdated = function(event) {
    var user = event.extra.broadcastuser;
    if (user>1){
        $("#broadcast-viewers-counter").html('Online viewers: <b>'+user+' Users</b>');
    }
    
    console.log("500 - broadcaster user update");
    console.log(event.extra.broadcastuser);
};

connection.videosContainer = document.getElementById('videos-container');
connection.onstream = function(event) {
    console.log("300 - stream broadcast");
    console.log(event.extra.broadcastuser);

    var user = event.extra.broadcastuser+1;
    connection.extra.broadcastuser = user;
    connection.updateExtraData();

    var existing = document.getElementById(event.streamid);
    if(existing && existing.parentNode) {
      existing.parentNode.removeChild(existing);
    }

    event.mediaElement.removeAttribute('src');
    event.mediaElement.removeAttribute('srcObject');
    event.mediaElement.muted = true;
    event.mediaElement.volume = 0;

    var video = document.createElement('video');

    try {
        video.setAttributeNode(document.createAttribute('autoplay'));
        video.setAttributeNode(document.createAttribute('playsinline'));
    } catch (e) {
        video.setAttribute('autoplay', true);
        video.setAttribute('playsinline', true);
    }

    if(event.type === 'local') {
      video.volume = 0;
      try {
          video.setAttributeNode(document.createAttribute('muted'));
      } catch (e) {
          video.setAttribute('muted', true);
      }
    }else{
        if (user>1){
            $("#broadcast-viewers-counter").html('Online viewers: <b>'+user+' Users</b>');
        }
    }
    video.srcObject = event.stream;
    // var video = event.mediaElement;
    // $('#videos-container').append(video);

    var width = parseInt(connection.videosContainer.clientWidth/2);
    var mediaElement = getHTMLMediaElement(video, {
        title: '',
        buttons: [''],
        width: width,
        showOnMouseEnter: false
    });

    connection.videosContainer.appendChild(mediaElement);
    var remote=event.streamid;
    // console.log("HALAMAN 268 - " + remote);
    $("video#"+remote).css("height","40vh");
    $("video#"+remote).css("width","100wh");
    $("video#"+remote).css("object-fit","contain");

    setTimeout(function() {
        mediaElement.media.play();
    }, 5000);

    mediaElement.id = event.streamid;

    // to keep room-id in cache
    localStorage.setItem(connection.socketMessageEvent, connection.sessionid);

    chkRecordConference.parentNode.style.display = 'none';

    if(event.type === 'local') {
      connection.socket.on('disconnect', function() {
        if(!connection.getAllParticipants().length) {
          location.reload();
        }
      });
    }
};

connection.onstreamended = function(event) {
    if (connection.extra.broadCaster==true){
        connection.extra.broadcastuser=connection.extra.broadcastuser-1
    }
    
    console.log(event.streamid);
    var mediaElement = document.getElementById(event.streamid);
    if (mediaElement) {
        mediaElement.parentNode.removeChild(mediaElement);
    }
};

connection.onmessage = function(event) {
    if(event.data.typing === true) {
        $('#key-press').show().find('span').html(event.extra.userFullName + ' is typing');
        return;
    }

    if(event.data.typing === false) {
        $('#key-press').hide().find('span').html('');
        return;
    }

    if (event.data.chatMessage) {
        appendChatMessage(event);
        return;
    }

    if (event.data.checkmark === 'received') {
        var checkmarkElement = document.getElementById(event.data.checkmark_id);
        if (checkmarkElement) {
            checkmarkElement.style.display = 'inline';
        }
        return;
    }

};


var conversationPanel = document.getElementById('conversation-panel');

function appendChatMessage(event, checkmark_id) {
    var div = document.createElement('div');

    div.className = 'message mt-2';

    if (event.data) {
        div.innerHTML = '<b>' + (event.extra.userFullName || event.userid) + ':</b><br>' + event.data.chatMessage;

        if (event.data.checkmark_id) {
            connection.send({
                checkmark: 'received',
                checkmark_id: event.data.checkmark_id
            });
        }
    } else {
        div.innerHTML = '<b>You:</b> <img class="checkmark" id="' + checkmark_id + '" title="Received" src="<?=base_url()?>assets/img/new-ciak/live-check-chat.png" style="width:15px"><br>' + event;
    }
    div.style.background = '#ffffff';

    conversationPanel.appendChild(div);

    conversationPanel.scrollTop = conversationPanel.clientHeight;
    conversationPanel.scrollTop = conversationPanel.scrollHeight - conversationPanel.scrollTop;
}

window.onkeyup = function(e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        $('#btn-chat-message').click();
    }
};

document.getElementById('btn-chat-message').onclick = function() {
    var chatMessage = $('#txt-chat-message').val();
    $('#txt-chat-message').val('');

    if (!chatMessage || !chatMessage.replace(/ /g, '').length) return;

    var checkmark_id = connection.userid + connection.token();

    appendChatMessage(chatMessage, checkmark_id);

    connection.send({
        chatMessage: chatMessage,
        checkmark_id: checkmark_id
    });

    connection.send({
        typing: false
    });
};


</script>