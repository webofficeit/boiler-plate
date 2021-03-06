<section class="latest">
<h2>Latest Merchants</h2>
<div class="container">
  <div class="row">
      @foreach($users as $user)
    <div class="col-md-3 col-sm-6">
      <a href="{{ url('list/'.Crypt::encryptString($user->id)) }}">
        <div class="latest-box">
            @if(isset($user['avatar_location']) &&  $user['avatar_location'] != "")
            <div class="" style="background: url({{url('storage/'.$user['avatar_location']) }}) center/cover no-repeat; padding-bottom: 100%;"></div>
                @else
                <img src="img/no-profile-image.jpg" alt="">
            @endif


            <div class="hover-box">
                <h3>{{ $user->first_name }} {{ $user->last_name }}<br>
                  <span>{{ $user->accounttype? $user->accounttype->name : '' }}</span>
                </h3>
            </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>
</section>












