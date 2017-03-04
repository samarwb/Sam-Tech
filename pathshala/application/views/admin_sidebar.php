<div id="admin_sidebar">
    <!-- navbar side -->
        <nav class="navbar-default navbar-static-side " role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse ">
                <!-- side-menu -->
                <ul class="nav  " id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="<?php echo base_url(); ?>admin/assets/img/user.jpg" alt="">
                            </div>
                            <div class="user-info">
                                <div>Sam <strong>Tech</strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!--end search section-->
                    </li>
                    <li class="selected">
                        <a href="<?php print base_url();?>"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                    <li>
                        <a class="admin_menu_expand" data-toggle="collapse" data-target="#group_menu"><i class="fa fa-bar-chart-o fa-fw"></i> Groups<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse" id="group_menu">
                            <li>
                                <a href="<?php print site_url('admin/showgroup');?>">Show Groups</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/addgroup');?>">Add Groups</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/editgroup');?>">Edit Groups</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a class="admin_menu_expand" data-toggle="collapse" data-target="#subject_menu"><i class="fa fa-bar-chart-o fa-fw"></i> Subjects<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse" id="subject_menu">
                            <li>
                                <a href="<?php print site_url('admin/showsubject');?>">Show Subjects</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/addsubject');?>">Add Subjects</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/editsubject');?>">Edit Subjects</a>
                            </li>
                            
                            
                        </ul>
                    </li>
                    <li>
                        <a class="admin_menu_expand" data-toggle="collapse" data-target="#user_menu"><i class="fa fa-bar-chart-o fa-fw"></i> Users<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse" id="user_menu">
                             <li>
                                <a href="<?php print site_url('admin/showuser');?>">Show Users</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/adduser');?>">Add Users</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/edituser');?>">Edit Users</a>
                            </li>
                           
                            
                        </ul>
                    </li>
                    <li>
                        <a class="admin_menu_expand"  data-toggle="collapse" data-target="#role_menu"><i class="fa fa-bar-chart-o fa-fw"></i> User Activity<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse" id="role_menu">
                            <li>
                                <a href="<?php print site_url('admin/showrole');?>">Show Role</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/addrole');?>">Create Role</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/editrole');?>">Edit Role</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/showpermission');?>">Show Permission</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/addpermission');?>">Create Permission</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/editpermission');?>">Edit Permission</a>
                            </li>
                            
                            
                        </ul>
                    </li>
                    <li>
                        <a class="admin_menu_expand" data-toggle="collapse" data-target="#degree_menu"><i class="fa fa-bar-chart-o fa-fw"></i> Degree<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse" id="degree_menu">
                            <li>
                                <a href="<?php print site_url('admin/showdegree');?>">Show Degree</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/adddegree');?>">Add Degree</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/editdegree');?>">Edit Degree</a>
                            </li>
                            
                            
                        </ul>
                    </li>
                    <li>
                        <a class="admin_menu_expand" data-toggle="collapse" data-target="#library_menu"><i class="fa fa-bar-chart-o fa-fw"></i> Library<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse" id="library_menu">
                             <li>
                                <a href="<?php print site_url('admin/showlibrary');?>">Show Library</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/addlibrary');?>">Add Library</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/editlibrary');?>">Edit Library</a>
                            </li>
                           
                            
                        </ul>
                    </li>
                    <li>
                        <a class="admin_menu_expand" data-toggle="collapse" data-target="#category_menu"><i class="fa fa-bar-chart-o fa-fw"></i> Category<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level  collapse" id="category_menu">
                            <li>
                                <a href="<?php print site_url('admin/showcategory');?>">Show Category</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/addcategory');?>">Add Category</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/editcategory');?>">Edit Category</a>
                            </li>
                            
                            
                        </ul>
                    </li>
                    <li>
                        <a class="admin_menu_expand" data-toggle="collapse" data-target="#institution_menu"><i class="fa fa-bar-chart-o fa-fw"></i> Institution<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level  collapse" id="institution_menu">
                            <li>
                                <a href="<?php print site_url('admin/showinst');?>">Show Institution</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/addinst');?>">Add Institution</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/editinst');?>">Edit Institution</a>
                            </li>
                            
                            
                        </ul>
                    </li>
                    <li>
                        <a class="admin_menu_expand" data-toggle="collapse" data-target="#blog_menu"><i class="fa fa-bar-chart-o fa-fw"></i> Blogs<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level  collapse" id="blog_menu">
                            <li>
                                <a href="<?php print site_url('admin/showblog');?>">Show Blogs</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/addblog');?>">Add Blog</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/editblog');?>">Edit Blog</a>
                            </li>
                            
                            
                        </ul>
                    </li>
                    <!-- second-level-items -->
                   
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
</div>