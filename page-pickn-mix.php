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

    <section id="totop-section">
        <div id="gotop"></div>
    </section>

    <template>
        <article class="theWine">
            <img src="" alt="">
            <h5 class="name"></h5>
            <div class="infodiv">
                <p class="type"></p>
                <p class="origin"></p>
            </div>
            <div class="prisogknap">
                <p class="price"></p>
                <button class="seMore">See more</button>
            </div>
        </article>
    </template>

    <?php astra_primary_content_bottom(); ?>

</div><!-- #primary -->

<script>
let wines;
//const for destinationen af indholdet af template
const destination = document.querySelector("#oversigt");
let template = document.querySelector("template");




//url til wp  db 
const url = "https://www.xn--mflingo-q1a.dk/kea/pompettesite/wp-json/wp/v2/wine?categories=11";
// asynkron function som afventer og indhenter json data fra restdb
async function hentData() {
    const jsonData = await fetch(url);
    wines = await jsonData.json();
    visWine();
}


function visWine() {
    console.log(wines);

    //for each loop looper igennem alle vinene i json
    wines.forEach(wine => {


        const klon = template.cloneNode(true).content;
        klon.querySelector(".name").textContent = wine.navn;
        klon.querySelector("img").src = wine.billede.guid;
        klon.querySelector(".type").textContent += wine.winetype + " - " + wine.grape;
        klon.querySelector(".origin").textContent += wine.region + " - " + wine.country;
        klon.querySelector(".price").textContent = wine.price + " kr";
        klon.querySelector(".seMore").addEventListener("click", () => location.href = wine.link);

        destination.appendChild(klon);

    });
}

//click eventlistener og function der scroller fra "til toppen" knap i bunden - til toppen af siden.
document.querySelector("#gotop").addEventListener("click", scrollUp);

function scrollUp() {
    console.log("i work");
    document.querySelector("#primary").scrollIntoView({
        behavior: 'smooth'
    });
}

hentData();
</script>

<?php get_footer(); ?>