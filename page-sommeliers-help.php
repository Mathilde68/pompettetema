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
	<h4>💌</h4>
<p>Fields marked with * has to be filled</p>
<form class="sommelierform">
  <label for="email">Email*</label><br>
  <input type="email" id="email" name="email" required ><br>

  <hr class="solid">

  <label for="feeling">How are you feeling today?</label><br>
  <ul class="likert">
  <li> Shabby </li>
  <li><input  type="radio" class="likertradio" name="feeling" value="1" /></li>
  <li><input type="radio" class="likertradio" name="feeling" value="2" /></li>
  <li><input type="radio" class="likertradio" name="feeling" value="3" /></li>
  <li><input type="radio" class="likertradio" name="feeling" value="4" /></li>
  <li><input type="radio" class="likertradio" name="feeling" value="5" /></li>
  <li> Happy </li>
</ul>

<hr class="solid">

<label for="mood">What are you in the mood for?*</label><br>
<input type="text" id="mood" name="mood" required ><br>

<hr class="solid">

<label for="direction">What kind of direction are you thinking?</label><br>
  <ul class="likert">
  <li> Solid & Safe </li>
  <li><input  type="radio" class="likertradio" name="direction" value="1" /></li>
  <li><input type="radio" class="likertradio" name="direction" value="2" /></li>
  <li><input type="radio" class="likertradio" name="direction" value="3" /></li>
  <li><input type="radio" class="likertradio" name="direction" value="4" /></li>
  <li><input type="radio" class="likertradio" name="direction" value="5" /></li>
  <li><input type="radio" class="likertradio" name="direction" value="6" /></li>
  <li><input type="radio" class="likertradio" name="direction" value="7" /></li>
  <li><input type="radio" class="likertradio" name="direction" value="8" /></li>
  <li><input type="radio" class="likertradio" name="direction" value="9" /></li>
  <li><input type="radio" class="likertradio" name="direction" value="10" /></li>
  <li> Wild & Crazy </li>
</ul>

<hr class="solid">

<label for="looking">Anything in particular you are looking for?</label><br>
<input type="text" id="looking" name="looking"><br>

<hr class="solid">

<label for="bottles">How many bottles are you looking for in total?*</label><br>
<input type="radio" id="3" name="bottles" value="3" required >
<label for="3">3 Bottles</label><br>
<input type="radio" id="6" name="bottles" value="6">
<label for="6">6 Bottles</label><br>
<input type="radio" id="12" name="bottles" value="12">
<label for="12">12 Bottles</label> 
<br>

<hr class="solid">

<label for="budget">What's your budget?*</label><br>
<label class="budgetexplainer"for="budget">Keep in mind the min cost of 175kr per bottle</label><br>
<input type="number" id="budget" name="budget" required ><br>

<hr class="solid">

<input  type="submit" id="send"> <p>Thank you, an email with suggestions just for you will arrive shortly!</p>

</form>

<img src="" alt="">

</div>



</section>



		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
