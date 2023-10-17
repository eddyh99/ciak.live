<div class="apps-body">
    <div class="row mt-4 mb-5 pb-5">
        <div class="apps-member col-12 col-lg-5 mx-auto light">
            <div class="app-notif">
                <div class="list-notif">
                    <form class="mx-auto w-100">
                        <div class="search">
                            <input type="text" id="search_data" class="form-control" placeholder="Search for people, posts,....">
                            <a href="<?= base_url() ?>searching" class="pe-none searching-icon" id="searching-icon">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </div>
                    </form>
                </div>
                <div class="posts-member">
                    <div class="post-member border-none">
                        <span class="fw-bold category-popular">Filter</span>
                        <ul class="wrapper-filter">
                            <li class="filter float-start span-text-toogle-explicit">
                                <input type="checkbox" id="check_1" name="check_1" value="check_1">
                                <label class="span-text-toogle-explicit" for="check_1">Username</label>
                            </li>
                            <li class="filter float-start">
                                <input type="checkbox" id="check_2" name="check_2" value="check_2">
                                <label class="span-text-toogle-explicit" for="check_2">Posts</label>
                            </li>
                        </ul>
                    </div>

                    <div id="suggestionslist">
                        
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>