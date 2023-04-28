<?php
get_header();
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-content" itemprop="mainContentOfPage">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); } ?>
   <?php if(!is_account_page() && !is_cart() && !is_checkout()):?>
        <h1 class="site_h1 text-center" style="max-width: 460px;"><?=get_the_title();?></h1>
    <?php endif;?>
<?php the_content(); ?>
</div>
</article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>