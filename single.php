<?php
get_header();
while (have_posts()) :
    the_post();

    $postID = get_the_ID();
    postview_set($postID);

    $site_url_image = site_url('template') . '/images';
    $url = urlencode(get_the_permalink());
    $title = get_the_title();
    $array_share = array(
        'mail' => [
            'icon' =>   ASSETS . '/images/bdt-ic1.svg',
            'url' => 'mailto:?subject= I want to share this with you &amp;body= Hi there, Check out this site ' . $url . '. Thanks.'
        ],
        'linkedin' => [
            'icon' =>   ASSETS . '/images/bdt-ic2.svg',
            'url' => 'https://www.linkedin.com/cws/share?url=' . $url . '&title=' . $title
        ],
        'facebook' => [
            'icon' =>  ASSETS . '/images/bdt-ic3.svg',
            'url' => 'https://www.facebook.com/sharer/sharer.php?u=' . $url . '&t=' . $title
        ],
        'twitter' => [
            'icon' => ASSETS . '/images/bdt-ic4.svg',
            'url' => 'http://www.twitter.com/share?url=' . $url
        ],


    );


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


    <div class="blog-detail-intro section-pri">
        <div class="container">
            <div class="col-10">
                <div class="align-content">
                    <h1>
                        <?php the_title(); ?>
                    </h1>
                    <p>
                        <b> Quick Summary: </b>
                        <?php echo wp_trim_words(get_the_content(), 100); ?>
                    </p>
                </div>
                <div class="blog-detail-author">
                    <?php
                    if (get_avatar_url(get_the_author_meta('ID')) !== FALSE) : ?>
                        <img class="ava" src="<?php echo get_avatar_url(get_the_author_meta('ID')) ?>" alt="">
                    <?php else : ?>
                        <img class="ava" src="<?php echo ASSETS . '/images/bdt-ava.jpg' ?>" alt="" />
                    <?php endif; ?>

                    <div class="info">
                        <div class="name">By <?php echo get_the_author(); ?></div>
                        <div class="date"><?php echo get_the_date(); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-detail-img">
        <div class="container">
            <div class="ratio-box">
                <img src="<?php $bg1 = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
                            echo $bg1[0];
                            ?>" alt="">

            </div>
        </div>
    </div>

    <div class="blog-detail-content section-pri">
        <div class="container">
            <div class="col-8">
                <div class="align-content">
                    <?php the_content(); ?>
                </div>


                <div class="blog-detail-social">
                    <ul>
                        <?php

                        foreach ($array_share as $key => $item) {
                            $s_url = $item['url'];
                            $s_icon = $item['icon'];
                        ?>
                            <li>
                                <a target="_blank" href="<?= $s_url ?>">
                                    <img src="<?= $s_icon ?>" alt="" />
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="decor-box"></div>
        </div>
    </div>

    <section class="comment section-pri">
        <div class="container">
            <div class="col-8">
                <h2 class="title-h3 comment-title">Let share your thoughts with us</h2>
                <?php
                comments_template();
                ?>
                <!-- <ul class="comment-list">
                    <li class="comment-item">
                        <div class="comment-author">
                            <img class="ava" src=" echo ASSETS . '/images/cmt-ava.jpg' " alt="" />
                            <div class="info">
                                <div class="name">Tom</div>
                                <div class="date">04 July 2022</div>
                            </div>
                        </div>
                        <div class="comment-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Felis potenti sit morbi fermentum consequat
                            nunc venenatis diam. Quisque dignissim faucibus aliquam ac tincidunt in. Donec hendrerit hendrerit
                            odio ornare vel arcu. Vestibulum ullamcorper justo, sit
                        </div>
                    </li>
                    <li class="comment-item">
                        <div class="comment-author">
                            <img class="ava" src=" echo ASSETS . '/images/cmt-ava.jpg' " alt="" />
                            <div class="info">
                                <div class="name">Tom</div>
                                <div class="date">04 July 2022</div>
                            </div>
                        </div>
                        <div class="comment-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Felis potenti sit morbi fermentum consequat
                            nunc venenatis diam. Quisque dignissim faucibus aliquam ac tincidunt in. Donec hendrerit hendrerit
                            odio ornare vel arcu. Vestibulum ullamcorper justo, sit
                        </div>
                    </li>
                </ul>
                <div class="comment-form">
                    <form action="">
                        <div class="comment-form-wrap">
                            <div class="comment-form-ava">
                                <img src=" echo ASSETS . '/images/cmt-ava.jpg' " alt="" />
                            </div>
                            <input type="text" class="rs-form comment-form-inp" placeholder="Write your comment here" />
                        </div>
                        <input class="rs-form btn-sec" type="submit" value="Comment" />
                    </form>
                </div> -->
            </div>
        </div>
        <div class="decor-box"></div>
    </section>

    <section class="newsletter section-pri">
        <div class="container">
            <div class="col-10">
                <h2 class="title-h4 newsletter-title">Latest news delivered right to your inbox</h2>

                <?php echo do_shortcode('[contact-form-7 id="9759" title="Subscribe form"]') ?>

                <div class="decor-box"></div>
            </div>
        </div>
    </section>

    <section class="explore section-pri">
        <div class="container">
            <h2 class="explore-title title-h1">Explore more</h2>
            <div class="swiper-default">
                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        <?php
                        global $post123;
                        $related = get_posts(array('category__in' => wp_get_post_categories($postID), 'numberposts' => 3, 'post__not_in' => array($postID)));
                        if ($related) foreach ($related as $post123) {
                            $img = get_the_post_thumbnail_url($post123->ID, 'full');
                            $id = $post123->ID;
                            $title = $post123->post_title;
                            $txt = $post123->post_excerpt;

                            setup_postdata($post123);
                        ?>


                            <div class="swiper-slide">
                                <div class="explore-item">
                                    <a href="<?php the_permalink($id) ?>" class="explore-item-img ratio-box">
                                        <img src="<?= $img ?>" alt="" />
                                    </a>
                                    <a href="<?php the_permalink($id) ?>" class="explore-item-title title-h4"><?= $title ?></a>
                                    <div class="explore-item-txt swiper-no-swiping">
                                        <?= $txt ?>
                                    </div>
                                </div>
                            </div>

                        <?php }
                        wp_reset_postdata(); ?>


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

<?php
endwhile;
get_footer();
?>