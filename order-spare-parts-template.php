<?php
/**
* Theme Name:     Kontek
* Template Name: Order Spare Parts
*/
get_header();
?>

<main id="site-content" role="main">
    <script>/*
    for(var i=0, len=localStorage.length; i<len; i++) {
      var key = localStorage.key(i);
      var value = localStorage[key];
      console.log(key + " => " + value);
    }*/
</script>
<div class="row parts-search-bar">
  <div class='col-1'></div>
  <div class='col-10'>
    <div class='row'>
        <div class="col col-lg-2">
            <form id="search" >
                <input type='text' class='on-page-search' id='searchField'>
                <input type='button' id='searchSubmit' value=''><br>
                <span class='hover-and-click ml-3 small' style='font-size:smaller!important;margin-left:50px!important;'></span>

            </form>

        </div>
        <div class="col-3 col-lg-3 mt-5">
            <?PHP
                 $results = $wpdb->get_results("SELECT * from wp_projects where userID='".get_current_user_id()."'");
                foreach($results as $row) {
					$pn = 'wp_'.$row->projectNumber;
					$pdfUrl = $row->pdfUrl;
                    echo "
                    <div class='row'>
                        <div class='col mt-1'>
                            <span class='projectSpan'>Project # </span>
                            <span class='projectNumberSpan'> ".$row->projectNumber."</span>
                        </div>
                    </div>
                    <div class='row d-none d-lg-block'>
                        <div class='col'>
                        <span class='small'>".$row->Facility."</span>
                        </div>
                        <div class='col addyText'>
                        </div>
                    </div>
                    <div class='row d-none d-lg-block'>
                        <div class='col'>
                            <span class='small'>Contact : </span>
                            <span class='small'>".$row->contactFirstName." </span>
                            <span class='small'>".$row->contactLastName."</span>
                        </div>
                    </div>
        </div>
            <div class='col col-lg-3 mt-5'>
                    <span class='desc'>".$row->Description."</span>
            </div>
            <div class='col-2 col-lg-4 text-right'>
                    <input type='button' name='OpenDrawing' value='VIEW P&amp;ID' id='toggleDrawing'>
                    <!--<form id='cart' action='" . site_url() . "/cart' method='POST'>
                    <input type='hidden' name='projectNumber' value='".$row->projectNumber."'>-->
                    <label for='CartBtn' id='cartQty1'>
                    <a href='/parts/cart/'><input type='button' name='CartBtn' value='VIEW RFQ' id='cartBtn'></a>
                    ";
                    ?>
                    <a href='/parts/cart/'><img id='cartQtyImg' src='/parts/wp-content/uploads/2020/04/cart.png'><span id='cartQty'>0</span>
                    </label></a>
                    <?
                    echo "
                    </form>
            </div>
                    ";
                }
            ?>
          </div>
        </div>
        <div class='col-1'></div>
    </div>
<!-- #parts-search-bar -->




<!-- #alert-box -->

<div id='alert-box'></div>

<!-- #alert-box -->
<!-- #table-of-parts -->

    <div class='row' id='table-of-parts'>
        <div class='col'></div>
        <div class='col-10'>
            <div class='row' style='border-bottom:2px solid white!important;'><div class='col-12'><span class="hover-and-click text-center">Hover and Click to add to CART</span></div></div>
            <div class='row partsTableHead'>
                <div class='col-2 text-center border-right border-dark pt-5' ><b>Tag #</b></div>
                <div class='col-6 text-center border-right border-dark pt-5'><b>Spare Parts Description</b></div>
                <div class='col-2 text-center border-right border-dark pt-5'><b>Location</b></div>
                <div class='col-2 text-center border-right border-dark pt-5'><b>Kontek Part Number</b></div>
            </div>
        <?PHP
        /* Code to retrieve data from table */
            $results = $wpdb->get_results("SELECT * from ".$pn);
        foreach($results as $row) {
            echo "
                <div class='row partRow' id='".$row->PartNumber."'>
                    <div class='col-2 text-center border border-dark tagNumber addToCart' style='border-left:2px solid white!Important;'>
                        ".$row->TagNumber."
                    </div>
                    <div class='col-6 text-left border border-dark Desc'>".$row->Desc."</div>
                        <div class='col-2 text-left border border-dark'>".$row->Location."</div>
                        <div class='col-2 text-center border border-dark PartNumber' style='border-right:2px solid black!important;'>".$row->PartNumber."</div>
                    </div>
            ";
        }
        ?>
        </div>
        <div class='col'></div>
    </div>

<!-- #table-of-parts -->
<!-- #drawing -->

<div class='row mt-5' id='drawing'>
    <div class='col'></div>
    <div class='col-10'>

    <iframe id="pdfIframe" src="<? echo site_url(); ?>/web/viewer.html?file=%2Fparts/wp-content/uploads/<?php echo $pdfUrl; ?>&zoom=80"><a href="<? echo site_url(); ?>/web/viewer.html?file=%2Fparts/wp-content/uploads/<?php echo $pdfUrl; ?>">Open yourpdf.pdf</a></iframe>
    <br>

    </div>

    <div class='col'></div>
</div>

<!-- #drawing -->

<?php

if ( have_posts() ) {

    while ( have_posts() ) {
        the_post();

        get_template_part( 'template-parts/content', get_post_type() );
    }
}

?>
</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
