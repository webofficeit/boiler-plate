 <section class="map-area">
           <div class="container">
          
    <div id="chartdiv"></div> 
           </div>
         </section>

@push('after-scripts')
<script>
var partner = {!! $partner !!};
</script>
<script src="{{ URL::asset('js/giradealmap.js') }}"></script>
@endpush