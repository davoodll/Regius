<?php 
$wpInsertPostInstance;
$wpInsertABTestingMode;
/* Begin Assign Instance Identifier */
add_action('the_content', 'wp_insert_track_post_instance', 1);
function wp_insert_track_post_instance($content) {
	global $wpInsertPostInstance;
	if(is_main_query()) {
		if($wpInsertPostInstance == '') {
			$wpInsertPostInstance = 1;
		} else {
			$wpInsertPostInstance++;
		}
	}
	return $content;
}
/* End Assign Instance Identifier */

/* Begin Assign AB Testing Mode */
add_action('wp', 'wp_insert_track_ad_instance', 1);
function wp_insert_track_ad_instance() {
	global $wpInsertABTestingMode;
	$abtestingMode = get_option('wp_insert_abtesting_mode');
	if(isset($abtestingMode)) {
		$wpInsertABTestingMode = rand(1, floatval($abtestingMode));
	} else {
		$wpInsertABTestingMode = 1;
	}
}
/* End Assign AB Testing Mode */

/* Begin Get Current Page Type */
function wp_insert_get_page_details() {
	global $post;
	$page_details = array(
		'type' => 'POST',
		'ID' => $post->ID
	);
	if(is_home() || is_front_page()) {
		$page_details['type'] = 'HOME';
	} else if(is_category()) {
		$page_details['type'] = 'CATEGORY';
		$page_details['ID'] = get_query_var('cat');
	} else if(is_archive()) {
		$page_details['type'] = 'ARCHIVE';
	} else if(is_search()) {
		$page_details['type'] = 'SEARCH';
	} else if(is_page()) {
		$page_details['type'] = 'PAGE';
	} else if(is_single()) {
		if(is_singular('post')) {
			$page_details['type'] = 'POST';
			$page_details['categories'] = wp_get_post_categories($page_details['ID']);
		} else {
			$page_details['type'] = 'CUSTOM';
			$page_details['type_name'] = $post->post_type;
		}
	}
	
	return $page_details;
}
/* End Get Current Page Type */

/* Begin Get Ad Status */
function wp_insert_get_ad_status($rules) {
	if(!isset($rules)) { return false; }
	
	if(!$rules['status']) {
		return false;
	}
	
	if(isset($rules['rules_exclude_loggedin']) && filter_var($rules['rules_exclude_loggedin'], FILTER_VALIDATE_BOOLEAN) && is_user_logged_in()) {
		return false;
	}
	
	if($rules['rules_exclude_mobile_devices'] && wp_is_mobile()) {
		return false;
	}
	
	global $wpInsertPostInstance;
	$page_details = wp_insert_get_page_details();
	switch($page_details['type']) {
		case 'HOME':
			if(isset($rules['rules_exclude_home']) && filter_var($rules['rules_exclude_home'], FILTER_VALIDATE_BOOLEAN)) {
				return false;
			} else if(isset($rules['rules_home_instances']) && is_array($rules['rules_home_instances']) && (in_array($wpInsertPostInstance, $rules['rules_home_instances']))) {
				return false;
			}
			break;
		case 'ARCHIVE':
			if(isset($rules['rules_exclude_archives']) && filter_var($rules['rules_exclude_archives'], FILTER_VALIDATE_BOOLEAN)) {
				return false;
			} else if(isset($rules['rules_archives_instances']) && is_array($rules['rules_archives_instances']) && (in_array($wpInsertPostInstance, $rules['rules_archives_instances']))) {
				return false;
			}
			break;
		case 'SEARCH':
			if(isset($rules['rules_exclude_search']) && filter_var($rules['rules_exclude_search'], FILTER_VALIDATE_BOOLEAN)) {
				return false;
			} else if(isset($rules['rules_search_instances']) && is_array($rules['rules_search_instances']) && (in_array($wpInsertPostInstance, $rules['rules_search_instances']))) {
				return false;
			}
			break;
		case 'PAGE':
			if(isset($rules['rules_exclude_page']) && filter_var($rules['rules_exclude_page'], FILTER_VALIDATE_BOOLEAN)) {
				return false;
			} else if(isset($rules['rules_page_exceptions']) && is_array($rules['rules_page_exceptions']) && (in_array($page_details['ID'], $rules['rules_page_exceptions']))) {
				return false;
			}
			break;
		case 'POST':
			if(isset($rules['rules_exclude_post']) && filter_var($rules['rules_exclude_post'], FILTER_VALIDATE_BOOLEAN)) {
				return false;
			} else if(isset($rules['rules_post_exceptions']) && is_array($rules['rules_post_exceptions']) && (in_array($page_details['ID'], $rules['rules_post_exceptions']))) {
				return false;
			} else if(isset($rules['rules_categories_post_exceptions']) && isset($page_details['categories']) && is_array($rules['rules_categories_post_exceptions']) && is_array($page_details['categories']) && (count(array_intersect($page_details['categories'], $rules['rules_categories_post_exceptions'])) > 0)) {
				return false;
			}
			break;
		case 'CATEGORY':
			if(isset($rules['rules_exclude_categories']) && filter_var($rules['rules_exclude_categories'], FILTER_VALIDATE_BOOLEAN)) {
				return false;
			} else if(isset($rules['rules_categories_exceptions']) && is_array($rules['rules_categories_exceptions']) && (in_array($page_details['ID'], $rules['rules_categories_exceptions']))) {
				return false;
			} else if(isset($rules['rules_categories_instances']) && is_array($rules['rules_categories_instances']) && (in_array($wpInsertPostInstance, $rules['rules_categories_instances']))) {
				return false;
			}
			break;
		case 'CUSTOM':
			if(isset($rules['rules_exclude_cpt_'.$page_details['type_name']]) && filter_var($rules['rules_exclude_cpt_'.$page_details['type_name']], FILTER_VALIDATE_BOOLEAN)) {
				return false;
			}
			break;
	}
	return true;
}
/* End Get Ad Status */
?>