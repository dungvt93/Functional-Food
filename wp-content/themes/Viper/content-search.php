<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package web2feel
 * @since web2feel 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'web2feel' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>

	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
