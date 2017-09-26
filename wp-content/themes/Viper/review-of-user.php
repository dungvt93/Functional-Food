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
Template Name: Review Of User
*/
get_header(); ?>

    <div id="primary" class="content-area grid_9">
        <div id="content" class="site-content " role="main">

            <?php
            $args = array('category' => 11, 'post_type' => 'post');
            $postslist = get_posts($args);
            foreach ($postslist as $post) : setup_postdata($post);
            ?>
                <?php get_template_part('content'); ?>
            <?php endforeach; ?>


        </div><!-- #content .site-content -->
    </div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>