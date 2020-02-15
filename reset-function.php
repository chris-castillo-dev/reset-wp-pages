
function resetPages() { 
	global $wpdb;

	$results = $wpdb->get_results("UPDATE `wp_posts` SET `post_content`='' WHERE post_type='page'");
	$results = $wpdb->get_results("SELECT ID FROM `wp_posts` WHERE post_type='page'");

	foreach( $results as $page ){
		$sql = "DELETE FROM `wp_postmeta` WHERE `meta_key` LIKE '%elementor%' AND `post_id`=" . $page->ID;
		$results2 = $wpdb->get_results($sql);
	}

}

resetPages();
