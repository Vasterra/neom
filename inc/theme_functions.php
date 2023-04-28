<?php
require_once (__DIR__ .'/emails/register.php');
require_once (__DIR__ .'/emails/forgot_password.php');


add_theme_support( 'custom-logo' );
/**
 * Allow SVG files in Media Library.
 */
function extra_mime_types( $mimes ) {

    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
}
add_filter( 'upload_mimes', 'extra_mime_types' );


// add favorites link and page
add_filter ( 'woocommerce_account_menu_items', 'my_favorites_link', 25 );
function my_favorites_link( $menu_links ){

    $menu_links[ 'favorites' ] = 'My favourites';
    return $menu_links;
}
add_action( 'init', 'favorites_add_endpoint', 25 );
function favorites_add_endpoint() {
    add_rewrite_endpoint( 'favorites', EP_PAGES );
}
add_action( 'woocommerce_account_favorites_endpoint', 'favorites_content', 25 );
function favorites_content() {

    $favorites_ids = get_user_favorites();
    $query = new WC_Product_Query( array(
        'orderby' => 'date',
        'order' => 'ASC',
        'include' => $favorites_ids
    ) );
    $products = $query->get_products();
    wp_reset_postdata();
    $html = '';

    $html .= '<div class="d-flex flex-wrap">';
    foreach($products as $product){
        $html .= '<div class="favorites__item">';
        $mage = wp_get_attachment_image_src($product->image_id, $size=array(180,210), $icon = false);
        $html .= '<div class="product-img text-right" style="background-image: url('. $mage[0] .')">';
        $html .= '<a href="'. $product->get_permalink() .'" class="product-img text-right" style="background-image: url('. $mage[0] .');">';
        $html .= '<span class="like-btn">'. do_shortcode('[favorite_button post_id = '.$product->id.']') .'</span ></a></div>';
        $html .= '<div class="bestseller-info">';
        $html .= '<a href="'. $product->get_permalink() .'" class="bestseller-info__name">'. $product->name .'</a>';
        if($product->sale_price) {
            $html .= '<div class="d-flex align-center">';
            $html .= '<span class="bestseller-info__old-price">'. $product->regular_price.' '.get_woocommerce_currency_symbol() .'</span>';
            $html .= '<span class="bestseller-info__price regular-price">'. $product->price.' '.get_woocommerce_currency_symbol() .'</span>';
            $html .= '</div>';
        } else {
            $html .= '<p class="bestseller-info__price">'. $product->price.' '.get_woocommerce_currency_symbol() .'</p>';
        }
        $html .= '</div></div>';
    }
    $html .= '</div>';
    echo $html;
}
// end add favorites link and page


// Display Billing birthdate field to checkout and My account addresses
add_filter( 'woocommerce_billing_fields', 'display_birthdate_billing_field', 20, 1 );
function display_birthdate_billing_field($billing_fields) {

    $billing_fields['billing_birthdate'] = array(
        'type'        => 'date',
        'label'       => __('Date of Birth'),
        'class'       => array('form-row-wide'),
        'priority'    => 25,
        'required'    => false,
        'clear'       => true,
    );
    return $billing_fields;
}


// Checkout Page
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields)
{
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_birthdate']);
    unset($fields['billing']['billing_address_2']);

    $fields['billing']['billing_phone']['placeholder'] = '';
    $fields['billing']['billing_phone']['label'] = 'Phone Number';
    $fields['billing']['billing_first_name']['placeholder'] = 'First Name';
    $fields['billing']['billing_last_name']['label'] = 'Second Name';
    $fields['billing']['billing_email']['placeholder'] = '';
    $fields['billing']['billing_email']['label'] = 'E-mail';

    return $fields;
}

add_filter( 'woocommerce_order_button_text', 'misha_custom_button_text' );

function misha_custom_button_text( $button_text ) {
    return 'Pay'; // new text is here
}
// end Checkout Page




// --- test
//add_filter( 'manage_customer_posts_columns', 'add_custom_column' );
//
//function add_custom_column( $columns ) {
//    $columns['billing_birthdate'] = __( 'Custom Column', 'woocommerce' );
//    return $columns;
//}
//add_action( 'manage_customer_posts_custom_column', 'display_custom_column_data', 10, 2 );
//
//function display_custom_column_data( $column, $post_id ) {
//    if ( 'billing_birthdate' === $column ) {
//        // Add your custom code to display data in this column
//    }
//}
// --- end test





// Save Billing birthdate field value as user meta data
add_action( 'woocommerce_checkout_update_customer', 'save_account_billing_birthdate_field', 10, 2 );
function save_account_billing_birthdate_field( $customer, $data ){
    if ( isset($_POST['billing_birthdate']) && ! empty($_POST['billing_birthdate']) ) {
        $customer->update_meta_data( 'billing_birthdate', sanitize_text_field($_POST['billing_birthdate']) );
    }
}

