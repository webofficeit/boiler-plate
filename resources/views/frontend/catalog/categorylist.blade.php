@foreach($category as $categorykey => $category)
                  <li>
                  <input class="styled-checkbox" {{$categorykey==0?'checked':'' }} id="styled-checkbox-{{$categorykey}}" type="checkbox" value="{{$category['seo']}}">
                  <label for="styled-checkbox-{{$categorykey}}">{{ $category['name'] }}</label>
                </li>
                        
@endforeach
@push('after-scripts')
<script>
    $('input.styled-checkbox').on('change', function() {
    $('input.styled-checkbox').not(this).prop('checked', false); 
    console.log($(this).val());
    var categorySeo = $(this).val();
     $.ajax({
                    url:      '/category/search',
                    type:     'post',
                    dataType: 'html',
                    data:     {"_token": "{{ csrf_token() }}",'searchdata':categorySeo},
                    success: function(data) {
                         $('.offerlist').html(data);
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.log('AJAX ERROR ! Check the console !');
                        
                    }
               });
    
});
</script>
@endpush    