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
        <link rel="stylesheet" href="{{ URL::asset('css/ammap.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/frontenddeal.css') }}" />
        @stack('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        {{ style(mix('css/frontend.css')) }}
        <script src="{{ URL::asset('js/ammap.js') }}"></script>
        <script src="{{ URL::asset('js/worldLow.js') }}"></script>
        <script src="{{ URL::asset('js/light.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

        @stack('after-styles')
    </head>
    <body>
        
        <div id="app">
            @include('includes.partials.logged-in-as')
            @include('frontend.includes.nav')

            <div class="container">
                @include('includes.partials.messages')                
            </div><!-- container -->
        
            @yield('content')

            @include('frontend.includes.footer')
        </div><!-- #app -->

        <!-- Scripts -->
        @stack('before-scripts')
        {!! script(mix('js/manifest.js')) !!}
        {!! script(mix('js/vendor.js')) !!}
        {!! script(mix('js/frontend.js')) !!}
        @stack('after-scripts')
        @include('includes.partials.ga')
    </body>
</html>
