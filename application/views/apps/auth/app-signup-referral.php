<div class="apps-topbar fixed-top">
    <div class="apps-auth mx-auto">
        <div class="d-flex flex-row">
            <div class="link-back">
                <a href="<?= base_url() ?>auth/form_login">
                    <img src="<?= base_url() ?>assets/img/icon-close.png" alt="">
                </a>
            </div>
        </div>
    </div>
</div>

<div class="apps-body min-100vh">
    <div class="apps-auth w-100 d-flex flex-column">
        <div class="logo mt-auto">
            <img src="<?= base_url() ?>assets/img/ciak-logo.png" alt="Ciak.Live">
            <div class="col-10 col-sm-8 mx-auto my-4">
                <p class="info light">ATTENTION : it is necessary to have a REFERRAL CODE for the
                    subscription on the
                    platform, if you do
                    not
                    have it follow us on our Instagram page and request it.</p>
            </div>
        </div>
        <div class="col-10 col-sm-8 mx-auto mb-auto">
            <div class="col-12 formbox-grey light p-4 mb-3">
                <form class="form-login">
                    <div class="mb-3">
                        <label for="email" class="form-label light">Referral Code</label>
                        <div class="input-group form-icon-left light rounded">
                            <span class="input-group-text" id="basic-addon1">
                                <svg width="26" height="27" viewBox="0 0 26 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M26 13.4865C26 6.04125 20.176 0 13 0C5.824 0 0 6.04125 0 13.4865C0 17.5871 1.794 21.2827 4.602 23.7634C4.628 23.7904 4.654 23.7904 4.654 23.8174C4.888 24.0064 5.122 24.1954 5.382 24.3844C5.512 24.4654 5.616 24.5717 5.746 24.6797C7.89436 26.1923 10.4304 27.0006 13.026 27C15.6216 27.0006 18.1576 26.1923 20.306 24.6797C20.436 24.5987 20.54 24.4924 20.67 24.4097C20.904 24.2224 21.164 24.0334 21.398 23.8444C21.424 23.8174 21.45 23.8174 21.45 23.7904C24.206 21.2811 26 17.5871 26 13.4865ZM13 25.3007C10.556 25.3007 8.32 24.4907 6.474 23.1424C6.5 22.9264 6.552 22.7121 6.604 22.4961C6.75892 21.9107 6.98614 21.3486 7.28 20.8237C7.566 20.3108 7.904 19.8517 8.32 19.4468C8.71 19.0417 9.178 18.6654 9.646 18.3684C10.14 18.0714 10.66 17.8554 11.232 17.6934C11.8084 17.5321 12.403 17.4509 13 17.4521C14.7723 17.4391 16.4795 18.1451 17.758 19.4198C18.356 20.0408 18.824 20.7698 19.162 21.6051C19.344 22.0911 19.474 22.6041 19.552 23.1424C17.6332 24.5433 15.3456 25.2968 13 25.3007ZM9.022 12.8132C8.79291 12.2685 8.67771 11.6795 8.684 11.0852C8.684 10.4929 8.788 9.89888 9.022 9.35888C9.256 8.81888 9.568 8.33456 9.958 7.92956C10.348 7.52456 10.816 7.20225 11.336 6.95925C11.856 6.71625 12.428 6.60825 13 6.60825C13.598 6.60825 14.144 6.71625 14.664 6.95925C15.184 7.20225 15.652 7.52625 16.042 7.92956C16.432 8.33456 16.744 8.82056 16.978 9.35888C17.212 9.89888 17.316 10.4929 17.316 11.0852C17.316 11.7062 17.212 12.2732 16.978 12.8115C16.7522 13.3435 16.435 13.8284 16.042 14.2425C15.6431 14.65 15.1762 14.9788 14.664 15.2128C13.5896 15.6713 12.3844 15.6713 11.31 15.2128C10.7978 14.9788 10.3309 14.65 9.932 14.2425C9.53845 13.8344 9.22885 13.3476 9.022 12.8115V12.8132ZM21.086 21.7671C21.086 21.7131 21.06 21.6861 21.06 21.6321C20.8043 20.7873 20.4274 19.9875 19.942 19.2594C19.4562 18.526 18.8591 17.8792 18.174 17.3441C17.6508 16.9354 17.0837 16.5911 16.484 16.3181C16.7568 16.1312 17.0096 15.9146 17.238 15.6718C17.6256 15.2744 17.9661 14.8303 18.252 14.3488C18.8278 13.3664 19.1252 12.2352 19.11 11.0852C19.118 10.2339 18.9588 9.38979 18.642 8.60456C18.3292 7.84795 17.879 7.161 17.316 6.58125C16.7538 6.00755 16.0922 5.5495 15.366 5.23125C14.6086 4.90285 13.7947 4.73807 12.974 4.74694C12.1532 4.7386 11.3393 4.90396 10.582 5.23294C9.84954 5.5505 9.1863 6.01827 8.632 6.60825C8.07957 7.19143 7.63847 7.87796 7.332 8.63156C7.0152 9.41679 6.85596 10.2609 6.864 11.1122C6.864 11.7062 6.942 12.2732 7.098 12.8115C7.254 13.3785 7.462 13.8915 7.748 14.3758C8.008 14.8618 8.372 15.2938 8.762 15.6988C8.996 15.9418 9.256 16.1561 9.542 16.3451C8.94048 16.6254 8.37317 16.9788 7.852 17.3981C7.176 17.9381 6.578 18.5844 6.084 19.2864C5.59367 20.0114 5.21638 20.8121 4.966 21.6591C4.94 21.7131 4.94 21.7671 4.94 21.7941C2.886 19.6357 1.612 16.7231 1.612 13.4865C1.612 6.98625 6.734 1.67231 13 1.67231C19.266 1.67231 24.388 6.98625 24.388 13.4865C24.3846 16.5914 23.1974 19.5686 21.086 21.7671Z"
                                        fill="#BABABA" />
                                </svg>
                            </span>
                            <input type="text" class="form-control" placeholder="Referral Code" id="referral">
                        </div>
                    </div>
                    <div class="apps-list-btn text-center d-grid gap-2">
                        <!-- <button class="rounded fw-bold btn-ciak-o bg-gardien py-3 shadow-none">Submit</button> -->
                        <a href="<?= base_url() ?>auth/form_signup"
                            class="rounded fw-bold btn-ciak-o bg-gardien py-3 shadow-none">Submit</a>
                    </div>
                </form>
            </div>
            <div class="copyright-form mb-auto">
                <span class="mx-1 powered light">Power by</span>
                <div class="d-flex justify-content-center align-items-end">
                    <img src="<?= base_url() ?>assets/img/mif-logo.png" class="mx-1 mif">
                    <span class="mx-1 mif fw-bold">Money Industrial Factory</span>
                </div>
            </div>
        </div>
    </div>
</div>