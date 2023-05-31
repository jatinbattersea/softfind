<?php
/**
 * The template for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ityug247
 */

get_header();
?>

    <section class="all-page">
        <div class="title-bg">
            <div class="container ">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="title-info">
                <p id="breadcrumbs">
                    <?php
                        if (function_exists('yoast_breadcrumb')) {
                            yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                        }
                    ?>
                </p>
                <h1 class="mb-3"><?php echo the_title(); ?></h1>
                <hr class="gray">
                <div class="d-md-flex align-items-center">
                    <div class="auth-at auth-at-sep d-flex align-items-center me-5">
                    <div class="auth-img me-3 mt-1 ">
                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                            <?php echo get_avatar(get_the_author_meta('ID'), null, null, get_the_author(), array('class' => array('img-fluid, rounded-circle'))); ?>
                        </a>
                    </div>

                    <div class="author-info">
                        Written by
                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                            <?php echo get_the_author(); ?>
                        </a>
                    </div>
                    </div>
                    <?php
                        $fact_auth = get_post_meta(get_the_ID(), 'fact_author', true);
                        if (!empty($fact_auth)) {
                            echo get_fact_author($fact_auth);
                        }
                    ?>
                    <div class="dt glasses mt-md-0 mt-4">
                    <i class="fa-solid fa-glasses me-2"></i>
                    <?php echo calculate_reading_time(get_the_ID(), 250); ?> Read 
                    <br/> 
                    <span class="text-black">
                        Updated On <?php echo the_modified_date(); ?>
                    </span>
                    </div>
                </div>
                </div>
                <?php
                    endwhile;
                    endif;
                ?>
            </div>
        </div>
        <div class="container page-content">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-lg-9">
                    <!-- Table of Content Start -->
                    <?php echo toc_generate_table_of_contents(); ?>
                    <!-- Table of Content End -->

                    <!-- Main Content Start -->
                    <?php echo apply_filters("the_content", get_the_content()); ?>
                    <!-- Main Content End -->

                    <!-- Author Template Start -->
                    <?php echo get_author_block(); ?>
                    <!-- Author Template End -->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="left-title-sec">
                <div class="title-sec text-center">
                    <span>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/four-dots.png" class="img-fluid" alt="">
                    </span>
                    <span class="title mx-2">Related Post</span>
                </div>
                <div class="row after-h-space">
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
                                    ?>
                                        <div class="col-md-3 mb-4">
                                            <div class="hero-rgt-box box-radius">
                                                <div class="rgt-box-img sec-7-big-img">
                                                    <?php if (has_post_thumbnail()): ?>
                                                        <a href="<?php the_permalink() ?>">
                                                            <?= the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid sec-6rg-img']) ?>
                                                        </a>
                                                    <?php endif; ?>
                                                    <div class="cat sec-6-cat-ab mt-2 mb-3">
                                                        <?php
                                                            global $post;
                                                            $categories = get_the_category($post->ID);
                                                            $cat_link = get_category_link($categories[0]->cat_ID);
                                                            echo '<a href="'.$cat_link.'" class="fs-6">'.$categories[0]->cat_name.'</a>';
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="content-box triangle">
                                                    <div class="heading fs-6">
                                                        <a href="<?php the_permalink() ?>">
                                                            <?php echo wp_trim_words(get_the_title(), 9); ?>
                                                        </a>
                                                    </div>
                                                    <div class="auth-at  d-flex align-items-center mb-2">
                                                    <div class="auth-img auth-sm-img me-3 mt-1 mb-2">
                                                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                                            <?php echo get_avatar(get_the_author_meta('ID'), 96); ?>
                                                        </a>
                                                    </div>
                                                    <div class="author-info">
                                                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                                            <?php the_author(); ?>
                                                        </a>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                            wp_reset_postdata();
                            
                            // Previous/next page navigation.
                            the_posts_pagination(
                                array(
                                    'prev_text' => __( '&laquo;', 'ityug247' ),
                                    'next_text' => __( '&raquo;', 'ityug247' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ityug247' ) . ' </span>',
                                )
                            );
                        }
                        ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
