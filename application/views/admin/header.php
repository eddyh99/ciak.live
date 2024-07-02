<div class="col-12 box-dashboard-ciak-top px-3 py-5 mt-3 mb-4 d-flex flex-row align-items-center">
    <div class="d-flex flex-column me-auto">
        <h3 class="fw-bold text-green-freedy mb-4">MASTER WALLET</h3>
        <?php if($_SESSION["role"]=="admin"){?>
            <h6 class="fw-bold text-white">Balance</h6>
            <h4 class="fw-bold text-white"><?= $_SESSION["symbol"] ?> <?= number_format(balanceadmin($_SESSION["currency"]),2) ?></h4>
        <?php } else {?>
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-column justify-content-center align-items-center me-5">
                    <?php if ($_SESSION["role"]=="super admin"){?>
                    <h4 class="fw-bold text-white"><?= $_SESSION["symbol"] ?> <?= number_format(@$_SESSION["tcbalance"]->amount,2) ?></h4>
                    <span class="text-success fw-bold">( Management Balance )</span>
                    <?php } ?>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h4 class="fw-bold text-white"><?= $_SESSION["symbol"] ?> <?= number_format(balanceadmin($_SESSION["currency"]),2) ?></h4>
                    <span class="text-blue-freedy fw-bold">( Balance )</span>
                </div>
            </div>
        <?php } ?>
    </div>
    <img src="<?=base_url()?>assets/img/new-ciak/logo.png" alt="logo" style="height: 75px;" class="me-5">
</div>