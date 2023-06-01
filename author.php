<?php
/**
 * The template for displaying author
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package softfind
 */

get_header();

// Get the current author object
$author = get_queried_object();
?>

<main id="content" class="all-page">
        <div class="container">
            <div class="row">
                <div class="mg-blog-post-box col-md-9"> 
                    <div class="mg-header pb-0">
                        <div class="mg-blog-category"> 
                            <?php
                                if (function_exists('yoast_breadcrumb')) {
                                    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                                }
                            ?>
                        </div>
                        <h1 class="title single d-flex align-items-center">
                            <?php echo get_avatar($author->ID, null, null, $author->display_name, array('class' => array('img-fluid me-3'))); ?>
                            <?php echo $author->display_name; ?>
                        </h1>
                    </div>
                    <article class="small single">
                        <?php echo $author->description; ?>
                        <div class="clearfix mb-3"></div>
                    </article>
                </div>
                <aside class="col-md-3">
                    <?php get_sidebar();?>
                </aside>
            </div>
        </div>
        
        <div class="container" id="email">
            <div class="page-title d-flex align-items-center justify-content-center">
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-4.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-3.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-2.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-1.png" alt=""></span>
                <div><?php echo $author->display_name."'s"; ?> Post</div>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-1.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-2.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-3.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-4.png" alt=""></span>
            </div>
            <div class="row">
                <?php 
                    if ( have_posts() ) : 
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content' );
                        endwhile; 
                    endif;
                    // Previous/next page navigation.
                    the_posts_pagination(
                        array(
                            'prev_text' => __( '&laquo;', 'softfind' ),
                            'next_text' => __( '&raquo;', 'softfind' ),
                        )
                    );
                ?>
            </div>
        </div>
    </main>

<?php get_footer(); ?>
