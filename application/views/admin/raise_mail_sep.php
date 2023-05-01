
<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/sidebar'); ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">Payments</h4>
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
        { ?> Edit Payment <?php }else{ echo"Raise Mail"; } ?> </h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ml-auto">
                                  <?php if($this->session->userdata('role') == 'member'){ ?>
                                    <a href="<?php echo base_url()."send_sep_mem"; ?>" class="badge badge-danger" style="float:right;">Send Own Mail</a>
                                <?php }else{ ?>
                                    <a href="<?php echo base_url()."send_sep"; ?>" class="badge badge-danger" style="float:right;">Send Own Mail</a>
                                <?php } ?>
                                </div>
                            </div>
                            <p>
                                <?php if ($this->session->tempdata('success_mesg')) {   ?>
                                    <div class="text-success text-center"><?php echo $this->session->tempdata('success_mesg');?></div>
                                <?php } ?>
                            </p>
                            
                            <br>
                            <?php if(!empty($member_edit_data))
        { ?> <?php }else{  ?>
                            <div class="table-responsive">
                                <table id="table_id" class="display">
                                <thead>
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th class="centr">Username</th>
                                        <th class="centr">Email id</th>
                                        <th class="centr">header</th>
                                        <th class="centr">Body Content</th>
                                        <th class="centr">date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($mail_data as $key => $value) {
                                     ?>
                                    <tr class="">
                                        <td><?php echo ++$key; ?></td>
                                        <td class="centr"><?php echo get_data_value('tbl_member_login','gym_mem_id',$value->mail_id,'member_name'); ?></td>
                                        <td class="centr"><?php echo get_data_value('tbl_member_login','gym_mem_id',$value->mail_id,'email_id'); ?></td>
                                        <td class="centr"><?php echo $value->header; ?></td>
                                        <td class="centr"><?php echo $value->body_content; ?></td>
                                        <td class="centr"><?php echo $value->create_date; ?></td>
                                    </tr>
                                  <?php  } ?>
                                </tbody>
                            </table>
                            </div>
                          <?php } ?>
                        </div>
                        <p class="text-danger"></p>
                    </div>
                </div>
            </div>
            <?php $this->load->view('include/footer'); ?>
        </div>
    </div>
    <!-- Modal -->
  
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