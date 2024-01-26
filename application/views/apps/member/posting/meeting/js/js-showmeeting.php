<style>

.dataTables_wrapper .dataTables_length, 
.dataTables_wrapper .dataTables_filter, 
.dataTables_wrapper .dataTables_info, 
.dataTables_wrapper .dataTables_processing, 
.dataTables_wrapper .dataTables_paginate {
  color: #ffffff !important;
}

.dataTables_wrapper .dataTables_filter input:focus {
  color: #ffffff;
}

.table-striped>tbody>tr:nth-of-type(odd)>* {
    color: #ffffff !important;
}

table.dataTable tbody tr {
  color: #ffffff;
  background-color: #1A1B1C;
  border-bottom: 0.5px solid #ffffff;
}

table.dataTable thead tr {
    border-bottom: 0.5px solid #ffffff !important;
}

table.dataTable tbody tr:hover{
  background-color: #a6a6a6;
  color: #ffffff;
}


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

.media-container {
    width: 90% !important;
    padding: 5px !important;
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
    border-bottom: 3px solid #ffffff;
    padding: 5px 10px;
    color: white;
    background: #22283A !important;
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

    /* .media-container {
        width: 90% !important;
        padding: 5px !important;
    } */

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

video {
    max-height: auto !important;
    /* height: 400px !important; */
}


</style>

<link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/getHTMLMediaElement.css">
<script src="<?=base_url()?>assets/js/getHTMLMediaElement.js"></script>
<script src="https://muazkhan.com:9001/dist/RTCMultiConnection.js"></script>
<script src="https://muazkhan.com:9001/node_modules/webrtc-adapter/out/adapter.js"></script>
<script src="https://muazkhan.com:9001/socket.io/socket.io.js"></script>
<script src="<?= base_url()?>assets/vendor/emoji-js/Emoji.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>



var url=new URL(window.location.href);
var room_id = url.searchParams.get("room_id");
var performer=false;
var camera=true;
var username_moderator = '';

$("#allviewer").hide();

$.ajax({
    url: "<?=base_url()?>meeting/cekroommeeting",
    type: "post",
    data: "room="+room_id,
    success: function (response) {
        var data=JSON.parse(response);
        console.log(data);
        connection.extra.userFullName = data.username;
        username_moderator = data.username;
        if (data.performer===true){
            $('#load-edit-profile').hide()
            $("#btnopen").html('<i class="fas fa-sign-in-alt"></i> Start');      
            $("#btninvite").show();
            // $("#broadcast-viewers-counter").html('Online viewers: <b>0 User</b>');
            connection.extra.userJoin='';
            performer=true;
            connection.extra.roomOwner = true;
            connection.extra.broadCaster = true;
        }else if (data.performer===false){
            $('.addModerator-class').hide();
            console.log("broadcaster");
            $('#load-edit-profile').hide()
            // $("#broadcast-viewers-counter").html('Online viewers: <b>0 User</b>');
            $("#btnopen").html('<i class="fas fa-sign-in-alt"></i> Join');
            $("#btninvite").hide();
            performer=false;
            connection.extra.roomOwner = false;
            connection.extra.broadCaster = true;
        }else{
            $('.addModerator-class').hide();
            console.log("umum");
            $('#load-edit-profile').hide()
            $("#btnopen").html("Join");
            $("#btninvite").hide();
            performer=false;
            connection.extra.roomOwner = false;
            connection.extra.broadCaster = false;
        }
    }
});


function inviteuser(input, room, username){
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


$.fn.select2.defaults.set( "theme", "bootstrap" );

var connection = new RTCMultiConnection();
connection.socketURL = 'https://muazkhan.com:9001/';
connection.socketMessageEvent = 'ciak-livemeeting';
connection.extra.broadcastuser = 0;
connection.extra.infocamera = 0;
connection.autoCloseEntireSession = false;
connection.maxParticipantsAllowed = 1000;

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
var resolutions = 'HD';
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


$("#btnopen").on("click",function(){
    $("#txt-chat-message").removeAttr("disabled");
    $("#btn-chat-message").removeAttr("disabled");
    if (!connection.extra.roomOwner){
        // $("#broadcast-viewers-counter").html('Online viewers: <b>1 User</b>');
        if (connection.extra.broadCaster){
            console.log("========MASUK GUEST========");
            console.log("100 - extra broadcaster");
            
            connection.sdpConstraints.mandatory = {
                OfferToReceiveAudio: false,
                OfferToReceiveVideo: false
            };
            connection.checkPresence(room_id, function(isRoomExist, roomid) {
                if (isRoomExist === true) {
                    connection.join(roomid);
                    $("#allviewer").show();
                    $("#btnopen").attr("disabled","true");
                    $("#btncamera").removeAttr("disabled");
                } else {
                    alert("Performer not open the room");
                }
            });
        }else{
            connection.checkPresence(room_id, function(isRoomExist, roomid) {
                if (isRoomExist === true) {
                    connection.join(roomid);
                    // afterConnectingSocket();
                    $("#btnopen").attr("disabled","true");
                    $("#btncamera").removeAttr("disabled");
                } else {
                    alert("Performer not open the room");
                }
            });
        }
    }else{
        connection.open(room_id, function(isRoomOpened, roomid, error) {
            connection.extra.userJoin = "performer";
            if (error) {
                if (error === connection.errors.ROOM_NOT_AVAILABLE) {
                    alert('Someone already created this room. Please either join or create a separate room.');
                    return;
                }
                alert(error);
            }else{
                $("#allviewer").show();
                $("#btnopen").attr("disabled","true");
                $("#btncamera").removeAttr("disabled");
            }
        
            connection.socket.on('disconnect', function() {
                location.reload();
            });
        });
    }
});

// Inisalisasi datatables first
var listmember = $("#memberjoin").DataTable({
    ordering: false,
});

var ismember = true;
connection.onopen = function(event) {
    // inisalisasi variable
    var remoteUserFullName = event.extra.userFullName;
    var userjoin = event.extra.userJoin;
    var pushmember=[];

    // assign object to array untuk list member
    if(userjoin != 'performer'){
        pushmember.push({'username': remoteUserFullName, 'btnkick': `<button class="btn btn-danger btn-kickmember" onclick="kickuser('${event.userid}','${remoteUserFullName}'); $(this).parent().parent().remove();">Kick</button>`});
    }

    console.log(pushmember);
    
    // Datatables list member
    var listmember = $('#memberjoin').DataTable();
    pushmember.forEach((push) => {
        listmember.row.add([
            push.username,
            push.btnkick                                                                               
        ]).node().id = `id_${event.userid}`;
        listmember.draw(false);
    })

    if ((event.extra.moderator == connection.extra.userFullName)){
        $("#allviewer").show();
    }

}

var max_moderator = 0;
function invite_moderator(uname, profile){

    if(max_moderator >= 2){
        alert("MAXIMAL 2 MODERATOR");
    }else{
        max_moderator += 1;
        $('#wrap-preview-moderator').append(
            `<div class="my-3 mb-3 px-4 d-flex align-items-center preview-moderator">
                <img width="50" src="${profile}" height="auto" class="img-preview-moderator rounded-circle me-3">
                <h6 class="username-preview-moderator my-auto">${uname}</h6>
                <i class="fas fa-check fs-3 ms-3 text-success me-auto check-preview-moderator"></i>
            </div>`)
    }

    connection.extra.ismoderator = "moderator";
    connection.extra.moderator = uname;
    connection.updateExtraData();
}


connection.onExtraDataUpdated = function(event) {
    // var user = event.extra.broadcastuser;
    var infocamera = event.extra.infocamera;
    var infoBroadcaster = event.extra.broadCaster


    // if (user>1){
    //     $("#broadcast-viewers-counter").html('Online viewers: <b>'+user+' Users</b>');
    // }
    
    
    console.log("INFO CAMERA = " + infocamera);
    console.log("INFO BROADCAST " + infoBroadcaster);
    console.log("JUMLAH CAMERA = " + $('.media-container').length);


    // if(($('.media-container').length == 2) || ($('.media-container').length == 3) || ($('.media-container').length == 4)){
    //     $(".media-container").attr('style', 'width: 50% !important');
    // }else if($('.media-container').length == 1){
    //     $(".media-container").attr('style', 'width: 90% !important');
    // }
    
    
    if((infocamera == 2)){
        $(".media-container").attr('style', 'width: 50% !important');
        if (window.matchMedia('(max-width: 768px)').matches) {
            $(".media-container").attr('style', 'width: 90% !important');
        }
    }else if((infocamera == 3) || (infocamera >= 4)) {
        $(".media-container").attr('style', 'width: 50% !important');
    }else {
        $(".media-container").attr('style', 'width: 90% !important');
    }

    // console.log($('.media-container').length);
    
    console.log("500 - broadcaster user update");
    console.log(event.extra.broadcastuser);

    if(event.extra.kickusername == connection.extra.userFullName){
        alert("You've been kicked");
        window.location.href="<?=base_url()?>homepage";
    }

    if (event.extra.moderator == connection.extra.userFullName){
        $("#allviewer").show();
    }
    
    var rows = listmember
        .rows(`#id_${event.extra.idrow_listmember}`)
        .remove()
        .draw();

};


connection.onclose = function(event) {
    if(event.extra.broadCaster == true){
        connection.extra.infocamera = event.extra.infocamera-1
    }
    connection.updateExtraData();
    // alert('INFO CLOSE BROADCASTER ' + event.extra.broadCaster);
};




function kickuser(id, username){
    connection.extra.kickusername = username;
    connection.extra.idrow_listmember = id;

    var rows = listmember
        .rows(`#id_${id}`)
        .remove()
        .draw();
    connection.updateExtraData();
}


connection.onUserStatusChanged = function(event, dontWriteLogs) {
    if (!!connection.enableLogs && !dontWriteLogs) {
        var countViewer = $(`.count-viewer`).text();
        if(event.status == 'online'){
            countViewer++
            $(`.count-viewer`).text(countViewer);
        }
    }
};
connection.onleave = function(event) {
    var countViewer = $(`.count-viewer`).text();
    countViewer--;
    $(`.count-viewer`).text(countViewer);
    var rows = listmember
        .rows(`#id_${event.userid}`)
        .remove()
        .draw();
};



connection.videosContainer = document.getElementById('videos-container');
connection.onstream = function(event) {
    console.log("300 - stream broadcast");
    console.log(event.extra.broadcastuser);

    console.log("GET ID " + event.streamid);

    var user = event.extra.broadcastuser+1;
    connection.extra.broadcastuser = user;
    $("#btn-emoji-livestream").removeAttr("disabled");

    var infocam = 0;
    if(event.extra.broadCaster == true){
        infocam = connection.extra.infocamera+1;
        connection.extra.infocamera = infocam;
    }
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
    }


    if(event.extra.broadCaster == true && infocam <= 4){
        video.srcObject = event.stream;
    }else{
        existing.style.visibility = 'hidden';
    }

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
    $("video#"+remote).css("height","10vh");
    $("video#"+remote).css("width","100wh");
    $("video#"+remote).css("object-fit","contain");

    setTimeout(function() {
        mediaElement.media.play();
    }, 5000);

    mediaElement.id = event.streamid;

    // to keep room-id in cache
    localStorage.setItem(connection.socketMessageEvent, connection.sessionid);

    // chkRecordConference.parentNode.style.display = 'none';
    if(event.type === 'local') {
      connection.socket.on('disconnect', function() {
        if(!connection.getAllParticipants().length) {
          location.reload();
        }
      });
    }
};


connection.onerror = function(event) {
    var remoteUserId = event.userid;
    if (event.extra.userJoin=="performer"){
        alert("Broadcast ended");
        window.location.href="<?=base_url()?>homepage";
    }
};
connection.onEntireSessionClosed = function(event) {
    console.log("");
};


connection.onstreamended = function(event) {    
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


$(document).ready(function(){

    $("#frmsendtips").submit(function(e){
        e.preventDefault();
        e.stopImmediatePropagation();

        if (parseFloat($("#amount").val())<0.5){
            alert("Minimum amount is 0.5");
            return
        }

        $.ajax({
            url: "<?=base_url()?>post/givetips",
            type: "post",
            data: $("#frmsendtips").serialize(),
            success: function (response) {
                let ress = JSON.parse(response)
                if (ress.success == true){
                    Swal.fire({
                        html:  `<div class="d-flex justify-content-center">
                                    <div>
                                        <i class="fas fa-check text-success fs-3"></i>
                                    </div>
                                    <div class="ms-3">${ress.message}</div>
                                </div>`,
                        showConfirmButton: false,
                        background: '#323436',
                        color: '#ffffff',
                        position: 'top',
                        timer: 1500,
                    });
                    $("#sendTips").modal('hide');
                }else{
                    Swal.fire({
                        html:  `<div class="d-flex justify-content-center">
                                    <div>
                                        <i class="fas fa-check text-success fs-3"></i>
                                    </div>
                                    <div class="ms-3">${ress.message}</div>
                                </div>`,
                        showConfirmButton: false,
                        background: '#323436',
                        color: '#ffffff',
                        position: 'top',
                        timer: 1500,
                    });
                    $("#sendTips").modal('hide');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    html:  `<div class="d-flex justify-content-center">
                                <div>
                                <i class="fas fa-times fs-3 text-danger"></i>
                                </div>
                                <div class="ms-3">Send Tip Failed</div>
                            </div>`,
                    showConfirmButton: false,
                    background: '#323436',
                    color: '#ffffff',
                    position: 'top',
                    timer: 1500,
                });
                $(".offcanvas").offcanvas('hide');
            }
        });

        return false;
    })


    new EmojiPicker({
        trigger: [
            {
                selector: '.btn-emoji',
                insertInto: '.input-live-show-chating'
            }
        ],
        closeButton: true,
        dragButton: true,
        width: 350,
        height: 370,
        addPosX: -130,
        addPosY: -380,
        tabbed: false,
        navPos: "bottom",
        navButtonReversed: false,
        disableSearch: false,
        hiddenScrollBar: true, // Not for Firefox
        animation: "slideDown",
        animationDuration: "1s",
        disableNav: false,
        emojiDim: {
            emojiPerRow: 5,
            emojiSize: 30,
            emojiButtonHeight: 80,
            hideCategory: true
        },
    });

});


</script>