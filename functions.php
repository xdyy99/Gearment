
<?php

/**
  @DEFINE DIR
 **/

define('THEME_URL', get_stylesheet_directory());
define('THEME_DIC',  get_stylesheet_directory_uri());
define('CORE', THEME_URL . '/core');
define('ASSETS', THEME_DIC . '/assets');

define('TEMPLATE_DIC', THEME_DIC . 'template-parts/alignvn');


/**
  @ Load file /core/init.php
 **/


require_once(CORE . '/init.php');


/**
 @ Define align theme setup funtion
 **/
if (!function_exists('alignvn_theme_setup')) {
  function alignvn_theme_setup()
  {
    $language_folder = THEME_URL . '/language';
    load_theme_textdomain('alignvn', $language_folder);

    add_theme_support('menus');
    add_theme_support('widgets');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('align-wide');
    add_theme_support('core-block-patterns');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
  };

  add_action('init', 'alignvn_theme_setup');
}
require_once(CORE . '/customizer.php');


function align_register_menu()
{
  register_nav_menus(
    [
      'primary-menu' => __('Main Menu', 'align'),
      'blog-menu' => __('Blog menu', 'align'),
    ]
  );
}
add_action('after_setup_theme', 'align_register_menu');

add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects($items, $args)
{

  // loop
  foreach ($items as &$item) {

    // vars
    $icon = get_field('icon', $item);


    // append icon
    if ($icon) {
      $item->title .= ' <img src="' . $icon . '" alt=""/>';
    }
  }


  // return
  return $items;
}

/**
 *  Adding library
 */
// load css into the website's front-end
// function alignvn_style()
// {
//   // Adding Style
//   wp_enqueue_style('gearment_addiction_styles', ASSETS . "/css/addiction-style.css", 'all');
// }
// add_action('wp_enqueue_scripts', 'alignvn_style');

function add_ajax_actions()
{
  //add_action('wp_ajax_nopriv_getting_product_from_api', 'getting_products_from_api');
  //add_action('wp_ajax_getting_product_from_api', 'getting_products_from_api');

  add_action('wp_ajax_nopriv_getting_product_from_json', 'getting_products_from_json');
  add_action('wp_ajax_getting_product_from_json', 'getting_products_from_json');
}
add_action('admin_init', 'add_ajax_actions');


