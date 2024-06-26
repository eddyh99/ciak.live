<div class="row">
    <div class="col-11 col-lg-5 mx-auto">
        <div class="apps-body pbot">
            <div class="apps-topbar guestsubscribe light row">
                <div class="apps-member border-none mx-auto col-12 ">
                    <div class="alert-notif d-flex justify-content-between px-4 px-lg-0">
                        <div class="action-icon">
                            <a href="<?= base_url()?>homepage">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="0.5" width="31" height="31" rx="15.5" fill="#ECEBED"/>
                                    <rect x="0.5" y="0.5" width="31" height="31" rx="15.5" stroke="#323436"/>
                                    <path d="M14.6667 20.6666L10 15.9999M10 15.9999L14.6667 11.3333M10 15.9999H22" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                        <div class="action">
                            <span class="fs-5">Subscription </span>
                        </div>
                        <div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="apps-member">
                    <div class="guestsubscribe">
                        <p class="title">Subscribe AND GET THESE BENEFITS:</p>
                        <div class="boxguest-subscribe">
                            <ul>
                                <li>
                                    Full access to this user’s private contents
                                </li><br>
                                <li>
                                    Possibility to have more free contents and live show 
                                </li><br>
                                <li>
                                    Direct message with this user
                                </li><br>
                                <li>
                                    Cancel your subscription at any time
                                </li>
                            </ul>
                        </div>
                        <div id="subscribebox" class="mt-4 action-guest-subs">
                                <?php if(@$profile['price']->trial>0 || @$profile['price']->sub7>0 || @$profile['price']->sub30>0 || @$profile['price']->sub365>0) {?>
                                    <!-- <div class="action-profile text-center mx-auto d-flex justify-content-center mb-3">
                                        <input type="button" value="Subscribe" id="subscribe1" class="col-8 col-md-4 mx-auto btn-main-green py-2" >
                                    </div> -->
                                <?php }?>
                                <div class="d-flex flex-column flex-wrap ">
                                    <?php  
                                        if (@$profile['price']->sub7>0){?>
                                            <button id="btnsubsribe" onclick='subscribe("<?=$profile["id"]?>","sub7")' class="text-decoration-none col-10 m-2 p-3 mx-auto text-center text-white btn-guest-subs">
                                                <svg width="20" height="23" viewBox="0 0 20 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.36198 2.7265C9.03255 1.31382 10.9701 1.31382 11.6406 2.7265L12.7995 5.16797C13.0658 5.72895 13.5806 6.11777 14.176 6.20773L16.7674 6.59924C18.2669 6.82577 18.8656 8.74161 17.7806 9.84123L15.9054 11.7417C15.4745 12.1783 15.2779 12.8074 15.3796 13.424L15.8223 16.1074C16.0784 17.6601 14.511 18.8442 13.1698 18.1111L10.852 16.8442C10.3194 16.5531 9.68318 16.5531 9.15061 16.8442L6.83277 18.1111C5.49163 18.8442 3.92415 17.6601 4.18029 16.1075L4.62296 13.424C4.72467 12.8074 4.52806 12.1783 4.0972 11.7417L2.22203 9.84123C1.13702 8.74161 1.73574 6.82577 3.23519 6.59924L5.82661 6.20773C6.42204 6.11777 6.93677 5.72895 7.20306 5.16797L8.36198 2.7265Z" fill="white"/>
                                                    <g filter="url(#filter0_d_3285_23068)">
                                                    <path d="M12.0884 11.7432H13.5497C13.0093 13.3712 11.4224 14.3539 9.79504 14.0682C8.16817 13.7815 6.97656 12.3106 6.97656 10.5875C6.97656 8.8644 8.16817 7.39399 9.79504 7.10779C11.4224 6.82208 13.0093 7.80482 13.5497 9.43286H12.0884C11.9238 9.17394 11.711 8.95169 11.4623 8.77918C11.235 8.62774 10.9809 8.52447 10.7148 8.47536C10.4487 8.42625 10.1758 8.43226 9.91191 8.49304C9.64804 8.55383 9.39842 8.66819 9.1775 8.82951C8.95658 8.99082 8.76874 9.19589 8.62484 9.43286C8.01405 10.4314 8.29423 11.7579 9.25085 12.3958C9.47816 12.5473 9.73222 12.6506 9.99833 12.6998C10.2644 12.7489 10.5373 12.7429 10.8012 12.6822C11.065 12.6215 11.3147 12.5071 11.5356 12.3459C11.7565 12.1846 11.9444 11.9796 12.0884 11.7427V11.7432Z" fill="#323436"/>
                                                    </g>
                                                    <path d="M11.5117 10.5422L9.81177 11.4592V9.62525L11.5117 10.5422Z" fill="#323436"/>
                                                    <defs>
                                                    <filter id="filter0_d_3285_23068" x="2.97656" y="7.05859" width="14.5742" height="15.0586" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset dy="4"/>
                                                    <feGaussianBlur stdDeviation="2"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_3285_23068"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_3285_23068" result="shape"/>
                                                    </filter>
                                                    </defs>
                                                </svg>
                                                7 Days <?=$profile['price']->sub7?>
                                            </button>
                                    <?php } 
                                        if (@$profile['price']->sub30>0){?>
                                            <button id="btnsubsribe" onclick='subscribe("<?=$profile["id"]?>","sub30")' class="text-decoration-none col-10 m-2 p-3 mx-auto text-center text-white btn-guest-subs">
                                                <svg width="20" height="23" viewBox="0 0 20 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.36198 2.7265C9.03255 1.31382 10.9701 1.31382 11.6406 2.7265L12.7995 5.16797C13.0658 5.72895 13.5806 6.11777 14.176 6.20773L16.7674 6.59924C18.2669 6.82577 18.8656 8.74161 17.7806 9.84123L15.9054 11.7417C15.4745 12.1783 15.2779 12.8074 15.3796 13.424L15.8223 16.1074C16.0784 17.6601 14.511 18.8442 13.1698 18.1111L10.852 16.8442C10.3194 16.5531 9.68318 16.5531 9.15061 16.8442L6.83277 18.1111C5.49163 18.8442 3.92415 17.6601 4.18029 16.1075L4.62296 13.424C4.72467 12.8074 4.52806 12.1783 4.0972 11.7417L2.22203 9.84123C1.13702 8.74161 1.73574 6.82577 3.23519 6.59924L5.82661 6.20773C6.42204 6.11777 6.93677 5.72895 7.20306 5.16797L8.36198 2.7265Z" fill="white"/>
                                                    <g filter="url(#filter0_d_3285_23068)">
                                                    <path d="M12.0884 11.7432H13.5497C13.0093 13.3712 11.4224 14.3539 9.79504 14.0682C8.16817 13.7815 6.97656 12.3106 6.97656 10.5875C6.97656 8.8644 8.16817 7.39399 9.79504 7.10779C11.4224 6.82208 13.0093 7.80482 13.5497 9.43286H12.0884C11.9238 9.17394 11.711 8.95169 11.4623 8.77918C11.235 8.62774 10.9809 8.52447 10.7148 8.47536C10.4487 8.42625 10.1758 8.43226 9.91191 8.49304C9.64804 8.55383 9.39842 8.66819 9.1775 8.82951C8.95658 8.99082 8.76874 9.19589 8.62484 9.43286C8.01405 10.4314 8.29423 11.7579 9.25085 12.3958C9.47816 12.5473 9.73222 12.6506 9.99833 12.6998C10.2644 12.7489 10.5373 12.7429 10.8012 12.6822C11.065 12.6215 11.3147 12.5071 11.5356 12.3459C11.7565 12.1846 11.9444 11.9796 12.0884 11.7427V11.7432Z" fill="#323436"/>
                                                    </g>
                                                    <path d="M11.5117 10.5422L9.81177 11.4592V9.62525L11.5117 10.5422Z" fill="#323436"/>
                                                    <defs>
                                                    <filter id="filter0_d_3285_23068" x="2.97656" y="7.05859" width="14.5742" height="15.0586" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset dy="4"/>
                                                    <feGaussianBlur stdDeviation="2"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_3285_23068"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_3285_23068" result="shape"/>
                                                    </filter>
                                                    </defs>
                                                </svg>
                                                1 Month <?=$profile['price']->sub30?>
                                            </button>
                                    <?php } 
                                        if (@$profile['price']->sub365>0){?>
                                            <button id="btnsubsribe" onclick='subscribe("<?=$profile["id"]?>","sub365")' class="text-decoration-none col-10 m-2 p-3 mx-auto text-center text-white btn-guest-subs">
                                                <svg width="20" height="23" viewBox="0 0 20 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.36198 2.7265C9.03255 1.31382 10.9701 1.31382 11.6406 2.7265L12.7995 5.16797C13.0658 5.72895 13.5806 6.11777 14.176 6.20773L16.7674 6.59924C18.2669 6.82577 18.8656 8.74161 17.7806 9.84123L15.9054 11.7417C15.4745 12.1783 15.2779 12.8074 15.3796 13.424L15.8223 16.1074C16.0784 17.6601 14.511 18.8442 13.1698 18.1111L10.852 16.8442C10.3194 16.5531 9.68318 16.5531 9.15061 16.8442L6.83277 18.1111C5.49163 18.8442 3.92415 17.6601 4.18029 16.1075L4.62296 13.424C4.72467 12.8074 4.52806 12.1783 4.0972 11.7417L2.22203 9.84123C1.13702 8.74161 1.73574 6.82577 3.23519 6.59924L5.82661 6.20773C6.42204 6.11777 6.93677 5.72895 7.20306 5.16797L8.36198 2.7265Z" fill="white"/>
                                                    <g filter="url(#filter0_d_3285_23068)">
                                                    <path d="M12.0884 11.7432H13.5497C13.0093 13.3712 11.4224 14.3539 9.79504 14.0682C8.16817 13.7815 6.97656 12.3106 6.97656 10.5875C6.97656 8.8644 8.16817 7.39399 9.79504 7.10779C11.4224 6.82208 13.0093 7.80482 13.5497 9.43286H12.0884C11.9238 9.17394 11.711 8.95169 11.4623 8.77918C11.235 8.62774 10.9809 8.52447 10.7148 8.47536C10.4487 8.42625 10.1758 8.43226 9.91191 8.49304C9.64804 8.55383 9.39842 8.66819 9.1775 8.82951C8.95658 8.99082 8.76874 9.19589 8.62484 9.43286C8.01405 10.4314 8.29423 11.7579 9.25085 12.3958C9.47816 12.5473 9.73222 12.6506 9.99833 12.6998C10.2644 12.7489 10.5373 12.7429 10.8012 12.6822C11.065 12.6215 11.3147 12.5071 11.5356 12.3459C11.7565 12.1846 11.9444 11.9796 12.0884 11.7427V11.7432Z" fill="#323436"/>
                                                    </g>
                                                    <path d="M11.5117 10.5422L9.81177 11.4592V9.62525L11.5117 10.5422Z" fill="#323436"/>
                                                    <defs>
                                                    <filter id="filter0_d_3285_23068" x="2.97656" y="7.05859" width="14.5742" height="15.0586" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset dy="4"/>
                                                    <feGaussianBlur stdDeviation="2"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_3285_23068"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_3285_23068" result="shape"/>
                                                    </filter>
                                                    </defs>
                                                </svg>
                                                1 Year <?=$profile['price']->sub365?>
                                            </button>
                                            <?php 
                                            
                                        if (@$profile['price']->trial>0){?>
                                            <p class="title pt-3">Want to give a try? </p>
                                            <button id="btnsubsribe" onclick='subscribe("<?=$profile["id"]?>","trial")' class="text-decoration-none col-10 m-2 p-3 mx-auto text-center text-white btn-guest-subs">
                                                <svg width="20" height="23" viewBox="0 0 20 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.36198 2.7265C9.03255 1.31382 10.9701 1.31382 11.6406 2.7265L12.7995 5.16797C13.0658 5.72895 13.5806 6.11777 14.176 6.20773L16.7674 6.59924C18.2669 6.82577 18.8656 8.74161 17.7806 9.84123L15.9054 11.7417C15.4745 12.1783 15.2779 12.8074 15.3796 13.424L15.8223 16.1074C16.0784 17.6601 14.511 18.8442 13.1698 18.1111L10.852 16.8442C10.3194 16.5531 9.68318 16.5531 9.15061 16.8442L6.83277 18.1111C5.49163 18.8442 3.92415 17.6601 4.18029 16.1075L4.62296 13.424C4.72467 12.8074 4.52806 12.1783 4.0972 11.7417L2.22203 9.84123C1.13702 8.74161 1.73574 6.82577 3.23519 6.59924L5.82661 6.20773C6.42204 6.11777 6.93677 5.72895 7.20306 5.16797L8.36198 2.7265Z" fill="white"/>
                                                    <g filter="url(#filter0_d_3285_23068)">
                                                    <path d="M12.0884 11.7432H13.5497C13.0093 13.3712 11.4224 14.3539 9.79504 14.0682C8.16817 13.7815 6.97656 12.3106 6.97656 10.5875C6.97656 8.8644 8.16817 7.39399 9.79504 7.10779C11.4224 6.82208 13.0093 7.80482 13.5497 9.43286H12.0884C11.9238 9.17394 11.711 8.95169 11.4623 8.77918C11.235 8.62774 10.9809 8.52447 10.7148 8.47536C10.4487 8.42625 10.1758 8.43226 9.91191 8.49304C9.64804 8.55383 9.39842 8.66819 9.1775 8.82951C8.95658 8.99082 8.76874 9.19589 8.62484 9.43286C8.01405 10.4314 8.29423 11.7579 9.25085 12.3958C9.47816 12.5473 9.73222 12.6506 9.99833 12.6998C10.2644 12.7489 10.5373 12.7429 10.8012 12.6822C11.065 12.6215 11.3147 12.5071 11.5356 12.3459C11.7565 12.1846 11.9444 11.9796 12.0884 11.7427V11.7432Z" fill="#323436"/>
                                                    </g>
                                                    <path d="M11.5117 10.5422L9.81177 11.4592V9.62525L11.5117 10.5422Z" fill="#323436"/>
                                                    <defs>
                                                    <filter id="filter0_d_3285_23068" x="2.97656" y="7.05859" width="14.5742" height="15.0586" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset dy="4"/>
                                                    <feGaussianBlur stdDeviation="2"/>
                                                    <feComposite in2="hardAlpha" operator="out"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_3285_23068"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_3285_23068" result="shape"/>
                                                    </filter>
                                                    </defs>
                                                </svg>
                                                Trial for <?php echo ($profile["price"]->trial_long==1) ? "1 Day" : $profile["price"]->trial_long." Days" ?> <?=$profile['price']->trial?>
                                            </button>
                                        
                                    <?php } }?>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>