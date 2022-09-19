<?php

/**
 * Step Slide Block Template.
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
$title1 = get_field('title');
$txt1 = get_field('text');

?>

<!-- HTML template  -->
<section class="step-big stepJS">
  <div class="container">
    <div class="step-big-head">
      <h2 class="title title-h1"> <?= $title1; ?></h2>
      <div class="txt">
        <?= $txt1; ?>
      </div>
    </div>
  </div>
  <div class="swiper-mobile fade">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <?php foreach ($list as $key => $value) :
          $title2 = $value['title'];
          $txt2 = $value['text'];
          $bg = $value['background'];
        ?>
          <div class="swiper-slide">
            <div class="container">
              <div class="step-big-item">
                <div class="step-big-number title-h1"><?= $key + 1 ?></div>
                <div class="step-big-title title-h1"><?= $title2 ?></div>
                <div class="step-big-img">
                  <div class="ratio-box">
                    <img src="<?= $bg ?>" alt="" />
                  </div>
                </div>
                <div class="step-big-decor"></div>
                <?php if ($txt2) : ?>
                  <div class="step-big-desc swiper-no-swiping">
                    <?= $txt2 ?>
                  </div>
                <?php endif; ?>
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
  </div>
</section>