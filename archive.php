<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage ityug247
 */

get_header();
?>
    <section class="pt30 left-title-sec">
      <div class="container">
        <div>
            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                }
            ?>
        </div>
        <?php if ( have_posts() ) : ?>
        <div class="row after-h-space pb-5">
            <?php
                // Start the Loop.
                while ( have_posts() ) :
                    the_post();

                    /*
                    * Include the Post-Type-specific template for the content.
                    * If you want to override this in a child theme, then include a file
                    * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                    */
                    get_template_part( 'template-parts/content', get_post_type() );
                    
                    // End the loop.
                endwhile;

                // Previous/next page navigation.
                the_posts_pagination(
                    array(
                        'prev_text' => __( '&laquo;', 'ityug247' ),
                        'next_text' => __( '&raquo;', 'ityug247' ),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ityug247' ) . ' </span>',
                    )
                );

            else :
                // If no content, include the "No posts found" template.
                echo wpautop( 'Sorry, No post were found' );
            endif;
            ?>
        </div>
      </div>
    </section>

<?php get_footer(); ?>
