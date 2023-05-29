<div class="contactpage">
<div class="col-md-6 margin-auto">
<div class="col-md-12"><h2>Submit for maintenance</h2></div>

<form method="post" >
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
  <label>Property Type</label>
  <input type="text" name="type" data-validation="required" >
</div>
    <div class="col-md-12">
  <label>Maintenance Type</label>
   <div class="checkbox-inline">
     
        <input  type="checkbox" name="mtype[]"  value="Renovation "><label>Renovation</label>
        

      </div> 
      
       <div class="checkbox-inline">
  
         <input type="checkbox" name="mtype[]"  value="Interior "><label>Interior</label>

      </div> 
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