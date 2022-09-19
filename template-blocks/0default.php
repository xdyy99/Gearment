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

?>

<!-- HTML template  -->
<div>
  <!-- echo  -->
  <?= $title ?>

  <!-- if -->
  <?php if ($condition) : ?>
    This will only display if $condition is true
  <?php endif; ?>

  <!-- if / else -->
  <?php if ($condition) : ?>
    This will only display if $condition is true

  <?php else : ?>
    even more html
  <?php endif; ?>


  <!-- foreach -->
  <?php foreach ($array as $key => $value) :
    $txt = $value['text'];
  ?>
    <div> <?= $key; ?> </div>
  <?php endforeach; ?>

  <!-- button -->
  <?php if ($btn_txt) : ?>
    <a href="<?= $btn_url; ?>" class="btn-pri"><?= $btn_txt; ?></a>
  <?php endif; ?>

</div>