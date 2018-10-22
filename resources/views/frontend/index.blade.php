@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
  <div class="container">
    <div class="map-search">
      <input id="search_name" type="textbox" value="" placeholder="search"> 
      <button class="search-bar"> <i class="fas fa-search-location"></i> </button>
    </div>
    <div id="chartdiv"></div>  
  </div>
  @include('frontend.includes.latestoffer')
  {{-- <div class="container">      
      @include('frontend.includes.userlist')
  </div> --}}
    
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