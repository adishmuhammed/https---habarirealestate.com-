<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller 
{
	
     function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('UserModel');

	}
	 
	public function addtestimonial()
	{

		if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$id=$this->input->post('id');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');
		if ($this->form_validation->run() == FALSE)
	    {
	    	if(empty($id))
            {
				$this->load->view('layout/header');
				$this->load->view('layout/sidebar');
				$this->load->view('testimonial');
				$this->load->view('layout/footer');
			}
            else
            {
             	redirect('Testimonial/addtestimonial/'.$id);	
            }
		}
		else
		{
			$data=array
			(
				're_testname'=>$this->input->post('name'),
				're_testcontent'=>$this->input->post('content'),
			);
			if(empty($id))
            {
				$insertid=$this->UserModel->insert('re_testimonial',$data);
				if(!empty($insertid))
	            {
					$this->session->set_flashdata('status','successfully added ');
				}
				else
				{
					$this->session->set_flashdata('errorstatus','something went wrong please try again');
				}
				redirect('Testimonial/addtestimonial');
       		}
       		else
       		{
       			$cond="(re_testid=".$id.")";
                $afectedrow=$this->UserModel->updatedata('re_testimonial',$data,$cond);
                //affectedrow 

                if(!empty($afectedrow))
                {
				$this->session->set_flashdata('status','successfully updated');
				}
				else
				{
					$this->session->set_flashdata('errorstatus','something went wrong please try again');
				}
				redirect('Testimonial/testimonialEdit/'.$id);
       		}
		}
	}


	public function testimonialList()
	{
		if(!($this->session->userdata('userLogin')))
			{

				redirect('UserController/index');
			}

		$con="(re_testdelete=0)";
		$testimonialList=$this->UserModel->select3('re_testimonial',$con);
		$data["list"]= $testimonialList;
		// var_dump($testimonialList->num_rows()); exit;
		// redirect('UserController/viewCategory');


		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('testimonialList',$data);
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
						're_status'=>$status
					
					   );
			$cond="(re_id=".$id.")";
			$this->UserModel->updatedata('re_testimonial',$data,$cond);
			redirect('Testimonial/testimonialList');

	}

	  public function testimonialDelete($id="")
	 {
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
					're_testdelete'=>1
				);
			$cond="(re_testid=".$id.")";
			$this->UserModel->updatedata('re_testimonial',$data,$cond);
			redirect('Testimonial/testimonialList');
	 }
	 public function testimonialEdit($eId="")
	 {
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}

			$cond="(re_testid=".$eId.")";
			$data['testimonialDetails']= $testimonialDetails = $this->UserModel->select2('re_testimonial',$cond);
			//print_r($testimonialDetails);die;
			    $this->load->view('layout/header');
		        $this->load->view('layout/sidebar');	
				$this->load->view('testimonial',$data);
				$this->load->view('layout/footer');
	 }
}
