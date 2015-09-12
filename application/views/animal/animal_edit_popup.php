<form id="animal_edit_form" name="animal_edit_form">
    <div class="modal-body">
        <input id="id" name="id" class="form-control" type="hidden" value="<?php echo $animal->id;?>">
        <div class="form-group">                        
            <label for="name">Animal<span class="mandatory">*</span></label>
            <input id="name" name="name" class="form-control" type="text" placeholder="Enter Animal" value="<?php echo $animal->name;?>">
        </div>
        <div class="form-group">
            <label for="category_id">Category<span class="mandatory">*</span></label>
            <select name="category_id" id="category_id" title="manufacturer" data-live-search="true">
                <option value="">Select Category</option>
                <?php foreach ($categories as $category) { ?>
                <option value="<?php echo $category->id; ?>" <?php if($animal->cat_id==$category->id){?> selected="selected"<?php }?>><?php echo $category->name; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">                        
            <label for="place_id">Place<span class="mandatory">*</span></label>
            <select name="place_id" id="place_id" title="Place" data-live-search="true">
                <option value="">Select Place</option>
                <?php foreach ($places as $place) { ?>
                    <option value="<?php echo $place->id; ?>" <?php if($animal->place_id==$place->id){?> selected="selected"<?php }?>><?php echo $place->block . ' ' . $place->cage; ?></option>
                <?php } ?>
            </select>
        </div>

        <span id="rtn_msg"></span>
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
        <button class="btn btn-success" type="submit">Save changes</button>
    </div>
</form>


<script type="text/javascript">

    $.post(site_url + '/animal/edit_animal', $('#animal_edit_form').serialize(), function (msg)
    {
        if (msg == 1) {
            $('#rtn_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');
            animal_edit_form.reset();
            window.location = site_url + '/animal';
        } else {
            $('#rtn_msg').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');
        }
    });

</script>
