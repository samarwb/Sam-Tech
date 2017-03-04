<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Add Permission</h1>
            </div>
            <!--end page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Assign Permission
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" action="<?php print site_url('admin/insertpermission');?>" method="post">
                                    <div class="form-group">
                                        <label>Permission Name</label>
                                        <input required="true" name ="perid" value="<?php print isset($single_per) ? $single_per[0]->per_id : '' ?>"  type="hidden" class="form-control">
                                        <input required="true" name ="pername" value="<?php print isset($single_per)? $single_per[0]->per_name : '' ?>" type="text" class="form-control">
                                        <p class="help-block">Enter Permission name.</p>
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