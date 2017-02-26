<div class="panel-body">
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