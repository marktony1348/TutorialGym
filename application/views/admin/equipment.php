
<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/sidebar'); ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">EQUIPMENT</h4>
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
                                <h3 class="box-title mb-0"><?php if(!empty($equipment_edit_data))
        { ?> Edit EQUIPMENT <?php }else{ echo"All EQUIPMENTS"; } ?> </h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ml-auto">
                                  <?php if(!empty($equipment_edit_data))
        { ?> <?php }else{ ?><button class="btn btn-primary float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> <i class="fas fa-plus-square"></i>  
                                Add EQUIPMENT 
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
                                <?php if(!empty($equipment_edit_data))
                                    { ?>
                                    <form class="form-horizontal form-con"  method="post" action="<?php echo  base_url()?>update_equipment/<?php echo $equipment_edit_data[0]->equipment_id; ?>"  enctype="multipart/form-data">
                                        <?php }else{ ?>
                                        <form class="form-horizontal form-con"  method="post" action="<?php echo  base_url()?>add_equipment"  enctype="multipart/form-data">
                                            <?php } ?>
                                    <fieldset>
                                    <div class="form-group"> 
                                      <div class="col-md-5">
                                        <input type="hidden" name="equipment_id" <?php if(!empty($equipment_edit_data))
                                    { ?> value="<?php echo $this->uri->segment(2); ?>" <?php } ?>>
                                      <input id="name" name="name" type="text" placeholder="Enter Equipment Name" class="form-control input-md" required <?php if(!empty($equipment_edit_data) && !empty($equipment_edit_data[0]->name))
                                    { ?> value="<?php echo $equipment_edit_data[0]->name; ?>" <?php } ?>>
                                      </div>
                                    </div>
                                    <div class="col-md-5">
                                          <div class="row">
                                            <div class="form-group col-xs-6 col-md-4">
                                                  <input type="file" name="photo" id="photo" class="hide" <?php if(!empty($equipment_edit_data) && $equipment_edit_data[0]->photo){  }else{ ?> required <?php }?> />
                  <label for="photo" class="btn1 btn1-large">EQUIPMENT</label>
                                            </div>


                                            <div class="form-group col-xs-6 col-md-6">
                                               <img <?php if(!empty($equipment_edit_data) && $equipment_edit_data[0]->photo){ ?>
                                               src="<?php echo  base_url()."uploads/".$equipment_edit_data[0]->photo; ?>" alt="Image not found" onerror="this.src='<?php echo base_url()?>uploads/broken-1.png';" <?php }else{ ?> src="<?php echo  base_url()?>uploads/1.jpg" <?php } ?>class="rounded-circle" width="150" name="imageUpload" height="150" id="blah">
                                            </div>
                                          </div>
                                      </div>
                                    
                                    
                                    <div class="form-group">
                                      <div class="col-md-4">
                                        <button id="submit" name="submit" class="btn btn-primary"><i class="fas fa-check"></i> <?php if(!empty($equipment_edit_data))
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
                                        <th >Name</th>
                                        <th class="centr">Photo</th>
                                        <th class="centr">Status</th>
                                        <th class="centr"><i class="fas fa-edit" title="Edit"></i> Edit</th>
                                        <th class="centr"><i class="fas fa-trash" title="Edit"></i> Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($equipment_data as $key => $value) {
                                     ?>
                                    <tr>
                                        <td><?php echo ++$key; ?></td>
                                        <td><?php echo $value->name; ?></td>
                                        <td class="centr"><img src="<?php echo base_url()?>uploads/<?php echo $value->photo; ?>" width="90" height="90" class="rounded-circle load_details" alt="Image not found" onerror="this.src='<?php echo base_url()?>uploads/broken-1.png';"></td>
                                        <td class="centr"><?php if($value->visibile == 'YES'){ ?> <a href="<?php echo base_url()."upd_status/tbl_equipment/equipment_id/".$value->equipment_id."/visibile/NO"."/equipment"; ?>" class="btn btn-danger">OFF</a><?php }else{
                                            ?> <a href="<?php echo base_url()."upd_status/tbl_equipment/equipment_id/".$value->equipment_id."/visibile/YES"."/equipment"; ?>" class="btn btn-success">ON</a><?php } ?></td>
                                        <td class="centr"><a href="<?php echo base_url()."edit_equipment/".$value->equipment_id; ?>"><i class="fas fa-edit" title="Edit"></i></a></td>
                                        <td class="centr"><a href="<?php echo base_url()."Admin_controller/delete_eq/".$value->equipment_id; ?>"><i class="fas fa-trash" title="Delete"></i></a></td>
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
    .btn1-large {
  padding: 11px 19px;
  font-size: 17.5px;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
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

</style>
<script type="text/javascript">
    $(document).ready(function() {
        <?php if(!empty($equipment_edit_data))
        { ?>
           $('.collapse').collapse({
             toggle: true
           });
        <?php } ?>
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
    });
</script>