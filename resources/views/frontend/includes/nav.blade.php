@if (Request::path() == '/')
<header> 
            <div class="headmain">
               <div class="container">
                  <nav class="navbar navbar-expand-lg navbar-light">
                  
                  <a href="{{ route('frontend.index') }}" class="navbar-brand float-left logo">
             <img  src="{{ asset('img/giradeals-white.png') }}" alt="GiraDeal">
        </a>  
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     </button>

                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            
                    @guest
                     <li class="nav-item"><a href="{{route('frontend.index')}}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{route('frontend.auth.login')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.login')) }}">@lang('navs.frontend.login')</a></li>
    
                    @if(config('access.registration'))
                        <li class="nav-item"><a href="{{route('frontend.auth.register')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.register')) }}">@lang('navs.frontend.register')</a></li>
                    @endif
                @else
                
                <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">{{ $logged_in_user->name }}</a>
    
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
                            @can('view backend')
                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item">@lang('navs.frontend.user.administration')</a>
                            @endcan
    
                            <a href="{{ route('frontend.user.account') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.user.account')) }}">@lang('navs.frontend.user.account')</a>
                            <a href="{{ route('frontend.auth.logout') }}" class="dropdown-item">@lang('navs.general.logout')</a>
                        </div>
                    </li>
                     @endguest        
                        </ul> 
                     </div>
                  </nav> 
               </div>
            </div>
         </header>


    @else
    <nav class="navbar navbar-expand-lg navbar-dark md-4">
<header> 
            <div class="headmain">
               <div class="container">
                  <nav class="navbar navbar-expand-lg navbar-light">
                  
                  <a href="{{ route('frontend.index') }}" class="navbar-brand float-left logo">
             <img class="navbar-brand-full" src="{{ asset('img/giradeals-white.png') }}" width="100%" height="100%" alt="GiraDeal">
        </a>  
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     </button>

                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            
                             @guest
                             <li class="nav-item"><a href="{{route('frontend.index')}}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{route('frontend.auth.login')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.login')) }}">@lang('navs.frontend.login')</a></li>
    
                    @if(config('access.registration'))
                        <li class="nav-item"><a href="{{route('frontend.auth.register')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.register')) }}">@lang('navs.frontend.register')</a></li>
                    @endif
                @else
                
                <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">{{ $logged_in_user->name }}</a>
    
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
                            @can('view backend')
                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item">@lang('navs.frontend.user.administration')</a>
                            @endcan
    
                            <a href="{{ route('frontend.user.account') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.user.account')) }}">@lang('navs.frontend.user.account')</a>
                            <a href="{{ route('frontend.auth.logout') }}" class="dropdown-item">@lang('navs.general.logout')</a>
                        </div>
                    </li>
                     @endguest        
                        </ul> 
                     </div>
                  </nav> 
               </div>
            </div>
         </header>
</nav>

@endif
