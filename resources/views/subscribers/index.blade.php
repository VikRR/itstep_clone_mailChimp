@extends('layouts.app')

@section('content')

    <div class="container subscribers">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @if( \Session::has('flash_message') )
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ \Session::get('flash_message') }}
                        </div>
                    @endif
                    <div class="panel-heading lists">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="col-md-10">
                                    <h3>Subscribers</h3>
                                </div>
                                <div class="col-md-2 text-center">
                                    <a class="btn btn-default" href="{{ url('/subscribers/create') }}">Add New</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-10 col-md-offset-1">
                            <table class="table table-striped">
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
                                        <td>{{ $subscriber->first_name.' '.$subscriber->last_name }}</td>
                                        <td>{{ $subscriber->email }}</td>
                                        <td>
                                            <form action="{{ url('/subscribers',$subscriber->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                <button class="btn btn-info" type="submit">Update</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ url('/subscribers'),$subscriber->id }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-danger" type="submit">Delete</button>
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
        </div>
    </div>

@endsection