<input type="text" id="postid" value="<?= @$post_id ?>">
<input type="hidden" id="jenis" value="Post">
<input type="hidden" id="is_mediatype" value="<?= @$edit->post_media[0]->media_type?>">
<input type="hidden" id="is_extension" value="<?= @$edit->post_media[0]->media_type?>">

<div id="load-edit-profile" style="display: none;">
    <div class="img-load d-flex flex-column justify-content-center align-items-center">
        <div class="spinner-border fs-3" role="status">
            <span class="visually-hidden fs-3">Loading...</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-11 col-lg-5 mx-auto">
        <div class="apps-body ptop pbot">
            <div class="apps-topbar alerts fixed-top light row">
                <div class="apps-member border-none mx-auto col-12 col-lg-5">
                    <div class="alert-notif d-flex justify-content-between px-4 px-lg-0">
                        <div class="action-icon">
                            <a id="discard-post" href="<?= base_url()?>homepage" class="text-primary">
                                Delete
                            </a>
                        </div>
                        <div class="action">
                            <a class="span-text-toogle-explicit fs-5" id="title-post">Edit Post</a>
                        </div>
                        <div class="action">
                            <button id="btnUpdate" class="text-white btn-publish px-3 py-2">Update</button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="apps-member light w-100 mt-2">
                
                    <!-- Start Posting Section-->
                    <div id="Post" class="wrap-posting">
                        <div class="mb-3 ms-5">
                            <select name="contentype" id="contentype" class="form-select select-posting-type">
                                <option value="explicit" <?= ($edit->content_type == "explicit") ? "selected" : "" ?> >Explicit</option>
                                <option value="non explicit" <?= ($edit->content_type == "non explicit") ? "selected" : "" ?>>Non Explicit</option>
                            </select>
                        </div>
                        <div class="d-flex">
                            <div class="write-img d-flex flex-column justify-content-start align-items-center">
                                <img class="img-fluid" src="<?=$edit->profile?>" height="50" width="50" alt="mp">
                                <div class="pt-3 position-relative icon-posting">
                                    <a href="" class="position-relative" id="toggle-iconpost">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="0.5" y="0.5" width="31" height="31" rx="15.5" fill="#181A1C"/>
                                            <path d="M16 12V16M16 16V20M16 16H20M16 16H12" stroke="#ECEBED" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                            <rect x="0.5" y="0.5" width="31" height="31" rx="15.5" stroke="#323436"/>
                                        </svg>
                                    </a>
                                    <!-- Hidden Icon -->
                                    <div class="position-absolute hidden-icon" style="z-index: 9999" id="hidden-iconpost">
                                        <div class="d-flex flex-column gap-3 ">
                                            <div>
                                                <label for="upload_image" class="icon-upload-video">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3.33334 13.3335L7.155 9.51183C7.46755 9.19938 7.8914 9.02385 8.33334 9.02385C8.77528 9.02385 9.19912 9.19938 9.51167 9.51183L13.3333 13.3335M11.6667 11.6668L12.9883 10.3452C13.3009 10.0327 13.7247 9.85719 14.1667 9.85719C14.6086 9.85719 15.0325 10.0327 15.345 10.3452L16.6667 11.6668M11.6667 6.66683H11.675M5 16.6668H15C15.442 16.6668 15.866 16.4912 16.1785 16.1787C16.4911 15.8661 16.6667 15.4422 16.6667 15.0002V5.00016C16.6667 4.55814 16.4911 4.13421 16.1785 3.82165C15.866 3.50909 15.442 3.3335 15 3.3335H5C4.55798 3.3335 4.13405 3.50909 3.82149 3.82165C3.50893 4.13421 3.33334 4.55814 3.33334 5.00016V15.0002C3.33334 15.4422 3.50893 15.8661 3.82149 16.1787C4.13405 16.4912 4.55798 16.6668 5 16.6668Z" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </label>
                                            </div>
                                            <input type="file" name="upload_image" id="upload_image" accept=".jpeg, .jpg, .png, .heic" hidden/>                                            
                                            <div>
                                                <label for="upload_video" class="icon-upload-video">
                                                    <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0 2.33333C0 1.04635 0.996528 0 2.22222 0H11.1111C12.3368 0 13.3333 1.04635 13.3333 2.33333V11.6667C13.3333 12.9536 12.3368 14 11.1111 14H2.22222C0.996528 14 0 12.9536 0 11.6667V2.33333ZM19.4132 1.30521C19.7743 1.50938 20 1.90312 20 2.33333V11.6667C20 12.0969 19.7743 12.4906 19.4132 12.6948C19.0521 12.899 18.6146 12.8771 18.2708 12.6365L14.9375 10.3031L14.4444 9.95677V9.33333V4.66667V4.04323L14.9375 3.69687L18.2708 1.36354C18.6111 1.12656 19.0486 1.10104 19.4132 1.30521Z" fill="white"/>
                                                    </svg>
                                                </label>
                                            </div>
                                            <input type="file" name="upload_video" id="upload_video" accept="video/*" hidden/>
                                            <div>
                                                <label for="upload_attch" class="icon-upload-attach" style="cursor: pointer;">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.6433 5.83339L7.155 11.3217C6.99582 11.4755 6.86885 11.6594 6.7815 11.8627C6.69415 12.0661 6.64817 12.2848 6.64625 12.5061C6.64433 12.7274 6.6865 12.9468 6.7703 13.1516C6.8541 13.3565 6.97785 13.5426 7.13434 13.699C7.29083 13.8555 7.47692 13.9793 7.68174 14.0631C7.88657 14.1469 8.10604 14.1891 8.32734 14.1871C8.54863 14.1852 8.76733 14.1392 8.97067 14.0519C9.17401 13.9645 9.35792 13.8376 9.51167 13.6784L14.8567 8.19006C15.4639 7.56138 15.7998 6.71937 15.7922 5.84538C15.7847 4.9714 15.4341 4.13535 14.8161 3.51733C14.198 2.8993 13.362 2.54874 12.488 2.54114C11.614 2.53355 10.772 2.86953 10.1433 3.47672L4.7975 8.96422C3.85974 9.90198 3.33291 11.1739 3.33291 12.5001C3.33291 13.8263 3.85974 15.0981 4.7975 16.0359C5.73526 16.9737 7.00714 17.5005 8.33333 17.5005C9.65953 17.5005 10.9314 16.9737 11.8692 16.0359L17.0833 10.8334" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </label>
                                                <input type="file" name="upload_attch" id="upload_attch" 
                                                    accept=".doc, .docx, .pdf, .pptx, .ppt, 
                                                            .xls, .xlsx, .mp3, .wav, .mp4a, 
                                                            .ogg, .weba, .heic, .jpg, .png,
                                                            .gif, .mp4, .webm, .m4v, .mov"    
                                                    hidden multiple />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="write-posting ps-3 pt-2 w-100">
                                <input type="text" id="title-optional-post" class="title-optional-post" placeholder="Title (optional)" maxlength="100" value="<?= @$edit->title_article?>">
                                <textarea id="edit-textarea-post"><?php echo @base64_decode($edit->article)?></textarea>
                                <h4 id="header-preview-text">Preview Attachment</h4>
                                <div id="attch-preview-post">
                                    <ul class="attch-preview-post"></ul>
                                </div>
                                <div id="img-preview-post" class="img-preview-post">
                                    <div id="carouselPreviewImg" class="carousel slide" data-bs-interval="false">
                                        <div class="carousel-inner">
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselPreviewImg" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselPreviewImg" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Posting Section -->
                    <div id="progressbar-wrapper" class="fixed-top d-none">
                        <div class="progress" id="progressbar" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-striped bg-success" id="progress-bar" style="width: 00%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="apps-botbar fixed-bottom row">
                <?php if(empty($stitch)){?>
                <div class="row mx-auto d-flex justify-content-between col-12 col-lg-5 px-3" id="post-type">
                    <div class="py-4">
                        <div class="d-flex justify-content-between">
                            <div>
                                <select id="tipepost" name="tipepost" class="form-select select-posting-type">
                                    <option value="public" <?= ($edit->type == "public") ? "selected" : "" ?>>Public</option>
                                    <option value="private" <?= ($edit->type == "private") ? "selected" : "" ?>>Private</option>
                                    <option value="special" <?= ($edit->type == "special") ? "selected" : "" ?>>Special</option>
                                    <option value="download" <?= ($edit->type == "download") ? "selected" : "" ?>>Download</option>
                                </select>
                            </div>
                            <span id="forsubs-wrap" style="display: none;">
                                <input type="checkbox" id="forsubs" value="Free">
                                <label for="forsubs" id="label-forsubs" class="span-text-toogle-explicit">Free For Subscriber</label>
                            </span>
                            <input type="text" id="postprice" name="postprice" value="<?= ($edit->price == '0.00') ? 'Free' : $edit->price ?>" class="selected-posting-type <?= ($edit->type == 'private') ? 'd-none' : '' ?> "> 
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="tuieditor" tabindex="-1" data-bs-keyboard="false" aria-labelledby="setprice" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
                <div class="modal-header">
                    <!-- <h1 class="modal-title fs-5 text-white" id="setprice">Edit Image</h1> -->
                    <div>
                        <img src="<?= base_url()?>assets/img/new-ciak/logo.png" width="70" class="img-fluid" alt="logo">
                    </div>
                    <button type="button" class="btn-close text-white" style="filter: brightness(0) invert(1);" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body body-post-setprice" style="height: 80vh;">
                    <div class="h-100 col-12 col-xl-8 mx-auto">
                        <div id="tui-image-editor-container"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="tui-image-editor-download-btn">Finish</button>
                </div>
        </div>
    </div>
</div>

<!-- Modal For Image Post -->
<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body text-white p-5 d-flex justify-content-center gap-2">
            <!-- <a id="single-photo" class="btn-main-green text-white add-textarea-local" href="<?= base_url()?>post/upload_image">Single Photo</a> -->
            <a class="btn-upload-image text-white add-textarea-local" href="<?= base_url()?>post/upload_images">Upload Image</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Set Price Subcription 
<?php if(($get_price->sub7 == '0.00') && ($get_price->sub30 == '0.00') && 
        ($get_price->sub365 == '0.00') && ($get_price->trial == '0.00') &&
        ($get_price->trial_long == '0')){
            ?> -->
    <div class="modal fade" id="setprice_modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="setprice" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-white" id="setprice">Warning</h1>
                    <!-- <button type="button" class="btn-close text-white" style="filter: brightness(0) invert(1);" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body body-post-setprice">
                    <div class="col-12 text-center text-white">
                        You must set subscription pricing before you post a private post.
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?=base_url()?>profile/setting_profile#subcription" class="btn-main-green">Set Price</a>
                </div>
        </div>
    </div>
    </div>
<?php }?>

