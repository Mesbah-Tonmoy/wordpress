<?php
/**
 * Template Name: Blank Template
 *
 * @package vitax
 */

?>
<div id="primary" class="content-area ">
	<?php while ( have_posts() ) :
		the_post();
		the_content();
	endwhile; // End of the loop. ?>
</div>

