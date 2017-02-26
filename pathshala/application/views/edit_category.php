<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Add Category</h1>
            </div>
            <!--end page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Category Details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" action="<?php print site_url('admin/insertdegree');?>" method="post">
                                    <div class="form-group">
                                        <label>Update Category Name</label>
                                        <input required= "true" name ="up_catname"  type="text" class="form-control">
                                        <p class="help-block">Enter the Category name to display.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Update Category Description</label>
                                        <textarea name ="up_catdesc"  class="form-control group_parent_text_field"></textarea>
                                        <p class="help-block">Enter description for this category.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="groupstatus">
                                            <option value="<?php print STATUS_ACTIVE;?>">Active</option>
                                            <option value="<?php print STATUS_BLOCK;?>">Block</option>
                                        </select>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Create</button>
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