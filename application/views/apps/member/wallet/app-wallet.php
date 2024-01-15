<div class="apps-body">
    <div class="row pb-5">
        <div class="apps-member col-11 col-md-7 col-lg-5 mx-auto mb-5 py-5">
            <h5 class="pb-2">My Wallet</h5>
            <div class="wallet-header">
                <div class="row">
                    <div class="col-12 d-flex">
                        <span>Unique code : </span>
                        <div>
                            <input type="text" class="ucodecopy-wallet" id="ucode" value="<?= $_SESSION['ucode']?>">
                            <a id="btnucode">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.6663 9.33301V9.33301C18.6663 7.44739 18.6663 6.50458 18.0806 5.91879C18.0806 5.91879 18.0806 5.91879 18.0806 5.91879C17.4948 5.33301 16.552 5.33301 14.6663 5.33301H9.33301C7.44739 5.33301 6.50458 5.33301 5.91879 5.91879C5.33301 6.50458 5.33301 7.44739 5.33301 9.333V14.6663C5.33301 16.552 5.33301 17.4948 5.91879 18.0806C5.91879 18.0806 5.91879 18.0806 5.91879 18.0806C6.50458 18.6663 7.44739 18.6663 9.33301 18.6663V18.6663" stroke="#03B115" stroke-width="2"/>
                                    <rect x="13.333" y="13.333" width="13.3333" height="13.3333" rx="2" stroke="#03B115" stroke-width="2"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <span class="fs-5 mt-4 text-copy-share-reff">Copy & share your referral link to earn money</span>
                    <div class="copy-refcode d-flex flex-row justify-content-start mb-4 w-100">
                        <input class="me-2 ps-2 py-2 reffcodecopy-wallet" type="text" name="" id="refcode" value="<?= base_url() ?>profile/user/<?= $_SESSION["ucode"] ?>" readonly >
                        <a class="btn btn-copy me-2" id="btnref">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.6663 9.33301V9.33301C18.6663 7.44739 18.6663 6.50458 18.0806 5.91879C18.0806 5.91879 18.0806 5.91879 18.0806 5.91879C17.4948 5.33301 16.552 5.33301 14.6663 5.33301H9.33301C7.44739 5.33301 6.50458 5.33301 5.91879 5.91879C5.33301 6.50458 5.33301 7.44739 5.33301 9.333V14.6663C5.33301 16.552 5.33301 17.4948 5.91879 18.0806C5.91879 18.0806 5.91879 18.0806 5.91879 18.0806C6.50458 18.6663 7.44739 18.6663 9.33301 18.6663V18.6663" stroke="#03B115" stroke-width="2"/>
                                <rect x="13.333" y="13.333" width="13.3333" height="13.3333" rx="2" stroke="#03B115" stroke-width="2"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-flex flex-column justify-content-start align-items-center">
                        <span class="text-start">XEUR balance</span>
                        <?php foreach ($currency as $dt){
                            if ($dt->currency=='USDX'){
                        ?>
                        <h4 class="text-start">XEUR <?=number_format($dt->balance,2)?></h4>
                        <?php }
                            } 
                        ?>
                    </div>
                </div>
                <div class="row mt-3 mx-auto">
                    <div class="col-6 mx-auto d-flex">
                        <a href="<?= base_url()?>swap" class="btn-topup-header px-4 mx-auto">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.5489 18.8997C13.3312 18.8997 13.1297 18.7802 13.0249 18.597C12.9201 18.4137 12.9201 18.1827 13.033 17.9994L13.8795 16.605C14.0488 16.3181 14.4196 16.2305 14.7098 16.3978C15.0001 16.5651 15.0887 16.9316 14.9194 17.2185L14.7018 17.5771C16.9269 17.0591 18.5957 15.0831 18.5957 12.7246C18.5957 12.3979 18.8698 12.127 19.2003 12.127C19.5309 12.127 19.805 12.3979 19.805 12.7246C19.7969 16.1269 16.9914 18.8997 13.5489 18.8997Z" fill="white"/>
                                <path d="M1.45523 6.94757C1.12469 6.94757 0.850586 6.67666 0.850586 6.34998C0.850586 2.94766 3.65614 0.174805 7.09858 0.174805C7.31625 0.174805 7.5178 0.294328 7.62261 0.477591C7.72741 0.660854 7.72741 0.891925 7.61455 1.07519L6.76804 2.46958C6.59874 2.75643 6.22789 2.84408 5.93766 2.67676C5.64744 2.50943 5.55875 2.14293 5.72805 1.85608L5.94573 1.49751C3.72063 2.01543 2.05181 3.99146 2.05181 6.34998C2.05988 6.67666 1.78577 6.94757 1.45523 6.94757Z" fill="white"/>
                                <path d="M7.6394 17.7289C4.55974 17.7289 2.06055 15.2508 2.06055 12.215C2.06055 9.17924 4.56781 6.70117 7.6394 6.70117C7.78452 6.70117 7.91351 6.70916 8.05862 6.71712C10.7916 6.92429 13.0006 9.10751 13.2021 11.7927C13.2102 11.968 13.2183 12.0875 13.2183 12.215C13.2263 15.2508 10.7191 17.7289 7.6394 17.7289ZM7.6394 7.88844C5.22888 7.88844 3.26984 9.82464 3.26984 12.2071C3.26984 14.5895 5.22888 16.5257 7.6394 16.5257C10.0499 16.5257 12.017 14.5895 12.017 12.2071C12.017 12.1035 12.009 11.9999 12.0009 11.8963C11.8397 9.76089 10.1064 8.05573 7.978 7.89637C7.8732 7.89637 7.76033 7.88844 7.6394 7.88844Z" fill="white"/>
                                <path d="M13.0085 12.43H12.6135C12.2991 12.43 12.033 12.1909 12.0089 11.8802C11.8476 9.76867 10.1224 8.06354 7.98596 7.90418C7.67154 7.88028 7.42969 7.61733 7.42969 7.30658V6.91616C7.42969 3.8724 9.93695 1.40234 13.0166 1.40234C16.0963 1.40234 18.5955 3.88037 18.5955 6.91616C18.5955 9.95195 16.0801 12.43 13.0085 12.43ZM8.63092 6.78072C10.9044 7.18708 12.7264 8.97985 13.1375 11.2348C15.4916 11.1631 17.3781 9.25077 17.3781 6.91616C17.3781 4.53374 15.4191 2.59754 13.0085 2.59754C10.6383 2.58957 8.70347 4.45407 8.63092 6.78072Z" fill="white"/>
                            </svg>
                            <span class="ps-0 ps-md-2">
                                Swap
                            </span>
                        </a>
                    </div>
                    <div class="col-6 d-flex justify-content-start">
                        <a href="<?= base_url()?>withdraw" class="btn-topup-header px-4 mx-auto">
                            <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.5124 9.69858C13.8043 10.0194 14.9986 10.5895 14.9986 12.5776L15 12.5778C15 14.0843 14.0789 15.1492 12.6582 15.3663V16.5833C12.6582 17.0765 12.3272 17.3346 12.0001 17.3346C11.673 17.3346 11.3423 17.0765 11.3423 16.5833V15.3446C9.55317 15.0306 9.19445 13.6232 9.03197 12.9787L9.0206 12.9196C9.01137 12.8679 9 12.8039 9 12.7287C9 12.333 9.2424 11.9992 9.60361 11.8986L9.6258 11.8936C9.6995 11.8788 9.76059 11.8669 9.83677 11.8669C10.1861 11.8669 10.4693 12.1038 10.5586 12.4716C10.7114 13.136 10.9397 13.728 12.0601 13.728C12.9232 13.728 13.438 13.3021 13.438 12.5876C13.438 12.003 13.252 11.6803 12.1972 11.4286L11.4565 11.244C10.3338 10.9723 9.18451 10.4324 9.18451 8.49595C9.18451 7.43167 9.7478 6.21071 11.2775 5.92984V4.7393C11.2775 3.75357 12.5934 3.75357 12.5934 4.7393V5.92276C14.0174 6.1707 14.5314 7.25686 14.7143 7.94693C14.7446 8.04132 14.7597 8.13841 14.7597 8.23634C14.7597 8.63117 14.5111 8.96454 14.1542 9.04789C14.0963 9.06164 14.0189 9.07706 13.9327 9.07706C13.6001 9.07706 13.3336 8.86703 13.2188 8.51491L13.2096 8.48137C13.1126 8.07757 12.8789 7.54002 11.9669 7.54002C11.1967 7.54002 10.7369 7.89776 10.7369 8.49637C10.7369 8.95767 10.8151 9.30229 11.8277 9.53586L12.5124 9.69858Z" fill="white" fill-opacity="0.9"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.6 0C0.268629 0 0 0.298477 0 0.666667C0 1.03486 0.268629 1.33333 0.6 1.33333H1.8L1.8 15.6738C1.8 16.6446 1.79999 17.4139 1.84559 18.034C1.89222 18.6681 1.98951 19.2047 2.21418 19.6946C2.57849 20.4891 3.15982 21.135 3.87484 21.5398C4.31578 21.7894 4.79868 21.8975 5.36939 21.9493C5.92747 22 6.61985 22 7.49353 22H16.5064C17.3801 22 18.0725 22 18.6306 21.9493C19.2013 21.8975 19.6842 21.7894 20.1252 21.5398C20.8402 21.135 21.4215 20.4891 21.7858 19.6946C22.0105 19.2047 22.1078 18.6681 22.1544 18.034C22.2 17.4139 22.2 16.6446 22.2 15.6739V1.33333H23.3995C23.7308 1.33333 24 1.03486 24 0.666667C24 0.298477 23.7314 0 23.4 0H0.6ZM3 15.6444V1.33333H21V15.6444C21 16.6511 20.9995 17.366 20.9584 17.9254C20.9178 18.4771 20.8407 18.8187 20.7166 19.0893C20.4673 19.6329 20.0696 20.0748 19.5804 20.3518C19.3368 20.4897 19.0294 20.5754 18.5329 20.6204C18.0294 20.6661 17.386 20.6667 16.48 20.6667H7.52C6.61402 20.6667 5.97061 20.6661 5.46711 20.6204C4.9706 20.5754 4.6632 20.4897 4.41962 20.3518C3.9304 20.0748 3.53265 19.6329 3.28338 19.0893C3.15927 18.8187 3.08217 18.4771 3.0416 17.9254C3.00047 17.366 3 16.6511 3 15.6444Z" fill="white" fill-opacity="0.9"/>
                            </svg>
                            <span class="ps-0 ps-md-2">
                                Withdraw
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-10 mx-auto">
                    <p class="text-start">
                        <span translate="no"> CIAK.LIVE </span> use <span translate="no"> USDX </span> for all payments on the platform. You have to top up your FIAT wallet and swap into <span translate="no"> USDX. </span>
                    </p>
                </div>
            </div>
            <div class="card-currency row mt-2">
                <?php foreach($currency as $dt) {?>
                    <?php if($dt->currency!='USDX'){?>
                        <?php if($dt->currency == 'EUR' || $dt->currency == 'USD'){?>
                            <div class="detail-currency d-flex justify-content-between align-items-center col-10 mx-auto py-3 my-2">                   
                                <div class="ps-3">
                                    <span><?=$dt->currency?></span>
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="text-center detail-currency-label">Your Balance</span>
                                    <span class="text-center"><?=$dt->symbol." ".number_format($dt->balance,2);?></span>
                                </div>
                                <div class="detail-link pe-3">
                                    <a href="<?= base_url()?>wallet/deposit?cur=<?=$dt->currency?>">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        <?php }?>
                    <?php }?>
                <?php }?>

                <?php foreach ($currency as $dt){ ?>
                    <?php if ($dt->currency!='USDX'){?>
                        <?php if($dt->currency != 'EUR' && $dt->currency != 'USD') {?>
                            <div class="detail-currency d-flex justify-content-between align-items-center col-10 mx-auto py-3 my-2">                   
                                <div class="ps-3">
                                    <span><?=$dt->currency?></span>
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="text-center detail-currency-label">Your Balance</span>
                                    <span class="text-center"><?=$dt->symbol." ".number_format($dt->balance,2);?></span>
                                </div>
                                <div class="detail-link pe-3">
                                    <a href="<?= base_url()?>wallet/deposit?cur=<?=$dt->currency?>">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    <?php }?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>