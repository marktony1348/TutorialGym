<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reports</title>
	<style type="text/css">
		#datatables thead tr th{text-align: center;}
		#datatables tr td{text-align: left;padding-left: 10px;}
		#datatables tr td,th{border: 1px solid #ccc;}
	</style>
</head>
<body>
	<h4 style="text-align:center;">INVOICE DETAILS</h4>
	<table id="datatables" width="100%" style="width:100%;border-collapse: collapse;">
                     
                      
                      <tbody>
                        <tr>
                          <td>Invoice Date </td>
                          <td><?php echo date('d-m-Y'); ?></td>
                        </tr>
                         <tr>
                          <td>Member ID </td>
                          <td><?php echo $register_data[0]->gym_mem_id_2; ?></td>
                        </tr><tr>
                          <td>Member Name </td>
                          <td><?php echo $register_data[0]->member_name; ?></td>
                        </tr>
                        <tr>
                          <td>Payment Date </td>
                          <td><?php echo $member_payment[0]->date_of_given; ?></td>
                        </tr>
                        <tr>
                          <td>Expire Date </td>
                          <td><?php echo $member_payment[0]->expiry_date; ?></td>
                        </tr>
                        
                      </tbody>
                    </table>

</body>
</html>