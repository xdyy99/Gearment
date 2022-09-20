<?php

/**
 * Step Grid Block Template.
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
$list = get_field('list');
$bg = get_field('background');

?>

<!-- HTML template  -->
<section class="step section-pri">
  <div class="container">
    <div class="swiper-default">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <?php if ($bg) : ?>
            <div class="swiper-slide">
              <div class="step-img ratio-box">
                <img class="step-image" src="<?= $bg; ?>" alt="" />
              </div>
            </div>
          <?php endif; ?>
          <?php foreach ($list as $key => $value) :
            $title = $value['title'];
            $txt = $value['text'];
            $img = $value['image'];
          ?>
            <div class="swiper-slide">
              <div class="step-item">
                <div class="step-box">
                  <h3 class="step-title title-h3 swiper-no-swiping"><?= $title; ?></h3>
                  <div class="step-txt swiper-no-swiping">
                    <?= $txt; ?>
                  </div>
                </div>
                <div class="step-img ratio-box">
                  <img src="<?= $img; ?>" alt="" />
                </div>
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
      <div>
        <div class="decor-box"></div>
        <div class="decor-box"></div>
        <div class="decor-box"></div>
        <div class="decor-box"></div>
      </div>
    </div>
  </div>
</section>