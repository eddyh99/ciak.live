<div class="apps-body">
    <div class="row mt-4 mb-5 pb-5">
        <div class="apps-member col-12 col-lg-5 mx-auto light">
            <div class="app-notif">
                <div class="list-notif">
                    <form class="mx-auto w-100">
                        <div class="search">
                            <input type="text" id="search_data" class="form-control" placeholder="Search minimun 3 character...">
                            <a href="<?= base_url() ?>searching" class="pe-none searching-icon" id="searching-icon">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </div>
                    </form>
                </div>
                <div class="posts-member">
                    <div class="post-member border-none">
                        <span class="fw-bold category-popular">Filter</span>
                        <ul class="wrapper-filter my-3">
                            <li class="all float-start span-text-toogle-explicit">
                                <input type="radio" id="filter_all" name="filter_search" value="" checked>
                                <label class="span-text-toogle-explicit" for="filter_all">All</label>
                            </li>
                            <li class="filter float-start span-text-toogle-explicit">
                                <input type="radio" id="filter_username" name="filter_search" value="username">
                                <label class="span-text-toogle-explicit" for="filter_username">Username</label>
                            </li>
                            <li class="filter float-start">
                                <input type="radio" id="filter_post" name="filter_search" value="post">
                                <label class="span-text-toogle-explicit" for="filter_post">Posts</label>
                            </li>
                            <li class="filter float-start">
                                <input type="radio" id="filter_email" name="filter_search" value="email">
                                <label class="span-text-toogle-explicit" for="filter_email">Email</label>
                            </li>
                            <li class="filter float-start">
                                <input type="radio" id="filter_contact" name="filter_search" value="contact">
                                <label class="span-text-toogle-explicit" for="filter_contact">Contact</label>
                            </li>
                            <li class="filter float-start">
                                <input type="radio" id="filter_surename" name="filter_search" value="surename">
                                <label class="span-text-toogle-explicit" for="filter_surename">Name/Surename</label>
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