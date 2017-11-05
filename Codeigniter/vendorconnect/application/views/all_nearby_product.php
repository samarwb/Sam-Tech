<div id="header">
    <?php include 'header.php'; ?>
</div>


<div id="body_wrapper">
    <div id="content">
        <!-- breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                    <li><a href="<?php print base_url(); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                    <li class="active">Products</li>
                </ol>
            </div>
        </div>
        <div class="products">
            <div class="container">
                <?php 
                        include 'search_leftbar.php';
                     ?>
                <div class=" products-right col-md-8">
                    <div class="products-right-grid">
                        
                        <div class="products-right-grids-position animated wow slideInRight" data-wow-delay=".5s">
                            <img src="<?php print base_url().'images/18.jpg';?>" alt=" " class="img-responsive" />
                            <div class="products-right-grids-position1">
                                <h4>2016 New Collection</h4>
                                <p>Temporibus autem quibusdam et aut officiis debitis aut rerum 
                                    necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae 
                                    non recusandae.</p>
                            </div>
                        </div>
                    </div>
                    <div class="products-right-grids-bottom">

                        <?php foreach ($products as $key => $product) {
                            $image = (empty($product->file_path)) ? PRODUCT_DEFAULT_IMAGE : $product->file_path;
                            ?>
                            <div class="col-md-4 products-right-grids-bottom-grid">
                                <div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
                                    <div class="new-collections-grid1-image">
                                        <a href="<?php print site_url('product/productview/' . $product->pid); ?>" class="product-image">
                                            <img src="<?php print base_url() . PRODUCT_IMAGE_DIRECTORY . $image; ?>" alt=" " class="img-responsive"></a>
                                        <div class="new-collections-grid1-image-pos products-right-grids-pos">
                                            <a href="<?php print site_url('product/productview/' . $product->pid); ?>">Quick View</a>
                                        </div>
                                    </div>
                                    <h4><a href="<?php print site_url('product/productview/' . $product->pid); ?>">
    <?php print (strlen($product->pro_name) > 30) ? substr($product->pro_name, 0, 30) . '...' : $product->pro_name; ?>
                                        </a></h4>
                                    <p>By <?php print $product->com_name; ?></p>
                                    <div class="simpleCart_shelfItem products-right-grid1-add-cart">
                                        <p><span class="item_price">Rs <?php print $product->pro_price; ?></span><a class="item_add" href="#">add to cart </a></p>
                                    </div>
                                </div>
                            </div>
<?php } ?>
                        <div class="clearfix"> </div>

                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <!-- //breadcrumbs -->

        </div>
    </div>



    <div id="footer">
<?php include 'footer.php'; ?>
    </div>