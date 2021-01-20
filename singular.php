<?php
/**
* Theme Name:     Kontek
* Author:         Start Advertising, Inc.
* Template:       twentytwenty
* Text Domain:    kontek
* Description:    Kontek theme based on 2020 WordPress theme.
*/

get_header();
?>

<main id="site-content" role="main">

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
