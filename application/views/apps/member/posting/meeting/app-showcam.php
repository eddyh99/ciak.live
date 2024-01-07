<div id="load-edit-profile">
    <div class="img-load d-flex flex-column justify-content-center align-items-center">
        <div class="spinner-border fs-3" role="status">
            <span class="visually-hidden fs-3">Loading...</span>
        </div>
    </div>
</div>
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
                <button id="btnopen" class="btn <?php echo ($content_type == 'explicit') ? 'btn-explicit-content' : 'btn-main-green'?> mx-2">Start</button>
                <button id="btncamera" class="btn <?php echo ($content_type == 'explicit') ? 'btn-explicit-content' : 'btn-main-green'?> mx-2">
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
                <img src="<?= base_url()?>assets/img/new-ciak/logo.png" id="imgprofilep" height="100px" width="100px" style="object-fit:cover">
            </div>
        </div>
        <hr>
        <div class="row mt-5 mb-3 ms-2 me-2 d-flex justify-content-center">
            <div class="row col-lg-12 justify-content-center text-center  text-white">
                <label><span id="costjoin"></span></label>
                <label class="mb-2"><strong><span id="notifjoin"></span></strong></label>
                <hr>
                <strong>Do You Want to join?</strong>
            </div>
            <button id="btnconfirm" class="btn <?php echo ($content_type == 'explicit') ? 'btn-explicit-content' : 'btn-main-green'?> col-lg-8 m-1 mt-">Confirm</button>            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>