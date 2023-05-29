function soldout(id)
      {
         $("#id").val(id);

      }

$(document).ready(function(){
 $.validate({
      lang: 'en',
      validateOnBlur:false,
      errorMeassagePosition:'inline',
      scrollToTopOnError:true,
      modules : 'file,date,security'
    });
 $('body').on('change', 'select#cid', function(){
  $.ajax({
      type: 'POST',
      url: siteurl + 'PropertyController/getcity',
      data: { value : $.trim($(this).val()) },
      dataType: 'json',
      beforeSend: function() {
        //
      },
      success: function(response) {
        $('select#tid').html(response);
      },
      complete: function() {
        //
      }
    });
 })

 $('body').on('click', 'button.add-addmore', function() {
if ( $(this).val() > 0 ) {

  var unitArray = this.name;
  
var JSONObject = JSON.parse(unitArray);
console.log(JSONObject);

var option = "";
for (i in JSONObject) {

option += '<Option value="'+ JSONObject[i]["re_facilityid"] +'">'+ JSONObject[i]["re_facilityname"] +'</option>';
}

var item = $(this).val();
//alert(item); die;
var html = '<div id="add-tab-'+item+'">' +
'<div class="row">' +
'<div class="col-md-6">' +
'<div class="form-group">'  + 
'<select class="form-control select2bs4" style="width: 100%;"data-validation="required" name="re_facilityname[]">' +
  '<option value="">Select Facility</option>' +
 option +
 '</select>' +
  '</div>' + 
  '</div>'  + 
  ' <div class="col-md-6">' + 
  ' <div class="form-group">' +
  '<input type="text" name="pro_distance[]" class="form-control" id="exampleInputTitle" placeholder="Distance(km)" data-validation="required">' +
   '</div>' +
   '</div>' + 
   '</div>' +
   ' <button type="button" class="btn btn-md btn-primary add-dropone" value="'+item+'"><i class="fa fa-minus-square"aria-hidden="true"></i></button>' +

  
    '</div>' + 
'<div class="clearfix"></div>';
$('div.add-append').append(html);
$(this).val(parseInt(item) + 1);
$('button.add-dropone').val(parseInt(item) + 1);
}
});

$('body').on('click', 'button.add-dropone', function() 
{
if ( $(this).val() > 0 ) {
var item = parseInt($(this).val())-1;
$('div#add-tab-'+item).remove();
if ( item > 0 ) {
$(this).val(item);
$('button.add-addmore').val(item);
}
}
});
 


});


    