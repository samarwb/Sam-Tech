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
                                foreach ($institute as $inst){
                                    $image_path = !empty($inst->file_path)? INSTITUTION_IMAGE_DIRECTORY.$inst->file_path : INSTITUTION_DEFAULT_IMAGE; ?>
                            <table class="table " id="dataTables">
                                <tbody>
                                    <tr class="">
                                        <td rowspan="2" class="img_cell"><div class="img_class">
                                            <img src="<?php print base_url().$image_path; ?>" alt="" height="55" width="55" />
                                            </div></td>
                                        <td colspan="2"><span class="title_style"><?php print ucfirst($inst->institute_name);?></td>
                                        <td class="edit_cell"><a href="<?php print site_url('admin/addinst/'.$inst->institute_id); ?>" ><div class="group_edit_class edit_class"></div></a></td>
                                        <td class="del_cell"><div inst_id="<?php print $inst->institute_id; ?>" class="inst_delete_class delete_class"></div></td>
                                    </tr>
                                    <tr class="">
                                        <td>Created on:<span class="date_style"><?php print date('d/m/y h:i a',$inst->created); ?></span></td>
                                        <td>Last modified:<span class="date_style"><?php print date('d/m/y h:i a',$inst->modified); ?></span></td>
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