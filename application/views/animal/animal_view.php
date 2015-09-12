<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                <?php echo $heading; ?>
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a id="editable-sample_new" class="btn btn-shadow btn-primary" href="#vehicle_model_add_modal" data-toggle="modal">
                                Add New
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>                
                    </div>                        
                    <table  class="display table table-bordered table-striped" id="vehicle_model_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Animal</th>
                                <th>Category</th>
                                <th>Location</th>                                                                                               
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($results as $result) {
                                ?>
                                <tr id="vehicle_model_<?php echo $result->id; ?>">
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $result->name; ?></td>
                                    <td><?php echo $result->category; ?></td>
                                    <?php echo $result->block . ' ' . $result->cage; ?>

                                    <td align="center">
                                        <a class="btn btn-primary btn-xs" onclick="edit_animal('<?php echo $result->id; ?>')"><i class="fa fa-pencil"  data-original-title="Update"></i></a>                                        
                                        <a class="btn btn-danger btn-xs" onclick="delete_animal('<?php echo $result->id; ?>')"><i class="fa fa-trash-o " title="" data-original-title="Remove"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

<!--Vehicle Model Add Modal -->
<div class="modal fade " id="vehicle_model_add_modal" tabindex="-1" role="dialog" aria-labelledby="vehicle_model_add_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Animal</h4>
            </div>

            <form id="animal_add_form" name="animal_add_form">
                <div class="modal-body">

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
        </div>
    </div>
</div>
<!-- modal -->

<!--Vehicle Model Edit Modal -->
<div  class="modal fade " id="animal_edit_model" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="animal_edit_content">

        </div>
    </div>
</div>

<!--toastr-->
<script src="<?php echo base_url(); ?>backend_resources/assets/toastr-master/toastr.js"></script>
<script type="text/javascript">

                                            $('#animal_mngt_menu').addClass('active open');

                                            $(document).ready(function () {

                                                //var manufacturer = $('#manufacturer').val();

                                                $('#vehicle_model_table').dataTable();

                                                $("#animal_add_form").validate({
                                                    rules: {
                                                        name: "required",
                                                        category_id: "required",
                                                        place_id: "required"
                                                    },
                                                    messages: {
                                                        name: "Please Enter Animal Name",
                                                        category_id: "This Field is required",
                                                        place_id: "This Field is required",
                                                    }, submitHandler: function (form)
                                                    {
                                                        $.post(site_url + '/animal/add_animal', $('#animal_add_form').serialize(), function (msg)
                                                        {
                                                            if (msg == 1) {
                                                                $('#rtn_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');
                                                                animal_add_form.reset();
                                                                window.location = site_url + '/vehicle_model/manage_models';
                                                            } else {
                                                                $('#rtn_msg').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');
                                                            }
                                                        });


                                                    }
                                                });
                                            });


                                            //vehicle model delete function
                                            function delete_vehicle_model(animal_id) {

                                                if (confirm('Are you sure want to delete this Animal ?')) {

                                                    $.ajax({
                                                        type: "POST",
                                                        url: site_url + '/animal/delete_vehicle_model',
                                                        data: "id=" + id,
                                                        success: function (msg) {
                                                            if (msg == 1) {
                                                                $("#vehicle_model_" + id).hide();
                                                                toastr.success("Successfully deleted !!", "AutoVille");

                                                            } else if (msg == 2) {
                                                                alert('Cannot be deleted!');
                                                            }
                                                        }
                                                    });
                                                }

                                            }


                                            function edit_animal(animal_id) {

                                                $.post(site_url + '/animal/load_animal', {id: animal_id}, function (msg) {

                                                    $('#animal_edit_content').html('');
                                                    $('#animal_edit_content').html(msg);
                                                    $('#animal_edit_model').modal('show');
                                                });


                                            }
</script>














