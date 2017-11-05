<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Add Album</h1>
            </div>
            <!--end page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Institution Details
                    </div>
                    <div class="panel-body">
                        <div class=" tab-content col-lg-9 ">
<!--                        <div class="col-lg-6">-->
                                <div id="attribute" class="tab-pane fade in active">
                                    <form role="form" action="<?php print site_url('admin/insertalbum'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group" id="home">
                                            <label>Album Name</label>                                             
                                            <input required="true" name ="albumid" value="<?php print isset($single_album)? $single_album[0]->album_id : '' ?>"  type="hidden" class="form-control">                                          
                                            <input required= "true" name ="albumname" value="<?php print isset($single_album)? $single_album[0]->album_name : '' ?>" type="text" class="form-control">
                                            <p class="help-block">Enter the album name to display.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Album Description</label>
                                            <textarea name ="albumdesc"  class="form-control group_parent_text_field"><?php print isset($single_album)? $single_album[0]->album_desc : '' ?></textarea>
                                            <p class="help-block">Enter description for this album.</p>
                                        </div>
                                      
                                        <?php include 'multiple_image_upload.php'; ?>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="<?php print STATUS_ACTIVE;?>" checked="<?php print isset($single_album) && $single_album[0]->status == STATUS_ACTIVE ? 'true' : ''  ?>">Active</option>
                                                <option value="<?php print STATUS_BLOCK;?>" checked="<?php print isset($single_album) && $single_album[0]->status == STATUS_BLOCK ? 'true' : ''  ?>">Block</option>
                                            </select>
                                        </div>
                                        <?php include 'map_institution.php'; ?>
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-primary">Create</button>
                                            <button type="reset" class="btn btn-primary">Clear</button>
                                        </div> 
                                    </form>
                                </div>
<!--                        </div>-->
                            
                        </div>                                 
                    </div>                            
                </div>                        
            </div>      
        </div>
    </div>
</div>
