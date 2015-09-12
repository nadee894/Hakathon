<form id="animal_add_form" name="animal_edit_form">
    <div class="modal-body">
         <input id="id" name="id" class="form-control" type="text" value="">
        <div class="form-group">                        
            <label for="name">Animal<span class="mandatory">*</span></label>
            <input id="name" name="name" class="form-control" type="text" placeholder="Enter Animal">
        </div>
        <div class="form-group">
            <label for="category_id">Category<span class="mandatory">*</span></label>
            <select name="category_id" id="category_id" title="manufacturer" data-live-search="true">
                <option value="">Select Category</option>
                <?php foreach ($categories as $category) { ?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">                        
            <label for="place_id">Place<span class="mandatory">*</span></label>
            <select name="place_id" id="place_id" title="Place" data-live-search="true">
                <option value="">Select Place</option>
                <?php foreach ($places as $place) { ?>
                    <option value="<?php echo $place->id; ?>"><?php echo $place->block . ' ' . $place->cage; ?></option>
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