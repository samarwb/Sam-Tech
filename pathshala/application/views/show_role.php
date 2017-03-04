<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">


        <div class="row">
            <!--  page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Showing All Role's</h1>
            </div>
            <!-- end  page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Roles in List-wise
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php if(!empty($userroles)){ 
                                foreach($userroles as $role){?>
          
                            <table class="table  " id="dataTables">
                                <tbody>
                                    <tr class="">
                                        <td rowspan="2" class="img_cell"><div class="img_class"></div></td>
                                        <td colspan="2"><span class="title_style"><?php print ucfirst($role->role_name);?></td>
                                        <td class="edit_cell"><a href="<?php print site_url('admin/addrole/'.$role->rid); ?>" ><div class="group_edit_class edit_class"></div></a></td>
                                        <td class="del_cell"><div role_id="<?php print $role->rid ?>" class="role_delete_class delete_class"></div></td>
                                    </tr>
                                    <tr class="">
                                        <td>Created on:<span class="date_style"><?php print date('d/m/y h:i a',$role->created); ?></span></td>
                                        <td>Last modified:<span class="date_style"><?php print date('d/m/y h:i a',$role->modified); ?></span></td>
                                        <td colspan="2"></td> 
                                    </tr>
                                </tbody>
                            </table>
                            <?php }} else{ print 'No roles Available.' ;} ?>
                            
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
    <!-- end page-wrapper -->
</div>