<?
/*  filename:   updateCart.php
 *       desc:   This page is a lazy way of updating the order in the database.
 *     @param:   partNumber, qty
 *
 */

if(iset($_POST)) {
    $projectNumber = $_POST['projectNumber'];
    $partNumber = $_POST['partNumber'];
    $qty = $_POST['qty'];
    if(!isset($_SESSION["order"])) {
        session_start();
        $_SESSION["projectNumber"] = $projectNumber;
        $_SESSION["cart"] = array(
            $partNumber => $qty
        );
    } else {
        array_push($_SESSION['cart'], $partNumber = $qty);
    }
}
?>