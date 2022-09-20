<?php

/**
 * Explore Block Template.
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
$title1 = get_field('title');
$num = get_field('item_number');
$type = get_field('post_type');

$readmore_url = get_category_link($type);

$post = wp_get_recent_posts(array(
  'numberposts' => $num,
  'category__in' => array($type),
  'orderby'          => 'post_date',
  'order'            => 'DESC',
  'post_type'        => 'post',
  'post_status'      => 'publish',
));

?>

<!-- HTML template  -->

<section class="explore section-pri">
  <div class="container">
    <div class="explore-head">
      <h2 class="explore-title title-h1">
        <?= $title1 ?>
      </h2>
      <a class="explore-more" href="<?= $readmore_url ?>">See more post</a>
    </div>
    <div class="swiper-default">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <?php foreach ($post as $key => $value) :
            $title2 = $value['post_title'];
            $url = get_permalink($value['ID']);
            $txt = $value['post_excerpt'];
            $img = wp_get_attachment_image_src(get_post_thumbnail_id($value['ID']), 'single-post-thumbnail');
          ?>
            <div class="swiper-slide">
              <div class="explore-item">
                <a href="<?= $url ?>" class="explore-item-img ratio-box">
                  <img src="<?php echo $img[0] ?>" alt="" />
                </a>
                <a href="<?= $url ?>" class="explore-item-title title-h4">
                  <?php echo $title2; ?>
                </a>
                <!-- <div class="explore-item-txt swiper-no-swiping">
                  <?php
                  // echo $txt;
                  ?>
                </div> -->
              </div>
            </div>
          <?php endforeach; ?>




        </div>
      </div>
      <div class="swiper-ctrl">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
</section>