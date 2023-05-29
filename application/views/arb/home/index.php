<div class="main-slider clearfix">
       
            <div class="swiper-container gallery-top" data-aos="fade-up" data-aos-duration="500">
                <div class="swiper-wrapper">
                 
                  
               <?php if(!empty($banner)){
                   
             foreach($banner as $value)
             
             {  ?>
                    <div class="swiper-slide">
                     
                       
                   <img src="<?=base_url()?>uploads/upimage/<?=$value->image?>" class="full-width" alt="Habari">
                       
                    </div>
                    
                    <?php } } ?>
                    
                       
                </div>


            </div>
            <div class="swiper-controller">
 <div class="swiper-pagination"></div>
            </div>   <div class="container">
            <div class="topsearch">
 
        <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#rent">إيجار</a></li>
  <li><a data-toggle="tab" href="#sell">يبيع</a></li>
  <li><a data-toggle="tab" href="#lease">إيجار</a></li>

    <li><a data-toggle="tab" href="#camp">معسكر العمل</a></li>
</ul>

<div class="tab-content">
  <div id="rent" class="tab-pane fade in active">
     <form method="post" action="<?=site_url()?>/LoginController/search/rent">
       <div class="searchtab">
        <div class="col-md-9 ">
            <div class="row">
          <div class="col-md-8">   
          <!--<input type="text" class="form-control" placeholder="Location" id="inputSuccess">-->
          <select class="form-control select2bs4"   name="location">
         <option >Select</option>
        <?php
        foreach($cityList->result() as $value) 
        {
                     
        ?>
      
           <option    value="<?= $value->city_id; ?>"><?= $value->city_name; ?></option>
      
      <?php 
      }

      ?> 

      </select>
      <span class="form-control-feedback"><i class="la la-map-marker"></i></span></div> 
      <div class="col-md-4">
          

  <select class="form-control" name="type" id="">
    <option value="residential">سكني</option>
    <option value="commercial">تجاري</option>
    
  </select>
</div>

<div class="col-md-3">
            <input type="text" name="bed" class="form-control" placeholder="Bedrooms" >

  <!--<select class="form-control" id="">-->
  <!--  <option value="">Bedrooms</option>-->
  <!--  <option value="1">1</option>-->
  <!--  <option value="2">2</option>-->
    
  <!--</select>-->
</div>
<div class="col-md-3">
            <input type="text" name="bath" class="form-control" placeholder="Bathrooms" >

  <!--<select class="form-control" id="">-->
  <!--  <option value="">Bathrooms</option>-->
  <!--  <option value="1">1</option>-->
  <!--  <option value="2">2</option>-->
    
  <!--</select>-->
</div>
<div class="col-md-3">
  <input type="text" name="min_price" class="form-control" placeholder="Min Price" >
  <!--<select class="form-control" id="">-->
  <!--  <option value="">Min Price</option>-->
  <!--  <option value="1">1</option>-->
  <!--  <option value="2">2</option>-->
    
  <!--</select>-->
</div>
<div class="col-md-3">
      <input type="text" name="max_price" class="form-control" placeholder="Max Price" >

  <!--<select class="form-control" id="">-->
  <!--  <option value="">Max Price</option>-->
  <!--  <option value="1">1</option>-->
  <!--  <option value="2">2</option>-->
    
  <!--</select>-->
</div>

        </div>
    </div>
    <div class="col-md-3">
        <div class="searchbar bl">
        <h3><?=$rent?><span>نتائج</span></h3>
        
        <button class="btn searchbtn" type="submit">بحث</button>
        </div>
    </div>
    </div>
    </form>
  </div>
  <div id="sell" class="tab-pane fade">
   <form method="post" action="<?=site_url()?>/LoginController/search/sell">
    <div class="searchtab">
        <div class="col-md-9 ">
            <div class="row">
          <div class="col-md-8">    
          <!--<input type="text" class="form-control" placeholder="Location" id="inputSuccess">-->
          <select class="form-control select2bs4"   name="location2">
    
            <?php
            foreach($cityList->result() as $value) 
            {
                         
            ?>
          
               <option    value="<?= $value->city_id; ?>"><?= $value->city_name; ?></option>
          
          <?php 
          }
    
          ?> 

      </select>
      <span class="form-control-feedback"><i class="la la-map-marker"></i></span></div> 
      <div class="col-md-4">
          

   <select class="form-control" name="type2" id="">
    <option value="residential">سكني</option>
    <option value="commercial">تجاري</option>
    
  </select>
