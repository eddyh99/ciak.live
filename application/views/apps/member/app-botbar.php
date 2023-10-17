<div class="apps-botbar fixed-bottom row">
    <div class="apps-member mx-auto col-12 col-lg-5">
        <div class="d-flex flex-row justify-content-around">
            <a class="icon-svg home rounded-circle fill <?= @$mn_home ?>" href="<?= base_url() ?>homepage">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.65708 22.2357V18.6684C8.65708 17.7577 9.4007 17.0195 10.318 17.0195H13.6712C14.1117 17.0195 14.5342 17.1932 14.8457 17.5025C15.1572 17.8117 15.3321 18.2311 15.3321 18.6684V22.2357C15.3294 22.6143 15.4789 22.9784 15.7476 23.247C16.0163 23.5157 16.3819 23.6668 16.7633 23.6668H19.051C20.1194 23.6696 21.145 23.2501 21.9015 22.5011C22.658 21.7521 23.0832 20.735 23.0832 19.6743V9.5115C23.0832 8.6547 22.7006 7.84198 22.0386 7.29228L14.2562 1.12201C12.9024 0.0401514 10.9628 0.0750819 9.64946 1.20497L2.04468 7.29228C1.35137 7.82577 0.936982 8.64091 0.916504 9.5115V19.6639C0.916504 21.8747 2.72178 23.6668 4.94871 23.6668H7.18418C7.97627 23.6668 8.62 23.0324 8.62574 22.2461L8.65708 22.2357Z" fill="" />
                </svg>
            </a>
            <a class="icon-svg list rounded-circle fill <?= @$mn_statistic ?>" href="<?= base_url() ?>statistic">
                <svg width="28" height="20" viewBox="0 0 28 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="8" y="0.03125" width="20" height="4" fill="" />
                    <rect x="8.3999" y="7.96875" width="19.6" height="4" fill="" />
                    <rect y="7.96875" width="4.9" height="4" fill="" />
                    <rect y="15.9688" width="4.9" height="4" fill="" />
                    <rect y="0.09375" width="4.9" height="4" fill="" />
                    <rect x="8.3999" y="15.9688" width="19.6" height="4" fill="" />
                </svg>
            </a>
            <a class="icon-svg plus rounded-circle stroke" href="<?= base_url() ?>post" data-bs-toggle="modal" data-bs-target="#postModal">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 2V8M8 8V14M8 8H14M8 8H2" stroke="" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            <a class="icon-svg wallet rounded-circle fill <?= @$mn_wallet ?>" href="<?= base_url() ?>wallet">
                <svg width="22" height="24" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.8421 5.93391V3.00358C20.8421 1.58982 19.8 0.433105 18.5263 0.433105H2.31579C1.7016 0.433105 1.11257 0.703922 0.678279 1.18598C0.243984 1.66804 0 2.32184 0 3.00358V20.9969C0 21.6786 0.243984 22.3324 0.678279 22.8145C1.11257 23.2965 1.7016 23.5673 2.31579 23.5673H18.5263C19.8 23.5673 20.8421 22.4106 20.8421 20.9969V18.0665C21.1921 17.8422 21.4831 17.5202 21.6863 17.1324C21.8894 16.7446 21.9976 16.3045 22 15.8559V8.14452C21.9976 7.69593 21.8894 7.25587 21.6863 6.86806C21.4831 6.48025 21.1921 6.1582 20.8421 5.93391ZM19.6842 8.14452V15.8559H11.5789V8.14452H19.6842ZM2.31579 20.9969V3.00358H18.5263V5.57405H11.5789C10.3053 5.57405 9.26316 6.73076 9.26316 8.14452V15.8559C9.26316 17.2697 10.3053 18.4264 11.5789 18.4264H18.5263V20.9969H2.31579Z" fill="" />
                    <path d="M15.0528 13.928C16.012 13.928 16.7896 13.0648 16.7896 12.0001C16.7896 10.9354 16.012 10.0723 15.0528 10.0723C14.0935 10.0723 13.3159 10.9354 13.3159 12.0001C13.3159 13.0648 14.0935 13.928 15.0528 13.928Z" fill="" />
                </svg>
            </a>
            <a class="icon-svg user rounded-circle stroke <?= @$mn_profile ?>" href="<?= base_url() ?>profile">
                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.828 21.7387C7.62589 20.1572 10.7861 19.3285 14 19.3333C17.3333 19.3333 20.4627 20.2067 23.172 21.7387M18 11.3333C18 12.3942 17.5786 13.4116 16.8284 14.1618C16.0783 14.9119 15.0609 15.3333 14 15.3333C12.9391 15.3333 11.9217 14.9119 11.1716 14.1618C10.4214 13.4116 10 12.3942 10 11.3333C10 10.2725 10.4214 9.25505 11.1716 8.50491C11.9217 7.75476 12.9391 7.33333 14 7.33333C15.0609 7.33333 16.0783 7.75476 16.8284 8.50491C17.5786 9.25505 18 10.2725 18 11.3333ZM26 14C26 15.5759 25.6896 17.1363 25.0866 18.5922C24.4835 20.0481 23.5996 21.371 22.4853 22.4853C21.371 23.5996 20.0481 24.4835 18.5922 25.0866C17.1363 25.6896 15.5759 26 14 26C12.4241 26 10.8637 25.6896 9.4078 25.0866C7.95189 24.4835 6.62902 23.5996 5.51472 22.4853C4.40042 21.371 3.5165 20.0481 2.91345 18.5922C2.31039 17.1363 2 15.5759 2 14C2 10.8174 3.26428 7.76516 5.51472 5.51472C7.76516 3.26428 10.8174 2 14 2C17.1826 2 20.2348 3.26428 22.4853 5.51472C24.7357 7.76516 26 10.8174 26 14Z" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-white p-5 d-flex justify-content-center gap-2">
                <a id="explicit" class="btn-explicit-content text-white add-textarea-local" href="<?= base_url()?>post?type=explicit">Explicit contents</a>
                <a id="nonexplicit" class="btn-main-green text-white add-textarea-local" href="<?= base_url()?>post?type=non">Non explicit contents</a>
            </div>
        </div>
    </div>
</div>