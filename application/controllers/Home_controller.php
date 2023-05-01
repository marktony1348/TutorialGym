<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_controller extends CI_Controller {

	public function __construct() {
		parent::__construct(); 
		$this->load->library(array('session','form_validation','email'));
		$this->load->helper(array('form', 'url'));
		$this->load->helper(array('form', 'url','common_helper'));
	    $this->load->model('crud_model');
    }
	public function index()
	{
		$this->load->view('user/index');
	}
	public function index1()
	{
		$data['address'] = $this->crud_model->selectquery('admin_profile','profile_id','1');
		$data['trainer'] = $this->crud_model->selectquery('tbl_trainer','visible','YES');
		$data['equipment'] = $this->crud_model->selectquery('tbl_equipment','visibile','YES');
		$data['member'] = $this->crud_model->selectquery('tbl_member_login','role','member');
		$this->load->view('user/user_trail',$data);
	}
	public function login()
	{
		redirect(base_url("logout"));
	}
	public function login_check()
	{
		$email_id = $this->input->post('email_id');
		$password = $this->input->post('password');
		if ($this->crud_model->check_login())
		{
	  		$role = $this->session->userdata('role');
	  		if($role == 'admin')
	  		{
	  			redirect(base_url('admin_home')); 
	  		}
	  		else if($role == 'member')
	  		{
	  			redirect(base_url('mem_home')); 
	  		}
	  		else
	  		{
	  			echo"Member coming soon";
	  		} 
	    }
	    else
	    {
	    	$this->session->set_tempdata('login_error', 'Invalid Email id or Password !', 5); 
	    	// $this->load->view('user/login'); 
	    	redirect(base_url('login')); 
	    }
	}
	//logout code
	public function logout()
	{
		$this->session->unset_userdata('gym_mem_id');
		$this->session->unset_userdata('member_name');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('gym_mem_id_2');
		$this->load->view('user/login');
	}
	public function registration()
	{
		$this->session->unset_userdata('gym_mem_id');
		$this->session->unset_userdata('member_name');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('gym_mem_id_2');
		$query = $this->db->query("SELECT gym_mem_id FROM `tbl_member_login` ORDER BY gym_mem_id DESC LIMIT 1");
		$data['last_memer_id'] = $query->result();
		$this->load->view('user/registration',$data);
	}
	//logout code end
	public function contact()
	{
		$data['address'] = $this->crud_model->selectquery('admin_profile','profile_id','1');
		$this->load->view('contact',$data);
	}
	public function send_message()
	{
		$sender_name = $this->input->post('sender_name');
		$sender_mail = $this->input->post('sender_mail');
		$send_msg = $this->input->post('send_msg');
		$data1 = array(
			'sender_name' => $sender_name,
			'sender_mail' => $sender_mail,
			'send_msg' => $send_msg,
			'create_date' => date('Y-m-d H:i:s')
			 );
		$data= $this->crud_model->insert('tbl_unregister_msg',$data1);
		$this->load->view('mesg_alert');
	}
	public function send_message1()
	{
		$sender_name = $this->input->post('sender_name');
		$sender_mail = $this->input->post('sender_mail');
		$sender_subject = $this->input->post('sender_subject');
		$send_msg = $this->input->post('send_msg');
		$data1 = array(
			'sender_name' => $sender_name,
			'sender_mail' => $sender_mail,
			'send_msg' => $send_msg,
			'sender_subject' => $sender_subject,
			'create_date' => date('Y-m-d H:i:s')
			 );
		$data= $this->crud_model->insert('tbl_unregister_msg',$data1);
		$this->load->view('mesg_alert');
	}
	public function about_us()
	{
		$data['address'] = $this->crud_model->selectquery('admin_profile','profile_id','1');
		$data['trainer'] = $this->crud_model->selectquery('tbl_trainer','visible','YES');
		$data['equipment'] = $this->crud_model->selectquery('tbl_equipment','visibile','YES');
		$this->load->view('about-us',$data);
	}
	public function schedule()
	{
		$data['address'] = $this->crud_model->selectquery('admin_profile','profile_id','1');
		$this->load->view('schedule',$data);
	}
	public function registration_add()
	{
		$email_id = $this->input->post('email_id');
		$member_name = $this->input->post('member_name');
		$mobile_no = $this->input->post('mobile_no');
		$password = $this->input->post('password');
		$gym_mem_id_2 = $this->input->post('gym_mem_id_2');
		$data1 = array(
			'email_id' => $email_id,
			'gym_mem_id_2' => $gym_mem_id_2,
			'member_name' => $member_name,
			'mobile_no' => $mobile_no,
			'role' => 'member',
			'join_date' => date('Y-m-d'),
			'password' => password_hash($password, PASSWORD_DEFAULT)
			 );
		$data= $this->crud_model->insert('tbl_member_login',$data1);
		redirect(base_url("logout"));
	}
}
