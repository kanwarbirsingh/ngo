<?php 

   function check_admin_login()
	{
           $ci = & get_instance();
           $admin_login = $ci->session->userdata('admin_logged_in');
           if($admin_login == true){
              return 'login';
           }else{
              return 'logout';
           }
	}
    function send_email($from,$to,$cc,$bcc,$subject,$message){
		$ci = & get_instance();
		// $config = Array(
			// 'protocol' => 'smtp',
			// 'smtp_host' => 'ssl://smtp.googlemail.com',
			// 'smtp_port' => 465,
			// 'smtp_user' => 'emmyhayer@gmail.com',
			// 'smtp_pass' => '',
			// 'mailtype'  => 'html', 
			// 'charset' => 'utf-8',
			// 'wordwrap' => TRUE

		// );
		// $ci->load->library('email', $config);
        
        $ci->email->from($from , $subject );
		$ci->email->set_mailtype("html");
        $ci->email->to($to); 
        $ci->email->cc($cc); 
        $ci->email->bcc($bcc); 
        $ci->email->subject($subject);
        $ci->email->message($message);	
        
        $res = $ci->email->send();
		//echo $ci->email->print_debugger();
        return $res;
    }
    
    function check_user_login()
	{
           $ci = & get_instance();
           $admin_login = $ci->session->userdata('user_logged_in');
           if($admin_login == true){
              return 'login';
           } else {
              return 'logout';
           }
	}
        
     function get_nav_items()
	{
            $ci = & get_instance();
            $ci->db->select('*');
            $ci->db->from('categories');
            $ci->db->where('status','1');
            $result = $ci->db->get()->result_array();
            return $result;
	}   
      function get_nav_subitems($id)
	{
            $ci = & get_instance();
            $ci->db->select('*');
            $ci->db->from('subcategories');
            $ci->db->where('status','1');
            $ci->db->where('category_id',$id);
            $result = $ci->db->get()->result_array();
            return $result;
	}  