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
                 <div class="price-select-container">
                        <label for="price-select">Amount:</label>
                        <input id= price-select type="number">
                    </div>
                    <div class="quantitybuttons hidden">
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
                <img id="boximg"
                    src="https://www.xn--mflingo-q1a.dk/kea/pompettesite/wp-content/uploads/2021/12/bla-orange.png"
                    alt="">
            </div>

            <div class="infocol">

                <p class="beskrivelse"></p>

            </div>
        </section>

        <hr class="solidred">
    </section>




    <?php astra_primary_content_bottom(); ?>



</div><!-- #primary -->



<script>
let notwine;
// db url, med + indhenter Id for den påklikkede vin
const dbUrl = "https://xn--mflingo-q1a.dk/kea/pompettesite/wp-json/wp/v2/notwine/" + <?php echo get_the_ID() ?>;

// asynkron function, fetcher vores data som json
async function hentData() {
    const data = await fetch(dbUrl);
    notwine = await data.json();
    visNotWines();
}

//variables store current value og new value til quantity button
let val = 1;
let newVal;
//adds eventlistener til minus og plus buttons
const minusbutton = document.querySelector("#minusbutton");
minusbutton.addEventListener("click", decrement);

const plusbutton = document.querySelector("#plusbutton");
plusbutton.addEventListener("click", increment);
//functiosn der increment/decrement new value og tilføjer det til dom, vha textcontent;
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



function visNotWines() {
    document.querySelector(".singleImg").src = notwine.billede.guid;
    document.querySelector(".navn").textContent = notwine.navn;
    document.querySelector(".price").textContent = notwine.price + " kr";
    document.querySelector(".beskrivelse").textContent = notwine.langbeskrivelse;

   console.log(notwine.categories);

	document.querySelector("#goback").addEventListener("click", tilbage);

    if(notwine.categories == 10){
        document.querySelector(".quantitybuttons").classList.add("hidden");
      

    }else{
        document.querySelector(".price-select-container").classList.add("hidden");
        document.querySelector(".quantitybuttons").classList.remove("hidden");
    }
}

function tilbage() {
        window.history.back()
    }

hentData();
</script>

<?php get_footer(); ?>