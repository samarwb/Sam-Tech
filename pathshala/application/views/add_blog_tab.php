<div class="modal fade" id="modalblog" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="page-header">Add Blog details</h1>
            </div>
            <!--        <div class="row">-->
            <!--            <div class="col-lg-12">-->
            <!-- Form Elements -->
            <!--                <div class="panel panel-default">-->
            <div class="modal-body"> 
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-10">
                            <form role="form" action="<?php print site_url('admin/insertblog'); ?>" method="post">
                                <div class="form-group">
                                    <label>Title:</label>
                                    <input required="true" name ="blogtitle" value="<?php print isset($single_blog) ? $single_blog[0]->blog_title : ''  ?>" type="text" class="form-control" placeholder="Enter title for your Blog">
                                    <p class="help-block">Enter the Blog name to display.</p>
                                    <input name="blogid" type="hidden" value="<?php print isset($single_blog) ? $single_blog[0]->blog_id : ''  ?>" />                                        
                                </div>
                                <div class="form-group">
                                    <label>Blog Description</label>
                                    <textarea name ="blogdesc"   class="form-control group_parent_text_field"><?php print isset($single_blog) ? $single_blog[0]->blog_description : ''  ?></textarea>
                                    <p class="help-block">Enter description for this Blog.</p>
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
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="blogstatus" class="form-control">
                                        <option value="<?php print STATUS_ACTIVE; ?>" checked="<?php print isset($single_blog) && $single_blog[0]->status == STATUS_ACTIVE ? 'true' : ''  ?>">Active</option>
                                        <option value="<?php print STATUS_BLOCK; ?>" checked="<?php print isset($single_blog) && $single_blog[0]->status == STATUS_BLOCK ? 'true' : ''  ?>">Block</option>
                                    </select>
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