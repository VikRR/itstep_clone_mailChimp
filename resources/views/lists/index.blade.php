@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @if ( \Session::has('flash_message') )
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{\Session::get('flash_message')}}
                        </div>
                    @endif
                    <div class="panel-heading lists">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="col-md-10">
                                    <h3>{{ trans('ListIndex.list') }}</h3>
                                </div>
                                <div class="col-md-2 text-center">
                                    <a class="btn btn-default"
                                       href="{{url('/lists/create')}}">{{ trans('ListIndex.add') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-10 col-md-offset-1">
                            <table class="table table-striped">
                                <!-- Table Headings -->
                                <thead>
                                <th>{{ trans('ListIndex.name') }}</th>
                                <th></th>
                                </thead>
                                <!-- Table Body -->
                                <tbody>

                                @foreach ($lists as $list)
                                    <tr>
                                        <td class="table-text">
                                            {{$list->name}}
                                        </td>
                                        <td>
                                            <form class="text-right" action="{{url('/lists',$list->id)}}" method="POST">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <button class="btn btn-danger">{{ trans('ListIndex.button') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $lists->render() !!}
            </div>
        </div>
    </div>

@endsection