<div id="header">
    <?php include 'header.php'; ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/ratings.css" type="text/css" media="screen" />
</div>


<div id="body_wrapper">
    <div id="content">
        <!-- breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                    <li><a href="<?php print site_url(); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                    <li class="active">Product Page</li>
                </ol>
            </div>
        </div>
        <!-- //breadcrumbs -->

        <!-- single -->
        <?php
        if (empty($files)) {
            $image_default = new stdClass();
            $image_default->file_path = PRODUCT_DEFAULT_IMAGE;
            $files = array($image_default);
        } else {
            if (count($files) == 1) {
                $files = array_merge($files, array_merge($files, $files));
            } else if (count($files) == 2)
                $files = array_merge($files, $files);
        }
        $total_ratings = 0;
        $total_likes = 0;
        $total_recommend = 0;
        if (isset($product_ratings) && count($product_ratings) > 0) {
            foreach ($product_ratings as $rating) {
                if ($rating->likes == 'Yes')
                    $total_likes++;
                if ($rating->recommend == 'Yes')
                    $total_recommend++;
                $total_ratings += $rating->ratings;
            }
            $total_ratings = round($total_ratings / count($product_ratings), 1);
        }
        ?>
        <div class="single">
            <div class="container">

                <div class="col-md-12 single-right">
                    <div class="col-md-5 single-right-left animated wow slideInUp" data-wow-delay=".5s">
                        <div class="flexslider">
                            <ul class="slides">

                                <?php
                                foreach ($files as $key => $file) {
                                    if ($key >= 3)
                                        break;
                                    ?>
                                    <li data-thumb="<?php print base_url() . PRODUCT_IMAGE_DIRECTORY . $file->file_path; ?>">
                                        <div class="thumb-image"> <img src="<?php print base_url() . PRODUCT_IMAGE_DIRECTORY . $file->file_path; ?>" data-imagezoom="true" class="img-responsive"> </div>
                                    </li>
<?php } ?>
                            </ul>
                        </div>
                        <!-- flixslider -->

                        <script>
                            // Can also be used with $(document).ready()
                            $(window).load(function() {
                                $('.flexslider').flexslider({
                                    animation: "slide",
                                    controlNav: "thumbnails"
                                });
                            });
                        </script>
                        <!-- flixslider -->
                    </div>
                    <div class="col-md-7 single-right-left simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s">
                        <h3><?php print $product[0]->pro_name; ?></h3>
                        <h4><span class="item_price">Rs. <?php print $product[0]->pro_price; ?></h4>
                        <div class="product-rating">
                            <div class="pdp-e-i-ratings" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                                <div ratings="4.0">
                                    <div class="pdp-main-ratings av-rating">
                                        <div class="rating-stars sd-product-main-rating">
                                            <div class="grey-stars"></div>
                                            <div class="filled-stars" style="width:<?php print ($total_ratings * 20) . '%'; ?>"></div>
                                        </div>
                                    </div>
                                    <span class="hidden" itemprop="ratingValue"><?php print $total_ratings; ?></span>
                                    <span itemprop="ratingCount" class="hidden">353</span>
                                    <span class="avrg-rating">(<?php print $total_ratings; ?>)</span>
                                    <span class="clear  hidden "></span>
                                    <span class="total-rating showRatingTooltip"><span  id="show_user_review_button" style="cursor: pointer;"><?php print count($product_ratings); ?> Rating(s)</span></span>

                                    <span class="numbr-review">
                                        <span id="show_user_ratings_button" style="cursor: pointer;"><?php print count($product_ratings); ?> Review(s)</span>
                                    </span>
                                    <span class="sep"></span>
                                    <span class="posRelative hidden ceeSeperator">
                                        <span class="cxeWidgts"></span>
                                        <span id="recommend-section" class="hidden recommend-rating padL10"> 
                                            <span class="cee-wrapper-text"></span>
                                        </span>

                                        <span id="trusted-prod-section" class="hidden trusted-prod-section"> 
                                            <span class="cee-wrapper-text"></span>
                                        </span>
                                    </span>

                                </div>
                            </div> 
                        </div>
                        <div class="product-desc">
                            <div class="featuresRow">
                                <div class="features">
                                    <div class="subHeading">Features</div>
                                    <p>  </p>
                                    <ul>
                                        <li>Type of Product :    <span class="">     <?php print $product[0]->type_name; ?>  </span>   </li>
                                        <li>Product Category :      <span class=""> <?php print $product[0]->cat_name; ?>  </span>       </li>
                                        <li>Available In :   <span class="">    <?php print $product[0]->loc_name; ?>  </span>     </li>
                                        <li>Product Company :    <span class=""><?php print $product[0]->com_name; ?>   </span>     </li>
                                        <li>Model No :    <span class="">   <?php print !empty($product[0]->pro_model) ? $product[0]->pro_model : 'N/A'; ?>  </span>    </li>
                                        <li>Usable Type :    <span class="">     <?php print !empty($product[0]->pro_uses) ? $product[0]->pro_uses : 'N/A'; ?>     </span>    </li>
                                        <li>Purchased On :    <span class="">    <?php print !empty($product[0]->pro_purchased) ? date('d/m/y', $product[0]->pro_purchased) : 'N/A'; ?>    </span>    </li>
                                        <a class="more AH_more_details" href="#">More Details</a>
                                    </ul>
                                    <p></p>
                                </div>
                            </div>

                        </div>
                        <div class ="seller_details_wrapper_outer">
                        <div class="seller_details_wrapper">
                                    <div class="product_info_label">Enter the mobile/email id to get seller details: </div>
                                    <div class="product_info_value">
                                        <input type="text"  class=" col-sm-6 seller_search_text_fied" name="guest_email" placeholder="Email/Mobile">
                                        <button product_user="<?php print $product[0]->pro_user; ?>" class=" col-sm-2 btn btn-default search_seller_details">Search</button>
                                    </div>
                                </div>
                                <div class="seller_all_details_wrapper hidden">
                                    <div class="product_info_value seller_name"> </div>
                                    <div class="product_info_value seller_location"> </div>
                                    <div class="product_info_value seller_mobile"> </div>
                                </div>
                        </div>
                        <div class="col-md-12 social">
                            <div class="social-left">
                                <p>Share On :</p>
                            </div>
                            <div class="social-right social_icon">
                                <ul class="social-icons">
                                    <li><a href="#" class="facebook"></a></li>
                                    <li><a href="#" class="twitter"></a></li>
                                    <li><a href="#" class="g"></a></li>
                                    <li><a href="#" class="instagram"></a></li>
                                </ul>
                            </div>
                       <div class="social-right btn-group cart">
                                <button type="button" class="btn btn-success">
                                    Add to cart 
                                </button>
                            </div>
                            <?php if (isset($this->session->userdata['logged_in']['uid'])) { ?>
                            <div class="social-right btn-group wishlist">
                                <?php
                                if (isset($user_wishlist) && !empty($user_wishlist)) {
                                    $add_wish_list = 'hidden';
                                    $delete_wish_list = '';
                                } else {
                                    $add_wish_list = '';
                                    $delete_wish_list = 'hidden';
                                }
                                ?>
                                <button type="button" class="btn btn-danger delete_from_wish_list_button <?php print $delete_wish_list; ?>" 
                                        product_user="<?php print $this->session->userdata['logged_in']['uid']; ?>"
                                        product_id="<?php print $product[0]->pid; ?>">
                                    Delete from wishlist 
                                </button>
                                <button type="button" class="btn btn-success add_to_wish_list_button <?php print $add_wish_list; ?>" 
                                        product_user="<?php print $this->session->userdata['logged_in']['uid']; ?>"
                                        product_id="<?php print $product[0]->pid; ?>" >
                                    Add to wishlist 
                                </button>
                                <div type="button" class="hidden my_wishlist_confirm_dialog_button" data-toggle="modal" data-target="#myWishListAction">Open Modal</div>
                            </div>
<?php } ?>
                        
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    <div class=" product_description_Wrapper bootstrap-tab animated wow slideInUp" data-wow-delay=".5s">
                        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
                                <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Reviews(<?php print count($product_ratings); ?>)</a></li>
                                
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
                                    <h5>Product Brief Description</h5>
                                    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.
                                        <span>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
                                    
                                    
                                    <div class="product_review_wrapper">
                                    
                                  <div class="product_review">
                                    <ul itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                                        <li class="first  col-xs-8  leftAlignment">
                                            <div class="chart text">
                                                <div class="rating-middle-section clearfix"> 
                                                    <div class="rating-text"><span class="rating"><?php print $total_ratings;?></span>/5</div> 
                                                    <div class="rating-stars product-rating clearfix">
                                                        <div class="grey-stars"></div>
                                                        <div class="filled-stars" style="width:<?php print ($total_ratings*20).'%';?>"></div>
                                                    </div>
                                                    <p class="total-review-txt"><?php print count($product_ratings);?>&nbsp;Ratings &amp; <?php print count($product_ratings);?>&nbsp;Reviews</p> 
                                                    
                                                </div>
                                            </div>
                                        </li>
                                        <li id="user-reviewRec-content-div" class="second col-xs-8">
                                            <div class="text aligncenter">
                                                <div id="rcmnd-text" class="LTgray fs14">
                                                    <div class="recom-text"><span class="recom"><?php (count($product_ratings)>0)? print round(($total_recommend*100)/count($product_ratings)): print 0; ?><span class="percentText">%</span></span></div> 
                                                    <div class="recom-subtext">Based on <?php print count($product_ratings);?> Recommendations.</div>
                                                </div>
                                                <div class="recomBtn marT30 user_recomendation">
                                                    <?php if(isset($this->session->userdata['logged_in']['uid'])){ ?>
                                                    <span class="LTblack col-xs-13"> Would you like to recommend this item?</span>
                                                    <a id="recBtn" class="btn white-btn rippleWhite col-xs-4 reset-margin" data-toggle="modal" data-target="#userReviewModel" product_id="<?php Print $product[0]->pid; ?>">Yes</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </li>

                                        <li id="user-reviewRate-content-div" class="third col-xs-8">
                                            <div class="aligncenter">
                                                <p id="rev-text"><span>Have you used this product?</span></p>
                                               <?php if(isset($this->session->userdata['logged_in']['uid'])){ ?> 
                                                <a class="btn btn-orange rippleWhite js-userReviewed reviewBtn" id="giveReviewButton" product_id="<?php Print $product[0]->pid; ?>" data-toggle="modal" data-target="#userReviewModel">Review</a>
                                               <?php }else{ ?>
                                                <a href="<?php print DOMAIN_NAME; ?>" class="btn btn-orange rippleWhite js-userReviewed reviewBtn">Login to give Review</a>
                                           <?php    }?>
                                            </div>
                                        </li>
                                    </ul></div>
                                    <div class="clear"></div>


                                    <div class="sort clearfix" id="defRevPDP">
                                        <div class="cust_review">Customer Reviews</div>
                                       <?php if(count($product_ratings)>0) {?> 
                                        <ul class="user review_filter">
                                            <li>Filter By:</li>     
                                            <li class="selectReview">

                                                    <div class="selectarea">
                                                        <select class="styledSelect sd-icon-expand-arrow customized user_review_select_option" product_id="<?php Print $product[0]->pid; ?>">
                                                            <option value="-1"> All Stars</option>
                                                            <option value="5">5 Star</option>
                                                            <option value="4">4 Star</option>
                                                            <option value="3">3 Star</option>
                                                            <option value="2">2 Star</option>
                                                            <option value="1">1 Star</option>
                                                        </select></div>
                                            </li>
                                        </ul>
                                       <?php } ?>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="user_review_full_wrapper"> <?php include 'review_view.php';?></div>
                                </div>
                                    
                                </div>
                                <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown1" aria-labelledby="dropdown1-tab">
                                    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown2" aria-labelledby="dropdown2-tab">
                                    <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- //single -->
        <!-- single-related-products -->
        <div class="single-related-products">
            <div class="container">
                <h3 class="animated wow slideInUp" data-wow-delay=".5s">Related Products</h3>
                                <p class="est animated wow slideInUp" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
                                    deserunt mollit anim id est laborum.</p>
                                
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
                                                                            <img src="<?php print base_url();?>images/2.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="<?php print base_url();?>images/2.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="<?php print base_url();?>images/2.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="<?php print base_url();?>images/1.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="<?php print base_url();?>images/1.png" alt=" " class="img-responsive" />
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
						<h4><a href="single.html"><?php print (strlen($product->pro_name) > 30) ? substr($product->pro_name, 0, 30) . '...' : $product->pro_name; ?></a></h4>
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
            <!-- //single-related-products -->


        </div>
    </div>



<div id="footer">
<?php include 'footer.php'; ?>
</div>