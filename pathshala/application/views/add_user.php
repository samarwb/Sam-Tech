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
                                <form role="form" action="<?php print site_url('admin/insertuser'); ?>" method="post">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input required="true" name ="fname" value="<?php print ucfirst(isset($single_user) ? $single_user[0]->first_name : '')  ?>" type="text" class="form-control">
                                        <input type="hidden" name="uid" value="<?php print isset($single_user) ? $single_user[0]->uid : ''; ?>">
                                        <p class="help-block">Enter First name to display.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input required="true" name ="lname" value="<?php print ucfirst(isset($single_user) ? $single_user[0]->last_name : '') ?>" type="text" class="form-control">
                                        <p class="help-block">Enter Last name to display.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Email ID</label>
                                        <input required="true" name ="email" value="<?php print isset($single_user) ? $single_user[0]->email : '' ?>" type="email" class="form-control">
                                        <p class="help-block">Enter your email id (something@gmail.com).</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input required="true" name ="password"  type="password" class="form-control" >
                                        <p class="help-block">Enter password (min 4 character).</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input  name ="cpassword"  type="password" class="form-control" disabled="disabled">
                                        <p class="help-block">Re-enter password again.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Groups</lable>
                                        <div class="panel-body">
                                        <?php if(!empty($groups)){
                                            foreach ($groups as $key=>$group){?>
                                            
                                                <div class="btn-group" data-toggle="buttons">
                                                    <label class="btn <?php ($key==0)? print 'active': print ''; ?>">
                                                        <input type="checkbox" value='<?php print $group->gid; ?>'>
                                                        <i class="fa fa-square-o fa-2x"></i>
                                                        <i class="fa fa-check-square-o fa-2x"></i>
                                                        <span><?php print $group->group_name; ?></span>
                                                    </label>
                                                </div>
                                        <?php }} else{ print 'No groups Available.' ;} ?>
                                        </div>
                                    </div>    
                                    <div class="form-group"> 
                                        <label>Roles</label>
                                        <div class="panel-body">
                                            <?php if(!empty($roles)){
                                            foreach ($roles as $key=>$role){?>
                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn <?php ($key==0)? print 'active': print ''; ?>">
                                                    <input type="radio" name='gender1' value="<?php print $role->rid; ?>">
                                                    <i class="fa fa-circle-o fa-2x"></i>
                                                    <i class="fa fa-dot-circle-o fa-2x"></i> 
                                                    <span><?php print $role->role_name; ?></span>
                                                </label>
                                            </div> 
                                            <?php }} else{ print 'No roles Available.' ;} ?>
                                        </div>    
                                    </div>

                                    <div class="form-group">
                                        <label>Mobile No.</label>
                                        <input required="true" name ="mobile" value="<?php print isset($single_user) ? $single_user[0]->mobile : ''  ?>" type="tel" class="form-control">
                                        <p class="help-block">Enter active mobile number.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input required="true" name ="dob" value="<?php print isset($single_user) ? $single_user[0]->dob : ''  ?>" type="date" class="form-control">
                                        <p class="help-block">Enter your Date of birth.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name ="address"  class="form-control group_parent_text_field"><?php print ucfirst(isset($single_user) ? $single_user[0]->address : '')?></textarea>
                                        <p class="help-block">Enter present address.</p>
                                    </div>
                                    <div class="form-group" >
                                        <label>Country</label>
                                        <select class="form-control" name="country">
                                            <option value="india">India</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>State</label>
                                        <select class="form-control"  name="state">
                                            <option value="karnataka">Karnataka</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <select class="form-control"  name="city">
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
                                            <option value="<?php print STATUS_ACTIVE; ?>" checked="<?php print isset($single_user) && $single_user[0]->status == STATUS_ACTIVE ? 'true' : ''  ?>">Active</option>
                                            <option value="<?php print STATUS_BLOCK; ?>" checked="<?php print isset($single_user) && $single_user[0]->status == STATUS_BLOCK ? 'true' : ''  ?>">Block</option>
                                        </select>
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