<?php
get_header();

global $wp_query;
$categories = get_the_category();
$category_id = end($categories)->cat_ID;

$title = end($categories)->name;
$post = wp_get_recent_posts(array(
    'numberposts' => 1,
    'category__in' => array($category_id),
    'orderby'          => 'post_date',
    'order'            => 'DESC',
    'post_type'        => 'post',
    'post_status'      => 'publish',
));


$popular = wp_get_recent_posts(array(
    'numberposts' => 3,
    'category__in' => array($category_id),
    'meta_key'   => 'postview_number',
    'orderby'          => 'meta_value_num',
    'order'            => 'DESC',
    'post_type'        => 'post',
    'post_status'      => 'publish',
));

?>
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
                    <input style="display:none;" type="checkbox" name="type" value="post" checked />
                    <!-- <input style="display:none;" type="checkbox" name="type" value="product" checked /> -->
                    <div class="catalog-search-wrap">
                        <input type="search" name="s" class="rs-form catalog-search-inp" placeholder="Search our blogs" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="blog-banner">
    <div class="blog-banner-title">
        <div class="container">
            <h1 class="title-h1"><?= $title ?></h1>
        </div>
    </div>

    <?php foreach ($post as $key => $value) :
        $title1 = $value['post_title'];
        $url1 = get_permalink($value['ID']);
        $txt1 = $value['post_excerpt'];
        $bg1 = wp_get_attachment_image_src(get_post_thumbnail_id($value['ID']), 'single-post-thumbnail');
    ?>
        <a href="<?= $url1 ?>" class="blog-banner-img ratio-box">
            <img src="<?= $bg1[0] ?>" alt="" />
        </a>
        <div class="blog-content">
            <div class="container">
                <div class="blog-content-wrap">
                    <div class="col-7">
                        <h2 class="title-h2"><?= $title1 ?></h2>
                    </div>
                    <div class="col-5">
                        <div class="txt">
                            <?= $txt1 ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="decor-box"></div>
</div>

<section class="explore explore-blue section-pri">
    <div class="container">
        <h2 class="explore-title title-h1">Popular</h2>
        <div class="swiper-default">
            <div class="swiper-container">
                <div class="swiper-wrapper">

                    <?php foreach ($popular as $key => $value) :
                        $title3 = $value['post_title'];
                        $url3 = get_permalink($value['ID']);
                        $txt3 = $value['post_excerpt'];
                        $img3 = wp_get_attachment_image_src(get_post_thumbnail_id($value['ID']), 'single-post-thumbnail');
                    ?>
                        <div class="swiper-slide">
                            <div class="explore-item">
                                <a href="<?= $url3 ?>" class="explore-item-img ratio-box">
                                    <img src="<?php echo $img3[0] ?>" alt="" />
                                </a>
                                <a href="<?= $url3 ?>" class="explore-item-title title-h4">
                                    <?php echo $title3; ?>
                                </a>
                                <div class="explore-item-txt swiper-no-swiping">
                                    <?php echo $txt3; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>



                </div>
            </div>
            <div class="swiper-ctrl">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>


<section class="blog-list section-pri">
    <div class="container">
        <div class="blog-list-wrap">

            <?php
            while (have_posts()) :
                the_post();
            ?>
                <div class="col-4">
                    <div class="explore-item">
                        <a href="<?= get_permalink() ?>" class="explore-item-img ratio-box">
                            <?php
                            $image = get_the_post_thumbnail_url();
                            ?>
                            <img src="<?php echo $image; ?>" alt="" />
                        </a>
                        <a href="<?= get_permalink() ?>" class="explore-item-title title-h4">
                            <?= get_the_title(); ?>
                        </a>
                        <div class="explore-item-txt swiper-no-swiping">
                            <?= get_the_excerpt(); ?>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            ?>

        </div>
        <div class="pagination">
            <?php
            align_pagination();
            ?>
        </div>


    </div>
    <div class="decor-box"></div>
</section>


<?php
get_footer();
?>