
<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/sidebar'); ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">Member</h4>
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
        { ?> Edit Member <?php }else{ echo"All Member"; } ?> </h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ml-auto">
                                  <?php if(!empty($member_edit_data))
        { ?> <?php }else{ ?><button class="btn btn-primary float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> <i class="fas fa-plus-square"></i>  
                                Add Member 
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
                                    <form class="form-horizontal form-con"  method="post" action="<?php echo  base_url()?>update_member/<?php echo $member_edit_data[0]->gym_mem_id; ?>" enctype="multipart/form-data">
                                        <?php }else{ ?>
                                        <form class="form-horizontal form-con"  method="post" action="<?php echo  base_url()?>add_member" enctype="multipart/form-data">
                                            <?php } ?>
                                    <fieldset>
                                    <div class="form-group"> 

                                        <div class="col-md-5">
                                          <div class="row">
                                            <div class="form-group col-xs-6 col-md-4">
                                                  <input type="file" name="photo" id="photo" class="hide" <?php if(!empty($member_edit_data) && $member_edit_data[0]->photo){  }else{ ?> required <?php }?> />
  <label for="photo" class="btn1 btn1-large">Select file</label>
                                            </div>


                                            <div class="form-group col-xs-6 col-md-6">
                                               <img <?php if(!empty($member_edit_data) && $member_edit_data[0]->photo){ ?>
                                               src="<?php echo  base_url()."uploads/".$member_edit_data[0]->photo; ?>" alt="Image not found" onerror="this.src='<?php echo base_url()?>uploads/broken-1.png';" <?php }else{ ?> src="<?php echo  base_url()?>uploads/1.jpg" <?php } ?>class="rounded-circle" width="150" name="imageUpload" height="150" id="blah">
                                            </div>
                                          </div>
                                      </div>
                                      <div class="col-md-5">
                                        <input type="hidden" name="gym_mem_id_hide" <?php if(!empty($member_edit_data))
                                    { ?> value="<?php echo $this->uri->segment(3); ?>" <?php } ?>>
                                      <input id="member_name" name="member_name" type="text" placeholder="Enter Member Name" class="form-control input-md" required <?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->member_name))
                                    { ?> value="<?php echo $member_edit_data[0]->member_name; ?>" <?php } ?>>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="col-md-5">
                                      <input id="mobile_no" name="mobile_no" type="text" placeholder="Enter Mobile Number" class="form-control input-md" <?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->mobile_no))
                                    { ?> value="<?php echo $member_edit_data[0]->mobile_no; ?>" <?php } ?> required  pattern="[456789][0-9]{9}" title="Phone number with 4-9 and remaing 9 digit with 0-9">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-md-5">
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="training_type" id="inlineRadio1" value="general_training" <?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->training_type) && $member_edit_data[0]->training_type =='general_training')
                                    { ?>  checked <?php } ?>>
                                          <label class="form-check-label" for="inlineRadio1">General Training</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="training_type" id="inlineRadio2" value="personal_training" <?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->training_type) && $member_edit_data[0]->training_type =='personal_training')
                                    { ?>  checked <?php } ?>>
                                          <label class="form-check-label" for="inlineRadio2">Personal Training</label>
                                        </div>
                                      </div>
                                    </div>
                                     <div class="form-group">
                                      <div class="col-md-5">
                                      <input id="gym_mem_id" name="gym_mem_id" type="text" placeholder="Enter Member Id" class="form-control input-md" 

                                      <?php if(!empty($member_edit_data) && $member_edit_data[0]->gym_mem_id_2){ ?>
                                        value="<?php echo $member_edit_data[0]->gym_mem_id_2; ?>"
                                    <?php }else{ ?>
                                      <?php if(!empty($last_memer_id) && !empty($last_memer_id[0]->gym_mem_id))
                                    { ?> value="<?php echo "GYM".++$last_memer_id[0]->gym_mem_id; ?>" <?php } } ?> required readonly>
                                      </div>
                                    </div>
                                    <?php if(!empty($batch_data)){ ?>
                                    <div class="form-group">
                                      <div class="col-md-5">
                                      <select class="form-control" name="batch_id" required="">
                                          <option value="">Select Batch</option>
                                          <?php foreach ($batch_data as $key => $value) { 
                                            $a_count = get_batch_count($value->batch_id);
                                            if($value->batch_limit > $a_count)
                                            {
                                            ?>
                                             <option value="<?php echo $value->batch_id; ?>"><?php echo $value->batch_name; ?></option>
                                          <?php  } } ?>
                                      </select>
                                      </div>
                                    </div>
                                    <?php } 
                                    if(!empty($plan_data)){ ?>
                                    <div class="form-group">
                                      <div class="col-md-5">
                                      <select class="form-control plan_select amount_cal" name="plan_id" required="">
                                          <option value="">Select Plan</option>
                                          <?php foreach ($plan_data as $key => $value) { ?>
                                             <option value="<?php echo $value->plan_id; ?>"><?php echo $value->plan_name."--".$value->plan_amount; ?></option>
                                          <?php  } ?>
                                      </select>
                                      </div>
                                    </div>
                               
                                    <div class="form-group">
                                        <div class="col-md-5">
                                        
                                      <input id="plan_amount" name="plan_amount" type="text" placeholder="Plan Amount" class="form-control input-md" required readonly>
                                      </div>
                                      </div>
                                       <?php } ?>
                                      <div class="form-group">
                                        <div class="col-md-5">
                                        <label for="" class="">Join Date</label>
                                      <input id="join_date" name="join_date" type="date" class="form-control input-md" required <?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->join_date))
                                    { ?> value="<?php echo $member_edit_data[0]->join_date; ?>" <?php } ?> min="<?= date('Y-m-d'); ?>">
                                      </div>
                                      </div>
                                       <?php 
                                    if(!empty($plan_data)){ ?>
                                      <div class="form-group">
                                        <div class="col-md-5">
                                        
                                      <input id="amount" name="amount" type="number" placeholder="Paid Amount" class="form-control input-md amount_cal" required <?php if(!empty($batch_edit_data) && !empty($batch_edit_data[0]->amount))
                                    { ?> value="<?php echo $batch_edit_data[0]->amount; ?>" <?php } ?>>
                                      </div>
                                      </div>
                                    <div class="form-group">
                                        <div class="col-md-5">
                                        
                                      <input id="due_amount" name="due_amount" type="number" placeholder="Due Amount" class="form-control input-md" required <?php if(!empty($batch_edit_data) && !empty($batch_edit_data[0]->due_amount))
                                    { ?> value="<?php echo $batch_edit_data[0]->due_amount; ?>" <?php } ?>>
                                      </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="col-md-5">
                                        
                                      <textarea class="form-control  input-md" name="payment_comments" required placeholder="Payment Comment"><?php if(!empty($batch_edit_data) && !empty($batch_edit_data[0]->payment_comments)){ ?> value="<?php echo $batch_edit_data[0]->payment_comments; ?>" <?php } ?></textarea>
                                      </div>
                                      </div>

                                      <div class="form-group">
                                      <div class="col-md-5">
                                          <div class="row">
                                            <div class="form-group col-xs-6 col-md-12">
                                                 <label for="batch_start_time" class="">Discount in Plan</label>
                                                <div class="col-md-12">
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input amount_cal" type="radio" name="discount_type" id="inlineRadio_1" value="Percent">
                                          <label class="form-check-label" for="inlineRadio_1">Percent</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input amount_cal" type="radio" name="discount_type" id="inlineRadio_2" value="Amount">
                                          <label class="form-check-label" for="inlineRadio_2">Amount</label>
                                        </div>
                                      </div>
                                            </div>

                                            
                                          </div>
                                      </div>
                                    </div>

                                     <div class="form-group">
                                        <div class="col-md-5">
                                        
                                      <input id="discout_amount_or_percentage" name="discout_amount_or_percentage" type="number" placeholder="Percent or Amount" class="form-control input-md amount_cal" required <?php if(!empty($batch_edit_data) && !empty($batch_edit_data[0]->discout_amount_or_percentage))
                                    { ?> value="<?php echo $batch_edit_data[0]->discout_amount_or_percentage; ?>" <?php }else{ echo"value='0'";} ?>>
                                      </div>
                                      </div>
                                  <?php } ?>
                                  
                                      <div class="form-group">
                                        <div class="col-md-5">
                                        
                                      <input id="admission_fees" name="admission_fees" type="number" placeholder="Admission Fees If any" class="form-control input-md" required <?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->admission_fees))
                                    { ?> value="<?php echo $member_edit_data[0]->admission_fees; ?>" <?php } ?>>
                                      </div>
                                      </div>
                                       
                                      <div class="form-group">
                                      <div class="col-md-5">
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="gender" id="inlineRadio_123" value="MALE" <?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->gender) && $member_edit_data[0]->gender =='MALE')
                                    { ?>  checked <?php } ?>>
                                          <label class="form-check-label" for="inlineRadio_123">MALE</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="gender" id="inlineRadio_121" value="FEMALE" <?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->gender) && $member_edit_data[0]->gender =='FEMALE')
                                    { ?>  checked <?php } ?>>
                                          <label class="form-check-label" for="inlineRadio_121">FEMALE</label>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-5">
                                        
                                      <input id="email_id" name="email_id" type="email" placeholder="Enter Email ID" class="form-control input-md" required <?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->email_id))
                                    { ?> value="<?php echo $member_edit_data[0]->email_id; ?>" <?php }else{ ?> onkeyup="check_email()" <?php } ?> >
                                      </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="col-md-5">
                                        <label for="" class="">Date of birth </label>
                                      <input id="DOB" name="DOB" type="date"  class="form-control input-md" required <?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->DOB))
                                    { ?> value="<?php echo $member_edit_data[0]->DOB; ?>" <?php } ?>>
                                      </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="col-md-5">
                                        
                                      <textarea class="form-control input-md" name="address" required placeholder="Enter Address"><?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->address)){ ?><?php echo $member_edit_data[0]->address; ?><?php }?></textarea>
                                      </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="col-md-5">
                                        
                                      <textarea class="form-control input-md" name="medical_info" required placeholder="Enter any others comments e.g. Medical information"><?php if(!empty($member_edit_data) && !empty($member_edit_data[0]->medical_info)){ ?><?php echo $member_edit_data[0]->medical_info; ?><?php }?></textarea>
                                      </div>
                                      </div>
                                    <?php  if(!empty($workout_data)){ ?>
                                    <div class="form-group">
                                      <div class="col-md-5">
                                      <select class="form-control plan_select amount_cal" name="workout_id" required="">
                                          <option value="">Select Workout</option>
                                          <?php foreach ($workout_data as $key => $value) { ?>
                                             <option value="<?php echo $value->workout_id; ?>" <?php if(!empty($member_edit_data) && $member_edit_data[0]->workout_id == $value->workout_id) { echo"selected"; } ?>><?php echo $value->workout_name; ?></option>
                                          <?php  } ?>
                                      </select>
                                      </div>
                                    </div>
                                    <?php } ?>
                                      <div class="form-group">
                                        <div class="col-md-5">
                                        <label for="" class="">Default Password</label>
                                      <input name="password" type="text"  class="form-control input-md" required value="gym">
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
                                        <th class="centr">email_id</th>
                                        <th class="centr">gym_mem_id_2</th>
                                        <th class="centr">member_name</th>
                                        <th class="centr">mobile_no</th>
                                        <th class="centr">role</th>
                                        <th class="centr">photo</th>
                                        <th class="centr">gender</th>
                                        <th class="centr">DOB</th>
                                        <th class="centr">address</th>
                                        <th class="centr">join_date</th>
                                        <th class="centr">training_type</th>
                                        <th class="centr">admission_fees</th>
                                        <th class="centr">medical_info</th>
                                         <th class="centr">login_status</th>
                                        <th class="centr"><i class="fas fa-edit" title="Edit"></i> Edit</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($member_data as $key => $value) {
                                     ?>
                                    <tr class="load_details">
                                        <td><?php echo ++$key; ?></td>
                                        
                                        <td class="centr email_td"><?php echo $value->email_id; ?></td>
                                        <td class="centr"><?php echo $value->gym_mem_id_2; ?></td>
                                        <td class="centr"><?php echo $value->member_name; ?></td>
                                        <td class="centr"><?php echo $value->mobile_no; ?></td>
                                        <td class="centr"><?php echo $value->role; ?></td>
                                        <td class="centr"><img src="<?php echo base_url()?>uploads/<?php echo $value->photo; ?>" width="90" height="90" class="rounded-circle load_details" alt="Image not found" onerror="this.src='<?php echo base_url()?>uploads/broken-1.png';"></td>
                                        <td class="centr"><?php echo $value->gender; ?></td>
                                        <td class="centr"><?php echo $value->DOB; ?></td>
                                        <td class="centr"><?php echo $value->address; ?></td>
                                        <td class="centr"><?php echo $value->join_date; ?></td>
                                        <td class="centr"><?php echo $value->training_type; ?></td>
                                        <td class="centr"><?php echo $value->admission_fees; ?></td>
                                        <td class="centr"><?php echo $value->medical_info; ?></td>
                                        
                                        <td class="centr"><?php if($value->login_status == 'YES'){ ?> <a href="<?php echo base_url()."upd_status/tbl_member_login/gym_mem_id/".$value->gym_mem_id."/login_status/NO"."/member"; ?>" class="btn btn-danger">OFF</a><?php }else{
                                            ?> <a href="<?php echo base_url()."upd_status/tbl_member_login/gym_mem_id/".$value->gym_mem_id."/login_status/YES"."/member"; ?>" class="btn btn-success">ON</a><?php } ?></td>
                                        <td class="centr"><a href="<?php echo base_url()."edit_member/".$value->gym_mem_id."/".$value->who_added_id; ?>"><i class="fas fa-edit" title="Edit"></i></a></td>
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
            <h4 class="modal-title" style="float: left;">Member Personal Information</h4>
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
                   <label>Training Type</label>
                   <input type="text" class="form-control" id="ld_training_type">
                </div>
                <div class="col-md-6">
                  <label>Login Status</label>
                  <input type="text" class="form-control" id="ld_login_status">
                </div>
               <div class="col-md-6 pt-3">
                  <label>Admission Fees</label>
                  <input type="text" class="form-control" id="ld_admission_fees">
                </div>
                <div class="col-md-6 pt-3">
                  <label>Gender</label>
                   <input type="text" class="form-control" id="ld_gender">
                </div>
                <div class="col-md-6 pt-3">
                  <label>Date of Birth</label>
                  <input type="text" class="form-control" id="ld_DOB">
                </div>
                <div class="col-md-6 pt-3">
                  <label>Join Date</label>
                  <input type="text" class="form-control" id="ld_join_date">
                </div>
            </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                  <label>Member Name</label>
                  <input type="text" class="form-control" id="ld_member_name">
                </div>
                <div class="col-md-6">
                    <label>Email Id</label>
                    <input type="text" class="form-control" id="ld_email">
                </div>
              
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                   <label>Mobile Number</label>
                   <input type="text" class="form-control" id="ld_mobile_no">
                </div>
                <div class="col-md-4">
                     <label>Registration No.</label>
                     <input type="text" class="form-control" id="ld_gym_mem_id_2">
                </div>
                <div class="col-md-4">
                  <label>Role</label>
                  <input type="text" class="form-control" id="ld_role">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                   <label>Address</label>
                   <textarea id="ld_address" class="form-control"></textarea>
                </div>
                <div class="col-md-6">
                   <label>Medical Info</label>
                   <textarea id="ld_medical_info" class="form-control"></textarea>
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

        <?php if(!empty($member_edit_data))
        { ?>
           $('.collapse').collapse({
             toggle: true
           });
        <?php } ?>
       // $('.collapse').collapse({
         //     toggle: true
         //  });
        $('.plan_select').change(function(){
            var str1 = $(this).find('option').filter(':selected').text();
            var arr = str1.split('--');
            $("#plan_amount").val(arr[1]);
           });

            $(".amount_cal").on("keyup change", function(e){
            var plan_amount = $("#plan_amount").val();
            var amount = $("#amount").val();
             var discount_amount=0;
            if(plan_amount !='' && amount !='')
            {
                 if($('input[name=discount_type]').is(":checked"))
                 {
                    var per_val = $('input[name=discount_type]:checked').val();
                    var discout_amount_or_percentage = $("#discout_amount_or_percentage").val();
                   
                    if(per_val === 'Percent')
                    {
                        if(discout_amount_or_percentage > 0)
                        {
                            discount_amount = ((plan_amount / 100) * discout_amount_or_percentage);
                        }
                    }
                    else
                    {
                        if(discout_amount_or_percentage > 0)
                        {
                            discount_amount = discout_amount_or_percentage;
                        }
                    }
                 }

                $("#due_amount").val(plan_amount - (parseInt(amount) + parseInt(discount_amount)));
            }
            else
            {
               $("#due_amount").val(''); 
            }
           });
    });
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
</script>
<script type="text/javascript">
      function check_email(){
        var email_id = $("#email_id").val();
        // alert(email_id);
        var $url="<?php echo base_url();?>mail_check";
        // alert($url);
        $.ajax({ 
          url: $url,
          type:"POST",
          data: {email_id: email_id},
          success: function ($data) { 
            // alert($dsata);
            if($data == 'YES'){
                alert("Email id already exist");
                document.getElementById("email_id").value = "";
            }else{
              // alert("here");
              
            }       
          },
          error: function(){
            // alert("error");
          }
        });
      }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.load_details').click(function(){
            
             var row_index = $(this).closest('tr').index() + 1;
            var email_id= $("#table_id tr:eq(" + row_index + ") td:eq(1)").text();
            var gym_mem_id_2= $("#table_id tr:eq(" + row_index + ") td:eq(2)").text();
            var member_name= $("#table_id tr:eq(" + row_index + ") td:eq(3)").text();
            var mobile_no= $("#table_id tr:eq(" + row_index + ") td:eq(4)").text();
            var role= $("#table_id tr:eq(" + row_index + ") td:eq(5)").text();
            var image_soruce= $("#table_id tr:eq(" + row_index + ") td:eq(6)").find('img').attr("src");
            var gender= $("#table_id tr:eq(" + row_index + ") td:eq(7)").text();

            var DOB= $("#table_id tr:eq(" + row_index + ") td:eq(8)").text();
            var address= $("#table_id tr:eq(" + row_index + ") td:eq(9)").text();
            var join_date= $("#table_id tr:eq(" + row_index + ") td:eq(10)").text();
            var training_type= $("#table_id tr:eq(" + row_index + ") td:eq(11)").text();
            var admission_fees= $("#table_id tr:eq(" + row_index + ") td:eq(12)").text();
            var medical_info= $("#table_id tr:eq(" + row_index + ") td:eq(13)").text();
            var login_status= $("#table_id tr:eq(" + row_index + ") td:eq(14)").text();

             $("#ld_email").val(email_id);
             $("#ld_gym_mem_id_2").val(gym_mem_id_2);
             $("#ld_member_name").val(member_name);
             $("#ld_mobile_no").val(mobile_no);
             $("#ld_role").val(role);
              $("#ld_image").attr('src', image_soruce);
             $("#ld_gender").val(gender);

             $("#ld_DOB").val(DOB);
             $("#ld_address").val(address);
             $("#ld_join_date").val(join_date);
             $("#ld_training_type").val(training_type);
             $("#ld_admission_fees").val(admission_fees);
             $("#ld_medical_info").val(medical_info);
             $("#ld_login_status").val(login_status);
             $('#myModal').modal('show'); 
        });       
 });
</script>