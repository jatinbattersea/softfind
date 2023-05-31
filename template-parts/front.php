    <!-- ======= Hero Post ======= -->
    <section class="section" id="top-post">
        <div class="container">
            <!-- top-post -->
            <div class="row align-items-center mb-3 top-card-parent">
                <?php
                    $t_card = 1;
                    $args = array(
                        'posts_per_page' => 7,
                    );
                    $latest_post = new WP_Query($args);
                    if ($latest_post->have_posts()):
                        while ($latest_post->have_posts()):
                            $latest_post->the_post();
                            if ($t_card < 4) {
                ?>
                            <div class="col-lg-4 col-md-6 mb-3">
                                <div class="top-post-card row">
                                    <div class="col-4">
                                        <div class="image-box text-center">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php
                                                    if ( has_post_thumbnail() ) {
                                                        the_post_thumbnail('full', array('alt' => ''));
                                                    }
                                                ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="content-details">
                                            <a href="<?php the_permalink(); ?>">
                                                <div>
                                                    <?php echo wp_trim_words(get_the_title(), 9); ?>
                                                </div>
                                            </a>
                                            <div class="date">
                                                <i class="fa-solid fa-calendar-days"></i>
                                                &nbsp;&nbsp;
                                                <?php echo get_the_modified_date('F j, Y'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } elseif ($t_card === 4) {
                            ?>
                        </div>
                        <!-- bottom-post -->
                        <div class="row hero-bottom-big-post">
                            <div class="col-lg-5 col-md-12 mb-3">
                                <div class="post">
                                    <!-- imag box -->
                                    <div class="post-img-box img-box">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php
                                                if ( has_post_thumbnail() ) {
                                                    the_post_thumbnail('full', array('class' => 'img-fluid', 'alt' => ''));
                                                }
                                            ?>
                                        </a>
                                        <div class="date">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            &nbsp;&nbsp;
                                            <?php echo get_the_modified_date('F j, Y'); ?>
                                        </div>
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
                                        <p class="description">
                                            <?php echo wp_trim_words(get_the_content(), 12); ?>
                                        </p>
                                        <div class="author">
                                            <a class="image" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                                <?php echo get_avatar(get_the_author_meta('ID'), 96); ?>
                                            </a>
                                            <div class="author-details">
                                                <span>Written By</span><br>
                                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                                    <?php the_author(); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-12 hero-left-section">
                                <?php
                        } else {
                            ?>
                            <div class="col-md-12 mb-3">
                                <div class="post hero-post-left d-flex justify-content-between">
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
                                        <div class="author">
                                            <a class="image" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                                <?php echo get_avatar(get_the_author_meta('ID'), 96); ?>
                                            </a>
                                            <div class="author-details">
                                                <span>Written By</span><br>
                                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                                    <?php the_author(); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- imag box -->
                                    <div class="img-box post-img-box">
                                        <a href="#">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero-img-1.jpg" alt="" class="img-fluid">
                                        </a>
                                        <div class="date">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            &nbsp;&nbsp;
                                            <?php echo get_the_modified_date('F j, Y'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                        $t_card++;
                        endwhile;
                        wp_reset_postdata();
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= End Hero Post ======= -->

    <!-- ======= Email ======= -->
    <section class="section" id="email">
      <div class="container">
        <div class="page-title d-flex align-items-center justify-content-center">
          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/page-title-4.png" alt=""></span>
          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/page-title-3.png" alt=""></span>
          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/page-title-2.png" alt=""></span>
          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/page-title-1.png" alt=""></span>
          <div>Emails</div>
          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/page-title-1.png" alt=""></span>
          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/page-title-2.png" alt=""></span>
          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/page-title-3.png" alt=""></span>
          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/page-title-4.png" alt=""></span>
        </div>
        <div class="row">
            <?php
                $args = array(
                    'cat' => 327, // ID of the category you want to retrieve posts from
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 4 // Number of posts to retrieve
                );
                
                $query = new WP_Query($args);
                
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
            ?>
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
                    <p class="description">
                        <?php echo wp_trim_words(get_the_content(), 12); ?>
                    </p>
                </div>
                </div>
            </div>
          <?php
                }
                wp_reset_postdata();
            }
          ?>
        </div>
      </div>
    </section>
    <!-- End email -->

    <!-- ======= Poular blog ======= -->
    <section class="section" id="popular-blog">
      <div class="container">
        <div class="page-title d-flex align-items-center justify-content-center">
          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/page-title-4.png" alt=""></span>
          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/page-title-3.png" alt=""></span>
          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/page-title-2.png" alt=""></span>
          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/page-title-1.png" alt=""></span>
          <div>Poular blogs</div>
          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/page-title-1.png" alt=""></span>
          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/page-title-2.png" alt=""></span>
          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/page-title-3.png" alt=""></span>
          <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/page-title-4.png" alt=""></span>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12  mb-3 polpular-left-section">
            <div class="row">
        <?php
            $b_rows = 1;
            $args = array(
                'cat' => 707, // ID of the category you want to retrieve posts from
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 5 // Number of posts to retrieve
            );
            
            $query = new WP_Query($args);
            
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                        if ($b_rows < 4) {
        ?>
              <div class="col-md-12 mb-3">
                <div class="post popular-blog justify-content-between ">
                  <div class="row">
                    <!-- imag box -->
                    <div class="post-img-box popular-blog-img col-md-4 trinage">
                      <a href="<?php the_permalink(); ?>">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('full', array('class' => 'img-fluid', 'alt' => ''));
                        }
                        ?>
                      </a>
                    </div>
                    <!-- post-content -->
                    <div class="post-content col-md-8">
                      <div class="d-flex justify-content-between">
                        <?php
                            global $post;
                            $categories = get_the_category($post->ID);
                            $cat_link = get_category_link($categories[0]->cat_ID);
                        ?>
                        <a href="<?php echo $cat_link; ?>" class="tag">
                            <i class="fa-solid fa-folder-open"></i>
                            <?php echo $categories[0]->cat_name; ?>
                        </a>
                        <div>
                          <i class="fa-solid fa-calendar-days"></i>
                          &nbsp;&nbsp;
                          <?php echo get_the_modified_date('F j, Y'); ?>
                        </div>
                      </div>
                      <a href="<?php the_permalink(); ?>" class="title">
                        <div>
                            <?php echo wp_trim_words(get_the_title(), 9); ?>
                        </div>
                      </a>
                      <div class="d-flex justify-content-start align-items-center mb-2">
                        <div class="organge-line"></div>
                        <div class="square"><i class="fa fa-square" aria-hidden="true"></i></div>
                      </div>
                      <p class="description">
                        <?php echo wp_trim_words(get_the_content(), 12); ?>
                      </p>

                    </div>
                  </div>
                </div>
              </div>
          <?php
              if ($b_rows === 3) echo '</div></div><div class="col-lg-4 col-md-12"><div class="row">';
            } else {
                ?>
                    <div class="col-lg-12 col-md-6 mb-3">
                <div class="post popular-blog">
                  <!-- imag box -->
                  <div class="post-img-box popular-blog-img  popular-overlay">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('full', array('class' => 'img-fluid', 'alt' => ''));
                        }
                        ?>
                    </a>
                    <div class="post-overlay">
                      <!-- post-content -->
                      <div class="post-content">
                        <div class="date">
                          <i class="fa-solid fa-calendar-days"></i>
                          &nbsp;&nbsp;
                          <?php echo get_the_modified_date('F j, Y'); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="title">
                            <div>
                                <?php echo wp_trim_words(get_the_title(), 9); ?>
                            </div>
                        </a>
                      </div>
                      <div class="border"></div>
                      <div class="post-content">
                        <div class="author align-items-center">
                          <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="image">
                            <?php echo get_avatar(get_the_author_meta('ID'), 96); ?>
                            </a>
                          <div class="author-details">
                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                <?php the_author(); ?>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <?php
                        }
                    $b_rows++;
                    wp_reset_postdata();
                    }
                }
                ?>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- End Popular blog -->