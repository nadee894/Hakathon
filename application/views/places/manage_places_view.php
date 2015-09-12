<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Manage Zoo Locations
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a id="editable-sample_new" class="btn btn-shadow btn-primary" href="#places_add_modal" data-toggle="modal">
                                Add New
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <table  class="display table table-bordered table-striped" id="places_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Block</th>
                                <!--<th>Logo</th>-->
                                <th>Cage</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($results as $result) {
                                ?>
                                <tr id="places_<?php echo $result->id; ?>">
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $result->block; ?></td>
                                    <td><?php echo $result->cage; ?></td>
                                    <!--<td align="center"><img src="<?php echo base_url(); ?>uploads/body_type_logo/<?php echo $result->logo; ?>" width="60px" /></td>-->


                                    <td align="center">
                                        <a class="btn btn-primary btn-xs" onclick="display_edit_places_pop_up(<?php echo $result->id; ?>)"><i class="fa fa-pencil" title="Update"></i></a>
                                        <a class="btn btn-danger btn-xs" onclick="delete_places<?php echo $result->id; ?>)"><i class="fa fa-trash-o " title="" title="Remove"></i></a>

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

<!--Body Type add model-->
<div class="modal fade " id="places_add_modal" tabindex="-1" role="dialog" aria-labelledby="places_add_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Location</h4>
            </div>
            <form id="add_places_form" name="places_form">
                <div class="modal-body">
<!--                    <script src="<?php echo base_url(); ?>backend_resources/file_upload_plugin/ajaxupload.3.5.js" type="text/javascript"></script>
                    <script>
                                        //upload body type logo

                                        $(function () {
                                            var btnUpload = $('#upload');
                                            var status = $('#status');
                                            new AjaxUpload(btnUpload, {
                                                action: '<?php echo site_url(); ?>/body_type/upload_body_type_logo',
                                                name: 'uploadfile',
                                                onSubmit: function (file, ext) {
                                                    if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))) {
                                                        // extension is not allowed 
                                                        status.text('Only JPG, PNG or GIF files are allowed');
                                                        return false;
                                                    }
                                                    //status.text('Uploading...Please wait');
                                                    //                                            $("#files").html("<i id='animate-icon' class='fa fa-spinner fa fa-2x fa-spin'></i>");

                                                },
                                                onComplete: function (file, response) {
                                                    //On completion clear the status
                                                    //status.text('');
                                                    $("#files").html("");
                                                    $("#sta").html("");
                                                    //Add uploaded file to list
                                                    if (response != "error") {
                                                        $('#files').html("");
                                                        $('<div></div>').appendTo('#files').html('<img src="<?php echo base_url(); ?>uploads/body_type_logo/' + response + '"   width="100px" height="68px" /><br />');
                                                        picFileName = response;
                                                        document.getElementById('logo').value = response;
                                                        //                    document.getElementById('cover_image').value = response;
                                                    } else {
                                                        $('<div></div>').appendTo('#files').text(file).addClass('error');
                                                    }
                                                }
                                            });

                                        });
                    </script>-->

                    <div class="form-group">
                        <label for="name">Enter Block
                            <span class="mandatory">*</span>
                        </label>

                        <input id="block" class="form-control" name="block" type="text" placeholder="Block">
                    </div>
                    <div class="form-group">
                        <label for="name">Enter Cage
                            <span class="mandatory">*</span>
                        </label>

                        <input id="cage" class="form-control" name="cage" type="text" placeholder="Cage">
                    </div>
                    <div class="form-group">
                        <div id="upload">
                            <!--
                                                        <label class="form-label">Upload Logo</label>
                                                        <button type="button" class="btn btn-info" id="browse">Browse</button>
                                                        <input type="text" id="logo" name="logo" style="visibility: hidden" value=""/>
                                                    </div>
                                                    <div id="sta"><span id="status" ></span></div>
                                                </div>
                                                <div class="form-group">
                                                    <div id="files" class="project-logo">
                                                    </div>
                                                </div>-->
                            <span id="rtn_msg"></span>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                            <button class="btn btn-success" type="submit">Save changes</button>
                        </div>

                        

                    </div>
                </div>
            </form>

        </div>
    </div>
</div>


<!--Transmission Edit Modal -->
<div class="modal fade "  id="places_edit_div" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="places_edit_content">

        </div>
    </div>
</div>


<!--toastr-->
<script src="<?php echo base_url(); ?>backend_resources/assets/toastr-master/toastr.js"></script>
<script type="text/javascript">

                                        $(document).ready(function () {
                                            $('#places_table').dataTable();

                                            $("#add_places_form").validate({
                                                rules: {
                                                    block: "required",
                                                    cage: "required"
                                                },
                                                messages: {
                                                    block: {
                                                        required: "Please enter a Block"
                                                    },
                                                    cage: {
                                                        required: "Please enter a Cage"
                                                    }
                                                }, submitHandler: function (form)
                                                {
                                                    $.post(site_url + '/places/add_place', $('#add_places_form').serialize(), function (msg)
                                                    {
                                                        if (msg == 1) {
                                                            $('#rtn_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');
                                                            add_places_form.reset();
                                                            window.location = site_url + '/places/manage_places';


                                                        } else {
                                                            $('#rtn_msg').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');
                                                        }
                                                    });


                                                }
                                            });

                                        });

                                        //delete body types
                                        function delete_places(id) {

                                            if (confirm('Are you sure want to delete this place ?')) {

                                                $.ajax({
                                                    type: "POST",
                                                    url: site_url + '/places/delete_place',
                                                    data: "id=" + id,
                                                    success: function (msg) {
                                                        //alert(msg);
                                                        if (msg == 1) {
                                                            //document.getElementById(trid).style.display='none';
                                                            $('#places_' + id).hide();
                                                            toastr.success("Successfully deleted !!", "AutoVille");
                                                        }
                                                        else if (msg == 2) {
                                                            alert('Cannot be deleted as it is already assigned to others. !!');
                                                        }
                                                    }
                                                });
                                            }
                                        }



                                        //Edit body type
                                        function  display_edit_places_pop_up(places_id) {

                                            $.post(site_url + '/places/load_update_places_popup', {places_id: places_id}, function (msg) {

                                                $('#places_edit_content').html('');
                                                $('#places_edit_content').html(msg);
                                                $('#places_edit_div').modal('show');
                                            });


                                        }

</script>



