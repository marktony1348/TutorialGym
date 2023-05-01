
<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/sidebar'); ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">Assign Trainer</h4>
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
                                <h3 class="box-title mb-0"><?php if(!empty($trainer_edit_data))
        { ?> Edit Assign Trainer <?php }else{ echo"Assign Trainer"; } ?> </h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ml-auto">
                                  <?php if(!empty($trainer_edit_data))
        { ?> <?php }else{ ?><button class="btn btn-primary float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> <i class="fas fa-plus-square"></i>  
                                Add Assign Trainer 
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
                                <?php if(!empty($trainer_edit_data))
                                    { ?>
                                    <form class="form-horizontal form-con"  method="post" action="<?php echo  base_url()?>update_assign_trainer/<?php echo $trainer_edit_data[0]->assign_id; ?>" enctype="multipart/form-data">
                                        <?php }else{ ?>
                                        <form class="form-horizontal form-con"  method="post" action="<?php echo  base_url()?>add_assign_trainer" enctype="multipart/form-data">
                                            <?php } ?>
                                    <fieldset>
                                      <?php
                                      if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->trainer_id))
                                      {
                                        $get_trainerid = $trainer_edit_data[0]->trainer_id;
                                      }
                                      else{
                                        $get_trainerid = 0;
                                      }
                                      ?>
                                    <div class="form-group">
                                      <div class="col-md-5">
                                      <select name="trainer_id" id="trainer_id" class="form-control input-md"  required>
                                    <option value="">select trainer</option>
                                    <?php foreach ($trainers as $key => $value) { 
                                      ?> 
                                      <option <?php if(!empty($value->trainer_id) && $value->trainer_id == $get_trainerid)
                                    { echo"selected"; } ?> value="<?php echo $value->trainer_id; ?>"><?php echo $value->trainer_name; ?></option>
                                     <?php } ?>
                                        </select>
                                      </div>
                                    </div> 
                                      <!--  -->
                                    <div class="form-group">
                                      <div class="col-md-5">
                                      <select name="day" id="day" class="form-control input-md"  required>
                                    <option value="">select Day</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->day) && $trainer_edit_data[0]->day == 'Monday')
                                    { echo"selected"; } ?> value="Monday">Monday</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->day) && $trainer_edit_data[0]->day == 'Tuesday')
                                    { echo"selected"; } ?> value="Tuesday">Tuesday</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->day) && $trainer_edit_data[0]->day == 'Wednesday')
                                    { echo"selected"; } ?> value="Wednesday">Wednesday</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->day) && $trainer_edit_data[0]->day == 'Thursday')
                                    { echo"selected"; } ?> value="Thursday">Thursday</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->day) && $trainer_edit_data[0]->day == 'Friday')
                                    { echo"selected"; } ?> value="Friday">Friday</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->day) && $trainer_edit_data[0]->day == 'Saturday')
                                    { echo"selected"; } ?> value="Saturday">Saturday</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->day) && $trainer_edit_data[0]->day == 'Sunday')
                                    { echo"selected"; } ?> value="Sunday">Sunday</option>
                                    
                                        </select>
                                      </div>
                                    </div>
                                    <!-- end day -->
                                     <!--  -->
                                    <div class="form-group">
                                      <div class="col-md-5">
                                      <select name="time_start" id="time_start" class="form-control input-md"  required>
                                    <option value="">select Time Start</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->time_start) && $trainer_edit_data[0]->time_start == '10')
                                    { echo"selected"; } ?> value="10">10 clock</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->time_start) && $trainer_edit_data[0]->time_start == '12')
                                    { echo"selected"; } ?> value="12">12 clock</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->time_start) && $trainer_edit_data[0]->time_start == '14')
                                    { echo"selected"; } ?> value="14">14 clock</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->time_start) && $trainer_edit_data[0]->time_start == '16')
                                    { echo"selected"; } ?> value="16">16 clock</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->time_start) && $trainer_edit_data[0]->time_start == '18')
                                    { echo"selected"; } ?> value="18">18 clock</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->time_start) && $trainer_edit_data[0]->time_start == '20')
                                    { echo"selected"; } ?> value="20">20 clock</option>
                                        </select>
                                      </div>
                                    </div>
                                    <!-- end start time -->
                                    <!--  -->
                                    <div class="form-group">
                                      <div class="col-md-5">
                                      <select name="time_end" id="time_end" class="form-control input-md"  required>
                                    <option value="">select Time End</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->time_end) && $trainer_edit_data[0]->time_end == '11')
                                    { echo"selected"; } ?> value="11">11 clock</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->time_end) && $trainer_edit_data[0]->time_end == '12')
                                    { echo"selected"; } ?> value="12">12 clock</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->time_end) && $trainer_edit_data[0]->time_end == '13')
                                    { echo"selected"; } ?> value="13">13 clock</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->time_end) && $trainer_edit_data[0]->time_end == '14')
                                    { echo"selected"; } ?> value="14">14 clock</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->time_end) && $trainer_edit_data[0]->time_end == '15')
                                    { echo"selected"; } ?> value="15">15 clock</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->time_end) && $trainer_edit_data[0]->time_end == '16')
                                    { echo"selected"; } ?> value="16">16 clock</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->time_end) && $trainer_edit_data[0]->time_end == '17')
                                    { echo"selected"; } ?> value="17">17 clock</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->time_end) && $trainer_edit_data[0]->time_end == '18')
                                    { echo"selected"; } ?> value="18">18 clock</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->time_end) && $trainer_edit_data[0]->time_end == '19')
                                    { echo"selected"; } ?> value="19">19 clock</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->time_end) && $trainer_edit_data[0]->time_end == '20')
                                    { echo"selected"; } ?> value="20">20 clock</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->time_end) && $trainer_edit_data[0]->time_end == '21')
                                    { echo"selected"; } ?> value="21">21 clock</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->time_end) && $trainer_edit_data[0]->time_end == '22')
                                    { echo"selected"; } ?> value="22">22 clock</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->time_end) && $trainer_edit_data[0]->time_end == '23')
                                    { echo"selected"; } ?> value="23">23 clock</option>
                                    <option <?php if(!empty($trainer_edit_data) && !empty($trainer_edit_data[0]->time_end) && $trainer_edit_data[0]->time_end == '24')
                                    { echo"selected"; } ?> value="24">24 clock</option>
                                    
                                        </select>
                                      </div>
                                    </div>
                                    <!-- end end time -->
                                    <div class="form-group">
                                      <div class="col-md-4">
                                        <button id="submit_btn" name="submit" class="btn btn-primary"><i class="fas fa-check"></i> <?php if(!empty($trainer_edit_data))
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
                                        <th class="centr">Name</th>
                                        <th class="centr">specialist</th>
                                        <th class="centr">photo</th>
                                         <th class="centr">Visibility</th>
                                         <th class="centr">Day</th>
                                         <th class="centr">Start Time</th>
                                         <th class="centr">End Time</th>
                                        <th class="centr"><i class="fas fa-edit" title="Edit"></i> Edit</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($trainer_data as $key => $value) {
                                     ?>
                                    <tr class="load_details">
                                        <td><?php echo ++$key; ?></td>
                                        <td class="centr"><?php echo get_value('tbl_trainer','trainer_id',$value->trainer_id,'trainer_name'); ?></td>
                                        <td class="centr"><?php echo get_value('tbl_trainer','trainer_id',$value->trainer_id,'specialist'); ?></td>
                                        <td class="centr"><img src="<?php echo base_url()?>uploads/<?php echo get_value('tbl_trainer','trainer_id',$value->trainer_id,'photo'); ?>" width="90" height="90" class="rounded-circle load_details" alt="Image not found" onerror="this.src='<?php echo base_url()?>uploads/broken-1.png';"></td>
                                        
                                        <td class="centr"><?php if($value->visible == 'YES'){ ?> <a href="<?php echo base_url()."upd_status/tbl_assign_trainer/assign_id/".$value->assign_id."/visible/NO"."/assign_trainer"; ?>" class="btn btn-danger">OFF</a><?php }else{
                                            ?> <a href="<?php echo base_url()."upd_status/tbl_assign_trainer/assign_id/".$value->assign_id."/visible/YES"."/assign_trainer"; ?>" class="btn btn-success">ON</a><?php } ?></td>
                                        <td><?php echo $value->day; ?></td>
                                        <td><?php echo $value->time_start; ?> Clock</td>
                                        <td><?php echo $value->time_end; ?> Clock</td>

                                        <td class="centr"><a href="<?php echo base_url()."edit_assign_trainer/".$value->assign_id; ?>"><i class="fas fa-edit" title="Edit"></i></a></td>
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
            <h4 class="modal-title" style="float: left;">Trainer Personal Information</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                   <img src="#" class="img-thumbnail" alt="Image not found" onerror="this.src='<?php echo base_url();?>uploads/broken-1.png';" id="ld_image">
                </div>
                <div class="col-md-6">
                  <div class="row">
                <div class="col-md-6">
                   <label>Trainer Name</label>
                   <input type="text" class="form-control" id="ld_trainer_name">
                </div>
                <div class="col-md-6">
                  <label>Specialist</label>
                  <input type="text" class="form-control" id="ld_Specialist">
                </div>
               <div class="col-md-6 pt-3">
                  <label>Visibility</label>
                  <input type="text" class="form-control" id="ld_visibility">
                </div>
                 <div class="col-md-6 pt-3">
                  <label>Day</label>
                  <input type="text" class="form-control" id="ld_day">
                </div>
                <div class="col-md-6 pt-3">
                  <label>Time Start</label>
                  <input type="text" class="form-control" id="ld_time_start">
                </div>
                <div class="col-md-6 pt-3">
                  <label>End Time</label>
                  <input type="text" class="form-control" id="ld_time_end">
                </div>
            </div>
                </div>
            </div>
            
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
    .hide {
  display: none;
}

.btn1 {
  display: inline-block;
  padding: 4px 12px;
  margin-bottom: 0;
  font-size: 14px;
  line-height: 20px;
  color: #333333;
  text-align: center;
  vertical-align: middle;
  cursor: pointer;
  border: 1px solid #ddd;
  box-shadow: 2px 2px 10px #eee;
  border-radius: 4px;
}

.btn1-large {
  padding: 11px 19px;
  font-size: 17.5px;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
}
.modal-content{width: 150%;}
#ld_image{width: 350px !important;height: 225px !important;}
</style>
<script type="text/javascript">
    $(document).ready(function() {
        <?php if(!empty($trainer_edit_data))
        { ?>
           $('.collapse').collapse({
             toggle: true
           });
        <?php } ?>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }

    $("#photo").change(function() {
      readURL(this);
    });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.load_details').click(function(){
            
             var row_index = $(this).closest('tr').index() + 1;
            var ld_trainer_name= $("#table_id tr:eq(" + row_index + ") td:eq(1)").text();
            var ld_Specialist= $("#table_id tr:eq(" + row_index + ") td:eq(2)").text();
            var ld_visibility= $("#table_id tr:eq(" + row_index + ") td:eq(4)").text();
            var ld_day= $("#table_id tr:eq(" + row_index + ") td:eq(5)").text();
            var ld_time_start= $("#table_id tr:eq(" + row_index + ") td:eq(6)").text();
            var ld_time_end= $("#table_id tr:eq(" + row_index + ") td:eq(7)").text();
            
            var image_soruce= $("#table_id tr:eq(" + row_index + ") td:eq(3)").find('img').attr("src");
            

             $("#ld_trainer_name").val(ld_trainer_name);
             $("#ld_Specialist").val(ld_Specialist);
             $("#ld_visibility").val(ld_visibility);
             $("#ld_day").val(ld_day);
             $("#ld_time_start").val(ld_time_start);
             $("#ld_time_end").val(ld_time_end);
              $("#ld_image").attr('src', image_soruce);
             $('#myModal').modal('show'); 
        });       
 });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#submit_btn").click(function(){
      
      $("#time_start").val();
      $("#time_end").val();
      if($("#time_end").val() > $("#time_start").val())
      {

      }
      else
      {
        event.preventDefault();
        alert("End Time worng Please check your Selection");
      }
    });
  });
</script>