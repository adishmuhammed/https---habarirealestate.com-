<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Property List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Property List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <a href="<?=base_url()?>PropertyController/addPropertypost" >
               <button class="btn btn-secondary action-item" tabindex="0" aria-controls="botble-real-estate-tables-category-table" type="button"><span><span data-action="create"><i class="fa fa-plus"></i> Create</span></span></button>
              </a>
              <div class="card-header">
                <h3 class="card-title">List of added properties</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>NAME</th>
                    <th>PROPERTY TYPE</th>
                    <th>CREATED AT</th>
                    <th>CREATED BY</th>
                    <th>STATUS</th>
                    <th>OPERATIONS</th>
                  </tr>
                  </thead>
                  <?php if(!empty($propertyList))
                      {

                       $i = 1;
                       foreach($propertyList as $value) 
                  {
                      
                      $users = $this->db->query("select * from re_user where re_id='$value->user_id'");
                      
                      $users= $users->row();
                     
                     ?>
                     <tr>
                     <td><?=$i?></td>
                     <td><img src="<?=base_url()?>../uploads/upimage/<?= $value->pro_image; ?>"  width="25" alt=" "></td>
                     <td><?= $value->pro_title; ?></td>
                     
                   
                     <td> <?= $value->re_typename; ?></td>
                     <td><?= $value->pro_createdat ; ?></td>
                     <td><?=$users->re_username?></td>
                    
                     

                   
                    <td>
                      <?php 
                        if($value->user_level==4  )  
                         { 
                             if($value->approve_status==NULL){
                            ?>
                            <a href="<?php echo site_url("PropertyController/propertyApprove/1/".$value->pro_id);?>">
                           <button class="btn btn-sm btn-success">Approve</button></a>
                           
                            <a href="<?php echo site_url("PropertyController/propertyApprove/2/".$value->pro_id);?>">
                           <button class="btn btn-sm btn-danger">Reject</button></a>
                        
                      <?php  } 
                      
                           else if($value->approve_status==2 )
                    {
                    ?>
                   <a href="<?php echo site_url("PropertyController/propertyApprove/1/".$value->pro_id);?>">
                           <button class="btn btn-sm btn-secondary">Rejected</button></a>
                      
                         <?php 
                    }
                    
                     else if($value->approve_status==1 AND $value->pro_status==1)
                    {
                    ?>
                  <a href="<?php echo site_url("PropertyController/propertyDeactivate/".$value->pro_id);?>">
                      <button class="btn btn-sm btn-success">Active</button></a>
                    
                         <?php 
                    }
                    
                     else 
                    {
                    ?>
                   <a href="<?php echo site_url("PropertyController/propertyActivate/".$value->pro_id);?>">
                      <button class="btn btn-sm btn-danger">Inactive</button></a>
                      
                         <?php 
                    }
                     
                      
                         
                         }
                          
                     else if($value->pro_status==0 )
                    {
                    ?>
                    <a href="<?php echo site_url("PropertyController/propertyActivate/".$value->pro_id);?>">
                      <button class="btn btn-sm btn-danger">Inactive</button></a>
                      
                         <?php 
                    }
                     
                     else
                    { 
                    ?>
                   
                     <a href="<?php echo site_url("PropertyController/propertyDeactivate/".$value->pro_id);?>">
                      <button class="btn btn-sm btn-success">Active</button></a>
                    
                    <?php 
                    } 
                    ?>
                      <?php if($value->availability == 1 AND $value->pro_status==1) {?>
                      <?php if( $user['re_userlvl']==1){?>
                     
                            <button class="btn btn-sm btn-warning" onclick="soldout(<?=$value->pro_id?>)" data-toggle="modal" data-target="#soldout">Sold Out</button>

                    <?php  } else if( $user['re_userlvl']==2){ ?>
                     <a href="<?php echo site_url("PropertyController/availability/0/".$value->pro_id);?>">
                      <button class="btn btn-sm btn-warning" >Sold Out</button>
                      </a>
                    <?php } } else if($value->availability == 0) {?>
                     <a href="<?php echo site_url("PropertyController/availability/1/".$value->pro_id);?>">
                      <button class="btn btn-sm btn-danger">Make Available</button></a>
                      <?php } ?>
                    </td>
                    
                   
                     <td>
                      <a href="<?php echo site_url("PropertyController/propertyEdit/".$value->pro_id);?>" class="btn btn-icon btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fa fa-edit"></i></a>
                      
                     <a href="<?php echo site_url("PropertyController/propertyDelete/".$value->pro_id);?>" class="btn btn-icon btn-sm btn-danger deleteDialog" data-bs-toggle="tooltip" role="button" data-bs-original-title="Delete">
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
              <!-- /.card-body
            </div>
            <!-- /.card -->

           
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <div class="modal" id="soldout">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Select Subadmin & Sold Date</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
     <form method="post" action ="<?php echo site_url("PropertyController/availability_admin/0/");?>">
      <!-- Modal body -->
      <div class="modal-body">
          <input type="hidden" id="id" value="" name="id">
         <?php  if(!empty($subadmin))
              {  ?>
            <select name="subadmin_id" data-validation="required" >
                <option value="">-Select-</option>
              <?php            
                foreach($subadmin->result() as $row)
                { ?>

                  <option value="<?=$row->re_id?>"><?= $row->re_username?></option>
                  
               <?php }
             
              ?>
            </select>
            
            <input type="date" name="sold_date" data-validation="required" >
            <?php  } 

          else { ?>
                  <p>No Data Found</p>    
        <?php } ?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" >Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>