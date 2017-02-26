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
                                        <td rowspan="2" class="img_cell">image</td>
                                        <td><?php print $user->first_name;?></td>
                                        <td class="edit_cell"><img src="<?php echo base_url(); ?>admin/assets/img/admin_img/edit.png" height="25" width="25"/></td>
                                        <td class="del_cell"><img src="<?php echo base_url(); ?>admin/assets/img/admin_img/del.png" height="25" width="25"/></td>
                                    </tr>
                                    <tr class="">
                                        <td>created: <?php print date('d/m/y',$user->created); ?></td>
                                        <td colspan="2" class="time_cell"><?php print $user->city;?></td>
                                        
                                    </tr>
                                </tbody>
                            </table><?php }} else{ print 'No users Available.' ;} ?>
                            
                                
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
    <!-- end page-wrapper -->
</div>