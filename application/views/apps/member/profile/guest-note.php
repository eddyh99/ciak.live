<div class="row">
    <div class="col-11 col-lg-5 mx-auto">
        <div class="apps-body ptop pbot">
            <div class="apps-topbar alerts fixed-top light row">
                <div class="mt-5 mx-auto col-12 col-lg-5">
                    <div class="alert-notif d-flex justify-content-between px-4 px-lg-0">
                        <div class="action-icon">
                            <a href="<?= base_url()?>profile/guest_profile/<?=$ucode?>" class="span-text-toogle-explicit">
                                <i class="fa-solid fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="apps-member light w-100">
                    <p class="span-text-toogle-explicit">CREATE NOTE FOR THIS USER</p>
                    <form action="<?=base_url()?>profile/savenote" method="POST">

                        <input type="hidden" name="guest_ucode" value="<?=$ucode?>">
                        <div>
                            <select id="guestnote" class="guest-note-select2 w-50" name="guestnote">
                                <option></option>
                                <?php 
                                    foreach ($note as $dt){ 
                                ?>
                                    <option value="<?=$dt->note?>" <?php echo (!empty($dt->id_guest)) ? "selected":"" ?>><?=$dt->note?></option>
                                <?php }?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-main-green py-2 px-5 mt-4">Send Note</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>