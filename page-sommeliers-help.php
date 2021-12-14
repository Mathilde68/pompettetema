<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>



<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>



		<?php astra_primary_content_top(); ?>

		<?php astra_content_page_loop(); ?>
<section id=content-section>	
	

<div id=form-section>

<form>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email"><br>

  <label for="feeling">How are you feeling today?</label><br>
  <ul class="likert">
  <li> Shabby </li>
  <li><input  type="radio" class="feelingradio" name="feeling" value="1" /></li>
  <li><input type="radio" class="feelingradio" name="feeling" value="2" /></li>
  <li><input type="radio" class="feelingradio" name="feeling" value="3" /></li>
  <li><input type="radio" class="feelingradio" name="feeling" value="4" /></li>
  <li><input type="radio" class="feelingradio" name="feeling" value="5" /></li>
  <li> Happy </li>
</ul>
</form>

</div>



</section>



		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
