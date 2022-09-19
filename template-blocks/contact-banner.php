<?php

/**
 * Contact Banner Block Template.
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
$bg = get_field('background');
//
$btn_txt = get_field('button_text');
$btn_url = get_field('button_url');
//
$full = get_field('fullsreen');

?>

<!-- HTML template  -->
<div class="contact-banner section-pri <?php if ($full) echo 'contact-banner-full' ?>" style="background-image: url('<?= $bg ?>')">
  <div class="container">
    <h1 class="contact-banner-title title-h1"> <?= $title ?></h1>
    <div class="contact-banner-txt">
      <?= $txt ?>
    </div>

    <?php if ($btn_txt) : ?>
      <a href="<?= $btn_url; ?>" class="btn-pri"><?= $btn_txt; ?></a>
    <?php endif; ?>
  </div>
</div>