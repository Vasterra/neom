<?php
    $logo_id = get_theme_mod( 'custom_logo' );
    $logo_image = wp_get_attachment_image_src( $logo_id, 'full' );
    $items_count = WC()->cart->get_cart_contents_count();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="main-shadow"></div>
<?php
global $wp;
$request = explode( '/', $wp->request );

if(!is_front_page() && ! ( end($request) == 'my-account' && is_account_page() )):?>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/sdk.js#xfbml=1&version=v16.0&appId=1586277431581856&autoLogAppEvents=1" nonce="BHvDZksk"></script>
    <div id="fb-root"></div>
    <div class="modal-wrap sharing-modal-js">
        <p class="text-right"><span class="close-modal-js c-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none"><path d="M1 12L11.9998 1.00023" stroke="#9C9C9C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M11.9998 11.9998L1 1" stroke="#9C9C9C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span></p>
        <p class="site_h1">Share</p>
        <div class="d-flex justify-center mb-25">
            <div class="fb-share-button modal-social" data-href="<?=get_the_title();?>" data-layout="" data-size="">
                <a style="background-image: url(/wp-content/uploads/2023/03/facebook.svg);" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?=get_page_link();?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"></a>
            </div>
            <div class="modal-social">
                <a style="background-image: url(/wp-content/uploads/2023/03/twitter.svg);" data-site="twitter" href="https://twitter.com/intent/tweet?text=<?=get_the_title();?>&amp;url=<?=get_page_link();?>&amp;via=" target="_blank"></a>
            </div>
            <div class="modal-social">
                <a style="background-image: url(/wp-content/uploads/2023/03/instagram.svg);" href="https://www.instagram.com/art_of_neom"></a>
            </div>
        </div>
        <div class="d-flex align-center">
            <span class="copied-link-js form-input fz-14" style="margin-right: 15px;">&nbsp;<?=get_page_link();?></span>
            <input class="copy-input-buffer-js" type="text" value="<?=get_page_link();?>">
            <div class="copy-link-buffer-js d-flex align-center c-pointer">
                <span class="fz-14 font-weight-600 copy-text-js">Copy Link</span>&nbsp;&nbsp;&nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                    <path d="M15.0005 3.5V6.9C15.0005 7.46005 15.0005 7.74008 15.1095 7.95399C15.2054 8.14215 15.3583 8.29513 15.5465 8.39101C15.7604 8.5 16.0404 8.5 16.6005 8.5H20.0005M10.0005 8.5H6.00049C4.89592 8.5 4.00049 9.39543 4.00049 10.5V19.5C4.00049 20.6046 4.89592 21.5 6.00049 21.5H12.0005C13.1051 21.5 14.0005 20.6046 14.0005 19.5V16.5M16.0005 3.5H13.2005C12.0804 3.5 11.5203 3.5 11.0925 3.71799C10.7162 3.90973 10.4102 4.21569 10.2185 4.59202C10.0005 5.01984 10.0005 5.5799 10.0005 6.7V13.3C10.0005 14.4201 10.0005 14.9802 10.2185 15.408C10.4102 15.7843 10.7162 16.0903 11.0925 16.282C11.5203 16.5 12.0804 16.5 13.2005 16.5H16.8005C17.9206 16.5 18.4806 16.5 18.9085 16.282C19.2848 16.0903 19.5908 15.7843 19.7825 15.408C20.0005 14.9802 20.0005 14.4201 20.0005 13.3V7.5L16.0005 3.5Z" stroke="#181818" stroke-width="1.5" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
    </div>
<?php endif;?>

<?php if(!is_user_logged_in()):

	if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
	  $protocol = 'https://';
	}
	else {
	  $protocol = 'http://';
	}

	$site_domain = $protocol.$_SERVER['SERVER_NAME'];
