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
                            <table class="table table-bordered" id="dataTables">
                                <tbody>
                                    <tr class="">
                                        <td rowspan="2" class="img_cell"><div class="img_class"></div></td>
                                        <td colspan="2"><span class="title_style"><?php print ucfirst($per ->per_name);?></td>
                                        <td class="edit_cell"><a href="<?php print site_url('admin/addpermission/'.$per->per_id); ?>" ><div class="group_edit_class edit_class"></div></a></td>
                                        <td class="del_cell"><div per_id="<?php print $per->per_id ?>" class="perm_delete_class delete_class"></div></td>
                                    </tr>
                                    <tr class="">
                                        <td>Created on:<span class="date_style"><?php print date('d/m/y h:i a',$per->created); ?></span></td>
                                        <td>Last modified:<span class="date_style"><?php print date('d/m/y h:i a',$per->modified); ?></span></td>
                                        <td colspan="2"></td> 
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