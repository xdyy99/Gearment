<?php get_header();
/**
 * Template Name: Help Center Page
 */
?>

<main class="main">
    <div class="help-banner">
        <div class="container">
            <div class="help-banner-wrap">
                <h1 class="help-banner-title title-h1">What can we help you?</h1>

                <div class="help-search">
                    <?php echo do_shortcode('[betterdocs_search_form placeholder="Search topic such as creating order, Easy integration..." popular_search="true"]'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="help-intro section-pri">
        <div class="container">
            <div class="help-intro-wrap">
                <?php echo do_shortcode('[betterdocs_category_box orderby="betterdocs_order" column="5"]'); ?>
            </div>
            <div class="help-popular-wrap">
                <?php echo do_shortcode('[betterdocs_popular_articles title="Popular Articles" posts_per_page="6"]'); ?>
            </div>
        </div>
    </div>

    <?php
    // get value

    //Getting value
    $helpTitle = get_field('help_center_title');
    $helpDes = get_field('help_center_description');
    $helpLink = get_field('help_center_email_link');
    $helpImg = get_field('help_center_image');

    ?>
    <section class="help-connect section-pri">
        <div class="container">
            <div class="help-connect-wrap">
                <div class="col-6">
                    <h2 class="help-connect-title title-h2"><?php echo $helpTitle ? $helpTitle : 'Can’t find what you need?'; ?></h2>
                    <div class="help-connect-txt">
                        <?php echo $helpDes ? $helpDes : 'Feel free to reach out to our support team. We are here for your success.' ?>
                    </div>

                    <div class="help-connect-cta">
                        <a class="help-connect-btn live-chat-btn" onclick="window.fcWidget.open();window.fcWidget.show();">
                            <img src="<?php echo ASSETS . '/images/hcb-1.svg' ?>" alt="" />
                            <span>
                                <div class="big">Live Chat</div>
                                <div class="small">Online support</div>
                            </span>
                        </a>

                        <a href="<?php echo $helpLink ? $helpLink : '/contact-help-center' ?>" class="help-connect-btn">
                            <img src="<?php echo ASSETS . '/images/hcb-2.svg' ?>" alt="" />
                            <span>
                                <div class="big">Email</div>
                                <div class="small">Send your questions</div>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="help-connect-img">
                        <img src="<?php echo $helpImg ? $helpImg : ASSETS . '/images/help-center-small.png' ?>" alt="" />
                    </div>
                </div>
                <div class="decor-box"></div>
            </div>
        </div>
    </section>

    <?php get_footer(); ?>