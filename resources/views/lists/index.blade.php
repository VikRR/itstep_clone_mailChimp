@extends('layouts.app')

@section('content')

    {{--<div class="container">--}}
        {{--<div class="row">--}}
            <div class="col-md-8">
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
                                <div class="col-md-2">
                                    <a class="btn btn-default" href="{{url('/lists/create')}}">{{ trans('Form.add') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-10 col-md-offset-1">
                            <table class='table table-striped'>
                                <thead>
                                        <th>{{trans('ListIndex.name')}}</th>
                                        <th></th>
                                        <th></th>
                                </thead>
                                <tbody>
                                    @foreach($lists as $list)
                                    <tr>
                                        <td class="table-text">
                                            <a href='{{ url('/lists',$list->id) }}'> {{$list->name}} </a>
                                        </td>
                                        <td>
                                            <a class='btn btn-primary' href='{{ url('/lists',[$list->id,'edit']) }}'> {{ trans('Form.update') }} </a>
                                        </td>
                                        <td>
                                          <form action="{{ url('/lists',[$list->id ,'edit']) }}" method="get">
                                            {{ csrf_field() }}
                                            {{ method_field('GET') }}
                                            <button class="btn btn-success">Update</button>
                                          </form>
                                        </td>
                                        <td>
                                            <form class="text-right" action="{{url('/lists',$list->id)}}" method="POST">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <button class="btn btn-danger"> {{ trans('Form.delete') }} </button>
                                            </form>
                                        </td>
                                    </tr>
<<<<<<< HEAD
                                @endforeach
=======
                                    @endforeach
>>>>>>> c182b829cd58f9b29de1f850814cfe0a37fda179
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
                {{ $lists->links() }}
            </div>
        </div> <!-- row layouts.app -->
    </div> <!-- container layouts.app -->

@endsection