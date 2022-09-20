<?php

/**
 * Template Name: Featured Product Page
 */
get_header();
while (have_posts()) :
    the_post();

    $fil = get_field('filter');
    $color = get_field('color');
    $txt = get_field('text');
    $img = get_field('image');

    $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;

    $offset = ($paged - 1) * 9;
    // WP_Query arguments

    if ($fil == '0') :
        $args = array(
            'posts_per_page' => 9,
            'tag_id' => 80,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'post_type'        => 'product',
            'post_status'      => 'publish',
            'offset' => $offset,
            'paged' => $paged
        );
    elseif ($fil == '1') :
        $args = array(
            'posts_per_page' => 9,
            'tag_id' => 105,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'post_type'        => 'product',
            'post_status'      => 'publish',
            'offset' => $offset,
            'paged' => $paged
        );
    elseif ($fil == '2') :
        $args = array(
            'posts_per_page' => 9,
            'tag_id' => 104,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'post_type'        => 'product',
            'post_status'      => 'publish',
            'offset' => $offset,
            'paged' => $paged
        );
    endif;



    $wp_query1 = new WP_Query($args);
?>

    <div class="catalog-search">
        <div class="container">
            <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
                <!-- <input style="display:none;" type="checkbox" name="type" value="post" checked /> -->
                <input style="display:none;" type="checkbox" name="type" value="product" checked />
                <div class="catalog-search-wrap">
                    <input type="search" name="s" class="rs-form catalog-search-inp" placeholder="Search for product names or SKU" />
                    <img class="catalog-search-icon" src="<?php echo ASSETS . '/images/search-ic.svg'; ?>" alt="" />
                </div>
            </form>
        </div>
    </div>


    <div class="catalog-banner" style="background-color: <?php if ($color == '0') :
                                                                echo '#7AD1FF';
                                                            elseif ($color == '2') :
                                                                echo ' #011171';
                                                            endif; ?> ">
        <div class="container">
            <div class="catalog-banner-wrap">
                <div class="col-5">
                    <h1 class="catalog-banner-title title-h1"> <?= the_title() ?></h1>
                    <div class="catalog-banner-txt">
                        <?= $txt ?>
                    </div>
                </div>
                <div class="col-5">
                    <div class="catalog-banner-img">
                        <img src="<?= $img ?>" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <div class="decor-box"></div>
    </div>

    <div class="catalog-list section-pri">
        <div class="container">
            <div class="catalog-list-wrap">
                <?php
                while ($wp_query1->have_posts()) : $wp_query1->the_post();
                ?>

                    <div class="col-4 ">

                        <div class="catalog-item">
                            <a href="<?= get_permalink() ?>" class="img ratio-box">
                                <?php
                                $image = get_the_post_thumbnail_url();
                                ?>
                                <img src="<?php echo $image; ?>" alt="" />

                                <?php if ($fil == '1') { ?>
                                    <span class="img-tag">New</span>
                                <?php } elseif ($fil == '2') { ?>
                                    <span class="img-tag">Best selling</span>
                                <?php }  ?>


                            </a>
                            <a href="<?= get_permalink() ?>" class="title"> <?= get_the_title(); ?></a>
                            <div class="name">By <?php echo $p0 = get_field('product_brand'); ?></div>
                            <div class="price-big">From USD <?php echo $p1 = get_field('product_price'); ?></div>

                            <?php if (get_theme_mod('align_plan_activate')) { ?>
                                <div class="price-small">From USD <?php echo $p2 = get_field('product_price_premium'); ?> with <?php echo get_theme_mod('align_plan_name'); ?></div>
                            <?php } ?>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
            <div class="pagination">
                <?php
                align_pagination($wp_query1);
                ?>
            </div>
        </div>
    </div>

    <?php if (is_active_sidebar('feature-sidebar')) dynamic_sidebar('feature-sidebar');  ?>

<?php
endwhile;
get_footer(); ?>