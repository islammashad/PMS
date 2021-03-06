@extends('layout')

@section('content')

@include('includes.messages')
@include('message.edit')


<h1>Messages </h1>

@if ( !$messages->isEmpty() ) 
    @foreach ( $messages as $msg)

    <div class="card text-center">
        <div class="card-header">
        <h3>From: {{\APP\User::find($msg->from_user_id)->name}} <small class="text-muted">At: {{$msg->updated_at}}</small></h3>
        </div>
        <div class="card-body">
            <p class="card-title">{{$msg->content}}</p>
    
            @if($msg->from_user_id == Auth::user()->id)
                <button data-msg_id = {{$msg->id}} data-to_id = {{$msg->from_user_id}} data-from_id = {{$msg->to_user_id}} data-message_content = "{{$msg->content}}" data-toggle="modal" data-target="#updateMessageModal" class="btn btn-primary">Edit</button>
                <a class="btn btn-danger" href="{{ route('message.delete', [ 'id' => $msg->id ]) }}" Onclick="return ConfirmDelete();">Delete</a>
            @else
            <button data-toggle="modal" data-target="#messageModal" data-to_id = {{$msg->from_user_id}} data-from_id = {{$msg->to_user_id}} class="btn btn-primary">Reply</button>
                {{-- <a href="#" class="btn btn-primary">Reply</a> --}}
            @endif
        </div>
        
    </div>
    <hr>
    @endforeach
@else 
    <p><em>There are no messages</em></p>
@endif

<div class="btn-group">
    <a class="btn btn-default" href="{{ redirect()->getUrlGenerator()->previous() }}">Go Back</a>
</div>

@stop

<script>
    function ConfirmDelete()
    {
        var x = confirm("Are you sure Delete this Message ?");
        if (x)
            return true;
        else
            return false;
    }
</script>  
