<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">


        <div class="row">
            <!--  page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Showing All Groups</h1>
            </div>
            <!-- end  page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Faculties in List-wise
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php if(!empty($faculty)){ 
                                foreach($faculty as $fac){?>
                            <table class="table table-bordered" id="dataTables">
                                <tbody>
                                <tr class="">
                                    <td rowspan="2" class="img_cell">image</td>
                                        <td><?php print $fac->faculty_name;?></td>
                                        <td class="edit_cell"><a href="<?php print site_url('admin/addfaculty/'.$fac->faculty_id); ?>" ><div class="group_edit_class edit_class"></div></a></td>
                                        <td class="del_cell"><div  class="group_delete_class delete_class"></div></td>
                                </tr>
                                <tr class="">
                                    <td>created by</td>
                                    <td colspan="2" class="time_cell">Last modified</td>

                                </tr>
                                </tbody>
                            </table>
                            <?php }} else {
                                print 'No groups Available.';
                            } ?>

                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
    <!-- end page-wrapper -->
</div>