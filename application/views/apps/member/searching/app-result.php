                    <?php $this->load->view('apps/member/app-popup-search')?>
                    <?php 
                        foreach ($search->member as $dt){
                    ?>
                    <div class="apps-member col-12 mx-auto">
                        <div class="list-people mb-on-botbar">
                            <a href="<?=base_url()?>profile/guest_profile/<?=$dt->ucode?>" class="w-100 h-100 d-block text-decoration-none">
                                <div class="people">
                                        <img src="<?=$dt->profile?>" alt="image" class="rounded-circle me-3">
                                        <h4 class="names my-0 me-auto"><?=$dt->username?></h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                        
                        <?php 
                            foreach ($search->post as $dt){
                                if ($dt->is_admin=="active"){
                                    if (
                                        ($dt->id_member==$_SESSION["user_id"] && $dt->is_deleted=="active") ||
                                        ($dt->id_member!=$_SESSION["user_id"] && $dt->type=="public" && $dt->is_deleted=="active" && $dt->is_block=='no' && $dt->is_blocked=='no') ||
                                        ($dt->id_member!=$_SESSION["user_id"] && $dt->type=="private" && $dt->is_deleted=="active" && ($dt->is_subscribe=="no"||$dt->is_subscribe=="yes") && $dt->is_block=='no' && $dt->is_blocked=='no') ||
                                        ($dt->id_member!=$_SESSION["user_id"] && $dt->type=="private" && $dt->is_deleted=="active" && $dt->is_subscribe=="yes" && $dt->is_block=='no' && $dt->is_blocked=='yes') || 
                                        ($dt->id_member!=$_SESSION["user_id"] && $dt->type=="special" && $dt->is_special=="yes" && $dt->is_deleted=="deleted") ||
                                        ($dt->id_member!=$_SESSION["user_id"] && $dt->type=="special" && ($dt->is_special=="yes"||$dt->is_special=='no') && $dt->is_deleted=="active" && $dt->is_block=='no' && $dt->is_blocked=='no') ||
                                        ($dt->id_member!=$_SESSION["user_id"] && $dt->type=="download" && $dt->is_download=="yes" && $dt->is_deleted=="deleted") ||
                                        ($dt->id_member!=$_SESSION["user_id"] && $dt->type=="download" && ($dt->is_download=="yes"||$dt->is_download=='no') && $dt->is_deleted=="active" && $dt->is_block=='no' && $dt->is_blocked=='no')
                                        ) {
                                            if(
                                                ($dt->content_type == 'explicit' && @$_COOKIE['content'] === 'yes') || 
                                                $dt->content_type == 'non explicit'
                                        ) {
                        ?>
                            <div class="row">
                                <div class="posts-member mx-auto">
                                    <div class="post-member px-4">
                                        <div class="post-header mb-3 d-flex flex-row align-items-center">
                                            <div class="post-profile d-flex flex-row align-items-center me-auto">
                                                <!-- FIXED GO TO GUEST -->
                                                <a href="<?= base_url()?>profile/guest_profile/<?=$dt->ucode?>" class="d-flex flex-row align-items-center me-auto text-decoration-none">
                                                    <img src="<?=$dt->profile?>" alt="picture" class="picture rounded-circle">
                                                    <div class="d-flex flex-column p-2">
                                                        <span class="name mb-1"><?=$dt->username?></span>
                                                        <span class="time">
                                                            <?php 
                                                                $to_time    = strtotime(date("Y-m-d H:i:s"));
                                                                $from_time  = strtotime($dt->post_time);
                                                                $selisih    = round(abs($to_time - $from_time) / 60);
                                                                if ($selisih<60){
                                                                    echo $selisih. " minutes ago";
                                                                }elseif ($selisih>60 && $selisih<1440){
                                                                    echo round($selisih/60)." hour ago";
                                                                }elseif ($selisih>1440 & $selisih<2880){
                                                                    echo "Yesterday";
                                                                }else{
                                                                    $datetime = new DateTime($dt->post_time);
                                                                    $la_time = new DateTimeZone($_SESSION["time_location"]);
                                                                    $datetime->setTimezone($la_time);
                                                                    echo $datetime->format('Y-m-d H:i:s');
                                                                }
                                                            ?>
                                                        </span>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php if (!isset($mn_search)) { ?>
                                                <div class="action d-flex flex-row align-items-center">
                                                    <?php 
                                                        if ($dt->type=='download' && $dt->id_member != $_SESSION["user_id"] && $dt->is_download != 'yes'){
                                                    ?>
                                                        <a href="" class="icon color-bp rounded-circle <?php echo ($dt->content_type == 'explicit') ? 'chart-explicit' : 'chart-nonexplicit'?>"  data-bs-toggle="offcanvas" data-bs-target="#basketDownload<?= $dt->id?>" aria-controls="offcanvasBottom"><i class="fa-solid fa-basket-shopping"></i></a>
                                                    <?php }
                                                        if ($dt->type=='special' && $dt->id_member != $_SESSION["user_id"] && $dt->is_special != 'yes'){
                                                    ?>
                                                        <a href="" class="icon color-bp rounded-circle <?php echo ($dt->content_type == 'explicit') ? 'chart-explicit' : 'chart-nonexplicit'?>" data-bs-toggle="offcanvas" data-bs-target="#basketShopping<?= $dt->id?>" aria-controls="offcanvasBottom"><i class="fa-solid fa-basket-shopping"></i></a>
                                                    <?php } 
                                                        if ($dt->id_member!=$_SESSION["user_id"]){
                                                    ?>
                                                        <a href="" onclick="popupSendTip('<?=$dt->id?>')" class="icon color-bp dollar rounded-circle <?php echo ($dt->content_type == 'explicit') ? 'dollar-explicit' : 'dollar-non'?>" data-bs-toggle="offcanvas" data-bs-target="#sendTip<?= $dt->id?>" aria-controls="offcanvasBottom">
                                                            <div class="bg-white-dollar rounded-circle"></div>
                                                            <i class="fa-solid fa-euro-sign"></i>
                                                        </a>
                                                    <?php }
                                                        if ($dt->id_member!=$_SESSION["user_id"]){
                                                    ?>
                                                        <a href="" class="icon ellipsis rounded-circle" data-bs-toggle="offcanvas" data-bs-target="#settingMenus" onclick="eventpopup('<?=$dt->id?>')" aria-controls="offcanvasBottom"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                                    <?php } else{ ?>
                                                        <a href="" class="icon ellipsis rounded-circle" data-bs-toggle="offcanvas" data-bs-target="#profileSettings" onclick="eventpopup('<?=$dt->id?>')" aria-controls="offcanvasBottom"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                                    <?php }?>
                                                </div>
                                            <?php } ?>
                                            <!-- Modal Report -->
                                            <div class="modal fade" id="modalReport<?= $dt->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title-report fs-5" id="exampleModalLabel">Report</h1>
                                                            <button type="button" class="modal-close-ciak" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                        </div>
                                                        <div class="modal-body reportpost-wrapper">
                                                            <h5 class="modal-subtitle-report">Why are you reporting this post?</h5>
                                                                <a onclick="reportpost('<?= $dt->id?>','spam')" class="d-flex justify-content-between p-2 bg-report">
                                                                    <div>
                                                                        It's spam
                                                                    </div>
                                                                    <div>
                                                                        <i class="fas fa-chevron-right"></i>
                                                                    </div>
                                                                </a>
                                                                <a onclick="reportpost('<?= $dt->id?>','wrong-category')" class="d-flex justify-content-between p-2 bg-report">
                                                                    <div>
                                                                        Wrong category/explicit content/non explicit content 
                                                                    </div>
                                                                    <div>
                                                                        <i class="fas fa-chevron-right"></i>
                                                                    </div>
                                                                </a>
                                                                <a onclick="reportpost('<?= $dt->id?>','hate-speech')" class="d-flex justify-content-between p-2 bg-report">
                                                                    <div>
                                                                        Hate speech or symbols
                                                                    </div>
                                                                    <div>
                                                                        <i class="fas fa-chevron-right"></i>
                                                                    </div>
                                                                </a>
                                                                <a onclick="reportpost('<?= $dt->id?>','abusing')" class="d-flex justify-content-between p-2 bg-report">
                                                                    <div>
                                                                        Abusing Person
                                                                    </div>
                                                                    <div>
                                                                        <i class="fas fa-chevron-right"></i>
                                                                    </div>
                                                                </a>
                                                                <a onclick="reportpost('<?= $dt->id?>','others')" class="d-flex justify-content-between p-2 bg-report">
                                                                    <div>
                                                                        Others
                                                                    </div>
                                                                    <div>
                                                                        <i class="fas fa-chevron-right"></i>
                                                                    </div>
                                                                </a>                                                
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-body">
                                            <div class="text">
                                                <?php 
                                                    if ($dt->type=="public"){?>
                                                        <h1 class="<?php echo (empty($dt->title_article) ? 'd-none' : 'd-block')?>">
                                                            <?= @$dt->title_article?>
                                                        </h1>
                                                        <article class="article">
                                                            <?php 
                                                                if (!empty($dt->post_media)){
                                                                    foreach ($dt->post_media as $imgpost){
                                                                        if ($imgpost->media_type=='attach'){
                                                            ?>
                                                                        <li class="post-list-attach">
                                                                            <a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#previewAttch<?= $imgpost->id?>" class="attachment article <?php echo ($dt->content_type == 'explicit') ? 'attachment-explicit' : ''?>" > 
                                                                                <?= substr($imgpost->imgorg, 42)?>
                                                                            </a>
                                                                        </li>
                                                                        <div class="modal fade" id="previewAttch<?= $imgpost->id?>" tabindex="-1" aria-labelledby="previewAttach" aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h1 class="modal-title fs-5" id="previewAttach">Preview Attachment</h1>
                                                                                        <button type="button" class="modal-close-ciak" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                                                    </div>
                                                                                    <div class="modal-body d-flex justify-content-center">
                                                                                        <?php if ($imgpost->media_extension == "pdf"){?>
                                                                                                <embed frameBorder="0" scrolling="auto" height="500" width="100%" src="<?= $imgpost->imgorg?>#toolbar=0" type="application/pdf">
                                                                                        <?php } else if ($imgpost->media_extension == "audio") {?>
                                                                                                <audio style="width: 80%;" controls controlsList="nodownload">>
                                                                                                    <source src="<?= $imgpost->imgorg?>" type="audio/mpeg">
                                                                                                    Your browser does not support the audio.
                                                                                                </audio>
                                                                                        <?php } else if($imgpost->media_extension == "video"){?>
                                                                                                <video width="100%" height="375" loop poster="" controls controlsList="nodownload" class="d-block mx-auto videoplayer-post"> 
                                                                                                    <source src="<?=@$imgpost->imgorg?>" type="video/mp4">
                                                                                                </video>   
                                                                                        <?php } else if($imgpost->media_extension == "image"){?>
                                                                                                <div class="wrapper-attch-img">
                                                                                                    <img class="attch-img" src="<?= $imgpost->imgorg?>" alt="img">
                                                                                                </div>
                                                                                        <?php } else {?>
                                                                                                <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=<?= $imgpost->imgorg?>' width='100%' height='500' frameborder='0'></iframe>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                            <?php 
                                                                        }
                                                                    }
                                                                }
                                                            ?>
                                                        </article>
                                                        <div class="owl-carousel owl-posts owl-theme" >
                                                            <?php 
                                                                if (!empty(@$dt->post_media)){
                                                                    foreach (@$dt->post_media as $imgpost){
                                                                        if ($imgpost->media_type=='non attach'){
                                                            ?>
                                                            <div class="item">
                                                                <div class="img">
                                                                    <?php if (substr($imgpost->imgorg,-3)=="mp4"){?>
                                                                        <div class="vid-post">
                                                                            <video width="100%" height="375" loop poster="" controls controlsList="nodownload" class="d-block mx-auto videoplayer-post"> 
                                                                                <source src="<?=$imgpost->imgorg?>" type="video/mp4">
                                                                            </video>                                               
                                                                        </div>
                                                                    <?php }else{?>
                                                                        <img src="<?=$imgpost->imgorg?>" alt="image" class="image-post rounded">
                                                                    <?php }?>
                                                                </div>
                                                            </div>
                                                                <?php 
                                                                        }
                                                                    }
                                                                }
                                                            ?>
                                                        </div>
                                                        <article class="article">
                                                            <?php echo @base64_decode($dt->article)?>
                                                        </article>
                                                <?php 
                                                    } elseif ($dt->type=="private"){
                                                        if ($dt->is_subscribe=='no' && $dt->id_member!=$_SESSION["user_id"]){?>
                                                            <h1 class="<?php echo (empty($dt->title_article) ? 'd-none' : 'd-block')?>">
                                                                <?= @$dt->title_article?>
                                                            </h1>
                                                            <article class="article">
                                                                <?php 
                                                                    if (!empty($dt->post_media)){
                                                                        foreach ($dt->post_media as $imgpost){
                                                                            if ($imgpost->media_type=='attach'){
                                                                ?>
                                                                        <li class="post-list-attach">
                                                                            <a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#previewAttch<?= $imgpost->id?>" class="attachment article <?php echo ($dt->content_type == 'explicit') ? 'attachment-explicit' : ''?>" > 
                                                                                <?= substr($imgpost->imgorg, 42)?>
                                                                            </a>
                                                                        </li>
                                                                        <div class="modal fade" id="previewAttch<?= $imgpost->id?>" tabindex="-1" aria-labelledby="previewAttach" aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h1 class="modal-title fs-5" id="previewAttach">Preview Attachment</h1>
                                                                                        <button type="button" class="modal-close-ciak" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                                                    </div>
                                                                                    <div class="modal-body d-flex justify-content-center">
                                                                                        <?php if ($imgpost->media_extension == "pdf"){?>
                                                                                                <embed frameBorder="0" scrolling="auto" height="500" width="100%" src="<?= $imgpost->imgorg?>#toolbar=0" type="application/pdf">
                                                                                        <?php } else if ($imgpost->media_extension == "audio") {?>
                                                                                                <audio style="width: 80%;" controls controlsList="nodownload">>
                                                                                                    <source src="<?= $imgpost->imgorg?>" type="audio/mpeg">
                                                                                                    Your browser does not support the audio.
                                                                                                </audio>
                                                                                        <?php } else if($imgpost->media_extension == "video"){?>
                                                                                                <video width="100%" height="375" loop poster="" controls controlsList="nodownload" class="d-block mx-auto videoplayer-post"> 
                                                                                                    <source src="<?=@$imgpost->imgorg?>" type="video/mp4">
                                                                                                </video>   
                                                                                        <?php } else if($imgpost->media_extension == "image"){?>
                                                                                                <div class="wrapper-attch-img">
                                                                                                    <img class="attch-img" src="<?= $imgpost->imgorg?>" alt="img">
                                                                                                </div>
                                                                                        <?php } else {?>
                                                                                                <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=<?= $imgpost->imgorg?>' width='100%' height='500' frameborder='0'></iframe>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                <?php 
                                                                            }
                                                                        }
                                                                    }
                                                                ?>
                                                            </article>
                                                            <div class="owl-carousel owl-posts owl-theme" >
                                                                <?php 
                                                                    if (!empty($dt->post_media)){
                                                                        foreach ($dt->post_media as $imgpost){
                                                                            if ($imgpost->media_type=='non attach'){
                                                                ?>
                                                                <div class="item">
                                                                    <div class="img">
                                                                        <img src="<?=$imgpost->imgblur?>" alt="image" class="image-post rounded">
                                                                    </div>
                                                                </div>
                                                                    <?php 
                                                                            }
                                                                        }
                                                                    }
                                                                ?>
                                                            </div>
                                                            <article class="article">
                                                                <?php echo @base64_decode($dt->article)?>
                                                            </article>

                                                <?php } elseif ($dt->is_subscribe=='yes' || $dt->id_member==$_SESSION["user_id"]){?>
                                                            <h1 class="<?php echo (empty($dt->title_article) ? 'd-none' : 'd-block')?>">
                                                                <?= @$dt->title_article?>
                                                            </h1>
                                                            <article class="article">
                                                                <?php 
                                                                    if (!empty($dt->post_media)){
                                                                        foreach ($dt->post_media as $imgpost){
                                                                            if ($imgpost->media_type=='attach'){
                                                                ?>
                                                                        <li class="post-list-attach">
                                                                            <a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#previewAttch<?= $imgpost->id?>" class="attachment article <?php echo ($dt->content_type == 'explicit') ? 'attachment-explicit' : ''?>" > 
                                                                                <?= substr($imgpost->imgorg, 42)?>
                                                                            </a>
                                                                        </li>
                                                                        <div class="modal fade" id="previewAttch<?= $imgpost->id?>" tabindex="-1" aria-labelledby="previewAttach" aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h1 class="modal-title fs-5" id="previewAttach">Preview Attachment</h1>
                                                                                        <button type="button" class="modal-close-ciak" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                                                    </div>
                                                                                    <div class="modal-body d-flex justify-content-center">
                                                                                        <?php if ($imgpost->media_extension == "pdf"){?>
                                                                                                <embed frameBorder="0" scrolling="auto" height="500" width="100%" src="<?= $imgpost->imgorg?>#toolbar=0" type="application/pdf">
                                                                                        <?php } else if ($imgpost->media_extension == "audio") {?>
                                                                                                <audio style="width: 80%;" controls controlsList="nodownload">>
                                                                                                    <source src="<?= $imgpost->imgorg?>" type="audio/mpeg">
                                                                                                    Your browser does not support the audio.
                                                                                                </audio>
                                                                                        <?php } else if($imgpost->media_extension == "video"){?>
                                                                                                <video width="100%" height="375" loop poster="" controls controlsList="nodownload" class="d-block mx-auto videoplayer-post"> 
                                                                                                    <source src="<?=@$imgpost->imgorg?>" type="video/mp4">
                                                                                                </video>   
                                                                                        <?php } else if($imgpost->media_extension == "image"){?>
                                                                                                <div class="wrapper-attch-img">
                                                                                                    <img class="attch-img" src="<?= $imgpost->imgorg?>" alt="img">
                                                                                                </div>
                                                                                        <?php } else {?>
                                                                                                <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=<?= $imgpost->imgorg?>' width='100%' height='500' frameborder='0'></iframe>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                <?php 
                                                                            }
                                                                        }
                                                                    }
                                                                ?>
                                                            </article>
                                                            <div class="owl-carousel owl-posts owl-theme" >
                                                                <?php 
                                                                    if (!empty($dt->post_media)){
                                                                        foreach ($dt->post_media as $imgpost){
                                                                            if ($imgpost->media_type=='non attach'){
                                                                ?>
                                                                <div class="item">
                                                                    <div class="img">
                                                                        <?php if (substr($imgpost->imgorg,-3)=="mp4"){?>
                                                                            <div class="vid-post">
                                                                                <video width="100%" height="375" loop poster="" controls controlsList="nodownload" class="d-block mx-auto videoplayer-post"> 
                                                                                    <source src="<?=$imgpost->imgorg?>" type="video/mp4">
                                                                                </video>                                               
                                                                            </div>
                                                                        <?php }else{?>
                                                                            <img src="<?=$imgpost->imgorg?>" alt="image" class="image-post rounded">
                                                                        <?php }?>
                                                                    </div>
                                                                </div>
                                                                    <?php 
                                                                            }
                                                                        }
                                                                    }
                                                                ?>
                                                            </div>
                                                            <article class="article">
                                                                <?php echo @base64_decode($dt->article)?>
                                                            </article>
                                                <?php   
                                                        }
                                                    }elseif ($dt->type=="special"){ 
                                                            if ($dt->is_special=='yes' || $dt->id_member==$_SESSION["user_id"]){
                                                    ?>
                                                                <h1 class="<?php echo (empty($dt->title_article) ? 'd-none' : 'd-block')?>">
                                                                    <?= @$dt->title_article?>
                                                                </h1>
                                                            
                                                                <div class="owl-carousel owl-posts owl-theme" >
                                                                    <?php 
                                                                        if (!empty($dt->post_media)){
                                                                            foreach ($dt->post_media as $imgpost){
                                                                                if(substr($imgpost->imgorg, -22) != 'defaultspeciallock.jpg'){
                                                                                    if ($imgpost->media_type=='non attach'){
                                                                    ?>
                                                                        <div class="item">
                                                                            <div class="img">
                                                                                <?php if (substr($imgpost->imgorg,-3)=="mp4"){?>
                                                                                    <div class="vid-post">
                                                                                        <video width="100%" height="375" loop poster="" controls controlsList="nodownload" class="d-block mx-auto videoplayer-post"> 
                                                                                            <source src="<?=$imgpost->imgorg?>" type="video/mp4">
                                                                                        </video>                                               
                                                                                    </div>
                                                                                <?php }else{?>
                                                                                    <img src="<?=$imgpost->imgorg?>" alt="image" class="image-post rounded">
                                                                                <?php }?>
                                                                            </div>
                                                                        </div>
                                                                    <?php 
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <article class="article">
                                                                    <?php echo @base64_decode($dt->article)?>
                                                                </article>
                                                        <?php 
                                                            }else{
                                                        ?>  
                                                        
                                                                <div class="item">
                                                                    <div class="img">
                                                                        <img src="https://api.sandbox.ciak.live/users/blur/defaultspeciallock.jpg" alt="image" class="image-post rounded">
                                                                    </div>
                                                                </div>
                                                                
                                                
                                                <?php
                                                            }
                                                    }elseif ($dt->type=="download"){ 
                                                        if ($dt->is_download=='yes' || $dt->id_member==$_SESSION["user_id"]){
                                                ?>
                                                            <h1 class="<?php echo (empty($dt->title_article) ? 'd-none' : 'd-block')?>">
                                                                <?= @$dt->title_article?>
                                                            </h1>
                                                            <article class="article">
                                                                <?php 
                                                                    if (!empty($dt->post_media)){
                                                                        foreach ($dt->post_media as $imgpost){
                                                                            if ($imgpost->media_type=='attach'){
                                                                ?>
                                                                        <li class="post-list-attach">
                                                                            <a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#previewAttch<?= $imgpost->id?>" class="attachment article <?php echo ($dt->content_type == 'explicit') ? 'attachment-explicit' : ''?>" > 
                                                                                <?= substr($imgpost->imgorg, 42)?>
                                                                            </a>
                                                                        </li>
                                                                        <div class="modal fade" id="previewAttch<?= $imgpost->id?>" tabindex="-1" aria-labelledby="previewAttach" aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h1 class="modal-title fs-5" id="previewAttach">Preview Attachment</h1>
                                                                                        <button type="button" class="modal-close-ciak" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                                                    </div>
                                                                                    <div class="modal-body d-flex justify-content-center">
                                                                                        <?php if ($imgpost->media_extension == "pdf"){?>
                                                                                                <embed frameBorder="0" scrolling="auto" height="500" width="100%" src="<?= $imgpost->imgorg?>#toolbar=0" type="application/pdf">
                                                                                        <?php } else if ($imgpost->media_extension == "audio") {?>
                                                                                                <audio style="width: 80%;" controls controlsList="nodownload">>
                                                                                                    <source src="<?= $imgpost->imgorg?>" type="audio/mpeg">
                                                                                                    Your browser does not support the audio.
                                                                                                </audio>
                                                                                        <?php } else if($imgpost->media_extension == "video"){?>
                                                                                                <video width="100%" height="375" loop poster="" controls controlsList="nodownload" class="d-block mx-auto videoplayer-post"> 
                                                                                                    <source src="<?=@$imgpost->imgorg?>" type="video/mp4">
                                                                                                </video>   
                                                                                        <?php } else if($imgpost->media_extension == "image"){?>
                                                                                                <div class="wrapper-attch-img">
                                                                                                    <img class="attch-img" src="<?= $imgpost->imgorg?>" alt="img">
                                                                                                </div>
                                                                                        <?php } else {?>
                                                                                                <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=<?= $imgpost->imgorg?>' width='100%' height='500' frameborder='0'></iframe>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                    <div class="modal-footer justify-content-center">
                                                                                        <button type="button" class="btn btn-main-green" onclick="window.location.href='<?php echo $imgpost->imgorg ?>'">Download</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                <?php 
                                                                            }
                                                                        }
                                                                    }
                                                                ?>
                                                            </article>
                                                            <div class="owl-carousel owl-posts owl-theme" >
                                                                <?php 
                                                                    if (!empty($dt->post_media)){
                                                                        foreach ($dt->post_media as $imgpost){
                                                                            if ($imgpost->media_type=='non attach'){
                                                                ?>
                                                                <div class="item">
                                                                    <div class="img">
                                                                        <?php if (substr($imgpost->imgorg,-3)=="mp4"){?>
                                                                            <div class="vid-post">
                                                                                <video width="100%" height="375" loop poster="" controls controlsList="nodownload" class="d-block mx-auto videoplayer-post"> 
                                                                                    <source src="<?=$imgpost->imgorg?>" type="video/mp4">
                                                                                </video>                                               
                                                                            </div>
                                                                        <?php }else{?>
                                                                            <img src="<?=$imgpost->imgorg?>" alt="image" class="image-post rounded">
                                                                        <?php }?>
                                                                    </div>
                                                                </div>
                                                                    <?php 
                                                                            }
                                                                        }
                                                                    }
                                                                ?>
                                                            </div>
                                                            <article class="article">
                                                                <?php echo @base64_decode($dt->article)?>
                                                            </article>
                                                <?php 
                                                        }else{
                                                ?>
                                                            <h1 class="<?php echo (empty($dt->title_article) ? 'd-none' : 'd-block')?>">
                                                                <?= @$dt->title_article?>
                                                            </h1>
                                                            <article class="article">
                                                                <?php 
                                                                    if (!empty($dt->post_media)){
                                                                        foreach ($dt->post_media as $imgpost){
                                                                            if ($imgpost->media_type=='attach'){
                                                                ?>
                                                                        <li class="post-list-attach">
                                                                            <a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#previewAttch<?= $imgpost->id?>" class="attachment article <?php echo ($dt->content_type == 'explicit') ? 'attachment-explicit' : ''?>" > 
                                                                                <?= substr($imgpost->imgorg, 42)?>
                                                                            </a>
                                                                        </li>
                                                                        <div class="modal fade" id="previewAttch<?= $imgpost->id?>" tabindex="-1" aria-labelledby="previewAttach" aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h1 class="modal-title fs-5" id="previewAttach">Preview Attachment</h1>
                                                                                        <button type="button" class="modal-close-ciak" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                                                    </div>
                                                                                    <div class="modal-body d-flex justify-content-center">
                                                                                        <?php if ($imgpost->media_extension == "pdf"){?>
                                                                                                <embed frameBorder="0" scrolling="auto" height="500" width="100%" src="<?= $imgpost->imgorg?>#toolbar=0" type="application/pdf">
                                                                                        <?php } else if ($imgpost->media_extension == "audio") {?>
                                                                                                <audio style="width: 80%;" controls controlsList="nodownload">>
                                                                                                    <source src="<?= $imgpost->imgorg?>" type="audio/mpeg">
                                                                                                    Your browser does not support the audio.
                                                                                                </audio>
                                                                                        <?php } else if($imgpost->media_extension == "video"){?>
                                                                                                <video width="100%" height="375" loop poster="" controls controlsList="nodownload" class="d-block mx-auto videoplayer-post"> 
                                                                                                    <source src="<?=@$imgpost->imgorg?>" type="video/mp4">
                                                                                                </video>   
                                                                                        <?php } else if($imgpost->media_extension == "image"){?>
                                                                                                <div class="wrapper-attch-img">
                                                                                                    <img class="attch-img" src="<?= $imgpost->imgorg?>" alt="img">
                                                                                                </div>
                                                                                        <?php } else {?>
                                                                                                <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=<?= $imgpost->imgorg?>' width='100%' height='500' frameborder='0'></iframe>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                    <div class="modal-footer justify-content-center">
                                                                                        <button type="button" class="btn btn-main-green" onclick="window.location.href='<?php echo $imgpost->imgorg ?>'">Download</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                <?php 
                                                                            }
                                                                        }
                                                                    }
                                                                ?>
                                                            </article>
                                                            <div class="owl-carousel owl-posts owl-theme" >
                                                                <?php 
                                                                    if (!empty($dt->post_media)){
                                                                        foreach ($dt->post_media as $imgpost){
                                                                            if ($imgpost->media_type=='non attach'){
                                                                ?>
                                                                <div class="item">
                                                                    <div class="img">
                                                                        <img src="<?=$imgpost->imgblur?>" alt="image" class="image-post rounded">
                                                                    </div>
                                                                </div>
                                                                    <?php 
                                                                            }
                                                                        }
                                                                    }
                                                                ?>
                                                            </div>
                                                            <article class="article">
                                                                <?php echo @base64_decode($dt->article)?>
                                                            </article>
                                                <?php }
                                                    }elseif ($dt->type=="vs"){ ?>
                                                        <article class="article">
                                                            <?php echo @base64_decode($dt->article)?>
                                                            <?php 
                                                                if (!empty($posts->post_media)){
                                                                    foreach ($posts->post_media as $imgpost){
                                                                        if($imgpost->media_type=='attach'){
                                                            ?>
                                                                <button class="d-block attachment <?php echo ($posts->content_type == 'explicit') ? 'attachment-explicit' : ''?>" onclick="window.location.href='<?php echo $imgpost->imgorg ?>'"><?= substr($imgpost->imgorg, 42)?></button>
                                                            <?php 
                                                                        }
                                                                    }
                                                                }
                                                            ?>
                                                        </article>
                                                <?php 
                                                    } ?>
                                            </div>
                                        </div>
                                
                                        <div class="post-footer">
                                            <?php if($_SESSION['ucode'] == $dt->ucode) {?>
                                                <div class="like myself">
                                                    <button class="myself <?=(@$dt->is_like=='yes')?"checked":""?>" id="postlike<?=$dt->id?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-regular fa-heart"></i></button>
                                                    <span><?=$dt->like_count?></span>
                                                </div>
                                            <?php } else {?>
                                                <div class="like">
                                                    <button class="heart <?=(@$dt->is_like=='yes')?"checked":""?>" id="postlike<?=$dt->id?>" onclick="actionLike('<?=$dt->id?>')" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-regular fa-heart"></i></button>
                                                    <span class="count-like<?=$dt->id?>"><?=$dt->like_count?></span>
                                                </div>
                                            <?php } ?>
                                            
                                            <?php if($_SESSION['ucode'] == $dt->ucode) {?>
                                                <div class="rate-start mx-auto" style="padding-left: 50px;">
                                                    <button onclick="actionStar('<?=$dt->id?>', '1')" name="poststar<?=$dt->id?>" class="myself s-1 <?=($dt->rate_post==1 ||$dt->rate_post==2||$dt->rate_post==3||$dt->rate_post==4||$dt->rate_post==5) ? "checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                    <button onclick="actionStar('<?=$dt->id?>', '2')" name="poststar<?=$dt->id?>" class="myself s-2 <?=($dt->rate_post==2||$dt->rate_post==3||$dt->rate_post==4||$dt->rate_post==5)?"checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                    <button onclick="actionStar('<?=$dt->id?>', '3')" name="poststar<?=$dt->id?>" class="myself s-3 <?=($dt->rate_post==3||$dt->rate_post==4||$dt->rate_post==5)?"checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                    <button onclick="actionStar('<?=$dt->id?>', '4')" name="poststar<?=$dt->id?>" class="myself s-4 <?=($dt->rate_post==4||$dt->rate_post==5)?"checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                    <button onclick="actionStar('<?=$dt->id?>', '5')" name="poststar<?=$dt->id?>" class="myself s-5 <?=($dt->rate_post==5)?"checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                </div>
                                                <?php } else { 
                                                    @$to_rate_time   = strtotime(date("Y-m-d H:i:s"));
                                                    @$from_rate_time = strtotime($dt->rate_time);
                                                    @$selisih_rate   = round(abs($to_rate_time - $from_rate_time) / 60);
                                                ?>
                                                        <div class="mx-auto d-flex flex-column justify-content-center align-items-center" style="padding-left: 50px;">
                                                            <div class="poststar<?=$dt->id?> rate-start <?=$dt->id?> post mx-auto <?php echo ((empty($dt->rate_time)) ? '' : ((@$selisih_rate>15) ? 'pe-none' : ''))?>">
                                                                <button onclick="actionStar('<?=$dt->id?>', '1')" name="poststar<?=$dt->id?>" class="star s-1 <?=($dt->rate_post==1 ||$dt->rate_post==2||$dt->rate_post==3||$dt->rate_post==4||$dt->rate_post==5) ? "checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                                <button onclick="actionStar('<?=$dt->id?>', '2')" name="poststar<?=$dt->id?>" class="star s-2 <?=($dt->rate_post==2||$dt->rate_post==3||$dt->rate_post==4||$dt->rate_post==5)?"checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                                <button onclick="actionStar('<?=$dt->id?>', '3')" name="poststar<?=$dt->id?>" class="star s-3 <?=($dt->rate_post==3||$dt->rate_post==4||$dt->rate_post==5)?"checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                                <button onclick="actionStar('<?=$dt->id?>', '4')" name="poststar<?=$dt->id?>" class="star s-4 <?=($dt->rate_post==4||$dt->rate_post==5)?"checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                                <button onclick="actionStar('<?=$dt->id?>', '5')" name="poststar<?=$dt->id?>" class="star s-5 <?=($dt->rate_post==5)?"checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                            </div>
                                                            <span id="clearrate_<?=$dt->id?>" class="text-success d-flex justify-content-center" style="cursor: pointer;">
                                                                <?php if ($selisih_rate<15){?>
                                                                    <a id="clearpost_<?=$dt->id?>" onclick="actionStar('<?=$dt->id?>','0')">clear</a>
                                                                <?php }?>
                                                            </span>
                                                        </div>
                                                <?php } 
                                            
                                            ?>
                                            <div class="action">
                                                <a href="#" class="icon svg share" data-bs-toggle="offcanvas" data-bs-target="#shareSosmed" aria-controls="offcanvasBottom" onclick="actionShare('<?=$dt->id?>')">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.4425 10.1325L11.565 13.1175M11.5575 4.8825L6.4425 7.8675M15.75 3.75C15.75 4.99264 14.7426 6 13.5 6C12.2574 6 11.25 4.99264 11.25 3.75C11.25 2.50736 12.2574 1.5 13.5 1.5C14.7426 1.5 15.75 2.50736 15.75 3.75ZM6.75 9C6.75 10.2426 5.74264 11.25 4.5 11.25C3.25736 11.25 2.25 10.2426 2.25 9C2.25 7.75736 3.25736 6.75 4.5 6.75C5.74264 6.75 6.75 7.75736 6.75 9ZM15.75 14.25C15.75 15.4926 14.7426 16.5 13.5 16.5C12.2574 16.5 11.25 15.4926 11.25 14.25C11.25 13.0074 12.2574 12 13.5 12C14.7426 12 15.75 13.0074 15.75 14.25Z" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                                <a href="#" class="icon svg vs" title="stitch">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_349_895)">
                                                            <path d="M10.9998 4.07005V2.05005C8.9898 2.25005 7.1598 3.05005 5.6798 4.26005L7.0998 5.69005C8.20981 4.83005 9.5398 4.25005 10.9998 4.07005ZM5.6898 7.10005L4.2598 5.68005C3.0498 7.16005 2.2498 8.99005 2.0498 11H4.0698C4.2498 9.54005 4.8298 8.21005 5.6898 7.10005ZM4.0698 13H2.0498C2.2498 15.01 3.0498 16.84 4.2598 18.32L5.6898 16.89C4.8298 15.79 4.2498 14.46 4.0698 13ZM5.6798 19.74C7.1598 20.9501 8.9998 21.75 10.9998 21.9501V19.93C9.5398 19.75 8.20981 19.17 7.0998 18.31L5.6798 19.74ZM21.9998 12C21.9998 17.16 18.0798 21.42 13.0498 21.9501V19.93C16.9698 19.41 19.9998 16.05 19.9998 12C19.9998 7.95005 16.9698 4.59005 13.0498 4.07005V2.05005C18.0798 2.58005 21.9998 6.84005 21.9998 12Z" fill="" />
                                                            <path d="M11.96 9.02L9.4 16H7.7L5.14 9.02H6.64L8.56 14.57L10.47 9.02H11.96ZM15.2094 16.07C14.7227 16.07 14.2827 15.9867 13.8894 15.82C13.5027 15.6533 13.196 15.4133 12.9694 15.1C12.7427 14.7867 12.626 14.4167 12.6194 13.99H14.1194C14.1394 14.2767 14.2394 14.5033 14.4194 14.67C14.606 14.8367 14.8594 14.92 15.1794 14.92C15.506 14.92 15.7627 14.8433 15.9494 14.69C16.136 14.53 16.2294 14.3233 16.2294 14.07C16.2294 13.8633 16.166 13.6933 16.0394 13.56C15.9127 13.4267 15.7527 13.3233 15.5594 13.25C15.3727 13.17 15.1127 13.0833 14.7794 12.99C14.326 12.8567 13.956 12.7267 13.6694 12.6C13.3894 12.4667 13.146 12.27 12.9394 12.01C12.7394 11.7433 12.6394 11.39 12.6394 10.95C12.6394 10.5367 12.7427 10.1767 12.9494 9.87C13.156 9.56333 13.446 9.33 13.8194 9.17C14.1927 9.00333 14.6194 8.92 15.0994 8.92C15.8194 8.92 16.4027 9.09667 16.8494 9.45C17.3027 9.79667 17.5527 10.2833 17.5994 10.91H16.0594C16.046 10.67 15.9427 10.4733 15.7494 10.32C15.5627 10.16 15.3127 10.08 14.9994 10.08C14.726 10.08 14.506 10.15 14.3394 10.29C14.1794 10.43 14.0994 10.6333 14.0994 10.9C14.0994 11.0867 14.1594 11.2433 14.2794 11.37C14.406 11.49 14.5594 11.59 14.7394 11.67C14.926 11.7433 15.186 11.83 15.5194 11.93C15.9727 12.0633 16.3427 12.1967 16.6294 12.33C16.916 12.4633 17.1627 12.6633 17.3694 12.93C17.576 13.1967 17.6794 13.5467 17.6794 13.98C17.6794 14.3533 17.5827 14.7 17.3894 15.02C17.196 15.34 16.9127 15.5967 16.5394 15.79C16.166 15.9767 15.7227 16.07 15.2094 16.07Z" fill="" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_349_895">
                                                                <rect width="24" height="24" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                
                                                </a>
                                                <?php if($_SESSION['ucode'] == $dt->ucode) {?>
                                                    <div class="like">
                                                        <button class="icon myselfbookmark <?=(@$dt->is_bookmark=='yes')?"checked":""?>" id="postbookmark<?=$dt->id?>" onclick="actionBookmark('<?=$dt->id?>')" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-regular fa-bookmark"></i></button>
                                                    </div>
                                                <?php } else {?>
                                                    <div class="like">
                                                        <button class="icon bookmark <?=(@$dt->is_bookmark=='yes')?"checked":""?> <?php echo ($dt->content_type == 'explicit') ? 'bookmark-explicit' : 'bookmark-nonexplicit'?>" id="postbookmark<?=$dt->id?>" onclick="actionBookmark('<?=$dt->id?>')" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-regular fa-bookmark"></i></button>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                $('.owl-posts').owlCarousel({
                                    loop: false,
                                    margin: 10,
                                    dots: true,
                                    responsive:{
                                        0:{
                                            items:1
                                        },
                                        600:{
                                            items:1
                                        },
                                        1000:{
                                            items:1
                                        },
                                        1200:{
                                            items:1
                                        }
                                    }
                                });

                                $(function() {
                                    $('.article').readmore({
                                        speed: 75, 
                                        collapsedHeight: 50, 
                                        moreLink: '<a class="ac" href="#">Read more</a>', 
                                    });
                                    $(document).on( 'shown.bs.tab', 'a[data-bs-toggle=\'tab\']', function (e) {
                                        $('.article').readmore({
                                            speed: 75, 
                                            collapsedHeight: 50, 
                                            moreLink: '<a class="ac" href="#">Read more</a>', 
                                        });
                                    })
                                });
                            </script>

                    <?php   
                                    }
                                }        
                            }
                        }
                    ?>

