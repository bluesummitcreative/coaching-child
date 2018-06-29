<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package thim
 */
?><!DOCTYPE html>
<?php
$theme_options_data = get_theme_mods();
?>
<html itemscope itemtype="http://schema.org/WebPage" <?php language_attributes(); ?><?php if ( isset( $theme_options_data['thim_rtl_support'] ) && $theme_options_data['thim_rtl_support'] == '1' ) {
	echo " dir=\"rtl\"";
} ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php esc_url( bloginfo( 'pingback_url' ) ); ?>">
	<?php
	$custom_sticky = '';

	if ( isset( $theme_options_data['thim_config_att_sticky'] ) && $theme_options_data['thim_config_att_sticky'] == 'sticky_custom' ) {
		$custom_sticky .= ' bg-custom-sticky';
	}
	if ( isset( $theme_options_data['thim_header_sticky'] ) && $theme_options_data['thim_header_sticky'] == 1 && !is_singular( 'lp_course' ) ) {
		$custom_sticky .= ' sticky-header';
	}
	if ( isset( $theme_options_data['thim_header_position'] ) ) {
		$custom_sticky .= ' ' . $theme_options_data['thim_header_position'];
	}

	if ( isset( $theme_options_data['thim_header_style'] ) ) {
		$custom_sticky .= ' ' . $theme_options_data['thim_header_style'];
	} else {
		$custom_sticky .= ' header_v1';
	}

	// mobile menu custom class
	if ( isset( $theme_options_data['thim_config_logo_mobile'] ) && $theme_options_data['thim_config_logo_mobile'] == 'custom_logo' ) {
		if ( wp_is_mobile() && ( ( isset( $theme_options_data['thim_logo_mobile'] ) && $theme_options_data['thim_logo_mobile'] <> '' ) ||
				( isset( $theme_options_data['thim_sticky_logo_mobile'] ) && $theme_options_data['thim_sticky_logo_mobile'] <> '' )
			)
		) {
			$custom_sticky .= ' mobile-logo-custom';
		}
	}


	if ( isset( $theme_options_data['thim_box_layout'] ) && $theme_options_data['thim_box_layout'] == 'boxed' ) {
		$class_boxed = 'boxed-area';
	} else {
		$class_boxed = '';
	}


	wp_head();
	?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-90677241-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-90677241-1');
	</script>

</head>

<body <?php body_class(); ?>>
<?php if ( ( isset( $theme_options_data['thim_preload'] ) && $theme_options_data['thim_preload'] == '1' ) || !isset( $theme_options_data['thim_preload'] ) ) { ?>
	<div id="preload">
		<?php
		if ( !empty( $theme_options_data['thim_preload_image'] ) ) {
			echo wp_get_attachment_image( $theme_options_data['thim_preload_image'], 'full' );
		} else {
			?>
			<span class="cssload-loader"><span class="cssload-loader-inner"></span></span>
			<?php
		}
		?>

	</div>
<?php } ?>

<div id="bg-opacity">
	<div class="sk-fading-circle">
		<div class="sk-circle1 sk-circle"></div>
		<div class="sk-circle2 sk-circle"></div>
		<div class="sk-circle3 sk-circle"></div>
		<div class="sk-circle4 sk-circle"></div>
		<div class="sk-circle5 sk-circle"></div>
		<div class="sk-circle6 sk-circle"></div>
		<div class="sk-circle7 sk-circle"></div>
		<div class="sk-circle8 sk-circle"></div>
		<div class="sk-circle9 sk-circle"></div>
		<div class="sk-circle10 sk-circle"></div>
		<div class="sk-circle11 sk-circle"></div>
		<div class="sk-circle12 sk-circle"></div>
	</div>
</div> <!-- Background cover screen! -->

<!-- menu for mobile-->
<div id="wrapper-container" class="wrapper-container">
	<div class="content-pusher <?php echo esc_attr( $class_boxed ); ?>">


		<?php
		// stick header
		$data_height = '';
		if ( isset( $theme_options_data['thim_margin_top_header'] ) && $theme_options_data['thim_margin_top_header'] != '0' ) {
			$data_height = ' data-height-sticky="' . $theme_options_data['thim_margin_top_header'] . '"';
		}


		?>

		<header id="masthead" class="site-header affix-top<?php echo esc_attr( $custom_sticky ); ?>" <?php echo esc_attr( $data_height ); ?>>
			<?php
			//Toolbar
			if ( isset( $theme_options_data['thim_toolbar_show'] ) && $theme_options_data['thim_toolbar_show'] == '1' ) {
				if ( ( isset( $theme_options_data['thim_header_style'] ) && $theme_options_data['thim_header_style'] != 'header_v2' && $theme_options_data['thim_header_style'] != 'header_v3' ) || !isset( $theme_options_data['thim_header_style'] ) ) {
					get_template_part( 'inc/header/toolbar' );
				}
			}
			if ( isset( $theme_options_data['thim_header_style'] ) ) {
				get_template_part( 'inc/header/' . $theme_options_data['thim_header_style'] );
			} else {
				get_template_part( 'inc/header/header_v1' );
			}

			?>
		</header>
		<!-- Mobile Menu-->
		<nav class="mobile-menu-container mobile-effect">
			<?php get_template_part( 'inc/header/menu-mobile' ); ?>
		</nav>
		<div id="main-content">