
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


#memberjoin_wrapper {
    /* background-color: #846832; */
    margin: 10px 10px;
    padding: 20px;
}

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
<link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<script src="https://muazkhan.com:9001/dist/RTCMultiConnection.js"></script>
<script src="https://muazkhan.com:9001/node_modules/webrtc-adapter/out/adapter.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.7.2/socket.io.js"></script>
<script src="<?= base_url()?>assets/vendor/emoji-js/Emoji.js"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
$("video").on("click",function(e){
    e.preventDefault();   
})



var url=new URL(window.location.href);
var broadcastId = url.searchParams.get("room_id");
var meeting_type;
var purpose;
var rtmpurl;
var statusPayperMinutes = false;
let id_has_room;

var performer=false;
var username_moderator = '';
var connection = new RTCMultiConnection();
connection.socketURL = 'https://muazkhan.com:9001/';
connection.socketMessageEvent = 'ciak-liveshow';
connection.extra.broadcastuser = 0;

// keep room opened even if owner leaves
connection.autoCloseEntireSession = false;
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

$("#allviewer").hide();


$.ajax({
    url: "<?=base_url()?>meeting/cekroom",
    type: "post",
    data: "room="+broadcastId,
    success: function (response) {
        var data=JSON.parse(response);
        console.log(data);
        id_has_room = data.id_has_room;
        connection.extra.userFullName = data.username;
        username_moderator = data.username;
        connection.extra.userJoin='';
        meeting_type=data.meeting_type;
        purpose=data.purpose;
        
        if (data.performer===true){
            $('#load-edit-profile').hide()
            $('.please-click-join-live').text('Please start to live');
            $("#btnopen").html("Start");
            // $("#broadcast-viewers-counter").html('Online viewers: '+connection.extra.broadcastuser+' <b> User</b>');
            // console.log(connection.extra.broadcastuser, "130");
            performer=true;
            connection.extra.roomOwner = true;
        }else if (data.performer===false){
            if (data.meeting_type=="free"){
                $("#notifjoin").html("This show is free");
            }else if (data.meeting_type=="ticket"){
                $("#costjoin").html("This show will cost "+data.price+" USDX");
                $("#notifjoin").html("Balance will be deducted from your wallet");
            }else if (data.meeting_type=="minutes"){
                $("#costjoin").html("This show will cost "+data.price+" USDX/minutes");
                $("#notifjoin").html("Balance will be deducted from your wallet each minutes");
            }
            $('.addModerator-class').hide();
            $('#load-edit-profile').hide()
            $('.please-click-join-live').text('Please click join button');
            $("#btnopen").html("Join");
            performer=false;
            connection.extra.roomOwner = false;
        }
    },
    error: function (request, status, error) {
        alert(request.responseText);
        window.location.href="<?=base_url()?>homepage";
    }
});


function payperjoin(){
    if(meeting_type=="ticket" && !performer){
        $.ajax({
            url: "<?=base_url()?>meeting/confirmjoin",
            type: "post",
            data: "room="+broadcastId,
            success: function (response) {
                console.log("PAY");
            },
            error: function (request, status, error) {
                alert(request.responseText);
                window.location.href="<?=base_url()?>homepage"
            }
        });
    }
}
function payperminutes(){
    if(meeting_type=="minutes" && !performer){
        $.ajax({
            url: "<?=base_url()?>meeting/confirmjoin",
            type: "post",
            data: "room="+broadcastId,
            success: function (response) {
                console.log("PAY MINUTES");
            },
            error: function (request, status, error) {
                alert(request.responseText);
                window.location.href="<?=base_url()?>homepage"
            }
        });
    }
}



setInterval(()=>{
        if(statusPayperMinutes === true){
            payperminutes()
        }else{
            return;
        }
    }, 58000
);


$(document).ready(function() {
    if (!performer){
        $('#confirmjoin').modal('show');
    }
});

