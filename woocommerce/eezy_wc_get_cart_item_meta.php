<?php

/**
**  Name: Eezy Woocommerce Cart Item Meta
**  Version: 1.0
**  Support: Woocommerce > 3.1
**  Info: Get the meta info of variable cart item in a single line, separated by a defined value.
**
**  Output
**  Before: Color: Red, Size: L
**  After:  Red / L
**/

function eezy_wc_get_cart_item_meta($cart_item)
{
    $meta = "";
    $separator = " / ";

    if ($cart_item['variation'] && $cart_item['variation_id']) {
        $meta = array();
        $variations = $cart_item['variation'];
        $variation_id = $cart_item['variation_id'];
        foreach ($variations as $key => $variation) {
            $term = get_term_by('slug', $variation, str_replace("attribute_", "", $key));
            $name = $term->name;
            $id = $term->term_id;
            $meta[] = $term->name;
        }
        $meta = implode($separator,$meta);
    }

    return $meta; //always return something
}
?>
