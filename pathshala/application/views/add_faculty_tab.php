<div class="modal fade" id="modalfaculty" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="page-header">Add Faculty details</h1>
            </div>
<!--        <div class="row">-->
<!--            <div class="col-lg-12">-->
                <!-- Form Elements -->
<!--                <div class="panel panel-default">-->
                 <div class="modal-body"> 
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <form role="form" action="<?php print site_url('admin/insertfaculty'); ?>" method="post">
                                    <div class="form-group">
                                        <label>Faculty Name</label>
                                        <input required= "true" name ="facname"  type="text" class="form-control">
                                        <p class="help-block">Enter the Faculty name to display.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Faculty Description</label>
                                        <textarea name ="facdesc"  class="form-control group_parent_text_field"></textarea>
                                        <p class="help-block">Enter description for this Faculty.</p>
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
        </div>
</div>