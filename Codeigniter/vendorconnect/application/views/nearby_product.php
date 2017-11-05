<?php
if(isset($nearby_product) && count($nearby_product)>0){ ?>
<div class="container-fluid">
    <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="2500">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
    <?php    foreach ($nearby_product as $key => $product) {
           $image = (empty($product->file_path)) ? PRODUCT_DEFAULT_IMAGE : $product->file_path;
        ?>
            <div class="item <?php $key == 0 ? print'active'  : print'' ; ?>">
                <div class="container-fluid">
                    <a href="<?php print site_url('product/productview/' . $product->pid); ?>">
                    <div class="row">
                        <div class="col-md-5"><img src="<?php print base_url() . PRODUCT_IMAGE_DIRECTORY . $image; ?>" class="img-responsive"></div>
                        <div class="col-md-6 nearby_product_description_wrapper">
                            <h4><?php print (strlen($product->pro_name) > 30) ? substr($product->pro_name, 0, 30) . '...' : $product->pro_name; ?></h4>
                            <div class="product_desc1">
                                <div class="product_company">Product Type :  <?php print $product->type_name; ?></div>
                                <div class="product_price">Available in <?php print $product->loc_name; ?></div>
                            </div>
                            <div class="product_desc">
                                <div class="product_company">By <?php print $product->com_name; ?></div>
                                <div class="product_price">Rs <?php print $product->pro_price; ?></div>
                            </div>
                        </div>
                    </div>
                    </a>    
                </div>            
            </div> 
            <?php }?>
            
            <!-- End Item -->
        </div>
        <!-- End Carousel Inner -->
        <div class="controls">
            <ul class="nav">
                <?php    foreach ($nearby_product as $key => $product) {
                     $image = (empty($product->file_path)) ? PRODUCT_DEFAULT_IMAGE : $product->file_path;
                ?>
                <li data-target="#custom_carousel" data-slide-to="<?php print $key;?>" class="<?php $key == 0 ? print'active'  : print'' ; ?>"><a href="#">
                        <img src="<?php print base_url() . PRODUCT_IMAGE_DIRECTORY . $image; ?>" class="img-responsive nearby_product_image">
                        <small><?php print (strlen($product->pro_name) > 20) ? substr($product->pro_name, 0, 20) . '...' : $product->pro_name; ?></small>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <!-- End Carousel -->
</div>
<?php }else{
    print '<div class="no_nearby_product"> Sorry! we don\'t have any product nearby to you.</div>.';
} ?>