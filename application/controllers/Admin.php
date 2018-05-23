<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('adminmodel');
    }
	public function index()
	{
		if($this->session->userdata('admin_login') == true){
			redirect(base_url('admin/dashboard'));
		}
		$this->load->view('admin/index');
	}
	public function login()
	{
		
		$username = $this->input->post('email');
		$password = $this->input->post('password');
		$result = $this->adminmodel->logindata($username,$password);
		
		if($result == '1'){
			$data = array( 
				'admin_login' => true,
				'admin_username' => $username
			);
			$this->session->set_userdata($data);
			redirect(base_url('admin/dashboard'));
		} else {
			$this->session->set_flashdata('adminlogin','Incorrect credentials');
			redirect(base_url('admin'));
		}
		
	}
	public function dashboard()
	{
		if($this->session->userdata('admin_login') != true){
			redirect(base_url('admin'));
		}
		$data['projects']=$this->adminmodel->get_projects(); 
		$this->load->view('admin/dashboard',$data);
		//$this->load->view('admin/dashboard');
	}
	
	// CATEGORY PAGE FUNCTIONS 
	public function categories()
	{
		if($this->session->userdata('admin_login') != true){
			redirect(base_url('admin'));
		}
		$data['categories']=$this->adminmodel->get_categories(); 
		$this->load->view('admin/categories',$data);
	}
	
	public function add_category(){
		$cat = strtolower(trim($this->input->post('cat')));
		$data=array(
		  'name' => $cat  
		);
		$result =  $this->adminmodel->insert_category($data);
		if($result == true){
			 $this->session->set_flashdata('category','<span class="text-success">Category has been added succesfully</span>');   
		   }else{
			 $this->session->set_flashdata('category','<span class="text-danger">something went wrong!! Please try later</span>');  
		   }   
		   redirect(base_url('admin/categories'));
		   
	}
	
	public function delete_category(){
		$cid = strtolower(trim($this->input->get('id')));
		$data=array(
		  'status' => '3'  
		);
		$result =  $this->adminmodel->update_category($data,$cid);
		   if($result == true){
			 $this->session->set_flashdata('category','<span class="text-success">Category has been deleted succesfully</span>');   
		   }else{
			 $this->session->set_flashdata('category','<span class="text-danger">something went wrong!! Please try later</span>');  
		   }
		redirect(base_url('admin/categories'));   
	}
	
	public function edit_category(){
		$cat = strtolower(trim($this->input->post('cat')));
		$cid = strtolower(trim($this->input->post('id')));
		$data=array(
		  'name' => $cat  
		);
		echo $result =  $this->adminmodel->update_category($data,$cid);
		   if($result == true){
			 $this->session->set_flashdata('category','<span class="text-success">Category has been edited succesfully</span>');   
		   }else{
			 $this->session->set_flashdata('category','<span class="text-danger">something went wrong!! Please try later</div>');  
		   }
		   redirect(base_url('admin/categories'));
	}
	
	// PROJECT FUNCTIONS BEGIN
	public function add_project(){
		if($this->session->userdata('admin_login') != true){
			redirect(base_url('admin'));
		}
		//$data['categories']=$this->adminmodel->get_categories(); 
		//$this->load->view('admin/add_project',$data);
		$this->load->view('admin/add_project');
	}
	
	// PROJECT FUNCTIONS BEGIN
	public function edit_project($id){
		if($this->session->userdata('admin_login') != true){
			redirect(base_url('admin'));
		}
		//echo $id;
		$data['project']=$this->adminmodel->get_projectDetails($id); 
		//$data['categories']=$this->adminmodel->get_categories(); 
		$this->load->view('admin/edit_project',$data);
	}
	
	// PROJECT FUNCTIONS BEGIN
	public function view_project($id){
		if($this->session->userdata('admin_login') != true){
			redirect(base_url('admin'));
		}
		$id;
		$data['project']=$this->adminmodel->get_projectDetails($id); 
		//$data['categories']=$this->adminmodel->get_categories(); 
		$this->load->view('admin/view_project',$data);
	}
	
	public function delete_project($id){
		if($this->session->userdata('admin_login') != true){
			redirect(base_url('admin'));
		}
		$data = array(
			'status' => '0'
		);
		$res = $this->adminmodel->update_project($data,$id);
		if($res == false){
			$this->session->set_flashdata('upload_project','<span class="text-danger">something went wrong, please try later</span>');
			redirect(base_url('admin/dashboard'));
			exit();
		} else {
			redirect(base_url('admin/dashboard'));
			exit();
		}
	}
	public function add_new_project(){
		$project_name = trim($this->input->post('project_name'));
		$category = trim($this->input->post('category'));
		$duration = trim($this->input->post('duration'));
		$location = trim($this->input->post('location'));
		$description = trim($this->input->post('description'));
        $client = trim($this->input->post('client'));    
            
            
            //$equipment_id = $res; // = '4';
            $uploadDir = './uploads/';
            $uploadDir2 = $uploadDir.'thumbnails/';
           
            $config['upload_path'] = $uploadDir; 
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']	= '999999999';
            $config['max_width']  = '0';
            $config['max_height']  = '0';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
                
            $files = $_FILES;
            $cpt = count($_FILES['userfile']['name']);
            for($i=0; $i<$cpt; $i++){
                
                // $file_name = time().$i.$files['userfile']['name'][$i];
                // $_FILES['userfile']['name'] = $file_name;
                $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];  
//
                if (!$this->upload->do_upload())
                {
                        //$error = array('error' => $this->upload->display_errors());
                       // print_r($error);
                       // $this->load->view('upload_form', $error);
                }
                else
                {

                        $data = array('upload_data' => $this->upload->data());
                        echo '<pre>';
                       print_r($data);
                       
					   
                        $this->load->library('image_lib');
                        $config1['source_image'] = $uploadDir.$data['upload_data']['file_name'];
                        $config1['new_image'] = $uploadDir2;
                        $config1['create_thumb'] = FALSE;
                        $config1['maintain_ratio'] = TRUE;
                        $config1['width'] = '1200';
                        $config1['height'] = '1000';
                        
                        $this->image_lib->initialize($config1);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                        
						// $config1['upload_path'] = $uploadDir.$data['upload_data']['file_name']; 
						// $config1['allowed_types'] = 'gif|jpg|png|jpeg';
						// $config1['max_size']	= '999999999';
						// $config1['max_width']  = '0';
						// $config1['max_height']  = '0';

						// $this->load->library('upload', $config1);
						// $this->upload->initialize($config1);
						
						// $_FILES['userfile']['name']= $uploadDir.$data['upload_data']['file_name'];
						// $_FILES['userfile']['type']= $uploadDir.$data['upload_data']['file_type'];
						// $_FILES['userfile']['tmp_name']= $uploadDir.$data['upload_data']['tmp_name'];
						// $_FILES['userfile']['error']= $uploadDir.$data['upload_data']['error'];
						// $_FILES['userfile']['size']= $uploadDir.$data['upload_data']['size'];  
						
						 
						//----BEGIN CROP UPLOADED IMAGE------
                            $filename = 'uploads/thumbnails/'.$data['upload_data']['file_name'];
                            $image_src = base_url($filename);
                            $image = imagecreatefromjpeg($image_src);
                           

                            $thumb_width = 500;
                            $thumb_height = 450;

                            $width = imagesx($image);
                            $height = imagesy($image);

                            $original_aspect = $width / $height;
                            $thumb_aspect = $thumb_width / $thumb_height;

                            if ( $original_aspect >= $thumb_aspect )
                            {
                               // If image is wider than thumbnail (in aspect ratio sense)
                               $new_height = $thumb_height;
                               $new_width = $width / ($height / $thumb_height);
                            }
                            else
                            {
                               // If the thumbnail is wider than the image
                               $new_width = $thumb_width;
                               $new_height = $height / ($width / $thumb_width);
                            }

                            $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

                            // Resize and crop
                            imagecopyresampled($thumb,
                                               $image,
                                               0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                                               0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                                               0, 0,
                                               $new_width, $new_height,
                                               $width, $height);
                            imagejpeg($thumb, $filename, 80);
                        //-----END CROP UPLOADED IMAGES----
						
                        $data = array(
							'name' => $project_name,
							'client' => $client,
							'duration'  => $duration,
							'category_id' => $category,
							'location' => $location,
							'image' => $data['upload_data']['file_name'],
							'description' => $description,
							'added_date' => date('y-m-d h:i:s'),
							'status' => '1'
						);
						
						$res = $this->adminmodel->add_project($data);
						if($res == false){
							$this->session->set_flashdata('upload_project','<span class="text-danger">something went wrong, please try later</span>');
							redirect(base_url('admin/add_project'));
							exit();
						}
                }
            }   
		redirect(base_url('admin/dashboard'));
		
	}
	
	public function update_project(){
		$pid = trim($this->input->post('pid'));
		$project_name = trim($this->input->post('project_name'));
		$category = trim($this->input->post('category'));
		$duration = trim($this->input->post('duration'));
		$location = trim($this->input->post('location'));
		$description = trim($this->input->post('description'));
        $client = trim($this->input->post('client'));    
            
            
            //$equipment_id = $res; // = '4';
            $uploadDir = './uploads/';
            $uploadDir2 = $uploadDir.'thumbnails/';
           
            $config['upload_path'] = $uploadDir; 
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']	= '999999999';
            $config['max_width']  = '0';
            $config['max_height']  = '0';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
                
            $files = $_FILES;
            $cpt = count($_FILES['userfile']['name']);
			$mfile = $files['userfile']['name'][0];
			if($mfile == ''){
				
				$data = array(
					'name' => $project_name,
					'client' => $client,
					'duration'  => $duration,
					'category_id' => $category,
					'location' => $location,
					'description' => $description
				);
				
				$res = $this->adminmodel->update_project($data,$pid);
				if($res == false){
					$this->session->set_flashdata('update_project','<span class="text-danger">something went wrong, please try later</span>');
					redirect(base_url('admin/edit_project/'.$pid));
					exit();
				} else{
					redirect(base_url('admin/dashboard'));
					exit();
				}
				
			} 
			
			
            for($i=0; $i<$cpt; $i++){
                
                // $file_name = time().$i.$files['userfile']['name'][$i];
                // $_FILES['userfile']['name'] = $file_name;
                $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];  
//
                if (!$this->upload->do_upload())
                {
                        //$error = array('error' => $this->upload->display_errors());
                       // print_r($error);
                       // $this->load->view('upload_form', $error);
                }
                else
                {

                        $data = array('upload_data' => $this->upload->data());
                        echo '<pre>';
                       print_r($data);
                       
					   
                        $this->load->library('image_lib');
                        $config1['source_image'] = $uploadDir.$data['upload_data']['file_name'];
                        $config1['new_image'] = $uploadDir2;
                        $config1['create_thumb'] = FALSE;
                        $config1['maintain_ratio'] = TRUE;
                        $config1['width'] = '1200';
                        $config1['height'] = '1000';
                        
                        $this->image_lib->initialize($config1);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                        
						// $config1['upload_path'] = $uploadDir.$data['upload_data']['file_name']; 
						// $config1['allowed_types'] = 'gif|jpg|png|jpeg';
						// $config1['max_size']	= '999999999';
						// $config1['max_width']  = '0';
						// $config1['max_height']  = '0';

						// $this->load->library('upload', $config1);
						// $this->upload->initialize($config1);
						
						// $_FILES['userfile']['name']= $uploadDir.$data['upload_data']['file_name'];
						// $_FILES['userfile']['type']= $uploadDir.$data['upload_data']['file_type'];
						// $_FILES['userfile']['tmp_name']= $uploadDir.$data['upload_data']['tmp_name'];
						// $_FILES['userfile']['error']= $uploadDir.$data['upload_data']['error'];
						// $_FILES['userfile']['size']= $uploadDir.$data['upload_data']['size'];  
						
						 
						//----BEGIN CROP UPLOADED IMAGE------
                            $filename = 'uploads/thumbnails/'.$data['upload_data']['file_name'];
                            $image_src = base_url($filename);
                            $image = imagecreatefromjpeg($image_src);
                           

                            $thumb_width = 500;
                            $thumb_height = 450;

                            $width = imagesx($image);
                            $height = imagesy($image);

                            $original_aspect = $width / $height;
                            $thumb_aspect = $thumb_width / $thumb_height;

                            if ( $original_aspect >= $thumb_aspect )
                            {
                               // If image is wider than thumbnail (in aspect ratio sense)
                               $new_height = $thumb_height;
                               $new_width = $width / ($height / $thumb_height);
                            }
                            else
                            {
                               // If the thumbnail is wider than the image
                               $new_width = $thumb_width;
                               $new_height = $height / ($width / $thumb_width);
                            }

                            $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

                            // Resize and crop
                            imagecopyresampled($thumb,
                                               $image,
                                               0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                                               0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                                               0, 0,
                                               $new_width, $new_height,
                                               $width, $height);
                            imagejpeg($thumb, $filename, 80);
                        //-----END CROP UPLOADED IMAGES----
						
                        $data = array(
							'name' => $project_name,
							'client' => $client,
							'duration'  => $duration,
							'category_id' => $category,
							'location' => $location,
							'image' => $data['upload_data']['file_name'],
							'description' => $description
						);
						
						$res = $this->adminmodel->update_project($data,$pid);
						if($res == false){
							$this->session->set_flashdata('upload_project','<span class="text-danger">something went wrong, please try later</span>');
							redirect(base_url('admin/add_project'));
							exit();
						}
                }
            }   
		redirect(base_url('admin/dashboard'));
		
	}
	
	public function settings()
	{
		if($this->session->userdata('admin_login') != true){
			redirect(base_url('admin'));
		}
		$username = $this->session->userdata('admin_username');
		$data['email'] = $this->adminmodel->get_admin_email($username);
		$this->load->view('admin/settings',$data);
	}
	
	    public function change_password()
	{
           $username = $this->session->userdata('admin_username');
           $password = $this->input->post('password');
           $npassword = $this->input->post('npassword');
           $check_password =  $this->adminmodel->check_admin_login($username,$password);
           if($check_password == 'invalid'){   
            $this->session->set_flashdata('change_password','<span class="msg-overlay text-danger">Entered wrong Password</span>');
		    redirect(base_url('admin/settings'));
            exit;
           } else {
                $new_password =  base64_encode($npassword);
                $data = array(
                   'password' => $new_password
                );
               $result =  $this->adminmodel->update_password($data,$username,$password);
               if($result == true){
				   $this->session->set_flashdata('change_password','<span class="msg-overlay text-success">Password has been changed succesfully</span>');
				   redirect(base_url('admin/settings'));
			   } else{
				   $this->session->set_flashdata('change_password','<span class="msg-overlay text-danger">Something went wrong, please try later</span>');
				   redirect(base_url('admin/settings'));
			   }
           }
        }
	
	public function change_email()
		{
		   $username = $this->session->userdata('admin_username');
		   $email = $this->input->post('email');
			
			$data = array(
			   'email' => $email
			);
		   $result =  $this->adminmodel->update_password($data,$username,$email);
			   if($result == true){
				   $this->session->set_flashdata('change_email','<span class="msg-overlay text-success">Email has been changed succesfully</span>');
				   redirect(base_url('admin/settings'));
			   } else{
				   $this->session->set_flashdata('change_email','<span class="msg-overlay text-danger">Something went wrong, please try later</span>');
				   redirect(base_url('admin/settings'));
			   }
	   }	
	
	public function logout()
	{
		$this->session->unset_userdata('admin_login');
		redirect(base_url('admin'));
	}
}
