
<div id="load-edit-profile">
    <div class="img-load d-flex flex-column justify-content-center align-items-center">
        <div class="spinner-border fs-3" role="status">
            <span class="visually-hidden fs-3">Loading...</span>
        </div>
    </div>
</div>
<div class="position-relative top-0 vh-100">
    <div class="row">
        <div class="col-12 col-lg-8 d-flex justify-content-center align-items-center">
            <div id="videos-container"></div>
        </div>
        <div class="col-12 col-lg-4 mt-4 live-show-chating">
            <!--<div id="onUserStatusChanged"></div>-->
            <div id="broadcast-viewers-counter" class="text-white pb-3">
                <div>Online Viewers: <span class="count-viewer">0</span>
            </div>
            </div>
            <div id="conversation-panel" class="col-lg-12 main-live-chating"></div>
            <div class="d-flex align-items-center mx-4">
                <input type="text" class="form-control input-live-show-chating"  id="txt-chat-message" disabled placeholder="live chat...">
                <button class="btn btn-emoji ms-2" id="btn-emoji-livestream" disabled><i class="fas fa-icons"></i></button>
                <button class="btn btn-main-green ms-2" id="btn-chat-message" disabled>Send</button>
            </div>
        </div>
    </div>
    <div class="col-12 mt-3">
        <div class="row">
            <div class="col-12 ms-4 mb-5 d-flex justify-content-between">
                <div>
                    <a href="<?=base_url()?>homepage" class="btn btn-leave-live">Leave</a>
                    <button id="btninvite" class="btn btn-main-green"><i class="fa-solid fa-video me-2"></i>Invite Meeting</button>
                    <a data-bs-toggle="modal" data-bs-target="#addModerator" class="addModerator-class btn btn-main-green mx-1"> <i class="fa-solid fa-users me-2"></i>Add Moderator</a>
                    <button id="btnopen" class="btn btn-main-green">Start</button>  
                </div>
                <button id="allviewer" class="btn btn-main-green me-5" data-bs-toggle="modal" data-bs-target="#listviewer">
                    <i class="fas fa-list pe-1"></i>
                    List Viewer
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="otherperformer" style="z-index:999">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="apps-member col-12 mx-auto ">
                        <div class="d-flex justify-content-center mt-4 search-input-guest">
                            <input type="text" name="search_data" id="search_data" class="form-control search_data_invt" placeholder="Who do you want to chat with?">
                        </div>
                        <div id="suggestionslist"></div>
                        <div class="list-people mt-5 mb-on-botbar">
                            <?php 
                                $i=1;
                                foreach ($following as $dt){
                                    if ($i==11){
                                        break;
                                    }
                                ?>
                                    <div class="people px-4">
                                        <a class="w-100 h-100 d-block text-decoration-none d-flex" onclick="inviteuser('<?=$dt->id?>','<?=$_GET['room_id']?>','<?=$dt->username?>')">
                                            <img src="<?=$dt->profile?>" alt="image" class="rounded-circle me-3">
                                            <h4 class="names my-auto me-auto"><?=$dt->username?></h4>
                                        </a>
                                    </div>
                            <?php $i++;}?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Moderator-->
<div class="modal fade" id="addModerator" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-white d-flex justify-content-center gap-2">
                <div class="row col-10">
                    <div class="apps-member col-12 mx-auto ">
                        <div class="d-flex justify-content-center mt-4 search-input-guest ">
                            <input type="text" name="search_data_invt" id="search_data_invt" class="form-control search_data_invtnon " placeholder="Search minimun 3 character...">
                        </div>
                        <div id="suggestionslist"></div>
                        <div id="wrap-preview-moderator"></div>
                        <div class="list-people mt-5 mb-on-botbar">
                            <?php 
                                $i=1;
                                foreach ($following as $dt){?>
                                    <div class="people people-cam2cam<?= $dt->id?> px-4">
                                        <a class="w-100 h-100 d-block text-decoration-none d-flex" onclick="invite_moderator('<?= $dt->username?>', '<?= $dt->profile?>')" data-bs-dismiss="modal">
                                            <img src="<?=$dt->profile?>" alt="image" class="rounded-circle me-3">
                                            <h4 class="names my-auto me-auto"><?=$dt->username?></h4>
                                        </a>
                                    </div>
                            <?php $i++;}?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body" id="msgid"></div>
</div>