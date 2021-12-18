<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>




	<div id="primary" <?php astra_primary_class(); ?>>

	

		<?php astra_primary_content_top();?>
	
		<?php astra_content_page_loop(); ?>
		<section id=content-section>	
	

	

	<section id="oversigt" class="loopview"></section>
	</section>

	<template>
	<article class="theWine">
		<img src="" alt="">
		<h4 class="name"></h4>
		<p class="shortDescription"></p>
		<div>
			<p class="price"></p>
			<button class="seMore">See more</button>
		</div>
	</article>
</template>
	
	<?php astra_primary_content_bottom(); ?>

</div><!-- #primary -->


	<script>
let mixedboxes;
//const for destinationen af indholdet af template
const destination = document.querySelector("#oversigt");
let template = document.querySelector("template");




//url til wp  db 
const url = "https://www.xn--mflingo-q1a.dk/kea/pompettesite/wp-json/wp/v2/mixed_box";
// asynkron function som afventer og indhenter json data fra restdb
async function hentData() {
const jsonData = await fetch(url);
mixedboxes = await jsonData.json();
visBoxes();
}


function visBoxes() {
console.log(mixedboxes);

//for each loop looper igennem alle kurserne i json
mixedboxes.forEach(mixedbox => {


		const klon = template.cloneNode(true).content;
		klon.querySelector(".name").textContent = mixedbox.navn;
		klon.querySelector("img").src = mixedbox.billede.guid;
		klon.querySelector(".shortDescription").textContent = mixedbox.langbeskrivelse;
		klon.querySelector(".price").textContent = mixedbox.price;
		klon.querySelector(".seMore").addEventListener("click", () => location.href = mixedbox.link);

		destination.appendChild(klon);
	
});
}

hentData();
</script>

<?php get_footer(); ?>
