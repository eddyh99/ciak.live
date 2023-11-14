<div class="apps-body pbot">
    <div class="apps-topbar px-4 row">
        <div class="apps-member col-12 col-lg-5 mx-auto">
            <div class="d-flex flex-row">
                <form class="me-auto">
                    <div class="search">
                        <input type="text" name="" id="homepagesearch" class="form-control">
                        <a href="<?= base_url() ?>searching"><i class="fa-solid fa-magnifying-glass"></i></a>
                    </div>
                </form>
                <div class="tools-bar ms-3">
                    <a class="rounded-circle" href="<?= base_url() ?>notification">
                        <i class="fa-regular fa-bell">
                            <?php if(!empty($notif)){ ?>
                                <span class="buble-red rounded-circle"></span>
                            <?php }?>
                        </i>
                    </a>
                    <a class="rounded-circle add-border" href="<?= base_url() ?>message">
                        <i class="fa-regular fa-envelope">
                            <?php if(!empty($notifmsg)){ ?>   
                                <span class="buble-red rounded-circle"></span>
                            <?php }?>
                        </i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="row">
            <div class="col-12 col-lg-5 d-flex justify-content-center mx-auto">
                <div class="apps-adive mx-auto">
                    <div class="owl-carousel owl-nonfollow">
                        <?php foreach($nonfollow as $dt){?>
                            <div class="somebody">
                                <img src="<?=$dt->profile?>" alt="Somebody" class="border-status">
                                <div class="action">
                                    <a class="somebody-username"  href="<?=base_url()?>profile/guest_profile/<?=$dt->ucode?>">
                                        <label>
                                            <?php 
                                                echo mb_strimwidth($dt->username , 0, 8, "...");
                                            ?>
                                        </label>
                                    </a>
                                    <input type="button" value="Follow" id="user<?=$dt->id?>" class="action-btn follow py-1 px-3 rounded" onclick="actionFollow('<?=$dt->id?>','<?=$dt->id?>')">
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="apps-member col-12 col-lg-5 d-flex align-items-center mx-auto px-4">
            <!-- <button class="btn btn-hide px-2 d-flex align-items-center" id="hideadive">
                <span>Hide</span> 
                <i id="iconhide" class="fa fa-eye ms-1"></i>
            </button> -->
            <div class="d-flex justify-content-between w-100">
                <!-- <div>
                    <a class="link">
                        <span class="mode-toggle">
                            <span class="switch"></span>
                        </span>
                    </a>
                </div> -->
                <div class="d-flex align-items-center">
                    <span class="span-text-toogle-explicit">Explicit contents</span>
                    <a class="link-content mt-1 ms-2">
                        <span class="mode-toggle-content">
                            <span class="switch-content" id="switch-content"></span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="apps-member w-100">
        <?php if (isset($post)) {
            $this->load->view($post);
        } ?>
    </div>
</div>