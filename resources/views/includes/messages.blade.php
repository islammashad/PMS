<!-- Message Modal -->
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
                        <label>Create new Message <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></label>
                        <div class="form-group">
                            <textarea  class="form-control my-editor" rows="10" id="message_content" name="message_content"></textarea>
                            <input id='to_id' name="to_id" value="0" hidden/>
                            <input id='from_id' name="from_id" value="0" hidden/>
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
    $('#messageModal').on('show.bs.modal', function (event) {
        
        var button = $(event.relatedTarget) // Button that triggered the modal
        var toId = button.data('to_id') // Extract info from data-* attributes
        var fromId = button.data('from_id') // Extract info from data-* attributes

        var modal = $(this)
        modal.find('#to_id').val(toId)
        modal.find('#from_id').val(fromId)

    })
})
</script>