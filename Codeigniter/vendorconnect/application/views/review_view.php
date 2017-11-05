<div class="commentreview">
    <?php
    if (isset($product_ratings) && count($product_ratings)>0) {
        foreach ($product_ratings as $ratings) {
            $rating_value = ($ratings->ratings);
            ?>
            <div id="0156793e564500004d7848a0fff8da95_reviewDiv" class="commentlist first jsUserAction" id="customer_review_wrapper">
                <div class="userimg">
                    <div class="review_user_profile_image">
                        <img src="<?php print base_url() . '/images/users/user_default_small.png' ?>" class="img-responsive" alt="User Profile" width="80" height="80"> 
                    </div>
                    <div class=" _reviewUserName"><?php print $ratings->name; ?></div>
                </div>
                <div class="text review_text">
                    <div class="user-review">
                        <div class="user_ratings_wrapper">
                            <div class="rating">
                                <div class="grey-stars"></div>
                                <div class="filled-stars" style="width:<?php print ($ratings->ratings * 20) . '%'; ?>"></div>
                            </div>
                        </div>
                        <div class="head"><?php print $ratings->comment_title; ?></div>
                        <div class="_reviewUserName"> <?php print 'by ' . $ratings->name . ' on ' . date('d M Y', $ratings->modified); ?> </div>
                        <p><?php print $ratings->comment_body; ?> </p>
                    </div>
                    <div class="LTgray grey-div hf-review">
                        <?php ($ratings->likes == 'Yes') ? print 'I liked this product.'  : print 'I didn\'t like this product.'; ?>
                    </div>
                    <div class="LTgray grey-div hf-review">
        <?php ($ratings->recommend == 'Yes') ? print 'I would recomend this product.'  : print 'I would not recommend this product.'; ?>
                    </div>
                </div>
            </div>
    <?php }
} else { ?>
        <div class="userimg">
            <?php $message = (arg(2)=='userreviewajax')? 'No review found.' : 'Be the first one to give review.';?>
            <div class="_reviewUserName"><?php Print $message;?></div>
        </div>
<?php } ?>
</div>