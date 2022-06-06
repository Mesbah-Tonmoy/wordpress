<?php
/**
 * @author  Bdwebteamthemes
 * @since   1.0
 * @version 1.0
 * @package vitax
 */


/*-------------------------------------
#. Theme supports for WooCommerce
---------------------------------------*/
function bdwebteam_shop_support() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );
}



/*-------------------------------------
#. Custom functions used directly
---------------------------------------*/
function bdwebteam_shop_get_template_parts( $template ){
    get_template_part( 'woocommerce/custom/template-parts/content', $template );
}


function bdwebteam_shop_hide_page_title(){
    return false;
}

function bdwebteam_shop_loop_shop_per_page(){
    $bdwebteam_options 	= Helper::bdwebteam_get_options();
    if (isset($bdwebteam_options['wc_num_product']) && !empty($bdwebteam_options['wc_num_product'])){
        return $bdwebteam_options['wc_num_product'];
    } else {
        return 8;
    }

}

function bdwebteam_shop_wrapper_start() {
    bdwebteam_shop_get_template_parts( 'shop-header' );
}

function bdwebteam_shop_wrapper_end() {
    bdwebteam_shop_get_template_parts( 'shop-footer' );
}

function bdwebteam_shop_shop_topbar() {
    bdwebteam_shop_get_template_parts( 'shop-top' );
}

function bdwebteam_shop_loop_shop_columns(){
    $bdwebteam_options 	= Helper::bdwebteam_get_options();
    if (isset($bdwebteam_options['wc_num_product_per_row']) && !empty($bdwebteam_options['wc_num_product_per_row'])){
        return $bdwebteam_options['wc_num_product_per_row'];
    } else {
        return 4;
    }

}

function bdwebteam_shop_loop_product_title(){
    echo '<h3><a href="' . get_the_permalink() . '" class="woocommerce-LoopProduct-link">' . get_the_title() . '</a></h3>';
}

function bdwebteam_shop_shop_thumb_area(){
    bdwebteam_shop_get_template_parts( 'shop-thumb' );
}

function bdwebteam_shop_shop_info_wrap_start(){
    echo '<div class="products-shop">';
}

function bdwebteam_shop_shop_add_description(){
    if ( is_shop() || is_product_category() || is_product_tag() ) {
        global $post;
        echo '<div class="shop-excerpt grid-hide"><div class="short-description">';
        the_excerpt();
        echo '</div></div>';
    }
}

function bdwebteam_shop_shop_info_wrap_end(){
    echo '</div>';
}


function bdwebteam_shop_render_sku(){
    bdwebteam_shop_get_template_parts( 'product-sku' );
}

function bdwebteam_shop_render_meta(){
    bdwebteam_shop_get_template_parts( 'product-meta' );
}

function bdwebteam_shop_show_or_hide_related_products(){
    $bdwebteam_options 	= Helper::bdwebteam_get_options();
    // Show or hide related products
    if ( empty( $bdwebteam_options['wc_related'] ) ) {
        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
    }
}

function bdwebteam_shop_hide_product_data_tab( $tabs ){

    $bdwebteam_options 	= Helper::bdwebteam_get_options();


    if ( empty( $bdwebteam_options['wc_description'] ) ) {
        unset( $tabs['description'] );
    }
    if ( empty( $bdwebteam_options['wc_reviews'] ) ) {
        unset( $tabs['reviews'] );
    }
    if ( empty( $bdwebteam_options['wc_additional_info'] ) ) {
        unset( $tabs['additional_information'] );
    }
    return $tabs;
}

function bdwebteam_shop_product_review_form( $comment_form ){
    $commenter = wp_get_current_commenter();

    $comment_form['fields'] = array(
        'author' => '<div class="row"><div class="col-sm-6"><div class="comment-form-author form-group"><input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . esc_attr__( 'Name *', 'vitax' ) . '" required /></div></div>',
        'email'  => '<div class="comment-form-email col-sm-6"><div class="form-group"><input id="email" class="form-control" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="' . esc_attr__( 'Email *', 'vitax' ) . '" required /></div></div></div>',
    );

    $comment_form['comment_field'] = '';

    if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
        $comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . esc_html__( 'Your Rating', 'vitax' ) .'</label>
		<select name="rating" id="rating" required>
			<option value="">' . esc_html__( 'Rate&hellip;', 'vitax' ) . '</option>
			<option value="5">' . esc_html__( 'Perfect', 'vitax' ) . '</option>
			<option value="4">' . esc_html__( 'Good', 'vitax' ) . '</option>
			<option value="3">' . esc_html__( 'Average', 'vitax' ) . '</option>
			<option value="2">' . esc_html__( 'Not that bad', 'vitax' ) . '</option>
			<option value="1">' . esc_html__( 'Very Poor', 'vitax' ) . '</option>
			</select></p>';
    }

    $comment_form['comment_field'] .= '<div class="col-sm-12 p-0"><div class="form-group comment-form-comment"><textarea id="comment" name="comment" class="form-control" placeholder="' . esc_attr__( 'Your Review *', 'vitax' ) . '" cols="45" rows="8" required></textarea></div></div>';

    return $comment_form;
}

function bdwebteam_shop_show_or_hide_cross_sells(){
    // Show or hide related cross sells
    $bdwebteam_options 	= Helper::bdwebteam_get_options();
    if ( !empty($bdwebteam_options['wc_cross_sell'] ) ) {
        add_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10 );
    }
}



/**
 * Change the breadcrumb separator
 */
function bdwebteam_change_breadcrumb_delimiter( $defaults ) {
    $separator          = '';
    $defaults['delimiter'] = '<li class="separator"> ' . esc_html($separator) . ' </li>';
    $defaults['wrap_before'] = '<ul class="bdwebteam-breadcrumb liststyle d-flex shop-breadcrumb">';
    $defaults['wrap_after'] = '</ul>';
    $defaults['before'] = '<li>';
    $defaults['after'] = '</li>';
    $defaults['home'] = esc_html__('Home', 'vitax');
    return $defaults;
}


add_filter( 'woocommerce_output_related_products_args', 'vitax_change_number_related_products', 9999 );

function vitax_change_number_related_products( $args ) {
    $args['posts_per_page'] = 3; // # of related products
    $args['columns'] = 3; // # of columns per row
    return $args;
}


/**
 * fragments cart contents count
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'vitax_woocommerce_header_add_to_cart_fragment' );
function vitax_woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <span class="aw-cart-count"><?php echo esc_html( $woocommerce->cart->cart_contents_count ); ?></span>
    <?php
    $fragments['span.aw-cart-count'] = ob_get_clean();
    return $fragments;
}