<?php
/**
 * WooCommerce Shop / Archive Template
 *
 * @package Therion_Peptides
 */

get_header();
?>

<div class="products-section">
  <div class="section">
    <div class="section-header">
      <div>
        <h2><?php woocommerce_page_title(); ?></h2>
        <p>Research-grade compounds — all products for in-vitro use only</p>
      </div>
    </div>

    <?php if ( woocommerce_product_loop() ) : ?>
      <?php woocommerce_product_loop_start(); ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <?php wc_get_template_part( 'content', 'product' ); ?>
        <?php endwhile; ?>
      <?php woocommerce_product_loop_end(); ?>
      <?php woocommerce_result_count(); ?>
      <?php woocommerce_catalog_ordering(); ?>
      <?php woocommerce_pagination(); ?>
    <?php else : ?>
      <p><?php esc_html_e( 'No products found.', 'therion-peptides' ); ?></p>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>
