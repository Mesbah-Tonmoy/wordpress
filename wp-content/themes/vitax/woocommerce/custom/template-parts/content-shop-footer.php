<?php
/**
 * @author  Bdwebteamthemes
 * @since   1.0
 * @version 1.0
 * @package vitax
 */
$bdwebteam_options = Helper::bdwebteam_get_options();
$wc_single_product_sidebar =  isset($bdwebteam_options['wc_single_product_sidebar']) ? $bdwebteam_options['wc_single_product_sidebar'] : "no";
$wc_general_sidebar =  isset($bdwebteam_options['wc_general_sidebar']) ? $bdwebteam_options['wc_general_sidebar'] : "no";
?>
				
				</div>
			</div>
            <?php if(is_single()){
                if ( is_active_sidebar( 'sidebar-shop' ) && $wc_single_product_sidebar == 'right') { ?>
                    <div class="col-lg-4 col-md-12 col-12 mt_md--40 mt_sm--40">
                        <div class="vitax-shop-sidebar vitax-shop-sidebar-right">
                            <?php dynamic_sidebar('sidebar-shop'); ?>
                        </div>
                    </div>
                <?php }
            } else{
                if ( is_active_sidebar( 'sidebar-shop' ) && $wc_general_sidebar == 'right') { ?>
                    <div class="col-lg-4 col-md-12 col-12 mt_md--40 mt_sm--40">
                        <div class="vitax-shop-sidebar vitax-shop-sidebar-right">
                            <?php dynamic_sidebar('sidebar-shop'); ?>
                        </div>
                    </div>
                <?php }
            } ?>

		</div>
	</div>
</div>