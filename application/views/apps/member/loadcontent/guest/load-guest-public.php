<?php
    foreach ($guestpost as $dt){
        if(($dt->content_type == 'explicit' && @$_COOKIE['content'] === 'yes') || $dt->content_type == 'non explicit') {
            // CONDITION LIVE PURPOSE
            if(
                ($dt->purpose == null || $dt->purpose == 'public') ||
                ($dt->id_member == $_SESSION["user_id"]) ||
                ($dt->purpose == 'follower' && $dt->is_follow == 'yes') || 
                ($dt->purpose == 'subscriber' && $dt->is_subscribe == 'yes')
            ) {
                if ($dt->type=="public"){
?>
        <div class="apps-member">
            <div class="posts-member">
                <div class="post-member px-4">
                    <div class="post-header mb-3 d-flex flex-row align-items-center">
                        <div class="post-profile d-flex flex-row align-items-center me-auto">
                            <img src="<?=@$dt->profile?>" alt="picture" class="picture rounded-circle">
                            <div class="d-flex flex-column p-2">
                                <span class="name mb-1 text-start"><?=$dt->username?></span>
                                <span class="time text-start">
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
                        </div>
                        <?php if (!isset($mn_search)) { ?>
                            <div class="action d-flex flex-row align-items-center">
                                <?php 
                                    if ($dt->type=='special'){
                                        if($dt->id_member!=$_SESSION["user_id"]){
                                ?>
                                    <a href="" class="icon color-bp rounded-circle <?php echo ($dt->content_type == 'explicit') ? 'chart-explicit' : 'chart-nonexplicit'?>" data-bs-toggle="offcanvas" data-bs-target="#basketShopping<?= $dt->id?>" aria-controls="offcanvasBottom"><i class="fa-solid fa-basket-shopping"></i></a>
                                <?php } }
                                    if ($dt->id_member!=$_SESSION["user_id"]){
                                ?>
                                    <a href="" id="sendTipClick" class="icon color-bp dollar rounded-circle <?php echo ($dt->content_type == 'explicit') ? 'dollar-explicit' : 'dollar-non'?>" data-bs-toggle="offcanvas" data-bs-target="#sendTip<?= $dt->id?>" aria-controls="offcanvasBottom">
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

                        <!-- SEND TIPS -->
                        <div class="offcanvas offcanvas-bottom popup-bottom rounded-top" tabindex="-1" id="sendTip<?= $dt->id?>"
                            aria-labelledby="offcanvasBottomLabel">
                            <div class="offcanvas-header">
                                <button type="button" class="ms-auto btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body small text-center pb-5">
                                <h5 class="offcanvas-title <?php echo ($dt->content_type == 'explicit') ? 'text-danger' : 'text-success'?> mx-auto" id="offcanvasBottomLabel">Send tip?</h5>
                                <form action="frmsendtips" class="d-flex flex-column">
                                    <input type="hidden" name="id_membertips">
                                    <div class="mt-2 mb-3">
                                        <div class="rounded-pill bg-input <?php echo ($dt->content_type == 'explicit') ? 'tip-explicit' : 'tip-nonexplicit'?>">
                                            <input type="text" name="tipsamount" id="tipsamount" placeholder="$0.00" value="0.5" class="rounded-pill">
                                        </div>
                                    </div>
                                    <div class="">
                                        <button type="button" id="btnsendtips" class="btn <?php echo ($dt->content_type == 'explicit') ? 'btn-orange' : 'btn-main-green'?> rounded-pill px-4">Confirm</button>
                                    </div>
                                </form>
                            </div>
                        </div>

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
                        <div class="text text-start">
                            <article class="article">
                                <?php echo @base64_decode($dt->article)?>
                                <?php 
                                    if (!empty($dt->post_media)){
                                        foreach ($dt->post_media as $imgpost){
                                            if($imgpost->media_type=='attach'){
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
                                            if($imgpost->media_type=='non attach'){
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
                        </div>
                    </div>
            
                    <div class="post-footer">
                        <div class="like">
                            <button class="heart <?=(@$dt->is_like=='yes')?"checked":""?>" id="postlike<?=$dt->id?>" onclick="actionLike('<?=$dt->id?>')" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-regular fa-heart"></i></button>
                            <span><?=$dt->like_count?></span>
                        </div>
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
                        <?php } ?>
                        <div class="action">
                            <a href="#" class="icon svg share" data-bs-toggle="offcanvas" data-bs-target="#shareSosmed" aria-controls="offcanvasBottom"  onclick="actionShare('<?=$dt->id?>')">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.4425 10.1325L11.565 13.1175M11.5575 4.8825L6.4425 7.8675M15.75 3.75C15.75 4.99264 14.7426 6 13.5 6C12.2574 6 11.25 4.99264 11.25 3.75C11.25 2.50736 12.2574 1.5 13.5 1.5C14.7426 1.5 15.75 2.50736 15.75 3.75ZM6.75 9C6.75 10.2426 5.74264 11.25 4.5 11.25C3.25736 11.25 2.25 10.2426 2.25 9C2.25 7.75736 3.25736 6.75 4.5 6.75C5.74264 6.75 6.75 7.75736 6.75 9ZM15.75 14.25C15.75 15.4926 14.7426 16.5 13.5 16.5C12.2574 16.5 11.25 15.4926 11.25 14.25C11.25 13.0074 12.2574 12 13.5 12C14.7426 12 15.75 13.0074 15.75 14.25Z" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                            <button class="icon bookmark <?=(@$dt->is_bookmark=='yes')?"checked":""?> <?php echo ($dt->content_type == 'explicit') ? 'bookmark-explicit' : 'bookmark-nonexplicit'?>" id="postbookmark<?=$dt->id?>" onclick="actionBookmark('<?=$dt->id?>')" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-regular fa-bookmark"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php 
                }
            } 
        }
    }
?>

<script>
    $(function() {  
            $('.article').readmore({
                speed: 75, 
                collapsedHeight: 95, 
                moreLink: `<a class="ac" href="#">Read more</a>`, 
                lessLink: `<a class="ac" href="#">Close</a>`, 
            }); 
        $(document).on( 'shown.bs.tab', 'a[data-bs-toggle=\'tab\']', function (e) {
            $('.article').readmore({
                speed: 75, 
                collapsedHeight: 75, 
                moreLink: `<a class="ac" href="#">Read more</a>`, 
                lessLink: `<a class="ac" href="#">Close</a>`, 
            });
        })
    });
</script>