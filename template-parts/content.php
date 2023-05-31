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