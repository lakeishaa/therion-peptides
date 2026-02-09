<?php
/**
 * Page Template
 *
 * @package Therion_Peptides
 */

get_header();
?>

<div class="section">
  <?php while ( have_posts() ) : the_post(); ?>
    <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="section-header">
        <div>
          <h2><?php the_title(); ?></h2>
        </div>
      </div>
      <div class="entry-content" style="max-width: 800px; line-height: 1.8; color: var(--text-secondary);">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; ?>
</div>

<?php get_footer(); ?>
