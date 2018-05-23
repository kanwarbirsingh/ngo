<?php 
if (! defined('BASEPATH')) exit('No direct script access');
	class Adminmodel extends CI_Model {

	 function logindata($username,$password)
	 {
		$this->db->select('am.*');
		$this->db->from($this->db->dbprefix('admin_master').' am');
		$this->db->where('am.username', $username);
		$this->db->where('am.password',$password);
		$query = $this->db->get();
		$data = $query->result_array();
		return count($data);
	 }
	 public function insert_category($data){
        $res = $this->db->insert('categories', $data); 
        return $res;
    }
    
    public function get_categories(){
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('status','1');
        $result = $this->db->get()->result_array();
        return $result;
    }
    public function get_projects(){
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('status','1');
		$this->db->order_by('id','DESC');
        $result = $this->db->get()->result_array();
        return $result;
    }
	
	public function get_limited_projects($limit,$from){
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('status','1');
		$this->db->order_by('id','DESC');
		$this->db->limit($limit,$from);
        $result = $this->db->get()->result_array();
        return $result;
    }
	
	public function get_total_projects(){
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('status','1');
		$this->db->order_by('id','DESC');
        $result = $this->db->get()->num_rows();
        return $result;
    }
	
    public function update_category($data,$id){
        $this->db->where('id', $id);
        $res = $this->db->update('categories', $data);
        return $res;
    }
	
	public function add_project($data){
        $res = $this->db->insert('events', $data); 
        return $res;
    }
	
	public function check_admin_login($username,$password){
        
        //echo $username;
        $this->db->select('password');
        $this->db->from('admin_master');
        $this->db->where('username',$username);
        $result = $this->db->get()->row_array();
        $my_password = $result['password'];
        if(base64_encode($password) == $my_password){
            return 'valid';
        } else {
            return 'invalid';
        }
    }
	
	public function get_admin_email($username){
        
        //echo $username;
        $this->db->select('email');
        $this->db->from('admin_master');
        $this->db->where('username',$username);
        $result = $this->db->get()->row_array();
        return $result['email'];
        
    }
	
	public function get_projectDetails($id){
        
        //echo $username;
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('id',$id);
        $result = $this->db->get()->row_array();
        return $result;
        
    }
	
	public function update_password($data,$username){
        $this->db->where('username', $username);
        $res = $this->db->update('admin_master', $data);
        return $res;
    }
	
	public function update_project($data,$pid){
        $this->db->where('id', $pid);
        $res = $this->db->update('events', $data);
        return $res;
    }
	    
}