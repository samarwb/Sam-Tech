<div class="panel-body" >
    <div class="table-responsive"> 
        <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modalblog">Create New Blog</button>
        <?php
        include 'add_blog_tab.php';
        if(!empty($blogs)){ 
                                
            foreach($blogs as $blog){?>
        <table class="table" id="dataTables">
            <tbody>
                <tr class="">
                    <td rowspan="2" class="img_cell">Blog image</td>
                    <td><?php print $blog->blog_title; ?></td>
                    <td class="edit_cell"><a href="<?php print site_url('admin/addblog/'.$blog->blog_id); ?>"><div class="group_edit_class edit_class"></div></a></td>
                    <td class="del_cell"><div  blog_id="<?php print $blog->blog_id; ?>" class="group_delete_class delete_class"></div></td>
                </tr>
                <tr class="">
                    <td>created: <?php print date('d/m/y', $blog->created); ?></td>
                    <td colspan="2" class="time_cell">Last modified: <?php print date('d/m/y', $blog->created); ?></td>
                </tr>
            </tbody>
        </table>
        <?php }} else{ print 'No blogs Available.';} ?>
    </div>
</div>