<input hidden id="max-post-guest" class="max-post-guest" type="text" value="<?= $max_post?>">
<div class="apps-body">
    <!-- Looping username serta dengan pengkondisian -->
        <div class="row">
            <div class="apps-member col-12 col-lg-6 col-xl-5 mx-auto">
                <div class="banner-profile w-100">
                    <img src="<?=$profile["header"]?>" alt="" class="banner-images">
                </div>
                <div class="profile mb-4">
                    <div class="d-flex flex-row position-relative user">
                        <?php if ($profile["is_share"]=="yes" && !$profile["is_block"] && !$profile["is_blocked"] && $profile["ucode"]!='rqzqkqx'){?>
                            <a class="icon-profile span-text-toogle-explicit" style="cursor:pointer" onclick="setClipboard('<?=base_url()?>profile/user/<?=$profile['ucode']?>')">
                                <svg class="stroke-share-color" width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.59 12.51L13.42 16.49M13.41 5.51L6.59 9.49M19 4C19 5.65685 17.6569 7 16 7C14.3431 7 13 5.65685 13 4C13 2.34315 14.3431 1 16 1C17.6569 1 19 2.34315 19 4ZM7 11C7 12.6569 5.65685 14 4 14C2.34315 14 1 12.6569 1 11C1 9.34315 2.34315 8 4 8C5.65685 8 7 9.34315 7 11ZM19 18C19 19.6569 17.6569 21 16 21C14.3431 21 13 19.6569 13 18C13 16.3431 14.3431 15 16 15C17.6569 15 19 16.3431 19 18Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>                           
                            </a>
                        <?php }
                        if ($profile["ucode"]!='rqzqkqx'){
                        ?>
                            <a href="<?= base_url()?>profile/guest_note/<?=$profile["ucode"]?>" class="icon-profile span-text-toogle-explicit ms-0 ms-md-2">
                                <svg class="fill-note-color" width="30" height="23" viewBox="0 0 30 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18 4C18 4.55228 17.5523 5 17 5L11 5C10.4477 5 10 4.55228 10 4C10 3.44771 10.4477 3 11 3L17 3C17.5523 3 18 3.44772 18 4Z"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14 -2.91409e-08C14.5523 -4.5235e-08 15 0.447715 15 1L15 7C15 7.55228 14.5523 8 14 8C13.4477 8 13 7.55228 13 7L13 1C13 0.447715 13.4477 -1.30468e-08 14 -2.91409e-08Z"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.92943 1L7 1V3C5.55752 3 4.57625 3.00213 3.84143 3.10092C3.13538 3.19585 2.80836 3.36322 2.58579 3.58579C2.36322 3.80836 2.19585 4.13538 2.10092 4.84143C2.00213 5.57625 2 6.55752 2 8V14C2 15.4425 2.00213 16.4237 2.10092 17.1586C2.19585 17.8646 2.36322 18.1916 2.58579 18.4142C2.80836 18.6368 3.13538 18.8042 3.84143 18.8991C4.57625 18.9979 5.55752 19 7 19H9C10.4425 19 11.4238 18.9979 12.1586 18.8991C12.8646 18.8042 13.1916 18.6368 13.4142 18.4142C13.6368 18.1916 13.8042 17.8646 13.8991 17.1586C13.9979 16.4237 14 15.4425 14 14V12H16L16 14.0706C16 15.4247 16.0001 16.5413 15.8813 17.4251C15.7565 18.3529 15.4845 19.1723 14.8284 19.8284C14.1723 20.4845 13.3529 20.7565 12.4251 20.8813C11.5413 21.0001 10.4247 21 9.07055 21H6.92946C5.57533 21 4.4587 21.0001 3.57494 20.8813C2.64711 20.7565 1.82768 20.4845 1.17158 19.8284C0.515467 19.1723 0.243498 18.3529 0.118755 17.4251C-6.35162e-05 16.5413 -3.41884e-05 15.4247 1.21679e-06 14.0706V7.92943C-3.41884e-05 6.57531 -6.35162e-05 5.4587 0.118755 4.57494C0.243498 3.64711 0.515467 2.82768 1.17158 2.17158C1.82768 1.51547 2.64711 1.2435 3.57494 1.11875C4.4587 0.999936 5.57531 0.999966 6.92943 1Z"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4 8C4 7.44772 4.44772 7 5 7L9 7C9.55228 7 10 7.44772 10 8C10 8.55229 9.55228 9 9 9L5 9C4.44772 9 4 8.55228 4 8Z"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4 16C4 15.4477 4.44772 15 5 15L9 15C9.55228 15 10 15.4477 10 16C10 16.5523 9.55228 17 9 17L5 17C4.44772 17 4 16.5523 4 16Z"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4 12C4 11.4477 4.44772 11 5 11L11 11C11.5523 11 12 11.4477 12 12C12 12.5523 11.5523 13 11 13L5 13C4.44772 13 4 12.5523 4 12Z"/>
                                </svg>
                            </a>
                        <?php } ?>
                        <!-- <a class="link pt-3 px-0 px-md-3" style="z-index: 999;">
                            <span class="mode-toggle">
                                <span class="switch"></span>
                            </span>
                        </a> -->
                        <div class="img-profile">
                            <div class="img rounded-circle">
                                <img src="<?=$profile["profile"]?>" alt="" class="rounded-circle">
                            </div>
                        </div>
                        
                        <div class="guest-empty-icon">

                        </div>
                        <?php if (!$profile["is_block"] && !$profile["is_blocked"]){
                                if ($profile["ucode"]!='rqzqkqx'){
                        ?>
                            <a href="<?=base_url()?>message/message_detail/<?=$profile["ucode"]?>" class="icon-profile ms-auto me-3">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="0.5" width="31" height="31" rx="15.5" fill="black"/>
                                    <path d="M8.5 12.6667L15.075 17.05C15.3489 17.2327 15.6708 17.3303 16 17.3303C16.3292 17.3303 16.6511 17.2327 16.925 17.05L23.5 12.6667M10.1667 21.8333H21.8333C22.2754 21.8333 22.6993 21.6577 23.0118 21.3452C23.3244 21.0326 23.5 20.6087 23.5 20.1667V11.8333C23.5 11.3913 23.3244 10.9674 23.0118 10.6548C22.6993 10.3423 22.2754 10.1667 21.8333 10.1667H10.1667C9.72464 10.1667 9.30072 10.3423 8.98816 10.6548C8.67559 10.9674 8.5 11.3913 8.5 11.8333V20.1667C8.5 20.6087 8.67559 21.0326 8.98816 21.3452C9.30072 21.6577 9.72464 21.8333 10.1667 21.8333Z" stroke="#ECEBED" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                    <rect x="0.5" y="0.5" width="31" height="31" rx="15.5" stroke="#727477"/>
                                </svg>
                            </a>
                            <a href="<?=base_url()?>message/message_detail/<?=$profile["ucode"]?>" class="icon-profile ms-auto me-3">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="0.5" width="31" height="31" rx="15.5" fill="black"/>
                                    <path d="M8.5 12.6667L15.075 17.05C15.3489 17.2327 15.6708 17.3303 16 17.3303C16.3292 17.3303 16.6511 17.2327 16.925 17.05L23.5 12.6667M10.1667 21.8333H21.8333C22.2754 21.8333 22.6993 21.6577 23.0118 21.3452C23.3244 21.0326 23.5 20.6087 23.5 20.1667V11.8333C23.5 11.3913 23.3244 10.9674 23.0118 10.6548C22.6993 10.3423 22.2754 10.1667 21.8333 10.1667H10.1667C9.72464 10.1667 9.30072 10.3423 8.98816 10.6548C8.67559 10.9674 8.5 11.3913 8.5 11.8333V20.1667C8.5 20.6087 8.67559 21.0326 8.98816 21.3452C9.30072 21.6577 9.72464 21.8333 10.1667 21.8333Z" stroke="#ECEBED" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                    <rect x="0.5" y="0.5" width="31" height="31" rx="15.5" stroke="#727477"/>
                                </svg>

                            </a>
                            <?php }if($profile['ucode'] != 'rqzqkqx'){?>
                                <a onclick="eventpopup('<?=$profile['id']?>')" style="cursor:pointer" class="icon-profile"  data-bs-toggle="offcanvas" data-bs-target="#blockeduser" aria-controls="offcanvasBottom">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.5" y="0.5" width="31" height="31" rx="15.5" fill="#181A1C"/>
                                        <path d="M22.0123 22.9197C21.1017 20.4841 18.7534 18.75 16 18.75C13.2467 18.75 10.8984 20.4841 9.98778 22.9197M22.0123 22.9197C23.9449 21.2391 25.1667 18.7622 25.1667 16C25.1667 10.9374 21.0627 6.83333 16 6.83333C10.9374 6.83333 6.83337 10.9374 6.83337 16C6.83337 18.7622 8.05515 21.2391 9.98778 22.9197M22.0123 22.9197C20.4028 24.3193 18.3004 25.1667 16 25.1667C13.6997 25.1667 11.5972 24.3193 9.98778 22.9197M18.75 13.25C18.75 14.7688 17.5188 16 16 16C14.4813 16 13.25 14.7688 13.25 13.25C13.25 11.7312 14.4813 10.5 16 10.5C17.5188 10.5 18.75 11.7312 18.75 13.25Z" stroke="white" stroke-width="1.5" stroke-linejoin="round"/>
                                        <line x1="7.39221" y1="12.3027" x2="23.3922" y2="21.3027" stroke="white" stroke-width="1.6"/>
                                        <rect x="0.5" y="0.5" width="31" height="31" rx="15.5" stroke="#727477"/>
                                    </svg>

                                </a>
                            <?php } ?>

                        <?php }else{?>
                            <a class="icon-profile ms-auto me-3"></a>
                            <a onclick="eventpopup('<?=$profile['id']?>')" style="cursor:pointer" class="icon-profile"  data-bs-toggle="offcanvas" data-bs-target="#unblockuser" aria-controls="offcanvasBottom">
                                <i class="fa-regular fa-circle-user fa-2xl"></i>
                            </a>
                        <?php }?>
                    </div>
                </div>
                <div class="info-profile text-center">
                    <div class="rate-start mx-auto d-flex justify-content-center gap-2">
                        <div class="my-rating" data-rating="<?=round($profile["avgrate"],2)?>"></div>
                    </div>
                        <div class="name">
                            <h3 class="mt-2 mb-1">@<?=ucfirst($profile["username"])?></h3>
                            <!-- <h3 class="mt-2 mb-1"><?= @ucfirst($profile->firstname)?> <?= @ucfirst($profile->surename)?></h3> -->
                            <?php if (!$profile["is_block"] && !$profile["is_blocked"]){
                                    if (@$profile["is_kontakshare"]=='yes'){
                            ?>
                                        <span class="location mb-2"><?=$profile["contact"]?></span>
                            <?php   
                                    }
                            ?>
                                <p class="px-5 mx-5"><?=$profile["bio"]?></p>
                                <?php if (@$profile["is_emailshare"]=='yes'){?>
                                    <a href="mailto:<?= @$profile["email"]?>" class="location mb-2"><?=@$profile["email"]?></a>
                                <?php }?>
                                <p><a href="<?=(preg_match("/http/",@$profile->web)>0)?@$profile->web:"https://".@$profile->web?>" class="location mb-2"><?=@$profile["web"]?></a></p>
                            <?php }?>
                        </div>
                </div>
                <?php if (!$profile["is_block"] && !$profile["is_blocked"]){
                        if ($profile["ucode"]!='rqzqkqx'){
                ?>
                        <div class="action-profile text-center mx-auto d-flex justify-content-center" disable>
                            <input type="button" value="<?=($profile["is_follow"]==true) ? "Unfollow":"Follow" ?>" id="user1" 
                                class="<?=($profile["ucode"]=='rqzqkqx') ? "disabled-follow":"" ?> col-8 col-md-4 mx-auto btn-main-green follow <?=($profile["is_follow"]==true) ? "active":"" ?> py-2" onclick="actionFollow('1','<?=$profile["id"]?>')">
                        </div>
                    <?php }if ($profile["dayleft"]<=0){?>
                        <div id="subscribebox" class="mt-4 action-guest-subs">
                                <?php if(@$profile['price']->trial>0 || @$profile['price']->sub7>0 || @$profile['price']->sub30>0 || @$profile['price']->sub365>0) {?>
                                    <div class="action-profile text-center mx-auto d-flex justify-content-center mb-3">
                                        <input type="button" value="Subscribe" id="subscribe1" class="col-8 col-md-4 mx-auto btn-main-green py-2" >
                                    </div>
                                <?php }?>
                                <div class="d-flex flex-wrap ">
                                    <?php 
                                        if (@$profile['price']->trial>0){?>
                                            <button id="btnsubsribe" onclick='subscribe("<?=$profile["id"]?>","trial")' class="text-decoration-none col-5 m-2 p-2 mx-auto text-center text-white btn-guest-subs">
                                                Trial for <?php echo ($profile["price"]->trial_long==1) ? "1 Day" : $profile["price"]->trial_long." Days" ?> <?=$profile['price']->trial?>
                                            </button>
                                    <?php } 
                                        if (@$profile['price']->sub7>0){?>
                                            <button id="btnsubsribe" onclick='subscribe("<?=$profile["id"]?>","sub7")' class="text-decoration-none col-5 m-2 p-2 mx-auto text-center text-white btn-guest-subs">
                                                7 Days <?=$profile['price']->sub7?>
                                            </button>
                                    <?php } 
                                        if (@$profile['price']->sub30>0){?>
                                            <button id="btnsubsribe" onclick='subscribe("<?=$profile["id"]?>","sub30")' class="text-decoration-none col-5 m-2 p-2 mx-auto text-center text-white btn-guest-subs">
                                                1 Month <?=$profile['price']->sub30?>
                                            </button>
                                    <?php } 
                                        if (@$profile['price']->sub365>0){?>
                                            <button id="btnsubsribe" onclick='subscribe("<?=$profile["id"]?>","sub365")' class="text-decoration-none col-5 m-2 p-2 mx-auto text-center text-white btn-guest-subs">
                                                1 Year <?=$profile['price']->sub365?>
                                            </button>
                                    <?php } ?>
                                </div>
                        </div>
                    <?php }else{ ?>
                        <div id="subscribeleft" class="mt-4 action-guest-subs">
                            <p class="text-center">Your subscription <?php echo ($profile["dayleft"]==1) ? "1 Day left":$profile["dayleft"]." Days left"?></p>
                        </div>
                    <?php }?>
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
                                                                if ($dt->id_member!=$_SESSION["user_id"]){
                                                            ?>
                                                                <a href="" id="sendTipClick" onclick="popupSendTip('<?=$dt->id?>')" class="icon color-bp dollar rounded-circle <?php echo ($dt->content_type == 'explicit') ? 'dollar-explicit' : 'dollar-non'?>" data-bs-toggle="offcanvas" data-bs-target="#sendTip<?= $dt->id?>" aria-controls="offcanvasBottom">
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
                            <div id="load-post-guest-public" class="load-profile"></div>
                            <div class="spinner-load-content">
                                <div class=" d-flex flex-column justify-content-center align-items-center">
                                    <div class="spinner-border fs-5" role="status">
                                        <span class="visually-hidden fs-5">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="private" class="tab-pane fade">
                            <?php
                                foreach ($guestpost as $dt){
                                    if(($dt->content_type == 'explicit' && @$_COOKIE['content'] === 'yes') || $dt->content_type == 'non explicit') {
                                        if ($dt->type=="private"){
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
                                                            if ($dt->id_member!=$_SESSION["user_id"]){
                                                        ?>
                                                            <a href="" id="sendTipClick" onclick="popupSendTip('<?=$dt->id?>')" class="icon color-bp dollar rounded-circle <?php echo ($dt->content_type == 'explicit') ? 'dollar-explicit' : 'dollar-non'?>" data-bs-toggle="offcanvas" data-bs-target="#sendTip<?= $dt->id?>" aria-controls="offcanvasBottom">
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
                                                <div class="modal fade" id="modalReport<?= $dt->id?>" tabindex="-1" aria-labelledby="modalguestprivate" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title-report fs-5" id="modalguestprivate">Report</h1>
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
                                                <?php
                                                    if ($dt->is_subscribe=='no'){?>
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
                                                                        <img src="<?=@$imgpost->imgblur?>" alt="image" class="image-post rounded">
                                                                    </div>
                                                                </div>
                                                                    <?php 
                                                                            }
                                                                        }
                                                                    }
                                                                ?>
                                                            </div>
                                                <?php   }elseif ($dt->is_subscribe=='yes'){?>
                                                            <article class="article">
                                                                <?php 
                                                                    @$str=base64_decode($dt->article);
                                                                    echo $str;
                                                                ?>
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
                                                <?php   }?>
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
                                                    <a href="#" class="icon svg share" data-bs-toggle="offcanvas" data-bs-target="#shareSosmed" aria-controls="offcanvasBottom">
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
                            ?>
                            <div id="load-post-guest-private" class="load-profile"></div>
                            <div class="spinner-load-content">
                                <div class=" d-flex flex-column justify-content-center align-items-center">
                                    <div class="spinner-border fs-5" role="status">
                                        <span class="visually-hidden fs-5">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="special" class="tab-pane fade">
                            <?php
                                foreach ($guestpost as $dt){
                                    if(($dt->content_type == 'explicit' && @$_COOKIE['content'] === 'yes') || $dt->content_type == 'non explicit') {
                                        if ($dt->type=="special"){ 
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
                                                                    if ($dt->type=='special' && $dt->id_member != $_SESSION["user_id"] && $dt->is_special != 'yes'){
                                                                ?>
                                                                    <a href="" class="icon color-bp rounded-circle <?php echo ($dt->content_type == 'explicit') ? 'chart-explicit' : 'chart-nonexplicit'?>" data-bs-toggle="offcanvas" data-bs-target="#basketShopping<?= $dt->id?>" aria-controls="offcanvasBottom"><i class="fa-solid fa-basket-shopping"></i></a>
                                                                <?php }
                                                                    if ($dt->id_member!=$_SESSION["user_id"]){
                                                                ?>
                                                                    <a href="" id="sendTipClick" onclick="popupSendTip('<?=$dt->id?>')" class="icon color-bp dollar rounded-circle <?php echo ($dt->content_type == 'explicit') ? 'dollar-explicit' : 'dollar-non'?>" data-bs-toggle="offcanvas" data-bs-target="#sendTip<?= $dt->id?>" aria-controls="offcanvasBottom">
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
                                                        <div class="modal fade" id="modalReport<?= $dt->id?>" tabindex="-1" aria-labelledby="modalguestprivate" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title-report fs-5" id="modalguestprivate">Report</h1>
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
                                                            <?php if ($dt->is_special=='yes' || $dt->id_member==$_SESSION["user_id"]){   ?>
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
                                                                            if(substr($imgpost->imgorg, -22) != 'defaultspeciallock.jpg'){
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
                                                                    }
                                                                ?>
                                                            </div>
                                                        <?php 
                                                            }else{
                                                        ?>
                                                            <div class="item">
                                                                <div class="img">
                                                                    <img src="https://api.sandbox.ciak.live/users/blur/defaultspeciallock.jpg" alt="image" class="image-post rounded">
                                                                </div>
                                                            </div>          
    
                                                        <?php } ?>

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
                                                            <a href="#" class="icon svg share" data-bs-toggle="offcanvas" data-bs-target="#shareSosmed" aria-controls="offcanvasBottom">
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
                            ?>
                            <div id="load-post-guest-special" class="load-profile"></div>
                            <div class="spinner-load-content">
                                <div class=" d-flex flex-column justify-content-center align-items-center">
                                    <div class="spinner-border fs-5" role="status">
                                        <span class="visually-hidden fs-5">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="download" class="tab-pane fade">
                            <?php
                                foreach ($guestpost as $dt){
                                    if(($dt->content_type == 'explicit' && @$_COOKIE['content'] === 'yes') || $dt->content_type == 'non explicit') {
                                        if ($dt->type=="download"){
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
                                                                    if ($dt->type=='download' && $dt->id_member != $_SESSION["user_id"] && $dt->is_download != 'yes'){
                                                                ?>
                                                                    <a href="" class="icon color-bp rounded-circle <?php echo ($dt->content_type == 'explicit') ? 'chart-explicit' : 'chart-nonexplicit'?>"  data-bs-toggle="offcanvas" data-bs-target="#basketDownload<?= $dt->id?>" aria-controls="offcanvasBottom"><i class="fa-solid fa-basket-shopping"></i></a>
                                                                <?php }
                                                                    if ($dt->id_member!=$_SESSION["user_id"]){
                                                                ?>
                                                                    <a href="" id="sendTipClick" onclick="popupSendTip('<?=$dt->id?>')" class="icon color-bp dollar rounded-circle <?php echo ($dt->content_type == 'explicit') ? 'dollar-explicit' : 'dollar-non'?>" data-bs-toggle="offcanvas" data-bs-target="#sendTip<?= $dt->id?>" aria-controls="offcanvasBottom">
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
                                                        <div class="modal fade" id="modalReport<?= $dt->id?>" tabindex="-1" aria-labelledby="modalguestprivate" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title-report fs-5" id="modalguestprivate">Report</h1>
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
                                                        <?php if ($dt->is_download=='yes' || $dt->id_member==$_SESSION["user_id"]){    ?>
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
                                                        <?php 
                                                            } else {
                                                        ?>
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
                                                                        <img src="<?=$imgpost->imgblur?>" alt="image" class="image-post rounded">
                                                                    </div>
                                                                </div>
                                                                    <?php 
                                                                            }
                                                                        }
                                                                    }
                                                                ?>
                                                            </div>
                                                        <?php }?>

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
                                                            <a href="#" class="icon svg share" data-bs-toggle="offcanvas" data-bs-target="#shareSosmed" aria-controls="offcanvasBottom">
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
                            ?>
                            <div id="load-post-guest-download" class="load-profile"></div>
                            <div class="spinner-load-content">
                                <div class=" d-flex flex-column justify-content-center align-items-center">
                                    <div class="spinner-border fs-5" role="status">
                                        <span class="visually-hidden fs-5">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div id="vs" class="tab-pane fade">
                            <?php
                                foreach ($guestpost as $dt){
                                    if(($dt->content_type == 'explicit' && @$_COOKIE['content'] === 'yes') || $dt->content_type == 'non explicit') {
                                        if ($dt->type=="vs"){
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
                                            </div>
                                            <div class="post-body">
                                                <div class="text text-start">
                                                    <p class="article">
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
                                                    </p>
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
                                                    <a href="#" class="icon svg share" data-bs-toggle="offcanvas" data-bs-target="#shareSosmed" aria-controls="offcanvasBottom">
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
                            ?>
                        </div> -->
                    </div>
                <?php }?>
        </div>
</div>