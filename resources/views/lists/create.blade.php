@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                    @if($list->exists === true)
                    <h4>Update</h4>
                    @else
                        <h4>{{ trans('ListsCreate.add') }}</h4>
                    @endif
                    </div>
                        <div class="panel-body text-center">
                        @if($list->exists === true)
                          <form class="form-horizontal" action="{{ url('/lists', $list->id) }}" method="POST" role="form">
                            {{ method_field('PUT')}}
                        @else
                          <form class="form-horizontal" action="{{ url('/lists') }}" method="POST" role="form">
                        @endif
                          {{ csrf_field() }}
                                <div class="form-group {{ ($errors->has('name'))?' has error' :'' }}">
                                    <label for="name">{{ trans('ListsCreate.name') }}</label>
                                    <input id="name" class="form-control" type="text" name="name"
                                           value="{{ old('name',$list->name) }}" required autofocus>
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">
                                   @if($list->exists === true)
                                    Update
                                   @else
                                    {{ trans('ListsCreate.button') }}
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