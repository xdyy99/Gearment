<?php get_header();
global $wp_query;
?>
<?php if (get_post_type() === 'product') { ?>
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
<?php } else { ?>
    <div class="blog-ser  blog-mobile">
        <div class="blog-ser-wrap">
            <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
                <input style="display:none;" type="checkbox" name="type" value="post" checked />
                <!-- <input style="display:none;" type="checkbox" name="type" value="product" checked /> -->
                <div class="catalog-search-wrap">
                    <input type="search" name="s" class="rs-form catalog-search-inp" placeholder="Search our blogs" />
                    <img class="catalog-search-icon" src="<?php echo ASSETS . '/images/search-ic.svg'; ?>" alt="" />
                </div>
            </form>
        </div>
    </div>

    <div class="blog-menu">
        <div class="container">

            <div class="blog-menu-wrap">
                <?php
                wp_nav_menu(array(
                    'container' => false,
                    'theme_location' => 'blog-menu',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    'fallback_cb' => false,
                    'walker' => new Align_Walker_Nav_Menu,
                ));
                ?>
            </div>

            <div class="blog-ser blog-desktop tgPan" data-type="searchbar">
                <div class="blog-ser-btn tgBtn" data-type="searchbar">
                    <img src="<?php echo ASSETS . '/images/search-ic.svg'; ?>" alt="" />
                </div>
                <div class="blog-ser-wrap">
                    <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
                        <!-- <input style="display:none;" type="checkbox" name="type" value="product" checked /> -->
                        <input style="display:none;" type="checkbox" name="type" value="post" checked />

                        <div class="catalog-search-wrap">
                            <input type="search" name="s" class="rs-form catalog-search-inp" placeholder="Search.." />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<div class="blog-banner ">
    <div class="blog-banner-title">
        <div class="container">
            <h1 class="title-h1">
                Result for: "<?php
                                echo $wp_query->query['s']; ?>"
            </h1>
        </div>
    </div>
</div>

<div class="catalog-list ">
    <div class="container">
        <div class="catalog-list-wrap">
            <?php
            while (have_posts()) :
                the_post();
                $image = get_the_post_thumbnail_url();
                if (get_post_type() === 'product') {
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
                            <a href="<?= get_permalink() ?>" class="title"> <?php $title_format = explode('-' . get_field('product_sku'), get_the_title());
                                                                            echo $title_format[0]; ?></a>
                            <div class="name">By <?php echo $p0 = get_field('product_brand'); ?></div>
                            <div class="price-big">From USD <?php echo $p1 = get_field('product_price'); ?></div>

                            <?php if (get_theme_mod('align_plan_activate')) { ?>
                                <div class="price-small">From USD <?php echo $p2 = get_field('product_price_premium'); ?> with <?php echo get_theme_mod('align_plan_name'); ?></div>
                            <?php } ?>
                        </div>
                    </div>
                <?php  } else { ?>
                    <div class="col-4">
                        <div class="explore-item">
                            <a href="<?php echo get_permalink(); ?>" class="explore-item-img ratio-box">
                                <img src="<?php echo $image; ?>" alt="" />
                            </a>
                            <a href="<?php echo get_permalink(); ?>" class="explore-item-title title-h4">
                                <?php the_title(); ?>
                            </a>
                            <div class="explore-item-txt swiper-no-swiping">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
            <?php
                }
            endwhile;
            ?>
        </div>
    </div>
</div>






<?php get_footer(); ?>