<?php
/**
 * softfind functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package softfind
 */

  // Enqueue Stylesheets
  function ityug_theme_styles() {

    wp_enqueue_style('stylesheet-bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), '5.3.0');
    wp_enqueue_style('stylesheet-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    wp_enqueue_style('stylesheet-main', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0');
    wp_enqueue_style('stylesheet-theme', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));

  }
  add_action('wp_enqueue_scripts', 'ityug_theme_styles');

  // Enqueue Scripts
  function ityug_theme_scripts() {
    wp_enqueue_script('script-bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);
    wp_enqueue_script('script-main', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0.0', true);
  }
  add_action('wp_enqueue_scripts', 'ityug_theme_scripts');

  // Adding new features to WordPress theme 
  function ityug_theme_supports() {
    // enable the admin bar
    add_theme_support('admin-bar');

    // enable the title tag
    add_theme_support('title-tag');

    // enable post thumbnails
    add_theme_support('post-thumbnails');

    // enable HTML5 support for the search form
    add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

    // enable custom logo
    add_theme_support('custom-logo');

    // enable selective refresh for widgets in the Customizer
    add_theme_support('customize-selective-refresh-widgets');

    // enable automatic feed links
    add_theme_support('automatic-feed-links');

    // enable post formats
    add_theme_support(
      'post-formats', 
      array(
        'aside', 
        'gallery', 
        'quote', 
        'image', 
        'video'
      ));

    // enable navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'softfind'),
        'footer' => esc_html__('Footer Menu', 'softfind'),
    ));

    // enable responsive embeds
    add_theme_support('responsive-embeds');
  }
  add_action('after_setup_theme', 'ityug_theme_supports');

  // Add shortcode support to the_content
  function ityug_add_shortcode_support() {
    add_filter( 'the_content', 'do_shortcode', 11 );
  }
  add_action( 'after_setup_theme', 'ityug_add_shortcode_support' );

  // Remove the breadcrumb schema and property from the webpage schema
  add_filter( 'wpseo_schema_graph_pieces', 'remove_breadcrumbs_from_schema', 11, 2 );
  add_filter( 'wpseo_schema_webpage', 'remove_breadcrumbs_property_from_webpage', 11, 1 );

  /**
   * Removes the breadcrumb graph pieces from the schema collector.
   *
   * @param array  $pieces  The current graph pieces.
   * @param string $context The current context.
   *
   * @return array The remaining graph pieces.
   */
  function remove_breadcrumbs_from_schema( $pieces, $context ) {
      return \array_filter( $pieces, function( $piece ) {
          return ! $piece instanceof \Yoast\WP\SEO\Generators\Schema\Breadcrumb;
      } );
  }

  /**
   * Removes the breadcrumb property from the WebPage piece.
   *
   * @param array $data The WebPage's properties.
   *
   * @return array The modified WebPage properties.
   */
  function remove_breadcrumbs_property_from_webpage( $data ) {
      if (array_key_exists('breadcrumb', $data)) {
          unset($data['breadcrumb']);
      }
      return $data;
  }

  add_filter('wpseo_next_rel_link', '__return_false');
  add_filter('wpseo_prev_rel_link', '__return_false');

  add_filter( 'wpseo_breadcrumb_links', 'exclude_post_title', 10, 1 );

  function exclude_post_title( $links ) {
	if ( is_singular( 'post' ) ) {
		array_pop( $links ); // remove the second item from the array
	}
	return $links;
  }


    // Register widgets
    add_action('widgets_init', function () {
        register_sidebar(
            array(
                'id' => 'social_icons',
                'name' => __('social_icons'),
                'description' => __('social_icons'),
                'before_widget' => '<li id="%1$s" class="list-unstyled %2$s">',
                'after_widget' => "</li>",
                'before_title' => '<div class="h4 border-bottom-3 py-3 w-100">',
                'after_title' => "</div>"
            )
        );
        register_sidebar(
            array(
                'id' => 'foot_category',
                'name' => __('foot_category'),
                'description' => __('foot_category'),
                'before_widget' => '<ul id="%1$s" class="list-unstyled %2$s">',
                'after_widget' => "</ul>",
                'before_title' => null,
                'after_title' => null
            )
        );
        register_sidebar(
            array(
                'id' => 'site_about',
                'name' => __('site_about'),
                'description' => __('site_about'),
                'before_widget' => '<ul id="%1$s" class="list-unstyled %2$s">',
                'after_widget' => "</ul>",
                'before_title' => null,
                'after_title' => null
            )
        );
    });

  // Removes the filter that sanitizes HTML tags from the user bio field
  remove_filter('pre_user_description', 'wp_filter_kses');

  // Modifies the title displayed on the archive page based on the type of page being displayed
  add_filter('get_the_archive_title', function ($title) {
      if (is_category()) {
          $title = single_cat_title('', false);
      } elseif (is_tag()) {
          $title = single_tag_title('', false);
      } elseif (is_author()) {
          $title = '<span class="vcard">' . get_the_author() . '</span>';
      } elseif (is_tax()) { //for custom post types
          $title = sprintf(__('%1$s'), single_term_title('', false));
      } elseif (is_post_type_archive()) {
          $title = post_type_archive_title('', false);
      }
      return $title;
  });

  // Remove unwanted SVG filter injection in WordPress (like wp-duotone) and remove the WordPress emoji code
  function remove_unwanted_scripts() {
    remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
    remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
  }
  add_action('init', 'remove_unwanted_scripts');

  /**
     * Additional Helper Functions
  */

  // Get authors details
  function get_authors() {
    $authors = get_users(array(
        'has_published_posts' => true,
        'orderby' => 'display_name',
        'order' => 'ASC',
        'exclude' => array(1),
    ));
    
    $output = array();
    foreach ($authors as $author) {
        $author_id = $author->ID;
        $author_name = $author->display_name;
        $author_link = get_author_posts_url($author_id);
        $author_avatar = get_avatar_url($author_id);
        $author_content = get_the_author_meta('description', $author_id);
        $first_paragraph = wp_strip_all_tags( get_extended( $author_content )['main'] );
        if (!empty($author_content) && empty($first_paragraph)) {
            $first_paragraph = wp_strip_all_tags($author_content);
        }
        // $first_paragraph = wpautop( strip_tags( $author_content ) );
        // $first_paragraph = substr( $first_paragraph, 0, strpos( $first_paragraph, '</p>' ) + 4 );
        $word_count = str_word_count(strip_tags($first_paragraph));
        $social_links = array();
        
        preg_match_all('/(https?:\/\/(?:www\.)?(?:facebook|fb)\.com\/\S+)|(https?:\/\/(?:www\.)?twitter\.com\/\S+)|(https?:\/\/(?:www\.)?linkedin\.com\/\S+)|(https?:\/\/(?:www\.)?instagram\.com\/\S+)/i', $author_content, $matches);
        
        if (!empty($matches[0])) {
            foreach ($matches[0] as $match) {
                $social_links[] = $match;
            }
        }
        
        $output[] = array(
            'name' => $author_name,
            'uri' => $author_link,
            'avatar' => $author_avatar,
            'description' => ($word_count <= 9 && $word_count !== 0 ? $first_paragraph : ''),
            'social links' => array_map(function($link) {
				$network = (strpos($link, 'facebook.com') !== false) ? 'facebook' : ((strpos($link, 'twitter.com') !== false) ? 'twitter' : ((strpos($link, 'linkedin.com') !== false) ? 'linkedin' : 'instagram'));
				return array(
					'name' => $network,
					'uri' => $link
				);
			}, $social_links),
        );
    }
    
    return $output;
  }

  // Calculate estimated reading time for a post
  function calculate_reading_time( $post_id, $words_per_minute = 200 ) {
    $content = get_post_field( 'post_content', $post_id );
    $word_count = str_word_count( strip_tags( $content ) );
    $minutes = floor( $word_count / $words_per_minute );
    $seconds = floor( ( $word_count % $words_per_minute ) / ( $words_per_minute / 60 ) );
    $est = $minutes . ' minute' . ( $minutes == 1 ? '' : 's' ) . ', ' . $seconds . ' second' . ( $seconds == 1 ? '' : 's' );
    return $est;
  }

  function get_fact_author($fact_auth)
  {
    $author_nickname = explode(" ", $fact_auth)[0];
    global $wpdb;
    $author_id = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->users WHERE user_login LIKE %s", $author_nickname . '%'));

    if ($author_id) {
        return '
            <div class="auth-at d-flex align-items-center me-5 mt-md-0 mt-3">
                <div class="auth-img me-3 mt-1 ">
                    <a href="'.get_author_posts_url($author_id).'">
                        '.get_avatar($author_id, null, null, $author_nickname, array('class' => array('img-fluid, rounded-circle'))).'
                    </a>
                </div>
                <div class="author-info">Checked by
                    <a href="'.get_author_posts_url($author_id).'">
                        '.$fact_auth.'
                    </a>
                </div>
            </div>
        ';
    }
  }

  function toc_generate_table_of_contents()
  {
    global $post;

    $content = $post->post_content;

    $output = '<div class="table-of-content">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                    <p class="accordion-header" id="headingone">
                        <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse"
                        data-bs-target="#tablecollapse" aria-expanded="false" aria-controls="collapseOne">
                        ' . __('Table of Contents', 'toc') .'
                        </button>
                    </p>
                    <div id="tablecollapse" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">';
    $output .= '<ul>';

    if (preg_match_all('/<h([2-3]).*?>(.*?)<\/h\1>/', $content, $matches, PREG_SET_ORDER)) {

        $current_level = 0;
        $counter = array(0, 0, 0, 0, 0, 0);
        $sublist_open = false;

        foreach ($matches as $match) {
            $level = $match[1];
            $title = $match[2];
            $slug = sanitize_title_with_dashes($title);
            $counter[$level - 1]++;

            if ($level > $current_level) {
                if ($sublist_open) {
                    $output .= '<ol class="toc-sublist">';
                }
            } elseif ($level < $current_level) {
                for ($i = $current_level; $i > $level; $i--) {
                    $output .= '</ol>';
                    $sublist_open = false;
                }
            }
            $current_level = $level;

            $output .= '<li><a href="#' . $slug . '">' . $title . '</a></li>';

            if ($level > 1) {
                $sublist_open = true;
            }
        }

        while ($current_level > 0) {
            $output .= '</ul>';
            $current_level--;
        }
    }
    $output .= '</div>
                    </div>
                </div>
                </div>
                </div>';
    return $output;
  }

  function toc_add_to_content($content)
  {
    global $post;

    $content = preg_replace_callback('/<h([2-3]).*?>(.*?)<\/h\1>/', function ($matches) {
        $level = $matches[1];
        $title = $matches[2];
        $slug = sanitize_title_with_dashes($title);
        return "<h$level id='$slug'>$title</h$level>";
    }, $content);

    return $content;
  }

  add_filter('the_content', 'toc_add_to_content');

  function get_author_block() {

    // Get author ID
    $authorID = get_the_author_meta('ID');

    // Get author name
    $author_name = get_the_author();

    // Get author description
    $author_content = get_the_author_meta('description');

    // Get author description's first paragrapgh content
    $start = strpos($author_content, '<p>');
    $end = strpos($author_content, '</p>', $start);
    $paragraph = substr($author_content, $start, $end - $start + 4);
    $paragraph = html_entity_decode(strip_tags($paragraph));

    // Get author's social media links
    preg_match_all('/(https?:\/\/(?:www\.)?(?:facebook|fb)\.com\/\S+)|(https?:\/\/(?:www\.)?twitter\.com\/\S+)|(https?:\/\/(?:www\.)?linkedin\.com\/\S+)|(https?:\/\/(?:www\.)?instagram\.com\/\S+)/i', $author_content, $matches);

    $output = '
        <div class="written-by d-flex flex-column-reverse flex-md-row justify-content-between">
            <div class="author-info1">
              <div class="author-name">
                Author: '.$author_name.'
              </div>
              <div class="author-bio">
                '.$paragraph.'
              </div>
              <div class="author-btn">
                <a href="'.get_author_posts_url($authorID).'" class=""> 
                    Read More<i class="fa-solid fa-arrow-right-long ms-2"></i>
                </a>
              </div>
            </div>
            <div class="author-profile1 d-flex flex-md-column flex-row align-items-center">
              <div class="author-img1">
                <img src="'.get_avatar_url($authorID).'" class="img-fluid" alt="">
              </div>
              <div class="author-social-icon ms-md-0 ms-2">
                <ul>';

        // Create array of author's social media links
        if (!empty($matches[0])) {
            foreach ($matches[0] as $match) {
                $output .= '<li>
                        <a href="' . $match . '">
                            <i class="fa-brands fa-' . (strpos($match, 'facebook.com') !== false ? 'facebook-f' : (strpos($match, 'twitter.com') !== false ? 'twitter' : (strpos($match, 'linkedin.com') !== false ? 'linkedin-in' : 'instagram'))) . '" aria-hidden="true"></i>
                        </a>
                    </li>';
            }
        }

    $output .= '</ul></div></div></div>';

    return $output;
  }