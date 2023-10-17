<?php
function apiciaklive($url, $postData = NULL)
{
    $token = @sha1($_SESSION["email"].$_SESSION["passwd"].$_SESSION["ucode"]);

    $ch     = curl_init($url);
    $headers    = array(
        'Authorization: Bearer ' . $token,
        'Content-Type: application/json'
    );

    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    $result = json_decode(curl_exec($ch));
    curl_close($ch);
    return $result;
}


function sendmail($email, $subject, $message)
{
    $ci = get_instance();
    $ci->load->library('phpmailer_lib');
    $mail = $ci->phpmailer_lib->load();
    // $mail = $phpmailer;

    $mail->isSMTP();
    $mail->Host         = HOST_EMAIL;
    $mail->SMTPAuth     = true;
    $mail->Username     = USERNAME_EMAIL;
    $mail->Password     = PASS_EMAIL;

    $mail->SMTPDebug    = 0;
    $mail->SMTPAutoTLS    = true;
    $mail->SMTPSecure    = "tls";

    // $mail->SMTPAutoTLS  = false;
    // $mail->SMTPSecure   = false;

    $mail->Port         = 587;

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->setFrom(USERNAME_EMAIL, 'Ciak');
    $mail->isHTML(true);

    $mail->ClearAllRecipients();

    $mail->Subject = $subject;
    $mail->AddAddress($email);

    $mail->msgHTML($message);
    $mail->send();
}

function generateQRCode($name, $dir, $value)
{
    $ci = get_instance();
    $ci->load->library('ciqrcode');

    $config['cacheable']    = true;
    $config['cachedir']     = './qrcode/';
    $config['errorlog']     = './qrcode/';
    $config['imagedir']     = './qrcode/' . $dir . '/';
    $config['quality']      = true;
    $config['size']         = '1024';
    $config['black']        = array(224, 255, 255);
    $config['white']        = array(70, 130, 180);
    $ci->ciqrcode->initialize($config);

    $image_name = $name . '.png';

    $params['data'] = $value;
    $params['level'] = 'H';
    $params['size'] = 10;
    $params['savename'] = FCPATH . $config['imagedir'] . $image_name;
    return  $ci->ciqrcode->generate($params);
}

