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
$btn2_txt = get_field('button2_text');

?>

<!-- HTML template  -->
<?php if ($btn1_txt) : ?>
  <a href="<?php echo (get_theme_mod('align_signup')) ?>" class="header-btn btn-pri"><?= $btn1_txt; ?></a>
<?php endif; ?>

<?php if ($btn2_txt) : ?>
  <a href="<?php echo (get_theme_mod('align_login')) ?>" class="header-btn btn-sec"><?= $btn2_txt; ?></a>
<?php endif; ?>