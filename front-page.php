<?php
/**
 * Template Name: Front Page
 * Homepage template for Therion Sciences
 *
 * @package Therion_Peptides
 */

get_header();
?>

<!-- HERO BANNER -->
<div class="hero-banner">
  <div class="hero-content">
    <div class="hero-text">
      <div class="overline">Therion Sciences™</div>
      <h1><?php echo esc_html( get_theme_mod( 'therion_hero_heading', 'Premium Research Peptides. Unmatched Purity. Competitive Pricing.' ) ); ?></h1>
      <p><?php echo esc_html( get_theme_mod( 'therion_hero_text', 'We specialize in highly purified peptides for scientific research and development. Every product exceeds 99% purity, verified through HPLC and Mass Spectrometry analysis.' ) ); ?></p>
      <div class="hero-buttons">
        <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="btn btn-gold">Shop All Peptides →</a>
        <a href="#" class="btn btn-outline-white">View COA Reports</a>
      </div>
      <div class="hero-badges">
        <div class="hero-badge-item">
          <div class="icon">🔬</div>
          <div><strong>99%+ Purity</strong><br>HPLC Verified</div>
        </div>
        <div class="hero-badge-item">
          <div class="icon">📋</div>
          <div><strong>COA Included</strong><br>Every Order</div>
        </div>
        <div class="hero-badge-item">
          <div class="icon">🇺🇸</div>
          <div><strong>USA Made</strong><br>GMP Facilities</div>
        </div>
      </div>
    </div>

    <!-- Featured product cards — pulls from WooCommerce if available -->
    <div class="hero-featured">
      <?php
      if ( class_exists( 'WooCommerce' ) ) {
          $featured = wc_get_products( array(
              'featured' => true,
              'limit'    => 4,
              'orderby'  => 'date',
              'order'    => 'DESC',
          ) );

          if ( empty( $featured ) ) {
              $featured = wc_get_products( array(
                  'limit'   => 4,
                  'orderby' => 'popularity',
              ) );
          }

          $icons = array( '🧪', '🧬', '⚗️', '🔬' );
          $i = 0;

          foreach ( $featured as $product ) :
              $price = $product->get_price();
              $weight = $product->get_weight();
              $size_label = $weight ? $weight . 'mg' : '';
      ?>
        <div class="hero-pcard" onclick="window.location='<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>'">
          <span class="mol"><?php echo $icons[ $i % 4 ]; ?></span>
          <h3><?php echo esc_html( $product->get_name() ); ?></h3>
          <div class="desc"><?php echo esc_html( $product->get_short_description() ); ?></div>
          <div class="price">$<?php echo esc_html( number_format( (float) $price, 2 ) ); ?> <?php if ( $size_label ) : ?><span class="size">/ <?php echo esc_html( $size_label ); ?></span><?php endif; ?></div>
        </div>
      <?php
              $i++;
          endforeach;
      } else {
          // Static fallback
          $static_products = array(
              array( 'icon' => '🧪', 'name' => 'Semaglutide',       'desc' => 'GLP-1 Receptor Agonist',      'price' => '72.00',  'size' => '5mg' ),
              array( 'icon' => '🧬', 'name' => 'Tirzepatide',       'desc' => 'Dual GIP/GLP-1 Agonist',      'price' => '105.00', 'size' => '10mg' ),
              array( 'icon' => '⚗️', 'name' => 'Retatrutide',       'desc' => 'Triple Agonist Peptide',       'price' => '170.00', 'size' => '20mg' ),
              array( 'icon' => '🔬', 'name' => 'CJC-1295 + Ipa',    'desc' => 'GH Secretagogue Blend',        'price' => '60.00',  'size' => 'blend' ),
          );
          foreach ( $static_products as $sp ) : ?>
            <div class="hero-pcard">
              <span class="mol"><?php echo $sp['icon']; ?></span>
              <h3><?php echo esc_html( $sp['name'] ); ?></h3>
              <div class="desc"><?php echo esc_html( $sp['desc'] ); ?></div>
              <div class="price">$<?php echo esc_html( $sp['price'] ); ?> <span class="size">/ <?php echo esc_html( $sp['size'] ); ?></span></div>
            </div>
          <?php endforeach;
      }
      ?>
    </div>
  </div>
</div>

<!-- TRUST BAR -->
<div class="trust-bar">
  <div class="trust-inner">
    <div class="trust-item">
      <div class="ti-icon">🔬</div>
      <div><strong>99%+ Purity</strong><span>HPLC & MS Verified</span></div>
    </div>
    <div class="trust-item">
      <div class="ti-icon">🏭</div>
      <div><strong>GMP Compliant</strong><span>ISO 9001:2015</span></div>
    </div>
    <div class="trust-item">
      <div class="ti-icon">📦</div>
      <div><strong>Fast Shipping</strong><span>24-48hr Dispatch</span></div>
    </div>
    <div class="trust-item">
      <div class="ti-icon">🛡️</div>
      <div><strong>Secure Checkout</strong><span>SSL Encrypted</span></div>
    </div>
  </div>
</div>