?>
<div class="login-modal">
    <p class="text-right">
        <span class="c-pointer close-login-js"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none"><path d="M1 12L11.9998 1.00023" stroke="#929292" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M11.9998 11.9999L1 1.00012" stroke="#929292" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
    </p>
    <div id="login-form" class="login-modal__item-form">
        <p class="site_h1 text-center">Log In</p>
        <div class="login-form-wrap">
            <div class="mb-2">
                <input type="email" class="form-input mb-1 user_login" placeholder="E-mail">
                <input type="password" class="form-input mb-05 user_pass password-input-js" placeholder="Password">
                <p class="fw-bold fz-12 mb-2 c-pointer login-modal-show-js" data-modal="#forgot-form">Forgot password?</p>
                <button class="site-submit-btn submit-js">Log In</button>
            </div>
            <p class="login-divider">Or</p>
        </div>
        <div class="login-form-wrap d-flex justify-center">
            <a href="<?=$site_domain;?>/?action=uwp_social_authenticate&provider=facebook&type=&redirect_to=<?=$site_domain;?>/my-account/edit-account/" class="social-login-link">
            	<img src="<?=get_template_directory_uri();?>/assets/images/facebook_login.svg" alt="">
            </a>
            <a href="<?=$site_domain;?>/?action=uwp_social_authenticate&provider=twitter&type=&redirect_to=<?=$site_domain;?>/my-account/edit-account/" class="social-login-link">
            	<img src="<?=get_template_directory_uri();?>/assets/images/twitter_login.svg" alt="">
            </a>
            <a href="<?=$site_domain;?>/?action=uwp_social_authenticate&provider=Instagram&type=&redirect_to=<?=$site_domain;?>/my-account/edit-account/" class="social-login-link">
            	<img src="<?=get_template_directory_uri();?>/assets/images/instagram_login.svg" alt="">
            </a>
            <a href="<?=$site_domain;?>/?action=uwp_social_authenticate&provider=google&type=&redirect_to=<?=$site_domain;?>/my-account/edit-account/" class="social-login-link">
            	<img src="<?=get_template_directory_uri();?>/assets/images/google_login.svg" alt="">
            </a>
        </div>
        <p class="text-center fz-12"><span class="color-9C9C9C">Don't have account?</span> <span class="fw-bold c-pointer login-modal-show-js" data-modal="#register-form">Sign Up</span></p>
    </div>

    <div id="forgot-form" class="login-modal__item-form">
        <p class="site_h1 text-center mb-1">Forgot Password</p>
        <div class="login-form-wrap">
            <p class="color-9C9C9C fz-12 text-center mb-2">Enter the email address associated with your account to reset your password.</p>
            <input type="email" class="form-input mb-05 user_login" placeholder="E-mail">
            <p class="color-9C9C9C fz-12 mb-2 forgot-form-description-js" data-modal="#forgot-form">We will send you an email to verify</p>
            <button class="mb-1 site-submit-btn submit-js">Confirm</button>
            <p class="fw-bold fz-12 mb-2 c-pointer login-modal-show-js" data-modal="#login-form">I remember my password</p>
        </div>
    </div>

    <div id="email-verification-form" class="login-modal__item-form">
        <p class="site_h1 text-center mb-1">E-mail verification</p>
        <div class="login-form-wrap">
            <p class="color-9C9C9C fz-12 text-center mb-2">Please check your inbox and enter the code you received. The email was sent to: <span class="fw-bold color-base email-to-send-js"></span></p>
            <div class="d-flex justify-center mb-2">
                <div class="input-num-wrap"><input type="text" class="input-num-js" id="num1" data-index="1"></div>
                <div class="input-num-wrap"><input type="text" class="input-num-js" id="num2" data-index="2"></div>
                <div class="input-num-wrap"><input type="text" class="input-num-js" id="num3" data-index="3"></div>
                <div class="input-num-wrap"><input type="text" class="input-num-js" id="num4" data-index="4"></div>
            </div>
            <button class="mb-1 site-submit-btn submit-js">Confirm</button>
            <p class="fw-bold fz-12 mb-2 c-pointer resend-code-js">I have not received anything, resend code</p>
        </div>
    </div>

    <div id="change-password-form" class="login-modal__item-form">
        <p class="site_h1 text-center mb-1">Create a new password</p>
        <div class="login-form-wrap">
            <input type="password" class="form-input mb-05 user_pass password-input-js" placeholder="Password">
            <input type="password" class="form-input mb-2 user_pass_confirm password-input-js" placeholder="New Password">
            <button class="site-submit-btn submit-js">Save</button>
        </div>
    </div>

    <div id="changed-password-success" class="login-modal__item-form text-center">
        <div class="login-form-wrap">
            <p class="site_h1 mb-2">Password changed successfully</p>
            <p class="mb-2"><img src="/wp-content/uploads/2023/04/password_changed.svg" alt=""></p>
            <button class="site-submit-btn login-modal-show-js" data-modal="#login-form">Log In</button>
        </div>
    </div>

    <div id="register-form" class="login-modal__item-form">
        <p class="site_h1 text-center">Sign Up</p>
        <div class="login-form-wrap">
            <div class="mb-2">
                <input type="email" class="form-input mb-1 user_login" placeholder="E-mail">
                <input type="password" class="form-input mb-05 user_pass password-input-js" placeholder="Password">
                <input type="password" class="form-input mb-30 user_pass_confirm password-input-js" placeholder="Confirm Password">
                <button class="site-submit-btn submit-js">Sign Up</button>
            </div>
            <p class="login-divider">Or</p>
        </div>
        <div class="login-form-wrap">
            [social sign Up plugin]
        </div>
        <p class="text-center fz-12"><span class="color-9C9C9C">Already have an account?</span> <span class="fw-bold c-pointer login-modal-show-js" data-modal="#login-form">Log In</span></p>
    </div>
