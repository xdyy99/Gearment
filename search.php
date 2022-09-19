<?php get_header(); ?>

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

<div class="blog-banner ">
    <div class="blog-banner-title">
        <div class="container">
            <h1 class="title-h1">
                Result for: "<?php global $wp_query;
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
            ?>
                <?php
                $image = get_the_post_thumbnail_url();
                ?>
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
            endwhile;
            ?>
        </div>
    </div>
</div>






<?php get_footer(); ?>