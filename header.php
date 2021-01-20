<?php
/**
* Theme Name:     Kontek
* Author:         Start Advertising, Inc.
* Template:       twentytwenty
* Text Domain:    kontek
* Description:    Kontek theme based on 2020 WordPress theme.
*/

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<link rel="icon" type="image/png" href="//www.kontekwater.com/wp-content/uploads/2020/07/Rekon-Website.png">
		 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		 <title><?php bloginfo('name'); ?></title>
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>


	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>
		<div class="modal" tabindex="-1" role="dialog" id='mobile-warning-box'>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style='display:block!important;'>
        <h5 class="modal-title text-center">Please rotate your phone.</h5>

        </button>
      </div>
      <div class="modal-body">
				<img id='mobile-warning-box-image' src='<?php echo get_stylesheet_directory_uri();?>/assets/images/turnPhone.gif' id='turn-phone-warning-gif'/>
        <p class='text-center'>This site is best viewed in landscape mode.</p>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

		<header id="site-header" class="header-footer-group" role="banner">
            <div class="quick-contact-div">
							<div class='row'>
							<div class='d-sm-none d-md-block col'></div>
							<div class='col-12 col-lg-10'>
                <a class="text-left quick-tel" href="tel:8773328366">Call us:877-322-8366</a>
                <a class="texp-left quick-email" href="mailto:sales@kontekwater.com">Sales@kontekwater.com</a>
                <a class="text-right social" href="#">
                    <img id="yt" src="<? echo site_url(); ?>/wp-content/uploads/2020/02/yt.png" />
                </a>
                <a class="text-right social" href="https://www.linkedin.com/company/kontek-ecology-systems/">
            <img id="li" src="<? echo site_url(); ?>/wp-content/uploads/2020/02/li.png" />
            </a>
					</div>
					<div class='.d-sm-none .d-md-block col'></div>
				</div>
            </div>

			<div class="header-inner section-inner">
				<div class='row'>
				<div class='.d-sm-none .d-md-block col'></div>
				<div class="header-titles-wrapper col-2">

					<?php

					// Check whether the header search is activated in the customizer.
					$enable_header_search = get_theme_mod( 'enable_header_search', true );

					if ( true === $enable_header_search ) {

						?>

						<button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
							<span class="toggle-inner">
								<span class="toggle-icon">
									<?php twentytwenty_the_theme_svg( 'search' ); ?>
								</span>
								<span class="toggle-text"><?php _e( 'Search', 'twentytwenty' ); ?></span>
							</span>
						</button><!-- .search-toggle -->

					<?php } ?>

					<div class="header-titles mt-3 mb-3">

						<div class="site-title faux-heading"><a href="https://www.kontekwater.com/parts/"></a></div><div class="site-description"></div><!-- .site-description -->
					</div><!-- .header-titles -->

					<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
						<span class="toggle-inner">
							<span class="toggle-icon">
								<?php twentytwenty_the_theme_svg( 'ellipsis' ); ?>
							</span>
							<span class="toggle-text"><?php _e( 'Menu', 'twentytwenty' ); ?></span>
						</span>
					</button><!-- .nav-toggle -->

				</div><!-- .header-titles-wrapper -->

				<div class="header-navigation-wrapper col-6 px-3">

					<?php
					if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {
						?>

							<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'twentytwenty' ); ?>" role="navigation">

								<ul class="primary-menu reset-list-style">

								<?php
								if ( has_nav_menu( 'primary' ) ) {

									wp_nav_menu(
										array(
											'container'  => '',
											'items_wrap' => '%3$s',
											'theme_location' => 'primary',
										)
									);

								} elseif ( ! has_nav_menu( 'expanded' ) ) {

									wp_list_pages(
										array(
											'match_menu_classes' => true,
											'show_sub_menu_icons' => true,
											'title_li' => false,
											'walker'   => new TwentyTwenty_Walker_Page(),
										)
									);

								}
								?>

								</ul>

							</nav><!-- .primary-menu-wrapper -->



				</div><!-- .header-navigation-wrapper -->
<?php
}

if ( true === $enable_header_search || has_nav_menu( 'expanded' ) ) {
    ?>

    <div class="header-toggles hide-no-js col-2" style='margin-right:0px!important;'>

    <?php
    if ( has_nav_menu( 'expanded' ) ) {
        ?>

        <div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">

            <button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
                <span class="toggle-inner">
                    <span class="toggle-text"><?php _e( 'Menu', 'twentytwenty' ); ?></span>
                    <span class="toggle-icon">
                        <?php twentytwenty_the_theme_svg( 'ellipsis' ); ?>
                    </span>
                </span>
            </button><!-- .nav-toggle -->

        </div><!-- .nav-toggle-wrapper -->

        <?php
    }

    if ( true === $enable_header_search ) {
        ?>

        <div class="toggle-wrapper search-toggle-wrapper">

            <button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
                <span class="toggle-inner">
                    <?php twentytwenty_the_theme_svg( 'search' ); ?>

                </span>
                <span class="toggle-text spare-parts">SPARE PARTS</span>
            </button><!-- .search-toggle -->

        </div>

        <?php
    }
    ?>

    </div><!-- .header-toggles -->
    <?php
}
        ?>
				<div class='.d-sm-none .d-md-block col'></div>
			</div><!-- .row -->
			</div><!-- .header-inner -->

			<?php
			// Output the search modal (if it is activated in the customizer).
			if ( true === $enable_header_search ) {
				get_template_part( 'template-parts/modal-search' );
			}
			?>
  <?php //if(is_page('projects-page'){ echo "<div>Your div</div>"; }?>

		</header><!-- #site-header -->

		<?php
		// Output the menu modal.
		get_template_part( 'template-parts/modal-menu' );
