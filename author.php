<?php
/**
 * The template for displaying author
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ityug247
 */

get_header();
?>
    <section class="all-page pb30">
		<div class="title-bg">
			<div class="container">
				
		
		  <div class="row">
			  <div class="title-info">
            <div class="text-center">
                <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                    }
                ?>
            </div>
            <div class="author-center">
				<div class="author-page-i">
				<?php echo get_avatar(get_the_author_meta('ID'), null, null, get_the_author(), array('class' => array('img-fluid, rounded-circle') )) ?>
				</div>
				<div class="author-page-name">
                    <?php echo get_the_author(); ?>
                </div>
			</div>
			 </div>  
        </div>
					</div>
		        </div>
      <div class="container">
      
        <div class="row">
          <div class="col-lg-1 d-md-block d-none">
            <div class="side-stick" id="social-fix">
              <ul class="mb-0 px-0 text-center">
                <li>
		            <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()) ?>" rel="nofollow" target="_blank"><i class="fa-brands fa-facebook"></i></a>
				</li>
				<li>
		            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()) ?>" rel="nofollow" target="_blank"><i class="fa-brands fa-twitter"></i></a>
				</li>
				<li>
		            <a href="https://in.pinterest.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()) ?>" rel="nofollow" target="_blank"><i class="fa-brands fa-pinterest"></i></a>
				</li>
              </ul>
              <p>
                <span class="share-text">Share</span>
              </p>
            </div>
          </div>
          <div class="col-lg-8">
            <?php echo the_author_description(); ?>
          </div>
          <div class="col-lg-3">
			 <div class="side-stick">
                <?php get_sidebar(); ?>
             </div>
		  </div>
        </div>

        <div class="left-title-sec">
            <div class="title-sec text-center">
                <span>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/four-dots.png" class="img-fluid" alt="">
                </span>
                <span class="title mx-2"><?php echo get_the_author()."'s"; ?> Post</span>
            </div>
            <div class="row after-h-space">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
                endwhile; 
                endif;
				// Previous/next page navigation.
                the_posts_pagination(
                    array(
                        'prev_text' => __( '&laquo;', 'ityug247' ),
                        'next_text' => __( '&raquo;', 'ityug247' ),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ityug247' ) . ' </span>',
                    )
                );
            ?>
            </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>
