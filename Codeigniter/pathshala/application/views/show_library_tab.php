<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTables">
            <tbody>
                <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modalLibrary">Create New Library</button>
                <?php include 'add_library_tab.php' ?>
                <tr class="">
                    <td rowspan="2" class="img_cell">Library image</td>
                    <td>Library name</td>
                    <td class="edit_cell"><div class="admin_edit"></div></td>
                    <td class="del_cell"><div class="admin_delete"></div></td>
                </tr>
                <tr class="">
                    <td>created by</td>
                    <td colspan="2" class="time_cell">Last modified</td>

                </tr>
            </tbody>
        </table>
     
    </div>

</div>