
<div id="load-edit-profile">
    <div class="img-load d-flex flex-column justify-content-center align-items-center">
        <div class="spinner-border fs-3" role="status">
            <span class="visually-hidden fs-3">Loading...</span>
        </div>
    </div>
</div>
<div class="modal fade" id="livemodal-connect" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-4 text-white">Enable your livestreaming</h1>
            <button type="button" class="btn-close text-white fs-4" data-bs-dismiss="modal" aria-label="Close">
                X
            </button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="youtube" value="<?=$rtmp->youtube?>">
            <input type="hidden" id="facebook" value="<?=$rtmp->facebook?>">
            <input type="hidden" id="others1" value="<?=$rtmp->others?>">
            <ul class="">
                <li class="connect-live">
                    <div class="form-check form-switch p-0 d-flex justify-content-between align-items-center">
                        <input class="form-check-input" name="livefacebook" type="checkbox" role="switch" id="pil_yt" value="yes" <?php echo (empty($rtmp->youtube)?"disabled":"")?>>
                        <span class="text-white">
                            Youtube
                        </span>
                    </div>
                </li>
                <li class="connect-live">
                    <div class="form-check form-switch p-0 d-flex justify-content-between align-items-center">
                        <input class="form-check-input" name="livefacebook" type="checkbox" role="switch" id="pil_fb" value="yes" <?php echo (empty($rtmp->facebook)?"disabled":"")?>>
                        <span class="text-white">
                            Facebook
                        </span>
                    </div>
                </li>
                <li class="connect-live">
                    <div class="form-check form-switch p-0 d-flex justify-content-between align-items-center">
                        <input class="form-check-input" name="livefacebook" type="checkbox" role="switch" id="pil_ot1" value="yes" <?php echo (empty($rtmp->others)?"disabled":"")?>>
                        <span class="text-white">
                            Others 1
                        </span>
                    </div>
                </li>
            </ul>
        </div>
        <div class="modal-footer ">
            <button type="button" id="startlive" class="<?php echo ($content_type == 'explicit') ? 'btn-explicit-content' : 'btn-main-green'?>">Start Stream</button>
        </div>
        </div>
    </div>
</div>
<div class="position-relative top-0 vh-100">
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="row">
                <div class="col-12">
                    <!-- <img src="<?= base_url()?>assets/img/new-ciak/empty-post.png" alt=""> -->
                    <h2 class="please-click-join-live text-white text-center pt-4"></h2>
                    <video id="main-video" class="main-live-camera" autoplay="autoplay"></video>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mt-4 live-show-chating">
            <!--<div id="onUserStatusChanged"></div>-->
            <div id="broadcast-viewers-counter" class="text-white d-flex justify-content-between pb-3">
                <div>Online Viewers: <span class="count-viewer">0</span></div>
                <?php if($room->id_member != $_SESSION['user_id']){?>
                    <div class="send-tips-livestream me-5" style="cursor: pointer;">
                        <a class="<?php echo ($content_type == 'explicit') ? 'btn-explicit-content' : 'btn-main-green'?>" data-bs-toggle="modal" data-bs-target="#sendTips">
                                <i class="fa-solid fa-euro-sign"></i>
                        </a>
                    </div>
                <?php }?>
            </div>
            <div id="conversation-panel" class="col-lg-12 main-live-chating"></div>
            <div class="d-flex align-items-center mx-4">
                <input type="text" class="form-control input-live-show-chating <?php echo ($content_type == 'explicit') ? 'explicit' : ''?>"  id="txt-chat-message" disabled placeholder="live chat...">
                <button class="btn btn-emoji ms-2" id="btn-emoji-livestream" disabled><i class="fas fa-icons"></i></button>
                <button class="btn <?php echo ($content_type == 'explicit') ? 'btn-explicit-content' : 'btn-main-green'?> ms-2" id="btn-chat-message" disabled><i class="fas fa-paper-plane"></i></button>
            </div>
        </div>
    </div>
    <div class="col-12 mt-3">
        <div class="row">
            <div class="col-12 mx-4 mb-5 d-flex justify-content-between">
                <div>
                    <a href="<?=base_url()?>homepage" class="btn btn-leave-live">Leave</a>
                    <a data-bs-toggle="modal" data-bs-target="#addModerator" class="addModerator-class btn <?php echo ($content_type == 'explicit') ? 'btn-explicit-content' : 'btn-main-green'?> mx-2  "> <i class="fa-solid fa-users me-2"></i>Add Moderator</a>
                    <button id="btnopen" class="btn <?php echo ($content_type == 'explicit') ? 'btn-explicit-content' : 'btn-main-green'?> me-2">Start</button>
                </div>
                <button id="allviewer" class="btn btn-main-green me-5" data-bs-toggle="modal" data-bs-target="#listviewer">
                    <i class="fas fa-list pe-1"></i>
                    List Viewer
                </button>
            </div>
        </div>
    </div>
  
