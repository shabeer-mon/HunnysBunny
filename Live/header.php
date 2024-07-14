<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HB
 */

?>

	<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> -->
    <title>Hunnys Bunny</title>
    <style>
        @font-face {
        font-family: 'hunnybunny-icon';
        src:  url('<?php echo get_site_url(); ?>/wp-content/themes/hb/fonts/hunnybunny-icon.eot');
        src:  url('<?php echo get_site_url(); ?>/wp-content/themes/hb/fonts/hunnybunny-icon.eot') format('embedded-opentype'),
            url('<?php echo get_site_url(); ?>/wp-content/themes/hb/fonts/hunnybunny-icon.ttf') format('truetype'),
            url('<?php echo get_site_url(); ?>/wp-content/themes/hb/fonts/hunnybunny-icon.woff') format('woff'),
            url('<?php echo get_site_url(); ?>/wp-content/themes/hb/fonts/hunnybunny-icon.svg') format('svg');
        font-weight: normal;
        font-style: normal;
        font-display: block;
        }

        [class^="icon-"], [class*=" icon-"] {
        /* use !important to prevent issues with browser extensions that change fonts */
        font-family: 'hunnybunny-icon' !important;
        speak: never;
        font-style: normal;
        font-weight: normal;
        font-variant: normal;
        text-transform: none;
        line-height: 1;

        /* Better Font Rendering =========== */
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        }
        .icon-facebook:before {
        content: "\e90b";
        }
        .icon-instagram:before {
        content: "\e90c";
        }
        .icon-shipping:before {
        content: "\e908";
        }
        .icon-return:before {
        content: "\e909";
        }
        .icon-package:before {
        content: "\e90a";
        }
        .icon-close:before {
        content: "\e907";
        }
        .icon-down:before {
        content: "\e900";
        }
        .icon-up:before {
        content: "\e901";
        }
        .icon-right:before {
        content: "\e902";
        }
        .icon-left:before {
        content: "\e903";
        }
        .icon-bag:before {
        content: "\e904";
        }
        .icon-lens:before {
        content: "\e905";
        }
        .icon-user:before {
        content: "\e906";
        }

        

    </style>
	<?php wp_head(); ?>
</head>

<!-- <body <?php body_class(); ?> > -->
<body class="top-bar-active <?php echo implode(" ",get_body_class()); ?>"  >
    <?php wp_body_open();
    if(get_field('tagline', get_the_ID() )){?>
    <div class="top-bar">
        <p class="text"><span class="offer"><?php echo get_field('tagline', get_the_ID() );  ?></span> </p>
        <span class="btn-close"><i class="icon-close"></i></span>
    </div>
    <?php } ?>
    <div class="wrapper">
        <nav class="navbar show-menu hide-vissible">
            <div class="nav-block">
                <div class="hamburger" id="hamburger-1">
                    <div class="line-wrapper">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                    <span class="text">Menu</span>
                    <span class="menu-close"></span>
                </div>
                <div class="menu-block">
                    <menu class="menu-mini">
                        <li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" >
                                <i class="icon-user"></i>
                                <span class="text">Login</span>
                            </a>
                        </li>
                        <li><a href="javascript:void(0)" class="search-btn"><i class="icon-lens"></i></a></li>    

                        <li><a href="<?php echo wc_get_cart_url(); ?>"><i class="icon-bag"></i> <small style="background: black;color: white;font-size: 11px;padding: 0px 5px;border-radius: 20px;position: absolute;margin-top: -11px;margin-left: 25px;"><?php echo  WC()->cart->get_cart_contents_count(); ?></small> </a></li>
                    </menu>
                </div>

                
            </div>
            <?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
                    'container'      => false,
					'menu_id'        => 'primary-menu',
                    'menu_class' => 'category-menu',
                    'submenu_class' => 'submenu',
                    'walker'         => new Custom_Menu_Walker() // Use the custom walker class
				)
			);
            
			?>
        </nav>
        <main class="main">

            <header class="main-header">
                <div class="container-fluid">
                    <!-- <a href="#" class="navbar-brand"> -->
                        <?php
                            the_custom_logo();
                            if ( is_front_page() && is_home() ) :
                                ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                <?php
                            else :
                                ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                <?php
                            endif;
                            $hb_description = get_bloginfo( 'description', 'display' );
                            if ( $hb_description || is_customize_preview() ) :
                                ?>
                                <p class="site-description"><?php echo $hb_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                        <?php endif; ?>
                    <!-- </a> -->
                </div>
               
            </header>
            