</main>
</div>

<?php if(!is_front_page()) echo do_shortcode('[recently_viewed_products]');?>

<footer id="footer" role="contentinfo">
    <div class="footer-menu">
        <div class="container d-flex justify-space-between">
            <a href="/" class="logo" style="background-image: url(<?='/wp-content/uploads/2023/04/1.svg';?>);"></a>
            <div>
                <div class="mb-25"><?php wp_nav_menu( array( 'theme_location' => '', 'menu' => 'Footer Menu 1', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>' ) ); ?></div>
                <div class="d-flex align-center">
                    <a href="https://twitter.com/Neom_Art_" class="footer-social" style="background-image: url(/wp-content/uploads/2023/03/Mask-group-1.svg);"></a>
                    <a href="https://www.instagram.com/art_of_neom/" class="footer-social" style="background-image: url(/wp-content/uploads/2023/03/Mask-group.svg);margin: 0 8px;"></a>
                    <a href="https://www.facebook.com/people/Neom-Art/100090934312897/" class="footer-social" style="background-image: url(/wp-content/uploads/2023/03/Vector.svg);"></a>
                </div>
            </div>
            <div>
                <?php wp_nav_menu( array( 'theme_location' => '', 'menu' => 'Footer Menu 2', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>' ) ); ?>
            </div>
            <div class="subscribtion-block">
                <p class="fz-14 font-weight-600" style="margin-bottom: 8px;">Subscribe to my newsletter and get 10% off your entire order!</p>
                <p class="fz-12">Receive updates on the latest promotions and collections before everyone else!</p>
                <div style="margin-top: 15px;">
                <?=do_shortcode("[mc4wp_form id=55]");?>
                </div>
            </div>
        </div>
    </div>
<div id="copyright">
    <div class="container d-flex align-center justify-space-between">
        <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="17" viewBox="0 0 24 17" fill="none"><rect width="24" height="16.8" rx="2" fill="white"/><g clip-path="url(#clip0_208_6702)"><path d="M19.3818 8.43183C19.3818 7.39487 18.8796 6.57663 17.9196 6.57663C16.9555 6.57663 16.3722 7.39487 16.3722 8.42374C16.3722 9.64297 17.0608 10.2587 18.0492 10.2587C18.5312 10.2587 18.8958 10.1493 19.1712 9.99539V9.18526C18.8958 9.32299 18.5798 9.40804 18.1788 9.40804C17.7859 9.40804 17.4375 9.27032 17.393 8.79234H19.3738C19.3738 8.73967 19.3818 8.52906 19.3818 8.43183ZM17.3808 8.04703C17.3808 7.5893 17.6603 7.39892 17.9155 7.39892C18.1626 7.39892 18.4259 7.5893 18.4259 8.04703H17.3808ZM14.8452 6.57663C14.4483 6.57663 14.1931 6.76296 14.0513 6.89258L13.9987 6.64145H13.1075V11.3645L14.1202 11.1498L14.1242 10.0035C14.27 10.1088 14.4847 10.2587 14.8412 10.2587C15.5663 10.2587 16.2265 9.67538 16.2265 8.39133C16.2225 7.21664 15.5541 6.57663 14.8452 6.57663ZM14.6022 9.36754C14.3632 9.36754 14.2214 9.28246 14.1242 9.17716L14.1202 7.67436C14.2255 7.55689 14.3713 7.47588 14.6022 7.47588C14.9708 7.47588 15.226 7.88904 15.226 8.41969C15.226 8.96248 14.9748 9.36754 14.6022 9.36754ZM11.8016 6.31177L12.8183 6.09303V5.27075L11.8016 5.48544V6.31177ZM11.8016 6.57663H12.8182V10.121H11.8016V6.57663ZM10.5649 6.91825L10.5001 6.6185H9.62514V10.1628H10.6378V7.76078C10.8768 7.44889 11.2819 7.50559 11.4074 7.55014V6.6185C11.2778 6.5699 10.8039 6.48078 10.5649 6.91825ZM8.65873 5.70605L7.67037 5.91668L7.66632 9.16125C7.66632 9.76074 8.11596 10.2023 8.71545 10.2023C9.0476 10.2023 9.29064 10.1415 9.4243 10.0686V9.24631C9.29469 9.29898 8.65468 9.48531 8.65468 8.8858V7.44783H9.4243V6.58504H8.65468L8.65873 5.70605ZM5.86173 7.67436C5.86173 7.51639 5.99135 7.45562 6.20604 7.45562C6.51388 7.45562 6.90275 7.54879 7.21059 7.71486V6.76296C6.87439 6.62929 6.54224 6.57663 6.20604 6.57663C5.38375 6.57663 4.83691 7.006 4.83691 7.72298C4.83691 8.84094 6.37616 8.66271 6.37616 9.14476C6.37616 9.33108 6.21414 9.39183 5.9873 9.39183C5.6511 9.39183 5.22173 9.25412 4.88147 9.0678V10.0318C5.25818 10.1939 5.63894 10.2627 5.9873 10.2627C6.82984 10.2627 7.40908 9.84552 7.40908 9.12045C7.40504 7.91335 5.86173 8.12804 5.86173 7.67436Z" fill="black"/></g><defs><clipPath id="clip0_208_6702"><rect width="14.8" height="6.31176" fill="white" transform="translate(4.7998 5.19995)"/></clipPath></defs></svg></span>
        <p>&copy; Neom <?php echo esc_html( date_i18n( __( 'Y', 'blankslate' ) ) ); ?>. All rights reserved</p>
        <p>CVR 36216646 Bredgade 10B 9670 Løgstør</p>
    </div>
</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>