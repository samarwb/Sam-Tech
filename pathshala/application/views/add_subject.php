<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Add Subjects</h1>
            </div>
            <!--end page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Subject Details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" action="<?php print site_url('admin/insertsubject'); ?>" method="post">
                                    <div class="form-group">
                                        <label>Subject Name</label>
                                        <input required="true" name ="subname"  type="text" class="form-control">
                                        <p class="help-block">Enter the subject name to display.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Subject Description</label>
                                        <textarea name ="subdesc"  class="form-control group_parent_text_field"></textarea>
                                        <p class="help-block">Enter description for this group.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload File</label>
                                        <input type="file" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Status:</label>
                                        <select name="blogstatus" class="form-control">
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
                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>
    </div>
    <!-- end page-wrapper -->
</div>