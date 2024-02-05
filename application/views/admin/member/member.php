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
                <a href="<?= base_url() ?>godmode/member/sendmail" class="btn btn-green-ciak fw-bold px-5 py-3">
                    Send Email
                </a>
            </div>
            <div class="col-12 card member mb-5">
                <div class="card-header member fw-bold text-capitalize">
                    <i class="fas fa-list me-1"></i>
                    <?php if($_GET['status'] == 'active'){?>
                        List Ciak Member Active
                    <?php } else if($_GET['status'] == 'disabled2') {?>
                        List Ciak Member Disabled
                    <?php } else if($_GET['status'] == 'new') {?>
                            List Ciak New Member
                    <?php } ?>
                </div>
                <div class="card-body">
                    <?php 
                    if ($_GET['status'] == 'active') {
                        $status_member = "memberactive";
                    } elseif ($_GET['status'] == 'active2') {
                        $status_member = "memberactive2";
                    } elseif ($_GET['status'] == 'disabled2') {
                        $status_member = "memberdisabled2";
                    } elseif ($_GET["status"] == 'new'){
                        $status_member = "membernew";
                    }
                    ?>
                    <form id="frm-activate" action="<?=base_url()?>m3rc4n73/member/bulk_activate" method="POST">
                        <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <table id="<?= $status_member ?>" class="table table-hover table-bordered">
                            <thead class="table-dark">
                                <tr class="align-middle">
                                    <?php if($_GET['status'] != 'new'){ ?>
                                        <th>No.</th>
                                    <?php }else{ ?>
                                        <th></th>
                                    <?php } ?>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>UCode</th>
                                    <th>Referral</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="border-top: 0;">
                            </tbody>
                        </table>

                        <?php if($_GET['status'] == 'new'){ ?>
                            <button class="btn btn-green">Activate All</button></p>
                        <?php }?>
                        </form>

                    
                </div>
            </div>
        </div>
    </main>
</div>
</div>