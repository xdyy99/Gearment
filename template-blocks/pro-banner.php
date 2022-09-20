<?php

/**
 * Promo Banner Block Template.
 *
 * @param    array        $block      The block settings and attributes.
 * @param    string       $content    The block inner HTML (empty).
 * @param    bool         $is_preview True during AJAX preview.
 * @param    (int|string) $post_id    The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.

// $id = 'testimonial-' . $block['id'];
// if (!empty($block['anchor'])) {
//   $id = $block['anchor'];
// }

// Create class attribute allowing for custom "className" and "align" values.

// $className = 'testimonial';
// if (!empty($block['className'])) {
//   $className .= ' ' . $block['className'];
// }
// if (!empty($block['align'])) {
//   $className .= ' align' . $block['align'];
// }

// Load values and assign defaults.
$title = get_field('title');
$txt = get_field('text');
$img = get_field('image');

?>



<!-- HTML template  -->
<div class="promo-banner">
  <div class="container">
    <div class="promo-search">
      <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
        <!-- <input type="hidden" name="type" value="post" /> -->
        <input type="hidden" name="type" value="product" />
        <div class="promo-search-wrap">
          <input type="search" name="s" class="rs-form promo-search-inp" placeholder="Search for products, brands, categories" />
          <img class="promo-search-icon" src="<?php echo ASSETS . '/images/search-ic.svg'; ?>" alt="" />
        </div>
      </form>
    </div>

    <div class="promo-banner-wrap">
      <div class="col-6">
        <h1 class="title-h1 promo-banner-title"><?= $title ?></h1>
        <div class="promo-banner-txt">
          <?= $txt ?>
        </div>
      </div>
      <div class="col-6">
        <div class="promo-banner-img">
          <img src="<?= $img ?>" alt="" />
        </div>
      </div>
    </div>
  </div>
  <div class="decor-box"></div>
</div>