@foreach($category as $categorykey => $category)
    <li>
        <input class="styled-checkbox" {{$categorykey==0?'checked':'' }} data-search='{{$user}}' id="styled-checkbox-{{$categorykey}}"
               type="checkbox" value="{{$category['seo']}}">
        <label for="styled-checkbox-{{$categorykey}}">{{ $category['name'] }}</label>
    </li>
@endforeach
@push('after-scripts')
    <script>
        var serachdetails='{{$user}}';
        var tokenkey = '{{ csrf_token() }}';
    </script>
    <script src="{{ URL::asset('js/categorylist.js') }}"></script>
@endpush    