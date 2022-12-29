<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>404 Page Not Found</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Ciak CSS -->
    <link href="<?= config_item('base_url'); ?>assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <div id="loading">
        <div class="spinner-border text-light" role="status">
            <img src="" alt="">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div class="apps-container auth container-fluid light">
        <div class="apps">
            <div class="apps-body min-100vh">
                <div class="apps-auth w-100 d-flex flex-column">
                    <div class="logo mt-auto mb-5">
                        <img src="<?= config_item('base_url'); ?>assets/img/ciak-logo.png" alt="Ciak.Live">
                    </div>
                    <div class="col-10 col-sm-8 mx-auto mb-auto">
                        <div class="col-12 formbox-grey light p-4 mb-3">
                            <div class="mb-3 text-center">
                                <h3><?= $heading; ?></h3>
                                <?= $message; ?>
                            </div>
                            <div class="apps-list-btn text-center d-grid gap-2">
                                <a href="<?= config_item('base_url'); ?>"
                                    class="rounded fw-bold btn-ciak-o bg-gardien py-3 shadow-none">Back</a>
                            </div>
                        </div>
                        <div class="copyright-form mb-auto">
                            <span class="mx-1 powered light">Power by</span>
                            <div class="d-flex justify-content-center align-items-end">
                                <img src="<?= config_item('base_url'); ?>assets/img/mif-logo.png" class="mx-1 mif">
                                <span class="mx-1 mif fw-bold">Money Industrial Factory</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    function onReady(callback) {
        var intervalId = window.setInterval(function() {
            if (document.getElementsByTagName('body')[0] !== undefined) {
                window.clearInterval(intervalId);
                callback.call(this);
            }
        }, 1000);
    }

    function setVisible(selector, visible) {
        document.querySelector(selector).style.display = visible ? 'block' : 'none';
    }

    onReady(function() {
        setVisible('.apps-container', true);
        setVisible('#loading', false);
    });
    </script>
</body>

</html>