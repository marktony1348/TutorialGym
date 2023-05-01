
<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/sidebar'); ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">Member Payments</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ml-auto">
                                <li><a href="#">Dashboard Member</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        
                            
                            
                            <br>
                            <?php if(!empty($member_edit_data))
        { ?> <?php }else{  ?>
                            <div class="table-responsive">
                                <table id="table_id" class="display">
                                <thead>
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th class="centr">Registration No.</th>
                                        <th class="centr">Member Name</th>
                                        <th class="centr">Photo</th>
                                        <th class="centr">Batch and Time</th>
                                        <th class="centr">Plan and Amount</th>
                                        <th class="centr">plan Month</th>
                                        <th class="centr">Amount</th>
                                        <th class="centr">Due Amount</th>
                                        <th class="centr">Discount Type</th>
                                        <th class="centr">Discount Amount or Percentage</th>
                                        
                                        <th class="centr">Comments</th>
                                        <th class="centr">Date of Given</th>
                                        <th class="centr">Expiry Date</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($payment_data as $key => $value) {
                                     ?>
                                    <tr class="load_details">
                                        <td><?php echo ++$key; ?></td>
                                        <td class="centr"><?php echo $value->gym_mem_id_2; ?></td>
                                        <td class="centr"><?php echo get_data_value('tbl_member_login','gym_mem_id_2',$value->gym_mem_id_2,'member_name'); ?></td>


                                        <td class="centr"><img src="<?php echo base_url()?>uploads/<?php echo get_data_value('tbl_member_login','gym_mem_id_2',$value->gym_mem_id_2,'photo'); ?>" width="90" height="90" class="rounded-circle load_details" alt="Image not found" onerror="this.src='<?php echo base_url()?>uploads/broken-1.png';"></td>


                                        <td class="centr"><?php echo get_data_value('batch','batch_id',$value->batch_id,'batch_name,batch_start_time,batch_end_time'); ?></td>
                                        <td class="centr"><?php echo get_data_value('tbl_plans','plan_id',$value->plan_id,'plan_name,plan_amount'); ?></td>
                                        <td class="centr"><?php echo get_data_value('tbl_plans','plan_id',$value->plan_id,'plan_months'); ?></td>
                                        <td class="centr"><?php echo $value->amount; ?></td>
                                        <td class="centr"><?php echo $value->due_amount; ?></td>
                                        <td class="centr"><?php echo $value->discount_type; ?></td>
                                        <td class="centr"><?php echo $value->discout_amount_or_percentage; ?></td>
                                        <td class="centr"><?php echo $value->payment_comments; ?></td>
                                        <td class="centr"><?php echo $value->date_of_given; ?></td>
                                        <td class="centr"><?php echo $value->expiry_date; ?></td>
                                    </tr>
                                  <?php  } ?>
                                </tbody>
                            </table>
                            </div>
                          <?php } ?>
                          <span class="text-danger font-weight-bold spanone">*If you payment not shown please rise a ticket</span>

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
            <h4 class="modal-title" style="float: left;">Member Payment Information</h4>
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
                   <label>Member Name</label>
                   <input type="text" class="form-control" id="ld_member_name">
                </div>
                <div class="col-md-6">
                  <label>Registration No.</label>
                  <input type="text" class="form-control" id="ld_registration_no">
                </div>
               <div class="col-md-6 pt-3">
                  <label>Plan and Amount</label>
                  <input type="text" class="form-control" id="ld_plan_amt">
                </div>
                <div class="col-md-6 pt-3">
                  <label>plan Month</label>
                   <input type="text" class="form-control" id="ld_plan_month">
                </div>
                <div class="col-md-6 pt-3">
                  <label>Amount</label>
                  <input type="text" class="form-control" id="ld_amt">
                </div>
                <div class="col-md-6 pt-3">
                  <label>Due Amount</label>
                  <input type="text" class="form-control" id="ld_due_amt">
                </div>
            </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                  <label>Discount Type</label>
                  <input type="text" class="form-control" id="ld_dis_type">
                </div>
                <div class="col-md-3">
                    <label>Discount Amt. or %</label>
                    <input type="text" class="form-control" id="ld_dis_amt_per">
                </div>
                <div class="col-md-3">
                    <label>Date of Given</label>
                    <input type="text" class="form-control" id="ld_date_given">
                </div>
                <div class="col-md-3">
                    <label>Expiry Date</label>
                    <input type="text" class="form-control" id="ld_date_expiry">
                </div>
              
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <label>Batch and Time</label>
                <input type="text" class="form-control" id="ld_batch_time">
              </div>
              <div class="col-md-6">
                <label>Comments</label>
                <textarea id="ld_comt" class="form-control"></textarea>
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
.spanone{text-align:right;}
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
        //       toggle: true
        //    });
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
            var image_soruce= $("#table_id tr:eq(" + row_index + ") td:eq(3)").find('img').attr("src");
            var registration_no= $("#table_id tr:eq(" + row_index + ") td:eq(1)").text();
            var member_name= $("#table_id tr:eq(" + row_index + ") td:eq(2)").text();
            var batch_time= $("#table_id tr:eq(" + row_index + ") td:eq(4)").text();
            var plan_amt= $("#table_id tr:eq(" + row_index + ") td:eq(5)").text();
            var plan_month= $("#table_id tr:eq(" + row_index + ") td:eq(6)").text();
            var amt= $("#table_id tr:eq(" + row_index + ") td:eq(7)").text();
            var due_amt= $("#table_id tr:eq(" + row_index + ") td:eq(8)").text();
            var dis_type= $("#table_id tr:eq(" + row_index + ") td:eq(9)").text();
            var dis_amt_per= $("#table_id tr:eq(" + row_index + ") td:eq(10)").text();
            var date_given= $("#table_id tr:eq(" + row_index + ") td:eq(12)").text();
            var date_expiry= $("#table_id tr:eq(" + row_index + ") td:eq(13)").text();
            var comt= $("#table_id tr:eq(" + row_index + ") td:eq(11)").text();
            
            $("#ld_image").attr('src', image_soruce);
            $("#ld_registration_no").val(registration_no);
            $("#ld_member_name").val(member_name);
            $("#ld_batch_time").val(batch_time);
            $("#ld_plan_amt").val(plan_amt);
            $("#ld_plan_month").val(plan_month);
            $("#ld_amt").val(amt);
            $("#ld_due_amt").val(due_amt);
            $("#ld_dis_type").val(dis_type);
            $("#ld_dis_amt_per").val(dis_amt_per);
            $("#ld_date_given").val(date_given);
            $("#ld_date_expiry").val(date_expiry);
            $("#ld_comt").val(comt);
             $('#myModal').modal('show'); 
        });       
 });
