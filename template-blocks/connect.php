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
$title = get_field('title');
$txt = get_field('text');
$img = get_field('background');
$check = get_field('icon_button');
//
$btn1 = get_field('button1');
$btn2_txt = get_field('button2_text');
$btn2_url = get_field('button2_url');

?>

<!-- HTML template  -->
<section class="help-connect section-pri">
  <div class="container">
    <div class="help-connect-wrap">
      <div class="col-6">
        <h2 class="help-connect-title title-h2"><?= $title ?></h2>

        <?php if ($txt) : ?>
          <div class="help-connect-txt">
            <?= $txt ?>
          </div>
        <?php endif; ?>


        <?php if ($check) : ?>

          <div class="help-connect-cta">
            <?php foreach ($btn1 as $key => $value) :
              $icon = $value['icon'];
              $big = $value['text_big'];
              $small = $value['text_small'];
              $url = $value['button_url'];
            ?>
              <a href="<?= $url ?>" class="help-connect-btn">
                <img src="<?= $icon ?>" alt="" />
                <span>
                  <div class="big"><?= $big ?></div>
                  <div class="small"><?= $small ?></div>
                </span>
              </a>
            <?php endforeach; ?>
          </div>

        <?php elseif ($btn2_txt) : ?>
          <a href="<?= $btn2_url; ?>" class="btn-pri"><?= $btn2_txt; ?></a>
        <?php endif; ?>


      </div>
      <div class="col-4">
        <div class="help-connect-img">
          <img src="<?= $img; ?>" alt="" />
        </div>
      </div>
      <div class="decor-box"></div>
    </div>
  </div>
</section>