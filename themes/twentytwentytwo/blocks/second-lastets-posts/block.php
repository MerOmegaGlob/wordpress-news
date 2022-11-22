<div class="wrap">
    <div class="secondary-container internal-padding">
        <?php
            $recent_posts = get_posts( 
                array(
                    'numberposts'=>2,
                    'offset'=> 3,
                    "post_status"=>'publish'
                )
            );
            foreach($recent_posts as $key=>$object){
                $feat_image = wp_get_attachment_url(get_post_thumbnail_id(
                        $object->ID),
                        'thumbnail' 
                        ); 
                ?>
                    <div class="post-<?php echo($key+4)?> post secondary-post">
                        <a href="<?php echo get_permalink($object);?>" class="to-post">
                            <div class="post-title-<?php echo($key+4) ?> post-title">
                                    <h4 class="news-title"><?php echo($object->post_title) ?></h4>
                                </div>
                            <div class="photo secondary-photo"> 
                                <img class="secondary-img" src="<?php echo $feat_image ?>" />                             
                            </div>
                        </a>
                    </div>   
                <?php
            }  
        ?>
    </div>
</div>

