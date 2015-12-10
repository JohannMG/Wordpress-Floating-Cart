<?php

/*
Plugin Name: Mobile Floating Cart
Plugin URI: http://www.johannmg.com
Description:  Add a simple floating cart button to mobile site. Uses WooCommerce
Author: JohannMG
Version: 1.3

Ref: https://premium.wpmudev.org/blog/create-google-analytics-plugin/
 */

add_action( 'wp_footer', 'add_floating_cart' );


function add_floating_cart(){
  
  $landurl = $_SERVER['REQUEST_URI']; 
  if (strpos($landurl, 'cart') !== false ||  strpos($landurl, 'checkout') !== false ){
    return;
  }
  
  $itemcount = WC()->cart->cart_contents_count;  //int
  $itemsPlural = _n('item', 'items', $itemcount);
?>
  <div class="cart-floating">
    <div class="cartcontainer">
      <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
        <h3>CART <span class="item-count">(<?php echo $itemcount; ?> <?php echo $itemsPlural; ?>)</span></h3>
      </a>
    </div>  
  </div>
<?php

  wp_register_style( 'floating-cart',  plugin_dir_url( __FILE__ ) . 'css/floating-cart.css');
  wp_enqueue_style( 'floating-cart' );


}

