{{-- @extends('layout')


@section('styles')

    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">

@stop


@section('content')
{{--
@include('includes.errors') 

<form id="message_form" action="{{ route('message.store') }}" method="POST">
    {{ csrf_field() }}

    <div class="col-md-8">
        <label>Create new message <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></label>

        <div class="form-group">
            <input type="text" class="form-control" value="VALUE" name="message_title" disabled>
        </div>

        <div class="form-group">
            <textarea  class="form-control my-editor" rows="10" id="message_content" name="message_content"></textarea>
        </div>
        
        <div class="btn-group">
            <input class="btn btn-primary" type="submit" value="Submit" onclick="return validateForm()">
            <a class="btn btn-default" href="{{ redirect()->getUrlGenerator()->previous() }}">Go Back</a>
        </div>

    </div>

</form> --}}


<!-- Modal -->
<div id="messageModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Enter Message Body</h4>
            </div>
    
            <div class="modal-body">
            <form id="task_form" action="{{ route('message.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <label>Create new User <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></label>
                        <div class="form-group">
                                <textarea  class="form-control my-editor" rows="10" id="message_content" name="message_content"></textarea>
                            </div>
    
                    </div>
    
                </div>
    
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" value="Send" >
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
    
    
            </form>
            </div>
    
        </div>
    
    </div>
    </div>
    <!--  END modal  -->
@stop



{{-- 
@section('scripts')

    <script src="{{ asset('js/moment.js') }}"></script> 

    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>  

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script>
        jQuery(document).ready(function() {

            jQuery(function() {
                jQuery('#datetimepicker1').datetimepicker( {
                    defaultDate:'now',  // defaults to today
                    format: 'YYYY-MM-DD hh:mm:ss',  // YEAR-MONTH-DAY hour:minute:seconds
                    minDate:new Date()  // Disable previous dates, minimum is todays date
                });
            });
        });
    </script>



@stop --}}




 --}}
