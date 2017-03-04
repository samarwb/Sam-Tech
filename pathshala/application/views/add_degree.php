<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Add Degree</h1>
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
                                <form role="form" action="<?php print site_url('admin/insertdegree');?>" method="post">
                                    <div class="form-group">
                                        <label>Degree Name</label>
                                        <input  name ="degid" value="<?php print isset($single_deg) ? $single_deg[0]->degree_id : '';?>"  type="hidden" class="form-control">                                        
                                        <input required= "true" name ="degname" value="<?php print ucfirst(isset($single_deg)? $single_deg[0]->degree_name : '') ?>" type="text" class="form-control">
                                        <p class="help-block">Enter the degree name to display.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Degree Description</label>
                                        <textarea name ="degdesc"  class="form-control group_parent_text_field"><?php print ucfirst(isset($single_deg)? $single_deg[0]->degree_description : '') ?></textarea>
                                        <p class="help-block">Enter description for this degree.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Image</label>
                                        <input type="file" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="degstatus" class="form-control">
                                            <option value="<?php print STATUS_ACTIVE;?>" checked="<?php print isset($single_deg) && $single_deg[0]->status == STATUS_ACTIVE ? 'true' : ''  ?>">Active</option>
                                            <option value="<?php print STATUS_BLOCK;?>" checked="<?php print isset($single_deg) && $single_deg[0]->status == STATUS_BLOCK ? 'true' : ''  ?>">Block</option>
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