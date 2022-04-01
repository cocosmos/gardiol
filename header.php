<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php elegant_description(); ?>
	<?php elegant_keywords(); ?>
	<?php elegant_canonical(); ?>

	<?php do_action( 'et_head_meta' ); ?>

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php $template_directory_uri = get_template_directory_uri(); ?>
	
	<script type="text/javascript">
		document.documentElement.className = 'js';
	</script>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
	wp_body_open();

	if ( et_builder_is_product_tour_enabled() ) {
		return;
	}
?>
	<div id="page-container" class="page-container">
		<?php $header_vars = extra_get_header_vars(); ?>
		<!-- Header -->
		<header class="header <?php echo $header_vars['header_classes']; ?>">
			<?php if ( $header_vars['top_info_defined'] || is_customize_preview() ) { ?>
			<!-- #top-header -->
			<div id="top-header" style="<?php extra_visible_display_css( $header_vars['top_info_defined'] ); ?>">
				<div class="container">
					
					<?php
						$logo = ( $user_logo = et_get_option( 'extra_logo' ) ) && '' != $user_logo ? $user_logo : $template_directory_uri . '/images/logo.svg';
						$show_logo = extra_customizer_el_visible( extra_get_dynamic_selector( 'logo' ) ) || is_customize_preview();

						if ( $show_logo ) {
							// Get logo image size based on attachment URL.
							$logo_size   = et_get_attachment_size_by_url( $logo );
							$logo_width  = ( ! empty( $logo_size ) && is_numeric( $logo_size[0] ) )
									? $logo_size[0]
									: '300'; // 300 is the width of the default logo.
							$logo_height = ( ! empty( $logo_size ) && is_numeric( $logo_size[1] ) )
									? $logo_size[1]
									: '81'; // 81 is the height of the default logo.
						?>

						<!-- Logo and title-->

					
						<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" data-fixed-height="<?php echo esc_attr( et_get_option( 'fixed_nav_logo_height', '51' ) ); ?>">
							<img src="<?php echo esc_attr( $logo ); ?>" width="<?php echo esc_attr( $logo_width ); ?>" height="<?php echo esc_attr( $logo_height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" id="logo" />
							<div class="mp-title">
								<p class="mp-title__main"><?php echo get_bloginfo( 'title' ) ?></p>
								<p class="mp-title__description"> <?php echo get_bloginfo( 'description' ) ?></p>
							</div>
						</a>

						<?php
						}
						?>

					<!-- #et-info -->
					<div id="et-info">

						<?php if ( $header_vars['output_header_social_icons'] ) { ?>
							
						<!-- .et-extra-social-icons -->
						<ul class="et-extra-social-icons" style="<?php extra_visible_display_css( $header_vars['show_header_social_icons'] ); ?>">
							<?php $social_icons = extra_get_social_networks(); ?>
							<?php foreach ( $social_icons as $social_icon => $social_icon_title ) { ?>
								
								<?php $social_icon = esc_attr( $social_icon ); ?>
								<?php $social_icon_url = et_get_option( sprintf( '%s_url', $social_icon ), '' ); ?>
								<?php if ( ! empty( $social_icon_url ) && 'on' === et_get_option( "show_{$social_icon}_icon", 'on' ) ) { ?>
								<li class="et-extra-social-icon <?php echo $social_icon; ?>">
									<a href="<?php echo esc_url( $social_icon_url ); ?>" target="_blank" class="et-extra-icon et-extra-icon-background-hover et-extra-icon-<?php echo $social_icon; ?>"></a>
						
								</li>
								
							
								<?php } ?>
							<?php } ?>
							<li class="et-extra-social-icon">
								<a href="/contact" class="et-extra-icon et-extra-icon-basic_email et-extra-icon-background-none"></a>
							</li>
							<!-- Popup form-->
							<li id="header_search-icon" class="et-extra-social-icon">
								
								<svg class="search-icon" viewBox="0 0 24 24" width="35" height="35">
			        			<path d="M13.5 6C10.5 6 8 8.5 8 11.5c0 1.1.3 2.1.9 3l-3.4 3 1 1.1 3.4-2.9c1 .9 2.2 1.4 3.6 1.4 3 0 5.5-2.5 5.5-5.5C19 8.5 16.5 6 13.5 6zm0 9.5c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z"></path>
			   		 		</svg>
							</li>
						</ul>
						<?php } ?>
						<div id="popup">
							<div id="wrapper">
								<form id="formPopup" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<input type="search" class="header__search-input" name="s" value="" placeholder="Search …" required="">
							
									<button class="header__search-button" type="submit" ><svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" viewBox="0 0 30 30" width="35px" height="35px"><path d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z"/></svg></button>
											
								</form>
								<p class="header__search-operator">You can try the operators : <br> AND - OR - " "</p>
							</div>
						</div>

						<!-- .et-top-search -->
					 	<?php if ( $header_vars['output_header_search_field'] ) { ?>
						<div class="et-top-search" style="<?php extra_visible_display_css( $header_vars['show_header_search_field'] ); ?>">
							<?php extra_header_search_field(); ?>
						</div>
						<?php } ?> 

						<!-- cart -->
						<?php if ( $header_vars['output_header_cart_total'] ) { ?>
						<span class="et-top-cart-total" style="<?php extra_visible_display_css( $header_vars['show_header_cart_total'] ); ?>">
							<?php extra_header_cart_total(); ?>
						</span>
						<?php } ?>
					 	
					</div> 
				</div><!-- /.container -->
			</div><!-- /#top-header -->

			<?php } // end if( $et_top_info_defined ) ?>

			<!-- Main Header -->
			<div id="main-header-wrapper">
				<div id="main-header" data-fixed-height="<?php echo esc_attr( et_get_option( 'fixed_nav_height', '80' ) ); ?>">
					<div class="container">
						<?php
						$et_navigation_classes = extra_classes( array(
							extra_customizer_selector_classes( extra_get_dynamic_selector( 'main-navigation' ) ),
						), 'main-navigation', false );
						?>

							<div id="mp-title" class="mp-title">
								<p class="mp-title__main"><?php echo get_bloginfo( 'title' ) ?></p>
								<p class="mp-title__description"> <?php echo get_bloginfo( 'description' ) ?></p>
							</div>

						<!-- ET Navigation -->
						<div id="et-navigation" class="<?php echo $et_navigation_classes; ?> ">
							<?php
							$menu_class = 'nav';
							if ( 'on' == et_get_option( 'extra_disable_toptier' ) ) {
								$menu_class .= ' et_disable_top_tier';
							}

							$primary_nav = wp_nav_menu( array(
								'theme_location'            => 'primary-menu',
								'container'                 => '',
								'fallback_cb'               => '',
								'menu_class'                => $menu_class,
								'menu_id'                   => 'et-menu',
								'echo'                      => false,
								'walker'                    => new Extra_Walker_Nav_Menu,
								'header_search_field_alone' => $header_vars['header_search_field_alone'],
								'header_cart_total_alone'   => $header_vars['header_cart_total_alone'],
							) );

							if ( !$primary_nav ) {
							?>
								<ul id="et-menu" class="<?php echo esc_attr( $menu_class ); ?>">
									<?php if ( 'on' == et_get_option( 'extra_home_link' ) ) { ?>
										<li <?php if ( is_home() ) echo 'class="current_page_item"'; ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'extra' ); ?></a></li>
									<?php }; ?>

									<?php show_page_menu( $menu_class, false, false ); ?>
									<?php show_categories_menu( $menu_class, false ); ?>
								</ul>
							<?php
							} else {
								echo $primary_nav;
							}
							?>
							<?php do_action( 'et_header_top' ); ?>
						</div><!-- /#et-navigation -->
					</div><!-- /.container -->
				</div><!-- /#main-header -->
			</div><!-- /#main-header-wrapper -->
		</header>
