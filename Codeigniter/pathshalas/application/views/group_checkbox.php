<div class="form-group">
    <label>Groups</lable>
        <div class="panel-body">
            <?php if (!empty($groups)) {
                foreach ($groups as $key => $group) {
                    ?>

                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn <?php ($key == 0) ? print 'active' : print ''; ?>">
                            <input type="checkbox" name="groups[]" <?php isset($saved_groups)&& !empty($saved_groups) && in_array($group->gid, $saved_groups)? print "checked=true":''; ?>value='<?php print $group->gid; ?>'>
                            <i class="fa fa-square-o fa-2x"></i>
                            <i class="fa fa-check-square-o fa-2x"></i>
                            <span><?php print $group->group_name; ?></span>
                        </label>
                    </div>
    <?php }
} else {
    print 'No groups Available.';
} ?>
        </div>
</div>