<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">


        <div class="row">
            <!--  page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Showing All Institutions</h1>
            </div>
            <!-- end  page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Institution in List-wise 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php if(!empty($institute)){
                                foreach ($institute as $inst){?>
                            <table class="table table-bordered" id="dataTables">
                                <tbody>
                                    <tr class="">
                                        <td rowspan="2" class="img_cell">Inst image</td>
                                        <td><?php print $inst->institute_name;?></td>
                                        <td class="edit_cell"><div class="admin_edit"></div></td>
                                        <td class="del_cell"><div class="admin_delete"></div></td>
                                    </tr>
                                    <tr class="">
                                        <td class="time_cell2">Created: <?php print date('d/m/y h:i:sa',$inst->created);?></td>
                                        <td colspan="2" class="time_cell">Last modified: <?php print date('d/m/y h:i:sa',$inst->modified);?></td>                                        
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