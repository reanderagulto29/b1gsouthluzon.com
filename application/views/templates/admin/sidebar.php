<!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="<?=base_url()?>assets/admin/images/b1gsl-logo2.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="<?=base_url()?>assets/admin/images/b1g.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">

                    <h3 class="menu-title"><?=HOME?></h3><!-- /.menu-title -->


                    <li id="dashboard">
                        <a href="<?=base_url()?>Admin"> <i class="menu-icon fa fa-dashboard"></i><?=DASHBOARD?> 
                        </a>
                    </li>

                    <li id="dashboard">
                        <a href="<?=base_url()?>Admin/reglist"> <i class="menu-icon fa fa-list"></i><?=REGLIST?> 
                        </a>
                    </li>

                    <h3 class="menu-title"><?=SETTINGS?></h3><!-- /.menu-title -->
                    <?php 
                        if($userdata['account_type'] === 'Web Admin')
                        {
                        ?>
                            <li>
                                <a href="<?=base_url()?>index.php/Admin/generalsettings"> 
                                    <i class="menu-icon ti-settings"></i><?=GENSET?> 
                                </a>
                            </li>
                        <?php
                        }
                        ?>

                    <li>
                        <a href="<?=base_url()?>index.php/Admin/accountsettings ">
                            <i class="menu-icon ti-user"></i><?=ACCSET?> 
                        </a>
                    </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
    <!-- Left Panel -->