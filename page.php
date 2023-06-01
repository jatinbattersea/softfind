<?php
/**
 * The template for displaying single pages
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
                    <div class="mg-blog-post-box"> 
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
                <?php
                    endwhile;
                    endif;
                ?>
            </div>
        </div>
    </main>

<?php get_footer(); ?>
