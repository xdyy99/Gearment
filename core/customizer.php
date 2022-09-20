<?php

if (class_exists('Kirki')) {

    /**
     * Add sections
     */
    function kirki_demo_scripts()
    {
        wp_enqueue_style('kirki-demo', get_stylesheet_uri(), array(), time());
    }

    add_action('wp_enqueue_scripts', 'kirki_demo_scripts');
    $priority = 1;
    Kirki::add_section('Global Links', array(
        'title' => esc_attr__('Global Links', 'align'),
        'priority' => $priority++,
        'capability' => 'edit_theme_options',
    ));
    add_action('wp_enqueue_scripts', 'kirki_demo_scripts');
    $priority = 1;
    Kirki::add_section('Product Plan Activate', array(
        'title' => esc_attr__('Product Plan Activate', 'align'),
        'priority' => $priority++,
        'capability' => 'edit_theme_options',
    ));

    /**
     * Add fields
     */

    // Global URL
    Kirki::add_field('align_setting', array(
        'type' => 'url',
        'settings' => 'align_login',
        'label' => esc_attr__('Login url', 'align'),
        'description' => esc_attr__('', 'align'),
        'help' => esc_attr__('Enter your login page url', 'align'),
        'section' => 'Global Links',
        'default' => '',
        'priority' => $priority++,
    ));
    Kirki::add_field('align_setting', array(
        'type' => 'url',
        'settings' => 'align_signup',
        'label' => esc_attr__('Signup url', 'align'),
        'id' => esc_attr__('signup_url', 'align'),
        'description' => esc_attr__('', 'align'),
        'help' => esc_attr__('Enter your signup page url', 'align'),
        'section' => 'Global Links',
        'default' => '',
        'priority' => $priority++,
    ));
    Kirki::add_field('align_setting', array(
        'type' => 'url',
        'settings' => 'align_api',
        'label' => esc_attr__('API url', 'align'),
        'id' => esc_attr__('api_url', 'align'),
        'description' => esc_attr__('', 'align'),
        'help' => esc_attr__('Enter your api page url', 'align'),
        'section' => 'Global Links',
        'default' => '',
        'priority' => $priority++,
    ));
    Kirki::add_field('align_setting', array(
        'type' => 'toggle',
        'settings' => 'align_plan_activate',
        'label' => esc_attr__('Activate product plan', 'align'),
        'id' => esc_attr__('align_plan_activate', 'align'),
        'description' => esc_attr__('', 'align'),
        'help' => esc_attr__('Check to activate product plan', 'align'),
        'section' => 'Product Plan Activate',
        'default' => '',
        'priority' => $priority++,
    ));
    Kirki::add_field('align_setting', array(
        'type' => 'text',
        'settings' => 'align_plan_name',
        'label' => esc_attr__('Product plan name', 'align'),
        'id' => esc_attr__('align_plan_name', 'align'),
        'description' => esc_attr__('', 'align'),
        'help' => esc_attr__('Edit product plan name', 'align'),
        'section' => 'Product Plan Activate',
        'default' => '',
        'priority' => $priority++,
    ));
}
if (!function_exists('align_option')) {

    function align_option($setting, $default = '')
    {
        echo align_get_option($setting, $default);
    }

    function align_get_option($setting, $default = '')
    {
        if (class_exists('Kirki')) {
            $value = $default;
            $options = get_option('option_name', array());
            $options = get_theme_mod($setting, $default);
            if (isset($options)) {
                $value = $options;
            }
            return $value;
        }
        return $default;
    }
}
