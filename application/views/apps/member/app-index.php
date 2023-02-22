<div class="apps-body pbot">
    <?php
    if (isset($botbar)) {
        $this->load->view($botbar);
    }
    if (isset($popup)) {
        $this->load->view($popup);
    }
    ?>
    <div class="apps-topbar px-4">
        <div class="apps-member mx-auto">
            <div class="d-flex flex-row">
                <form class="me-auto">
                    <div class="search">
                        <input type="text" name="" id="" class="form-control">
                        <!-- <button><i class="fa-solid fa-magnifying-glass"></i></button> -->
                        <a href="<?= base_url() ?>homepage/search"><i class="fa-solid fa-magnifying-glass"></i></a>
                    </div>
                </form>
                <div class="tools-bar ms-3">
                    <a class="rounded-circle" href="<?= base_url() ?>homepage/notif"><i class="fa-regular fa-bell">
                            <span class="buble-red rounded-circle"></span>
                        </i></a>
                    <a class="rounded-circle add-border" href="<?= base_url() ?>homepage/chat"><i class="fa-regular fa-envelope">
                            <span class="buble-red rounded-circle"></span>
                        </i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="apps-adive px-4">
        <div class="somebody">
            <img src="<?= base_url() ?>assets/img/somebody-1.png" alt="Somebody" class="border-status">
            <div class="action">
                <input type="button" value="Unfollow" id="user1" class="action-btn follow active py-1 px-3 rounded" onclick="actionFollow('1','Unfollow')">
                <!-- <a href="" class="action-btn follow">Follow</a> -->
            </div>
        </div>
        <div class="somebody">
            <img src="<?= base_url() ?>assets/img/somebody-1.png" alt="Somebody" class="">
            <div class="action">
                <input type="button" value="Follow" id="user2" class="action-btn follow py-1 px-3 rounded" onclick="actionFollow('2','Follow')">
                <!-- <a href="" class="action-btn follow">Follow</a> -->
            </div>
        </div>
        <div class="somebody">
            <img src="<?= base_url() ?>assets/img/somebody-1.png" alt="Somebody" class="">
            <div class="action">
                <input type="button" value="Follow" id="user3" class="action-btn follow py-1 px-3 rounded" onclick="actionFollow('3','Follow')">
                <!-- <a href="" class="action-btn follow">Follow</a> -->
            </div>
        </div>
        <div class="somebody">
            <img src="<?= base_url() ?>assets/img/somebody-1.png" alt="Somebody" class="">
            <div class="action">
                <input type="button" value="Follow" id="user4" class="action-btn follow py-1 px-3 rounded" onclick="actionFollow('4','Follow')">
                <!-- <a href="" class="action-btn follow">Follow</a> -->
            </div>
        </div>
        <div class="somebody">
            <img src="<?= base_url() ?>assets/img/somebody-1.png" alt="Somebody" class="">
            <div class="action">
                <input type="button" value="Follow" id="user5" class="action-btn follow py-1 px-3 rounded" onclick="actionFollow('5','Follow')">
                <!-- <a href="" class="action-btn follow">Follow</a> -->
            </div>
        </div>
    </div>
    <div class="apps-member px-4 w-100">
        <button class="btn btn-hide" id="hideadive">Hide <i id="iconhide" class="fa fa-eye"></i></button>
    </div>
    <div class="apps-member w-100">
        <?php if (isset($post)) {
            $this->load->view($post);
        } ?>
    </div>
</div>