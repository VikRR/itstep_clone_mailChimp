@extends('layouts.app')

@section('content')

    <div class="col-md-8">
        <div class="panel panel-default">
            @if ( \Session::has('flash_message') )
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{\Session::get('flash_message')}}
                </div>
            @endif
            <div class="panel-heading lists">
                <div class="row text-center">
                    <h3>{{ trans('Send.sendMessage') }}</h3>
                </div>
            </div>
            <div class="panel-body">

                <form class="form-horizontal" role="form" method="POST" action="{{ url('email/send') }}">
                    {{csrf_field()}}
                    <div class="form-group{{ $errors->has('to') ? ' has-error' : '' }}">
                        <label for="list_id" class="col-md-4 control-label">{{ trans('Send.list') }}</label>
                        <div class="col-md-6">
                            <select id="name" class="form-control" name="list_id" required autofocus>
                                @foreach($lists as $list)
                                    <option value="{{ $list->id }}">{{ $list->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('to'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('to') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                        <label for="subject" class="col-md-4 control-label">{{ trans('Send.subject') }}</label>

                        <div class="col-md-6">
                            <input id="subject" type="text" class="form-control" name="subject"
                                   value="{{ old('subject') }}" required autofocus>
                            @if ($errors->has('subject'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('subject') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                        <label for="message" class="col-md-4 control-label">{{ trans('Send.message') }}</label>

                        <div class="col-md-6">
                            <textarea id="message" type="text" class="form-control" name="message"
                                      value="{{ old('message') }}" required autofocus></textarea>

                            @if ($errors->has('message'))
                                <span class="help-block">
                                     <strong>{{ $errors->first('message') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                {{'Send'}}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection