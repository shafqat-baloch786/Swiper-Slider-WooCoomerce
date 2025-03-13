

<!-- Main function to get product id and gallery images -->
function woo_product_image_slider() {
    global $product;

    if ( ! is_a( $product, 'WC_Product' ) ) {
        return;
    }
    $product_id = $product->get_id();
    $attachment_ids = $product->get_gallery_image_ids();

    if ( $attachment_ids && $product->get_image_id() ) {
        array_unshift( $attachment_ids, $product->get_image_id() );
    }

    ob_start();

    <!-- Html structure -->
    if ( ! empty( $attachment_ids ) ) {
        ?>
        <div class="woo-product-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ( $attachment_ids as $attachment_id ) : ?>
                        <div class="swiper-slide">
                            <?php echo wp_get_attachment_image( $attachment_id, 'full', false, array( 'class' => 'zoomable-image' ) ); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="swiper-thumbs">
                <div class="swiper-wrapper">
                    <?php foreach ( $attachment_ids as $attachment_id ) : ?>
                        <div class="swiper-slide">
                            <?php echo wp_get_attachment_image( $attachment_id, 'slider_thumbnail', false ); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
    }

    return ob_get_clean();
}

// Adding shortcode
add_shortcode('woo_product_image_slider', 'woo_product_image_slider');

// Function to have custom thumbnail size
function custom_woocommerce_image_sizes() {
    add_image_size('slider_thumbnail', 150, 225, false);
}
add_action('after_setup_theme', 'custom_woocommerce_image_sizes');
