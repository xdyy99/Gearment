<?php

/**
 * Financial Block Template.
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
$title1 = get_field('title_1');
$title2 = get_field('title_2');
$title3 = get_field('title_3');
//
$btn1_txt = get_field('button1_text');
//
$btn2_txt = get_field('button2_text');
$btn2_url = get_field('button2_url');
//
$bg = get_field('background');

?>

<!-- HTML template  -->
<section class="finan section-sec" style="background-image: url('<?= $bg ?>')">
  <div class="container">
    <div class="title-h2"> <?= $title1 ?></div>
    <h2 class="finan-title">
      <span class="big"> <?= $title2 ?></span>
      <br />
      <span class="small"> <?= $title3 ?></span>
    </h2>

    <?php if ($btn1_txt) : ?>
      <a href="<?php echo (get_theme_mod('align_signup')) ?>" class="btn-pri"><?= $btn1_txt; ?></a>
    <?php endif; ?>

    <?php if ($btn2_txt) : ?>
      <a href="<?= $btn2_url; ?>" class="btn-link"><?= $btn2_txt; ?></a>
    <?php endif; ?>
  </div>
</section>