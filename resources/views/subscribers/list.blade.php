@extends('layouts.app')

@section('content')

    <div class="col-md-8">
        <div class="panel-heading lists">
            <div class="row">
                <div class="col-md-8 text-center">
                    <h3>{{ trans('SubscribersList.list') }}</h3>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-default"
                       href="{{ url('/subscribers/create') }}">{{ trans('SubscribersList.add') }}</a>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>{{ trans('Table.name') }}</th>
                    <th>{{ trans('Table.email') }}</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($subscribers as $subscriber)
                    <tr>
                        <td>{{ $subscriber->first_name }} &nbsp; {{ $subscriber->last_name }}</td>
                        <td>{{ $subscriber->email }}</td>
                        <td>
                            <form action="{{ url('/subscribers/'.$subscriber->id.'/edit') }}" method="GET">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input class="btn btn-primary" type="submit" value="Update">
                            </form>
                        </td>
                        <td>
                            <form action="{{ url('/subscribers/'.$subscriber->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger"
                                        type="submit">{{ trans('SubscribersList.button') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection