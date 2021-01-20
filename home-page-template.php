<?php
/**
* Theme Name:     Kontek
* Template Name: Home Page
*/

get_header();
?>

<main id="site-content" role="main">

<div class="row">
    <div class="col"></div>
    <div class="col-6">
        <h2 class="welcome-home-message text-center">Welcome to KONTEK Spare Parts Quoting Center</h2>
    </div>
    <div class="col"></div>
</div>
<div class="row">
    <div class="col"></div>
    <div class="col">
        <form id="loginForm" action="https://www.kontekwater.com/parts/wp-login.php" method="POST">
            <input type="text" id='username' name="log" placeholder="Username" />
            <input type="password" id='password' name="pwd" placeholder="Password" />
    </div>
    <div class="col"></div>
</div>
<div class="row mt-4">
    <div class="col text-center">
        <span class="forgot-password"><a href='https://www.kontekwater.com/parts/wp-login.php?action=lostpassword'>Forgot Password?</a></span>
        <br>
        <input id='customerLogin' type="submit" name="Login" value="Login" onclick=''>
    </div>
</form>


</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
