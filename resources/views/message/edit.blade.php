<!-- Message Modal -->
<div id="updateMessageModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Update Message Body</h4>
        </div>

        <div class="modal-body">
            <form id="task_form" action="{{ route('message.update') }}" method="POST">
				
				{{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <label>Update Message <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></label>
                        <div class="form-group">
						<textarea  class="form-control my-editor" rows="10" id="message_content" name="message_content"></textarea>
						<input id='to_id' name="to_id" value="0" hidden/>
						<input id='from_id' name="from_id" value="0" hidden/>
						<input id='msg_id' name="msg_id" value="0" hidden/>
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
<!--  END Message modal  -->


<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

<script>
$(function(){
    $('#updateMessageModal').on('show.bs.modal', function (event) {
        
        var button = $(event.relatedTarget) // Button that triggered the modal
        var msgId = button.data('msg_id') // Extract info from data-* attributes
        var toId = button.data('to_id') // Extract info from data-* attributes
        var fromId = button.data('from_id') // Extract info from data-* attributes
        var content = button.data('message_content') // Extract info from data-* attributes

        var modal = $(this)
        modal.find('#msg_id').val(msgId)
        modal.find('#to_id').val(toId)
        modal.find('#from_id').val(fromId)
        modal.find('#message_content').val(content)

    });
});
</script>