<?php
if(!have_posts()){
    echo("<p class=\"suggest-title\">There were no results for your search, 
    but we can suggest you to read...</p>");
    echo("[smart_post_show id=\"437\"]");
    // $args=array(
    //     'numberposts'=> 3,
    //     "post_status"=>'publish',
    //     'orderby' => 'rand'
    //     );
?>
<!-- <div class="suggested-wrap">
<?php
$recent_posts = get_posts($args);
foreach($recent_posts as $key=>$object){
$feat_image = wp_get_attachment_url(get_post_thumbnail_id(
    $object->ID),
    'thumbnail' 
    ); 
?>
    <div class="wrap">
        <a href="<?php echo get_permalink($object);?>">
            <div class="tax-container">
                <div class="post-title-category">
                    <h4 class="title-category"> 
                        <?php echo($object->post_title); ?> 
                    </h4>
                </div>
                <div class="photo">
                    <img src="<?php echo $feat_image ?>" />
                </div>
            </div>
        </a>
    </div>
<?php }
}
?> 
</div> -->