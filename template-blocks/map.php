<?php

/**
 * Map Block Template.
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

?>

<!-- HTML template  -->
<section class="map section-pri mapJS">
  <div class="container">
    <h2 class="map-title title-h1"><?= $title ?></h2>

    <div class="map-txt">
      <?= $txt ?>
    </div>

    <div class="map-board">
      <img src="<?php echo ASSETS . '/images/home-map.png'; ?>" alt="" />
      <div>
        <div class="map-item">
          <img src="<?php echo ASSETS . '/images/map-ic-1.svg'; ?>" alt="" />
          <div class="txt">USA</div>
        </div>
        <div class="map-item">
          <img src="<?php echo ASSETS . '/images/map-ic-1.svg'; ?>" alt="" />
          <div class="txt">Canada</div>
        </div>
        <div class="map-item">
          <img src="<?php echo ASSETS . '/images/map-ic-1.svg'; ?>" alt="" />
          <div class="txt">Europe</div>
        </div>
        <div class="map-item">
          <img src="<?php echo ASSETS . '/images/map-ic-1.svg'; ?>" alt="" />
          <div class="txt">Asia</div>
        </div>
        <div class="map-item">
          <img src="<?php echo ASSETS . '/images/map-ic-1.svg'; ?>" alt="" />
          <div class="txt">Australia</div>
        </div>
        <div class="map-item">
          <img src="<?php echo ASSETS . '/images/map-ic-1.svg'; ?>" alt="" />
          <div class="txt">South America</div>
        </div>
        <div class="map-item">
          <img src="<?php echo ASSETS . '/images/map-ic-1.svg'; ?>" alt="" />
          <div class="txt">South Africa</div>
        </div>
      </div>
      <div>
        <div class="map-line">
          <img src="<?php echo ASSETS . '/images/map-line-1.svg'; ?>" alt="" />
        </div>
        <div class="map-line">
          <img src="<?php echo ASSETS . '/images/map-line-2.svg'; ?>" alt="" />
        </div>
        <div class="map-line">
          <img src="<?php echo ASSETS . '/images/map-line-3.svg'; ?>" alt="" />
        </div>
        <div class="map-line">
          <img src="<?php echo ASSETS . '/images/map-line-4.svg'; ?>" alt="" />
        </div>
        <div class="map-line">
          <img src="<?php echo ASSETS . '/images/map-line-5.svg'; ?>" alt="" />
        </div>
        <div class="map-line">
          <img src="<?php echo ASSETS . '/images/map-line-6.svg'; ?>" alt="" />
        </div>
      </div>
    </div>
  </div>
</section>