/* 
/* This is function to get product from API

function getting_products_from_api()
{
  //Getting data from API
  $curl = curl_init();
  $products = [];

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://account.gearment.com/api/v2/?act=products',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_POSTFIELDS => '{
    "api_key":"MjpUEYzTtznWAuZn",
    "api_signature":"4R6Y7stMOUtCnDQsVURIyUQyr8PzSYG4",
    "type": "all",
      "limit": 250,
      "page": 1
  }',
    CURLOPT_HTTPHEADER => array(
      'Content-Transfer-Encoding: application/json'
    ),
  ));

  $response = curl_exec($curl);


  $file = THEME_URL . '/assets/products_1.txt';

  curl_close($curl);


  //Checking API Result
  $results = json_decode($response);
  $products[] = $results->result;

  file_put_contents($file, $response, FILE_APPEND);

  /*
  foreach ($products[0] as $product) {
    $product_slug = slugify($product->product_name . '-' . $product->product_id);

    $existing_product = get_page_by_path($product_slug, 'OBJECT', 'product');

    if ($existing_product === null) {

      $inserted_product = wp_insert_post([
        'post_name' => $product_slug,
        'post_title' => $product_slug,
        'post_type' => 'product',
        'post_status' => 'publish'
      ]);

      if (is_wp_error($inserted_product) || $inserted_product === 0) {
        die('Could not insert brewery: ' . $product_slug);
        error_log('Could not insert product: ' . $inserted_product);
        continue;
      }

      $fillableproduct = [
        'field_62d92cea64215' => 'product_name',
        'field_62d92cf264216' => 'product_img',
        'field_62d92d0e64217' => 'print_areas'
      ];

      foreach ($fillableproduct as $key => $name) {
        update_field($key, $product->$name, $inserted_product);
      }

      //Getting product variants
      $variants = $product->variants;
      $variants_key = 'field_62d92d6d64218';

      foreach ($variants as $variant) {
        $repeatervalues = [
          'field_62d92d8464219' => $variant->name,
          'field_62d92f4091ce1' => $variant->color,
          'field_62d92f4c91ce2' => $variant->size,
          'field_62d92f5491ce3' => $variant->hex_color_code,
          'field_62d92f5f91ce4' => $variant->price,
          'field_62d92f6891ce5' => $variant->net_price,
          'field_62d92f7991ce6' => $variant->availability_status
        ];
        add_row($variants_key, $repeatervalues, $inserted_product);
        //echo $variant->name;
      }
    } else {
      $existing_product_id = $existing_product->ID;


      $fillableproduct = [
        'field_62d92cea64215' => 'product_name',
        'field_62d92cf264216' => 'product_img',
        'field_62d92d0e64217' => 'print_areas'
      ];

      foreach ($fillableproduct as $key => $name) {
        update_field($name, $product->$name, $existing_product_id);
      }
      //Getting product variants
      $variants = $product->variants;
      $variants_key = 'field_62d92d6d64218';

      foreach ($variants as $variant) {
        $repeatervalues = [
          'field_62d92d8464219' => $variant->name,
          'field_62d92f4091ce1' => $variant->color,
          'field_62d92f4c91ce2' => $variant->size,
          'field_62d92f5491ce3' => $variant->hex_color_code,
          'field_62d92f5f91ce4' => $variant->price,
          'field_62d92f6891ce5' => $variant->net_price,
          'field_62d92f7991ce6' => $variant->availability_status
        ];
        add_row($variants_key, $repeatervalues, $existing_product_id);
      }
    }
  }

  foreach ($products[0] as $product) {
    //print_r($product->variants);
    $productvariants = $product->variants;


    $product_slug = slugify($product->product_name . '-' . $product->product_id);
    //$existing_product = get_page_by_path($product_slug, 'OBJECT', 'product');


    foreach ($productvariants as $productvariant) {
      echo $productvariant->name . "<br>";
    }

    $inserted_product = wp_insert_post([
      'post_name' => $product_slug,
      'post_title' => $product_slug,
      'post_type' => 'product',
      'post_status' => 'publish'
    ]);

    if (is_wp_error($inserted_product) || $inserted_product === 0) {
      continue;
    }

    $fillableproduct = [
      'field_62d92cea64215' => 'product_name',
      'field_62d92cf264216' => 'product_img',
      'field_62d92d0e64217' => 'print_areas'
    ];

    foreach ($fillableproduct as $key => $name) {
      update_field($key, $product->$name, $inserted_product);
    }

    //Getting product variants
    $variants = $product->variants;
    $variants_key = 'field_62d92d6d64218';

    foreach ($variants as $variant) {
      $repeatervalues = [
        'field_62d92d8464219' => $variant->name,
        'field_62d92f4091ce1' => $variant->color,
        'field_62d92f4c91ce2' => $variant->size,
        'field_62d92f5491ce3' => $variant->hex_color_code,
        'field_62d92f5f91ce4' => $variant->price,
        'field_62d92f6891ce5' => $variant->net_price,
        'field_62d92f7991ce6' => $variant->availability_status
      ];
      add_row($variants_key, $repeatervalues, $inserted_product);
      //echo $variant->name;
    }
  }
}*/

