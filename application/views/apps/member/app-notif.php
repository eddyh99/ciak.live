<div class="apps-body ptop pbot">
    <?php
    if (isset($botbar)) {
        $this->load->view($botbar);
    }
    ?>
    <div class="apps-topbar alert fixed-top light">
        <div class="apps-member mx-auto">
            <div class="alert-notif d-flex flex-row">
                <div class="action-icon me-auto">
                    <a href="">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                </div>
                <div class="action">
                    <a href="">Mark all as read</a>
                </div>
            </div>
        </div>
    </div>
    <div class="apps-member light w-100">
        <div class="app-notif">
            <div class="list-notif">
                <span class="title-date">Today</span>
                <div class="massage">
                    <div class="icon rounded-circle"><i class="fa-regular fa-heart"></i></div>
                    <div class="info">
                        <span class="matter"><b class="users">Sofia, John and +19 others</b> liked your post.</span>
                        <span class="time">10m ago</span>
                    </div>
                </div>
                <div class="massage">
                    <div class="icon rounded-circle"><i class="fa-regular fa-heart"></i></div>
                    <div class="info">
                        <span class="matter"><b class="users">Rebecca, Daisy and +11 others</b> liked your post.</span>
                        <span class="time">30m ago</span>
                    </div>
                </div>
            </div>
            <div class="list-notif">
                <span class="title-date">Yesterday</span>
                <div class="massage">
                    <div class="icon rounded-circle"><i class="fa-regular fa-comment-dots"></i></div>
                    <div class="info">
                        <span class="matter"><b class="users">Katrina, Denver and +2 others</b> commented on your
                            post.</span>
                        <span class="time">1d ago</span>
                    </div>
                </div>
                <div class="massage">
                    <div class="icon blue rounded-circle"><i class="fa-solid fa-dollar-sign"></i></div>
                    <div class="info">
                        <span class="matter"><b class="users">Deva</b> send you tip.</span>
                        <span class="time">1d ago</span>
                    </div>
                </div>
                <div class="massage">
                    <div class="icon grey rounded-circle"><i class="fa-solid fa-at"></i></div>
                    <div class="info">
                        <span class="matter"><b class="users">Ralph Edwards</b> mentioned you in a post.</span>
                        <span class="time">2d ago</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>