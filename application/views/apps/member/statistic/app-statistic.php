<div class="apps-body">
    <div class="apps-topbar alerts light row">
        <div class="apps-member mx-auto col-12 col-lg-5">
            <div class="alert-notif d-flex justify-content-between px-4 px-lg-0">
                <div class="action-icon">
                    <a href="<?= base_url()?>homepage">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                </div>
                <div class="header-list">
                    <span class="fs-4">LIST</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row pb-5">
        <div class="apps-member col-12 col-lg-5 mx-auto mb-5 py-5">
            <a href="<?= base_url()?>statistic/category" class="text-decoration-none">
                <div class="border-b d-flex justify-content-between align-items-center">
                    <h5 class="">Category list</h5>
                    <p class=""><?=number_format($statistik->category)?></p>
                </div>
            </a>
            <a href="<?= base_url()?>statistic/subscription" class="text-decoration-none">
                <div class="border-b d-flex justify-content-between align-items-center mt-5 pt-5">
                    <h5 class="">Subscription</h5>
                    <p class=""><?=number_format($statistik->subscription)?></p>
                </div>
            </a>
            <a href="<?= base_url()?>statistic/subscriber" class="text-decoration-none">
                <div class="border-b d-flex justify-content-between align-items-center mt-5 pt-5">
                    <h5 class="">Subscriber</h5>
                    <p class=""><?=number_format($statistik->subscriber)?></p>
                </div>
            </a>
            <a href="<?= base_url()?>statistic/following" class="text-decoration-none">
                <div class="border-b d-flex justify-content-between align-items-center mt-5 pt-5">
                    <h5 class="">Following</h5>
                    <p class=""><?=number_format($statistik->following)?></p>
                </div>
            </a>
            <a href="<?= base_url()?>statistic/followers" class="text-decoration-none">
                <div class="border-b d-flex justify-content-between align-items-center mt-5 pt-5">
                    <h5 class="">Followers</h5>
                    <p class=""><?=number_format($statistik->followers)?></p>
                </div>
            </a>
            <a href="<?= base_url()?>statistic/bookmarks" class="text-decoration-none">
                <div class="border-b d-flex justify-content-between align-items-center mt-5 pt-5">
                    <h5 class="">Bookmarks</h5>
                    <p class=""><?=number_format($statistik->bookmarks)?></p>
                </div>
            </a>
            <a href="<?= base_url()?>statistic/blocked" class="text-decoration-none">
                <div class="border-b d-flex justify-content-between align-items-center mt-5 pt-5">
                    <h5 class="">Blocked Users</h5>
                    <p class=""><?=number_format($statistik->blocked)?></p>
                </div>
            </a>
        </div>
    </div>
</div>