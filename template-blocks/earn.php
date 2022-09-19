<?php

/**
 * Earn Block Template.
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
$btn_txt = get_field('button_text');
$btn_url = get_field('button_url');
$bg = get_field('background');
$icon = get_field('icon');

?>

<!-- HTML template  -->
<section class="earn">
  <div class="container">
    <div class="earn-wrap">
      <div class="col-5">
        <div class="section-pri">
          <h2 class="earn-title title-h1"> <?= $title ?></h2>
          <div class="earn-txt">
            <?= $txt ?>
          </div>

          <?php if ($btn_txt) : ?>
            <a href="<?= $btn_url; ?>" class="btn-pri"><?= $btn_txt; ?></a>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-7">
        <div class="earn-img">
          <img src="<?= $bg ?>" alt="" />
          <div>
            <?php if ($icon) : ?>
              <img class="earn-decor" src="<?= $icon ?>" alt="" />
              <img class="earn-decor" src="<?= $icon ?>" alt="" />
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>