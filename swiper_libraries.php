function enqueue_woo_product_slider_scripts() {
    if ( is_product() ) {
        // Swiper CSS
        wp_enqueue_style( 'swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css' );

        // Swiper JS
        wp_enqueue_script( 'swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true );
		
        // Custom JS
        wp_enqueue_script( 'custom-swiper', get_template_directory_uri() . '/js/scripts.js', array('swiper-js', 'pinch-zoom'), null, true );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_woo_product_slider_scripts');