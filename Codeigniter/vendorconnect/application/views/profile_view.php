<div id="header">
    <?php include 'header.php'; ?>
</div>

<div id="body_wrapper">
    <div id="content">
        
        
        <!--        Delete My Bulk list start-->
        <div class="modal fade" id="deleteMyBulkList" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('user/deletebulklist'); ?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">DELETE BULK LIST</h4>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="inputmobile" class="col-xs-12">Are you sure you want to delete this product ?</label>
                            </div>
                           <div class="col-xs-12"> <input type="hidden" name="bulk_list_id" id="bulk_list_hidden_id" > </div> 
                           
                        </div>
                        <div class="modal-footer">
                            <div class="edit_button_wrapper">
                                <div class="col-xs-6">
                                    <input type="submit" value="Delete" class="btn btn-default edit_button_save">
                                </div>
                                <div class="col-xs-4">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--        Delete My Bulk list end-->


        <!--        Edit profile dialog-->
        <div class="modal fade" id="editMyBulkList" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">MY LIST</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('user/createbulklist'); ?>">
                            
                            <div class="form-group">
                                <label for="inputfullName" class="control-label col-xs-2">List Name:</label>
                                <div class="col-xs-10">
                                    <input type="text" name="listname" id="bulk_list_name" value="" class="form-control required">
                                    <input type="hidden" name="bulklistid" name="listid" id="bulk_list_id" value="" class="form-control">
                                </div>
                            </div>
                            <div class="bulk_list_edit_container">
                                <div class="form-group">
                                    <label for="inputfullName" class="control-label col-xs-2">Product Name:</label>
                                    <div class="col-xs-10">
                                        <input type="text" name="bulklistproductname" id="bulk_list_product_name" value="" class="form-control required">
                                    </div>
                                </div>
                                <input type="hidden" name="bulklistproductid" name="bulklistproductid" id="bulk_list_product_id" value="" class="form-control">
                                <div class="form-group">
                                    <label for="bulklistcontainer" class="control-label col-xs-2">Product(s):</label>
                                    <div class="col-xs-10">
                                        <div id="bulk_list_container"> </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="edit_button_wrapper">
                                    <div class="col-xs-6">
                                        <input type="submit" value="Save" class="btn btn-default edit_button_save">
                                    </div>
                                    <div class="col-xs-6">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!--        Edit profile dialog-->
        <div class="modal fade" id="editMyProfile" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">EDIT PROFILE</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('user/editprofile'); ?>">
                            <div class="form-group">
                                <label for="inputfullName" class="control-label col-xs-2">Full Name:</label>
                                <div class="col-xs-10">
                                    <input type="text" name="fullname" id="first_name" value="<?php print $user_details[0]->name; ?>" class="form-control required">
                                </div>
                            </div>
                            <input type="hidden" name="uid" id="first_name" value="<?php print $user_details[0]->uid; ?>" class="form-control">
                            <div class="form-group">
                                <label for="inputmobile" class="control-label col-xs-2">Mobile:</label>
                                <div class="col-xs-10">
                                    <input required="true" type="text" name="mobile" value="<?php print $user_details[0]->mobile; ?>" id="last_name" class="form-control required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Location" class="control-label col-xs-2">Select Location:</label>
                                <div class="col-xs-10">
                                    <input required="true" type="text" name="location" value="<?php print $user_details[0]->loc_name; ?>" id="inputUserLocation" class="form-control required" placeholder="Your Location">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="edit_button_wrapper">
                                    <div class="col-xs-6">
                                        <input type="submit" value="Save" class="btn btn-default edit_button_save">
                                    </div>
                                    <div class="col-xs-6">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--        Delete My product start-->
        <div class="modal fade" id="deleteMyproduct" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('admin_add_controllar/deleteproduct'); ?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">DELETE PRODUCT</h4>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="inputmobile" class="col-xs-2">Product Name:</label>
                                <div class="col-xs-10 delete_product_name"> </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputmobile" class="col-xs-12">Are you sure you want to delete this product ?</label>
                            </div>
                           <div class="col-xs-12"> <input type="hidden" name="product_id" id="product_hidden_id" > </div> 
                           
                        </div>
                        <div class="modal-footer">
                            <div class="edit_button_wrapper">
                                <div class="col-xs-6">
                                    <input type="submit" value="Delete" class="btn btn-default edit_button_save">
                                </div>
                                <div class="col-xs-4">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--        Delete My product end-->

        <!--        Edit My product start-->
        <div class="modal fade" id="editMyProduct" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">EDIT PRODUCT</h4>
                    </div>
                    <div class="panel-body">
                    <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('admin_add_controllar/updateproduct'); ?>" enctype="multipart/form-data">

                        <?php if (isset($this->session->userdata['logged_in'])) { ?>
                            <input required type="hidden" name="productuser" class="form-control" id="inputEmail" value="<?php print $this->session->userdata['logged_in']['name']; ?>">
                        <?php } ?>
                        <div class="form-group">
                            <label for="inputProductName" class="control-label col-xs-2">Product Name:</label>
                            <div class="col-xs-10">
                                <input required type="hidden" name="productid" class="form-control" id="editProductId">
                                <input required type="text" name="productname" class="form-control required" id="editProductName" placeholder="Ex: Make * Type * Model">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputProductDescription" class="control-label col-xs-2">Product Description:</label>
                            <div class="col-xs-10">
                                <textarea name="productdescription" class="form-control required" rows="5" id="editProductDescription" placeholder="Description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputProductCategory" class="control-label col-xs-2">Category:</label>
                            <div class="col-xs-10">
                                <select class="form-control" id="editProductCategory" name="productcategory">
                                    <?php foreach ($categories as $key => $cat) { ?>
                                        <option value="<?Php print $cat->catid; ?>"><?php print $cat->cat_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputProductType" class="control-label col-xs-2">Type:</label>
                            <div class="col-xs-10">
                                <select class="form-control" id="editProductType" name="producttype">
                                    <?php foreach ($producttype as $key => $type) { ?>
                                        <option value="<?Php print $type->typeid; ?>"><?php print $type->type_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputProductMake" class="control-label col-xs-2">Make:</label>
                            <div class="col-xs-10">
                                <input required="true"  type="text" name="productmake" class="form-control required" id="editProductMake" placeholder="Make">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputProductModel" class="control-label col-xs-2">Model:</label>
                            <div class="col-xs-10">
                                <input required="true"  type="text" name="productmodel" class="form-control required" id="editProductModel" placeholder="Model">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPurchaseYear" class="control-label col-xs-2 year-of-purchase-label">Year of purchase:</label>
                            <div class="col-xs-4">
                                <input required="true"  type="text" name="productyear" class="form-control required" id="editProductYear" placeholder="DD/MM/YYYY">
                            </div>
                            <label for="inputProductUses" class="control-label col-xs-2">Product Uses:</label>
                            <div class="col-xs-4">
                                <div class="radio col-xs-4">
                                    <label><input type="radio" name="productuses" id="editProductused" value="used" class="required">Used</label>
                                </div>
                                <div class="radio col-xs-4">
                                    <label><input type="radio" value="unused" id="editProductunused" name="productuses" class="required">Unused</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputProductLocation" class="control-label col-xs-2">Location:</label>
                            <div class="col-xs-10">
                                <select class="form-control" id="editProductLocation" name="productlocation">
                                    <?php foreach ($locations as $loc) { ?>
                                        <option value="<?Php print $loc->locid; ?>"><?php print $loc->loc_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputProductCompany" class="control-label col-xs-2">Companies:</label>
                            <div class="col-xs-10">
                                <select class="form-control" id="editProductCompany" name="productcompany" required="true">
                                    <?php foreach ($companies as $comp) { ?>
                                        <option value="<?Php print $comp->comid; ?>"><?php print $comp->com_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputProductPrice" class="control-label col-xs-2">Price:</label>
                            <div class="col-xs-10">
                                <input required="true"  type="text" name="productprice" class="form-control required" id="editProductPrice" placeholder="Price">
                            </div>
                        </div>

                        <div class="form-group product_add_image_wrapper">
                            <label for="inputProductimage" class="control-label col-xs-2">Image:</label>
                            <div class="col-xs-10">
                                <div class="col-xs-4" id="inputProductImageFile1">
                                    <label class="control-label product_add_image_label">Select product image 1</label>
                                    <input type="file" name="productimage[]" class="custom-file filestyle"  data-icon="false">
                                </div>
                                <div class="col-xs-4 hidden" id="inputProductImage1">
                                    <label class="control-label product_add_image_label">Product image 1</label>
                                    <div class="edit_product_image">
                                        <img src="" class="img-responsive">
                                    </div>
                                    <div class="product_image_delete">
                                        <span image="1" >Remove</span>
                                    </div>
                                </div>
                                <div class="col-xs-4" id="inputProductImageFile2">
                                    <label class="control-label product_add_image_label">Select product image 2</label>
                                    <input type="file"  name="productimage[]" class="custom-file-input filestyle"   data-icon="false">
                                </div>
                                <div class="col-xs-4 hidden" id="inputProductImage2">
                                    <label class="control-label product_add_image_label">Product image 2</label>
                                    <div class="edit_product_image">
                                        <img src="" class="img-responsive">
                                    </div>
                                    <div class="product_image_delete">
                                        <span image="2" >Remove</span>
                                    </div>
                                </div>
                                <div class="col-xs-4" id="inputProductImageFile3">
                                    <label class="control-label product_add_image_label">Select product image 3</label>
                                    <input type="file" name="productimage[]" class="custom-file filestyle" id="inputProductImageFile3"  data-icon="false">
                                </div>
                                <div class="col-xs-4 hidden" id="inputProductImage3">
                                    <label class="control-label product_add_image_label">Product image 3</label>
                                    <div class="edit_product_image">
                                        <img src="" class="img-responsive">
                                    </div>
                                    <div class="product_image_delete">
                                        <span  image="3" >Remove</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="edit_button_wrapper">
                                <div class="col-xs-6">
                                    <input type="submit" value="Save" class="btn btn-default edit_button_save">
                                </div>
                                <div class="col-xs-4">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                 </div>
                </div>
            </div>
        </div>
        <!--        Edit My product end-->

        <!--        View My product start--> 
        <div class="modal fade" id="viewMyProduct" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">VIEW PRODUCT</h4>
                    </div>
                    <div class="panel-body">
                         <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('admin_add_controllar/updateproduct'); ?>" enctype="multipart/form-data">
                        <?php if (isset($this->session->userdata['logged_in'])) { ?>
                            <input required type="hidden" name="productuser" class="form-control" id="inputEmail" value="<?php print $this->session->userdata['logged_in']['name']; ?>">
                        <?php } ?>
                        <div class="form-group">
                            <label for="inputProductName" class="control-label col-xs-2">Product Name:</label>
                            <div class="col-xs-10">
                                <input required type="hidden" name="productid" class="form-control" id="viewProductId">
                                <input required type="text" name="productname" class="form-control required" id="viewProductName" placeholder="Ex: Make * Type * Model">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputProductDescription" class="control-label col-xs-2">Product Description:</label>
                            <div class="col-xs-10">
                                <textarea name="productdescription" class="form-control required" rows="5" id="viewProductDescription" placeholder="Description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputProductCategory" class="control-label col-xs-2">Category:</label>
                            <div class="col-xs-10">
                                <select class="form-control" id="viewProductCategory" name="productcategory">
                                    <?php foreach ($categories as $key => $cat) { ?>
                                        <option value="<?Php print $cat->catid; ?>"><?php print $cat->cat_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputProductType" class="control-label col-xs-2">Type:</label>
                            <div class="col-xs-10">
                                <select class="form-control" id="viewProductType" name="producttype">
                                    <?php foreach ($producttype as $key => $type) { ?>
                                        <option value="<?Php print $type->typeid; ?>"><?php print $type->type_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputProductMake" class="control-label col-xs-2">Make:</label>
                            <div class="col-xs-10">
                                <input required="true"  type="text" name="productmake" class="form-control required" id="viewProductMake" placeholder="Make">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputProductModel" class="control-label col-xs-2">Model:</label>
                            <div class="col-xs-10">
                                <input required="true"  type="text" name="productmodel" class="form-control required" id="viewProductModel" placeholder="Model">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPurchaseYear" class="control-label col-xs-2 year-of-purchase-label">Year of purchase:</label>
                            <div class="col-xs-4">
                                <input required="true"  type="text" name="productyear" class="form-control required" id="viewProductYear" placeholder="DD/MM/YYYY">
                            </div>
                            <label for="inputProductUses" class="control-label col-xs-2">Product Uses:</label>
                            <div class="col-xs-4">
                                <div class="radio col-xs-4">
                                    <label><input type="radio" name="productuses" id="viewProductused" value="used" class="required">Used</label>
                                </div>
                                <div class="radio col-xs-4">
                                    <label><input type="radio" value="unused" id="viewProductunused" name="productuses" class="required">Unused</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputProductLocation" class="control-label col-xs-2">Location:</label>
                            <div class="col-xs-10">
                                <select class="form-control" id="viewProductLocation" name="productlocation">
                                    <?php foreach ($locations as $loc) { ?>
                                        <option value="<?Php print $loc->locid; ?>"><?php print $loc->loc_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputProductCompany" class="control-label col-xs-2">Companies:</label>
                            <div class="col-xs-10">
                                <select class="form-control" id="viewProductCompany" name="productcompany" required="true">
                                    <?php foreach ($companies as $comp) { ?>
                                        <option value="<?Php print $comp->comid; ?>"><?php print $comp->com_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputProductPrice" class="control-label col-xs-2">Price:</label>
                            <div class="col-xs-10">
                                <input required="true"  type="text" name="productprice" class="form-control required" id="viewProductPrice" placeholder="Price">
                            </div>
                        </div>

                        <div class="form-group product_add_image_wrapper">
                            <label for="inputProductimage" class="control-label col-xs-2">Image:</label>
                            <div class="col-xs-10">
                                <div class="col-xs-4" id="viewProductImageFile1">
                                    <label class="control-label product_add_image_label">Select product image 1</label>
                                    <input type="file" name="productimage[]" class="custom-file filestyle"  data-icon="false">
                                </div>
                                <div class="col-xs-4 hidden" id="viewProductImage1">
                                    <label class="control-label product_add_image_label">Product image 1</label>
                                    <div class="edit_product_image">
                                        <img src="" class="img-responsive">
                                    </div>
                                    <div class="product_image_delete">
                                        <span image="1" >Remove</span>
                                    </div>
                                </div>
                                <div class="col-xs-4" id="viewProductImageFile2">
                                    <label class="control-label product_add_image_label">Select product image 2</label>
                                    <input type="file"  name="productimage[]" class="custom-file-input filestyle"   data-icon="false">
                                </div>
                                <div class="col-xs-4 hidden" id="viewProductImage2">
                                    <label class="control-label product_add_image_label">Product image 2</label>
                                    <div class="edit_product_image">
                                        <img src="" class="img-responsive">
                                    </div>
                                    <div class="product_image_delete">
                                        <span image="2" >Remove</span>
                                    </div>
                                </div>
                                <div class="col-xs-4" id="viewProductImageFile3">
                                    <label class="control-label product_add_image_label">Select product image 3</label>
                                    <input type="file" name="productimage[]" class="custom-file filestyle" id="viewProductImageFile3"  data-icon="false">
                                </div>
                                <div class="col-xs-4 hidden" id="inputProductImage3">
                                    <label class="control-label product_add_image_label">Product image 3</label>
                                    <div class="edit_product_image">
                                        <img src="" class="img-responsive">
                                    </div>
                                    <div class="product_image_delete">
                                        <span  image="3" >Remove</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="edit_button_wrapper">
                                <div class="col-xs-4">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                     </form>
                 </div>
                </div>
            </div>
        </div>
     <!--        View My product end-->     
        
        <!-- breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                    <li><a href="<?php print base_url(); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                    <li class="active">My Profile</li>
                </ol>
            </div>
        </div>

        <div id="my_profile_wrapper" class="container">
            <h1>MY PROFILE</h1>

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
                    <div class="my_profile_edit_wrapper">
                        <button type="button" class="btn btn-info my_profile_edit__button" >
                            <a class="add_product_button" href="#editMyProfile" data-toggle="modal">Edit Profile</a> </button>
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
                            <div class="my_product_view">
                                <div  class="my_product_edit_button" >
                                    <a class="add_product_button" href="#editMyBulkList" data-action="edit" data-list_id="<?php print $list->list_id;?>"
                                       data-list_name="<?php print $list->list_name;?>" data-toggle="modal">Edit</a> 
                                </div>
                            </div>
                            <div class="my_product_view">
                                <div  class="my_product_delete_button" >
                                    <a class="add_product_button" href="#deleteMyBulkList" data-list_id="<?php print $list->list_id;?>"  data-toggle="modal">Delete</a> 
                                </div>
                            </div>
                        </div>
                            <?php }}else{
                            print 'You don\'t have any bulk list';
                        } ?>
                    </div>
                </div>
            </div>
            <!-- My product section end -->
       
            <!-- My produvt section start -->
            <div class="my_added_product_wrapper row">
                <h1>MY PRODUCTS</h1>
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
                                        <div class="my_product_action_wrapper">
                                            <div class="my_product_view">
                                                <div  class="my_product_view_button" >
                                                    <a class="add_product_button" href="#viewMyProduct" data-id="<?php print $product->pid; ?>" data-action="view" data-toggle="modal">View</a> 
                                                </div>
                                            </div>
                                            <div class="my_product_view">
                                                <div  class="my_product_edit_button" >
                                                    <a class="add_product_button" href="#editMyProduct" data-action="edit" data-id="<?php print $product->pid; ?>" data-toggle="modal">Edit</a> 
                                                </div>
                                            </div>
                                            <div class="my_product_view">
                                                <div  class="my_product_delete_button" >
                                                    <a class="add_product_button" href="#deleteMyproduct" data-id="<?php print $product->pid; ?>" data-product_name="<?php print $product->pro_name; ?>" data-toggle="modal">Delete</a> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <a class="left carousel-control" href="#recentCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                        <a class="right carousel-control" href="#recentCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a> 

                    </div>
                    <?php }else{
                        print '<div class="no_order_full_wrapper"><div class="no_order_wrapper">You have not yet added any product</div></div>';
                    } ?>
                </div>
            </div>
            <!-- My product section end -->
            
            
             <!-- My wishlist section start -->
            <div class="my_order_product_wrapper row">
                <h1>MY WISHLIST</h1>
                <div class="row text-center recent_product_wrapper">
                    <?php if(isset($wish_list) && count($wish_list)>0){ ?>
                    <div  class="carousel carouselMyAddedProduct slide" id="MyAddedCarousel">
                        <div class="carousel-inner recent_product_inner">
                            <?php foreach ($wish_list as $key => $list) { 
                                $image = (empty($list->file_path))? PRODUCT_DEFAULT_IMAGE : $list->file_path; ?>
                                <div class="item <?php $key == 0 ? print'active'  : print'' ; ?>">
                                    <div class="col-md-2 latest_product_container">

                                        <a href="<?php print site_url('product/productview/' . $list->pid); ?>">
                                            <div clas="product_image">
                                                <img src="<?php print base_url() . PRODUCT_IMAGE_DIRECTORY . $image; ?>" class="img-responsive">
                                            </div>
                                            <div class="product_details carousel-caption center" title="<?php print $list->pro_name; ?>">
                                                <div class="product_desc">
                                                    <div class="product_title"><?php print (strlen($list->pro_name) > 30) ? substr($list->pro_name, 0, 30) . '...' : $list->pro_name; ?></div>
                                                    <div class="product_company">By <?php print $list->com_name; ?></div>
                                                    <div class="product_price">Rs <?php print $list->pro_price; ?></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <a class="left carousel-control" href="#MyAddedCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                        <a class="right carousel-control" href="#MyAddedCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a> 

                    </div>
                    <?php }else{
                        print '<div class="no_order_full_wrapper"><div class="no_order_wrapper">You have dont have any wishlist.</div></div>';
                    } ?>
                </div>
            </div>
            <!-- My wishlist section end -->
            
<!--
             My order section start 
            <div class="my_order_product_wrapper row">
                <h1>MY ORDERS</h1>
                <div class="row text-center recent_product_wrapper">
                    <?php if(count($products)>0){ ?>
                    <div  class="carousel carouselMyAddedProduct slide" id="MyAddedCarousel">
                        <div class="carousel-inner recent_product_inner">
                            <?php foreach ($products as $key => $product) { 
                                $image = (empty($product->file_path))? PRODUCT_DEFAULT_IMAGE : $product->file_path; ?>
                                <div class="item <?php $key == 0 ? print'active'  : print'' ; ?>">
                                    <div class="col-md-2 latest_product_container">

                                        <a href="<?php print site_url('product/productview/' . $product->pid); ?>">
                                            <div clas="product_image">
                                                <img src="<?php print base_url() . PRODUCT_IMAGE_DIRECTORY . $image; ?>" class="img-responsive">
                                            </div>
                                            <div class="product_details carousel-caption center" title="<?php print $product->pro_name; ?>">
                                                <div class="product_desc">
                                                    <div class="product_title"><?php print (strlen($product->pro_name) > 30) ? substr($product->pro_name, 0, 30) . '...' : $product->pro_name; ?></div>
                                                    <div class="product_company">By <?php print $product->com_name; ?></div>
                                                    <div class="product_price">Rs <?php print $product->pro_price; ?></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <a class="left carousel-control" href="#MyAddedCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                        <a class="right carousel-control" href="#MyAddedCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a> 

                    </div>
                    <?php }else{
                        print '<div class="no_order_full_wrapper"><div class="no_order_wrapper">You have not yet order any product</div></div>';
                    } ?>
                </div>
            </div>
             My order section end -->
        </div>

</div>

<div id="footer">
    <?php include 'footer.php'; ?>
</div>

