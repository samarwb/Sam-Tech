

<div class="col-md-12 product_add_wrapper">
    <ul id="myTab" class="nav nav-tabs nav_tabs">

        <li ><a href="#product_add_form" data-toggle="tab" class="product_add_wrapper_tab product_add_wrapper_tab_main" tab = "main">Main Product</a></li>
        <li class="active"><a href="#product_add_form" data-toggle="tab" class="product_add_wrapper_tab product_add_wrapper_spare" tab = "spare">Spares</a></li>
    </ul>

    <div id="product_add_form" class="tab-content">  
        <div class="bs-example">
            <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('admin_add_controllar/insertproduct'); ?>" enctype="multipart/form-data">

                <?php if (isset($this->session->userdata['logged_in'])) { ?>
                    <input required type="hidden" name="productuser" class="form-control" id="inputEmail" value="<?php print $this->session->userdata['logged_in']['name']; ?>">
                <?php } ?>
                <input required type="hidden" name="productusedtype" class="product_used_type" />
                <div class="form-group">
                    <label for="inputProductName" class="control-label col-xs-3">Product Name:</label>
                    <div class="col-xs-9">
                        <input required type="text" name="productname" class="form-control required" id="inputEmail" placeholder="Ex: Make * Type * Model">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputProductDescription" class="control-label col-xs-3">Product Description:</label>
                    <div class="col-xs-9">
                        <textarea name="productdescription" class="form-control required" rows="5" id="comment" placeholder="Description"></textarea>
                    </div>
                </div>
                <div class="main_product_category_wrapper">
                    <div class="form-group">
                        <label for="inputProductCategory" class="control-label col-xs-3">Category:</label>
                        <div class="col-xs-9">
                            <input required="true"  type="text" name="productcategory" class="form-control required" id="inputProductCategory" placeholder="Product Category">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputProductType" class="control-label col-xs-3">Type:</label>
                        <div class="col-xs-9">
                            <input required="true"  type="text" name="producttype" class="form-control required" id="inputProductType" placeholder="Product Type">

                        </div>
                    </div>
                </div>
                <div class="main_product_option_wrapper">
                    <div class="form-group">
                        <label for="inputProductUsedIn" class="control-label col-xs-3">Used In:</label>
                        <div class="col-xs-9">
                            <input  type="text" name="productusedin" class="form-control required" id="inputProductUsedIn" placeholder="Ex: Car">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputProductUsedWhere" class="control-label col-xs-3">Used Where:</label>
                        <div class="col-xs-9">
                            <input   type="text" name="productusedwhere" class="form-control required" id="inputProductUsedWhere" placeholder="Ex: In car wheel">
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label for="inputProductMake" class="control-label col-xs-3">Make:</label>
                    <div class="col-xs-9">
                        <input required="true"  type="text" name="productmake" class="form-control required" id="inputProductPrice" placeholder="Make">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputProductModel" class="control-label col-xs-3">Model:</label>
                    <div class="col-xs-9">
                        <input required="true"  type="text" name="productmodel" class="form-control required" id="inputProductPrice" placeholder="Model">
                    </div>
                </div>
                <div class="main_product_year_of_purchase">
                <div class="form-group">
                    <label for="inputPurchaseYear" class="control-label col-xs-3 year-of-purchase-label">Year of purchase:</label>
                    <div class="col-xs-3">
                        <input  type="text" name="productyear" class="form-control required" id="inputProductYear" placeholder="DD/MM/YYYY">
                    </div>
                    <label for="inputProductUses" class="control-label col-xs-2">Product Uses:</label>
                    <div class="col-xs-4 product_used_wrapper">
                        <div class="radio col-xs-5">
                            <label><input type="radio" name="productuses" class="product_used_radio" value="used">Used</label>
                        </div>
                        <div class="radio col-xs-5">
                            <label><input type="radio" value="unused" class="product_unused_radio" name="productuses">Unused</label>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                    <label for="inputProductPrice" class="control-label col-xs-3">Price:</label>
                    <div class="col-xs-9">
                        <input required="true"  type="text" name="productprice" class="form-control required" id="inputProductPrice" placeholder="Price">
                    </div>
                </div>

                <div class="form-group product_add_image_wrapper">
                    <label for="inputProductimage" class="control-label col-xs-3">Image:</label>
                    <div class="col-xs-9">
                        <div class="col-xs-4">
                            <label class="control-label product_add_image_label">Select product image 1</label>
                            <input type="file" name="productimage[]" class="custom-file filestyle"  data-icon="false">
                        </div>
                        <div class="col-xs-4">
                            <label class="control-label product_add_image_label">Select product image 2</label>
                            <input type="file"  name="productimage[]" class="custom-file-input filestyle"  data-icon="false">
                        </div>
                        <div class="col-xs-4">
                            <label class="control-label product_add_image_label">Select product image 3</label>
                            <input type="file" name="productimage[]" class="custom-file filestyle"  data-icon="false">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        <input type="submit" class="btn btn-primary" Value="Add Product">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>    