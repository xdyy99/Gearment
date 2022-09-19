<?php

/**
 * Mockup Block Template.
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
$img = get_field('background');
//
$btn_txt = get_field('button_text');
$btn_url = get_field('button_url');

?>

<!-- HTML template  -->
<section class="mockup section-pri">
  <div class="mockup-background">
    <div class="container">
      <div class="mockup-wrap">
        <div class="col-6">
          <div class="mockup-img">
            <div class="ratio-box">
              <img src="<?= $img ?>" alt="" />
            </div>
          </div>
        </div>
        <div class="col-5">
          <h2 class="mockup-title title-h3"> <?= $title ?> </h2>
          <?php if ($btn_txt) : ?>
            <a href="<?= $btn_url; ?>" class="btn-pri"><?= $btn_txt; ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>