function registerHTML($username, $token)
{
    $html = "
    <!DOCTYPE html>
    <html lang='en'>

    <head>
        <meta name='color-scheme' content='light'>
        <meta name='supported-color-schemes' content='light'>
        <title>Registration Ciak</title>
    </head>

    <body>
        <div style='
        max-width: 420px;
        margin: 0 auto;
        position: relative;
        background: #FFFFFF;
        padding: 1rem;
        '>
            <div>
                <h3 style='color: #03B115;'>Ciak.live</h3>
            </div>
            <div style='
            text-align: center;
            padding: 3rem;
            '>
                <h3 style='
                font-weight: 600;
                font-size: 30px;
                line-height: 45px;
                color: #000000;
                margin-bottom: 1rem;
                '>
                    Hi " . @$username . ",
                </h3>
                <img src='" . base_url() . "assets/img/new-ciak/ciak-logo.png' alt='CIAK.LIVE' height='140'>
            </div>

            <div style='
            text-align: center;
            padding-bottom: 3rem;
            '>
                <h4 style='
                font-weight: 600;
                font-size: 26px;
                line-height: 45px;
                color: #000000;
                margin-bottom: 1rem;
                '>
                    Welcome to Ciak.Live
                </h4>
                <p style='
                font-weight: 400;
                font-size: 14px;
                color: #333333;
                '>
                    Please click the button below in order to <br> 
                    activate your account.
                </p>

                <a href='" . base_url() . "auth/signup_activate/" . @$token . "' style='
                text-decoration: none;
                color: #FFFFFF;
                font-weight: 600;
                font-size: 16px;
                text-align: center;
                background: linear-gradient(90deg, #03B115 47.56%, #03B115 102.84%);
                border-radius: 4px;
                padding: .75rem 2rem;
                margin-top: 1rem;
                display: inline-block;
                '>
                    Get Started
                </a>
            </div>
            <hr>
            <hr>
            <div style='
            text-align: center; 
            padding: 3rem 0; 
            display: flex; 
            flex-direction: row;
            justify-content: center;
            '>
                <a style='
                text-decoration: none;
                margin: 0 auto;
                margin-right: 1rem;
                '>
                    <img src='" . base_url() . "assets/img/new-ciak/appstore.png' alt='appstore' height='20'>
                </a>
                <a style='
                text-decoration: none;
                margin: 0 auto;
                margin-left: 1rem;
                '>
                    <img src='" . base_url() . "assets/img/new-ciak/google-play.png' alt='googleplay' height='20'>
                </a>
            </div>
            <p style='
            text-align: center;
            font-weight: 400;
            font-size: 12px;
            color: #999999;
            '>
                Copyright © " . date('Y') . "
            </p>
        </div>
    </body>

    </html>
    ";

    return $html;
}

function resetpassHTML($email, $token)
{
    $html = "
    <!DOCTYPE html>
    <html lang='en'>

    <head>
        <meta name='color-scheme' content='light'>
        <meta name='supported-color-schemes' content='light'>
        <title>Registration Ciak</title>
    </head>

    <body>
        <div style='
        max-width: 420px;
        margin: 0 auto;
        position: relative;
        background: #FFFFFF;
        padding: 1rem;
        '>
            <div>
                <h3 style='color: #03B115;'>Ciak.live</h3>
            </div>
            <div style='
            text-align: center;
            padding: 3rem;
            '>
                <h3 style='
                font-weight: 600;
                font-size: 30px;
                line-height: 45px;
                color: #000000;
                margin-bottom: 1rem;
                '>
                    Hi,
                </h3>
                <img src='" . base_url() . "assets/img/new-ciak/logo.png' alt='CIAK.LIVE' height='140'>
            </div>

            <div style='
            text-align: center;
            padding-bottom: 3rem;
            '>
                <p style='
                font-weight: 400;
                font-size: 14px;
                color: #333333;
                '>
                    Someone has requested a new password for the following account on " . $email . ".<br>
                    If you didn't make this request, just ignore this email. If you'd like to proceed:
                </p>

                <a href='" . base_url() . "auth/recovery_pass/" . @$token . "' style='
                text-decoration: none;
                color: #FFFFFF;
                font-weight: 600;
                font-size: 16px;
                text-align: center;
                background: linear-gradient(90deg, #03B115 47.56%, #03B115 102.84%);
                border-radius: 4px;
                padding: .75rem 2rem;
                margin: 1rem 0;
                display: inline-block;
                '>
                    Click here to reset your password
                </a>
                <p style='
                font-weight: 400;
                font-size: 14px;
                color: #333333;
                '>
                    Thanks for reading
                </p>
            </div>
            <hr>
            <hr>
            <div style='
            text-align: center; 
            padding: 3rem 0; 
            display: flex; 
            flex-direction: row;
            justify-content: center;
            '>
                <a style='
                text-decoration: none;
                margin: 0 auto;
                margin-right: 1rem;
                '>
                    <img src='" . base_url() . "assets/img/new-ciak/appstore.png' alt='appstore' height='20'>
                </a>
                <a style='
                text-decoration: none;
                margin: 0 auto;
                margin-left: 1rem;
                '>
                    <img src='" . base_url() . "assets/img/new-ciak/google-play.png' alt='googleplay' height='20'>
                </a>
            </div>
            <p style='
            text-align: center;
            font-weight: 400;
            font-size: 12px;
            color: #999999;
            '>
                Copyright © " . date('Y') . "
            </p>
        </div>
    </body>

    </html>
    ";

    return $html;
}
