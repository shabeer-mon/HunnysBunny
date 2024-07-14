<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!-- <ul class="products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>"> -->
<section class="inner-wrapper"> 
                <div class="category-wrapper">
                    <div class="container-fluid">
                        <!-- <div class="page-title-wrapper">
                            <div class="main-cat">
                                <span class="go-back"><i class="icon-left"></i></span>
                                <h3 class="main-cat-title"> SEX TOYS FOR WOMAN</h3>
                            </div>
                            <h2 class="page-title">SVIBRATORS <span class="items-quantity">(<span class="quantity">300</span>)</span></h2>
                        </div> -->
                        <?php if ( is_shop() || is_product_category() || is_product_tag() ) { ?>
                            <!-- if( !is_product_category() ) { -->
                       
                        <div class="button-block filter-block">
                            <a class="btn btn-primary filter-button" href="javascript:void(0)">
                                <span class="inner">
                                    <span class="text">Filters</span> 
                                    <i class="icon-filter"></i>
                                </span>
                            </a>
                        </div> 
                        <?php }  ?>
                        <div class="prod-list">
