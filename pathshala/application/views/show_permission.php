<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">


        <div class="row">
            <!--  page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Showing All Permissions</h1>
            </div>
            <!-- end  page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        permissions in List-wise
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php if(!empty($permission)){ 
                                foreach($permission as $per){?>
                            <table class="table " id="dataTables">
                                <tbody>
                                    <tr class="">
                                        <td rowspan="2" class="img_cell"><img src="<?php echo base_url(); ?>admin/assets/img/admin_img/permission.png" height="70" width="70"/></td>
                                        <td><?php print $per ->per_name;?></td>
                                        <td class="edit_cell"><img src="<?php echo base_url(); ?>admin/assets/img/admin_img/edit.png" height="25" width="25"/></td>
                                        <td class="del_cell"><img src="<?php echo base_url(); ?>admin/assets/img/admin_img/del.png" height="25" width="25"/></td>
                                    </tr>
                                    <tr class="">
                                        <td>Created: <?php print date('d/m/y',$per->created);?></td>
                                        <td colspan="2" class="time_cell">Last modified: <?php print date('d/m/y h:i',$per->modified);?></td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                            <?php }} else{ print 'No categories Available.' ;} ?>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
    <!-- end page-wrapper -->
</div>