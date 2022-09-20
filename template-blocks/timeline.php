<?php

/**
 * Timeline Block Template.
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
$list = get_field('list');

?>

<section class="time section-pri">
  <div class="container">
    <div class="col-10">
      <h2 class="time-title title-h1"><?= $title ?></h2>

      <div class="swiper-default">
        <div class="time-line"></div>
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php foreach ($list as $key => $value) :
              $num = $value['year'];
              $txt = $value['text'];
            ?>
              <div class="swiper-slide">
                <div class="time-item">
                  <div class="dot"></div>
                  <div class="year"><?= $num ?></div>
                  <div class="text"><?= $txt ?></div>
                </div>
              </div>
            <?php endforeach; ?>


          </div>
        </div>

        <div class="swiper-ctrl">
          <div class="swiper-pagination"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      </div>
    </div>
  </div>
</section>