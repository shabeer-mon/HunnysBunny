<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		// do_action( 'woocommerce_before_main_content' );
	?>
	
		<?php // while ( have_posts() ) : ?>
			<?php // the_post(); ?>

			  <!-- dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd -->
			<?php // wc_get_template_part( 'content', 'single-product' ); ?>

		<?php // endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
	//	do_action( 'woocommerce_after_main_content' );
	?>
	

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
	//	do_action( 'woocommerce_sidebar' );
	?>

<?php

// do_action( 'woocommerce_before_main_content' );

    global $product;

	  while ( have_posts() ) : 
	    the_post(); ?>


<section class="inner-wrapper"> 
                <div class="product-wrapper">
                    <div class="container-fluid">
                        <div class="swiper-slider-wrapper">
                            
                            <div class="prod-list swiper-slider">
							<?php  $attachment_ids = $product->get_gallery_image_ids(); 

								foreach( $attachment_ids as $attachment_id ) { ?>
									<div class="prod-list-item">
										<div class="inner-box">
											<div class="img-box">
												<img src="<?php	echo $image_link = wp_get_attachment_url( $attachment_id ); ?>" class="productImage" alt="" />
											</div>
										</div>
									</div>
								<?php }?>
                            </div>
                            <div class="swiper-button-block">
                                <div class="swiper__counter"></div>
                                <div class="swiper-slider__arrows"></div>
                            </div>
                            
                        </div>
                        <div class="page-title-wrapper">
                            <span class="prod-label">New</span>
                            <h2 class="prod-title" data-name="Silicone Rabbit Vibrator"><?php the_title()  ?></h2>
                            <div class="price-block">
								<span class="price">£<span id="price"><?php echo $product->get_price();  ?></span></span>
								<?php if($product->get_sale_price()){?>                    
                                <span class="old-price">£<span id="oldPrice"><?php  echo $product->get_regular_price();  ?></span></span>
								<?php } ?>
                            </div>
                        </div>
                        
                        <div class="content-blcok">
                            <div class="attributes-block">
								<?php  $product_attributes = $product->get_attributes(); ?>
								<?php	foreach ( $product_attributes as $product_attribute_key => $product_attribute ) : 
									$taxonomy   =$product_attribute['name'];
									$label_name = wc_attribute_label( $taxonomy ); ?>
									<div class="attributes-card">
										<div class="card-header">
											<div class="title"><?php echo $label_name; ?>: <span id="selectedColor"></span></div>
										</div>
										<div class="attributes-items color-card">
											<div class="filter style-2">
												<div class="checkbox-group">
													<?php $options = wc_get_product_terms( $product->id, $product_attribute['name'] );
													if(count($options)>0){
														foreach ( $options as $option ){ ?>
															<div class="checkbox-item">
																<input type="radio" value="<?php echo $option->slug;?>" class="category-checkbox" id="<?php echo $option->slug;?>" name="<?php echo $label_name;?>">
																<label for="colorRed"><?php echo $option->name;?></label>
															</div>
																	
													<?php } } ?>
												</div>	
											</div>	
										</div>	
									</div>
								<?php endforeach; ?>

                            </div>
                            <div class="button-block ">
                                <!-- <a href="<?php echo $product->add_to_cart_url(); ?>" id="addtocart" class="btn btn-primary btn-large m-auto">
                                    Add to cart
                                    <span class="cart-item"></span>
								</a> -->
								
							<?php do_action('woocommerce_simple_add_to_cart'); ?>
 						
                            </div>
                            <div  class="collapse-wrapper style-2">
                                <div class="collapse-item active">
                                    <h4 class="collapse-title">
                                        <span class="text">Description</span>
                                        <span class="plusminus"></span>
                                    </h4>
                                    <div class="collapse-panel">
                                        <div class="prod-discription">
											<?php echo $product->get_description(); ?>
                                            
                                        </div>
                                    </div>
                                </div>
								<div class="collapse-item ">
                                    <h4 class="collapse-title">Additional information<span class="plusminus"></span></h4>
                                    <div class="collapse-panel">
										<?php 
										$metaData = get_post_meta( $product->get_id()); 
										foreach($metaData as $key=>$meta){ 
											if(!empty($meta[0]) && in_array($key,['_custom_BRAND','_custom_MODEL','_custom_LENGTH','_custom_LUBETYPE','_custom_CONDOMSAFE','_custom_LIQUIDVOLUMN','_custom_NUMBEROFPILLS','_custom_FASTENING','_custom_WASHING','_custom_INSERTABLE','_custom_DIAMETER','_custom_HARNESSCOMPATIBLE','_custom_ORINGCIRC','_custom_ORINGDIAM','_custom_CIRCUMFERENCE','_custom_COLOUR','_custom_FLEXIBILITY','_custom_CONTROLLER','_custom_FORWHO','_custom_WHATISIT','_custom_MOTION','_custom_FEATURES','_custom_FOR','_custom_MISC','_custom_WATERPROOF','_custom_MATERIAL','_custom_STYLE','_custom_POWER','_custom_SIZE','_custom_OPENING'])){
											?>
											<p><span ><?php echo str_replace('custom', '', str_replace('_', ' ', $key)) ; ?></a> :<?php echo $meta[0]; ?></span> 

										<?php }} ?>
                                    </div>
                                </div>
                                <div class="collapse-item ">
                                    <h4 class="collapse-title">Delivery and returns<span class="plusminus"></span></h4>
                                    <div class="collapse-panel">
                                        <div class="delivery__retun">
                                            <ul class="list-icon-style">
                                                <li>
                                                    <span class="icon-block">
                                                        <i class="icon-van"></i>
                                                    </span>
                                                    <div class="content">
                                                        <div class="title">DELIVERY</div>
                                                        <div>- Express delivery made within 2-4 working days (£7)</div>
                                                        <div>- Potential delays to be communicated due to customs-approved treatment
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span class="icon-block">
                                                        <i class="icon-return"></i>
                                                    </span>
                                                    <div class="content">
                                                        <div class="title">RETURNS</div>
                                                        <div>All returns are free of charge. For more information, see our <span class="link drawer-button" data-target="returnPolicy">return policy</span> </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span class="icon-block">
                                                        <i class="icon-card"></i>
                                                    </span>
                                                    <div class="content">
                                                        <div class="title">PAYMENT</div>
                                                        <div>Credit card, debit card, Google pay, Apple pay</div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <span class="icon-block">
                                                        <i class="icon-lens"></i>
                                                    </span>
                                                    <div class="content">
                                                        <div class="title">FAQ</div>
                                                        <div>Looking for information? <span class="link drawer-button" data-target="FAQ">FAQ</span> </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>


 <?php endwhile; ?>


 <?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		// do_action( 'woocommerce_sidebar' );
	?>


<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
