<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FacilityController extends CI_Controller 
{
	
     function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('UserModel');

	}
	public function addFacility()
	{
		if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}

		$cId=$this->input->post('cId');

		$this->form_validation->set_rules('re_facilityname', 'Name', 'required');
		$this->form_validation->set_rules('re_facilityname_arb', 'ArabicName', 'required');
		$this->form_validation->set_rules('re_facilityicon', 'Icon', 'required');
		if ($this->form_validation->run() == FALSE)
	    {
	    	if(empty($cId))
            {
			$this->load->view('layout/header');
			$this->load->view('layout/sidebar');
			$this->load->view('facility');
			$this->load->view('layout/footer');
			}
            else
            {
             	redirect('FacilityController/addFacility/'.$cId);	
            }
		}
		else
		{
			$data=array
			(
				're_facilityname'=>$this->input->post('re_facilityname'),
				're_facilityname_arb'=>$this->input->post('re_facilityname_arb'),
				're_facilityicon'=>$this->input->post('re_facilityicon'),
			);
			if(empty($cId))
			{


				$insertid=$this->UserModel->insert('re_facility',$data);

					if(!empty($insertid))
		            {
						$this->session->set_flashdata('status','successfully added 1 category');
					}
					else
					{
						$this->session->set_flashdata('errorstatus','something went wrong please try again');
					}
					redirect('FacilityController/addFacility');
			}
			else
       		{
       			$cond="(re_facilityid=".$cId.")";
                $afectedrow=$this->UserModel->updatedata('re_facility',$data,$cond);
                //affectedrow 

                if(!empty($afectedrow))
                {
				$this->session->set_flashdata('status','successfully updated');
				}
				else
				{
					$this->session->set_flashdata('errorstatus','something went wrong please try again');
				}
				redirect('FacilityController/facilityEdit/'.$cId);
       		}

		}
	}
	public function viewFacility()
	{
		if(!($this->session->userdata('userLogin')))
			{

				redirect('UserController/index');
			}
			$con="(re_facilitydelete=0)";
			$data["facilityList"]=$facilitiList=$this->UserModel->select1('re_facility',$con);
			// var_dump($featureList->num_rows()); exit;
			// redirect('UserController/viewCategory');


			$this->load->view('layout/header');
			$this->load->view('layout/sidebar');
			$this->load->view('facilityList',$data);
			$this->load->view('layout/footer');
	}
	public function facilityActivate($cId="")
	 {
	 	// var_dump($cId); exit;
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
					're_facilitystatus'=>1
				);
				$cond="(re_facilityid=".$cId.")";
			    $this->UserModel->updatedata('re_facility',$data,$cond);
			    redirect('FacilityController/viewFacility');

	 }
	 public function facilityDeactivate($cId="")
	 {
	 	// var_dump($cId); exit;
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
					're_facilitystatus'=>0
				);
				$cond="(re_facilityid=".$cId.")";
			    $this->UserModel->updatedata('re_facility',$data,$cond);
			    redirect('FacilityController/viewFacility');

	 }
	 public function facilityDelete($id="")
	 {
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
					're_facilitydelete'=>1
				);
			$cond="(re_facilityid=".$id.")";
			$this->UserModel->updatedata('re_facility',$data,$cond);
			redirect('FacilityController/viewFacility');
	 }
	 public function facilityEdit($eId="")
	 {
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}

			$cond="(re_facilityid=".$eId.")";
			$data['facilityDetails']=$this->UserModel->select2('re_facility',$cond);
			//print_r($facilityDetails);
			    $this->load->view('layout/header');
		        $this->load->view('layout/sidebar');	
				$this->load->view('facility',$data);
				$this->load->view('layout/footer');
	 }
	
}
	 