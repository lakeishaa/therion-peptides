<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- TOP BAR -->
<div class="top-bar">
  <div class="promo">
    <span class="badge"><?php echo esc_html( get_theme_mod( 'therion_promo_badge', 'New' ) ); ?></span>
    <?php echo esc_html( get_theme_mod( 'therion_promo_text', 'Free shipping on orders over $200 · USA made · 99%+ purity guaranteed' ) ); ?>
  </div>
  <div class="top-bar-links">
    <?php
    if ( has_nav_menu( 'top-bar' ) ) {
        wp_nav_menu( array(
            'theme_location' => 'top-bar',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'depth'          => 1,
        ) );
    } else { ?>
        <a href="<?php echo esc_url( home_url( '/support' ) ); ?>">Support</a>
        <a href="<?php echo esc_url( home_url( '/track-order' ) ); ?>">Track Order</a>
        <a href="<?php echo esc_url( home_url( '/faq' ) ); ?>">FAQ</a>
    <?php } ?>
  </div>
</div>

<!-- HEADER -->
<header class="site-header">
  <div class="header-main">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
      <?php if ( has_custom_logo() ) : ?>
        <?php
        $logo_id  = get_theme_mod( 'custom_logo' );
        $logo_url = wp_get_attachment_image_url( $logo_id, 'full' );
        ?>
        <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>">
      <?php else : ?>
        <div class="logo-svg">
          <div class="logo-helix">
            <div class="strand">
              <div class="node"></div><div class="node"></div>
              <div class="node"></div><div class="node"></div>
            </div>
          </div>
          <div class="logo-center">T</div>
          <div class="logo-helix">
            <div class="strand">
              <div class="node"></div><div class="node"></div>
              <div class="node"></div><div class="node"></div>
            </div>
          </div>
          <div class="logo-wordmark">
            <span class="brand">THERION</span>
            <span class="sub">Sciences</span>
          </div>
        </div>
      <?php endif; ?>
    </a>

    <div class="header-search">
      <span class="search-icon">🔍</span>
      <?php if ( class_exists( 'WooCommerce' ) ) : ?>
        <?php get_product_search_form(); ?>
      <?php else : ?>
        <input type="text" placeholder="Search peptides, proteins, amino acids...">
      <?php endif; ?>
    </div>

    <div class="header-actions">
      <?php if ( class_exists( 'WooCommerce' ) ) : ?>
        <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" class="action-btn">
          <span class="icon">👤</span>Account
        </a>
        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="action-btn cart-btn">
          🛒 Cart <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
        </a>
      <?php else : ?>
        <a href="#" class="action-btn"><span class="icon">👤</span>Account</a>
        <a href="#" class="action-btn cart-btn">🛒 Cart <span class="cart-count">0</span></a>
      <?php endif; ?>
    </div>
  </div>
</header>

<!-- NAV -->
<div class="nav-bar">
  <nav class="nav-inner">
    <?php
    if ( has_nav_menu( 'primary' ) ) {
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'depth'          => 1,
            'walker'         => new Therion_Nav_Walker(),
        ) );
    } else { ?>
        <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="active">All Peptides</a>
        <a href="#">GLP-1 Agonists</a>
        <a href="#">Growth Hormone</a>
        <a href="#">Recovery & Repair</a>
        <a href="#">Blends</a>
        <a href="#">NAD+</a>
        <a href="#">Research Articles</a>
    <?php } ?>
  </nav>
</div>
