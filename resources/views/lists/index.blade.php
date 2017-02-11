@extends('layouts.app')

@section('content')

<div class="container">
   <div class="panel panel-default">   
       <div class="panel-heading">
           <div class="row">
               <div class="col-md-10">
                   Lists
               </div>
               <div class="col-md-2">
                   <a class="btn btn-default" href="{{url('/lists/create')}}">Add</a>
               </div>
           </div>
       </div>
       <div class="panel-body">
       @if ( \Session::has('flash_message') )
   			<div class="alert alert-success alert-dismissable">
       			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      		 	{{\Session::get('flash_message')}}
   			</div>
		@endif
		   <table class="table table-striped task-table">

				   <!-- Table Headings -->
		   <thead>
		   <th>Name</th>
				<th></th>
				<th></th>
				   </thead>

				   <!-- Table Body -->
				   <tbody>
				   @foreach($lists as $list)
				   <tr>
				   <!-- Task Name -->
				   	<td class="table-text">
				   		<div>{{ $list->name }}</div>
				   	</td>
				   	<td>
				   		<form action="{{ url('/lists/'.$list->id) }}" method="POST">
				   			{{ csrf_field() }}
				   			{{ method_field('DELETE') }}
				   			<button type="submit" class="btn btn-danger">Delete</button>
				   		</form>
				   	</td>
				   </tr>
				   @endforeach
				   </tbody>
			</table>

       </div>
   </div>
</div>

@endsection