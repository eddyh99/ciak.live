<div id="fluidc" class="container" style="position: relative">
    <div class="btn-back mt-3 mt-sm-5">
        <a href="<?= base_url() ?>link/guide" class="rounded-circle"><i class="fa-solid fa-angle-left"></i></a>
    </div>
    <div class="content py-3 py-sm-5">
        <div class="col-6 mx-auto">
            <div class="box-title">
                <h2><?= $title ?></h2>
            </div>
        </div>
    </div>
    <?php if ($menu == '1') {?>
        <div class="content py-3 py-sm-5">
            <div class="col-12 content-wallet">
                <div class="col-10 text-center m-auto">
                    <p><span translate="no"> Ciak.Live </span> doesn’t require any personal documentation for registering on the platform, for creating contents and for buying or selling contents, in less than a minute you will be able to post, buy and sell contents.</p>
                </div>
            </div>
            <div class="col-12 content-wallet">
                <div class="col-12 m-auto">
                    <h3 class="rainbow mt-5">
                        How to register
                    </h3>
                </div>
                <!-- <div class="row d-flex align-items-stretch">
                    <div class="col-8 col-sm-6 col-lg-3 mx-auto step-payment">
                        <div class="p-3 h-100 d-flex flex-column">
                            <span>STEP 1</span>
                            <div class="box-rainbow">
                                <p>Register by using just email and password filling out the form and the confirm</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 col-sm-6 col-lg-3 mx-auto step-payment">
                        <div class="p-3 h-100 d-flex flex-column">
                            <span>STEP 2</span>
                            <div class="box-rainbow">
                                <p>Wait the confirmation email and click on the link received to activate your account</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 col-sm-6 col-lg-3 mx-auto step-payment">
                        <div class="p-3 h-100 d-flex flex-column">
                            <span>STEP 3</span>
                            <div class="box-rainbow">
                                <p>Once you click on the link received you will be redirected to the login page then access
                                    using the email and password used for registration.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 col-sm-6 col-lg-3 mx-auto step-payment">
                        <div class="p-3 h-100 d-flex flex-column">
                            <span>STEP 4</span>
                            <div class="box-rainbow">
                                <p>Congratulations!<br> Now you can start to set up your profile and start to follow your
                                    friends</p>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="wrap-line-horizontal-guide">
                    <div class="line-horizontal-box">
                        <div class="text head pb-2">Step 1</div>
                        <div class="bullet line"></div>
                        <div class="text px-5">Register by using just email and password filling out the form and the confirm</div>
                    </div>
                    <div class="line-horizontal-box">
                        <div class="text head pb-2">Step 2</div>
                        <div class="bullet line"></div>
                        <div class="text px-5">Wait the confirmation email and click on the link received to activate your account</div>
                    </div>
                    <div class="line-horizontal-box">
                        <div class="text head pb-2">Step 3</div>
                        <div class="bullet line"></div>
                        <div class="text px-5">Once you click on the link received you will be redirected to the login page then access using the email and password used for registration. </div>
                    </div>
                    <div class="line-horizontal-box">
                        <div class="text head pb-2">Step 4</div>
                        <div class="bullet"></div>
                        <div class="text px-5">Congratulations ! Now you can start to set up your profile and start to follow your friends</div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-5">
                <a href="<?= base_url('link/guides/' . base64_encode('2') . '/' . base64_encode('Profile setting')) ?>" class="btn btn-guide-next px-5">
                    Next
                </a>
            </div>
        </div>
    <?php }?>

    <?php if ($menu == '2') {?>
        <div class="content py-5 py-sm-5">
    
            <div class="col-12 content-wallet">
                <div class="col-10 text-start m-auto guides">
                    <h3 class="rainbow text-start">How to set up profile</h3>
                    <br><br>
                    <ul>
                        <li>Set your profile picture</li>
                        <li>Enter your nick name</li>
                        <li>Complete your profile information and save.</li>
                        <li>After that you can decide to make profile with subscriptions</li>
                        <li>After that you can decide to make profile with subscriptions</li>
                        <li>Start to follow your friends</li>
                    </ul>
                    <span class="text-ucode">*The unique code will not be modifiable </span>
                </div>
            </div>

            <div class="col-12 content-wallet mt-5">
                <div class="col-10 text-start m-auto guides">
                    <h3 class="rainbow text-start">How to set up profile with subscription</h3>
                    <br><br>
                    <ul>
                        <li>
                            Click the button ‘’<span class="text-primary-ciak">edit subscription</span>’’ and set up the price that you want to be paid from your subscribers, 
                            <br>
                            all subscriber will see your contents posted as ‘’private”
                        </li>
                    </ul>
                    <br>
                    <h4 class="text-profile-subscription">You  can also promote the subscription of your profile by clicking the button ‘’<span class="text-primary-ciak">promote your subscription</span>‘’ and then :</h4>
                    <br>
                    <ul>
                        <li>
                            Decide if you want to give a percentage discount or give a new fixed price, 
                        </li>
                        <li>
                            Choose the number of users (optional) and the period of your promotion (mandatory); 
                        </li>
                        <li>
                            A link will be generated, ready to be shared wherever you want 
                        </li>
                        <li>
                            A notification will be sent automatically to all your followers, subscribers and to any user that have already bought one of your contents
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 content-wallet mt-5">
                <div class="col-10 text-start m-auto guides">
                    <h3 class="rainbow text-start">How to set up profile for an agency</h3>
                    <p>
                        If you want to work for an agency you should set up your profile in order to give them the access to manage your profile. 
                    </p><br><br>
                    <ol>
                        <li>On your profile click ‘’ edit profile’’</li>
                        <li>Click the button ‘’agency’’</li>
                        <li>Setup a special password for the agency (must be different from your profile password)</li>
                        <li>Confirm password the password entered and click ‘’confirm’’</li>
                        <li>Make agreement with your agency and give to them the special credentials just created</li>
                        <li>
                            Once you made the agreement with the agency you will see in the ‘’agency’’ section of your profile all the details ( percentage, fees and contract terms) 
                        </li>
                        <li>Click confirm and a green light will appear</li>
                        <li>Congratulation! Now your agency can menage your profile</li>
                    </ol>
                </div>
            </div>

            <div class="col-12 content-wallet mt-5">
                <div class="col-10 text-center m-auto guides box-important">
                    <p class="fw-semibold">
                        IMPORTANT<br>
                        GIVING THE ACCESS TO THE AGENCY, THE AGENCY WILL BE NOT ABLE TO  MANAGE YOUR WALLET AND YOUR LIVE ACTIONS <br>
                        (LIVE SHOW, ONLINE MEETING AND CAM 2 CAM)
                    </p>
                </div>
            </div>

            <div class="col-12 content-wallet mt-5 pt-5 text-center">
                <h3 class="rainbow">PROFILE RATING</h3>
                <div class="col-10 text-center m-auto guides">
                    <p class="fw-semibold">Each profile is provided with a ‘’<b class="fw-semibold text-main-green">Rating</b>’’ 
                        to measure the user's degree of reliability.</p>
                    <p class="fw-semibold">Users can evaluate all profiles, posts, cam to cam and live show using the
                        <b class="fw-semibold text-main-green">Stars Rating</b>
                        method by giving them from 1 to 5 stars.
                    </p>
                    <p>
                        <span class="mt-3 fw-semibold">This method facilitates the users to trust or not profiles.</span>
                        <span>
                            <i class="fa fa-star gold"></i>
                            <i class="fa fa-star gold"></i>
                            <i class="fa fa-star gold"></i>
                            <i class="fa fa-star gold"></i>
                            <i class="fa fa-star"></i>
                        </span>
                    </p>

                    <p>
                        <small>
                            (The Rating of a profile is calculated on the average of the ratings of the posts and live posted, just the users who bought contents or watched live or make subscription can rate your profiles except on the public post which can be voted by all followers)    
                        </small>
                    </p>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-5">
                <a href="<?= base_url('link/guides/' . base64_encode('3') . '/' . base64_encode('How to Post')) ?>" class="btn btn-guide-next px-5">
                    Next
                </a>
            </div>

        </div>
    <?php }?>

    <?php if ($menu == '3') {?>
        <div class="content py-5 py-sm-5">
            <div class="col-12 content-wallet">
                <div class="col-10 text-start m-auto guides post">
                    <ol>
                        <li>To create the new post click the button <span class="px-3"><img src="<?= base_url()?>assets/img/new-ciak/plus-circle.png" alt="plus"></span> on the navigation bar</li>
                        <li>Make a description of your post and upload the file</li>
                        <li class="pt-2">Choose in which section you want to post :</li>
                    </ol>
                    <p>
                        <span>Public </span> 
                        Posting your contents in this section posts are visible to all the users of the platform for free 
                    </p>
                    <p>
                        <span>Private </span>
                        Posting your contents in this section, only users who have subscribed into your profile can see your posts
                    </p>
                    <p>
                        <span>Special </span> 
                        Posting your contents in this section, a single post can be bought from any user even if they didn't make any subscription on your profile;
                        users can buy it with a single payment
                    </p>
                    <p>
                        <span>Download </span> 
                        posting your contents in this section you allow users to download your creation, 
                        you can decide to make this post paid or free of charge
                    </p>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-5">
                <a href="<?= base_url('link/guides/' . base64_encode('4') . '/' . base64_encode('How to use Live functions')) ?>" class="btn btn-guide-next px-5">
                    Next
                </a>
            </div>
        </div>
    <?php }?>
    
    <?php if ($menu == '4') {?>
        <div class="content py-5 py-sm-5">

            <div class="col-12 content-wallet">
                <div class="border-top-wallet">
                    <h3 class="text-main-green">Live Meeting</h3>
                </div>
                <div class="border-top-wallet border-top-none">
                    <ul class="wrap-live-dot">
                        <li class="live-dot">Click the button online meeting</li>
                        <li class="live-dot">Fill out the description form</li>
                        <li class="live-dot">Choose if you want to make your meeting :
                            <ol>
                                <li class="py-2">Private (the meeting can be see just by the selected users)</li>
                                <li class="py-2">Public (the meeting can be viewed by all your followers because a post will be generated and users can see it on their homepage and on your profile after that users can interact with you through the live meeting chat)</li>
                            </ol>
                        </li>
                        <li class="live-dot">
                            Select the users with whom you want to start the meeting and a link will be sent to them automatically 
                            or choose to start alone the meeting and invite users later on using the link generated 
                        </li>
                        <li class="live-dot">Click confirm and the meeting room will be generated </li>
                    </ul>
                </div>
                <div class="border-top-wallet border-top-none">
                    <h4 class="text-center fw-bold">IMPORTANT</h4>
                    <h5 class="text-center">
                        During your online meeting you can kick out, anytime, who is annoying you <br>
                        and you can have until 2 moderators chosen by yourself
                    </h5>
                </div>
            </div>

            <div class="col-12 content-wallet cam-2-cam">
                <div class="border-top-wallet">
                    <h3 class="text-main-green">Cam to Cam</h3>
                </div>
                <div class="border-top-wallet border-top-none">
                    <ul class="wrap-live-dot">
                        <li class="live-dot">Select the function Cam to Cam</li>
                        <li class="live-dot">Fill out the description form</li>
                        <li class="live-dot">Select one of your follower or one of your subscriber </li>
                        <li class="live-dot">Choose your price per minute</li>
                        <li class="live-dot">
                            Click confirm and a link will be generated 
                            and it will be sent automatically to the selected user
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-12 content-wallet cam-2-cam">
                <div class="border-top-wallet">
                    <h3 class="text-main-green">Live Show</h3>
                </div>
                <div class="border-top-wallet border-top-none">
                    <ul class="wrap-live-dot">
                        <li class="live-dot">Select the function Live Show  </li>
                        <li class="live-dot">Set up time and date and duration of your show</li>
                        <li class="live-dot">Fill out the description form </li>
                        <li class="live-dot">
                            Choose if you want to make your show for your <br><br>
                                FOLLOWERS <br>
                                SUBSCRIBERS <br>
                                PUBLIC <br> <br>
                                (Audience can interact with you just through the integrated live chat)
                        </li>
                        <li class="live-dot">
                            Choose if you want your live show to be paid with price per minute, with a fixed price (ticket) or if you want to make it free of charge
                        </li>
                        <li class="live-dot">
                            Click confirm and a post on your profile will be created and  from that the selected audience can join the live show by clicking the button “join’’ and  also the selected audience will receive a notification.
                        </li>
                    </ul>
                </div>
                <div class="border-top-wallet border-top-none">
                    <h4 class="text-center fw-bold">IMPORTANT</h4>
                    <h5 class="text-center">
                        During your online meeting you can kick out, anytime, who is annoying you<br>
                        and you can have until 2 moderators chosen by yourself
                    </h5>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-5">
                <a href="<?= base_url('link/guides/' . base64_encode('5') . '/' . base64_encode('How to use the Chat functions')) ?>" class="btn btn-guide-next px-5">
                    Next
                </a>
            </div>
        </div>
    <?php }?>

    <?php if ($menu == '5') {?>
        <div class="content py-5 py-sm-5">
            <div class="col-12 content-wallet">
                <div class="border-top-wallet">
                    <h5 class="text-center fw-bold text-uppercase">Only the users who are followed can start a chat discussion with those who follow them.</h5>
                </div>
                <div class="col-12 text-start m-auto guides mt-5">
                    <p class="text-profile-subscription">Through the integrated chat users can also send contents :</p>
                    <br>
                    <ul>
                        <li>From his own browser (media can be sent just free of charge)</li>
                        <li>From ‘’private and special’ media folder of <span translate="no"> Ciak.live </span> (media can be sent just by paid )</li>
                        <li>From ‘’For chat’’ media folder of <span translate="no"> Ciak.live </span> (media can be sent just by paid )</li>
                    </ul>
                    <h3 class="text-main-green text-start mt-5">How to create contents just ‘’FOR CHAT ‘’ media folder</h3>
                </div>
            </div>
        </div>

    <?php }?>
</div>