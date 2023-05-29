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
                    if($propertyList) 
                     {  
                      $id= array();
                      foreach ($propertyList as $value) { 
                         $bedrooms[] =  $value->pro_bedroom;
                         $bathrooms[] =  $value->pro_bathroom;
                         $floors[] =  $value->pro_floor;
                         
                        } 
                     }
?>

 <div class="innerpage product-details-page">
     <div class="row">
    <div class="container">
     <div class="row">
         
         <div class="col-md-3">
              <div class="filter-bar">
                  <h2>Bedrooms</h2>
                  <ul>
                  <?php
                  
                    $bedroom = array_unique($bedrooms);
                    asort($bedroom);
                   foreach($bedroom as $x=>$value){
                ?>
               <li>
                       <div class="form-check">
                       <input class="form-check-input bed" type="checkbox"  name="option1" value="<?=$value?>">
                        <label class="form-check-label"><?=$value?>-Bedroom</label>
                     </div>
                  </li>
                
                <?php }   ?>
                  
              </ul>
                  
              </div>
              
              <div class="filter-bar">
                  <h2>Bathrooms</h2>
                  <ul>
                      <?php
                  
                    $bathroom = array_unique($bathrooms);
                    asort($bathroom);
                    
                   foreach($bathroom as $x=>$value){
                ?>
               <li>
                       <div class="form-check">
                       <input class="form-check-input bath" type="checkbox"  name="option1" value="<?=$value?>">
                        <label class="form-check-label"><?=$value?>-Bathroom</label>
                     </div>
                  </li>
                
                <?php }  ?>
             
                  </ul>
                  
              </div>
              
              <div class="filter-bar">
                  <h2>Floor</h2>
                  <ul>
                      <?php
                  
                    $floor = array_unique($floors);
                    asort($bedroom);
                   foreach($bedroom as $x=>$value){
                ?>
               <li>
                       <div class="form-check">
                       <input class="form-check-input floor" type="checkbox"  name="option1" value="<?=$value?>">
                        <label class="form-check-label"><?=$value?>-Floor</label>
                     </div>
                  </li>
                
                <?php }   ?>
             
                  </ul>
                  
              </div>
              
              <div class="filter-bar">
                  <h2>Property Type</h2>
                  <ul>
                       
                  <li>
                       <div class="form-check">
                       <input class="form-check-input type" type="checkbox"  name="option1" value="residential">
                        <label class="form-check-label">Residential</label>
                      </div>
                  </li>
                  <li>
                       <div class="form-check">
                       <input class="form-check-input type" type="checkbox"  name="option1" value="commercial">
                        <label class="form-check-label">Commercial</label>
                     </div>
                  </li>
                
                  </ul>
                  
              </div>
              
              <div class="filter-bar">
                  <h2>Price</h2>
                  <ul>
                  
               <li>
                      <div class="form-group">
                       <input class="form-control min" type="text"  name="min_price" placeholder="Min Price" width="10" value="">
                     </div>
                     <div class="form-group">
                       <input class="form-control max" type="text"  name="max_price" placeholder="Max Price" width="10" value="">
                       
                     </div>
                  </li>
                
              
                  
              </ul>
                  
              </div>
              
              <div class="filter-bar">
                      <h2>Category</h2>
                    
                    <ul>
                   <?php
                         $cats = $this->db->query("select * from re_estcategory where re_estcatdelete=0");
                         foreach($cats->result() as $value) {
                    ?>
                   
                    <li><div class="form-check">
                      <input type="checkbox" class="category"  name="category" value="<?=$value->re_estcatid?>" />
                      <label for="<?=$value->re_estcatname?>"><?=$value->re_estcatname?></label>
                      </div>
                    </li>

                     <?php }   ?>                        
                    </ul>
                
                </div>
              
                <div class="filter-bar">
                      <h2>Amenities</h2>
                    
                    <ul>
                   <?php
                         $feature = $this->db->query("select * from re_features where re_featuredelete=0 AND re_featurestatus=1");
                         foreach($feature->result() as $value) {
                    ?>
                   
                    <li><div class="form-check">
                      <input type="checkbox" class="amenities"  name="amenities" value="<?=$value->re_featureid?>" />
                      <label for="<?=$value->re_featuretitle?>"><?=$value->re_featuretitle?></label>
                      </div>
                    </li>

                     <?php }   ?>                        
                    </ul>
                
                </div>
            
             
            
             <div class="save_button primary_btn default_button">
                        <button type="submit"  onclick="filter_list();" class="btn">Filter</button>
                </div> 
             
         </div>
  
   <div class="col-md-9">
      
                  <div class="pro-list" id="product">
              <ul class="row">
                <?php if(!empty($propertyList))
                      { 

                       $i = 1;
                       foreach($propertyList as $value) 
                  {
                     
                     ?>
                <li class="col-md-4">
                    
                    <div class="item">
                        <?php
                        if(empty( $value->pro_image))
                            {
                                ?>
                                <div class="hbthumb">
                                <a href="<?php echo site_url("LoginController/details/".$value->pro_id);?>"> <img src="<?=base_url()?>uploads/upimage/no_image.png" alt="<?= $value->pro_title;?>">
                                </div>
                                    <?php
                                }else
                                {


                                ?>
                                 <div class="hbthumb">
                    <a href="<?php echo site_url("LoginController/details/".$value->pro_id);?>"><img src="<?=base_url()?>uploads/upimage/<?= $value->pro_image; ?>" alt="No Image">
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
                    <p class="date"><?php echo time_elapsed_string($value->pro_createdat); ?></p>
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
        </div>
        
       

    </div></div>
  
  
       </div>
  
 
 


   
