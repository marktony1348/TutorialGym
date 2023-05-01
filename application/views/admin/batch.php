
<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/sidebar'); ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">Batch</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ml-auto">
                                <li><a href="#">Dashboard Admin</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0"><?php if(!empty($batch_edit_data))
        { ?> Edit Batch <?php }else{ echo"All Batch"; } ?> </h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ml-auto">
                                  <?php if(!empty($batch_edit_data))
        { ?> <?php }else{ ?><button class="btn btn-primary float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> <i class="fas fa-plus-square"></i>  
                                Add Batch 
                              </button><?php } ?>

                                </div>
                            </div>
                            <p>
                                <?php if ($this->session->tempdata('success_mesg')) {   ?>
                                    <div class="text-success text-center"><?php echo $this->session->tempdata('success_mesg');?></div>
                                <?php } ?>
                            </p>
                            <div class="collapse border box_shawow" id="collapseExample">
                              <div class="card card-body">
                                <?php if(!empty($batch_edit_data))
                                    { ?>
                                    <form class="form-horizontal form-con"  method="post" action="<?php echo  base_url()?>update_batch/<?php echo $batch_edit_data[0]->batch_id; ?>">
                                        <?php }else{ ?>
                                        <form class="form-horizontal form-con"  method="post" action="<?php echo  base_url()?>add_batch">
                                            <?php } ?>
                                    <fieldset>
                                    <div class="form-group"> 
                                      <div class="col-md-5">
                                        <input type="hidden" name="batch_id" <?php if(!empty($batch_edit_data))
                                    { ?> value="<?php echo $this->uri->segment(2); ?>" <?php } ?>>
                                      <input id="batch_name" name="batch_name" type="text" placeholder="Enter Batch Name" class="form-control input-md" required <?php if(!empty($batch_edit_data) && !empty($batch_edit_data[0]->batch_name))
                                    { ?> value="<?php echo $batch_edit_data[0]->batch_name; ?>" <?php } ?>>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="col-md-5">
                                      <input id="batch_limit" name="batch_limit" type="number" placeholder="No of Members" class="form-control input-md" <?php if(!empty($batch_edit_data) && !empty($batch_edit_data[0]->batch_limit))
                                    { ?> value="<?php echo $batch_edit_data[0]->batch_limit; ?>" <?php } ?> required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-md-5">
                                          <div class="row">
                                            <div class="form-group col-xs-6 col-md-6">
                                                 <label for="batch_start_time" class="">Start Time</label>
                                                <input id="batch_start_time" class="form-control" type="time" name="batch_start_time" <?php if(!empty($batch_edit_data) && !empty($batch_edit_data[0]->batch_start_time))
                                    { ?> value="<?php echo $batch_edit_data[0]->batch_start_time; ?>" <?php } ?> required />
                                            </div>

                                            <div class="form-group col-xs-6 col-md-6">
                                                <label for="batch_end_time" class="">End Time</label>
                                                <input id="batch_end_time" class="form-control" type="time" name="batch_end_time" <?php if(!empty($batch_edit_data) && !empty($batch_edit_data[0]->batch_end_time))
                                    { ?> value="<?php echo $batch_edit_data[0]->batch_end_time; ?>" <?php } ?> required />
                                            </div>
                                          </div>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="col-md-4">
                                        <button id="submit" name="submit" class="btn btn-primary"><i class="fas fa-check"></i> <?php if(!empty($batch_edit_data))
        { ?> Update <?php }else{ echo"Add"; } ?></button>
                                      </div>
                                    </div>
                                    </fieldset>
                                    </form>
                              </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table id="table_id" class="display">
                                <thead>
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th >Batch Name</th>
                                        <th class="centr">Limit</th>
                                        <th class="centr">Start Time</th>
                                        <th class="centr">End Time</th>
                                        <th class="centr">Status</th>
                                        <th class="centr"><i class="fas fa-edit" title="Edit"></i> Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($batch_data as $key => $value) {
                                     ?>
                                    <tr>
                                        <td><?php echo ++$key; ?></td>
                                        <td><a href="<?php echo base_url()."batch_new/".$value->batch_id; ?>"><?php echo $value->batch_name; ?></a></td>
                                        <td class="centr"><?php echo $value->batch_limit; ?></td>
                                        <td class="centr"><?php echo $value->batch_start_time; ?></td>
                                        <td class="centr"><?php echo $value->batch_end_time; ?></td>
                                        <td class="centr"><?php if($value->batch_status == 'YES'){ ?> <a href="<?php echo base_url()."upd_status/batch/batch_id/".$value->batch_id."/batch_status/NO"."/batch"; ?>" class="btn btn-danger">OFF</a><?php }else{
                                            ?> <a href="<?php echo base_url()."upd_status/batch/batch_id/".$value->batch_id."/batch_status/YES"."/batch"; ?>" class="btn btn-success">ON</a><?php } ?></td>
                                        <td class="centr"><a href="<?php echo base_url()."edit_batch/".$value->batch_id; ?>"><i class="fas fa-edit" title="Edit"></i></a></td>
                                    </tr>
                                  <?php  } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('include/footer'); ?>
        </div>
    </div>
     <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" style="float: left;">Batch Members Information -  <?php if(!empty($this->uri->segment(2)))
            {  echo get_value('batch','batch_id',$this->uri->segment(2),'batch_name'); } ?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            <table class="table">
                <tr>
                    <th>Sl. No.</th>
                    <th>Registration No.</th>
                    <th>Member Name</th>
                    <th>Email Id</th>
                    <th>Mobile Number</th>
                    <th>Date of Birth</th>
                    <th>Join Date</th>
                    <th>Gender</th>
                    <th>Training Type</th>
                </tr>
            <?php if(!empty($this->uri->segment(2)))
            { 
               $members_details = array();
               $set_tem = 'no';
               foreach($batch_data_model as $key => $value) {

                  if($set_tem !=$value->gym_mem_id_2)
                  {
                    $set_tem = $value->gym_mem_id_2;
                    $members_details = getdata($value->gym_mem_id_2);
                    echo"<tr>";
                    echo"<td>".++$key."</td>";
                    echo"<td>".$value->gym_mem_id_2."</td>";
                    echo"<td>".$members_details[0]->member_name."</td>";
                    echo"<td>".$members_details[0]->email_id."</td>";
                    echo"<td>".$members_details[0]->mobile_no."</td>";
                    echo"<td>".$members_details[0]->DOB."</td>";
                    echo"<td>".$members_details[0]->join_date."</td>";
                    echo"<td>".$members_details[0]->gender."</td>";
                    echo"<td>".$members_details[0]->training_type."</td>";
                    echo"</tr>";
                  }
                  
                ?>
            <?php } }
            if(count($batch_data_model) == 0)
            {
                echo"<tr>";
                echo"<td colspan='9'><center>No Records available</center></td>";
                echo"</tr>";
            }
             ?>
            </table>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-success" data-dismiss="modal">Close</button> -->
        </div>
      </div>
      
    </div>
  </div>
</body>
</html>
<style type="text/css">
    .form-con{    width: 110%;
    margin-left: 21%;}
    .input-md{padding-left: 10px !important;}
    .box_shawow{box-shadow: 0 16px 24px 2px rgba(0,0,0,.14), 0 6px 30px 5px rgba(0,0,0,.12), 0 8px 10px -5px rgba(0,0,0,.2);}
    .centr{text-align: center;}
</style>
<script type="text/javascript">
    $(document).ready(function() {
        
        <?php if(!empty($this->uri->segment(2)) && !(empty($batch_data_model)))
        { ?>
            $('#myModal').modal('show'); 
        <?php } ?>
            <?php if(!empty($batch_edit_data))
        { ?>
           $('.collapse').collapse({
             toggle: true
           });
        <?php } ?>
    });
</script>
<style type="text/css">
.modal-dialog {
    max-width: 500px;
    margin: 1.75rem auto;
    margin-left: 230px;
}
    .modal-content {width: 180%;}
</style>