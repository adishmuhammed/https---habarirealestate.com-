<div class="container">
<form method="post"  action="<?php echo site_url('LoginController/add_property');?>" enctype="multipart/form-data">
<div class="submit-form">
    <div class="col-md-4">
  <label>Property Name</label>
  <input type="text" name="name"  value="<?php if(!empty($datalist)) {  echo $datalist['pro_title']; }?>"  data-validation="required" >
</div>
  <div class="col-md-2">
  <label>Type</label>
    <select class="form-control select2bs4" data-validation="required"  name="type">
   
        <?php
        foreach($typeList as $value) 
        {
                     
        ?>
      
           <option <?php if(!empty($datalist)){ if( $datalist['re_typeid']==$value->re_typeid){ echo "selected"; }  } ?>  value="<?= $value->re_typeid; ?>"><?= $value->re_typename; ?></option>
      
      <?php 
      }

      ?> 

      </select>
</div>
  <div class="col-md-2">
  <label>Category</label>
    
      <select class="form-control select2bs4" data-validation="required"  name="category">
    
        <?php
        foreach($categoryList as $value) 
        {
                     
        ?>
      
           <option <?php if(!empty($datalist)){ if( $datalist['re_estcatid']==$value->re_estcatid){ echo "selected"; }  } ?>   value="<?= $value->re_estcatid; ?>"><?= $value->re_estcatname; ?></option>
      
      <?php 
      }

      ?> 

      </select>
</div>
<div class="col-md-4">
    <label>Property Type</label>
    <select name="ptype">
        <option <?php if(!empty($datalist)){ if( $datalist['property_type']=="residential"){ echo "selected"; }  } ?>   value="residential">Residential</option>
         <option <?php if(!empty($datalist)){ if( $datalist['property_type']=="commercial"){ echo "selected"; }  } ?>  value="commercial">Commercial</option>
    </select>
    
</div>
  <div class="col-md-12">
  <label>Description</label>
  <textarea type="text" name="description" data-validation="required" ><?php if(!empty($datalist)) {  echo $datalist['pro_description']; }?></textarea>

  </div>
  <div class="col-md-3">
      <label>Number Of Bedrooms</label>
      <input type="text" name="bedroom" value="<?php if(!empty($datalist)) {  echo $datalist['pro_bedroom']; }?>" data-validation="required" >
  </div>
  
   <div class="col-md-3">
      <label>Number Of Bathrooms</label>
      <input type="text" name="bathroom" value="<?php if(!empty($datalist)) {  echo $datalist['pro_bathroom']; }?>" data-validation="required" >
  </div>
  
   <div class="col-md-3">
      <label>Number Of Floors</label>
      <input type="text" name="floor" value="<?php if(!empty($datalist)) {  echo $datalist['pro_floor']; }?>" data-validation="required" >
  </div>
  
   <div class="col-md-3">
      <label>Area (square Meter)</label>
      <input type="text" name="square" value="<?php if(!empty($datalist)) {  echo $datalist['pro_square']; }?>" data-validation="required" >
  </div>
  
        <div class="col-md-12">
  <label>Features</label>

      <?php
      foreach($fList as $value) 
      {
            if(!empty($datalist))
        {
          $feature= explode(',', $datalist['re_featureid'])  ;
        }       
      ?>
       <div class="checkbox-inline">
        <input type="checkbox" name="features[]" id="f<?= $value->re_featureid; ?>" 
        <?php if(!empty($datalist))
        {
          if( in_array($value->re_featureid, $feature)){ echo "checked"; }  
        } ?>  value="<?= $value->re_featureid; ?>"><label for="f<?= $value->re_featureid; ?>"><?= $value->re_featuretitle; ?></label>
       </div>
       <?php 
      }

      ?>
      
</div>
<div class="clearfix"></div>
  <div class="col-md-4">
  <label>Location</label>
  <!--<input type="text" name="location" value="<?php if(!empty($datalist)) {  echo $datalist['pro_location']; }?>"  data-validation="required" >-->
    <select class="form-control select2bs4" data-validation="required"  name="location">
    
        <?php
        foreach($cityList->result() as $value) 
        {
                     
        ?>
      
           <option <?php if(!empty($datalist)){ if( $datalist['city_id']==$value->city_id){ echo "selected"; }  } ?>   value="<?= $value->city_id; ?>"><?= $value->city_name; ?></option>
      
      <?php 
      }

      ?> 

      </select>
