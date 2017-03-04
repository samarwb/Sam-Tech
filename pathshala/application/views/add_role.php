<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Add User Role's</h1>
            </div>
            <!--end page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Assign Role
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" action="<?php print site_url('admin/insertrole');?>" method="post">
                                    <div class="form-group">
                                        <label>Role Name</label>                                        
                                        <input name ="roleid" value="<?php print isset($single_role) ? $single_role[0]->rid : '';?>"  type="hidden" class="form-control">                                       
                                        <input required="true" name ="rolename" value="<?php print isset($single_role)? $single_role[0]->role_name : '' ?>"  type="text" class="form-control">
                                        <p class="help-block">Enter name of the role.</p>
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