// Admin orders Billing birthdate editable field and display
add_filter('woocommerce_admin_billing_fields', 'admin_order_billing_birthdate_editable_field');
function admin_order_billing_birthdate_editable_field( $fields ) {
    $fields['birthdate'] = array( 'label' => __('Birthdate', 'woocommerce') );

    return $fields;
}

// WordPress User: Add Billing birthdate editable field
add_filter('woocommerce_customer_meta_fields', 'wordpress_user_account_billing_birthdate_field');
function wordpress_user_account_billing_birthdate_field( $fields ) {
    $fields['billing']['fields']['billing_birthdate'] = array(
        'label'       => __('Birthdate', 'woocommerce'),
        'description' => __('', 'woocommerce')
    );
    return $fields;
}

// Save the mobile phone value to user data
add_action( 'woocommerce_save_account_details', 'my_account_saving_billing_details', 10, 1 );
function my_account_saving_billing_details( $user_id ) {
    $billing_phone = $_POST['billing_phone'];
    $birth_day = $_POST['billing_birthdate'];
    $shipping_address = $_POST['shipping_address_1'];

    if( ! empty( $billing_phone ) ) update_user_meta( $user_id, 'billing_phone', sanitize_text_field( $billing_phone ) );
    if( ! empty( $birth_day ) ) update_user_meta( $user_id, 'billing_birthdate', sanitize_text_field( $birth_day ) );
    if( ! empty( $shipping_address ) ) {
        update_user_meta($user_id, 'shipping_address_1', sanitize_text_field($shipping_address));
//        update_user_meta($user_id, 'billing_address_1', sanitize_text_field($shipping_address));
    }
}


// Cancel order button
add_filter('woocommerce_valid_order_statuses_for_cancel', 'my_cancellable_statuses', 10, 2);

function my_cancellable_statuses($statuses, $order){
    $freshness_interval = 12*HOUR_IN_SECONDS;
    $order_date = strtotime($order->get_date_modified());
    $is_order_recent = ( $order_date + $freshness_interval ) >= strtotime('now');

    if($is_order_recent){
        // return our custom statuses
        return array('pending', 'processing', 'on-hold');
    }else{
        // return the default statuses
        return $statuses;
    }
}


// ============= DATEPICKER ==============
// Вызываем функцию
datepicker_js();

/**
 * скрипт выбора даты datepicker
 * version: 1
 */
function datepicker_js(){
    // подключаем все необходимые скрипты: jQuery, jquery-ui, datepicker
    wp_enqueue_script('jquery-ui-datepicker');

    // подключаем нужные css стили
    wp_enqueue_style('jqueryui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css', false, null );

    // инициализируем datepicker
    if( is_admin() )
        add_action('admin_footer', 'init_datepicker', 99 ); // для админки
    else
        add_action('wp_footer', 'init_datepicker', 99 ); // для админки

    function init_datepicker(){
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function($){
                'use strict';
                $.datepicker.setDefaults({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "1940:2023",
                } );

                // Инициализация
                $('input[name*="date"], .datepicker').datepicker({ dateFormat: 'dd/mm/yy' });
            });
        </script>
        <?php
    }
}
// ============= END DATEPICKER ==============


add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
    wp_safe_redirect( home_url() );
    exit;
}

// ===== recently viewed products
add_action( 'template_redirect', 'truemisha_recently_viewed_product_cookie', 20 );

function truemisha_recently_viewed_product_cookie() {

    // если находимся не на странице товара, ничего не делаем
    if ( ! is_product() ) {
        return;
    }


    if ( empty( $_COOKIE[ 'woocommerce_recently_viewed_2' ] ) ) {
        $viewed_products = array();
    } else {
        $viewed_products = (array) explode( '|', $_COOKIE[ 'woocommerce_recently_viewed_2' ] );
    }

    // добавляем в массив текущий товар
    if ( ! in_array( get_the_ID(), $viewed_products ) ) {
        $viewed_products[] = get_the_ID();
    }

    // нет смысла хранить там бесконечное количество товаров
    if ( sizeof( $viewed_products ) > 15 ) {
        array_shift( $viewed_products ); // выкидываем первый элемент
    }

    // устанавливаем в куки
    wc_setcookie( 'woocommerce_recently_viewed_2', join( '|', $viewed_products ) );

}
add_shortcode( 'recently_viewed_products', 'truemisha_recently_viewed_products' );

