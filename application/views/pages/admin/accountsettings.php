        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?=ACCSET?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><?=SETTINGS?></li>
                            <li class="active"><?=ACCSET?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block">
                        <div class="card-header">
                            <strong class="card-title"><?=CHGPASS?></strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php
                                        if(!empty($show_error))
                                        {
                                            if($show_error == "PASS0001")
                                            { ?>  
                                                <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                                                    <?php echo constant($show_error); ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                        <?php
                                            }
                                            else
                                            { ?>
                                                <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show oldpass">
                                                        <?php echo constant($show_error); ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                        <?php
                                            }
                                        } 
                                $attributes = array(
                                              'role' => 'form', 
                                              'name' => 'newinfo',
                                              'method' => 'post',
                                              'enctype' => "multipart/form-data"
                                            );
                              echo form_open("admin/update_password", $attributes);         

                                ?>

                                    <div class="form-group">
                                        <label for="company" class=" form-control-label"><?=CURPASS?></label>
                                        <input type="password" name="txtoldpass" id="txtoldpass" class="form-control control" required/>
                                    </div>

                                    <div class="form-group">
                                        <label for="company" class=" form-control-label"><?=NEWPASS?></label>
                                        <input type="password" name="txtnewpass" id="txtnewpass" class="form-control control" required/>
                                    </div>

                                    <div class="form-group">
                                        <label for="company" class=" form-control-label"><?=CONPASS?></label>
                                        <input type="password" name="txtconpass" id="txtconpass" class="form-control control" required/>
                                    </div>
                                    <div class="save">
                                        <button class="btn btn-success btn-md" id="btnsave"><?=SAVE?></button>
                                        <a class="btn btn-warning btn-md" id="btncancel"><?=CANCEL?></a>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function()
            {
                $('#btnedit').click(function()
                {
                    $(this).hide();
                    $('.control').removeAttr('disabled');
                    $('.save').show();
                });

                $('#btncancel').click(function()
                {
                    $('.control').val('');
                });
            });
        </script>