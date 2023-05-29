<?php

function time_elapsed_string($datetime, $full = false) {
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

 <div class="innerpage item-details">
     <div class="row">
    <div class="container">
     <div class="row">
        
        <div class="col-md-9 pad0">
             <h1><?=$propertyList->pro_title;?></h1>
            <p class="idate">Updated about <?php echo time_elapsed_string($propertyList->pro_createdat); ?></p>
            
         <div class="product-img">

         <?php
                  

         if(!empty($propertyList->multi_image)) {
         $images=json_decode($propertyList->multi_image);
         //print_r($images);

         ?>   
            
        <ul class="pro-img owl-carousel">
         
        <?php
         
        if(count($images)>0)
          {
         for($i=0;$i<count($images);$i++)
         { ?>

        <li><a data-fancybox="hb" href="<?=base_url()?>uploads/upimage/<?=$images[$i]->image_name ?>" ><img  src="<?=base_url()?>uploads/upimage/<?=$images[$i]->image_name ?>"  alt="<?=$propertyList->pro_title;?>" class="full-width"></a></li>
       <?php
             }
         }
         else
         {
            ?>
             <li><img src="<?=base_url()?>assets/img/big-null.jpg" alt="no-image" class="full-width"></li>
       <?php  }
        }
         else
         {
            ?>
             <li><img src="<?=base_url()?>assets/img/big-null.jpg" alt="no-image" class="full-width"></li>
       <?php  }
        ?>

                   
        </ul>
        </div>

        <div class="product-details">
       
            
        <p><?=$propertyList->pro_description;?></p>
         <!--<p><?= $propertyList->pro_content  ;?></p>-->

        </div>
        
        
            
        <div class="fbox">
        <h2>Detail & Features</h2>
                <ul><li>Bedrooms:<?=$propertyList->pro_bedroom;?> Beds</li>
                    <li>Bathrooms:<?=$propertyList->pro_bathroom;?> Bath</li>
                    <li>Square:<?=$propertyList->pro_square;?> m²</li>
                    <li>Floors:<?=$propertyList->pro_floor;?></li>
                    <li>Property Type:
                        <?php
                          foreach($typeList  as $value) 
                          {
                               if( $propertyList->re_typeid==$value->re_typeid)
                               {
                                echo $value->re_typename;
                               }  
                           }           
                          ?>

                    </li>
                </ul>
            
        </div>
      
        
            
        <div class="fec">
        <h2>Amenities</h2>
            <ul>
            <?php
              foreach($fList as $value) 
              {
                
                  $feature= explode(',', $propertyList->re_featureid);
                if( in_array($value->re_featureid, $feature)){

            ?>

                <li><i class="fa fa-check"></i><?= $value->re_featuretitle; ?></li>
            <?php
                  } 

                  }          
            ?>
                 
             </ul>
        </div>
        </div>
         <div class="col-md-3">
            <div class="hsidebar">
              
                
                <h2 class="pricebar">QAR<?=$propertyList->pro_price;?></h2>
                <div class="hcontact">
                <a class="call" href="tel:+974 50945064"><i class="fa fa-phone"></i></a>
                  <a class="whatsapp" href="https://wa.me/97450945064?text=I'm interested in  *<?=$propertyList->pro_title;?>* "><i class="fa fa-whatsapp"></i></a>
                      <a class="whatsapp" href=""><i class="fa fa-share"></i></a>
                </div>
                
                <h3>Location</h3>
                <div class="hmap"> 
                    <a href="">
             <iframe src="//maps.google.com/maps?q=<?=$propertyList->pro_latitude;?>,<?=$propertyList->pro_longitude;?>&z=15&output=embed"></iframe>
                 </a>
                 
                </div>
               
             </div>
        </div>
         
       <div class="clearfix"></div>
         
         <div class="pro-list">
             <h2>See other similar properties</h2>
             <div class="clearfix"></div>
              <ul class="row">
                <?php 
                      $con="(re_estcatid='$propertyList->re_estcatid' AND pro_delete=0)";
	             	$propertyList1=$this->LoginModel->select3('re_property',$con);
                      if(!empty($propertyList1))
                      {

                           $i = 1;
                           foreach($propertyList1 as $value) 
                           {
                         
                ?>
                    <li class="col-md-3">
                    <div class="item">
                        <?php
                        if(empty( $value->pro_image))
                        {
                            ?>
                            <div class="hbthumb">
                            <a href="<?php echo site_url("LoginController/details/".$value->pro_id);?>"> <img src="<?=base_url()?>uploads/upimage/no_image.png" alt="No Image">
                            </div>
                            <?php
                        }
                        else
                        {


                        ?><div class="hbthumb">
                            <a href="<?php echo site_url("LoginController/details/".$value->pro_id);?>"><img src="<?=base_url()?>uploads/upimage/<?= $value->pro_image; ?>" alt="<?= $value->pro_title;?>">
                            </div>
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
                    <h4><a href=""><?=$cat->re_estcatname?> / <?=$area->city_name?></a></h4>
                    <h2><?= $value->pro_title;?></h2>
                     <?php if($value->availability==0){ ?>
                    <button class="btn">Sold Out</button>
                    <?php } ?>
                        <p class="date">1 Day Ago</p>
                        </div>
                        </a>
                    </div>
                    <?php 

                    $i++;  
                    }
                 
                    }

                   ?>
               

                  
                 
            </ul>
             </div>  
        </div>
        
     
     
    </div></div>
    </div>



