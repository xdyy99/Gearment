<?php

/**
 * Sale Block Template.
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
$args = array(
  'numberposts'      => 9,
  'tag_id'           => 89,
  'orderby'          => 'post_date',
  'order'            => 'DESC',
  'post_type'        => 'product',
  'post_status'      => 'publish',
);

$query = new WP_Query($args);

?>

<!-- HTML template  -->
<div class="promo-slide section-pri">
  <div class="container">
    <div class="swiper-default">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <?php
          while ($query->have_posts()) : $query->the_post();
            $id = $value['ID'];
            $img = get_the_post_thumbnail_url($id, 'full');
            $title = get_post_field('product_name', $id);
            $name = get_post_field('product_brand', $id);
            $price = get_post_field('product_price', $id);
            $plan_price = get_post_field('product_price_premium', $id);

          ?>

            <div class="swiper-slide">
              <div class="catalog-item">
                <a href="<?php the_permalink($id) ?>" class="img ratio-box">
                  <img src="<?= $img; ?>" alt="" />
                  <span class="img-tag yellow">Sale</span>
                </a>
                <a href="<?php the_permalink($id) ?>" class="title"><?= $title; ?></a>
                <div class="name">By <?= $name; ?></div>
                <div class="price-big">From USD <?= $price; ?></div>
                <?php if (get_theme_mod('align_plan_activate')) { ?>
                  <div class="price-small">From USD <?= $plan_price  ?> with <?php echo get_theme_mod('align_plan_name') ?></div>
                <?php } ?>
              </div>
            </div>
          <?php
          endwhile;
          wp_reset_postdata();
          ?>
        </div>
      </div>
      <div class="swiper-ctrl">
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </div>
</div>