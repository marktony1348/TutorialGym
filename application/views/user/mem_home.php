
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
                    <?php
                        $CI = get_instance();
                        $query = "SELECT SUM(amount) as one FROM `tbl_member_payment` where gym_mem_id_2='GYM3'";
                        $course_ids = $CI->db->query($query); 
                        $data = $course_ids->result();
                    ?>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Payments</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash">
                                         <canvas width="67" height="30" 
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                            
                                    </div>
                                </li>
                                <li class="ml-auto"><span class="counter text-success"><?php echo $data[0]->one; ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Tickets</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ml-auto"><span class="counter text-purple"><?php echo get_value_1("tbl_queries","ticket_rise_gm_id",$this->session->userdata('gym_mem_id'),"ticket_rise_gm_id"); ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Health Check Up Details</h3>
                        <p>Last Update Health check : <?php 
                        if(get_health_checkup() =='0')
                        {
                            echo"Last update Missing please check and update details  - <a href='".base_url()."add_health_checkup'>Click Here</a>";
                        }
                        else
                        {
                            $get_date = get_health_checkup();
                           echo $get_date; 
                           $now = time(); // or your date as well
                            $your_date = strtotime($get_date);
                            $datediff = $now - $your_date;
                            $date_by = round($datediff / (60 * 60 * 24));
                            if($date_by >= 15)
                            {
                                echo"<br><br>Please update your Health Now - <a href='".base_url()."add_health_checkup'>Click Here</a>";
                            }
                            else
                            {
                                echo"<br><br>";
                                echo 15 - $date_by." Days remaining to update your health checkup";
                            }
                        }
                         ?></p>
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
