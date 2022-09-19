<?php

/**
 * Vision Block Template.
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
$title1 = get_field('title1');
$txt1 = get_field('text1');
//
$title2 = get_field('title2');
$txt2 = get_field('text2');
//
$list = get_field('list');
$bg = get_field('background');


?>

<!-- HTML template  -->
<section class="vision section-pri" style="background-image: url('<?= $bg ?>')">
  <div class="container">
    <div class="vision-row">
      <h2 class="vision-title title-h1"> <?= $title1 ?></h2>
      <div class="vision-txt">
        <?= $txt1 ?>
      </div>
    </div>
    <div class="vision-row">
      <h2 class="vision-title title-h1"> <?= $title2 ?></h2>
      <div class="vision-txt">
        <?= $txt2 ?>
      </div>
    </div>
    <div class="vision-box">
      <div class="vision-wrap">
        <?php foreach ($list as $key => $value) :
          $title3 = $value['title'];
          $txt3 = $value['text'];
        ?>
          <div class="col-4">
            <div class="vision-number"><?= $title3 ?></div>
            <?= $txt3 ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>