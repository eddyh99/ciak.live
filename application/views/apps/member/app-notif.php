<div class="row">
    <div class="col-11 col-lg-5 mx-auto">
        <div class="apps-body ptop pbot">
            <div class="apps-topbar alerts fixed-top light row">
                <div class="apps-member mx-auto col-12 col-lg-5">
                    <div class="alert-notif d-flex justify-content-between px-4 px-lg-0">
                        <div class="action-icon">
                            <a href="<?= base_url()?>homepage">
                                <i class="fa-solid fa-arrow-left"></i>
                            </a>
                        </div>
                        <div class="action">
                            <a href="" class="fs-5">Alerts</a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="apps-member light w-100">
                    <div class="d-flex justify-content-end clear-notif">
                        <a href="<?= base_url()?>notification/clear_notif">
                            Clear
                        </a>
                    </div>
                    <div class="app-notif">
                        <?php 
                            $last="";
                            foreach ($notif as $dt){
                                $to_time    = strtotime(date("Y-m-d H:i:s"));
                                $from_time  = strtotime($dt->timeinterval);
                                $selisih    = round(abs($to_time - $from_time) / 60);
                                if ($selisih<60){
                                    $notifstatus="Today";
                                    $waktu = (ceil($selisih/15)*15). " minutes ago";
                                }elseif ($selisih>60 && $selisih<1440){
                                    $notifstatus="Today";
                                    $waktu = round($selisih/60)." hour ago";
                                }elseif ($selisih>1440 & $selisih<2880){
                                    $notifstatus="yesterday";
                                    $waktu = "Yesterday";
                                }else{
                                    $datetime = new DateTime($dt->timeinterval);
                                    $la_time = new DateTimeZone($_SESSION["time_location"]);
                                    $datetime->setTimezone($la_time);
                                    $notifstatus= $datetime->format('Y-m-d');
                                    $waktu= $datetime->format('Y-m-d');
                                }
                        ?>
                                <div class="list-notif">
                                    <?php if ($last!=$notifstatus){?>
                                        <span class="title-date"><?=$notifstatus?></span>
                                    <?php 
                                        $last=$notifstatus;
                                    }?>
                                    <div class="massage">
                                    <?php if ($dt->status=="like"){?>
                                        <div class="icon rounded-circle span-text-toogle-explicit"><i class="fa-regular fa-heart"></i></div>
                                        <div class="info d-flex align-items-center justify-content-between">
                                            <div>
                                                <span class="matter"><b class="users">
                                                <b><?=$dt->username?></b> liked your post.</span>
                                                <span class="time"><?=$waktu?></span>
                                            </div>
                                            <a class="d-block ms-3 fs-4 text-decoration-none text-danger" href="<?=base_url()?>notification/delete_notif/<?=$dt->id?>/like">x</a>
                                        </div>
                                    <?php }elseif ($dt->status=="follow"){?>
                                        <div class="d-flex align-items-center justify-content-between my-3">
                                            <div class="d-flex flex-column align-items-strart justify-content-start">
                                                <div class="icon rounded-circle span-text-toogle-explicit"><i class="fa-solid fa-user-plus"></i></div>

                                                    <div class="info">
                                                        <span class="matter"><b class="users">
                                                            <b><?=$dt->username?></b> following you</span>
                                                            <span class="time"><?=$waktu?></span>
                                                    </div>
                                                </div>
                                            <div>
                                            <div class="d-flex align-items-center">

                                                
                                                <?php 
                                                    $i=1;
                                                    foreach($followers as $fd){
                                                        if($fd->username ==  $dt->username){
                                                ?>
                                                    <input type="button" value="<?=($fd->is_follow=="yes"?"Unfollow":"Follow")?>" id="user<?=$i?>" class="btn-main-green py-1 px-3 rounded <?=($fd->is_follow=="yes"?"active":"")?>" onclick="actionFollow('<?=$i?>','<?=$fd->id?>')">
                                                <?php 
                                                        $i++;
                                                    }}
                                                ?> 
                                                <a class="d-block ms-3 fs-4 text-decoration-none text-danger" href="<?=base_url()?>notification/delete_notif/<?=$dt->id?>/follow">x</a>
                                            </div>

                                        </div>
                                    <?php }elseif ($dt->status=="new post"){?>
                                        <div class="icon rounded-circle span-text-toogle-explicit"><i class="fa-regular fa-envelope"></i></div>
                                        <div class="info d-flex align-items-center justify-content-between">
                                            <div>
                                                <span class="matter">
                                                    <b class="users">
                                                        New Post From <b><?=$dt->username?></b></span>
                                                <span class="time"><?=$waktu?></span>
                                            </div>
                                            <a class="d-block ms-3 fs-4 text-decoration-none text-danger" href="<?=base_url()?>notification/delete_notif/<?=$dt->id?>/post">x</a>
                                        </div>
                                    <?php }elseif ($dt->status=="subscribe"){?>
                                        <div class="icon rounded-circle span-text-toogle-explicit"><i class="fa-solid fa-sack-dollar"></i></div>
                                        <div class="info d-flex align-items-center justify-content-between">
                                            <div>
                                                <span class="matter"><b class="users">
                                                        New Subscriber From <b><?=$dt->username?></b></span>
                                                <span class="time"><?=$waktu?></span>
                                            </div>
                                            <a class="d-block ms-3 fs-4 text-decoration-none text-danger" href="<?=base_url()?>notification/delete_notif/<?=$dt->id?>/subscribe">x</a>
                                        </div>
                                    <?php }elseif ($dt->status=="tip"){?>
                                        <div class="icon rounded-circle span-text-toogle-explicit"><i class="fa-solid fa-dollar-sign"></i></div>
                                        <div class="info d-flex align-items-center justify-content-between">
                                            <div>
                                                <span class="matter"><b class="users">
                                                        New Tip From <b><?=$dt->username?></b></span>
                                                <span class="time"><?=$waktu?></span>
                                            </div>
                                            <a class="d-block ms-3 fs-4 text-decoration-none text-danger" href="<?=base_url()?>notification/delete_notif/<?=$dt->id?>/tip">x</a>
                                        </div>
                                    <?php } ?>
                            </div>
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>

            <!-- THIS CODE FOR EMPTY MESSAGE -->
            <?php if(empty($notif)){?>
            <div class="d-flex justify-content-center mt-5 pt-5">
                <img class="empty-notif" src="<?= base_url()?>assets/img/new-ciak/empty-notif.png" alt="empty">
            </div>
            <?php }?>
        </div>
    </div>
</div>