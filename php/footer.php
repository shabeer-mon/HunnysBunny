     <!-- double-col-banner end -->
	 <footer class="footer">
                <div class="container-fluid">
                    <div class="top-footer">
                        <div class="box">
                            <h4 class="title">News letter</h4>
                            <?php echo do_shortcode('[contact-form-7 id="3f83c6e" title="Contact form 1_copy"]'); ?>
                            <!-- <input type="email" class="form-control newsletter" placeholder="Email" /> -->
                        </div>
                        <div class="box">
                            <h4 class="title">CUSTOMER SERVICE</h4>
                            <p class="availability-info">Monday to Friday 9.30am - 5.30pm</p>
                            <div class="button-block">
                                <a class="btn btn-primary rounded-right " href="<?php echo get_permalink('414'); ?>">Send us a message</a>
                            </div>
                        </div>
                    </div>
                    <div class="middle-footer">
                        <div  class="collapse-wrapper">
                            <div class="collapse-item">
                                <h4 class="collapse-title">About us<span class="plusminus"></span></h4>
                                <?php if (has_nav_menu('footer-menu')) {
                                        // Display the footer menu
                                        wp_nav_menu(array(
                                            'theme_location' => 'footer-menu',
                                            'container' => 'nav',
                                            'container_class' => 'footer-menu',
                                            'menu_class' => 'collapse-panel footer-menu',        
                                            // Add more parameters as needed
                                        ));
                                    } else { ?>
                                        <menu class="footer-menu ">
                                            <li><a href="#">Sales conditions</a></li>
                                            <li><a href="#">Legal mentions</a></li>
                                            <li><a href="#">Confidentiality</a></li>
                                            <li><a href="#">Cookies Settings</a></li>
                                        </menu>
                                   <?php } ?>
                               
                            </div>
                            <div class="collapse-item">
                                <h4 class="collapse-title">FOLLOW US <span class="plusminus"></span></h4>
                                <?php if (has_nav_menu('social-menu')) {
                                        // Display the footer menu
                                        wp_nav_menu(array(
                                            'theme_location' => 'social-menu',
                                            'container' => 'nav',
                                            'container_class' => 'footer-menu',
                                            'menu_class' => 'collapse-panel footer-menu',        
                                            // Add more parameters as needed
                                        ));
                                    } else { ?>
                                       <menu class="collapse-panel footer-menu "> 
                                            <li>
                                                <a href="">
                                                    <i class="icon-instagram"></i>
                                                    <span class="link-text">Instagram</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="icon-facebook"></i>
                                                    <span class="link-text">Facebook</span>
                                                </a>
                                            </li>
                                        </menu> 
                                   <?php } ?>
                                
                            </div>
                        </div>
                        
                        <div class="box">
                            <h4 class="title">DELIVERY COUNTRY/REGION</h4>
                            <input type="email" class="form-control newsletter" disabled value="United Kingdom" placeholder="Country" />
                            <div class="payment-logos-block">
                                <img src="<?php echo get_home_url().'/wp-content/themes/hb/images/payment-logos.svg'; ?>" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="bottom-footer">
                        <span class="copywrite">© HUNNY’S BUNNY 2024</span>
                    </div>
                </div>
            </footer>
        </main>
     
        <div class="search">
            <div class="container">
                <span class="btn-close search-close"><i class="icon-close"></i></span>
                <div class="search-wrapper">
                    <div class="search-box input-block">
                        <input id="filterInput" type="text" class="form-control" placeholder="Search (Keywords)">
                        <label for="filterInput" class="search-label"><i class="icon-lens"></i></label>         
                    </div>
                    <div id="filterSection" class="filter-section">
                        <h2 class="search-box-title">Products</h2>
                        <div class="prod-list filter-list" id="filterList">
                            <div class="no-data">No data</div>
                            
                        </div>
                    </div>
                </div>
                <div class="top-search">
                    <h2 class="search-box-title">Top searches</h2>
                    <div class="prod-list">

                        <?php
                          
                                             
                          $args = array(
                              'post_type' => 'product',
                              'post_status'         => 'publish',
                              'posts_per_page' => 8,
                              'tax_query' => array(
                                      array(
                                          'taxonomy' => 'product_visibility',
                                          'field'    => 'name',
                                          'terms'    => 'featured',
                                      ),
                                  ),
                              );
                          $loop = new WP_Query( $args );
                          // $loop = new WP_Query( $args );
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <?php endwhile; ?>
                          <?php wp_reset_query(); ?>
                        
                    </div>
                </div>
            </div>
        </div>
       
        <div class="drawer cart-drawer">
            <div class="drawer-block">
                <div class="drawer-header">
                    <h3 class="title">BAG (0)</h3>
                    <span class="btn-close drawer-close">
                        <i class="icon-close"></i>
                    </span>
                </div>
                <div class="drawer-inner">
                    <div class="cart-block">
                        <div class="empty">
                            <h2 class="title">You bag is empty</h2>
                            <div class="button-block">
                                <a class="btn btn-primary btn-large" href="#">continue shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    <!-- <script src="js/jquery.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/script.js"></script> -->

<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HB
 */

?>

	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
