<!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        
                        <?php
                        $role = $this->session->userdata('role');
                        if($role == 'admin')
                        { ?>

                            <li class="sidebar-item pt-2">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>admin_home"
                                    aria-expanded="false">
                                    <i class="far fa-clock" aria-hidden="true"></i>
                                    <span class="hide-menu">Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>plans"
                                aria-expanded="false">
                                    <i class="far fa-chart-bar"></i>
                                    <span class="hide-menu">Plans</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>batch"
                                aria-expanded="false">
                                    <i class="fas fa-users"></i>
                                    <span class="hide-menu">Batch</span>
                                </a>
                            </li>
                             <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>member"
                                aria-expanded="false">
                                    <i class="fas fa-user-plus"></i>
                                    <span class="hide-menu">Add Member</span>
                                </a>
                            </li>
                             <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>raise_mail"
                                aria-expanded="false">
                                    <i class="fas fa-user-plus"></i>
                                    <span class="hide-menu">Raise Mail Payment</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>raise_mail_sep"
                                aria-expanded="false">
                                    <i class="fas fa-user-plus"></i>
                                    <span class="hide-menu">Raise Mail Own</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>workouts"
                                aria-expanded="false">
                                    <i class="fas fa-user-plus"></i>
                                    <span class="hide-menu">Workouts</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>diet_plan"
                                aria-expanded="false">
                                    <i class="fas fa-user-plus"></i>
                                    <span class="hide-menu">Diet Plan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>View_chat"
                                    aria-expanded="false">
                                    <i class="far fa-user-circle" aria-hidden="true"></i>
                                    <span class="hide-menu">Chat</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>payment"
                                aria-expanded="false">
                                    <i class="fas fa-user-plus"></i>
                                    <span class="hide-menu">Update Payments</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>issue_coments"
                                    aria-expanded="false">
                                    <i class="far fa-comment" aria-hidden="true"></i>
                                    <span class="hide-menu">Query Comments</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>queries"
                                    aria-expanded="false">
                                    <i class="fas fa-question-circle" aria-hidden="true"></i>
                                    <span class="hide-menu">Pending Queries</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>queries_replyed"
                                    aria-expanded="false">
                                    <i class="fas fa-check-circle" aria-hidden="true"></i>
                                    <span class="hide-menu">Replyed Queries</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>trainer"
                                    aria-expanded="false">
                                    <i class="fas fa-user-plus" aria-hidden="true"></i>
                                    <span class="hide-menu">Add Trainer</span>
                                </a>
                            </li>
                             <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>assign_trainer"
                                    aria-expanded="false">
                                    <i class="fas fa-bullhorn" aria-hidden="true"></i>
                                    <span class="hide-menu">Assign Trainer</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>equipment"
                                    aria-expanded="false">
                                    <i class="far fa-hand-peace" aria-hidden="true"></i>
                                    <span class="hide-menu">Equipment</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>unreg_query"
                                    aria-expanded="false">
                                    <i class="far fa-question-circle" aria-hidden="true"></i>
                                    <span class="hide-menu">Un-Reg. Query Pending</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>unreg_query_com"
                                    aria-expanded="false">
                                    <i class="fas fa-check-circle" aria-hidden="true"></i>
                                    <span class="hide-menu">Un-Reg. Query complete</span>
                                </a>
                            </li>
                             <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>profile"
                                    aria-expanded="false">
                                    <i class="far fa-user-circle" aria-hidden="true"></i>
                                    <span class="hide-menu">Profile</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                        <?php
                        $role = $this->session->userdata('role');
                        if($role == 'member')
                        { ?>
                              <li class="sidebar-item pt-2">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>mem_home"
                                    aria-expanded="false">
                                    <i class="far fa-clock" aria-hidden="true"></i>
                                    <span class="hide-menu">Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>member_payment"
                                    aria-expanded="false">
                                    <i class="fab fa-apple-pay" aria-hidden="true"></i>
                                    <span class="hide-menu">Payments</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>member_ticket"
                                    aria-expanded="false">
                                    <i class="far fa-question-circle" aria-hidden="true"></i>
                                    <span class="hide-menu">Rise Ticket</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>member_home"
                                    aria-expanded="false">
                                    <i class="far fa-user-circle" aria-hidden="true"></i>
                                    <span class="hide-menu">Profile</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>raise_mail_sep"
                                    aria-expanded="false">
                                    <i class="far fa-user-circle" aria-hidden="true"></i>
                                    <span class="hide-menu">Raise Mail</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>workout_view"
                                    aria-expanded="false">
                                    <i class="far fa-user-circle" aria-hidden="true"></i>
                                    <span class="hide-menu">Workout View</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>health_check"
                                    aria-expanded="false">
                                    <i class="far fa-user-circle" aria-hidden="true"></i>
                                    <span class="hide-menu">Health Check</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>update_details"
                                    aria-expanded="false">
                                    <i class="far fa-user-circle" aria-hidden="true"></i>
                                    <span class="hide-menu">Update Details</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>chat"
                                    aria-expanded="false">
                                    <i class="far fa-user-circle" aria-hidden="true"></i>
                                    <span class="hide-menu">Chat</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->