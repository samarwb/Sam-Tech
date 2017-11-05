<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Forum</h1>
            </div>
            <!--end page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Forum Details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" action="<?php print site_url('admin/insertforum'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input required="true" name ="fortitle" value="<?php print ucfirst(isset($single_for)? $single_for[0]->forum_title : ''); ?>" type="text" class="form-control">
                                        <input type="hidden" name="forid" value="<?php print isset($single_for)? $single_for[0]->forum_id : ''; ?>" >
                                        <p class="help-block">Enter title to display.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Forum Description</label>
                                        <textarea name ="fordesc"  class="form-control group_parent_text_field"><?php print ucfirst(isset($single_for)? $single_for[0]->forum_desc : ''); ?></textarea>
                                        <p class="help-block">Enter description for this forum.</p>
                                    </div>
                                     <?php  include 'multiple_image_upload.php'; ?>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="forstatus" class="form-control">
                                            <option value="<?php print STATUS_ACTIVE; ?>" checked="<?php print isset($single_for) && $single_for[0]->status == STATUS_ACTIVE ? 'true' : ''  ?>">Active</option>
                                            <option value="<?php print STATUS_BLOCK; ?>"checked="<?php print isset($single_for) && $single_for[0]->status == STATUS_BLOCK ? 'true' : ''  ?>">Block</option>
                                        </select>
                                    </div>
                                     <?php 
                                    $saved_institute = isset($single_for) && !empty($single_for) ? $single_for[0]->institute_id : NULL ;
                                    $view = $this->load->view('map_institution',array('saved_institute'=>$saved_institute),TRUE);
                                    print $view;?>
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