</div>

<div class="col-md-3">
   <input type="text" class="form-control" name="min_bed2" placeholder="Min Bed" >

  <!--<select class="form-control" id="">-->
  <!--  <option value="">Min Bed</option>-->
  <!--  <option value="1">1</option>-->
  <!--  <option value="2">2</option>-->
    
  <!--</select>-->
</div>
<div class="col-md-3">
       <input type="text" class="form-control" name="max_bed2" placeholder="Max Bed" >

  <!--<select class="form-control" id="">-->
  <!--  <option value="">Max Bed</option>-->
  <!--  <option value="1">1</option>-->
  <!--  <option value="2">2</option>-->
    
  <!--</select>-->
</div>
<div class="col-md-3">
   <input type="text" class="form-control" name="min_price2" placeholder="Min Price" >

  <!--<select class="form-control" id="">-->
  <!--  <option value="">Min Price</option>-->
  <!--  <option value="1">1</option>-->
  <!--  <option value="2">2</option>-->
    
  <!--</select>-->
</div>
<div class="col-md-3">
 <input type="text" class="form-control" name="max_price2" placeholder="Max Price" >

  <!--<select class="form-control" id="">-->
  <!--  <option value="">Max Price</option>-->
  <!--  <option value="1">1</option>-->
  <!--  <option value="2">2</option>-->
    
  <!--</select>-->
</div>

        </div>
    </div>
    <div class="col-md-3">
        <div class="searchbar bl">
        <h3><?=$sale?><span>نتائج</span></h3>
        
        <button class="btn searchbtn" type="submit">بحث</button>
        </div>
    </div>
    </div>
    </form>
  </div>
  <div id="lease" class="tab-pane fade">
   <form method="post" action="<?=site_url()?>/LoginController/search/lease">
    <div class="searchtab">
        <div class="col-md-9 ">
            <div class="row">
          <div class="col-md-8">    
          <!--<input type="text" class="form-control" placeholder="Location" id="inputSuccess">-->
          <select class="form-control select2bs4"   name="location3">
            
            <?php
            foreach($cityList->result() as $value) 
            {
                         
            ?>
          
               <option    value="<?= $value->city_id; ?>"><?= $value->city_name; ?></option>
          
          <?php 
          }
    
          ?> 

      </select>
      <span class="form-control-feedback"><i class="la la-map-marker"></i></span></div> 
      <div class="col-md-4">
          

  <select class="form-control" name="type3" >
    <option value="Residential">سكني</option>
    <option value="Commercial">تجاري</option>
    
  </select>
</div>

<div class="col-md-3">
   <input type="text" class="form-control" name="min_bed3" placeholder="Min Bed" >

  <!--<select class="form-control" id="">-->
  <!--  <option value="">Min Bed</option>-->
  <!--  <option value="1">1</option>-->
  <!--  <option value="2">2</option>-->
    
  <!--</select>-->
</div>
<div class="col-md-3">
       <input type="text" class="form-control" name="max_bed3" placeholder="Max Bed" >

  <!--<select class="form-control" id="">-->
  <!--  <option value="">Max Bed</option>-->
  <!--  <option value="1">1</option>-->
  <!--  <option value="2">2</option>-->
    
  <!--</select>-->
</div>
<div class="col-md-3">
   <input type="text" class="form-control" name="min_price3" placeholder="Min Price" >

  <!--<select class="form-control" id="">-->
  <!--  <option value="">Min Price</option>-->
  <!--  <option value="1">1</option>-->
  <!--  <option value="2">2</option>-->
    
  <!--</select>-->
