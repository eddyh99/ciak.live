<div class="apps-body">
    <div class="row">
        <div class="apps-member col-12 col-lg-5 mx-auto">
            <div class="banner-profile w-100">
                <img src="<?=$profile->header?>" alt="" class="banner-images">
            </div>
            
            <div class="profile mb-4">
                <div class="d-flex flex-row position-relative user">
                    <div class="d-flex align-items-center">
                        <a class="icon-profile shareit me-auto ms-2" style="cursor:pointer" onclick="setClipboard('<?=base_url()?>profile/user/<?=$_SESSION["ucode"]?>')">
                            <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.59 12.51L13.42 16.49M13.41 5.51L6.59 9.49M19 4C19 5.65685 17.6569 7 16 7C14.3431 7 13 5.65685 13 4C13 2.34315 14.3431 1 16 1C17.6569 1 19 2.34315 19 4ZM7 11C7 12.6569 5.65685 14 4 14C2.34315 14 1 12.6569 1 11C1 9.34315 2.34315 8 4 8C5.65685 8 7 9.34315 7 11ZM19 18C19 19.6569 17.6569 21 16 21C14.3431 21 13 19.6569 13 18C13 16.3431 14.3431 15 16 15C17.6569 15 19 16.3431 19 18Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <a class="link pt-2 px-3" style="z-index: 999;">
                            <span class="mode-toggle">
                                <span class="switch"></span>
                            </span>
                        </a>
                    </div>
                    <div class="img-profile">
                        <div class="img rounded-circle">
                            <img src="<?=@$profile->profile ?>" class="rounded-circle">
                        </div>
                    </div>
    
                    <a href="" class="icon-profile stats ms-auto me-2 me-md-3 me-lg-2 me-xl-3">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M26 1.44444V5.77778H0V1.44444C0 1.06135 0.152182 0.693954 0.423068 0.423068C0.693954 0.152182 1.06135 0 1.44444 0H24.5556C24.9386 0 25.306 0.152182 25.5769 0.423068C25.8478 0.693954 26 1.06135 26 1.44444ZM0 8.66667H26V24.5556C26 24.9386 25.8478 25.306 25.5769 25.5769C25.306 25.8478 24.9386 26 24.5556 26H1.44444C1.2113 25.9953 0.982976 25.9328 0.78 25.818L5.96122 20.6368L9.30944 22.8684C9.58732 23.0537 9.92081 23.137 10.2532 23.1041C10.5855 23.0712 10.8962 22.9241 11.1323 22.6879L14.0212 19.799C14.2843 19.5266 14.4299 19.1617 14.4266 18.783C14.4233 18.4042 14.2714 18.042 14.0036 17.7742C13.7358 17.5063 13.3735 17.3544 12.9948 17.3511C12.6161 17.3478 12.2512 17.4934 11.9788 17.7566L9.92767 19.8077L6.57944 17.576C6.30157 17.3907 5.96808 17.3074 5.63572 17.3404C5.30336 17.3733 4.99268 17.5204 4.75656 17.7566L0 22.5131V8.66667ZM16.3121 15.4657C16.583 15.7365 16.9503 15.8886 17.3333 15.8886C17.7163 15.8886 18.0837 15.7365 18.3546 15.4657L19.799 14.0212C20.0621 13.7488 20.2077 13.3839 20.2044 13.0052C20.2011 12.6265 20.0492 12.2642 19.7814 11.9964C19.5136 11.7286 19.1513 11.5767 18.7726 11.5734C18.3939 11.5701 18.029 11.7157 17.7566 11.9788L16.3121 13.4232C16.0413 13.6941 15.8892 14.0614 15.8892 14.4444C15.8892 14.8275 16.0413 15.1948 16.3121 15.4657Z" fill="white" />
                        </svg>
                    </a>
    
                    <a href="<?= base_url() ?>auth/logout" id="logout" class="icon-profile logout me-2 me-md-3 me-lg-2 me-xl-3">
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.6667 15.7083L19.875 10.5M19.875 10.5L14.6667 5.29166M19.875 10.5H7.375M10.5 15.7083C10.5 16.0162 10.5 16.1702 10.4886 16.3035C10.3696 17.6895 9.34881 18.83 7.98441 19.1013C7.85315 19.1274 7.70002 19.1444 7.39412 19.1784L6.33015 19.2966C4.73175 19.4742 3.93251 19.563 3.29757 19.3599C2.45097 19.0889 1.75981 18.4703 1.39706 17.6588C1.125 17.0502 1.125 16.2461 1.125 14.6378V6.36218C1.125 4.75391 1.125 3.94978 1.39706 3.34116C1.75981 2.52966 2.45097 1.91104 3.29757 1.64013C3.93251 1.43694 4.73172 1.52574 6.33015 1.70334L7.39411 1.82156C7.70013 1.85556 7.85313 1.87256 7.98441 1.89867C9.34881 2.16995 10.3696 3.31045 10.4886 4.69646C10.5 4.82982 10.5 4.98377 10.5 5.29166" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <div class="pt-3 position-relative icon-posting">
                        <a class="position-relative me-2 me-md-3 me-lg-2 me-xl-3 pt-1 d-block" id="toggle-iconpost" data-bs-toggle="offcanvas" href="#additionalProfile" role="button" aria-controls="additionalProfile">
                            <i class="fas fa-ellipsis-v fs-3"></i>
                        </a>
                        <div class="offcanvas offcanvas-end profile" tabindex="-1" id="additionalProfile" aria-labelledby="additinalProfileLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title profile" id="additinalProfileLabel"></h5>
                                <button type="button" class="btn-close text-white fs-4" data-bs-dismiss="offcanvas" aria-label="Close">
                                    X
                                </button>
                            </div>
                            <div class="offcanvas-body">
                                <div class="rowcanvas-profile">
                                    <a class="content-canvas" href="">Live Lists</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-profile text-center">
                <div class="rate-star">
                    <div class="my-rating" data-rating="<?=round($profile->avgrate,2)?>"></div>
                </div>
                <div class="mt-3 d-flex align-items-cente justify-content-center">
                    <span class="span-text-toogle-explicit">Explicit contents</span>
                     <a class="link px-3" style="z-index: 999;">
                        <span class="mode-toggle-content">
                            <span class="switch-content"></span>
                        </span>
                    </a>
                </div>
                <div class="name">
                    <h3 class="mt-2 mb-1">@<?= ucfirst($profile->username)?></h3>
                    <!-- <h3 class="mt-2 mb-1"><?= @ucfirst($profile->firstname)?> <?= @ucfirst($profile->surename)?></h3> -->
                    <?php if (@$profile->is_kontakshare=='yes'){?>
                        <span class="location mb-2"><?=$profile->contact?></span>
                    <?php } ?>
                    <span class="px-5 mx-5 d-block span-text-toogle-explicit" style="white-space: pre-line;"><?=$profile->bio?></span>
                    <?php if (@$profile->is_emailshare=='yes'){?>
                        <a href="mailto:<?= @$profile->email?>" class="location mb-2"><?=@$profile->email?></a>
                    <?php }?>
                    <p><a href="<?=@$profile->web?>" target="_blank"><?=@$profile->web?></a></a></p>
                </div>
            </div>
            
            <div class="action-profile text-center mx-5">
                <a class="mx-2" href="<?= base_url() ?>profile/setting_price">Edit Subscription</a>
                <a id="edit-profile" href="<?= base_url() ?>profile/setting_profile" onclick="checkClassExists()">Edit Profile</a>
            </div>

            <!-- RILL DATA TABS BOTTOM -->
            <div class="tabs-profiles text-center m-3">
                <ul class="nav nav-tabs d-flex justify-content-between">
                    <li class="nav-item">
                        <a class="nav-link active" href="#public" id="login-tab" data-bs-toggle="tab">Public</a>
                    </li>
                    <li class="nav-item ps-4">
                        <a class="nav-link" href="#private" id="register-tab" data-bs-toggle="tab">Private</a>
                    </li>
                    <li class="nav-item ps-4">
                        <a class="nav-link" href="#special" id="register-tab" data-bs-toggle="tab">Special</a>
                    </li>
                    <li class="nav-item ps-4">
                        <a class="nav-link" href="#download" id="register-tab" data-bs-toggle="tab">Download</a>
                    </li>
                    <!-- <li class="nav-item ps-4">
                        <a class="nav-link" href="#vs" id="register-tab" data-bs-toggle="tab">VS</a>
                    </li> -->
                </ul>
                <div class="tab-content mb-5 pb-5">
                    <div id="public" class="tab-pane active text-white">
                        <?php
                            foreach ($allpost as $dt){
                                if(($dt->content_type == 'explicit' && @$_COOKIE['content'] === 'yes') || $dt->content_type == 'non explicit') {
                                    if ($dt->type=="public"){
                        ?>
                                    <div class="apps-member">
                                        <div class="posts-member">
                                            <div class="post-member px-4">
                                                <div class="post-header mb-3 d-flex flex-row align-items-center">
                                                    <div class="post-profile d-flex flex-row align-items-center me-auto">
                                                        <img src="<?=$profile->profile?>" alt="picture" class="picture rounded-circle">
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
                                                            <a href="" class="icon ellipsis rounded-circle" data-bs-toggle="offcanvas" data-bs-target="#profileSettings" onclick="eventpopup('<?=$dt->id?>')" aria-controls="offcanvasBottom"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                                        </div>
                                                    <?php } ?>
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
                                                                            <button type="button" class="btn-close text-white fs-3" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php if ((substr($imgpost->imgorg,-3) == "pdf")){?>
                                                                                <embed frameBorder="0" scrolling="auto" height="500" width="100%" src="<?= $imgpost->imgorg?>" type="application/pdf">
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
                                                    <?php if($_SESSION['ucode'] == $dt->ucode) {?>
                                                        <div class="like myself">
                                                            <button class="myself <?=(@$dt->is_like=='yes')?"checked":""?>" id="postlike<?=$dt->id?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-regular fa-heart"></i></button>
                                                            <span><?=$dt->like_count?></span>
                                                        </div>
                                                    <?php } else {?>
                                                        <div class="like">
                                                            <button class="heart <?=(@$dt->is_like=='yes')?"checked":""?>" id="postlike<?=$dt->id?>" onclick="actionLike('<?=$dt->id?>')" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-regular fa-heart"></i></button>
                                                            <span><?=$dt->like_count?></span>
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
                                                    <?php } else {?>
                                                            <div class="rate-start mx-auto" style="padding-left: 50px;">
                                                                <button onclick="actionStar('<?=$dt->id?>', '1')" name="poststar<?=$dt->id?>" class="star s-1 <?=($dt->rate_post==1 ||$dt->rate_post==2||$dt->rate_post==3||$dt->rate_post==4||$dt->rate_post==5) ? "checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                                <button onclick="actionStar('<?=$dt->id?>', '2')" name="poststar<?=$dt->id?>" class="star s-2 <?=($dt->rate_post==2||$dt->rate_post==3||$dt->rate_post==4||$dt->rate_post==5)?"checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                                <button onclick="actionStar('<?=$dt->id?>', '3')" name="poststar<?=$dt->id?>" class="star s-3 <?=($dt->rate_post==3||$dt->rate_post==4||$dt->rate_post==5)?"checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                                <button onclick="actionStar('<?=$dt->id?>', '4')" name="poststar<?=$dt->id?>" class="star s-4 <?=($dt->rate_post==4||$dt->rate_post==5)?"checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                                <button onclick="actionStar('<?=$dt->id?>', '5')" name="poststar<?=$dt->id?>" class="star s-5 <?=($dt->rate_post==5)?"checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                            </div>
                                                    <?php } ?>
                                                    <div class="action">
                                                        <a href="#" class="icon svg share" data-bs-toggle="offcanvas" data-bs-target="#shareSosmed" aria-controls="offcanvasBottom"  onclick="actionShare('<?=$dt->id?>')">
                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6.4425 10.1325L11.565 13.1175M11.5575 4.8825L6.4425 7.8675M15.75 3.75C15.75 4.99264 14.7426 6 13.5 6C12.2574 6 11.25 4.99264 11.25 3.75C11.25 2.50736 12.2574 1.5 13.5 1.5C14.7426 1.5 15.75 2.50736 15.75 3.75ZM6.75 9C6.75 10.2426 5.74264 11.25 4.5 11.25C3.25736 11.25 2.25 10.2426 2.25 9C2.25 7.75736 3.25736 6.75 4.5 6.75C5.74264 6.75 6.75 7.75736 6.75 9ZM15.75 14.25C15.75 15.4926 14.7426 16.5 13.5 16.5C12.2574 16.5 11.25 15.4926 11.25 14.25C11.25 13.0074 12.2574 12 13.5 12C14.7426 12 15.75 13.0074 15.75 14.25Z" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </a>
                                                        <?php if($_SESSION['ucode'] == $dt->ucode) {?>
                                                            <div class="like">
                                                                <button class="icon myselfbookmark <?=(@$dt->is_bookmark=='yes')?"checked":""?>" id="postbookmark<?=$dt->id?>" onclick="actionBookmark('<?=$dt->id?>')" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-regular fa-bookmark"></i></button>
                                                            </div>
                                                        <?php } else {?>
                                                            <div class="like">
                                                                <button class="icon bookmark <?=(@$dt->is_bookmark=='yes')?"checked":""?>" id="postbookmark<?=$dt->id?>" onclick="actionBookmark('<?=$dt->id?>')" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-regular fa-bookmark"></i></button>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php 
                                    } 
                                }
                            }
                        ?>
                    </div>
                    <div id="private" class="tab-pane fade">
                        <?php
                            foreach ($allpost as $dt){
                                if(($dt->content_type == 'explicit' && @$_COOKIE['content'] === 'yes') || $dt->content_type == 'non explicit') {
                                    if($dt->type=="private"){ 
                        ?>
                                    <div class="apps-member">
                                        <div class="posts-member">
                                            <div class="post-member px-4">
                                                <div class="post-header mb-3 d-flex flex-row align-items-center">
                                                    <div class="post-profile d-flex flex-row align-items-center me-auto">
                                                        <img src="<?=$profile->profile?>" alt="picture" class="picture rounded-circle">
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
                                                            <a href="" class="icon ellipsis rounded-circle" data-bs-toggle="offcanvas" data-bs-target="#profileSettings"  onclick="eventpopup('<?=$dt->id?>')" aria-controls="offcanvasBottom"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                                        </div>
                                                    <?php } ?>
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
                                                                                <button type="button" class="btn-close text-white fs-3" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <?php if ((substr($imgpost->imgorg,-3) == "pdf")){?>
                                                                                    <embed frameBorder="0" scrolling="auto" height="500" width="100%" src="<?= $imgpost->imgorg?>" type="application/pdf">
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
                                                        <button class="heart" id="postlike1"><i class="fa-regular fa-heart"></i></button>
                                                        <span><?=$dt->like_count?></span>
                                                    </div>
                                                    <div class="rate-start mx-auto" style="padding-left: 25px;">
                                                        <button name="poststar1" class="star s-1"><i class="fa-solid fa-star"></i></button>
                                                        <button name="poststar1" class="star s-2"><i class="fa-solid fa-star"></i></button>
                                                        <button name="poststar1" class="star s-3"><i class="fa-solid fa-star"></i></button>
                                                        <button name="poststar1" class="star s-4"><i class="fa-solid fa-star"></i></button>
                                                        <button name="poststar1" class="star s-5"><i class="fa-solid fa-star"></i></button>
                                                    </div>
                                                    <div class="action">
                                                        <a href="#" class="icon svg share" data-bs-toggle="offcanvas" data-bs-target="#shareSosmed" aria-controls="offcanvasBottom">
                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6.4425 10.1325L11.565 13.1175M11.5575 4.8825L6.4425 7.8675M15.75 3.75C15.75 4.99264 14.7426 6 13.5 6C12.2574 6 11.25 4.99264 11.25 3.75C11.25 2.50736 12.2574 1.5 13.5 1.5C14.7426 1.5 15.75 2.50736 15.75 3.75ZM6.75 9C6.75 10.2426 5.74264 11.25 4.5 11.25C3.25736 11.25 2.25 10.2426 2.25 9C2.25 7.75736 3.25736 6.75 4.5 6.75C5.74264 6.75 6.75 7.75736 6.75 9ZM15.75 14.25C15.75 15.4926 14.7426 16.5 13.5 16.5C12.2574 16.5 11.25 15.4926 11.25 14.25C11.25 13.0074 12.2574 12 13.5 12C14.7426 12 15.75 13.0074 15.75 14.25Z" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </a>
                                                        <a href="#" class="icon bookmark"><i class="fa-regular fa-bookmark"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php 
                                    }    
                                }
                            }
                        ?>
                    </div>
                    <div id="special" class="tab-pane fade">
                        <?php   
                            foreach ($allpost as $dt){
                                if(($dt->content_type == 'explicit' && @$_COOKIE['content'] === 'yes') || $dt->content_type == 'non explicit') {
                                    if($dt->type=="special"){ ?>
                                
                                    <div class="apps-member">
                                        <div class="posts-member">
                                            <div class="post-member px-4">
                                                <div class="post-header mb-3 d-flex flex-row align-items-center">
                                                    <div class="post-profile d-flex flex-row align-items-center me-auto">
                                                        <img src="<?=$profile->profile?>" alt="picture" class="picture rounded-circle">
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
                                                            <a href="" class="icon ellipsis rounded-circle" data-bs-toggle="offcanvas" data-bs-target="#profileSettings" onclick="eventpopup('<?=$dt->id?>')" aria-controls="offcanvasBottom"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                                        </div>
                                                    <?php } ?>
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
                                                                                <button type="button" class="btn-close text-white fs-3" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <?php if ((substr($imgpost->imgorg,-3) == "pdf")){?>
                                                                                    <embed frameBorder="0" scrolling="auto" height="500" width="100%" src="<?= $imgpost->imgorg?>" type="application/pdf">
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
                                                                                <source src="<?=@$imgpost->imgorg?>" type="video/mp4">
                                                                            </video>                                               
                                                                        </div>
                                                                    <?php }else{?>
                                                                        <img src="<?=@$imgpost->imgorg?>" alt="image" class="image-post rounded">
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
                                                        <button class="heart" id="postlike1"><i class="fa-regular fa-heart"></i></button>
                                                        <span><?=$dt->like_count?></span>
                                                    </div>
                                                    <div class="rate-start mx-auto" style="padding-left: 25px;">
                                                        <button name="poststar1" class="star s-1"><i class="fa-solid fa-star"></i></button>
                                                        <button name="poststar1" class="star s-2"><i class="fa-solid fa-star"></i></button>
                                                        <button name="poststar1" class="star s-3"><i class="fa-solid fa-star"></i></button>
                                                        <button name="poststar1" class="star s-4"><i class="fa-solid fa-star"></i></button>
                                                        <button name="poststar1" class="star s-5"><i class="fa-solid fa-star"></i></button>
                                                    </div>
                                                    <div class="action">
                                                        <a href="#" class="icon svg share" data-bs-toggle="offcanvas" data-bs-target="#shareSosmed" aria-controls="offcanvasBottom">
                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6.4425 10.1325L11.565 13.1175M11.5575 4.8825L6.4425 7.8675M15.75 3.75C15.75 4.99264 14.7426 6 13.5 6C12.2574 6 11.25 4.99264 11.25 3.75C11.25 2.50736 12.2574 1.5 13.5 1.5C14.7426 1.5 15.75 2.50736 15.75 3.75ZM6.75 9C6.75 10.2426 5.74264 11.25 4.5 11.25C3.25736 11.25 2.25 10.2426 2.25 9C2.25 7.75736 3.25736 6.75 4.5 6.75C5.74264 6.75 6.75 7.75736 6.75 9ZM15.75 14.25C15.75 15.4926 14.7426 16.5 13.5 16.5C12.2574 16.5 11.25 15.4926 11.25 14.25C11.25 13.0074 12.2574 12 13.5 12C14.7426 12 15.75 13.0074 15.75 14.25Z" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </a>
                                                        <a href="#" class="icon bookmark"><i class="fa-regular fa-bookmark"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php 
                                    }    
                                }
                            }
                        ?>
                    </div>
                    <div id="download" class="tab-pane fade">
                    <?php   
                        foreach ($allpost as $dt){
                            if(($dt->content_type == 'explicit' && @$_COOKIE['content'] === 'yes') || $dt->content_type == 'non explicit') {
                                if($dt->type=="download"){ ?>
                                    <div class="apps-member">
                                        <div class="posts-member">
                                            <div class="post-member px-4">
                                                <div class="post-header mb-3 d-flex flex-row align-items-center">
                                                    <div class="post-profile d-flex flex-row align-items-center me-auto">
                                                        <img src="<?=$profile->profile?>" alt="picture" class="picture rounded-circle">
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
                                                            <a href="" class="icon ellipsis rounded-circle" data-bs-toggle="offcanvas" data-bs-target="#profileSettings" onclick="eventpopup('<?=$dt->id?>')" aria-controls="offcanvasBottom"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                                        </div>
                                                    <?php } ?>
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
                                                                                <button type="button" class="btn-close text-white fs-3" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <?php if ((substr($imgpost->imgorg,-3) == "pdf")){?>
                                                                                    <embed frameBorder="0" scrolling="auto" height="500" width="100%" src="<?= $imgpost->imgorg?>" type="application/pdf">
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
                                                    <?php if($_SESSION['ucode'] == $dt->ucode) {?>
                                                            <div class="like myself">
                                                                <button class="myself <?=(@$dt->is_like=='yes')?"checked":""?>" id="postlike<?=$dt->id?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-regular fa-heart"></i></button>
                                                                <span><?=$dt->like_count?></span>
                                                            </div>
                                                        <?php } else {?>
                                                            <div class="like">
                                                                <button class="heart <?=(@$dt->is_like=='yes')?"checked":""?>" id="postlike<?=$dt->id?>" onclick="actionLike('<?=$dt->id?>')" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-regular fa-heart"></i></button>
                                                                <span><?=$dt->like_count?></span>
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
                                                        <?php } else {?>
                                                                <div class="rate-start mx-auto" style="padding-left: 50px;">
                                                                    <button onclick="actionStar('<?=$dt->id?>', '1')" name="poststar<?=$dt->id?>" class="star s-1 <?=($dt->rate_post==1 ||$dt->rate_post==2||$dt->rate_post==3||$dt->rate_post==4||$dt->rate_post==5) ? "checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                                    <button onclick="actionStar('<?=$dt->id?>', '2')" name="poststar<?=$dt->id?>" class="star s-2 <?=($dt->rate_post==2||$dt->rate_post==3||$dt->rate_post==4||$dt->rate_post==5)?"checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                                    <button onclick="actionStar('<?=$dt->id?>', '3')" name="poststar<?=$dt->id?>" class="star s-3 <?=($dt->rate_post==3||$dt->rate_post==4||$dt->rate_post==5)?"checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                                    <button onclick="actionStar('<?=$dt->id?>', '4')" name="poststar<?=$dt->id?>" class="star s-4 <?=($dt->rate_post==4||$dt->rate_post==5)?"checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                                    <button onclick="actionStar('<?=$dt->id?>', '5')" name="poststar<?=$dt->id?>" class="star s-5 <?=($dt->rate_post==5)?"checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                                </div>
                                                        <?php } ?>
                                                    <div class="action">
                                                        <a href="#" class="icon svg share" data-bs-toggle="offcanvas" data-bs-target="#shareSosmed" aria-controls="offcanvasBottom">
                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6.4425 10.1325L11.565 13.1175M11.5575 4.8825L6.4425 7.8675M15.75 3.75C15.75 4.99264 14.7426 6 13.5 6C12.2574 6 11.25 4.99264 11.25 3.75C11.25 2.50736 12.2574 1.5 13.5 1.5C14.7426 1.5 15.75 2.50736 15.75 3.75ZM6.75 9C6.75 10.2426 5.74264 11.25 4.5 11.25C3.25736 11.25 2.25 10.2426 2.25 9C2.25 7.75736 3.25736 6.75 4.5 6.75C5.74264 6.75 6.75 7.75736 6.75 9ZM15.75 14.25C15.75 15.4926 14.7426 16.5 13.5 16.5C12.2574 16.5 11.25 15.4926 11.25 14.25C11.25 13.0074 12.2574 12 13.5 12C14.7426 12 15.75 13.0074 15.75 14.25Z" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </a>
                                                        <?php if($_SESSION['ucode'] == $dt->ucode) {?>
                                                            <div class="like">
                                                                <button class="icon myselfbookmark <?=(@$dt->is_bookmark=='yes')?"checked":""?>" id="postbookmark<?=$dt->id?>" onclick="actionBookmark('<?=$dt->id?>')" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-regular fa-bookmark"></i></button>
                                                            </div>
                                                        <?php } else {?>
                                                            <div class="like">
                                                                <button class="icon bookmark <?=(@$dt->is_bookmark=='yes')?"checked":""?>" id="postbookmark<?=$dt->id?>" onclick="actionBookmark('<?=$dt->id?>')" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-regular fa-bookmark"></i></button>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    <?php 
                                }
                            }
                        }
                    ?>
                    </div>
                    <div id="vs" class="tab-pane fade">
                    <?php
                        foreach ($allpost as $dt){
                            if(($dt->content_type == 'explicit' && @$_COOKIE['content'] === 'yes') || $dt->content_type == 'non explicit') {
                                if($dt->type=="vs"){ ?>
                                    <div class="apps-member">
                                        <div class="posts-member">
                                            <div class="post-member px-4">
                                                <div class="post-header mb-3 d-flex flex-row align-items-center">
                                                    <div class="post-profile d-flex flex-row align-items-center me-auto">
                                                        <img src="<?=$profile->profile?>" alt="picture" class="picture rounded-circle">
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
                                                            <a href="" class="icon ellipsis rounded-circle" data-bs-toggle="offcanvas" data-bs-target="#profileSettings" onclick="eventpopup('<?=$dt->id?>')" aria-controls="offcanvasBottom"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                                        </div>
                                                    <?php } ?>
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
                                                                <button class="d-block attachment <?php echo ($dt->content_type == 'explicit') ? 'attachment-explicit' : ''?>" onclick="window.location.href='<?php echo $imgpost->imgorg ?>'"><?= substr($imgpost->imgorg, 42)?></button>
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
                                                    <?php if($_SESSION['ucode'] == $dt->ucode) {?>
                                                            <div class="like myself">
                                                                <button class="myself <?=(@$dt->is_like=='yes')?"checked":""?>" id="postlike<?=$dt->id?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-regular fa-heart"></i></button>
                                                                <span><?=$dt->like_count?></span>
                                                            </div>
                                                        <?php } else {?>
                                                            <div class="like">
                                                                <button class="heart <?=(@$dt->is_like=='yes')?"checked":""?>" id="postlike<?=$dt->id?>" onclick="actionLike('<?=$dt->id?>')" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-regular fa-heart"></i></button>
                                                                <span><?=$dt->like_count?></span>
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
                                                        <?php } else {?>
                                                                <div class="rate-start mx-auto" style="padding-left: 50px;">
                                                                    <button onclick="actionStar('<?=$dt->id?>', '1')" name="poststar<?=$dt->id?>" class="star s-1 <?=($dt->rate_post==1 ||$dt->rate_post==2||$dt->rate_post==3||$dt->rate_post==4||$dt->rate_post==5) ? "checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                                    <button onclick="actionStar('<?=$dt->id?>', '2')" name="poststar<?=$dt->id?>" class="star s-2 <?=($dt->rate_post==2||$dt->rate_post==3||$dt->rate_post==4||$dt->rate_post==5)?"checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                                    <button onclick="actionStar('<?=$dt->id?>', '3')" name="poststar<?=$dt->id?>" class="star s-3 <?=($dt->rate_post==3||$dt->rate_post==4||$dt->rate_post==5)?"checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                                    <button onclick="actionStar('<?=$dt->id?>', '4')" name="poststar<?=$dt->id?>" class="star s-4 <?=($dt->rate_post==4||$dt->rate_post==5)?"checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                                    <button onclick="actionStar('<?=$dt->id?>', '5')" name="poststar<?=$dt->id?>" class="star s-5 <?=($dt->rate_post==5)?"checked":""?>" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-solid fa-star"></i></button>
                                                                </div>
                                                        <?php } ?>
                                                    <div class="action">
                                                        <a href="#" class="icon svg share" data-bs-toggle="offcanvas" data-bs-target="#shareSosmed" aria-controls="offcanvasBottom">
                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6.4425 10.1325L11.565 13.1175M11.5575 4.8825L6.4425 7.8675M15.75 3.75C15.75 4.99264 14.7426 6 13.5 6C12.2574 6 11.25 4.99264 11.25 3.75C11.25 2.50736 12.2574 1.5 13.5 1.5C14.7426 1.5 15.75 2.50736 15.75 3.75ZM6.75 9C6.75 10.2426 5.74264 11.25 4.5 11.25C3.25736 11.25 2.25 10.2426 2.25 9C2.25 7.75736 3.25736 6.75 4.5 6.75C5.74264 6.75 6.75 7.75736 6.75 9ZM15.75 14.25C15.75 15.4926 14.7426 16.5 13.5 16.5C12.2574 16.5 11.25 15.4926 11.25 14.25C11.25 13.0074 12.2574 12 13.5 12C14.7426 12 15.75 13.0074 15.75 14.25Z" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </a>
                                                        <?php if($_SESSION['ucode'] == $dt->ucode) {?>
                                                            <div class="like">
                                                                <button class="icon myselfbookmark <?=(@$dt->is_bookmark=='yes')?"checked":""?>" id="postbookmark<?=$dt->id?>" onclick="actionBookmark('<?=$dt->id?>')" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-regular fa-bookmark"></i></button>
                                                            </div>
                                                        <?php } else {?>
                                                            <div class="like">
                                                                <button class="icon bookmark <?=(@$dt->is_bookmark=='yes')?"checked":""?>" id="postbookmark<?=$dt->id?>" onclick="actionBookmark('<?=$dt->id?>')" <?=($_SESSION["user_id"]==$dt->id_member)?"disabled":""?>><i class="fa-regular fa-bookmark"></i></button>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
        </div>
    </div>
</div>