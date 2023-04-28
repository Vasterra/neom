<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
?>
<div class="gallery-page-wrap">
<?php
$query = new WC_Product_Query( array(
    'limit' => -1,
    'orderby'   => 'date',
    'order'     => 'ASC',
    'category'  => ['gallery']
) );
$products = $query->get_products();
wp_reset_postdata();
?>

<div id="total-gallery-blocks" class="swiper">
    <div class="swiper-wrapper">
        <?php foreach($products as $key => $product):
            if($key%16 === 0) {
                if($key > 0) {
                    echo '</div>';
                    echo '</div>';
                }
                echo '<div class="swiper-slide">';
                echo '<div class="swiper-block-item d-flex flex-wrap">';
            }
        ?>

        <div class="gallery-page__item">
            <?php $mage = wp_get_attachment_image_src($product->image_id, $size='full', $icon = false);?>
            <a href="<?=$product->get_permalink();?>" class="product-img text-right" style="background-image: url(<?=$mage[0];?>)">
                <span class="like-btn"><?=do_shortcode('[favorite_button post_id = '.$product->id.']');?></span >
            </a>
            <div class="bestseller-info d-flex justify-space-between">
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
                    <span class="bestseller-info__price"><?=$product->price.' '.get_woocommerce_currency_symbol();?></span>
                <?php }
                    }?>
            </div>
        </div>

        <?php endforeach;?>
    </div>
</div>
</div>
</div>
<div class="total-gallery-navigation position-relative d-flex align-center">
    <div class="swiper-button-prev"></div>
    <div class="pagination text-center"></div>
    <div class="swiper-button-next"></div>
</div>

<?php

//if ( woocommerce_product_loop() ) {
//
//	/**
//	 * Hook: woocommerce_before_shop_loop.
//	 *
//	 * @hooked woocommerce_output_all_notices - 10
//	 * @hooked woocommerce_result_count - 20
//	 * @hooked woocommerce_catalog_ordering - 30
//	 */
//
//	woocommerce_product_loop_start();
//
//	if ( wc_get_loop_prop( 'total' ) ) {
//		while ( have_posts() ) {
//			the_post();
//
//			/**
//			 * Hook: woocommerce_shop_loop.
//			 */
//			do_action( 'woocommerce_shop_loop' );
//
//			wc_get_template_part( 'content', 'product' );
//		}
//	}
//
//	woocommerce_product_loop_end();
//
//	/**
//	 * Hook: woocommerce_after_shop_loop.
//	 *
//	 * @hooked woocommerce_pagination - 10
//	 */
//	do_action( 'woocommerce_after_shop_loop' );
//} else {
//	/**
//	 * Hook: woocommerce_no_products_found.
//	 *
//	 * @hooked wc_no_products_found - 10
//	 */
//	do_action( 'woocommerce_no_products_found' );
//}
//
///**
// * Hook: woocommerce_after_main_content.
// *
// * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
// */
//do_action( 'woocommerce_after_main_content' );
//
///**
// * Hook: woocommerce_sidebar.
// *
// * @hooked woocommerce_get_sidebar - 10
// */
//do_action( 'woocommerce_sidebar' );
?>
</div>
<?php
get_footer( 'shop' );
