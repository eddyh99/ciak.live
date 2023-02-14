<div class="apps-body">
    <?php
    if (isset($popup)) {
        $this->load->view($popup);
    }
    ?>
    <div class="apps-topbar alerts fixed-top light">
        <div class="apps-member mx-auto position-relative">
            <div class="alert-notif">
                <div class="title light mx-auto">
                    <span class="text-capitalize">Search Friend</span>
                </div>
            </div>
        </div>
    </div>
    <div class="apps-member mx-auto w-100 mt-5">
        <div class="search mt-5">
            <div class="search-friend">
                <input class="form-control" type="text" name="search_friend" id="search_friend">
            </div>
        </div>

        <div class="list-people mt-5 px-4">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae eveniet harum illum illo, incidunt libero
            laborum nisi nihil aut eos sunt numquam eius aliquam, magnam placeat at voluptates provident repellendus?
        </div>
    </div>
</div>