<!-- CATEGORIES -->
<div class="section reveal">
  <div class="section-header">
    <div>
      <h2>Shop by Category</h2>
      <p>Browse our research compound catalog</p>
    </div>
    <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="view-all">View All →</a>
  </div>

  <div class="categories-grid">
    <?php
    $categories = get_terms( array(
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'parent'     => 0,
        'exclude'    => array( get_option( 'default_product_cat' ) ),
    ) );

    $cat_icons = array( '🧬', '⚗️', '🔬', '🧪', '✨', '⚡', '💊', '🧫' );

    if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) :
        $ci = 0;
        foreach ( $categories as $cat ) :
            $icon = $cat_icons[ $ci % count( $cat_icons ) ];
    ?>
      <a href="<?php echo esc_url( get_term_link( $cat ) ); ?>" class="cat-card">
        <div class="cat-icon"><?php echo $icon; ?></div>
        <h3><?php echo esc_html( $cat->name ); ?></h3>
        <div class="count"><?php echo esc_html( $cat->count ); ?> product<?php echo $cat->count !== 1 ? 's' : ''; ?></div>
      </a>
    <?php
            $ci++;
        endforeach;
    else :
        // Static fallback
        $static_cats = array(
            array( 'icon' => '🧬', 'name' => 'GLP-1 Agonists',  'sub' => 'Semaglutide, Tirzepatide' ),
            array( 'icon' => '⚗️', 'name' => 'Multi-Agonists',   'sub' => 'Retatrutide & more' ),
            array( 'icon' => '🔬', 'name' => 'Growth Hormone',   'sub' => 'CJC-1295, Ipamorelin' ),
            array( 'icon' => '🧪', 'name' => 'Recovery',         'sub' => 'GHK-Cu, BPC-157' ),
            array( 'icon' => '✨', 'name' => 'Skin & Glow',      'sub' => 'Glow Blend & more' ),
            array( 'icon' => '⚡', 'name' => 'NAD+',             'sub' => 'NAD+ 1000mg' ),
        );
        foreach ( $static_cats as $sc ) : ?>
          <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="cat-card">
            <div class="cat-icon"><?php echo $sc['icon']; ?></div>
            <h3><?php echo esc_html( $sc['name'] ); ?></h3>
            <div class="count"><?php echo esc_html( $sc['sub'] ); ?></div>
          </a>
        <?php endforeach;
    endif;
    ?>
  </div>
</div>

<!-- PRODUCTS -->
<div class="products-section">
  <div class="section reveal">
    <div class="section-header">
      <div>
        <h2>Our Peptides</h2>
        <p>Research-grade compounds — all products for in-vitro use only</p>
      </div>
      <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="view-all">View Full Catalog →</a>
    </div>

    <?php
    if ( class_exists( 'WooCommerce' ) ) {
        echo do_shortcode( '[products limit="8" columns="4" orderby="popularity"]' );
    } else {
        // Static fallback
        get_template_part( 'template-parts/static-products' );
    }
    ?>
  </div>
</div>

<!-- WHY US -->
<div class="section reveal">
  <div class="section-header">
    <div>
      <h2>Why Therion Sciences</h2>
      <p>Quality, transparency, and value for researchers</p>
    </div>
  </div>

  <div class="info-grid">
    <div class="info-card">
      <div class="info-icon">🔬</div>
      <h3>HPLC & MS Verified</h3>
      <p>Every batch undergoes High-Performance Liquid Chromatography and Mass Spectrometry analysis to confirm identity and purity exceeding 99%.</p>
    </div>
    <div class="info-card">
      <div class="info-icon">📋</div>
      <h3>Certificate of Analysis</h3>
      <p>Each product ships with a detailed COA — full transparency into purity, molecular weight, and third-party testing results.</p>
    </div>
    <div class="info-card">
      <div class="info-icon">💰</div>
      <h3>Competitive Pricing</h3>
      <p>Premium quality at fair prices. We partner directly with GMP manufacturers to deliver real value to researchers.</p>
    </div>
    <div class="info-card">
      <div class="info-icon">🏭</div>
      <h3>WHO/GMP & ISO Sourced</h3>
      <p>All products synthesized in WHO/GMP and ISO 9001:2015 certified facilities for consistent, reproducible quality.</p>
    </div>
    <div class="info-card">
      <div class="info-icon">❄️</div>
      <h3>Cold-Chain Shipping</h3>
      <p>Temperature-sensitive compounds stored and shipped under controlled conditions to preserve stability and bioactivity.</p>
    </div>
    <div class="info-card">
      <div class="info-icon">⚡</div>
      <h3>24-48hr Dispatch</h3>
      <p>Most orders ship within 24-48 hours. Fast, reliable delivery because your research timelines matter.</p>
    </div>
  </div>
</div>

<!-- RESEARCH CTA -->
<div class="section reveal">
  <div class="research-banner">
    <div>
      <h2>Peptide Research & Resources</h2>
      <p>Explore our library of scientific publications, reconstitution guides, storage protocols, and peptide information to support your research.</p>
    </div>
    <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="btn btn-gold">Browse Articles →</a>
  </div>
</div>

<?php get_footer(); ?>
