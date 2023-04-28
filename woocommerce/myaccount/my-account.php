<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
do_action( 'woocommerce_account_navigation' );

global $wp;
$current_slug = add_query_arg( array(), $wp->request );
$title = '';

switch ($current_slug) {
    case 'my-account/edit-account':
        $title = 'My Account';
        break;
    case 'my-account/orders':
        $title = 'My Purchases';
        break;
    case 'my-account/favorites':
        $title = 'Favourite';
        break;
    default:
        break;
}
?>

<div class="woocommerce-MyAccount-content">
    <h1 class="site_h1 text-left"><?=$title;?></h1>
	<?php
		/**
		 * My Account content.
		 *
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_account_content' );
	?>
</div>
