<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category List</li>
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
              <a href="<?=base_url()?>UserController/addCategory" >
               <button class="btn btn-secondary action-item" tabindex="0" aria-controls="botble-real-estate-tables-category-table" type="button"><span><span data-action="create"><i class="fa fa-plus"></i> Create</span></span></button>
              </a>
              <div class="card-header">
                <h3 class="card-title">List of added categories</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>PARENT</th>
                    <th>CREATED AT</th>
                    
                    <th>STATUS</th>
                    <th>OPERATIONS</th>
                  </tr>
                  </thead>
                  <?php if($categoryList->num_rows() >0)
                      {

                       $i = 1;
                       foreach($categoryList->result() as $value) 
                  {
                     
                     ?>
                     <tr>
                     <td><?=$i?></td>
                     <td><?= $value->re_estcatname; ?></td>
                     <!--
                     <td><?= $value->re_estcatname_arb ; ?></td>
                     <td><?= $value->re_estcatdescription; ?></td>
                     <td><?= $value->re_estcatdescription_arb ; ?></td>                     
                     <td><?= $value->re_estcatorder ; ?></td>
                   -->
                     <td><?= $value->re_estcatparent ; ?></td>
                     <td><?= $value->re_estcatcreatedat ; ?></td>
                     
                    
                     

                     <?php 
                     if($value->re_estcatstatus_db==0)
                    {
                    ?>
                    <td>
                    <a href="<?php echo site_url("UserController/categoryActivate/".$value->re_estcatid);?>">
                      <button class="btn btn-sm btn-danger"><i class="fa fa-eye"></i>Deactivate</button></a>
                    </td>
                      <?php 
                    }
                     
                     else
                    { 
                    ?>
                    <td>
                     <a href="<?php echo site_url("UserController/categoryDeactivate/".$value->re_estcatid);?>">
                      <button class="btn btn-sm btn-success"><i class="fa fa-eye"></i>Activate</button></a>
                    </td>
                    <?php 
                    } 
                    ?>
                     <td>
                      <a href="<?php echo site_url("UserController/categoryEdit/".$value->re_estcatid);?>" class="btn btn-icon btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fa fa-edit"></i></a>
                      
                     <a href="<?php echo site_url("UserController/categoryDelete/".$value->re_estcatid);?>" class="btn btn-icon btn-sm btn-danger deleteDialog" data-bs-toggle="tooltip" role="button" data-bs-original-title="Delete">
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