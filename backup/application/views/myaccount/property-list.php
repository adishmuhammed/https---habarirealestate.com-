
<div class="col-md-12">
    
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
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>NAME</th>
                    <th>PROPERTY TYPE</th>
                    <th>CREATED AT</th>
                  
                    <th>OPERATIONS</th>
                  </tr>
                  </thead>
                  <?php if(!empty($propertyList))
                      {

                       $i = 1;
                       foreach($propertyList as $value) 
                  {
                     
                     ?>
                     <tr>
                     <td><?=$i?></td>
                     <td><img src="<?=base_url()?>../uploads/images/<?= $value->pro_image; ?>"  width="25" alt=" "></td>
                     <td><?= $value->pro_title; ?></td>
                     
                   
                     <td> <?= $value->re_typename; ?></td>
                     <td><?= $value->pro_createdat ; ?></td>
                     
                    
                     

                     <td>
                      <a href="<?php echo site_url("LoginController/edit_property/".$value->pro_id);?>" class="btn btn-icon btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fa fa-edit"></i></a>
                      
                     <a href="<?php echo site_url("LoginController/propertyDelete/".$value->pro_id);?>" class="btn btn-icon btn-sm btn-danger deleteDialog" data-bs-toggle="tooltip" role="button" data-bs-original-title="Delete">
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
              
 </div>