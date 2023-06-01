<?php
/**
 * The template for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package softfind
 */

get_header();
?>
    <main id="content" class="all-page">
        <div class="container">
            <div class="row">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <div class="mg-blog-post-box col-md-9"> 
                        <div class="mg-header">
                            <div class="mg-blog-category"> 
                                <?php
                                    if (function_exists('yoast_breadcrumb')) {
                                        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                                    }
                                ?>
                            </div>
                            <h1 class="title single"> 
                                <?php the_title(); ?>
                            </h1>
                            <div class="media mg-info-author-block"> 
                            <a class="mg-author-pic" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"> 
                                <?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?> 
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <span>
                                        By
                                    </span>
                                    <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>">
                                        <?php the_author(); ?>
                                    </a>
                                </h4>
                                <span class="mg-blog-date">
                                    <i class="fas fa-clock"></i> 
                                    <?php echo the_modified_date('M j, Y'); ?> 
                                </span>
                            </div>
                            </div>
                        </div>
                        <?php
                            $single_show_featured_image = esc_attr(get_theme_mod('single_show_featured_image','true'));
                            if($single_show_featured_image == true) {
                                if(has_post_thumbnail()) {
                                    the_post_thumbnail( '', array( 'class'=>'img-fluid' ) );
                                } 
                            }
                        ?>
                        <article class="small single">
                            <?php echo apply_filters("the_content", get_the_content()); ?>
                            <div class="clearfix mb-3"></div>
                        </article>
                    </div>
                    <aside class="col-md-3">
                        <?php get_sidebar();?>
                    </aside>
                <?php
                    endwhile;
                    endif;
                ?>
            </div>
        </div>
        
        <div class="container" id="email">
            <div class="page-title d-flex align-items-center justify-content-center">
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-4.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-3.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-2.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-1.png" alt=""></span>
                <div>Related Post</div>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-1.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-2.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-3.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-4.png" alt=""></span>
            </div>
            <div class="row">
                <?php
                    // Get the categories of the current post
                    $categories = get_the_category();
                    
                    if ( $categories ) {
                        // Get the IDs of the categories
                        $category_ids = array();
                        foreach( $categories as $category ) {
                        $category_ids[] = $category->term_id;
                        }
                        
                        // Set up arguments for the related posts query
                        $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'category__in' => $category_ids,
                        'post__not_in' => array( get_the_ID() ),
                        'posts_per_page' => 6, // Change the number of related posts to display here
                        );
                        
                        // Run the related posts query
                        $related_posts = new WP_Query( $args );
                        
                        // Output the related posts
                        if ( $related_posts->have_posts() ) {
                            while ( $related_posts->have_posts() ) {
                                $related_posts->the_post();
                                get_template_part( 'template-parts/content' );
                            }
                        }
                        wp_reset_postdata();
                        
                        // Previous/next page navigation.
                        the_posts_pagination(
                            array(
                                'prev_text' => __( '&laquo;', 'softfind' ),
                                'next_text' => __( '&raquo;', 'softfind' ),
                            )
                        );
                    }
                ?>
            </div>
        </div>
    </main>

<?php get_footer(); ?>
