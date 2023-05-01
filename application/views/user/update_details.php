
<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/sidebar'); ?>


 
        
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">Dashboard</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ml-auto">
                                <li><a href="#">Dashboard Admin</a></li>
                            </ol>
                            
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid white-box">
                <p class="text-danger bg-white">
                                <?php if ($this->session->tempdata('success_mesg')) {   ?>
                                    <div class="text-success text-center"><?php echo $this->session->tempdata('success_mesg');?></div>
                                <?php } ?>
                            </p>
                <h4>Update Details</h4>
                <h4>Clinical Assessment</h4>
                    
                <div class="row">
                    <div class="col-lg-2 col-sm-6 col-xs-12">
                        <div class="white-box1">
                            <label>Name : </label>
                            <input type="text" name="" readonly class="form-control" value="<?php echo $mem_data[0]->member_name; ?>"> 
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-xs-12">
                        <div class="white-box1">
                            <label>Age : </label>
                            <input type="text" name="" readonly class="form-control" value="<?php echo $mem_data[0]->DOB; ?>"> 
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-xs-12">
                        <div class="white-box1">
                            <label>User Id : </label>
                            <input type="text" name="" readonly class="form-control" value="<?php echo $mem_data[0]->gym_mem_id_2; ?>"> 
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-xs-12">
                        <div class="white-box1">
                            <label>Joining Date : </label>
                            <input type="text" name="" readonly class="form-control" value="<?php echo $mem_data[0]->join_date; ?>"> 
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box1">
                            <label>Expire Date : </label>
                            <?php if(!empty($payment_data)){ ?>
                            <input type="text" name="" readonly class="form-control" value="<?php echo $payment_data[0]->expiry_date; ?>"> 
                        <?php }else{ echo"<label>Admin Not Updated Your Payment Details</label>"; } ?>
                        </div>
                    </div>
                </div>

                <h4>Clinical Assessment</h4>
                <form method="post" action="update_details_add">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="white-box1">
                            <label>Body Weight : </label>
                            <input type="text" name="body_weight" class="form-control" <?php if(!empty($exist_check)){ echo"value='".$exist_check[0]->body_weight."'"; } ?>> 
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="white-box1">
                            <label>Height : </label>
                            <input type="text" name="height" class="form-control"  <?php if(!empty($exist_check)){ echo"value='".$exist_check[0]->height."'"; } ?>> 
                        </div>
                    </div>
                </div>
                <h4>Muscular Endurance</h4>
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="white-box1">
                            <label>Push Ups/min : </label>
                            <input type="text" name="pushup" class="form-control"  <?php if(!empty($exist_check)){ echo"value='".$exist_check[0]->pushup."'"; } ?>> 
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="white-box1">
                            <label>Sit Up . Min : </label>
                            <input type="text" name="sit_up" class="form-control"  <?php if(!empty($exist_check)){ echo"value='".$exist_check[0]->sit_up."'"; } ?>> 
                        </div>
                    </div>
                </div>
                <h4>Muscular Strength</h4>
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="white-box1">
                            <label>Chest Press : </label>
                            <input type="text" name="chest_press" class="form-control"  <?php if(!empty($exist_check)){ echo"value='".$exist_check[0]->chest_press."'"; } ?>> 
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="white-box1">
                            <label>Sit Up . Min : </label>
                            <input type="text" name="situp1" class="form-control"  <?php if(!empty($exist_check)){ echo"value='".$exist_check[0]->situp1."'"; } ?>> 
                        </div>
                    </div>
                </div>
                <h4>Girth Measurements <span class="badge badge-danger">(Centimeter)</span></h4>
                <table class="table">
                    <tr>
                        <th>Date</th>
                        <th>Chest</th>
                        <th>Shoulder</th>
                        <th>Arm</th>
                        <th>Trunk</th>
                        <th>Waist</th>
                        <th>Hips</th>
                        <th>Thigh</th>
                        <th>Calf</th>
                    </tr>
                    <?php
                    if(!empty($exist_check[0]->date_))
                    {
                    $get_date = array();
                    $get_days = explode(",",$exist_check[0]->date_);
                    $get_chest = explode(",",$exist_check[0]->chest_);
                    $get_shoulder = explode(",",$exist_check[0]->shoulder_);
                    $get_arm = explode(",",$exist_check[0]->arm_);
                    $get_trunk = explode(",",$exist_check[0]->trunk_);
                    $get_waist = explode(",",$exist_check[0]->waist_);
                    $get_hips = explode(",",$exist_check[0]->hips_);
                    $get_thigh = explode(",",$exist_check[0]->thigh_);
                    $get_calf = explode(",",$exist_check[0]->calf_);

                      foreach ($get_days as $key => $value) {
                       ?>
                       <tr>
                        <td><input type="text" name="date_[]" class="form-control" <?php if(!empty($get_days[$key])){ echo"value='".$get_days[$key]."'"; } ?>></td>
                        <td><input type="text" name="chest_[]" class="form-control" <?php if(!empty($get_chest[$key])){ echo"value='".$get_chest[$key]."'"; } ?>></td>
                        <td><input type="text" name="shoulder_[]" class="form-control" <?php if(!empty($get_shoulder[$key])){ echo"value='".$get_shoulder[$key]."'"; } ?>></td>
                        <td><input type="text" name="arm_[]" class="form-control" <?php if(!empty($get_arm[$key])){ echo"value='".$get_arm[$key]."'"; } ?>></td>
                        <td><input type="text" name="trunk_[]" class="form-control" <?php if(!empty($get_trunk[$key])){ echo"value='".$get_trunk[$key]."'"; } ?>></td>
                        <td><input type="text" name="waist_[]" class="form-control" <?php if(!empty($get_waist[$key])){ echo"value='".$get_waist[$key]."'"; } ?>></td>
                        <td><input type="text" name="hips_[]" class="form-control" <?php if(!empty($get_hips[$key])){ echo"value='".$get_hips[$key]."'"; } ?>></td>
                        <td><input type="text" name="thigh_[]" class="form-control" <?php if(!empty($get_thigh[$key])){ echo"value='".$get_thigh[$key]."'"; } ?>></td>
                        <td><input type="text" name="calf_[]" class="form-control" <?php if(!empty($get_calf[$key])){ echo"value='".$get_calf[$key]."'"; } ?>></td>
                    </tr>
                   <?php } }
                       ?>
                </table>
                <span class="badge badge-danger add_row">Add Row</span>
                <div class="row">
                    <div class="col-lg-12 col-sm-6 col-xs-12">
                        <center>
                            <input type="submit" name="" class="btn btn-primary">
                        </center>
                    </div>
                </div>
                </form>
            </div>
            <?php $this->load->view('include/footer'); ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
</body>

</html>
<style type="text/css">
    .white-box1 {
    background: #fff;
     padding: 0px!important; 
    margin-bottom: 18px!important;
}
</style>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.add_row').click(function()
        {
            $('.table').append("<tr><td><input type='date' name='date_[]' class='form-control'></td><td><input type='text' name='chest_[]' class='form-control'></td><td><input type='text' name='shoulder_[]' class='form-control'></td><td><input type='text' name='arm_[]' class='form-control'></td><td><input type='text' name='trunk_[]' class='form-control'></td><td><input type='text' name='waist_[]' class='form-control'></td><td><input type='text' name='hips_[]' class='form-control'></td><td><input type='text' name='thigh_[]' class='form-control'></td><td><input type='text' name='calf_[]' class='form-control'></td></tr>");
        });
    });
</script>