</div>
<?php endif;?>

<div id="wrapper" class="hfeed" style="background-color: <?=is_account_page() || is_cart() || is_checkout() ? '#F6F6F6' : '#fff';?>;">
    <div class="top-header text-center">
        <span class="white-top-js">"Be the First to Experience the Next Level of Style and Show it Off"</span>
        <span class="yellow-top-js" style="color: #E5F33C;display: none;">"Shop Now and Save: Exclusive Launch Discounts, Unlock 25% off"</span>
    </div>
    <header id="header" role="banner">
    <div id="branding" class="container d-flex justify-space-between align-center">
        <div>
            <a href="/" class="logo" style="background-image: url(<?=$logo_image[0];?>);"></a>
            <a href="/" class="logo logo-main-hover" style="background-image: url(<?='/wp-content/uploads/2023/03/Logo-1.svg';?>);"></a>
        </div>

        <nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
        <?php wp_nav_menu( array( 'theme_location' => '', 'menu' => 'Top menu', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>' ) ); ?>
        </nav>

        <div class="d-flex align-center">
            <span class="c-pointer search-btn-js">
                <svg xmlns="http://www.w3.org/2000/svg" class="top-menu-svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M14.6725 14.6412L19 19M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z" stroke="#181818" stroke-width="1.50477" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <div id="lang-switcher">
                <?=do_shortcode('[gtranslate]');?>
            </div>
            <div class="position-relative">
                <a href="/cart">
                    <svg xmlns="http://www.w3.org/2000/svg" class="top-menu-svg" width="20" height="18" viewBox="0 0 20 18" fill="none"><path d="M18 7L16.5145 14.4276C16.3312 15.3439 16.2396 15.8021 16.0004 16.1448C15.7894 16.447 15.499 16.685 15.1613 16.8326C14.7783 17 14.3111 17 13.3766 17H6.62337C5.6889 17 5.22166 17 4.83869 16.8326C4.50097 16.685 4.2106 16.447 3.99964 16.1448C3.76041 15.8021 3.66878 15.3439 3.48551 14.4276L2 7M1 7H19M6 10V10.01M14 10V10.01M4 7L7 1M16 7L13 1" stroke="#181818" stroke-width="1.50495" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <span class="cart-count position-absolute"><?=$items_count < 10 ? $items_count : '9+';?></span>
            </div>
            <div style="margin-left: <?=$items_count < 10 ? '12' : '17';?>px;">
                <?php if(is_user_logged_in()){?>
                <a href="/my-account/edit-account/">
                    <svg xmlns="http://www.w3.org/2000/svg" class="top-menu-svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#181818" stroke-width="1.50495" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="#181818" stroke-width="1.50495" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <?php }else{?>
                <span id="show-login-form-js" class="c-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="top-menu-svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#181818" stroke-width="1.50495" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="#181818" stroke-width="1.50495" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <?php }?>
            </div>
        </div>

    </div>
    </header>
    <div id="search" class="d-flex">
        <?php get_search_form(); ?>
    </div>
    <?php
    if(!is_front_page() && !is_account_page() && !is_product() && !is_cart() && !is_checkout()):?>
        <div class="top-share">
            <div class="container d-flex flex-end">
                <span class="d-flex align-center c-pointer share-modal-js"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.15036 4.34917C9.0787 4.10667 9.04036 3.84917 9.04036 3.58333C9.04036 2.08833 10.2537 0.875 11.7487 0.875C13.2437 0.875 14.457 2.08833 14.457 3.58333C14.457 5.07833 13.2437 6.29167 11.7487 6.29167C10.9704 6.29167 10.2687 5.9625 9.77453 5.43667L5.94703 8.03583C6.0612 8.33583 6.1237 8.66083 6.1237 9C6.1237 9.33917 6.0612 9.66417 5.94703 9.96417L9.77453 12.5633C10.2687 12.0375 10.9704 11.7083 11.7487 11.7083C13.2437 11.7083 14.457 12.9217 14.457 14.4167C14.457 15.9117 13.2437 17.125 11.7487 17.125C10.2537 17.125 9.04036 15.9117 9.04036 14.4167C9.04036 14.1508 9.0787 13.8933 9.15036 13.6508L5.2437 10.9975C4.7612 11.4392 4.11953 11.7083 3.41536 11.7083C1.92036 11.7083 0.707031 10.495 0.707031 9C0.707031 7.505 1.92036 6.29167 3.41536 6.29167C4.11953 6.29167 4.7612 6.56083 5.2437 7.0025L9.15036 4.34917ZM11.7487 12.9583C12.5537 12.9583 13.207 13.6117 13.207 14.4167C13.207 15.2217 12.5537 15.875 11.7487 15.875C10.9437 15.875 10.2904 15.2217 10.2904 14.4167C10.2904 13.6117 10.9437 12.9583 11.7487 12.9583ZM3.41536 7.54167C4.22036 7.54167 4.8737 8.195 4.8737 9C4.8737 9.805 4.22036 10.4583 3.41536 10.4583C2.61036 10.4583 1.95703 9.805 1.95703 9C1.95703 8.195 2.61036 7.54167 3.41536 7.54167ZM11.7487 2.125C12.5537 2.125 13.207 2.77833 13.207 3.58333C13.207 4.38833 12.5537 5.04167 11.7487 5.04167C10.9437 5.04167 10.2904 4.38833 10.2904 3.58333C10.2904 2.77833 10.9437 2.125 11.7487 2.125Z" fill="#181818"/></svg>&nbsp;Share</span>
            </div>
        </div>
    <?php
    endif;

    if(is_front_page()):?>
        <div id="main-gallery-header" class="position-relative">
            <div class="d-flex">
            <?php
            $header_banner_imgs = get_posts([
                'category_name'          => 'header-banner',
                'posts_per_page'    => -1,
                'post_type'         => 'post',
                'orderby'           => 'name',
                'order'             => 'ASC',
            ]);
            global $post;

            foreach( $header_banner_imgs as $post ):
                setup_postdata( $post );
                $img_srs = '';
                if (has_post_thumbnail( $post->ID ) ) {
                    $img_srs = get_the_post_thumbnail_url($post->ID, [320, 400]);
                }?>
                <div class="main-gallery-header__item test" style="background-image: url(<?=$img_srs;?>);"></div>
            <?php
            endforeach;
            wp_reset_postdata();?>

            </div>
            <div class="main-gallery-header__description text-center">
                <h1>Unlock the Beauty of Digital Art</h1>
                <p>Explore our in-house collection and elevate your space</p>
                <a href="/product-category/gallery" class="site-black-btn">View Our Collection</a>
            </div>
        </div>
        <div class="main-page-container-js">
            <div class="container">
                <section class="mb-100">
                    <?php
                    $query = new WC_Product_Query( array(
                        'limit' => -1,
                        'orderby' => 'date',
                        'order' => 'ASC',
                        'category' => ['best-sellers']
                    ) );
                    $products = $query->get_products();
                    wp_reset_postdata();
                    ?>

                    <p class="site_h1">Best Sellers</p>
                    <div class="position-relative">
                        <div id="main-best-sellers" class="swiper carousel-view">
                            <div class="swiper-wrapper">
                                <?php foreach ($products as $product):?>
                                <div class="swiper-slide">
                                    <?php $mage = wp_get_attachment_image_src($product->image_id, $size= [390,500], $icon = false);?>
                                    <a href="<?=$product->get_permalink();?>" class="product-img text-right" style="background-image: url(<?=$mage[0];?>);">
                                        <span class="like-btn"><?=do_shortcode('[favorite_button post_id = '.$product->id.']');?></span >
                                    </a>
                                    <div class="d-flex justify-space-between bestseller-info">
                                        <span class="bestseller-info__name"><?=$product->name;?></span>

                                        <?php
                                        if ( $product->is_type( 'variable' ) ) {?>
                                            <p class="bestseller-info__price">
                                                <?=number_format($product->get_variation_regular_price('min', true),0);?>
                                                -
                                                <?=number_format($product->get_variation_regular_price('max', true),0).' '.get_woocommerce_currency_symbol();?>
                                            </p>
                                        <?php } else {
                                            if ($product->sale_price) { ?>
                                                <div class="d-flex align-center">
                                                    <span class="bestseller-info__old-price"><?= $product->regular_price . ' ' . get_woocommerce_currency_symbol(); ?></span>
                                                    <span class="bestseller-info__price regular-price"><?= $product->price . ' ' . get_woocommerce_currency_symbol(); ?></span>
                                                </div>
                                            <?php } else { ?>
                                                <span class="bestseller-info__price"><?= $product->price . ' ' . get_woocommerce_currency_symbol(); ?></span>
                                            <?php }
                                        }?>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="carousel-prev-next">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </section>

                <section class="mb-100">
                    <?php
                    $query = new WC_Product_Query( array(
                        'limit' => -1,
                        'orderby' => 'date',
                        'order' => 'ASC',
                        'category' => ['gallery']
                    ) );
                    $products = $query->get_products();
                    wp_reset_postdata();
                    ?>
                    <p class="site_h1">Gallery</p>
                    <div class="d-flex">
                        <div class="main-gallery-wrap position-relative">
                            <div id="main-gallery" class="swiper">
                                <div class="swiper-wrapper">
                                    <?php foreach ($products as $product):?>
                                        <div class="swiper-slide">
                                            <?php $mage = wp_get_attachment_image_src($product->image_id, $size= [550, 475], $icon = false);?>
                                            <a href="<?=$product->get_permalink();?>" class="product-img text-right" style="background-image: url(<?=$mage[0];?>)"></a>
                                            <div class="bestseller-info">
                                                <a href="<?=$product->get_permalink();?>" class="bestseller-info__name"><?=$product->name;?></a>
                                                <?php if ( $product->is_type( 'variable' ) ) {?>
                                                <p class="bestseller-info__price">
                                                    <?=number_format($product->get_variation_regular_price('min', true),0);?>
                                                    -
                                                    <?=number_format($product->get_variation_regular_price('max', true),0).' '.get_woocommerce_currency_symbol();?>
                                                </p>
                                                <?php } else {
                                                if($product->sale_price) { ?>
                                                    <div class="d-flex align-center">
                                                        <span class="bestseller-info__old-price"><?=$product->regular_price.' '.get_woocommerce_currency_symbol();?></span>
                                                        <span class="bestseller-info__price regular-price"><?=$product->price.' '.get_woocommerce_currency_symbol();?></span>
                                                    </div>
                                                <?php } else {?>
                                                    <p class="bestseller-info__price"><?=$product->price.' '.get_woocommerce_currency_symbol();?></p>
                                                <?php }
                                                }?>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>

                        <div class="main-gallery-blocks-wrap position-relative">
                            <div id="main-gallery-blocks" class="swiper">
                                <div class="swiper-wrapper">
                                    <?php foreach($products as $key => $product):
                                        if($key%6 === 0) {
                                            if($key > 0) {
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                            echo '<div class="swiper-slide">';
                                            echo '<div class="swiper-block-item d-flex flex-wrap">';
                                        }
                                    ?>

                                    <div class="main-gallery-blocks__item">
                                        <?php $mage = wp_get_attachment_image_src($product->image_id, $size= [165, 205], $icon = false);?>
                                        <a href="<?=$product->get_permalink();?>" class="product-img text-right" style="background-image: url(<?=$mage[0];?>)"></a>
                                        <div class="bestseller-info">
                                            <a href="<?=$product->get_permalink();?>" class="bestseller-info__name"><?=$product->name;?></a>
                                            <?php if ( $product->is_type( 'variable' ) ) {?>
                                            <p class="bestseller-info__price">
                                                <?=number_format($product->get_variation_regular_price('min', true),0);?>
                                                -
                                                <?=number_format($product->get_variation_regular_price('max', true),0).' '.get_woocommerce_currency_symbol();?>
                                            </p>
                                            <?php } else {
                                            if($product->sale_price) { ?>
                                                <div class="d-flex align-center">
                                                    <span class="bestseller-info__old-price"><?=$product->regular_price.' '.get_woocommerce_currency_symbol();?></span>
                                                    <span class="bestseller-info__price regular-price"><?=$product->price.' '.get_woocommerce_currency_symbol();?></span>
                                                </div>
                                            <?php } else {?>
                                                <p class="bestseller-info__price"><?=$product->price.' '.get_woocommerce_currency_symbol();?></p>
                                            <?php }
                                            }?>
                                        </div>
                                    </div>

                                    <?php 
                                    endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    <?php endif;?>

    <div id="container">
    <main id="content" class="container" role="main">