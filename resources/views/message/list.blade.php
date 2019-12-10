@extends('layout')

@section('content')

@include('includes.messages');

<h1>Messages </h1>

@if ( !$messages->isEmpty() ) 
    @foreach ( $messages as $msg)
    <div class="card text-center">
        <div class="card-header">
        <h3>From: {{\APP\User::find($msg->from_user_id)->name}} <span>At: {{$msg->updated_at}}</span></h3>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$msg->content}}</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            @if($msg->from_user_id == Auth::user()->id)
                <a href="#" class="btn btn-primary">Edit</a>      
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
