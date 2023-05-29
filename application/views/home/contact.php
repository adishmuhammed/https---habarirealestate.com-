<div class="contactpage">
<div class="col-md-6 margin-auto">
<div class="col-md-12"><h2>Contact Us</h2></div>
<?php if($this->session->flashdata('feedback')){?> 
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> <?php echo $this->session->flashdata('feedback'); ?>
  </div>
  <?php $this->session->unset_userdata ( 'feedback' );  } ?>
  
   <?php if($this->session->flashdata('error')){?> 
   <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Sorry!</strong>  <?php echo $this->session->flashdata('error'); ?>
  </div>
  
   <?php $this->session->unset_userdata('error'); } ?>
   
<form method="post" action="<?=site_url()?>/LoginController/contact" >
<div class="submit-form">
    <div class="col-md-12">
  <label>Name</label>
  <input type="text" name="name" data-validation="required" >
</div>
     <div class="col-md-6">
  <label>Email</label>
  <input type="text" name="email" data-validation="required" >
</div>
    <div class="col-md-6">
  <label>Phone</label>
  <input type="text" name="phone" data-validation="required" >
</div>
   
        <div class="col-md-12">
  <label>Message</label>
  <textarea name="msg" data-validation="required"></textarea>  
</div>
 <div class="col-md-12">
  <button type="submit" class="subbtn" name="submit">Submit</button>
  </div>
</form>

</div>
</div></div>
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