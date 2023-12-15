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
                <h2 class="text-white">Search Post</h2>
                <div class="row">
                    <div class="col-2">
                        <input type="text" id="postid" class="form-control">
                    </div>
                    <div class="col-1">
                        <button id="search" class="btn btn-green-ciak">Search</button>
                    </div>
                </div>
                <div class="col-12">
                    <div id="resultpost"></div>
                </div>
            </div>
            <div class="col-12 card change-post mb-5">
                <div class="card-header change-post fw-bold text-capitalize">
                    Preview
                </div>
                <div class="card-body">
                    <div class="card-body container-fluid d-flex justify-content-between">
                    <div class="d-flex">
                        <div class="me-2">
                            <img src="<?=$post->profile?>" class="rounded-circle pp-preview-report" alt="img">
                        </div>
                        <div>
                            <h4><?=$post->username?></h4>
                            <span>
                                <?=$post->post_time?>
                            </span>
                        </div>
                    </div>
                    <div>
                    <form action="<?= base_url()?>godmode/reported/change_explicit/<?=$post->id?>" method="post">
                            <select name="content_type" class="form-select category-report">
                                <option value="">--Choose Content--</option>
                                <option value="explicit">Explicit</option>
                                <option value="non explicit">Non Explicit</option>
                            </select>
                            <button type="submit" class="btn btn-main-green">Change Content</button>
                        </form>
                    </div>
                </div>
                <div class="mt-3">
                    <h1>
                        <?=$post->title_article == null ? '' : $post->title_article?>
                    </h1>
                </div>
                <div class="owl-preview-report">
                    <div class="owl-carousel owl-posts owl-theme">
                        <?php
                        function image($post)
                        {
                            $media = "";
                            if (!empty($post->post_media)) {
                                foreach ($post->post_media as $dt) {
                                    if ($dt->media_type == 'non attach') {
                                        if (substr($dt->imgorg, -3) == 'mp4') {
                                            $media .= "
                                                <div class='item'>
                                                    <div class='img'>
                                                        <div class='vid-post'>
                                                            <video width='100%' height='300px' loop poster='' controls controlsList='nodownload' class='d-block mx-auto videoplayer-post'> 
                                                                <source src='{$dt->imgorg}' type='video/mp4'>
                                                            </video>                                               
                                                        </div>
                                                    </div>
                                                </div>
                                            ";
                                        } else {
                                            $media .= "
                                                <div class='item'>
                                                    <div class='img'>
                                                        <img src='{$dt->imgorg}' class='img-post-report' alt=''>
                                                    </div>
                                                </div>
                                            ";
                                        }
                                    }
                                }
                            }
                            return $media;
                        }

                        echo image($post);
                        ?>
                    </div>
                </div>
                <article class="article mt-3">
                    <div class="accordion" id="accordionExample">
                        <?php
                        function attachments($post)
                        {
                            $attachments = "";
                            if (!empty($post->post_media)) {
                                foreach ($post->post_media as $dt) {
                                    if ($dt->media_type == 'attach') {
                                        $attachments .= "
                                            <div class='accordion-item'>
                                                <h2 class='accordion-header'>
                                                    <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseThree{$dt->imgorg}' aria-expanded='false' aria-controls='collapseThree{$dt->imgorg}'>
                                                        {$dt->imgorg}
                                                    </button>
                                                </h2>
                                        ";

                                        switch ($dt->media_extension) {
                                            case "pdf":
                                                $attachments .= "
                                                    <div id='collapseThree{$dt->imgorg}' class='accordion-collapse collapse' data-bs-parent='#accordionExample'>
                                                        <div class='accordion-body body-report'>
                                                            <embed frameBorder='0' scrolling='auto' height='500' width='100%' src='{$dt->imgorg}#toolbar=0' type='application/pdf'>
                                                        </div>
                                                    </div>
                                                </div>
                                                ";
                                                break;
                                            case "audio":
                                                $attachments .= "
                                                    <div id='collapseThree{$dt->imgorg}' class='accordion-collapse collapse' data-bs-parent='#accordionExample'>
                                                        <div class='accordion-body body-report'>
                                                            <audio style='width: 80%;' controls controlsList='nodownload'>
                                                                <source src='{$dt->imgorg}' type='audio/mpeg'>
                                                                Your browser does not support the audio.
                                                            </audio>
                                                        </div>
                                                    </div>
                                                </div>
                                                ";
                                                break;
                                            case "video":
                                                $attachments .= "
                                                    <div id='collapseThree{$dt->imgorg}' class='accordion-collapse collapse' data-bs-parent='#accordionExample'>
                                                        <div class='accordion-body body-report'>
                                                            <video width='100%' height='375' loop poster='' controls controlsList='nodownload' class='d-block mx-auto videoplayer-post'> 
                                                                <source src='{$dt->imgorg}' type='video/mp4'>
                                                            </video>
                                                        </div>
                                                    </div>
                                                </div>
                                                ";
                                                break;
                                            case "image":
                                                $attachments .= "
                                                    <div id='collapseThree{$dt->imgorg}' class='accordion-collapse collapse' data-bs-parent='#accordionExample'>
                                                        <div class='accordion-body body-report'>
                                                            <div class='wrapper-preview-report-image'>
                                                                <img class='attch-img' src='{$dt->imgorg}' alt='img'>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ";
                                                break;
                                        }
                                    }
                                }
                            }
                            return $attachments;
                        }
                        echo attachments($post);
                        ?>
                    </div>
                        <?php echo $article;?>
                </article>
                </div>
            </div>
        </div>
    </main>
</div>
</div>