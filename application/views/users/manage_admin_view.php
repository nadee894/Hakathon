

<header class="panel-heading">
    Manage Administrators
    <span class="tools pull-right">
        <a href="javascript:;" class="fa fa-chevron-down"></a>
        <a href="javascript:;" class="fa fa-times"></a>
    </span>
</header>
<!-- page start-->
<a id="editable-sample_new" class="btn btn-shadow btn-primary" href="#user_add_modal" data-toggle="modal">
    Add New
    <i class="fa fa-plus"></i>
</a>
<br>
<br>
<ul class="directory-list">
    <li><a onclick="load_admins_by_letter('A')" style="cursor: pointer">a</a></li>
    <li><a onclick="load_admins_by_letter('B')" style="cursor: pointer">b</a></li>
    <li><a onclick="load_admins_by_letter('C')" style="cursor: pointer">c</a></li>
    <li><a onclick="load_admins_by_letter('D')" style="cursor: pointer">d</a></li>
    <li><a onclick="load_admins_by_letter('E')" style="cursor: pointer">e</a></li>
    <li><a onclick="load_admins_by_letter('F')" style="cursor: pointer">f</a></li>
    <li><a onclick="load_admins_by_letter('G')" style="cursor: pointer">g</a></li>
    <li><a onclick="load_admins_by_letter('H')" style="cursor: pointer">h</a></li>
    <li><a onclick="load_admins_by_letter('I')" style="cursor: pointer">i</a></li>
    <li><a onclick="load_admins_by_letter('J')" style="cursor: pointer">j</a></li>
    <li><a onclick="load_admins_by_letter('K')" style="cursor: pointer">k</a></li>
    <li><a onclick="load_admins_by_letter('L')" style="cursor: pointer">l</a></li>
    <li><a onclick="load_admins_by_letter('M')" style="cursor: pointer">m</a></li>
    <li><a onclick="load_admins_by_letter('N')" style="cursor: pointer">n</a></li>
    <li><a onclick="load_admins_by_letter('O')" style="cursor: pointer">o</a></li>
    <li><a onclick="load_admins_by_letter('P')" style="cursor: pointer">p</a></li>
    <li><a onclick="load_admins_by_letter('Q')" style="cursor: pointer">q</a></li>
    <li><a onclick="load_admins_by_letter('R')" style="cursor: pointer">r</a></li>
    <li><a onclick="load_admins_by_letter('S')" style="cursor: pointer">s</a></li>
    <li><a onclick="load_admins_by_letter('T')" style="cursor: pointer">t</a></li>
    <li><a onclick="load_admins_by_letter('U')" style="cursor: pointer">u</a></li>
    <li><a onclick="load_admins_by_letter('V')" style="cursor: pointer">v</a></li>
    <li><a onclick="load_admins_by_letter('W')" style="cursor: pointer">w</a></li>
    <li><a onclick="load_admins_by_letter('X')" style="cursor: pointer">x</a></li>
    <li><a onclick="load_admins_by_letter('Y')" style="cursor: pointer">y</a></li>
    <li><a onclick="load_admins_by_letter('Z')" style="cursor: pointer">z</a></li>
