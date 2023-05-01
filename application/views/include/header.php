<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="GYM MANAGEMENT SYSTEM">
    <meta name="description"
        content="GYM MANAGEMENT SYSTEM">
    <title>GYM MANAGEMENT SYSTEM</title>
    <!-- <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" /> -->
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/admin/plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/admin/plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/admin/css/style.min.css" rel="stylesheet">
    
</head>
<body>
    
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand" href="dashboard.html">
                        <b class="logo-icon">
                            <img src="<?php echo base_url()?>assets/admin/plugins/images/logo-icon.png" alt="homepage" />
                        </b>
                        <span class="logo-text">
                            <img src="<?php echo base_url()?>assets/admin/plugins/images/logo-text.png" alt="homepage" />
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white"
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ml-auto d-flex align-items-center">

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class=" in">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link pr-4" href="<?php echo base_url();?>logout" aria-expanded="false">
                                <!-- <i class="fa fa-user" aria-hidden="true"></i> -->
                                <span class="hide-menu btn btn-danger">Logout</span>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <?php $get_gym_id_header = $this->session->userdata('gym_mem_id'); 
                        $role = $this->session->userdata('role'); 
                        if($role == 'admin')
                        {
                            $tbl_name = 'admin_profile'; 
                            $select_name = 'name';  
                        }
                        else if($role == 'member')
                        {
                            $tbl_name = 'tbl_member_login';  
                            $select_name = 'member_name';  
                        }
                        ?>
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="<?php echo base_url()?>uploads/<?php echo get_value($tbl_name,"gym_mem_id",$get_gym_id_header,"photo") ?>" alt="user-img" width="36"
                                    class="img-circle"><span class="text-white font-medium"><?php echo get_value($tbl_name,"gym_mem_id",$get_gym_id_header,$select_name); ?></span></a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
