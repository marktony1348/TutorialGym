<?php
	function admin_login()
	{
		$CI = get_instance();
		$role = $CI->session->userdata('role');
		if($role == 'admin')
		{
		}
		else if($role == 'member')
		{
		}
		else
		{
			redirect(base_url("logout"));
		}
	}
	function file_upload_img($file_name, $input_name)
	{
	    $CI = get_instance();
	    $config['upload_path'] = "uploads";  //$path
	    $config['allowed_types'] = 'jpg|jpeg|pdf|png';
	    $config['file_name'] = strtolower(rand(100000, 999999).'_'.$input_name);
	    $CI->load->library('upload', $config); 
	    $CI->upload->initialize($config);
	    if (!$CI->upload->do_upload($input_name))
	        $error = array('error' => $CI->upload->display_errors());
	    else
	    {
	         $data1 = $CI->upload->data();
	         $result = $data1['file_name'];
	         return $result;
	    }    
	}
	function get_data_value($tbl_name,$where_clm,$where_value,$return_value)
	{
	    $CI = get_instance();
	    $select_value = explode(",", $return_value);
	    $CI->db->select($select_value);
	    $CI->db->where($where_clm, $where_value);
	    $query = $CI->db->get($tbl_name);
	    $data = $query->result();
	    $st = '';
	    if(!empty($data)){
	    	foreach ($select_value as $key => $value) {
	    		if($key == 0)
	    		{
	    			$st .= $data[0]->$value; 
	    		}
	    		else
	    		{
	    			$st .=" - ".$data[0]->$value;
	    		}
	    	}
	    }else{
	        $st = '';
	    }
	    return $st;
	}
	function get_last_value($payment_id,$gym_mem_id_2)
	{
		$CI = get_instance();
	    $CI->db->select('payment_id');
	    $CI->db->where('gym_mem_id_2', $gym_mem_id_2);
	    $CI->db->order_by("expiry_date DESC");
	    $CI->db->limit(1);
	    $query = $CI->db->get('tbl_member_payment');
	    $data = $query->result();
	    if(!empty($data[0]->payment_id) && !empty($data))
	    {
	    	return $data[0]->payment_id;
	    }
	    else
	    {
	    	return 0;
	    }
	}
	function get_img_src($gym_mem_id)
	{
		$CI = get_instance();
	    $CI->db->select('photo');
	    $CI->db->where('gym_mem_id', $gym_mem_id);
	    $query = $CI->db->get('admin_profile');
	    $data = $query->result();
	    if(!empty($data[0]->photo) && !empty($data))
	    {
	    	return $data[0]->photo;
	    }
	    else
	    {
	    	return 0;
	    }
	}
	function get_value($tbl_name,$where_clm,$where_value,$select_value)
	{
		$CI = get_instance();
	    $CI->db->select($select_value);
	    $CI->db->where($where_clm, $where_value);
	    $query = $CI->db->get($tbl_name);
	    $data = $query->result();
	    if(!empty($data[0]->$select_value) && !empty($data))
	    {
	    	return $data[0]->$select_value;
	    }
	    else
	    {
	    	return 0;
	    }
	}
	//
	function get_schedule_values($start_time,$day)
	{
		$CI = get_instance();
	    $CI->db->select("*");
	    $CI->db->where(array('time_start' => $start_time,'day'  => $day,'visible'  => 'YES'));
	    $query = $CI->db->get('tbl_assign_trainer');
	    $data['get_values'] = $query->result();
	    if(count($data['get_values']) == 1)
	    {
	    	return $data['get_values'];
	    }
	    else
	    {
	    	echo"";
	    }
	}
	//
	function get_value_1($tbl_name,$where_clm,$where_value,$select_value)
	{
		$CI = get_instance();
	    $CI->db->select($select_value);
	    $CI->db->where($where_clm, $where_value);
	    $query = $CI->db->get($tbl_name);
	    $data = $query->result();
	    if(!empty($data[0]->$select_value) && !empty($data))
	    {
	    	return count($data);
	    }
	    else
	    {
	    	return 0;
	    }
	}
	function get_value_12($table_name,$sum_clm)
	{
		$CI = get_instance();
	    $CI->db->select_sum($sum_clm);
	    $query = $CI->db->get($table_name);
	    $data = $query->result();
	    if(!empty($data[0]->$sum_clm) && !empty($data))
	    {
	    	return $data[0]->$sum_clm;
	    }
	    else
	    {
	    	return 0;
	    }
	}
	function get_batch_count($batch_id)
	{
		$CI = get_instance();
	    $query = $CI->db->query("SELECT * FROM `tbl_member_payment`  where batch_id in($batch_id)");
	    $data = $query->result();
	    if(!empty($data))
	    {
	    	return count($data);
	    }
	    else
	    {
	    	return 0;
	    }
	}
	function getdata($gym_mem_id_2)
	{
		$CI = get_instance();
	    $query = $CI->db->query("SELECT * FROM `tbl_member_login`  where gym_mem_id_2 in('$gym_mem_id_2')");
	    $data = $query->result();
	    if(!empty($data))
	    {
	    	return $data;
	    }
	    else
	    {
	    	return 0;
	    }
	}
	function get_health_checkup()
	{
		$CI = get_instance();
	    $query = $CI->db->query("SELECT * FROM `tbl_mem_diet` where gym_mem_id='".$CI->session->userdata('gym_mem_id')."' order by mem_diet_id DESC limit 1");
	    $data['health_data'] = $query->result();
	    if(!empty($data['health_data']))
	    {
	    	return $data['health_data'][0]->date;
	    }
	    else
	    {
	    	return 0;
	    }
	}
?>