
<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/sidebar'); ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">Trainer</h4>
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
                                <h3 class="box-title mb-0"><?php if(!empty($member_edit_data))
        { ?> Edit Trainer <?php }else{ echo"All Trainer"; } ?> </h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ml-auto">
                                  <?php if(!empty($member_edit_data))
        { ?> <?php }else{ ?><button class="btn btn-primary float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> <i class="fas fa-plus-square"></i>  
                                Add Trainer 
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
                                <?php if(!empty($member_edit_data))
                                    { ?>
                                    <form class="form-horizontal form-con"  method="post" action="<?php echo  base_url()?>update_trainer/<?php echo $member_edit_data[0]->trainer_id; ?>" enctype="multipart/form-data">
                                        <?php }else{ ?>
                                        <form class="form-horizontal form-con"  method="post" action="<?php echo  base_url()?>add_trainer" enctype="multipart/form-data">
                                            <?php } ?>
                                    <fieldset>
                                    <div class="form-group"> 

                                        <div class="col-md-5">
                                          <div class="row">
                                            <div class="form-group col-xs-6 col-md-4">
                                                  <input type="file" name="photo" id="photo" class="hide" <?php if(!empty($member_edit_data) && $member_edit_data[0]->photo){  }else{ ?> required <?php }?> />
                  <label for="photo" class="btn1 btn1-large">Trainning Photo</label>
                                            </div>


                                            <div class="form-group col-xs-6 col-md-6">
                                               <img <?php if(!empty($member_edit_data) && $member_edit_data[0]->photo){ ?>
                                               src="<?php echo  base_url()."uploads/".$member_edit_data[0]->photo; ?>" alt="Image not found" onerror="this.src='<?php echo base_url()?>uploads/broken-1.png';" <?php }else{ ?> src="<?php echo  base_url()?>uploads/1.jpg" <?php } ?>class="rounded-circle" width="150" name="imageUpload" height="150" id="blah">
                                            </div>
                                          </div>
                                      </div>
                                      <!-- start -->
                                      <div class="col-md-5">
                                          <div class="row">
                                            <div class="form-group col-xs-6 col-md-4">
                                                  <input type="file" name="photo1" id="photo1" class="hide" <?php if(!empty($member_edit_data) && $member_edit_data[0]->photo1){  }else{ ?> required <?php }?> />
                  <label for="photo1" class="btn1 btn1-large">Trainer Photo</label>
                                            </div>


                                            <div class="form-group col-xs-6 col-md-6">
                                               <img <?php if(!empty($member_edit_data) && $member_edit_data[0]->photo1){ ?>
                                               src="<?php echo  base_url()."uploads/".$member_edit_data[0]->photo1; ?>" alt="Image not found" onerror="this.src='<?php echo base_url()?>uploads/broken-1.png';" <?php }else{ ?> src="<?php echo  base_url()?>uploads/1.jpg" <?php } ?>class="rounded-circle" width="150" name="imageUpload" height="150" id="blah1">
                                            </div>
                                          </div>
                                      </div>
                                      <!-- end -->
                                      <div class="col-md-5">
                                       
                                      <input id="trainer_name" name="trainer_name" type="text" placeholder="Enter Trainer Name" class="form-control input-md" required <?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->trainer_name))
                                    { ?> value="<?php echo $member_edit_data[0]->trainer_name; ?>" <?php } ?>>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="col-md-5">
                                      <select name="specialist" id="specialist" class="form-control input-md"  required>
                                    <option value="">select specialist</option>
                                    <option <?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->specialist) && $member_edit_data[0]->specialist == 'Body building')
                                    { echo"selected"; } ?> value="Body building">Body building</option>
                                    <option <?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->specialist) && $member_edit_data[0]->specialist == 'Racing runing')
                                    { echo"selected"; } ?> value="Racing runing">Racing runing</option>
                                    <option <?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->specialist) && $member_edit_data[0]->specialist == 'Yoga Fitness')
                                    { echo"selected"; } ?> value="Yoga Fitness">Yoga Fitness</option>
                                    <option <?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->specialist) && $member_edit_data[0]->specialist == 'Kick boxing')
                                    { echo"selected"; } ?> value="Kick boxing">Kick boxing</option>
                                    <option <?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->specialist) && $member_edit_data[0]->specialist == 'Cardio workout')
                                    { echo"selected"; } ?> value="Cardio workout">Cardio workout</option>
                                    <option <?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->specialist) && $member_edit_data[0]->specialist == 'Martial Arts')
                                    { echo"selected"; } ?> value="Martial Arts">Martial Arts</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-md-5"> 
                                        <input id="fb" name="fb" type="text" placeholder="Paste Facebook Link" class="form-control input-md" required <?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->fb))
                                      { ?> value="<?php echo $member_edit_data[0]->fb; ?>" <?php } ?>>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                      <div class="col-md-5"> 
                                        <input id="tw" name="tw" type="text" placeholder="Paste Twitter Link" class="form-control input-md" required <?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->tw))
                                      { ?> value="<?php echo $member_edit_data[0]->tw; ?>" <?php } ?>>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                      <div class="col-md-5"> 
                                        <input id="ins" name="ins" type="text" placeholder="Paste Instagram Link" class="form-control input-md" required <?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->ins))
                                      { ?> value="<?php echo $member_edit_data[0]->ins; ?>" <?php } ?>>
                                        </div>
                                      </div>
                                    <div class="form-group">
                                      <div class="col-md-4">
                                        <button id="submit" name="submit" class="btn btn-primary"><i class="fas fa-check"></i> <?php if(!empty($member_edit_data))
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
                                        <th class="centr">Training</th>
                                        <th class="centr">Trainer</th>
                                         <th class="centr">Visibility</th>
                                        <th class="centr"><i class="fas fa-edit" title="Edit"></i> Edit</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($member_data as $key => $value) {
                                     ?>
                                    <tr class="load_details">
                                        <td><?php echo ++$key; ?></td>
                                        
                                        <td class="centr"><?php echo $value->trainer_name; ?></td>
                                        <td class="centr"><?php echo $value->specialist; ?></td>
                                        <td class="centr"><img src="<?php echo base_url()?>uploads/<?php echo $value->photo; ?>" width="90" height="90" class="rounded-circle load_details" alt="Image not found" onerror="this.src='<?php echo base_url()?>uploads/broken-1.png';"></td>
                                        <td class="centr"><img src="<?php echo base_url()?>uploads/<?php echo $value->photo1; ?>" width="90" height="90" class="rounded-circle load_details" alt="Image not found" onerror="this.src='<?php echo base_url()?>uploads/broken-1.png';"></td>
                                        
                                        <td class="centr"><?php if($value->visible == 'YES'){ ?> <a href="<?php echo base_url()."upd_status/tbl_trainer/trainer_id/".$value->trainer_id."/visible/NO"."/trainer"; ?>" class="btn btn-danger">OFF</a><?php }else{
                                            ?> <a href="<?php echo base_url()."upd_status/tbl_trainer/trainer_id/".$value->trainer_id."/visible/YES"."/trainer"; ?>" class="btn btn-success">ON</a><?php } ?></td>
                                        <td class="centr"><a href="<?php echo base_url()."edit_trainer/".$value->trainer_id; ?>"><i class="fas fa-edit" title="Edit"></i></a></td>
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
                   <img src="#" class="img-thumbnail" alt="Image not found" onerror="this.src='<?php echo base_url();?>uploads/broken-1.png';" id="ld_image1">
                </div>
              </div>
              <br>
                <div class="row">
                  <div class="col-md-4">
                     <label>Trainer Name</label>
                     <input type="text" class="form-control" id="ld_trainer_name">
                  </div>
                  <div class="col-md-4">
                    <label>Specialist</label>
                    <input type="text" class="form-control" id="ld_Specialist">
                  </div>
                 <div class="col-md-4">
                    <label>Visibility</label>
                    <input type="text" class="form-control" id="ld_visibility">
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
#ld_image,#ld_image1{width: 350px !important;height: 225px !important;}
</style>
<script type="text/javascript">
    $(document).ready(function() {
        <?php if(!empty($member_edit_data))
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
    function readURL1(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $('#blah1').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }

    $("#photo1").change(function() {
      readURL1(this);
    });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.load_details').click(function(){
            
             var row_index = $(this).closest('tr').index() + 1;
            var ld_trainer_name= $("#table_id tr:eq(" + row_index + ") td:eq(1)").text();
            var ld_Specialist= $("#table_id tr:eq(" + row_index + ") td:eq(2)").text();
            var ld_visibility= $("#table_id tr:eq(" + row_index + ") td:eq(5)").text();
            
            var image_soruce= $("#table_id tr:eq(" + row_index + ") td:eq(3)").find('img').attr("src");
            var image_soruce1= $("#table_id tr:eq(" + row_index + ") td:eq(4)").find('img').attr("src");
            

             $("#ld_trainer_name").val(ld_trainer_name);
             $("#ld_Specialist").val(ld_Specialist);
             $("#ld_visibility").val(ld_visibility);
              $("#ld_image").attr('src', image_soruce);
              $("#ld_image1").attr('src', image_soruce1);
             $('#myModal').modal('show'); 
        });       
 });
</script>
<script type="text/javascript">
  
</script>