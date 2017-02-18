@extends('layouts.app')

@section('container')

   <div class="container">
       <div class="row">
           <div class="col-md-8 col-md-offset-2">
               <div class="panel panel-default">
                   <div class="panel-heading">Send message</div>
                   <div class="panel-body">
                           <form class="form-horizontal" role="form" method="POST" action="{{ url('/send-email') }}">
                               {{csrf_field()}}
                               <div class="form-group{{ $errors->has('to') ? ' has-error' : '' }}">
                                   <label for="to" class="col-md-4 control-label">to</label>

                                   <label for="list_id" class="col-md-4 control-label">List</label>

                                   <div class="col-md-6">
<!--                                       <select id="name" class="form-control" name="list_id" required autofocus >

                                       @if ($errors->has('to'))
                                           <span class="help-block">
                                               <strong>{{ $errors->first('to') }}</strong>
                                           </span>
                                       @endif -->
                                       <select class="form-control" name="list_id">
                                           @foreach($lists as $list)
                                           <option value="{{ $list->id }}">{{ $list->name }}</option>
                                           @endforeach
                                       </select>
                                   </div>
                               </div>
                               <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                                   <label for="subject" class="col-md-4 control-label">Subject</label>

                                   <div class="col-md-6">
                                       <input id="subject" type="text" class="form-control" name="subject" value="{{ old('subject') }}" required autofocus>

                                       @if ($errors->has('subject'))
                                           <span class="help-block">
                                               <strong>{{ $errors->first('subject') }}</strong>
                                           </span>
                                       @endif
                                   </div>
                               </div>
                               <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                   <label for="message" class="col-md-4 control-label">Message</label>

                                   <div class="col-md-6">
                                       <textarea id="message" type="text" class="form-control" name="message" value="{{ old('message') }}" required autofocus ></textarea>

                                       @if ($errors->has('message'))
                                           <span class="help-block">
                                               <strong>{{ $errors->first('message') }}</strong>
                                           </span>
                                       @endif
                                   </div>
                               </div>
                               <div class="form-group">
                                   <div class="col-md-8 col-md-offset-4">
                                       <button type="submit" class="btn btn-primary">
                                           {{'Send'}}
                                       </button>
                                   </div>
                               </div>
                           </form>
                   </div>
               </div>
           </div>
       </div>
   </div>

@endsetion