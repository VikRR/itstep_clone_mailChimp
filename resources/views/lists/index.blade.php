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
                <div class="row">
                    <div class="col-md-8 text-center">
                        <h3>{{ trans('ListIndex.list') }}</h3>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-default" href="{{url('/lists/create')}}">{{ trans('Form.add') }}</a>
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
                                <td class="text-right">
                                    <a class='btn btn-primary'
                                       href='{{ url('/lists',[$list->id,'edit']) }}'> {{ trans('Form.update') }} </a>
                                </td>
                                <td>
                                    <form class="text-center" action="{{url('/lists',$list->id)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-danger"> {{ trans('Form.delete') }} </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $lists->links() }}
    </div>

@endsection