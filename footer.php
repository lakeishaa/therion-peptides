<!-- NEWSLETTER -->
<div class="newsletter-section">
  <div class="section">
    <div class="newsletter-inner">
      <h2>Stay Updated</h2>
      <p>New products, research publications, and exclusive offers.</p>
      <div class="newsletter-form">
        <input type="email" placeholder="Enter your email address">
        <button type="submit">Subscribe</button>
      </div>
    </div>
  </div>
</div>

<!-- FOOTER -->
<footer class="site-footer">
  <div class="footer-grid">
    <div class="footer-brand">
      <div class="ft-logo">
        <span class="ft-brand">THERION</span>
        <span class="ft-sub">Sciences</span>
      </div>
      <p>Therion Sciences™ specializes in the synthesis of highly purified peptides, proteins, and amino acid derivatives for scientific research and development. USA made. GMP compliant.</p>
    </div>

    <div class="footer-col">
      <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
        <?php dynamic_sidebar( 'footer-1' ); ?>
      <?php else : ?>
        <h4>Products</h4>
        <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>">Semaglutide</a>
        <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>">Tirzepatide</a>
        <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>">Retatrutide</a>
        <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>">CJC-1295 + Ipamorelin</a>
        <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>">GHK-Cu</a>
        <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>">Glow Blend</a>
        <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>">NAD+</a>
      <?php endif; ?>
    </div>

    <div class="footer-col">
      <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
        <?php dynamic_sidebar( 'footer-2' ); ?>
      <?php else : ?>
        <h4>Information</h4>
        <a href="#">What are Peptides?</a>
        <a href="#">Peptide Purity</a>
        <a href="#">Reconstitution Guide</a>
        <a href="#">Storage & Handling</a>
        <a href="#">Research Articles</a>
        <a href="#">Certificate of Analysis</a>
      <?php endif; ?>
    </div>

    <div class="footer-col">
      <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
        <?php dynamic_sidebar( 'footer-3' ); ?>
      <?php else : ?>
        <h4>Company</h4>
        <a href="#">About Us</a>
        <a href="#">Contact</a>
        <a href="#">FAQ</a>
        <a href="#">Shipping & Returns</a>
        <a href="<?php echo esc_url( get_privacy_policy_url() ); ?>">Privacy Policy</a>
        <a href="#">Terms & Conditions</a>
      <?php endif; ?>
    </div>
  </div>

  <div class="footer-bottom">
    <p>&copy; <?php echo date( 'Y' ); ?> Therion Sciences™. All rights reserved.</p>
    <div class="disclaimer">
      <?php echo esc_html( get_theme_mod( 'therion_disclaimer', 'Products are intended for IN-VITRO LABORATORY RESEARCH USE ONLY — not for human consumption. You must be 21+ to use this website. All products handled by qualified research professionals only.' ) ); ?>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