</div>
<div class="col-md-3">
 <input type="text" class="form-control" name="max_price3" placeholder="Max Price" >

  <!--<select class="form-control" id="">-->
  <!--  <option value="">Max Price</option>-->
  <!--  <option value="1">1</option>-->
  <!--  <option value="2">2</option>-->
    
  <!--</select>-->
</div>

        </div>
    </div>
    <div class="col-md-3">
        <div class="searchbar bl">
        <h3><?=$lease?><span>نتائج</span></h3>
        
        <button class="btn searchbtn" type="submit">بحث</button>
        </div>
    </div>
    </div>
    </form>
  </div>
  
  
  
    <div id="camp" class="tab-pane fade">
         <form method="post" action="<?=site_url()?>/LoginController/search/camp">
    <div class="searchtab">
        <div class="col-md-9 ">
            <div class="row">
          <div class="col-md-8">    
          <!--<input type="text" class="form-control" placeholder="Location" id="inputSuccess">-->
          <select class="form-control select2bs4"   name="location3">
            
            <?php
            foreach($cityList->result() as $value) 
            {
                         
            ?>
          
               <option    value="<?= $value->city_id; ?>"><?= $value->city_name; ?></option>
          
          <?php 
          }
    
          ?> 

      </select>
      <span class="form-control-feedback"><i class="la la-map-marker"></i></span></div> 
    
<div class="col-md-4">
   <input type="text" class="form-control" name="bed4" placeholder="Rooms" >

</div>

<div class="col-md-6">
   <input type="text" class="form-control" name="min_price4" placeholder="Min Price" >

</div>
<div class="col-md-6">
 <input type="text" class="form-control" name="max_price4" placeholder="Max Price" >

</div>

        </div>
    </div>
    <div class="col-md-3">
        <div class="searchbar bl">
        <h3><?=$camp?><span>نتائج</span></h3>
        
        <button class="btn searchbtn" type="submit">بحث</button>
        </div>
    </div>
    </div>
    </form>

  </div>
</div>
        
    </div>
    
</div>
        </div>
 


   
 <div class="home-category" data-aos="fade-up" data-aos-duration="500">
    <div class="container">
         <div class="row">
        <h1>خصائص مميزة</h1>

     
            <ul class="home-featured owlcarousel">
                <?php if(!empty($featuredList))
                    {

                        $i = 1;
                        foreach($featuredList as $value)
                        {
                     
                ?>
                        <li class="col-md-3">
                        <?php if(empty( $value->pro_image))
                       
                        {
                        ?>

                            <a href="<?php echo site_url("LoginController/details/".$value->pro_id);?>"> <img src="<?=base_url()?>uploads/upimage/no_image.png" width="250px" height="255px"alt="">
                            <?php
                        }
                        else
                        {


                        ?>
                           
                            <a href="<?php echo site_url("LoginController/details/".$value->pro_id);?>"><img src="<?=base_url()?>uploads/upimage/<?= $value->pro_image; ?>" width="250px" height="255px"alt="">
                        <?php
                        }
                        ?>
           
                      <?php 
                     $cond="(re_estcatid='$value->re_estcatid')";
		             $cat=$this->LoginModel->select1('re_estcategory',$cond);
		             
		             $cond="(city_id='$value->city_id')";
		             $area=$this->LoginModel->select1('re_city',$cond);
                    
                    ?>
                    <h3 class="hprice">QR <?= $value->pro_price;?></h3>
                    <?php if($value->featured==1){ ?>
                    <span class="flabel">Featured</span>
                    <?php } ?>
                    <div  class="hftext">
                    <h4><a href=""><?=$cat->re_estcatname?> / <?=$area->city_name?> / Qatar</a></h4>
                    <h2><?= $value->pro_title;?></h2>
                     <?php if($value->availability==0){ ?>
                    <button class="btn">Sold Out</button>
                    <?php } ?>
                   
                    <p class="date"><?php echo time_elapsed_string($value->pro_createdat); ?></p>
                        </div>
                    </a>
               
                        </li>
                 <?php

                    $i++;  
                    }
                 
                }

                ?>
                 
                 
               
                 
            </ul>
                 
       
        </div></div>
    </div>

   
   
   
    <div class="home-mid-section">
   <div class="mid-content">
        <div class="mid-right">
       <img src="<?=base_url()?>/assets/img/mid-img.png" alt="">
       </div>
       <div class="container">
       <h3>Sell your best <br>
       Cozy Place
       </h3></div>
       <div class="mid-foot">
           
       <div class="container">
           <h2>We provide a complete service for the sale, <br>purchase or rental of real estate.</h2>
             <a class="btns" href="<?php echo site_url("LoginController/contact");?>">Contact Us</a>
           </div>
        </div>
   
    </div>  </div>
   
       <div  class="home-welcome-section"  data-aos="fade-down" data-aos-duration="500">
             
           
             
                        <div class="container">  
