<!-- Register Section Start -->
<div class="register-section section mt-90 mb-90">
  <div class="container">
    <div class="row">
      <!-- Register -->
      <div class="col-md-8 col-12 d-flex margin-auto">
          <div class="registerleft">  <img class="full-width" src="<?=base_url()?>assets/img/login-side.jpg"></div>
        <div class="registerbox">
          <h3>Create account</h3>
          <?php if($this->session->flashdata('success_msg')){ ?>
            <div style="color:green"><?php echo $this->session->flashdata('success_msg'); ?></div>
          <?php } ?>
          <form action="<?php echo site_url("LoginController/register"); ?>" method="post" autocomplete="off">
            <div class="row">
              <div class="col-12 mb-30">
                <input type="text" name="name" placeholder="Your name here" data-validation="required">
              </div>
              <div class="col-12 mb-30">
                <input type="text" name="mobile" placeholder="Your mobile number here" data-validation="required">
              </div>
              <div class="col-12 mb-30">
                <input type="email" name="email" placeholder="Your email here" data-validation="required email">
              </div>
              <div class="col-12 mb-30">
                <input type="password" name="password" placeholder="Enter passward" data-validation="required">
              </div>
              <div class="col-12 mb-30">
                <input type="password" name="confirm_pswd" placeholder="Confirm password" data-validation="required">
              </div>
              <div class="col-12">
                <input class="subbtn" type="submit" value="register">
              </div>
             
            </div>
          </form>
        </div>
      </div>
      
 
    </div>
  </div>
</div><!-- Register Section End -->