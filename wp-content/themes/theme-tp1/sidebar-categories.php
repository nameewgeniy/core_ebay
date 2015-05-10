<?php
$args = array(

    'orderby' => 'rand',
    'number' => '8',
);

$categories = get_terms('catproducts', $args);

foreach($categories as $cat)
{
    echo '<a href="' . get_term_link((int)$cat->term_id,'catproducts') . '">' . $cat->name . '</a>';
}



