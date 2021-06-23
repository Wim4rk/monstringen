<?php
/**
 * Template Name: Page with sidebar
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

 get_header(); ?>

 <div class="wrap">
 	<div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">

 			<?php
 			// Start the Loop.
 			while ( have_posts() ) :
 				the_post();

 				get_template_part( 'template-parts/page/content', 'page' );

 				// If comments are open or we have at least one comment, load up the comment template.
 				if ( comments_open() || get_comments_number() ) {
 					comments_template();
 				}

 				// the_post_navigation(
 				// 	array(
 				// 		'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
 				// 		'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
 				// 	)
 				// );

 			endwhile; // End the loop.
 			?>

 		</main><!-- #main -->
 	</div><!-- #primary -->

    <aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Page Sidebar', 'monstringen' ); ?>">
    	<?php dynamic_sidebar( 'sidebar-for-page' ); ?>
    </aside><!-- #secondary -->
 </div><!-- .wrap -->

 <?php
 get_footer();
