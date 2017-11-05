<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Add Programme</h1>
            </div>
            <!--end page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Programme Details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" action="<?php print site_url('admin/insertprogramme'); ?>" method="post">
                                    <div class="form-group">
                                        <label>Programme Name</label>
                                        <input  name ="progid" value="<?php print isset($single_prog) ? $single_prog[0]->prog_id : ''; ?>"  type="hidden" class="form-control">                                        
                                        <input required= "true" name ="progname" value="<?php print ucfirst(isset($single_prog) ? $single_prog[0]->prog_name : '') ?>" type="text" class="form-control">
                                        <p class="help-block">Enter the programme name to display.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Programme Description</label>
                                        <textarea name ="progdesc"  class="form-control group_parent_text_field"><?php print ucfirst(isset($single_prog) ? $single_prog[0]->prog_description : '') ?></textarea>
                                        <p class="help-block">Enter description for this Programme.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Stream Type</label>
                                        <select name="streamtype" class="form-control">
                                            <option value="">Engineering</option>
                                            <option value="">Management</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Image</label>
                                        <input type="file" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="progstatus" class="form-control">
                                            <option value="<?php print STATUS_ACTIVE; ?>" checked="<?php print isset($single_prog) && $single_prog[0]->status == STATUS_ACTIVE ? 'true' : ''  ?>">Active</option>
                                            <option value="<?php print STATUS_BLOCK; ?>" checked="<?php print isset($single_prog) && $single_prog[0]->status == STATUS_BLOCK ? 'true' : ''  ?>">Block</option>
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