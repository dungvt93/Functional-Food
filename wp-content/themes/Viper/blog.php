<?php
/**
* The template for displaying all pages.
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site will use a
* different template.
*
* @package web2feel
* @since web2feel 1.0
*/

/*
Template Name: Blog
*/

get_header(); ?>

<div id="primary" class="content-area grid_9">
    <div id="content" class="site-content " role="main">

        <?php
        $args = array('category' => 12, 'post_type' => 'post');
        $postslist = get_posts($args);
        foreach ($postslist as $post) : setup_postdata($post);
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'web2feel' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                    $thumb = get_post_thumbnail_id();
                    $img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
                    $image = aq_resize( $img_url, 180, 150, false ); //resize & crop the image
                    ?>
                    <?php if($image) : ?> <a href="<?php the_permalink(); ?>"><img src="<?php echo $image ?>"/></a> <?php endif; ?>
                    <?php the_excerpt(); ?>

                </div><!-- .entry-content -->
                </a>
            </article><!-- #post-<?php the_ID(); ?> -->
        <?php endforeach; ?>


    </div><!-- #content .site-content -->
</div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>