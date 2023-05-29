<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TypeController extends CI_Controller 
{
	
     function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('UserModel');

	}
	public function addType()
	{

		if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$cId=$this->input->post('cId');

		$this->form_validation->set_rules('re_typename', 'Name', 'required');
		$this->form_validation->set_rules('re_typename_arb', 'ArabicName', 'required');
		$this->form_validation->set_rules('re_typecode', 'Code', 'required');
		$this->form_validation->set_rules('re_typeslug', 'Slug', 'required');
		$this->form_validation->set_rules('re_typeorder', 'Order', 'required');
		if ($this->form_validation->run() == FALSE)
	    {
	    	if(empty($cId))
            {

				$this->load->view('layout/header');
				$this->load->view('layout/sidebar');
				$this->load->view('type');
				$this->load->view('layout/footer');
			}
			else
			{
				redirect('TypeController/typeEdit/'.$cId);
			}


	    }
	    else
	    {
	    	$data=array
			(
				're_typename'=>$this->input->post('re_typename'),
				're_typename_arb'=>$this->input->post('re_typename_arb'),
				're_typecode'=>$this->input->post('re_typecode'),
				're_typeslug'=>$this->input->post('re_typeslug'),
				're_typeorder'=>$this->input->post('re_typeorder'),

			);
			if(empty($cId))
            {
				$insertid=$this->UserModel->insert('re_type',$data);

					if(!empty($insertid))
		            {
						$this->session->set_flashdata('status','successfully added 1 category');
					}
					else
					{
						$this->session->set_flashdata('errorstatus','something went wrong please try again');
					}
					redirect('TypeController/addType');
			}
			else
			{
				 $cond="(re_typeid=".$cId.")";
	                $afectedrow=$this->UserModel->updatedata('re_type',$data,$cond);
	                //affectedrow 

	                if(!empty($afectedrow))
	                {
					$this->session->set_flashdata('status','successfully updated');
					}
					else
					{
						$this->session->set_flashdata('errorstatus','something went wrong please try again');
					}
					redirect('TypeController/typeEdit/'.$cId);
			}

	    }
	}
	public function viewType()
	{
		if(!($this->session->userdata('userLogin')))
			{

				redirect('UserController/index');
			}
			$con="(re_typedelete=0)";
			$data["typeList"]=$typingList=$this->UserModel->select1('re_type',$con);
			// var_dump($featureList->num_rows()); exit;
			// redirect('UserController/viewCategory');


			$this->load->view('layout/header');
			$this->load->view('layout/sidebar');
			$this->load->view('typeList',$data);
			$this->load->view('layout/footer');
	}
	public function typeActivate($cId="")
	 {
	 	// var_dump($cId); exit;
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
					're_typestatus'=>1
				);
				$cond="(re_typeid=".$cId.")";
			    $this->UserModel->updatedata('re_type',$data,$cond);
			    redirect('TypeController/viewType');

	 }
	 public function typeDeactivate($cId="")
	 {
	 	// var_dump($cId); exit;
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
					're_typestatus'=>0
				);
				$cond="(re_typeid`=".$cId.")";
			    $this->UserModel->updatedata('re_type',$data,$cond);
			    redirect('TypeController/viewType');

	 }
	 public function typeDelete($id="")
	 {
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
					're_typedelete'=>1
				);
			$cond="(re_typeid=".$id.")";
			$this->UserModel->updatedata('re_type',$data,$cond);
			redirect('TypeController/viewType');
	 }
public function typeEdit($eId="")
	 {
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}

			$cond="(re_typeid=".$eId.")";
			$data['typeDetails']=$this->UserModel->select2('re_type',$cond);
			//print_r($typeDetails);
			    $this->load->view('layout/header');
		        $this->load->view('layout/sidebar');	
				$this->load->view('type',$data);
				$this->load->view('layout/footer');
	 }
	

}