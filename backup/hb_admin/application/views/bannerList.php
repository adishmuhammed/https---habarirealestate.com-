<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Banner List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Banner List</li>
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
              <a href="<?=base_url()?>Banner/addbanner" >
               <button class="btn btn-secondary action-item" tabindex="0" aria-controls="botble-real-estate-tables-category-table" type="button"><span><span data-action="create"><i class="fa fa-plus"></i> Create</span></span></button>
              </a>
              <div class="card-header">
                <h3 class="card-title">List of added banners</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>IMAGE</th>
                    
                    <th>URL</th>
                    
                    <th>CHANGE STATUS</th>
                    <th>OPERATIONS</th>
                  </tr>
                  </thead>
                  <?php 
                   if(!empty($list)){
                  

                       $i = 1;
                       foreach($list as $value) 
                  {
                     
                     ?>
                  
                     <tr>
                     <td><?=$i?></td>
                     <td><img src="<?=base_url()?>../uploads/upimage/<?= $value->image; ?>"  width="25" alt=" "></td>
                     
                     
                     <td><?= $value->url ; ?></td>
                     <?php 
                     if($value->status==0)
                    {
                    ?>
                    <td>
                    <a href="<?php echo site_url("Banner/testStatus/1/".$value->id);?>">
                      <button class="btn btn-sm btn-success">Activate</button></a>
                    </td>
                      <?php 
                    }
                     
                     else
                    { 
                    ?>
                    <td>
                     <a href="<?php echo site_url("Banner/testStatus/0/".$value->id);?>">
                      <button class="btn btn-sm btn-danger">Deactivate</button></a>
                    </td>
                    <?php 
                    } 
                    ?>
                    <td>
                      <a href="<?php echo site_url("Banner/bannerEdit/".$value->id);?>" class="btn btn-icon btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fa fa-edit"></i></a>
                      
                     <a href="<?php echo site_url("Banner/bannerDelete/".$value->id);?>" class="btn btn-icon btn-sm btn-danger deleteDialog" data-bs-toggle="tooltip" role="button" data-bs-original-title="Delete">
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