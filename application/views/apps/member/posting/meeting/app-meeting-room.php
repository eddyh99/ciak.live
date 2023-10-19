
<div id="load-edit-profile">
    <div class="img-load d-flex flex-column justify-content-center align-items-center">
        <div class="spinner-border fs-3" role="status">
            <span class="visually-hidden fs-3">Loading...</span>
        </div>
    </div>
</div>
<div class="position-relative top-0 vh-100">
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 ">
                            <div id="videos-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mt-4 live-show-chating">
            <!--<div id="onUserStatusChanged"></div>-->
            <div id="broadcast-viewers-counter" class="text-white pb-3"></div>
            <div id="conversation-panel" class="col-lg-12 main-live-chating"></div>
            <div class="d-flex align-items-center mx-4">
                <input type="text" class="form-control input-live-show-chating"  id="txt-chat-message" disabled placeholder="live chat...">
                <button class="btn btn-main-green ms-2" id="btn-chat-message" disabled>Send</button>
            </div>
        </div>
    </div>
    <div class="col-12 mt-3">
        <div class="row">
            <div class="col-12 ms-4 mb-5">
                <a href="<?=base_url()?>homepage" class="btn btn-leave-live">Leave</a>
                <button id="btninvite" class="btn btn-main-green">Invite Meeting</button>
                <button id="btnopen" class="btn btn-main-green">Start</button>
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
                                    <a class="w-100 h-100 d-block text-decoration-none d-flex" onclick="inviteuser('<?=$dt->id?>','<?=$_GET["room_id"]?>','<?=$dt->username?>')">
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
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body" id="msgid"></div>
</div>