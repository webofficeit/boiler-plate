@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <div id="chartdiv"></div>
    <div >
        <button class="search-bar"> Search </button>
    <input id="search_name" type="textbox" value="" placeholder="validation.attributes.frontend.first_name"> 
    </div>
    
@endsection
@push('after-scripts')
<script>
    
  



    
var map = AmCharts.makeChart( "chartdiv", {
  type: "map",
  "theme": "light",
  "showDescriptionOnHover": false,
  dataProvider: {
    map: "worldLow",
        "images":{!! $partner !!},
    "getAreasFromMap": true,
  },

  areasSettings: {
    unlistedAreasColor: "#FFCC00"
  },

  imagesSettings: {
    color: "#CC0000",
    rollOverColor: "#CC0000",
    selectedColor: "#000000",
    balloonText: "<strong>[[title]]</strong>"
  }
  
} );

map.addListener("clickMapObject", function(event) {
  var zoomlevel_value = map.zoomLevel();
  if(zoomlevel_value > 1) {
      
  }
  
});



// create a zoom listener which will check current zoom level and will toggle
// corresponding image groups accordingly
map.addListener( "rendered", function() {
  revealMapImages();
  map.addListener( "zoomCompleted", revealMapImages );
} );

map.updateSelection = function(searchdata) {
    
    var areas = [];
    //jQuery(".section-map-list input:checked").each(function() {
      var CC = this.value;

//      areas.push({
//        longitude:'-0.118092',
//color:'#000000',
//id:1,
//label:'Admin',
//latitude:'51.5074',
//scale:1.5,
//svgPath:'M9,0C4.029,0,0,4.029,0,9s4.029,9,9,9s9-4.029,9-9S13.971,0,9,0z M9,15.93 c-3.83,0-6.93-3.1-6.93-6.93S5.17,2.07,9,2.07s6.93,3.1,6.93,6.93S12.83,15.93,9,15.93 M12.5,9c0,1.933-1.567,3.5-3.5,3.5S5.5,10.933,5.5,9S7.067,5.5,9,5.5 S12.5,7.067,12.5,9z',
//title:'London fh',
//      });
   // });
    map.dataProvider.images = searchdata;
    map.validateData();
    return areas;
  }

function revealMapImages( event ) {
  var zoomLevel = map.zoomLevel();
  if ( zoomLevel < 2 ) {
    map.hideGroup( "minZoom-2" );
    map.hideGroup( "minZoom-2.5" );
  } else if ( zoomLevel < 2.5 ) {
    map.showGroup( "minZoom-2" );
    map.hideGroup( "minZoom-2.5" );
  } else {
    map.showGroup( "minZoom-2" );
    map.showGroup( "minZoom-2.5" );
  }
}

$('.search-bar').click(function(){
    var searchdata = $('#search_name').val();
    //map.updateSelection(searchdata);
             if(searchdata!='') {
               $.ajax({
                    url:      '/ammap/search',
                    type:     'post',
                    dataType: 'json',
                    data:     {"_token": "{{ csrf_token() }}",'searchdata':searchdata},
                    success: function(data) {
                        
                            map.updateSelection(data);
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.log('AJAX ERROR ! Check the console !');
                        
                    }
               });
           }
});
</script>
@endpush
