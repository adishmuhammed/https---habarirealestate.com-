<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		// $this->load->library('form_validation');
		$this->load->model('LoginModel');
		$this->load->model('site_model');
		if($this->session->userdata('language')==FALSE)
		{
			$lang='en';
			$this->session->set_userdata('language',$lang);

		}
		
	}

	 public function index()
	{
		
		
		$limit=10;
		$con="(pro_delete=0 AND availability=1)";
		$data["propertyList"]=$pList=$this->LoginModel->limit('re_property',$con,$limit);
		
		$data["cityList"]=$this->LoginModel->select('re_city');

		
		$con="(pro_delete=0 AND availability=1 AND featured=1)";
		$data["featuredList"]=$pList=$this->LoginModel->select3('re_property',$con);
		
		$con="(pro_delete=0 AND availability=1 AND re_typeid=2)";
		$rent=$this->LoginModel->count('re_property',$con);
		
		$con="(pro_delete=0 AND availability=1 AND re_typeid=1)";
		$sale=$this->LoginModel->count('re_property',$con);
		
		$con="(pro_delete=0 AND availability=1 AND re_typeid=3)";
		$lease=$this->LoginModel->count('re_property',$con);
		
		$con="(pro_delete=0 AND availability=1 AND re_estcatid=19)";
		$camp=$this->LoginModel->count('re_property',$con);
		
		$con="(re_testdelete=0 AND re_teststatus=1 )";
		$test=$this->LoginModel->select3('re_testimonial',$con);
		
		$con="(delete=0 AND status=1 )";
		$banner=$this->LoginModel->select3('re_banner',$con);

        $data["test"] = $test;
        $data["banner"] = $banner;
        $data["rent"] = $rent;
        $data["sale"] = $sale;
        $data["lease"] = $lease;
        $data["camp"] = $camp;
		$lang=$this->session->userdata('language');
			if($lang=='en')
			{

				$this->load->view('layout/header');
				$this->load->view('layout/menu2');
				$this->load->view('home/index',$data);
				$this->load->view('layout/footer');
			}
			else
			{
				$this->load->view('arb/layout/header');
				$this->load->view('arb/layout/menu2');
				$this->load->view('arb/home/index',$data);
				$this->load->view('arb/layout/footer');	
			}
		
	}
	

	public function menu()
	{
		
		$con="(pro_delete=0 AND availability=1 AND pro_status=1 AND approve_status=1)";
		$data["propertyList"]=$pList=$this->LoginModel->select3('re_property',$con);
		$lang=$this->session->userdata('language');
		if($lang=='en')
		{

			$this->load->view('layout/header');
			$this->load->view('layout/menu2');
			$this->load->view('properties/list',$data);
			$this->load->view('layout/footer');
		}
		else
		{
			$this->load->view('arb/layout/header');
			$this->load->view('arb/layout/menu2');
			$this->load->view('arb/properties/list',$data);
			$this->load->view('arb/layout/footer');
		}
		
	}
	
	public function about()
	{
		
	
		$lang=$this->session->userdata('language');
		if($lang=='en')
		{


			$this->load->view('layout/header');
			$this->load->view('layout/menu2');
			$this->load->view('home/about');
			$this->load->view('layout/footer');
		}
		else
		{
			$this->load->view('arb/layout/header');
			$this->load->view('arb/layout/menu2');
			$this->load->view('arb/home/about');
			$this->load->view('arb/layout/footer');
		}
		
	}
	
	public function contact()
	{
	    if($this->input->post())
    	{
             
    	   
    		$datalist = array(

    			"name" => $this->input->post('name'),
    			"email" => $this->input->post('email'),
    			"phone" => $this->input->post('phone'),
    		
    			"msg" => $this->input->post('msg'),
    			
    		);
    	

                          $subject = "Contact";
                          $message=$this->load->view("home/email",$datalist, TRUE);
                          
						  $from="noreply@habari.com";
						  $to = "m@masrooh.com";
						  $this->sendMail($from,$to,$message,$subject);
		  $this->session->set_flashdata('feedback', 'Message Sent Succesfully');
				 		
           redirect('/LoginController/contact', 'refresh');
    	}
		
	  else {
		$lang=$this->session->userdata('language');
		if($lang=='en')
		{


			$this->load->view('layout/header');
			$this->load->view('layout/menu2');
			$this->load->view('home/contact');
			$this->load->view('layout/footer');
		}
		else
		{
			$this->load->view('arb/layout/header');
			$this->load->view('arb/layout/menu2');
			$this->load->view('arb/home/contact');
			$this->load->view('arb/layout/footer');
		}
	  }
		
	}
	
	public function service()
	{
		
	
		$lang=$this->session->userdata('language');
		if($lang=='en')
		{


			$this->load->view('layout/header');
			$this->load->view('layout/menu2');
			$this->load->view('home/service');
			$this->load->view('layout/footer');
		}
		else
		{
			$this->load->view('arb/layout/header');
			$this->load->view('arb/layout/menu2');
			$this->load->view('arb/home/service');
			$this->load->view('arb/layout/footer');
		}
		
	}
	
	public function privacy()
	{
		
	
		$lang=$this->session->userdata('language');
		if($lang=='en')
		{


			$this->load->view('layout/header');
			$this->load->view('layout/menu2');
			$this->load->view('home/privacy');
			$this->load->view('layout/footer');
		}
		else
		{
			$this->load->view('arb/layout/header');
			$this->load->view('arb/layout/menu2');
			$this->load->view('arb/home/privacy');
			$this->load->view('arb/layout/footer');
		}
		
	}
	
	public function terms()
	{
		
	
		$lang=$this->session->userdata('language');
		if($lang=='en')
		{


			$this->load->view('layout/header');
			$this->load->view('layout/menu2');
			$this->load->view('home/terms');
			$this->load->view('layout/footer');
		}
		else
		{
			$this->load->view('arb/layout/header');
			$this->load->view('arb/layout/menu2');
			$this->load->view('arb/home/terms');
			$this->load->view('arb/layout/footer');
		}
		
	}
	
	public function details($eId="")
	{
		$con="(re_typedelete=0)";
		$data["typeList"]=$typingList=$this->LoginModel->select3('re_type',$con);
		$cond="(pro_id=".$eId.")";
		$data["propertyList"]=$pList=$this->LoginModel->select1('re_property',$cond);
		$con="(re_featuredelete=0)";
		$data["fList"]=$featureList=$this->LoginModel->select3('re_features',$con);

		$data['multiDetails']=$this->LoginModel->select1('re_multiple',$cond);

		$con="(pro_delete=0 AND availability=1)";
		$limit=4;
		$data["propertyList1"]=$pList=$this->LoginModel->limit('re_property',$con,$limit);

		$lang=$this->session->userdata('language');
		if($lang=='en')
		{


			$this->load->view('layout/header');
			$this->load->view('layout/menu2');
			$this->load->view('properties/details',$data);
			$this->load->view('layout/footer');
		}
		else
		{
			$this->load->view('arb/layout/header');
			$this->load->view('arb/layout/menu2');
			$this->load->view('arb/properties/details',$data);
			$this->load->view('arb/layout/footer');
		}
	}
	
	public function add_property()
    {
        if(!($this->session->userdata('hb_user')))
			{

				redirect('LoginController/login');
			}
    	if($this->input->post())
    	{
            $id = $this->input->post('id');

    	   $feature_id = implode(",",$this->input->post('features'));
    	   $facilities_id = implode(",",$this->input->post('aminities'));
    	   $multi_images=array();
				if($_FILES['images']['name'][0] != "")//multiple image
				{

					$file_count=sizeof($_FILES['images']['name']);
					for($i=0;$i<$file_count;$i++)
					{
						$ext=pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION);
						$this->load->helper("url");
						$basepath =  "./uploads/upimage/"; 
						$randomnumber = rand(123456,654321);
						$newfilename2 = $randomnumber . "." . $ext ;          
						$target_path1 = $basepath . $newfilename2 ; 

						// ????

						//$newfilename2=$newfilename2;
						if (move_uploaded_file($_FILES['images']['tmp_name'][$i],$target_path1))
						{

						}
						    
							$name['image_name']=$newfilename2;
		                    $multi_images[] =$name;

					}
					
				
					//var_dump($multi_images); exit;
					//edit feature image

	                
                 if($this->input->post("old_multiimage") != ""){
                   // var_dump($this->input->post("old_multi_image"));
                   $old_multi = explode(",", $this->input->post("old_multiimage"));
                    $count_imgs1=count($old_multi);
                    for ($i=0; $i < $count_imgs1; $i++)
                    {
                        $name['image_name']=$old_multi[$i];
                        $multi_images[] =$name;
                    }
                }
                	
            	}
            	else{
				     $newfilename2 = $this->input->post('old_proimage');
					if($this->input->post("old_multiimage") != ""){
					    
				$old_multi = explode(",", $this->input->post("old_multiimage"));
				
                    $count_imgs1=count($old_multi);
                    for ($i=0; $i < $count_imgs1; $i++)
                    {
                        $name['image_name']=$old_multi[$i];
                        $multi_images[] =$name;
                    }                    
                    
					}else{
						$multi_images=array();
					}
			}
			
			$multi_image=json_encode($multi_images);
            	  
            $user = $this->session->userdata('hb_user');    
    		$data = array(
                "user_id" => $user['id'],
    			"pro_title" => $this->input->post('name'),
    			"re_typeid" => $this->input->post('type'),
    			"property_type" => $this->input->post('ptype'),
    			"re_estcatid" => $this->input->post('category'),
    			"pro_description" => $this->input->post('description'),
    			"re_facilityid" => $facilities_id,
    			"re_featureid" => $feature_id,
    			"city_id" =>$this->input->post('location'),
    			"pro_latitude" =>$this->input->post('latitude'),
    			"pro_longitude" =>$this->input->post('longitude'),
    			"pro_bedroom" => $this->input->post('bedroom'),
    			"pro_bathroom" => $this->input->post('bathroom'),
    			"pro_floor" => $this->input->post('floor'),
    			"pro_square" => $this->input->post('square'),
    			"pro_image" => $newfilename2,
                "multi_image" => $multi_image,
    			"contact" =>$this->input->post('contact'),
    			"pro_price" =>$this->input->post('price'),
                "pro_status" => 0,
                "user_level" =>4
    		);
    		
    		if(empty($id))
         {
    		$insertid= $this->site_model->insert('re_property',$data);
          // echo $this->db->last_query(); die;
                             $this->session->set_flashdata('response', 'Added');
         }
         
         else {
                      
                $con = "(pro_id=".$id.")";
                $this->LoginModel->updatedata('re_property',$data,$con);
                $this->session->set_flashdata('response', 'Updated');
           }

           redirect('/LoginController/property_list', 'refresh');
    	}
    	else
    	{
    	$con="(re_estcatdelete=0)";
		$data["categoryList"]=$categoriList=$this->LoginModel->select3('re_estcategory',$con);

	    $con="(re_typedelete=0)";
		$data["typeList"]=$typingList=$this->LoginModel->select3('re_type',$con);

		$con="(re_facilitydelete=0)";
		$data["facilityList"]=$facilitiList=$this->LoginModel->select3('re_facility',$con);

		$con="(re_featuredelete=0)";
		$data["fList"]=$featureList=$this->LoginModel->select3('re_features',$con);

		$data["countryList"]=$this->site_model->select('re_country');

		$data["cityList"]=$this->LoginModel->select('re_city');

    	  $lang=$this->session->userdata('language');
		if($lang=='en')
		{


			$this->load->view('layout/header');
			$this->load->view('layout/menu2');
			$this->load->view('properties/add-property',$data);
			$this->load->view('layout/footer');
		}
		else
		{
			$this->load->view('arb/layout/header');
			$this->load->view('arb/layout/menu2');
			$this->load->view('arb/properties/add-property',$data);
			$this->load->view('arb/layout/footer');
		}
    	}
    }
    
    public function property_list()
    {
        
        if(!($this->session->userdata('hb_user')))
			{

				redirect('LoginController/login');
			}
			  $user = $this->session->userdata('hb_user'); 
			  $cond="(re_id=".$user['id'].")";
			 $datalist = $this->LoginModel->select2('re_user',$cond);
			  
			  
				$con="(pro_delete=0 AND availability=1 AND user_id=".$user['id'].")";
		
				$pList=$this->LoginModel->select3('re_property',$con);
				
				$data["propertyList"]=$pList;
				$data['userdetails'] = $datalist;
        $lang=$this->session->userdata('language');
		if($lang=='en')
		{


			$this->load->view('layout/header');
			$this->load->view('layout/menu2');
			$this->load->view('myaccount/myaccount',$data);
			$this->load->view('layout/footer');
		}
		else
		{
			$this->load->view('arb/layout/header');
			$this->load->view('arb/layout/menu2');
			$this->load->view('arb/myaccount/myaccount',$data);
			$this->load->view('arb/layout/footer');
		}
    }
    
     public function edit_property($id)
	 {
	   //  echo $id; die;
	 	if(!($this->session->userdata('hb_user')))
			{
				redirect('LoginController/login');
			}

		$con="(re_estcatdelete=0)";
		$data["categoryList"]=$categoriList=$this->LoginModel->select3('re_estcategory',$con);

	    $con="(re_typedelete=0)";
		$data["typeList"]=$typingList=$this->LoginModel->select3('re_type',$con);

		$con="(re_facilitydelete=0)";
		$data["facilityList"]=$facilitiList=$this->LoginModel->select3('re_facility',$con);

		$con="(re_featuredelete=0)";
		$data["fList"]=$featureList=$this->LoginModel->select3('re_features',$con);

		
		$data["countryList"]=$this->LoginModel->select('re_country');

		$data["cityList"]=$this->LoginModel->select('re_city');

			$cond="(pro_id=".$id.")";
			$datalist = $this->LoginModel->select2('re_property',$cond);
// 			echo $this->db->last_query();die;
			$data['datalist'] = $datalist;
			
			//SELECT MULTIPLE TABLE
			$data['multiDetails']=$this->LoginModel->select2('re_multiple',$cond);
		  $lang=$this->session->userdata('language');
		if($lang=='en')
		{


			$this->load->view('layout/header');
			$this->load->view('layout/menu2');
			$this->load->view('properties/add-property',$data);
			$this->load->view('layout/footer');
		}
		else
		{
			$this->load->view('arb/layout/header');
			$this->load->view('arb/layout/menu2');
			$this->load->view('arb/properties/add-property',$data);
			$this->load->view('arb/layout/footer');
		}
	 }
	 
	  public function delete_property($id)
	 {
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('LoginController/login');
			}
			$data=array(					
						'pro_delete'=>1
					   );
			$cond="(pro_id=".$id.")";
			$this->LoginModel->updatedata('re_property',$data,$cond);
			redirect('LoginController/property_list');

	 }
    
    public function maintenance()
    {
    	if($this->input->post())
    	{

    	   $mtype = implode(",",$this->input->post('mtype'));


    		$data = array(

    			"name" => $this->input->post('name'),
    			"email" => $this->input->post('email'),
    			"phone" => $this->input->post('phone'),
    			"type" => $this->input->post('type'),
    			"mtype" => $mtype,
    			"msg" => $this->input->post('msg'),
    			
    		);
    		$data['data'] = $data;

    		//$this->load->view("properties/email",$data);

    		

                          $subject = "Maintenance";
                          $message=$this->load->view("properties/email",$data, TRUE);

						  $from="noreply@habari.com";
						  $this->sendMail($from,$email,$message,$subject);
				 		
           redirect('/LoginController/', 'refresh');
    	}
    	else
    	{
    		$con="(re_estcatdelete=0)";
		$data["categoryList"]=$categoriList=$this->site_model->select6('re_estcategory',$con);

	    $con="(re_typedelete=0)";
		$data["typeList"]=$typingList=$this->site_model->select6('re_type',$con);

		$con="(re_facilitydelete=0)";
		$data["facilityList"]=$facilitiList=$this->site_model->select6('re_facility',$con);

		$con="(re_featuredelete=0)";
		$data["fList"]=$featureList=$this->site_model->select6('re_features',$con);

		
		$data["countryList"]=$this->site_model->select('re_country');

    	  $lang=$this->session->userdata('language');
		if($lang=='en')
		{


			$this->load->view('layout/header');
			$this->load->view('layout/menu2');
			$this->load->view('properties/maintenance',$data);
			$this->load->view('layout/footer');
		}
		else
		{
			$this->load->view('arb/layout/header');
			$this->load->view('arb/layout/menu2');
			$this->load->view('arb/properties/maintenance',$data);
			$this->load->view('arb/layout/footer');
		}
    	}
    }
	
	
	function guest()
	{
		$id=rand(123,9999).date('yHs');
        //$id="Bq".uniqid();
		return $id;
	}
	

	public function login()
	{
		if($this->session->userdata('hb_user')){ 
			$userSess=$this->session->userdata('hb_user');
			$uid = $userSess['id'];
			
		}else{
			if($this->session->userdata('hb_guest')){ 
				$userSess=$this->session->userdata('hb_guest');
				$uid = $userSess['id']; //echo $uid; exit;
				//$cond="(user_id=$uid)";
				
			}else{
				$id = $this->guest();
				$guestar = array('id'=>$id);
				$this->session->set_userdata('hb_guest',$guestar);
			}
			
		}

		
        $lang = $this->session->userdata('language');
		if($lang == 'en'){
		$this->load->view('layout/header');
		$this->load->view('layout/menu2');
		$this->load->view('login/login');
		$this->load->view('layout/footer');
     	}
     	else
     	{
     		$this->load->view('arb/layout/header');
		$this->load->view('arb/layout/menu2');
		$this->load->view('arb/login/login');
		$this->load->view('arb/layout/footer');
     	}
	}
	public function signin()
	{
		//session
		if($this->session->userdata('hb_user')){ 
	    	redirect('LoginController', 'refresh');
		}else{
			if($this->session->userdata('hb_guest')){ 
				$userSess=$this->session->userdata('hb_guest');
				$uid = $userSess['id']; //echo $uid; exit;
			}else{
				$id = $this->guest();
				$guestar = array('id'=>$id);
				$this->session->set_userdata('hb_guest',$guestar);
				$userSess=$this->session->userdata('hb_guest');
			    $uid = $userSess['id']; //echo $uid; exit;
			}
		}
		//session
		$guestid=$uid;
		$email=$this->input->post('email');
		$password=md5($this->input->post('password'));
		//$token=$input_data['token'];
		//$cnid=$header['Countryid'];
		$cond="(re_email='$email' AND re_pswd='$password' AND re_status=1 )";
		$login=$this->site_model->select1('re_user',$cond);

		if(count($login) > 0){ 
			foreach($login as $log){}
			
    			$userid=$log['re_id'];
    			$username=$log['re_username'];
    			$useremail=$log['re_email'];
    		
    			
    			$guestar = array('id'=>$userid,'name'=>$username,'email'=>$useremail);
    			$this->session->set_userdata('hb_user',$guestar);
    			
    			redirect('/LoginController/', 'refresh');
			
		}else{
			$this->session->set_flashdata('error_msg', 'Wrong credentials');
			redirect('LoginController/login/', 'refresh');
			//echo 'Wrong credentials'; 
		}
	}

	public function register_view()
	{
		if($this->session->userdata('hb_user')){ 
			$userSess=$this->session->userdata('hb_user');
			$uid = $userSess['id'];
			}else{
			if($this->session->userdata('hb_guest')){ 
				$userSess=$this->session->userdata('hb_guest');
				$uid = $userSess['id']; //echo $uid; exit;
				
			}else{
				$id = $this->guest();
				$guestar = array('id'=>$id);
				$this->session->set_userdata('hb_guest',$guestar);
			}
			
		}

		
        $lang = $this->session->userdata('language');
		if($lang == 'en'){
		$this->load->view('layout/header');
		$this->load->view('layout/menu2');
		$this->load->view('login/register');
		$this->load->view('layout/footer');
	    }
	    else{
	    	$this->load->view('arb/layout/header');
		$this->load->view('arb/layout/menu2');
		$this->load->view('arb/login/register');
		$this->load->view('arb/layout/footer');
	    }
	}
		
	public function register()
	{
	    if(!empty($_POST))
	    {
			//session
			if($this->session->userdata('hb_user')){ 
		    	redirect('/LoginController/', 'refresh');
			}else{
				if($this->session->userdata('hb_guest')){ 
					$userSess=$this->session->userdata('hb_guest');
					$uid = $userSess['id']; //echo $uid; exit;
				}else{
					$id = $this->guest();
					$guestar = array('id'=>$id);
					$this->session->set_userdata('hb_guest',$guestar);
					$userSess=$this->session->userdata('hb_guest');
				    $uid = $userSess['id']; //echo $uid; exit;
				}
			}
			//session
		 	$guestid=$uid;
		 
			if($this->input->post('name') != NULL && $this->input->post('email') != NULL && $this->input->post('password') != NULL)
			{
				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$mobile = $this->input->post('mobile');
				$password1 = $this->input->post('password');
				$cpassword = $this->input->post('confirm_pswd');
				if($password1 != $cpassword)
				{
				
						$this->session->set_flashdata('error_msg', 'Confirm Password does not match');
						redirect('LoginController/register_view/', 'refresh');
				}
				$password=md5($this->input->post('password'));
				//$token=$input_data['token'];
				//$cnid=$header['Countryid'];
				$con="(re_email='$email')";
				//$con1="(mobile='$mobile')";
				$check=$this->site_model->select1('re_user',$con);
				//$check1=$this->site_model->select1('re_user',$con1);
				if(count($check)>0)
				{
					$this->session->set_flashdata('error_msg', 'Email ID already exist');
						redirect('LoginController/register_view/', 'refresh');
				}
				// else if(count($check1)>0){
				//  	echo 'Phone number already exist';
				// }
				else{
					$data=array("re_username"=>$name,"re_email"=>$email,"re_mobile"=>$mobile,"re_pswd"=>$password,"re_userlvl"=>4,"re_status"=>1);
				
					$check2=$this->site_model->insert('re_user',$data); 
					//echo $this->db->last_query(); die;
				//	echo $check2; die;
				 	if($check2!=0){ 
						$cond=array("re_email"=>$email);
						$userdetails=$this->site_model->select1('re_user',$cond);
						foreach($userdetails as $user){}
						$userid=$user['re_id']; 
						$username=$user['re_username']; 
						$useremail=$user['re_email'];	
				 		$cond1="(user_id='$guestid')";
						$data1=array("user_id"=>$userid);
						
						$guestar = array('id'=>$userid,'name'=>$username,'email'=>$useremail);
						$this->session->set_userdata('hb_reg',$guestar);
						$otp=rand(1234,9999);

						$data=array("verify_otp"=>$otp,"re_status"=>0,"verify_status"=>0);
					$con1="(re_id=$userid)";
					$this->site_model->updatedata('re_user',$data,$con1);
                 
                    //echo $this->db->last_query(); 
						//$dataemail['otp'] = $otp;

							$subject = "OTP Verification";
							$message=" Your OTP is ".$otp;
							$from="noreply@habari.com";
							$this->sendMail($from,$email,$message,$subject);
				 		
				//  		$this->session->set_flashdata('success_msg', 'Register Successfully');
						redirect('LoginController/verify_otp/', 'refresh');
				 	}else{
						//echo 'Please try again';
						$this->session->set_flashdata('error_msg', 'Please try again');
						redirect('LoginController/register_view/', 'refresh');
				 	}
				}
			}else{
		        //echo "Please Enter Data!";
		        $this->session->set_flashdata('error_msg', 'Please Enter Data!');
				redirect('LoginController/register_view/', 'refresh');
		    }	
		}else{
	        //echo "Please Enter Data!";
	        $this->session->set_flashdata('error_msg', 'Please Enter Data!');
			redirect('LoginController/register_view/', 'refresh');
	    }
	}
	
	function editAccountDetails()
  	{
  	    $pass=$this->input->post('user-password');
  	    $name = $this->input->post('user-name');
  	    $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');

        $userSess=$this->session->userdata('hb_user');
	    $uid = $userSess['id'];

        $cond="(re_id='$uid')";
		$login=$this->LoginModel->select1('re_user',$cond);
		
// 		print_r($login);
        $pswd = $login->re_pswd;
       
        
  	    
                if($pass!="")
                {
                	$data=array(
						"re_username" =>$name,
						"re_pswd"=>md5($pass),
						"re_email" => $email,
						"re_mobile"=>$mobile
					);
                }
                else
                {
                	$data=array(
                	    "re_username" =>$name,
						"re_pswd"=>$pswd,
						"re_email" => $email,
						"re_mobile"=>$mobile
						
					);
                }
  	    	
                	 $con1="(re_id=$uid)";
					$this->LoginModel->updatedata('re_user',$data,$con1);
                $this->session->set_flashdata('response', 'Updated');

					redirect('LoginController/property_list');
					
  	}

	function  verify_otp()
	{
		if($this->session->userdata('hb_reg')){ 
			$userSess=$this->session->userdata('hb_user');
			$uid = $userSess['id'];
			
		}else{
			redirect('/LoginController/', 'refresh');
		}

		$lang = $this->session->userdata('language');
		if($lang == 'en'){

		$this->load->view('layout/header');
		$this->load->view('layout/menu2');
		$this->load->view('login/otp_verify');
		$this->load->view('layout/footer');
	   }

	   else{
	   	$this->load->view('arb/layout/header',$datas);
		$this->load->view('arb/layout/menu2',$data1);
		$this->load->view('arb/login/otp_verify');
		$this->load->view('arb/layout/footer');
	   }
	}

	private function sendMail($from,$to,$msg,$sbj)
	{
		
        $this->load->library('email', array('mailtype'=>'html'));
        $this->email->from($from);
        $this->email->to($to);
      
        $this->email->subject($sbj.date("h:i:s"));
        $message = $msg;

        $this->email->message($message);
        if($this->email->send()){}
    }
    
    public function sendMail2()
	{
	
	$to = "m@masrooh.com";
    $subject = "HTML email";
    
    $message = "
    <html>
    <head>
    <title>HTML email</title>
    </head>
    <body>
    <p>This email contains HTML Tags!</p>
    <table>
    <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    </tr>
    <tr>
    <td>John</td>
    <td>Doe</td>
    </tr>
    </table>
    </body>
    </html>
    ";
    
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // More headers
    $headers .= 'From: <webmaster@example.com>' . "\r\n";
    $headers .= 'Cc: myboss@example.com' . "\r\n";
    
    $send = mail($to,$subject,$message,$headers);
    var_dump($send);
        }

   function smsverify()
  	{
		if(!empty($_POST))
	    {
			//session
			if($this->session->userdata('hb_reg'))
			{ 
				$userSess=$this->session->userdata('hb_reg');
				$uid = $userSess['id'];
				
				$code=$this->input->post('otp');
				$con="(re_id=$uid AND verify_otp='$code')";
				$check=$this->site_model->select6('re_user',$con);

				if($check->num_rows()>0)
				{
					foreach($check->result() as $c){}
					$response['code']="200";
					$response['userid']=$c->re_id;
					$response['username']=$c->re_username;
					$response['email']=$c->re_email;
					$response['mobile']=$c->re_mobile;
				 	
					$res=json_encode($response,JSON_UNESCAPED_UNICODE);
					$data=array("verify_otp"=>NULL,"re_status"=>1,"verify_status"=>1);
					$con1="(re_id=$uid)";
					$this->site_model->updatedata('re_user',$data,$con1);
					
					$this->session->set_flashdata('success_msg', 'Registered Successfully,  Please Login');
					redirect('LoginController/login', 'refresh');
				}else{
					$this->session->set_flashdata('error_msg', 'Please try again');
					redirect('LoginController/verify_otp/', 'refresh');
				}
			}
		}else{
			$this->session->set_flashdata('error_msg', 'Please try again');
			redirect('LoginController/verify_otp/', 'refresh');
		}	  
	}

	public function logout()
	{
		$this->session->unset_userdata('hb_user');
		$id = $this->guest();
		$guestar = array('id'=>$id);
		$this->session->set_userdata('hb_guest',$guestar);
		redirect('LoginController/');
	}
	

	
	public function languageUpdate()
	{

	 $lang = $this->input->post('lang');
		
   		if($lang == 'en'){
      	$lang = 'en';
      }
	   else
	   {
	     	$lang = 'arb';  
	   }

	  $this->session->set_userdata('language',$lang);
 
    }
    
     public function filter_search()
    {
         $input_data = $this->input->post();
        
	
		if($input_data){
		    
		    //print_r($input_data); exit;
		    
		    

		        $catid = $input_data['catid'];
		    	$bath = $input_data['bath'];
			    $bed =  $input_data['bed']; 
			    $floor =$input_data['floor']; 
			    $type = $input_data['type'];
			    $amid = $input_data['amid'];
			    $minp = $input_data['minp'];
			    $maxp = $input_data['maxp'];

			    
			  $con_bed = $con_bath = $con_floor = $con_cat = $con_type =  $con_am = $con_minp = ""   ;
			     
			    
			     
			     if( $bed!=NULL )
			     {
			         $beds[] = $bed;
			         if (in_array("10", $beds))
			         {
			             $con_bed="AND pro_bedroom >=10 OR pro_bedroom IN($bed)";
			         }
			         else
			         {
			             $con_bed="AND pro_bedroom IN($bed)";
			         }
			     	 
			     }
			     
			      if( $bath!=NULL )
			     {
			         $baths[] = $bath;
			         if (in_array("10", $baths))
			         {
			             
			          $con_bath="AND pro_bathroom >= 10 OR pro_bathroom IN($bath)";
			         }
			       else
			       {
			           $con_bath="AND pro_bathroom IN($bath)";
			       }
			     	
			     	 
			     }
			     
			      if( $floor!=NULL )
			     {
			          $floors[] = $floor;
			        if (in_array("10", $floors))
			         {
			            
			             $con_floor="AND pro_floor >=10 OR pro_floor IN($floor)";
			         }
			        else
			        {
			             $con_floor="AND pro_floor IN($floor)";
			        }
			     	  
			     	 
			     }
			     
			     if( $type!=NULL )
			     {

				    $con_type=" AND re_typeid = '$type' ";

			     }
			     
			    
			    
			      if( $amid!=NULL)
			     {
				    $con_am="AND re_featureid IN($amid)";
				    
			     }
			     
			     if( $catid!=NULL)
			     {
				    $con_cat="AND re_estcatid IN ($catid)";
				    
			     }
			     
			      if( $minp!=NULL AND $maxp!=NULL)
			     {
				    $con_minp=" AND pro_price BETWEEN '$minp' AND '$maxp'";
				   
			     }
			   
			     
			     
			     $con = "(pro_delete=0 AND availability=1 AND pro_status=1 AND approve_status=1   $con_bed  $con_bath  $con_floor $con_cat  $con_type    $con_am  $con_minp   )";
			     
			     $res=$this->LoginModel->select3('re_property',$con); 
			     
			     //echo $this->db->last_query();
			     
			       
			     //print_r($res1);
			           // $res2 = array_map("unserialize", array_unique(array_map("serialize", $res1)));
			            
			            //print_r($res2);
			            
			     		$result["propertyList"]= $res;
			     		

		            	//	 $response['code']="200";
						  $lang = $this->session->userdata('language');
	                      if($lang == 'en'){
	                         //  print_r($propertyList); die;
						  $this->load->view('properties/result',$result);
						}
						else{
						    
						   
							  $this->load->view('arb/properties/result2',$result);
		
						}
						
			

	
		}
		else{
		$response=array('code'=>'500','message'=>'token error , access denied');
		echo str_replace('\\',"",json_encode($response,JSON_UNESCAPED_UNICODE));	
		}
    }
    
    public function filter_search1()
    {
         $input_data = $this->input->post();
        
	
		if($input_data){

		        $catid = $input_data['catid'];
		    	$bath = $input_data['bath'];
			    $bed =  $input_data['bed']; 
			    $floor =$input_data['floor']; 
			    $type = $input_data['type'];
			    $amid = $input_data['amid'];
			    $minp = $input_data['minp'];
			    $maxp = $input_data['maxp'];
			    
			     
			     if( $bed!=NULL )
			     {
			       
			        $beds = explode(",",$bed);
			        
                    $j=1; $k=1; $l=1; $m=1; $n=1;
				    $con1="(pro_delete=0 AND availability=1 AND  (";
				    
				    
				    for($i=0;$i < sizeof($beds);$i++){
				     $con1 .= "pro_bedroom LIKE '%$beds[$i]%'";
				     if($k != sizeof($beds)){
				      $con1 .= " OR ";   
				     }
				     $k++;
				    }
		    
				     $con1 .= "))";
				     
				     $result=$this->LoginModel->select3('re_property',$con1); 
				     
				     //print_r($result);
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	    $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
			     	 
			     	  
			     	  
			     	 
			     }
			     
			      if( $bath!=NULL )
			     {
			       
			        $baths = explode(",",$bath);
			        
                    $j=1; $k=1; $l=1; $m=1; $n=1;
				    $con1="(pro_delete=0 AND availability=1 AND  (";
				    
				    
				    for($i=0;$i < sizeof($baths);$i++){
				     $con1 .= "pro_bathroom LIKE '%$baths[$i]%'";
				     if($k != sizeof($baths)){
				      $con1 .= " OR ";   
				     }
				     $k++;
				    }
		    
				     $con1 .= "))";
				     
				     $result=$this->LoginModel->select3('re_property',$con1); 
			         //print_r($result); 
			         //echo"hi"	;
			         foreach($result as $val)
			     	 {
			     	     $ans=array();
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	      $res1[] = $ans; $ans=array(); 
			     	 }
			     	 //print_r($res1);
			     	  
			     	  //echo " hellooo";
			     	 
			     }
			     
			      if( $floor!=NULL )
			     {
			       
			        $floors = explode(",",$floor);
			        
                    $j=1; $k=1; $l=1; $m=1; $n=1;
				    $con1="(pro_delete=0 AND availability=1 AND  (";
				    
				    
				    for($i=0;$i < sizeof($floors);$i++){
				     $con1 .= "pro_floor LIKE '%$floors[$i]%'";
				     if($k != sizeof($floors)){
				      $con1 .= " OR ";   
				     }
				     $k++;
				    }
		    
				     $con1 .= "))";
				     
				     $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	      $res1[] = $ans; $ans=array(); 
			     	 }
			     	 
			     	  
			     	  
			     	 
			     }
			     
			     if( $type!=NULL )
			     {
			       
			        $types = explode(",",$type);
			        
                    $j=1; $k=1; $l=1; $m=1; $n=1;
				    $con1="(pro_delete=0 AND availability=1 AND  (";
				    
				    
				    for($i=0;$i < sizeof($types);$i++){
				     $con1 .= "property_type LIKE '%$types[$i]%'";
				     if($k != sizeof($types)){
				      $con1 .= " OR ";   
				     }
				     $k++;
				    }
		    
				     $con1 .= "))";
				     
				     $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	       $res1[] = $ans; $ans=array(); 
			     	 }
			     	 
			     	 
			     	  
			     	 
			     }
			     
			    
			      if( $amid!=NULL)
			     {
				    $con1="(pro_delete=0 AND availability=1 AND re_featureid IN($amid))";
				     $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			     if( $catid!=NULL)
			     {
				    $con1="(pro_delete=0 AND availability=1 AND re_estcatid IN($catid))";
				     $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			      if( $minp!=NULL AND $maxp!=NULL)
			     {
				    $con1="(pro_delete=0 AND  availability=1 AND pro_price BETWEEN '$minp' AND '$maxp')";
				    $result=$this->LoginModel->select3('re_property',$con1); 
				    
				   // echo $this->db->last_query(); die;
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			     else if( $minp!=NULL AND $maxp==NULL)
			     {
				    $con1="(pro_delete=0 AND  availability=1 AND pro_price >= '$minp' )";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			     else if( $minp==NULL AND $maxp!=NULL)
			     {
				    $con1="(pro_delete=0 AND availability=1 AND pro_price <= '$maxp' )";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			    
			       
			     //print_r($res1);
			            $res2 = array_map("unserialize", array_unique(array_map("serialize", $res1)));
			            
			            //print_r($res2);
			            
			     		$result["propertyList"]= $res2;
			     		

		            	//	 $response['code']="200";
						  $lang = $this->session->userdata('language');
	                      if($lang == 'en'){
						  $this->load->view('properties/result',$result);
						}
						else{
							  $this->load->view('arb/properties/result',$result);
		
						}
						
			

	
		}
		else{
		$response=array('code'=>'500','message'=>'token error , access denied');
		echo str_replace('\\',"",json_encode($response,JSON_UNESCAPED_UNICODE));	
		}
    }
    
    public function search1($search)
    {
     
        $input_data = $this->input->post();
        
	
		if($input_data){

		   if($search == "rent")
		   {
		    	$location = $input_data['location'];
			    $bed =  $input_data['bed']; 
			    $bath =$input_data['bath']; 
			    $type = $input_data['type'];
			    $minp = $input_data['min_price'];
			    $maxp = $input_data['max_price'];
			   
			    
			    if($bed == NULL AND $bath ==NULL AND $minp==NULL AND $maxp==NULL)
			    {
			      
				    $con1="(pro_delete=0 AND city_id ='$location' AND property_type ='$type' AND re_typeid =2 AND availability=1)";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	      $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     
			    }
			    
			    
			  $con_bed = $con_bath = $con_type =  $con_minp = ""   ;
			     
			    
			     
			     if( $bed!=NULL )
			     {
			         
			             $con_bed="AND pro_bedroom >=10 OR pro_bedroom =$bed";

			     }
			     
			      if( $bath!=NULL )
			     {
			         
			          $con_bath="AND pro_bathroom >= 10 OR pro_bathroom = $bath";
			       
			     }
			  
			     if( $type!=NULL )
			     {

				    $con_type=" AND re_typeid = '$type' ";

			     }
			     
			    
			      if( $minp!=NULL AND $maxp!=NULL)
			     {
				    $con_minp=" AND pro_price BETWEEN '$minp' AND '$maxp'";
				   
			     }
			   
			     
			     
			     $con = "(pro_delete=0 AND availability=1 AND pro_status=1 AND approve_status=1 AND re_typeid =2 AND  city_id ='$location'   $con_bed  $con_bath  $con_type   $con_location  $con_minp   )";
			     
			     $res=$this->LoginModel->select3('re_property',$con); 
			     
			     
			    
			     
		   }   
		   
		    if($search == "sell")
		   {
		    	$location = $input_data['location2'];
			    $minb =  $input_data['min_bed2']; 
			    $maxb =$input_data['max_bed2']; 
			    $type = $input_data['type2'];
			    $minp = $input_data['min_price2'];
			    $maxp = $input_data['max_price2'];
			   
			     
			      if($minb == NULL AND $maxb ==NULL AND $minp==NULL AND $maxp==NULL)
			    {
			      
				    $con1="(pro_delete=0 AND city_id ='$location' AND property_type ='$type' AND re_typeid =1 AND availability=1)";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	      $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     
			    }
			      if( $minb!=NULL AND $maxb !=NULL)
			     {
				    $con1="(pro_delete=0 AND city_id ='$location' AND property_type ='$type' AND re_typeid =1 AND availability=1 AND pro_bedroom BETWEEN '$minb' AND '$maxb')";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			     
			  
			      if( $minp!=NULL AND $maxp!=NULL)
			     {
				    $con1="(pro_delete=0 AND city_id ='$location' AND property_type ='$type' AND re_typeid =1 AND availability=1 AND pro_price BETWEEN '$minp' AND '$maxp')";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			     else if( $minp!=NULL AND $maxp==NULL)
			     {
				    $con1="(pro_delete=0 AND city_id ='$location' AND property_type ='$type' AND re_typeid =1 AND availability=1 AND pro_price >= '$minp' )";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			     else if( $minp==NULL AND $maxp!=NULL)
			     {
				    $con1="(pro_delete=0  AND city_id ='$location' AND property_type ='$type' AND re_typeid =1 AND availability=1 AND pro_price <= '$maxp' )";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
		   }   
			     
			 if($search == "lease")
		   {
		    	$location = $input_data['location3'];
			    $minb =  $input_data['min_bed3']; 
			    $maxb =$input_data['max_bed3']; 
			    $type = $input_data['type3'];
			    $minp = $input_data['min_price3'];
			    $maxp = $input_data['max_price3'];
			   
			      if($minb == NULL AND $maxb ==NULL AND $minp==NULL AND $maxp==NULL)
			    {
			      
				    $con1="(pro_delete=0 AND city_id ='$location' AND property_type ='$type' AND re_typeid =3 AND availability=1)";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	      $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     
			    }
			     
			      if( $minb!=NULL AND $maxb !=NULL)
			     {
				    $con1="(pro_delete=0 AND city_id ='$location' AND property_type ='$type' AND re_typeid =3 AND availability=1 AND pro_bedroom BETWEEN '$minb' AND '$maxb')";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	      $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			    
			      if( $minp!=NULL AND $maxp!=NULL)
			     {
				    $con1="(pro_delete=0 AND city_id ='$location' AND property_type ='$type' AND re_typeid =3 AND availability=1 AND pro_price BETWEEN '$minp' AND '$maxp')";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			     else if( $minp!=NULL AND $maxp==NULL)
			     {
				    $con1="(pro_delete=0 AND city_id ='$location' AND property_type ='$type' AND re_typeid =3 AND availability=1 AND pro_price >= '$minp' )";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			     else if( $minp==NULL AND $maxp!=NULL)
			     {
				    $con1="(pro_delete=0  AND city_id ='$location' AND property_type ='$type' AND re_typeid =3 AND availability=1 AND pro_price <= '$maxp' )";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
		   }       
			     
			     
			 if($search == "camp")
		   {
		    	$location = $input_data['location4'];
			    $bed =$input_data['bed4']; 
			   
			    $minp = $input_data['min_price4'];
			    $maxp = $input_data['max_price4'];
			   
			     if($bed == NULL  AND $minp==NULL AND $maxp==NULL)
			    {
			      
				    $con1="(pro_delete=0 AND city_id ='$location'  AND re_estcatid =19 AND availability=1)";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     
			    }
			     
			     
			      if( $bed!=NULL )
			     {
				    $con1="(pro_delete=0 AND city_id ='$location'  AND re_estcatid =19 AND availability=1 AND pro_bedroom = '$bed')";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	      $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			    
			      if( $minp!=NULL AND $maxp!=NULL)
			     {
				    $con1="(pro_delete=0  AND city_id ='$location'  AND re_estcatid =19 AND availability=1 AND pro_price BETWEEN '$minp' AND '$maxp')";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			     else if( $minp!=NULL AND $maxp==NULL)
			     {
				    $con1="(pro_delete=0  AND city_id ='$location'  AND re_estcatid =19 AND availability=1 AND pro_price >= '$minp' )";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			     else if( $minp==NULL AND $maxp!=NULL)
			     {
				    $con1="(pro_delete=0  AND city_id ='$location'  AND re_estcatid =19 AND availability=1 AND pro_price <= '$maxp' )";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
		   }      
			     
			     
			     
			     
			     
			       
			      //print_r($res1);
			            $res2 = array_map("unserialize", array_unique(array_map("serialize", $res1)));
			            //echo $this->db->last_query(); 
			            //echo "Hello";
			            //print_r($res2);
			            
			     		$result["propertyList"]= $res2;
			     		

		            	//	 $response['code']="200";
						  $lang=$this->session->userdata('language');
			if($lang=='en')
			{
 
				$this->load->view('layout/header');
				$this->load->view('layout/menu2');
				$this->load->view('properties/search',$result);
				$this->load->view('layout/footer');
			}
			else
			{ 
				$this->load->view('arb/layout/header');
				$this->load->view('arb/layout/menu2');
				$this->load->view('arb/properties/search',$result);
				$this->load->view('arb/layout/footer');	
			}
						
			

	
		}
		
		else{
		    redirect('LoginController');
		}
	
    
    }
    
     public function search($search)
    {
     
        $input_data = $this->input->post();
        
	
		if($input_data){

		   if($search == "rent")
		   {
		    	$location = $input_data['location'];
			    $bed =  $input_data['bed']; 
			    $bath =$input_data['bath']; 
			    $type = $input_data['type'];
			    $minp = $input_data['min_price'];
			    $maxp = $input_data['max_price'];
			   
			    
			    if($bed == NULL AND $bath ==NULL AND $minp==NULL AND $maxp==NULL AND $location==NULL)
			    {
			      
				    $con1="(pro_delete=0  AND property_type ='$type' AND re_typeid =2 AND availability=1)";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	      $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     
			    }
			     
			      if( $bed!=NULL)
			     {
				    $con1="(pro_delete=0 AND city_id ='$location' AND property_type ='$type' AND re_typeid =2 AND availability=1 AND pro_bedroom ='$bed')";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	      $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			      if( $bath!=NULL)
			     {
				    $con1="(pro_delete=0 AND city_id ='$location' AND property_type ='$type' AND re_typeid =2 AND availability=1 AND pro_bathroom ='$bath')";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	      $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			     
			      if( $minp!=NULL AND $maxp!=NULL)
			     {
				    $con1="(pro_delete=0 AND city_id ='$location' AND property_type ='$type' AND  re_typeid =2 AND availability=1 AND pro_price BETWEEN '$minp' AND '$maxp')";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			     else if( $minp!=NULL AND $maxp==NULL)
			     {
				    $con1="(pro_delete=0 AND city_id ='$location' AND property_type ='$type' AND re_typeid =2 AND availability=1 AND pro_price >= '$minp' )";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     else if( $minp==NULL AND $maxp!=NULL)
			     {
				    $con1="(pro_delete=0 AND city_id ='$location' AND property_type ='$type' AND re_typeid =2 AND availability=1 AND pro_price <= '$maxp' )";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			    
			     
		   }   
		   
		    if($search == "sell")
		   {
		    	$location = $input_data['location2'];
			    $minb =  $input_data['min_bed2']; 
			    $maxb =$input_data['max_bed2']; 
			    $type = $input_data['type2'];
			    $minp = $input_data['min_price2'];
			    $maxp = $input_data['max_price2'];
			   
			     
			      if($minb == NULL AND $maxb ==NULL AND $minp==NULL AND $maxp==NULL AND $location==NULL)
			    {
			      
				    $con1="(pro_delete=0  AND property_type ='$type' AND re_typeid =1 AND availability=1)";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	      $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     
			    }
			      if( $minb!=NULL AND $maxb !=NULL)
			     {
				    $con1="(pro_delete=0 AND city_id ='$location' AND property_type ='$type' AND re_typeid =1 AND availability=1 AND pro_bedroom BETWEEN '$minb' AND '$maxb')";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			     
			  
			      if( $minp!=NULL AND $maxp!=NULL)
			     {
				    $con1="(pro_delete=0 AND city_id ='$location' AND property_type ='$type' AND re_typeid =1 AND availability=1 AND pro_price BETWEEN '$minp' AND '$maxp')";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			     else if( $minp!=NULL AND $maxp==NULL)
			     {
				    $con1="(pro_delete=0 AND city_id ='$location' AND property_type ='$type' AND re_typeid =1 AND availability=1 AND pro_price >= '$minp' )";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			     else if( $minp==NULL AND $maxp!=NULL)
			     {
				    $con1="(pro_delete=0  AND city_id ='$location' AND property_type ='$type' AND re_typeid =1 AND availability=1 AND pro_price <= '$maxp' )";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
		   }   
			     
			 if($search == "lease")
		   {
		    	$location = $input_data['location3'];
			    $minb =  $input_data['min_bed3']; 
			    $maxb =$input_data['max_bed3']; 
			    $type = $input_data['type3'];
			    $minp = $input_data['min_price3'];
			    $maxp = $input_data['max_price3'];
			   
			      if($minb == NULL AND $maxb ==NULL AND $minp==NULL AND $maxp==NULL AND $location==NULL)
			    {
			      
				    $con1="(pro_delete=0 AND  property_type ='$type' AND re_typeid =3 AND availability=1)";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	      $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     
			    }
			     
			      if( $minb!=NULL AND $maxb !=NULL)
			     {
				    $con1="(pro_delete=0 AND city_id ='$location' AND property_type ='$type' AND re_typeid =3 AND availability=1 AND pro_bedroom BETWEEN '$minb' AND '$maxb')";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	      $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			    
			      if( $minp!=NULL AND $maxp!=NULL)
			     {
				    $con1="(pro_delete=0 AND city_id ='$location' AND property_type ='$type' AND re_typeid =3 AND availability=1 AND pro_price BETWEEN '$minp' AND '$maxp')";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			     else if( $minp!=NULL AND $maxp==NULL)
			     {
				    $con1="(pro_delete=0 AND city_id ='$location' AND property_type ='$type' AND re_typeid =3 AND availability=1 AND pro_price >= '$minp' )";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			     else if( $minp==NULL AND $maxp!=NULL)
			     {
				    $con1="(pro_delete=0  AND city_id ='$location' AND property_type ='$type' AND re_typeid =3 AND availability=1 AND pro_price <= '$maxp' )";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
		   }       
			     
			     
			 if($search == "camp")
		   {
		    	$location = $input_data['location4'];
			    $bed =$input_data['bed4']; 
			   
			    $minp = $input_data['min_price4'];
			    $maxp = $input_data['max_price4'];
			   
			     if($bed == NULL  AND $minp==NULL AND $maxp==NULL AND $location==NULL)
			    {
			      
				    $con1="(pro_delete=0   AND re_estcatid =19 AND availability=1)";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     
			    }
			     
			     
			      if( $bed!=NULL )
			     {
				    $con1="(pro_delete=0 AND city_id ='$location'  AND re_estcatid =19 AND availability=1 AND pro_bedroom = '$bed')";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	      $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			    
			      if( $minp!=NULL AND $maxp!=NULL)
			     {
				    $con1="(pro_delete=0  AND city_id ='$location'  AND re_estcatid =19 AND availability=1 AND pro_price BETWEEN '$minp' AND '$maxp')";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			     else if( $minp!=NULL AND $maxp==NULL)
			     {
				    $con1="(pro_delete=0  AND city_id ='$location'  AND re_estcatid =19 AND availability=1 AND pro_price >= '$minp' )";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
			     else if( $minp==NULL AND $maxp!=NULL)
			     {
				    $con1="(pro_delete=0  AND city_id ='$location'  AND re_estcatid =19 AND availability=1 AND pro_price <= '$maxp' )";
				    $result=$this->LoginModel->select3('re_property',$con1); 
			        
			     	 foreach($result as $val)
			     	 {
			     	     $ans["pro_id"] = $val->pro_id;
			     	     $ans["pro_image"] = $val->pro_image;
			     	     $ans["re_estcatid"] = $val->re_estcatid;
			     	     $ans["city_id"] = $val->city_id;
			     	     $ans["pro_price"] = $val->pro_price;
			     	     $ans["pro_bedroom"] = $val->pro_bedroom;
			     	     $ans["pro_bathroom"] = $val->pro_bathroom;
			     	     $ans["pro_floor"] = $val->pro_floor;
			     	     $ans["pro_title"] = $val->pro_title;
			     	     $ans["availability"] = $val->availability;
			     	     $ans["pro_createdat"] = $val->pro_createdat;
			     	     
			     	     $res1[] = $ans; $ans=array(); 
			     	 }
				      
			     }
			     
		   }      
			     
			     
			     
			     
			     
			       
			      //print_r($res1);
			            $res2 = array_map("unserialize", array_unique(array_map("serialize", $res1)));
			            //echo $this->db->last_query(); 
			            //echo "Hello";
			            //print_r($res2);
			            
			     		$result["propertyList"]= $res2;
			     		

		            	//	 $response['code']="200";
						  $lang=$this->session->userdata('language');
			if($lang=='en')
			{
 
				$this->load->view('layout/header');
				$this->load->view('layout/menu2');
				$this->load->view('properties/search',$result);
				$this->load->view('layout/footer');
			}
			else
			{ 
				$this->load->view('arb/layout/header');
				$this->load->view('arb/layout/menu2');
				$this->load->view('arb/properties/search',$result);
				$this->load->view('arb/layout/footer');	
			}
						
			

	
		}
		
		else{
		    redirect('LoginController');
		}
	
    
    }
    
  function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


}