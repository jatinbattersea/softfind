<aside>
    <div class="heading-side mb-4">
        <span>Trending <b>Articles</b></span>
    </div>
    <?php
        $s_card = 1;
        $args = array(
            'posts_per_page' => 5,
        );
        $latest_post = new WP_Query($args);
        if ($latest_post->have_posts()) :
            while ($latest_post->have_posts()) : $latest_post->the_post();
            if ($s_card === 1) {
                ?>
                    <div class="overlay-box card-shadow full-radius">
						<a href="<?php the_permalink(); ?>">
                        <div class="img-box-b full-radius">
                            <?php if (has_post_thumbnail()): ?>
                                <?= the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid']); ?>
                            <?php endif; ?>
                        </div>
						</a>
                        <div class="content px-3">
                            <div class="card-header-b">
                            <div class="cat mt-2 mb-3">
                                <?php
									global $post;
									$categories = get_the_category($post->ID);
									$cat_link = get_category_link($categories[0]->cat_ID);
									echo '<a href="'.$cat_link.'" class="">'.$categories[0]->cat_name.'</a>';
								?>
                            </div>
                            </div>
                            <div class="big-heading fs-6">
                            <a href="<?php the_permalink(); ?>">
                                <?php echo wp_trim_words(get_the_title(), 9); ?>
                            </a>
                            </div>
                        </div>
                    </div>
                <?php   
            } else {
                ?>
                    <div class="sec-7-post p-3 ps-5 mt-4 triangle mb-0">
                        <div class="number-sm"></div>
                        <span class="dt mt-1">
                            <i class="fa-solid fa-calendar-days me-2"></i> 
                            <?php echo get_the_modified_date('F j, Y'); ?>
                        </span>
                        <div class="heading-md mt-2 fs-6">
                            <a href="<?php the_permalink() ?>">
                                <?php echo wp_trim_words(get_the_title(), 7); ?>
                            </a>
                        </div>
                    </div>
                <?php
            }
            $s_card++;
            endwhile;
            wp_reset_postdata();
        endif;
    ?>
</aside>