</div>
  <div class="col-md-4">
  <label>Latitude</label>
  <input type="text" name="latitude" id="latitude" value="<?php if(!empty($datalist)) {  echo $datalist['pro_latitude']; } ?>"  data-validation="required" readonly>
</div>
  <div class="col-md-4">
  <label>Longitude</label>
  <input type="text" name="longitude" id="longitude" value="<?php if(!empty($datalist)) {  echo $datalist['pro_longitude']; }  ?>"  data-validation="required" readonly>
</div>
<div class="col-md-12">
     <label>Choose Location</label>
			<!--<input type="text" name="LocName" value="Vyttila, Kochi, Kerala, India" id="location" class="form-control"  placeholder="Enter Location" data-validation="required">	-->
    		<div id="maped" style="width: 100%; height: 210px;"></div>	
           <input type="hidden" id="latitude1" value="25.3430485">
			<input type="hidden"id="longitude1" value="50.6572839">

</div>
  <div class="col-md-6">
  <label>Contact</label>
  <input type="text" name="contact" value="<?php if(!empty($datalist)) {  echo $datalist['contact']; }?>"  data-validation="required" >
</div>
  <div class="col-md-6">
  <label>Price</label>
  <input type="text" name="price" value="<?php if(!empty($datalist)) {  echo $datalist['pro_price']; }?>"  data-validation="required" >
</div>

<div class="col-md-12">
    
   <div class="upload__box">
  <div class="upload__btn-box">
    <label class="upload__btn">
      <p>Upload images</p>
      <input type="file" multiple="" name="images[]" data-max_length="20" <?php if(empty($datalist)) { ?> data-validation="required" <?php } ?>  class="upload__inputfile">
    </label>
       <input type="hidden" name="old_proimage" <?php if(!empty($datalist)) { ?> value="<?php echo $datalist['pro_image']; ?>" <?php } ?>>

  </div>
  <div class="upload__img-wrap"></div>
</div>
<div id="resultImage">
     <?php if(!empty($datalist['multi_image']))
      {
      ?>
      <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <?php
         $images=json_decode($datalist['multi_image']); 
       
         if(count($images)>0)
        {
         for($i=0;$i<count($images);$i++)
         { 
           $image_name = $images[$i]->image_name;
		   $image[]=$image_name;
         
         ?>
          
           <img src="<?php echo base_url();?>/uploads/upimage/<?=$images[$i]->image_name ?>" width="100" height="100">
          <a onclick="deleteMultiple(<?=$i?>)" class="mr10 btn-trigger-remove-gallery-image" data-bs-toggle="tooltip" data-placement="bottom" data-bs-original-title="Delete image">
          <i class="fa fa-trash"></i>
          </a>

       <?php  }
       
         $mi = implode(",", $image);	?>
			<input type="hidden" name="old_multiimage" value="<?php echo $mi; ?>" >
    <?php
         }


          ?>

       
        </div>
       </div>
       </div>

      <?php
      }
      ?>
</div>
</div>
<input type="hidden" id="id" name="id" value="<?php if(!empty($datalist)){ echo $datalist['pro_id']; }?>">   
<div class="col-md-12">
  <button type="submit" class="subbtn" name="submit">Submit</button>
  </div>
</form>

</div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<script>
jQuery(document).ready(function () {
  ImgUpload();
});

 $.validate({
      lang: 'en',
      validateOnBlur:false,
      errorMeassagePosition:'inline',
      scrollToTopOnError:true,
      modules : 'file,date,security'
    });
    
function ImgUpload() {
  var imgWrap = "";
  var imgArray = [];

  $('.upload__inputfile').each(function () {
    $(this).on('change', function (e) {
      imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
      var maxLength = $(this).attr('data-max_length');

      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      var iterator = 0;
      filesArr.forEach(function (f, index) {

        if (!f.type.match('image.*')) {
          return;
        }

        if (imgArray.length > maxLength) {
          return false
        } else {
          var len = 0;
          for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i] !== undefined) {
              len++;
            }
          }
          if (len > maxLength) {
            return false;
          } else {
            imgArray.push(f);

            var reader = new FileReader();
            reader.onload = function (e) {
              var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
              imgWrap.append(html);
              iterator++;
            }
            reader.readAsDataURL(f);
          }
        }
      });
    });
  });

  $('body').on('click', ".upload__img-close", function (e) {
    var file = $(this).parent().data("file");
    for (var i = 0; i < imgArray.length; i++) {
      if (imgArray[i].name === file) {
        imgArray.splice(i, 1);
        break;
      }
    }
    $(this).parent().parent().remove();
  });
}
</script>