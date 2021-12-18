<?php





if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.

}



get_header(); ?>





<div id="primary" <?php astra_primary_class(); ?>>



    <?php astra_primary_content_top(); ?>



    <?php astra_content_loop(); ?>

    <section id="content-section">

        <section id="first-section">
            <img src="" alt="" class="singleImg">
            <div class="col2">
                <h2 class="navn"></h2>
                <div class="infopris">
                    <p class="shortinfo"></p>
                    <p class="price"></p>
                </div>
				<div class="quantitybutton">
				<label for="name">Quantity</label>
        		<input type="text" name="quantity" id="quantity" value="1">
				</div>
				<div class="buybuttons">
					<button id="addto">Add to cart</button>
					<button id="buynow">Buy now</button>
				</div>
                <hr class="singledivider">
            </div>
        </section>

    </section>




    <?php astra_primary_content_bottom(); ?>



</div><!-- #primary -->



<script>
let wine;
// db url, med + indhenter Id for den påklikkede vin
const dbUrl = "https://www.xn--mflingo-q1a.dk/kea/pompettesite/wp-json/wp/v2/wine/" + <?php echo get_the_ID() ?>;

// asynkron function, fetcher vores data som json
async function hentData() {
    const data = await fetch(dbUrl);
    wine = await data.json();
    visVin();
}

function visVin() {
        document.querySelector(".navn").textContent = wine.navn;
        document.querySelector(".price").textContent = wine.price;
        document.querySelector(".shortinfo").textContent = wine.winetype + "  " + wine.grape + " " +  wine.vintage + " " + wine.country;
        document.querySelector(".singleImg").src = wine.billede.guid;

    }

hentData();
</script>

<?php get_footer(); ?>