@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4> Add New List </h4>
                    </div>
                        <div class="panel-body text-center">
                            <form class="form-inline" action="{{ url('/lists') }}" method="POST" role="form"
                                  class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-group {{ ($errors->has('name'))?' has error' :'' }}">
                                    <label for="name">Name:</label>
                                    <input id="name" class="form-control" type="text" name="name"
                                           value="{{ old('name') }}" required autofocus>
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <input type="submit" class="btn btn-success" value="Add">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection