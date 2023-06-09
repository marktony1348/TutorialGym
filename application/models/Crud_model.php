<?php 
class Crud_model extends CI_Model{
	 function __construct() { 
         parent::__construct(); 
      }

	// To insert data for user registration 
	public function insert($tablename, $data) { 
	  if ($this->db->insert($tablename, $data)) {
	      return $this->db->insert_id();
	  } 
	}

	// update operation                  
	public function update($tablename, $data, $fieldname, $student_id) { 
	     $this->db->set($data);
	     $this->db->where($fieldname, $student_id); 
	     $this->db->update($tablename);
	     return true;
	}

  // select with field
  public function selectquery($tablename,$fieldname,$value){
      $this->db->where($fieldname,$value);
     return $this->db->get($tablename)->result();
  }
  // select with array
  public function selectquery_array($tablename,$data){
      $this->db->where($data);
     return $this->db->get($tablename)->result();
  }

  // select * 
  public function selectall($tablename){
     return $this->db->get($tablename)->result();
  }


  public function insertorupdate($tablename,$data){
  	$gym_mem_id = $this->session->userdata('gym_mem_id');
  	$this->db->select('gym_mem_id');
  	$this->db->where('gym_mem_id',$gym_mem_id);
  	$result = $this->db->get($tablename)->result();
  	// print_r($result);
  	if (!empty($result)) {
  		$this->db->set($data);
	    $this->db->where('gym_mem_id',$gym_mem_id); 
	    $this->db->update($tablename);
	    return true;
  	} else {
  		$this->db->insert($tablename, $data);
  		return true;
  	}
  }




	public function check_login(){

	    $email_id = $this->security->xss_clean($this->input->post('email_id'));
	    $password = $this->security->xss_clean($this->input->post('password'));  

	    $this->db->where('email_id', $email_id,'login_status','YES');
	    $result = $this->db->get('tbl_member_login')->result();  
	    if (!empty($result)){   
	      if (password_verify($password, $result[0]->password) ? TRUE : FALSE) {
	      	$sessiondata = array(
	      		'gym_mem_id'=> $result[0]->gym_mem_id,
	      		'member_name' => $result[0]->member_name,
	      		'gym_mem_id_2' => $result[0]->gym_mem_id_2,
	      		'role' => $result[0]->role
	      	);
	         $this->session->set_userdata($sessiondata);
	         return TRUE;
	      } else {
	         return FALSE;
	      }
	    } else {
	      return FALSE;
	    }
	}


}

?>