<?php
/**
 * Customize theme
 * Date: 05.11.14
 * Time: 18:56
 */

    function theme_custom($wp_customize)
    {
        $wp_customize->remove_section('nav');
        $wp_customize->remove_section('static_front_page');

        $url = get_template_directory_uri();
        if (!get_option('logo_top'))
            add_option( 'logo_top', $url.'/image/logo-top.png');
        if (!get_option('main_image'))
            add_option( 'main_image', $url.'/image/header.jpg');

        // Color scheme
        $wp_customize->add_section('gen_color', array(
            'title'    => __('Colors theme ', 'tp1'),
            'priority' => 160,
        ));


        // color price
        $wp_customize->add_setting('color-price', array(
            'default'           => '#E74C5B',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability'        => 'edit_theme_options',
            'type'              => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'color-price', array(
            'label'    => __('Color price ', 'tp1'),
            'section'  => 'gen_color',
            'settings' => 'color-price',
        )));

        // color 1
        $wp_customize->add_setting('color-1', array(
            'default'           => '#34495E',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability'        => 'edit_theme_options',
            'type'              => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'color-1', array(
            'label'    => __('Color 1 ', 'tp1'),
            'section'  => 'gen_color',
            'settings' => 'color-1',
        )));

        // color 2
        $wp_customize->add_setting('color-2', array(
            'default'           => '#E74C3C',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability'        => 'edit_theme_options',
            'type'              => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'color-2', array(
            'label'    => __('Color 2', 'tp1'),
            'section'  => 'gen_color',
            'settings' => 'color-2',
        )));

        // color 3
        $wp_customize->add_setting('color-3', array(
            'default'           => '#3498DB',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability'        => 'edit_theme_options',
            'type'              => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'color-3', array(
            'label'    => __('Color 3', 'tp1'),
            'section'  => 'gen_color',
            'settings' => 'color-3',
        )));

        // color 4
        $wp_customize->add_setting('color-4', array(
            'default'           => '#F5791F',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability'        => 'edit_theme_options',
            'type'              => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'color-4', array(
            'label'    => __('Color 4', 'tp1'),
            'section'  => 'gen_color',
            'settings' => 'color-4',
        )));

        // color 5
        $wp_customize->add_setting('color-5', array(
            'default'           => '#2ECC71',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability'        => 'edit_theme_options',
            'type'              => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'color-5', array(
            'label'    => __('Color 5', 'tp1'),
            'section'  => 'gen_color',
            'settings' => 'color-5',
        )));

        // color 6
        $wp_customize->add_setting('color-6', array(
            'default'           => '#9B59B6',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability'        => 'edit_theme_options',
            'type'              => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'color-6', array(
            'label'    => __('Color 6', 'tp1'),
            'section'  => 'gen_color',
            'settings' => 'color-6',
        )));

        // color body
        $wp_customize->add_setting('body', array(
            'default'           => '#E0E0E0',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability'        => 'edit_theme_options',
            'type'              => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'body', array(
            'label'    => __('Color body', 'tp1'),
            'section'  => 'gen_color',
            'settings' => 'body',
        )));
        // color wrapper
        $wp_customize->add_setting('wrap', array(
            'default'           => '#E0F2F6',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability'        => 'edit_theme_options',
            'type'              => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'wrap', array(
            'label'    => __('Color wrapper', 'tp1'),
            'section'  => 'gen_color',
            'settings' => 'wrap',
        )));

        // Section Images logo
        $wp_customize->add_section('Logo', array(
            'title' => __('Logo and images', 'tp1'),
            'priority' => 170,
        ));


        $wp_customize->add_setting('logo_top', array(
            'default' => $url.'/image/logo-top.png',
            'capability' => 'edit_theme_options',
            'type'       => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'logo_top', array(
            'label'    => __('Logo', 'tp1'),
            'section'  => 'Logo',
            'settings' => 'logo_top',
        )));

        // image 1
        $wp_customize->add_setting('image_1', array(
            'default' => $url.'/image/slide1.jpg',
            'capability' => 'edit_theme_options',
            'type'       => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_1', array(
            'label'    => __('Image 1', 'tp1'),
            'section'  => 'Logo',
            'settings' => 'image_1',
        )));

        // image 2
        $wp_customize->add_setting('image_2', array(
            'default' => $url.'/image/slide2.jpg',
            'capability' => 'edit_theme_options',
            'type'       => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_2', array(
            'label'    => __('Image 2', 'tp1'),
            'section'  => 'Logo',
            'settings' => 'image_2',
        )));

        // image 3
        $wp_customize->add_setting('image_3', array(
            'default' => $url.'/image/slide3.jpg',
            'capability' => 'edit_theme_options',
            'type'       => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_3', array(
            'label'    => __('Image 3', 'tp1'),
            'section'  => 'Logo',
            'settings' => 'image_3',
        )));

        // favicon
        $wp_customize->add_setting('favicon', array(
            'default' => $url.'/favicon.ico',
            'capability' => 'edit_theme_options',
            'type'       => 'option',
        ));

        $favicon_custom_img_control = new WP_Customize_Image_Control($wp_customize, 'favicon', array(
            'label'    => __('Favicon Upload (16x16 format .ico)', 'tp1'),
            'section'  => 'Logo',
            'settings' => 'favicon',
        ));
        $favicon_custom_img_control->extensions = array('ico');
        $wp_customize->add_control($favicon_custom_img_control);


        // categories
        // Section settings categories
        $wp_customize->add_section('cat', array(
            'title' => __('Settings home categories', 'tp1'),
            'priority' => 180,
        ));

        $wp_customize->add_section('cat_image', array(
            'title' => __('Settings categories image', 'tp1'),
            'priority' => 190,
        ));

        $args = array(
            'type'                     => 'maep_products',
            'child_of'                 => 0,
            'parent'                   => '',
            'orderby'                  => 'name',
            'order'                    => 'ASC',
            'hide_empty'               => 1,
            'hierarchical'             => 1,
            'exclude'                  => '',
            'include'                  => '',
            'number'                   => 0,
            'taxonomy'                 => 'catproducts',
            'pad_counts'               => false
        );
        $categories = get_categories($args);
        $cats = array();
        $i = 0;
        foreach($categories as $category){
            if($i==0){
                $default = $category->slug;
                $i++;
            }
            $cats[$category->term_id] = $category->name;
        }


        // home cat 1
        $wp_customize->add_setting('home_cat_1', array(
            'default'        => $default,
            'capability'     => 'edit_theme_options',
            'type'           => 'option'

        ));
        $wp_customize->add_control( 'home_cat_1', array(
            'settings' => 'home_cat_1',
            'label'   => 'Select Home Category 1:',
            'section'  => 'cat',
            'type'    => 'select',
            'choices' => $cats,
        ));

        // home cat 2
        $wp_customize->add_setting('home_cat_2', array(
            'default'        => $default,
            'capability'     => 'edit_theme_options',
            'type'           => 'option'

        ));
        $wp_customize->add_control( 'home_cat_2', array(
            'settings' => 'home_cat_2',
            'label'   => 'Select Home Category 2:',
            'section'  => 'cat',
            'type'    => 'select',
            'choices' => $cats,
        ));

        // home cat 3
        $wp_customize->add_setting('home_cat_3', array(
            'default'        => $default,
            'capability'     => 'edit_theme_options',
            'type'           => 'option'

        ));
        $wp_customize->add_control( 'home_cat_3', array(
            'settings' => 'home_cat_3',
            'label'   => 'Select Home Category 3:',
            'section'  => 'cat',
            'type'    => 'select',
            'choices' => $cats,
        ));





        // Settings
        $wp_customize->add_section('gen_settings', array(
            'title'    => __('Main Settings ', 'tp1'),
            'priority' => 160,
        ));


        // Google analytics
        $wp_customize->add_setting('google_analytics', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'type'              => 'option',
        )); 
        $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'google_analytics', array(
            'label'    => __('Google Analytics ', 'tp1'),
            'section'  => 'gen_settings',
            'settings' => 'google_analytics',
            'type' => 'text'
        )));

        // Settings
        $wp_customize->add_section('features', array(
            'title'    => __('Left Sidebar ', 'tp1'),
            'priority' => 160,
        ));

        // count product
        $wp_customize->add_setting('count_featured', array(
            'default'           => '6',
            'capability'        => 'edit_theme_options',
            'type'              => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'count_featured', array(
            'label'    => __('Count products featured ', 'tp1'),
            'section'  => 'features',
            'settings' => 'count_featured',
            'type' => 'number'
        )));

        // enable
        $wp_customize->add_setting('enable_features', array(
            'default'           => '1',
            'capability'        => 'edit_theme_options',
            'type'              => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'enable_features', array(
            'label'    => __('Featured ', 'tp1'),
            'section'  => 'features',
            'settings' => 'enable_features',
            'type' => 'checkbox'
        )));

        // news
        $wp_customize->add_setting('enable_news', array(
            'default'           => '1',
            'capability'        => 'edit_theme_options',
            'type'              => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'enable_news', array(
            'label'    => __('View news ', 'tp1'),
            'section'  => 'features',
            'settings' => 'enable_news',
            'type' => 'checkbox'
        )));

        // news
        $wp_customize->add_setting('enable_slide', array(
            'default'           => '1',
            'capability'        => 'edit_theme_options',
            'type'              => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'enable_slide', array(
            'label'    => __('View slide product ', 'tp1'),
            'section'  => 'features',
            'settings' => 'enable_slide',
            'type' => 'checkbox'
        )));


    }
    add_action('customize_register', 'theme_custom');
?>