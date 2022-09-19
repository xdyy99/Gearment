<?php
get_header();

while (have_posts()) :
    the_post();

    $postID = get_the_ID();
    postview_set($postID);
?>

    <div class="catalog-detail">
        <div class="container">
            <div class="breadcrumb">
                <span href="#">Catalog </span> >
                <span>
                    <?php $term = wp_get_object_terms($post->ID, 'catalog', array('fields' => 'names'));
                    echo $term[0]; ?>
                </span> >
                <a> <?php the_field('product_name'); ?></a>
            </div>

            <div class="catalog-detail-wrap">
                <div class="col-5">
                    <div class="swiper-product">
                        <div class="swiper-detail">
                            <div class="swiper-container">
                                <?php
                                $images = get_field('product_image');
                                if ($images) : ?>
                                    <div class="swiper-wrapper">
                                        <?php foreach ($images as $image) : ?>
                                            <div class="swiper-slide">
                                                <div class="detail-slide-img ratio-box ">
                                                    <img src="<?php echo esc_url($image); ?>" alt="" />
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="swiper-ctrl">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                        <div class="swiper-thumb">
                            <div class="swiper-container">
                                <?php
                                $imagesthumbs = get_field('product_image');
                                if ($imagesthumbs) : ?>
                                    <div class="swiper-wrapper">
                                        <?php foreach ($imagesthumbs as $image) : ?>
                                            <div class="swiper-slide">
                                                <div class="detail-slide-thumb">
                                                    <div class="ratio-box">
                                                        <img src="<?php echo esc_url($image); ?>" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="catalog-detail-content">
                        <h1 class="title title-h1"><?php the_field('product_name'); ?></h1>
                        <div class="code">SKU: <?php the_field('product_sku'); ?></div>

                        <div class="price-big title-h4">From USD <?php the_field('product_price'); ?></div>
                        <div class="price-small">From USD <?php the_field('product_price_premium'); ?> with Premium Plan</div>

                        <div class="align-content">
                            <p>

                                <?php the_field('product_description'); ?>
                            </p>

                            <p>Made by <span style="color: #0023ce"> <?php the_field('product_brand'); ?> </span></p>
                        </div>

                        <div class="panel">
                            <div class="title-h5">Sizes</div>
                            <?php
                            $product_sizes = get_field('product_size');
                            if ($product_sizes) : ?>
                                <div class="panel-radio panel-box">
                                    <?php foreach ($product_sizes as $product_size) : ?>

                                        <div class="panel-radio-item"><?php echo $product_size; ?></div>

                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>



                        <div class="panel panel-color">
                            <div class="title-h5">Colors</div>
                            <div class="panel-radio">
                                <?php
                                $product_color_number = count(get_field('product_color'));
                                $product_color = get_field('product_color');
                                $product_color_hex = get_field('product_hex_color');
                                for ($x = 0; $x < $product_color_number; $x++) { ?>
                                    <div class="panel-radio-item">
                                        <div class="cir" style="background-color: #<?php echo $product_color_hex[$x]; ?>"></div>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="btn">
                            <a href="https://app-v2-dev.gearment.com/auth/register" class="btn-pri">Start Designing</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="catalog-tab tabJS">
        <div class="container">
            <div class="tab-menu">
                <div class="tab-menu-wrap">
                    <div class="tab-menu-item tabBtn">Features</div>
                    <div class="tab-menu-item tabBtn">Care instructions</div>
                    <div class="tab-menu-item tabBtn">Shipping</div>

                    <?php $has_size = get_field('has_size');
                    if ($has_size) : ?>
                        <div class="tab-menu-item tabBtn">Size guide</div>
                    <?php endif; ?>
                    <div class="tab-menu-item tabBtn">File guidelines</div>
                </div>
            </div>
            <div class="tab-board">
                <div class="tab-board-item tabPanel">
                    <div class="tab-list">
                        <ul>
                            <?php
                            $fea = get_field('features_list');
                            foreach ($fea as $key => $value) :
                                $fea_icon = $value['icon'];
                                $fea_txt = $value['text'];
                            ?>

                                <li>
                                    <img src="<?= $fea_icon ?>" alt="" />
                                    <?= $fea_txt ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="tab-board-item tabPanel">
                    <div class="tab-care">
                        <?php
                        $care = get_field('care_list');
                        foreach ($care as $key => $value) :
                            $care_icon = $value['icon'];
                            $care_txt = $value['text'];
                        ?>

                            <div class="tab-care-item">
                                <img src="<?= $care_icon ?>" alt="" />
                                <?= $care_txt ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>

                <div class="tab-board-item tabPanel">
                    <div class="tab-table tab-ship">
                        <div class="tt-wrap">
                            <div class="tt-head tt-row tt-head-big">
                                <div class="tt-col"></div>
                                <div class="tt-col">US Domestic shipping</div>
                                <div class="tt-col">International shipping</div>
                            </div>

                            <div class="tt-head tt-row">
                                <div class="tt-col">Sizes</div>
                                <div class="tt-col">Standard</div>
                                <div class="tt-col">Ground</div>
                                <div class="tt-col">Additional Item</div>
                                <div class="tt-col">2 Day</div>
                                <div class="tt-col">2 Day extra</div>
                                <div class="tt-col">Standard</div>
                                <div class="tt-col">Additional Item</div>
                            </div>
                            <?php
                            $ship1 = get_field('shipping_list1');
                            foreach ($ship1 as $key => $value) :
                                $size = $value['text'];
                                $item1 = $value['item1'];
                                $item2 = $value['item2'];
                                $item3 = $value['item3'];
                                $item4 = $value['item4'];
                                $item5 = $value['item5'];
                                $item6 = $value['item6'];
                                $item7 = $value['item7'];

                            ?>

                                <div class="tt-row">
                                    <div class="tt-col"> <?= $size ?> </div>
                                    <div class="tt-col"> <?= $item1 ?> </div>
                                    <div class="tt-col"> <?= $item2 ?> </div>
                                    <div class="tt-col"> <?= $item3 ?> </div>
                                    <div class="tt-col"> <?= $item4 ?> </div>
                                    <div class="tt-col"> <?= $item5 ?> </div>
                                    <div class="tt-col"> <?= $item6 ?> </div>
                                    <div class="tt-col"> <?= $item7 ?> </div>

                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>

                    <div class="tab-table tab-ship ">
                        <div class="tt-wrap">
                            <div class="tt-head tt-row tt-head-big">
                                <div class="tt-col"></div>
                                <div class="tt-col">US Domestic AK/HI/PR shipping</div>
                                <div class="tt-col"></div>
                            </div>

                            <div class="tt-head tt-row tt-row-small">
                                <div class="tt-col">Sizes</div>
                                <div class="tt-col">Standard & Ground</div>
                                <div class="tt-col">Additional</div>
                                <div class="tt-col">2 Day</div>
                                <div class="tt-col">2 Day extra</div>
                                <div class="tt-col"></div>
                            </div>
                            <?php
                            $ship2 = get_field('shipping_list2');
                            foreach ($ship2 as $key => $value) :
                                $size = $value['text'];
                                $item1 = $value['item1'];
                                $item2 = $value['item3'];
                                $item3 = $value['item4'];
                                $item4 = $value['item5'];

                            ?>

                                <div class="tt-row tt-row-small">
                                    <div class="tt-col"> <?= $size ?> </div>
                                    <div class="tt-col"> <?= $item1 ?> </div>
                                    <div class="tt-col"> <?= $item2 ?> </div>
                                    <div class="tt-col"> <?= $item3 ?> </div>
                                    <div class="tt-col"> <?= $item4 ?> </div>
                                    <div class="tt-col"> </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                </div>

                <?php $has_size = get_field('has_size');
                if ($has_size) : ?>
                    <div class="tab-board-item tabPanel">
                        <div class="tab-table tab-size">
                            <div class="tt-wrap">
                                <div class="tt-head tt-row">
                                    <div class="tt-col">Imperial</div>
                                    <div class="tt-col">XS</div>
                                    <div class="tt-col">S</div>
                                    <div class="tt-col">M</div>
                                    <div class="tt-col">L</div>
                                    <div class="tt-col">XL</div>
                                    <div class="tt-col">2XL</div>
                                    <div class="tt-col">3XL</div>
                                    <div class="tt-col">4XL</div>
                                    <div class="tt-col">5XL</div>
                                </div>
                                <?php
                                $size_list1 = get_field('size_list_imperial');
                                foreach ($size_list1 as $key => $value) :
                                    $part = $value['part'];
                                    $size1 = $value['xs'];
                                    $size2 = $value['s'];
                                    $size3 = $value['m'];
                                    $size4 = $value['l'];
                                    $size5 = $value['xl'];
                                    $size6 = $value['2xl'];
                                    $size7 = $value['3xl'];
                                    $size8 = $value['4xl'];
                                    $size9 = $value['5xl'];
                                ?>

                                    <div class="tt-row">
                                        <div class="tt-col"> <?= $part  ?> </div>
                                        <div class="tt-col"> <?= $size1 ?> </div>
                                        <div class="tt-col"> <?= $size2 ?> </div>
                                        <div class="tt-col"> <?= $size3 ?> </div>
                                        <div class="tt-col"> <?= $size4 ?> </div>
                                        <div class="tt-col"> <?= $size5 ?> </div>
                                        <div class="tt-col"> <?= $size6 ?> </div>
                                        <div class="tt-col"> <?= $size7 ?> </div>
                                        <div class="tt-col"> <?= $size8 ?> </div>
                                        <div class="tt-col"> <?= $size9 ?> </div>

                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="tab-table tab-size">
                            <div class="tt-wrap">
                                <div class="tt-head tt-row">
                                    <div class="tt-col">Metric</div>
                                    <div class="tt-col">XS</div>
                                    <div class="tt-col">S</div>
                                    <div class="tt-col">M</div>
                                    <div class="tt-col">L</div>
                                    <div class="tt-col">XL</div>
                                    <div class="tt-col">2XL</div>
                                    <div class="tt-col">3XL</div>
                                    <div class="tt-col">4XL</div>
                                    <div class="tt-col">5XL</div>
                                </div>
                                <?php
                                $size_list2 = get_field('size_list_metric');
                                foreach ($size_list2 as $key => $value) :
                                    $part = $value['part'];
                                    $size1 = $value['xs'];
                                    $size2 = $value['s'];
                                    $size3 = $value['m'];
                                    $size4 = $value['l'];
                                    $size5 = $value['xl'];
                                    $size6 = $value['2xl'];
                                    $size7 = $value['3xl'];
                                    $size8 = $value['4xl'];
                                    $size9 = $value['5xl'];
                                ?>

                                    <div class="tt-row">
                                        <div class="tt-col"> <?= $part  ?> </div>
                                        <div class="tt-col"> <?= $size1 ?> </div>
                                        <div class="tt-col"> <?= $size2 ?> </div>
                                        <div class="tt-col"> <?= $size3 ?> </div>
                                        <div class="tt-col"> <?= $size4 ?> </div>
                                        <div class="tt-col"> <?= $size5 ?> </div>
                                        <div class="tt-col"> <?= $size6 ?> </div>
                                        <div class="tt-col"> <?= $size7 ?> </div>
                                        <div class="tt-col"> <?= $size8 ?> </div>
                                        <div class="tt-col"> <?= $size9 ?> </div>

                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="tab-board-item tabPanel">

                    <div class="tab-table tab-file">
                        <div class="tt-wrap">
                            <div class="tt-head tt-row">
                                <div class="tt-col">Placement</div>
                                <div class="tt-col">Sizes</div>
                                <div class="tt-col">Max Printing Area</div>
                                <div class="tt-col">Recommended Size Of Print File</div>
                                <div class="tt-col">Print File Template</div>
                            </div>
                            <?php
                            $file = get_field('file_list');
                            foreach ($file as $key => $value) :
                                $name = $value['text'];
                                $size = $value['sizes'];
                                $area = $value['max_printing_area'];
                                $recommend = $value['recommended_size'];
                                $url = $value['file_url'];

                            ?>

                                <div class="tt-row">
                                    <div class="tt-col"> <?= $name ?> </div>
                                    <div class="tt-col"> <?= $size ?> </div>
                                    <div class="tt-col"> <?= $area ?> </div>
                                    <div class="tt-col"> <?= $recommend ?> </div>
                                    <div class="tt-col"> <a href="<?= $url ?>" download>Download</a> </div>

                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <section class="catalog-related section-pri">
        <div class="container">
            <h2 class="catalog-related-title title-h2">Related products</h2>

            <div class="swiper-default">
                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        <?php
                        global $post;
                        $related = get_posts(array(
                            'category__in' => wp_get_post_categories($post->ID),
                            'numberposts' => 3,
                            'post_type' => 'product',
                            'post__not_in' => array($post->ID)
                        ));

                        if ($related) foreach ($related as $post) {
                            $img = get_the_post_thumbnail_url($post->ID, 'full');
                            $id = $post->ID;
                            $title = get_post_field('product_name', $id);
                            $name = get_post_field('product_brand', $id);
                            $price = get_post_field('product_price', $id);
                            $price_pre = get_post_field('product_price_premium', $id);
                            setup_postdata($post);
                        ?>

                            <div class="swiper-slide">
                                <div class="catalog-item">
                                    <div class="catalog-item">
                                        <a href="<?php the_permalink($id) ?>" class="img ratio-box">
                                            <img src="<?php echo $img ?>" alt="" />

                                        </a>
                                        <a href="<?php the_permalink($id) ?>" class="title"><?php echo $title; ?></a>
                                        <div class="name">By <?= $name ?></div>
                                        <div class="price-big">From USD <?= $price ?></div>
                                        <div class="price-small">From USD <?= $price_pre ?> with Premium Plan</div>
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