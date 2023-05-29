
	function updateLang(lang)
{  
    //alert(lang);
    var url = siteUrl+'/LoginController/languageUpdate';
    $.ajax({
        type: 'POST',
        url: url,
        data: { lang: lang },
        success: function (data) {
            //alert(data);
            location.reload();          
        }
    });
}

    $(".alert").delay(3200).fadeOut(300);
    
function filter_list()
{
    

	var url = siteUrl + '/LoginController/filter_search';
   
    var bed = $('.bed:checked').map(function() {return this.value;}).get().join(',')
    
    var bath = $('.bath:checked').map(function() {return this.value;}).get().join(',')

    var floor = $('.floor:checked').map(function() {return this.value;}).get().join(',')
    
    var type = $('.type:checked').map(function() {return this.value;}).get().join(',')

    var amid = $('.amenities:checked').map(function() {return this.value;}).get().join(',')

   var catid = $('.category:checked').map(function() {return this.value;}).get().join(',')

    var minp = $('.min').val();
    var maxp = $('.max').val();
    
    //alert(minp + maxp);

    
	$.ajax({
    type: 'POST',
    method:'POST',
    url: url,
    data: { bed: bed, bath: bath, floor: floor, type: type , amid : amid , catid:catid , minp : minp , maxp : maxp },
    success: function (data) {
    	//alert(data);
    	$('#product').html(data);
    	window.scrollTo(0, 0);

    	}
	});
}

