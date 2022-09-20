<?php get_header(); ?>

<?php
//Setting values
$terms = wp_get_object_terms($post->ID, 'catalog', array(
    'orderby' => 'taxonomy',
    'order'   => 'ASC',
));
$term = get_queried_object();
$termparentid = $term->parent;
$termchildren = get_term_children($termparentid, 'catalog');

//Getting value
$catTitle = get_field('catalog_title', $term);
$catLink = get_field('catalog_explore_link', $term);
$catDes = get_field('catalog_description', $term);
$catTooltip = get_field('catalog_tooltip', $term);
$catImgBf = get_field('catalog_image_before', $term);
$catImgAf = get_field('catalog_image_after', $term);
$catImgLogo = get_field('catalog_image_icon', $term);


?>

<main class="main">
    <div class="catalog-header-block">
        <div class="catalog-search">
            <div class="container">
                <div class="catalog-search-wrap">
                    <?php echo do_shortcode('[piotnetgrid id=7812 type=facet grid=7809]'); ?>
                </div>
                <div class="catalog-filter-mobile">
                    <?php echo do_shortcode('[piotnetgrid id=7814 type=facet grid=7809]'); ?>
                </div>
            </div>


        </div>
        <div class="catalog-menu">
            <div class="container">
                <ul>
                    <?php
                    if ($term->parent > 0) {
                        foreach ($termchildren as $child) {
                            $termID = get_term_by('id', $child, 'catalog');
                            if ($termID->term_id == $terms[1]->term_id) {
                                echo '<li><a class="current-active-item" href="' . get_term_link($termID->name, 'catalog') . '">' . $termID->name . '</a></li>';
                            } else {
                                echo '<li><a href="' . get_term_link($termID->name, 'catalog') . '">' . $termID->name . '</a></li>';
                            }
                        };
                    } else {
                        $termchildren = get_term_children($term->term_id, 'catalog');
                        foreach ($termchildren as $child) {
                            $termID = get_term_by('id', $child, 'catalog');
                            echo '<li><a href="' . get_term_link($termID->name, 'catalog') . '">' . $termID->name . '</a></li>';
                        };
                    }
                    ?>
                </ul>

                <div class="filter-select-wrap">
                    Sort by
                    <?php echo do_shortcode('[piotnetgrid id=7811 type=facet grid=7809]'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="catalog-filter">
        <div class="container">
            <div class="breadcrumb">
                <?php
                if ($term->parent > 0) {
                    foreach ($terms as $term) {
                        echo '<a href="' . get_term_link($term) . '"> ' . $term->name . ' </a> <b>></b>';
                    }
                } else {
                    echo '<a href="' . get_term_link($terms[0]) . '"> ' . $terms[0]->name . ' </a>';
                }
                ?>


            </div>
            <div class="catalog-filter-wrap">
                <div class="col-3">
                    <div class="catalog-sidebar">
                        <h1 class="catalog-sidebar-title title-h2"><?php if ($term->parent > 0) {
                                                                        echo $terms[1]->name;
                                                                    } else {
                                                                        echo $term->name;
                                                                    }
                                                                    ?></h1>
                        <div class="catalog-filter-desktop">
                            <?php echo do_shortcode('[piotnetgrid id=7814 type=facet grid=7809]'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="catalog-list-wrap">
                        <?php if (get_theme_mod('align_plan_activate')) { ?>
                            <div class="align_plan_name"><?php echo get_theme_mod('align_plan_name'); ?></div>
                        <?php } ?>
                        <?php echo do_shortcode('[piotnetgrid id=7809 type=grid]'); ?>
                    </div>
                    <div class="pagination">
                        <?php echo do_shortcode('[piotnetgrid id=7813 type=facet grid=7809]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (get_field('catalog_design_show', $term)) { ?>
        <section class="design design-small section-pri designJS">
            <div class="container">
                <div class="design-wrap">
                    <div class="col-8">
                        <h2 class="design-title title-h2"><?php echo $catTitle ? $catTitle : 'How to customize your T-shirt';  ?></h2>
                        <div class="design-txt">
                            <?php echo $catDes ? $catDes : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis,
                        lectus magna fringilla';  ?>

                        </div>
                        <a href="<?php echo $catLink ? $catLink : '#' ?>" class="btn-pri">Explore</a>
                    </div>
                    <div class="col-4">
                        <div class="design-drag">
                            <div class="drag-wrap">
                                <div class="drag-item">
                                    <img class="drag-icon" draggable="true" src="<?php echo $catImgLogo ? $catImgLogo : ASSETS . '/images/home-design-text.png' ?>  " alt="" />
                                    <div class="drag-tooltip"><?php echo $catTooltip ? $catTooltip : 'DRAG THIS INTO THE T-SHIRT' ?></div>
                                </div>
                                <div>
                                    <img class="drag-img" src="<?php echo $catImgBf ? $catImgBf : ASSETS . '/images/home-design-1.png' ?>" alt="" />
                                    <img class="drag-img" src="<?php echo $catImgAf ? $catImgAf : ASSETS . '/images/home-design-2.png' ?>" alt="" />
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
    <?php } ?>


    <?php get_footer(); ?>