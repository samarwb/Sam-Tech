<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Add Institution</h1>
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
                                    <form role="form" action="<?php print site_url('admin/insertinst'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group" id="home">
                                            <label>Institution Name</label>                                             
                                            <input required="true" name ="instid" value="<?php print isset($single_inst)? $single_inst[0]->institute_id : '' ?>"  type="hidden" class="form-control">                                          
                                            <input required= "true" name ="instname" value="<?php print isset($single_inst)? $single_inst[0]->institute_name : '' ?>" type="text" class="form-control">
                                            <p class="help-block">Enter the Institution name to display.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Institution Description</label>
                                            <textarea name ="instdesc"  class="form-control group_parent_text_field"><?php print isset($single_inst)? $single_inst[0]->institute_description : '' ?></textarea>
                                            <p class="help-block">Enter description for this Institution.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Institution type</lable>
                                                <div class="panel-body">
                                                    <div class="btn-group" data-toggle="buttons">
                                                        <label class="btn active">
                                                            <input type="checkbox" value='type1'>
                                                            <i class="fa fa-square-o fa-2x"></i>
                                                            <i class="fa fa-check-square-o fa-2x"></i>
                                                            <span>type1</span>
                                                        </label>

                                                        <label class="btn">
                                                            <input type="checkbox" value='type2'>
                                                            <i class="fa fa-square-o fa-2x"></i>
                                                            <i class="fa fa-check-square-o fa-2x"></i>
                                                            <span> type2</span>
                                                        </label>

                                                        <label class="btn">
                                                            <input type="checkbox" value='type3'>
                                                            <i class="fa fa-square-o fa-2x"></i>
                                                            <i class="fa fa-check-square-o fa-2x"></i>
                                                            <span> type3</span>
                                                        </label>

                                                        <label class="btn active">
                                                            <input type="checkbox" value='type4' >
                                                            <i class="fa fa-square-o fa-2x"></i>
                                                            <i class="fa fa-check-square-o fa-2x"></i>
                                                            <span> type4</span>
                                                        </label>
                                                    </div>
                                                </div>
                                        </div>
                                        <?php include 'multiple_image_upload.php'; ?>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="inststatus" class="form-control">
                                                <option value="<?php print STATUS_ACTIVE;?>" checked="<?php print isset($single_inst) && $single_inst[0]->status == STATUS_ACTIVE ? 'true' : ''  ?>">Active</option>
                                                <option value="<?php print STATUS_BLOCK;?>" checked="<?php print isset($single_inst) && $single_inst[0]->status == STATUS_BLOCK ? 'true' : ''  ?>">Block</option>
                                            </select>
                                        </div>
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