</div>


<!-- Modal List Viewer-->
<div class="modal" id="listviewer" style="z-index:99">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <table id="memberjoin" class="table table-striped" style="color:white">
                    <thead>
                        <tr>
                            <th>Member</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td>Ari</td>
                            <td><button class="btn btn-danger">KICK</button></td>
                        </tr>
                        <tr>
                            <td>Dede</td>
                            <td><button class="btn btn-danger">KICK</button></td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Confirm Join-->
<?php if($room->id_member != $_SESSION['user_id']){?>
<div class="modal" id="confirmjoin" style="z-index:99">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row p-2 d-flex justify-content-center text-center">
            <div class="col-4">
                <img src="<?= base_url()?>assets/img/new-ciak/logo.png" id="imgprofilep" height="100px" width="100px" style="object-fit:cover">
            </div>
        </div>
        <hr>
        <div class="row mt-5 mb-3 ms-2 me-2 d-flex justify-content-center">
            <div class="row col-lg-12 justify-content-center text-center text-white">
                <label><span id="costjoin"></span></label>
                <label><strong><span id="notifjoin"></span></strong></label>
                <hr>
                <strong>Do You Want to join?</strong>
            </div>
            <button id="btnconfirm" class="btn <?php echo ($content_type == 'explicit') ? 'btn-explicit-content' : 'btn-main-green'?> col-lg-8 m-1 mt-2">Confirm</button>            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php }?>

<!-- Modal Send Tips-->
<div class="modal" id="sendTips" style="z-index:99">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <!-- <h1 class="modal-title fs-5 text-white" id="setprice">Subscription Settings</h1> -->
            <button type="button" class="btn-close text-white" style="filter: brightness(0) invert(1);" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <div class="modal-body">
        <div class="row p-2 d-flex justify-content-center text-center">
            <div class="col-4">
                <img src="<?= base_url()?>assets/img/new-ciak/logo.png" id="imgprofilep" height="100px" width="100px" style="object-fit:cover">
            </div>
        </div>
        <hr>
        <div class="row mt-5 mb-3 ms-2 me-2 d-flex justify-content-center">
            <form id="frmsendtips" method="POST" class="d-flex flex-column" onsubmit="return false;">
                <div class="row col-lg-12 justify-content-center text-center text-white">
                    <h4>Send Tips</h4>
                    <input type="hidden" name="owner_post" value="<?= $room->id_member?>">
                    <label for="amount">Amount</label>
                    <input type="text" name="amount" id="amount" placeholder="0.00 XEUR" value="0.5" class="rounded border-1 border-white bg-transparent text-white form-control money-input">
                </div>
                <button id="btnconfirm" class="btn <?php echo ($content_type == 'explicit') ? 'btn-explicit-content' : 'btn-main-green'?> col-lg-8 m-1 mt-2">Confirm</button>            
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add Moderator-->
<div class="modal fade" id="addModerator" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body text-white d-flex justify-content-center gap-2">
            <div class="row col-10">
                <div class="apps-member col-12 mx-auto ">
                    <div class="d-flex justify-content-center mt-4 search-input-guest ">
                        <input type="text" name="search_data_invt" id="search_data_invt" class="form-control <?php echo ($content_type == 'explicit') ? 'search_data_invtnon' : 'search_data_invtnon'?> " placeholder="Search minimun 3 character...">
                    </div>
                    <div id="suggestionslist"></div>
                    <div class="list-people mt-5 mb-on-botbar">
                        <?php 
                            $i=1;
                            foreach ($follower as $dt){?>
                                <div class="people people-cam2cam<?= $dt->id?> px-4">
                                    <a class="w-100 h-100 d-block text-decoration-none d-flex" onclick="invite_guest_active('<?= $dt->id?>', '<?= $dt->profile?>','<?= $dt->username?>')" data-bs-dismiss="modal">
                                        <img src="<?=$dt->profile?>" alt="image" class="rounded-circle me-3">
                                        <h4 class="names my-auto me-auto"><?=$dt->username?></h4>
                                    </a>
                                </div>
                        <?php $i++;}?>
                    </div>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>