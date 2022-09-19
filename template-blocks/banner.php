<?php

/**
 * Banner Block Template.
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
$bg = get_field('background');

?>

<!-- HTML template  -->

<!-- if / else -->

<div class="banner <?php if ($bg) echo 'banner-how' ?>">
  <div class="container">
    <h1 class="title-h1">
      <?= $title ?>
    </h1>
  </div>

  <div class="decor-box"></div>

</div>