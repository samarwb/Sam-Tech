<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">


        <div class="row">
            <!--  page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Showing All Subjects</h1>
            </div>
            <!-- end  page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Subjects in List-wise 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php if(!empty($subjects)){ 
                                foreach($subjects as $subject){?>
                            <table class="table" id="dataTables">
                                <tbody>
                                    <tr class="">
                                        <td rowspan="2" class="img_cell">image</td>
                                        <td><?php print $subject->subject_name;?></td>
                                        <td class="edit_cell"></td>
                                        <td class="del_cell"></td>
                                    </tr>
                                    <tr class="">
                                        <td><?php print date('d/m/y',$subject->created); ?></td>
                                        <td colspan="2" class="time_cell">Last modified</td>
                                        
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