
<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/sidebar'); ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">Query Comments</h4>
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
        { ?> Edit Comments <?php }else{ echo"All Comments"; } ?> </h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ml-auto">
                                  <?php if(!empty($plan_edit_data))
        { ?> <?php }else{ ?><button class="btn btn-primary float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> <i class="fas fa-plus-square"></i>  
                                Add Comments 
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
                                    <form class="form-horizontal form-con"  method="post" action="<?php echo  base_url()?>update_issue_coments1/<?php echo $plan_edit_data[0]->ticket_issues_id; ?>">
                                        <?php }else{ ?>
                                        <form class="form-horizontal form-con"  method="post" action="<?php echo  base_url()?>add_issue_coments">
                                            <?php } ?>
                                    <fieldset>
                                    <input type="hidden" name="ticket_issues_id" <?php if(!empty($plan_edit_data))
                                    { ?> value="<?php echo $this->uri->segment(2); ?>" <?php } ?>>
                                    <div class="form-group">
                                      <div class="col-md-5">
                                      <select class="form-control" name="visible" required>
                                          <option value="">select Visible</option>
                                          <option value="YES" <?php if(!empty($plan_edit_data) && !empty($plan_edit_data[0]->visible) && $plan_edit_data[0]->visible=='YES')
                                    { ?> selected <?php } ?>>YES</option>
                                    <option value="NO" <?php if(!empty($plan_edit_data) && !empty($plan_edit_data[0]->visible) && $plan_edit_data[0]->visible=='NO')
                                    { ?> selected <?php } ?>>NO</option>
                                          
                                      </select>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-md-5">
                                      <input type="text" name="issues_name" class="form-control" placeholder="Enter Issue name here" <?php if(!empty($plan_edit_data) && !empty($plan_edit_data[0]->issues_name)){ ?> value="<?php echo $plan_edit_data[0]->issues_name; ?>" <?php } ?>>
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
                                        <th class="centr">issues_name</th>
                                        <th class="centr">Status</th>
                                        <th class="centr"><i class="fas fa-edit" title="Edit"></i> Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($plans_data as $key => $value) {
                                     ?>
                                    <tr>
                                        <td><?php echo ++$key; ?></td>
                                        <td><?php echo $value->issues_name; ?></td>
                                        
                                        <td class="centr"><?php if($value->visible == 'YES'){ ?> <a href="<?php echo base_url()."upd_status/tbl_ticket_issues/ticket_issues_id/".$value->ticket_issues_id."/visible/NO"."/issue_coments"; ?>" class="btn btn-danger">OFF</a><?php }else{
                                            ?> <a href="<?php echo base_url()."upd_status/tbl_ticket_issues/ticket_issues_id/".$value->ticket_issues_id."/visible/YES"."/issue_coments"; ?>" class="btn btn-success">ON</a><?php } ?></td>
                                        <td class="centr"><a href="<?php echo base_url()."update_issue_coments/".$value->ticket_issues_id ; ?>"><i class="fas fa-edit" title="Edit"></i></a></td>
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