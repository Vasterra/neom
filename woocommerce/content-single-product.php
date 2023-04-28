<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
//do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'mb-40 product-page-item', $product ); ?> style="margin-top: 25px;">
    <?php $image = wp_get_attachment_image_src($product->image_id, $size=array(550,595), $icon = false);?>

    <div class="d-flex">
        <div id="product-thumbs" class="product-left-part">
            <?php $attachment_ids = $product->get_gallery_image_ids();
            if(count($attachment_ids)){?>
                <div thumbsSlider="" id="productSwiper" class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide c-pointer">
                            <?php $first_image = wp_get_attachment_image_src($product->image_id, $size=array(70,95), $icon = false);?>
                            <div class="slide-img" style="<?=$first_image ? 'background-image: url('.$first_image[0].');' : 'background-color: #F7F7F7;';?>"></div>
                        </div>
                        <?php
                        foreach( $attachment_ids as $attachment_id ):
                            $thumbnail_image_url = wp_get_attachment_image_url( $attachment_id, array(70,95) );?>
                            <div class="swiper-slide c-pointer">
                                <div class="slide-img" style="background-image: url(<?=$thumbnail_image_url?>)"></div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
                <div id="productSwiper2" class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div id="advance<?=$product->image_id;?>" class="slide-img parent-img-wrap-js" style="<?=$image ? 'background-image: url('.$image[0].');' : 'background-color: #F7F7F7;';?>"></div>
                        </div>
                        <?php
                        foreach( $attachment_ids as $attachment_id ):
                            $original_image_url = wp_get_attachment_image_url( $attachment_id, array(550,595) );?>
                            <div class="swiper-slide">
                                <div id="advance<?=$attachment_id;?>" class="slide-img parent-img-wrap-js" style="background-image: url(<?=$original_image_url?>)"></div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            <?php } else {
                    if($image){?>
                        <div id="advance<?=$product->image_id;?>" class="single-product-image parent-img-wrap-js" style="background-image: url(<?=$image[0];?>); position: relative;"></div>
                    <?php } else {?>
                        <div class="single-product-image" style="background-color: #121313;"></div>
                    <?php }?>

            <?php }?>
        </div>
        <div class="product-right-part flex-1">
            <div class="d-flex justify-space-between w-100 mb-25">
                <h1 class="product_h1"><?=$product->name;?></h1>

                <div class="d-flex align-center">
                    <div class="d-flex align-center" style="margin-right: 18px;"><?=do_shortcode('[favorite_button post_id = '. get_the_ID() .']');?></div>
                    <div class="container d-flex flex-end">
                        <span class="d-flex align-center c-pointer share-modal-js"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.15036 4.34917C9.0787 4.10667 9.04036 3.84917 9.04036 3.58333C9.04036 2.08833 10.2537 0.875 11.7487 0.875C13.2437 0.875 14.457 2.08833 14.457 3.58333C14.457 5.07833 13.2437 6.29167 11.7487 6.29167C10.9704 6.29167 10.2687 5.9625 9.77453 5.43667L5.94703 8.03583C6.0612 8.33583 6.1237 8.66083 6.1237 9C6.1237 9.33917 6.0612 9.66417 5.94703 9.96417L9.77453 12.5633C10.2687 12.0375 10.9704 11.7083 11.7487 11.7083C13.2437 11.7083 14.457 12.9217 14.457 14.4167C14.457 15.9117 13.2437 17.125 11.7487 17.125C10.2537 17.125 9.04036 15.9117 9.04036 14.4167C9.04036 14.1508 9.0787 13.8933 9.15036 13.6508L5.2437 10.9975C4.7612 11.4392 4.11953 11.7083 3.41536 11.7083C1.92036 11.7083 0.707031 10.495 0.707031 9C0.707031 7.505 1.92036 6.29167 3.41536 6.29167C4.11953 6.29167 4.7612 6.56083 5.2437 7.0025L9.15036 4.34917ZM11.7487 12.9583C12.5537 12.9583 13.207 13.6117 13.207 14.4167C13.207 15.2217 12.5537 15.875 11.7487 15.875C10.9437 15.875 10.2904 15.2217 10.2904 14.4167C10.2904 13.6117 10.9437 12.9583 11.7487 12.9583ZM3.41536 7.54167C4.22036 7.54167 4.8737 8.195 4.8737 9C4.8737 9.805 4.22036 10.4583 3.41536 10.4583C2.61036 10.4583 1.95703 9.805 1.95703 9C1.95703 8.195 2.61036 7.54167 3.41536 7.54167ZM11.7487 2.125C12.5537 2.125 13.207 2.77833 13.207 3.58333C13.207 4.38833 12.5537 5.04167 11.7487 5.04167C10.9437 5.04167 10.2904 4.38833 10.2904 3.58333C10.2904 2.77833 10.9437 2.125 11.7487 2.125Z" fill="#181818"/></svg>&nbsp;Share</span>
                    </div>
                </div>
            </div>
            <div class="mb-25">
                <?=$product->get_description();?>
            </div>
            <div id="woocommerce_single_product_summary" class="mb-25 <?=$product->is_type( 'variable' ) ? 'variable-summary' : '';?>">
                <?php do_action( 'woocommerce_single_product_summary' );?>
            </div>
            <div>
                <p class="block-header mb-25">Product Details</p>
                <div style="border-top: 1px solid #E9E9E9;">
                    <?php foreach (acf_get_fields('group_642fe566974ab') as $field):?>
                        <?php if( get_field($field['name']) ): ?>
                        <div class="accorion-item">
                            <div class="accordion-item__head">
                                <div class="accordion-item__icon">
                                    <span class="closed-icon">+</span>
                                    <span class="opened-icon">-</span>
                                </div>
                                <p><?=$field['label'];?></p>
                            </div>
                            <div class="accordion-item__body">
                                <?=get_field($field['name']);?>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>



	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
//	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
//		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
//	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>



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
<div class="container">
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
                <?php $mage = wp_get_attachment_image_src($product->image_id, $size=[265,370], $icon = false);?>
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
</div>
<div class="total-gallery-navigation position-relative d-flex justify-center align-center mb-25">
    <div class="swiper-button-prev"></div>
    <div class="pagination text-center" style="width: auto;"></div>
    <div class="swiper-button-next"></div>
</div>

<?php //do_action( 'woocommerce_after_single_product' ); ?>
