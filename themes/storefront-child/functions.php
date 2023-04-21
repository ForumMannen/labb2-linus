<?php
//Tar bort sidebar genom filter
remove_action('woocommerce_sidebar', 'remove_sidebar');

function remove_sidebar()
{
    return false;
}

add_filter('is_active_sidebar', 'remove_sidebar', 10, 2);

add_action('after_setup_theme', 'my_remove_product_result_count', 99);

function my_remove_product_result_count()
{
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20);
}

add_action('after_setup_theme', 'my_remove_catalog_ordering', 99);

function my_remove_catalog_ordering()
{
    remove_action('woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10);
}

add_action('storefront_before_content', 'free_shipping');

function free_shipping()
{
    echo '<div class="test">' . "Fri frakt vid köp över 299:-" . '</div>';
}
