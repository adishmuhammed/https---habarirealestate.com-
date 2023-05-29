<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FeatureController extends CI_Controller 
{
	
     function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('UserModel');

	}
	 
	public function addFeature()
	{

		if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$cId=$this->input->post('cId');

		$this->form_validation->set_rules('re_featuretitle', 'Name', 'required');
		$this->form_validation->set_rules('re_featuretitle_arb', 'ArabicName', 'required');
		$this->form_validation->set_rules('re_featureicon', 'Icon', 'required');
		if ($this->form_validation->run() == FALSE)
	    {
	    	if(empty($cId))
            {
				$this->load->view('layout/header');
				$this->load->view('layout/sidebar');
				$this->load->view('feature');
				$this->load->view('layout/footer');
			}
            else
            {
             	redirect('FeatureController/addFeature/'.$cId);	
            }
		}
		else
		{
			$data=array
			(
				're_featuretitle'=>$this->input->post('re_featuretitle'),
				're_featuretitle_arb'=>$this->input->post('re_featuretitle_arb'),
				're_featureicon'=>$this->input->post('re_featureicon'),
			);
			if(empty($cId))
            {
				$insertid=$this->UserModel->insert('re_features',$data);
				if(!empty($insertid))
	            {
					$this->session->set_flashdata('status','successfully added 1 category');
				}
				else
				{
					$this->session->set_flashdata('errorstatus','something went wrong please try again');
				}
				redirect('FeatureController/addFeature');
       		}
       		else
       		{
       			$cond="(re_featureid=".$cId.")";
                $afectedrow=$this->UserModel->updatedata('re_features',$data,$cond);
                //affectedrow 

                if(!empty($afectedrow))
                {
				$this->session->set_flashdata('status','successfully updated');
				}
				else
				{
					$this->session->set_flashdata('errorstatus','something went wrong please try again');
				}
				redirect('FeatureController/featureEdit/'.$cId);
       		}
		}
	}


	public function viewFeature()
	{
		if(!($this->session->userdata('userLogin')))
			{

				redirect('UserController/index');
			}

		$con="(re_featuredelete=0)";
		$data["fList"]=$featureList=$this->UserModel->select1('re_features',$con);
		// var_dump($featureList->num_rows()); exit;
		// redirect('UserController/viewCategory');


		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('featureList',$data);
		$this->load->view('layout/footer');
	}
	public function featureActivate($cId="")
	 {
	 	// var_dump($cId); exit;
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
					're_featurestatus'=>1
				);
				$cond="(re_featureid=".$cId.")";
			    $this->UserModel->updatedata('re_features',$data,$cond);
			    redirect('FeatureController/viewFeature');

	 }
	 public function featureDeactivate($cId="")
	 {
	 	// var_dump($cId); exit;
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
					're_featurestatus'=>0
				);
				$cond="(re_featureid=".$cId.")";
			    $this->UserModel->updatedata('re_features',$data,$cond);
			    redirect('FeatureController/viewFeature');

	 }

	  public function featureDelete($id="")
	 {
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
					're_featuredelete'=>1
				);
			$cond="(re_featureid=".$id.")";
			$this->UserModel->updatedata('re_features',$data,$cond);
			redirect('FeatureController/viewFeature');
	 }
	 public function featureEdit($eId="")
	 {
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}

			$cond="(re_featureid=".$eId.")";
			$data['featureDetails']= $featureDetails = $this->UserModel->select2('re_features',$cond);
			//print_r($featureDetails);die;
			    $this->load->view('layout/header');
		        $this->load->view('layout/sidebar');	
				$this->load->view('feature',$data);
				$this->load->view('layout/footer');
	 }
}
