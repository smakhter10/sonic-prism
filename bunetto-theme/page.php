<?php
/**
 * Page template
 * @package Bunetto
 */
get_header();
?>
<div class="container" style="padding-top:60px;padding-bottom:60px;">
  <?php while ( have_posts() ) : the_post(); ?>
  <article>
    <h1 style="font-family:'Playfair Display',serif;font-size:clamp(32px,5vw,52px);font-weight:900;color:var(--white);margin-bottom:24px;"><?php the_title(); ?></h1>
    <div style="font-size:14px;color:var(--text);line-height:1.9;"><?php the_content(); ?></div>
  </article>
  <?php endwhile; ?>
</div>
<?php get_footer(); ?>
