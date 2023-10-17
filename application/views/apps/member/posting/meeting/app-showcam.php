<div class="row vh-100 nopadding">
    <div class="position-relative nopadding">
        <div class="position-absolute" style="right:0;top:0">
            <div id="local-video-container" class="embed-responsive"></div>
        </div>
        <div class="col-lg-12 nopadding" style="width:100%;height:85vh;">
            <div id="remote-video-container" style="width:100%;height:80vh;object-fit:cover"></div>
        </div>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <button id="btnopen" class="btn btn-main-green mx-2">Start</button>
                <button id="btncamera" class="btn btn-main-green mx-2">
                    <i id="offonvid" class="fas fa-video-slash"></i>
                    Hide Camera
                </button>
                <a href="<?=base_url()?>homepage" class="btn btn-leave-live mx-2">Leave</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="confirmjoin" style="z-index:999">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row p-2 d-flex justify-content-center text-center">
            <div class="col-4">
                <!-- <img id="imgprofilep" src="<?=$mdata["profile"]?>" height="100px" width="100px" style="object-fit:cover" class="rounded-circle"> -->
            </div>
            <!-- <div class="col-12"><span id="nicknamep" class="nickname"><?=$mdata["nickname"]?></span></div> -->
        </div>
        <hr>
        <div class="row mt-5 mb-3 ms-2 me-2 d-flex justify-content-center">
            <div class="row col-lg-12 justify-content-center text-center">
                <!-- <label>This Meeting will cost <?=$mdata["price"]." ".$mdata["currency"]?></label> -->
                <label>Balance will be deducted from your wallet each minutes</label>
                <hr>
                <strong>Do You Want to join?</strong>
            </div>
            <button id="btnconfirm" class="btn ciakbtn col-lg-8 m-1 mt-2">Confirm</button>            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>