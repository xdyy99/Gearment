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
//
$btn1_txt = get_field('button1_text');
$btn1_url = get_field('button1_url');
//
$btn2_txt = get_field('button2_text');
$btn2_url = get_field('button2_url');

?>

<!-- HTML template  -->
<?php if ($btn1_txt) : ?>
  <a href="<?= $btn1_url; ?>" class="header-btn btn-pri"><?= $btn1_txt; ?></a>
<?php endif; ?>

<?php if ($btn2_txt) : ?>
  <a href="<?= $btn2_url; ?>" class="header-btn btn-sec"><?= $btn2_txt; ?></a>
<?php endif; ?>