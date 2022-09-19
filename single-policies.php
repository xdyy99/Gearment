<?php
get_header();
while (have_posts()) :
    the_post();
?>
    <div class="banner">
        <div class="container">
            <h1 class="title-h1"> <?php the_excerpt() ?></h1>
        </div>
        <div class="decor-box"></div>
    </div>

    <section class="privacy section-pri">
        <div class="container">
            <div class="privacy-wrap">
                <div class="col-9">
                    <div class="align-content">
                        <small> Updated on: <?php the_date(); ?> </small>
                        <?php the_content() ?>
                    </div>
                </div>
                <div class="col-3">
                    <div class="privacy-sidebar">
                        <?php if (is_active_sidebar('policies-menu')) dynamic_sidebar('policies-menu');  ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
endwhile;
get_footer();
?>