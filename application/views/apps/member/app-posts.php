<div class="posts-member">
    <div class="post-member">
        <div class="post-header mb-3 d-flex flex-row align-items-center">
            <div class="post-profile d-flex flex-row align-items-center me-auto">
                <img src="<?= base_url() ?>assets/img/profile.jpg" alt="picture" class="picture rounded-circle">
                <div class="d-flex flex-column p-2">
                    <span class="name mb-1">Adi Purnama</span>
                    <span class="time">20m ago</span>
                </div>
            </div>
            <?php if (!isset($mn_search)) { ?>
            <div class="action d-flex flex-row align-items-center">
                <a href="" class="icon color-bp rounded-circle" data-bs-toggle="offcanvas"
                    data-bs-target="#basketShopping" aria-controls="offcanvasBottom"><i
                        class="fa-solid fa-basket-shopping"></i></a>
                <a href="" class="icon color-bp dollar rounded-circle" data-bs-toggle="offcanvas"
                    data-bs-target="#sendTip" aria-controls="offcanvasBottom">
                    <div class="bg-white-dollar rounded-circle"></div>
                    <i class="fa-solid fa-euro-sign"></i>
                </a>
                <a href="" class="icon ellipsis rounded-circle" data-bs-toggle="offcanvas"
                    data-bs-target="#settingMenus" aria-controls="offcanvasBottom"><i
                        class="fa-solid fa-ellipsis-vertical"></i></a>
            </div>
            <?php } ?>
        </div>
        <div class="post-body">
            <div class="text">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat dolorum sunt id expedita
                    sed quod quas unde tenetur, cum minima beatae laborum tempora libero, quos dolore voluptatum
                    commodi iusto similique.</p>
                <a href="" class="readmore">Read more...</a>
            </div>
        </div>

        <div class="post-footer">
            <div class="like">
                <a href="" class="heart checked"><i class="fa-regular fa-heart"></i></a>
                <span>222</span>
            </div>
            <div class="rate-start mx-auto">
                <a href="#" class="star s-1 checked"><i class="fa-solid fa-star"></i></a>
                <a href="#" class="star s-2 checked"><i class="fa-solid fa-star"></i></a>
                <a href="#" class="star s-3 checked"><i class="fa-solid fa-star"></i></a>
                <a href="#" class="star s-4"><i class="fa-solid fa-star"></i></a>
                <a href="#" class="star s-5"><i class="fa-solid fa-star"></i></a>
            </div>
            <div class="action">
                <a href="#" class="icon svg share" data-bs-toggle="offcanvas" data-bs-target="#shareSosmed"
                    aria-controls="offcanvasBottom">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.4425 10.1325L11.565 13.1175M11.5575 4.8825L6.4425 7.8675M15.75 3.75C15.75 4.99264 14.7426 6 13.5 6C12.2574 6 11.25 4.99264 11.25 3.75C11.25 2.50736 12.2574 1.5 13.5 1.5C14.7426 1.5 15.75 2.50736 15.75 3.75ZM6.75 9C6.75 10.2426 5.74264 11.25 4.5 11.25C3.25736 11.25 2.25 10.2426 2.25 9C2.25 7.75736 3.25736 6.75 4.5 6.75C5.74264 6.75 6.75 7.75736 6.75 9ZM15.75 14.25C15.75 15.4926 14.7426 16.5 13.5 16.5C12.2574 16.5 11.25 15.4926 11.25 14.25C11.25 13.0074 12.2574 12 13.5 12C14.7426 12 15.75 13.0074 15.75 14.25Z"
                            stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                <a href="#" class="icon svg vs" title="stitch">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_349_895)">
                            <path
                                d="M10.9998 4.07005V2.05005C8.9898 2.25005 7.1598 3.05005 5.6798 4.26005L7.0998 5.69005C8.20981 4.83005 9.5398 4.25005 10.9998 4.07005ZM5.6898 7.10005L4.2598 5.68005C3.0498 7.16005 2.2498 8.99005 2.0498 11H4.0698C4.2498 9.54005 4.8298 8.21005 5.6898 7.10005ZM4.0698 13H2.0498C2.2498 15.01 3.0498 16.84 4.2598 18.32L5.6898 16.89C4.8298 15.79 4.2498 14.46 4.0698 13ZM5.6798 19.74C7.1598 20.9501 8.9998 21.75 10.9998 21.9501V19.93C9.5398 19.75 8.20981 19.17 7.0998 18.31L5.6798 19.74ZM21.9998 12C21.9998 17.16 18.0798 21.42 13.0498 21.9501V19.93C16.9698 19.41 19.9998 16.05 19.9998 12C19.9998 7.95005 16.9698 4.59005 13.0498 4.07005V2.05005C18.0798 2.58005 21.9998 6.84005 21.9998 12Z"
                                fill="" />
                            <path
                                d="M11.96 9.02L9.4 16H7.7L5.14 9.02H6.64L8.56 14.57L10.47 9.02H11.96ZM15.2094 16.07C14.7227 16.07 14.2827 15.9867 13.8894 15.82C13.5027 15.6533 13.196 15.4133 12.9694 15.1C12.7427 14.7867 12.626 14.4167 12.6194 13.99H14.1194C14.1394 14.2767 14.2394 14.5033 14.4194 14.67C14.606 14.8367 14.8594 14.92 15.1794 14.92C15.506 14.92 15.7627 14.8433 15.9494 14.69C16.136 14.53 16.2294 14.3233 16.2294 14.07C16.2294 13.8633 16.166 13.6933 16.0394 13.56C15.9127 13.4267 15.7527 13.3233 15.5594 13.25C15.3727 13.17 15.1127 13.0833 14.7794 12.99C14.326 12.8567 13.956 12.7267 13.6694 12.6C13.3894 12.4667 13.146 12.27 12.9394 12.01C12.7394 11.7433 12.6394 11.39 12.6394 10.95C12.6394 10.5367 12.7427 10.1767 12.9494 9.87C13.156 9.56333 13.446 9.33 13.8194 9.17C14.1927 9.00333 14.6194 8.92 15.0994 8.92C15.8194 8.92 16.4027 9.09667 16.8494 9.45C17.3027 9.79667 17.5527 10.2833 17.5994 10.91H16.0594C16.046 10.67 15.9427 10.4733 15.7494 10.32C15.5627 10.16 15.3127 10.08 14.9994 10.08C14.726 10.08 14.506 10.15 14.3394 10.29C14.1794 10.43 14.0994 10.6333 14.0994 10.9C14.0994 11.0867 14.1594 11.2433 14.2794 11.37C14.406 11.49 14.5594 11.59 14.7394 11.67C14.926 11.7433 15.186 11.83 15.5194 11.93C15.9727 12.0633 16.3427 12.1967 16.6294 12.33C16.916 12.4633 17.1627 12.6633 17.3694 12.93C17.576 13.1967 17.6794 13.5467 17.6794 13.98C17.6794 14.3533 17.5827 14.7 17.3894 15.02C17.196 15.34 16.9127 15.5967 16.5394 15.79C16.166 15.9767 15.7227 16.07 15.2094 16.07Z"
                                fill="" />
                        </g>
                        <defs>
                            <clipPath id="clip0_349_895">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                </a>
                <a href="#" class="icon bookmark"><i class="fa-regular fa-bookmark"></i></a>
            </div>
        </div>
    </div>
    <div class="post-member">
        <div class="post-header mb-3 d-flex flex-row align-items-center">
            <div class="post-profile d-flex flex-row align-items-center me-auto">
                <img src="<?= base_url() ?>assets/img/profile.jpg" alt="picture" class="picture rounded-circle">
                <div class="d-flex flex-column p-2">
                    <span class="name mb-1">Adi Purnama</span>
                    <span class="time">20m ago</span>
                </div>
            </div>
            <?php if (!isset($mn_search)) { ?>
            <div class="action d-flex flex-row align-items-center">
                <a href="" class="icon color-bp rounded-circle" data-bs-toggle="offcanvas"
                    data-bs-target="#basketShopping" aria-controls="offcanvasBottom"><i
                        class="fa-solid fa-basket-shopping"></i></a>
                <a href="" class="icon color-bp dollar rounded-circle" data-bs-toggle="offcanvas"
                    data-bs-target="#sendTip" aria-controls="offcanvasBottom">
                    <div class="bg-white-dollar rounded-circle"></div>
                    <i class="fa-solid fa-euro-sign"></i>
                </a>
                <a href="" class="icon ellipsis rounded-circle" data-bs-toggle="offcanvas"
                    data-bs-target="#settingMenus" aria-controls="offcanvasBottom"><i
                        class="fa-solid fa-ellipsis-vertical"></i></a>
            </div>
            <?php } ?>
        </div>
        <div class="post-body">
            <div class="img">
                <img src="<?= base_url() ?>assets/img/img-2.png" alt="image" class="image-post rounded">
            </div>
        </div>

        <div class="post-footer">
            <div class="like">
                <a href="" class="heart checked"><i class="fa-regular fa-heart"></i></a>
                <span>222</span>
            </div>
            <div class="rate-start mx-auto">
                <a href="#" class="star s-1 checked"><i class="fa-solid fa-star"></i></a>
                <a href="#" class="star s-2 checked"><i class="fa-solid fa-star"></i></a>
                <a href="#" class="star s-3 checked"><i class="fa-solid fa-star"></i></a>
                <a href="#" class="star s-4"><i class="fa-solid fa-star"></i></a>
                <a href="#" class="star s-5"><i class="fa-solid fa-star"></i></a>
            </div>
            <div class="action">
                <a href="#" class="icon svg share" data-bs-toggle="offcanvas" data-bs-target="#shareSosmed"
                    aria-controls="offcanvasBottom">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.4425 10.1325L11.565 13.1175M11.5575 4.8825L6.4425 7.8675M15.75 3.75C15.75 4.99264 14.7426 6 13.5 6C12.2574 6 11.25 4.99264 11.25 3.75C11.25 2.50736 12.2574 1.5 13.5 1.5C14.7426 1.5 15.75 2.50736 15.75 3.75ZM6.75 9C6.75 10.2426 5.74264 11.25 4.5 11.25C3.25736 11.25 2.25 10.2426 2.25 9C2.25 7.75736 3.25736 6.75 4.5 6.75C5.74264 6.75 6.75 7.75736 6.75 9ZM15.75 14.25C15.75 15.4926 14.7426 16.5 13.5 16.5C12.2574 16.5 11.25 15.4926 11.25 14.25C11.25 13.0074 12.2574 12 13.5 12C14.7426 12 15.75 13.0074 15.75 14.25Z"
                            stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                <a href="#" class="icon svg vs" title="stitch">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_349_895)">
                            <path
                                d="M10.9998 4.07005V2.05005C8.9898 2.25005 7.1598 3.05005 5.6798 4.26005L7.0998 5.69005C8.20981 4.83005 9.5398 4.25005 10.9998 4.07005ZM5.6898 7.10005L4.2598 5.68005C3.0498 7.16005 2.2498 8.99005 2.0498 11H4.0698C4.2498 9.54005 4.8298 8.21005 5.6898 7.10005ZM4.0698 13H2.0498C2.2498 15.01 3.0498 16.84 4.2598 18.32L5.6898 16.89C4.8298 15.79 4.2498 14.46 4.0698 13ZM5.6798 19.74C7.1598 20.9501 8.9998 21.75 10.9998 21.9501V19.93C9.5398 19.75 8.20981 19.17 7.0998 18.31L5.6798 19.74ZM21.9998 12C21.9998 17.16 18.0798 21.42 13.0498 21.9501V19.93C16.9698 19.41 19.9998 16.05 19.9998 12C19.9998 7.95005 16.9698 4.59005 13.0498 4.07005V2.05005C18.0798 2.58005 21.9998 6.84005 21.9998 12Z"
                                fill="" />
                            <path
                                d="M11.96 9.02L9.4 16H7.7L5.14 9.02H6.64L8.56 14.57L10.47 9.02H11.96ZM15.2094 16.07C14.7227 16.07 14.2827 15.9867 13.8894 15.82C13.5027 15.6533 13.196 15.4133 12.9694 15.1C12.7427 14.7867 12.626 14.4167 12.6194 13.99H14.1194C14.1394 14.2767 14.2394 14.5033 14.4194 14.67C14.606 14.8367 14.8594 14.92 15.1794 14.92C15.506 14.92 15.7627 14.8433 15.9494 14.69C16.136 14.53 16.2294 14.3233 16.2294 14.07C16.2294 13.8633 16.166 13.6933 16.0394 13.56C15.9127 13.4267 15.7527 13.3233 15.5594 13.25C15.3727 13.17 15.1127 13.0833 14.7794 12.99C14.326 12.8567 13.956 12.7267 13.6694 12.6C13.3894 12.4667 13.146 12.27 12.9394 12.01C12.7394 11.7433 12.6394 11.39 12.6394 10.95C12.6394 10.5367 12.7427 10.1767 12.9494 9.87C13.156 9.56333 13.446 9.33 13.8194 9.17C14.1927 9.00333 14.6194 8.92 15.0994 8.92C15.8194 8.92 16.4027 9.09667 16.8494 9.45C17.3027 9.79667 17.5527 10.2833 17.5994 10.91H16.0594C16.046 10.67 15.9427 10.4733 15.7494 10.32C15.5627 10.16 15.3127 10.08 14.9994 10.08C14.726 10.08 14.506 10.15 14.3394 10.29C14.1794 10.43 14.0994 10.6333 14.0994 10.9C14.0994 11.0867 14.1594 11.2433 14.2794 11.37C14.406 11.49 14.5594 11.59 14.7394 11.67C14.926 11.7433 15.186 11.83 15.5194 11.93C15.9727 12.0633 16.3427 12.1967 16.6294 12.33C16.916 12.4633 17.1627 12.6633 17.3694 12.93C17.576 13.1967 17.6794 13.5467 17.6794 13.98C17.6794 14.3533 17.5827 14.7 17.3894 15.02C17.196 15.34 16.9127 15.5967 16.5394 15.79C16.166 15.9767 15.7227 16.07 15.2094 16.07Z"
                                fill="" />
                        </g>
                        <defs>
                            <clipPath id="clip0_349_895">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                </a>
                <a href="#" class="icon bookmark"><i class="fa-regular fa-bookmark"></i></a>
            </div>
        </div>
    </div>
    <div class="post-member">
        <div class="post-header mb-3 d-flex flex-row align-items-center">
            <div class="post-profile d-flex flex-row align-items-center me-auto">
                <img src="<?= base_url() ?>assets/img/profile.jpg" alt="picture" class="picture rounded-circle">
                <div class="d-flex flex-column p-2">
                    <span class="name mb-1">Adi Purnama</span>
                    <span class="time">20m ago</span>
                </div>
            </div>
            <?php if (!isset($mn_search)) { ?>
            <div class="action d-flex flex-row align-items-center">
                <a href="" class="icon color-bp rounded-circle" data-bs-toggle="offcanvas"
                    data-bs-target="#basketShopping" aria-controls="offcanvasBottom"><i
                        class="fa-solid fa-basket-shopping"></i></a>
                <a href="" class="icon color-bp dollar rounded-circle" data-bs-toggle="offcanvas"
                    data-bs-target="#sendTip" aria-controls="offcanvasBottom">
                    <div class="bg-white-dollar rounded-circle"></div>
                    <i class="fa-solid fa-euro-sign"></i>
                </a>
                <a href="" class="icon ellipsis rounded-circle" data-bs-toggle="offcanvas"
                    data-bs-target="#settingMenus" aria-controls="offcanvasBottom"><i
                        class="fa-solid fa-ellipsis-vertical"></i></a>
            </div>
            <?php } ?>
        </div>
        <div class="post-body">
            <div class="imgs">
                <video class="images-post rounded" controls>
                    <source src="https://www.youtube.com/watch?v=HjNVymiHLNo" type="video/mp4">
                    <source src="https://www.youtube.com/watch?v=HjNVymiHLNo" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
                <img src="<?= base_url() ?>assets/img/img-2.png" alt="images" class="images-post rounded">
                <img src="<?= base_url() ?>assets/img/img-2.png" alt="images" class="images-post rounded">
                <img src="<?= base_url() ?>assets/img/img-2.png" alt="images" class="images-post rounded">
                <img src="<?= base_url() ?>assets/img/img-2.png" alt="images" class="images-post rounded">
            </div>
        </div>

        <div class="post-footer">
            <div class="like">
                <a href="" class="heart checked"><i class="fa-regular fa-heart"></i></a>
                <span>222</span>
            </div>
            <div class="rate-start mx-auto">
                <a href="#" class="star s-1 checked"><i class="fa-solid fa-star"></i></a>
                <a href="#" class="star s-2 checked"><i class="fa-solid fa-star"></i></a>
                <a href="#" class="star s-3 checked"><i class="fa-solid fa-star"></i></a>
                <a href="#" class="star s-4"><i class="fa-solid fa-star"></i></a>
                <a href="#" class="star s-5"><i class="fa-solid fa-star"></i></a>
            </div>
            <div class="action">
                <a href="#" class="icon svg share" data-bs-toggle="offcanvas" data-bs-target="#shareSosmed"
                    aria-controls="offcanvasBottom">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.4425 10.1325L11.565 13.1175M11.5575 4.8825L6.4425 7.8675M15.75 3.75C15.75 4.99264 14.7426 6 13.5 6C12.2574 6 11.25 4.99264 11.25 3.75C11.25 2.50736 12.2574 1.5 13.5 1.5C14.7426 1.5 15.75 2.50736 15.75 3.75ZM6.75 9C6.75 10.2426 5.74264 11.25 4.5 11.25C3.25736 11.25 2.25 10.2426 2.25 9C2.25 7.75736 3.25736 6.75 4.5 6.75C5.74264 6.75 6.75 7.75736 6.75 9ZM15.75 14.25C15.75 15.4926 14.7426 16.5 13.5 16.5C12.2574 16.5 11.25 15.4926 11.25 14.25C11.25 13.0074 12.2574 12 13.5 12C14.7426 12 15.75 13.0074 15.75 14.25Z"
                            stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                <a href="#" class="icon svg vs" title="stitch">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_349_895)">
                            <path
                                d="M10.9998 4.07005V2.05005C8.9898 2.25005 7.1598 3.05005 5.6798 4.26005L7.0998 5.69005C8.20981 4.83005 9.5398 4.25005 10.9998 4.07005ZM5.6898 7.10005L4.2598 5.68005C3.0498 7.16005 2.2498 8.99005 2.0498 11H4.0698C4.2498 9.54005 4.8298 8.21005 5.6898 7.10005ZM4.0698 13H2.0498C2.2498 15.01 3.0498 16.84 4.2598 18.32L5.6898 16.89C4.8298 15.79 4.2498 14.46 4.0698 13ZM5.6798 19.74C7.1598 20.9501 8.9998 21.75 10.9998 21.9501V19.93C9.5398 19.75 8.20981 19.17 7.0998 18.31L5.6798 19.74ZM21.9998 12C21.9998 17.16 18.0798 21.42 13.0498 21.9501V19.93C16.9698 19.41 19.9998 16.05 19.9998 12C19.9998 7.95005 16.9698 4.59005 13.0498 4.07005V2.05005C18.0798 2.58005 21.9998 6.84005 21.9998 12Z"
                                fill="" />
                            <path
                                d="M11.96 9.02L9.4 16H7.7L5.14 9.02H6.64L8.56 14.57L10.47 9.02H11.96ZM15.2094 16.07C14.7227 16.07 14.2827 15.9867 13.8894 15.82C13.5027 15.6533 13.196 15.4133 12.9694 15.1C12.7427 14.7867 12.626 14.4167 12.6194 13.99H14.1194C14.1394 14.2767 14.2394 14.5033 14.4194 14.67C14.606 14.8367 14.8594 14.92 15.1794 14.92C15.506 14.92 15.7627 14.8433 15.9494 14.69C16.136 14.53 16.2294 14.3233 16.2294 14.07C16.2294 13.8633 16.166 13.6933 16.0394 13.56C15.9127 13.4267 15.7527 13.3233 15.5594 13.25C15.3727 13.17 15.1127 13.0833 14.7794 12.99C14.326 12.8567 13.956 12.7267 13.6694 12.6C13.3894 12.4667 13.146 12.27 12.9394 12.01C12.7394 11.7433 12.6394 11.39 12.6394 10.95C12.6394 10.5367 12.7427 10.1767 12.9494 9.87C13.156 9.56333 13.446 9.33 13.8194 9.17C14.1927 9.00333 14.6194 8.92 15.0994 8.92C15.8194 8.92 16.4027 9.09667 16.8494 9.45C17.3027 9.79667 17.5527 10.2833 17.5994 10.91H16.0594C16.046 10.67 15.9427 10.4733 15.7494 10.32C15.5627 10.16 15.3127 10.08 14.9994 10.08C14.726 10.08 14.506 10.15 14.3394 10.29C14.1794 10.43 14.0994 10.6333 14.0994 10.9C14.0994 11.0867 14.1594 11.2433 14.2794 11.37C14.406 11.49 14.5594 11.59 14.7394 11.67C14.926 11.7433 15.186 11.83 15.5194 11.93C15.9727 12.0633 16.3427 12.1967 16.6294 12.33C16.916 12.4633 17.1627 12.6633 17.3694 12.93C17.576 13.1967 17.6794 13.5467 17.6794 13.98C17.6794 14.3533 17.5827 14.7 17.3894 15.02C17.196 15.34 16.9127 15.5967 16.5394 15.79C16.166 15.9767 15.7227 16.07 15.2094 16.07Z"
                                fill="" />
                        </g>
                        <defs>
                            <clipPath id="clip0_349_895">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                </a>
                <a href="#" class="icon bookmark"><i class="fa-regular fa-bookmark"></i></a>
            </div>
        </div>
    </div>
</div>