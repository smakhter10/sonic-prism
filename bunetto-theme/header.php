<?php
/**
 * Header template
 * @package Bunetto
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php if ( is_front_page() && bunetto_opt( 'splash_enabled', '1' ) ) : ?>
<!-- ══ SPLASH ══ -->
<div id="splash">
  <div class="splash-logo"><?php echo esc_html( bunetto_opt( 'splash_logo_text', 'BUNETTO' ) ); ?><span>.</span></div>
  <div class="splash-sub"><?php echo esc_html( bunetto_opt( 'splash_subtitle', 'Premium Burgers · Pakistan' ) ); ?></div>
  <div class="splash-eyebrow"><?php echo esc_html( bunetto_opt( 'splash_eyebrow', 'Grand Opening' ) ); ?></div>
  <div class="countdown">
    <div class="cd-block"><span class="cd-num" id="cd-days">00</span><span class="cd-lbl">Days</span></div>
    <span class="cd-sep">:</span>
    <div class="cd-block"><span class="cd-num" id="cd-hours">00</span><span class="cd-lbl">Hours</span></div>
    <span class="cd-sep">:</span>
    <div class="cd-block"><span class="cd-num" id="cd-mins">00</span><span class="cd-lbl">Mins</span></div>
    <span class="cd-sep">:</span>
    <div class="cd-block"><span class="cd-num" id="cd-secs">00</span><span class="cd-lbl">Secs</span></div>
  </div>
  <button class="sneak-btn" onclick="revealSite()">
    <?php echo esc_html( bunetto_opt( 'splash_button_text', 'Sneak Peek' ) ); ?>
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
  </button>
</div>
<?php /* Pass countdown date to JS */ ?>
<script>var bunettoCountdownDate = '<?php echo esc_js( bunetto_opt( 'splash_countdown_date', '2026-05-12' ) ); ?>T00:00:00';</script>

<div id="site">
<?php endif; ?>

<!-- NAVBAR -->
<nav id="navbar">
  <div class="nav-inner">
    <?php
    $b_logo_type = bunetto_opt( 'header_logo_type', 'text' );
    $b_logo_img  = bunetto_opt( 'header_logo_image', '' );
    $b_logo_mh   = max( 16, min( 200, absint( bunetto_opt( 'header_logo_img_max_h', 40 ) ) ) );
    ?>
    <?php if ( 'image' === $b_logo_type && $b_logo_img ) : ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo nav-logo--image"><img src="<?php echo esc_url( $b_logo_img ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" height="<?php echo (int) $b_logo_mh; ?>"></a>
    <?php else : ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo"><?php echo esc_html( bunetto_opt( 'header_logo_text', 'BUNETTO' ) ); ?><span><?php echo esc_html( bunetto_opt( 'header_logo_accent', '.' ) ); ?></span></a>
    <?php endif; ?>
    <ul class="nav-links">
      <li><a href="<?php echo esc_url( home_url( '/#bunetto-signature' ) ); ?>" <?php if ( is_front_page() ) echo 'onclick="ss(event,\'bunetto-signature\')"'; ?>>Signature</a></li>
      <li><a href="<?php echo esc_url( home_url( '/#menu-burgers' ) ); ?>" <?php if ( is_front_page() ) echo 'onclick="ss(event,\'menu-burgers\')"'; ?>>Menu</a></li>
      <li><a href="<?php echo esc_url( home_url( '/#menu-beverages' ) ); ?>" <?php if ( is_front_page() ) echo 'onclick="ss(event,\'menu-beverages\')"'; ?>>Drinks</a></li>
    </ul>
    <button class="nav-cart" onclick="openCart()">
      <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
      Order
      <span class="cart-badge" id="cart-count">0</span>
    </button>
  </div>
</nav>
