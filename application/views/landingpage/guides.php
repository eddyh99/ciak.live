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
                <p>Ciak.Live doesn’t require any personal documentation for registering on the platform, for creating
                    contents and for buying or selling contents.</p>
                <p>Ciak doesn't make any kyc <b>(Know Your Customer)</b>.</p>
            </div>
        </div>
        <div class="col-12 content-wallet">
            <div class="col-12 m-auto">
                <h3 class="rainbow mt-5">
                    How to register
                </h3>
            </div>
            <div class="row d-flex align-items-stretch">
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
            </div>
        </div>
    </div>
    <?php }?>

    <?php if ($menu == '2') {?>
    <div class="content py-5 py-sm-5">
        <div class="col-12 content-wallet text-center">
            <h3 class="rainbow">PROFILE RATING</h3>
            <div class="col-10 text-center m-auto guides">
                <p class="fw-semibold">Each profile is provided with a ‘’<b
                        class="fw-semibold text-purple-dark">Rating</b>’’ to measure the user's degree of
                    reliability.</p>
                <p class="fw-semibold">Users can evaluate the platform's profiles by ‘’<b
                        class="fw-semibold text-purple-dark">Star Rating</b>’’ by giving them from
                    1 to 5 stars.</p>
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
                        (The Rating of a profile is calculated on the average of the ratings of the posts and live
                        posted, just the users who bought contents or watched live or make subscription can rate your
                        profiles except on the public post which can be voted by all followers)
                    </small>
                </p>
            </div>
        </div>
        <div class="col-12 content-wallet mt-5">
            <div class="col-10 text-start m-auto guides">
                <h3 class="rainbow text-start">PROFILE RATING</h3>
                <ul>
                    <li>Click he button ‘’edit subscription’’ and set up the price for the subscription into your
                        profile;<br>
                        decide the price that you want to be paid from your subscribers,
                        subscriber will see your contents posted as ‘’private”.</li>
                    <li>You can promote the subscription on your profile by clicking the button you can find in
                        subscription section:<br>
                        decide to give a percentage discount or new fixed price, choose users
                        number (optional) and period of promotion (mandatory); a link will
                        be generated ready to be shared wherever you want and a
                        notification will be sent automatically to all users that follow you or
                        already bought something, or already subscribed into your profile.</li>
                </ul>
            </div>
        </div>
        <div class="col-12 content-wallet mt-5">
            <div class="col-10 text-start m-auto guides">
                <h3 class="rainbow text-start">How to set up profile for an agency</h3>
                <p>If you want to work for an agency you should set up your profile in order to give them the access to
                    manage your profile. <br>
                    Follow the steps below:</p>
                <ol>
                    <li>On your profile click ‘’ edit profile’’</li>
                    <li>Then click the button ‘’agency’’</li>
                    <li>Setup a special password for the agency (must be different from your profile password’)</li>
                    <li>Confirm password and click ‘’confirm’’</li>
                    <li>Make agreement with an agency and give to them the special credential just created.</li>
                    <li>Once you made agreement with the agency you will see in the ‘’agency’’ section of your profile
                        all the details ( percentage, fees and contract terms) </li>
                    <li>Click confirm and a green light will appear</li>
                    <li>Congratulation now your agency can menage your profile</li>
                </ol>
            </div>
        </div>

        <div class="col-12 content-wallet mt-5">
            <div class="col-10 text-center m-auto guides box-important">
                <p class="fw-semibold">
                    IMPORTANT<br>
                    GIVING THE ACCESS TO THE AGENCY THEY CANNOT MANAGE YOUR WALLET AND YOUR LIVE ACTIONS
                    (LIVE SHOW,ONLINE MEETING AND CAM2 CAM)
                </p>
            </div>
        </div>
    </div>
    <?php }?>

    <?php if ($menu == '3') {?>
    <div class="content py-5 py-sm-5">
        <div class="col-12 content-wallet">
            <div class="col-10 text-start m-auto guides post">
                <ol>
                    <li>To create the new post click the button</li>
                    <li>Make a description of your post and upload the file</li>
                    <li>Choose in which section you want to post :</li>
                </ol>
                <p><span>Public </span> posting your contents in this section posts are visible to all users for free
                </p>
                <p><span>Private </span> posting your contents in this section, only users who have subscribed to your
                    profile can see your
                    posts
                </p>
                <p><span>Special </span> Posting your contents in this section, a single post can be bought from any
                    user even if they didn't
                    make any subscription on your profile; users can buy it with a single payment</p>
                <p><span>Download </span> posting your contents in this section you allow users to download your
                    creation,
                    you can decide to make this post paid or free of charge</p>
            </div>
        </div>
    </div>
    <?php }?>
</div>