</ul>
<div class="directory-info-row">
    <div class="row" id="admin_filter_content">

        <?php
        $i = 0;
        $n = 0;
        foreach ($results as $result) {
            ?>
            <div class="col-md-6 col-sm-6"id="admin_<?php echo $result->id; ?>" >
                <?php ++$i; ?>
                <div class="panel" >

                    <div class="panel-body">
                        <div class="media" >

<!--                            <a class="pull-left" href="#">
                                <?php if (empty($result->profile_pic)) { ?>
                                    <img alt="" class="thumb media-object" height="120" width="100" src="<?php echo base_url(); ?>/uploads/user_avatars/avatar.jpg" >
                                <?php } else { ?>
                                    <img alt="" class="thumb media-object" height="120" width="100" src="<?php echo base_url(); ?>/uploads/user_avatars/<?php echo $result->profile_pic; ?>" >
                                <?php } ?>
                            </a>-->

                            <div class="media-body" >



                               <span class="text-primary"> <?php echo $result->title; ?> <?php echo $result->name; ?>  - <?php echo $result->type; ?></span></h4>

                                <address>Address : <?php echo $result->address; ?><br>
                                    <abbr title="Phone">Tel:</abbr> <?php echo $result->contact_no_1; ?><br>

                                    <email>E-mail : <?php echo $result->email; ?></email><br>
                                </address>
                                <br>

                                <span class="p-team">
                                    <span>
                                        <?php if ($result->is_published) { ?>
                                            <a class="btn btn-success btn-xs" onclick="change_publish_status(<?php echo $result->id; ?>, 0, this)" title="click to disable user"><i class="fa fa-check"></i></a>
                                        <?php } else { ?>
                                            <a class="btn btn-warning btn-xs" onclick="change_publish_status(<?php echo $result->id; ?>, 1, this)" title="click to enable user"><i class="fa fa-exclamation-circle"></i></a>
                                        <?php } ?>
                                    </span>



                                    <a class="btn btn-danger btn-xs" onclick="load_after_deleted(<?php echo $result->id; ?>)" ><i class="fa fa-trash-o " title="" title="Remove"></i></a>

                                    <a class="btn btn-info btn-xs" href="<?php echo site_url(); ?>/user_privilege/manage_user_privileges/<?php echo $result->id; ?>">Assign Privileges</a>
                                </span>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


    </div>
</div>

<!--User add model-->
<div class="modal fade " id="user_add_modal" tabindex="-1" role="dialog" aria-labelledby="user_add_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Administrator</h4>
            </div>

            <div class="modal-body">
                <form id="add_user_type_form" name="add_user_type_form"class="form-horizontal" role="form">
                    <script src="<?php echo base_url(); ?>backend_resources/file_upload_plugin/ajaxupload.3.5.js" type="text/javascript"></script>
                    <script>
                                    //upload user avatar

                                    $(function () {
                                        var btnUpload = $('#upload');
                                        var status = $('#status');
                                        new AjaxUpload(btnUpload, {
                                            action: '<?php echo site_url(); ?>/users/upload_user_avatar',
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
                                                    $('<div></div>').appendTo('#files').html('<img src="<?php echo base_url(); ?>/uploads/user_avatars/' + response + '" height="120px" width="100px" /><br />');
                                                    picFileName = response;
                                                    document.getElementById('profile_pic').value = response;
                                                    //                    document.getElementById('cover_image').value = response;
                                                } else {
                                                    $('<div></div>').appendTo('#files').text(file).addClass('error');
                                                }
                                            }
                                        });
                                    });</script>

                    <div class="form-group">
                        <label  class="col-lg-3 control-label">Title</label>
                        <div class="col-lg-8">
                            <input name="title" type="text" class="form-control" id="title" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-3 control-label">Name</label>
                        <div class="col-lg-8">
                            <input name="name" type="text" class="form-control" id="name" placeholder=" ">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-8">
                            <div id="files" class="project-logo">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="col-lg-3 control-label">User Name</label>
                        <div class="col-lg-8">
                            <input name="user_name" type="text" class="form-control" id="user_name" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-3 control-label">User Type</label>
                        <div class="col-lg-8">
                            <input name="user_type" type="text" class="form-control" id="user_type" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-3 control-label">E-mail</label>
                        <div class="col-lg-8">
                            <input name="email" type="text" class="form-control" id="email" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-3 control-label">Address</label>
                        <div class="col-lg-8">
                            <input name="address" type="text" class="form-control" id="address" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-3 control-label">Contact No 01</label>
                        <div class="col-lg-8">
                            <input name="contact_no_1" type="text" class="form-control" id="contact_no_1" placeholder=" ">
                        </div>
                    </div>
                    <!--                    <div class="form-group">
                                            <label  class="col-lg-3 control-label">Contact No 02</label>
                                            <div class="col-lg-8">
                                                <input name="contact_no_2" type="text" class="form-control" id="contact_no_2" placeholder=" ">
                                            </div>
                                        </div>-->

                    <div class="form-group">
                        <label  class="col-lg-3 control-label">Password</label>
                        <div class="col-lg-8">
                            <input name="password" type="password" class="form-control" id="password" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-3 control-label">Re-type Password</label>
                        <div class="col-lg-8">
                            <input name="re_pasword" type="password" class="form-control" id="re_pasword" placeholder=" ">
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>

                    <span id="rtn_msg"></span>
                </form>
            </div>
        </div>
    </div>
</div>



<!--user Edit Modal -->
<div class="modal fade "  id="body_type_edit_div" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="body_type_edit_content">

        </div>
    </div>
