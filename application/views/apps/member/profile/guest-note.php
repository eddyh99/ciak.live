<div class="row">
    <div class="col-11 col-lg-5 mx-auto">
        <div class="apps-body ptop pbot">
            <div class="apps-topbar alerts fixed-top light row">
                <div class="mt-5 mx-auto col-12 col-lg-5">
                    <div class="alert-notif d-flex justify-content-between px-4 px-lg-0">
                        <div class="action-icon">
                            <a href="<?= base_url()?>profile/guest_profile/<?=$ucode?>" class="span-text-toogle-explicit">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="0.5" width="31" height="31" rx="15.5" fill="#ECEBED"/>
                                    <rect x="0.5" y="0.5" width="31" height="31" rx="15.5" stroke="#323436"/>
                                    <path d="M14.6667 20.6666L10 15.9999M10 15.9999L14.6667 11.3333M10 15.9999H22" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="apps-member light w-100">
                    <p class="span-text-toogle-explicit">CREATE NOTE FOR THIS USER 
                        <span>
                            <i class="far fa-question-circle" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="it will easier for you to remember the user by your own way"></i>
                        </span>
                    </p>
                    <form action="<?=base_url()?>profile/savenote" method="POST">

                        <input type="hidden" name="guest_ucode" value="<?=$ucode?>">
                        <div>
                            <select id="guestnote" class="guest-note-select2 w-100" name="guestnote">
                                <option></option>
                                <?php 
                                    foreach ($note as $dt){ 
                                ?>
                                    <option value="<?=$dt->note?>" <?php echo (!empty($dt->id_guest)) ? "selected":"" ?>><?=$dt->note?></option>
                                <?php }?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-main-green py-2 px-5 mt-4">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>