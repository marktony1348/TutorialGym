
<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/sidebar'); ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">Plans</h4>
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
                                <h3 class="box-title mb-0"><?php if(!empty($plan_edit_data))
        { ?> Edit Plan <?php }else{ echo"All Plans"; } ?> </h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ml-auto">
                                  <?php if(!empty($plan_edit_data))
        { ?> <?php }else{ ?><button class="btn btn-primary float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> <i class="fas fa-plus-square"></i>  
                                Add Plan 
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
                                <?php if(!empty($plan_edit_data))
                                    { ?>
                                    <form class="form-horizontal form-con"  method="post" action="<?php echo  base_url()?>update_paln/<?php echo $plan_edit_data[0]->plan_id; ?>">
                                        <?php }else{ ?>
                                        <form class="form-horizontal form-con"  method="post" action="<?php echo  base_url()?>add_plans">
                                            <?php } ?>
                                    <fieldset>
                                    <div class="form-group"> 
                                      <div class="col-md-5">
                                        <input type="hidden" name="plan_id" <?php if(!empty($plan_edit_data))
                                    { ?> value="<?php echo $this->uri->segment(2); ?>" <?php } ?>>
                                      <input id="plan_name" name="plan_name" type="text" placeholder="Enter Plan Name" class="form-control input-md" required <?php if(!empty($plan_edit_data) && !empty($plan_edit_data[0]->plan_name))
                                    { ?> value="<?php echo $plan_edit_data[0]->plan_name; ?>" <?php } ?>>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="col-md-5">
                                      <input id="Amount" name="plan_amount" type="number" placeholder="Amount" class="form-control input-md " <?php if(!empty($plan_edit_data) && !empty($plan_edit_data[0]->plan_amount))
                                    { ?> value="<?php echo $plan_edit_data[0]->plan_amount; ?>" <?php } ?> required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-md-5">
                                      <select class="form-control" name="plan_months" required>
                                          <option value="">...select...</option>
                                          <option value="1" <?php if(!empty($plan_edit_data) && !empty($plan_edit_data[0]->plan_months) && $plan_edit_data[0]->plan_months=='1')
                                    { ?> selected <?php } ?>>1 month</option>
                                          <option value="2" <?php if(!empty($plan_edit_data) && !empty($plan_edit_data[0]->plan_months) && $plan_edit_data[0]->plan_months=='2')
                                    { ?> selected <?php } ?>>2 months</option>
                                          <option value="3" <?php if(!empty($plan_edit_data) && !empty($plan_edit_data[0]->plan_months) && $plan_edit_data[0]->plan_months=='3')
                                    { ?> selected <?php } ?>>3 months</option>
                                          <option value="4" <?php if(!empty($plan_edit_data) && !empty($plan_edit_data[0]->plan_months) && $plan_edit_data[0]->plan_months=='4')
                                    { ?> selected <?php } ?>>4 months</option>
                                          <option value="5" <?php if(!empty($plan_edit_data) && !empty($plan_edit_data[0]->plan_months) && $plan_edit_data[0]->plan_months=='5')
                                    { ?> selected <?php } ?>>5 months</option>
                                          <option value="6" <?php if(!empty($plan_edit_data) && !empty($plan_edit_data[0]->plan_months) && $plan_edit_data[0]->plan_months=='6')
                                    { ?> selected <?php } ?>>6 months</option>
                                          <option value="7" <?php if(!empty($plan_edit_data) && !empty($plan_edit_data[0]->plan_months) && $plan_edit_data[0]->plan_months=='7')
                                    { ?> selected <?php } ?>>7 months</option>
                                          <option value="8" <?php if(!empty($plan_edit_data) && !empty($plan_edit_data[0]->plan_months) && $plan_edit_data[0]->plan_months=='8')
                                    { ?> selected <?php } ?>>8 months</option>
                                          <option value="9" <?php if(!empty($plan_edit_data) && !empty($plan_edit_data[0]->plan_months) && $plan_edit_data[0]->plan_months=='9')
                                    { ?> selected <?php } ?>>9 months</option>
                                          <option value="10" <?php if(!empty($plan_edit_data) && !empty($plan_edit_data[0]->plan_months) && $plan_edit_data[0]->plan_months=='10')
                                    { ?> selected <?php } ?>>10 months</option>
                                          <option value="11" <?php if(!empty($plan_edit_data) && !empty($plan_edit_data[0]->plan_months) && $plan_edit_data[0]->plan_months=='11')
                                    { ?> selected <?php } ?>>11 months</option>
                                          <option value="12" <?php if(!empty($plan_edit_data) && !empty($plan_edit_data[0]->plan_months) && $plan_edit_data[0]->plan_months=='12')
                                    { ?> selected <?php } ?>>12 months</option>
                                          <option value="18" <?php if(!empty($plan_edit_data) && !empty($plan_edit_data[0]->plan_months) && $plan_edit_data[0]->plan_months=='18')
                                    { ?> selected <?php } ?>>18 months</option>
                                          <option value="24" <?php if(!empty($plan_edit_data) && !empty($plan_edit_data[0]->plan_months) && $plan_edit_data[0]->plan_months=='24')
                                    { ?> selected <?php } ?>>2 years</option>
                                      </select>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-md-4">
                                        <button id="submit" name="submit" class="btn btn-primary"><i class="fas fa-check"></i> <?php if(!empty($plan_edit_data))
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
                                        <th >Plan Name</th>
                                        <th class="centr">Amount</th>
                                        <th class="centr">Months</th>
                                        <th class="centr">Status</th>
                                        <th class="centr"><i class="fas fa-edit" title="Edit"></i> Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($plans_data as $key => $value) {
                                     ?>
                                    <tr>
                                        <td><?php echo ++$key; ?></td>
                                        <td><?php echo $value->plan_name; ?></td>
                                        <td class="centr"><?php echo $value->plan_amount; ?></td>
                                        <td class="centr"><?php echo $value->plan_months; ?></td>
                                        <td class="centr"><?php if($value->plan_status == 'YES'){ ?> <a href="<?php echo base_url()."upd_status/tbl_plans/plan_id/".$value->plan_id."/plan_status/NO"."/plans"; ?>" class="btn btn-danger">OFF</a><?php }else{
                                            ?> <a href="<?php echo base_url()."upd_status/tbl_plans/plan_id/".$value->plan_id."/plan_status/YES"."/plans"; ?>" class="btn btn-success">ON</a><?php } ?></td>
                                        <td class="centr"><a href="<?php echo base_url()."edit_plan/".$value->plan_id; ?>"><i class="fas fa-edit" title="Edit"></i></a></td>
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
</body>
</html>
<style type="text/css">
    .form-con{    width: 110%;
    margin-left: 21%;}
    .input-md{padding-left: 10px !important;}
    .box_shawow{box-shadow: 0 16px 24px 2px rgba(0,0,0,.14), 0 6px 30px 5px rgba(0,0,0,.12), 0 8px 10px -5px rgba(0,0,0,.2);}
    .centr{text-align: center;}
</style>
<script type="text/javascript">
    $(document).ready(function() {
        <?php if(!empty($plan_edit_data))
        { ?>
           $('.collapse').collapse({
             toggle: true
           });
        <?php } ?>
    });
</script>