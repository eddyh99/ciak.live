<div class="apps-body">
    <div class="apps-topbar alerts fixed-top row">
        <div class="apps-member mx-auto col-12 col-lg-5 position-relative">
            <div class="alert-notif">
                <div class="title mx-auto">
                    <span class="text-capitalize">Search Friend</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="apps-member mx-auto col-12 col-lg-5 ">
            <div class="search mt-on-topbar">
                <div class="search-friend">
                    <input class="form-control" type="text" name="search_friend" id="search_friend" placeholder="username">
                    <label for="search_friend" class="icon-search-absolute">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </label>
                </div>
            </div>
    
            <div class="list-people mt-5 mb-on-botbar">
                <div class="people px-4">
                    <img src="<?= base_url() ?>assets/img/profile-2.jpg" alt="image" class="rounded-circle me-3">
                    <h4 class="names my-0 me-auto">Atom</h4>
                    <input type="button" value="Unfollow" id="user1" class="btn-orange active py-1 px-3 rounded" onclick="actionFollow('1','Unfollow')">
                </div>
                <div class="people px-4">
                    <img src="<?= base_url() ?>assets/img/profile.jpg" alt="image" class="rounded-circle me-3">
                    <h4 class="names my-0 me-auto">Agus</h4>
                    <input type="button" value="Follow" id="user2" class="btn-orange py-1 px-3 rounded" onclick="actionFollow('2','Follow')">
                </div>
                <div class="people px-4">
                    <img src="<?= base_url() ?>assets/img/profile.jpg" alt="image" class="rounded-circle me-3">
                    <h4 class="names my-0 me-auto">Bayu</h4>
                    <input type="button" value="Follow" id="user3" class="btn-orange py-1 px-3 rounded" onclick="actionFollow('3','Follow')">
                </div>
                <div class="people px-4">
                    <img src="<?= base_url() ?>assets/img/profile-2.jpg" alt="image" class="rounded-circle me-3">
                    <h4 class="names my-0 me-auto">Berry</h4>
                    <input type="button" value="Follow" id="user4" class="btn-orange py-1 px-3 rounded" onclick="actionFollow('4','Follow')">
                </div>
            </div>

            <!-- THIS CODE FOR EMPTY MESSAGE -->
            <!-- <div class="d-flex justify-content-center my-5 py-5">
                <img src="<?= base_url()?>assets/img/empty-user.png" alt="empty">
            </div> -->
    
            <div class="px-4 py-3 d-flex">
                <a href="<?= base_url() ?>homepage" class="btn-orange w-100 px-5 mx-5">Next</a>
            </div>
        </div>
    </div>
</div>