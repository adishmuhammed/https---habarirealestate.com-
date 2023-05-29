<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AL HABARI | ADMIN</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/adminlte.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
      <img src="<?=base_url()?>assets/img/logo.png" alt="AdminLTE Logo" class="brand-image " style="opacity: .8">
  </div>
  <!-- /.login-logo -->
  <div class="card">
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
  ?>

    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      
      <form action="<?php echo site_url("UserController/index");?>" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="re_email" placeholder="Email"   >
          <?php echo form_error('re_email', '<div class="error">', '</div>'); 
          ?>

          
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="re_pswd" placeholder="Password" data-validation="required">
          <?php echo form_error('re_pswd', '<div class="error">', '</div>'); ?>
          
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="signin" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->

<script src="<?=base_url()?>assets/js/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/js/adminlte.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
    $.validate({
      lang: 'en',
      validateOnBlur:false,
      errorMeassagePosition:'inline',
      scrollToTopOnError:true,
      modules : 'file,date,security'
    });
  </script>
<!-- <script src="<?=base_url()?>assets/js/script.js"></script> -->
</body>
</html>
