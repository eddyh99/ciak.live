        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="col-12 box-dashboard-ciak-top px-3 py-5 mt-3 mb-4 d-flex flex-row align-items-center">
                        <h3 class="me-auto fw-bold text-green-freedy">MASTER WALLET</h3>
                        <img src="<?=base_url()?>assets/img/logo-only.svg" alt="" style="height: 75px;" class="me-5">
                    </div>
                    <div class="col-12">
                        <div class="title d-flex justify-content-between">
                            <?php if ($_SESSION["role"] == "admin") { ?>
                                <span class="fw-bold text-green-freedy">Currency</span>
                                <span class="fw-bold text-green-freedy">Balance</span>
                            <?php } else { ?>
                        </div>
                        <div class="title d-flex justify-content-end">
                                <span class="fw-bold text-green-freedy me-4">Manajemen</span>
                                <span class="fw-bold text-green-freedy">Balance</span>
                            <?php } ?>
                        </div>

                        <div class="list-currency">
                            <?php
                                foreach ($currency as $dt){
                            ?>
                                    <div class="my-3">
                                        <a href="<?=base_url()?>godmode/mwallet?cur=<?=$dt?>">
                                            <div class="box-list fw-bold d-flex flex-row py-4 px-4 justify-content-between">
                                                <span> <?=$dt?>&nbsp;</span>
                                                <span>
                                                <?php foreach($trackless as $tc){
                                                        if ($tc["currency"]==$dt){    
                                                ?>
                                                            <span class="me-2">
                                                                <?php echo ($_SESSION["role"]=="super admin") ? number_format($tc["amount"],2):"" ?>
                                                            </span>
                                                <?php       break;
                                                        }
                                                      }
                                                ?>

                                                <?php if ($_SESSION["role"]=="super admin") { ?>
                                                    <span class="border-end border-1 border-white mx-5"></span>
                                                <?php } ?>

                                                    <?php foreach($ciakbalance as $cb){
                                                        if ($cb["currency"]==$dt){    
                                                ?>
                                                            <span class="ms-3">
                                                                <?=number_format($cb["amount"],2); ?>
                                                            </span>
                                                <?php       break;
                                                        }
                                                      }
                                                ?>                                                    
                                                    
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                            <?php 
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>