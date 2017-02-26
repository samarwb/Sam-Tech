<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Add User</h1>
            </div>
            <!--end page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Fill User Details <span style="font-style: italic; color: red;">(All fields are mandatory)</span>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" action="<?php print site_url('admin/insertuser');?>" method="post">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input required="true" name ="fname"  type="text" class="form-control">
                                        <p class="help-block">Enter First name to display.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input required="true" name ="lname"  type="text" class="form-control">
                                        <p class="help-block">Enter Last name to display.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Email ID</label>
                                        <input required="true" name ="email"  type="email" class="form-control">
                                        <p class="help-block">Enter your email id (something@gmail.com).</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input required="true" name ="password"  type="password" class="form-control" >
                                        <p class="help-block">Enter password (min 4 character).</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input required="true" name ="cpassword"  type="password" class="form-control" disabled="disabled">
                                        <p class="help-block">Re-enter password again.</p>
                                    </div>
                                    <div class="panel-heading">Select stream:</div>
                                    <div class="panel-body">
                                        <div class="btn-group" data-toggle="buttons">
                                        <label class="btn active">
                                            <input type="checkbox" name='stream' value="marketing">
                                            <i class="fa fa-square-o fa-2x"></i>
                                            <i class="fa fa-check-square-o fa-2x"></i>
                                            <span> Marketing Email</span>
                                        </label>
                                    </div> 
                                        
                                    <div class="form-group">
                                        <label>Mobile No.</label>
                                        <input required="true" name ="mobile"  type="text" class="form-control">
                                        <p class="help-block">Enter active mobile number.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input required="true" name ="dob"  type="date" class="form-control">
                                        <p class="help-block">Enter your Date of birth.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name ="address"  class="form-control group_parent_text_field"></textarea>
                                        <p class="help-block">Enter present address.</p>
                                    </div>
                                    <div class="form-group" name="country">
                                        <label>Country</label>
                                        <select class="form-control">
                                            <option value="india">India</option>
                                        </select>
                                     </div>
                                    <div class="form-group" name="state">
                                        <label>State</label>
                                        <select class="form-control">
                                            <option value="karnataka">Karnataka</option>
                                        </select>
                                     </div>
                                    <div class="form-group" name="city">
                                        <label>City</label>
                                        <select class="form-control">
                                            <option value="bangalore">Bangalore</option>
                                        </select>
                                     </div>
                                    <div class="form-group">
                                        <label>Upload File</label>
                                        <input type="file" class="form-control"/>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>User Status</label>
                                        <select name="userstatus" class="form-control">
                                            <option value="<?php print STATUS_ACTIVE;?>">Active</option>
                                            <option value="<?php print STATUS_BLOCK;?>">Block</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Register</button>
                                    <button type="reset" class="btn btn-success">Clear All</button>
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