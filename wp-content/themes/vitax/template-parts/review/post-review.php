<?php
/**
* The template part for displaying the review
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package vitax
*/

$vitax_options = Helper::bdwebteam_get_options();

?>
<div class="bdwebteam-post-review">
    <div class="bdwebteam-post-review__inner">
        <div class="bdwebteam-post-review__top">

            <div class="bdwebteam-post-review__product media">
                <?php
                $image = get_field('bdwebteam_post_review_image');

                if( !empty($image) ): ?>
                    <div class="media-left media-middle">
                        <div class="bdwebteam-post-review__product-image"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_html($image['alt']); ?>"></div>
                    </div>
                <?php endif; ?>

                <div class="media-body media-middle">
                    <?php if(!empty(bdwebteam_get_acf_data('bdwebteam_post_review_name'))){ ?>
                        <h3 class="bdwebteam-post-review-name"><?php echo bdwebteam_get_acf_data('bdwebteam_post_review_name') ?></h3>
                    <?php } ?>
                    <?php if(!empty(bdwebteam_get_acf_data('bdwebteam_post_review_description'))){ ?>
                        <span class="bdwebteam-post-review-description"> <?php echo bdwebteam_get_acf_data('bdwebteam_post_review_description') ?> </span>
                    <?php } ?>
                </div>
            </div>

            <?php if(!empty(bdwebteam_get_acf_data('bdwebteam_post_review_score'))){ ?>
                <!--bdwebteam-post-review__product media-->
                <div class="bdwebteam-post-review__overall-score">
                    <div class="bdwebteam-post-review__count_wrap">
                        <span class="post-score-value"><?php echo bdwebteam_get_acf_data('bdwebteam_post_review_score') ?></span>
                    </div>
                </div>
                <!--bdwebteam-post-review__overall-score-->
            <?php } ?>
        </div>
        <?php if(!empty(bdwebteam_get_acf_data('bdwebteam_post_review_summary'))){ ?>
            <!--bdwebteam-post-review__top-->
            <div class="bdwebteam-post-review__summary">
                <p><?php echo bdwebteam_get_acf_data('bdwebteam_post_review_summary') ?></p>
            </div>
            <!--bdwebteam-post-review__summary-->
        <?php } ?>

        <?php if(bdwebteam_get_acf_data('bdwebteam_post_review_pors_and_cons')){ ?>
            <div class="bdwebteam-post-review__pros-and-cons">
                <div class="row row--space-between">
                    <?php
                    $pors = bdwebteam_get_acf_data('bdwebteam_post_review_pors');
                    if($pors){ ?>
                        <div class="col-xs-12 col-sm-6">
                            <div class="bdwebteam-post-review__pros">
                                <h5 class="bdwebteam-post-review__list-title"><?php echo (!empty($vitax_options['bdwebteam_post_review_pors_label'])) ? $vitax_options['bdwebteam_post_review_pors_label'] : "Pors"; ?></h5>
                                <ul>
                                    <?php foreach($pors as $por){ ?>
                                        <li><i class="fal fa-check-circle"></i><span><?php echo esc_html($por['bdwebteam_post_review_add_pors']); ?></span></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $cons = bdwebteam_get_acf_data('bdwebteam_post_review_cons');
                    if($cons){ ?>
                        <div class="col-xs-12 col-sm-6">
                            <div class="bdwebteam-post-review__cons">
                                <h5 class="bdwebteam-post-review__list-title"><?php echo (!empty($vitax_options['bdwebteam_post_review_cons_label'])) ? $vitax_options['bdwebteam_post_review_cons_label'] : "Cons"; ?></h5>
                                <ul>
                                    <?php foreach($cons as $con){ ?>
                                        <li><i class="fal fa-times-circle"></i><span><?php echo esc_html($con['bdwebteam_post_review_add_cons']); ?></span></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!--bdwebteam-post-review__pros-and-cons-->
        <?php } ?>
    </div>
    <!--bdwebteam-post-review__inner-->
</div>