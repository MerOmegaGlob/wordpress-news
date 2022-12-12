<?php
$posts_per_page = block_value('number-of-posts');
if(is_home()){
    //offset set in 5 which are the amount of posts in the initial display
    echo("[ajax_load_more post_type='post' posts_per_page=".$posts_per_page." offset='5']");
}elseif( is_category() || is_tag() ){
    $taxonnomy= is_category()?"category__and=\"".get_category(get_query_var('cat'))->cat_ID."\"":
                "tag__and=\"".get_queried_object()->term_id."\"";
    echo("[ajax_load_more post_type='post' posts_per_page=\"".$posts_per_page."\" offset='1' ".$taxonnomy."]");
}