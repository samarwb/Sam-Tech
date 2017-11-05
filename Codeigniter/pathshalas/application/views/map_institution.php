<div class="form-group" >
    <label>Institution</label>
     <?php global $map_institutes;
     if(!empty($map_institutes)){ ?>
                                            
    <select class="form-control" name="institute" required="true">
        <option  value="">Select Institute</option>
        <?php    foreach ($map_institutes as $key=>$institute){?>
        <option  value="<?php print $institute->institute_id ; ?>" <?php isset($saved_institute) && $saved_institute == $institute->institute_id ? print 'selected=true' : '' ?>><?php print $institute->institute_name ;?></option>
     <?php } }else { print 'No institution found.'; } ?>
    </select>
</div>