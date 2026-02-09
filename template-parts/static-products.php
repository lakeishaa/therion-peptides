<?php
/**
 * Static product cards fallback
 * Shown when WooCommerce is not yet installed
 *
 * @package Therion_Peptides
 */

$products = array(
    array( 'cat' => 'GLP-1 Agonist',    'name' => 'Semaglutide',           'desc' => 'GLP-1 Receptor Agonist',             'price' => '72.00',  'size' => '5mg / vial',    'badge' => 'Popular' ),
    array( 'cat' => 'Dual Agonist',      'name' => 'Tirzepatide',           'desc' => 'Dual GIP/GLP-1 Receptor Agonist',    'price' => '105.00', 'size' => '10mg / vial',   'badge' => 'New' ),
    array( 'cat' => 'Triple Agonist',    'name' => 'Retatrutide',           'desc' => 'GLP-1/GIP/Glucagon Triple Agonist',  'price' => '170.00', 'size' => '20mg / vial',   'badge' => 'Premium' ),
    array( 'cat' => 'GH Secretagogue',   'name' => 'CJC-1295 + Ipamorelin','desc' => 'Growth Hormone Releasing Blend',     'price' => '60.00',  'size' => 'blend / vial',  'badge' => '' ),
    array( 'cat' => 'Copper Peptide',    'name' => 'GHK-Cu',               'desc' => 'Copper Peptide Complex',              'price' => '40.00',  'size' => '50mg / vial',   'badge' => '' ),
    array( 'cat' => 'Skin & Beauty',     'name' => 'Glow Blend',           'desc' => 'Multi-Peptide Skin Complex',          'price' => '100.00', 'size' => '~70mg / vial',  'badge' => 'Exclusive' ),
    array( 'cat' => 'Coenzyme',          'name' => 'NAD+',                 'desc' => 'Nicotinamide Adenine Dinucleotide',    'price' => '150.00', 'size' => '1000mg / vial', 'badge' => '' ),
);
?>

<div class="products-grid">
  <?php foreach ( $products as $p ) : ?>
    <div class="product-card">
      <div class="badge-row">
        <span class="product-badge badge-purity">99%+ Pure</span>
        <?php if ( $p['badge'] ) : ?>
          <span class="product-badge badge-new"><?php echo esc_html( $p['badge'] ); ?></span>
        <?php endif; ?>
      </div>
      <div class="product-img">
        <div class="vial-graphic">
          <div class="vial-cap"></div>
          <div class="vial-neck"></div>
          <div class="vial-body"></div>
          <div class="vial-label"><?php echo esc_html( explode( ' ', $p['size'] )[0] ); ?></div>
        </div>
      </div>
      <div class="product-body">
        <div class="product-cat"><?php echo esc_html( $p['cat'] ); ?></div>
        <h3><?php echo esc_html( $p['name'] ); ?></h3>
        <div class="product-desc"><?php echo esc_html( $p['desc'] ); ?></div>
        <div class="product-meta">
          <div>
            <div class="price">$<?php echo esc_html( $p['price'] ); ?></div>
            <div class="size-info"><?php echo esc_html( $p['size'] ); ?></div>
          </div>
          <button class="add-btn">+</button>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
