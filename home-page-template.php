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
        <form id="loginForm" action="<? echo site_url(); ?>/projects-page" method="POST">
            <input type="text" name="Username" placeholder="Username" />
            <input type="text" name="Password" placeholder="Password" />
    </div>
    <div class="col"></div>
</div>
<div class="row">
    <div class="col text-center">
        <span class="forgot-password">Forgot Password?</span>
        <br>
        <input type="submit" name="Login" value="Login">
    </div>
</form>


</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
