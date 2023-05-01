
<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/sidebar'); ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">Member Profile</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ml-auto">
                                <li><a href="#">Dashboard MEMBER</a></li>
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
                                <h3 class="box-title mb-0">MEMBER PROFILE</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ml-auto">
                                 

                                </div>
                            </div>
                            <p>
                                <?php if ($this->session->tempdata('success_mesg')) {   ?>
                                    <div class="text-success text-center"><?php echo $this->session->tempdata('success_mesg');?></div>
                                <?php } ?>
                            </p>
                            <div class="collapse border box_shawow" id="collapseExample">
                              <div class="card card-body">
                                <form class="form-horizontal form-con"  method="post" action="<?php echo  base_url()?>update_profile_m" enctype="multipart/form-data">
                                        
                                    <fieldset>
                                        <div class="form-group"> 
                                        <div class="col-md-5">
                                          <div class="row">
                                            <div class="form-group col-xs-6 col-md-4">
                                                  <input type="file" name="photo" id="photo" class="hide" <?php if(!empty($admin_profile) && $admin_profile[0]->photo){  }else{ ?> required <?php }?> />
  <label for="photo" class="btn1 btn1-large">Select file</label>
                                            </div>


                                            <div class="form-group col-xs-6 col-md-6">
                                               <img <?php if(!empty($admin_profile) && $admin_profile[0]->photo){ ?>
                                               src="<?php echo  base_url()."uploads/".$admin_profile[0]->photo; ?>" alt="Image not found" onerror="this.src='<?php echo base_url()?>uploads/broken-1.png';" <?php }else{ ?> src="<?php echo  base_url()?>uploads/1.jpg" <?php } ?>class="rounded-circle" width="150" name="imageUpload" height="150" id="blah">
                                            </div>
                                          </div>
                                      </div>
                                  </div>
                                      <div class="form-group">
                                        <div class="col-md-5">
                                        <input name="member_name" type="text" placeholder="NAME" class="form-control" required <?php if(!empty($admin_profile) && !empty($admin_profile[0]->member_name))
                                    { ?> value="<?php echo $admin_profile[0]->member_name; ?>" <?php } ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-5">
                                        <textarea class="form-control" name="address" placeholder="Member Address" required><?php if(!empty($admin_profile) && !empty($admin_profile[0]->address))
                                    { echo $admin_profile[0]->address; } ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-5">
                                         <input name="gender" type="text" placeholder="sex" class="form-control" readonly <?php if(!empty($admin_profile) && !empty($admin_profile[0]->gender))
                                    { ?> value="<?php echo $admin_profile[0]->gender; ?>" <?php } ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-5">
                                         <input name="DOB" type="date" placeholder="DOB Number" class="form-control" required <?php if(!empty($admin_profile) && !empty($admin_profile[0]->DOB))
                                    { ?> value="<?php echo $admin_profile[0]->DOB; ?>" <?php } ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-5">
                                         <input name="fb" type="text" placeholder="Facebook link" class="form-control" required <?php if(!empty($admin_profile) && !empty($admin_profile[0]->fb))
                                    { ?> value="<?php echo $admin_profile[0]->fb; ?>" <?php } ?>>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-md-5">
                                         <input name="ins" type="text" placeholder="instragram link" class="form-control" required <?php if(!empty($admin_profile) && !empty($admin_profile[0]->ins))
                                    { ?> value="<?php echo $admin_profile[0]->ins; ?>" <?php } ?>>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-md-5">
                                         <input name="mobile_no" type="text" placeholder="Mobile Number" class="form-control" readonly <?php if(!empty($admin_profile) && !empty($admin_profile[0]->mobile_no))
                                    { ?> value="<?php echo $admin_profile[0]->mobile_no; ?>" <?php } ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-md-5">
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="mobile_no_visible" id="inlineRadio1" value="YES" <?php if(!empty($admin_profile) && !empty($admin_profile[0]->mobile_no_visible) && $admin_profile[0]->mobile_no_visible == 'YES')
                                    { ?> checked <?php } ?>>
                                          <label class="form-check-label" for="inlineRadio1">Mobile Number visible (YES)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="mobile_no_visible" id="inlineRadio2" value="NO" <?php if(!empty($admin_profile) && !empty($admin_profile[0]->mobile_no_visible) && $admin_profile[0]->mobile_no_visible == 'NO')
                                    { ?> checked <?php } ?>>
                                          <label class="form-check-label" for="inlineRadio2">Mobile Number visible (NO)</label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-5">
                                         <textarea name="about_gym" class="form-control" required placeholder="About GYM"><?php if(!empty($admin_profile) && !empty($admin_profile[0]->about_gym))
                                    { echo $admin_profile[0]->about_gym; } ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-md-4">
                                        <button id="submit" name="submit" class="btn btn-primary"><i class="fas fa-check"></i> <?php if(!empty($admin_profile))
        { ?> UPDATE <?php }else{ echo"ADD"; } ?></button>
                                      </div>
                                    </div>
                                    </fieldset>
                                    </form>
                                    <span class="text-danger font-weight-bold spanone">*If want change mobile number and gender please rise ticket to Admin</span>
                              </div>
                            </div>
                            <br>
                            
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
.spanone{text-align:right;}
</style>
<script type="text/javascript">
    $(document).ready(function() {
       
           $('.collapse').collapse({
             toggle: true
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