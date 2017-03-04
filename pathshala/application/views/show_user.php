<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!--  page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Showing All Users</h1>
            </div>
            <!-- end  page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Users in List-wise 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php if(!empty($users)){ 
                                foreach($users as $user){?>
                            <table class="table" id="dataTables">
                                <tbody>
                                    <tr class="">
                                        <td rowspan="2" class="img_cell"></td>
                                        <td colspan=""><span class="title_style"><?php print ucfirst($user->first_name);?> <?php print ucfirst($user->last_name);?></span></td>
                                        <td colspan="2">Contact No.:<span class="date_style"><?php print $user->mobile; ?></span></td>                                        
                                        <td class="edit_cell"><a href="<?php print site_url('admin/adduser/'.$user->uid); ?>" ><div class="user_edit_class edit_class"></div></a></td>
                                        <td class="del_cell"><div user_id="<?php print $user->uid; ?>" class="user_delete_class delete_class"></div></td>
                                    </tr>
                                    <tr class="">
                                        <td>Created on:<span class="date_style"><?php print date('d/m/y h:i a',$user->created); ?></span></td>
                                        <td>Last modified:<span class="date_style"><?php print date('d/m/y h:i a',$user->modified); ?></span></td>
                                        <td>Place:<span class="date_style"><?php print ucfirst($user->city); ?></span></td>
                                        <td colspan="2"></td>  
                                    </tr>
                                </tbody>
                            </table>
                            <?php }} else{ print 'No subjects Available.' ;} ?>                               
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
    <!-- end page-wrapper -->
</div>