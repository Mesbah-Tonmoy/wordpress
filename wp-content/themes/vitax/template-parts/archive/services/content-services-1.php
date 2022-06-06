<?php
/**
 * @author  bdwebteamtheme
 * @since   1.0
 * @version 1.0
 */
?>	
<?php
$bdwebteamoptions = Helper::bdwebteam_get_options();
$btn_txt  =  '';
$btn_txt  =             $bdwebteamoptions['bdwebteam_services_btn_txt'];
$thumb_size             = "full";
$col_lg                 = $bdwebteamoptions['bdwebteam_services_col_lg'];
$col_md                 = $bdwebteamoptions['bdwebteam_services_col_md'];
$col_sm                 = $bdwebteamoptions['bdwebteam_services_col_sm'];
$services_col_class     = "col-lg-{$col_lg} col-sm-{$col_md} col-{$col_sm}"

?>
<div class="<?php echo esc_attr( $services_col_class );?>" data-sal="slide-up" data-sal-duration="800" data-sal-delay="100">
    <div class="services-grid service-style-2">
        <div class="thumbnail">
           <?php 
            if ( has_post_thumbnail() ){
                the_post_thumbnail( $thumb_size );
            } ?>
        </div>
        <div class="content">
            <h5 class="title"> <a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
             <?php the_excerpt()?>
              <?php 
                if ( $bdwebteamoptions['bdwebteam_services_btn_txt'] ){ ?>
                    <a href="<?php the_permalink();?>" class="more-btn">
                       <?php echo esc_attr( $btn_txt ); ?>
                    </a>
            <?php } ?>            
        </div>
    </div>
</div>