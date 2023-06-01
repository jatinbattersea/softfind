<?php
/**
 * The template for extension page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package softfind
 */
get_header();
?>

  <section class="top-search-banner-section">
      <div class="banner-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-img.png" alt="">
      </div>
      <div class="container">
          <div class="top-search-box mb-5 ">
              <div class="search-title">File Extensions & Guides</div>
              <p class="mt-3 mb-4">It is a Ion established fact that a reader will be distracted b the readable content.</p>
              <div class="col-lg-12">
                  <form role="search" method="get" action="<?php echo home_url('/'); ?>">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-8 col-md-7 search-form">
                          <input 
                              type="text"
                              class="form-control"
                              required
                              placeholder="<?php echo esc_attr_x('Search here...', 'placeholder') ?>"
                              value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label') ?>" 
                          />
                          <div class="col-auto">
                              <button type="submit" class="btn submit-btn"><i class="fa fa-search"></i></button>
                          </div>
                        </div>
                        
                    </div>
                  </form>
                  <div class="double-btn">
                      <a href="#" class="btn-1"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/btn-1-icon.png" alt=""> Extensions List</a>
                      <a href="#" class="btn-2"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/android-icon.png" alt=""> Extensions List</a>
                  </div>
              </div>
          </div>
          <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
      
      </div>
    </section>
    <section class="section">
      <div class="container text-center">
        <div class="page-title d-flex align-items-center justify-content-center">
            <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-4.png" alt=""></span>
            <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-3.png" alt=""></span>
            <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-2.png" alt=""></span>
            <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-1.png" alt=""></span>
              <div>File Extensions & Guides</div>
              <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-1.png" alt=""></span>
              <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-2.png" alt=""></span>
              <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-3.png" alt=""></span>
              <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/page-title-4.png" alt=""></span>
        </div>
        <p class="text-black">It is a long established fact that a reader will be distracted by the readable content Of a page when looking at its layout,</p>
      </div>
    </section>

    <section class="file-table-data">
      <div class="container">
          <div class="row mt-5">
              <div class="col-lg-4 col-md-6">
                  <div class="file-table">
                <div class="table-top">
                  Common File Types
                </div>
                <div class="table-bottom">
                  <div class="table-rtd-icon">
                      <i class="fa-regular fa-file-lines"></i>
                  </div>
                  <ul>
                      <li>Lorem Ipsum has been the industry</li>
                      <li>Lorem Ipsum has been the industry</li>
                      <li>Lorem Ipsum has been the industry</li>
                      <li>Lorem Ipsum has been the industry</li>
                      <li>Lorem Ipsum has been the industry</li>
                      <li>Lorem Ipsum has been the industry</li>
                  </ul>
                </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6">
                  <div class="file-table">
                <div class="table-top">
                  Common File Types
                </div>
                <div class="table-bottom">
                  <div class="table-rtd-icon">
                      <i class="fa-regular fa-file-lines"></i>
                  </div>
                  <ul>
                      <li>Lorem Ipsum has been the industry</li>
                      <li>Lorem Ipsum has been the industry</li>
                      <li>Lorem Ipsum has been the industry</li>
                      <li>Lorem Ipsum has been the industry</li>
                      <li>Lorem Ipsum has been the industry</li>
                      <li>Lorem Ipsum has been the industry</li>
                  </ul>
                </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6">
                  <div class="file-table">
                <div class="table-top">
                  Common File Types
                </div>
                <div class="table-bottom">
                  <div class="table-rtd-icon">
                      <i class="fa-regular fa-file-lines"></i>
                  </div>
                  <ul>
                      <li>Lorem Ipsum has been the industry</li>
                      <li>Lorem Ipsum has been the industry</li>
                      <li>Lorem Ipsum has been the industry</li>
                      <li>Lorem Ipsum has been the industry</li>
                      <li>Lorem Ipsum has been the industry</li>
                      <li>Lorem Ipsum has been the industry</li>
                  </ul>
                </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

<?php get_footer(); ?>