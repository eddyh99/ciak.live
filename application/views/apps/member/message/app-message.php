<div class="row">
    <div class="col-11 col-lg-5 mx-auto">
        <div class="apps-body ptop pbot">
            <?php
            if (isset($botbar)) {
                $this->load->view($botbar);
            }
            ?>
            <div class="apps-topbar alerts fixed-top light row">
                <div class="apps-member mx-auto col-12 col-lg-5">
                    <div class="alert-notif d-flex justify-content-between px-4 px-lg-0">
                        <div class="action-icon">
                            <a href="<?= base_url()?>homepage">
                                <i class="fa-solid fa-arrow-left"></i>
                            </a>
                        </div>
                        <div class="action">
                            <a class="span-text-toogle-explicit fs-5">Messages</a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="apps-member light w-100">
                    <div class="app-notif">
                        <div class="list-notif">
                            <div class="search">
                                <input type="text" name="search_data" id="search_data" class="form-control" placeholder="Who do you want to chat with?">
                                <i class="fa-solid fa-magnifying-glass span-text-toogle-explicit"></i>
                            </div>
                        </div>
                        <div id="suggestionslist"></div>                        

                        <div class="list-notif">
                            <?php foreach ($lastchat as $dt){
                            ?>
                            <div class="d-flex align-items-center justify-content-between wrapping-message b-bottom ">
                                <div>
                                    <a href="<?= base_url()?>message/message_detail/<?=$dt->ucode?>" class="text-decoration-none">
                                        <div class="massage d-flex justify-content-between align-items-start">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="icon rounded-circle">
                                                    <img src="<?=$dt->profile?>" alt="mp" class="d-block img-fluid">
                                                </div>
                                                <div class="info">
                                                    <span class="matter">
                                                        <b class="users "><?=$dt->username?></b> 
                                                    </span>
                                                    <span id="preview-message" class="time"><?=substr($dt->chat_message,0,50)."..."?></span>
                                                </div>
                                            </div>
                                        </div >
                                    </a>
                                </div>
                                <div class="user-message-delete d-flex align-items-center">
                                    <div class="timeago">
                                        <?php 
                                                $to_time    = strtotime(date("Y-m-d H:i:s"));
                                                $from_time  = strtotime($dt->timestamp);
                                                $selisih    = round(abs($to_time - $from_time) / 60);
                                                if ($selisih<60){
                                                    echo $selisih. " minutes ago";
                                                }elseif ($selisih>60 && $selisih<1440){
                                                    echo round($selisih/60)." hour ago";
                                                }elseif ($selisih>1440 & $selisih<2880){
                                                    echo "Yesterday";
                                                }else{
                                                    $datetime = new DateTime($dt->timestamp);
                                                    $la_time = new DateTimeZone($_SESSION["time_location"]);
                                                    $datetime->setTimezone($la_time);
                                                    echo $datetime->format('Y-m-d H:i:s');
                                                }
                                            ?>
                                    </div>
                                    <a class="fs-4 text-decoration-none text-danger ms-3" href="<?=base_url()?>message/delete_message/<?=$dt->to_user_id?>">x</a>
                                </div>
                            </div>
                            <?php } ?>
                        </div> 
                    </div>
                </div>
            </div>

            <!-- THIS CODE FOR EMPTY MESSAGE -->
            <!-- <div class="d-flex justify-content-center mt-5 pt-5">
                <img src="<?= base_url()?>assets/img/empty-message.png" alt="empty">
            </div> -->
        </div>
    </div>
</div>