<!-- Register Section Start -->
<div class="register-section section mt-90 mb-90">
  <div class="container">
    <div class="row">
      <!-- Register -->
      <div class="col-md-4 margin-auto">
        <div class="registerbox otpbox">
          <h3>OTP Verification</h3>
          <?php if($this->session->flashdata('success_msg')){ ?>
            <div class="otpsuc"><?php echo $this->session->flashdata('success_msg'); ?></div>
          <?php } ?>
          <!-- Register Form -->
          <form action="<?php echo site_url().'/LoginController/smsverify/'; ?>" method="post" autocomplete="off">
            <div class="row">
              <div class="col-12 mb-30">
                <input type="text" name="otp" placeholder="Enter OTP here" data-validation="required">
              </div>
             
              <div class="col-6"><input class="subbtn" type="submit" value="Submit"></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div><!-- Register Section End -->