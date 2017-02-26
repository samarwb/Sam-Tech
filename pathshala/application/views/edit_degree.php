<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Edit Degree</h1>
            </div>
            <!--end page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Degree Details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" action="<?php print site_url('admin/insertdegree');?>" method="post">
                                    <div class="form-group">
                                        <label>Update Degree Name</label>
                                        <input required= "true" name ="up_degreename"  type="text" class="form-control">
                                        <p class="help-block">Enter the degree name to display.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Update Degree Description</label>
                                        <textarea name ="up_degdesc"  class="form-control group_parent_text_field"></textarea>
                                        <p class="help-block">Enter description for this degree.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Update Image</label>
                                        <input type="file" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>change Status</label>
                                        <select name="groupstatus">
                                            <option value="<?php print STATUS_ACTIVE;?>">Active</option>
                                            <option value="<?php print STATUS_BLOCK;?>">Block</option>
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