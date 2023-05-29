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
                     
                     else
                     {
                         echo "No property Found";
                     }
?>
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
                                ?> <div class="hbthumb">
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
                     $catid = $value->re_estcatid;
                     $cond="(re_estcatid='$catid')";
		             $cat=$this->LoginModel->select1('re_estcategory',$cond);
		             $cityid = $value->city_id;
		             $cond="(city_id='$cityid')";
		             $area=$this->LoginModel->select1('re_city',$cond);
                    
                    ?>
                    <h3 class="hprice">QR <?= $value->pro_price;?></h3>
                    <?php if($value->featured==1){ ?>
                    <span class="flabel">Featured</span>
                    <?php } ?>
                    <div  class="hftext">
                    <h4><a href=""><?=$cat->re_estcatname?> / <?=$area->city_name?> </a></h4>
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