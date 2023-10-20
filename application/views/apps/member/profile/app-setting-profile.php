

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
                    <?php if(@$profile->header == 'https://api.sandbox.ciak.live/users/images/background/default.png') {?>
                        <img src="" class="banner-images img-banner-setting img-banner-default">
                    <?php } else {?>
                        <img src="<?=@$profile->header?>" alt="" class="banner-images img-banner-setting">
                    <?php } ?>
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

                                    <?php if(@$profile->profile == 'https://api.sandbox.ciak.live/users/images/profiles/default.png') {?>
                                        <img src="" class="rounded-circle img-pp-setting img-pp-default">
                                    <?php } else {?>
                                        <img src="<?=@$profile->profile ?>" class="rounded-circle img-pp-setting">
                                    <?php } ?>

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
                            <textarea name="bio" id="bio" class="form-control" cols="30" rows="10"><?=@$profile->bio?></textarea>
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
                            <div class="bg-live-connect">
                                <a href="<?= base_url()?>profile/facebook_link" class="wrapper-border d-flex justify-content-around" target="_blank">
                                    <div>
                                        <svg width="15" height="27" viewBox="0 0 15 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.7008 15.1553L14.4559 10.3616H9.80422V7.24576C9.80422 5.93499 10.4536 4.65418 12.5303 4.65418H14.6749V0.572075C13.426 0.373093 12.164 0.265445 10.8992 0.25C7.07059 0.25 4.57106 2.54946 4.57106 6.70647V10.3616H0.327148V15.1553H4.57106V26.75H9.80422V15.1553H13.7008Z" fill="#337FFF"/>
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
                            <div class="bg-live-connect">
                                <a href="<?= base_url()?>profile/youtube_link" class="wrapper-border d-flex justify-content-around" target="_blank">
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
                            <div class="bg-live-connect">
                                <a href="" class="wrapper-border d-flex justify-content-around" >
                                    <div>
                                        <i class="fas fa-plus-circle fs-3"></i>
                                    </div>
                                    <div>
                                        <span>
                                            ADD CUSTOM RTMP
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

