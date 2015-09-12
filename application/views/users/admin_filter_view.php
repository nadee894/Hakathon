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

       

                    <div class="media-body" >

                      
                            
                                <?php echo $result->title; ?> <?php echo $result->name; ?> <span class="text-muted small"> - <?php echo $result->type; ?></span></h4>
                         
                            
                                <?php echo $result->name; ?> <span class="text-muted small"> - <?php echo $result->type; ?></span></h4>

                 
                        <!--                                <ul class="social-links">
                                                            <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                                            <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                                            <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
                                                            <li><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                                                        </ul>-->

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