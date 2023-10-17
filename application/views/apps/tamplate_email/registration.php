<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <title>Registration Ciak</title>
</head>

<body>
    <div style="
    max-width: 420px;
    margin: 0 auto;
    position: relative;
    background: #FFFFFF;
    padding: 1rem;
    ">
        <div>
            <!-- <img src="<?= base_url() ?>assets/img/ciak-text.png" alt="Ciak.live" height="20"> -->
            <p style="color: #4FF301;">Ciak.live</p>
        </div>
        <div style="
        text-align: center;
        padding: 3rem;
        ">
            <h3 style="
            font-weight: 600;
            font-size: 30px;
            line-height: 45px;
            color: #000000;
            margin-bottom: 1rem;
            ">
                Hi,
            </h3>
            <img src="<?= base_url() ?>assets/img/new-ciak/ciak-logo.png" alt="CIAK.LIVE" height="140">
        </div>

        <div style="
        text-align: center;
        padding-bottom: 3rem;
        ">
            <p style="
            font-weight: 400;
            font-size: 14px;
            color: #333333;
            ">
                Someone has requested a new password for the following account on imadeadipurnamayasa@gmail.com.<br>
                If you didn't make this request, just ignore this email. If you'd like to proceed:
            </p>

            <a href="<?= base_url() ?>auth/signup_activate/<?= @$token; ?>" style="
            text-decoration: none;
            color: #FFFFFF;
            font-weight: 600;
            font-size: 16px;
            text-align: center;
            background: linear-gradient(90deg, #03B115 47.56%, #00cf15 102.84%);
            border-radius: 4px;
            padding: .75rem 2rem;
            margin: 1rem 0;
            display: inline-block;
            ">
                Click here to reset your password
            </a>
            <p style="
                font-weight: 400;
                font-size: 14px;
                color: #333333;
                ">
                Thanks for reading
            </p>
        </div>
        <hr>
        <hr>
        <div style="
        text-align: center; 
        padding: 3rem 0; 
        display: flex; 
        flex-direction: row;
        justify-content: center;
        ">
            <a style="
            text-decoration: none;
            margin: 0 auto;
            margin-right: 1rem;
            ">
                <img src="<?= base_url() ?>assets/img/new-ciak/appstore.png" alt="appstore" height="20">
            </a>
            <a style="
            text-decoration: none;
            margin: 0 auto;
            margin-left: 1rem;
            ">
                <img src="<?= base_url() ?>assets/img/new-ciak/google-play.png" alt="googleplay" height="20">
            </a>
        </div>
        <p style="
        text-align: center;
        font-weight: 400;
        font-size: 12px;
        color: #999999;
        ">
            Copyright © <?= date('Y'); ?>
        </p>
    </div>
</body>

</html>