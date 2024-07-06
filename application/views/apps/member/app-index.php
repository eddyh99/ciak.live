<div class="apps-body pbot">
    <div class="apps-topbar px-4 row">
        <div class="apps-member col-12 col-lg-5 mx-auto">
            <div class="d-flex flex-row">
                <form class="me-auto">
                    <div class="search">
                        <input type="text" name="" id="homepagesearch" class="form-control">
                        <a href="<?= base_url() ?>searching"><i class="fa-solid fa-magnifying-glass"></i></a>
                    </div>
                </form>
                <div class="tools-bar ms-3">
                    <a class="rounded-circle add-border" href="<?= base_url() ?>notification">
                        <i class="fa-regular fa-bell">
                            <?php if(!empty($notif)){ ?>
                                <span class="buble-red rounded-circle"></span>
                            <?php }?>
                        </i>
                    </a>
                    <a class="rounded-circle add-border" href="<?= base_url() ?>message">
                        <i class="fa-regular fa-envelope">
                            <?php if(!empty($notifmsg)){ ?>   
                                <span class="buble-red rounded-circle"></span>
                            <?php }?>
                        </i>
                    </a>
                    <!-- <a class="rounded-circle"> -->
                        <span class="mode-toggle-content rounded-circle" style="cursor: pointer;">
                            <svg width="32" height="32" class="hot-explicit" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="31" height="31" rx="15.5" stroke="#727477"/>
                                <path class="pathfire" d="M16.7188 4C16.7188 4 17.32 6.23629 17.32 8.05063C17.32 9.78903 16.2231 11.1983 14.5494 11.1983C12.8675 11.1983 11.6 9.78903 11.6 8.05063L11.6244 7.74684C9.98313 9.77215 9 12.3966 9 15.2489C9 18.9789 11.9088 22 15.5 22C19.0913 22 22 18.9789 22 15.2489C22 10.7004 19.8956 6.64135 16.7188 4ZM15.2644 19.4684C13.8181 19.4684 12.6481 18.2869 12.6481 16.8186C12.6481 15.4515 13.5013 14.4895 14.9313 14.1857C16.3694 13.8819 17.8562 13.1646 18.685 12.0084C19.0019 13.097 19.1644 14.2447 19.1644 15.4177C19.1644 17.654 17.4175 19.4684 15.2644 19.4684Z" fill="#727477"/>
                                <path d="M14.15 24.525V28H13.58V26.48H11.945V28H11.375V24.525H11.945V26.015H13.58V24.525H14.15ZM16.4854 28.035C16.1621 28.035 15.8637 27.96 15.5904 27.81C15.3204 27.6567 15.1054 27.445 14.9454 27.175C14.7887 26.9017 14.7104 26.595 14.7104 26.255C14.7104 25.915 14.7887 25.61 14.9454 25.34C15.1054 25.07 15.3204 24.86 15.5904 24.71C15.8637 24.5567 16.1621 24.48 16.4854 24.48C16.8121 24.48 17.1104 24.5567 17.3804 24.71C17.6537 24.86 17.8687 25.07 18.0254 25.34C18.1821 25.61 18.2604 25.915 18.2604 26.255C18.2604 26.595 18.1821 26.9017 18.0254 27.175C17.8687 27.445 17.6537 27.6567 17.3804 27.81C17.1104 27.96 16.8121 28.035 16.4854 28.035ZM16.4854 27.54C16.7154 27.54 16.9204 27.4883 17.1004 27.385C17.2804 27.2783 17.4204 27.1283 17.5204 26.935C17.6237 26.7383 17.6754 26.5117 17.6754 26.255C17.6754 25.9983 17.6237 25.7733 17.5204 25.58C17.4204 25.3867 17.2804 25.2383 17.1004 25.135C16.9204 25.0317 16.7154 24.98 16.4854 24.98C16.2554 24.98 16.0504 25.0317 15.8704 25.135C15.6904 25.2383 15.5487 25.3867 15.4454 25.58C15.3454 25.7733 15.2954 25.9983 15.2954 26.255C15.2954 26.5117 15.3454 26.7383 15.4454 26.935C15.5487 27.1283 15.6904 27.2783 15.8704 27.385C16.0504 27.4883 16.2554 27.54 16.4854 27.54ZM21.0663 24.525V24.99H20.1413V28H19.5713V24.99H18.6413V24.525H21.0663Z" fill="white"/>
                            </svg>
                        </span>
                    <!-- </a> -->
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="row">
            <div class="col-12 col-lg-5 d-flex justify-content-center mx-auto">
                <div class="apps-adive mx-auto">
                    <div class="owl-carousel owl-nonfollow">
                        <?php foreach($nonfollow as $dt){?>
                            <div class="somebody">
                                <img src="<?=$dt->profile?>" alt="Somebody" class="border-status">
                                <div class="action">
                                    <a class="somebody-username"  href="<?=base_url()?>profile/guest_profile/<?=$dt->ucode?>">
                                        <label>
                                            <?php 
                                                echo mb_strimwidth($dt->username , 0, 8, "...");
                                            ?>
                                        </label>
                                    </a>
                                    <input type="button" value="Follow" id="user<?=$dt->id?>" class="action-btn follow py-1 px-3 rounded" onclick="actionFollow('<?=$dt->id?>','<?=$dt->id?>')">
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="apps-member col-12 col-lg-5 d-flex align-items-center mx-auto px-4">
            <!-- <button class="btn btn-hide px-2 d-flex align-items-center" id="hideadive">
                <span>Hide</span> 
                <i id="iconhide" class="fa fa-eye ms-1"></i>
            </button> -->
            <div class="d-flex justify-content-between w-100">
                <div>
                    <!-- <a class="link">
                        <span class="mode-toggle">
                            <span class="switch"></span>
                        </span>
                    </a> -->
                </div>

                <!-- For Explicit Toggle -->
                <!-- <div class="d-flex align-items-center">
                    <span class="span-text-toogle-explicit">Explicit contents</span>
                    <a class="link-content mt-1 ms-2">
                        <span >
                            <span class="switch-content" id="switch-content"></span>
                        </span>
                    </a>
                </div> -->
            </div>
        </div>
    </div>
    <div class="apps-member w-100">
        <?php if (isset($post)) {
            $this->load->view($post);
        } ?>
    </div>
</div>