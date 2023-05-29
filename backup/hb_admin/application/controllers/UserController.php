<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller 
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
		if($this->session->userdata('userLogin'))
		{
			redirect('UserController/dashboard');
		}

		$this->form_validation->set_rules('re_email', 'Email', 'required');
		$this->form_validation->set_rules('re_pswd', 'Password', 'required');
		// $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
        {
          
            $this->load->view('adminLogin'); 	

        }
        else
        {    
            $data=array(
            're_email'=>$this->input->post('re_email'),
            're_pswd'=>md5($this->input->post('re_pswd')),
            );
            $user=new UserModel;
            $result=$user->loginUser($data);
            if($result!=FALSE)
            {
            	$userdetails=[
            	    're_id' => $result->re_id,
            		're_username'=>$result->re_username,
            		're_email'=>$result->re_email,
            		're_userlvl'=>$result->re_userlvl,
            	];
            	$this->session->set_userdata('userLogin',$userdetails);
            	// redirect(base_url('sucess'));
            	//redirect('UserController/addCategory');
            	redirect('UserController/dashboard');
            }
            else
            {  
            	$this->session->set_flashdata('status','invalid EmailId or password');
            	$this->load->view('adminLogin');
            }
     }
        

	}
	public function dashboard()
	{
		if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			
			    $con="(pro_delete=0)";
			    $property=$this->UserModel->count('re_property',$con);
			    
			    $con="(pro_delete=0 AND availability=0)";
			    $sold=$this->UserModel->count('re_property',$con);
			    
			    $con="(pro_delete=0 AND approve_status= 'NULL' AND user_level = 4)";
			    $approve=$this->UserModel->count('re_property',$con);
			    
			    $con="(re_userlvl=4)";
			    $users=$this->UserModel->count('re_user',$con);
			    
			    $con="(pro_delete=0)";
			    $con2="(re_property.re_typeid=re_type.re_typeid)";
			    $propertyList=$this->UserModel->selectjoin3('re_property','re_type','pro_createdat',$con,$con2);
			    
			    
			    
			    $data['property'] = $property;
			    $data['sold'] = $sold;
			    $data['approve'] = $approve;
			    $data['users'] = $users;
			    $data['propertyList'] = $propertyList;
			    
			    
			    //print_r($data);die;

				$this->load->view('layout/header');
				$this->load->view('layout/sidebar');	
				$this->load->view('dashboard',$data);
				$this->load->view('layout/footer');
	}

	public function addCategory()
	{
		if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$cId=$this->input->post('cId');

		$this->form_validation->set_rules('re_estcatname', 'Name', 'required');
		$this->form_validation->set_rules('re_estcatname_arb', 'ArabicName', 'required');
		$this->form_validation->set_rules('re_estcatdescription', 'Description', 'required');
		$this->form_validation->set_rules('re_estcatdescription_arb', 'ArabicDescription', 'required');
		// $this->form_validation->set_rules('re_estcatstatus', 'Status', 'required');
		$this->form_validation->set_rules('re_estcatorder', 'order', 'required');
		if ($this->form_validation->run() == FALSE)
	        {
	        	if(empty($cId))
                {
		        $this->load->view('layout/header');
		        $this->load->view('layout/sidebar');	
				$this->load->view('sucess');
				$this->load->view('layout/footer');
				}
                else
                {
             		redirect('UserController/categoryEdit/'.$cId);	
                }
			}
			else
			{
				$data=array(
					're_estcatname'=>$this->input->post('re_estcatname'),
					're_estcatname_arb'=>$this->input->post('re_estcatname_arb'),
					're_estcatdescription'=>$this->input->post('re_estcatdescription'),
					're_estcatdescription_arb'=>$this->input->post('re_estcatdescription_arb'),
					// 're_estcatstatus'=>$this->input->post('re_estcatstatus'),
					're_estcatorder'=>$this->input->post('re_estcatorder'),
				);
				// var_dump($data); exit;
                if(empty($cId))
                {
               		$insertid= $this->UserModel->insert('re_estcategory',$data);
               		//last insertedId

               		if(!empty($insertid))
              		{
						$this->session->set_flashdata('status','successfully added 1 category');
			   		}
			  		else
					{
						$this->session->set_flashdata('errorstatus','something went wrong please try again');
					}
					redirect('UserController/addCategory');
                }
               else
                {
	                $cond="(re_estcatid=".$cId.")";
	                $afectedrow=$this->UserModel->updatedata('re_estcategory',$data,$cond);
	                //affectedrow 

	                if(!empty($afectedrow))
	                {
					$this->session->set_flashdata('status','successfully updated');
					}
					else
					{
						$this->session->set_flashdata('errorstatus','something went wrong please try again');
					}
					redirect('UserController/categoryEdit/'.$cId);	
                }
				
			}

	}
	//listing

	public function viewCategory()
	{
		if(!($this->session->userdata('userLogin')))
			{

				redirect('UserController/index');
			}
				$con="(re_estcatdelete=0)";
				$data["categoryList"]=$categoriList=$this->UserModel->select1('re_estcategory',$con);
				// var_dump($categoriList->num_rows()); exit;
				// redirect('UserController/viewCategory');


		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('dataview',$data);
		$this->load->view('layout/footer');
	}

	//category activate function

	 public function categoryActivate($cId="")
	 {
	 	// var_dump($cId); exit;
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
					're_estcatstatus_db'=>1
				);
				$cond="(re_estcatid=".$cId.")";
			    $this->UserModel->updatedata('re_estcategory',$data,$cond);
			    redirect('UserController/viewCategory');

	 }

	 // category deactivate function

	 public function categoryDeactivate($cId="")
	 {
	 	// var_dump($cId); exit;
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
					're_estcatstatus_db'=>0
				);
				$cond="(re_estcatid=".$cId.")";
			    $this->UserModel->updatedata('re_estcategory',$data,$cond);
			    redirect('UserController/viewCategory');

	 }
	 //category delete function

	  public function categoryDelete($id="")
	 {
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
					're_estcatdelete'=>1
				);
			$cond="(re_estcatid=".$id.")";
			$this->UserModel->updatedata('re_estcategory',$data,$cond);
			redirect('UserController/viewCategory');
	 }

	 //edit function

	 public function categoryEdit($eId="")
	 {
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}

			$cond="(re_estcatid=".$eId.")";
			$data['catDetails']=$this->UserModel->select2('re_estcategory',$cond);
			    $this->load->view('layout/header');
		        $this->load->view('layout/sidebar');	
				$this->load->view('sucess',$data);
				$this->load->view('layout/footer');
	 }
	 
	 public function usersList()
	 {
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}

			$cond="(re_userlvl=4)";
		       $list =$this->UserModel->select3('re_user',$cond);
		       	$data['dataList'] = $list;
			    $this->load->view('layout/header');
		        $this->load->view('layout/sidebar');	
				$this->load->view('users',$data);
				$this->load->view('layout/footer');
	 }
	 
	 public function userStatus($status,$id)
	{
	 	// var_dump($cId); exit;
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
						're_status'=>$status
					
					   );
			$cond="(re_id=".$id.")";
			$this->UserModel->updatedata('re_user',$data,$cond);
			redirect('UserController/usersList');

	}

	

	function logout()
	{    
     	$this->session->unset_userdata('userLogin');
     	$this->session->sess_destroy();
	 	redirect('UserController/index','refresh');
	}	

}
