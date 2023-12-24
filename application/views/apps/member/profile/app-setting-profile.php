

<div class="apps-body">
    <?php
    if (isset($popup)) {
        $this->load->view($popup);
    }
    ?>

    <div id="load-edit-profile" style="display: none;">
        <div class="img-load d-flex flex-column justify-content-center align-items-center">
            <div class="spinner-border fs-3" role="status">
                <span class="visually-hidden fs-3">Loading...</span>
            </div>
        </div>
    </div>



    <div class="row">
  
        <form action="<?= base_url() ?>profile/set_profile" method="post" autocomplete="off" id="" enctype="multipart/form-data">
            <div class="apps-member col-12 col-lg-5 mx-auto">
                <?php if (@isset($_SESSION["success"])) { ?>
                    <div class="col-12 alert alert-success alert-dismissible fade show" role="alert">
                        <span class="notif-login f-poppins"><?= $_SESSION["success"] ?></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <?php if (@isset($_SESSION["failed"])) { ?>
                    <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="notif-login f-poppins"><?= $_SESSION["failed"] ?></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <div class="banner-profile w-100">
                    <img src="<?=@$profile->header?>" alt="" class="banner-images img-banner-setting">
                    <div class="changes">
                        <form action="<?= base_url('homepage/set_banner') ?>" method="post" autocomplete="off" id="changeprofile" enctype="multipart/form-data">
                            <label for="upload_banner" class="position-relative" style="z-index: 1;">
                                <svg width="56" height="62" viewBox="0 0 56 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.01421 34C7.22222 34 5.76953 35.4527 5.76953 37.2447V49C5.76953 51.8284 5.76953 53.2426 6.64821 54.1213C7.52689 55 8.9411 55 11.7695 55H31.2695C34.098 55 35.5122 55 36.3909 54.1213C37.2695 53.2426 37.2695 51.8284 37.2695 49V37.2447C37.2695 35.4527 35.8168 34 34.0249 34C32.7959 34 31.6723 33.3056 31.1227 32.2064L29.6251 29.2111C29.0872 28.1353 28.8182 27.5974 28.3349 27.2987C27.8516 27 27.2502 27 26.0474 27H16.9917C15.7888 27 15.1874 27 14.7041 27.2987C14.2208 27.5974 13.9519 28.1353 13.414 29.2111L11.9163 32.2064C11.3667 33.3056 10.2432 34 9.01421 34ZM26.5195 42.75C26.5195 45.5114 24.281 47.75 21.5195 47.75C18.7581 47.75 16.5195 45.5114 16.5195 42.75C16.5195 39.9886 18.7581 37.75 21.5195 37.75C24.281 37.75 26.5195 39.9886 26.5195 42.75ZM28.5195 42.75C28.5195 46.616 25.3855 49.75 21.5195 49.75C17.6535 49.75 14.5195 46.616 14.5195 42.75C14.5195 38.884 17.6535 35.75 21.5195 35.75C25.3855 35.75 28.5195 38.884 28.5195 42.75Z" fill="url(#paint0_linear_1401_9309)" />
                                    <path d="M37.2695 10.25L37.2695 30.75" stroke="url(#paint1_linear_1401_9309)" stroke-linecap="square" stroke-linejoin="round" />
                                    <path d="M47.5195 20.5L27.0195 20.5" stroke="url(#paint2_linear_1401_9309)" stroke-linecap="square" stroke-linejoin="round" />
                                    <defs>
                                        <linearGradient id="paint0_linear_1401_9309" x1="5.76953" y1="41" x2="37.2695" y2="41" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FFEAEA" />
                                            <stop offset="0.0001" stop-color="#FEFEFE" />
                                            <stop offset="1" stop-color="#FFF1F1" />
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_1401_9309" x1="37.2695" y1="20.5" x2="38.2695" y2="20.5" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FFEAEA" />
                                            <stop offset="0.0001" stop-color="#FEFEFE" />
                                            <stop offset="1" stop-color="#FFF1F1" />
                                        </linearGradient>
                                        <linearGradient id="paint2_linear_1401_9309" x1="37.2695" y1="20.5" x2="37.2695" y2="21.5" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FFEAEA" />
                                            <stop offset="0.0001" stop-color="#FEFEFE" />
                                            <stop offset="1" stop-color="#FFF1F1" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </label>
                            <input type="file" name="upload_banner" id="upload_banner" class="upload_banner" hidden accept=".png, .jpg, .jpeg">
                        </form>
                    </div>
                </div>
                <div class="profile">
                    <div class="d-flex flex-row position-relative">
                        <a id="discard-settings-profile" href="<?= base_url()?>profile" class="cancel me-auto ms-3">Discard</a>
                        <div class="img-profile">
                            <div class="img rounded-circle">
                                <form>
                                    <label for="upload_image">
                                        <svg class="icon-pp-setting" width="56" height="62" viewBox="0 0 56 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.01421 34C7.22222 34 5.76953 35.4527 5.76953 37.2447V49C5.76953 51.8284 5.76953 53.2426 6.64821 54.1213C7.52689 55 8.9411 55 11.7695 55H31.2695C34.098 55 35.5122 55 36.3909 54.1213C37.2695 53.2426 37.2695 51.8284 37.2695 49V37.2447C37.2695 35.4527 35.8168 34 34.0249 34C32.7959 34 31.6723 33.3056 31.1227 32.2064L29.6251 29.2111C29.0872 28.1353 28.8182 27.5974 28.3349 27.2987C27.8516 27 27.2502 27 26.0474 27H16.9917C15.7888 27 15.1874 27 14.7041 27.2987C14.2208 27.5974 13.9519 28.1353 13.414 29.2111L11.9163 32.2064C11.3667 33.3056 10.2432 34 9.01421 34ZM26.5195 42.75C26.5195 45.5114 24.281 47.75 21.5195 47.75C18.7581 47.75 16.5195 45.5114 16.5195 42.75C16.5195 39.9886 18.7581 37.75 21.5195 37.75C24.281 37.75 26.5195 39.9886 26.5195 42.75ZM28.5195 42.75C28.5195 46.616 25.3855 49.75 21.5195 49.75C17.6535 49.75 14.5195 46.616 14.5195 42.75C14.5195 38.884 17.6535 35.75 21.5195 35.75C25.3855 35.75 28.5195 38.884 28.5195 42.75Z" fill="url(#paint0_linear_1401_9309)" />
                                            <path d="M37.2695 10.25L37.2695 30.75" stroke="url(#paint1_linear_1401_9309)" stroke-linecap="square" stroke-linejoin="round" />
                                            <path d="M47.5195 20.5L27.0195 20.5" stroke="url(#paint2_linear_1401_9309)" stroke-linecap="square" stroke-linejoin="round" />
                                            <defs>
                                                <linearGradient id="paint0_linear_1401_9309" x1="5.76953" y1="41" x2="37.2695" y2="41" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FFEAEA" />
                                                    <stop offset="0.0001" stop-color="#FEFEFE" />
                                                    <stop offset="1" stop-color="#FFF1F1" />
                                                </linearGradient>
                                                <linearGradient id="paint1_linear_1401_9309" x1="37.2695" y1="20.5" x2="38.2695" y2="20.5" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FFEAEA" />
                                                    <stop offset="0.0001" stop-color="#FEFEFE" />
                                                    <stop offset="1" stop-color="#FFF1F1" />
                                                </linearGradient>
                                                <linearGradient id="paint2_linear_1401_9309" x1="37.2695" y1="20.5" x2="37.2695" y2="21.5" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FFEAEA" />
                                                    <stop offset="0.0001" stop-color="#FEFEFE" />
                                                    <stop offset="1" stop-color="#FFF1F1" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </label>
                                    <img src="<?=@$profile->profile ?>" class="rounded-circle img-pp-setting">

                                    <input type="file" name="upload_image" class="upload_image" id="upload_image" hidden accept=".png, .jpg, .jpeg">
                                </form>
                            </div>
                            <label id="text-change" for="upload_image" class="change-profile image">Change Picture</label>
                        </div>
                        <a href="" class="btn-green ms-auto me-3">Agency</a>
                    </div>
                </div>
                <div class="biodata mt-5 px-4 mb-5">
                    <form id="frmprofile" >
                        <div class="mb-3 ciak-data-input">
                            <label for="ucode" class="form-label">Unique code</label>
                            <input type="text" class="form-control disabled" id="ucode" value="<?=$_SESSION["ucode"]?>" disabled readonly>
                        </div>
                        <div class="mb-3 ciak-data-input">
                            <label for="username" class="form-label d-flex align-items-center"><span class="require-red fs-4 me-1">*</span>Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?=$_SESSION["username"]?>" required>
                        </div>
                        <div class="mb-3 ciak-data-input d-flex justify-content-between">
                            <div class="w-100">
                                <label for="firstname" class="form-label d-flex align-items-center">Firstname</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" value="<?=@$profile->firstname?>">
                            </div>
                            <div class="w-100 ms-4">
                                <label for="surename" class="form-label d-flex align-items-center">Surename</label>
                                <input type="text" class="form-control" id="surename" name="surename" value="<?=@$profile->surename?>">
                            </div>
                        </div>
                        <div class="mb-3 ciak-data-input">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea name="bio" id="bio" class="form-control bio" cols="30" rows="10"><?=@$profile->bio?></textarea>
                            <span class="max">Max 300</span>
                        </div>
                        <div class="mb-3 ciak-data-input">
                            <label for="web" class="form-label">Web</label>
                            <input type="text" class="form-control" id="web" name="web" value="<?=@$profile->web?>">
                        </div>
                        <div class="mb-3 ciak-data-input">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?=@$_SESSION["email"]?>" required readonly>
                        </div>
                        <div class="mb-3 ciak-data-input">
                            <label for="phone" class="form-label">Contacts</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?=@$profile->contact?>">
                        </div>
                        
                        <div class="biodata mt-5 pt-5 mb-5 pb-4">
                            <div class="w-auto">
                                <h3>Settings subscription prices</h3>
                                <hr>
                            </div>
                            <form id="formsetsubs" method="POST">
                                <div class="mb-3 ciak-data-input">
                                    <label for="weekly" class="form-label">Weekly</label>
                                    <input type="text" class="form-control" name="weekly" id="weekly" value="<?=(empty($pricing->sub7)) ? 0 :$pricing->sub7; ?>">
                                </div>
                                <div class="mb-3 ciak-data-input">
                                    <label for="monthly" class="form-label">Monthly</label>
                                    <input type="text" class="form-control" name="monthly" id="monthly" value="<?=(empty($pricing->sub30)) ? 0 :$pricing->sub30; ?>">
                                </div>
                                <div class="mb-3 ciak-data-input">
                                    <label for="yearly" class="form-label">Yearly</label>
                                    <input type="text" class="form-control" name="yearly" id="yearly" value="<?=(empty($pricing->sub365)) ? 0 :$pricing->sub365; ?>">
                                </div>
                
                                <div class="mb-3 ciak-check d-flex flex-row">
                                    <div class="d-flex flex-column col-8">
                                        <span>Trial Subscription</span>
                                    </div>
                                    <div class="form-check form-switch col p-0 d-flex justify-content-end align-items-center">
                                        <input class="form-check-input" id="is_trial" name="is_trial" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="yes" <?php echo (@$pricing->trial_long>0) ? "checked":"" ?>>
                                    </div>
                                </div>
                                <div id="trial">
                                    <div class="mb-3 ciak-data-input">
                                        <label for="yearly" class="form-label">Trial</label>
                                        <select name="triallong" class="form-select">
                                            <option value="1">1 day</option>
                                            <option value="2">2 days</option>
                                            <option value="3">3 days</option>
                                            <option value="4">4 days</option>
                                            <option value="5">5 days</option>
                                            <option value="6">6 days</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 ciak-data-input">
                                        <label for="yearly" class="form-label">Trial Amount</label>
                                        <input type="text" class="form-control" id="trialamount" name="trialamount" value="<?=(empty($pricing->trial)) ? 0 :$pricing->trial; ?>">
                                    </div>
                                </div>
                                <div class="mb-3 ciak-data-input d-grid gap-2 pt-3">
                                    <!-- <button class="btn-orange">Confirm</button> -->
                                    <button id="btnSubs" class="btn-setsubs fw-bolder">Promote your subscription</button>
                                </div>
                
                            </form>
                        </div>
        
                        <div class="w-auto">
                            <h3>Settings</h3>
                            <hr>
                        </div>
                        <div class="mb-3 ciak-check d-flex flex-row">
                            <div class="d-flex flex-column col-8">
                                <span>Enable Comment</span>
                                <p>The platform has no moderators. By enabling the comments, you will accept everything that
                                    will be written.</p>
                            </div>
                            <div class="form-check form-switch col p-0 d-flex justify-content-end align-items-center">
                                <input class="form-check-input" name="comment" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="yes" <?php echo (@$profile->is_comment=='yes') ? "checked":"" ?>>
                            </div>
                        </div>

                        <div class="mb-3 ciak-check d-flex flex-row">
                            <div class="d-flex flex-column col-8">
                                <span>Enable Share Profile</span>
                            </div>
                            <div class="form-check form-switch col p-0 d-flex justify-content-end align-items-center">
                                <input class="form-check-input" name="shareprofile" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="yes" <?php echo (@$profile->is_share=='yes') ? "checked":"" ?>>
                            </div>
                        </div>

                        <div class="mb-3 ciak-check d-flex flex-row">
                            <div class="d-flex flex-column col-8">
                                <span>Enable Email Share</span>
                            </div>
                            <div class="form-check form-switch col p-0 d-flex justify-content-end align-items-center">
                                <input class="form-check-input" name="shareemail" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="yes" <?php echo (@$profile->is_emailshare=='yes') ? "checked":"" ?>>
                            </div>
                        </div>

                        <div class="mb-3 ciak-check d-flex flex-row">
                            <div class="d-flex flex-column col-8">
                                <span>Enable Contact Share</span>
                            </div>
                            <div class="form-check form-switch col p-0 d-flex justify-content-end align-items-center">
                                <input class="form-check-input" name="sharecontact" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="yes" <?php echo (@$profile->is_kontakshare=='yes') ? "checked":"" ?>>
                            </div>
                        </div>
        
                        <div class="mb-3 ciak-connect d-flex flex-row justify-content-center align-items-center">
                            <h4 class="text-center">Connect your social platform to start share live real time</h4>
                        </div>
                        <div class="mb-3 ciak-connect d-flex flex-row flex-wrap justify-content-center">
                            <!-- FACEBOOK RTMP -->
                            <?php if(!empty($rtmp->facebook)) {?>
                                <div class="bg-live-connect">
                                    <div class="wrapper-border d-flex justify-content-between">
                                        <div class="ps-4 d-flex align-items-center">
                                            <svg width="15" height="27" viewBox="0 0 15 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.7008 15.1553L14.4559 10.3616H9.80422V7.24576C9.80422 5.93499 10.4536 4.65418 12.5303 4.65418H14.6749V0.572075C13.426 0.373093 12.164 0.265445 10.8992 0.25C7.07059 0.25 4.57106 2.54946 4.57106 6.70647V10.3616H0.327148V15.1553H4.57106V26.75H9.80422V15.1553H13.7008Z" fill="#337FFF"/>
                                            </svg>
                                            <span class="ps-2">
                                                CONNECTED
                                            </span>
                                        </div>
                                        <div class="pe-4">
                                            <a href="<?= base_url()?>profile/facebook_link" class="btn-main-green py-2" target="_blank">
                                                Revoke
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php }else{?>
                                <div class="bg-live-connect">
                                    <a href="<?= base_url()?>profile/facebook_link" class="wrapper-border d-flex justify-content-between align-items-center" target="_blank">
                                        <div class="ps-4">
                                            <svg width="15" height="27" viewBox="0 0 15 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.7008 15.1553L14.4559 10.3616H9.80422V7.24576C9.80422 5.93499 10.4536 4.65418 12.5303 4.65418H14.6749V0.572075C13.426 0.373093 12.164 0.265445 10.8992 0.25C7.07059 0.25 4.57106 2.54946 4.57106 6.70647V10.3616H0.327148V15.1553H4.57106V26.75H9.80422V15.1553H13.7008Z" fill="#337FFF"/>
                                            </svg>
                                        </div>
                                        <div class="pe-4">
                                            +
                                            <span>
                                                CONNECT YOUR ACCOUNT
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            <?php }?>

                            <!-- YOUTUBE RTMP -->
                            <?php if(!empty($rtmp->youtube)) {?>
                                <div class="bg-live-connect">
                                    <div class="wrapper-border d-flex justify-content-between">
                                        <div class="ps-4 d-flex align-items-center">
                                            <svg width="31" height="23" viewBox="0 0 31 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M30.2406 4.21048C29.8946 2.90957 28.8709 1.8833 27.5685 1.53157C25.2136 0.900391 15.7652 0.900391 15.7652 0.900391C15.7652 0.900391 6.32153 0.900391 3.96182 1.53157C2.66422 1.87848 1.64056 2.90475 1.28973 4.21048C0.660156 6.57139 0.660156 11.5004 0.660156 11.5004C0.660156 11.5004 0.660156 16.4294 1.28973 18.7903C1.63576 20.0912 2.65942 21.1175 3.96182 21.4692C6.32153 22.1004 15.7652 22.1004 15.7652 22.1004C15.7652 22.1004 25.2136 22.1004 27.5685 21.4692C28.8661 21.1223 29.8897 20.096 30.2406 18.7903C30.8702 16.4294 30.8702 11.5004 30.8702 11.5004C30.8702 11.5004 30.8702 6.57139 30.2406 4.21048Z" fill="#FF3000"/>
                                                <path d="M12.747 16.0439L20.5951 11.5004L12.747 6.95685V16.0439Z" fill="white"/>
                                            </svg>
                                            <span class="ps-2">
                                                CONNECTED
                                            </span>
                                        </div>
                                        <div class="pe-4">
                                            <a href="<?= base_url()?>profile/youtube_link" class="btn-main-green py-2" target="_blank">
                                                Revoke
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php }else{?>
                                <div class="bg-live-connect">
                                    <a href="<?= base_url()?>profile/youtube_link" class="wrapper-border d-flex align-items-center justify-content-around" target="_blank">
                                        <div>
                                            <svg width="31" height="23" viewBox="0 0 31 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M30.2406 4.21048C29.8946 2.90957 28.8709 1.8833 27.5685 1.53157C25.2136 0.900391 15.7652 0.900391 15.7652 0.900391C15.7652 0.900391 6.32153 0.900391 3.96182 1.53157C2.66422 1.87848 1.64056 2.90475 1.28973 4.21048C0.660156 6.57139 0.660156 11.5004 0.660156 11.5004C0.660156 11.5004 0.660156 16.4294 1.28973 18.7903C1.63576 20.0912 2.65942 21.1175 3.96182 21.4692C6.32153 22.1004 15.7652 22.1004 15.7652 22.1004C15.7652 22.1004 25.2136 22.1004 27.5685 21.4692C28.8661 21.1223 29.8897 20.096 30.2406 18.7903C30.8702 16.4294 30.8702 11.5004 30.8702 11.5004C30.8702 11.5004 30.8702 6.57139 30.2406 4.21048Z" fill="#FF3000"/>
                                                <path d="M12.747 16.0439L20.5951 11.5004L12.747 6.95685V16.0439Z" fill="white"/>
                                            </svg>
                                        </div>
                                        <div>
                                            +
                                            <span>
                                                CONNECT YOUR ACCOUNT
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            <?php }?>

                            <!-- INSTAGRAM RTMP -->
                            <div class="bg-live-connect">
                                <a href="<?= base_url()?>profile/instagram_link" class="wrapper-border d-flex justify-content-between align-items-center" target="_blank">
                                    <div class="ps-4">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_2655_14464)">
                                            <path d="M19.9062 0H6.09375C2.72826 0 0 2.72826 0 6.09375V19.9062C0 23.2717 2.72826 26 6.09375 26H19.9062C23.2717 26 26 23.2717 26 19.9062V6.09375C26 2.72826 23.2717 0 19.9062 0Z" fill="url(#paint0_radial_2655_14464)"/>
                                            <path d="M19.9062 0H6.09375C2.72826 0 0 2.72826 0 6.09375V19.9062C0 23.2717 2.72826 26 6.09375 26H19.9062C23.2717 26 26 23.2717 26 19.9062V6.09375C26 2.72826 23.2717 0 19.9062 0Z" fill="url(#paint1_radial_2655_14464)"/>
                                            <path d="M13.0009 2.84375C10.2427 2.84375 9.89645 2.85584 8.81319 2.90509C7.73195 2.95466 6.9939 3.12579 6.34816 3.37695C5.68009 3.63634 5.11347 3.98338 4.54898 4.54807C3.98399 5.11266 3.63695 5.67927 3.37675 6.34705C3.12488 6.99298 2.95354 7.73134 2.90489 8.81207C2.85645 9.89544 2.84375 10.2418 2.84375 13.0001C2.84375 15.7584 2.85594 16.1035 2.90509 17.1868C2.95486 18.268 3.12599 19.0061 3.37695 19.6518C3.63655 20.3199 3.98359 20.8865 4.54827 21.451C5.11266 22.016 5.67927 22.3639 6.34684 22.6233C6.99309 22.8744 7.73124 23.0455 8.81227 23.0951C9.89564 23.1444 10.2416 23.1565 12.9997 23.1565C15.7582 23.1565 16.1033 23.1444 17.1866 23.0951C18.2678 23.0455 19.0067 22.8744 19.653 22.6233C20.3207 22.3639 20.8865 22.016 21.4508 21.451C22.0158 20.8865 22.3627 20.3199 22.623 19.6521C22.8727 19.0061 23.0441 18.2678 23.0949 17.187C23.1436 16.1038 23.1562 15.7584 23.1562 13.0001C23.1562 10.2418 23.1436 9.89564 23.0949 8.81227C23.0441 7.73104 22.8727 6.99309 22.623 6.34735C22.3627 5.67927 22.0158 5.11266 21.4508 4.54807C20.8859 3.98318 20.3209 3.63614 19.6523 3.37705C19.0049 3.12579 18.2664 2.95455 17.1852 2.90509C16.1018 2.85584 15.7569 2.84375 12.9978 2.84375H13.0009ZM12.0898 4.67401C12.3603 4.6736 12.662 4.67401 13.0009 4.67401C15.7127 4.67401 16.0341 4.68376 17.105 4.73241C18.0952 4.7777 18.6327 4.94315 18.9907 5.08219C19.4647 5.26622 19.8026 5.4863 20.1578 5.84188C20.5133 6.19734 20.7333 6.53585 20.9178 7.00984C21.0569 7.36734 21.2225 7.90481 21.2676 8.89505C21.3162 9.96572 21.3268 10.2873 21.3268 12.9978C21.3268 15.7083 21.3162 16.0299 21.2676 17.1005C21.2223 18.0907 21.0569 18.6282 20.9178 18.9858C20.7338 19.4598 20.5133 19.7973 20.1578 20.1525C19.8024 20.508 19.4649 20.728 18.9907 20.9121C18.6331 21.0518 18.0952 21.2168 17.105 21.2621C16.0343 21.3108 15.7127 21.3213 13.0009 21.3213C10.289 21.3213 9.96755 21.3108 8.89698 21.2621C7.90674 21.2164 7.36927 21.051 7.01096 20.9119C6.53707 20.7278 6.19846 20.5078 5.84299 20.1523C5.48752 19.7969 5.26754 19.4592 5.083 18.985C4.94396 18.6274 4.77831 18.0899 4.73322 17.0997C4.68457 16.029 4.67482 15.7075 4.67482 12.9952C4.67482 10.2831 4.68457 9.96318 4.73322 8.89251C4.77852 7.90227 4.94396 7.3648 5.083 7.0068C5.26713 6.5328 5.48752 6.1943 5.84309 5.83883C6.19856 5.48336 6.53707 5.26327 7.01106 5.07884C7.36907 4.93919 7.90674 4.77415 8.89698 4.72865C9.83389 4.6863 10.197 4.6736 12.0898 4.67147V4.67401ZM18.4223 6.36035C17.7495 6.36035 17.2036 6.90574 17.2036 7.5787C17.2036 8.25155 17.7495 8.79745 18.4223 8.79745C19.0952 8.79745 19.6411 8.25155 19.6411 7.5787C19.6411 6.90584 19.0952 6.35995 18.4223 6.35995V6.36035ZM13.0009 7.78436C10.1206 7.78436 7.78527 10.1197 7.78527 13.0001C7.78527 15.8805 10.1206 18.2147 13.0009 18.2147C15.8813 18.2147 18.2158 15.8805 18.2158 13.0001C18.2158 10.1198 15.8811 7.78436 13.0007 7.78436H13.0009ZM13.0009 9.61462C14.8706 9.61462 16.3864 11.1302 16.3864 13.0001C16.3864 14.8698 14.8706 16.3856 13.0009 16.3856C11.1311 16.3856 9.61553 14.8698 9.61553 13.0001C9.61553 11.1302 11.1311 9.61462 13.0009 9.61462Z" fill="white"/>
                                            </g>
                                            <defs>
                                            <radialGradient id="paint0_radial_2655_14464" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(6.90625 28.0025) rotate(-90) scale(25.7679 23.9662)">
                                            <stop stop-color="#FFDD55"/>
                                            <stop offset="0.1" stop-color="#FFDD55"/>
                                            <stop offset="0.5" stop-color="#FF543E"/>
                                            <stop offset="1" stop-color="#C837AB"/>
                                            </radialGradient>
                                            <radialGradient id="paint1_radial_2655_14464" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(-4.3551 1.87291) rotate(78.681) scale(11.5184 47.4792)">
                                            <stop stop-color="#3771C8"/>
                                            <stop offset="0.128" stop-color="#3771C8"/>
                                            <stop offset="1" stop-color="#6600FF" stop-opacity="0"/>
                                            </radialGradient>
                                            <clipPath id="clip0_2655_14464">
                                            <rect width="26" height="26" fill="white"/>
                                            </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="pe-4">
                                        +
                                        <span>
                                            CONNECT YOUR ACCOUNT
                                        </span>
                                    </div>
                                </a>
                            </div>

                            <!-- TIKTOK RTMP -->
                            <div class="bg-live-connect">
                                <a href="<?= base_url()?>profile/tiktok_link" class="wrapper-border d-flex justify-content-between align-items-center" target="_blank">
                                    <div class="ps-4">
                                    <svg width="25" height="28" viewBox="0 0 25 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_2655_14472)">
                                        <path d="M18.5274 10.082C20.3515 11.3705 22.586 12.1286 24.9994 12.1286V7.53952C24.5426 7.53961 24.0871 7.4925 23.6402 7.39894V11.0112C21.227 11.0112 18.9928 10.2532 17.1684 8.96481V18.3299C17.1684 23.0149 13.325 26.8125 8.58437 26.8125C6.81553 26.8125 5.17139 26.2841 3.80566 25.3777C5.36445 26.9528 7.53828 27.9298 9.94316 27.9298C14.6842 27.9298 18.5276 24.1322 18.5276 19.447V10.082H18.5274ZM20.2042 5.45217C19.272 4.44581 18.6599 3.14526 18.5274 1.70741V1.11719H17.2395C17.5637 2.94462 18.6696 4.50586 20.2042 5.45217ZM6.8041 21.7827C6.28329 21.108 6.00176 20.2824 6.00303 19.4336C6.00303 17.291 7.76094 15.5536 9.92979 15.5536C10.3339 15.5534 10.7357 15.6147 11.1209 15.7354V11.0437C10.6707 10.9827 10.2164 10.9568 9.7623 10.9663V14.6181C9.37688 14.4973 8.97492 14.436 8.57061 14.4364C6.40186 14.4364 4.64404 16.1736 4.64404 18.3165C4.64404 19.8318 5.52266 21.1437 6.8041 21.7827Z" fill="#FF004F"/>
                                        <path d="M17.1686 8.96472C18.9931 10.2531 21.2271 11.0111 23.6404 11.0111V7.39884C22.2934 7.11527 21.1009 6.41971 20.2043 5.45217C18.6696 4.50577 17.5639 2.94453 17.2396 1.11719H13.8565V19.4469C13.8488 21.5837 12.0939 23.3139 9.92978 23.3139C8.65459 23.3139 7.52158 22.7133 6.8041 21.7826C5.52285 21.1437 4.64414 19.8317 4.64414 18.3166C4.64414 16.1738 6.40195 14.4365 8.5707 14.4365C8.98623 14.4365 9.38672 14.5004 9.7624 14.6182V10.9664C5.10498 11.0615 1.35938 14.822 1.35938 19.447C1.35938 21.7557 2.29209 23.8486 3.80596 25.3779C5.17168 26.2841 6.81572 26.8127 8.58467 26.8127C13.3254 26.8127 17.1687 23.0148 17.1687 18.3299V8.96481L17.1686 8.96472Z" fill="black"/>
                                        <path d="M23.6401 7.39876V6.42223C22.4254 6.42405 21.2346 6.08789 20.204 5.45218C21.1163 6.43914 22.3176 7.11975 23.6401 7.39895V7.39876ZM17.2393 1.1171C17.2084 0.9425 17.1846 0.766728 17.1682 0.590221V0H12.4969V18.3299C12.4895 20.4666 10.7346 22.1968 8.57031 22.1968C7.95676 22.1977 7.3516 22.0559 6.80371 21.7828C7.52119 22.7133 8.6542 23.3139 9.92939 23.3139C12.0935 23.3139 13.8485 21.5838 13.8562 19.447V1.1172H17.2393V1.1171ZM9.76231 10.9663V9.92658C9.37197 9.87383 8.97844 9.84744 8.58447 9.8476C3.84326 9.8476 0 13.6454 0 18.3299C0 21.2669 1.51045 23.8552 3.80576 25.3778C2.29189 23.8486 1.35918 21.7555 1.35918 19.4469C1.35918 14.822 5.10469 11.0614 9.76231 10.9663Z" fill="#00F2EA"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_2655_14472">
                                        <rect width="25" height="28" fill="white"/>
                                        </clipPath>
                                        </defs>
                                    </svg>
                                    </div>
                                    <div class="pe-4">
                                        +
                                        <span>
                                            CONNECT YOUR ACCOUNT
                                        </span>
                                    </div>
                                </a>
                            </div>

                            <!-- LINKEDIN RTMP -->
                            <div class="bg-live-connect">
                                <a href="<?= base_url()?>profile/linkedin_link" class="wrapper-border d-flex justify-content-between align-items-center" target="_blank">
                                    <div class="ps-4">
                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_2655_14469)">
                                            <path d="M22.6562 0.586028H2.34375C1.88287 0.581337 1.43896 0.759669 1.10941 1.08189C0.779865 1.40412 0.591604 1.84391 0.585938 2.30478V22.6993C0.592628 23.1595 0.78134 23.5983 1.11078 23.9197C1.44021 24.2411 1.88354 24.4188 2.34375 24.4142H22.6562C23.1172 24.4178 23.5608 24.2389 23.8901 23.9164C24.2195 23.594 24.4079 23.1543 24.4141 22.6934V2.29892C24.4058 1.8394 24.2166 1.40171 23.8874 1.08096C23.5583 0.760216 23.1158 0.582352 22.6562 0.586028Z" fill="#0076B2"/>
                                            <path d="M4.11328 9.51758H7.65039V20.8984H4.11328V9.51758ZM5.88281 3.85352C6.2885 3.85352 6.68508 3.97384 7.02237 4.19927C7.35966 4.4247 7.62251 4.7451 7.77767 5.11995C7.93284 5.49479 7.97333 5.90724 7.89404 6.3051C7.81476 6.70297 7.61924 7.06838 7.33224 7.35511C7.04524 7.64184 6.67964 7.837 6.2817 7.91591C5.88376 7.99482 5.47136 7.95393 5.09666 7.79841C4.72196 7.64289 4.40181 7.37973 4.1767 7.04223C3.95159 6.70472 3.83165 6.30803 3.83203 5.90234C3.83255 5.35878 4.04884 4.83766 4.43338 4.45348C4.81792 4.06931 5.33925 3.85352 5.88281 3.85352ZM9.86914 9.51758H13.2598V11.0801H13.3066C13.7793 10.1855 14.9316 9.24219 16.6523 9.24219C20.2344 9.23437 20.8984 11.5918 20.8984 14.6484V20.8984H17.3613V15.3613C17.3613 14.043 17.3379 12.3457 15.5234 12.3457C13.709 12.3457 13.4004 13.7832 13.4004 15.2754V20.8984H9.86914V9.51758Z" fill="white"/>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0_2655_14469">
                                            <rect width="25" height="25" fill="white"/>
                                            </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="pe-4">
                                        +
                                        <span>
                                            CONNECT YOUR ACCOUNT
                                        </span>
                                    </div>
                                </a>
                            </div>

                        </div>
        
                        <div class="mb-3 ciak-data-input d-grid gap-2">
                            <!-- <button class="btn-orange">Confirm</button> -->
                            <button id="confirmupdate" class="btn-green confirm-update">Confirm</button>
                        </div>
        
                    </form>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="modal_pp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Crop Your Image</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-8">  

                    <img src="" id="sample_image">
                </div>
                <div class="col-md-4">
                    <div class="preview"></div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="pp-crop-cancel" class="btn btn-orange">Cancel</button>
        <button type="button" id="pp-crop-saved" class="btn btn-main-green btn-crop-pp">Crop Save</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modal_banner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Crop Your Banner</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-8">  
                    <!--  default image where we will set the src via jquery-->
                    <img src="" id="sample_image_banner">
                </div>
                <div class="col-md-4">
                    <div class="preview_banner"></div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="pp-crop-cancel-banner" class="btn btn-orange">Cancel</button>
        <button type="button" id="pp-crop-saved-banner" class="btn btn-main-green">Crop Save</button>
      </div>
    </div>
  </div>
</div>

