<input type="hidden" id="jenis" value="Post">
<!-- <input type="hidden" id="id_stitch" value="<?= @$stitch->id?>"> -->
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
                    <?php if (@isset($_SESSION["error"])) { ?>
                        <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="notif-login f-poppins"><?= $_SESSION["error"] ?></span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>
                    <div class="alert-notif d-flex justify-content-between px-4 px-lg-0">
                        <div class="action-icon">
                            <a id="discard-post" href="<?= base_url()?>homepage" class="text-primary">
                                Delete
                            </a>
                        </div>
                        <div class="action">
                            <a class="span-text-toogle-explicit fs-5" id="title-post"></a>
                        </div>
                        <div class="action">
                            <button id="btnpublish" class="text-white btn-publish px-3 py-2">Publish</button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="apps-member light w-100">
               
                    <!-- Start Posting Section-->
                    <div id="Post" class="wrap-posting tabcontent">
                        <div class="d-flex">
                            <div class="write-img d-flex flex-column justify-content-start align-items-center">
                                <img class="img-fluid" src="<?=$profile->profile?>" height="50" width="50" alt="mp">
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
                                                <a href="" data-bs-toggle="modal" data-bs-target="#postModal" >
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3.33334 13.3335L7.155 9.51183C7.46755 9.19938 7.8914 9.02385 8.33334 9.02385C8.77528 9.02385 9.19912 9.19938 9.51167 9.51183L13.3333 13.3335M11.6667 11.6668L12.9883 10.3452C13.3009 10.0327 13.7247 9.85719 14.1667 9.85719C14.6086 9.85719 15.0325 10.0327 15.345 10.3452L16.6667 11.6668M11.6667 6.66683H11.675M5 16.6668H15C15.442 16.6668 15.866 16.4912 16.1785 16.1787C16.4911 15.8661 16.6667 15.4422 16.6667 15.0002V5.00016C16.6667 4.55814 16.4911 4.13421 16.1785 3.82165C15.866 3.50909 15.442 3.3335 15 3.3335H5C4.55798 3.3335 4.13405 3.50909 3.82149 3.82165C3.50893 4.13421 3.33334 4.55814 3.33334 5.00016V15.0002C3.33334 15.4422 3.50893 15.8661 3.82149 16.1787C4.13405 16.4912 4.55798 16.6668 5 16.6668Z" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </a>
                                            </div>
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
                                <input type="text" id="title-optional-post" class="title-optional-post" placeholder="Title (optional)" maxlength="100">
                                <textarea id="textarea-post"></textarea>
                                <h4 id="header-preview-text">Preview Attachment</h4>
                                <div id="attch-preview-post"></div>
                                <div id="img-preview-post" class="img-preview-post">
                                    <div id="carouselPreviewImg" class="carousel slide" data-bs-interval="false">
                                        <div class="carousel-inner">
                                            <!-- <div class="carousel-item active d-flex justify-content-center">
                                                <video src="<?= base_url()?>assets/img/new-ciak/ip.mp4" class="d-block" controls width="280" height="300"></video>
                                                <span class="close-img-post fs-5">X</span>
                                            </div> -->
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
                                
                                
                                <!-- <?php if(!empty($stitch)){?>
                                <div id="vs-preview" class="vs-preview mt-3 mb-5 pb-5">
                                    <div class="row">
                                        <div class="col-11 mx-auto bg-vs-preview p-4">
                                            <div class="header-vs-preview d-flex align-items-center justify-content-start">    
                                                <a href="<?=base_url()?>profile/post/<?= $stitch->id?>" class="text-decoration-none text-white">
                                                    <img src="<?= $stitch->profile ?>" alt="img" class="profile-vs-preview rounded-circle">
                                                    <span class="mx-2"><?= $stitch->username?></span>
                                                </a>      
                                                <svg class="fillicon-vs-preview" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1864_26196)">
                                                        <path d="M11.6687 4.0698V2.0498C9.65875 2.2498 7.82875 3.0498 6.34875 4.2598L7.76875 5.6898C8.87875 4.8298 10.2087 4.2498 11.6687 4.0698ZM6.35875 7.0998L4.92875 5.6798C3.71875 7.1598 2.91875 8.9898 2.71875 10.9998H4.73875C4.91875 9.5398 5.49875 8.20981 6.35875 7.0998ZM4.73875 12.9998H2.71875C2.91875 15.0098 3.71875 16.8398 4.92875 18.3198L6.35875 16.8898C5.49875 15.7898 4.91875 14.4598 4.73875 12.9998ZM6.34875 19.7398C7.82875 20.9498 9.66875 21.7498 11.6687 21.9498V19.9298C10.2087 19.7498 8.87875 19.1698 7.76875 18.3098L6.34875 19.7398ZM22.6688 11.9998C22.6688 17.1598 18.7488 21.4198 13.7188 21.9498V19.9298C17.6388 19.4098 20.6688 16.0498 20.6688 11.9998C20.6688 7.9498 17.6388 4.5898 13.7188 4.0698V2.0498C18.7488 2.5798 22.6688 6.8398 22.6688 11.9998Z" />
                                                        <path d="M12.6289 9.02L10.0689 16H8.36895L5.80895 9.02H7.30895L9.22895 14.57L11.1389 9.02H12.6289ZM15.8783 16.07C15.3917 16.07 14.9517 15.9867 14.5583 15.82C14.1717 15.6533 13.865 15.4133 13.6383 15.1C13.4117 14.7867 13.295 14.4167 13.2883 13.99H14.7883C14.8083 14.2767 14.9083 14.5033 15.0883 14.67C15.275 14.8367 15.5283 14.92 15.8483 14.92C16.175 14.92 16.4317 14.8433 16.6183 14.69C16.805 14.53 16.8983 14.3233 16.8983 14.07C16.8983 13.8633 16.835 13.6933 16.7083 13.56C16.5817 13.4267 16.4217 13.3233 16.2283 13.25C16.0417 13.17 15.7817 13.0833 15.4483 12.99C14.995 12.8567 14.625 12.7267 14.3383 12.6C14.0583 12.4667 13.815 12.27 13.6083 12.01C13.4083 11.7433 13.3083 11.39 13.3083 10.95C13.3083 10.5367 13.4117 10.1767 13.6183 9.87C13.825 9.56333 14.115 9.33 14.4883 9.17C14.8617 9.00333 15.2883 8.92 15.7683 8.92C16.4883 8.92 17.0717 9.09667 17.5183 9.45C17.9717 9.79667 18.2217 10.2833 18.2683 10.91H16.7283C16.715 10.67 16.6117 10.4733 16.4183 10.32C16.2317 10.16 15.9817 10.08 15.6683 10.08C15.395 10.08 15.175 10.15 15.0083 10.29C14.8483 10.43 14.7683 10.6333 14.7683 10.9C14.7683 11.0867 14.8283 11.2433 14.9483 11.37C15.075 11.49 15.2283 11.59 15.4083 11.67C15.595 11.7433 15.855 11.83 16.1883 11.93C16.6417 12.0633 17.0117 12.1967 17.2983 12.33C17.585 12.4633 17.8317 12.6633 18.0383 12.93C18.245 13.1967 18.3483 13.5467 18.3483 13.98C18.3483 14.3533 18.2517 14.7 18.0583 15.02C17.865 15.34 17.5817 15.5967 17.2083 15.79C16.835 15.9767 16.3917 16.07 15.8783 16.07Z" />
                                                    </g>
                                                    <defs>
                                                    <clipPath id="clip0_1864_26196">
                                                    <rect width="24" height="24"  transform="translate(0.668945)"/>
                                                    </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <span class="date-vs-preview">
                                                
                                                <?php 
                                                    $to_time    = strtotime(date("Y-m-d H:i:s"));
                                                    $from_time  = strtotime($stitch->post_time);
                                                    $selisih    = round(abs($to_time - $from_time) / 60);
                                                    if ($selisih<60){
                                                        echo $selisih. " minutes ago";
                                                    }elseif ($selisih>60 && $selisih<1440){
                                                        echo round($selisih/60)." hour ago";
                                                    }elseif ($selisih>1440 & $selisih<2880){
                                                        echo "Yesterday";
                                                    }else{
                                                        $datetime = new DateTime($stitch->post_time);
                                                        $la_time = new DateTimeZone($_SESSION["time_location"]);
                                                        $datetime->setTimezone($la_time);
                                                        echo $datetime->format('Y-m-d H:i:s');
                                                    }
                                                ?>
                                                
                                            </span>
                                            <div class="content-vs-preview mt-2">
                                                <p>
                                                    <?php echo @base64_decode($stitch->article) ?>
                                                </p>
                                                <div class="owl-carousel owl-vs owl-theme" >
                                                    <?php 
                                                        if (!empty($stitch->post_media)){
                                                            foreach ($stitch->post_media as $imgpost){
                                                                if ($imgpost->media_type=='non attach'){
                                                    ?>
                                                        <div class="item">
                                                            <div class="img">
                                                                <?php if (substr($imgpost->imgorg,-3) == "mp4"){?>
                                                                    <div class="vid-post">
                                                                        <video width="100%" height="375" loop poster="" controls controlsList="nodownload" class="d-block mx-auto videoplayer-post"> 
                                                                            <source src="<?=@$imgpost->imgorg?>" type="video/mp4">
                                                                        </video>                                               
                                                                    </div>
                                                                <?php }else{?>
                                                                    <img src="<?= $imgpost->imgorg ?>" alt="image" class="imgcontent-vs-preview rounded">
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
                                    </div>
                                </div>
                                <?php }?> -->
                                

                            </div>
                        </div>
                    </div>
                    <!-- End Posting Section -->

                    <!-- Start Live Section-->
                    <div id="Live" class="wrap-posting tabcontent">
                        <form action="<?=base_url()?>post/simpanlive" method="post" id="liveshow" onsubmit="return validate()">
                            <input type="hidden" name="content_type" value="<?= $_GET['type']?>">
                            <div class="row live-schedule-settings d-flex align-items-start">
                                <div class="col-6 wrap-live-top d-block">
                                    <div class="d-flex align-items-center">
                                        <label class="pe-3 span-text-toogle-explicit">Starting Time</label>
                                        <select id="time" name="time" class="form-select select-posting-type" required>
                                            <option value="now">Now</option>
                                            <option value="schedule">Schedule</option>
                                        </select>
                                    </div>
                                    <input type="text" id="schedule" name="schedule" class="form-control my-3" placeholder="Select your schedule" autocomplete="off">
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <label class="pe-3 span-text-toogle-explicit">Selection</label>
                                    <select id="selection" name="selection" class="form-select select-posting-type" required>
                                        <option value="public">Public</option>
                                        <option value="follower">Follower</option>
                                        <option value="subscriber">Subscriber</option>
                                    </select>
                                </div>
                            </div>
                            <div class="my-3 row live-price-minute">
                                <div class="col-6 wrap-live-price-minute">
                                    <div class="d-flex align-items-center">
                                        <label class="pe-3 span-text-toogle-explicit">Price/minute</label>
                                        <select id="pilih_price" name="pilih_price" class="form-select select-posting-type" required>
                                            <option value="free">Free</option>
                                            <option value="ticket">Ticket</option>
                                            <option value="minutes">Per Minutes</option>
                                        </select>
                                    </div>
                                    <input type="text" name="priceshow" id="priceshow" class="form-control my-3 money-input" value="0.5" placeholder="price">
                                </div>
                            </div>
                            <div id="row_durasi" class="row live-duration mb-3">
                                <div class="col-6 wrap-live-duration d-flex align-items-center">
                                    <label class="pe-3 span-text-toogle-explicit">Durasi</label>
                                    <select name="durasi" id="durasi" class="form-select select-live-duration">
                                        <option value="15">15 Minutes</option>
                                        <option value="30">30 Minutes</option>
                                        <option value="45">45 Minutes</option>
                                        <option value="60">1 Hours</option>
                                        <option value="90">1 Hours 30 minutes</option>
                                        <option value="120">2 Hours</option>
                                        <option value="150">2 Hours 30 minutes</option>
                                        <option value="180">3 Hours</option>
                                        <option value="210">3 Hours 30 minutes</option>
                                        <option value="240">4 Hours</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row live-description mb-3">
                                <div class="col-10 wrap-live-description d-flex">
                                    <input type="text" class="form-control"  name="deskripsi" id="deskripsi" placeholder="Description" maxlength="150" required>
                                </div>
                                <label class="span-text-toogle-explicit">Max 150</label>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="text-white btn-publish px-3 py-2">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- End Live Section -->

                    <!-- Start Cam2cam Section -->
                    <div id="Cam2cam" class=" wrap-posting tabcontent">
                        <form action="<?=base_url()?>post/simpancam" method="post" id="showcam" onsubmit="return validatecam()">
                            <input type="hidden" name="content_type" value="<?= $_GET['type']?>">
                            <input type="hidden" id="guestcam" name="guestcam">
                            <div class="row live-description mb-3">
                                <div class="col-10 wrap-live-description">
                                    <input type="text" class="form-control" name="deskripsi" id="descam" placeholder="Description" maxlength="150" required>
                                </div>
                                <label class="span-text-toogle-explicit">Max 150</label>
                            </div>
                            <div class="live-price-minute">
                                <div class="d-flex align-items-center wrap-live-price-minute col-12 col-md-4">
                                    <label class="pe-3 span-text-toogle-explicit">Price/minute</label>
                                    <input type="text" class="form-control money-input" name="priceshow" id="pricecam" placeholder="price">
                                </div>
                            </div>
                            <div class="my-4" style="cursor: pointer;">
                                <a data-bs-toggle="modal" data-bs-target="#guestModal" class="btn-leave-live" >Invite Guest</a>
                            </div>
                            <div class="my-5 d-flex align-items-center preview-cam2cam-guest d-none">
                                <img id="img-preview-cam2cam-guest"  width="50" height="auto" class="rounded-circle me-3">
                                <h5 id="username-preview-cam2cam-guest" class="my-auto"></h5>
                                <i id="check-preview-cam2cam-guest" class="fas fs-3 ms-3 text-success me-auto"></i>
                            </div>
                            <div class="col-3 mt-3">
                                <button class="btn-publish text-white px-3 py-2">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- End Cam2cam section -->

                    <!-- Start Meeting Room section -->
                    <div id="Meeting" class="wrap-posting tabcontent">
                        <form action="<?=base_url()?>post/simpanmeeting" method="post" id="showmeeting">
                            <input type="hidden" id="meetingcam" name="meetingcam">
                            <div class="row live-description mb-3">
                                <div class="col-10 wrap-live-description">
                                    <input type="text" class="form-control" name="deskripsi" id="descam" placeholder="Description" maxlength="150" required>
                                </div>
                                <label class="span-text-toogle-explicit">Max 150</label>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <label class="pe-3 span-text-toogle-explicit">Type Meeting</label>
                                <select name="meetingtype" class="form-select select-posting-type">
                                    <option value="public">Public</option>
                                    <option value="private">Private</option>
                                </select>
                            </div>
                            <div class="row my-4 d-flex align-items-center">
                                <div class="col-7 col-md-4">
                                    <input type="radio" id="invite1" name="guestinvite" value="invite" required data-bs-toggle="modal" data-bs-target="#meetingModal">
                                    <label for="invite1" style="cursor: pointer;">
                                        <a data-bs-toggle="modal" data-bs-target="#meetingModal" class="btn-leave-live">Invite Guest</a>
                                    </label>
                                </div>
                                <div class="col-5">
                                    <input type="radio" id="invite2" name="guestinvite" value="alone" style="cursor: pointer;">
                                    <label for="invite2" style="cursor: pointer;" class="span-text-toogle-explicit">
                                        Start Alone
                                    </label>
                                </div>
                            </div>
                            <div class="my-5 d-flex align-items-center preview-meeting-guest d-none">
                                <img id="img-preview-meeting-guest"  width="50" height="auto" class="rounded-circle me-3">
                                <h5 id="username-preview-meeting-guest" class="my-auto"></h5>
                                <i id="check-preview-meeting-guest" class="fas fs-3 ms-3 text-success me-auto"></i>
                            </div>
                            <div class="col-3">
                                <button class="btn-publish text-white px-3 py-2">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- End Meeting Room section -->
                    <div id="progressbar-wrapper" class="fixed-top d-none">
                        <div class="progress" id="progressbar" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-striped bg-success" id="progress-bar" style="width: 00%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="apps-botbar fixed-bottom row">
                <div class="row" id="post-type">
                    <?php if(empty($stitch)){?>
                    <div class="mx-auto d-flex justify-content-between col-12 col-lg-5 px-3 py-4">
                        <div>
                            <select id="tipepost" name="tipepost" class="form-select select-posting-type">
                                <option value="public">Public</option>
                                <option value="private">Private</option>
                                <option value="special">Special</option>
                                <option value="download">Download</option>
                            </select>
                        </div>
                        <span id="forsubs-wrap" style="display: none;">
                            <input type="checkbox" id="forsubs" value="Free">
                            <label for="forsubs" id="label-forsubs" class="span-text-toogle-explicit">Free For Subscriber</label>
                        </span>
                        <input type="text" id="postprice" name="postprice" value="Free" class="selected-posting-type" readonly>
                    </div>
                </div>
                <?php }?>
                <div class="apps-member mx-auto col-12 col-lg-5">
                    <div class="tab-post d-flex justify-content-around">
                        <button class="tablinks" onclick="openTabs(event, 'Post')" id="defaultOpen">POST</button>
                        <button class="tablinks" onclick="openTabs(event, 'Live')">LIVE</button>
                        <button class="tablinks" onclick="openTabs(event, 'Cam2cam')">CAM2CAM</button>
                        <button class="tablinks" onclick="openTabs(event, 'Meeting')">MEETING ROOM</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Set Price Subcription -->
<?php if(($get_price->sub7 == '0.00') && ($get_price->sub30 == '0.00') && 
        ($get_price->sub365 == '0.00') && ($get_price->trial == '0.00') &&
        ($get_price->trial_long == '0')){
?>
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

<!-- Modal Cam2cam Invite Guest-->
<div class="modal fade" id="guestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body text-white d-flex justify-content-center gap-2">
            <div class="row col-10">
                <div class="apps-member col-12 mx-auto ">
                    <div class="d-flex justify-content-center mt-4 search-input-guest">
                        <input type="text" name="search_data_invt" id="search_data_invt" class="form-control search_data_invt" placeholder="Search minimun 3 character...">
                    </div>
                    <div id="suggestionslist"></div>
                    <div class="list-people mt-5 mb-on-botbar">
                        <?php 
                            $i=1;
                            foreach ($follower as $dt){?>
                                <div class="people people-cam2cam<?= $dt->id?> px-4">
                                    <a class="w-100 h-100 d-block text-decoration-none d-flex" onclick="invite_guest_active('<?= $dt->id?>', '<?= $dt->profile?>','<?= $dt->username?>')" data-bs-dismiss="modal">
                                        <img src="<?=$dt->profile?>" alt="image" class="rounded-circle me-3">
                                        <h4 class="names my-auto me-auto"><?=$dt->username?></h4>
                                    </a>
                                </div>
                        <?php $i++;}?>
                    </div>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Meeting Room Invite Guest-->
<div class="modal fade" id="meetingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body text-white d-flex justify-content-center gap-2">
            <div class="row col-10">
                <div class="apps-member col-12 mx-auto">
                    <div class="d-flex justify-content-center mt-4 search-input-guest">
                        <input type="text" name="search_data_invt_meeting" id="search_data_invt_meeting" class="form-control search_data_invt_meeting" placeholder="Search minimun 3 character...">
                    </div>
                    <div id="suggestionslistmeeting"></div>  
                    <div class="list-people mt-5 mb-on-botbar">
                        <?php 
                            $i=1;
                            foreach ($follower as $dt){?>
                                
                                <div class="people people-cam2cam<?= $dt->id?> px-4">
                                    <a class="w-100 h-100 d-block text-decoration-none d-flex" onclick="invite_guest_active('<?= $dt->id?>', '<?= $dt->profile?>','<?= $dt->username?>')" data-bs-dismiss="modal">
                                        <img src="<?=$dt->profile?>" alt="image" class="rounded-circle me-3">
                                        <h4 class="names my-auto me-auto"><?=$dt->username?></h4>
                                    </a>
                                </div>
                        <?php 
                                if($i == 10) break;
                                $i++;
                            }?>
                    </div>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>