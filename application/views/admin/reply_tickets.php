
<?php $this->load->view('include/header'); ?>
<?php $this->load->view('include/sidebar'); ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">Rise Tickets</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ml-auto">
                                <li><a href="#">Dashboard Member</a></li>
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
                                <h3 class="box-title mb-0">Reply Tickets</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ml-auto">
                                 
        <a class="btn btn-danger float-right" href="<?php echo base_url(); ?>queries"> <i class="fas fa-plus-square"></i> Back</a> 

                                </div>
                            </div>
                            <p>
                                <?php if ($this->session->tempdata('success_mesg')) {   ?>
                                    <div class="text-success text-center"><?php echo $this->session->tempdata('success_mesg');?></div>
                                <?php } ?>
                            </p>
                            <div class="collapse border box_shawow" id="collapseExample">
                              <div class="card card-body">
                                <form class="form-horizontal form-con"  method="post" action="<?php echo  base_url()?>reply_ticket_up" enctype="multipart/form-data">
                                    <fieldset>
                                      <div class="form-group">
                                      <div class="col-md-5">
                                        
                                        <input type="text" name="ticket_issue" class="form-control" placeholder="Query issues" value="<?php echo get_value('tbl_ticket_issues','ticket_issues_id',$ticket_data[0]->ticket_issue,'issues_name'); ?>" readonly>
                                       
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-5">
                                        <textarea class="form-control  input-md" name="ticket_comment" required placeholder="E.g : my payment not reflacted in my account" readonly><?php echo $ticket_data[0]->ticket_comment; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-5">
                                        <input type="text" name="date_given" value="<?php echo $ticket_data[0]->date_given; ?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-5">
                                        <textarea class="form-control  input-md" name="reply_comment" required placeholder="E.g : your payment done. i will take action"></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="ticket_id" value="<?php echo $ticket_data[0]->ticket_id; ?>">
                                    <div class="form-group">
                                      <div class="col-md-4">
                                        <button id="submit" name="submit" class="btn btn-primary"><i class="fas fa-check"></i> Reply</button>
                                      </div>
                                    </div>
                                    </fieldset>
                                    </form>
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
    .hide {
  display: none;
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

.btn1-large {
  padding: 11px 19px;
  font-size: 17.5px;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
}
.modal-content{width: 150%;}
#ld_image{width: 350px !important;height: 225px !important;}
</style>

<script type="text/javascript">
    $(document).ready(function() {
                   $('.collapse').collapse({
             toggle: true
           });
            });
</script>