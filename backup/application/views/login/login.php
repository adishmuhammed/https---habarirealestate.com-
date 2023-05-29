<!-- Login Section Start -->
<div class="login-section section mt-90 mb-90">
  <div class="container">
    <div class="row">
      <!-- Login -->
      <div class="col-md-8 col-12 margin-auto">
          <div class="login-left ">
              <img class="full-width" src="<?=base_url()?>assets/img/login-side.jpg">
              
          </div>
        <div class="loginbox">
          <h3>Sign-In</h3>
           <?php if($this->session->flashdata('success_msg')){ ?>
            <div style="color:green" class="success-msg"><?php echo $this->session->flashdata('success_msg'); ?></div>
          <?php } ?>
           <?php if($this->session->flashdata('error_msg')){ ?>
            <div class="error-msg"><?php echo $this->session->flashdata('error_msg'); ?></div>
          <?php } ?>
          <form action="<?php echo site_url().'/LoginController/signin/'; ?>" method="post" autocomplete="off">
            <div class="row">
              <div class="col-12">
                <input type="text" name="email" placeholder="Email ID" data-validation="required">
              </div>
              <div class="col-12">
                <input type="password" name="password" placeholder="Passward" data-validation="required">
              </div>
              <div class="col-12">
               
                <a class="fpass" href="">Forgot Password?</a>
              </div>
              <div class="col-12"><input class="subbtn" type="submit" value="LOGIN"></div>
            </div>
          </form>
          <h4>Don’t have account? please click <a href="<?php echo site_url().'/LoginController/register_view/'; ?>">Register</a></h4>
        </div>
      </div>
     
      <!-- Login With Social -->
      <!--<div class="col-md-5 col-12 d-flex">
        <div class="ee-social-login">
          <h3>Also you can login with...</h3>
          <a href="#" class="facebook-login">Login with <i class="fa fa-facebook"></i></a>
          <a href="#" class="twitter-login">Login with <i class="fa fa-twitter"></i></a>
          <a href="#" class="google-plus-login">Login with <i class="fa fa-google-plus"></i></a>
        </div>
      </div>-->
    </div>
  </div>
</div><!-- Login Section End -->