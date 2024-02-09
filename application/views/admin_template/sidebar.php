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
                            <div class="sb-nav-link-icon"><i class="fas fa-funnel-dollar"></i></div>
                            Topup
                        </a>
                        <a class="nav-link <?= @$mn_fee ?>" href="<?= base_url() ?>godmode/fee">
                            <div class="sb-nav-link-icon"><i class="fas fa-money-bill"></i></div>
                            <?=NAMETITLE?> Fee
                        </a>
                        <a class="nav-link collapsed <?= @$mn_member ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePagesMember" aria-expanded="false" aria-controls="collapsePagesMember">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Member
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePagesMember" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url() ?>godmode/member?status=active">Member Active</a>
                                <a class="nav-link" href="<?= base_url() ?>godmode/member?status=disabled2">Member Disabled</a>
                                <a class="nav-link" href="<?= base_url() ?>godmode/member?status=new">New Member</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed <?= @$mn_post ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePagesPost" aria-expanded="false" aria-controls="collapsePagesPost">
                            <div class="sb-nav-link-icon"><i class="fas fa-icons"></i></div>
                            Post
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePagesPost" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url() ?>godmode/reported">Reported Post</a>
                                <a class="nav-link" href="<?= base_url() ?>godmode/member/post">Change Post Category</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed <?= @$mn_live ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePagesLive" aria-expanded="false" aria-controls="collapsePagesLive">
                            <div class="sb-nav-link-icon"><i class="fas fa-video"></i></div>
                            Live
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePagesLive" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url() ?>godmode/live">Live Today</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="<?= base_url() ?>auth/logout">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
            </nav>
        </div>