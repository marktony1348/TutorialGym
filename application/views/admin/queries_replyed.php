
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
                                <h3 class="box-title mb-0">Tickets</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ml-auto">
              
                                </div>
                            </div>
                            <p>
                                <?php if ($this->session->tempdata('success_mesg')) {   ?>
                                    <div class="text-success text-center"><?php echo $this->session->tempdata('success_mesg');?></div>
                                <?php } ?>
                            </p>
                            
                            <br>
                            <div class="table-responsive">
                                <table id="table_id" class="display">
                                <thead>
                                    <tr>
                                        <th>Sl. No</th>
                                        <th>Tickets ID</th>
                                        <th class="centr">date of issues</th>
                                        <th class="centr">issues</th>
                                        <th class="centr">comments</th>
                                        <th class="centr">status</th>
                                        <th class="centr">replyed</th>
                                        <th class="centr">Date of replyed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ticket_data as $key => $value) {
                                     ?>
                                    <tr class="load_details">
                                        <td class=""><?php echo ++$key; ?></td>
                                        <td class="centr"><?php echo $value->ticket_id; ?></td>
                                        <td class="centr"><?php echo $value->date_given; ?></td>
                                        <td class="centr"><?php echo get_value('tbl_ticket_issues','ticket_issues_id',$value->ticket_issue,'issues_name'); ?></td>
                                        <td class="centr"><?php echo $value->ticket_comment; ?></td>
                                        <td class="centr"><?php echo $value->ticket_status; ?></td>
                                        <?php if($value->ticket_status == 'PENDING'){ ?>
                                        <td class="centr"></td>
                                        <td class="centr"></td>
                                        <?php  }else{ ?>
                                          <td class="centr"><?php echo $value->reply_comment; ?></td>
                                        <td class="centr"><?php echo $value->reply_date; ?></td>
                                        <?php  } ?>
                                        
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
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" style="float: left;">Member Ticket Information</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            <div class="row">
                
                <div class="col-md-6">
                   <label>Issues</label>
                   <input type="text" class="form-control" id="ld_issue">
                </div>
                <div class="col-md-3">
                  <label>Status</label>
                  <input type="text" class="form-control" id="ld_status">
                </div>
                <div class="col-md-3">
                  <label>Ticket ID</label>
                  <input type="text" class="form-control" id="ld_ticketid">
                </div>
               
            </div>
            <br>
            
            <br>
            <div class="row">
              <div class="col-md-6">
                <label>Member Comment</label>
                <textarea id="ld_mem_cmt" class="form-control"></textarea>
              </div>
              <div class="col-md-6">
                <label>Admin Comment</label>
                <textarea id="ld_admin_comt" class="form-control"></textarea>
              </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Date of Given</label>
                    <input type="text" class="form-control" id="ld_date_given">
                </div>
                <div class="col-md-6">
                    <label>Reply Date</label>
                    <input type="text" class="form-control" id="ld_date_reply">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-success" data-dismiss="modal">Close</button> -->
        </div>
      </div>
      
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
        $('.load_details').click(function(){

            var row_index = $(this).closest('tr').index() + 1;
            
            var ld_issue= $("#table_id tr:eq(" + row_index + ") td:eq(3)").text();
            var ld_status= $("#table_id tr:eq(" + row_index + ") td:eq(5)").text();
            var ld_ticketid= $("#table_id tr:eq(" + row_index + ") td:eq(1)").text();
            var ld_mem_cmt= $("#table_id tr:eq(" + row_index + ") td:eq(4)").text();
            var ld_admin_comt= $("#table_id tr:eq(" + row_index + ") td:eq(6)").text();
            var ld_date_given= $("#table_id tr:eq(" + row_index + ") td:eq(2)").text();
            var ld_date_reply= $("#table_id tr:eq(" + row_index + ") td:eq(7)").text();
            
            
            
            $("#ld_issue").val(ld_issue);
            $("#ld_status").val(ld_status);
            $("#ld_ticketid").val(ld_ticketid);
            $("#ld_mem_cmt").val(ld_mem_cmt);
            $("#ld_admin_comt").val(ld_admin_comt);
            $("#ld_date_given").val(ld_date_given);
            $("#ld_date_reply").val(ld_date_reply);
            
             $('#myModal').modal('show'); 
        });       
 });
</script>