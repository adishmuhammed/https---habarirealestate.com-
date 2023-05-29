<div class="container">	
   <div  class="myaccount">        
   <div class="col-md-12 row">
       <h2>Hi <?=$userdetails['re_username']?></h2>  
       </div>
<ul  class="nav nav-pills">

			<li class="active">
        <a  href="#1a" data-toggle="tab">Properties Added</a>
			</li>
			<li><a href="#2a" data-toggle="tab">Account Details</a>
			</li>
		
		</ul>

			<div class="tab-content clearfix">
			  <div class="tab-pane active" id="1a">
			      
<div class="col-md-12">
    <div class="htable row">
<?php if($this->session->flashdata('response')){?> 
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> <?php echo $this->session->flashdata('response'); ?>
              </div>
              <?php $this->session->unset_userdata ( 'response' );  } ?>
              
               <?php if($this->session->flashdata('error')){?> 
               <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Sorry!</strong>  <?php echo $this->session->flashdata('error'); ?>
              </div>
               <?php $this->session->unset_userdata('error'); } ?>

               <div class="card-body">
                <table id="table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>NAME</th>
                    <th>PROPERTY TYPE</th>
                    <th>CREATED AT</th>
                   <th>STATUS</th>
                    <th>OPERATIONS</th>
                  </tr>
                  </thead>
                  <?php if(!empty($propertyList))
                      {

                       $i = 1;
                       foreach($propertyList as $value) 
                  {
                      $type=$value->re_typeid;
                    
                     $list = $this->db->query("select * from re_type where re_typeid = '$type'");
                     $list = $list->row();
                     //print_r($list);
                     
                     ?>
                     <tr>
                     <td><?=$i?></td>
                     <td><img src="<?=base_url()?>/uploads/upimage/<?= $value->pro_image; ?>"  width="25" alt=" "></td>
                     <td><?= $value->pro_title; ?></td>
                     
                   
                     <td> <?= $list->re_typename; ?></td>
                     <td><?= $value->pro_createdat ; ?></td>
                     <td>
                         <?php
                        if($value->approve_status==NULL){
                            ?>
                           
                           <button class="btn btn-sm btn-warning ">Pending</button>
                           
                      <?php  } 
                            else if($value->approve_status==1) {
                             ?>
                               
                          <button class="btn btn-sm btn-success">Approved</button>
                          
                             <?php 
                        }
                         
                         else  if($value->approve_status==2)
                        { 
                        ?>
                       
                            <button class="btn btn-sm btn-danger">Rejected</button>

                        
                            <?php     
                                 
                         } 
                         ?> 
                         
                         
                     </td>
                    
                     

                     <td>
                      <a href="<?php echo site_url("LoginController/edit_property/".$value->pro_id);?>" class="btn btn-icon btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fa fa-edit"></i></a>
                      
                     <a href="<?php echo site_url("LoginController/delete_property/".$value->pro_id);?>" class="btn btn-icon btn-sm btn-danger deleteDialog" data-bs-toggle="tooltip" role="button" data-bs-original-title="Delete">
                     <i class="fa fa-trash"></i>
                     </a>
                   </td>




                    </tr>
                     
                    
                  <?php 

                  $i++;  
                }
                 
                   }

                   ?>
                  
                </table>
              </div>
              
 </div></div>
			      
				</div>
				<div class="tab-pane" id="2a">
				    <div class="submit-form">
				     <form action="<?=site_url('LoginController/editAccountDetails')?>" method="post">
                   
                   <div class="col-md-12">
                      <label> Name</label>
                      <input type="text" name="user-name" value="<?=$userdetails['re_username']?>" >
                    </div>
                        <div class="col-md-6">
                     <label>Email </label>
                      <input type="text" name="email" value="<?=$userdetails['re_email']?>" >
                    </div>
                        <div class="col-md-6">
                    
                      <label>Mobile</label>
                      <input type="text" name="mobile" value="<?=$userdetails['re_mobile']?>">
                      </div>
                            <div class="col-md-12">
                      <label>Password</label>
                      <input type="password" name="user-password" value="">
                    
                      </div>
                          <div class="col-md-12">
                      <div class="save_button primary_btn default_button">
                        <button type="submit" class="subbtn">Save</button>
                      </div> </div>
                    </form>
				</div>	</div>
    <!--    <div class="tab-pane" id="3a">-->
    <!--      <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>-->
				<!--</div>-->
    <!--      <div class="tab-pane" id="4a">-->
    <!--      <h3>We use css to change the background color of the content to be equal to the tab</h3>-->
				<!--</div>-->
			</div></div>
  </div>