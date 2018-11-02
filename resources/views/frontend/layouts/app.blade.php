<!DOCTYPE html>
@langrtl
    <html lang="{{ app()->getLocale() }}" dir="rtl">
@else
    <html lang="{{ app()->getLocale() }}">
@endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        @yield('meta')
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('css/ammap.css') }}" />
       <link rel="stylesheet" href="{{ URL::asset('css/frontend/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/frontend/magnific-popup.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/frontend/main.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/frontend/responsive.css') }}" />
        @stack('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        
        <script src="{{ URL::asset('js/ammap.js') }}"></script>
        <script src="{{ URL::asset('js/worldLow.js') }}"></script>
        <script src="{{ URL::asset('js/light.js') }}"></script>
        @stack('after-styles')
    </head>
    <body>
        
        <div id="wrapper">
            @include('includes.partials.logged-in-as')
            @include('frontend.includes.nav')

            
                @include('includes.partials.messages')                
            
        
            @yield('content')

            @include('frontend.includes.footer')
        </div><!-- #app -->

        <!-- Scripts -->
        @stack('before-scripts')
        {!! script(mix('js/manifest.js')) !!}
        {!! script(mix('js/vendor.js')) !!}
        <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
       
        <script src="{{ URL::asset('js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ URL::asset('js/slick.min.js') }}"></script>
        <script src="{{ URL::asset('js/main.js') }}"></script>
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script src="{{ URL::asset('js/jquery.jscroll.min.js') }}"></script>
        @stack('after-scripts')
        @include('includes.partials.ga')
    </body>
</html>
