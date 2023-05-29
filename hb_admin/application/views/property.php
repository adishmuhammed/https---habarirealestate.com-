

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php if(!empty($proDetails))
            {
              echo "Edit Property";

            }
            else
            {
                echo "Add Property";
            }?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php if(!empty($proDetails))
            {
              echo "Edit Property";

            }
            else
            {
                echo "Add Property";
            }?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <?php 
                 //var_dump ($this->session->flashdata('status'));exit();
              if(!empty($this->session->flashdata('status')))
              {

                ?>
                  <div class="alert alert-sucess">
                  <?= $this->session->flashdata('status'); ?>
                  </div>
                 <?php 
                }
                   //var_dump ($this->session->flashdata('status'));exit();
                if(!empty($this->session->flashdata('errorstatus')))
                {

                ?>
                  <div class="alert alert-sucess" style="color: red;">
                  <?= $this->session->flashdata('errorstatus'); ?>
                  </div>
                <?php 
                }
                ?>
              
              <div class="card-header">
                <h3 class="card-title"><?php if(!empty($proDetails))
            {
              echo "Edit Form";

            }
            else
            {
                echo "Add Form";
            }?></h3>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
  <form method="POST" enctype="multipart/form-data" action="<?php echo site_url('PropertyController/addPropertypost');?>" enctype="multipart/form-data">

  <div class="card-body">
    <div class="form-group">
      <label for="exampleInputTitle">Name</label>
      <input type="text" name="pro_title" value="<?php if(!empty($proDetails))
      {
        echo $proDetails['pro_title'];

      }?>"  class="form-control" id="exampleInputTitle" placeholder="Enter Name" data-validation="required">
        <?php echo form_error('pro_title', '<div class="error">', '</div>');?>
    </div>
                  
    <div class="form-group">
      <label for="exampleInputTitle">ArbicName</label>
      <input type="text" name="pro_title_arb"  value="<?php if(!empty($proDetails))
      {
        echo $proDetails['pro_title_arb'];

      }?>"  class="form-control" id="exampleInputTitle" placeholder="Enter Arabic value" data-validation="required">
      <?php echo form_error('pro_title_arb', '<div class="error">', '</div>');?>
    </div>
                  
    <div class="form-group">
      <label for="Discription">Description</label>
      <textarea name="pro_description"   class="form-control" id="exampleInputDiscription" placeholder="Discription" data-validation="required"><?php if(!empty($proDetails))
      {
        echo $proDetails['pro_description'];

      }?></textarea>
      <?php echo form_error('pro_description', '<div class="error">', '</div>');?>
    </div>

    <div class="form-group">
      <label for="Discription">ArbicDescription</label>
      <textarea name="pro_description_arb"    class="form-control" id="exampleInputDiscription" placeholder="Discription in arabic" data-validation="required"><?php if(!empty($proDetails))
      {
        echo $proDetails['pro_description_arb'];

      }?></textarea>
      <?php echo form_error('pro_description_arb', '<div class="error">', '</div>');?>
    </div>

    <div class="form-group">
      <label for="Discription">Content</label>
      <textarea name="pro_content"  class="form-control" id="exampleInputDiscription" placeholder="content " > <?php if(!empty($proDetails))
      {
        echo $proDetails['pro_content'];

      }?></textarea>
      <?php echo form_error('pro_content', '<div class="error">', '</div>');?>
    </div>

   <div class="form-group">
      <label for="images">Featured Image</label>
      <input type="file" class="form-control" name="pro_image" id="customFile" data-validation="mime"  data-validation-allowing="jpeg,jpg,png"  data-validation-error-msg-mime="You can upload only allowed types jpeg,jpg,png"> 
      <?php if(!empty($proDetails))
      {
        ?>
       <img src= <?php echo base_url();?>../uploads/upimage/<?=$proDetails['pro_image']?> width="100px" height="100px">
     <?php }?>
    <!--   <?php echo form_error('pro_image', '<div class="error">', '</div>');?> -->
    <input type="hidden" name="old_proimage" <?php if(!empty($proDetails)) { ?> value="<?php echo $proDetails['pro_image']; ?>" <?php } ?>>

    </div>
    <div class="form-group">
      <label for="images">Multiple Image</label>
      <input type="file" class="form-control" name="multi_name[]" multiple="multiple" id="customFile" data-validation="mime"  data-validation-allowing="jpeg,jpg,png"  data-validation-error-msg-mime="You can upload only allowed
      types jpeg,jpg,png">
     
    <!--   <?php echo form_error('multi_name', '<div class="error">', '</div>');?> -->
     <?php ?>
    <!--<input type="hidden" name="old_multiname" <?php if(!empty($multiDetails)) { ?> value="<?php echo $multiDetails['multi_name']; ?>" <?php } ?>>-->


