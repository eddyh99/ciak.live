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
            <div class="col-12 ms-4 mb-5 d-flex">
                <a href="<?=base_url()?>homepage" class="btn btn-leave-live">Leave</a>
                <button id="btnopen" class="btn btn-main-green mx-2">Start</button>
                <div class="dropdown" id="connectlive">
                    <button class="btn btn-main-green dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Connect Live
                    </button>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item connect-live">
                            <div class="form-check form-switch p-0 d-flex justify-content-between align-items-center">
                                <input class="form-check-input" name="livefacebook" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="yes">
                                <span>
                                    Facebook
                                </span>
                            </div>
                        </li>
                        <li class="dropdown-item connect-live">
                            <div class="form-check form-switch p-0 d-flex justify-content-between align-items-center">
                                <input class="form-check-input" name="livefacebook" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="yes">
                                <span>
                                    Instagram
                                </span>
                            </div>
                        </li>
                        <li class="dropdown-item connect-live">
                            <div class="form-check form-switch p-0 d-flex justify-content-between align-items-center">
                                <input class="form-check-input" name="livefacebook" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="yes">
                                <span>
                                    Youtube
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="confirmjoin" style="z-index:99">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row p-2 d-flex justify-content-center text-center">
            <div class="col-4">
                <img src="<?= base_url()?>assets/img/new-ciak/logo.png" id="imgprofilep" height="100px" width="100px" style="object-fit:cover">
            </div>
            <!-- <div class="col-12"><span id="nicknamep" class="nickname"><?=$mdata["username"]?></span></div> -->
        </div>
        <hr>
        <div class="row mt-5 mb-3 ms-2 me-2 d-flex justify-content-center">
            <div class="row col-lg-12 justify-content-center text-center text-white">
                <!-- <label>This show will cost <?=$mdata["price"]." ".$mdata["currency"]?></label> -->
                <label>Balance will be deducted from your wallet each minutes</label>
                <hr>
                <strong>Do You Want to join?</strong>
            </div>
            <button id="btnconfirm" class="btn btn-main-green col-lg-8 m-1 mt-2">Confirm</button>            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>