</div>
<!-- page end-->
<!--toastr-->
<script src="<?php echo base_url(); ?>backend_resources/assets/toastr-master/toastr.js"></script>
<script type="text/javascript">

                                    $('#user_menu').addClass('active');
                                    //change Online status of body types
                                    function change_online_status(user_id, value, element) {


                                        $.ajax({
                                            type: "POST",
                                            url: site_url + '/users/change_online_status',
                                            data: "id=" + user_id + "&value=" + value,
                                            success: function (msg) {
                                                if (msg == 1) {
                                                    if (value == 1) {
                                                        $(element).parent().html('<h4><i class="fa  fa-circle  text-success"></i><?php echo $result->name; ?> <span class="text-muted small"> - UI Engineer</span></h4>');
                                                    } else {
                                                        $(element).parent().html('<h4><i class="fa  fa-circle  text-danger"></i><?php echo $result->name; ?> <span class="text-muted small"> - UI Engineer</span></h4>');
                                                    }

                                                } else if (msg == 2) {
                                                    alert('Error !!');
                                                }
                                            }
                                        });
                                    }

                                    //load admins by letter
                                    function load_admins_by_letter(letter) {
                                        $.ajax({
                                            type: "POST",
                                            url: site_url + '/users/load_admins_by_letter',
                                            data: "myletter=" + letter,
                                            success: function (msg)
                                            {
                                                $('#admin_filter_content').html(msg);
                                            }
                                        });
                                    }

                                    //load admins by letter
                                    function load_all_admins() {

                                        var address = $('#address');
                                        var contact_no_01 = $('#contact_no_1');
                                        var contact_no_02 = $('#contact_no_2');
                                    }

                                    //load admins when deleted
                                    function load_after_deleted(user_id) {
                                        if (confirm('Are you sure want to delete this user ?')) {
                                            $.ajax({
                                                type: "POST",
                                                url: site_url + '/users/delete_users',
                                                data: "user_id=" + user_id,
                                                success: function (msg)
                                                {
                                                    if (msg == 1) {
                                                        //document.getElementById(trid).style.display='none';
                                                        $('#admin_' + user_id).hide();
                                                        toastr.success("Successfully deleted !!", "AutoVille");
                                                        //                        $('#admin_filter_content').html(msg);
                                                    }
                                                    else if (msg == 2) {
                                                        alert('Error in Deleting. !!');
                                                    }
                                                }
                                            });
                                        }
                                    }


                                    //change publish status of a user
                                    function change_publish_status(user_id, value, element) {

                                        var condition = 'Do you want to enable this user ?';
                                        if (value == 0) {
                                            condition = 'Do you want to disable this user?';
                                        }

                                        if (confirm(condition)) {
                                            $.ajax({
                                                type: "POST",
                                                url: site_url + '/users/change_publish_status',
                                                data: "id=" + user_id + "&value=" + value,
                                                success: function (msg) {
                                                    if (msg == 1) {
                                                        if (value == 1) {
                                                            $(element).parent().html('<a class="btn btn-success btn-xs" onclick="change_publish_status(' + user_id + ',0,this)" title="click to disable user"><i class="fa fa-check"></i></a>');
                                                        } else {
                                                            $(element).parent().html('<a class="btn btn-warning btn-xs" onclick="change_publish_status(' + user_id + ',1,this)" title="click to enable user"><i class="fa fa-exclamation-circle"></i></a>');
                                                        }

                                                    } else if (msg == 2) {
                                                        alert('Error !!');
                                                    }
                                                }
                                            });
                                        }
                                    }

//Add a new administrator
                                    $('#user_menu').addClass('active open');

                                    $(document).ready(function () {
                                        $("#add_user_type_form").validate({
                                            rules: {
                                                title: {
                                                    required: true
                                                },
                                                name: {
                                                    required: true
                                                },
                                                user_name: "required",
                                                user_type: {
                                                    required: true,
                                                    digits: true
                                                },
                                                email: {
                                                    required: true,
                                                    email: true
                                                },
                                                address: "required",
                                                contact_no_1: {
                                                    required: true,
                                                    digits: true,
                                                    minlength: 10,
                                                    maxlength: 10
                                                },
                                                contact_no_2: {
                                                    required: true,
                                                    digits: true,
                                                    minlength: 10,
                                                    maxlength: 10
                                                },
                                                password: "required",
                                                re_pasword: {
                                                    required: true,
                                                    equalTo: '#password'
                                                }

                                            },
                                            messages: {
                                                title: {
                                                    required: "Please enter a title"
                                                },
                                                name: {
                                                    required: "Please enter a name"
                                                },
                                                user_name: "Please enter a user name",
                                                user_type: {
                                                    required: "Please enter a user type",
                                                    digits: "Invalid user type"
                                                },
                                                email: {
                                                    required: "Please enter a email",
                                                    email: "Invalid Email"
                                                },
                                                address: "Please enter a address",
                                                contact_no_1: {
                                                    required: "Please enter a phone no",
                                                    digits: "Enter numbers only",
                                                    maxlength: "Phone number is too long",
                                                    minlength: "Phone number is too short"
                                                },
                                                contact_no_2: {
                                                    required: "Please enter a phone no",
                                                    digits: "Enter numbers only",
                                                    maxlength: "Phone number is too long",
                                                    minlength: "Phone number is too short"
                                                },
                                                password: "Please enter a password",
                                                re_pasword:
                                                        {
                                                            required: "Retype the Password",
                                                            equalTo: "Passwords are not matching"
                                                        }
                                            }, submitHandler: function (form) {
                                                $.post(site_url + '/users/add_admin', $('#add_user_type_form').serialize(), function (msg)
                                                {

                                                    if (msg == 1) {
                                                        $('#rtn_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');
                                                        add_user_type_form.reset();
                                                        window.location = site_url + '/users/manage_admins';
                                                        toastr.success("Profile Successfully Created !!", "AutoVille");


                                                    } else {
                                                        $('#rtn_msg').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');
                                                    }
                                                });
                                            }
                                        }
                                        );
                                    });



</script>