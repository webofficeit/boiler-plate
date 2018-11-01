          
       
      
                   
@if($errors->any())
    
<div class="hover_bkgr_fricc">
    <span class="helper"></span>
    <div>
        <div class="popupCloseButton">X</div>
        @foreach($errors->all() as $error)
         <p>{{ $error }}</p>
            
        @endforeach
    </div>
</div>
@elseif(session()->get('flash_success'))
   
<div class="hover_bkgr_fricc">
    <span class="helper"></span>
    <div>
        <div class="popupCloseButton">X</div>
        @if(is_array(json_decode(session()->get('flash_success'), true)))
        <p>{{ implode('', session()->get('flash_success')->all(':message<br/>')) }}</p>
        @else
        <p> {{ session()->get('flash_success') }}</p>
        @endif
    </div>
</div>
@elseif(session()->get('flash_warning'))
   
<div class="hover_bkgr_fricc">
    <span class="helper"></span>
    <div>
        <div class="popupCloseButton">X</div>
        @if(is_array(json_decode(session()->get('flash_warning'), true)))
        <p> {{ implode('', session()->get('flash_warning')->all(':message<br/>')) }}</p>
        @else
        <p> {{ session()->get('flash_warning') }}</p>
        @endif
    </div>
</div>
@elseif(session()->get('flash_info'))
    
<div class="hover_bkgr_fricc">
    <span class="helper"></span>
    <div>
        <div class="popupCloseButton">X</div>
        @if(is_array(json_decode(session()->get('flash_info'), true)))
        <p> {{ implode('', session()->get('flash_info')->all(':message<br/>')) }}</p>
        @else
        <p>{{ session()->get('flash_info') }}</p>
        @endif
    </div>
</div>
@elseif(session()->get('flash_danger'))
    <div class="hover_bkgr_fricc">
    <span class="helper"></span>
    <div>
        <div class="popupCloseButton">X</div>

        @if(is_array(json_decode(session()->get('flash_danger'), true)))
        <p>   {{ implode('', session()->get('flash_danger')->all(':message<br/>')) }}</p>
        @else
        <p> {{ session()->get('flash_danger') }}</p>
        @endif
    </div>
</div>
@elseif(session()->get('flash_message'))
    
<div class="hover_bkgr_fricc">
    <span class="helper"></span>
    <div>
        <div class="popupCloseButton">X</div>
        @if(is_array(json_decode(session()->get('flash_message'), true)))
        <p>{{ implode('', session()->get('flash_message')->all(':message<br/>')) }}</p>
        @else
       <p> {{ session()->get('flash_message') }}</p>
        @endif
    </div>
</div>
@endif
 