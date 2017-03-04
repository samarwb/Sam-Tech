<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Add Library</h1>
            </div>
            <!--end page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Library Details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" action="<?php print site_url('admin/insertlibrary'); ?>" method="post">
                                    <div class="form-group">
                                        <label>Library Name</label>                                         
                                        <input required="true" name ="libraryid" value="<?php print isset($single_lib) ? $single_lib[0]->library_id : ''  ?>"  type="hidden" class="form-control">                                         
                                        <input required= "true" name ="libraryname" value="<?php print isset($single_lib) ? $single_lib[0]->library_name : ''  ?>" type="text" class="form-control">
                                        <p class="help-block">Enter the library name to display.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Library Description</label>
                                        <textarea name ="librarydesc"  class="form-control group_parent_text_field"><?php print isset($single_lib) ? $single_lib[0]->library_desc : ''  ?></textarea>
                                        <p class="help-block">Enter description for this library.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Select stream:</lable>
                                            <div class="panel-body">
                                                <?php
                                                if (!empty($groups)) {
                                                    foreach ($groups as $key => $group) {
                                                        ?>
                                                        <div class="btn-group" data-toggle="buttons">
                                                            <label class="btn <?php ($key == 0) ? print 'active' : print ''; ?>">
                                                                <input type="checkbox" value='<?php print $group->gid; ?>'>
                                                                <i class="fa fa-square-o fa-2x"></i>
                                                                <i class="fa fa-check-square-o fa-2x"></i>
                                                                <span><?php print $group->group_name; ?></span>
                                                            </label>
                                                        </div>
                                                        <?php
                                                    }
                                                } else {
                                                    print 'No groups Available.';
                                                }
                                                ?>
                                            </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Upload Image</label>
                                        <input type="file" class="form-control"/>
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