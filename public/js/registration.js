   $(function() {
            
            var avatar_location = $("#avatar_location");
            var bussiness_description = $("#bussiness_description");
            var web_site = $('#web_site');
            
            if($('input[name=registration_type]:checked').val()==1) {
            avatar_location.hide();
            bussiness_description.hide();
            web_site.hide();
        }

            $('input[name=registration_type]').change(function() {
                
                if ($(this).val() == 1) {
                    avatar_location.hide();
                    bussiness_description.hide();
                    web_site.hide();
                } else {
                    avatar_location.show();
                    bussiness_description.show();
                    web_site.show();
                }
            });
            
            $('input[name=city]').blur(function() {
                $('select[name=country]').val(null);
            });
            
            $('select[name=country]').change(function() {
                var country = $(this.options[this.selectedIndex]).text();
                var city = $('input[name=city]').val(); console.log(city);
                codeAddress(country,city);
            });

            var max_fields = 5;
            var intialval = $('.increment:visible').length; 
            var clonehtml = '';
            $(".addmorepicture").click(function(e) {
                e.preventDefault();
                if(intialval < max_fields){ //max input box allowed
                    intialval++; //text box increment
                    if(clonehtml=='') {
                        clonehtml = $(".clone").html();
                    }
                    $(".image-list").append(clonehtml); //add input box
                }
            });

            $(document).on('change', '.custom-file-input', function(e) {
                $(this).next('.custom-file-label').html(e.target.files[0].name);
            });
            
           
function codeAddress(country,city) {
    var address = (city!='')?city + ', ' + country:country;
    
   if(address.toLowerCase()!='select') {
    geocoder = new google.maps.Geocoder();
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
       $('#latitude').val(results[0].geometry.location.lat());
       $('#longitude').val(results[0].geometry.location.lng());
      } 

      else {
        console.log("Geocode was not successful for the following reason: " + status);
      }
    }); 
  }
  }
      
        });