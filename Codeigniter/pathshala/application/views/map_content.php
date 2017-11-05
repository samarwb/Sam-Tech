<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Institute Mapping</h1>
            </div>
            <!--end page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Fill Details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" action="<?php print site_url('admin/insertuser'); ?>" method="post">
                                    <div class="form-group" >
                                        <label>Institution</label>
                                        <select class="form-control" name="country">
                                            <option value="india">India</option>
                                        </select>
                                    </div>
                                    <div class="form-group">                   
                                        <input type="hidden" name="" value="">
                                    </div>
                                    <div class="group_wrapper">
                                        <div class="form-group">
                                            <label>Groups</label>
                                            <div class="panel-body">
                                            
                                                

                                                    <div class="btn-group" data-toggle="buttons">
                                                        <label class="btn ">
                                                            <input type="checkbox" value=''>
                                                            <i class="fa fa-square-o fa-2x"></i>
                                                            <i class="fa fa-check-square-o fa-2x"></i>
                                                            <span>this</span>
                                                        </label>
                                                    </div>
                                           
                                            </div>
                                        </div>  
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