<div id="resultImage">
     <?php if(!empty($proDetails['multi_image']))
      {
        //$this->session->set_userdata('old_multiname',$multiDetails['multi_name']);
      ?>
      <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <?php
         $images=json_decode($proDetails['multi_image']); 
        // print_r($multiDetails['multi_name']);
       // print_r(json_decode($multiDetails['multi_name']));exit;
         if(count($images)>0)
    {
         for($i=0;$i<count($images);$i++)
         { 
          $image_name = $images[$i]->image_name;
		   $image[]=$image_name;
         ?>
          
           <img src="<?php echo base_url();?>../uploads/upimage/<?=$images[$i]->image_name ?>" width="100" height="100">
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




    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="Discription">Country</label>
          <select class="form-control select2bs4" style="width: 100%;"data-validation="required" 
          name="country_name" id="cid" value="<?php if(!empty($proDetails))
      {
        echo $proDetails['country_name'];

      }?>">
          <option value="">Select</option>
          <?php
          foreach($countryList->result() as $value) 
          {
            if( $value->country_name == "QATAR")   {      
          ?>
      
          <option <?php if(!empty($proDetails))
          {
            if( $proDetails['country_id']==$value->country_id){ echo "selected"; }  } ?> value="<?= $value->country_id ?>"><?= $value->country_name ; ?></option>
      
          <?php 
          } }

          ?> 
          </select>
         
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="Discription">Area</label>

         
          <select class="form-control select2bs4" style="width: 100%;"data-validation="required" name="city_name" id="tid">

        <?php
        if(!empty($proDetails))
        {
            //$data=$this->UserModel->selectCity($this->input->post('value'))->result();
          $cond="(city_id=".$proDetails['city_id'].")";


           $data=$this->UserModel->select2('re_city',$cond);

          if( empty($data) ==false)
          { ?>

            

            <option value="<?=$data['city_id']?>"><?=$data['city_name']?></option>
         
         
           
         <?php   
       } 
     } 
      else
      {
          
      ?>

        <option value=""> Select </option>

      <?php } ?>
          
         
          </select>
         <?php echo form_error('city_name', '<div class="error">', '</div>');?>
        </div>
      </div>
    </div>

    <!--<div class="form-group">-->
    <!--  <label for="Discription">Property Location</label>-->
    <!--  <input type="text" name="pro_location"  class="form-control" id="exampleInputTitle" placeholder="Property Location" >-->
    <!--</div>-->


    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="Discription">Latitude</label>
          <input type="text" name="pro_latitude" value="<?php if(!empty($proDetails))
      {
        echo $proDetails['pro_latitude'];

      }?>"  class="form-control" id="exampleInputTitle" placeholder="Latitude" >
          <?php echo form_error('pro_latitude', '<div class="error">', '</div>'); ?>
            <a class="help-block" href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank" rel="nofollow">
            Go here to get Latitude from address. 
            </a>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="Discription">Longitude</label>
          <input type="text" name="pro_longitude"  value="<?php if(!empty($proDetails))
      {
        echo $proDetails['pro_longitude'];

      }?>" class="form-control" id="exampleInputTitle" placeholder="Longitude" >
          <?php echo form_error('pro_longitude', '<div class="error">', '</div>'); ?>
          <a class="help-block" href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank" rel="nofollow">
          Go here to get Longitude from address. </a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="Discription">Number bedrooms</label>
          <input type="number" name="pro_bedroom" value="<?php if(!empty($proDetails))
      {
        echo $proDetails['pro_bedroom'];

      }?>"  class="form-control" id="exampleInputTitle" placeholder="Number Bedrooms" data-validation="required">
          <?php echo form_error('pro_bedroom', '<div class="error">', '</div>'); ?>
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="Discription">Number bathrooms</label>
          <input type="number" name="pro_bathroom" value="<?php if(!empty($proDetails))
      {
        echo $proDetails['pro_bathroom'];

      }?>" class="form-control" id="exampleInputTitle" placeholder="Number bathrooms" data-validation="required">
          <?php echo form_error('pro_bathroom', '<div class="error">', '</div>');?>
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="Discription">Number floors</label>
          <input type="number" name="pro_floor" value="<?php if(!empty($proDetails))
      {
        echo $proDetails['pro_floor'];

      }?>" class="form-control" id="exampleInputTitle" placeholder="Number floors" data-validation="required">
          <?php echo form_error('pro_floor', '<div class="error">', '</div>');?>
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="Discription">Square(m2)</label>
          <input type="number" name="pro_square" value="<?php if(!empty($proDetails))
      {
        echo $proDetails['pro_square'];

      }?>" class="form-control" id="exampleInputTitle" placeholder="square:unit" data-validation="required">
          <?php echo form_error('pro_square', '<div class="error">', '</div>');?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="Discription">price</label>
          <input type="text" name="pro_price" value="<?php if(!empty($proDetails))
      {
        echo $proDetails['pro_price'];

      }?>" class="form-control" id="exampleInputTitle" placeholder="price" data-validation="required">
          <?php echo form_error('pro_price', '<div class="error">', '</div>'); ?>
        </div>
      </div>


      <div class="col-md-4">
        <div class="form-group">
          <label for="Discription">Currency</label>
            <input type="text" name="pro_currency" value="QAR" class="form-control" id="exampleInputTitle"  readonly>

          <?php echo form_error('pro_currency', '<div class="error">', '</div>');?>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="Discription">Period</label>
          <select class="form-control select2bs4" style="width: 100%;" name="pro_period">
          <option value=""></option>
          <option  <?php if(!empty($proDetails))
          {
            if( $proDetails['pro_period']=="Day"){ echo "selected" ; }  } ?> value="Day">Day</option>
          <option <?php if(!empty($proDetails))
          {
            if( $proDetails['pro_period']=="Month"){ echo "selected" ; }  } ?> value="Month">Month</option>
          <option <?php if(!empty($proDetails))
          {
            if( $proDetails['pro_period']=="year"){ echo "selected" ; }  } ?> value="year">Year</option>
          </select>
                  
          <?php echo form_error('pro_period', '<div class="error">', '</div>');?>
        </div>
      </div>
    </div>


    
  <div class="form-group">
    <label>category</label>
    
      <select class="form-control select2bs4" style="width: 100%;"data-validation="required"  name="re_estcatname">
      <option>Select</option>
        <?php
        foreach($categoryList->result() as $value) 
        {
                     
        ?>
      
           <option <?php if(!empty($proDetails))
          {
            if( $proDetails['re_estcatid']==$value->re_estcatid){ echo "selected"; }  } ?> value="<?= $value->re_estcatid; ?>"><?= $value->re_estcatname; ?></option>
      
      <?php 
      }

      ?> 

      </select>
      <?php echo form_error('re_estcatname', '<div class="error">', '</div>'); ?>
    </div>

    <div class="form-group">
      <label>Types</label>
      <select class="form-control select2bs4" style="width: 100%;"data-validation="required" name="re_typename">
      <option>Select</option>
      <?php
      foreach($typeList->result() as $value) 
      {
                     
      ?>
      
            <option <?php if(!empty($proDetails))
          {
            if( $proDetails['re_typeid']==$value->re_typeid){ echo "selected"; }  } ?> value="<?= $value->re_typeid; ?>"><?= $value->re_typename; ?></option>
      
      <?php 
      }

      ?> 
      </select>
                  
      <?php echo form_error('re_typename', '<div class="error">', '</div>');?>
    </div>
    
    <div class="form-group">
    <label>Property Type</label>
    <select name="ptype"  class="form-control select2bs4" style="width: 100%;">
        <option <?php if(!empty($proDetails)){ if( $proDetails['property_type']=="residential"){ echo "selected"; }  } ?>   value="residential">Residential</option>
         <option <?php if(!empty($proDetails)){ if( $proDetails['property_type']=="commercial"){ echo "selected"; }  } ?>  value="commercial">Commercial</option>
    </select>
    
</div>

  <div class="form-group">
    <div>
        <label>Features</label>
    </div>
    <label class="checkbox-inline">
      <?php
      foreach($fList->result() as $value) 
      {
        if(!empty($proDetails))
        {
          $feature= explode(',', $proDetails['re_featureid'])  ;
        }            
      ?>
      
        <input type="checkbox" name="re_featuretitle[]"  value="<?= $value->re_featureid; ?>" <?php if(!empty($proDetails))
        {
          if( in_array($value->re_featureid, $feature)){ echo "checked"; }  
        } ?>><?= $value->re_featuretitle; ?>
      
       <?php 
      }

      ?>
      </label> 
      <!--     <?php echo form_error('re_featuretitle', '<div class="error">', '</div>'); ?> -->

  </div>
  
    <div class="form-group">
    <div>
        <!--<label>Featured</label>-->
    </div>
    <label class="checkbox-inline">
      
      
        <input type="checkbox" name="featured"  value="1" <?php if(!empty($proDetails))
        {
          if( $proDetails['featured']==1){ ?> checked  <?php    }  }?>>Featured
      
      
      </label> 
      <!--     <?php echo form_error('re_featuretitle', '<div class="error">', '</div>'); ?> -->

  </div>
                
  <input type="hidden" id="cId" name="cId" value="<?php if(!empty($proDetails))

  {
    echo $proDetails['pro_id'];
  } 
  ?>">            
                  
                  
                    
                    
  </div>
                  
</div>
                <!-- /.card-body -->

  <div class="card-footer" align="center">
    <button type="submit" class="btn btn-primary" name="add" ><?php if(!empty($proDetails))
            {
              echo "Edit";

            }
            else
            {
                echo "Add";
            }?></button>
  </div>
</form>
</div>
            
          </div>
          
          
          
        </div>
        
      </div>

  </div>
  <script>
var siteUrl = '<?=site_url()?>';
function deleteMultiple(pos)
{
//alert(pos); die;
var cId=$('#cId').val();
//var Image=$('#imageName'+pos).val();
var url = siteUrl + '/PropertyController/deleteMultiple';
//alert(roomId); alert(Image); die;
    $.ajax({
        type: 'POST',
        url: url,
        data: { cId:cId,pos: pos },
        success: function (data) {

var Image_listing = '';
    var  i;
var baseUrl='<?=base_url()?>';
//if(data.result != ""){
  Image_listing +='<div class="row">';
for (i in data.MultiImage) {
  Image_listing +='<div class="col-md-12"><div class="form-group">';
Image_listing += '<img src="'+baseUrl+'uploads/upimage/' + data.MultiImage[i] + '" height="100px" width="100px"><a onclick="deleteMultiple('+i+')" class="mr10 btn-trigger-remove-gallery-image" data-bs-toggle="tooltip" data-placement="bottom" data-bs-original-title="Delete image"><i class="fa fa-trash"></i></a>';
 Image_listing +=' </div></div>';
}
   Image_listing +='</div>';                
//}

$('#resultImage').html(Image_listing);

        }.bind(this),
        dataType: 'json',
        error: function (xhr, status, err) {
console.log(status);
        }.bind(this)
    });
  
}
</script>
