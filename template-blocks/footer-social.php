<?php

/**
 * Footer Social Block Template.
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
<div class="footer-social">
  <ul>
    <?php foreach ($list as $key => $value) :
      $url = $value['url'];
      $icon = $value['icon'];
    ?>
      <li>
        <a href="<?= $url ?>">
          <img src="<?= $icon ?>" alt="" />
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>