<?php

ini_set('max_execution_time', 0);
ini_set('memory_limit','100000000000M');
use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   echo !extension_loaded('openssl')?"Not Available":"Available";
   $this->load->view('include/vendor/autoload.php');
		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPDebug = 0; 
		$mail->SMTPAuth = true; 
		$mail->SMTPSecure = 'ssl';
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465;
		$mail->IsHTML(true);
		$mail->Username = "mysoredfitness@gmail.com";
		$mail->Password = "DBoss@Deepak";
		$mail->SetFrom("noreplyemailderagav@gmail.com","GYM");
		$mail->Subject = "GYM - Payment Alert";
		$mail->Body = "<!DOCTYPE html>
      <html>
      <head>
      <body>
      <table border='0' cellspacing='0' cellpadding='0' style='font-weight:200;font-family:Helvetica,Arial,sans-serif' width='100%'>
 <tbody>
 <tr>
 <td width='100%'>
 <table border='0' cellspacing='0' cellpadding='0' style='font-weight:200;font-family:Helvetica,Arial,sans-serif' width='100%'>
 <tbody>
 <tr>
 <td align='center' bgcolor='#8BC34A' style='padding:20px 48px;color:#ffffff' class='m_1657013364671293366banner-color'>
 <table border='0' cellspacing='0' cellpadding='0' style='font-weight:200;font-family:Helvetica,Arial,sans-serif' width='100%'>
 <tbody>
 <tr>
 <td align='center' width='100%'>
 <h1 style='padding:0;margin:0;color:#ffffff;font-weight:500;font-size:20px;line-height:24px'>GYM - Payment <span class='il'>ALERT</span></h1>
 </td>
 </tr>
 </tbody>
 </table>
 </td>
 </tr>
 <tr>
 <td align='center' style='padding:20px 0 10px 0'>
 <table border='0' cellspacing='0' cellpadding='0' style='font-weight:200;font-family:Helvetica,Arial,sans-serif' width='100%'>
 <tbody>
 <tr>
 <td align='center' width='100%' style='padding:0 15px;text-align:justify;color:rgb(76,76,76);font-size:12px;line-height:18px'>
 <h3 style='font-weight:600;padding:0px;margin:0px;font-size:16px;line-height:24px;text-align:center' class='m_1657013364671293366title-color'>Hi ".$register_data[0]->member_name.",</h3>
 
 <p style='margin:20px 0 30px 0;font-size:15px;text-align:center'>Your Payment has been expire soon. last date is ".$member_payment[0]->expiry_date." </p>
 
 <div style='font-weight:200;text-align:center;margin:25px'><a style='padding:0.6em 1em;border-radius:600px;color:#800080;font-size:14px;text-decoration:none;font-weight:bold' class='m_1657013364671293366button-color'></a></div>
 </td>
 </tr>
 </tbody>
 </table>
 </td>
 </tr>
 <tr>
 </tr>
 <tr>
 </tr>
 </tbody>
 </table>
 </td>
 </tr>
 </tbody>
 </table>
      </body>
      </html>";
				$mail->AddAddress($register_data[0]->email_id);

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
 	 redirect(base_url('raise_mail_confirm/'.$register_data[0]->gym_mem_id_2));	
	}

 ?>