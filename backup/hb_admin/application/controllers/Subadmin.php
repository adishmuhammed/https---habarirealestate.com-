<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subadmin extends CI_Controller 
{
	
     function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('UserModel');

	}
	
		public function index()
	{
		if(!($this->session->userdata('userLogin')))
			{

				redirect('UserController/index');
			}

		$con="( re_delete=0 AND re_userlvl=2)";
		$subadminList=$this->UserModel->select3('re_user',$con);
		$data["list"]= $subadminList;
		// var_dump($subadminList->num_rows()); exit;
		// redirect('UserController/viewCategory');


		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('subadmin/list',$data);
		$this->load->view('layout/footer');
	}
	 
	public function addsubadmin()
	{

		if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$id=$this->input->post('id');

		$this->form_validation->set_rules('name', 'Name', 'required');
        if(empty($id)){
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[re_user.re_email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
            
        }
		if ($this->form_validation->run() == FALSE)
	    {
	    	if(empty($id))
            {
				$this->load->view('layout/header');
				$this->load->view('layout/sidebar');
				$this->load->view('subadmin/add');
				$this->load->view('layout/footer');
			}
            else
            {
             	redirect('Subadmin/addsubadmin/'.$id);	
            }
		}
		else
		{
		    
		    	$name = $this->input->post('name');
				$email = $this->input->post('email');
				$mobile = $this->input->post('mobile');
				$pass = $this->input->post('password');
				$cpassword = $this->input->post('cpassword');
				
		
                if($pass!="")
                {
                	$data=array(
						"re_username" =>$name,
						"re_pswd"=>md5($pass),
						"re_email" => $email,
						"re_mobile"=>$mobile,
						"re_userlvl" =>2
					);
                }
                else
                {
                    $cond="(re_id='$id')";
            		$login=$this->UserModel->select2('re_user',$cond);
            		//print_r($login); 
            		//echo $login['re_pswd']; die;
                    $pswd = $login['re_pswd'];
                    
                	$data=array(
                	    "re_username" =>$name,
						"re_pswd"=>$pswd,
						"re_email" => $email,
						"re_mobile"=>$mobile
						
					);
                }
			if(empty($id))
            {
				$insertid=$this->UserModel->insert('re_user',$data);
				if(!empty($insertid))
	            {
					$this->session->set_flashdata('status','successfully added ');
					           redirect('Subadmin', 'refresh');

				}
				else
				{
					$this->session->set_flashdata('errorstatus','something went wrong please try again');
				}
				redirect('Subadmin/addsubadmin');
       		}
       		else
       		{
       			$cond="(re_id=".$id.")";
                $afectedrow=$this->UserModel->updatedata('re_user',$data,$cond);
                //affectedrow 

                if(!empty($afectedrow))
                {
				$this->session->set_flashdata('status','successfully updated');
				}
				else
				{
					$this->session->set_flashdata('errorstatus','something went wrong please try again');
				}
				redirect('Subadmin/subadminEdit/'.$id);
       		}
		}
	}



 public function subadminStatus($status,$id)
	{
	 	// var_dump($id); exit;
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
						're_status'=>$status
					
					   );
			$cond="(re_id=".$id.")";
			$this->UserModel->updatedata('re_user',$data,$cond);
			redirect('Subadmin');

	}

	  public function subadminDelete($id="")
	 {
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
					're_delete'=>1
				);
			$cond="(re_id=".$id.")";
			$this->UserModel->updatedata('re_user',$data,$cond);
			redirect('Subadmin');
	 }
	 public function subadminEdit($eId="")
	 {
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}

			$cond="(re_id=".$eId.")";
			$data['subadminDetails']= $subadminDetails = $this->UserModel->select2('re_user',$cond);
			//print_r($subadminDetails);die;
			    $this->load->view('layout/header');
		        $this->load->view('layout/sidebar');	
				$this->load->view('subadmin/add',$data);
				$this->load->view('layout/footer');
	 }
}
