<?php
/**
 * The template for footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package softfind
 */
?>

<button class="back-to-top d-flex align-items-center justify-content-center active">
  <i class="fa fa-arrow-up"></i>
</button>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-12 "></div>
        <div class="col-lg-8 col-md-12  ">
          <div class="footer-input text-center">
            <div>Never miss a Story</div>
            <p>Get our Weekly recap with the latest news, articles and resources.</p>
            <form action="" class="d-flex justify-content-between align-items-center">
              <input type="email" class="form-control" id="email-footer-input" placeholder="Email">
              <button type="submit" class="form-control" id="footer-btn">
                <i class="fa-solid fa-paper-plane me-2"></i>Subscribe </button>
            </form>
          </div>
        </div>
        <div class="col-lg-2 col-md-12 "></div>

        <div class="col-md-12 footer-section row pl-sm-5">
          <div class="col-lg-4 col-md-12 mb-5">
            <div class="footer-about">
              <div class="footer-title page-title d-flex justify-content-start align-items-top">
                <div class="me-lg-3">About Company</div>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-1.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-2.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-3.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-4.png" alt=""></span>
              </div>
              <p>
                Your source for the serious news. This demo is crafted specifically to exhibit the use of the theme as a news site. Visit our main page for more demos.
              </p>
              <div class="social-icons">
                <?php if (is_active_sidebar('social_icons')) { ?>
                  <?php dynamic_sidebar('social_icons'); ?>
                <?php } ?>
                <ul class="d-flex list-unstyled justify-content-start mb-0">
                  <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                  <li><a href="#" class="ms-2"><i class="fa-brands fa-twitter"></i></a></li>
                  <li><a href="#" class="ms-2"><i class="fa-brands fa-instagram"></i></a></li>
                  <li><a href="#" class="ms-2"><i class="fa-brands fa-pinterest"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-3">
            <div class="footer-dropdown-insights">
              <div class="footer-title page-title d-flex justify-content-start align-items-top">
                <div class="me-lg-3">Top Insights</div>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-1.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-2.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-3.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-4.png" alt=""></span>
              </div>
              <div>
                <select class="form-select">
                  <option selected>Select Category</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
                <ul class="list-unstyled justify-content-start mb-0 list-menu">
                  <li><a href="#">Write Review</a></li>
                  <li><a href="#">Popular Software</a></li>
                  <li><a href="#">All Software</a></li>
                  <li><a href="#">All Software</a></li>
                  <li><a href="#">Web Hosting</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-3">
            <div class="footer-post-insights">
              <div class="footer-title page-title d-flex justify-content-start align-items-top">
                <div class="me-lg-3">Top Insights</div>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-1.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-2.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-3.png" alt=""></span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-4.png" alt=""></span>
              </div>
              <div class="row">
                <?php
                    $args = array(
                        'posts_per_page' => 2,
                    );
                    $latest_post = new WP_Query($args);
                    if ($latest_post->have_posts()) :
                        while ($latest_post->have_posts()) : $latest_post->the_post();
                ?>
                  <div class="col-md-12 mb-3">
                    <div class="footer-post d-flex justify-content-start align-items-center">
                      <div class="box" style="width: 30%;">
                        <a href="<?php the_permalink() ?>" class="text-center">
                          <?php
                            if ( has_post_thumbnail() ) {
                              the_post_thumbnail('full', array('class' => 'img-fluid full-radius', 'alt' => '', 'style' => 'width: 90%'));
                            }
                          ?>
                        </a>
                      </div>
                      <div class="content-details" style="width: 70%;">
                        <a href="<?php the_permalink(); ?>">
                          <div>
                            <?php echo wp_trim_words(get_the_title(), 7); ?>
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
                <?php
                    endwhile;
                    wp_reset_postdata();
                    endif;
                ?> 
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="d-lg-flex justify-content-between container text-sm-center flex-box">
        <div class="copy-right">
          &#169; <?php echo date('Y'); ?> softfind All Rights Reserved.
        </div>
        <div class="footer-menu">
          <?php if (is_active_sidebar('foot_category')) { ?>
            <?php dynamic_sidebar('foot_category'); ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </footer>
  <!-- ======= End Footer ======= -->