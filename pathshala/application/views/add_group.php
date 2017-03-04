<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Add Groups</h1>
            </div>
            <!--end page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Group Details 
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" action="<?php print site_url('admin/insertgroup');?>" method="post">
                                    <div class="form-group">
                                        <label>Group Name</label>
                                        <input required="true" name ="groupname" value="<?php print ucfirst(isset($single_group)? $single_group[0]->group_name : '' )?>" type="text" class="form-control">
                                        <input name="groupid" type="hidden" value="<?php print isset($single_group) ? $single_group[0]->gid : ''  ?>" />
                                        <p class="help-block">Enter the group name to display.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Group Parent Name</label>
                                        <input type="text" name ="groupparent"  class="form-control group_parent_text_field" />
                                        <p class="form-control-static">Enter the parent of this group.</p>
                                    </div>
                                    <div class="form-group ">
                                        <label>Group Status</label>
                                        <select name="groupstatus" class="form-control">
                                            <option value="<?php print STATUS_ACTIVE;?>" checked="<?php print isset($single_group) && $single_group[0]->status == STATUS_ACTIVE ? 'true' : ''  ?>">Active</option>
                                            <option value="<?php print STATUS_BLOCK;?>" checked="<?php print isset($single_group) && $single_group[0]->status == STATUS_BLOCK ? 'true' : ''  ?>">Block</option>
                                        </select>
                                    </div>
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                        <button type="reset" class="btn btn-primary">Clear</button>
                                    </div>
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