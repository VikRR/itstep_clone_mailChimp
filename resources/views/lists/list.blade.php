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
<!--                                    <h3>{{ trans('ListIndex.list') }}</h3>-->
                                    <h3>{{ $list->name }}</h3>
                                </div>
                                <div class="col-md-2 text-center">
                                    <a class="btn btn-default"
                                       href="{{url('/lists/create')}}">{{ trans('Form.add') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-10 col-md-offset-1">
                            <table class="table table-striped">
                                <!-- Table Headings -->
                                <thead>
                                <th>{{ trans('Form.first_name') }}</th>
                                <th>{{ trans('Form.last_name') }}</th>
                                <th>{{ trans('Form.email') }}</th>
                                <th></th>
                                </thead>
                                <!-- Table Body -->
                                <tbody>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
<!--                paginate -->
            </div>
        </div>
    </div> 

@endsection


