<div class="panel-body">
    <div class="table-responsive">
        <table class="table" id="dataTables">
            <tbody>
                <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modalevent">Create New Event</button>
                <?php include 'add_event_tab.php' ?>
                <tr class="">
                    <td rowspan="2" class="img_cell">Event image</td>
                    <td>Event name</td>
                    <td class="edit_cell"><div class="admin_edit"></div></td>
                    <td class="del_cell"><div class="admin_delete"></div></td>
                </tr>
                <tr class="">
                    <td>created by</td>
                    <td colspan="2" class="time_cell">Last modified</td>

                </tr>
            </tbody>
        </table>
        <table class="table" id="dataTables">
            <tbody>
                <tr class="">
                    <td rowspan="2" class="img_cell">Event image</td>
                    <td>Event name</td>
                    <td class="edit_cell"><div class="admin_edit"></div></td>
                    <td class="del_cell"><div class="admin_delete"></div></td>
                </tr>
                <tr class="">
                    <td>Created by</td>
                    <td colspan="2" class="time_cell">Last modified</td>

                </tr>
            </tbody>
        </table>
    </div>

</div>