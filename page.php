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
                  <div class="dt glasses mt-md-0 mt-4">
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
                    <?php echo apply_filters("the_content", get_the_content()); ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
