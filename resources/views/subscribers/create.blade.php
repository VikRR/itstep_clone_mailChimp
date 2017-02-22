@extends('layouts.app')

@section('content')

    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading lists">
                <div class="row text-center">
                    @if($subscribers->exists)
                        <h3>{{ trans('SubscribersCreate.update') }}</h3>
                    @else
                        <h3>{{ trans('SubscribersCreate.add') }}</h3>
                    @endif
                </div>
            </div>
            <div class="panel-body">

                @if($subscribers->exists)
                    <form class="form-horizontal" role="form" method="POST"
                          action="{{ url('/subscribers',$subscribers->id) }}">
                        {{ method_field('PUT') }}
                @else
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/subscribers') }}">
                @endif
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">{{ trans('Form.first_name') }}</label>
                            <div class="col-md-6">
                                @if($subscribers->exists)
                                    <input id="first_name" type="text" class="form-control" name="first_name"
                                           value="{{ $subscribers->first_name }}" required autofocus>
                                @else
                                    <input id="first_name" type="text" class="form-control" name="first_name"
                                           value="{{ old('first_name',$subscribers->first_name) }}" required
                                           autofocus>
                                @endif
                                @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                @endif
                            </div><!--col-md-6-->
                        </div><!--form-group-->

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">{{ trans('Form.last_name') }}</label>

                            <div class="col-md-6">
                                @if($subscribers->exists)
                                    <input id="last_name" type="text" class="form-control" name="last_name"
                                           value='{{ $subscribers->last_name }}' required>
                                @else
                                    <input id="last_name" type="text" class="form-control" name="last_name"
                                           value='{{ old('last_name',$subscribers->last_name) }}' required>
                                @endif
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div><!--col-md-6-->
                        </div><!--form-group-->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">{{ trans('Form.email') }}</label>

                            <div class="col-md-6">
                                @if($subscribers->exists)
                                    <input id="email" type="email" class="form-control" name="email" required
                                           value="{{ $subscribers->email }}">
                                @else
                                    <input id="email" type="email" class="form-control" name="email" required
                                           value="{{ old('email',$subscribers->email) }}">
                                @endif
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div><!--col-md-6-->
                        </div><!--form-group-->

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    @if($subscribers->exists)
                                        {{ trans('Form.update') }}
                                    @else
                                        {{ trans('Form.add') }}
                                    @endif
                                </button>
                            </div><!--col-md-8-->
                        </div>

                    </form>
            </div>
        </div>
    </div>

@endsection