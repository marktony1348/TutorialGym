
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
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->

                <div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Members</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash">
                                         <canvas width="67" height="30" 
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                            
                                    </div>
                                </li>
                                <li class="ml-auto"><span class="counter text-success"><?php echo get_value_1("tbl_member_login","role","member","fb"); ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Trainers</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ml-auto"><span class="counter text-purple"><?php echo get_value_1("tbl_trainer","visible","YES","visible"); ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Equipments</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ml-auto"><span class="counter text-info"><?php echo get_value_1("tbl_equipment","visibile","YES","visibile"); ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Amount</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash">
                                         <canvas width="67" height="30" 
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas> 
                                    </div>
                                </li>
                                <li class="ml-auto"><span class="counter text-success">Rs. <?php echo get_value_12("tbl_member_payment","amount"); ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <?php
                        $get_month = date('m') - 1;
                        $get_year = date('Y');
                        $CI = get_instance();
                        $query = "SELECT SUM(amount) as one FROM tbl_member_payment WHERE MONTH(create_date) = $get_month AND YEAR(create_date) = $get_year";
                        $course_ids = $CI->db->query($query); 
                        $data = $course_ids->result();
                        //
                        $get_year1 = date('Y')-1;
                        $query1 = "SELECT SUM(amount) as one_two FROM tbl_member_payment WHERE YEAR(create_date) = 2020";
                        $course_ids1 = $CI->db->query($query1); 
                        $data1 = $course_ids1->result();

                    ?>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Last Month Earn</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ml-auto"><span class="counter text-purple">Rs. <?php echo $data[0]->one; ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Last Year Earned</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ml-auto"><span class="counter text-info"><?php echo $data1[0]->one_two; ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                
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
