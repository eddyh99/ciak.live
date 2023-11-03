
<!-- Modal Report -->
<!-- <div class="modal fade" id="modalReport<?= $dt->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Report</h1>
                <button type="button" class="modal-close-ciak" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body reportpost-wrapper">
                <h5>Why are you reporting this post?</h5>
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
</div> -->


<!-- Start Chart Ciak -->
<?php foreach($guestpost as $dt){?>
<div class="offcanvas offcanvas-bottom popup-bottom rounded-top" tabindex="-1" id="basketShopping<?= $dt->id?>"
    aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <button type="button" class="ms-auto btn-close text-reset" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small text-center pb-5">
        <h5 class="offcanvas-title mx-auto <?php echo ($dt->content_type == 'explicit') ? 'text-danger' : 'text-success'?>"  id="offcanvasBottomLabel">$2.00</h5>
        <p class="mt-1 mb-3">Are you sure to buy this post?</p>
        <form action="">
            <input type="hidden" value="id">
            <button  class="btn <?php echo ($dt->content_type == 'explicit') ? 'btn-orange' : 'btn-main-green'?> rounded-pill px-4">Confirm</button>
        </form>
    </div>
</div>
<?php }?>
<!-- End Chart Ciak -->

<div class="offcanvas offcanvas-bottom popup-bottom rounded-top" tabindex="-1" id="downloadPicture"
    aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <button type="button" class="ms-auto btn-close text-reset" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small text-center pb-5">
        <h5 class="offcanvas-title text-success mx-auto " id="offcanvasBottomLabel">$9.00</h5>
        <p class="mt-1 mb-3">Are you sure to download this picture?</p>
        <form action="">
            <input type="hidden" value="id">
            <button class="btn btn-main-green rounded-pill px-4">Confirm</button>
        </form>
    </div>
</div>



<div class="offcanvas offcanvas-bottom popup-bottom rounded-top" tabindex="-1" id="settingMenus"
    aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <button type="button" class="ms-auto btn-close text-reset" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small pb-5">
        <div class="d-flex flex-column setting-menus">
            <a href="#" id="post_id">Show post</a>
            <a class="text-danger" href="#" id="report_post">Report this post</a>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-bottom popup-bottom rounded-top" tabindex="-1" id="settingMenusSingle"
    aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <button type="button" class="ms-auto btn-close text-reset" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small pb-5">
        <div class="d-flex flex-column setting-menus">
            <a href="#" id="report_post">Report this post</a>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-bottom popup-bottom rounded-top" tabindex="-1" id="profileSettings"
    aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <button type="button" class="ms-auto btn-close text-reset" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small pb-5">
        <div class="d-flex flex-column setting-menus">
            <a href="#" id="profile_postid">Show post</a>
            <a href="<?= base_url()?>profile/setting_promotion" id="promote_post">Promote this post</a>
            <a href="#" id="delete_post" class="text-danger">Delete post</a>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-bottom popup-bottom rounded-top" tabindex="-1" id="profileSettingsSingle"
    aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <button type="button" class="ms-auto btn-close text-reset" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small pb-5">
        <div class="d-flex flex-column setting-menus">
            <a href="<?= base_url()?>profile/setting_promotion" id="promote_post">Promote this post</a>
            <a href="#" id="delete_post" class="text-danger">Delete post</a>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-bottom popup-bottom rounded-top" tabindex="-1" id="shareSosmed"
    aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <button type="button" class="ms-auto btn-close text-reset" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small pb-5">
        <div class="d-flex flex-row flex-wrap justify-content-around sosmed-menus">
            <a id="fbshare" target="_blank"><i class="fa-brands fa-facebook"></i></a>
            <a id="twittershare" target="_blank"><img src="<?= base_url()?>assets/img/new-ciak/x-share.png" alt="x"></a>
            <a id="teleshare" target="_blank"><i class="fa-brands fa-telegram"></i></a>
            <a id="linkedshare"><i class="fa-brands fa-linkedin"></i></a>
            <a id="washare" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
    </div>
</div>


<div class="offcanvas offcanvas-bottom popup-bottom rounded-top" tabindex="-1" id="blockeduser"
    aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <button type="button" class="ms-auto btn-close text-reset" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small text-center pb-5">
        <h5 class="offcanvas-title text-black mx-auto" id="offcanvasBottomLabel">Do you want block this person ?</h5>
        <p>If you block this user : </p>
        <i class="fas fa-times"></i> You can't see any post/picture from this user<br>
        <i class="fas fa-times"></i> You can't message to this user again<br>
        <i class="fas fa-times"></i> You can't purchase any content from this user<br>
        <i class="fas fa-times"></i> You can't subscribe this user anymore<br>
        <i class="fas fa-times"></i> You can't get further promotion from this user<br>
        <i class="fas fa-check"></i> Any subscription is still active for the residual period<br>
        <i class="fas fa-check"></i> You can access the special content you bought<br><br><br>
        <a href="#" id="block_user" class="btn-main-green rounded-pill px-4 mt-4">Confirm</a>
    </div>
</div>

<div class="offcanvas offcanvas-bottom popup-bottom rounded-top" tabindex="-1" id="unblockuser"
    aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <button type="button" class="ms-auto btn-close text-reset" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small text-center pb-5">
        <h5 class="offcanvas-title text-black mx-auto" id="offcanvasBottomLabel">Do you want unblock this person ?</h5><br><br>
        <a href="#" id="unblock_user" class="btn-main-green rounded-pill px-4 mt-4">Confirm</a>
    </div>
</div>