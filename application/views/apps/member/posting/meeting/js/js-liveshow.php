<style>
    .modal-backdrop {
        z-index: 98 !important;
    }

    video::-webkit-media-controls {
    display: none;
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



</style>
<script src="https://muazkhan.com:9001/dist/RTCMultiConnection.js"></script>
<script src="https://muazkhan.com:9001/node_modules/webrtc-adapter/out/adapter.js"></script>
<script src="https://muazkhan.com:9001/socket.io/socket.io.js"></script>
<script>
$("video").on("click",function(e){
 e.preventDefault();   
})


var url=new URL(window.location.href);
var broadcastId = url.searchParams.get("room_id");


var performer=false;
var connection = new RTCMultiConnection();
connection.socketURL = 'https://muazkhan.com:9001/';
connection.socketMessageEvent = 'ciak-liveshow';
connection.extra.broadcastuser = 0;

// keep room opened even if owner leaves
connection.autoCloseEntireSession = true;
connection.maxParticipantsAllowed = 1000;

// here goes RTCMultiConnection
connection.session = {
    audio: true,
    video: true,
    data: true
};
connection.sdpConstraints.mandatory = {
    OfferToReceiveAudio: true,
    OfferToReceiveVideo: true
};

$.ajax({
    url: "<?=base_url()?>meeting/cekroom",
    type: "post",
    data: "room="+broadcastId,
    success: function (response) {
        var data=JSON.parse(response);
        console.log(data);
        connection.extra.userFullName = data.username;
        if (data.performer===true){
            $('.please-click-join-live').text('Please start to live');
            $("#btnopen").html("Start");
            $("#broadcast-viewers-counter").html('Online viewers: '+connection.extra.broadcastuser+' <b> User</b>');
            performer=true;
            connection.extra.roomOwner = true;
            console.log("124 - " + data);
        }else if (data.performer===false){
            $('.please-click-join-live').text('Please click join button');
            $("#btnopen").html("Join");
            performer=false;
            connection.extra.roomOwner = false;
        }
    },
    error: function (request, status, error) {
        alert(request.responseText);
        window.location.href="<?=base_url()?>homepage"
    }
});

$("#btnopen").on("click",function(){
    $("#txt-chat-message").removeAttr("disabled");
    $("#btn-chat-message").removeAttr("disabled");
    console.log(performer);
    if (!performer){
        $("#confirmjoin").modal("show");
    }else if (performer){
        connection.open(broadcastId, function(isRoomOpened, roomid, error) {
            if (error) {
                if (error === connection.errors.ROOM_NOT_AVAILABLE) {
                    alert('Someone already created this room. Please either join or create a separate room.');
                    return;
                }
                alert(error);
            }else{
                $("#btnopen").attr("disabled","true");
                $('.please-click-join-live').hide();
                
            }

            connection.socket.on('disconnect', function() {
                location.reload();
            });
        });
    }
})

$("#btnconfirm").on("click",function(){
    $("#confirmjoin").modal("hide");
        connection.join(broadcastId, function(isRoomJoined, roomid, error) {
            if (error) {
                if (error === connection.errors.ROOM_NOT_AVAILABLE) {
                    alert('This room does not exist. Please either create it or wait for moderator to enter in the room.');
                    return;
                }
                if (error === connection.errors.ROOM_FULL) {
                    alert('Room is full.');
                    return;
                }
                alert(error);
            }else{
                connection.extra.broadcastuser +=1;
                $("#btnopen").attr("disabled","true");
                $('.please-click-join-live').hide();
            }

            connection.socket.on('disconnect', function() {
                location.reload();
            });
        });
    
})

$("#btnleave").on("click",function(){
    connection.closeSocket();
    window.location.href="<?=base_url()?>homepage"
})

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

// extra code

connection.onstream = function(event) {
    if (event.extra.roomOwner === true) {
        if (connection.extra.broadcastuser>1){
            $("#broadcast-viewers-counter").html('Online viewers: <b>' + connection.extra.broadcastuser + ' Users</b>');
        }else{
            $("#broadcast-viewers-counter").html('Online viewers: <b>' + connection.extra.broadcastuser + ' User</b>');
        }
        
        event.mediaElement.controls = false;
        var video = document.getElementById('main-video');
        video.setAttribute('data-streamid', event.streamid);

        console.log(event);
        
        if(event.type === 'local') {
            video.muted = true;
            video.volume = 0;
        }
        video.srcObject = event.stream;
        $('#main-video').show();
    } 
};

connection.onstreamended = function(event) {
    var video = document.querySelector('video[data-streamid="' + event.streamid + '"]');
    if (!video) {
        video = document.getElementById(event.streamid);
        if (video) {
            video.parentNode.removeChild(video);
            return;
        }
    }
    if (video) {
        video.srcObject = null;
        video.style.display = 'none';
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




function replaceTrack(videoTrack, screenTrackId) {
    if (!videoTrack) return;
    if (videoTrack.readyState === 'ended') {
        alert('Can not replace an "ended" track. track.readyState: ' + videoTrack.readyState);
        return;
    }
    connection.getAllParticipants().forEach(function(pid) {
        var peer = connection.peers[pid].peer;
        if (!peer.getSenders) return;
        var trackToReplace = videoTrack;
        peer.getSenders().forEach(function(sender) {
            if (!sender || !sender.track) return;
            if(screenTrackId) {
                if(trackToReplace && sender.track.id === screenTrackId) {
                    sender.replaceTrack(trackToReplace);
                    trackToReplace = null;
                }
                return;
            }

            if(sender.track.id !== tempStream.getTracks()[0].id) return;
            if (sender.track.kind === 'video' && trackToReplace) {
                sender.replaceTrack(trackToReplace);
                trackToReplace = null;
            }
        });
    });
}

function replaceScreenTrack(stream) {
    stream.isScreen = true;
    stream.streamid = stream.id;
    stream.type = 'local';

    // connection.attachStreams.push(stream);
    connection.onstream({
        stream: stream,
        type: 'local',
        streamid: stream.id,
        // mediaElement: video
    });

    var screenTrackId = stream.getTracks()[0].id;
    addStreamStopListener(stream, function() {
        connection.send({
            hideMainVideo: true
        });
        replaceTrack(tempStream.getTracks()[0], screenTrackId);
    });

    stream.getTracks().forEach(function(track) {
        if(track.kind === 'video' && track.readyState === 'live') {
            replaceTrack(track);
        }
    });

    connection.send({
        showMainVideo: true
    });
}


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

</script>