//Create slug path for products
function slugify($text)
{

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

/* 
/* This is function to get product from JSON file */

function getting_products_from_json()
{
  $url = ASSETS . '/json/GM_products_revised.json';

  $json = file_get_contents($url);
  $results = json_decode($json);
  //var_dump($results);

  foreach ($results as $product) {
    $product_slug = $product->ProductName . '-' . $product->ProductID;
    $existing_product = get_page_by_path($product_slug, 'OBJECT', 'product');

    if ($existing_product === null) {
      $inserted_product = wp_insert_post([
        'post_name' => $product_slug,
        'post_title' => $product_slug,
        'post_type' => 'product',
        'post_status' => 'publish'
      ]);

      $fillableproduct = [
        'field_62e11116f0ae8' => 'ProductID',
        'field_62d92cea64215' => 'ProductName',
        'field_62e110014521e' => 'ProductSku',
        'field_62e10fda4521b' => 'Description',
        'field_62e10feb4521c' => 'ProductImgFront',
        'field_62e10ff84521d' => 'ProductImgBack',
        'field_62e1100a4521f' => 'ProductType',
        'field_62e1104345221' => 'PrintType',
        'field_62e1104d45222' => 'Brands',
        'field_62e1106745223' => 'Gender',
        'field_62e1107145224' => 'ProductPrice',
        'field_62e1107d45225' => 'ProductPricePremium',
        'field_62e1192f42351' => 'ProductCategory ',
        'field_62e10feb4521c' => 'ProductImgFront',
        'field_62e10ff84521d' => 'ProductImgBack',
      ];
      $fillableproductArr = [
        'field_62e1102d45220' => 'PrintAreas',
        'field_62e1159a168c8' => 'ProductSize',
        'field_62e115a4168c9' => 'ProductColor',
        'field_62e115ab168ca' => 'ProductHexColor',
      ];
      /*
      $fillableproductimage = [
        'field_62e10feb4521c' => 'ProductImgFront',
        'field_62e10ff84521d' => 'ProductImgBack',
      ];

      foreach ($fillableproductimage as $key => $name) {
        $value = media_sideload_image($product->$name, $return_type = 'html');
        var_dump($value);
        update_field($key, $value, $inserted_product);
      }
*/
      foreach ($fillableproduct as $key => $name) {
        update_field($key, $product->$name, $inserted_product);
      }
      foreach ($fillableproductArr as $key => $name) {
        $value =  explode(",", $product->$name);
        update_field($key, $value, $inserted_product);
      }
    } else {
      $existing_product_id = $existing_product->ID;
      $fillableproduct = [
        'field_62e11116f0ae8' => 'ProductID',
        'field_62d92cea64215' => 'ProductName',
        'field_62e110014521e' => 'ProductSku',
        'field_62e10fda4521b' => 'Description',
        'field_62e1100a4521f' => 'ProductType',
        'field_62e1104345221' => 'PrintType',
        'field_62e1104d45222' => 'Brands',
        'field_62e1106745223' => 'Gender',
        'field_62e1107145224' => 'ProductPrice',
        'field_62e1107d45225' => 'ProductPricePremium',
        'field_62e1192f42351' => 'ProductCategory ',
        'field_62e10feb4521c' => 'ProductImgFront',
        'field_62e10ff84521d' => 'ProductImgBack',
      ];
      $fillableproductArr = [
        'field_62e1102d45220' => 'PrintAreas',
        'field_62e1159a168c8' => 'ProductSize',
        'field_62e115a4168c9' => 'ProductColor',
        'field_62e115ab168ca' => 'ProductHexColor',
      ];
      /*
      $fillableproductimage = [
        'field_62e10feb4521c' => 'ProductImgFront',
        'field_62e10ff84521d' => 'ProductImgBack',
      ];

      foreach ($fillableproductimage as $key => $name) {
        //$value = urlencode($product->$name);
        $value = media_sideload_image($product->$name, $return_type = 'html');
        //var_dump($value);
        update_field($key, $value, $existing_product_id);
      }*/
      foreach ($fillableproduct as $key => $name) {
        update_field($key, $product->$name, $existing_product_id);
      }
      foreach ($fillableproductArr as $key => $name) {
        $value = explode(",", $product->$name);
        update_field($key, $value, $existing_product_id);
      }
    }
  }
}
function my_update_attachment($f, $pid, $t = '', $c = '')
{
  wp_update_attachment_metadata($pid, $f);
  if (!empty($_FILES[$f]['name'])) { //New upload
    require_once(ABSPATH . 'wp-admin/includes/file.php');

    $override['action'] = 'editpost';
    $file = wp_handle_upload($_FILES[$f], $override);

    if (isset($file['error'])) {
      return new WP_Error('upload_error', $file['error']);
    }

    $file_type = wp_check_filetype($_FILES[$f]['name'], array(
      'jpg|jpeg' => 'image/jpeg',
      'gif' => 'image/gif',
      'png' => 'image/png',
    ));
    if ($file_type['type']) {
      $name_parts = pathinfo($file['file']);
      $name = $file['filename'];
      $type = $file['type'];
      $title = $t ? $t : $name;
      $content = $c;

      $attachment = array(
        'post_title' => $title,
        'post_type' => 'attachment',
        'post_content' => $content,
        'post_parent' => $pid,
        'post_mime_type' => $type,
        'guid' => $file['url'],
      );

      foreach (get_intermediate_image_sizes() as $s) {
        $sizes[$s] = array('width' => '', 'height' => '', 'crop' => true);
        $sizes[$s]['width'] = get_option("{$s}_size_w"); // For default sizes set in options
        $sizes[$s]['height'] = get_option("{$s}_size_h"); // For default sizes set in options
        $sizes[$s]['crop'] = get_option("{$s}_crop"); // For default sizes set in options
      }

      $sizes = apply_filters('intermediate_image_sizes_advanced', $sizes);

      foreach ($sizes as $size => $size_data) {
        $resized = image_make_intermediate_size($file['file'], $size_data['width'], $size_data['height'], $size_data['crop']);
        if ($resized)
          $metadata['sizes'][$size] = $resized;
      }

      $attach_id = wp_insert_attachment($attachment, $file['file'] /*, $pid - for post_thumbnails*/);

      if (!is_wp_error($id)) {
        $attach_meta = wp_generate_attachment_metadata($attach_id, $file['file']);
        wp_update_attachment_metadata($attach_id, $attach_meta);
      }

      return array(
        'pid' => $pid,
        'url' => $file['url'],
        'file' => $file,
        'attach_id' => $attach_id
      );
      // update_post_meta( $pid, 'a_image', $file['url'] );
    }
  }
}

function testing_products()
{
  $url = ASSETS . '/json/GM_products_revised.json';

  $json = file_get_contents($url);
  $results = json_decode($json);

  var_dump($results[0]);
}


function update_image()
{
  update_field('field_62e10feb4521c', 'http://gearment.local/wp-content/uploads/2022/07/color_changing_mug_11oz_front.png', 776);
}


function productImgUrl()
{
  $val = get_field('product_image_front');
  echo "<img src=$val>";
}
add_shortcode('productImg', 'productImgUrl');



/*
* Creating a function to create our CPT
*/

function custom_post_type()
{
  // Set UI labels for Custom Post Type
  $labels = array(
    'name'                => __('Policies'),
    'singular_name'       => __('Policies'),
    'menu_name'           => __('Policies'),
    'all_items'           => __('All policies'),
    'view_item'           => __('View policy'),
    'add_new'             => __('Add new'),
    'add_new_item'        => __('Add new policy'),
    'edit_item'           => __('Edit policy'),
    'update_item'         => __('Update policy'),
    'search_items'        => __('Search policy'),
  );
  // Set other options for Custom Post Type
  $args = array(
    'label'               => __('policies'),
    'labels'              => $labels,
    'description'         => 'Create and edit policy posts',
    // Features this CPT supports in Post Editor
    'supports'            => array('title', 'editor', 'excerpt', 'comments', 'revisions', 'custom-fields',),
    // You can associate this CPT with a taxonomy or custom taxonomy. 
    'taxonomies'          => array('policies'),
    /* A hierarchical CPT is like Pages and can have
          * Parent and child items. A non-hierarchical CPT
          * is like Posts.
          */
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-text-page',
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
    'show_in_rest' => true,
    'rewrite' => array(
      'slug' => 'policies',
      'with_front' => true
    ),

  );
  // Registering your Custom Post Type
  register_post_type('policies', $args);

  // Set UI labels for Custom Post Type
  $labels2 = array(
    'name'                => __('Integration'),
    'singular_name'       => __('Integration'),
    'menu_name'           => __('Integration'),
    'all_items'           => __('All Integrations'),
    'view_item'           => __('View integration'),
    'add_new'             => __('Add new'),
    'add_new_item'        => __('Add new integration'),
    'edit_item'           => __('Edit integration'),
    'update_item'         => __('Update integration'),
    'search_items'        => __('Search integration'),
  );
  // Set other options for Custom Post Type
  $args2 = array(
    'label'               => __('intergration'),
    'labels'              => $labels2,
    'description'         => 'Create and edit integration pages',
    // Features this CPT supports in Post Editor
    'supports'            => array('title', 'editor', 'excerpt', 'comments', 'revisions', 'custom-fields',),
    // You can associate this CPT with a taxonomy or custom taxonomy. 
    'taxonomies'          => array('integration'),
    /* A hierarchical CPT is like Pages and can have
          * Parent and child items. A non-hierarchical CPT
          * is like Posts.
          */
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-groups',
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
    'show_in_rest' => true,
    'rewrite' => array(
      'slug' => 'integrations',
      'with_front' => true
    ),

  );
  // Registering your Custom Post Type
  register_post_type('intergration', $args2);
}

/* Hook into the 'init' action so that the function
  * Containing our post type registration is not 
  * unnecessarily executed. 
  */

add_action('init', 'custom_post_type', 0);

/*
 * Function for post duplication. Dups appear as drafts. User is redirected to the edit screen
 */
function rd_duplicate_post_as_draft()
{
  global $wpdb;
  if (!(isset($_GET['post']) || isset($_POST['post'])  || (isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action']))) {
    wp_die('No post to duplicate has been supplied!');
  }
  /*
   * Nonce verification
   */
  if (!isset($_GET['duplicate_nonce']) || !wp_verify_nonce($_GET['duplicate_nonce'], basename(__FILE__)))
    return;
  /*
   * get the original post id
   */
  $post_id = (isset($_GET['post']) ? absint($_GET['post']) : absint($_POST['post']));
  /*
   * and all the original post data then
   */
  $post = get_post($post_id);
  /*
   * if you don't want current user to be the new post author,
   * then change next couple of lines to this: $new_post_author = $post->post_author;
   */
  $current_user = wp_get_current_user();
  $new_post_author = $current_user->ID;
  /*
   * if post data exists, create the post duplicate
   */
  if (isset($post) && $post != null) {
    /*
     * new post data array
     */
    $args = array(
      'comment_status' => $post->comment_status,
      'ping_status'    => $post->ping_status,
      'post_author'    => $new_post_author,
      'post_content'   => $post->post_content,
      'post_excerpt'   => $post->post_excerpt,
      'post_name'      => $post->post_name,
      'post_parent'    => $post->post_parent,
      'post_password'  => $post->post_password,
      'post_status'    => 'draft',
      'post_title'     => $post->post_title,
      'post_type'      => $post->post_type,
      'to_ping'        => $post->to_ping,
      'menu_order'     => $post->menu_order
    );
    /*
     * insert the post by wp_insert_post() function
     */
    $new_post_id = wp_insert_post($args);
    /*
     * get all current post terms ad set them to the new post draft
     */
    $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
    foreach ($taxonomies as $taxonomy) {
      $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
      wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
    }
    /*
     * duplicate all post meta just in two SQL queries
     */
    $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
    if (count($post_meta_infos) != 0) {
      $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
      foreach ($post_meta_infos as $meta_info) {
        $meta_key = $meta_info->meta_key;
        if ($meta_key == '_wp_old_slug') continue;
        $meta_value = addslashes($meta_info->meta_value);
        $sql_query_sel[] = "SELECT $new_post_id, '$meta_key', '$meta_value'";
      }
      $sql_query .= implode(" UNION ALL ", $sql_query_sel);
      $wpdb->query($sql_query);
    }
    /*
     * finally, redirect to the edit post screen for the new draft
     */
    wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
    exit;
  } else {
    wp_die('Post creation failed, could not find original post: ' . $post_id);
  }
}
add_action('admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft');
/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link($actions, $post)
{
  if (current_user_can('edit_posts')) {
    $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce') . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
  }
  return $actions;
}
add_filter('post_row_actions', 'rd_duplicate_post_link', 10, 2);
add_filter('page_row_actions', 'rd_duplicate_post_link', 10, 2);


add_action('widgets_init', 'align_register_sidebars');
function align_register_sidebars()
{
  register_sidebar(array(
    'id' => 'header-button',
    'name' => __('Header button'),
    'description' => __('Edit header button', 'Align sidebar'),
  ));
  register_sidebar(array(
    'id' => 'policies-menu',
    'name' => __('Policies menu'),
    'description' => __('Edit menu for policies page.', 'Align sidebar'),
  ));
  register_sidebar(array(
    'id' => 'feature-sidebar',
    'name' => __('Feature sidebar'),
    'description' => __('Edit feature sidebar.', 'Align sidebar'),
  ));
  register_sidebar(array(
    'id' => 'finance-section',
    'name' => __('Finance section'),
    'description' => __('Edit finance section.', 'Align sidebar'),
  ));
  register_sidebar(array(
    'id' => 'footer-col-1',
    'name' => __('Footer column 1'),
    'description' => __('The 1st footer column.', 'Align sidebar'),
    'class' => 'footer-list',
    'before_title' => '<h3 class="footer-title">',
    'after_title' => '</h3>',
  ));
  register_sidebar(array(
    'id' => 'footer-col-2',
    'name' => __('Footer column 2'),
    'description' => __('The 2nd footer column.', 'Align sidebar'),
    'class' => 'footer-list',
    'before_title' => '<h3 class="footer-title">',
    'after_title' => '</h3>',
    'before_widget' => '<div class="footer-list">',
    'after_widget' => '</div>',
  ));
  register_sidebar(array(
    'id' => 'footer-col-3',
    'name' => __('Footer column 3'),
    'description' => __('The 3rd footer column.', 'Align sidebar'),
    'class' => 'footer-list',
    'before_title' => '<h3 class="footer-title">',
    'after_title' => '</h3>',
    'before_widget' => '<div class="footer-list">',
    'after_widget' => '</div>',
  ));
  register_sidebar(array(
    'id' => 'footer-col-4',
    'name' => __('Footer column 4'),
    'description' => __('The 4th footer column.', 'Align sidebar'),
    'class' => 'footer-list',
    'before_title' => '<h3 class="footer-title">',
    'after_title' => '</h3>',
    'before_widget' => '<div class="footer-list">',
    'after_widget' => '</div>',
  ));
  register_sidebar(array(
    'id' => 'footer-col-5',
    'name' => __('Footer column 5'),
    'description' => __('The 5th footer column.', 'Align sidebar'),
    'class' => 'footer-list',
    'before_title' => '<h3 class="footer-title">',
    'after_title' => '</h3>',
    'before_widget' => '<div class="footer-list">',
    'after_widget' => '</div>',
  ));
  register_sidebar(array(
    'id' => 'footer-social',
    'name' => __('Footer social list'),
    'description' => __('Edit footer social list.', 'Align sidebar'),
    'class' => 'footer-social',
  ));
  register_sidebar(array(
    'id' => 'footer-policy',
    'name' => __('Footer policy field'),
    'description' => __('The footer policy field.', 'Align sidebar'),
  ));
}


// GUTENBERG BLOCKS //
add_action('acf/init', 'align_blocks');
function align_blocks()
{
  // Check function exists.
  if (function_exists('acf_register_block_type')) {
    // register new block.
    acf_register_block_type(array(
      'name'              => 'Banner',
      'title'             => __('Align banner'),
      'description'       => __('Align banner block'),
      'render_template'   => 'template-blocks/banner.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align banner', 'banner'),
    ));
    acf_register_block_type(array(
      'name'              => 'Connect',
      'title'             => __('Align connect'),
      'description'       => __('Align connect block'),
      'render_template'   => 'template-blocks/connect.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align connect', 'connect'),
    ));
    acf_register_block_type(array(
      'name'              => 'Design',
      'title'             => __('Align design'),
      'description'       => __('Align design block'),
      'render_template'   => 'template-blocks/design.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align design', 'design'),
    ));
    acf_register_block_type(array(
      'name'              => 'Earn',
      'title'             => __('Align earn'),
      'description'       => __('Align earn block'),
      'render_template'   => 'template-blocks/earn.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align earn', 'earn'),
    ));
    acf_register_block_type(array(
      'name'              => 'Explore',
      'title'             => __('Align explore'),
      'description'       => __('Align explore block'),
      'render_template'   => 'template-blocks/explore.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align explore', 'explore'),
    ));
    acf_register_block_type(array(
      'name'              => 'Financial',
      'title'             => __('Align financial'),
      'description'       => __('Align financial block'),
      'render_template'   => 'template-blocks/financial.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align financial', 'financial'),
    ));
    acf_register_block_type(array(
      'name'              => 'Hero',
      'title'             => __('Align hero'),
      'description'       => __('Align hero block'),
      'render_template'   => 'template-blocks/hero.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align hero', 'hero'),
    ));
    acf_register_block_type(array(
      'name'              => 'Intergration',
      'title'             => __('Align intergration'),
      'description'       => __('Align intergration block'),
      'render_template'   => 'template-blocks/intergration.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align intergration', 'intergration'),
    ));
    acf_register_block_type(array(
      'name'              => 'Intro',
      'title'             => __('Align intro'),
      'description'       => __('Align intro block'),
      'render_template'   => 'template-blocks/intro.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align intro', 'intro'),
    ));
    acf_register_block_type(array(
      'name'              => 'Map',
      'title'             => __('Align map'),
      'description'       => __('Align map block'),
      'render_template'   => 'template-blocks/map.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align map', 'map'),
    ));
    acf_register_block_type(array(
      'name'              => 'Mockup',
      'title'             => __('Align mockup'),
      'description'       => __('Align mockup'),
      'render_template'   => 'template-blocks/mockup.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align mockup', 'mockup'),
    ));
    acf_register_block_type(array(
      'name'              => 'Policies',
      'title'             => __('Align policies'),
      'description'       => __('Align policies block'),
      'render_template'   => 'template-blocks/policies.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align policies', 'policies'),
    ));
    acf_register_block_type(array(
      'name'              => 'Step-grid',
      'title'             => __('Align step grid'),
      'description'       => __('Align step grid block'),
      'render_template'   => 'template-blocks/step-grid.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align step grid', 'step grid'),
    ));
    acf_register_block_type(array(
      'name'              => 'Step-row',
      'title'             => __('Align step row'),
      'description'       => __('Align step row block'),
      'render_template'   => 'template-blocks/step-row.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align step row', 'step row'),
    ));
    acf_register_block_type(array(
      'name'              => 'Step-slide',
      'title'             => __('Align step slide'),
      'description'       => __('Align step slide block'),
      'render_template'   => 'template-blocks/step-slide.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align step slide', 'step slide'),
    ));
    acf_register_block_type(array(
      'name'              => 'Align video',
      'title'             => __('Align video'),
      'description'       => __('Align video block'),
      'render_template'   => 'template-blocks/video.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align video', 'video'),
    ));
    acf_register_block_type(array(
      'name'              => 'Why',
      'title'             => __('Align why'),
      'description'       => __('Align why block'),
      'render_template'   => 'template-blocks/why.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align why', 'why'),
    ));
    acf_register_block_type(array(
      'name'              => 'Tab',
      'title'             => __('Align tab'),
      'description'       => __('Align tab block'),
      'render_template'   => 'template-blocks/tab.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align tab', 'tab'),
    ));
    acf_register_block_type(array(
      'name'              => 'Promotion',
      'title'             => __('Align promotion'),
      'description'       => __('Align promotion block'),
      'render_template'   => 'template-blocks/pro.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align promotion', 'promotion'),
    ));
    acf_register_block_type(array(
      'name'              => 'Non Promotion',
      'title'             => __('Align non promotion'),
      'description'       => __('Align non promotion block'),
      'render_template'   => 'template-blocks/non-pro.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align non promotion', 'non promotion'),
    ));
    acf_register_block_type(array(
      'name'              => 'Promotion banner',
      'title'             => __('Align promotion banner'),
      'description'       => __('Align promotion banner block'),
      'render_template'   => 'template-blocks/pro-banner.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align promotion banner', 'promotion banner'),
    ));
    acf_register_block_type(array(
      'name'              => 'Contact banner',
      'title'             => __('Align contact banner'),
      'description'       => __('Align contact banner block'),
      'render_template'   => 'template-blocks/contact-banner.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align contact banner', 'contact banner'),
    ));
    acf_register_block_type(array(
      'name'              => 'Contact form',
      'title'             => __('Align contact form'),
      'description'       => __('Align contact form block'),
      'render_template'   => 'template-blocks/contact-form.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align contact form', 'contact form'),
    ));
    acf_register_block_type(array(
      'name'              => 'Vision',
      'title'             => __('Align vision'),
      'description'       => __('Align vision block'),
      'render_template'   => 'template-blocks/vision.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align vision', 'vision'),
    ));
    acf_register_block_type(array(
      'name'              => 'Timeline',
      'title'             => __('Align timeline'),
      'description'       => __('Align timeline block'),
      'render_template'   => 'template-blocks/timeline.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align timeline', 'timeline'),
    ));
    acf_register_block_type(array(
      'name'              => 'Leader',
      'title'             => __('Align leader'),
      'description'       => __('Align leader block'),
      'render_template'   => 'template-blocks/leader.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align leader', 'leader'),
    ));
    acf_register_block_type(array(
      'name'              => 'Support',
      'title'             => __('Align support'),
      'description'       => __('Align support block'),
      'render_template'   => 'template-blocks/support.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align support', 'support'),
    ));
    acf_register_block_type(array(
      'name'              => 'Sale',
      'title'             => __('Align sale'),
      'description'       => __('Align sale block'),
      'render_template'   => 'template-blocks/sale.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align sale', 'sale'),
    ));
    acf_register_block_type(array(
      'name'              => 'Footer policy',
      'title'             => __('Align footer policy'),
      'description'       => __('Align footer policy block'),
      'render_template'   => 'template-blocks/footer-policy.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align footer policy', 'footer policy'),
    ));
    acf_register_block_type(array(
      'name'              => 'Footer social',
      'title'             => __('Align footer social'),
      'description'       => __('Align footer social block'),
      'render_template'   => 'template-blocks/footer-social.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align footer social', 'footer social'),
    ));
    acf_register_block_type(array(
      'name'              => 'Header button',
      'title'             => __('Align header button'),
      'description'       => __('Align header button block'),
      'render_template'   => 'template-blocks/header-btn.php',
      'category'          => 'formatting',
      'icon'              => 'star-empty',
      'keywords'          => array('Align header button', 'header button'),
    ));
  }
}


