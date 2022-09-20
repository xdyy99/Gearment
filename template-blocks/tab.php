<?php

/**
 * Tab Block Template.
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
$subtitle = get_field('subtitle');
//
$title1 = get_field('title1');
$title2 = get_field('title2');
$title3 = get_field('title3');
$title4 = get_field('title4');
$title5 = get_field('title5');
//

$terms = get_terms('doc_category', 'orderby=none&hide_empty');

?>



<div class="tabJS">
  <div class="help-intro section-pri">
    <div class="container">
      <h1 class="title-h1 help-intro-title"> <?= $title ?></h1>
      <h1 class="title-h2 help-intro-title"> <?= $subtitle ?></h1>
      <div class="help-intro-wrap">
        <div class="help-intro-col">
          <a class="help-intro-item tabBtn">
            <img src="<?php echo ASSETS . '/images/hi-1.svg'; ?>" alt="" />
            <?= $terms[0]->name ?>
          </a>
        </div>
        <div class="help-intro-col">
          <a class="help-intro-item tabBtn">
            <img src="<?php echo ASSETS . '/images/hi-2.svg'; ?>" alt="" />
            <?= $terms[1]->name ?>
          </a>
        </div>
        <div class="help-intro-col">
          <a class="help-intro-item tabBtn">
            <img src="<?php echo ASSETS . '/images/hi-3.svg'; ?>" alt="" />
            <?= $terms[2]->name ?>
          </a>
        </div>
        <div class="help-intro-col">
          <a class="help-intro-item tabBtn">
            <img src="<?php echo ASSETS . '/images/hi-4.svg'; ?>" alt="" />
            <?= $terms[3]->name ?>
          </a>
        </div>
        <div class="help-intro-col">
          <a class="help-intro-item tabBtn">
            <img src="<?php echo ASSETS . '/images/hi-5.svg'; ?>" alt="" />
            <?= $terms[4]->name ?>
          </a>
        </div>

        <div class="help-intro-row">
          <div class="help-intro-content tabPanel">
            <h2 class="help-intro-title title-h3"><?= $title1 ?></h2>
            <div class="help-intro-list full">
              <ul>

                <?php
                $list0 = get_posts(
                  array(
                    'posts_per_page'   => -1,
                    'orderby'          => 'post_date',
                    'order'            => 'ASC',
                    'post_type'        => 'docs',
                    'post_status'      => 'publish',
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'doc_category',
                        'field' => $terms[0]->slug,
                        'terms' => $terms[0]->term_id,
                      )
                    )
                  )
                );

                foreach ($list0 as $key => $value) :
                  $txt = $value->post_title;
                  $url = $value->guid;
                ?>
                  <li>
                    <a href="<?= $url ?>"> <?= $txt ?> </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
          <div class="help-intro-content tabPanel">
            <h2 class="help-intro-title title-h3"><?= $title2 ?></h2>
            <div class="help-intro-list full">
              <ul>

                <?php
                $list1 = get_posts(
                  array(
                    'posts_per_page'   => -1,
                    'orderby'          => 'post_date',
                    'order'            => 'ASC',
                    'post_type'        => 'docs',
                    'post_status'      => 'publish',
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'doc_category',
                        'field' => $terms[1]->slug,
                        'terms' => $terms[1]->term_id,
                      )
                    )
                  )
                );
                foreach ($list1 as $key => $value) :
                  $txt = $value->post_title;
                  $url = $value->guid;
                ?>
                  <li>
                    <a href="<?= $url ?>"> <?= $txt ?> </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
          <div class="help-intro-content tabPanel">
            <h2 class="help-intro-title title-h3"><?= $title3 ?></h2>
            <div class="help-intro-list full">
              <ul>
                <?php
                $list2 = get_posts(
                  array(
                    'posts_per_page'   => -1,
                    'orderby'          => 'post_date',
                    'order'            => 'ASC',
                    'post_type'        => 'docs',
                    'post_status'      => 'publish',
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'doc_category',
                        'field' => $terms[2]->slug,
                        'terms' => $terms[2]->term_id,
                      )
                    )
                  )
                );
                foreach ($list2 as $key => $value) :
                  $txt = $value->post_title;
                  $url = $value->guid;
                ?>
                  <li>
                    <a href="<?= $url ?>"> <?= $txt ?> </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
          <div class="help-intro-content tabPanel">
            <h2 class="help-intro-title title-h3"><?= $title4 ?></h2>
            <div class="help-intro-list full">
              <ul>

                <?php
                $list3 = get_posts(
                  array(
                    'posts_per_page'   => -1,
                    'orderby'          => 'post_date',
                    'order'            => 'ASC',
                    'post_type'        => 'docs',
                    'post_status'      => 'publish',
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'doc_category',
                        'field' => $terms[3]->slug,
                        'terms' => $terms[3]->term_id,
                      )
                    )
                  )
                );
                foreach ($list3 as $key => $value) :
                  $txt = $value->post_title;
                  $url = $value->guid;
                ?>
                  <li>
                    <a href="<?= $url ?>"> <?= $txt ?> </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
          <div class="help-intro-content tabPanel">
            <h2 class="help-intro-title title-h3"><?= $title5 ?></h2>
            <div class="help-intro-list full">
              <ul>

                <?php
                $list4 = get_posts(
                  array(
                    'posts_per_page'   => -1,
                    'orderby'          => 'post_date',
                    'order'            => 'ASC',
                    'post_type'        => 'docs',
                    'post_status'      => 'publish',
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'doc_category',
                        'field' => $terms[4]->slug,
                        'terms' => $terms[4]->term_id,
                      )
                    )
                  )
                );
                foreach ($list4 as $key => $value) :
                  $txt = $value->post_title;
                  $url = $value->guid;
                ?>
                  <li>
                    <a href="<?= $url ?>"> <?= $txt ?> </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>