<div class="footer" >

    <div class="container margin-auto">
        <div class="row">
    <div class="col-md-6">
<h3>Al Habari Realestate</h3>
      <p>Al Habari group is well experienced in real estate service and property business, though in its infancy in the group and exposed to the ever-growing Qatar’s Real estate Market,</p>
        
    </div>
     <div class="col-md-3">
         <h3>Company</h3>
         <ul>
             <li><a href="<?php echo site_url("LoginController/about");?>">About us</a></li>
              <li><a href="<?php echo site_url("LoginController/service");?>">Our Services</a></li>
              <li><a href="<?php echo site_url("LoginController/terms");?>">Terms & Condition</a></li>
                 <li><a href="<?php echo site_url("LoginController/privacy");?>">Privacy policy</a></li>
                  <li><a href="<?php echo site_url("LoginController/contact");?>">Contact Us</a></li>
         </ul>
         
     </div>
      <div class="col-md-3">
          
          <h3>Follow Us</h3>
          <ul class="social">
              <li><a href=><i class="fa fa-facebook"></i></a></li>
               <li><a href=><i class="fa fa-twitter"></i></a></li> 
               <li><a href=><i class="fa fa-instagram"></i></a></li>
               <li><a href=><i class="fa fa-linkedin"></i></a></li>
          </ul>
      </div>
       
    </div>
    <div class="copy-right">
        <div class="container">
        <p>© 2022 Copyright Al Habari Realestate All right reserved.</p>
            </div>
    </div>
</div>
     <div id="snackbar"> <?php if($this->session->flashdata('feedback')): ?>
              <?php echo $this->session->flashdata('feedback'); ?>
            <?php endif; ?></div>


<script src="<?=base_url()?>assets/js/bootstrap.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.gwmenu.js"></script>
  
    <script src="<?=base_url()?>assets/js/main.js"></script>
    <script src="<?=base_url()?>assets/js/script.js"></script>
   
            <script src='https://maps.google.com/maps/api/js?key=AIzaSyDObnRvQUgAwg9kmZ-uZhZAFe16u2k09OA&sensor=false&libraries=places' type="text/javascript"></script>
      <script src='<?=base_url()?>assets/js/locationpicker.jquery.js' type="text/javascript"></script>
 <script>                               
  $('#maped').locationpicker({
	location: {
		latitude: $.trim($('input#latitude1').val()),
		longitude: $.trim($('input#longitude1').val())
	},
	radius: 0,
	zoom: 15,
	mapTypeId: google.maps.MapTypeId.ROADMAP,
	scrollwheel: true,
	inputBinding: {
		latitudeInput: $('#latitude'),
		longitudeInput: $('#longitude'),
		radiusInput: $('#radius'),
		locationNameInput: $('#location')
	},
	enableAutocomplete: true,
	addressFormat: 'sublocality',
	enableReverseGeocode: true,
	onchanged: function (currentLocation, radius, isMarkerDropped) {
		var mapContext = $(this).locationpicker('map');
		var addressComponents = $(this).locationpicker('map').location.addressComponents;
		var formattedAddress = $(this).locationpicker('map').location.formattedAddress;
		// console.log(formattedAddress);
	}
});

  </script>     
  
 
 

    <script> 
    
    var siteUrl = '<?=site_url()?>';
    
    $('#snackbar').hide();
    
    var owl = $('.pro-img');
        owl.owlCarousel({
            margin: 0,
            loop: true,
            thumbs: true,
        thumbImage: true,
        thumbContainerClass: 'owl-thumbs',
        thumbItemClass: 'owl-thumb-item',
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    margin: 10,
                    dots: true,
                },
                600: {
                    items: 1,
                    dots: true
                },
                1000: {
                    items: 1,
                }
            }
        })</script>
        
 
</body>

</html>
