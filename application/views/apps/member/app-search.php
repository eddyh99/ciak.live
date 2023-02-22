<div class="apps-body pbot">
    <?php
    if (isset($botbar)) {
        $this->load->view($botbar);
    }
    if (isset($popup)) {
        $this->load->view($popup);
    }
    ?>
    <div class="apps-topbar">
        <div class="apps-member mx-auto">
            <div class="d-flex flex-row">
                <form class="w-100">
                    <div class="search">
                        <input type="text" name="" id="" class="form-control" placeholder="Search for people, posts,....">
                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="apps-tags">
        <div class="title">
            <h5>Popular</h5>
        </div>
        <div class="tags-list">
            <div class="tag active">
                <a href="" class="rounded-pill">All</a>
            </div>
            <div class="tag">
                <a href="" class="rounded-pill">Profiles</a>
            </div>
            <div class="tag">
                <a href="" class="rounded-pill">Photos</a>
            </div>
            <div class="tag">
                <a href="" class="rounded-pill">Videos</a>
            </div>
            <div class="tag">
                <a href="" class="rounded-pill">Text</a>
            </div>
        </div>
    </div>
    <div class="apps-member w-100">
        <?php if (isset($post)) {
            $this->load->view($post);
        } ?>
    </div>
</div>