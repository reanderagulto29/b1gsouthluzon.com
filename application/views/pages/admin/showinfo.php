<?php include_once("application/views/languages/en.php");?> 

  <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="largeModalLabel"><?=INFO?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body" id="mdView">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body card-block">
              <div class="row">
                <div class="col-md-6">
                  <!--<?php print_r($info);?> -->
                  <div class="form-group">
                    <label for="company" class=" form-control-label"><?=NAME?></label>
                    <input type="text" id="txtmdname" class="form-control" value="<?=$info['full_name']?>" readonly>
                  </div>

                  <div class="form-group">
                    <label for="vat" class=" form-control-label"><?=GEND?></label>
                    <input type="text" id="txtmdgender" class="form-control" value="<?=$info['gender']?>" readonly>
                  </div>

                  <div class="form-group">
                    <label for="street" class=" form-control-label"><?=CNO?></label>
                    <input type="text" id="txtmdcno" class="form-control" value="<?=$info['contact_no']?>" readonly>
                  </div>

                  <div class="form-group">
                    <label for="country" class=" form-control-label"><?=EMAIL?></label>
                    <input type="text" id="txtmdemail" class="form-control" value="<?=$info['email_address']?>" readonly>
                  </div>

                  <div class="form-group">
                    <label for="country" class=" form-control-label"><?=ADDRESS?></label>
                    <textarea class="form-control" id="txtmdaddress" rows="5" style="resize:none" readonly><?=$info['address']?></textarea>
                  </div>
                  
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="country" class=" form-control-label"><?=TSIZE?></label>
                    <input type="text" id="txtmdtsize" class="form-control" value="<?=$info['size_abbre']?> - <?=$info['size_name']?>" readonly>
                  </div>

                  <div class="form-group">
                    <label for="country" class=" form-control-label"><?=FIRSTIMER?></label>
                    <input type="text" id="txtmdftime" class="form-control" 
                    value="<?php echo $info['is_first_time'] == 1 ? 'Yes' : 'No' ;?>" readonly>
                  </div>

                  <div class="form-group invited">
                    <label for="country" class=" form-control-label"><?=DGPART?></label>
                    <input type="text" id="txtmddgpart" class="form-control" value="<?php echo $info['is_part_dg'] == 1 ? 'Yes' : 'No' ;?>" readonly>
                  </div>

                  <div class="dgl_info">
                    <div class="form-group">
                      <label for="country" class=" form-control-label"><?=SAT?></label>
                      <input type="text" id="txtmdsat" class="form-control" value="<?=$info['sat_name']?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="country" class=" form-control-label"><?=DGL?></label>
                      <input type="text" id="txtmddgl" class="form-control" value="<?=$info['dgroup_leader']?>" readonly> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
  </div>

  

  <script type="text/javascript">
    $(document).ready(function()
    {
      $('.dgl_info').hide();
      var part_dg = $('#txtmddgpart').val();
      if(part_dg === 'Yes')
         $('.dgl_info').show();
      if(firsttime === 'Yes')
         $('.invited').show();
    });
  </script>