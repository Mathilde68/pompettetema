<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>




	<div id="primary" <?php astra_primary_class(); ?>>

	

		<?php astra_primary_content_top();?>
	
		<?php astra_content_page_loop(); ?>
		<section id=content-section>	
	

	

	
		</section>


		
		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->



<?php get_footer(); ?>
