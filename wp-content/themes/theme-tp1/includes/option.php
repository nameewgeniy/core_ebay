<?php
/**
 * Set default option
 * Date: 06.11.14
 * Time: 17:22
 */

$url = get_template_directory_uri();

if (!get_option('gen_color_link'))
    add_option('gen_color_link', '#F77B7D');

if (!get_option('main_color'))
    add_option('main_color', '#00B2B7');

if (!get_option('gen_color_button'))
    add_option('gen_color_button', '#FFC809');

if (!get_option('gen_color_button_hover'))
    add_option('gen_color_button_hover', '#E4AD00');

if (!get_option('image_1'))
   add_option('image_1', $url.'/image/image-1.jpg');

if (!get_option('image_2'))
    add_option('image_2', $url.'/image/image-2.jpg');

if (!get_option('image_3'))
    add_option('image_3', $url.'/image/image-3.jpg');

if (!get_option('cat_image_3'))
    add_option('cat_image_3', $url.'/image/3.jpg');

if (!get_option('cat_image_2'))
    add_option('cat_image_2', $url.'/image/2.jpg');

if (!get_option('cat_image_1'))
    add_option('cat_image_1', $url.'/image/1.jpg');