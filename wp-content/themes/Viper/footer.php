<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package web2feel
 * @since web2feel 1.0
 */
?>

</div><!-- #main .site-main -->
</div>

<div id="bottom">
<div class="container_12 cf">
	<ul>
	<?php if ( !function_exists('dynamic_sidebar')
	        || !dynamic_sidebar("Footer") ) : ?>  
	<?php endif; ?>
	</ul>
</div>
</div>

<footer id="colophon" class="site-footer" role="contentinfo">
<div class="container_6">
<div class="site-info">
		<div class="fcred">
            bestfoodhealth.com is a participant in the Amazon Services LLC Associates Program, an affiliate advertising program designed to provide a means for sites to earn advertising fees by advertising and linking to Amazon.com. Amazon, the Amazon logo, AmazonSupply, and the AmazonSupply logo are trademarks of Amazon.com, Inc. or its affiliates.
		Copyright &copy; <?php echo date('Y');?> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> - <?php bloginfo('description'); ?>.<br />
<?php fflink(); ?> | Advice for health
		</div>		
</div><!-- .site-info -->	
</footer><!-- #colophon .site-footer -->
	
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>
