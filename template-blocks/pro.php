<?php

/**
 * Default Block Template.
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
$content = get_field('content');
$list = get_field('list');

?>

<!-- HTML template  -->
<section class="promo-sale">
  <div class="container">
    <div class="promo-sale-wrap">
      <div class="col-5">
        <div class="align-content">
          <?= $content ?>
        </div>
      </div>
      <div class="col-6">
        <div class="swiper-default">
          <div class="swiper-container">
            <div class="swiper-wrapper">
              <?php foreach ($list as $key => $value) :
                $bg = $value['background'];
                $url = $value['url'];
              ?>
                <div class="swiper-slide">
                  <a href="<?= $url ?>" class="promo-sale-item">
                    <div class="ratio-box">
                      <img src="<?= $bg ?>" alt="" />
                    </div>
                  </a>
                </div>
              <?php endforeach ?>
            </div>
          </div>
          <div class="swiper-ctrl">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>