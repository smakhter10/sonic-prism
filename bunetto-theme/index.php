<?php
/**
 * Index template (fallback)
 * @package Bunetto
 */
get_header();
?>
<div class="container" style="padding-top:60px;padding-bottom:60px;">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <article style="margin-bottom:40px;padding-bottom:40px;border-bottom:1px solid #1e1e1e;">
    <h2 style="font-family:'Playfair Display',serif;font-size:28px;font-weight:700;color:var(--white);margin-bottom:12px;">
      <a href="<?php the_permalink(); ?>" style="color:var(--white);text-decoration:none;"><?php the_title(); ?></a>
    </h2>
    <div style="font-size:13px;color:var(--text-muted);line-height:1.8;"><?php the_excerpt(); ?></div>
  </article>
  <?php endwhile; else : ?>
  <p style="color:var(--text-muted);text-align:center;padding:80px 0;">No posts found.</p>
  <?php endif; ?>
</div>
<?php get_footer(); ?>
