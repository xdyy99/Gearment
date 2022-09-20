<?php get_header();
/**
 * Template Name: Blog List Page
 */
global $post;
while (have_posts()) :
  the_post();

  $b_title = get_field('blog_title');
  $b_txt = get_field('blog_text');

  $post1 = wp_get_recent_posts(array(
    'numberposts' => 1,
    'orderby'          => 'post_date',
    'order'            => 'DESC',
    'post_type'        => 'post',
    'post_status'      => 'publish',
  ));
?>
  <div class="blog-ser  blog-mobile">
    <div class="blog-ser-wrap">
      <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
        <input style="display:none;" type="checkbox" name="type" value="post" checked />
        <!-- <input style="display:none;" type="checkbox" name="type" value="product" checked /> -->
        <div class="catalog-search-wrap">
          <input type="search" name="s" class="rs-form catalog-search-inp" placeholder="Search our blogs" />
          <img class="catalog-search-icon" src="<?php echo ASSETS . '/images/search-ic.svg'; ?>" alt="" />
        </div>
      </form>
    </div>
  </div>
  <div class="blog-menu">
    <div class="container">
      <div class="blog-menu-wrap">
        <?php
        wp_nav_menu(array(
          'container' => false,
          'theme_location' => 'blog-menu',
          'before' => '',
          'after' => '',
          'link_before' => '',
          'link_after' => '',
          'fallback_cb' => false,
          'walker' => new Align_Walker_Nav_Menu,
        ));
        ?>

      </div>
      <div class="blog-ser blog-desktop tgPan" data-type="searchbar">
        <div class="blog-ser-btn tgBtn" data-type="searchbar">
          <img src="<?php echo ASSETS . '/images/search-ic.svg'; ?>" alt="" />
        </div>
        <div class="blog-ser-wrap">
          <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
            <input style="display:none;" type="checkbox" name="type" value="post" checked />
            <!-- <input style="display:none;" type="checkbox" name="type" value="product" checked /> -->
            <div class="catalog-search-wrap">
              <input type="search" name="s" class="rs-form catalog-search-inp" placeholder="Search our blogs" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="blog-banner">

    <div class="blog-banner-title">
      <div class="container">
        <h1 class="title-h1"><?= $b_title ?></h1>
        <div class="blog-txt"><?= $b_txt ?></div>
      </div>
    </div>
    <?php foreach ($post1 as $key => $value) :
      $title2 = $value['post_title'];
      $url = get_permalink($value['ID']);
      $txt = $value['post_excerpt'];
      $bg1 = wp_get_attachment_image_src(get_post_thumbnail_id($value['ID']), 'single-post-thumbnail');
    ?>
      <a href="<?= $url ?>" class="blog-banner-img ratio-box">
        <img src="<?= $bg1[0] ?>" alt="" />
      </a>
      <div class="blog-content">
        <div class="container">
          <div class="blog-content-wrap">
            <div class="col-7">
              <h2 class="title-h2"><?= $title2 ?></h2>
            </div>
            <div class="col-5">
              <div class="txt">
                <?= $txt ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <div class="decor-box"></div>
  </div>

  <?php the_content(); ?>

<?php endwhile;
get_footer(); ?>