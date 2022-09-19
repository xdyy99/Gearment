<?php

/**
 * Intro Block Template.
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
$title_big = get_field('title');
$list = get_field('list');

?>

<!-- HTML template  -->
<?php if ($fullsize) : ?>
  <section class="intro">
    <div class="intro-wrap">
      <?php foreach ($list as $key => $value) :
        $icon = $value['icon'];
        $title = $value['title'];
        $txt = $value['text'];
      ?>
        <?php if ($key == 0) : ?>
          <div class="intro-item">
            <h2 class="intro-title title-h2"> <?= $title; ?> </h2>
            <div class="intro-txt"> <?= $txt; ?> </div>
          </div>
        <?php else : ?>
          <div class="intro-item">
            <img class="intro-icon" src="<?= $icon; ?>" alt="" />
            <h3 class="intro-title title-h3"> <?= $title; ?> </h3>
            <div class="intro-txt"> <?= $txt; ?> </div>
          </div>
        <?php endif; ?>

      <?php endforeach; ?>
    </div>
  </section>

<?php else : ?>

  <section class="intro-small section-pri">
    <div class="container">
      <h2 class="intro-small-title title-h1"><?= $title_big; ?></h2>

      <div class="intro-wrap">
        <?php foreach ($list as $key => $value) :
          $icon = $value['icon'];
          $title = $value['title'];
          $txt = $value['text'];
        ?>

          <div class="intro-item">
            <img class="intro-icon" src="<?= $icon; ?>" alt="" />
            <h3 class="intro-title title-h3"> <?= $title; ?> </h3>
            <div class="intro-txt"> <?= $txt; ?> </div>
          </div>

        <?php endforeach; ?>
      </div>
    </div>
    <div class="decor-box"></div>
  </section>

<?php endif; ?>