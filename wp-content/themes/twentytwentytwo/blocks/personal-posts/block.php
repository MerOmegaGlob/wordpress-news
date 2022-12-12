
<div class="wrap-latest">
    <div class="container internal-padding">
        <?php
            $recent_posts = get_posts( 
                array(
                    'posts_per_page'=> 3,
                    "post_status"=>'publish'
                )
            );
            foreach($recent_posts as $key=>$object){
                $feat_image = wp_get_attachment_url(get_post_thumbnail_id(
                        $object->ID)
                        ); 
                ?>
                    <div class="post-<?php echo($key+1)?> post">
                        <a href="<?php echo get_permalink($object);?>" class="to-post">
                            <div class="post-title-<?php echo($key+1) ?> post-title">
                                    <h4 class="news-title"><?php echo($object->post_title) ?></h4>
                                </div>
                                <div class="excerpt-text">
                                    <p><?php echo(get_the_excerpt($object)); ?></p>
                                </div>
                            <div class="photo"> 
                                <img class="img-<?php echo($key+1) ?>" 
                                src="<?php echo $feat_image ?>" />
                            </div>
                        </a>
                    </div>   
                <?php
            }  
        ?>
    </div>
</div>

