<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="<?= base_url() ?>godmode/dashboard">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link <?= @$mn_mwallet ?>"
                        href="<?= base_url() ?>godmode/mwallet?cur=<?= $_SESSION["currency"] ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-wallet"></i></div>
                        Master Wallet
                    </a>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                        aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                        Transactions
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url() ?>godmode/transactions/topup">Add/Receive Funds</a>
                            <a class="nav-link" href="<?= base_url() ?>godmode/transactions/towallet">Wallet to Wallet</a>
                            <a class="nav-link" href="<?= base_url() ?>godmode/transactions/tobank">Wallet to Bank</a>
                        </nav>
                    </div>
                    <?php if($_SESSION['role'] == 'super admin'){?>
                    <a class="nav-link <?= @$mn_swap ?>" href="<?= base_url() ?>godmode/swap">
                        <div class="sb-nav-link-icon"><i class="fas fa-right-left"></i></div>
                        Swap
                    </a>
                    <?php }?>
                    <a class="nav-link" href="<?= base_url() ?>auth/logout">
                        <div class="sb-nav-link-icon"><i class="fas fa-sign-out"></i></div>
                        Logout
                    </a>
                </div>
            </div>
        </nav>
    </div>