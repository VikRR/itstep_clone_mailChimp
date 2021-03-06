@extends('layouts.app')

@section('content')

    <div class="col-md-8">
        <div class="panel panel-default">
            @if( \Session::has('flash_message') )
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ \Session::get('flash_message') }}
                </div>
            @endif
            <div class="panel-heading lists">
                <div class="row">
                    <div class="col-md-8 text-center">
                        <h3>{{ trans('SubscribersIndex.subscriber') }}</h3>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-default"
                           href="{{ url('/subscribers/create') }}">{{ trans('SubscribersIndex.add') }}</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-10 col-md-offset-1">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>{{ trans('Table.name') }}</th>
                            <th>{{ trans('Form.email') }}</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subscribers as $subscriber)
                            <tr>
                                <td>{{ $subscriber->first_name . ' ' . $subscriber->last_name }}</td>
                                <td>{{ $subscriber->email }}</td>
                                <td>
                                    <a href="{{ url('/subscribers',[$subscriber->id,'edit']) }}"
                                       class="btn btn-primary">{{ trans('SubscribersIndex.update') }}</a>
                                </td>
                                <td>
                                    <form action="{{ url('/subscribers',$subscriber->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger"
                                                type="submit">{{ trans('SubscribersIndex.delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! $subscribers->render() !!}
    </div>

@endsection