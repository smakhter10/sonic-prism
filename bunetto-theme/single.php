<?php
/**
 * Single post template
 * @package Bunetto
 */
get_header();
?>
<div class="container" style="padding-top:60px;padding-bottom:60px;max-width:780px;">
  <?php while ( have_posts() ) : the_post(); ?>
  <article>
    <div style="font-size:10px;letter-spacing:3px;color:var(--gold);text-transform:uppercase;font-weight:600;margin-bottom:12px;"><?php echo esc_html( get_the_date() ); ?></div>
    <h1 style="font-family:'Playfair Display',serif;font-size:clamp(28px,5vw,48px);font-weight:900;color:var(--white);margin-bottom:24px;line-height:1.15;"><?php the_title(); ?></h1>
    <?php if ( has_post_thumbnail() ) : ?>
    <div style="margin-bottom:32px;border-radius:var(--radius);overflow:hidden;"><?php the_post_thumbnail( 'large', array( 'style' => 'width:100%;height:auto;display:block;' ) ); ?></div>
    <?php endif; ?>
    <div style="font-size:14px;color:var(--text);line-height:1.9;"><?php the_content(); ?></div>
  </article>
  <?php endwhile; ?>
</div>
<?php get_footer(); ?>
