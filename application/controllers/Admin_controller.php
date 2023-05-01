<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

	public function __construct() {
		parent::__construct(); 
		$this->load->library(array('session','form_validation','email'));
		$this->load->helper(array('form', 'url','common_helper'));
	    $this->load->model('crud_model');
    }
	public function admin_home()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['contact_data'] = $this->crud_model->selectquery('tbl_member_login','gym_mem_id',$gym_mem_id);
		$this->load->view('admin/home',$data);
	}

	public function plans()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['plans_data'] = $this->crud_model->selectquery('tbl_plans','gym_mem_id',$gym_mem_id);
		$this->load->view('admin/plans',$data);
	}
	public function add_plans()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data2 = array(
		'gym_mem_id' => $gym_mem_id,
		'plan_name' => $this->input->post('plan_name'),
		'plan_amount' => $this->input->post('plan_amount'),
		'plan_months' => $this->input->post('plan_months')
		 );
		$data['plans_data']= $this->crud_model->selectquery_array('tbl_plans',$data2);
		if(!empty($data['plans_data']))
		{
			$this->session->set_tempdata('success_mesg', 'Sorry Plan Already Added Please Check...', 5);
		}
		else
		{
			$data1 = array(
			'gym_mem_id' => $gym_mem_id,
			'plan_name' => $this->input->post('plan_name'),
			'plan_amount' => $this->input->post('plan_amount'),
			'plan_months' => $this->input->post('plan_months'),
			'plan_status' => 'YES',
			'create_date' => date('Y-m-d H:i:s')
			 );
			$data= $this->crud_model->insert('tbl_plans',$data1);
			if(!empty($data))
			{
				$this->session->set_tempdata('success_mesg', 'Plan Added Successfully...', 5);
			}
		}
		redirect(base_url('plans')); 
	}
	public function edit_plan()
	{
		admin_login();
		$plan_id = $this->uri->segment(2);
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data_edit = array('gym_mem_id' => $gym_mem_id,'plan_id' => $plan_id);
		$data['plan_edit_data'] = $this->crud_model->selectquery_array('tbl_plans',$data_edit);
		if(count($data['plan_edit_data']) > 0)
		{
			$data['plans_data'] = $this->crud_model->selectquery('tbl_plans','gym_mem_id',$gym_mem_id);
			$this->load->view('admin/plans',$data);
		}
		else
		{
			redirect(base_url('login')); 
		}
	}
	public function update_plan()
	{
		admin_login();
		$plan_id_db = $this->uri->segment(2);
		$plan_id_hidden = $this->input->post('plan_id');
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		if($plan_id_db == $plan_id_hidden)
		{
			$data1 = array(
			'gym_mem_id' => $gym_mem_id,
			'plan_name' => $this->input->post('plan_name'),
			'plan_amount' => $this->input->post('plan_amount'),
			'plan_months' => $this->input->post('plan_months'),
			'plan_status' => 'YES',
			'update_date' => date('Y-m-d H:i:s')
			 );
			$data= $this->crud_model->update('tbl_plans',$data1,'plan_id',$plan_id_db);
			$this->session->set_tempdata('success_mesg', 'Plan Updated Successfully...', 5);
			redirect(base_url('plans')); 
		}
		else
		{
			redirect(base_url('login')); 
		}
		
	}
	public function upd_status()
	{

		$tbl_name = $this->uri->segment(2);
		$primary_key_clm = $this->uri->segment(3);
		$primary_key_value = $this->uri->segment(4);
		$update_clm = $this->uri->segment(5);
		$updated_value = $this->uri->segment(6);
		$redirect_string = $this->uri->segment(7);

		$data1 = array(
			$update_clm => $updated_value,
			'update_date' => date('Y-m-d H:i:s')
			 );
		$data= $this->crud_model->update($tbl_name,$data1,$primary_key_clm,$primary_key_value);
		$this->session->set_tempdata('success_mesg', 'Status '.$updated_value." updated.............", 5);
			redirect(base_url($redirect_string)); 
	}
	public function batch()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['batch_data'] = $this->crud_model->selectquery('batch','gym_mem_id',$gym_mem_id);
		$this->load->view('admin/batch',$data);
	}

	public function add_batch()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data2 = array(
		'gym_mem_id' => $gym_mem_id,
		'batch_name' => $this->input->post('batch_name'),
		'batch_limit' => $this->input->post('batch_limit'),
		'batch_start_time' => $this->input->post('batch_start_time'),
		'batch_end_time' => $this->input->post('batch_end_time')
		 );
		$data['batch_data']= $this->crud_model->selectquery_array('batch',$data2);
		if(!empty($data['batch_data']))
		{
			$this->session->set_tempdata('success_mesg', 'Sorry Batch Already Added Please Check...', 5);
		}
		else
		{
			$data1 = array(
			'gym_mem_id' => $gym_mem_id,
			'batch_name' => $this->input->post('batch_name'),
			'batch_limit' => $this->input->post('batch_limit'),
			'batch_start_time' => $this->input->post('batch_start_time'),
			'batch_end_time' => $this->input->post('batch_end_time'),
			'batch_status' => 'YES',
			'create_date' => date('Y-m-d H:i:s')
			 );
			$data= $this->crud_model->insert('batch',$data1);
			if(!empty($data))
			{
				$this->session->set_tempdata('success_mesg', 'Batch Added Successfully...', 5);
			}
		}
		redirect(base_url('batch')); 
	}

	public function edit_batch()
	{
		admin_login();
		$batch_id = $this->uri->segment(2);
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data_edit = array('gym_mem_id' => $gym_mem_id,'batch_id' => $batch_id);
		$data['batch_edit_data'] = $this->crud_model->selectquery_array('batch',$data_edit);
		if(count($data['batch_edit_data']) > 0)
		{
			$data['batch_data'] = $this->crud_model->selectquery('batch','gym_mem_id',$gym_mem_id);
			$this->load->view('admin/batch',$data);
		}
		else
		{
			redirect(base_url('login')); 
		}
	}

	public function update_batch()
	{
		admin_login();
		$batch_id_db = $this->uri->segment(2);
		$batch_id_hidden = $this->input->post('batch_id');
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		if($batch_id_db == $batch_id_hidden)
		{
			$data1 = array(
			'gym_mem_id' => $gym_mem_id,
			'batch_name' => $this->input->post('batch_name'),
			'batch_limit' => $this->input->post('batch_limit'),
			'batch_start_time' => $this->input->post('batch_start_time'),
			'batch_end_time' => $this->input->post('batch_end_time'),
			'batch_status' => 'YES',
			'update_date' => date('Y-m-d H:i:s')
			 );
			$data= $this->crud_model->update('batch',$data1,'batch_id',$batch_id_hidden);
			$this->session->set_tempdata('success_mesg', 'Batch Updated Successfully...', 5);
			redirect(base_url('batch')); 
		}
		else
		{
			redirect(base_url('login')); 
		}
	}

	// member
	public function member()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['member_data'] = $this->crud_model->selectquery('tbl_member_login','who_added_id',$gym_mem_id);
		//
		$data_values = array('plan_status' => 'YES','gym_mem_id' => $gym_mem_id);
		$data['plan_data'] = $this->crud_model->selectquery_array('tbl_plans',$data_values);
		$data['batch_data'] = $this->crud_model->selectquery('batch','gym_mem_id',$gym_mem_id);
		//last recored
		$query = $this->db->query("SELECT gym_mem_id FROM `tbl_member_login` ORDER BY gym_mem_id DESC LIMIT 1");
		$data['last_memer_id'] = $query->result();
		//last recored end
		$data_values = array('gym_mem_id' => $gym_mem_id);
		$data['workout_data'] = $this->crud_model->selectquery_array('tbl_workouts',$data_values);
		$this->load->view('admin/member',$data);
	}

	public function add_member()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$join_date = $this->input->post('join_date');
		$plan_id = $this->input->post('plan_id');
		// $workout_id = $this->input->post('workout_id');
		$data['plan_data'] = $this->crud_model->selectquery('tbl_plans','plan_id',$plan_id);
		$time  = strtotime($join_date);
		$date_proceed  = date('Y-m-d',$time);
		$today_date  = date('Y-m-d');
		$days = $data['plan_data'][0]->plan_months*30;
		$leave_start = DateTime::createFromFormat('Y-m-d', $date_proceed);
    	$leave_end = DateTime::createFromFormat('Y-m-d', $today_date);
    	$diffDays = $leave_end->diff($leave_start)->format("%r%a");
    	$add_days=0;
    	if($diffDays >= 0)
    	{
    		$add_days = $days + $diffDays;
    	}
    	else
    	{
    		$add_days = $days + ($diffDays);
    	}
		$expiry_date = date('Y-m-d', strtotime($add_days.' days'));
		$photo = empty($_FILES['photo']['name']) ? '' : $_FILES['photo']['name']; 
        if(!empty($photo)) $photo1 = file_upload_img($photo, 'photo');


		$data = array(
			'email_id' => $this->input->post('email_id'),
			'member_name' => $this->input->post('member_name'),
			'mobile_no' => $this->input->post('mobile_no'),
			'role' => 'member',
			'photo' => $photo1,
			'gender' => $this->input->post('gender'),
			'login_status' => 'YES',			
			'DOB' => $this->input->post('DOB'),
			'address' => $this->input->post('address'),
			'join_date' => $this->input->post('join_date'),
			'training_type' => $this->input->post('training_type'),
			'admission_fees' => $this->input->post('admission_fees'),
			'gym_mem_id_2' => $this->input->post('gym_mem_id'),
			'medical_info' => $this->input->post('medical_info'),
			'workout_id' => $this->input->post('workout_id'),
			'who_added_id' => $gym_mem_id,
			'create_date' => date('Y-m-d H:i:s'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
		);

		$data1 = array(
			'gym_mem_id' => $gym_mem_id,
			'gym_mem_id_2' => $this->input->post('gym_mem_id'),
			'amount' => $this->input->post('amount'),
			'discount_type' => $this->input->post('discount_type'),
			'discout_amount_or_percentage' => $this->input->post('discout_amount_or_percentage'),
			'due_amount' => $this->input->post('due_amount'),
			'payment_comments' => $this->input->post('payment_comments'),
			'date_of_given' => $this->input->post('join_date'),
			'expiry_date' => $expiry_date,
			'batch_id' => $this->input->post('batch_id'),
			'plan_id' => $this->input->post('plan_id'),			
			'create_date' => date('Y-m-d H:i:s')
			 );
		$data= $this->crud_model->insert('tbl_member_login',$data);
		$data= $this->crud_model->insert('tbl_member_payment',$data1);

		$this->session->set_tempdata('success_mesg', 'Member Added Successfully...', 5);
			redirect(base_url('member')); 
	}
	public function edit_member()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$member_id = $this->uri->segment(2);
		$check_gym_member_id = $this->uri->segment(3);
		if($gym_mem_id == $check_gym_member_id)
		{
			$data_values = array('gym_mem_id' => $gym_mem_id);
		$data['workout_data'] = $this->crud_model->selectquery_array('tbl_workouts',$data_values);
			$data['member_data'] = $this->crud_model->selectquery('tbl_member_login','who_added_id',$gym_mem_id);
			$data['member_edit_data'] = $this->crud_model->selectquery('tbl_member_login','gym_mem_id',$member_id);
			$query = $this->db->query("SELECT gym_mem_id FROM `tbl_member_login` ORDER BY gym_mem_id DESC LIMIT 1");
			$data['last_memer_id'] = $query->result();
			$this->load->view('admin/member',$data);
		}
		else
		{
			redirect(base_url('member')); 
		}
	}
	public function update_member()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$update_member_id = $this->uri->segment(2);
		$gym_mem_id_form = $this->input->post('gym_mem_id_hide');
		if($gym_mem_id == $gym_mem_id_form)
		{
			$attach = $this->crud_model->selectquery('tbl_member_login','gym_mem_id',$update_member_id);
			$photo = empty($_FILES['photo']['name']) ? '' : $_FILES['photo']['name']; 
        	if(!empty($photo)) $photo1 = file_upload_img($photo, 'photo'); else $photo1 = empty($attach) ? '' : $attach[0]->photo;
			$data = array(
			'email_id' => $this->input->post('email_id'),
			'member_name' => $this->input->post('member_name'),
			'mobile_no' => $this->input->post('mobile_no'),
			'role' => 'member',
			'photo' => $photo1,
			'gender' => $this->input->post('gender'),			
			'DOB' => $this->input->post('DOB'),
			'address' => $this->input->post('address'),
			'join_date' => $this->input->post('join_date'),
			'training_type' => $this->input->post('training_type'),
			'admission_fees' => $this->input->post('admission_fees'),
			'gym_mem_id_2' => $this->input->post('gym_mem_id'),
			'medical_info' => $this->input->post('medical_info'),
			'workout_id' => $this->input->post('workout_id'),
			'who_added_id' => $gym_mem_id,
			'update_date' => date('Y-m-d H:i:s'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			);
			$data= $this->crud_model->update('tbl_member_login',$data,'gym_mem_id',$update_member_id);
			$this->session->set_tempdata('success_mesg', 'Member Details Updated Successfully...', 5);
			redirect(base_url('member')); 
		}
		else
		{
			redirect(base_url('logout')); 
		}
	}
	//mail check exist
	public function mail_check()
	{
		$email_id = $this->input->post('email_id');
		$attach['email_check'] = $this->crud_model->selectquery('tbl_member_login','email_id',$email_id);
		if(count($attach['email_check'])>0)
		{
			echo "YES";
		}
		else{
			echo "NO";
		}
	}
	//mail check exist end
	//paymnet start
	public function payment()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['payment_data'] = $this->crud_model->selectquery('tbl_member_payment','gym_mem_id',$gym_mem_id);
		$data['payments_data'] = $this->crud_model->selectquery('tbl_member_login','who_added_id',$gym_mem_id);
		$data_values = array('plan_status' => 'YES','gym_mem_id' => $gym_mem_id);
		$data['plan_data'] = $this->crud_model->selectquery_array('tbl_plans',$data_values);
		$data['batch_data'] = $this->crud_model->selectquery('batch','gym_mem_id',$gym_mem_id);
		$this->load->view('admin/payment',$data);
	}
	public function member_detail()
	{
		$gym_mem_id_2 = $this->input->post('gym_mem_id_2');
		$data['payment_data'] = $this->crud_model->selectquery('tbl_member_login','gym_mem_id_2',$gym_mem_id_2);
		if(count($data['payment_data'])==1)
		{
			$query = $this->db->query("SELECT batch_id,expiry_date FROM `tbl_member_payment` where gym_mem_id_2='".$gym_mem_id_2."' ORDER by expiry_date DESC limit 0,1");
			$data['plans_data'] = $query->result();
			if(count($data['plans_data'])==1)
			{
				echo $data['payment_data'][0]->member_name.",".$data['payment_data'][0]->photo.",".$data['plans_data'][0]->batch_id.",".$data['plans_data'][0]->expiry_date;
			}
			else
			{
				echo"NO";
			}
			
		}
		else
		{
			echo"NO";
		}
	}

	public function add_payment()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		//previous expiry date
		$expiry_date = $this->input->post('expiry_date');
		$date_of_given = $this->input->post('date_of_given');
		//
		$today_date  = date('Y-m-d');
		$leave_start = DateTime::createFromFormat('Y-m-d', $expiry_date);
    	$leave_end = DateTime::createFromFormat('Y-m-d', $today_date);
    	$diffDays = $leave_end->diff($leave_start)->format("%r%a");
    	//
    	$plan_id = $this->input->post('plan_id');
		$data['plan_data'] = $this->crud_model->selectquery('tbl_plans','plan_id',$plan_id);
    	$days = $data['plan_data'][0]->plan_months*30;

    	// find given date today date
    	$today_date1  = date('Y-m-d');
		$leave_start1 = DateTime::createFromFormat('Y-m-d', $date_of_given);
    	$leave_end1 = DateTime::createFromFormat('Y-m-d', $today_date1);
    	$diffDays1 = $leave_end1->diff($leave_start1)->format("%r%a");

		// echo "old expiry date - ".$expiry_date;echo"<br>";
		// echo "month paln  - ".$data['plan_data'][0]->plan_months;echo"<br>";
		// echo "date of given - ".$date_of_given;echo"<br>";
		// echo "DIFFERENCT DATE EXPIRY AND TODAY - ".$diffDays;echo"<br>";
		// echo "DIFFERENCT date of given AND TODAY - ".$diffDays1;echo"<br>";
		$add_days=0;
		if($diffDays > 0)
		{
			$add_days = $days + $diffDays;
		}
		else
		{
			$add_days = $days + ($diffDays1);
		}
		$expiry_date1 = date('Y-m-d', strtotime($add_days.' days'));
		// echo "new expiry date - ".$expiry_date;echo"<br>";
		// die();
		//previous expiry date end
		$time  = strtotime($join_date);
		$date_proceed  = date('Y-m-d',$time);
		$today_date  = date('Y-m-d');
		$days = $data['plan_data'][0]->plan_months*30;
		$leave_start = DateTime::createFromFormat('Y-m-d', $date_proceed);
    	$leave_end = DateTime::createFromFormat('Y-m-d', $today_date);
    	$diffDays = $leave_end->diff($leave_start)->format("%r%a");
    	$add_days=0;
    	if($diffDays >= 0)
    	{
    		$add_days = $days + $diffDays;
    	}
    	else
    	{
    		$add_days = $days + ($diffDays);
    	}
		$expiry_date = date('Y-m-d', strtotime($add_days.' days'));
		$data1 = array(
			'gym_mem_id' => $gym_mem_id,
			'gym_mem_id_2' => $this->input->post('gym_mem_id_2'),
			'amount' => $this->input->post('amount'),
			'discount_type' => $this->input->post('discount_type'),
			'discout_amount_or_percentage' => $this->input->post('discout_amount_or_percentage'),
			'due_amount' => $this->input->post('due_amount'),
			'payment_comments' => $this->input->post('payment_comments'),
			'date_of_given' => $this->input->post('date_of_given'),
			'expiry_date' => $expiry_date1,
			'batch_id' => $this->input->post('batch_id_hidden'),
			'plan_id' => $this->input->post('plan_id'),			
			'create_date' => date('Y-m-d H:i:s')
			 );
		$data= $this->crud_model->insert('tbl_member_payment',$data1);
		$this->session->set_tempdata('success_mesg', 'Payment Added Successfully...', 5);
		redirect(base_url('payment'));
	}

	public function edit_payment()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$payment_id = $this->uri->segment(2);
		$gym_mem_id_passed = $this->uri->segment(3);

		if($gym_mem_id == $gym_mem_id_passed)
		{

			$data['member_edit_data'] = $this->crud_model->selectquery('tbl_member_payment','payment_id',$payment_id);


			$data['payments_data'] = $this->crud_model->selectquery('tbl_member_login','gym_mem_id_2',$data['member_edit_data'][0]->gym_mem_id_2);

			$data_values = array('plan_status' => 'YES','gym_mem_id' => $gym_mem_id);
			$data['plan_data'] = $this->crud_model->selectquery_array('tbl_plans',$data_values);
			$data['batch_data'] = $this->crud_model->selectquery('batch','batch_id',$data['member_edit_data'][0]->batch_id);
			$this->load->view('admin/payment',$data);
		}
		else
		{
			echo"Sorry You Have no edit this Gym User details";
		}
	}

	public function payment_update()
	{
		admin_login();
		$payment_id = $this->uri->segment(2);
		$gym_mem_id_passed = $this->uri->segment(3);
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		if($gym_mem_id_passed == $gym_mem_id)
		{

			$expiry_date = $this->input->post('expiry_date');
			$date_of_given = $this->input->post('date_of_given');
			$today_date  = date('Y-m-d');
			$leave_start = DateTime::createFromFormat('Y-m-d', $expiry_date);
	    	$leave_end = DateTime::createFromFormat('Y-m-d', $today_date);
	    	$diffDays = $leave_end->diff($leave_start)->format("%r%a");
	    	$plan_id = $this->input->post('plan_id');
			$data['plan_data'] = $this->crud_model->selectquery('tbl_plans','plan_id',$plan_id);
	    	$days = $data['plan_data'][0]->plan_months*30;
	    	$today_date1  = date('Y-m-d');
			$leave_start1 = DateTime::createFromFormat('Y-m-d', $date_of_given);
	    	$leave_end1 = DateTime::createFromFormat('Y-m-d', $today_date1);
	    	$diffDays1 = $leave_end1->diff($leave_start1)->format("%r%a");
			$add_days=0;
			if($diffDays > 0)
			{
				$add_days = $days + $diffDays;
			}
			else
			{
				$add_days = $days + ($diffDays1);
			}
			$expiry_date1 = date('Y-m-d', strtotime($add_days.' days'));
			$time  = strtotime($date_of_given);
			// $time  = strtotime($join_date);
			$date_proceed  = date('Y-m-d',$time);
			$today_date  = date('Y-m-d');
			$days = $data['plan_data'][0]->plan_months*30;
			$leave_start = DateTime::createFromFormat('Y-m-d', $date_proceed);
	    	$leave_end = DateTime::createFromFormat('Y-m-d', $today_date);
	    	$diffDays = $leave_end->diff($leave_start)->format("%r%a");
	    	$add_days=0;
	    	if($diffDays >= 0)
	    	{
	    		$add_days = $days + $diffDays;
	    	}
	    	else
	    	{
	    		$add_days = $days + ($diffDays);
	    	}
			$expiry_date = date('Y-m-d', strtotime($add_days.' days'));
			$data1 = array(
				'gym_mem_id' => $gym_mem_id,
				'gym_mem_id_2' => $this->input->post('gym_mem_id_2'),
				'amount' => $this->input->post('amount'),
				'discount_type' => $this->input->post('discount_type'),
				'discout_amount_or_percentage' => $this->input->post('discout_amount_or_percentage'),
				'due_amount' => $this->input->post('due_amount'),
				'payment_comments' => $this->input->post('payment_comments'),
				'date_of_given' => $this->input->post('date_of_given'),
				'expiry_date' => $expiry_date1,
				'batch_id' => $this->input->post('batch_id_hidden'),
				'plan_id' => $this->input->post('plan_id'),			
				'update_date' => date('Y-m-d H:i:s')
				 );
			$data= $this->crud_model->update('tbl_member_payment',$data1,'payment_id',$payment_id);
			
			$this->session->set_tempdata('success_mesg', 'Payment updated Successfully...', 5);
			redirect(base_url('payment'));
		}
		else
		{
			echo"Sorry You Have no edit this Gym User details";
		}
	}
	//paymnet startend
	//profile start
	public function profile()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['admin_profile'] = $this->crud_model->selectquery('admin_profile','gym_mem_id',$gym_mem_id);
		$this->load->view('admin/profile',$data);
	} 
	public function update_profile()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		//
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$gym_land_mark = $this->input->post('gym_land_mark');
		$gym_location = $this->input->post('gym_location');
		$fb = $this->input->post('fb');
		$tw = $this->input->post('tw');
		$ins = $this->input->post('ins');
		$yt = $this->input->post('yt');
		$mobile = $this->input->post('mobile');
		$mobile_no_visible = $this->input->post('mobile_no_visible');
		$about_gym = $this->input->post('about_gym');
		$edit_or_not = $this->input->post('edit_or_not');

		$attach = $this->crud_model->selectquery('admin_profile','gym_mem_id',$gym_mem_id);
			$photo = empty($_FILES['photo']['name']) ? '' : $_FILES['photo']['name']; 
        	if(!empty($photo)) $photo1 = file_upload_img($photo, 'photo'); else $photo1 = empty($attach) ? '' : $attach[0]->photo;

		$data1 = array(
				'gym_mem_id' => $gym_mem_id,		
				'name' => $name,		
				'address' => $address,		
				'gym_land_mark' => $gym_land_mark,		
				'gym_location' => $gym_location,		
				'fb' => $fb,		
				'tw' => $tw,		
				'ins' => $ins,		
				'yt' => $yt,		
				'mobile' => $mobile,		
				'mobile_no_visible' => $mobile_no_visible,		
				'about_gym' => $about_gym,
				'photo' => $photo1,		
				'update_date' => date('Y-m-d H:i:s')
				 );
		if($edit_or_not == 'YES')
		{
			$data= $this->crud_model->update('admin_profile',$data1,'gym_mem_id',$gym_mem_id);
		}
		else
		{
			$data= $this->crud_model->insert('admin_profile',$data1);
		}
		$this->session->set_tempdata('success_mesg', 'Profile updated Successfully...', 5);
		redirect(base_url('profile'));
	}
	//profile end
	//queries
	public function queries()
	{
		admin_login();
		$data['ticket_data'] = $this->crud_model->selectquery('tbl_queries','ticket_status','PENDING');
		$this->load->view('admin/member_tickets',$data);
	}
	public function reply_ticket()
	{
		$ticket_id = $this->uri->segment(2);
		$data['ticket_data'] = $this->crud_model->selectquery('tbl_queries','ticket_id',$ticket_id);
		if(!empty($data['ticket_data']) && $data['ticket_data'][0]->ticket_status == 'PENDING')
		{
			$this->load->view('admin/reply_tickets',$data);
		}
		else
		{
			redirect(base_url('queries'));
		}
	}
	public function reply_ticket_up()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$reply_comment = $this->input->post('reply_comment');
		$ticket_id = $this->input->post('ticket_id');
		$data2 = array(
		'ticket_reply_gm_id' => $gym_mem_id,
		'reply_comment' => $reply_comment,
		'ticket_status' => 'SUCCESS'
		 );
		$data= $this->crud_model->update('tbl_queries',$data2,'ticket_id',$ticket_id);
		redirect(base_url('queries'));
	}
	public function queries_replyed()
	{
		admin_login();
		$data['ticket_data'] = $this->crud_model->selectquery('tbl_queries','ticket_status','SUCCESS');
		$this->load->view('admin/queries_replyed',$data);
	}
	public function issue_coments()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['plans_data'] = $this->crud_model->selectquery('tbl_ticket_issues','gym_mem_id',$gym_mem_id);
		$this->load->view('admin/issue_coments',$data);
	}
	public function add_issue_coments()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data2 = array(
		'issues_name' => $this->input->post('issues_name')
		 );
		$data['plans_data']= $this->crud_model->selectquery_array('tbl_ticket_issues',$data2);
		if(!empty($data['plans_data']))
		{
			$this->session->set_tempdata('success_mesg', 'Sorry Issue comment Already Added Please Check...', 5);
		}
		else
		{
			$data1 = array(
			'gym_mem_id' => $gym_mem_id,
			'issues_name' => $this->input->post('issues_name'),
			'visible' => $this->input->post('visible'),
			'create_date' => date('Y-m-d H:i:s')
			 );
			$data= $this->crud_model->insert('tbl_ticket_issues',$data1);
			if(!empty($data))
			{
				$this->session->set_tempdata('success_mesg', 'Issue comment Added Successfully...', 5);
			}
		}
		redirect(base_url('issue_coments')); 
	}
	public function update_issue_coments()
	{
		admin_login();
		$ticket_issues_id = $this->uri->segment(2);
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data_edit = array('gym_mem_id' => $gym_mem_id,'ticket_issues_id' => $ticket_issues_id);
		$data['plan_edit_data'] = $this->crud_model->selectquery_array('tbl_ticket_issues',$data_edit);
		if(count($data['plan_edit_data']) > 0)
		{
			$data['plans_data'] = $this->crud_model->selectquery('tbl_ticket_issues','gym_mem_id',$gym_mem_id);
			$this->load->view('admin/issue_coments',$data);
		}
		else
		{
			redirect(base_url('login')); 
		}
	}
	public function update_issue_coments1()
	{
		admin_login();
		$ticket_issues_id = $this->uri->segment(2);
		$plan_id_hidden = $this->input->post('ticket_issues_id');
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		if($ticket_issues_id == $plan_id_hidden)
		{
			$data1 = array(
			'gym_mem_id' => $gym_mem_id,
			'issues_name' => $this->input->post('issues_name'),
			'visible' => $this->input->post('visible'),
			'update_date' => date('Y-m-d H:i:s')
			 );
			$data= $this->crud_model->update('tbl_ticket_issues',$data1,'ticket_issues_id',$ticket_issues_id);
			$this->session->set_tempdata('success_mesg', 'Issue comment Updated Successfully...', 5);
			redirect(base_url('issue_coments')); 
		}
		else
		{
			redirect(base_url('login')); 
		}
		
	}
	//queries end
	//
	public function trainer()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		//last recored
		$query = $this->db->query("SELECT * FROM `tbl_trainer`");
		$data['member_data'] = $query->result();
		$this->load->view('admin/trainer',$data);
	}
	public function add_trainer()
	{
		admin_login();
		$data2 = array(
		'trainer_name' => $this->input->post('trainer_name'),
		'specialist' => $this->input->post('specialist')
		 );
		$data['plans_data']= $this->crud_model->selectquery_array('tbl_trainer',$data2);
		if(!empty($data['plans_data']))
		{
			$this->session->set_tempdata('success_mesg', 'Sorry Trainer Already Added Please Check...', 5);
		}
		else
		{
			$attach = $this->crud_model->selectquery('tbl_trainer','trainer_id','-1');
			$photo = empty($_FILES['photo']['name']) ? '' : $_FILES['photo']['name']; 
        	if(!empty($photo)) $photo1 = file_upload_img($photo, 'photo'); else $photo1 = empty($attach) ? '' : $attach[0]->photo;

        $photo11 = empty($_FILES['photo1']['name']) ? '' : $_FILES['photo1']['name']; 
    	if(!empty($photo11)) $photo12 = file_upload_img($photo11, 'photo1'); else $photo12 = empty($attach) ? '' : $attach[0]->photo1;

			$data1 = array(
			'trainer_name' => $this->input->post('trainer_name'),
			'specialist' => $this->input->post('specialist'),
			'fb' => $this->input->post('fb'),
			'tw' => $this->input->post('tw'),
			'ins' => $this->input->post('ins'),
			'photo' => $photo1,
			'photo1' => $photo12
			 );
			$data= $this->crud_model->insert('tbl_trainer',$data1);
			if(!empty($data))
			{
				$this->session->set_tempdata('success_mesg', 'Trainer Added Successfully...', 5);
			}
		}
		redirect(base_url('trainer'));
	}
	public function edit_trainer()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$trainer_id = $this->uri->segment(2);
		$query = $this->db->query("SELECT * FROM `tbl_trainer`");
		$data['member_data'] = $query->result();
		$data['member_edit_data'] = $this->crud_model->selectquery('tbl_trainer','trainer_id',$trainer_id);
		$this->load->view('admin/trainer',$data);
	}
	public function update_trainer()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$trainer_id = $this->uri->segment(2);
		$attach = $this->crud_model->selectquery('tbl_trainer','trainer_id',$trainer_id);
		$photo = empty($_FILES['photo']['name']) ? '' : $_FILES['photo']['name']; 
    	if(!empty($photo)) $photo1 = file_upload_img($photo, 'photo'); else $photo1 = empty($attach) ? '' : $attach[0]->photo;
    	//
    	$photo11 = empty($_FILES['photo1']['name']) ? '' : $_FILES['photo1']['name']; 
    	if(!empty($photo11)) $photo12 = file_upload_img($photo11, 'photo1'); else $photo12 = empty($attach) ? '' : $attach[0]->photo1;
		$data = array(
		'trainer_name' => $this->input->post('trainer_name'),
		'specialist' => $this->input->post('specialist'),
		'fb' => $this->input->post('fb'),
		'tw' => $this->input->post('tw'),
		'ins' => $this->input->post('ins'),
		'photo' => $photo1,
		'photo1' => $photo12,
		'update_date' => date('Y-m-d H:i:s')
		);
		$data= $this->crud_model->update('tbl_trainer',$data,'trainer_id',$trainer_id);
		$this->session->set_tempdata('success_mesg', 'trainer Details Updated Successfully...', 5);
		redirect(base_url('trainer')); 
	}
	public function assign_trainer()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$query = $this->db->query("SELECT * FROM `tbl_assign_trainer`");
		$data['trainer_data'] = $query->result();
		$data['trainers']= $this->crud_model->selectquery('tbl_trainer','visible','YES');
		$this->load->view('admin/assign_trainer',$data);
	}
	public function add_assign_trainer()
	{
		admin_login();
		$data2 = array('time_start' => $this->input->post('time_start'),
		'day' => $this->input->post('day'));
		$data['assign_trainer']= $this->crud_model->selectquery_array('tbl_assign_trainer',$data2);
		if(!empty($data['assign_trainer']))
		{
			$this->session->set_tempdata('success_mesg', 'Sorry Trainer Already Assinged  Please Check...', 5);
		}
		else
		{
			$data1 = array(
			'trainer_id' => $this->input->post('trainer_id'),
			'day' => $this->input->post('day'),
			'time_start' => $this->input->post('time_start'),
			'time_end' => $this->input->post('time_end'),
			'visible' => "YES"
			 );
			$data= $this->crud_model->insert('tbl_assign_trainer',$data1);
			if(!empty($data))
			{
				$this->session->set_tempdata('success_mesg', 'Trainer Assigned Successfully...', 5);
			}
		}
		redirect(base_url('assign_trainer'));
	}
	public function edit_assign_trainer()
	{
		admin_login();
		$assign_id = $this->uri->segment(2);
		$query = $this->db->query("SELECT * FROM `tbl_assign_trainer`");
		$data['trainer_data'] = $query->result();
		$data['trainers']= $this->crud_model->selectquery('tbl_trainer','visible','YES');
		$data['trainer_edit_data'] = $this->crud_model->selectquery('tbl_assign_trainer','assign_id',$assign_id);
		$this->load->view('admin/assign_trainer',$data);
	}
	public function update_assign_trainer()
	{
		admin_login();
		$assign_id = $this->uri->segment(2);
		$data2 = array('time_start' => $this->input->post('time_start'),
		'day' => $this->input->post('day'),'visible' => 'YES');
		$data['assign_trainer']= $this->crud_model->selectquery_array('tbl_assign_trainer',$data2);
		if(!empty($data['assign_trainer']))
		{
			$this->session->set_tempdata('success_mesg', 'Sorry Already Assinged other Please Check and continue...', 5);
		}
		else
		{
			$data1 = array(
			'trainer_id' => $this->input->post('trainer_id'),
			'day' => $this->input->post('day'),
			'time_start' => $this->input->post('time_start'),
			'time_end' => $this->input->post('time_end'),
			'update_date' => date('Y-m-d H:i:s')
			 );
			$data= $this->crud_model->update('tbl_assign_trainer',$data1,'assign_id',$assign_id);
			$this->session->set_tempdata('success_mesg', 'trainer Assigned Updated Successfully...', 5);
		}
		
		redirect(base_url('assign_trainer'));
	}
	public function equipment()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['equipment_data'] = $this->crud_model->selectquery('tbl_equipment','gym_mem_id',$gym_mem_id);
		$this->load->view('admin/equipment',$data);
	}
	public function add_equipment()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data2 = array(
		'gym_mem_id' => $gym_mem_id,
		'name' => $this->input->post('name')
		 );
		$data['plans_data']= $this->crud_model->selectquery_array('tbl_equipment',$data2);
		if(!empty($data['plans_data']))
		{
			$this->session->set_tempdata('success_mesg', 'Sorry Equipment Already Added Please Check...', 5);
		}
		else
		{
			$attach = $this->crud_model->selectquery('tbl_equipment','gym_mem_id','-1');
			$photo = empty($_FILES['photo']['name']) ? '' : $_FILES['photo']['name']; 
        	if(!empty($photo)) $photo1 = file_upload_img($photo, 'photo');
			$data1 = array(
			'gym_mem_id' => $gym_mem_id,
			'name' => $this->input->post('name'),
			'photo' => $photo1
			 );
			$data= $this->crud_model->insert('tbl_equipment',$data1);
			if(!empty($data))
			{
				$this->session->set_tempdata('success_mesg', 'Equipment Added Successfully...', 5);
			}
		}
		redirect(base_url('equipment')); 
	}
	public function edit_equipment()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$equipment_id = $this->uri->segment(2);
		$data['equipment_data'] = $this->crud_model->selectquery('tbl_equipment','gym_mem_id',$gym_mem_id);
		$data['equipment_edit_data'] = $this->crud_model->selectquery('tbl_equipment','equipment_id',$equipment_id);
		$this->load->view('admin/equipment',$data);
	}
	public function update_equipment()
	{
		admin_login();
		$equipment_id_db = $this->uri->segment(2);
		$equipment_id_hidden = $this->input->post('equipment_id');
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		if($equipment_id_db == $equipment_id_hidden)
		{
			$attach = $this->crud_model->selectquery('tbl_equipment','gym_mem_id','-1');
			$photo = empty($_FILES['photo']['name']) ? '' : $_FILES['photo']['name']; 
        	if(!empty($photo)) $photo1 = file_upload_img($photo, 'photo'); else $photo1 = empty($attach) ? '' : $attach[0]->photo;
			$data1 = array(
			'gym_mem_id' => $gym_mem_id,
			'name' => $this->input->post('name'),
			'photo' => $photo1,
			'update_date' => date('Y-m-d H:i:s')
			 );
			$data= $this->crud_model->update('tbl_equipment',$data1,'equipment_id',$equipment_id_db);
			$this->session->set_tempdata('success_mesg', 'EQUIPMENT Updated Successfully...', 5);
			redirect(base_url('equipment')); 
		}
		else
		{
			redirect(base_url('login')); 
		}
	}
	public function unreg_query()
	{
		admin_login();
		$data['ticket_data'] = $this->crud_model->selectquery('tbl_unregister_msg','status','PENDING');
		$this->load->view('admin/unreg_query',$data);
	}
	public function reply_unregquery()
	{
		$msg_id = $this->uri->segment(2);
		$data['ticket_data'] = $this->crud_model->selectquery('tbl_unregister_msg','msg_id',$msg_id);
		if(!empty($data['ticket_data']) && $data['ticket_data'][0]->status == 'PENDING')
		{
			$this->load->view('admin/reply_querys',$data);
		}
		else
		{
			redirect(base_url('unreg_query'));
		}
	}
	public function reply_query_up()
	{
		admin_login();
		$reply_comt = $this->input->post('reply_comt');
		$msg_id = $this->input->post('msg_id');
		$data2 = array(
		'msg_id' => $msg_id,
		'reply_comt' => $reply_comt,
		'status' => 'REPLYED'
		 );
		$data= $this->crud_model->update('tbl_unregister_msg',$data2,'msg_id',$msg_id);

		$this->session->set_tempdata('success_mesg', 'Replyed Updated Successfully...', 5);
		redirect(base_url('unreg_query'));
	}
	public function unreg_query_com()
	{
		admin_login();
		$data['ticket_data'] = $this->crud_model->selectquery('tbl_unregister_msg','status','REPLYED');
		$this->load->view('admin/unreg_query1',$data);
	}
	public function delete_eq()
	{
		$equipment_id = $this->uri->segment(3);
		$this->db->delete('tbl_equipment', array('equipment_id' => $equipment_id));
		$this->session->set_tempdata('success_mesg', 'Equipment Deleted...', 5);
		redirect(base_url('equipment'));
	}
	//
	public function batch_new()
	{
		admin_login();
		$batch_id = $this->uri->segment(2);
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['batch_data'] = $this->crud_model->selectquery('batch','gym_mem_id',$gym_mem_id);
		$data['batch_data_model'] = $this->crud_model->selectquery('tbl_member_payment','batch_id',$batch_id);
		$this->load->view('admin/batch',$data);
	}
	public function raise_mail()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['payment_data'] = $this->crud_model->selectquery('tbl_member_payment','gym_mem_id',$gym_mem_id);
		$data['payments_data'] = $this->crud_model->selectquery('tbl_member_login','who_added_id',$gym_mem_id);
		$data_values = array('plan_status' => 'YES','gym_mem_id' => $gym_mem_id);
		$data['plan_data'] = $this->crud_model->selectquery_array('tbl_plans',$data_values);
		$data['batch_data'] = $this->crud_model->selectquery('batch','gym_mem_id',$gym_mem_id);
		$this->load->view('admin/raise_mail',$data);
	}
	public function send_mail()
	{
		admin_login();
		$gym_mem_id_2 = $this->uri->segment(2);
		$data['register_data'] = $this->crud_model->selectquery('tbl_member_login','gym_mem_id_2',$gym_mem_id_2);
		// $data['register_data'][0]->email_id;
		// echo $data['register_data'][0]->member_name;
		$data['member_payment'] = $this->crud_model->selectquery('tbl_member_payment','gym_mem_id_2',$gym_mem_id_2);
		// echo $data['member_payment'][0]->expiry_date;
		$this->load->view('admin/mail_code',$data);
	}
	public function raise_mail_confirm()
	{
		admin_login();
		$gym_mem_id_2 = $this->uri->segment(2);
		$data1 = array(
			'lmail_date' => date('Y-m-d H:i:s')
			 );
			$data= $this->crud_model->update('tbl_member_login',$data1,'gym_mem_id_2',$gym_mem_id_2);
			$this->session->set_tempdata('success_mesg', 'Mail Send Successfully...', 5);
			redirect(base_url('raise_mail'));
	}
	public function send_invoice()
	{
		admin_login();
		$gym_mem_id_2 = $this->uri->segment(2);
		$data['register_data'] = $this->crud_model->selectquery('tbl_member_login','gym_mem_id_2',$gym_mem_id_2);
		// $data['register_data'][0]->email_id;
		// echo $data['register_data'][0]->member_name;
		$data['member_payment'] = $this->crud_model->selectquery('tbl_member_payment','gym_mem_id_2',$gym_mem_id_2);
		// echo $data['member_payment'][0]->expiry_date;
		$this->load->view('admin/send_invoice',$data);
		$html = $this->output->get_output(); // Get output html
        // $html = "hi"; // Get output html
        $this->load->library('pdf'); // Load pdf library
        $this->dompdf->loadHtml($html); // Load HTML content
        $this->dompdf->setPaper('A4', 'landscape'); // potrait(Optional) Setup the paper size and orientation
        $this->dompdf->render(); // Render the HTML as PDF
        $output = $this->dompdf->output();
        //$this->dompdf->stream("orders.pdf", array("Attachment"=>0)); // Output the generated PDF (1 = download and 0 = preview)
		file_put_contents("invoice/".$data['register_data'][0]->gym_mem_id_2.".pdf", $output);
		redirect(base_url('raise_invoice/'.$data['register_data'][0]->gym_mem_id_2));
	}
	public function raise_invoice()
	{
		admin_login();
		$gym_mem_id_2 = $this->uri->segment(2);
		$data['register_data'] = $this->crud_model->selectquery('tbl_member_login','gym_mem_id_2',$gym_mem_id_2);
		// $data['register_data'][0]->email_id;
		// echo $data['register_data'][0]->member_name;
		$data['member_payment'] = $this->crud_model->selectquery('tbl_member_payment','gym_mem_id_2',$gym_mem_id_2);
		// echo $data['member_payment'][0]->expiry_date;
		$this->load->view('admin/mail_code_invoice',$data);
	}
	public function send_sep()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['user_data'] = $this->db->query("SELECT * FROM `tbl_member_login` where gym_mem_id !='".$gym_mem_id."'")->result();
		$this->load->view('admin/send_sep',$data);
	}
	public function send_sep_mail()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data1 = array(
			'gym_mem_id' => $gym_mem_id,
			'mail_id' => $this->input->post('user_id'),
			'body_content' => $this->input->post('body_content'),
			'header' => $this->input->post('header'),
			'create_date' => date('Y-m-d H:i:s')
			 );
		$data= $this->crud_model->insert('mail_details',$data1);
		if(!empty($data))
		{
			redirect(base_url('send_mail_sep/'.$data));
		}
	}
	public function send_mail_sep()
	{
		admin_login();
		$mail_inc_id = $this->uri->segment(2);
		$data['mail_data'] = $this->crud_model->selectquery('mail_details','mail_inc_id',$mail_inc_id);
		
		if(!empty($data['mail_data']))
		{
			$data['user_data'] = $this->crud_model->selectquery('tbl_member_login','gym_mem_id',$data['mail_data'][0]->mail_id);
			$this->session->set_tempdata('success_mesg', 'Mail Send Successfully...', 5);
			$this->load->view('admin/mail_code_sep',$data);
		}
	}
	public function raise_mail_sep()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['mail_data'] = $this->db->query("SELECT * FROM `mail_details` where gym_mem_id ='".$gym_mem_id."'")->result();
		$this->load->view('admin/raise_mail_sep',$data);
	}
	public function workouts()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['workout_data'] = $this->db->query("SELECT * FROM `tbl_workouts` where gym_mem_id ='".$gym_mem_id."'")->result();
		$this->load->view('admin/workouts',$data);
	}
	public function add_workout()
	{
		admin_login();
		$this->load->view('admin/add_workout');
	}
	public function workout_add()
	{
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$get_links = implode(",", $this->input->post('links'));
		$get_array = explode(",", $get_links);
		$temp ="";
		foreach ($get_array as $key => $value) {
			if(!empty($value))
			{
				$temp .=$value.",";
			}
		}
		$data1 = array(
			'gym_mem_id' => $gym_mem_id,
			'workout_name' => $this->input->post('workout_name'),
			'video_links' => $temp
			 );
			$data= $this->crud_model->insert('tbl_workouts',$data1);
			$this->session->set_tempdata('success_mesg', 'Workout Added...', 5);
			redirect(base_url('workouts'));
	}
	public function edit_workout()
	{
		admin_login();
		$workout_id = $this->uri->segment(2);
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['workout_data'] = $this->db->query("SELECT * FROM `tbl_workouts` where workout_id ='".$workout_id."'")->result();
		$this->load->view('admin/add_workout',$data);
	}
	public function workout_update()
	{
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$workout_id = $this->input->post('workout_id');
		$get_links = implode(",", $this->input->post('links'));
		$get_array = explode(",", $get_links);
		$temp ="";
		foreach ($get_array as $key => $value) {
			if(!empty($value))
			{
				$temp .=$value.",";
			}
		}
		$data1 = array(
			'gym_mem_id' => $gym_mem_id,
			'workout_name' => $this->input->post('workout_name'),
			'video_links' => $temp
			 );
			$data= $this->crud_model->update('tbl_workouts',$data1,'workout_id',$workout_id);
			$this->session->set_tempdata('success_mesg', 'Workout Updated...', 5);
			redirect(base_url('workouts'));
	}
	public function diet_plan()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['diet_data'] = $this->db->query("SELECT * FROM `tbl_diet_plan` where gym_mem_id ='".$gym_mem_id."'")->result();
		$this->load->view('admin/diet_plan',$data);
	}
	public function add_deit()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data_values = array('gym_mem_id' => $gym_mem_id);
		$data['workout_all'] = $this->crud_model->selectquery_array('tbl_diet_plan_name',$data_values);
		$this->load->view('admin/add_deit',$data);
	}
	public function deitp_add()
	{

		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$get_foods_m = implode(",", $this->input->post('foods_m'));
		$get_arrayfoods_m = explode(",", $get_foods_m);
		$foods_m ="";
		foreach ($get_arrayfoods_m as $key => $value) {
			if(!empty($value))
			{
				$foods_m .=$value.",";
			}
		}

		$get_foods_an = implode(",", $this->input->post('foods_an'));
		$get_arrayfoods_an = explode(",", $get_foods_an);
		$foods_an ="";
		foreach ($get_arrayfoods_an as $key => $value) {
			if(!empty($value))
			{
				$foods_an .=$value.",";
			}
		}

		$get_foods_e = implode(",", $this->input->post('foods_e'));
		$get_arrayfoods_e = explode(",", $get_foods_e);
		$foods_e ="";
		foreach ($get_arrayfoods_e as $key => $value) {
			if(!empty($value))
			{
				$foods_e .=$value.",";
			}
		}

		$get_foods_n = implode(",", $this->input->post('foods_n'));
		$get_arrayfoods_n = explode(",", $get_foods_n);
		$foods_n ="";
		foreach ($get_arrayfoods_n as $key => $value) {
			if(!empty($value))
			{
				$foods_n .=$value.",";
			}
		}
		
		$data1 = array(
			'gym_mem_id' => $gym_mem_id,
			'workout_id' => $this->input->post('workout_id'),
			'max_height' => $this->input->post('max_height'),
			'min_height' => $this->input->post('min_height'),
			'min_weight' => $this->input->post('min_weight'),
			'max_weight' => $this->input->post('max_weight'),
			'foods_m' => $foods_m,
			'foods_an' => $foods_an,
			'foods_e' => $foods_e,
			'foods_n' => $foods_n
			 );
			$data= $this->crud_model->insert('tbl_diet_plan',$data1);
			$this->session->set_tempdata('success_mesg', 'Diet Plan Added...', 5);
			redirect(base_url('diet_plan'));
	}
	public function edit_diet()
	{
		admin_login();
		$diet_id = $this->uri->segment(2);
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['diet_data'] = $this->db->query("SELECT * FROM `tbl_diet_plan` where diet_id ='".$diet_id."'")->result();
		// print_r($data['diet_data']);die();
		$data_values = array('gym_mem_id' => $gym_mem_id);
		$data['workout_all'] = $this->crud_model->selectquery_array('tbl_diet_plan_name',$data_values);
		$this->load->view('admin/add_deit',$data);
	}
	public function deitp_update()
	{
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$diet_id = $this->input->post('diet_id');
		$get_foods_m = implode(",", $this->input->post('foods_m'));
		$get_arrayfoods_m = explode(",", $get_foods_m);
		$foods_m ="";
		foreach ($get_arrayfoods_m as $key => $value) {
			if(!empty($value))
			{
				$foods_m .=$value.",";
			}
		}

		$get_foods_an = implode(",", $this->input->post('foods_an'));
		$get_arrayfoods_an = explode(",", $get_foods_an);
		$foods_an ="";
		foreach ($get_arrayfoods_an as $key => $value) {
			if(!empty($value))
			{
				$foods_an .=$value.",";
			}
		}

		$get_foods_e = implode(",", $this->input->post('foods_e'));
		$get_arrayfoods_e = explode(",", $get_foods_e);
		$foods_e ="";
		foreach ($get_arrayfoods_e as $key => $value) {
			if(!empty($value))
			{
				$foods_e .=$value.",";
			}
		}

		$get_foods_n = implode(",", $this->input->post('foods_n'));
		$get_arrayfoods_n = explode(",", $get_foods_n);
		$foods_n ="";
		foreach ($get_arrayfoods_n as $key => $value) {
			if(!empty($value))
			{
				$foods_n .=$value.",";
			}
		}
		$data1 = array(
			'gym_mem_id' => $gym_mem_id,
			'workout_id' => $this->input->post('workout_id'),
			'max_height' => $this->input->post('max_height'),
			'min_height' => $this->input->post('min_height'),
			'min_weight' => $this->input->post('min_weight'),
			'max_weight' => $this->input->post('max_weight'),
			'foods_m' => $foods_m,
			'foods_an' => $foods_an,
			'foods_e' => $foods_e,
			'foods_n' => $foods_n
			 );
			$data= $this->crud_model->update('tbl_diet_plan',$data1,'diet_id',$diet_id);
			$this->session->set_tempdata('success_mesg', 'Diet Plan Updated...', 5);
			redirect(base_url('diet_plan'));
	}
	public function View_chat()
	{
		$data_values = array('msg_id !=' => '0');
		$data['message'] = $this->crud_model->selectquery_array('tbl_message',$data_values);
		$this->load->view('admin/View_chat',$data);
	}
	public function reply_msg()
	{
		$msg_id = $this->uri->segment(2);
		$data_values = array('msg_id' => $msg_id);
		$data['message'] = $this->crud_model->selectquery_array('tbl_message',$data_values);
		$this->load->view('admin/View_chat_sep',$data);
	}
	public function msg_update()
	{
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$msg_id = $this->input->post('msg_id');
		$client_msg = $this->input->post('client_msg');
		$reply = $this->input->post('reply');
		$common_reply = $this->input->post('common_reply');
		if($common_reply == 'NO')
		{
			$data1 = array(
			'reply_id' => $gym_mem_id,
			'reply' => $reply,
			'date_of_reply' => date('Y-m-d')
			 );
			$data= $this->crud_model->update('tbl_message',$data1,'msg_id',$msg_id);
		}
		else
		{
			$data1 = array(
			'reply_id' => $gym_mem_id,
			'reply' => $reply,
			'common_reply' => $common_reply,
			'date_of_reply' => date('Y-m-d')
			 );
			$data= $this->crud_model->update('tbl_message',$data1,'client_msg',$client_msg);
		}

		$this->session->set_tempdata('success_mesg', 'Msg updated Updated Successfully...', 5);
		redirect(base_url('View_chat')); 
	}
}
