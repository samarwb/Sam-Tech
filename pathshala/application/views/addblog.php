<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Add Blog details</h1>
            </div>
            <!--end page header -->
        </div>
        <div class="panel-group">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Title:
                    </div>
                    <div class="panel-body">
                        <input required="true" name ="title"  type="text" class="form-control" placeholder="Enter title for your Blog">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-group">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Select stream:
                    </div>
                    <div class="panel-body">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn active">
                                <input type="checkbox" name='email1' checked>
                                <i class="fa fa-square-o fa-2x"></i>
                                <i class="fa fa-check-square-o fa-2x"></i>
                                <span> Marketing Email</span>
                            </label>

                            <label class="btn">
                                <input type="checkbox" name='email2'>
                                <i class="fa fa-square-o fa-2x"></i>
                                <i class="fa fa-check-square-o fa-2x">
                                </i><span> Alert Email</span>
                            </label>

                            <label class="btn">
                                <input type="checkbox" name='email3'>
                                <i class="fa fa-square-o fa-2x"></i>
                                <i class="fa fa-check-square-o fa-2x"></i>
                                <span> Account Email</span>
                            </label>

                            <label class="btn active">
                                <input type="checkbox" name='email1' >
                                <i class="fa fa-square-o fa-2x"></i>
                                <i class="fa fa-check-square-o fa-2x"></i>
                                <span> Marketing Email</span>
                            </label>

                            <label class="btn">
                                <input type="checkbox" name='email2'>
                                <i class="fa fa-square-o fa-2x"></i>
                                <i class="fa fa-check-square-o fa-2x"></i>
                                <span> Alert Email</span>
                            </label>

                            <label class="btn">
                                <input type="checkbox" name='email3'>
                                <i class="fa fa-square-o fa-2x"></i>
                                <i class="fa fa-check-square-o fa-2x"></i>
                                <span> Account Email</span>
                            </label>


                            <label class="btn active">
                                <input type="checkbox" name='science' >
                                <i class="fa fa-square-o fa-2x"></i>
                                <i class="fa fa-check-square-o fa-2x"></i>
                                <span>science</span>
                            </label>

                            <label class="btn">
                                <input type="checkbox" name='maths'>
                                <i class="fa fa-square-o fa-2x"></i>
                                <i class="fa fa-check-square-o fa-2x">
                                </i><span> maths</span>
                            </label>

                            <label class="btn">
                                <input type="checkbox" name='geography'>
                                <i class="fa fa-square-o fa-2x"></i>
                                <i class="fa fa-check-square-o fa-2x"></i>
                                <span> geography</span>
                            </label>

                            <label class="btn active">
                                <input type="checkbox" name='computer science' >
                                <i class="fa fa-square-o fa-2x"></i>
                                <i class="fa fa-check-square-o fa-2x"></i>
                                <span>computer science</span>
                            </label>

                            <label class="btn">
                                <input type="checkbox" name='history'>
                                <i class="fa fa-square-o fa-2x"></i>
                                <i class="fa fa-check-square-o fa-2x"></i>
                                <span>socialism</span>
                            </label>

                            <label class="btn">
                                <input type="checkbox" name='literature'>
                                <i class="fa fa-square-o fa-2x"></i>
                                <i class="fa fa-check-square-o fa-2x"></i>
                                <span>literature</span>
                            </label>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-group">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Description:
                    </div>
                    <div class="panel-body">
                        <textarea name ="desc"  class="form-control group_parent_text_field"></textarea> 
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-group">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Institution:
                    </div>
                    <div class="panel-body">
                            <input type="search" name="keyword" placeholder="Search Names" id="searchbox" class="form-control in_width">
                            <input type="button" class="btn btn-primary " value="Add">
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
