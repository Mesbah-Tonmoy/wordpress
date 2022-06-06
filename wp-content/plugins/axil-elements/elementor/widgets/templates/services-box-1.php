<?php
/**
 * @author  AxilTheme
 * @since   1.0
 * @version 1.0
 */

namespace axiltheme\abstrak_elements;
use Elementor\Group_Control_Image_Size;
use Elementor\Icons_Manager;

$attr = $btn = ''; 

if ( !empty( $settings['url']['url'] ) ) {
$attr  = 'href="' . $settings['url']['url'] . '"';
$attr .= !empty( $settings['url']['is_external'] ) ? ' target="_blank"' : '';
$attr .= !empty( $settings['url']['nofollow'] ) ? ' rel="nofollow"' : '';
}
if ( $settings['url']['url'] ) {
$btn = '<a class="more-btn" ' . $attr . '>'.$settings['detail_txt'] .'</a>';
}
$allowed_tags = wp_kses_allowed_html( 'post' );
$active =  $settings['recommended_on'] == 'yes' ? 'active' : 'no-active'; 
?>  
<div class="services-grid  <?php echo esc_attr( $active );?>">
    <?php if ( $settings['icontype'] == 'image' ): ?>
        <div class="thumbnail">
            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'image' );?> 
        </div>
    <?php else: ?>
        <div class="thumbnail">
            <?php Icons_Manager::render_icon( $settings['icon'] ); ?>
        </div>
    <?php endif; ?>  
    <div class="content">
        <h5 class="title"><a href="single-service.html"><?php echo axil_kses_intermediate( $settings['title'] );?></a></h5>
        <?php if ( $settings['subtitle'] ): ?>
            <p class="item-subtitle"><?php echo axil_kses_intermediate( $settings['subtitle'] );?></p>
        <?php endif; ?>

        <?php echo wp_kses( $btn, $allowed_tags ); ?>
    </div>
</div>
