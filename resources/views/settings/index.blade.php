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
                    <h3>{{ trans('Setting.setting') }}</h3>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-10 col-md-offset-1">
                    <form class="form-horizontal" action="{{ url('email/setting') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-md-1">
                                <label for="sel1">{{ trans('Setting.type') }}</label>
                            </div>
                            <div class="col-md-11">
                                <select name="setting" class="form-control" id="sel1">
                                    @foreach($settings as $setting)
                                        <option value="{{ $setting->id }}">{{ $setting->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success ok" type="submit">{{trans('Form.ok')}}</button>
                        </div>
                    </form>
                </div> <!-- col-md-10 col-md-offset-1 -->
            </div> <!-- panel body -->
        </div> <!-- panel -->
    </div> <!-- col-md-8 -->

@endsection