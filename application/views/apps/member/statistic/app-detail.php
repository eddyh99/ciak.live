<div class="apps-body">
    <div class="apps-topbar alerts fixed-top light row">
        <div class="apps-member mx-auto col-12 col-lg-5">
            <div class="alert-notif d-flex justify-content-between px-4 px-lg-0">
                <div class="action-icon">
                    <a href="<?= base_url()?>statistic">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                </div>
                <div class="header-list">
                    <span class="fs-5">Detail <?= @$detail?></span>
                </div>
            </div>
        </div>
    </div>
    <?php if(@$detail == 'Category List'){?>
        <div class="row pb-5">
            <div class="apps-member col-12 col-lg-5 mx-auto my-5 py-5">
                <div class="list-people">
                        <div class="accordion pt-4 px-2" id="accordionExample">
                            <?php 
                                $temp = '';
                                $temp_class = '';
                                $counter = 0;
                                foreach($category as $dt){                            
                            ?>
                            <?php $counter++;?>
                            <div class="accordion-item">
                            <?php if($temp == $dt->note){ ?>
                                <div id="collapse<?= $temp_class?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <a href="<?=base_url()?>profile/guest_profile/<?=$dt->ucode?>" class="text-decoration-none">
                                                    <img src="<?= $dt->profile?>" class="rounded-circle" width="40" heigth="40" alt="pp">
                                                    <span class="text-white ps-2"><?= $dt->username?></span>
                                                </a>
                                            </div>
                                            <div class="text-white">
                                                <a href="<?=base_url()?>statistic/removenote/<?=$dt->ucode?>" class="text-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                
                            <?php }else {?>
                                <?php 
                                    $temp = $dt->note;
                                    if(preg_match('/\s/', $temp)){
                                        $temp_class = str_replace(' ', '_', $temp);
                                    } 
                                ?>

                                    <h2 class="accordion-header">
                                        <button class="accordion-button text-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $temp_class?>" aria-expanded="true" aria-controls="collapse<?= $temp_class?>">
                                            #<?= $dt->note?>
                                        </button>
                                    </h2>
                                    <div id="collapse<?= $temp_class?>" class="accordion-collapse collapse <?php echo ($counter == 1) ? 'show' : ''; ?>" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">

                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <a href="<?=base_url()?>profile/guest_profile/<?=$dt->ucode?>" class="text-decoration-none">
                                                        <img class="rounded-circle" src="<?= $dt->profile?>" width="40" heigth="40" alt="pp">
                                                        <span class="text-white ps-2"><?= $dt->username?></span>
                                                    </a>
                                                </div>
                                                <div class="text-white">
                                                    <a href="<?=base_url()?>statistic/removenote/<?=$dt->ucode?>" class="text-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    
                            <?php }?>
                            </div>
                            <?php }?>

                            <!-- <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Category 2
                                </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Category 3
                                </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                            </div> -->

                        </div>
                </div>
            </div>
        </div>
    <?php }elseif(@$detail == 'Subscription'){?>
        <div class="row pb-5">
            <div class="apps-member col-12 col-lg-5 mx-auto my-5 py-5">
                <div class="tabs-profiles text-center m-3">
                    <ul class="nav nav-tabs">
                        <li class="nav-item w-50">
                            <a class="nav-link active" href="#active" id="login-tab" data-bs-toggle="tab">Active</a>
                        </li>
                        <li class="nav-item ps-4 w-50">
                            <a class="nav-link" href="#expired" id="register-tab" data-bs-toggle="tab">Expired</a>
                        </li>
                    </ul>
                    <div class="tab-content mb-5 pb-5">
                        <div id="active" class="tab-pane active text-white">
                            <div class="apps-member col-12 mx-auto">
                                <div class="list-people mb-on-botbar">
                                    <?php 
                                        $now=date("Y-m-d");
                                        foreach ($subscription as $dt){
                                            if ($dt->date_end>$now){
                                    ?>
                                                <a href="<?=base_url()?>profile/guest_profile/<?=$dt->ucode?>" class="w-100 h-100 d-block text-decoration-none">
                                                    <div class="people">
                                                            <img src="<?=$dt->profile?>" alt="image" class="rounded-circle me-3">
                                                            <h4 class="names my-0 me-auto"><?=$dt->username?></h4>
                                                    </div>
                                                </a>
                                    <?php }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div id="expired" class="tab-pane fade">
                            <div class="apps-member col-12 mx-auto">
                                <div class="list-people mb-on-botbar">
                                    <?php 
                                        $now=date("Y-m-d");
                                        foreach ($subscription as $dt){
                                            if ($dt->date_end<$now){
                                    ?>
                                                <a href="<?=base_url()?>profile/guest_profile/<?=$dt->ucode?>" class="w-100 h-100 d-block text-decoration-none">
                                                    <div class="people">
                                                            <img src="<?=$dt->profile?>" alt="image" class="rounded-circle me-3">
                                                            <h4 class="names my-0 me-auto"><?=$dt->username?></h4>
                                                    </div>
                                                </a>
                                    <?php }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } elseif (@$detail == 'Subscriber') {?>
        <div class="row pb-5">
            <div class="apps-member col-12 col-lg-5 mx-auto my-5 py-5">
                <div class="tabs-profiles text-center m-3">
                    <ul class="nav nav-tabs">
                        <li class="nav-item w-50">
                            <a class="nav-link active" href="#active" id="login-tab" data-bs-toggle="tab">Active</a>
                        </li>
                        <li class="nav-item ps-4 w-50">
                            <a class="nav-link" href="#expired" id="register-tab" data-bs-toggle="tab">Expired</a>
                        </li>
                    </ul>
                    <div class="tab-content mb-5 pb-5">
                        <div id="active" class="tab-pane active text-white">
                            <div class="apps-member col-12 mx-auto">
                                <div class="list-people mb-on-botbar">
                                    <?php 
                                        $now=date("Y-m-d");
                                        foreach ($subscriber as $dt){
                                            if ($dt->date_end>$now){
                                    ?>
                                                <a href="<?=base_url()?>profile/guest_profile/<?=$dt->ucode?>" class="w-100 h-100 d-block text-decoration-none">
                                                    <div class="people">
                                                            <img src="<?=$dt->profile?>" alt="image" class="rounded-circle me-3">
                                                            <h4 class="names my-0 me-auto"><?=$dt->username?></h4>
                                                    </div>
                                                </a>
                                    <?php }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div id="expired" class="tab-pane fade">
                           <div class="apps-member col-12 mx-auto">
                                <div class="list-people mb-on-botbar">
                                    <?php 
                                        $now=date("Y-m-d");
                                        foreach ($subscriber as $dt){
                                            if ($dt->date_end>$now){
                                    ?>
                                                <a href="<?=base_url()?>profile/guest_profile/<?=$dt->ucode?>" class="w-100 h-100 d-block text-decoration-none">
                                                    <div class="people">
                                                            <img src="<?=$dt->profile?>" alt="image" class="rounded-circle me-3">
                                                            <h4 class="names my-0 me-auto"><?=$dt->username?></h4>
                                                    </div>
                                                </a>
                                    <?php }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } elseif (@$detail == 'Following') {?>
        <div class="row pb-5">
            <div class="apps-member col-12 col-lg-5 mx-auto my-5 py-5">
                <div class="list-people mt-5 mb-on-botbar">
                    <?php 
                        $i=1;
                        foreach ($following as $dt){?>
                        
                            <div class="people px-4">
                                <a href="<?=base_url()?>profile/guest_profile/<?=$dt->ucode?>" class="w-100 h-100 d-block text-decoration-none d-flex">
                                    <img src="<?=$dt->profile?>" alt="image" class="rounded-circle me-3">
                                    <h4 class="names my-auto me-auto"><?=$dt->username?></h4>
                                </a>
                                <input type="button" value="Unfollow" id="user<?=$i?>" class="btn-main-green active py-1 px-3 rounded" onclick="actionFollow('<?=$i?>','<?=$dt->id?>')">
                            </div>
                    <?php $i++;}?>
                </div>
            </div>
        </div>
    <?php } elseif (@$detail == 'Followers') {?>
        <div class="row pb-5">
            <div class="apps-member col-12 col-lg-5 mx-auto my-5 py-5">
                <div class="list-people mt-5 mb-on-botbar">
                    <?php
                        $i=1;
                        foreach ($followers as $dt){?>
                        <div class="people px-4">
                            <a href="<?=base_url()?>profile/guest_profile/<?=$dt->ucode?>" class="w-100 h-100 d-block text-decoration-none d-flex">
                                <img src="<?=$dt->profile?>" alt="image" class="rounded-circle me-3">
                                <h4 class="names my-auto me-auto"><?=$dt->username?></h4>
                            </a>
                            <input type="button" value="<?=($dt->is_follow=="yes"?"Unfollow":"Follow")?>" id="user<?=$i?>" class="btn-main-green py-1 px-3 rounded <?=($dt->is_follow=="yes"?"active":"")?>" onclick="actionFollow('<?=$i?>','<?=$dt->id?>')">
                        </div>
                    <?php $i++;}?>
                </div>
            </div>
        </div>
    <?php } elseif (@$detail == 'Bookmarks') {?>
        <div class="row pb-5">
            <div class="apps-member col-12 col-lg-5 mx-auto my-5 py-5">
                <div class="list-people mt-5 mb-on-botbar">
                    <?php foreach($bookmarks as $dt){?>
                        <div class="people px-4">
                            <a href="<?=base_url()?>profile/guest_profile/<?=$dt->ucode?>" class="w-100 h-100 d-block text-decoration-none d-flex">
                                <img src="<?=$dt->profile?>" alt="image" class="rounded-circle me-3">
                                <h4 class="names my-auto me-auto"><?=$dt->username?></h4>
                                <h4 class="names my-auto me-auto"><?=$dt->post_time?></h4>
                            </a>
                            <a href="" class="icon bookmark"><i class="fa-regular fa-bookmark"></i></a>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    <?php } elseif (@$detail == 'Blocked Users') {?>
        <div class="row pb-5">
            <div class="apps-member col-12 col-lg-5 mx-auto my-5 py-5">
                <div class="list-people mt-5 mb-on-botbar">
                    <?php foreach ($blocked as $dt){?>
                        <div class="people px-4">
                            <a href="<?=base_url()?>profile/guest_profile/<?=$dt->ucode?>" class="w-100 h-100 d-block text-decoration-none d-flex">
                                <img src="<?=$dt->profile?>" alt="image" class="rounded-circle me-3">
                                <h4 class="names my-auto me-auto"><?=$dt->username?></h4>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php }  ?>
</div>