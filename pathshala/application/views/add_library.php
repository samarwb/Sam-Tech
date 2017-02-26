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
                                        <?php if(isset($library)) { ?>
                                        <input required="true" name ="libraryid" value="<?php print isset($library) ? $library[0]->library_id : '';?>"  type="hidden" class="form-control">
                                        <?php } ?>
                                        <input required= "true" name ="libraryname"  type="text" class="form-control">
                                        <p class="help-block">Enter the library name to display.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Library Description</label>
                                        <textarea name ="librarydesc"  class="form-control group_parent_text_field"></textarea>
                                        <p class="help-block">Enter description for this library.</p>
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