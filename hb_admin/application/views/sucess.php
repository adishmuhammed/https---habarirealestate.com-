

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php if(!empty($catDetails))
            {
              echo "Edit Category";

            }
            else
            {
                echo "Add Category";
            }?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php if(!empty($catDetails))
            {
              echo "Edit Category";

            }
            else
            {
                echo "Add Category";
            }?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <?php 
                 //var_dump ($this->session->flashdata('status'));exit();
                 if(!empty($this->session->flashdata('status')))
                {

                 ?>
                 <div class="alert alert-sucess">
                  <?= $this->session->flashdata('status'); ?>
                 </div>
                 <?php 
                  }
                   //var_dump ($this->session->flashdata('status'));exit();
                 if(!empty($this->session->flashdata('errorstatus')))
                {

                 ?>
                 <div class="alert alert-sucess" style="color: red;">
                  <?= $this->session->flashdata('errorstatus'); ?>
                 </div>
                 <?php 
                  }
                  ?>
              <div class="card-header">
                <h3 class="card-title"><?php if(!empty($catDetails))
            {
              echo "Edit Category";

            }
            else
            {
                echo "Add Category";
            }?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data" action="<?php echo site_url('UserController/addCategory');?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputTitle">Name</label>
                    <input type="text" name="re_estcatname" value="<?php if(!empty($catDetails))
                    {
                      echo $catDetails['re_estcatname'];
                    }?>" class="form-control" id="exampleInputTitle" placeholder="Enter Name" data-validation="required">
                    <?php echo form_error('re_estcatname', '<div class="error">', '</div>'); 
          ?>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputTitle">ArbicName</label>
                    <input type="text" name="re_estcatname_arb" value="<?php if(!empty($catDetails))
                    {
                     echo $catDetails['re_estcatname_arb']; 
                    } ?>" class="form-control" id="exampleInputTitle" placeholder="Enter Arabic value" data-validation="required">
                    <?php echo form_error('re_estcatname_arb', '<div class="error">', '</div>'); 
          ?>
                  </div>
                  
                  <div class="form-group">
                    <label for="Discription">Description</label>
                    <textarea name="re_estcatdescription"  class="form-control" id="exampleInputDiscription" placeholder="Discription" data-validation="required"><?php if(!empty($catDetails))
                    {
                     echo $catDetails['re_estcatdescription']; 
                    } ?></textarea>
                    <?php echo form_error('re_estcatdescription', '<div class="error">', '</div>'); 
          ?>
                  </div>
                  <div class="form-group">
                    <label for="Discription">ArbicDescription</label>
                    <textarea name="re_estcatdescription_arb"  class="form-control" id="exampleInputDiscription" placeholder="Discription in arabic" data-validation="required"><?php if(!empty($catDetails))
                    {
                     echo $catDetails['re_estcatdescription_arb']; 
                    } ?></textarea>
                    <?php echo form_error('re_estcatdescription_arb', '<div class="error">', '</div>'); 
          ?>
                  </div>
                  
                  
                  
                      <div class="form-group">
                    <label for="exampleInputTitle">Order</label>
                    <input type="number" name="re_estcatorder" value="<?php if(!empty($catDetails))
                    {
                      echo $catDetails['re_estcatorder'];
                    }?>" class="form-control" id="exampleInputTitle" placeholder="Enter order" data-validation="required">
                    <?php echo form_error('re_estcatorder', '<div class="error">', '</div>'); 
          ?>
                  </div>

                      <input type="hidden" name="cId" value="<?php if(!empty($catDetails))
                    {
                      echo $catDetails['re_estcatid'];
                    } ?>">
                    
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer" align="center">
                  <button type="submit" class="btn btn-primary" name="add" ><?php if(!empty($catDetails))
            {
              echo "Edit";

            }
            else
            {
                echo "Add";
            }?></button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- general form elements -->
           
            <!-- /.card -->

            <!-- Input addon -->
           
            <!-- /.card -->
            <!-- Horizontal Form -->
            
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- Form Element sizes -->
            
            <!-- /.card -->

            
            <!-- /.card -->

            <!-- general form elements disabled -->
           
            <!-- /.card -->
            <!-- general form elements disabled -->
            
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  