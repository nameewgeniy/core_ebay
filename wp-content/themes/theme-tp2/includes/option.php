<?php
/**
 * Set default option
 * Date: 06.11.14
 * Time: 17:22
 */

$url = get_template_directory_uri();

if (!get_option('color-price'))
    add_option('color-price', '#E74C3C');

if (!get_option('count_featured'))
    add_option('count_featured', '6');

if (!get_option('enable_features'))
    add_option('enable_features', '1');

if (!get_option('enable_news'))
    add_option('enable_news', '1');

if (!get_option('enable_slide'))
    add_option('enable_slide', '1');

if (!get_option('color-1'))
    add_option('color-1', '#34495E');

if (!get_option('color-2'))
    add_option('color-2', '#E74C3C');

if (!get_option('color-3'))
    add_option('color-3', '#3498DB');

if (!get_option('color-4'))
    add_option('color-4', '#F5791F');

if (!get_option('color-5'))
    add_option('color-5', '#2ECC71');

if (!get_option('color-6'))
    add_option('color-6', '#9B59B6');

if (!get_option('wrap'))
    add_option('wrap', '#E0F2F6');

if (!get_option('body'))
    add_option('body', '#E0E0E0');


if (!get_option('logo_top'))
    add_option('logo_top', $url.'/image/logo-top.png');

if (!get_option('gen_color_button'))
    add_option('gen_color_button', '#FFC809');

if (!get_option('gen_color_button_hover'))
    add_option('gen_color_button_hover', '#E4AD00');

if (!get_option('image_1'))
   add_option('image_1', $url.'/image/slide1.jpg');

if (!get_option('image_2'))
    add_option('image_2', $url.'/image/slide2.jpg');

if (!get_option('image_3'))
    add_option('image_3', $url.'/image/slide3.jpg');

