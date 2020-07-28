/**
 * Theme Name:     Kontek
 * Author:         Start Advertising, Inc.
 * Template:       twentytwenty
 * Version:        3.6.9
 * Text Domain:	   kontek
 * Description:    Kontek theme based on 2020 WordPress theme.
 */


//make search bar fixed on order parts page
if (document.url === "//parts/order-spare-parts") {
    document.getElementById("site-header")[0].style.position = 'fixed';
    console.log('header fixed.');

}
//Change color of clicked row (client request)
$(".project_row").on('click', function() {
    $(this).css('border', '1px solid navy');
    $("[name=choose-project]").submit();
});
//Toggle the user's schematics pdf
$('#toggleDrawing').click(function() {
    $('#table-of-parts').toggle();
    $('#drawing').toggle();
    $("#searchField").toggle();
    $("#searchSubmit").toggle();
    $(".hover-and-click").toggle();
    $(this).val(function(i, v){
    return v === 'VIEW P&ID' ? 'CLOSE P&ID' : 'VIEW P&ID';
    });
});

//Search order page on keyup in search box
$(document).ready(function($) {
  $(".on-page-search").on("keyup", function () {
    var v = $(this).val();
    $(".results").removeClass("results");
    $(".noresults").removeClass("noresults");
    $(".partRow").each(function ()
      { if (v !== "" && $(this).text().search(new RegExp(v,'gi')) !== -1) {
        $(this).addClass("results");
      } else if (v !== "" && $(this).text().search(v) !== 1) {
        $(this).addClass("noresults");
      }
    });
  });
});


//Item verification Popup
var mouse_is_inside = false;
var $n = 0;
$(document).ready(function() {
  $('#alert-box').hover(function(){
    mouse_is_inside=true;
  }, function(){
    mouse_is_inside=false;
  });
  $("body").mouseup(function(){
                    if((! mouse_is_inside)){
       $('#alert-box').hide(); }
  });
});

/* permanently change color of div on click */

$(function(){
    $('.partRow').on('click',function(){
        $(this).closest('.partRow').css('backgroundColor', '#FEDE01');
    });
});

// updateCartQty() function
function updateCartQty() {
  var itemQty = 0;
  for(var i=0, len=localStorage.length; i<len; i++) {
    var key = localStorage.key(i);
    var value = localStorage[key];
    if(key !== 'pdfjs.history') {
      itemQty = (+itemQty) + (+value);
     $("[id='"+key+"']").children(".PartNumber").append("<img class='item_added' src='https://www.kontekwater.com/parts/wp-content/uploads/2020/05/Screen-Shot-2020-05-22-at-11.28.38-AM-1.png'>");
    }
  }
  $('#cartQty').text(itemQty);
}

//RUN updateCartQty ON PAGE LOAD FOR Cart
$(document).ready(updateCartQty());

/*Add item to cart BACKUP
$( document ).ready(function() {
  updateCartQty();
  for(var i=0, len=localStorage.length; i<len; i++) {
      var key = localStorage.key(i);
      var value = localStorage[key];
      if(key !== 'pdfjs.history') {
        $("[id='"+key+"']").children(".PartNumber").append("<img class='item_added' src='https://www.kontekwater.com/parts/wp-content/uploads/2020/05/Screen-Shot-2020-05-22-at-11.28.38-AM-1.png'>");
      }
});

$('.partRow').click(function() {
    $('.partRow').each(function() {
      $(this).css('backgroundColor', '#f8f9fa');
    });
    if($('#alert-box').css('display') === 'none'){
      var $partNumber = $(this).closest('.partRow').attr('id');
      $('#alert-box').html('<div style="text-align:center;"><p>Would you like to add '+$partNumber+' to your cart?</p><input class="mt-2" type="integer" name="quantity" id="quantity" placeholder="Quantity" size="7"><br><br><input type="button" id="addtocart" name="addtocart" value="YES"><input type="button" id="dontaddtocart" name="dontaddtocart" value="NO"></div>');
      $('#alert-box').show();

      $('#addtocart').click(function() {
      var noi = $("#quantity").one().val();
      noi = parseInt(noi);
      //if(noi !== 0) {if(typeof cartQty !== 0) {cartQty += noi;}else { cartQty = noi;}}
      if(noi === 0) {
      $('#alert-box').html('<div style="text-align:center;"><p>You did not enter a quantity. Nothing was added to your cart.</p><input type="button" id="error" name="error" value="OK"></div>');
      $('#error').click(function() {
        $('#alert-box').hide();
      });
      return false;
      }

      // ADDED TO CART PART BELOW!!!!!

      /*$(this).closest("div.PartNumber").text("\n Added To Cart.");
      while(noi > 0) {
        console.log("new noi "+noi);
        $n = $n + 1;
      var $i = "item["+$n+"]";
        $('#cart').append("<input type='hidden' name='"+$i+"' value='"+$tag+"'>");

        noi = noi - 1;
      }

        $('#alert-box').hide();
      });
      $('#dontaddtocart').click(function() {
        $('#alert-box').hide();
        var itemQty =0;
for(var i=0, len=localStorage.length; i<len; i++) {
      var key = localStorage.key(i);
      var value = localStorage[key];
      if(key !== 'pdfjs.history') {
        itemQty = (+itemQty) + (+value);
      }
    }
      });
      $('#error').click(function() {
        $('#alert-box').hide();
      });
    }
});


// $(".delete").click(function() {
//   $(this).parent().parent().remove();
// });

if(typeof cartQty === 'undefined') { var cartQty = 0;}
/*Add item to cart DEMO */
$('.partRow').click(function() {
  console.log('.partRow clicked');
  $('.partRow').each(function() {
    $(this).css('backgroundColor', '#f8f9fa');
  });
  $('#alert-box').show();
  var $partNumber = $(this).closest('.partRow').attr('id');
  $('#alert-box').html('<div style="text-align:center;"><p>Would you like to add '+$partNumber+' to your cart?</p><input class="mt-2" type="integer" name="quantity" id="quantity" placeholder="Quantity" size="7"><br><br><input type="button" id="addtocart" name="addtocart" value="YES"><input type="button" id="dontaddtocart" name="dontaddtocart" value="NO"></div>');

  $('#addtocart').click(function() {
    var noi = $("#quantity").one().val();
    noi = parseInt(noi);
    if(typeof cartQty !== 0) {cartQty += noi;}
    //console.log('addtocart clicked');
    var product_quantity = parseInt($("input#quantity").val());
    //console.log(product_quantity + ' is of type ' + jQuery.type(product_quantity));

    if(quantity === 0) {
      console.log('no quantity entered');
      $('#alert-box').html('<div style="text-align:center;"><p>You did not enter a quantity. Nothing was added to your cart.</p><input type="button" id="error" name="error" value="OK"></div>');
      $('#error').click(function() {
        $('#alert-box').hide();
      });
      return false;
    }
    else {
      var action = 'add';
      var product_id = $partNumber;
      console.log('id = '+product_id);

      if(product_quantity > 0)
      {
        $.ajax({
          url:"/parts/action.php",
          method:"POST",
          data:{product_id:product_id, product_quantity:product_quantity, action:action},
          success:function(data)
          {

            if (typeof(Storage) !== "undefined") {
            localStorage.setItem(product_id, product_quantity);
            updateCartQty();
            window.location.reload(true);
      } else {
        alert("Sorry no web storage support!");
      }
          }
        });
      }
      else
      {
        console.log('Please enter quantity');
        alert("Please Enter Number of Quantity");
      }
    }

      $('#alert-box').hide();
  });
  $('#dontaddtocart').click(function() {
    $('#alert-box').hide();
  });
  $('#error').click(function() {
    $('#alert-box').hide();
  });
});





