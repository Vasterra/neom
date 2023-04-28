<?php get_header(); ?>
<?php
$args= array(
    'post_type'=> array('product'),
    'posts_per_page' => -1,
    's' => get_search_query()
);
$titleQuery = new WP_Query( $args );
if ( $titleQuery->have_posts() ) :?>
<header class="header">
<h1 class="entry-title fw-bold mt-1 mb-1" itemprop="name"><?php printf( esc_html__( 'Search Results for: %s', 'blankslate' ), get_search_query() ); ?></h1>
</header>
<div class="d-flex flex-wrap">
<?php
    while ( $titleQuery->have_posts() ){
        $titleQuery->the_post();?>
        <div class="gallery-page__item">
            <a href="<?=get_permalink();?>" class="product-img text-right" style="background-image: url(<?=get_the_post_thumbnail_url();?>)">
                <span class="like-btn"><?=do_shortcode('[favorite_button post_id = '.get_the_ID().']');?></span >
            </a>
            <div class="bestseller-info d-flex justify-space-between">
                <a href="<?=get_permalink();?>" class="bestseller-info__name"><?=get_the_title();?></a>
                <?php $product = wc_get_product( get_the_ID() );?>
                <?php if($product->sale_price) { ?>
                    <div class="d-flex align-center">
                        <span class="bestseller-info__old-price"><?=$product->regular_price.' '.get_woocommerce_currency_symbol();?></span>
                        <span class="bestseller-info__price regular-price"><?=$product->price.' '.get_woocommerce_currency_symbol();?></span>
                    </div>
                <?php } else {?>
                    <span class="bestseller-info__price"><?=$product->price.' '.get_woocommerce_currency_symbol();?></span>
                <?php }?>
            </div>
        </div>
<?php } wp_reset_postdata();?>
</div>
<?php else : ?>
<article id="post-0" class="post no-results not-found">
<header class="header">
<h1 class="entry-title" itemprop="name"><?php esc_html_e( 'Nothing Found', 'blankslate' ); ?></h1>
</header>
<div class="entry-content" itemprop="mainContentOfPage">
<p><?php esc_html_e( 'Sorry, nothing matched your search. Please try again.', 'blankslate' ); ?></p>
<?php get_search_form(); ?>
</div>
</article>
<?php endif; ?>

<?php get_footer(); ?>