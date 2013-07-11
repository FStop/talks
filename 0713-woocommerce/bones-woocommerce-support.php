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

?>