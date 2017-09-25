@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    
        <div class="col-md-7 col-md-offset-3">

            <div class="text-center">
				<div class="panel panel-default">
                    <div class="panel-body">
					@foreach($users as $user)
					 <div class="col-sm-4 text-center">
                       <a href="{{ url('/users/' . $user->id) }}">
                        <div class="thumbnail">
                          <img src="{{ url('user-avatar/'. $user->id . '/250') }}" alt="" class="img-responsive">
                              <h5>{{ $user->name }}</h5>
                         </div>
                       </a>
                     </div>
					@endforeach
                    </div>
					<div class="text-center">
                         {{ $users->appends([$users])->links() }}
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
