<?php

/**
 * Leader Block Template.
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
$list = get_field('list');

?>

<!-- HTML template  -->
<section class="leader section-pri">
  <div class="container">
    <h2 class="title-h1 leader-title"> <?= $title ?></h2>

    <div class="leader-wrap ">
      <?php foreach ($list as $key => $value) :
        $img = $value['image'];
        $txt = $value['text'];
        $name = $value['name'];
        $role = $value['role'];
      ?>
        <div class="col-6">
          <div class="leader-item">
            <div class="leader-img">
              <div class="ratio-box">
                <img src="<?= $img ?>" alt="" />
              </div>
            </div>
            <div class="leader-info">
              <div class="leader-txt">
                <?= $txt ?>
              </div>
              <h3 class="leader-name"> <?= $name ?></h3>
              <div class="leader-role"> <?= $role ?>r</div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>