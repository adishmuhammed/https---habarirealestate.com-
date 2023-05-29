

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php if(!empty($featureDetails))
                    {
                      echo "Edit Feature";
                    }
                    else
                      {
                        echo "Add Feature";
                      }
                    ?></h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php if(!empty($featureDetails))
                    {
                      echo "Edit Feature";
                    }
                    else
                      {
                        echo "Add Feature";
                      }
                    ?></li>
              
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
                 //print_r($featureDetails);
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
                <h3 class="card-title"><?php if(!empty($featureDetails))
                    {
                      echo "Edit Form";
                    }
                    else
                      {
                        echo "Add Form";
                      }
                    ?></h3>
                
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data" action="<?php echo site_url('FeatureController/addFeature');?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputTitle">Name</label>
                    <input type="text" name="re_featuretitle" value="<?php if(!empty($featureDetails))
                    {
                      echo $featureDetails['re_featuretitle'];
                    }?>"  class="form-control" id="exampleInputTitle" placeholder="Enter Name" data-validation="required">
                    <?php echo form_error('re_featuretitle', '<div class="error">', '</div>'); 
          ?>
                    
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputTitle">ArbicName</label>
                    <input type="text" name="re_featuretitle_arb" value="<?php if(!empty($featureDetails))
                    {
                      echo $featureDetails['re_featuretitle_arb'];
                    }?>"  class="form-control" id="exampleInputTitle" placeholder="Enter Arabic value" data-validation="required">
                    <?php echo form_error('re_featuretitle_arb', '<div class="error">', '</div>'); 
          ?>
                    
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputTitle">Icon</label>
                    <input type="number" name="re_featureicon" value="<?php if(!empty($featureDetails))
                    {
                      echo $featureDetails['re_featureicon'];
                    }?>" class="form-control" id="exampleInputTitle" placeholder="Enter icon" data-validation="required">
                    <?php echo form_error('re_featureicon', '<div class="error">', '</div>'); 
          ?>
                   
                  </div>

                     <input type="hidden" name="cId" value="<?php if(!empty($featureDetails))
                    {
                      echo $featureDetails['re_featureid'];
                    } ?>"> 
                    
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer" align="center">
                  <button type="submit" class="btn btn-primary" name="add" ><?php if(!empty($featureDetails))
                    {
                      echo "Edit";
                    }
                    else
                      {
                        echo "Add";
                      }
                    ?></button>
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
  