
<?php 
if(have_posts()){
    if(is_category($params)){
        $id = get_category(get_query_var('cat'))->cat_ID;
        $fieldTax='cat';
    }else{
        $id = get_queried_object()->term_id;
        $fieldTax='tag_id';
    }
    $args=array(
        'numberposts'=> 1,
        $fieldTax => $id,
        "post_status"=>'publish',
    );

    $recent_posts = get_posts($args)[0];
    $feat_image = wp_get_attachment_url(get_post_thumbnail_id(
        $recent_posts->ID),
        'thumbnail' 
        ); 
    ?>
    <div class="wrap">
        <a href="<?php echo get_permalink($recent_posts);?>">
            <div class="tax-container">
                <div class="post-title-category">
                    <h4 class="title-category"> 
                        <?php echo($recent_posts->post_title); ?> 
                    </h4>
                </div>
                <div class="photo">
                    <img src="<?php echo $feat_image ?>" />
                </div>
            </div>
        </a>
    </div>
    <?php
}
