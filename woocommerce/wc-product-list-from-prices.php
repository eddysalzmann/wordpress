<?php

  /**
  **  Exchange "$10 - $20" with "from $10" on the product loop prices
  **/
  
  add_filter('woocommerce_variable_sale_price_html', 'theme_variable_price_format', 10, 2);
  add_filter('woocommerce_variable_price_html', 'theme_variable_price_format', 10, 2);
  function jonathan_variable_price_format($price, $product)
  {
      $prefix = sprintf('%s ', __('from', 'theme'));
      
      $min_price_regular  = $product->get_variation_regular_price('min', true);
      $min_price_sale     = $product->get_variation_sale_price('min', true);
      $max_price          = $product->get_variation_price('max', true);
      $min_price          = $product->get_variation_price('min', true);
      $price              = ($min_price_sale == $min_price_regular) ? wc_price($min_price_regular) : '<del>' . wc_price($min_price_regular) . '</del>' . '<ins>' . wc_price($min_price_sale) . '</ins>';
        
      return ($min_price == $max_price) ? $price : sprintf('%s%s', $prefix, $price);
  }
 
 ?>
