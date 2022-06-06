<?php
/**
 * @author  Bdwebteamthemes
 * @since   1.0
 * @version 1.0
 * @package vitax
 */
$bdwebteam_options = Helper::bdwebteam_get_options();
$wc_single_product_sidebar =  isset($bdwebteam_options['wc_single_product_sidebar']) && !empty($bdwebteam_options['wc_single_product_sidebar']) ? $bdwebteam_options['wc_single_product_sidebar'] : "no";
$wc_general_sidebar =  isset($bdwebteam_options['wc_general_sidebar']) && !empty($bdwebteam_options['wc_general_sidebar']) ? $bdwebteam_options['wc_general_sidebar'] : "no";


if(is_single()){
    $vitax_shop_wrapper_class = ($wc_single_product_sidebar === 'no') || !is_active_sidebar( 'sidebar-shop' ) ? 'col-12' : 'col-lg-8 col-md-12 col-12';

} else {
    $vitax_shop_wrapper_class = ($wc_general_sidebar === 'no') || !is_active_sidebar( 'sidebar-shop' ) ? 'col-12' : 'col-lg-8 col-md-12 col-12';
}
$vitax_product_sidebar = ($wc_single_product_sidebar === 'left') && is_active_sidebar( 'sidebar-shop' ) && is_single() ? 'vitax-has-left-sidebar' : '';
$vitax_shop_sidebar = ($wc_general_sidebar === 'left') && is_active_sidebar( 'sidebar-shop' )  && !is_single() ? 'vitax-has-left-sidebar' : '';
?>
<div class="bdwebteam-container section-padding-equal <?php echo esc_attr($vitax_product_sidebar); ?> <?php echo esc_attr($vitax_shop_sidebar); ?>">
	<div class="container">
		<div class="row">
            <!-- Left Sidebar here-->

            <?php if(is_single()){
                if ( is_active_sidebar( 'sidebar-shop' ) && $wc_single_product_sidebar == 'left') { ?>
                    <div class="col-lg-3 col-md-12 col-12 mt_md--40 mt_sm--40">
                        <div class="vitax-shop-sidebar vitax-shop-sidebar-left">
                            <?php dynamic_sidebar('sidebar-shop'); ?>
                        </div>
                    </div>
                <?php }
            } else {
                if ( is_active_sidebar( 'sidebar-shop' ) && $wc_general_sidebar == 'left') { ?>
                    <div class="col-lg-4 col-md-12 col-12 mt_md--40 mt_sm--40">
                        <div class="vitax-shop-sidebar vitax-shop-sidebar-left">
                            <?php dynamic_sidebar('sidebar-shop'); ?>
                        </div>
                    </div>
                <?php }
            } ?>

			<div class="<?php echo esc_attr($vitax_shop_wrapper_class); ?>">
				<div class="vitax-container-content ">