<?php
function theme_guide(){
add_theme_page( 'Theme guide','Theme documentation','edit_themes', 'theme-documentation', 'fabthemes_theme_guide');
}
add_action('admin_menu', 'theme_guide');

function fabthemes_theme_guide(){
		echo '
		
<div id="welcome-panel" class="welcome-panel">

	<div class="wpbadge" style="float:left; margin-right:30px; "><img src="'. get_template_directory_uri() . '/screenshot.png" width="200" height="150" /></div>

	<div class="welcome-panel-content">
	
	<h3>Welcome to '.wp_get_theme().' WordPress theme!</h3>
	
	<p class="about-description">Viper is a free affiliate directory WordPress theme. This is a WordPress 3+ ready theme with features like custom menu, featured images, custom post type, custom taxonomy, and jQuery image slider on the custom homepage template. Theme also comes with an option panel. </p>
	
	<div class="welcome-panel-column-container">

		<div class="guide-panel-column" style="width:80%">
		<h4><span class="icon16 icon-settings"></span> Required plugins </h4>
		<p>The theme often requires few plugins to work the way it is originally intended to. You will find a notification on the admin panel prompting you to install the required plugins. Please install and activate the plugins.  </p>
		<ol>
			<li><a href="http://wordpress.org/extend/plugins/options-framework/">Options framework</a></li>
		</ol>
		</div>
	

	
		<div class="guide-panel-column" style="width:80%">
		<h4><span class="icon16 icon-settings"></span> Products listing </h4>
		<p>This theme is an affilate directory theme. This will list you affilaite products in a neat gallery form much similar to ecommerce themes. We use a custom post template called "products" to list the affiliate products. Listing a product is very similar to creating a post. You can enter the product name product details in the post editor. Add the product image as the featured image. You can add the product affilate url , a mini description and product price in the metabox section. </p>
		

		</div>
	
	
		<div class="guide-panel-column" style="width:80%">
		<h4><span class="icon16 icon-settings"></span> Custom homepage template </h4>
		<p>The theme comes with a custom homepage template. You have to use the static front page feature under the reading settings. How it can be done is explained below. </p>
		
		<ol>
			<li>Create a new page called home and give it the "homepage template" from page attributes. </li>
			<li>Create another page called blog.</li>
			<li>Go to Settings > Reading > front page displays </li>
			<li>Select Static page.</li>
			<li>Select "Home" for front page .</li>
			<li>Select "Blog" for blog page </li>
		</ol>
		
		</div>
	
	
	
		<div class="guide-panel-column" style="width:80%">
		
		<h4><span class="icon16 icon-settings"></span> Theme options explained</h4>
		<p>The theme contains an options page using which you adjust various settings available on the theme. </p>
		
		
		<p><b>Products per page: </b> You can use this option to set the number of products shown per page. This will abe applied on the homepage and product category pages </p>
		<p><b>Offer banner:</b> Enter an offer banner image url. Ths will appear on the right side of the slider. </p>
		<p><b>Slider category:</b>
		Select the product department for the slider. </p>
		<p><b>Number of slides:</b>
		Set a number for the slides </p>
		<p><b>Banner setting:</b>
		Configure the banner ads on the sidebar </p>

		</div>
	

				
		<div class="guide-panel-column" style="width:80%">
		' . file_get_contents(dirname(__FILE__) . '/FT/license-html.php') . '
		</div>
	
				
	</div>
	<p class="welcome-panel-dismiss">WordPress theme designed by <a href="http://www.fabthemes.com">FabThemes.com</a>.</p>

	</div>
	</div>
		
		';
		

}
