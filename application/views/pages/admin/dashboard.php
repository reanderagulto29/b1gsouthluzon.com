		<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?=DASHBOARD?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><?=DASHBOARD?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"><?=STAT?></strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6 col-lg-3">
                                    <div class="card bg-flat-color-1 text-light">
                                        <div class="card-body">
                                            <div class="h4 m-0" id="regctr"><?=$regCtr?></div>
                                            <div><?=REGMEM?></div>
                                            <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="<?=$regCtr?>" aria-valuemin="0" aria-valuemax="200"></div>
                                            <small class="text-light">Online Registration</small>
                                        </div>
                                    </div>
                                </div><!--/.col-->

                                <div class="col-md-6 col-lg-3">
                                    <div class="card bg-flat-color-3 text-light">
                                        <div class="card-body">
                                            <div class="h4 m-0" id="ftimer"><?=$firsttimer?></div>
                                            <div><?=FIRSTIMER?></div>
                                            <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="<?=$firsttimer?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            <small class="text-light">First Timers attending B1G Event</small>
                                        </div>
                                    </div>
                                </div><!--/.col-->

                                <div class="col-md-6 col-lg-3">
                                    <div class="card bg-flat-color-4 text-light">
                                        <div class="card-body">
                                            <div class="h4 m-0" id="nodgrp"><?=$notpartofdgroup?></div>
                                            <div><?=NOTDGPART?></div>
                                            <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="<?=$notpartofdgroup?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            <small class="text-light">Attendee(s) don't have DGroup</small>
                                        </div>
                                    </div>
                                </div><!--/.col-->
                                
                                <div class="col-md-6 col-lg-3">
                                    <div class="card bg-flat-color-5 text-light">
                                        <div class="card-body">
                                            <div class="h4 m-0" id="wdgrp"><?=$partofdgroup?></div>
                                            <div><?=DGPART?></div>
                                            <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="<?=$partofdgroup?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            <small class="text-light">Attendee(s) that have DGroup</small>
                                        </div>
                                    </div>
                                </div><!--/.col-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"><?=FTIME_NOGRP?></strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                      <thead>
                                        <tr>
                                          <th><?=TBLPARTNO?></th>
                                          <th><?=TBLNAME?></th>
                                          <th><?=GEND?></th>
                                          <th><?=TBLEMAIL?></th>
                                          <th><?=TBLCNO?></th>
                                        </tr>
                                      </thead>
                                      <tbody id="message-tbody">
                                        <?php foreach ($lstftimer as $info)     
                                        {
                                        ?>
                                          <tr>
                                            <td><?=$info['participant_no']?></td>
                                            <td><?=$info['full_name']?></td>
                                            <td><?=$info['gender']?></td>
                                            <td><?=$info['email_address']?></td>
                                            <td><?=$info['contact_no']?></td>
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
        </div> <!-- .content -->

        

        <script type="text/javascript">
            $(document).ready(function() 
            {

                var mytable = $('#bootstrap-data-table').DataTable();
                var socket = io.connect( 'http://' + window.location.hostname + ':3000' );
                
                socket.on('new_registered', function(data)
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
                            mytable.clear().draw();
                            $.each(data.dataArr, function(index, element)
                            {
                                var partno = "";
                                if(element.participant_no !== null)
                                    partno = element.participant_no;
                                if(element.is_first_time === '1' && element.is_part_dg === '0')
                                {
                                    mytable.row.add([
                                                  partno,
                                                  element.full_name,
                                                  element.gender,
                                                  element.email_address,
                                                  element.contact_no
                                             ]).draw();
                                }
                            }); 
                            mytable.reload();
                        }

                    });
                });

                socket.on( 'updated_count', function( data ) 
                {
                    $('#regctr').html(data.rgctr);
                    $('#ftimer').html(data.ftimer);
                    $('#nodgrp').html(data.nodg);
                    $('#wdgrp').html(data.wdg);
                });
            });
        </script>
