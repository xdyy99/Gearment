<?php

/**
 * Video Block Template.
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
$bg = get_field('poster');
$url = get_field('video');
//
$btn_txt = get_field('button_text');
$btn_url = get_field('button_url');

?>

<!-- HTML template  -->
<section class="video videoJS">
  <div class="container">
    <div class="video-wrap">
      <div class="video-inner">
        <video class="videoPlay" src="<?= $url; ?>" controls muted playsinline></video>
        <div class="video-overlay" style="background-image: url('<?= $bg; ?>')">
          <div class="video-icon"></div>
          <h2 class="video-title">
            <?= $title; ?>
          </h2>
        </div>
      </div>
    </div>
    <?php if ($btn_txt) : ?>
      <a href="<?php echo (get_theme_mod('align_login')) ?>" class="btn-pri"><?= $btn_txt; ?></a>
    <?php endif; ?>
  </div>

</section>