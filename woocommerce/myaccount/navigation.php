<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<nav class="woocommerce-MyAccount-navigation">
    <?php
    global $wp;
    $current_slug = add_query_arg( array(), $wp->request );
//    echo $current_slug; // Display the slug of page
    ?>
	<ul>
        <li class="<?=$current_slug === 'my-account/edit-account' ? 'current-account-link' : '';?>">
            <a href="/my-account/edit-account/">
                <span class="account-menu-icon">
                    <?php if($current_slug === 'my-account/edit-account'){?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" fill="#181818"/><path d="M14 10C14 11.1046 13.1046 12 12 12C10.8954 12 10 11.1046 10 10C10 8.89543 10.8954 8 12 8C13.1046 8 14 8.89543 14 10Z" fill="#181818"/><path d="M6.27836 19.4259C6.23743 19.8381 6.5384 20.2054 6.95059 20.2463C7.36277 20.2873 7.73009 19.9863 7.77102 19.5741L6.27836 19.4259ZM16.229 19.5741C16.2699 19.9863 16.6372 20.2873 17.0494 20.2463C17.4616 20.2054 17.7626 19.8381 17.7216 19.4259L16.229 19.5741ZM20.25 12C20.25 16.5563 16.5563 20.25 12 20.25V21.75C17.3848 21.75 21.75 17.3848 21.75 12H20.25ZM12 20.25C7.44365 20.25 3.75 16.5563 3.75 12H2.25C2.25 17.3848 6.61522 21.75 12 21.75V20.25ZM3.75 12C3.75 7.44365 7.44365 3.75 12 3.75V2.25C6.61522 2.25 2.25 6.61522 2.25 12H3.75ZM12 3.75C16.5563 3.75 20.25 7.44365 20.25 12H21.75C21.75 6.61522 17.3848 2.25 12 2.25V3.75ZM13.25 10C13.25 10.6904 12.6904 11.25 12 11.25V12.75C13.5188 12.75 14.75 11.5188 14.75 10H13.25ZM12 11.25C11.3096 11.25 10.75 10.6904 10.75 10H9.25C9.25 11.5188 10.4812 12.75 12 12.75V11.25ZM10.75 10C10.75 9.30964 11.3096 8.75 12 8.75V7.25C10.4812 7.25 9.25 8.48122 9.25 10H10.75ZM12 8.75C12.6904 8.75 13.25 9.30964 13.25 10H14.75C14.75 8.48122 13.5188 7.25 12 7.25V8.75ZM7.77102 19.5741C7.98417 17.4272 9.79668 15.75 12 15.75V14.25C9.01797 14.25 6.56693 16.5194 6.27836 19.4259L7.77102 19.5741ZM12 15.75C14.2033 15.75 16.0158 17.4272 16.229 19.5741L17.7216 19.4259C17.4331 16.5194 14.982 14.25 12 14.25V15.75Z" fill="#181818"/><path d="M14.7607 10C14.7607 11.5188 13.5295 12.75 12.0107 12.75C10.492 12.75 9.26074 11.5188 9.26074 10C9.26074 8.48122 10.492 7.25 12.0107 7.25C13.5295 7.25 14.7607 8.48122 14.7607 10Z" fill="white"/><path d="M7 18C9.76143 20.7614 14.2386 20.7614 17 18C15.0996 13.629 8.90043 13.629 7 18Z" fill="white" stroke="white" stroke-linecap="round"/></svg>
                    <?php } else {?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M6.27836 19.4259C6.23743 19.8381 6.5384 20.2054 6.95059 20.2463C7.36277 20.2873 7.73009 19.9863 7.77102 19.5741L6.27836 19.4259ZM16.229 19.5741C16.2699 19.9863 16.6372 20.2873 17.0494 20.2463C17.4616 20.2054 17.7626 19.8381 17.7216 19.4259L16.229 19.5741ZM20.25 12C20.25 16.5563 16.5563 20.25 12 20.25V21.75C17.3848 21.75 21.75 17.3848 21.75 12H20.25ZM12 20.25C7.44365 20.25 3.75 16.5563 3.75 12H2.25C2.25 17.3848 6.61522 21.75 12 21.75V20.25ZM3.75 12C3.75 7.44365 7.44365 3.75 12 3.75V2.25C6.61522 2.25 2.25 6.61522 2.25 12H3.75ZM12 3.75C16.5563 3.75 20.25 7.44365 20.25 12H21.75C21.75 6.61522 17.3848 2.25 12 2.25V3.75ZM13.25 10C13.25 10.6904 12.6904 11.25 12 11.25V12.75C13.5188 12.75 14.75 11.5188 14.75 10H13.25ZM12 11.25C11.3096 11.25 10.75 10.6904 10.75 10H9.25C9.25 11.5188 10.4812 12.75 12 12.75V11.25ZM10.75 10C10.75 9.30964 11.3096 8.75 12 8.75V7.25C10.4812 7.25 9.25 8.48122 9.25 10H10.75ZM12 8.75C12.6904 8.75 13.25 9.30964 13.25 10H14.75C14.75 8.48122 13.5188 7.25 12 7.25V8.75ZM7.77102 19.5741C7.98417 17.4272 9.79668 15.75 12 15.75V14.25C9.01797 14.25 6.56693 16.5194 6.27836 19.4259L7.77102 19.5741ZM12 15.75C14.2033 15.75 16.0158 17.4272 16.229 19.5741L17.7216 19.4259C17.4331 16.5194 14.982 14.25 12 14.25V15.75Z" fill="#181818"/></svg>
                    <?php }?>
                </span>
                My Account
            </a>
        </li>
        <li class="<?=$current_slug === 'my-account/orders' ? 'current-account-link' : '';?>">
            <a href="/my-account/orders/">
                <span class="account-menu-icon">
                    <?php if($current_slug === 'my-account/orders'){?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M4 12.2C4 11.0799 4 10.5198 4.21799 10.092C4.40973 9.71569 4.71569 9.40973 5.09202 9.21799C5.51984 9 6.0799 9 7.2 9H16.8C17.9201 9 18.4802 9 18.908 9.21799C19.2843 9.40973 19.5903 9.71569 19.782 10.092C20 10.5198 20 11.0799 20 12.2V14.6C20 16.8402 20 17.9603 19.564 18.816C19.1805 19.5686 18.5686 20.1805 17.816 20.564C16.9603 21 15.8402 21 13.6 21H10.4C8.15979 21 7.03968 21 6.18404 20.564C5.43139 20.1805 4.81947 19.5686 4.43597 18.816C4 17.9603 4 16.8402 4 14.6V12.2Z" fill="#181818"/><path d="M9 11V6C9 4.34315 10.3431 3 12 3C13.6569 3 15 4.34315 15 6V10.9673M10.4 21H13.6C15.8402 21 16.9603 21 17.816 20.564C18.5686 20.1805 19.1805 19.5686 19.564 18.816C20 17.9603 20 16.8402 20 14.6V12.2C20 11.0799 20 10.5198 19.782 10.092C19.5903 9.71569 19.2843 9.40973 18.908 9.21799C18.4802 9 17.9201 9 16.8 9H7.2C6.0799 9 5.51984 9 5.09202 9.21799C4.71569 9.40973 4.40973 9.71569 4.21799 10.092C4 10.5198 4 11.0799 4 12.2V14.6C4 16.8402 4 17.9603 4.43597 18.816C4.81947 19.5686 5.43139 20.1805 6.18404 20.564C7.03968 21 8.15979 21 10.4 21Z" stroke="#181818" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 10V11" stroke="white" stroke-linecap="round"/><path d="M15 10V11" stroke="white" stroke-linecap="round"/></svg>
                    <?php } else {?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M9 11V6C9 4.34315 10.3431 3 12 3C13.6569 3 15 4.34315 15 6V10.9673M10.4 21H13.6C15.8402 21 16.9603 21 17.816 20.564C18.5686 20.1805 19.1805 19.5686 19.564 18.816C20 17.9603 20 16.8402 20 14.6V12.2C20 11.0799 20 10.5198 19.782 10.092C19.5903 9.71569 19.2843 9.40973 18.908 9.21799C18.4802 9 17.9201 9 16.8 9H7.2C6.0799 9 5.51984 9 5.09202 9.21799C4.71569 9.40973 4.40973 9.71569 4.21799 10.092C4 10.5198 4 11.0799 4 12.2V14.6C4 16.8402 4 17.9603 4.43597 18.816C4.81947 19.5686 5.43139 20.1805 6.18404 20.564C7.03968 21 8.15979 21 10.4 21Z" stroke="#181818" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <?php }?>
                </span>
                My Purchases
            </a>
        </li>
        <li class="<?=$current_slug === 'my-account/favorites' ? 'current-account-link' : '';?>">
            <a href="/my-account/favorites">
                <span class="account-menu-icon">
                    <?php if($current_slug === 'my-account/favorites'){?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 5.9687C10.2006 3.87168 7.19377 3.2236 4.93923 5.14384C2.68468 7.06408 2.36727 10.2746 4.13778 12.5457C5.60984 14.434 10.0648 18.4164 11.5249 19.7054C11.6882 19.8496 11.7699 19.9217 11.8652 19.95C11.9483 19.9747 12.0393 19.9747 12.1225 19.95C12.2178 19.9217 12.2994 19.8496 12.4628 19.7054C13.9229 18.4164 18.3778 14.434 19.8499 12.5457C21.6204 10.2746 21.3417 7.04388 19.0484 5.14384C16.7551 3.2438 13.7994 3.87168 12 5.9687Z" fill="#181818" stroke="#181818" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <?php } else {?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M10 2.9687C8.20058 0.87168 5.19377 0.223603 2.93923 2.14384C0.68468 4.06408 0.367271 7.27463 2.13778 9.5457C3.60984 11.434 8.06479 15.4164 9.52489 16.7054C9.68824 16.8496 9.76992 16.9217 9.86519 16.95C9.94834 16.9747 10.0393 16.9747 10.1225 16.95C10.2178 16.9217 10.2994 16.8496 10.4628 16.7054C11.9229 15.4164 16.3778 11.434 17.8499 9.5457C19.6204 7.27463 19.3417 4.04388 17.0484 2.14384C14.7551 0.243802 11.7994 0.87168 10 2.9687Z" stroke="#181818" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <?php }?>
                </span>
                Favourites
            </a>
        </li>
        <li></li>
        <li>
            <a href="<?php echo wp_logout_url( home_url() ); ?>">
                <span class="account-menu-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M17 15.9996L21 11.9996M21 11.9996L17 7.99963M21 11.9996H9M13 20.9996H6.20078C5.08068 20.9996 4.52062 20.9996 4.0928 20.7816C3.71648 20.5899 3.41052 20.2839 3.21877 19.9076C3.00078 19.4798 3.00078 18.9197 3.00078 17.7996V6.19963C3.00078 5.07953 3.00078 4.51948 3.21877 4.09165C3.41052 3.71533 3.71648 3.40937 4.0928 3.21762C4.52062 2.99963 5.08068 2.99963 6.20078 2.99963L13 2.99963" stroke="#181818" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                Logout
            </a>
        </li>

<!--		--><?php //foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
<!--			<li class="--><?php //echo wc_get_account_menu_item_classes( $endpoint ); ?><!--">-->
<!--				<a href="--><?php //echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?><!--">--><?php //echo esc_html( $label ); ?><!--</a>-->
<!--			</li>-->
<!--		--><?php //endforeach; ?>
	</ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
