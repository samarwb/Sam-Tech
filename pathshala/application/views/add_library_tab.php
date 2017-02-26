<div class="modal fade" id="modalLibrary" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="page-header">Add Library details</h1>
            </div>
<!--        <div class="row">-->
<!--            <div class="col-lg-12">-->
                <!-- Form Elements -->
<!--                <div class="panel panel-default">-->
                 <div class="modal-body"> 
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <form role="form" action="<?php print site_url('admin/insertdegree'); ?>" method="post">
                                    <div class="form-group">
                                        <label>Library Name</label>
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
        </div>
</div>