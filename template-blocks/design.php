<?php

/**
 * Design Block Template.
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
$fullsize = get_field('fullsize');

$title = get_field('title');
$txt1 = get_field('text');

$btn_txt = get_field('button_text');
$btn_url = get_field('button_url');

$img = get_field('drag_icon');
$txt2 = get_field('drag_text');
$bg1 = get_field('drag_before');
$bg2 = get_field('drag_after');

?>

<!-- HTML template  -->

<?php if ($fullsize) : ?>
  <section class="design section-pri designJS">
    <div class="container">
      <div class="design-wrap">
        <div class="col-6">
          <h2 class="design-title title-h1">
            <?= $title; ?>
          </h2>
          <div class="design-txt">
            <?= $txt1; ?>
          </div>

          <?php if ($btn_txt) : ?>
            <a href="<?= $btn_url; ?>" class="btn-pri"><?= $btn_txt; ?></a>
          <?php endif; ?>

        </div>
        <div class="col-6">
          <div class="design-drag">
            <div class="drag-wrap">
              <div class="drag-item">
                <img class="drag-icon" draggable="true" src="<?= $img; ?>" alt="" />
                <div class="drag-tooltip"> <?= $txt2; ?></div>
              </div>
              <div>
                <img class="drag-img" src="<?= $bg1; ?>" alt="" />
                <img class="drag-img" src="<?= $bg2; ?>" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="decor-box"></div>
    </div>
  </section>
<?php else : ?>
  <section class="design design-small  section-pri designJS">
    <div class="container">
      <div class="design-wrap">
        <div class="col-8">
          <h2 class="design-title title-h1">
            <?= $title; ?>
          </h2>
          <div class="design-txt">
            <?= $txt1; ?>
          </div>

          <?php if ($btn_txt) : ?>
            <a href="<?= $btn_url; ?>" class="btn-pri"><?= $btn_txt; ?></a>
          <?php endif; ?>

        </div>
        <div class="col-4">
          <div class="design-drag">
            <div class="drag-wrap">
              <div class="drag-item">
                <img class="drag-icon" draggable="true" src="<?= $img; ?>" alt="" />
                <div class="drag-tooltip"> <?= $txt2; ?></div>
              </div>
              <div>
                <img class="drag-img" src="<?= $bg1; ?>" alt="" />
                <img class="drag-img" src="<?= $bg2; ?>" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="decor-box"></div>
    </div>
  </section>
<?php endif; ?>