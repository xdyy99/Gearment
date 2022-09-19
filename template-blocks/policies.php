<?php

/**
 * Policies Block Template.
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
<div class="policies section-pri">
  <div class="container">
    <h1 class="title-h1"><?= $title; ?></h1>


    <div class="policies-list">
      <?php if (is_active_sidebar('policies-menu')) dynamic_sidebar('policies-menu');  ?>
    </div>
  </div>
</div>