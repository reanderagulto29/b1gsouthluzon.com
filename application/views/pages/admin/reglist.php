        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?=REGLIST?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?=base_url()?>index.php"><?=HOME?></a></li>
                            <li class="active"><?=REGLIST?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div>
                <div class="card">
                    <div class="card-body">
                      <div class="row">
						<div class="col-md-12">
							<?php if(!empty($show_error)) { ?>
								<?php if($show_error === 'ACK0001' && $show_error === 'DEL0001') { ?>
									<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
										<span class="badge badge-pill badge-success"><?=SUCCESS?></span>
										<br>
										<?php echo constant($show_error); ?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>

								<?php } else { ?>
									<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
										<span class="badge badge-pill badge-danger"><?=ERR?></span>
										<br>
										<?php echo constant($show_error); ?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								<?php } ?>
							<?php } ?>
							<div id="#mytable">
								<div class="containter-fluid">
									<div class="row">
										<div class="col-md-12 table-responsive">
											<table id="bootstrap-data-table" class="table table-striped table-bordered">
											  <thead>
												<tr>
												  <th><?=TBLPARTNO?></th>
												  <th><?=TBLNAME?></th>
												  <th><?=TBLCNO?></th>
												  <th><?=SAT?></th>
												  <th><?=TBLDATEREG?></th>
												  <th><?=TBLTSIZE?></th>
												  <th>Actions</th>
												</tr>
											  </thead>
											  <tbody id="message-tbody">
												<?php foreach ($allinfo as $info) 
												{
												?>
												  <tr>
													<td><?=$info['participant_no']?></td>
													<td><?=$info['full_name']?></td>
													<td><?=$info['contact_no']?></td>
													<td><?=$info['sat_name']?></td>
													<td><?=$info['date_registered']?></td>
													<td><?=$info['size_name']?></td>
													<td>
													  <button data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-info btn-sm btnview" id='<?=$info['info_id']?>'>
														<i class="fa fa-search" value="<?=$info['info_id']?>"></i>
													  </button>
													  <button data-toggle="modal" data-target=".bs-modal-viewimage" class="btn btn-primary btn-sm btnviewimage" id='<?=$info['info_id']?>'>
														<i class="fa fa-picture-o" value="<?=$info['info_id']?>"></i>
													  </button>
													  <?php if(empty($info['participant_no'])) 
													  {
														?>
														<button data-toggle="modal" data-target=".bs-modal-confirm" class="btn btn-success btn-sm btnverify" id='<?=$info['info_id']?>'>
														  <i class="fa fa-check" value="<?=$info['info_id']?>"></i>
														</button>
														
														<button data-toggle="modal" data-target=".bs-modal-confirm-delete" class="btn btn-danger btn-sm btndelete" id='<?=$info['info_id']?>'>
														  <i class="fa fa-times" value="<?=$info['info_id']?>"></i>
														</button>
													  <?php 
													  }
													  ?>
													</td>
													
												  </tr>
												<?php
												}
												?>
											  </tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
                        </div>
                      </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="modal fade bs-example-modal-lg" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
          </div>
        </div>

        <div class="modal fade bs-modal-viewimage" id="imageModal" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-image modal-lg">
          </div>
        </div>

        <div class="modal fade bs-modal-confirm" id="confirmModal" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-image modal-md">
              <div class="modal-content">
                <input type="hidden" id="txtid" name="txtid">
                <div class="modal-body" id="mdView">
                  <div class="col-md-12">
                    <h3 class="pb-2 display-5">Are you sure you want to acknowledge this participant?</h3>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary btn-sm" id="btnyes">Yes</button>
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" id="btnno">No</button>
                </div>
              </div>       
            </div>
        </div>
		
		<div class="modal fade bs-modal-confirm-delete" id="confirmDeleteModal" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-image modal-md">
              <div class="modal-content">
                <input type="hidden" id="txtiddelete" name="txtiddelete">
                <div class="modal-body" id="mdView">
                  <div class="col-md-12">
                    <h3 class="pb-2 display-5">Are you sure you want to delete this participant?</h3>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary btn-sm" id="btnyesdelete">Yes</button>
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" id="btnnodelete">No</button>
                </div>
              </div>       
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() 
            {
				$('#selSizes').hide();
				$('#selSatellite').hide();
                $('.myalert').hide();
				
				var table = $('#bootstrap-data-table').DataTable( {
					dom: 'Bfrtip',
					buttons: [
						'excel', 'pdf', 'print'
					]
				} );
				
                $('.dgl_info').hide();

                var part_dg = $('#txtmddgpart').val();
                if(part_dg === 'Yes')
                    $('.dgl_info').show();

                $(document).on('click', '.btnverify', function()
                {
                  var id = $(this).attr('id');
                  $('#txtid').val(id);
                });
				
				$(document).on('click', '.btndelete', function()
                {
                  var id = $(this).attr('id');
                  $('#txtiddelete').val(id);
                });
				
                $(document).on('click', '.btnview', function()
                {
                    var myid = $(this).attr('id');
                    var strurl = '<?=base_url()?>Admin/get_info';
                    $.ajax({
                        cache: false,
                        type: 'POST',
                        url: strurl,
                        data: {"id": myid },
                        success: function(data) 
                        {
                            $('.modal-dialog').html(data);
                        }
                    });
                });

                
                $('#btnyes').click(function()
                {
                  var myid = $('#txtid').val();
                  window.location.href = "<?=base_url()?>Admin/acknow_parti/" + myid;
                });
				
				$('#btnyesdelete').click(function()
                {
					var myid = $('#txtiddelete').val();
					window.location.href = "<?=base_url()?>Admin/delete_parti/" + myid;
                });
                

                $(document).on('click', '.btnviewimage', function()
                {
                    var strurl = '<?=base_url()?>Admin/get_image';
                    var myid = $(this).attr('id');
                    $.ajax({
                        cache: false,
                        type: 'POST',
                        url: strurl,
                        data: {"id": myid },
                        success: function(data) 
                        {
                            $('.modal-dialog-image').html(data);
                        }
                    });

                });
			
                var socket = io.connect( 'http://' + window.location.hostname + ':3000' );

                socket.on( 'new_registered', function( data ) 
                {
                    var dataString = { 
                        id : 'hello'
                    };
                    $.ajax(
                    {
                        type: "POST", 
                        url: "<?=base_url()?>admin/get_all_info",
                        data: dataString,
                        dataType: "json",
                        cache: false,
                        success: function(data)
                        {
                            table.clear();
                            $.each(data.dataArr, function(index, element)
                            {
                              var htmlappend = "";
                              var partno = "";
                              if(element.participant_no !== null)
                                    partno = element.participant_no;
                              if(element.participant_no === null)
                              {
                                 table.row.add([
                                                    partno,
                                                    element.full_name,
                                                    element.contact_no,
                                                    element.sat_name,
                                                    element.date_registered,
													element.size_name,
                                                    `<button data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-info btn-sm btnview" id="`+element.info_id+`">
                                                      <i class="fa fa-search" value="`+element.info_id+`"></i>
                                                    </button>
                                                    <button data-toggle="modal" data-target=".bs-modal-viewimage" class="btn btn-primary btn-sm btnviewimage" id="`+element.info_id+`">
                                                      <i class="fa fa-picture-o" value="`+element.info_id+`"></i>
                                                    </button>
                                                    <button data-toggle="modal" data-target=".bs-modal-confirm" class="btn btn-success btn-sm btnverify" id='`+element.info_id+`'>
                                                      <i class="fa fa-check" value="`+element.info_id+`"></i>
                                                    </button>
													<button data-toggle="modal" data-target=".bs-modal-confirm-delete" class="btn btn-danger btn-sm btndelete" id='`+element.info_id+`'>
													  <i class="fa fa-times" value="`+element.info_id+`"></i>
													</button>`
                                               ]).draw();
                              }
                              else
                              {
                                table.row.add([
                                              partno,
                                              element.full_name,
                                              element.contact_no,
                                              element.sat_name,
                                              element.date_registered,
                                              `<button data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-info btn-sm btnview" id="`+element.info_id+`">
                                                  <i class="fa fa-search" value="`+element.info_id+`"></i>
                                                </button>
                                                <button data-toggle="modal" data-target=".bs-modal-viewimage" class="btn btn-primary btn-sm btnviewimage" id="`+element.info_id+`">
                                                <i class="fa fa-picture-o" value="`+element.info_id+`"></i>`
                                         ]).draw();
                              }                        
                            });
                            table.reload();
                        }
                    }); 

                    $('#confirmModal').hide();
                    $('.modal-backdrop').hide();
                    $('.myalert').show();
                    
                });
            });
        </script>
