<?php





if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.

}



get_header(); ?>





<div id="primary" <?php astra_primary_class(); ?>>





    <?php astra_content_loop(); ?>
	<section id="goback-section">
		<div id="goback"></div>
		</section>

    <section id="content-section">
		

        <section id="first-section">
            <div class="col1">
                <img src="" alt="" class="singleImg">
            </div>
            <div class="col2">
                <h2 class="navn"></h2>
                <div class="infopris">
                    <p class="shortinfo"></p>
                    <p class="price"></p>
                </div>
                <div class="buttons">
                    <div class="quantitybuttons">
                        <button id="minusbutton">-</button>
                        <div id="quantity">1</div>
                        <button id="plusbutton">+</button>
                    </div>
                    <div class="buybuttons">
                        <button id="addto">Add to cart</button>
                        <button id="buynow">Buy now</button>
                    </div>
                </div>
                <hr class="solidred">
            </div>
        </section>

        <section id="second-section">
            <div class="imgcol">
                <img id="catimg"
                    src=""
                    alt="">
            </div>

            <div class="infocol">
                <ul class="infolist">
                    <li class="vintage">Vintage: </li>
                    <li class="grape">Grapes: </li>
                    <li class="region">Region: </li>
                    <li class="country">Country: </li>
                    <li class="type">Type: </li>
                    <li class="colour">Colour: </li>
                    <li class="size">Size: </li>
                </ul>

                <p class="beskrivelse"></p>

            </div>
        </section>

        <hr class="solidred">
    </section>




    <?php astra_primary_content_bottom(); ?>



</div><!-- #primary -->



<script>
let wine;
// db url, med + indhenter Id for den p??klikkede vin
const dbUrl = "https://www.xn--mflingo-q1a.dk/kea/pompettesite/wp-json/wp/v2/wine/" + <?php echo get_the_ID() ?>;

// asynkron function, fetcher vores data som json
async function hentData() {
    const data = await fetch(dbUrl);
    wine = await data.json();
    visVin();
}

//variables store current value og new value til quantity button
let val = 1;
let newVal;
//adds eventlistener til minus og plus buttons
const minusbutton = document.querySelector("#minusbutton");
minusbutton.addEventListener("click", decrement);

const plusbutton = document.querySelector("#plusbutton");
plusbutton.addEventListener("click", increment);
//functiosn der increment/decrement new value og tilf??jer det til dom, vha textcontent;
function decrement() {
    // Don't allow decrementing below 0
    if (val > 0) {
        newVal = val - 1;
    } else {
        newVal = 0;
    }
    console.log(newVal);

    val = newVal;
    document.querySelector("#quantity").textContent = newVal;
}

function increment() {
    newVal = val + 1;
    console.log(newVal);
    val = newVal;
    document.querySelector("#quantity").textContent = newVal;
}

function visVin() {
    document.querySelector(".singleImg").src = wine.billede.guid;
    document.querySelector(".navn").textContent = wine.navn;
    document.querySelector(".price").textContent = wine.price + " kr";
    document.querySelector(".shortinfo").textContent = wine.winetype + " - " + wine.grape + " - " + wine.country;
    document.querySelector(".vintage").textContent += wine.vintage;
    document.querySelector(".grape").textContent += wine.grape;
    document.querySelector(".region").textContent += wine.region;
    document.querySelector(".country").textContent += wine.country;
    document.querySelector(".type").textContent += wine.winetype;
    document.querySelector(".colour").textContent += wine.colour;
    document.querySelector(".size").textContent += wine.size;
    document.querySelector(".beskrivelse").textContent = wine.langbeskrivelse;

    if (wine.winetype == "White Wine") {
        document.querySelector("#catimg").src = "https://www.xn--mflingo-q1a.dk/kea/pompettesite/wp-content/uploads/2021/12/blahvid.png";
    } else if (wine.winetype == "Orange Wine") {
        document.querySelector("#catimg").src ="https://www.xn--mflingo-q1a.dk/kea/pompettesite/wp-content/uploads/2021/12/rod-orange2.png";
    } else if (wine.winetype == "Ros?? Wine") {
        document.querySelector("#catimg").src ="https://www.xn--mflingo-q1a.dk/kea/pompettesite/wp-content/uploads/2021/12/bla-pink.png"
    } else if (wine.winetype == "Sparkling Wine") {
        document.querySelector("#catimg").src ="https://www.xn--mflingo-q1a.dk/kea/pompettesite/wp-content/uploads/2021/12/rodsparkling.png"
    }else{
		document.querySelector("#catimg").src ="https://www.xn--mflingo-q1a.dk/kea/pompettesite/wp-content/uploads/2021/12/sortrodvin.png"
	}

	document.querySelector("#goback").addEventListener("click", tilbage);
}

function tilbage() {
        window.history.back()
    }

hentData();
</script>

<?php get_footer(); ?>