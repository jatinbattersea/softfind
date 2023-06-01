<div class="sidebar p-3 pb-0">
  <div class="full-wide text-center head ">
    <span class="artist uppercase sideTitle">
      RECENT POST
    </span>
  </div>
  <?php
    $args = array(
        'posts_per_page' => 5,
    );
    $latest_post = new WP_Query($args);
    if ($latest_post->have_posts()) :
        while ($latest_post->have_posts()) : $latest_post->the_post();
  ?>
  <div class="col-md-12">
    <div class="mb-4">
      <div class="card_recent_pos">
        <div class="post-photo-link mb-3">
          <a href="<?php the_permalink(); ?>">
            <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail('full', array('class' => 'img-fluid', 'alt' => ''));
                }
            ?>
          </a>
          <?php
            global $post;
            $categories = get_the_category($post->ID);
            $cat_link = get_category_link($categories[0]->cat_ID);
          ?>
          <a href="<?php echo $cat_link; ?>" class="category_link">
            <?php echo $categories[0]->cat_name; ?>
          </a>
        </div>
        <span class="text-center side-head heading">
            <a href="<?php the_permalink(); ?>" class="title">
                <?php echo wp_trim_words(get_the_title(), 9); ?>
            </a>
        </span>
        <p class="mt-1">
          <i class="fa fa-calendar me-1"></i>
          <?php echo get_the_modified_date('F j, Y'); ?>
        </p>
      </div>
    </div>
  </div>
  <?php
        endwhile;
        wp_reset_postdata();
    endif;
   ?>
</div>