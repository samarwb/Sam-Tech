<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Add Institution</h1>
            </div>
            <!--end page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Institution Details
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-tabs nav-justified margin-dwn nav-pills">
                            <li class="active"><a data-toggle="tab" href="#attribute">Attribute</a></li>
                            <li><a  data-toggle="tab" href="#blog">Blog</a></li>
                            <li><a  data-toggle="tab" href="#event">Events</a></li>
                            <li><a  data-toggle="tab" href="#library">Libraries</a></li>
                            <li><a  data-toggle="tab" href="#faculty">Faculties</a></li>
                        </ul>
                        <div class=" tab-content col-lg-10 ">
<!--                        <div class="col-lg-6">-->
                                <div id="attribute" class="tab-pane fade in active">
                                    <form role="form" action="<?php print site_url('admin/insertinst'); ?>" method="post">
                                        <div class="form-group" id="home">
                                            <label>Institution Name</label>
                                            <?php if(isset($institute)) { ?>
                                            <input required="true" name ="instid" value="<?php print isset($institute) ? $institute[0]->institute_id : '';?>"  type="hidden" class="form-control">
                                            <?php } ?> 
                                            <input required= "true" name ="instname"  type="text" class="form-control">
                                            <p class="help-block">Enter the Institution name to display.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Institution Description</label>
                                            <textarea name ="instdesc"  class="form-control group_parent_text_field"></textarea>
                                            <p class="help-block">Enter description for this Institution.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Institution type</lable>
                                                <div class="panel-body">
                                                    <div class="btn-group" data-toggle="buttons">
                                                        <label class="btn active">
                                                            <input type="checkbox" value='type1'>
                                                            <i class="fa fa-square-o fa-2x"></i>
                                                            <i class="fa fa-check-square-o fa-2x"></i>
                                                            <span>type1</span>
                                                        </label>

                                                        <label class="btn">
                                                            <input type="checkbox" value='type2'>
                                                            <i class="fa fa-square-o fa-2x"></i>
                                                            <i class="fa fa-check-square-o fa-2x"></i>
                                                            <span> type2</span>
                                                        </label>

                                                        <label class="btn">
                                                            <input type="checkbox" value='type3'>
                                                            <i class="fa fa-square-o fa-2x"></i>
                                                            <i class="fa fa-check-square-o fa-2x"></i>
                                                            <span> type3</span>
                                                        </label>

                                                        <label class="btn active">
                                                            <input type="checkbox" value='type4' >
                                                            <i class="fa fa-square-o fa-2x"></i>
                                                            <i class="fa fa-check-square-o fa-2x"></i>
                                                            <span> type4</span>
                                                        </label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Image</label>
                                            <input type="file" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="inststatus">
                                                <option value="<?php print STATUS_ACTIVE; ?>">Active</option>
                                                <option value="<?php print STATUS_BLOCK; ?>">Block</option>
                                            </select>
                                        </div>
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-primary">Create</button>
                                            <button type="reset" class="btn btn-primary">Clear</button>
                                        </div> 
                                    </form>
                                </div>
                                <div id="blog" class="tab-pane fade ">
                                    <?php
                                    include 'show_blog_tab.php';
                                    ?>
                                </div>
                                <div id="event" class="tab-pane fade ">
                                    <?php
                                    include 'show_event_tab.php';
                                    ?>
                                </div>
                                <div id="library" class="tab-pane fade ">
                                    <?php
                                    include 'show_library_tab.php';
                                    ?>
                                </div>
                                <div id="faculty" class="tab-pane fade ">
                                    <?php
                                    include 'show_faculty_tab.php';
                                    ?>
                                </div>
<!--                        </div>-->
                            
                        </div>                                 
                    </div>                            
                </div>                        
            </div>      
        </div>
    </div>
</div>
