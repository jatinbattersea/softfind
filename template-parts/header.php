  <!-- ======= Header ======= -->
  <header>
    <div class="container-fluid header" id="header">
      <span class="elipse-left elipse"></span>
      <span class="elipse-right elipse"></span>
    </div>
  </header> 
  <!-- End Header -->

  <!-- ======= Navigation ======= -->
  <nav class="navbar navbar-expand-lg" id="nav">
    <div class="container">
      <!--logo-->
      <a class="navbar-brand me-0" href="<?php echo esc_url(home_url('/')); ?>">
        <span>
            <?php
                $logo_id = get_theme_mod('custom_logo');
                if ($logo_id) {
                    $logo = wp_get_attachment_image_src($logo_id, 'full');
                    if ($logo) {
                        echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
                    }
                }
            ?>
            OFT
        </span>
        <span class="logo-span-2">FIND</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <?php
            wp_nav_menu(
                array(
                    'menu_class' => "navbar-nav mx-auto mb-2 mb-lg-0",
                    'theme_location' => "primary",
                    'container_class' => 'navbar-collapse',
                    'container' => 'ul',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'add_li_class' => 'nav-item'
                )
            );
        ?>
        <!-- <ul class="navbar-nav mx-auto mb-2 mb-lg-0" id='navList'>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="general.html">General</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="general.html">Email</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="general.html">Finance</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="general.html">Business</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="general.html">Social Media</a>
          </li>
        </ul> -->
        <div class="search-box">
          <form role="search" method="get" action="<?php echo home_url('/'); ?>">
            <button class="btn-search">
                <i class="fas fa-search"></i>
            </button>
            <input 
                type="text"
                class="input-search"
                required
                placeholder="<?php echo esc_attr_x('Enter Keywords...', 'placeholder') ?>"
                value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label') ?>" 
            />
          </form>
        </div>
      </div>
    </div>
  </nav>
  <!-- End Navigation -->

  <!-- ======= End Header ======= -->