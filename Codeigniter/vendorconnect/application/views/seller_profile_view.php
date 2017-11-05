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
                    <li class="active">Seller Profile</li>
                </ol>
            </div>
        </div>

        <div id="my_profile_wrapper" class="container">
            <h1>SELLER PROFILE</h1>

            <div class="my_profile_wrapper_table row">
                <div class="col-md-3 my_profile_wrapper_inner">
                    <div class="my_profile_wrapper_image">
                        <div class="product_image">
                            <img class="img-responsive" src="<?php print base_url() . USER_IMAGE_DIRECTORY . 'user_default_pics.png'; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 my_profile_wrapper_inner">
                    <div class="my_profile_wrapper_details">
                        <span class="my_profile_label"> Name: </span> <?php print $user_details[0]->name; ?>
                    </div>
                    <div class="my_profile_wrapper_details">
                        <span class="my_profile_label"> Email: </span> <?php print $user_details[0]->email; ?>
                    </div>
                    <div class="my_profile_wrapper_details">
                        <span class="my_profile_label"> Mobile: </span> <?php print $user_details[0]->mobile; ?>
                    </div>
                </div>
                <div class="col-md-3 my_profile_wrapper_inner">
                    <div class="my_profile_wrapper_details">
                        <span class="my_profile_label"> Industry Type: </span> <?php print 'N/A'; ?>
                    </div>
                    <div class="my_profile_wrapper_details">
                        <span class="my_profile_label"> Location: </span> <?php print $user_details[0]->loc_name; ?>
                    </div>
                    <div class="my_profile_wrapper_details">
                        <span class="my_profile_label"> Member Since: </span> <?php print date('d-m-Y h:i A', $user_details[0]->created); ?>
                    </div>
                </div>
                <div class="col-md-3 my_profile_wrapper_inner">
                    <div class="my_profile_wrapper_details">
                        <span class="my_profile_label"> Total Product added: </span> <?php print count($products); ?>
                    </div>
                    <div class="my_profile_wrapper_details">
                        <span class="my_profile_label"> Total Product ordered: </span> <?php print 0; ?>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- My List in bulk section -->
            <div class="my_added_product_wrapper my_list_in_bulk_wrapper row">
                <h1>MY LIST IN BULK <div class="list_in_bulk_create_button">
                        <a class="bulk_list_create_button" href="#editMyBulkList" data-action="create" data-toggle="modal">Create New List</a>    
                    </div></h1>
                <!--The main div for carousel-->
                <div class="row text-center recent_product_wrapper carousel">
                    <div class="list_in_bulk_wrapper carousel-inner">
                        <?php if(isset($bulk_list) && !empty($bulk_list)){
                            foreach($bulk_list as $list){?>
                        <div class="list_in_bulk_inner">
                            <div class="list_in_bulk_image">
                                <div class="product_image">
                                    <img src="<?php print base_url().PRODUCT_IMAGE_DIRECTORY.'bulk_list_default.png'?>" class="img-responsive">
                                </div>
                                <div class="list_in_bulk_details center" title=""><?php print $list->list_name; ?></div>
                            </div>
                            
                        </div>
                            <?php }}else{
                            print 'Seller doesn\'t have any bulk list';
                        } ?>
                    </div>
                </div>
            </div>
            <!-- My product section end -->
       
            <!-- My produvt section start -->
            <div class="my_added_product_wrapper row">
                <h1>SELLER PRODUCTS</h1>
                <!--The main div for carousel-->
                <div class="row text-center recent_product_wrapper">
                    <?php if(count($products)>0){ ?>
                    <div  class="carousel carouselRecentProduct slide" id="recentCarousel">
                        <div class="carousel-inner recent_product_inner">
                            <?php foreach ($products as $key => $product) { 
                                 $added_product_image = (empty($product->file_path))? PRODUCT_DEFAULT_IMAGE : $product->file_path; ?>
                                <div class="item <?php $key == 0 ? print'active'  : print'' ; ?>">
                                    <div class="col-md-2 latest_product_container">
                                        <div class="my_added_product_details">
                                            <a href="<?php print site_url('product/productview/' . $product->pid); ?>">
                                                <div clas="product_image">
                                                    <img src="<?php print base_url() . PRODUCT_IMAGE_DIRECTORY .$added_product_image; ?>" class="img-responsive">
                                                </div>
                                                <div class="product_details carousel-caption center" title="<?php print $product->pro_name; ?>">
                                                    <div class="product_desc">
                                                        <div class="product_title"><?php print (strlen($product->pro_name) > 30) ? substr($product->pro_name, 0, 30) . '...' : $product->pro_name; ?></div>
                                                        <div class="product_price">Rs <?php print $product->pro_price; ?></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <a class="left carousel-control" href="#recentCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                        <a class="right carousel-control" href="#recentCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a> 

                    </div>
                    <?php }else{
                        print '<div class="no_order_full_wrapper"><div class="no_order_wrapper">Seller has not yet added any product</div></div>';
                    } ?>
                </div>
            </div>
            <!-- My product section end -->
        </div>

</div>

<div id="footer">
    <?php include 'footer.php'; ?>
</div>

