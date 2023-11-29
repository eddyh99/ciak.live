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
