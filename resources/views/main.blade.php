@extends('layouts.app')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <h1>{{ trans('main.hello') }} {{ Auth::user()->email }}!</h1>
    </div>

@endsection