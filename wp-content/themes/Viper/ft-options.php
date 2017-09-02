<?php
function FT_OP_update()
{
	$settings = get_option('ft_op');
	$settings['id'] = 'ft_' . FT_scope::tool()->optionsName;
	update_option('ft_op', $settings);
}

function FT_OP_options()
{
	
	// Test data
	$test_array = array("1" => "Tutorials","2" => "Posts");
	
	// Multicheck Array
	$multicheck_array = array("one" => "French Toast", "two" => "Pancake", "three" => "Omelette", "four" => "Crepe", "five" => "Waffle");
	
	// Multicheck Defaults
	$multicheck_defaults = array("one" => "1","five" => "1");
	
	// Background Defaults
	
	$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll');
	
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
/*
	// Pull all the products into an array
	$options_posts = array();  
	$options_posts_obj = get_posts(array('post_type'=> 'products', 'post_status'=> 'publish', 'suppress_filters' => false, 'posts_per_page'=>-1));
	$options_posts[''] = 'Select a department:';
	foreach ($options_posts_obj as $post) {
    	$options_posts[$post->ID] = $post->post_title;
	}
*/
			
	
	$genre_tax = array();
	$genre_args = array( 'hide_empty' => '0' );
	$genre_terms = get_terms('department', $genre_args);
	
	foreach ( $genre_terms as $genre_term) {
	    $genre_tax[$genre_term->slug] = $genre_term->slug;
	}
	$genre_tax_tmp = array_unshift($genre_tax, "Select a department:");
	
		
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_bloginfo('stylesheet_directory') . '/images/';
		
	$options = array();
	
	
	$options[] = array( "name" => "Homepage",
						"type" => "heading");	


	$options[] = array( "name" => "Products per page",
						"desc" => "Number of products per page.",
						"id" => "fabthemes_prod_number",
						"std" => "",
						"type" => "text");	

	$options[] = array( "name" => "Offer banner ",
						"desc" => "Enter the offer banner url ",
						"id" => "fabthemes_off_banner",
						"std" => "",
						"type" => "textarea");	
	

	
					
	$options[] = array( "name" => "Slider",
						"type" => "heading");	
						
						
	$options[] = array( "name" => "Slider Category",
						"desc" => "Select a category for the image slider",
						"id" => "fabthemes_slide_categories",
						"type" => "select",
						"options" => $genre_tax );						
						
	$options[] = array( "name" => "Number of slides",
						"desc" => "Enter the number of slides",
						"id" => "fabthemes_slide_number",
						"std" => "",
						"type" => "text");							
						

						

	if (file_exists(dirname(__FILE__) . '/FT/options/banners.php'))
			include ('FT/options/banners.php');

	if (file_exists(dirname(__FILE__) . '/FT/options/colors.php'))
			include ('FT/options/colors.php');

	if (file_exists(dirname(__FILE__) . '/FT/options/common.php'))
			include ('FT/options/common.php');

	return $options;
}