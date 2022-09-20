<?php

/**
 * Step Row Block Template.
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
$btn_txt = get_field('button_text');
$btn_url = get_field('button_url');

?>

<!-- HTML template  -->
<section class="step-full section-pri">
  <div class="container">
    <h2 class="step-full-title title-h1">
      <?= $title1; ?>
    </h2>
    <div class="step-full-wrap">

      <?php foreach ($list as $key => $value) :
        $title2 = $value['title'];
        $txt = $value['text'];
        $bg = $value['background'];
      ?>
        <div class="step-full-item">
          <div class="col-4">
            <h3 class="title title-h2"> <?= $title2; ?></h3>
            <div class="txt">
              <?= $txt; ?>
            </div>

            <?php if ($btn_txt && $key == 0) : ?>
              <a href="<?php echo (get_theme_mod('align_login')) ?>" class="btn-pri"><?= $btn_txt; ?></a>
            <?php endif; ?>
          </div>
          <div class="col-8">
            <div class="step-full-img ratio-box">
              <img src="<?= $bg; ?>" alt="" />
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>