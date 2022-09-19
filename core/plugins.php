<?php

function alignvn_plugin_activation()
{
    $plugins = array(

        array(
            'name'      => 'All-in-One WP Migration',
            'slug'      => 'all-in-one-wp-migration',
            'required'  => true,
        ),
        // Gọi một plugin trong thư viện WordPress.org/plugins
        array(
            'name'      => 'Custom Post Type UI',
            'slug'      => 'custom-post-type-ui', //Tên slug của plugin trên URL
            'required'  => true,
        ),
        array(
            'name'      => 'Advanced Custom Fields',
            'slug'      => 'advanced-custom-fields', //Tên slug của plugin trên URL
            'required'  => true,
        ),


    ); // end $plugins

    $configs = array(
        'menu' => 'align_plugin_install',
        'has_notice' => true,
        'dismissable' => false,
        'is_automatic' => true
    );
    tgmpa($plugins, $configs);
}
add_action('tgmpa_register', 'alignvn_plugin_activation');
