<?php

// Use this shortcode in wordpress page editor [get-child-pages-list]

function get_child_pages_list_function() {
	$current_repair_page_id = get_the_ID();

	$gtchldpgsargs = array(
		'sort_column' => 'post_date',
		'sort_order' => 'DESC',
		'parent' => $current_repair_page_id,
		'post_type' => 'page',
		'post_status' => 'publish'
	); 

	$getchildpages = get_pages($gtchldpgsargs);

	$repair_child_page_cnt .='<ul class="simple">';

	foreach( $getchildpages as $getchildpages ) { 
		
		$repair_child_page_cnt .= '<li class="item-'.$getchildpages->ID.'"><a class="chilpagelink" href="'.get_permalink($getchildpages->ID).'" rel="bookmark" title="'.$getchildpages->post_title.'">'. $getchildpages->post_title .'</a></li>';
	}
		
	$repair_child_page_cnt .='</ul>';
	return $repair_child_page_cnt;
}
add_shortcode('get-child-pages-list', 'get_child_pages_list_function');
