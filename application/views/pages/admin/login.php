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
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/normalize.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/themify-icons.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?=base_url()?>assets/admin/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-form">
                    <div class="login-logo">
                        <img class="align-content" src="<?=base_url()?>assets/admin/images/b1gsl-logo2.png" alt="">
                    </div>
                    <br>
                    <?php 
                      $attributes = array(
                                      'role' => 'form', 
                                      'name' => 'newinfo',
                                      'method' => 'post'
                                    );
                      echo form_open("admin/login", $attributes); 
                      if(is_string($show_error))
                      {
                        if($show_error !== '') 
                        {
                            ?>
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo constant($show_error); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            <?php
                        }
                      }
                    ?> <!-- Opening tag <form> -->
                        <div class="form-group">
                            <label><?=USERNAME?></label>
                            <input type="text" id="txtusername" name="txtusername" class="form-control" placeholder="<?=USERNAME?>" value="<?=$username?>" required>
                        </div>
                        <div class="form-group">
                            <label><?=PASSWORD?></label>
                            <input type="password" id="txtpassword" name="txtpassword" class="form-control" placeholder="<?=PASSWORD?>" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30"><?=SIGNIN?></button>
                    </form>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <script src="<?=base_url()?>assets/admin/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="<?=base_url()?>assets/admin/js/popper.min.js"></script>
    <script src="<?=base_url()?>assets/admin/js/plugins.js"></script>
    <script src="<?=base_url()?>assets/admin/js/main.js"></script>

</body>
</html>
