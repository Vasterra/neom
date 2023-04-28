<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vasterra
 * Template Name: On Sale Page
 */

get_header();
?>

    <div class="gallery-page-wrap">
<?php
$query = new WC_Product_Query( array(
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
            if($product->sale_price) {
                if($key%16 === 0) {
                    if($key > 0) {
                        echo '</div>';
                        echo '</div>';
                    }
                    echo '<div class="swiper-slide">';
                    echo '<div class="swiper-block-item d-flex flex-wrap">';
                }?>

                <div class="gallery-page__item">
                    <?php $mage = wp_get_attachment_image_src($product->image_id, $size='full', $icon = false);?>
                    <div class="product-img text-right" style="background-image: url(<?=$mage[0];?>)">
                        <span class="like-btn"><?=do_shortcode('[favorite_button post_id = '.$product->id.']');?></span >
                    </div>
                    <div class="bestseller-info d-flex justify-space-between">
                        <a href="<?=$product->get_permalink();?>" class="bestseller-info__name"><?=$product->name;?></a>
                            <div class="d-flex align-center">
                                <span class="bestseller-info__old-price"><?=$product->regular_price.' '.get_woocommerce_currency_symbol();?></span>
                                <span class="bestseller-info__price regular-price"><?=$product->price.' '.get_woocommerce_currency_symbol();?></span>
                            </div>
                    </div>
                </div>

                <?php
                if($key > 0 && ($key%6 == 0 || $key == count($products))) {
                    echo '</div>';
                    echo '</div>';
                }
            }
        endforeach;?>
    </div>
</div>
<div class="total-gallery-navigation position-relative d-flex align-center">
    <div class="swiper-button-prev"></div>
    <div class="pagination text-center"></div>
    <div class="swiper-button-next"></div>
</div>

<?php
get_footer();
