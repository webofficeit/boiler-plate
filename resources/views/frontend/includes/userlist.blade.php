<div class="row">
    <div class="col-12">
        <div class="table-responsive recent-users">
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>@lang('labels.backend.access.users.table.last_name')</th>
                    <th>@lang('labels.backend.access.users.table.first_name')</th>
                    <th>@lang('labels.backend.access.users.table.email')</th>
                    
                    <th>@lang('labels.backend.access.users.table.accountype')</th>
                    
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    
                    <tr>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td><a href="{{ url('user/'.Crypt::encryptString($user->id)) }}">{{ $user->email }}</a></td>
                        <td>{{ $user->accounttype? $user->accounttype->name : '' }}</td>
                        
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $users->count() !!} {{ trans_choice('labels.backend.access.users.table.total', $users->total()) }} {!! $users->total() !!}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $users->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div>
</div>