// GUTENBERG BLOCK PATTERNS//
add_action('init', 'align_block_categories');
function align_block_categories()
{
  if (class_exists('WP_Block_Patterns_Registry')) {

    register_block_pattern_category(
      'Align patterns',
      array('label' => _x('Align patterns', 'Block pattern category', 'textdomain'))
    );
  }
}
add_action('init', 'align_block_patterns');
function align_block_patterns()
{

  if (class_exists('WP_Block_Patterns_Registry')) {

    $content =
      '
        <!-- wp:acf/hero {"id":"block_62eae266565d5","name":"acf/hero","align":"","mode":"edit"} /-->

        <!-- wp:acf/step-row {"id":"block_62eae295565d7","name":"acf/step-row","align":"","mode":"edit"} /-->

        <!-- wp:acf/align-video {"id":"block_62eae2e5bc013","name":"acf/align-video","data":{},"align":"","mode":"edit"} /-->

        <!-- wp:acf/intro {"id":"block_62eae2f9bc014","name":"acf/intro","data":{},"align":"","mode":"edit"} /-->

        <!-- wp:acf/why {"id":"block_62eae313bc015","name":"acf/why","data":{},"align":"","mode":"edit"} /-->

        <!-- wp:acf/explore {"id":"block_62eae31dbc016","name":"acf/explore","data":{},"align":"","mode":"edit"} /-->
    ';

    register_block_pattern(
      'intergration pattern',
      array(
        'title'         => __('Intergration pattern'),
        'description'   => _x('Intergration default template pattern.', 'Block pattern description', 'textdomain'),
        'content'       => trim($content),
        'categories'    => array('Align patterns'),
        'keywords'      => array('align', 'intergration'),
        'viewportWidth' => 1400,
        'blockTypes'    => array('core/gallery'),
      )
    );
  }
}