$("#btnopen").on("click",function(){
    $("#txt-chat-message").removeAttr("disabled");
    $("#btn-chat-message").removeAttr("disabled");
    $("#btn-emoji-livestream").removeAttr("disabled");
    console.log(performer);
    if (!performer){
        $("#confirmjoin").modal("show");
    }else if (performer){
        if((meeting_type == "free") && (purpose == "public")){
            $('#livemodal-connect').modal('show');
        }else{
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
    }
});


$("#startlive").on("click",function(){
        if ($("#pil_yt").is(":checked")){
            rtmpurl=$("#youtube").val();
            // rtmpurl.push($("#youtube").val());
        }
        if ($("#pil_fb").is(":checked")){
            rtmpurl=$("#facebook").val();
            // rtmpurl.push($("#facebook").val());
        }
        if ($("#pil_ot1").is(":checked")){
            rtmpurl=$("#others1").val();
        }

        $("#livemodal-connect").modal("hide");	
        connect_server();
        
        connection.extra.userJoin = "performer";

        connection.open(broadcastId, function(isRoomOpened, roomid, error) {
            if (error) {
                if (error === connection.errors.ROOM_NOT_AVAILABLE) {
                    alert('Someone already created this room. Please either join or create a separate room.');
                    return;
                }
                alert(error);
            }else{
                $("#allviewer").show();
                $("#btnopen").attr("disabled","true");
                $('.please-click-join-live').hide();
            }

            connection.socket.on('disconnect', function() {
                location.reload();
            });
        });
});


$("#btnconfirm").on("click",function(){
    $("#confirmjoin").modal("hide");
    // connection.extra.userJoin = "memmber join";
    connection.join(broadcastId, function(isRoomJoined, roomid, error, event) {
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
            $("#txt-chat-message").removeAttr("disabled");
            $("#btn-chat-message").removeAttr("disabled");
 
            $("#btn-emoji-livestream").removeAttr("disabled");
            $('.please-click-join-live').hide();
        }
        connection.updateExtraData();


        connection.socket.on('disconnect', function() {
            location.reload();
        });
    });
})

