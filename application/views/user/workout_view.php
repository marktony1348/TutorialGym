
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
                    <?php
                      foreach ($workout_details as $key => $value) { ?>
                            
                     
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title"><?php echo $value->workout_name; ?></h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash">
                                         <canvas width="67" height="30" 
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                            
                                    </div>
                                </li>
                                <li class="ml-auto"><span class="counter text-success"></span></li>
                            </ul>
                            <center><a class='btn btn-info' href="<?php echo base_url()."view_workouts_sep/".$value->workout_id; ?>">View</a></center>
                        </div>
                    </div>
                    <?php    }  
                    ?>
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
