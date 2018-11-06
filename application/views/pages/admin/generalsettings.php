        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?=GENSET?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><?=SETTINGS?></li>
                            <li class="active"><?=GENSET?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label"><?=ADDRESS?></label>
                                    <textarea id="txtcaddress" rows="5" style="resize:none;" class="form-control control" disabled><?=$genset['complete_address']?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="company" class=" form-control-label"><?=MAPLINK?></label>
                                    <textarea id="txtmaplink" rows="5" style="resize:none;" class="form-control control" disabled><?=$genset['map_link']?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="company" class=" form-control-label"><?=EMAIL?></label>
                                    <input type="text" id="txtemail" rows="5" style="resize:none;" class="form-control control" value="<?=$genset['email_address']?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="company" class=" form-control-label"><?=TBLCNO?></label>
                                    <input type="text" id="txtemail" rows="5" style="resize:none;" class="form-control control" value="<?=$genset['telephone']?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="company" class=" form-control-label"><?=FBPAGE?></label>
                                    <input type="text" id="txtfbpage" class="form-control control" value="<?=$genset['fb_page']?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="company" class=" form-control-label"><?=IGPAGE?></label>
                                    <input type="text" id="txtigpage" class="form-control control" value="<?=$genset['ig_page']?>" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="float-right">
                                    <button class="btn btn-primary btn-md" id="btnedit"><?=EDIT?></button>
                                    <div class="save">
                                        <button class="btn btn-success btn-md" id="btnsave"><?=SAVE?></button>
                                        <button class="btn btn-warning btn-md" id="btncancel"><?=CANCEL?></button>
                                    </div>
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
                $('.save').hide();
                $('#btnedit').click(function()
                {
                    $(this).hide();
                    $('.control').removeAttr('disabled');
                    $('.save').show();
                });

                $('#btncancel').click(function()
                {
                    $('#btnedit').show();
                    $('.control').attr('disabled', 'disabled');
                    $('.save').hide();
                });

                $('#btnsave').click(function()
                {
                    
                });
            });
        </script>