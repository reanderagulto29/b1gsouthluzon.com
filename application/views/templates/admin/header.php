<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <?php include_once("application/views/languages/en.php");?> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=B1GSL?> - <?=ADMIN?></title>
    <meta name="description" content="<?=B1GSL?> - <?=ADMIN?> Page">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="apple-touch-icon" href="apple-icon.png"> -->
    <!-- <link rel="shortcut icon" href="favicon.ico"> -->

    <link rel="icon" type="image/png" href="<?=base_url()?>assets/img/b1g.png">

    <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/normalize.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/themify-icons.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?=base_url()?>assets/admin/scss/style.css">
    <link href="<?=base_url()?>assets/admin/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

    <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?=base_url()?>assets/admin/scss/style.css">



    <script src="<?=base_url()?>assets/admin/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="<?=base_url()?>assets/admin/js/plugins.js"></script>
    <script src="<?=base_url()?>assets/admin/js/main.js"></script>

    <script src="<?=base_url()?>assets/admin/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="<?=base_url()?>assets/admin/js/dashboard.js"></script>
    <script src="<?=base_url()?>assets/admin/js/widgets.js"></script>
    <script src="<?=base_url()?>assets/admin/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="<?=base_url()?>assets/admin/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="<?=base_url()?>assets/admin/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="<?=base_url()?>assets/admin/js/lib/vector-map/country/jquery.vmap.world.js"></script>

    <script src="<?=base_url()?>assets/admin/js/lib/data-table/datatables.min.js"></script>
    <script src="<?=base_url()?>assets/admin/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/admin/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="<?=base_url()?>assets/admin/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/admin/js/lib/data-table/jszip.min.js"></script>
    <script src="<?=base_url()?>assets/admin/js/lib/data-table/pdfmake.min.js"></script>
    <script src="<?=base_url()?>assets/admin/js/lib/data-table/vfs_fonts.js"></script>
    <script src="<?=base_url()?>assets/admin/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="<?=base_url()?>assets/admin/js/lib/data-table/buttons.print.min.js"></script>
    <script src="<?=base_url()?>assets/admin/js/lib/data-table/buttons.colVis.min.js"></script>

    <script src="<?=base_url()?>node_modules/socket.io/node_modules/socket.io-client/socket.io.js"></script>
	
	<style>
		body { padding-right: 0 !important; }
	</style>
	
</head>
<body>

    <?php include_once("application/views/templates/admin/sidebar.php");?>

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">
                <div class="col-sm-12">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <p> Hi, <?=$userdata['b1g_fname'];?></p>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?=base_url()?>admin/accountsettings"><i class="fa fa-user"></i><?=MYPROF?>
                            </a>
                            <a class="nav-link" href="<?=base_url()?>admin/logout"><i class="fa fa-sign-out"></i><?=LOGOUT?>
                            </a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language" >
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->