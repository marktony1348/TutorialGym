<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_controller extends CI_Controller {

	public function __construct() {
		parent::__construct(); 
		$this->load->library(array('session','form_validation','email'));
		$this->load->helper(array('form', 'url'));
		$this->load->helper(array('form', 'url','common_helper'));
	    $this->load->model('crud_model');
    }
	public function member_home()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['admin_profile'] = $this->crud_model->selectquery('tbl_member_login','gym_mem_id',$gym_mem_id);
		$this->load->view('user/member_home',$data);
	}
	public function update_profile_m()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$member_name = $this->input->post('member_name');
		$address = $this->input->post('address');
		$DOB = $this->input->post('DOB');
		$fb = $this->input->post('fb');
		$ins = $this->input->post('ins');
		$mobile_no_visible = $this->input->post('mobile_no_visible');
		$about_gym = $this->input->post('about_gym');

		$attach = $this->crud_model->selectquery('tbl_member_login','gym_mem_id',$gym_mem_id);
		$photo = empty($_FILES['photo']['name']) ? '' : $_FILES['photo']['name']; 
        if(!empty($photo)) $photo1 = file_upload_img($photo, 'photo'); else $photo1 = empty($attach) ? '' : $attach[0]->photo;
        $data1 = array(
				'gym_mem_id' => $gym_mem_id,		
				'member_name' => $member_name,		
				'address' => $address,		
				'DOB' => $DOB,		
				'fb' => $fb,		
				'ins' => $ins,		
				'mobile_no_visible' => $mobile_no_visible,		
				'about_gym' => $about_gym,
				'photo' => $photo1,		
				'update_date' => date('Y-m-d H:i:s')
				 );
        $data= $this->crud_model->update('tbl_member_login',$data1,'gym_mem_id',$gym_mem_id);
		$this->session->set_tempdata('success_mesg', 'Profile updated Successfully...', 5);
		redirect(base_url('member_home'));
	}
	public function member_payment()
	{
		admin_login();
		$gym_mem_id_2 = $this->session->userdata('gym_mem_id_2');
		$data['payment_data'] = $this->crud_model->selectquery('tbl_member_payment','gym_mem_id_2',$gym_mem_id_2);
		$this->load->view('user/member_payment',$data);
	}
	public function member_ticket()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['ticket_data'] = $this->crud_model->selectquery('tbl_queries','ticket_rise_gm_id',$gym_mem_id);
		$data['ticket_issues'] = $this->crud_model->selectquery('tbl_ticket_issues','visible','YES');
		$this->load->view('user/member_ticket',$data);
	}
	public function add_tickets()
	{
		admin_login();
		$ticket_rise_gm_id = $this->session->userdata('gym_mem_id');
		$ticket_issue = $this->input->post('ticket_issue');
		$ticket_comment = $this->input->post('ticket_comment');
		$data1 = array(
				'ticket_rise_gm_id' => $ticket_rise_gm_id,		
				'ticket_issue' => $ticket_issue,		
				'ticket_comment' => $ticket_comment,		
				'date_given' => date('Y-m-d H:i:s'),
				'ticket_status' => 'PENDING'
				 );
		$data= $this->crud_model->insert('tbl_queries',$data1);
		redirect(base_url('member_ticket'));
	}
	public function mem_home()
	{
		$this->load->view('user/mem_home');
	}
	public function raise_mail_sep()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['mail_data'] = $this->db->query("SELECT * FROM `mail_details` where gym_mem_id ='".$gym_mem_id."'")->result();
		$this->load->view('admin/raise_mail_sep',$data);
	}
	public function send_sep_mem()
	{
		admin_login();
		$data['user_data'] = $this->db->query("SELECT * FROM `tbl_member_login` where gym_mem_id ='1'")->result();
		$this->load->view('admin/send_sep',$data);
	}
	public function workout_view()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['member_data'] = $this->db->query("SELECT * FROM `tbl_member_login` where gym_mem_id ='".$gym_mem_id."'")->result();
		$data['workout_details'] = $this->db->query("SELECT * FROM `tbl_workouts` where workout_id ='".$data['member_data'][0]->workout_id."'")->result();
		$this->load->view('user/workout_view',$data);
	}
	public function view_workouts_sep()
	{
		$workout_id = $this->uri->segment(2);
		$data['workout_details'] = $this->db->query("SELECT * FROM `tbl_workouts` where workout_id='".$workout_id."'")->result();
		$this->load->view('user/view_workouts_sep',$data);
	}
	public function update_details()
	{
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['mem_data'] = $this->db->query("SELECT * FROM `tbl_member_login` where gym_mem_id ='".$gym_mem_id."'")->result();
		$data['payment_data'] = $this->db->query("SELECT * FROM `tbl_member_payment` where gym_mem_id ='".$gym_mem_id."'")->result();
		$data['exist_check'] = $this->db->query("SELECT * FROM `tbl_workout_update` where gym_mem_id ='".$gym_mem_id."'")->result();
		$this->load->view('user/update_details',$data);
	}
	public function update_details_add(){
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['exist_check'] = $this->db->query("SELECT * FROM `tbl_workout_update` where gym_mem_id ='".$gym_mem_id."'")->result();
		$body_weight = $this->input->post('body_weight');
		$height = $this->input->post('height');
		$pushup = $this->input->post('pushup');
		$sit_up = $this->input->post('sit_up');
		$chest_press = $this->input->post('chest_press');
		$situp1 = $this->input->post('situp1');
		$date_ = implode(",", $this->input->post('date_'));
		$chest_ = implode(",", $this->input->post('chest_'));
		$shoulder_ = implode(",", $this->input->post('shoulder_'));
		$arm_ = implode(",", $this->input->post('arm_'));
		$trunk_ = implode(",", $this->input->post('trunk_'));
		$waist_ = implode(",", $this->input->post('waist_'));
		$hips_ = implode(",", $this->input->post('hips_'));
		$thigh_ = implode(",", $this->input->post('thigh_'));
		$calf_ = implode(",", $this->input->post('calf_'));

		$data1 = array('date_' => $date_,'chest_' => $chest_,'shoulder_' => $shoulder_,'arm_' => $arm_,'trunk_' => $trunk_,'waist_' => $waist_,'hips_' => $hips_,'thigh_' => $thigh_,'calf_' => $calf_,'gym_mem_id' => $gym_mem_id,'body_weight' => $body_weight,'height' => $height,'pushup' => $pushup,'sit_up' => $sit_up,'chest_press' => $chest_press,'situp1' => $situp1);
		if(!empty($data['exist_check']))
		{
			$data= $this->crud_model->update('tbl_workout_update',$data1,'gym_mem_id',$gym_mem_id);
		}
		else
		{
			$data= $this->crud_model->insert('tbl_workout_update',$data1);
		}
		$this->session->set_tempdata('success_mesg', 'Workout updated Successfully...', 5);
		redirect(base_url('update_details'));
	}
	public function health_check()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['diet_data'] = $this->db->query("SELECT * FROM `tbl_mem_diet` where gym_mem_id ='".$gym_mem_id."'")->result();
		$this->load->view('user/health_check',$data);
	}
	public function add_health_checkup()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$data['diet_data'] = $this->db->query("SELECT * FROM `tbl_mem_diet` where gym_mem_id ='".$gym_mem_id."'")->result();
		$data_values = array('gym_mem_id !=' => '0');
		$data['workout_all'] = $this->crud_model->selectquery_array('tbl_diet_plan_name',$data_values);
		$this->load->view('user/add_health_checkup',$data);
	}
	public function add_health_chup()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$height = $this->input->post('height');
		$weight = $this->input->post('weight');
		$chest_size = $this->input->post('chest_size');
		$plan_id = $this->input->post('plan_id');
		$data_values = array('gym_mem_id' => $gym_mem_id,'height' => $height,'weight' => $weight,'chest_size' => $chest_size,'plan_id' => $plan_id,'date' => date('Y-m-d'));
		$data= $this->crud_model->insert('tbl_mem_diet',$data_values);
		$this->session->set_tempdata('success_mesg', 'Health Checkup Updated...', 5);
			redirect(base_url('health_check'));
	}
	public function view_foods()
	{
		admin_login();
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$mem_diet_id = $this->uri->segment(2);
		$data['health_data'] = $this->db->query("SELECT * FROM `tbl_mem_diet` where gym_mem_id ='".$gym_mem_id."' and mem_diet_id ='".$mem_diet_id."'")->result();
		if(!empty($data['health_data']))
		{
			$data['foods'] = $this->db->query("SELECT * FROM `tbl_diet_plan` where ((".$data['health_data'][0]->height." >= min_height and ".$data['health_data'][0]->height." <= max_height) and (".$data['health_data'][0]->weight." >= min_weight and ".$data['health_data'][0]->weight." <= max_weight)) and workout_id ='".$data['health_data'][0]->plan_id."'")->result();
			$this->load->view('user/add_health_checkup_view',$data);
		}
		else
		{
			redirect(base_url('health_check'));
		}
	}
	public function chat()
	{
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$datavalues = array('client_id' => $gym_mem_id);
		$data['chat'] = $this->crud_model->selectquery_array('tbl_message',$datavalues);
		$this->load->view('user/chat2',$data);
	}
	public function find_msg()
	{
		$gym_mem_id = $this->session->userdata('gym_mem_id');
		$text_msg = $this->input->post('text_msg');
		$datavalues = array('client_msg' => $text_msg,'client_id' => $gym_mem_id,'date_of_msg' => date('Y-m-d'));
		$data1 = $this->crud_model->insert('tbl_message',$datavalues);
		$datavalues = array('client_msg' => $text_msg,'reply !=' => '','common_reply' => 'YES');
		$data['already_check'] = $this->crud_model->selectquery_array('tbl_message',$datavalues);
		if(!empty($data['already_check']))
		{
			$datavalues = array('reply' => $data['already_check'][0]->reply,'date_of_reply' => date('Y-m-d'),'common_reply' => 'YES');
			$this->crud_model->update('tbl_message', $datavalues, 'msg_id',$data1);
			echo $data['already_check'][0]->reply;
		}
		else
		{
			echo"empty";
		}

	}
}
