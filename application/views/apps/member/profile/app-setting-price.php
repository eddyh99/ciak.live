<div class="apps-body">
    <?php
    if (isset($popup)) {
        $this->load->view($popup);
    }
    ?>
    <div class="row">
        <div class="apps-member mx-auto col-12 col-lg-5">
            <div class="banner-profile w-100">
                <img src="<?= $profile->header?>" alt="" class="banner-images">
            </div>
            <div class="profile">
                <div class="d-flex flex-row position-relative">
                    <a href="<?= base_url()?>profile" class="cancel ms-3 me-auto">Discard</a>
                    <div class="img-profile">
                        <div class="img rounded-circle">
                            <img src="<?= $profile->profile ?>" alt="" class="rounded-circle">
                        </div>
                    </div>
                </div>
            </div>
            <div class="title-apps text-center w-100 mt-5 mb-3">
                <h4>Subscription</h4>
            </div>
            <div class="biodata mt-5 px-4 mb-5 pb-4">
                <form action="<?=base_url()?>profile/savesubscription" method="post">
                    <div class="mb-3 ciak-data-input">
                        <label for="weekly" class="form-label">Weekly</label>
                        <input type="text" class="form-control" name="weekly" id="weekly" value="<?=(empty($pricing->sub7)) ? 0 :$pricing->sub7; ?>">
                    </div>
                    <div class="mb-3 ciak-data-input">
                        <label for="monthly" class="form-label">Monthly</label>
                        <input type="text" class="form-control" name="monthly" id="monthly" value="<?=(empty($pricing->sub30)) ? 0 :$pricing->sub30; ?>">
                    </div>
                    <div class="mb-3 ciak-data-input">
                        <label for="yearly" class="form-label">Yearly</label>
                        <input type="text" class="form-control" name="yearly" id="yearly" value="<?=(empty($pricing->sub365)) ? 0 :$pricing->sub365; ?>">
                    </div>
    
                    <div class="mb-3 ciak-check d-flex flex-row">
                        <div class="d-flex flex-column col-8">
                            <span>Trial Subscription</span>
                        </div>
                        <div class="form-check form-switch col p-0 d-flex justify-content-end align-items-center">
                            <input class="form-check-input" id="is_trial" name="is_trial" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="yes" <?php echo (@$pricing->trial_long>0) ? "checked":"" ?>>
                        </div>
                    </div>
                    <div id="trial">
                        <div class="mb-3 ciak-data-input">
                            <label for="yearly" class="form-label">Trial</label>
                            <select name="triallong" class="form-select">
                                <option value="1">1 day</option>
                                <option value="2">2 days</option>
                                <option value="3">3 days</option>
                                <option value="4">4 days</option>
                                <option value="5">5 days</option>
                                <option value="6">6 days</option>
                            </select>
                        </div>
                        <div class="mb-3 ciak-data-input">
                            <label for="yearly" class="form-label">Trial Amount</label>
                            <input type="text" class="form-control" id="trialamount" name="trialamount" value="<?=(empty($pricing->trial)) ? 0 :$pricing->trial; ?>">
                        </div>
                    </div>
                    <div class="mb-3 ciak-data-input d-grid gap-2 pt-3">
                        <!-- <button class="btn-orange">Confirm</button> -->
                        <button type="submit" class="btn-main-green">Update</button>
                    </div>
    
                </form>
            </div>
        </div>
    </div>
</div>