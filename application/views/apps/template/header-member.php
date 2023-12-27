<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url() ?>assets/img/new-ciak/logo.png" rel="icon">
    <link href="<?= base_url() ?>assets/img/new-ciak/logo.png" rel="apple-touch-icon">
    <?php
        $path=explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        if (@$path[2]=='post') {
            //if (@$posts->type=="public"){
    ?>
              <meta property="og:image" content="<?=URLAPI?>/users/blur/defaultspeciallock.jpg">
              <meta property="og:image:secure_url" content="<?=URLAPI?>/users/blur/defaultspeciallock.jpg">
    <?php   //}else{?>
              <!--<meta property="og:image" content="<?=@$posts->post_media[0]->imgblur?>">-->
              <!--<meta property="og:image:secure_url" content="<?=@$posts->post_media[0]->imgblur?>">-->
    <?php   //}?>
              <meta property="og:title" content="CIAK.live" />
              <meta property="og:description" content="CIAK.LIVE is a new uncensored Social Network, designed to help you monetize your passions and skills." />
              <meta property="og:url" content="<?=base_url()."/".$_SERVER['REQUEST_URI']?>" />
              <meta property="og:type" content="website" />    
    <?php
        }
    ?>
    
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="<?=base_url()?>">
    <meta property="twitter:url" content="<?=base_url()."/".$_SERVER['REQUEST_URI']?>">
    <meta name="twitter:title" content="CIAK.live">
    <meta name="twitter:description" content="">
    <?php
        $path=explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        if (@$path[2]=='post') {
            if (@$posts->type=="public"){
    ?>
                <meta name="twitter:image" content="<?=@$posts->post_media[0]->imgorg?>">
    <?php   }else{?>
                <meta name="twitter:image" content="<?=@$posts->post_media[0]->imgblur?>">
    <?php   }
        }
    ?>
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- additional libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" type="text/css" rel="stylesheet" />


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Ciak CSS -->
    <link href="<?= base_url(); ?>assets/css/app-style.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/css/font-custom.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/css/star-rating-svg.css" rel="stylesheet" />
    
    <?php 
        if (isset($cssextra)) {
            $this->load->view($cssextra);
        }
    ?>

</head>

<body class="bg-white">
    <div class="apps-container member px-0">
        <div class="apps">