function truemisha_recently_viewed_products() {

    if( empty( $_COOKIE[ 'woocommerce_recently_viewed_2' ] ) ) {
        return;
    }

    $viewed_products = (array) explode( '|', $_COOKIE[ 'woocommerce_recently_viewed_2' ] );

    if ( empty( $viewed_products ) ) {
        return;
    }

    // надо ведь сначала отображать последние просмотренные
    $viewed_products = array_reverse( array_map( 'absint', $viewed_products ) );
    $args = array(
        'include' => $viewed_products,
    );
    $products = wc_get_products( $args );

    $html = '';
    if(count($viewed_products)):
        $html .= '<section id="recently-viewed-block">';
        $html .= '<div class="container">';
        $html .= '<p class="site_h1">Recently Viewed</p>';
        $html .= '<div class="position-relative">';
        $html .= '<div id="recend-viewed" class="swiper carousel-view">';
        $html .= '<div class="swiper-wrapper">';
        foreach ($products as $product):
            $html .= '<div class="swiper-slide">';
            $image = wp_get_attachment_image_src($product->image_id, $size=array(260,365), $icon = false);
            if($image) {
                $html .= '<a href="' . $product->get_permalink() . '" class="product-img text-right" style="background-image: url(' . $image[0] . ')">';
            } else $html .= '<a href="' . $product->get_permalink() . '" class="product-img text-right" style="background-color: #379;">';
            $html .= '<span class="like-btn">'. do_shortcode('[favorite_button post_id = '.$product->id.']'). '</span >';
            $html .= '</a>';
            $html .= '<div class="d-flex justify-space-between bestseller-info">';
            $html .= '<span class="bestseller-info__name">'. $product->name .'</span>';
            if ( $product->is_type( 'variable' ) ) {
                $html .= '<p class="bestseller-info__price">'. number_format($product->get_variation_regular_price('min', true),0).'-'.number_format($product->get_variation_regular_price('max', true),0).' '.get_woocommerce_currency_symbol().'</p>';
            } else {
                if ($product->sale_price) {
                    $html .= '<div class="d-flex align-center">';
                    $html .= '<span class="bestseller-info__old-price">' . $product->regular_price . ' ' . get_woocommerce_currency_symbol() . '</span>';
                    $html .= '<span class="bestseller-info__price regular-price">' . $product->price . ' ' . get_woocommerce_currency_symbol() . '</span>';
                    $html .= '</div>';
                } else $html .= '<span class="bestseller-info__price">' . $product->price . ' ' . get_woocommerce_currency_symbol() . '</span>';
            }
            $html .= '</div></div>';
        endforeach;
        $html .= '</div></div>';
        $html .= '<div class="carousel-prev-next">';
        $html .= '<div class="swiper-button-prev"></div>';
        $html .= '<div class="swiper-button-next"></div>';
        $html .= '</div></div></div>';
        $html .= '</section>';
    endif;

    return $html;

}
// ===== end recently viewed products

// FAQ accordeon shortcode
add_shortcode( 'faq_section', 'show_faq_section' );
function show_faq_section() {
    global $post;

    $posts = get_posts( [
        'category_name' => 'faq',
        'post_type' => 'post',
    ] );

    $html = '';

    foreach( $posts as $post ): setup_postdata($post);
        $html .= '<div class="accorion-item"><div class="accordion-item__head"><div class="accordion-item__icon"><span class="closed-icon">+</span><span class="opened-icon">-</span></div>';
        $html .= '<p>'. $post->post_title .'</p>';
        $html .= '</div><div class="accordion-item__body">';
        $html .= '<p>' . $post->post_content .'</p>';
        $html .= '</div></div>';
    endforeach;

    return $html;
}


// =================================== Login, Signup, Forgot password forms
    // Ajax requests from sign in form
add_action('wp_ajax_ajaxLogin', 'ajax_login');
add_action('wp_ajax_nopriv_ajaxLogin', 'ajax_login');
function ajax_login() {

    $creds = array();
    $creds['user_login'] = sanitize_user($_POST['ajax_login']);
    $creds['user_password'] = sanitize_text_field($_POST['ajax_password']);
    $creds['remember'] = true;

    $user = wp_signon( $creds, false );

    if ( is_wp_error($user) ) {
        echo json_encode(array('loggedin'=>false, 'message'=>__('Invalid login or password')));
    } else {
        wp_set_current_user($user->ID);
        wp_set_auth_cookie($user->ID, true);
        echo json_encode(array('loggedin'=>true, 'user' => $user));
    }
    wp_die();
}

    // Ajax requests forgot password form
add_action('wp_ajax_ajaxCheckemail', 'ajax_check_email');
add_action('wp_ajax_nopriv_ajaxCheckemail', 'ajax_check_email');
add_action('wp_ajax_ajaxVerifycode', 'ajax_verify_code');
add_action('wp_ajax_nopriv_ajaxVerifycode', 'ajax_verify_code');
add_action('wp_ajax_ajaxSetpassword', 'ajax_set_password');
add_action('wp_ajax_nopriv_ajaxSetpassword', 'ajax_set_password');


