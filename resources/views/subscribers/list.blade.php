@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel-heading text-center subscriber-list">
                    <h3>Subscriber List</h3>
                    <a class="btn btn-default" href="{{ url('/subscribers/create') }}">Add new</a>
                    {{--<p>Данные {{ $subscriber->email }} успешно обновлены</p>--}}
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
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
                                    {{--<a href="{{ route('SubscriberController@update') }}"> Update</a>--}}
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
                                        <input class="btn btn-danger" type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection