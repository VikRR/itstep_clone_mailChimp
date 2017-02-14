@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        @if($list->exists)
                        <h4>{{ trans('ListsCreate.update') }}</h4>
                        @else
                        <h4>{{ trans('ListsCreate.add') }}</h4>
                        @endif
                    </div>
                        <div class="panel-body text-center">
                        @if($list->exists)
                            <form class="form-inline" action="{{ url('/lists',$list->id) }}" method="POST" role="form">
                                {{ method_field('PUT') }}
                        @else
                            <form class="form-inline" action="{{ url('/lists') }}" method="POST" role="form">
                        @endif
                                {{ csrf_field() }}
                                <div class="form-group {{ ($errors->has('name'))?' has error' :'' }}">
                                    <label for="name">{{ trans('ListsCreate.name') }}</label>
                                    @if($list->exists)
                                        <input id="name" class="form-control" type="text" name="name"
                                           value="{{ $list->name }}" required autofocus>
                                    @else
                                        <input id="name" class="form-control" type="text" name="name"
                                           value="{{ old('name') }}" required autofocus>
                                        @endif
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    @if($list->exists)
                                        {{ trans('Form.update') }}
                                    @else
                                        {{ trans('Form.add') }}
                                    @endif
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection