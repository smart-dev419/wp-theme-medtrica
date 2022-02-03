<?php

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {
	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	// echo $themename;
}



/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {	
	$options = array();
	
	$options[] = array('name' => __('Header Settings', 'options_check'), 'type' => 'heading');
	$options[] = array(
		'name' => __('Phone Number Header', 'options_check'),
		'desc' => __('Please enter Phone Number', 'options_check'),
		'id' => 'phone_num_header',
		'std' => '1 877-703-1079',
		'type' => 'text'
	);
	

	$options[] = array('name' => __('Social Links Settings', 'options_check'), 'type' => 'heading');
	$options[] = array(
		'name' => __('Twitter Link', 'options_check'),
		'desc' => __('Please enter Twitter Link', 'options_check'),
		'id' => 'twitter_link_social',
		'std' => '#',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __('Youtube Link', 'options_check'),
		'desc' => __('Please enter Twitter Link', 'options_check'),
		'id' => 'youtube_link_social',
		'std' => '#',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __('Facebook Link', 'options_check'),
		'desc' => __('Please enter Twitter Link', 'options_check'),
		'id' => 'facebook_link_social',
		'std' => '#',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __('Linkedin Link', 'options_check'),
		'desc' => __('Please enter Twitter Link', 'options_check'),
		'id' => 'linedin_link_social',
		'std' => '#',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __('Pintrest Link', 'options_check'),
		'desc' => __('Please enter Twitter Link', 'options_check'),
		'id' => 'pintrest_link_social',
		'std' => '#',
		'type' => 'text'
	);

	return $options;

}