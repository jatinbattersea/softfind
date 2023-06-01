<?php
/**
 * The template for displaying search results.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage softfind
 */

get_header();
?>
    <section class="pt30 pb-5" id="email">
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
                        'prev_text' => __( '&laquo;', 'softfind' ),
                        'next_text' => __( '&raquo;', 'softfind' ),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'softfind' ) . ' </span>',
                    )
                );

            else :
                ?>
                    <div class="not-found text-center mt50">
                        <span>Oops</span>
                        <div class="msg-text">Search Not Found!</div>
                        <p><a href="<?php echo home_url(); ?>" class="btn submit-btn">Go To Homepage</a></p>
                    </div>
                <?php
            endif;
            ?>
        </div>
      </div>
    </section>

<?php get_footer(); ?>