<?php

/**
 * Non Promo Block Template.
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

?>

<!-- HTML template  -->
<div class="promo-grid section-pri">
  <div class="container">
    <div class="promo-grid-wrap clearfix">
      <?php foreach ($list as $key => $value) :
        $title = $value['title'];
        $bg = $value['background'];
        $btn_txt = $value['button_text'];
        $btn_url = $value['button_url'];
      ?>
        <div class="promo-grid-item">
          <div class="ratio-box">
            <img class="img" src="<?= $bg; ?>" alt="" />
            <div class="content">
              <div class="title title-h2"><?= $title; ?></div>
              <?php if ($btn_txt) : ?>
                <a href="<?= $btn_url; ?>" class="btn-pri"><?= $btn_txt; ?></a>
              <?php endif; ?>
            </div>
          </div>
        </div>


      <?php endforeach; ?>


    </div>
  </div>
</div