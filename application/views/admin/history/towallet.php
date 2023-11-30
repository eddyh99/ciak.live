<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
    value="<?php echo $this->security->get_csrf_hash(); ?>">

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <?php $this->load->view("admin/header"); ?>
            <div class="col-12 card mb-5">
                <div class="card-header fw-bold">
                    <i class="fas fa-list me-1"></i>
                    Transactions
                </div>
                <div class="card-body">
                    <input class="datepicker-af" type="text" name="tgl" id="tgl" readonly>
                    <table id="tbl_history" class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th>Description</th>
                                <th>Trackless Cost</th>
                                <th>Referral Sender</th>
                                <th>Referral Receiver</th>
                                <th><?= NAMETITLE ?> Sender Cost</th>
                                <th><?= NAMETITLE ?> Receive Cost</th>
                                <th>Income</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody style="border-top: 0;">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>