add_filter('pre_get_posts',  'prefix_limit_post_types_in_search');
function prefix_limit_post_types_in_search($query)
{


  if (!is_admin()) {
    if (is_search() and $query->is_main_query()) {
      $query->set('post_type', array($_GET['type']));
    }
  }
  return $query;
}

// Set post view

function postview_set($postID)
{
  $count_key = 'postview_number';
  $count = get_post_meta($postID, $count_key, true);
  $int =  (int)$count;
  if ($count = '') {
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, 0);
  } else {
    $int++;
    update_post_meta($postID, $count_key, $int);
  }
}
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


function align_pagination($wp_query = '')
{
  if ($wp_query == '') {
    global $wp_query;
  }


  $prev = '<img src="' . ASSETS . '/images/arr-prev.svg" alt="" />';
  $next = '<img src="' . ASSETS . '/images/arr-next.svg" alt="" />';
  $bignum = 999999999;
  if ($wp_query->max_num_pages <= 1)
    return;
  echo '<nav class="pagination">';
  echo paginate_links(array(
    'base' => str_replace($bignum, '%#%', esc_url(get_pagenum_link($bignum))),
    'format' => '',
    'current' => max(1, get_query_var('paged')),
    'total' => $wp_query->max_num_pages,
    'prev_text' => $prev,
    'next_text' => $next,
    'type' => 'list',
    'end_size' => 1,
    'mid_size' => 1
  ));
  echo '</nav>';
}

// Menu 
class Align_Walker_Nav_Menu extends Walker_Nav_Menu
{

  function start_lvl(&$output, $depth = 0, $args = array())
  {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<div class='sub-menu-wrap'><ul class='submenu'>\n";
  }

  function end_lvl(&$output, $depth = 0, $args = array())
  {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul></div>\n";
  }
}


function disable_update_plugin($value)
{
  unset($value->response['megamenu/megamenu.php']);
  return $value;
}
add_filter('site_transient_update_plugins', 'disable_update_plugin');

// --------------------- //
flush_rewrite_rules(false);
// --------------------- //