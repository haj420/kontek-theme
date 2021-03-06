<?php
/**
* Theme Name:     Kontek
* Template Name: Cart
*/
get_header();
?>

<main id="site-content" role="main">
<script>
    for(var i=0, len=localStorage.length; i<len; i++) {
      var key = localStorage.key(i);
      var value = localStorage[key];
      console.log(key + " => " + value);
    }
</script>
<form name='orderForm' id='orderForm' action='<? echo site_url(); ?>/thank-you' method='POST'>
<div class='row'>
    <div class='.d-sm-none .d-md-block col'></div>
    <div class='col-12 col-lg-10'>
		<?PHP
			 $results = $wpdb->get_results("SELECT * from wp_projects where userID='".get_current_user_id()."'");
			foreach($results as $row) {
				$pn = $row->projectNumber;
        echo "
        <!-- #checkout-div -->
        <div class='checkout-div mt-5'>
            <div class='row mt-4'>
                <div class='col'>
                    <span class='text-left billingDetails ml-3'>BILLING DETAILS</span>
                </div>
                <div class='col col-lg-4'>
                    <input type='checkbox' name='shipToDiff'>
                    <span class='text-left shipToDiff'>SHIP TO DIFFERENT ADDRESS?</span>
                </div>
            </div>
            <div class='row'>
                <div class='col-4'>
                    <label for='BFirstName' class=' orderFormLabel'>First Name</label>
                    <input id='BFirstName' name='BFirstName' class='form-control' value='".$row->contactFirstName."'>
                </div>
                <div class='col-4'>
                    <label for='BCompany' class=' orderFormLabel'>Company Name</label>
                    <input id='BCompany' name='BCompany'  class='form-control' value='".$row->Facility."'>
                </div>
                <div class='col-4'>
                    <label for='SCompany' class=' orderFormLabel'>Company Name</label>
                    <input id='SCompany' name='SCompany' class='form-control' value='".$row->Facility."' placeholder='".$row->Facility."'>
                </div>
            </div>
            <div class='row'>
                <div class='col-4'>
                    <label for='BLastName' class=' orderFormLabel'>Last Name</label>
                    <input id='BLastName' name='BLastName' class='form-control' value='".$row->contactLastName."'>
                </div>
                <div class='col-4'>
                    <label for='BStreet' class=' orderFormLabel'>Street Address</label>
                    <input id='BStreet' name='BStreet' class='form-control' value='".$row->Street."'>
                </div>
                <div class='col-4'>
                    <label for='SStreet' class=' orderFormLabel'>Street Address</label>
                    <input id='SStreet' name='SStreet' class='form-control' value='".$row->Street."' placeholder='".$row->Street."'>
                </div>
            </div>
            <div class='row'>
                <div class='col-2'>
                    <label for='BPhoneP' class=' orderFormLabel'>Phone<br> Primary <span style='color:red'>*</span></label>
                    <input id='BPhoneP' name='BPhoneP' class='form-control' value='".$row->primaryPhone."'>
                </div>
                <div class='col-2 pl-0'>
                    <label for='BPhoneS' class=' orderFormLabel'>Phone<br> Secondary</label>
                    <input id='BPhoneS' name='BPhoneS' class='form-control' value='".$row->secondaryPhone."'>
                </div>
                <div class='col-4'>
                    <label for='BCity' class=' orderFormLabel'>City</label>
                    <input id='BCity' name='BCity' class='form-control' value='".$row->City."'>
                </div>
                <div class='col-4'>
                    <label for='SCity' class=' orderFormLabel'>City</label>
                    <input id='SCity' name='SCity' class='form-control' value='".$row->City."' placeholder='".$row->City."'>
                </div>
            </div>
            <div class='row'>
                <div class='col-4'>
                    <label for='BEmail' class=' orderFormLabel'>Email <span style='color:red'>*</span></label>
                    <input id='BEmail' name='BEmail' class='form-control' required='required'>
                </div>
                <div class='col-2'>
                    <label for='BState' class=' orderFormLabel'>State/Province</label>
                    <input id='BState' name='BState' class='form-control' value='".$row->State."'>
                </div>
                <div class='col-2'>
                    <label for='BZip' class=' orderFormLabel'>Postal Code</label>
                    <input id='BZip' name='BZip' class='form-control' value='".$row->zip."'>
                </div>
                <div class='col-2'>
                   <label for='SState' class=' orderFormLabel'>State/Province</label>
                   <input id='SState' name='SState' class='form-control' value='".$row->State."' placeholder='".$row->State."'>
               </div>
               <div class='col-2 pl-0'>
                   <label for='SZip' class=' orderFormLabel'>Postal Code</label>
                   <input id='SZip' name='SZip' class='form-control' value='".$row->zip."' placeholder='".$row->zip."'>
               </div>
            </div>
            <div class='row'>
                <div class='col-2'>
                    <label for='CallAt' class=' orderFormLabel'>Best Time to Contact</label>
                    <input id='CallAt' name='CallAt' class='form-control'>
                </div>
                <div class='col-1'>
                    <label for='TimeZone' class=' orderFormLabel'>Time Zone</label>
                    <input id='TimeZone' name='TimeZone' class='form-control'>
                </div>
                <div class='col-1 text-center'>
                    <label for='ContactVia' class=' orderFormLabel'>Contact Me By</label>
                <table id='CViaTable'><tr><td class='CVTDI'>
                    <input type='radio' id='ContactViaE' name='ContactVia' value='email' class='form-control'></td><td class='CVTDL'><span  id='CVE'>Email </span>
                       </td></tr><tr><td class='CVTDI'>
                    <input type='radio' id='ContactViaP' name='ContactVia' value='Phone' class='form-control'></td><td class='CVTDL'><span  id='CVP'>Phone </span>
                        </td></tr></table>
                </div>
                <div class='col-4'>
                    <label for='BCountry' class=' orderFormLabel'>Country</label>
                    <input id='BCountry' name='BCountry' class='form-control'>
                </div>
                <div class='col-4'>
                    <label for='SCountry' class=' orderFormLabel'>Country</label>
                    <input id='SCountry' name='SCountry' class='form-control'>
                </div>
            </div>
        </div>
        <!-- #checkout-div -->
        <!-- #cart-head-div -->
        <div class='cart-head-div mt-5'>
            <div class='row'>
                <div class='col-2 text-left'>
                    <span class='cart-head-span'>CART</span>
                </div>
                <div class='col-10 text-left'>
                    <span class='cart-head-span'>Project # </span><span class='cartHeadProjNumb'>".$row->projectNumber."</span><input type='hidden' name='projectNumber' value='".$row->projectNumber."'>
                </div>
            </div>
            <div class='row cart-titles'>
                <div class='col-1 border border-light'></div>
                <div class='col-3 border border-light pt-5'>
                    <span class='cart-titles'>Tag No.</span>
                </div>
                <div class='col border border-light pt-5'>
                    <span class='cart-titles'>Product</span>
                </div>
                <div class='col-3 border border-light pt-5'>
                    <span class='cart-titles'>Kontek Part Number</span>
                </div>
                <div class='col-1 border border-light pt-5'>
                    <span class='cart-titles'>Qty</span>
                </div>
            </div>
        </div>
        ";
        }
        //$picSrc = urlencode("/wp-content/uploads/2020/02/commingsoon.png");
        //var_dump($_REQUEST);
        $itemset = array();
            echo "<!-- #checkout-cart-div -->";
            echo "<div class='checkout-cart-div'>";



            echo "<div class='row border border-light'>";
            echo "<div class='col-10 text-left cart-footer'>";
            echo "<span class='RFONotice'>This is a <span style='color:red'>Request for Quote</span> only. Upon receipt and review by a Kontek Spare Parts representative, you will receive pricing and delivery. Please ensure your contact information is accurate.</span>";
            echo "</div><div class='col-2'>";
            echo "<input type='button' name='cart-submit mt-4' class='cart-submit' value='SUBMIT'>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<!-- #checkout-cart-div -->";
        ?>
        <div class='row pt-5 pb-5'>
            <div class='col'>
                <span class='finePrint '>Kontek Water assumes no responsibility to process Spare Parts orders requested via this website until the order has been acknowledged and quoted by a Kontek authorized sales representative and accepted by an authorized purchaser on record at Kontek for the ordering company. Upon acceptance of your order, Kontek’s standard sales terms and conditions apply. </span>
            </div>
        </div>
    </div>
    <div class='.d-sm-none .d-md-block col'></div>
</div>
</form>
<div class='row' id='successDiv'>
 <div class='col text-center'>
     <h2 class='text-center successMessage'>Your SPARE PARTS QUOTE REQUEST has been submitted for review.</h2>
     <h2 class='text-center successMessage'>A Kontek Authorized Sales Representative will contact you.</h2>
     <br>
     <h2 class='text-center successMessage'>Thank you,</h2>
     <img class='text-center successImg' src='<? echo site_url(); ?>/wp-content/uploads/2020/02/Kontek-Logo-80-1.png'>
 </div>
 </div>
 <!-- #successDiv -->
</div>
</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer();
 echo("
 <script>console.log('pn set to ".$pn."');</script>
<script>
for(var i=0, len=localStorage.length; i<len; i++) {
    var project_number = '".$pn."';
    var key = localStorage.key(i);
    var value = localStorage[key];
    console.log(key + ' => ' + value);
    var action = 'look up';
     $.ajax({
        url:'/parts/action.php',
        method:'POST',
        data:{project_number:project_number,product_id:key, product_quantity:value, action:action},
        success:function(data)
            {
                $('.checkout-cart-div').prepend(data);
            }
      });
}



              </script>
 ");
 ?>
