<?php
/*
Plugin Name: Move Post
Plugin URI: http://nitinmaurya.com/
Description: Move posts from one category to another.
Version: 1.0
Author: Nitin Maurya
Author URI: http://nitinmaurya.com/
License: A "Slug" license name e.g. GPL2
*/
register_activation_hook(__FILE__,'move_post_install');
function move_post_install(){
	global $wp_version;
	if(version_compare($wp_version, "3.2.1", "<")) {
		deactivate_plugins(basename(__FILE__));
		wp_die("This plugin requires WordPress version 3.2.1 or higher.");
	}
}
add_action('admin_menu','move_post_menu');
    function move_post_menu(){
        add_menu_page('Move Post', 'Move Post','administrator', 'move-post.php', 'move_post_action', plugins_url('post.png', __FILE__));
   }
function move_post_action(){
	require_once('form.php');
	switch($_REQUEST[act]) {
			case "save":
				move_all_post();
				break;
			default:
				
	}
}   
   

function move_all_post(){
		if(!empty($_REQUEST['fromcategory']) && !empty($_REQUEST['tocategory'])){
			if($_REQUEST['fromcategory']<1 || $_REQUEST['tocategory']<1){
				echo '<div class="updated below-h2" id="message" style="position:relative; clear:both;"><p>Please choose category.</p></div>';
			}else{
				moveposts($_REQUEST['fromcategory'],$_REQUEST['tocategory']);
				echo '<div class="updated below-h2" id="message" style="position:relative; clear:both;"><p>Posts has been moved.</p></div>';
			}
		}
}


function moveposts($fromcategory,$tocategory){
			
				$set_cat=array($tocategory);

				$posts_array = get_posts(array('numberposts' => 10000, 'category' => $fromcategory));
				foreach($posts_array as $p_key=>$p_val){
					$category = get_the_category($p_val->ID); 
					unset ( $all_cat );
					foreach($category as $k=>$v){
						$all_cat[]=$v->cat_name;
					}
					wp_set_post_categories($p_val->ID, $set_cat );
				}

	
}


?>