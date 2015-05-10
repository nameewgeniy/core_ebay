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

        // main color
        $wp_customize->add_setting('main_color', array(
            'default'           => '#00B2B7',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability'        => 'edit_theme_options',
            'type'              => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'main_color', array(
            'label'    => __('Main Color Theme ', 'tp1'),
            'section'  => 'gen_color',
            'settings' => 'main_color',
        )));

        // color price
        $wp_customize->add_setting('gen_color_link', array(
            'default'           => '#F77B7D',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability'        => 'edit_theme_options',
            'type'              => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'gen_color_link', array(
            'label'    => __('Background color price ', 'tp1'),
            'section'  => 'gen_color',
            'settings' => 'gen_color_link',
        )));

        // color button more
        $wp_customize->add_setting('gen_color_button', array(
            'default'           => '#FFC809',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability'        => 'edit_theme_options',
            'type'              => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'gen_color_button', array(
            'label'    => __('Background color button ', 'tp1'),
            'section'  => 'gen_color',
            'settings' => 'gen_color_button',
        )));

        // color button hover more
        $wp_customize->add_setting('gen_color_button_hover', array(
            'default'           => '#E4AD00',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability'        => 'edit_theme_options',
            'type'              => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'gen_color_button_hover', array(
            'label'    => __('Background color hover button ', 'tp1'),
            'section'  => 'gen_color',
            'settings' => 'gen_color_button_hover',
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
            'default' => $url.'/image/image-1.jpg',
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
            'default' => $url.'/image/image-2.jpg',
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
            'default' => $url.'/image/image-3.jpg',
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

        // main cat 1
        $wp_customize->add_setting('main_cat_1', array(
            'default'        => $default,
            'capability'     => 'edit_theme_options',
            'type'           => 'option'

        ));
        $wp_customize->add_control( 'main_cat_1', array(
            'settings' => 'main_cat_1',
            'label'   => 'Select Main Category 1:',
            'section'  => 'cat',
            'type'    => 'select',
            'choices' => $cats,
        ));

        // main cat 2
        $wp_customize->add_setting('main_cat_2', array(
            'default'        => $default,
            'capability'     => 'edit_theme_options',
            'type'           => 'option'

        ));
        $wp_customize->add_control( 'main_cat_2', array(
            'settings' => 'main_cat_2',
            'label'   => 'Select Main Category 2:',
            'section'  => 'cat',
            'type'    => 'select',
            'choices' => $cats,
        ));

        // main cat 3
        $wp_customize->add_setting('main_cat_3', array(
            'default'        => $default,
            'capability'     => 'edit_theme_options',
            'type'           => 'option'

        ));
        $wp_customize->add_control( 'main_cat_3', array(
            'settings' => 'main_cat_3',
            'label'   => 'Select Main Category 3:',
            'section'  => 'cat',
            'type'    => 'select',
            'choices' => $cats,
        ));

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


        // image 1
        $wp_customize->add_setting('cat_image_1', array(
            'default' => $url.'/image/1.jpg',
            'capability' => 'edit_theme_options',
            'type'       => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'cat_image_1', array(
            'label'    => __('Main cat. image 1', 'tp1'),
            'section'  => 'cat_image',
            'settings' => 'cat_image_1',
        )));

        // image 2
        $wp_customize->add_setting('cat_image_2', array(
            'default' => $url.'/image/2.jpg',
            'capability' => 'edit_theme_options',
            'type'       => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'cat_image_2', array(
            'label'    => __('Main cat. image 2', 'tp1'),
            'section'  => 'cat_image',
            'settings' => 'cat_image_2',
        )));

        // image 3
        $wp_customize->add_setting('cat_image_3', array(
            'default' => $url.'/image/3.jpg',
            'capability' => 'edit_theme_options',
            'type'       => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'cat_image_3', array(
            'label'    => __('Main cat. image 3', 'tp1'),
            'section'  => 'cat_image',
            'settings' => 'cat_image_3',
        )));


        // Settings
        $wp_customize->add_section('gen_settings', array(
            'title'    => __('Main Settings ', 'tp1'),
            'priority' => 160,
        ));

        // main color
        $wp_customize->add_setting('google_analytics', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'type'              => 'option',
        ));
        $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'gen_settings', array(
            'label'    => __('Google Analytics ', 'tp1'),
            'section'  => 'gen_settings',
            'settings' => 'google_analytics',
            'type' => 'text'
        )));



    }
    add_action('customize_register', 'theme_custom');
?>