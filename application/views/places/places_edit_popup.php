<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Places Quick Edit</h4>
</div>
<form id="edit_place_form" name="edit_place_form">
    <div class="modal-body">

        <div class="form-group">
            <label for="name">Places<span class="mandatory">*</span></label>
            <input id="block" class="form-control" name="block" type="text" value="<?php echo $places->block; ?>">
            <input id="cage" class="form-control" name="cage" type="text" value="<?php echo $places->cage; ?>">
            <input id="places_id"  name="places_id" type="hidden" value="<?php echo $places->id; ?>">
        </div>
        <span id="rtn_msg_edit"></span>
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
        <button class="btn btn-success" type="submit">Save changes</button>
    </div>
</form>

<script type="text/javascript">

    //edit body type form validation
    $("#edit_place_form").validate({
        rules: {
            block: "required",
            cage:"required"
            
        },
        messages: {
            block: "Please enter a block",
            cage: "please enter a cage"
        }, submitHandler: function (form)
        {
            $.post(site_url + '/places/update_place', $('#edit_place_form').serialize(), function (msg)
            {
                if (msg == 1) {
                    $('#rtn_msg_edit').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully Updated!!.</strong></div>');

                    window.location = site_url + '/places/manage_places';
                } else {
                    $('#rtn_msg_edit').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');

                }
            });


        }
    });
</script>