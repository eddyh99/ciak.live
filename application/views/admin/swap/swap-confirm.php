<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="col-12 col-md-6 card cost mb-5 mt-3 mx-auto">
                <div class="card-header fw-bold">
                    <i class="fas fa-list me-1"></i>
                    Swap
                </div>
                <div class="card-body">
                    <form method="POST" id="swapconfirm" action="<?= base_url() ?>godmode/swap/admin_notif" class="swap"
                        onsubmit="return validate()">
                        <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="quoteid" value="<?= $data["quoteid"] ?>">
                        <input type="hidden" name="toswap" value="<?= $data["target"] ?>">
                        <div class="col-12 list-send-wallet d-flex flex-column align-items-center mb-5">
                            <span class="text-white">Amount</span>
                            <!-- <span class="text-white">5</span> -->
                            <span class="text-white"><?= $_SESSION['symbol'] ?> <?= number_format($data["amount"],2) ?></span>
                            <input type="text" class="form-control mb-4" name="amount" id="amount" placeholder="Amount"
                                value="<?= $data["amount"] ?>" hidden>
                        </div>
                        <div class="col-12 list-send-wallet d-flex flex-column align-items-center mb-3">
                            <span class="text-white">New Balance</span>
                            <?php if($_SESSION["role"]=="admin"){?>
                                <span class="text-white"><?= $_SESSION['symbol'] ?>
                                    <?=  number_format((balanceadmin($_SESSION["currency"]) - $data["amount"]),2) ?>
                                </span>
                            <?php } else {?>
                                <span class="text-white"><?= $_SESSION['symbol'] ?>
                                    <?= number_format(number_format($_SESSION["tcbalance"]->amount,2) - number_format($data["amount"],2), 2)  ?>
                                </span>
                            <?php } ?>

                        </div>
                        <div class="row">
                            <div class="d-flex flex-row mt-4 justify-content-center">
                                <a href="<?= base_url() ?>godmode/swap"
                                    class="btn btn-freedy-white px-4 py-2 me-2 shadow-none">Cancel</a>
                                <button class="btn btn-green-ciak px-4 py-2 shadow-none" type="submit"
                                    id="btnconfirm">Confirm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>