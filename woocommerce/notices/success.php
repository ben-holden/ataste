<?php
/**
 * Show messages
 *
 * @author      brasofilo
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! $messages ) return;

foreach ( $messages as $message ) : 
    if ( strpos( $message, 'Basket updated.' ) === false && strpos ( $message, 'added to your basket' ) === false ) :
        ?>
            <div class="woocommerce-message"><?php echo wp_kses_post( $message ); ?></div>
        <?php 
    endif;
endforeach;