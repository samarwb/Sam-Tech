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
                                        <?php if(isset($permission)) { ?>
                                        <input required="true" name ="perid" value="<?php print isset($permission) ? $permission[0]->per_id : '';?>"  type="hidden" class="form-control">
                                        <?php } ?>
                                        
                                        <input required="true" name ="pername"  type="text" class="form-control">
                                        <p class="help-block">Enter Permission name.</p>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Create</button>
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