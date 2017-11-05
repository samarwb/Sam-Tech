<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Add Stream</h1>
            </div>
            <!--end page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Stream Details 
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" action="<?php print site_url('admin/insertstream');?>" method="post">
                                    <div class="form-group">
                                        <label>Stream Name</label>
                                        <input required="true" name ="streamname" value="<?php print ucfirst(isset($single_stream)? $single_stream[0]->stream_name : '' )?>" type="text" class="form-control">
                                        <input name="streamid" type="hidden" value="<?php print isset($single_stream) ? $single_stream[0]->stream_id : ''  ?>" />
                                        <p class="help-block">Enter the stream name to display.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Stream Description</label>
                                        <textarea name ="streamdesc"  class="form-control group_parent_text_field"><?php print ucfirst(isset($single_stream) ? $single_stream[0]->stream_desc : '') ?></textarea>
                                        <p class="help-block">Enter description for this stream.</p>
                                    </div>
                                    <div class="form-group ">
                                        <label>Stream Status</label>
                                        <select name="streamstatus" class="form-control">
                                            <option value="<?php print STATUS_ACTIVE;?>" checked="<?php print isset($single_group) && $single_group[0]->status == STATUS_ACTIVE ? 'true' : ''  ?>">Active</option>
                                            <option value="<?php print STATUS_BLOCK;?>" checked="<?php print isset($single_group) && $single_group[0]->status == STATUS_BLOCK ? 'true' : ''  ?>">Block</option>
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