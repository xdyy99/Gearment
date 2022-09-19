<?php

/**
 * Why Block Template.
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
$title1 = get_field('title');
$txt1 = get_field('text');
$list = get_field('list');
$fullsize = get_field('fullsize');

?>

<!-- HTML template  -->
<section class="why section-pri <?php if ($fullsize) echo 'why-full'; ?>">
  <div class="container">
    <div class="why-wrap">
      <div class="col-6">
        <h2 class="why-title title-h1">
          <?= $title1 ?>
        </h2>
      </div>
      <div class="col-6">
        <div class="why-txt">
          <?= $txt1 ?>
        </div>
      </div>

      <?php foreach ($list as $key => $value) :
        $title2 = $value['title'];
        $txt2 = $value['text'];
        $img = $value['icon'];
      ?>
        <div class="col-3">
          <div class="why-item">
            <img src="<?= $img ?>" alt="" />
            <h3 class="title title-h3"> <?= $title2 ?></h3>
            <div class="txt">
              <?= $txt2 ?>
            </div>
          </div>
        </div>

      <?php
        if ($key % 3 == 2) echo '<div class="col-12"></div>';
      endforeach;
      ?>





    </div>
  </div>
  <div class="decor-box"></div>
</section>