<div class="apps-body">
    <?php
    if (isset($botbar)) {
        $this->load->view($botbar);
    }
    if (isset($popup)) {
        $this->load->view($popup);
    }
    ?>
    <div class="apps-member mx-auto w-100">
        <div class="banner-profile w-100">
            <img src="<?= base_url(); ?>assets/img/example-banner.png" alt="" class="banner-images">
        </div>
        <div class="profile user mb-4">
            <div class="d-flex flex-row position-relative">
                <a href="" class="icon-profile me-auto ms-5">
                    <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.59 12.51L13.42 16.49M13.41 5.51L6.59 9.49M19 4C19 5.65685 17.6569 7 16 7C14.3431 7 13 5.65685 13 4C13 2.34315 14.3431 1 16 1C17.6569 1 19 2.34315 19 4ZM7 11C7 12.6569 5.65685 14 4 14C2.34315 14 1 12.6569 1 11C1 9.34315 2.34315 8 4 8C5.65685 8 7 9.34315 7 11ZM19 18C19 19.6569 17.6569 21 16 21C14.3431 21 13 19.6569 13 18C13 16.3431 14.3431 15 16 15C17.6569 15 19 16.3431 19 18Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                <div class="img-profile">
                    <div class="img rounded-circle">
                        <img src="<?= base_url(); ?>assets/img/profile.jpg" alt="" class="rounded-circle">
                    </div>
                </div>

                <a href="" class="icon-profile ms-auto me-3">
                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26 1.44444V5.77778H0V1.44444C0 1.06135 0.152182 0.693954 0.423068 0.423068C0.693954 0.152182 1.06135 0 1.44444 0H24.5556C24.9386 0 25.306 0.152182 25.5769 0.423068C25.8478 0.693954 26 1.06135 26 1.44444ZM0 8.66667H26V24.5556C26 24.9386 25.8478 25.306 25.5769 25.5769C25.306 25.8478 24.9386 26 24.5556 26H1.44444C1.2113 25.9953 0.982976 25.9328 0.78 25.818L5.96122 20.6368L9.30944 22.8684C9.58732 23.0537 9.92081 23.137 10.2532 23.1041C10.5855 23.0712 10.8962 22.9241 11.1323 22.6879L14.0212 19.799C14.2843 19.5266 14.4299 19.1617 14.4266 18.783C14.4233 18.4042 14.2714 18.042 14.0036 17.7742C13.7358 17.5063 13.3735 17.3544 12.9948 17.3511C12.6161 17.3478 12.2512 17.4934 11.9788 17.7566L9.92767 19.8077L6.57944 17.576C6.30157 17.3907 5.96808 17.3074 5.63572 17.3404C5.30336 17.3733 4.99268 17.5204 4.75656 17.7566L0 22.5131V8.66667ZM16.3121 15.4657C16.583 15.7365 16.9503 15.8886 17.3333 15.8886C17.7163 15.8886 18.0837 15.7365 18.3546 15.4657L19.799 14.0212C20.0621 13.7488 20.2077 13.3839 20.2044 13.0052C20.2011 12.6265 20.0492 12.2642 19.7814 11.9964C19.5136 11.7286 19.1513 11.5767 18.7726 11.5734C18.3939 11.5701 18.029 11.7157 17.7566 11.9788L16.3121 13.4232C16.0413 13.6941 15.8892 14.0614 15.8892 14.4444C15.8892 14.8275 16.0413 15.1948 16.3121 15.4657Z" fill="white" />
                    </svg>
                </a>

                <a href="" class="icon-profile logout me-3">
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.6667 15.7083L19.875 10.5M19.875 10.5L14.6667 5.29166M19.875 10.5H7.375M10.5 15.7083C10.5 16.0162 10.5 16.1702 10.4886 16.3035C10.3696 17.6895 9.34881 18.83 7.98441 19.1013C7.85315 19.1274 7.70002 19.1444 7.39412 19.1784L6.33015 19.2966C4.73175 19.4742 3.93251 19.563 3.29757 19.3599C2.45097 19.0889 1.75981 18.4703 1.39706 17.6588C1.125 17.0502 1.125 16.2461 1.125 14.6378V6.36218C1.125 4.75391 1.125 3.94978 1.39706 3.34116C1.75981 2.52966 2.45097 1.91104 3.29757 1.64013C3.93251 1.43694 4.73172 1.52574 6.33015 1.70334L7.39411 1.82156C7.70013 1.85556 7.85313 1.87256 7.98441 1.89867C9.34881 2.16995 10.3696 3.31045 10.4886 4.69646C10.5 4.82982 10.5 4.98377 10.5 5.29166" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="info-profile text-center">
            <div class="rate-star">
                <i class="fa-solid fa-star s-1 gold"></i>
                <i class="fa-solid fa-star s-2 gold"></i>
                <i class="fa-solid fa-star s-3 gold"></i>
                <i class="fa-solid fa-star s-4"></i>
                <i class="fa-solid fa-star s-5"></i>
            </div>
            <div class="name">
                <h3 class="mt-2 mb-1">Atomski</h3>
                <span class="location mb-2">Brooklyn, NY</span>
                <p>Writer by Profession. Artist by Passion!</p>
            </div>
        </div>
    </div>
</div>