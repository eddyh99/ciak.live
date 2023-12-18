<div class="col-7 card change-post mt-5 mb-5">
    <div class="<?php echo ($post->content_type == 'explicit') ? 'card-header-explicit' : 'card-header'; ?> fw-bold text-capitalize">
        Preview
        <?php echo $post->content_type; ?>
    </div>
    <div class="card-body">
        <div class="card-body container-fluid d-flex justify-content-between">
        <div class="d-flex">
            <div class="me-2">
                <img src="<?=$post->profile?>" class="rounded-circle pp-preview-report img-fluid" style="max-width: 100px; height: auto;" alt="img">
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
                <button type="submit" class="btn <?php echo ($post->content_type == 'explicit') ? 'btn-explicit-content' : 'btn-main-green'; ?>">Change Content</button>
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
            <?php echo image($post); ?>
        </div>
    </div>
    <article class="article mt-3">
        <div class="accordion" id="accordionExample">
            <?php echo attachments($post); ?>
        </div>
        <?php echo $article; ?>
    </article>
    </div>
</div>

<!-- PHP for Image -->
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
?>

<!-- PHP for attachments -->
<?php
    function sanitizeID($input) {
        return preg_replace('/[^A-Za-z0-9]/', '', $input);
    }
    function attachments($post)
    {
        $attachments = "";
        if (!empty($post->post_media)) {
            foreach ($post->post_media as $dt) {
                if ($dt->media_type == 'attach') {
                    $sanitizedID = sanitizeID($dt->imgorg);
                    $attachments .= "
                        <div class='accordion-item'>
                            <h2 class='accordion-header'>
                                <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseThree{$sanitizedID}' aria-expanded='false' aria-controls='collapseThree{$sanitizedID}'>
                                    {$dt->imgorg}
                                </button>
                            </h2>
                    ";

                    switch ($dt->media_extension) {
                        case "pdf":
                            $attachments .= "
                                <div id='collapseThree{$sanitizedID}' class='accordion-collapse collapse' data-bs-parent='#accordionExample'>
                                    <div class='accordion-body body-report'>
                                        <embed frameBorder='0' scrolling='auto' height='500' width='100%' src='{$dt->imgorg}#toolbar=0' type='application/pdf'>
                                    </div>
                                </div>
                            </div>
                            ";
                            break;
                        case "audio":
                            $attachments .= "
                                <div id='collapseThree{$sanitizedID}' class='accordion-collapse collapse' data-bs-parent='#accordionExample'>
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
                                <div id='collapseThree{$sanitizedID}' class='accordion-collapse collapse' data-bs-parent='#accordionExample'>
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
                                <div id='collapseThree{$sanitizedID}' class='accordion-collapse collapse' data-bs-parent='#accordionExample'>
                                    <div class='accordion-body body-report'>
                                        <div class='wrapper-preview-report-image'>
                                            <img class='attch-img' src='{$dt->imgorg}' alt='img'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ";
                            break;
                        default:
                        $attachments .= "
                            <div id='collapseThree{$sanitizedID}' class='accordion-collapse collapse' data-bs-parent='#accordionExample'>
                                <div class='accordion-body body-report'>
                                    <iframe src='https://view.officeapps.live.com/op/embed.aspx?src={$dt->imgorg}?&wdInConfigurator=True' width='100%' height='500' frameborder='0'></iframe>
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
    ?>
    <!-- owlCarousel-->
<script>
    $(document).ready(function(){
        $('.owl-posts').owlCarousel({
            loop: false,
            margin: 10,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
    });
</script>