var max_moderator = 0;
function invite_moderator(uname, profile){

    if(max_moderator >= 2){
        alert("MAXIMAL 2 MODERATOR");
    }else{
        max_moderator += 1;
        console.log(max_moderator);
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


connection.onopen = function(event) {

    unique_id = event.userid;
    var remoteUserFullName = event.extra.userFullName;
    var userjoin = event.extra.userJoin;

    var pushmember=[];
    
    if(userjoin != 'performer'){
        pushmember.push({'username': remoteUserFullName, 'btnkick': `<button class="btn btn-danger btn-kickmember" onclick="kickuser('${event.userid}','${remoteUserFullName}'); $(this).parent().parent().remove();">Kick</button>`});
    }

    
    var listmember = $('#memberjoin').DataTable();

    pushmember.forEach((push) => {
        listmember.row.add([
            push.username,
            push.btnkick                                                                               
        ]).node().id = `id_${event.userid}`;
        listmember.draw(false);
    })



    console.log("++++++++ ON OPEN USERJOIN - " + event.extra.userJoin);
    console.log("++++++++ ON OPEN MODE - " + event.extra.moderator);
    console.log("+++++++++ ON OPEN USERNAME - " + username_moderator);
    console.log("+++++++++ ON OPEN IS MODE - " + event.extra.ismoderator);

    if (event.extra.moderator == username_moderator){
        $("#allviewer").show();
    }else{
        if (meeting_type=='ticket'){
            payperjoin();
        }else if (meeting_type=='minutes'){
            payperminutes();
        }
        statusPayperMinutes = true;
    }
    
};

var member = [];
var listmember = $("#memberjoin").DataTable({
    ordering: false,
});



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


connection.onExtraDataUpdated = function(event) {
    
    console.log("**************ON DATAUPDATE IS USERNAME - " + connection.extra.userFullName);
    console.log("**************ON DATAUPDATE KICKUSERNAME - " + event.extra.kickusername);
    console.log("**************ON DATAUPDATE USERJOIN - " + event.extra.userJoin);
    console.log("**************ON DATAUPDATE MODE - " + event.extra.moderator);
    console.log("**************ON DATAUPDATE USRNAME- " + username_moderator);
    console.log("**************ON DATAUPDATE IS MODE- " + event.extra.ismoderator);

    if(event.extra.kickusername == connection.extra.userFullName){
        window.location.href="<?=base_url()?>homepage";
    }

    var rows = listmember
        .rows(`#id_${event.extra.idrow_listmember}`)
        .remove()
        .draw();

    if (event.extra.moderator == username_moderator){
        $("#allviewer").show();
    }else{
        if (meeting_type=='ticket'){
            payperjoin();
        }else if (meeting_type=='minutes'){
            payperminutes();
        }
        statusPayperMinutes = true;
    }
    
};


connection.onstream = function(event) {
    // if (event.extra.moderator==connection.userFullName){
    //     $("#allviewer").show();
    // }


    if (event.extra.roomOwner === true) {
        if (connection.extra.broadcastuser>1){
            console.log(connection.extra.broadcastuser, "315");
            // $("#broadcast-viewers-counter").html('Online viewers: <b>' + connection.extra.broadcastuser + ' Users</b>');
        }else{
            console.log(connection.extra.broadcastuser, "317");
            // $("#broadcast-viewers-counter").html('Online viewers: <b>' + connection.extra.broadcastuser + ' User</b>');
        }
        
        event.mediaElement.controls = false;
        var video = document.getElementById('main-video');
        video.setAttribute('data-streamid', event.streamid);

        // video.style.display = 'none';
        if(event.type === 'local') {
            video.muted = true;
            video.volume = 0;
        }
        video.srcObject = event.stream;
        requestMedia(event.stream);
        $('#main-video').show();
    } 
};

var conversationPanel = document.getElementById('conversation-panel');

function appendChatMessage(event, checkmark_id) {
    var div = document.createElement('div');

    div.className = 'message mt-2';

    if (event.data) {
        div.innerHTML = `<div class="d-flex justify-content-between"><div><b> ${event.extra.userFullName || event.userid} :</b><br> ${event.data.chatMessage} </div> </div>`;

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

function kickuser(id, username){
    connection.extra.kickusername = username;
    connection.extra.idrow_listmember = id;
    console.log("&&&&CHECK USER : " + connection.extra.userFullName);
    console.log("&&&&CHECK KICKUSER : " + connection.extra.userFullName);

    // connection.disconnectWith(id);
    // connection.deletePeer(id);
    var rows = listmember
        .rows(`#id_${id}`)
        .remove()
        .draw();
    connection.updateExtraData();
}

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


connection.onerror = function(event) {
    var remoteUserId = event.userid;
    console.log("#######SAYA " + event.extra.userJoin);
    if (event.extra.userJoin=="performer"){
        alert("broadcast ended or you've been kicked");
        window.location.href="<?=base_url()?>homepage";
    }
};

connection.onUserStatusChanged = function(event, dontWriteLogs) {
    if (!!connection.enableLogs && !dontWriteLogs) {
        console.info(event.userid, event.status, connection.extra.broadcastuser,  "HALLO 404");
        var countViewer = $(`.count-viewer`).text();
        if(event.status == 'online'){
            countViewer++
            $(`.count-viewer`).text(countViewer);
        }else if(event.status == 'offline' && event.userid == unique_id){
            console.log("INI MERUPAKAN : " + event.userid);
            // if(performer != true){
                // window.location.href="<?=base_url()?>homepage";
                // connection.disconnectWith(event.userid);
            // }
        }
    }
};

connection.onleave = function(event) {
    var countViewer = $(`.count-viewer`).text();
    countViewer--;
    $(`.count-viewer`).text(countViewer);
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

	var mediaRecorder;
 	var socket ;
 	var state ="stop";
    var gateway='https://stream.ciak.live:1437/';
    
	function connect_server(){
		var socketOptions = {secure: true, reconnection: true, reconnectionDelay: 1000, timeout:15000, pingTimeout: 15000, pingInterval: 45000, forceNew : true, query: {framespersecond: 30, audioBitrate: 44100}};
		
		//start socket connection
		socket = io.connect(gateway, socketOptions);

		socket.on('connect_timeout', (timeout) => {
   			console.log("state on connection timeout= " +timeout);
		});

		socket.on('error', (error) => {
   			console.log("state on connection error= " +error);
		});
		
		socket.on('message',function(m){
			console.log("state on message= " +state);
			console.log('recv server message',m);
		});

		socket.on('fatal',function(m){
			console.log("fatal socket error!!", m);
			console.log("state on fatal error= " +state);
			console.log('media recorder restarted');
			console.log(rtmpurl);
		});
		
		socket.on('ffmpeg_stderr',function(m){
		    console.log('FFMPEG:'+m);
		});

		socket.on('disconnect', function (reason) {
			console.log("state disconec= " +state);
			console.log('ERROR: server disconnected!' +reason);
			connect_server();
		});
	
		state="ready";
}

$("#btnleave").on("click",function(e){
    e.preventDefault();
    connection.getAllParticipants().forEach(function(participantId) {
        connection.disconnectWith( participantId );
    });
    connection.closeSocket();
    window.location.href="<?=base_url()?>homepage"
})



function requestMedia(stream){
	var constraints = {
	    audio: {sampleRate: 44100,echoCancellation: true},
		video: {
		        width: { min: 100, ideal: 1280, max: 1920 },
	            height: { min: 100, ideal: 720, max: 1080 },
			    frameRate: {ideal: 30}
	    }
	};
	console.log(constraints);
	navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {

		socket.emit('config_rtmpDestination',rtmpurl);
		socket.emit('start','start');
		mediaRecorder = new MediaRecorder(stream);
		mediaRecorder.start(250);

		mediaRecorder.onstop = function(e) {
			console.log("stopped!");
			console.log(e);
		}
		
		mediaRecorder.onpause = function(e) {
			console.log("media recorder paused!!");
			console.log(e);
		}
		
		mediaRecorder.onerror = function(event) {
			let error = event.error;
			console.log("error", error.name);

  	  };	
		//document.getElementById('button_start').disabled=false;　

		mediaRecorder.ondataavailable = function(e) {
			console.log("534 + " + e.data);
		  socket.emit("binarystream",e.data);
		  state="start";
		}
	}).catch(function(err) {
		console.log('The following error occured: ' + err);
	    state="stop";
	});
}

function stopStream(){
	console.log("stop pressed:");

	mediaRecorder.stop();
}



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