<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>





	<div id="primary" <?php astra_primary_class(); ?>>

	

		<?php astra_primary_content_top();?>
	
		<?php astra_content_page_loop(); ?>
		<section id=content-section>	
	

	

	<section id="merchoversigt" class="loopview"></section>

	<section id="giftcardoversigt" class="loopview"></section>
	</section>

	<template>
        <article class="theWine">
           <img src="" alt="">
            <h5 class="name"></h5>
            <div class="prisogknap">
                <p class="price"></p>
                <button class="seMore">See more</button>
            </div>
        </article>
    </template>
	
	<?php astra_primary_content_bottom(); ?>

</div><!-- #primary -->

<script>
let merches;
let giftcards;
//const for destinationen af indholdet af template
const destination1 = document.querySelector("#merchoversigt");
const destination2 = document.querySelector("#giftcardoversigt");
let template = document.querySelector("template");




//url til wp  db 
const merchUrl = "https://www.xn--mflingo-q1a.dk/kea/pompettesite/wp-json/wp/v2/notwine?categories=9";
const giftcardUrl = "https://www.xn--mflingo-q1a.dk/kea/pompettesite/wp-json/wp/v2/notwine?categories=10";

// asynkron function som afventer og indhenter json data fra restdb
async function hentData() {
const merchJsonData = await fetch(merchUrl);
merches = await merchJsonData.json();


const giftcardJsonData = await fetch(giftcardUrl)
giftcards = await giftcardJsonData.json();

visNotwines();
}


function visNotwines() {
console.log(merches);
//for each loop looper igennem alt merchandise i json
merches.forEach(merch => {
		const klon = template.cloneNode(true).content;
		klon.querySelector(".name").textContent = merch.navn;
		klon.querySelector("img").src = merch.billede.guid;
		klon.querySelector(".price").textContent = merch.price + " kr";
		klon.querySelector(".seMore").addEventListener("click", () => location.href = merch.link);

		destination1.appendChild(klon);
	
});

giftcards.forEach(giftcard => {
		const klon = template.cloneNode(true).content;
		klon.querySelector(".name").textContent = giftcard.navn;
		klon.querySelector("img").src = giftcard.billede.guid;
		klon.querySelector(".price").textContent = "min/max: " + giftcard.price + " kr";
		klon.querySelector(".seMore").addEventListener("click", () => location.href = giftcard.link);

		destination2.appendChild(klon);
	
});

}

hentData();

</script>


<?php get_footer(); ?>
