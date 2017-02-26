<div class="modal fade" id="modalevent" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="page-header">Add Events details</h1>
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
                                        <label>Events Name</label>
                                        <input required= "true" name ="eventname"  type="text" class="form-control">
                                        <p class="help-block">Enter the Event name to display.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Event Description</label>
                                        <textarea name ="eventdesc"  class="form-control group_parent_text_field"></textarea>
                                        <p class="help-block">Enter description for this Event.</p>
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