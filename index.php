<?php
/**
 * Default template
 *
 * @package Therion_Peptides
 */

get_header();
?>

<div class="section">
  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1><?php the_title(); ?></h1>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
  <?php else : ?>
    <p><?php esc_html_e( 'No content found.', 'therion-peptides' ); ?></p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
