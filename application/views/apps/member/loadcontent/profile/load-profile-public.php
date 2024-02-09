<?php
    foreach ($allpost as $dt){
        if(($dt->content_type == 'explicit' && @$_COOKIE['content'] === 'yes') || $dt->content_type == 'non explicit') {
            if ($dt->type=="public"){
?>
            <div class="apps-member">
                <div class="posts-member">
                    <div class="post-member <?php echo ($dt->content_type == 'explicit') ? 'explicit-border' : ''?> px-4">
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
                                <h1 class="<?php echo (empty($dt->title_article) ? 'd-none' : 'd-block')?>">
                                    <?= @$dt->title_article?>
                                </h1>
                                <article class="article">
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
                                <article class="article">
                                    <?php echo @base64_decode($dt->article)?>
                                </article>

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
                                <?php if($dt->is_comment == 'yes'){?>
                                    <div class="icon svg share" id="icon-comment" onclick="checkCountComment('<?= $dt->id?>','<?= count($dt->comment)?>')" style="cursor: pointer;">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_2952_16435)">
                                                <path d="M10.9727 3.4176C15.3827 3.4176 18.9727 7.0076 18.9727 11.4176C18.9727 15.8276 15.3827 19.4176 10.9727 19.4176C9.79266 19.4176 8.63266 19.1576 7.54266 18.6376C7.27266 18.5076 6.98266 18.4476 6.68266 18.4476C6.49266 18.4476 6.30266 18.4776 6.12266 18.5276L2.92266 19.4676L3.86266 16.2676C4.00266 15.7976 3.96266 15.2876 3.75266 14.8476C3.23266 13.7576 2.97266 12.5976 2.97266 11.4176C2.97266 7.0076 6.56266 3.4176 10.9727 3.4176ZM10.9727 1.4176C5.45266 1.4176 0.972656 5.8976 0.972656 11.4176C0.972656 12.9576 1.33266 14.3976 1.94266 15.7076L-0.0273438 22.4176L6.68266 20.4476C7.99266 21.0576 9.43266 21.4176 10.9727 21.4176C16.4927 21.4176 20.9727 16.9376 20.9727 11.4176C20.9727 5.8976 16.4927 1.4176 10.9727 1.4176Z" fill="white"/>
                                                <path d="M5.70739 14H5.15341L6.75568 9.63636H7.30114L8.90341 14H8.34943L7.04545 10.3267H7.01136L5.70739 14ZM5.91193 12.2955H8.14489V12.7642H5.91193V12.2955ZM9.5831 14V9.63636H10.0859V11.2472H10.1286C10.1655 11.1903 10.2166 11.1179 10.282 11.0298C10.3487 10.9403 10.4439 10.8608 10.5675 10.7912C10.6925 10.7202 10.8615 10.6847 11.0746 10.6847C11.3501 10.6847 11.593 10.7536 11.8033 10.8913C12.0135 11.0291 12.1776 11.2244 12.2955 11.4773C12.4134 11.7301 12.4723 12.0284 12.4723 12.3722C12.4723 12.7188 12.4134 13.0192 12.2955 13.2734C12.1776 13.5263 12.0142 13.7223 11.8054 13.8615C11.5966 13.9993 11.3558 14.0682 11.0831 14.0682C10.8729 14.0682 10.7045 14.0334 10.5781 13.9638C10.4517 13.8928 10.3544 13.8125 10.2862 13.723C10.218 13.6321 10.1655 13.5568 10.1286 13.4972H10.0689V14H9.5831ZM10.0774 12.3636C10.0774 12.6108 10.1136 12.8288 10.1861 13.0178C10.2585 13.2053 10.3643 13.3523 10.5036 13.4588C10.6428 13.5639 10.8132 13.6165 11.0149 13.6165C11.2251 13.6165 11.4006 13.5611 11.5412 13.4503C11.6832 13.3381 11.7898 13.1875 11.8608 12.9986C11.9332 12.8082 11.9695 12.5966 11.9695 12.3636C11.9695 12.1335 11.9339 11.9261 11.8629 11.7415C11.7933 11.5554 11.6875 11.4084 11.5455 11.3004C11.4048 11.1911 11.228 11.1364 11.0149 11.1364C10.8104 11.1364 10.6385 11.1882 10.4993 11.2919C10.3601 11.3942 10.255 11.5376 10.1839 11.7223C10.1129 11.9055 10.0774 12.1193 10.0774 12.3636ZM14.571 14.0682C14.2642 14.0682 14 13.9957 13.7784 13.8509C13.5568 13.706 13.3864 13.5064 13.267 13.2521C13.1477 12.9979 13.0881 12.7074 13.0881 12.3807C13.0881 12.0483 13.1491 11.755 13.2713 11.5007C13.3949 11.245 13.5668 11.0455 13.7869 10.902C14.0085 10.7571 14.267 10.6847 14.5625 10.6847C14.7926 10.6847 15 10.7273 15.1847 10.8125C15.3693 10.8977 15.5206 11.017 15.6385 11.1705C15.7564 11.3239 15.8295 11.5028 15.858 11.7074H15.3551C15.3168 11.5582 15.2315 11.4261 15.0994 11.3111C14.9688 11.1946 14.7926 11.1364 14.571 11.1364C14.375 11.1364 14.2031 11.1875 14.0554 11.2898C13.9091 11.3906 13.7947 11.5334 13.7124 11.718C13.6314 11.9013 13.5909 12.1165 13.5909 12.3636C13.5909 12.6165 13.6307 12.8366 13.7102 13.0241C13.7912 13.2116 13.9048 13.3572 14.0511 13.4609C14.1989 13.5646 14.3722 13.6165 14.571 13.6165C14.7017 13.6165 14.8203 13.5938 14.9268 13.5483C15.0334 13.5028 15.1236 13.4375 15.1974 13.3523C15.2713 13.267 15.3239 13.1648 15.3551 13.0455H15.858C15.8295 13.2386 15.7592 13.4126 15.647 13.5675C15.5362 13.7209 15.3892 13.843 15.206 13.9339C15.0241 14.0234 14.8125 14.0682 14.571 14.0682Z" fill="white"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_2952_16435">
                                                    <rect width="24" height="24" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                <?php }?>
                                
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
                        <?php if($dt->is_comment == 'yes'){?>
                            <div id="comment<?= $dt->id?>" class="comment m-3">
                                <div class="sticky">
                                    <div class="user-input-comment d-flex justify-content-between align-items-center py-2 px-3">
                                        <input type="text" id="inputcomment_<?=$dt->id?>" onkeyup="javascript: if(event.keyCode == 13) postcomment('<?=$dt->id?>', '<?= $_SESSION['username']?>', '<?= $_SESSION['profile']?>');" class="w-100" placeholder="Write a comment">
                                        <span class="f-jakarta btn-comment">
                                            <button type="button" id="publishcomment" onclick="postcomment('<?=$dt->id?>', '<?= $_SESSION['username']?>', '<?= $_SESSION['profile']?>')">Publish</button>
                                        </span>
                                    </div>
                                </div>
                                <div id="avail-comment-loading<?= $dt->id?>" class="avail-comment-loading d-none">
                                    <div class=" d-flex flex-column justify-content-center align-items-center">
                                        <div class="spinner-border fs-5" role="status">
                                            <span class="visually-hidden fs-5">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                <div id="avail-comment<?= $dt->id?>" class="avail-comment">
                                    <div class="prev-comment">
                                        <?php 
                                            if(!empty($dt->comment)){
                                                foreach($dt->comment as $comment){?>
                                                    <div class="user-comment d-flex align-items-start">
                                                        <div class="d-flex align-items-start">
                                                            <img src="<?= $comment->profile?>" width="30" height="30" alt="" class="rounded-circle">
                                                            <div class="ms-2">
                                                                <span class="fw-bold"><?= $comment->username?></span>
                                                                <p style="white-space: pre-line;word-wrap: break-word;"><?= $comment->comment?></p>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="mt-2 px-3">
                                                            <i class="fa-regular fa-heart"></i>
                                                        </div> -->
                                                    </div>
                                                <?php }
                                                if(count($dt->comment) >= 2){
                                                ?>
                                                    <div id="read-all-comment<?= $dt->id?>" class="read-all-comment">
                                                        <a style="cursor: pointer;" onclick="read_all_comment('<?=$dt->id?>')">Read all comments</a>
                                                    </div>
                                            <?php  
                                                    } 
                                                }
                                            ?>
                                    </div>
                                </div>
                            </div> 
                        <?php }?>
                    </div>
                </div>
            </div>
          
<?php 
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
