
<!-- page start-->
<div class="row" >
    <aside class="profile-nav col-lg-3">
        <section class="panel">
            <div class="user-heading round">
                <a href="#">
                    <img src="<?php echo base_url(); ?>/uploads/user_avatars/<?php echo $results->profile_pic; ?>" alt="">
                </a>
                <h1><?php echo $results->title; ?><?php echo " "; ?> <?php echo $results->name; ?></h1>
                <p><?php echo $results->email; ?></p>
            </div>

            <ul class="nav nav-pills nav-stacked">
                <li class="active" ><a href="<?php echo site_url(); ?>/users/load_profile_of_user" > <i class="fa fa-user"></i> Profile</a></li>
                <!--<li><a onclick="load_admin_activities()"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li>-->
                <li><a onclick="load_admin_edit_profile()"> <i class="fa fa-edit"></i> Edit profile</a></li>
            </ul>

        </section>
    </aside>
    <aside class="profile-info col-lg-9">
        <section class="panel">
            <!--            <form>
                            <textarea placeholder="Whats in your mind today?" rows="2" class="form-control input-lg p-text-area"></textarea>
                        </form>
                        <footer class="panel-footer">
                            <button class="btn btn-danger pull-right">Post</button>
                            <ul class="nav nav-pills">
                                <li>
                                    <a href="#"><i class="fa fa-map-marker"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-camera"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class=" fa fa-film"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-microphone"></i></a>
                                </li>
                            </ul>
                        </footer>-->
        </section>
        <section class="panel">
            <div class="bio-graph-heading">
                Hi Good Morning!Have a Great Day!!
            </div>
            <div class="panel-body bio-graph-info" id="admin_activities_filter_content">
                <h1>Bio Graph</h1>
                <div class="row">
                    <div class="bio-row">
                        <p><span>Title </span>: <?php echo $results->title; ?></p>
                    </div>

                    <div class="bio-row">
                        <p><span>Name </span>: <?php echo $results->name; ?></p>
                    </div>

                    <div class="bio-row">
                        <p><span>User Name </span>: <?php echo $results->user_name; ?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>User Type</span>: <?php echo $results->type; ?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>Email </span>: <?php echo $results->email; ?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>Address </span>: <?php echo $results->address; ?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>Contact No 01 </span>: <?php echo $results->contact_no_1; ?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>Contact No 02 </span>: <?php echo $results->contact_no_2; ?></p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <!--                <div class="col-lg-6">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="bio-chart">
                                                <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="35" data-fgColor="#e06b7d" data-bgColor="#e8e8e8">
                                            </div>
                                            <div class="bio-desk">
                                                <h4 class="red">Envato Website</h4>
                                                <p>Started : 15 July</p>
                                                <p>Deadline : 15 August</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-lg-6">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="bio-chart">
                                                <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="35" data-fgColor="#e06b7d" data-bgColor="#e8e8e8">
                                            </div>
                                            <div class="bio-desk">
                                                <h4 class="red">Envato Website</h4>
                                                <p>Started : 15 July</p>
                                                <p>Deadline : 15 August</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="bio-chart">
                                                <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="35" data-fgColor="#e06b7d" data-bgColor="#e8e8e8">
                                            </div>
                                            <div class="bio-desk">
                                                <h4 class="red">Envato Website</h4>
                                                <p>Started : 15 July</p>
                                                <p>Deadline : 15 August</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-lg-6">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="bio-chart">
                                                <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="35" data-fgColor="#e06b7d" data-bgColor="#e8e8e8">
                                            </div>
                                            <div class="bio-desk">
                                                <h4 class="red">Envato Website</h4>
                                                <p>Started : 15 July</p>
                                                <p>Deadline : 15 August</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
            </div>
        </section>
    </aside>
</div>

<!-- page end-->
<script type="text/javascript">
    //load recent admin activities
    
       
    function load_admin_activities() {

        $.ajax({
            type: "POST",
            url: site_url + '/users/load_user_activities',
//            data: "myletter=" + letter,
            success: function (msg)
            {
                $('#admin_activities_filter_content').html(msg);
            }
        });
    }

    //load admins edit profile
    function load_admin_edit_profile() {

        $.ajax({
            type: "POST",
            url: site_url + '/users/load_Edit_user_profile',
            success: function (msg)
            {
                $('#admin_activities_filter_content').html(msg);
            }
        });
    }
</script>