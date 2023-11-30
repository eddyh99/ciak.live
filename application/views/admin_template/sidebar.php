    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link <?= @$mn_dashboard ?>" href="<?= base_url() ?>godmode/dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <?php if ($_SESSION["role"]=="super admin"){?>
                        <a class="nav-link <?= @$mn_cost ?>" href="<?= base_url() ?>godmode/cost">
                            <div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
                            Manajemen Cost
                        </a>
                        <?php }?>
                        <a class="nav-link <?= @$mn_op ?>" href="<?= base_url() ?>godmode/topup">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Topup
                        </a>
                        <a class="nav-link <?= @$mn_fee ?>" href="<?= base_url() ?>godmode/fee">
                            <div class="sb-nav-link-icon"><i class="fas fa-money-bill"></i></div>
                            <?=NAMETITLE?> Fee
                        </a>
                        <a class="nav-link <?= @$mn_member ?>" href="<?= base_url() ?>godmode/member?status=active">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Member Active
                        </a>
                        <a class="nav-link <?= @$mn_member ?>" href="<?= base_url() ?>godmode/member?status=disabled2">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Member Disabled
                        </a>
                        <a class="nav-link <?= @$mn_member ?>" href="<?= base_url() ?>godmode/member?status=new">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            New Member
                        </a>
                        <a class="nav-link <?= @$mn_report ?>" href="<?= base_url() ?>godmode/reported">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Reported Post
                        </a>
                        <a class="nav-link" href="<?= base_url() ?>auth/logout">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
            </nav>
        </div>