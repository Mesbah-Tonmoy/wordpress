<?php
/**
 * @author  bdwebteamtheme
 * @since   1.0
 * @version 1.0
 */
?>	
<?php
$bdwebteamoptions = Helper::bdwebteam_get_options();
$thumb_size             = "bdwebteam-project-lg";
$per_page = ( $bdwebteamoptions['bdwebteam_case_study_archive_post_per_page'] ) ? $bdwebteamoptions['bdwebteam_case_study_archive_post_per_page'] : '2' ;
$id            = get_the_id();
?>
<div class="col-md-4 project">
    <div class="project-grid">
         <?php 
            if ( has_post_thumbnail() ){ ?>
        <div class="thumbnail">
            <a href="<?php the_permalink();?>">
                <?php  the_post_thumbnail( $thumb_size ); ?>
            </a>
        </div>
        <?php  } ?>
        <div class="content">
            <h5 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
            <span class="subtitle"><?php echo Helper::bdwebteam_get_case_study_cat( $id ); ?></span>
        </div>
    </div>
</div>


