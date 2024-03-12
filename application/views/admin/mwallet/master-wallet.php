<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
    value="<?php echo $this->security->get_csrf_hash(); ?>">

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <?php $this->load->view("admin/header"); ?>
            <div class="col-12 my-5">
                <a href="<?= base_url() ?>godmode/mwallet/withdraw"
                    class="btn btn-green-ciak fw-bold px-5 py-3">Withdraw</a>
            </div>
            <div class="col-12 card mwallet mb-5">
                <div class="card-header fw-bold">
                    <i class="fas fa-list me-1"></i>
                    Transactions
                </div>
                <div class="card-body">
                    <input class="datepicker-af" type="text" name="tgl" id="tgl" readonly>
                    <table class="table table-bordered" id="tbl_history" data-page="page1">
                        <thead class="table-ciak">
                            <tr>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Management Cost</th>
                                <th>Ciak Cost</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody class="body-ciak" style="border-top: 0;">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>