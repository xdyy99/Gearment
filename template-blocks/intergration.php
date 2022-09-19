<?php

/**
 * Intergration Block Template.
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
//
$con1 = get_field('content1');
$img1 = get_field('image1');
$logo = get_field('logo');
//
$list = get_field('list');


?>

<!-- HTML template  -->
<section class="inter section-pri">
  <div class="container">
    <h2 class="inter-title title-h1">
      <?= $title ?>
    </h2>
    <div>
      <div class="inter-loop">
        <div class="col-4">
          <div class="align-content">
            <?= $con1 ?>
          </div>
        </div>
        <div class="col-6">
          <div class="inter-circle ratio-box interJS">
            <div class="inter-center">
              <img class="" src="<?= $img1 ?>" alt="" />
            </div>
            <div class="inter-round">
              <?php foreach ($logo as $key => $value) :
                $icon = $value['image'];
                $url = $value['url'];
              ?>
                <div class="inter-round-pos">
                  <a href="<?= $url ?>" class="inter-round-icon">
                    <img src="<?= $icon ?>" alt="" />
                  </a>
                </div>
              <?php endforeach; ?>

            </div>
          </div>
        </div>
      </div>


      <?php foreach ($list as $key => $value) :
        $con2 = $value['content'];
        $img2 = $value['image'];
      ?>
        <div class="inter-loop">
          <div class="col-4">
            <div class="align-content">
              <?= $con2 ?>
            </div>

          </div>
          <div class="col-6">
            <img class="inter-img" src="<?= $img2 ?>" alt="" />
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
  <div>
    <div class="decor-box"></div>
    <div class="decor-box"></div>
  </div>
</section>