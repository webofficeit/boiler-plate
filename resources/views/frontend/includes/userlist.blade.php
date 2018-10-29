<section class="latest">
            <h2>Latest Merchants</h2>
            <div class="container">
              <div class="row">
                  @foreach($users as $user)
                <div class="col-md-3 col-sm-6">
                  <a href="{{ url('user/'.Crypt::encryptString($user->id)) }}">
                    <div class="latest-box">
                      <img src="images/cat01.jpg" alt="">
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












