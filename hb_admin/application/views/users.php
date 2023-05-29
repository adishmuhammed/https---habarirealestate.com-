<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users List</li>
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
              <!--<a href="<?=base_url()?>FacilityController/addFacility" >-->
              <!-- <button class="btn btn-secondary action-item" tabindex="0" aria-controls="botble-real-estate-tables-category-table" type="button"><span><span data-action="create"><i class="fa fa-plus"></i> Create</span></span></button>-->
              <!--</a>-->
              <div class="card-header">
                <h3 class="card-title">List of registered Users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>Email</th>
                    <th>Phone</th>
                    
                    <th>Change Status</th>
                  </tr>
                  </thead>
                  <?php 
                   if(!empty($dataList))
                   {
                  

                       $i = 1;
                       foreach($dataList as $value) 
                  {
                     
                     ?>
                  
                     <tr>
                     <td><?=$i?></td>
                     <td><?= $value->re_username; ?></td>
                     
                     <td><?= $value->re_email ; ?></td>
                     <td><?= $value->re_mobile ; ?></td>
                       <?php 
                     if($value->re_status==0)
                    {
                    ?>
                    <td>
                    <a href="<?php echo site_url("UserController/userStatus/1/".$value->re_id);?>">
                      <button class="btn btn-sm btn-success"><i class="fa fa-eye"></i>Activate</button></a>
                    </td>
                      <?php 
                    }
                     
                     else
                    { 
                    ?>
                    <td>
                     <a href="<?php echo site_url("UserController/userStatus/0/".$value->re_id);?>">
                      <button class="btn btn-sm btn-danger"><i class="fa fa-eye"></i>Deactivate</button></a>
                    </td>

                    <?php 
                    } 
                    ?>
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