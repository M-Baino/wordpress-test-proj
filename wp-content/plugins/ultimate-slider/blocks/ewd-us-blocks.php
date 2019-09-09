<?php
add_filter( 'block_categories', 'ewd_us_add_block_category' );
function ewd_us_add_block_category( $categories ) {
	$categories[] = array(
		'slug'  => 'ewd-us-blocks',
		'title' => __( 'Ultimate Slider', 'ultimate-slider' ),
	);
	return $categories;
}