<div class="row">
                <div class="col-md-4" data-aos="fade-right" data-aos-duration="500">
                           <img src="<?=base_url()?>assets/img/home-about.png" class="full-width" alt="">
                           
                            </div>
     <div class="col-md-8"  data-aos="fade-left" data-aos-duration="1000">
   <div class="bl">
         <h3>About Us</h3>
                 
         <div class="clearfix"></div>
         <h2>Helping People to Find their Home</h2>
             <p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
</p>
             
         <a href="<?php echo site_url("LoginController/about");?>" class="btn readmore">Know more</a>
                   </div>     </div>
             
         
        </div>
       
   
        </div>
    </div>
    <div class="clearfix"></div>
 
 <div class="home-bottom">
    <div class="container">
     <div class="home-sub">
         <div class="container">
       
         <h2>Looking to Buy/Rent a new property <br>or Sell an existing one?</h2>
           
            <p> Al Habari provides an awesome solution! </p>
         <div class="btn-wrap">
    <a class="btns" href="<?=site_url()?>/LoginController/add_property">Submit Property</a>
               <a class="btns" href="<?=site_url()?>/LoginController/menu">Browse Properties</a>
             </div>
         
       
         </div>
       
        </div>
     </div>
    </div>
 
     <div  class="home-reviews">
    <div class="container">
        <p>Client Reviews</p>
        <h2>What our Customer Saying</h2>
        <ul class="owlcarousel reviews">
            
            <?php if(!empty($test)){
             foreach($test as $value)
             { ?>
           <li>
            <i class="fa fa-quote-right"></i>
           
            <p><?=$value->re_testcontent?></p>
            <h3><?=$value->re_testname?></h3>
           
           </li>
           <?php } } ?>
             
        </ul>
       
        </div>
    </div>
   
<?php function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
 ?>
 
    </div>
    <script src="<?=base_url()?>assets/js/bootstrap.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.gwmenu.js"></script>
   
    <script src="<?=base_url()?>assets/js/homeslider.js"></script>
    <script>
        AOS.init();
        var galleryTop = new Swiper('.gallery-top', {
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            spaceBetween: 0,
            loop: true,
            effect: 'fade',
            autoplay: true,
            speed: 1600,
            loopedSlides: 5, //looped slides should be the same    
            pagination: '.swiper-pagination',
            paginationClickable: true,
            /* direction: 'vertical',*/
            /* parallax: false,*/
            autoplay: 1600
        });


         var owl = $('.home-featured');
        owl.owlCarousel({
            margin: 15,
            loop: true,
            autoplay: false,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            dots: false,
            responsive: {
                0: {
                    items: 2,
                    margin: 10,
                    dots: true,
                },
                600: {
                    items: 2,
                    dots: true
                },
                1000: {
                    items: 4,
                }
            }
        })
       
       
         var owl = $('.reviews');
        owl.owlCarousel({
            margin: 30,
            loop: true,
            autoplay: false,
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
                    items:3,
                }
            }
        })
       
       
       
       
       
    </script>
</body>

</html>