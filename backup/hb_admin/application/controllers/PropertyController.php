<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PropertyController extends CI_Controller 
{
	
     function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('UserModel');

	}

	public function addPropertypost()
	{
		if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$cId=$this->input->post('cId');

		$this->form_validation->set_rules('pro_title', 'Name', 'required');
		$this->form_validation->set_rules('pro_title_arb', 'arabic Name ', 'required');
		$this->form_validation->set_rules('pro_description', 'description ', 'required');
		$this->form_validation->set_rules('pro_description_arb', 'arabic Description ', 'required');
	
		if ($this->form_validation->run() == FALSE)
	    {
	    $con="(re_estcatdelete=0)";
		$data["categoryList"]=$categoriList=$this->UserModel->select1('re_estcategory',$con);

	    $con="(re_typedelete=0)";
		$data["typeList"]=$typingList=$this->UserModel->select1('re_type',$con);

		$con="(re_facilitydelete=0)";
		$data["facilityList"]=$facilitiList=$this->UserModel->select1('re_facility',$con);

		$con="(re_featuredelete=0)";
		$data["fList"]=$featureList=$this->UserModel->select1('re_features',$con);

		
		$data["countryList"]=$this->UserModel->select('re_country');

	    	if(empty($cId))
                	{
	   $this->load->view('layout/header');
			$this->load->view('layout/sidebar');
			$this->load->view('property',$data);
			$this->load->view('layout/footer');
		}
		else
		{
			redirect('PropertyController/propertyEdit/'.$cId);	
		}
		}
		else
		{
			$newfilename1 =NULL;
				if(!empty($_FILES['pro_image']['name']))
				{
					$ext=pathinfo($_FILES['pro_image']['name'], PATHINFO_EXTENSION);
					$this->load->helper("url");
					$basepath =  "../uploads/upimage/";
						
					//length random number

		 			$randomnumber = rand(123456,654321);
	 				$newfilename1 = $randomnumber . "." . $ext ;          
					$target_path1 = $basepath . $newfilename1 ;             

	               	if (move_uploaded_file($_FILES['pro_image']['tmp_name'],$target_path1))
					{
						
					}
					if(!empty($cId))
                	{
                		//old images
	                    $old_proimage = $this->input->post("old_proimage");
		                if($old_proimage != "")
		                {
		                    $image_url = "../uploads/upimage/".$old_proimage;
		                        
		                    unlink($image_url);
	                        
	                    }
                	}
				}
				else
				{
	                    $newfilename1 = $this->input->post("old_proimage");

				}
				//multiple image

				//var_dump($this->input->post('multi_images')); exit; //variable potsing
				$multi_images=array();
				if($_FILES['multi_name']['name'][0] != "")//multiple image
				{

					$file_count=sizeof($_FILES['multi_name']['name']);
					for($i=0;$i<$file_count;$i++)
					{
						$ext=pathinfo($_FILES['multi_name']['name'][$i], PATHINFO_EXTENSION);
						$this->load->helper("url");
						$basepath =  "../uploads/upimage/"; 
						$randomnumber = rand(123456,654321);
						$newfilename2 = $randomnumber . "." . $ext ;          
						$target_path1 = $basepath . $newfilename2 ; 

						// ????

						//$newfilename2=$newfilename2;
						if (move_uploaded_file($_FILES['multi_name']['tmp_name'][$i],$target_path1))
						{

						}
							$name['image_name']=$newfilename2;
		                    $multi_images[] =$name;

					}

					//var_dump($multi_images); exit;
					//edit feature image

	                
                	if(!empty($cId))
                	{
	                    $old_multiname = json_decode($this->input->post('multi_images'));

	                   
		                if(count($old_multiname) >0)
		                {
		                	 
                            $newimages=$multi_images;
                            $multi_images=array_merge($old_multiname,$newimages);

	                        
	                    }

                	
                	}
                	$multi_image=json_encode($multi_images);
            	}
            	else{
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
					

					//print_r($multi_image); die;

				
			
					$feature_id = implode(",",$this->input->post('re_featuretitle'));
			 		//print_r($feature_id) ; die;
			 		$facility_id = implode(',', $this->input->post('re_facilityname'));
			 		$distance_id=implode(',', $this->input->post('pro_distance'));

			 		$fname= explode(',', $facility_id);
			 		$dname= explode(',', $distance_id);
			 		for($i=0;$i<count($fname);$i++)
			 		{
			 			 //$facility[]=array('re_facilityid'=>$value->re_facilityid,'re_facilityname'=>$value->re_facilityname, );
			 		$facility1[]=array('re_facilityid'=>$fname[$i],'pro_distance'=>$dname[$i]);
			 		}
			 			$addmore=json_encode($facility1);
			 		//var_dump(json_encode($facility1));
			 		//var_dump($facility1);
			 		//var_dump($this->input->post('re_facilityname'));
			 		//var_dump($distance_id);
			 		//exit;
                     
                     if(!empty($this->input->post("featured")))
                        {
                            $featured=$this->input->post("featured");
                        }else{
                            $featured=0;
                        }
            			 		          

					$data=array(
					'pro_title'=>$this->input->post('pro_title'),
					'pro_title_arb'=>$this->input->post('pro_title_arb'),
					'pro_description'=>$this->input->post('pro_description'),
					'pro_description_arb'=>$this->input->post('pro_description_arb'),
					'pro_content'=>$this->input->post('pro_content'),
					'pro_image'=>$newfilename1,
					"multi_image" => $multi_image,
					'country_id'=>$this->input->post('country_name'),
					'city_id'=>$this->input->post('city_name'),
					'pro_location'=>$this->input->post('pro_location'),
					'pro_latitude'=>$this->input->post('pro_latitude'),
					'pro_longitude'=>$this->input->post('pro_longitude'),
					'pro_bedroom'=>$this->input->post('pro_bedroom'),
					'pro_bathroom'=>$this->input->post('pro_bathroom'),
					'pro_floor'=>$this->input->post('pro_floor'),
					'pro_square'=>$this->input->post('pro_square'),
					'pro_price'=>$this->input->post('pro_price'),
					'pro_currency'=>$this->input->post('pro_currency'),
					'pro_period'=>$this->input->post('pro_period'),
					're_facilityid'=>$addmore,
					'property_type' =>$this->input->post('ptype'),
					're_estcatid'=>$this->input->post('re_estcatname'),
					're_typeid'=>$this->input->post('re_typename'),
					're_featureid'=>$feature_id,
					'featured' => $featured,
					'approve_status' => 1
					);
					
					
			        if(empty($cId))
	                {
						$insertid= $this->UserModel->insert('re_property',$data);
		               	//last insertedId
		               	// echo $insertid; die;

		               	if(!empty($insertid))
		              	{
		              		//var_dump($multi_image); exit;
		      //        		$multiple =array(
	       //       			"pro_id"=>$insertid,
	       //       			"multi_name"=>$multi_image);
						 	// $this->UserModel->insert('re_multiple',$multiple);
						
							$this->session->set_flashdata('status','successfully added 1 category');
					   	}
				  		else
						{
							$this->session->set_flashdata('errorstatus','something went wrong please try again');
						}
						redirect('PropertyController/addPropertypost');
					}
					else
					{
						//update

						$multiple =array(
              				
              			"multi_name"=>$multi_image);
	                	$cond="(pro_id=".$cId.")";
	                	$afectedrow=$this->UserModel->updatedata('re_property',$data,$cond);

	                
	                	//affectedrow update 

	                	if(!empty($afectedrow))
		                {
		            	if(count($multi_images)>0)
		            	{


		               	$this->UserModel->updatedata('re_multiple',$multiple,$cond);
		               }
						$this->session->set_flashdata('status','successfully updated');
						}
						else
						{
							$this->session->set_flashdata('errorstatus','something went wrong please try again');
						}
						redirect('PropertyController/propertyEdit/'.$cId);		
					}

				
        }
              
	}



	public function getcity()
		{
			$responce = '';
			// echo "<pre>";print_r($this->input->post());die;
			$data=$this->UserModel->selectCity($this->input->post('value'))->result();
			if( empty($data) ==false)
			{
				foreach ($data as $key => $value) {
				$responce .= '<option value="'.$value->city_id.'">'.$value->city_name.'</option>';
				}
			}

			echo json_encode($responce);
			// echo "<pre>";print_r($data);die;
		}


	public function viewProperty()
	{
		if(!($this->session->userdata('userLogin')))
			{

				redirect('UserController/index');
			}
			      
			    $con="(re_delete=0 AND re_status=1 AND re_userlvl=2)";
		        $subadmin=$this->UserModel->select1('re_user',$con);
		        
		        $user = $this->session->userdata('userLogin');
     
				$con="(pro_delete=0)";
				$con2="(re_property.re_typeid=re_type.re_typeid)";
				//join table

				$data["propertyList"]=$pList=$this->UserModel->selectjoin2('re_property','re_type',$con,$con2);
				
			    $data['subadmin'] = $subadmin;
			    $data['user'] = $user;

				$this->load->view('layout/header');
				$this->load->view('layout/sidebar');
				$this->load->view('propertyList',$data);
				$this->load->view('layout/footer');
	}
	
		public function availability($status,$cId="")
	{
	 	// var_dump($cId); exit;
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
						'availability'=>$status,
					
					   );
			$cond="(pro_id=".$cId.")";
			$this->UserModel->updatedata('re_property',$data,$cond);
			
			 $user=$this->session->userdata('userLogin');
			 //print_r($user); die;
			 $uid = $user['re_id'] ;
			if($status==0)
			{
			    $data=array(					
						'property_id'=>$cId,
						'user_id' => $uid
					
					   );
		
			$this->UserModel->insert('re_sold_log',$data);
			}
			redirect('PropertyController/viewProperty');

	}
	
		public function availability_admin($status)
	{
	 	
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			if($this->input->post())
			{
			    $id = $this->input->post('id');
			    $subadmin = $this->input->post('subadmin_id');
			    $date  = $this->input->post('sold_date');
			$data=array(					
						'availability'=>$status,
					
					   );
			$cond="(pro_id=".$id.")";
			$this->UserModel->updatedata('re_property',$data,$cond);
			
		
			if($status==0)
			{
			    $data=array(					
						'property_id'=>$id,
						'user_id' => $subadmin,
						'sold_date' => $date
					   );
		
			$this->UserModel->insert('re_sold_log',$data);
			}
			redirect('PropertyController/viewProperty');
			}

	}

	public function propertyActivate($cId="")
	{
	 	// var_dump($cId); exit;
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
						'pro_status'=>1,
						
					   );
			$cond="(pro_id=".$cId.")";
			$this->UserModel->updatedata('re_property',$data,$cond);
			redirect('PropertyController/viewProperty');

	}

	public function propertyDeactivate($cId="")
	{
	 	// var_dump($cId); exit;
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
						'pro_status'=>0,
						
					   );
			$cond="(pro_id=".$cId.")";
			$this->UserModel->updatedata('re_property',$data,$cond);
			redirect('PropertyController/viewProperty');

	}
	
		public function propertyApprove($status,$id)
	{    
	    $pro_status =0;
	     if($status==1)
	     {
	         $pro_status = 1;
	     }
	     
	 	// var_dump($cId); exit;
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
						'approve_status'=>$status,
						 'pro_status' => $pro_status
					   );
			$cond="(pro_id=".$id.")";
			$this->UserModel->updatedata('re_property',$data,$cond);
			redirect('PropertyController/viewProperty');

	}

	public function propertyDelete($id="")
	 {
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}
			$data=array(					
						'pro_delete'=>1
					   );
			$cond="(pro_id=".$id.")";
			$this->UserModel->updatedata('re_property',$data,$cond);
			redirect('PropertyController/viewProperty');
	 }


	 public function propertyEdit($eId="")
	 {
	 	if(!($this->session->userdata('userLogin')))
			{
				redirect('UserController/index');
			}

		$con="(re_estcatdelete=0)";
		$data["categoryList"]=$categoriList=$this->UserModel->select1('re_estcategory',$con);

	    $con="(re_typedelete=0)";
		$data["typeList"]=$typingList=$this->UserModel->select1('re_type',$con);

		$con="(re_facilitydelete=0)";
		$data["facilityList"]=$facilitiList=$this->UserModel->select1('re_facility',$con);

		$con="(re_featuredelete=0)";
		$data["fList"]=$featureList=$this->UserModel->select1('re_features',$con);

		
		$data["countryList"]=$this->UserModel->select('re_country');


			$cond="(pro_id=".$eId.")";
			$data['proDetails']=$this->UserModel->select2('re_property',$cond);
			//SELECT MULTIPLE TABLE
			$data['multiDetails']=$this->UserModel->select2('re_multiple',$cond);
			$this->load->view('layout/header');
		    $this->load->view('layout/sidebar');	
			$this->load->view('property',$data);
			$this->load->view('layout/footer');
	 }
    public function deleteMultiple() 
		{
			if ($_POST) 
			{
				$pos = $this->input->post('pos');
				$cId = $this->input->post('cId');

				$cond="(pro_id=".$cId.")";
				$imgDetails=$this->UserModel->select2("re_multiple",$cond);
				$images=json_decode($imgDetails["multi_name"]);
				$imgCount=count($images);
				$images1=array();
				$new=array();
				$jsimage=array();

				for($i=0;$i<$imgCount;$i++)
				{
					if($i!=$pos)
					{
						$images1['image_name']=$images[$i]->image_name;
						$jsimage[]=$images[$i]->image_name;
						$new[]=$images1;
					}
					else
					{
						$path="./uploads/upimage/".$images[$i]->image_name;   
					if(file_exists($path))
					{                               
						$result1=unlink($path); 
					}
					}
				}
				//var_dump($new); exit;
			if(count($images1) > 0)
			{
				$result=json_encode($new);
			}
			else
			{
				$result="";
			}
			
			$data=array('multi_name'=>$result);
			$this->UserModel->updatedata("re_multiple",$data,$cond);

			//$this->session->set_userdata("multi",$MultiImage);
			$response["MultiImage"]=$jsimage;
			//$response["result"]=$result;
			
			echo json_encode($response);
			//var_dump($catId); exit;
			}
		}



			

}

