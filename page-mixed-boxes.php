<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>




<div id="primary" <?php astra_primary_class(); ?>>



    <?php astra_primary_content_top();?>

    <?php astra_content_page_loop(); ?>
    <section id=content-section>




        <section id="boxoversigt" class="loopview"></section>
    </section>

    <section id="totop-section">
        <div id="gotop"></div>
    </section>

    <template>
        <article class="theWine">
            <img src="" alt="">
            <h5 class="name"></h5>
            <p class="description"></p>
            <div class="prisogknap">
                <p class="price"></p>
                <button class="seMore">See more</button>
            </div>
            <hr class="solidred">
        </article>
    </template>

    <?php astra_primary_content_bottom(); ?>

</div><!-- #primary -->


<script>
let boxes;
//const for destinationen af indholdet af template
const destination = document.querySelector("#boxoversigt");
let template = document.querySelector("template");




//url til wp  db 
const url = "https://xn--mflingo-q1a.dk/kea/pompettesite/wp-json/wp/v2/boxes";
// asynkron function som afventer og indhenter json data fra restdb
async function hentData() {
    const jsonData = await fetch(url);
    boxes = await jsonData.json();
    visBoxes();
}


function visBoxes() {
    console.log(boxes);

    //for each loop looper igennem alle boxene i json
    boxes.forEach(box => {


        const klon = template.cloneNode(true).content;
        klon.querySelector(".name").textContent = box.navn;
        klon.querySelector("img").src = box.billede.guid;
        klon.querySelector(".price").textContent = box.price + " kr";
        klon.querySelector(".seMore").addEventListener("click", () => location.href = box.link);

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