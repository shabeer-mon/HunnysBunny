<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package HB
 */

get_header();
// global $post;

?>
 
 <section class="banner-wrapper">
                <div class="container-fluid">
                    <!-- Banner -->
                    <div class="banner-block">
                        <div class="hunnys-bunny-banner">
                            
                            <?php if(get_field('banner_title_one', get_the_ID() )){ ?> 
                            <div class="banner-item item1">
                                <div class="banner-content">
                                    <div class="content">
                                        <h2 class="title"><?php echo get_field('banner_title_one', get_the_ID() );  ?></h2>
                                        <p class="info-text"><?php echo get_field('banner_text_one', get_the_ID() );  ?></p>
                                        <div class="button-block">
                                            <a class="btn btn-primary" href="<?php echo get_field('banner_link_one', get_the_ID() );  ?>">Shop now</a>
                                        </div>
                                    </div>
                                    <div class="banner-image">
                                        <img src="<?php echo get_field('banner_image_one', get_the_ID() );  ?>" alt="" />
                                    </div>
                                </div>
                            </div>
                            <?php }?>

                            <?php if(get_field('banner_title_two', get_the_ID() )){ ?> 
                            <div class="banner-item item1">
                                <div class="banner-content">
                                    <div class="content">
                                        <h2 class="title"><?php echo get_field('banner_title_two', get_the_ID() );  ?></h2>
                                        <p class="info-text"><?php echo get_field('banner_text_two', get_the_ID() );  ?></p>
                                        <div class="button-block">
                                            <a class="btn btn-primary" href="<?php echo get_field('banner_link_two', get_the_ID() );  ?>">Shop now</a>
                                        </div>
                                    </div>
                                    <div class="banner-image">
                                        <img src="<?php echo get_field('banner_image_two', get_the_ID() );  ?>" alt="" />
                                    </div>
                                </div>
                            </div>
                            <?php }?>

                            <?php if(get_field('banner_title_three', get_the_ID() )){ ?> 
                            <div class="banner-item item1">
                                <div class="banner-content">
                                    <div class="content">
                                        <h2 class="title"><?php echo get_field('banner_title_three', get_the_ID() );  ?></h2>
                                        <p class="info-text"><?php echo get_field('banner_text_three', get_the_ID() );  ?></p>
                                        <div class="button-block">
                                            <a class="btn btn-primary" href="<?php echo get_field('banner_link_three', get_the_ID() );  ?>">Shop now</a>
                                        </div>
                                    </div>
                                    <div class="banner-image">
                                        <img src="<?php echo get_field('banner_image_three', get_the_ID() );  ?>" alt="" />
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                            <?php if(get_field('banner_title_four', get_the_ID() )){ ?> 
                            <div class="banner-item item1">
                                <div class="banner-content">
                                    <div class="content">
                                        <h2 class="title"><?php echo get_field('banner_title_four', get_the_ID() );  ?></h2>
                                        <p class="info-text"><?php echo get_field('banner_text_four', get_the_ID() );  ?></p>
                                        <div class="button-block">
                                            <a class="btn btn-primary" href="<?php echo get_field('banner_link_four', get_the_ID() );  ?>">Shop now</a>
                                        </div>
                                    </div>
                                    <div class="banner-image">
                                        <img src="<?php echo get_field('banner_image_four', get_the_ID() );  ?>" alt="" />
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                            <?php if(get_field('banner_title_five', get_the_ID() )){ ?> 
                            <div class="banner-item item1">
                                <div class="banner-content">
                                    <div class="content">
                                        <h2 class="title"><?php echo get_field('banner_title_five', get_the_ID() );  ?></h2>
                                        <p class="info-text"><?php echo get_field('banner_text_five', get_the_ID() );  ?></p>
                                        <div class="button-block">
                                            <a class="btn btn-primary" href="<?php echo get_field('banner_link_five', get_the_ID() );  ?>">Shop now</a>
                                        </div>
                                    </div>
                                    <div class="banner-image">
                                        <img src="<?php echo get_field('banner_image_five', get_the_ID() );  ?>" alt="" />
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                            <?php if(get_field('banner_title_six', get_the_ID() )){ ?> 
                            <div class="banner-item item1">
                                <div class="banner-content">
                                    <div class="content">
                                        <h2 class="title"><?php echo get_field('banner_title_six', get_the_ID() );  ?></h2>
                                        <p class="info-text"><?php echo get_field('banner_text_six', get_the_ID() );  ?></p>
                                        <div class="button-block">
                                            <a class="btn btn-primary" href="<?php echo get_field('banner_link_six', get_the_ID() );  ?>">Shop now</a>
                                        </div>
                                    </div>
                                    <div class="banner-image">
                                        <img src="<?php echo get_field('banner_image_six', get_the_ID() );  ?>" alt="" />
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                        <div class="banner-nav-block">
                            <div class="slider__dots"></div>
                            <div class="swiper-slider__arrows"></div>
                        </div>
                    </div>
                    <!-- Banner end -->
                    <!-- offerInfo -->
                    <div class="offerInfo">
                        <div class="infoBox">
                            <span class="icon-wrpr">
                                <i class="icon-package"></i>
                            </span>
                            <div class="title-wrprt">
                                <span class="title">100% Discreet Service</span>
                                <p class="text">We offer discreet packaging, billing & delivery</p>
                            </div>
                        </div>
                        <div class="infoBox">
                            <span class="icon-wrpr">
                                <i class="icon-shipping"></i>
                            </span>
                            <div class="title-wrprt">
                                <span class="title">Free UK Delivery</span>
                                <p class="text">Enjoy free shipping on orders above £40</p>
                            </div>
                        </div>
                        <div class="infoBox">
                            <span class="icon-wrpr">
                                <i class="icon-return"></i>
                            </span>
                            <div class="title-wrprt">
                                <span class="title">Money back promise</span>
                                <p class="text">30 Returnable</p>
                            </div>
                        </div>
                    </div>
                    <!-- offerInfo END -->
                </div>
               
            </section>
            <!-- category -->
            <section class="category">
                <div class="container-fluid">
                    <h2 class="section-title">Category</h2>
                    <div class="d-grid category-block">
                   
                        <?php $args = array(
                            'taxonomy'     =>'product_cat',
                            // 'child_of'     => 0,
                            'parent' => 63,
                            'orderby'      => 'id',
                            'hide_empty'   =>0
                            );
                            $terms = get_categories( $args );
                            // if ( $terms ) { 
                            foreach ( $terms as $term ) {
                              
                                ?> 
  
                                    <div class="category-item    sssssssss">
                                        <div class="inner-box">
                                            <a href="<?php echo  esc_url( get_term_link( $term ) ) ?>" class="img-box">
                                          <?php // $thumb =   woocommerce_subcategory_thumbnail( $term );
                                           $category_thumbnail = get_woocommerce_term_meta($term->term_id, 'thumbnail_id', true);
                                           $image = wp_get_attachment_url($category_thumbnail);
                                          ?>
                                                <!-- <img src="http://localhost/wordpress/wp-content/themes/hb/images/category1.jpg" alt="" /> -->
                                                <img src="<?php echo $image; ?>" alt="" />
                                            </a>
                                            <div class="content">
                                                <h3 class="title"><?php echo $term->name ?></h3>
                                                <div class="button-block">
                                                    <a class="btn btn-secondary" href="<?php echo  esc_url( get_term_link( $term ) ) ?>">Shop now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            // } ?>
                        <!-- <div class="category-item">
                            <div class="inner-box">
                                <div class="img-box">
                                    <img src="http://localhost/wordpress/wp-content/themes/hb/images/category2.jpg" alt="" />
                                </div>
                                <div class="content">
                                    <h3 class="title">ANAL TOYS</h3>
                                    <div class="button-block">
                                        <a class="btn btn-secondary" href="#">Shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="category-item">
                            <div class="inner-box">
                                <div class="img-box">
                                    <img src="http://localhost/wordpress/wp-content/themes/hb/images/category3.jpg" alt="" />
                                </div>
                                <div class="content">
                                    <h3 class="title">Strap-ons</h3>
                                    <div class="button-block">
                                        <a class="btn btn-secondary" href="#">Shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="category-item">
                            <div class="inner-box">
                                <div class="img-box">
                                    <img src="http://localhost/wordpress/wp-content/themes/hb/images/category4.jpg" alt="" />
                                </div>
                                <div class="content">
                                    <h3 class="title">Clitoral Sucking</h3>
                                    <div class="button-block">
                                        <a class="btn btn-secondary" href="#">Shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="category-item">
                            <div class="inner-box">
                                <div class="img-box">
                                    <img src="http://localhost/wordpress/wp-content/themes/hb/images/category4.jpg" alt="" />
                                </div>
                                <div class="content">
                                    <h3 class="title">Clitoral Sucking</h3>
                                    <div class="button-block">
                                        <a class="btn btn-secondary" href="#">Shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </section>
            <!-- category  end-->
            <!-- Weekly offer -->
            <section class="weekly-offer">
                <div class="container-fluid">
                    <h2 class="section-title">Weekly offers</h2>
                    <div class="prod-list prod-slider">
                    <?php
                            // $args = array(
                            //     'post_type' => 'product',
                            //     'meta_key' => 'total_sales',
                            //     'orderby' => 'meta_value_num',
                            //     'posts_per_page' => 10,
                            // );
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
            
             <!-- Weekly offer  end-->
             <!-- double-col-banner-->
             <section class="double-col-banner">
                <div class="container-fluid">
                    <div class="double-banner-wrapper">
                        <div class="content bg-purple text-white">
                            <h2 class="title"><?php echo get_field('banner_one_title', get_the_ID() );  ?></h2>
                            <p class="info-text"><?php echo get_field('banner_one_description', get_the_ID() );  ?></p>
                            <div class="button-block">
                                <a class="btn btn-secondary" href="<?php echo get_field('banner_one_link', get_the_ID() );  ?>">Shop now</a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="<?php echo get_site_url(); ?>/wp-content/themes/hb/images/second-banner.jpg" alt="" />
                        </div>
                    </div>
                </div>
            </section>
            <!-- double-col-banner end -->
             <!-- Top selling peoduct -->
             <section class="weekly-offer">
                <div class="container-fluid">
                    <h2 class="section-title">Top selling products</h2>
                    <div class="prod-list prod-slider">
                    <?php
                            $args = array(
                                'post_type' => 'product',
                                'meta_key' => 'total_sales',
                                'orderby' => 'meta_value_num',
                                'posts_per_page' => 10,
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
            
             <!-- Top selling peoduct  end-->
              <!-- double-col-banner-->
              <section class="single-banner">
                <div class="container-fluid">
                    <div class="single-banner-wrapper">
                        <div class="img-box">
                            <img src="<?php echo get_site_url(); ?>/wp-content/themes/hb/images/single-banner.jpg" alt="" />
                        </div>
                        <div class="content text-white">
                            <h2 class="title"><?php echo get_field('banner_two_title', get_the_ID() );  ?></h2>
                            <p class="info-text"><?php echo get_field('banner_two_description', get_the_ID() );  ?></p>
                            <div class="button-block">
                                <a class="btn btn-secondary" href="<?php echo get_field('banner_two_link', get_the_ID() );  ?>" s>Shop now</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
            <!-- double-col-banner end -->

<?php
// get_sidebar();
get_footer();