// /* END DEMO ADD TO CART */


/* SETUP CART on cart-template.php */
function get_item_info(project_number, product_id) {
  var action = 'look up';
  $.ajax({
    url:"/parts/action.php",
    method:"POST",
    data:{project_number:project_number,product_id:product_id, action:action},
    success:function(data)
    {
      console.log('Item data retrieved: '+data);
      $(".checkout-cart-div").prepend(data);
    }
  });
}
if(document.url === "//parts/cart/"){
 console.log("Looking up cart items.");
 for(var i=0, len=localStorage.length; i<len; i++) {
    var project_number = 'K2018295';
    var product_id = localStorage.key(i);
    var value = localStorage[key];
    console.log('get_item_info() starting.');
    get_item_info(project_number, product_id);

  }
}

//Clear Ship info on click ship to DIFFERENT

$("[name=shipToDiff]").change(function() {
  $("#SCompany").val("");
  $("#SStreet").val("");
  $("#SCity").val("");
  $("#SState").val("");
  $("#SCity").val("");
  $("#SZip").val("");
  $("#SCountry").val("");
});

//Submit Cart Form
$(".cart-submit").click(function() {
  if($("#BEmail").val() && $('#BPhoneP').val()) {
  var $n = 0;
  var dataString = 'projectNumber='+$('.cartHeadProjNumb').text()+'&BFirstName='+$('#BFirstName').val()+'&BCompany='+$('#BCompany').val()+'&SCompany='+$('#SCompany').val()+'&BLastName='+$('#BLastName').val()+'&BStreet='+$('#BStreet').val()+'&SStreet='+$('#SStreet').val()+'&BPhoneP='+$('#BPhoneP').val()+'&BPhoneS='+$('#BPhoneS').val()+'&BCity='+$('#BCity').val()+'&SCity='+$('#SCity').val()+'&BEmail='+$('#BEmail').val()+'&BState='+$('#BState').val()+'&BZip='+$('#BZip').val()+'&SState='+$('#SState').val()+'&SZip='+$('#SZip').val()+'&CallAt='+$('#CallAt').val()+'&TimeZone='+$('#TimeZone').val()+'&ContactVia='+$('[name=ContactVia').val()+'&BCountry='+$('#BCountry').val()+'&SCountry='+$('#SCountry').val();
  $(".item").each(function() {
     dataString += '&itemTag['+$n+']='+$(".itemTag", this).text()+'&itemDesc['+$n+']='+$(".itemDesc", this).text()+'&partNumber['+$n+']='+$(".partNumber", this).text()+'&Qty['+$n+']='+$(".Qty", this).text();
     $n = $n + 1;
  });
    console.log(dataString);
    $.ajax({
        type:"POST",
        url: "/parts/process.php",
        data: dataString,
        success:function() {
            $("#orderForm").hide();
            $("#successDiv").show();
            localStorage.clear();
            }
           });
}
});

//We need to add a button (NO) that closes the #alert-box
$("#dontadd").click(function(){
  $("#alert-box").close();
});

/*
Listen for customer login action $("#customerLogin") button
Desc: This is the customer login section that runs a login
function at /parts/wp-content/action.php to verify a Username
and password set and either returns project numbers associated
with that client or false.
*/
$("#customerLogin").click(function(){
  if($("#username").val() && $("#password").val()) {
    var username = $("#username").val();
    var password = $("#password").val();
    var dataString = 'action=login&username='+username+'&password='+password;
    $.ajax({
        type:"POST",
        url: "/parts/action.php",
        data: dataString,
        success: function() {

        }
    });
  }
});
