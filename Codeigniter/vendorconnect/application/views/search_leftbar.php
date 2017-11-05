<?php
$product_category = $product_location = $product_company = array();
$product_count = array();
foreach ($products as  $pro) {
    $product_category[]=$pro->pro_category;
    $product_location[]=$pro->pro_location;
    $product_company[]=$pro->pro_company;
    $product_count[$pro->pro_category] = isset($product_count[$pro->pro_category]) ? count($product_count[$pro->pro_category])+1 : 1;
}
?>
<div class="col-md-4 products-left">
    <div class="filter-price animated wow slideInUp" data-wow-delay=".5s">
        <h3>Filter By Price</h3>
        <ul class="dropdown-menu1 search_price_slider">
            <li><a href="">								               
                    <div id="slider-range"></div>							
                    <input type="text" id="amount" style="border: 0" />
                </a></li>	
        </ul>
        <script type='text/javascript'>
            $(window).load(function(){
            var min_price = '<?php print $price[0]->min_price; ?>';
            var max_price = '<?php print $price[0]->max_price; ?>';
            $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 100000,
            values: [ min_price, max_price ],
            slide: function( event, ui ) {  $( "#amount" ).val( "Rs " + ui.values[ 0 ] + " - Rs " + ui.values[ 1 ] );
            }
            });
            $( "#amount" ).val( "Rs " + $( "#slider-range" ).slider( "values", 0 ) + " - Rs " + $( "#slider-range" ).slider( "values", 1 ) );


            });
        </script>
        <!---->
    </div>
    <div class="categories animated wow slideInUp" data-wow-delay=".5s">
        <h3>Categories</h3>
        <ul class="cate">
<?php foreach ($categories as $key => $cat) { ?>
                <li title="<?php print $cat->cat_name; ?>">
                    <div class="category_filter_wrapper <?php (in_array($cat->catid, $product_category)) ? print 'product_category_selected' : '' ?>"><a  href="<?php print site_url('search/productsearch/category/' . $cat->catid); ?>"><?php print $cat->cat_name; ?></a> </div>
                    <div class="category_filter_wrapper_count">(<?php print isset($product_count[$cat->catid]) ? $product_count[$cat->catid] : 0; ?>)</div>
                </li>
<?php } ?>
        </ul>
    </div>
    <form method="post" action="<?php echo site_url('search/productsearch'); ?>">
        <input type ="hidden" name = "category" value="" />
        <div class="categories companies animated wow slideInUp" data-wow-delay=".5s">
            <h3>Companies</h3>
            <ul style="list-style-type:none" checkbox_type="companies" class="cd-filter-content cd-filters list">

<?php foreach ($companies as $key => $comp) { ?>
                    <li>
                        <input class="filter" name="companies[]" <?php (in_array($comp->comid, $product_company)) ? print 'checked=true' : '' ?> type="checkbox" id="companies_checkbox<?php print $key + 1; ?>" value="<?Php print $comp->comid; ?>">
                        <label class="checkbox-label" for="companies_checkbox<?php print $key + 1; ?>"><?php print $comp->com_name; ?></label>
                    </li>
<?php } ?>
            </ul> 
        </div>

        <div class="categories locations animated wow slideInUp" data-wow-delay=".5s">
            <h3>Location</h3>
            <ul style="list-style-type:none" checkbox_type="location" class="cd-filter-content cd-filters list">
<?php foreach ($locations as $key => $loc) { ?>
                    <li>
                        <input class="filter" <?php (in_array($loc->locid, $product_location)) ? print 'checked=true' : '' ?> name="location[]" type="checkbox" id="location_checkbox<?php print $key + 1; ?>" value="<?Php print $loc->locid; ?>">
                        <label class="checkbox-label" for="location_checkbox<?php print $key + 1; ?>"><?php print $loc->loc_name; ?></label>
                    </li>
<?php } ?>

            </ul> <!-- cd-filter-content -->
        </div>
        <input type ="submit" class="btn btn-info common-button" value="Search" />
    </form>
</div>