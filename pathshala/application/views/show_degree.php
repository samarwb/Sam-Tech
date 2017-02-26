<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">


        <div class="row">
            <!--  page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Showing All Degrees</h1>
            </div>
            <!-- end  page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Degree in List-wise 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table" id="dataTables">
                                <tbody>
                                    <tr class="">
                                        <td rowspan="2" class="img_cell">Degree image</td>
                                        <td>Degree name</td>
                                        <td class="edit_cell"><div class="admin_edit"></div></td>
                                        <td class="del_cell"><div class="admin_delete"></div></td>
                                    </tr>
                                    <tr class="">
                                        <td>Internet Explorer 5.0</td>
                                        <td colspan="2" class="time_cell">Last modified</td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table" id="dataTables">
                                <tbody>
                                    <tr class="">
                                        <td rowspan="2" class="img_cell">Degree image</td>
                                        <td>Degree name</td>
                                        <td class="edit_cell"><img src="<?php echo base_url(); ?>admin/assets/img/admin_img/edit.png" height="25" width="25"/></td>
                                        <td class="del_cell"><img src="<?php echo base_url(); ?>admin/assets/img/admin_img/del.png" height="25" width="25"/></td>
                                    </tr>
                                    <tr class="">
                                        <td>Internet Explorer 5.0</td>
                                        <td colspan="2" class="time_cell">Last modified</td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
    <!-- end page-wrapper -->
</div>