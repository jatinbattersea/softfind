<div class="col-lg-3 col-md-6 mb-3">
    <div class="email-post-box post">
    <!-- imag box -->
    <div class="email-img-box post-img-box">
        <a href="<?php the_permalink(); ?>">
            <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail('full', array('class' => 'img-fluid', 'alt' => ''));
                }
            ?>
        </a>
        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="author">
            <?php echo get_avatar(get_the_author_meta('ID'), 96); ?>
        </a>
    </div>
    <!-- post-content -->
    <div class="post-content">
        <?php
            global $post;
            $categories = get_the_category($post->ID);
            $cat_link = get_category_link($categories[0]->cat_ID);
        ?>
        <a href="<?php echo $cat_link; ?>" class="tag">
            <i class="fa-solid fa-folder-open"></i>
            <?php echo $categories[0]->cat_name; ?>
        </a>
        <a href="<?php the_permalink(); ?>" class="title">
            <div>
                <?php echo wp_trim_words(get_the_title(), 9); ?>
            </div>
        </a>
    </div>
    </div>
</div>