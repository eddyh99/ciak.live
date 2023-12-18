<div id="layoutSidenav_content">
    <main>
        <?php if (@isset($_SESSION["failed"])) { ?>
        <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
            <span class="notif-login f-poppins"><?= $_SESSION["failed"] ?></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>
        <?php if (@isset($_SESSION["success"])) { ?>
        <div class="col-12 alert alert-success alert-dismissible fade show" role="alert">
            <span class="notif-login f-poppins"><?= @$_SESSION["success"] ?></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>
        <div class="container-fluid px-4">
            <div class="col-12 my-4">
                <h2 class="text-white">Search Post</h2>
                <div class="row">
                    <div class="col-2">
                        <input type="text" id="postid" class="form-control">
                    </div>
                    <div class="col-1">
                        <button id="search" class="btn btn-green-ciak">Search</button>
                    </div>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-12 d-flex align-items-center justify-content-center" id="resultpost"></div>
                </div>
            </div>
        </div>
    </main>
</div>
</div>