function ajax_check_email() {

    global $wpdb;

    $creds = array();
    $email = sanitize_user($_POST['ajax_login']);

    $exists = email_exists($email);
    if(!$exists) {
        echo json_encode(array('exists' => false,'message'=>__('There is no account with this email')));
    } else {

        $code = rand(1000, 9999);
        $headers = 'content-type: text/html' . "\r\n";
        $headers .= 'From: Neom <no-reply@'. $_SERVER['HTTP_HOST'] .'>' . "\r\n";

        $logo_image = get_template_directory_uri().'/assets/images/logo_mail.png';
        $instagram_link_srs = get_template_directory_uri().'/assets/images/instagram_icon.png';
        $facebook_link_srs = get_template_directory_uri().'/assets/images/facebook_icon.png';
        $twitter_link_srs = get_template_directory_uri().'/assets/images/twitter_icon.png';
        $mess = forgotPassowrdTemplate($logo_image, $code, $instagram_link_srs, $facebook_link_srs, $twitter_link_srs);

        if(wp_mail($email, 'Verification code', $mess, $headers)) {
            $wpdb->delete($wpdb->get_blog_prefix() . 'two_factor_table', ['user_mail' => $email]);
            $wpdb->insert($wpdb->get_blog_prefix() . 'two_factor_table', [
                'user_mail' => $email,
                'two_factor_code' => $code
            ]);

            echo json_encode(array('exists' => true));
        }
    }
    wp_die();
}
function ajax_verify_code() {
    global $wpdb;

    $code = sanitize_user($_POST['ajax_code']);
    $email = sanitize_user($_POST['ajax_login']);

    $mylink = $wpdb->get_row( "SELECT * FROM ". $wpdb->get_blog_prefix() . "two_factor_table WHERE user_mail='".$email."'", OBJECT );
    if($mylink->two_factor_code === $code) {
        $wpdb->delete($wpdb->get_blog_prefix() . 'two_factor_table', ['user_mail' => $email]);
        echo json_encode(['success' => true]);
    } else echo json_encode(['success' => false]);

    wp_die();
}

function ajax_set_password() {
    if(isset( $_POST['ajax_login'] ) && $_POST['ajax_login'] && isset( $_POST['ajax_login'] ) && $_POST['ajax_password']) {
        $user = get_user_by( 'email', $_POST['ajax_login'] );
        wp_set_password( $_POST['ajax_password'], $user->ID );
        echo json_encode(['success' => true]);
    }
    wp_die();
}



    // Ajax requests from sign up form
add_action('wp_ajax_ajaxRegister', 'ajax_register');
add_action('wp_ajax_nopriv_ajaxRegister', 'ajax_register');

function ajax_register(){

    $info = array();
    $info['user_email'] = $info['user_login'] = sanitize_user($_POST['ajax_login']);
    $info['user_pass'] = sanitize_text_field($_POST['ajax_password']);

    // Register the user
    $user_register = wp_insert_user( $info );
    if ( is_wp_error($user_register) ){
        $error  = $user_register->get_error_codes() ;

        if(in_array('empty_user_login', $error))
            echo json_encode(array('loggedin'=>false, 'message'=>__($user_register->get_error_message('empty_user_login'))));
        elseif(in_array('existing_user_login',$error))
            echo json_encode(array('loggedin'=>false, 'message'=>__('This email address is already registered.'), 'code'=>'existing_user_email'));
        elseif(in_array('existing_user_email',$error))
            echo json_encode(array('loggedin'=>false, 'message'=>__('This email address is already registered.'), 'code'=>'existing_user_email'));
    } else {
        $headers = 'content-type: text/html' . "\r\n";
        $headers .= 'From: Neom <no-reply@'. $_SERVER['HTTP_HOST'] .'>' . "\r\n";

        $logo_image = get_template_directory_uri().'/assets/images/logo_mail.png';
        $instagram_link_srs = get_template_directory_uri().'/assets/images/instagram_icon.png';
        $facebook_link_srs = get_template_directory_uri().'/assets/images/facebook_icon.png';
        $twitter_link_srs = get_template_directory_uri().'/assets/images/twitter_icon.png';
        $mess = registerTemplate($logo_image, $info['user_email'], home_url(), $instagram_link_srs, $facebook_link_srs, $twitter_link_srs);

        wp_mail($info['user_email'], 'Thank Your for registration on Neom!', $mess, $headers);

        $creds = array();
        $creds['user_login'] = sanitize_user($_POST['ajax_login']);
        $creds['user_password'] = sanitize_text_field($_POST['ajax_password']);
        $creds['remember'] = true;
        wp_signon( $creds, false );
        echo json_encode(array('loggedin'=>true));
    }

    wp_die();
}
// =================================== END Login, Signup, Forgot password forms