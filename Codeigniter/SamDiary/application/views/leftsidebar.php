<div id="leftsidebar">
    <div id="leftsidebarinner">
        <div class="leftmenu">
            <?php
            $menus = array("All","My");
                    foreach($menus as $menu) { ?>
            <div class="menudiv"><div class="menu"><?php print $menu; ?></div></div>
            
           <?php } ?>
        </div>
    </div>
</div>