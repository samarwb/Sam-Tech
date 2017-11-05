<!--       ADD PRODUCT DIALOG-->
<!-- Modal -->
<div class="modal fade" id="addProductModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ADD PRODUCT</h4>
            </div>
            <?php include 'product_add.php' ?>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--       ADD PRODUCT DIALOG-->

<!--       PLEASE LOGIN DIALOG-->
<!-- Modal -->
<div class="modal fade" id="pleasLoginButton" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">PLEASE LOGIN</h4>
            </div>
            <div class="modal-body">
                <div class="please_login_modal_text"></div><br>
                <p>Do you want to login ? </p>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="window.location = '<?php print site_url('user/login');?>';" class="btn btn-default" data-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<!--       PLEASE LOGIN DIALOG-->


<!--        Contact us Model area start -->
            <div class="modal fade" id="contactUsModel" role="dialog">
                <div class="modal-dialog modal-md">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Contact Us</h4>
                        </div>
                        <div class="modal-body">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
<!--        Contact us Model area end -->

<!--        Wishlist action Model area start -->
            <div class="modal fade" id="myWishListAction" role="dialog">
                <div class="modal-dialog modal-md">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">My Wishlist</h4>
                        </div>
                        <div class="modal-body">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
<!--        Contact us Model area end -->

<!--        Ratings Model area start -->
            <div class="modal fade" id="userReviewModel" role="dialog">
                <div class="modal-dialog modal-md">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Comment Us</h4>
                        </div>
                        <form method="POST" action="<?php Print site_url('user/usercomment');?>" >
                        <div class="modal-body">
                                <div class="form-group">
                                    <label for="sel1">Rating:</label>
                                    <select class="form-control" id="reviewRating" name="commentrating">
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                    </select>
                                 </div>
                                <div class="form-group">
                                    <label for="sel1">Would you like this item?</label>
                                    <div class="radio">
                                        <label><input type="radio" checked="checked" value="Yes" name="commentlikes" id="reviewLikeYes">Yes</label>
                                      </div>
                                      <div class="radio">
                                        <label><input type="radio" value="No" name="commentlikes" id="reviewLikeNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sel1">Would you like to recommend this item?</label>
                                    <div class="radio">
                                        <label><input type="radio" checked="checked" value="Yes" name="commentrecomend" id="reviewRecomendYes">Yes</label>
                                      </div>
                                      <div class="radio">
                                        <label><input type="radio" value="No" name="commentrecomend" id="reviewRecomendNo">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="usr">Review Title:</label>
                                  <input type="text" name="commenttitle" required="true" class="form-control required" id="reviewTitle">
                                  <input type="hidden" name="productid" class="form-control" id="reviewProductId">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Review Description:</label>
                                  <textarea name="commentdescription" class="form-control required" required="true" rows="5" id="reviewDescription" placeholder="Description"></textarea>
                                </div>
                              
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-default" value="Save" />
                            <button class="btn btn-default" value="Save" data-dismiss="modal" >Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
<!--        Ratings us Model area end -->
        
        