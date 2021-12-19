<?php


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
	<h2 id="letter">💌</h2>
<p>* required fields</p>
<form class="sommelierform">
  <label for="email">Email*</label><br>
  <input type="email" id="email" name="email" required ><br>

  <hr class="solidblue">

  <label for="feeling">How are you feeling today?</label><br>
  <ul class="likert">
  <li class="underlabel"> Shabby </li>
  <li><input  type="radio" class="likertradio" name="feeling" value="1" /></li>
  <li><input type="radio" class="likertradio" name="feeling" value="2" /></li>
  <li><input type="radio" class="likertradio" name="feeling" value="3" /></li>
  <li><input type="radio" class="likertradio" name="feeling" value="4" /></li>
  <li><input type="radio" class="likertradio" name="feeling" value="5" /></li>
  <li class="underlabel"> Happy </li>
</ul>

<hr class="solidblue">

<label for="mood">What are you in the mood for?*</label><br>
<input type="text" id="mood" name="mood" required ><br>

<hr class="solidblue">

<label for="direction">What kind of direction are you thinking?</label><br>
  <ul class="likert">
  <li class="underlabel"> Solid & Safe </li>
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
  <li class="underlabel"> Wild & Crazy </li>
</ul>

<hr class="solidblue">

<label for="looking">Anything in particular you are looking for?</label><br>
<input type="text" id="looking" name="looking"><br>

<hr class="solidblue">

<label for="bottles">How many bottles are you looking for in total?*</label><br>
<input type="radio" id="3" name="bottles" value="3" required >
<label for="3" class="underlabel">3 Bottles</label><br>
<input type="radio" id="6" name="bottles" value="6">
<label for="6" class="underlabel">6 Bottles</label><br>
<input type="radio" id="12" name="bottles" value="12">
<label for="12" class="underlabel">12 Bottles</label> 
<br>

<hr class="solidblue">

<label for="budget">What's your budget?*</label><br>
<label for="budget" class="underlabel" >Keep in mind the min cost of 175kr per bottle</label><br>
<input type="number" id="budget" name="budget" required ><br>

<hr class="solidblue">

<input  type="submit"  class="send"> <p>Thank you! An email with wine suggestions just for you will arrive shortly!</p>


</form>


</div>

<div class="catbox" >
<img class="pageendcat" src="https://www.xn--mflingo-q1a.dk/kea/pompettesite/wp-content/uploads/2021/12/rod-closed.png" alt="catredclosedeyes">
</div>

</section>



		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
