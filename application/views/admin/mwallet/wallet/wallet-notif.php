<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <?php $this->load->view("admin/header"); ?>
            <div class="col-12 col-md-6 mb-5 mt-3 text-center mx-auto">
                <div class="card-body">
                    <div class="col-12 my-5">
                        <img src="<?= base_url() ?>assets/img/speedybank/logo.png" alt="" style="width: 100px;">
                        <span class="mt-3" style="display: block;">Your transfer successed</span>
                    </div>
                    <a href="<?= base_url() ?>admin/sendwallet"
                        class="btn btn-freedy-blue px-4 py-2 shadow-none mb-5">Back</a>
                </div>
            </div>
        </div>
    </main>
</div>