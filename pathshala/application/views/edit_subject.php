<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Edit Subjects</h1>
            </div>
            <!--end page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update or Make changes to your subject
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" action="<?php print site_url('admin/insertsubject');?>" method="post">
                                    <div class="form-group">
                                        <label>Update Subject Name</label>
                                        <input required="true" name ="up_subname"  type="text" class="form-control">
                                        <p class="help-block">Enter the subject name to display.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Subject Description</label>
                                        <textarea name ="up_subdesc"  class="form-control group_parent_text_field"></textarea>
                                        <p class="help-block">Enter description for this group.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload File</label>
                                        
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