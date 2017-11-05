<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Add Faculty</h1>
            </div>
            <!--end page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Degree Details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" action="<?php print site_url('admin/insertfaculty'); ?>" method="post">
                                    <div class="form-group">
                                        <label>Faculty Name</label>
                                        <?php if(isset($faculty)) { ?>
                                        <input required="true" name ="facid" value="<?php print isset($faculty) ? $faculty[0]->fac_id : '';?>"  type="hidden" class="form-control">
                                        <?php } ?>
                                        <input required= "true" name ="facname"  type="text" class="form-control">
                                        <p class="help-block">Enter the Faculty name to display.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Faculty Description</label>
                                        <textarea name ="facdesc"  class="form-control group_parent_text_field"></textarea>
                                        <p class="help-block">Enter description for this Faculty.</p>
                                    </div>                                    
                                    <div class="form-group">
                                        <label>Upload Image</label>
                                        <input type="file" class="form-control"/>
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
