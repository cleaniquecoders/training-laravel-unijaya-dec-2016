@extends('layouts.app')

@section('scripts')
    <script type="text/javascript">
        function create() {
            var data = {
                name : jQuery('#name').val(),
                email : jQuery('#email').val(),
                password : jQuery('#password').val(),
            }
            jQuery.post('{!! route('api.register') !!}', data, function(data, textStatus, xhr) {
              alert('yeah!');
            }).fail(function(data){
                if(data.status == 422) {
                    var errors = [];
                    jQuery.each(data.responseJSON, function(index, val) {
                         errors.push(val[0]);
                    });
                    alert(errors.join('\n'));
                }
            });
        }
    </script>
@endsection

@section('content')
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				New User
			</div>
			<div class="panel-body">

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form action="" class="form-horizontal">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="btn-group center-block">
                            <a class="btn btn-block btn-success"
                            onclick="event.preventDefault();
                            create()">Create new User</a>
                            <a href="{{ url('/home') }}" class="btn btn-block btn-default">Cancel</a>
                        </div>



                        </form>
                    </div>
                </div>

             </div>
		</div>
	</div>
@endsection