</script>
<script type="text/javascript">
  
  function select_member(){
        var gym_mem_id_2 = $("#gym_mem_id_2").val();
        var $url="<?php echo base_url();?>member_detail";
        // alert($url);
        $.ajax({ 
          url: $url,
          type:"POST",
          data: {gym_mem_id_2: gym_mem_id_2},
          success: function ($data) { 
            // alert($data);
            if($data != 'NO'){
               // alert("coming");
              var str = $data;
              var strs = str.split(",");
              $("#member_name").val(strs[0]);
              $("#blah").attr("src","<?php echo base_url()?>uploads/"+strs[1]+"");
              $('#batch_id option[value='+strs[2]+']').attr('selected','selected');
              $('#batch_id_hidden').val(strs[2]);
              $('#expiry_date').val(strs[3]);
              $("#date_of_given").prop('min',strs[3]);
            }
            else
            {
              $("#blah").attr("src","<?php echo base_url()?>uploads/broken-1.png");
              $("#member_name").val("");
              $('#batch_id').val("");
              $('#batch_id_hidden').val("");
              $('#expiry_date').val("");
              $("#date_of_given").prop('min','');
            }      
          },
          error: function(){
              $("#blah").attr("src","<?php echo base_url()?>uploads/broken-1.png");
              $("#member_name").val("");
              $('#batch_id').val("");
              $('#batch_id_hidden').val("");
              $('#expiry_date').val("");
               $("#date_of_given").prop('min','');
          }
        });
      }
</script>