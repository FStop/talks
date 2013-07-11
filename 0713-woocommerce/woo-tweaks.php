<?php

/**
*  Woo Commerce Support & Tweaks
*
*/

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<div id="content">';
  echo '  <div id="inner-content" class="wrap clearfix">';
  echo '    <div id="main" class="ninecol first clearfix" role="main">';
  echo '      <article>';
  echo '        <section class="product">';
}

function my_theme_wrapper_end() {
  echo '        </section>';
  echo '      </article>';
  echo '    </div> <!-- end #main -->';
                get_sidebar(); 
  echo '  </div> <!-- end #inner-content -->';
  echo '</div> <!-- end #content -->';
}

add_theme_support( 'woocommerce' );

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
 
function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] );   // Remove the additional information tab
    return $tabs;
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
    if (!function_exists('loop_columns')) {
        function loop_columns() {
        return 3; // 3 products per row
    }
}

// Redefine woocommerce_output_related_products()
function woocommerce_output_related_products() {
    woocommerce_related_products(3,3); // Display 3 products in rows of 3
}
add_filter('woocommerce_variable_price_html', 'custom_variation_price', 10, 2);

// Use min and max price instead of just "From: [min_price]"
function custom_variation_price( $price, $product ) {
     
     $price = '';
 
     if ( !$product->min_variation_price || $product->min_variation_price !== $product->max_variation_price ) $price .= '<span class="from">' . _x('','min_price', 'woocommerce') . ' </span>';
      
     $price .= woocommerce_price($product->get_price());
      
     if ( $product->max_variation_price && $product->max_variation_price !== $product->min_variation_price ) {
          $price .= '<span class="to"> ' . _x(' - ', 'max_price', 'woocommerce') . ' </span>';
 
          $price .= woocommerce_price($product->max_variation_price);
     }
 
     return $price;
}

remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );

add_action( 'woocommerce_archive_description', 'fstop_woocommerce_taxonomy_archive_description', 10 );
add_action( 'woocommerce_archive_description', 'fstop_woocommerce_product_archive_description', 10 );

function fstop_woocommerce_taxonomy_archive_description() {
    if ( is_tax( array( 'product_cat', 'product_tag' ) ) && get_query_var( 'paged' ) == 0 ) {
    $description = apply_filters( 'the_content', term_description() );
    $word_count = str_word_count($description);
        if ( $description && $word_count < 100)  {

        echo '<div id="cat-description" class="term-description">' . $description . '</div>';
        }
        if ( $description && $word_count > 100)  {

        echo '<div id="cat-description" class="term-description long">' . $description . '<div class="ie-white"></div><a id="desc-toggle" class="readmore closed" href="#">See more</a></div>';
        }
    }
}

function fstop_woocommerce_product_archive_description() {
    if ( is_post_type_archive( 'product' ) && get_query_var( 'paged' ) == 0 ) {
        $shop_page   = get_post( woocommerce_get_page_id( 'shop' ) );
        $description = apply_filters( 'the_content', $shop_page->post_content );
        $word_count = str_word_count($description);
        if ( $description && $word_count < 100 ) {
          echo '<div id="cat-description" class="page-description">' . $description . '</div>';
        }
        if ( $description && $word_count > 100 ) {
          echo '<div id="cat-description" class="page-description">' . $description . '<div class="ie-white"></div><a id="desc-toggle" class="readmore closed" href="#">See more</a></div>';
        }
    }
}

?>