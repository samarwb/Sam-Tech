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
                                
                                foreach($blogs as $blog){
                                    $image_path = !empty($blog->file_path)? BLOG_IMAGE_DIRECTORY.$blog->file_path : BLOG_DEFAULT_IMAGE;?>
                            <table class="table" id="dataTables">
                                <tbody>
                                    <tr class="">
                                        <td rowspan="2" class="img_cell">
                                            <img src="<?php echo base_url().$image_path;?>" alt="" height="55" width="55" />
                                        </td>
                                        <td colspan="2"><span class="title_style"><?php print ucfirst($blog->blog_title);?></td>
                                        <td class="edit_cell"><a href="<?php print site_url('admin/addblog/'.$blog->blog_id); ?>"><div class="group_edit_class edit_class"></div></a></td>
                                        <td class="del_cell"><div  blog_id="<?php print $blog->blog_id;?>" class="blog_delete_class delete_class"></div></td>
                                    </tr>
                                    <tr class="">
                                        <td>Created on:<span class="date_style"><?php print date('d/m/y h:i a',$blog->created); ?></span></td>
                                        <td>Last modified:<span class="date_style"><?php print date('d/m/y h:i a',$blog->modified); ?></td> 
                                        <td colspan="2"></td> 
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