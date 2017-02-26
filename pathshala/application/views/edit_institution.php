<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Edit Institution</h1>
            </div>
            <!--end page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Institution Details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" action="<?php print site_url('admin/insertinst'); ?>" method="post">
                                    <div class="form-group">
                                        <label>Updtae Institution Name</label>
                                        <input required= "true" name ="up_instname"  type="text" class="form-control">
                                        <p class="help-block">Enter the Institution name to display.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>UpdatevInstitution Description</label>
                                        <textarea name ="up_instdesc"  class="form-control group_parent_text_field"></textarea>
                                        <p class="help-block">Enter description for this Institution.</p>
                                    </div>

                                    <div class="form-group">
                                        <label>Group</lable>
                                            <div class="panel panel-">
                                                <fieldset class=" the-fieldset">
                                                    <div class="panel-body">
                                                        <div class="btn-group" data-toggle="buttons">
                                                            <label class="btn active">
                                                                <input type="checkbox" name='group1' checked>
                                                                <i class="fa fa-square-o fa-2x"></i>
                                                                <i class="fa fa-check-square-o fa-2x"></i>
                                                                <span> group1</span>
                                                            </label>

                                                            <label class="btn">
                                                                <input type="checkbox" name='group2'>
                                                                <i class="fa fa-square-o fa-2x"></i>
                                                                <i class="fa fa-check-square-o fa-2x">
                                                                </i><span> group2</span>
                                                            </label>

                                                            <label class="btn">
                                                                <input type="checkbox" name='group3'>
                                                                <i class="fa fa-square-o fa-2x"></i>
                                                                <i class="fa fa-check-square-o fa-2x"></i>
                                                                <span> group3</span>
                                                            </label>

                                                            <label class="btn active">
                                                                <input type="checkbox" name='group4' >
                                                                <i class="fa fa-square-o fa-2x"></i>
                                                                <i class="fa fa-check-square-o fa-2x"></i>
                                                                <span> group4</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Change Image</label>
                                                <input type="file" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="groupstatus">
                                                    <option value="<?php print STATUS_ACTIVE; ?>">Active</option>
                                                    <option value="<?php print STATUS_BLOCK; ?>">Block</option>
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