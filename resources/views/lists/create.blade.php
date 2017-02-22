@extends('layouts.app')

@section('content')

    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading lists">
                <div class="row text-center">
                    @if($list->exists)
                        <h3>{{ trans('ListsCreate.update') }}</h3>
                    @else
                        <h3>{{ trans('ListsCreate.add') }}</h3>
                    @endif
                </div>
            </div>
            <div class="panel-body text-center">
                <div class="row">
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

@endsection