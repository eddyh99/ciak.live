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
                <div class="wrap-line-horizontal-guide">
                    <div class="line-horizontal-box">
                        <div class="text head pb-2">Step 1</div>
                        <div class="bullet line d-none d-md-inline-block"></div>
                        <div class="text px-3">Register by using just email and password filling out the form and the confirm</div>
                    </div>
                    <div class="line-horizontal-box">
                        <div class="text head pb-2">Step 2</div>
                        <div class="bullet line d-none d-md-inline-block"></div>
                        <div class="text px-3">Wait the confirmation email and click on the link received to activate your account</div>
                    </div>
                    <div class="line-horizontal-box">
                        <div class="text head pb-2">Step 3</div>
                        <div class="bullet line d-none d-md-inline-block"></div>
                        <div class="text px-3">Once you click on the link received you will be redirected to the login page then access using the email and password used for registration. </div>
                    </div>
                    <div class="line-horizontal-box">
                        <div class="text head pb-2">Step 4</div>
                        <div class="bullet d-none d-md-inline-block"></div>
                        <div class="text px-3">Congratulations ! Now you can start to set up your profile and start to follow your friends</div>
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
                <div class="col-10 text-start m-auto guides box-important">
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
                            <!-- <i class="fa fa-star gold"></i> -->
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
                        <li>To create the new post click the button <span class="px-3"><img src="<?= base_url()?>assets/img/new-ciak/logo-only-noborder.png" height="40" alt="plus"></span> on the navigation bar</li>
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
                <a href="<?= base_url('link/guides/' . base64_encode('5') . '/' . base64_encode('How to use the Wallet')) ?>" class="btn btn-guide-next px-5">
                    Next
                </a>
            </div>
        </div>
    <?php }?>

    <?php if ($menu == '5') {?>
        <div class="content py-5 py-sm-5">
            <div class="col-12 content-wallet">
                <div>
                    <h5 class="text-center f-montserrat fw-semibold">
                        <span translate="no"> CIAK.LIVE </span> USE <span style="color: #016247;"> XAUSD </span> FOR ALL PAYMENTS ON THE PLATFORM
                    </h5>
                </div>
                <div class="wrap-line-horizontal-guide">
                    <div class="line-horizontal-box">
                        <div class="text head pb-2">Step 1</div>
                        <div class="bullet line d-none d-md-inline-block"></div>
                        <div class="text px-3">
                            Top up your wallet with your favorite 
                            <span class="fw-semibold" style="color: #016247;"> FIAT </span> 
                            currency 
                        </div>
                    </div>
                    <div class="line-horizontal-box">
                        <div class="text head pb-2">Step 2</div>
                        <div class="bullet line d-none d-md-inline-block"></div>
                        <div class="text px-3">
                            Convert any FIAT amount into <span class="fw-semibold" style="color: #016247;"> XAUSD </span>
                        </div>
                    </div>
                    <div class="line-horizontal-box">
                        <div class="text head pb-2">Step 3</div>
                        <div class="bullet line d-none d-md-inline-block"></div>
                        <div class="text px-3">
                        Buy or sell contents using <span class="fw-semibold" style="color: #016247;"> XAUSD </span>
                        </div>
                    </div>
                    <div class="line-horizontal-box">
                        <div class="text head pb-2">Step 4</div>
                        <div class="bullet d-none d-md-inline-block"></div>
                        <div class="text px-3">
                            Withdraw your  <span class="fw-semibold" style="color: #016247;"> XAUSD </span> balance into your favorite <span class="fw-semibold" style="color: #016247;"> FIAT </span> currency    
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 content-wallet mt-3">
                <div class="accordion accordion-flush" id="accordionWallet">
                    <div class="accordion-item my-4">
                        <div class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTopup" aria-expanded="false" aria-controls="collapseTopup">
                                How to top up your wallet with FIAT
                            </button>
                        </div>
                        <div id="collapseTopup" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-10 mx-auto">
                                        <p class="text-center">
                                            Your wallet is identified through the <span> ‘’Unique Code’’ </span>
                                            (you can find it in the home page of your wallet) You have to use your <span> Unique Code </span> in order to top up your wallet .
                                        </p>
                                        <p class="text-center">
                                            In order to top up your wallet follow the procedure below:
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <ol>
                                            <li>
                                                Login into your account and access to your wallet
                                            </li>
                                            <li>
                                                Click on the FIAT currency that you want to receive
                                            </li>
                                        </ol>
                                        <img src="<?= base_url()?>assets/img/new-ciak/mini-1.png" alt="">
                                        <ul>
                                            <li>
                                                After choosing the currency select the bank transfer method (national or international bank transfer)
                                            </li>
                                            <li>
                                                Copy all the fields of the form that you find on the page
                                            </li>
                                            <li>
                                                Paste on your online bank form/bank desk, making sure to copy exactly the
                                                ‘’Causal’’ (which is your Unique code)  as it identifies the destination wallet
                                            </li>
                                            <li>
                                            Send the bank transfer from your bank
                                            </li>
                                            <li>
                                            Wait for your bank transfer to arrive into your wallet (timeline may vary from banks).
                                            </li>
                                            <li>
                                            Congratulations ! Your money has arrived into your Ciak.Live wallet
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item my-4">
                        <div class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConvert" aria-expanded="true" aria-controls="collapseConvert">
                                How to convert FIAT into XEUR to buy contents
                            </button>
                        </div>
                        <div id="collapseConvert" class="accordion-collapse collapse " aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="text-center">
                                    In order to buy contents you have to convert one of your <span class="fw-semibold" style="color: #016247;"> FIAT </span> balances into <span class="fw-semibold" style="color: #016247;"> XEUR </span>.
                                </p>
                                <div class="wrap-line-horizontal-guide">
                                    <div class="line-horizontal-box">
                                        <div class="text head pb-2">Step 1</div>
                                        <div class="bullet line d-none d-md-inline-block"></div>
                                        <div class="text px-3">
                                            Click The Button Swap And Select The <span class="fw-semibold" style="color: #016247;"> FIAT </span> currency that you  want to convert into <span class="fw-semibold" style="color: #016247;"> XAUSD </span>
                                            <img src="<?= base_url()?>assets/img/new-ciak/mini-2.png" alt="logo">
                                        </div>
                                    </div>
                                    <div class="line-horizontal-box">
                                        <div class="text head pb-2">Step 2</div>
                                        <div class="bullet line d-none d-md-inline-block"></div>
                                        <div class="text px-3">
                                            ENTER THE AMOUNT  
                                            AND YOU WILL SEE IMMEDIATELY THE QUOTATION AND THEN CLICK NEXT
                                        </div>
                                    </div>
                                    <div class="line-horizontal-box">
                                        <div class="text head pb-2">Step 3</div>
                                        <div class="bullet line d-none d-md-inline-block"></div>
                                        <div class="text px-3">
                                            Make sure that all data ENTERED are correct and then click on the button confirm 
                                        </div>
                                    </div>
                                    <div class="line-horizontal-box">
                                        <div class="text head pb-2">Step 4</div>
                                        <div class="bullet d-none d-md-inline-block"></div>
                                        <div class="text px-3">
                                            CONGRATULATIONS ! YOU ARE READY TO BUY CONTENTS
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item my-4">
                        <div class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSell" aria-expanded="false" aria-controls="collapseSell">
                                How to sell contents
                            </button>
                        </div>
                        <div id="collapseSell" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="text-center">
                                    If you want to <span class="fw-bold text-white"> sell </span> your contents or let your friend make subscription on your profile you just need to :
                                </p>
                                <div class="wrap-line-horizontal-guide">
                                    <div class="line-horizontal-box">
                                        <div class="text head pb-2">Step 1</div>
                                        <div class="bullet line d-none d-md-inline-block"></div>
                                        <div class="text px-3">
                                            Create contents without any request of personal documents 
                                        </div>
                                    </div>
                                    <div class="line-horizontal-box">
                                        <div class="text head pb-2">Step 2</div>
                                        <div class="bullet line d-none d-md-inline-block"></div>
                                        <div class="text px-3">
                                            ENTER princes in <span class="fw-semibold" style="color: #016247;"> XAUSD </span> for your live, special, provate ETC...
                                        </div>
                                    </div>
                                    <div class="line-horizontal-box">
                                        <div class="text head pb-2">Step 3</div>
                                        <div class="bullet line d-none d-md-inline-block"></div>
                                        <div class="text px-3">
                                            Receive instan payments for your creations in <span class="fw-semibold" style="color: #016247;"> XAUSD </span> from buyers
                                        </div>
                                    </div>
                                    <div class="line-horizontal-box">
                                        <div class="text head pb-2">Step 4</div>
                                        <div class="bullet d-none d-md-inline-block"></div>
                                        <div class="text px-3">
                                            Withdraw any amount of your earnings to any bank account
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item my-4">
                        <div class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWithdraw" aria-expanded="false" aria-controls="collapseWithdraw">
                                How To Withdraw Funds
                            </button>
                        </div>
                        <div id="collapseWithdraw" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p class="text-center">
                                The balance can be withdrawn any time, without a minimum amount request, to any bank account even not under your name, in many different currencies.
                            </p>
                            <ol>
                                <li>
                                    Access to your wallet 
                                </li>
                                <li>
                                    Click the button ‘” <span class="fw-semibold" style="color: #016247;"> Withdraw </span>’’ on the homepage of your wallet
                                </li>
                                <li>
                                    Enter the <span class="fw-semibold" style="color: #016247;"> XAUSD </span> amount that you want to withdraw
                                </li>
                                <li>
                                    Choose the  <span class="fw-semibold" style="color: #016247;"> FIAT </span> currency that you want to withdraw
                                </li>
                                <li>
                                    Click the button next
                                </li>
                                <li>
                                    Choose your suitable method with what you want to make the withdrawal : <br>
                                    ‘’ <span class="fw-semibold" style="color: #016247;">International bank transfer</span>’’  or ‘’<span class="fw-semibold" style="color: #016247;">National bank transfer</span>’’
                                </li>
                                <li>
                                Fill the form entering the required bank details
                                </li>
                                <li>
                                    Click continue 
                                </li>
                                <li>
                                    Check that the all the data are correct  and click confirm
                                </li>
                                <li>
                                    Congratulations  your bank transfer has been sent !
                                </li>
                            </ol>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-5">
                <a href="<?= base_url('link/guides/' . base64_encode('6') . '/' . base64_encode('How to use the Chat functions')) ?>" class="btn btn-guide-next px-5">
                    Next
                </a>
            </div>
        </div>

    <?php }?>

    <?php if ($menu == '6') {?>
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