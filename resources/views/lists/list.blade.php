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
                    <div class="col-md-10 col-md-offset-1">
                        <div class="col-md-8 text-center">
                            <h3>{{ $list->name }}</h3>
                        </div>
                        <div class="col-md-4 text-center">
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#myModal">{{ trans('ListsList.add') }}</button>
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
                        @foreach($list->subscribers as $subscriber)
                            <tr>
                                <td>{{ $subscriber->first_name }}</td>
                                <td>{{ $subscriber->last_name }}</td>
                                <td>{{ $subscriber->email }}</td>
                                <td>
                                    <form class="form-inline"
                                          action="{{ url('/lists', [$list->id, 'delete',$subscriber->id]) }}"
                                          method="POST">
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger" type="submit">{{trans('Form.delete')}}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div> <!-- col-md-10 col-md-offset-1 -->
            </div> <!-- panel body -->
        </div> <!-- panel -->
    </div> <!-- col-md-8 col-md-offset-2 -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ trans('SubscribersIndex.subscriber') }}</h4>
                    @if ( \Session::has('flash_message') )
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{\Session::get('flash_message')}}
                        </div>
                    @endif
                </div>
                <div class="modal-body">
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
                        @foreach($subscribers as $subscriber)
                            <tr>
                                <td>{{ $subscriber->first_name }}</td>
                                <td>{{ $subscriber->last_name }}</td>
                                <td>{{ $subscriber->email }}</td>
                                <td>
                                    <form class="form-inline"
                                          action="{{ url('/lists',[$list->id,'subscriber',$subscriber->id]) }}"
                                          method="POST">
                                        {{ csrf_field() }}
                                        <button class="btn btn-success"
                                                type="submit">{{trans('Form.add')}}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    </div> <!-- row layouts.app -->
    </div> <!-- container layouts.app -->

@endsection


