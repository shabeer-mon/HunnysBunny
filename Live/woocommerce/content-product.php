<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
							<div class="prod-list-item product" <?php wc_product_class( '', $product ); ?> data-categories="category1">
                                <div class="inner-box">
									<a href="<?php the_permalink(); ?>" class="img-box">
										<?php  if(get_the_post_thumbnail_url($product->id)){ ?>
											<img src="<?php echo get_the_post_thumbnail_url($product->id); ?>" alt="" />
										<?php } else{  $single_meta = get_post_meta($product->id, '_custom_THUMBNAIL', true); ?>
											<?php //echo custom_image_link; ?>

											<img src="<?php echo custom_image_link.$single_meta; ?>" onerror="this.src='<?php echo wc_placeholder_img_src(); ?>'"  alt="" />

										<?php } ?>
                                    </a>
									<?php if($product->get_sale_price()){?>
                                    <span class="offer-text">Up to <?php echo ceil( ($product->get_regular_price()-$product->get_sale_price())*100/($product->get_regular_price())); ?>% Off </span>
									<?php } ?>
									<div class="content">
                                        <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <div class="button-block">
                                            <a class="btn btn-primary" href="<?php the_permalink(); ?>">Shop now</a>
                                            <div class="price-block">
											    <div class="price"><?php echo get_woocommerce_currency_symbol(); ?> <?php echo $product->get_price();  ?></div>
                                                <?php if($product->get_sale_price()){?>
                                                <div class="old-price"><?php echo get_woocommerce_currency_symbol(); ?> <?php  echo $product->get_regular_price();  ?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!-- <li <?php wc_product_class( '', $product ); ?>> 
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
</li> -->
