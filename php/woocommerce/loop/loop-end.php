<?php
/**
 * Product Loop End
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-end.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!-- </ul> -->

 
                    </div>
                        <!-- <div class="load-more-block">
                            <div class="button-block">
                                <a class="btn btn-primary btn-large" href="#">LOAD MORE (8 / 800)</a>
                                <a class="btn  btn-text" href="#"><span class="inner">VIEW ALL</span></a>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="spacer"></div>
            </section>

            <div class="drawer filter-drawer">
            <div class="drawer-block">
                <div class="drawer-header">
                    <h3 class="title">Filters</h3>
                    <span class="btn-close drawer-close">
                        <i class="icon-close"></i>
                    </span>
                </div>
                <div class="drawer-inner">
                    <div  class="collapse-wrapper style-1">
                        <div class="collapse-item active">
                            <h4 class="collapse-title">Sorting<span class="plusminus"></span></h4>
                            <div class="collapse-panel"> 
                                <div class="filter sorting-filter">
                                <div class="checkbox-group">
                                <div class="checkbox-item">
                                <?php  do_action( 'woocommerce_before_shop_filter');?>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <?php dynamic_sidebar( 'sidebar-1' ); ?>
                        <!-- <?php dynamic_sidebar( 'sidebar-2' ); ?> -->

                        <!-- <div class="collapse-item active">
                            <h4 class="collapse-title">
                                <span class="text">Category</span>
                                <span class="plusminus"></span>
                            </h4>
                            <div class="collapse-panel">
                                <div class="filter style-1">
                                    <div class="checkbox-group">
                                        <div class="checkbox-item">
                                            <input type="checkbox" value="category1" class="category-checkbox" id="wellness">
                                            <label for="wellness">Sexual Wellness Products</label>
                                        </div>
                                        <div class="checkbox-item">
                                            <input type="checkbox" value="category2" class="category-checkbox"  id="exotic">
                                            <label for="exotic">Men's Exotic Apparel</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  -->
                        <!-- <div class="collapse-item">
                            <h4 class="collapse-title">Sizes<span class="plusminus"></span></h4>
                            <div class="collapse-panel"> 
                                <div class="filter style-2">
                                    <div class="checkbox-group">

                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                   
                    
                </div>
                <!-- <div class="drawer-button-block">
                    <button class="btn btn-primary btn-large applyButton" id="applyButton">Apply <span id="filterCounter"></span></button>
                    <button class="btn btn-text" id="clearButton"><span class="inner">Clear</span> </button>
                </div> -->
            </div>
        </div>
