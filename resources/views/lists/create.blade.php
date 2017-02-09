@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4>{{ trans('ListsCreate.add') }}</h4>
                    </div>
                        <div class="panel-body text-center">
                            <form class="form-inline" action="{{ url('/lists') }}" method="POST" role="form"
                                  class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-group {{ ($errors->has('name'))?' has error' :'' }}">
                                    <label for="name">{{ trans('ListsCreate.name') }}</label>
                                    <input id="name" class="form-control" type="text" name="name"
                                           value="{{ old('name') }}" required autofocus>
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('ListsCreate.button') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection