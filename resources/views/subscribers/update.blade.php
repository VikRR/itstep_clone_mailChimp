@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Update subscriber data</h3>
                    </div>
                    <div class="panel-body">
                        @foreach($subscribers as $subscriber)
                            <form class="form-horizontal" role="form" method="POST"
                                  action="{{ url('/subscribers',$subscriber->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <label for="first_name" class="col-md-4 control-label">First name</label>
                                    <div class="col-md-6">
                                        <input id="first_name" class="form-control" type="text"  name="first_name"
                                               value="{{ $subscriber->first_name }}" required autofocus>
                                        @if ($errors->has('first_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label" for="last_name" >Last Name</label>
                                    <div class="col-md-6">
                                        <input id="last_name" class="form-control" type="text"  name="last_name"
                                               value="{{ $subscriber->last_name }}" required>
                                        @if ($errors->has('last_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="last_name" class="col-md-4 control-label">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input id="email" class="form-control" type="email" name="email" required
                                               value="{{ $subscriber->email }}">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button class="btn btn-primary" type="submit">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection