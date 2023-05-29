

  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$property?></h3>

                <p>Properties</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$sold?></h3>

                <p>Sold Out</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=$users?></h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?=$approve?></h3>

                <p>Approve</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
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
                      
                      $user = $this->db->query("select * from re_user where re_id='$value->user_id'");
                      
                      $user= $user->row();
                     
                     ?>
                     <tr>
                     <td><?=$i?></td>
                     <td><img src="<?=base_url()?>../uploads/upimage/<?= $value->pro_image; ?>"  width="25" alt=" "></td>
                     <td><?= $value->pro_title; ?></td>
                     
                   
                     <td> <?= $value->re_typename; ?></td>
                     <td><?= $value->pro_createdat ; ?></td>
                     <td><?=$user->re_username?></td>
                    
                     

                   
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
                            else if($value->approve_status==2 AND $value->pro_status==0) {
                             ?>
                                <a href="<?php echo site_url("PropertyController/propertyActivate/".$value->pro_id);?>">
                          <button class="btn btn-sm btn-danger"><i class="fa fa-eye"></i>Deactivate</button></a>
                          
                             <?php 
                        }
                         
                         else  if($value->approve_status==1 AND $value->pro_status==1)
                        { 
                        ?>
                       
                         <a href="<?php echo site_url("PropertyController/propertyDeactivate/".$value->pro_id);?>">
                          <button class="btn btn-sm btn-success"><i class="fa fa-eye"></i>Activate</button></a>
                        
                            <?php     
                                 
                         } 
                         
                         }
                          
                     else if($value->pro_status==0 )
                    {
                    ?>
                    <a href="<?php echo site_url("PropertyController/propertyActivate/".$value->pro_id);?>">
                      <button class="btn btn-sm btn-danger"><i class="fa fa-eye"></i>Deactivate</button></a>
                      
                         <?php 
                    }
                     
                     else
                    { 
                    ?>
                   
                     <a href="<?php echo site_url("PropertyController/propertyDeactivate/".$value->pro_id);?>">
                      <button class="btn btn-sm btn-success"><i class="fa fa-eye"></i>Activate</button></a>
                    
                    <?php 
                    } 
                    ?>
                      <?php if($value->availability == 1) {?>
                     <a href="<?php echo site_url("PropertyController/availability/0/".$value->pro_id);?>">
                      <button class="btn btn-sm btn-warning">Sold Out</button></a>
                    <?php } else if($value->availability == 0) {?>
                     <a href="<?php echo site_url("PropertyController/availability/1/".$value->pro_id);?>">
                      <button class="btn btn-sm btn-success">Available</button></a>
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
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  