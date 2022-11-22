<?php
 
/**
 
 * @package myplugin
 
 */
 
/*
 
Plugin Name: My Personal Plugin
 
Plugin URI: https://localhost/
 
Description: Plugin that sends emails to editors when there is a post that needs a review
 
Version: 4.1.7
 
Author: MerOmega
 
Author URI: https://localhost/
 
License: GPLv2 or later
 
Text Domain: localhost
 
*/


add_action("pending_post",function(){
	$args=array('role' => 'editor');
	$user_emails = wp_list_pluck( get_users($args), 'user_email' );
	$authorName = get_the_author_meta('display_name', get_current_user_id());
	$text = "There is a new post From:$authorName waiting for approval 
			\n".date('l jS \of F Y h:i:s A').".\n GBN";
	wp_mail($user_emails,'Post in review',$text);
});

add_action("publish_post",function($post_ID){
	add_post_meta($post_ID,"Published",date('l jS \of F Y h:i:s A'));
	add_post_meta(
		$post_ID,
		"Editor",
		get_the_author_meta(
			'display_name',
			 get_current_user_id())
	);
});

register_activation_hook(
	__FILE__,
	'removePerms'
);

register_deactivation_hook(
	__FILE__,
	'restorePerms'
);

function removePerms(){
	$role = get_role(  'author' );  
    // Let's add a set  of new capabilities we want Authors to have.
    $arrRmv = ['publish_posts','edit_published_posts','delete_published_posts'];
	$addCap = [];
    foreach($arrRmv as $data){
		$role->remove_cap($data);
	}
	foreach($addCap as $data){
		$role->add_cap($data);
	}
}

function restorePerms(){
	$role = get_role(  'author' );  
    $arrRmv = [];
	$addCap = ['publish_posts','edit_published_posts','delete_published_posts'];
    foreach($arrRmv as $data){
		$role->remove_cap($data);
	}
	foreach($addCap as $data){
		$role->add_cap($data);
	}
}


/*
add_action('init',function(){
	add_role("comment_moderator",__("Comment Moderator"),array(
				'read'=>true,
				 'edit_posts'=>true,
				 'edit_pages'=>false,
				 'publish_posts'=>false,
				'delete_posts'=>false,
				'edit_others_posts'=>true,
				'edit_published_posts'=>true,
				'moderate_comments'=>true,
		));
});
*/