<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Edit Groups</h1>
            </div>
            <!--end page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update or Make changes to your group
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" action="<?php print site_url('admin/updategroup');?>" method="post">
                                    <div class="form-group">
                                        <label>Update Group Name</label>
                                        <input required="true" name ="up_groupname"  type="text" class="form-control">
                                        <p class="help-block">Enter the group name to display.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Update Group Parent Name</label>
                                        <input type="text" name ="up_groupparent"  class="form-control group_parent_text_field" />
                                        <p class="form-control-static">Enter the parent of this group.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Group Status</label>
                                        <select name="up_groupstatus">
                                            <option value="1">Active</option>
                                            <option value="1">Block</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="reset" class="btn btn-success">Clear</button>
                                </form>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>
    </div>
    <!-- end page-wrapper -->
</div>