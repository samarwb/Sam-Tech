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
                                <img src="<?php echo base_url(); ?>admin/img/user.jpg" alt="">
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
                                <a href="<?php print site_url('admin/showpermission');?>">Show Permission</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/addpermission');?>">Create Permission</a>
                            </li>
                           
                            
                        </ul>
                    </li>
                    <li>
                        <a class="admin_menu_expand" data-toggle="collapse" data-target="#degree_menu"><i class="fa fa-bar-chart-o fa-fw"></i> Programme<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse" id="degree_menu">
                            <li>
                                <a href="<?php print site_url('admin/showprogramme');?>">Show Programme</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/addprogramme');?>">Add Programme</a>
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
                            
                            
                        </ul>
                    </li>
                    
                     <li>
                        <a class="admin_menu_expand" data-toggle="collapse" data-target="#forum_menu"><i class="fa fa-bar-chart-o fa-fw"></i> Forum<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level  collapse" id="forum_menu">
                            <li>
                                <a href="<?php print site_url('admin/showforum');?>">Show Forum</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/addforum');?>">Add Forum</a>
                            </li>
                           
                            
                        </ul>
                    </li>
                    
                     <li>
                        <a class="admin_menu_expand" data-toggle="collapse" data-target="#degtyp_menu"><i class="fa fa-bar-chart-o fa-fw"></i> Degree Type<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level  collapse" id="degtyp_menu">
                            <li>
                                <a href="<?php print site_url('admin/showdegtype');?>">Show Degree-Type</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/adddegtype');?>">Add Degree-Type</a>
                            </li>
              
                            
                        </ul>
                    </li>
                    
                    <li>
                        <a class="admin_menu_expand" data-toggle="collapse" data-target="#album_menu"><i class="fa fa-bar-chart-o fa-fw"></i> Album<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level  collapse" id="album_menu">
                            <li>
                                <a href="<?php print site_url('admin/showalbum');?>">Show Albums</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/addalbum');?>">Add Album</a>
                            </li>
              
                            
                        </ul>
                    </li>
                    
                    <li>
                        <a class="admin_menu_expand" data-toggle="collapse" data-target="#map_content"><i class="fa fa-bar-chart-o fa-fw"></i> Map Content<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level  collapse" id="map_content">
                            <li>
                                <a href="<?php print site_url('admin/mapcontent');?>">Map User</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/mapcontent');?>">Map Blog</a>
                            </li>
                            <li>
                                <a href="<?php print site_url('admin/mapcontent');?>">Map Forum</a>
                            </li>
                            
                            <li>
                                <a href="<?php print site_url('admin/mapcontent');?>">Map Degree</a>
                            </li>
                            
                            <li>
                                <a href="<?php print site_url('admin/mapcontent');?>">Map Subjects</a>
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