<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">


        <div class="row">
            <!--  page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Showing All Degree Types</h1>
            </div>
            <!-- end  page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Degree Types in List-wise 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php if(!empty($degtypes)){
                                 foreach ($degtypes as $degtyp) {?>
                            <table class="table " id="dataTables">
                                <tbody>
                                    <tr class="">
                                        <td rowspan="2" class="img_cell"><div class="img_class"></div></td>
                                        <td colspan="2"><span class="title_style"><?php print ucfirst($degtyp ->deg_typ_name);?></td>
                                        <td class="edit_cell"><a href="<?php print site_url('admin/adddegtype/'.$degtyp->deg_typ_id); ?>" ><div class="degtyp_edit_class edit_class"></div></a></td>
                                        <td class="del_cell"><div degtyp_id ="<?php print $degtyp->deg_typ_id;?>" class="degtyp_delete_class delete_class"></div></td>
                                    </tr>
                                    <tr class="">
                                        <td>Created on:<span class="date_style"><?php print date('d/m/y h:i a',$degtyp->created); ?></span></td>
                                        <td>Last modified:<span class="date_style"><?php print date('d/m/y h:i a',$degtyp->modified); ?></span></td>
                                        <td colspan="2"></td>                                                                
                                    </tr>
                                </tbody>
                            </table>
                            <?php }} else{ print 'No Degre type Available.' ;} ?>
                            
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
    <!-- end page-wrapper -->
</div>