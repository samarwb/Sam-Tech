<?php global $is_login; ?>
<div id="content">
    <?php // include 'home_carousel.php'; ?>
<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container"> 
			<div class="banner-bottom-grids">
				<div class="banner-bottom-grid-left animated wow slideInLeft" data-wow-delay=".5s">
					<div class="grid">
						<figure class="effect-julia">
                                                    <img src="<?php print base_url().PRODUCT_IMAGE_DIRECTORY;?>front_page_pics.png" alt=" " class="img-responsive" />
							<figcaption>
								<h3><span></span><i> </i></h3>
								<div>
									
								</div>
							</figcaption>			
						</figure>
					</div>
				</div>
				<div class="banner-bottom-grid-left1 animated wow slideInUp" data-wow-delay=".5s">
					<div class="banner-bottom-grid-left-grid left1-grid grid-left-grid1">
						<div class="banner-bottom-grid-left-grid1">
							<img src="<?php print base_url().PRODUCT_IMAGE_DIRECTORY;?>1.jpg" alt=" " class="img-responsive" />
						</div>
						<div class="banner-bottom-grid-left1-pos">
                                                        <div class="banner-bottom-grid-left1-pos1">
								<p>Discount 25%</p>
							</div>
						</div>
					</div>
					<div class="banner-bottom-grid-left-grid left1-grid grid-left-grid1">
						<div class="banner-bottom-grid-left-grid1">
							<img src="<?php print base_url().PRODUCT_IMAGE_DIRECTORY;?>2.jpg" alt=" " class="img-responsive" />
						</div>
						<div class="banner-bottom-grid-left1-position">
							<div class="banner-bottom-grid-left1-pos1">
								<p>Latest New Products</p>
							</div>
						</div>
					</div>
				</div>
				<div class="banner-bottom-grid-right animated wow slideInRight" data-wow-delay=".5s">
					<div class="banner-bottom-grid-left-grid grid-left-grid1">
						<div class="banner-bottom-grid-left-grid1">
							<img src="<?php print base_url().PRODUCT_IMAGE_DIRECTORY;?>front_page_pics2.png" alt=" " class="img-responsive" />
						</div>
						<div class="grid-left-grid1-pos">
                                                    <div class="banner-bottom-grid-left1-pos1">
								<p>Top 2017 Products</p>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //banner-bottom -->
<!-- collections -->
	<div class="new-collections">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Recently Added</h3>
                        <p class="est animated wow zoomIn" data-wow-delay=".5s">Latest products added by Sellers.
                            <a href="<?php print site_url('search/productsearch')?>" >Show all recently added products.</a>
                        </p>
			<div class="new-collections-grids">
                                     <?php foreach ($products as $key => $product) { 
                                         if($key >= 6)
                                             break;
                                        $image = (empty($product->file_path))? PRODUCT_DEFAULT_IMAGE : $product->file_path; ?>
                                    <div class="col-md-3 new-collections-grid">
					<div class="new-collections-grid1 new-collections-grid1-image-width animated wow slideInUp" data-wow-delay=".5s">
						<div class="new-collections-grid1-image">
							<a href="<?php print site_url('product/productview/' . $product->pid); ?>" class="product-image">
                                                            <img src="<?php print base_url() . PRODUCT_IMAGE_DIRECTORY . $image; ?>" alt=" " class="img-responsive" /></a>
							<div class="new-collections-grid1-image-pos">
								<a href="<?php print site_url('product/productview/' . $product->pid); ?>">Quick View</a>
							</div>
							<div class="new-collections-grid1-right">
								<div class="rating">
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/1.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/1.png" alt=" " class="img-responsive" />
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
                                            <h4><a href="<?php print base_url();?>"><?php print (strlen($product->pro_name) > 30) ? substr($product->pro_name, 0, 30) . '...' : $product->pro_name; ?></a></h4>
						<p>By <?php print $product->com_name; ?></p>
						<div class="new-collections-grid1-left simpleCart_shelfItem">
							<p> <span class="item_price">Rs <?php print $product->pro_price; ?></span><a class="item_add" href="#">add to cart </a></p>
						</div>
					</div>
                                        </div>
                                     <?php } ?>
                            
				<div class="clearfix"> </div>
			</div>
                        
                        
		</div>
	</div>
<!-- //collections -->


<!-- List in Bulk Product -->
	<div class="new-collections">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Bulk Products</h3>
                        <p class="est animated wow zoomIn" data-wow-delay=".5s">These products are available in bulk with other products.
                            
                        </p>
			<div class="new-collections-grids">
                                     <?php 
                                if(isset($bulk_products)){
                                     foreach ($bulk_products as $key => $bulk) { 
                                         if($key >= 6)
                                             break;
                                        $image = (empty($bulk->file_path))? PRODUCT_DEFAULT_IMAGE : $bulk->file_path; ?>
                                    <div class="col-md-3 new-collections-grid">
                                        
					<div class="new-collections-grid1 new-collections-grid1-image-width animated wow slideInUp" data-wow-delay=".5s">
                                            <div class="timer-grid-right-pos">
                                            <h4>Premium Product</h4>
                                        </div>
						<div class="new-collections-grid1-image">
							<a href="<?php print site_url('product/productview/' . $bulk->pid); ?>" class="product-image">
                                                            <img src="<?php print base_url() . PRODUCT_IMAGE_DIRECTORY . $image; ?>" alt=" " class="img-responsive" /></a>
                                                            
                                                        <div class="new-collections-grid1-image-pos">
								<a href="<?php print site_url('product/productview/' . $bulk->pid); ?>">Quick View</a>
							</div>
							<div class="new-collections-grid1-right">
								<div class="rating">
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/2.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/1.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="images/1.png" alt=" " class="img-responsive" />
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
						<h4><a href="single.html"><?php print (strlen($bulk->pro_name) > 30) ? substr($bulk->pro_name, 0, 30) . '...' : $bulk->pro_name; ?></a></h4>
						<p>By <?php print $bulk->com_name; ?></p>
						<div class="new-collections-grid1-left simpleCart_shelfItem">
							<p> <span class="item_price">Rs <?php print $bulk->pro_price; ?></span><a class="item_add" href="#">add to cart </a></p>
						</div>
					</div>
                                        </div>
<?php } }else{
    print 'No bulk products available.';
} ?>
                            
				<div class="clearfix"> </div>
			</div>
                        
                        
		</div>
	</div>
<!-- //List in Bulk Product -->

<!-- collections -->
	<div class="new-collections">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Nearby Product</h3>
                        
                       <?php if ($is_login) { ?>
                        <p class="est animated wow zoomIn" data-wow-delay=".5s"> Check all products available on your nearby .
                            <a href="<?php print site_url('search/nearbyproductsearch')?>" >Show all nearby products.</a>
                        </p>
                        <div class="what_we_do border_class">
                            <div class="what_we_do_inner nearby_product_wrapper">
                                <?php include 'nearby_product.php';?>
                            </div>
                        </div>
                       <?php }else{ ?>
                        <p class="est animated wow zoomIn" data-wow-delay=".5s"> Please login to check all products available on your nearby .
                            <a class href="<?php print site_url('user/login')?>" >Click to Login.</a>
                        </p>
                       <?php } ?>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //collections -->

</div>

