<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller 
{
	
     function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('UserModel');

	}
	 
		public function addbanner()
	{

		if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			
		
	   
		
		if($this->input->post()){
			$id=$this->input->post('id');
           

		    $newfilename1 =NULL;
				if(!empty($_FILES['image']['name']))
				{
					$ext=pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
					$this->load->helper("url");
					$basepath =  "../uploads/upimage/";
						
					//length random number

		 			$randomnumber = rand(123456,654321);
	 				$newfilename1 = $randomnumber . "." . $ext ;          
					$target_path1 = $basepath . $newfilename1 ;             

	               	if (move_uploaded_file($_FILES['image']['tmp_name'],$target_path1))
					{
						
					}
					if(!empty($id))
                	{
                		//old images
	                    $old_image = $this->input->post("old_image");
		                if($old_image != "")
		                {
		                    $image_url = "../uploads/upimage/".$old_image;
		                        
		                    unlink($image_url);
	                        
	                    }
                	}
				}
				else
				{
	                    $newfilename1 = $this->input->post("old_image");

				}
		    
		    
		    
		    
			$data=array
			(
				'image'=>$newfilename1,
				'url'=>$this->input->post('url'),
			);
			if(empty($id))
            {
				$insertid=$this->UserModel->insert('re_banner',$data);
				if(!empty($insertid))
	            {
					$this->session->set_flashdata('status','successfully added ');
				}
				else
				{
					$this->session->set_flashdata('errorstatus','something went wrong please try again');
				}
				redirect('Banner/addbanner');
       		}
       		else
       		{
       			$cond="(id=".$id.")";
                $afectedrow=$this->UserModel->updatedata('re_banner',$data,$cond);
                //affectedrow 

                if(!empty($afectedrow))
                {
				$this->session->set_flashdata('status','successfully updated');
				}
				else
				{
					$this->session->set_flashdata('errorstatus','something went wrong please try again');
				}
				redirect('Banner/bannerEdit/'.$id);
       		}
		}
		
     	else	 {
	    	if(empty($id))
            {
				$this->load->view('layout/header');
				$this->load->view('layout/sidebar');
				$this->load->view('banner');
				$this->load->view('layout/footer');
			}
            else
            {
             	redirect('Banner/addbanner/'.$id);	
            }
		}
	}



	public function bannerList()
	{
		if(!($this->session->userdata('userLogin')))
			{

				redirect('UserController/index');
			}

		$con="(delete=0)";
		$bannerList=$this->UserModel->select3('re_banner',$con);
		$data["list"]= $bannerList;
		// var_dump($bannerList->num_rows()); exit;
		// redirect('UserController/viewCategory');


		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('bannerList',$data);
		$this->load->view('layout/footer');
	}
 public function testStatus($status,$id)
	{
	 	// var_dump($id); exit;
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
						'status'=>$status
					
					   );
			$cond="(id=".$id.")";
			$this->UserModel->updatedata('re_banner',$data,$cond);
			redirect('Banner/bannerList');

	}

	  public function bannerDelete($id="")
	 {
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
					'delete'=>1
				);
			$cond="(id=".$id.")";
			$this->UserModel->updatedata('re_banner',$data,$cond);
			redirect('Banner/bannerList');
	 }
	 public function bannerEdit($eId="")
	 {
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}

			$cond="(id=".$eId.")";
			$data['bannerDetails']= $bannerDetails = $this->UserModel->select2('re_banner',$cond);
			//print_r($bannerDetails);die;
			    $this->load->view('layout/header');
		        $this->load->view('layout/sidebar');	
				$this->load->view('banner',$data);
				$this->load->view('layout/footer');
	 }
}
