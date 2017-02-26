<?php
include 'admin_header.php';
include 'admin_sidebar.php';
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!--  page header -->
            <div class="col-lg-12">
                <h1 class="page-header">Showing All Blog</h1>
            </div>
            <!-- end  page header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Blogs in List-wise 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php if(!empty($blogs)){ 
                                foreach($blogs as $blog){?>
                            <table class="table" id="dataTables">
                                <tbody>
                                    <tr class="">
                                        <td rowspan="2" class="img_cell">Blog image</td>
                                        <td><?php print $blog->blog_title;?></td>
                                        <td class="edit_cell"><div class="admin_edit"></div></td>
                                        <td class="del_cell"><div class="admin_delete"></div></td>
                                    </tr>
                                    <tr class="">
                                        <td>created: <?php print date('d/m/y',$blog->created); ?></td>
                                        <td colspan="2" class="time_cell">Last modified</td>                                        
                                    </tr>
                                </tbody>
                            </table>
                            <?php }} else{ print 'No groups Available.' ;} ?>
                            
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
    <!-- end page-wrapper -->
</div>