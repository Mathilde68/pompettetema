<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>





<div id="primary" <?php astra_primary_class(); ?>>

    <?php astra_primary_content_top();?>
    <?php astra_content_page_loop(); ?>

    <section id=content-section>
<h1>Wine🍇</h1>

        <section id="filter-section">
            <div class="wrapper">

                <div id="vinpåhylde">
                    <div id="filterknap" data-kategori="all" class="allIllustration allSelect">all</div>
                    <div id="filterknap" data-kategori="4" class="redIllustration">red</div>
                    <div id="filterknap" data-kategori="5" class="whiteIllustration">white</div>
                    <div id="filterknap" data-kategori="8" class="roseIllustration">rose</div>
                    <div id="filterknap" data-kategori="6" class="bubblesIllustration">bubbles</div>
                    <div id="filterknap" data-kategori="7" class="orangeIllustration">orange</div>
                </div>

                <div id="hylde">
                    <h5 class="all filtertext">all</h5>
                    <h5 class="red filtertext">red</h5>
                    <h5 class="white filtertext">white</h5>
                    <h5 class="rose filtertext">rose</h5>
                    <h5 class="bubbles filtertext">bubbles</h5>
                    <h5 class="orange filtertext">orange</h5>
                </div>

            </div>
        </section>

        <h2 id="overskrift">All wines</h2>
        <hr class="bluedivider">
        <button>FILTERS</button>
        <section id="vinoversigt" class="loopview"></section>



    </section>
    <!----content section--->

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
const destination = document.querySelector("#vinoversigt");
let template = document.querySelector("template");
let filter = "all"
let overskrift = document.querySelector("#overskrift");



//url til wp  db 
const url = "https://www.xn--mflingo-q1a.dk/kea/pompettesite/wp-json/wp/v2/wine?per_page=100";
// asynkron function som afventer og indhenter json data fra restdb
async function hentData() {
    const jsonData = await fetch(url);
    wines = await jsonData.json();
    visVine();
}

const filterKnapper = document.querySelectorAll("#filterknap");
filterKnapper.forEach(knap => knap.addEventListener("click", filtrerMenu));

function filtrerMenu() {
    let selectclass = this.textContent + "Select";
    

    console.log(selectclass);

    
     //fjerner og tilføjer den pågældende select  class til den rigtige knap 
    if (filter == "all"){
        document.querySelector(".allSelect").classList.remove('allSelect');
    } else if(filter == "4"){
        document.querySelector(".redSelect").classList.remove('redSelect');
    } else if(filter == "5"){
        document.querySelector(".whiteSelect").classList.remove('whiteSelect');
    }
    else if(filter == "8"){
        document.querySelector(".roseSelect").classList.remove('roseSelect');
    }
    else if(filter == "6"){
        document.querySelector(".bubblesSelect").classList.remove('bubblesSelect');
    }
    else if(filter == "7"){
        document.querySelector(".orangeSelect").classList.remove('orangeSelect');
    }

    //sætter filters værdi lig med værdien fra data af den knap der førte ind i funktionen
    filter = this.dataset.kategori;

    //ændrer overskriften
    overskrift.textContent = this.textContent + " Wines";
  
  
  
    this.classList.add(selectclass);

    //kalder function vis kurser efter det nye filter er sat
    visVine();

    //scroller ned til indholdet efter tryk
    document.querySelector(".loopview").scrollIntoView({
        behavior: 'smooth'
    });
}

function visVine() {
    console.log(wines);
    // rydder indholdet af sektionen så der er plads til KUN det nye indhold (efter filtrering)
    destination.textContent = "";
    //for each loop looper igennem alle kurserne i json
    wines.forEach(wine => {
        if (filter == wine.categories || filter == "all") {

            const klon = template.cloneNode(true).content;
            klon.querySelector(".name").textContent = wine.navn;
            klon.querySelector("img").src = wine.billede.guid;
            klon.querySelector(".type").textContent += wine.winetype + " - " + wine.grape;
            klon.querySelector(".origin").textContent += wine.region + " - " + wine.country;
            klon.querySelector(".price").textContent = wine.price + " kr";
            klon.querySelector(".seMore").addEventListener("click", () => location.href = wine.link);

            destination.appendChild(klon);
        }
    });
}

hentData();
</script>
<?php get_footer(); ?>