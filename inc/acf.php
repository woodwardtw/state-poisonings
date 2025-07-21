<?php
/**
 * ACF specific stuff
 *
 *
 * 
 *
 * @package state_poisonings
 */


function poisoning_basic_section($field_name, $h_level){
	if(isset(get_field_object($field_name)['value'])){
		$basic_obj = get_field_object($field_name);
	    $basic = $basic_obj['value'];   
	   
	    $basic_label = $basic_obj['label'];	   
	    $slug = sanitize_title($basic_label);
	    return "<div class='section' id='section-{$slug}'>
	    		<{$h_level} id='{$slug}-label'>{$basic_label}</{$h_level}>
	            {$basic}
	            </div>";   
	}	
}

function poisoning_basic_label($field_name){
	if(isset(get_field_object($field_name)['value'])){
		$basic_obj = get_field_object($field_name);
	    $basic = $basic_obj['value'];   
	   
	    $basic_label = $basic_obj['label'];	   
	    $slug = sanitize_title($basic_label);
	    return "<div class='detail' id='{$slug}'>
	    		<span id='{$slug}-label'>{$basic_label}</span>: 
	            {$basic}
	            </div>";   
	}	
}

function poisoning_taxonomy($title, $taxonomy){
	global $post;
	$terms = get_the_terms($post->ID, $taxonomy);
	if ( !empty($terms) ) :
	$output = "<h3>{$title}</h3><ul>";
	foreach( $terms as $term ) {		
		$output .= "<li>{$term->name}</li>";
	}
	$output .='</ul>';
	echo $output;
endif;
}

//save acf json
add_filter('acf/settings/save_json', 'state_poisonings_json_save_point');
 
function state_poisonings_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/acf-json'; //replace w get_stylesheet_directory() for theme
    
    
    // return
    return $path;
    
}


// load acf json
add_filter('acf/settings/load_json', 'state_poisonings_json_load_point');

function state_poisonings_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';//replace w get_stylesheet_directory() for theme
    
    
    // return
    return $paths;
    
}