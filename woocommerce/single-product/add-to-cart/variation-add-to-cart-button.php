<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>
<div class="woocommerce-variation-add-to-cart variations_button">
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	<?php
	do_action( 'woocommerce_before_add_to_cart_quantity' );

	woocommerce_quantity_input(
		array(
			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
		)
	);

	do_action( 'woocommerce_after_add_to_cart_quantity' );
	?>

	<button type="submit" class="single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>">Add to Cart<svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
            <path d="M15.4167 6.33398L14.1787 12.5236C14.026 13.2872 13.9497 13.669 13.7503 13.9546C13.5745 14.2065 13.3325 14.4048 13.0511 14.5278C12.732 14.6673 12.3426 14.6673 11.5639 14.6673H5.93614C5.15741 14.6673 4.76805 14.6673 4.4489 14.5278C4.16747 14.4048 3.9255 14.2065 3.7497 13.9546C3.55034 13.669 3.47398 13.2872 3.32126 12.5236L2.08333 6.33398M1.25 6.33398H16.25M5.41667 8.83398V8.84232M12.0833 8.83398V8.84232M3.75 6.33398L6.25 1.33398M13.75 6.33398L11.25 1.33398" stroke="white" stroke-width="1.25413" stroke-linecap="round" stroke-linejoin="round"/>
        </svg></button>

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>
