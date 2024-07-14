<?php
/*
Template Name: Cart Template
*/
?>

<?php
/**
 * The template for displaying the cart page.
 *
 * @package WooCommerce
 * @subpackage My_Theme
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

do_action( 'woocommerce_before_main_content' );

?>

<div class="woocommerce">
    <div class="container-fluid">
       
    <h1 class="cart-title"><?php esc_html_e( 'Shopping Cart', 'my-theme' ); ?></h1>
        <?php do_action( 'woocommerce_before_cart' ); ?>

        <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
        
            <?php do_action( 'woocommerce_before_cart_table' ); ?>
            <div class="prod-list-table">
                
                <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="product-thumbnail"><?php esc_html_e( 'Product', 'my-theme' ); ?></th>
                            <th class="product-name"><?php esc_html_e( 'Name', 'my-theme' ); ?></th>
                            <th class="product-price"><?php esc_html_e( 'Price', 'my-theme' ); ?></th>
                            <th class="product-quantity"><?php esc_html_e( 'Quantity', 'my-theme' ); ?></th>
                            <th class="product-subtotal"><?php esc_html_e( 'Total', 'my-theme' ); ?></th>
                            <th class="product-remove"><?php esc_html_e( 'Remove', 'my-theme' ); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                            $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                            $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) {
                                echo '<tr class="cart_item">';

                                // Display product thumbnail
                                echo '<td class="product-thumbnail">';
                                echo apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                echo '</td>';

                                // Display product name
                                echo '<td class="product-name" data-title="' . esc_attr__( 'Product', 'my-theme' ) . '">';
                                echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
                                echo '</td>';

                                // Display product price
                                echo '<td class="product-price" data-title="' . esc_attr__( 'Price', 'my-theme' ) . '">';
                                echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                echo '</td>';

                                // Display product quantity
                                echo '<td class="product-quantity" data-title="' . esc_attr__( 'Quantity', 'my-theme' ) . '">';
                                echo apply_filters( 'woocommerce_cart_item_quantity', $cart_item['quantity'], $cart_item, $cart_item_key );
                                echo '</td>';

                                // Display product subtotal
                                echo '<td class="product-subtotal" data-title="' . esc_attr__( 'Total', 'my-theme' ) . '">';
                                echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
                                echo '</td>';

                                // Display remove link
                                echo '<td class="product-remove">';
                                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                    '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                    esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                    esc_html__( 'Remove this item', 'my-theme' ),
                                    esc_attr( $product_id ),
                                    esc_attr( $_product->get_sku() )
                                ), $cart_item_key );
                                echo '</td>';

                                echo '</tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php do_action( 'woocommerce_after_cart_table' ); ?>
            <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

            <div class="cart-collaterals">
                <?php
                /**
                 * Cart collaterals hook.
                 *
                 * @hooked woocommerce_cart_totals - 10
                 */
                do_action( 'woocommerce_cart_collaterals' );
                ?>
                
            </div>
            <!-- <div class="cart-collaterals">
                <div class="wc-proceed-to-checkout">
                    <a href="<?php echo get_permalink( get_page_by_path( 'guest-checkout' ) );?> " class="checkout-button button alt wc-forward">
                        Proceed to checkout</a>
                </div>
            </div> -->
            <?php do_action( 'woocommerce_after_cart_collaterals' ); ?>
            <!-- <a href="">checkout</a> -->
           

        </form>

        <?php do_action( 'woocommerce_after_cart' ); ?>
    </div>
</div>
<div class="spacer"></div>
    <section class="weekly-offer">
                <div class="container-fluid">
                    <h2 class="section-title">Weekly offers</h2>
                    <div class="prod-list prod-slider">
                    <?php
                            $args = array(
                                'post_type'      => 'product',
                                'meta_query'     => array(
                                    'relation' => 'OR',
                                    array( // Simple products type
                                        'key'           => '_sale_price',
                                        'value'         => 0,
                                        'compare'       => '>',
                                        'type'          => 'numeric'
                                    ),
                                    array( // Variable products type
                                        'key'           => '_min_variation_sale_price',
                                        'value'         => 0,
                                        'compare'       => '>',
                                        'type'          => 'numeric'
                                    )
                                )
                            );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post(); 
                            global $product; ?>
                                <div class="prod-list-item">
                                    <div class="inner-box">
                                        <a href="<?php the_permalink(); ?>" class="img-box">
                                            <?php  if(get_the_post_thumbnail_url($loop->post->ID)){ ?>
                                           <img src="<?php echo get_the_post_thumbnail_url($loop->post->ID); ?>" onerror="this.src='<?php echo wc_placeholder_img_src(); ?>'" alt="" />
                                           <?php } else{  $single_meta = get_post_meta($loop->post->ID, '_custom_THUMBNAIL', true); ?>

                                            <img src="<?php echo $custom_image_link.$single_meta; ?>" onerror="this.src='<?php echo wc_placeholder_img_src(); ?>'" alt="" />

                                            <?php } ?>
                                        </a>
                                        <?php if($product->get_sale_price()){?>
                                            <span class="offer-text">Up to <?php echo ceil( ($product->get_regular_price()-$product->get_sale_price())*100/($product->get_regular_price())); ?>% Off </span>
                                        <?php } ?>
                                        <div class="content">
                                            <h3 class="title"><?php the_title(); ?></h3>
                                            <div class="button-block">
                                                <a class="btn btn-primary" href="<?php the_permalink(); ?>">Shop now</a>
                                                <div class="price-block">
                                                    <div class="price"><?php echo get_woocommerce_currency_symbol(); ?>  <?php echo $product->get_price();  ?></div>
                                                    <?php if($product->get_sale_price()){?>

                                                        <div class="old-price"><?php echo get_woocommerce_currency_symbol(); ?>  <?php  echo $product->get_regular_price();  ?></div>
                                                   <?php } ?>
                                                   <?php 
                                                //    echo $product->get_regular_price(); 
                                                //    echo $product->get_sale_price();
                                                //    echo $product->get_price(); 
                                                //    echo $product->get_price_html(); 
                                                   ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                    </div>
                </div>
            </section>
<?php
do_action( 'woocommerce_after_main_content' );
get_footer();
