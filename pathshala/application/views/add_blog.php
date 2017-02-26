<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <form role="form" action="<?php print site_url('admin/insertblog'); ?>" method="post">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Blog details</h1>
                </div>
                <!--end page header -->
        </div>
        <div class="panel-group">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Title:
                    </div>
                    <div class="panel-body">
                        <input required="true" name ="blogtitle"  type="text" class="form-control" placeholder="Enter title for your Blog">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-group">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Select stream:
                    </div>
                        <div class="panel-body">
                            <?php if (!empty($groups)) {
                            foreach ($groups as $key => $group) {?>
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn <?php ($key == 0) ? print 'active' : print ''; ?>">
                                        <input type="checkbox" value='<?php print $group->gid; ?>'>
                                            <i class="fa fa-square-o fa-2x"></i>
                                            <i class="fa fa-check-square-o fa-2x"></i>
                                            <span><?php print $group->group_name; ?></span>
                                    </label>
                                </div>
                            <?php }} else { print 'No groups Available.';} ?>
                        </div>
                </div>
            </div>
        </div>
        <div class="panel-group">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Description:
                    </div>
                    <div class="panel-body">
                        <textarea name ="blogdesc"  class="form-control group_parent_text_field"></textarea> 
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-group">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Institution:
                    </div>
                    <div class="panel-body">
                        <input type="search" name="keyword" placeholder="Search Names" id="searchbox" class="form-control in_width">
                        <input type="button" class="btn btn-primary " value="Add">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-group">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Status:
                    </div>
                    <select name="blogstatus" class="form-control">
                        <option value="<?php print STATUS_ACTIVE; ?>">Active</option>
                        <option value="<?php print STATUS_BLOCK; ?>">Block</option>
                    </select>
                </div>
            </div>
        </div>    
        <button type="submit" class="btn btn-primary">Create</button>
        <button type="reset" class="btn btn-success">Clear</button>
        </form>
    </div>
</div>

