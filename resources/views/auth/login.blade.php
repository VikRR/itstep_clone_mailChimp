@extends('layouts.app')

@section('content')

    <div class="col-md-8">
        <div class="text-center">
            <h1>{{ trans('authlogin.login') }}</h1>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">{{ trans('Form.email') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email"
                                   value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password"
                               class="col-md-4 control-label">{{ trans('Form.password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4 text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ trans('authlogin.button') }}
                            </button>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4 text-center">
                            <a href="{{ url('/register') }}">{{ trans('authlogin.register') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div> {{-- layouts.app row--}}
    </div> {{-- layouts.app container--}}
@endsection
