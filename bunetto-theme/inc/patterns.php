<?php
/**
 * Bunetto Block Patterns
 * Pre-built Gutenberg patterns matching the theme design
 *
 * @package Bunetto
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function bunetto_register_patterns() {
    register_block_pattern_category( 'bunetto', array(
        'label' => 'Bunetto',
    ) );

    /* ── HERO PATTERN ── */
    register_block_pattern( 'bunetto/hero-section', array(
        'title'       => 'Bunetto Hero Section',
        'description' => 'Full-width hero with overlay, heading, description and CTA buttons.',
        'categories'  => array( 'bunetto' ),
        'content'     => '<!-- wp:cover {"url":"https://images.unsplash.com/photo-1568901346375-23c9450c58cd?q=80&w=1800&auto=format&fit=crop","dimRatio":70,"overlayColor":"dark","minHeight":560,"minHeightUnit":"px","style":{"border":{"radius":{"bottomLeft":"28px","bottomRight":"28px"}},"spacing":{"padding":{"top":"120px","bottom":"120px","left":"60px","right":"60px"}}}} -->
<div class="wp-block-cover" style="border-bottom-left-radius:28px;border-bottom-right-radius:28px;padding-top:120px;padding-right:60px;padding-bottom:120px;padding-left:60px;min-height:560px"><span aria-hidden="true" class="wp-block-cover__background has-dark-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?q=80&w=1800&auto=format&fit=crop" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"style":{"typography":{"fontSize":"10px","letterSpacing":"5px","textTransform":"uppercase","fontStyle":"normal","fontWeight":"600"}},"textColor":"gold"} -->
<p class="has-gold-color has-text-color" style="font-size:10px;font-style:normal;font-weight:600;letter-spacing:5px;text-transform:uppercase">Standard of Excellence</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"900","fontSize":"clamp(48px, 7vw, 90px)","lineHeight":"1"}},"textColor":"white","fontFamily":"playfair"} -->
<h1 class="has-white-color has-text-color has-playfair-font-family" style="font-size:clamp(48px, 7vw, 90px);font-style:normal;font-weight:900;line-height:1">Classic Beef.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px","lineHeight":"1.8","fontStyle":"normal","fontWeight":"300"}},"textColor":"text-muted"} -->
<p class="has-text-muted-color has-text-color" style="font-size:14px;font-style:normal;font-weight:300;line-height:1.8">Juicy grilled beef patty, fresh lettuce, tomatoes, onions, creamy mayo &amp; signature house sauce.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"gold","textColor":"dark","style":{"border":{"radius":"50px"},"typography":{"fontSize":"10px","letterSpacing":"3px","textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"top":"16px","bottom":"16px","left":"36px","right":"36px"}}}} -->
<div class="wp-block-button" style="font-size:10px;font-style:normal;font-weight:700;letter-spacing:3px;text-transform:uppercase"><a class="wp-block-button__link has-gold-background-color has-dark-color has-text-color has-background wp-element-button" style="border-radius:50px;padding-top:16px;padding-right:36px;padding-bottom:16px;padding-left:36px">Explore Menu</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"50px"},"typography":{"fontSize":"10px","letterSpacing":"3px","textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"top":"15px","bottom":"15px","left":"32px","right":"32px"}}}} -->
<div class="wp-block-button is-style-outline" style="font-size:10px;font-style:normal;font-weight:700;letter-spacing:3px;text-transform:uppercase"><a class="wp-block-button__link wp-element-button" style="border-radius:50px;padding-top:15px;padding-right:32px;padding-bottom:15px;padding-left:32px">Order Now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->',
    ) );

    /* ── CTA SECTION PATTERN ── */
    register_block_pattern( 'bunetto/cta-section', array(
        'title'       => 'Bunetto CTA Section',
        'description' => 'Dark section with centered text and call-to-action button.',
        'categories'  => array( 'bunetto' ),
        'content'     => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"28px","right":"28px"}}},"backgroundColor":"dark-2","layout":{"type":"constrained","contentSize":"700px"}} -->
<div class="wp-block-group has-dark-2-background-color has-background" style="padding-top:80px;padding-right:28px;padding-bottom:80px;padding-left:28px"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"10px","letterSpacing":"5px","textTransform":"uppercase","fontStyle":"normal","fontWeight":"600"}},"textColor":"gold"} -->
<p class="has-text-align-center has-gold-color has-text-color" style="font-size:10px;font-style:normal;font-weight:600;letter-spacing:5px;text-transform:uppercase">Special Offer</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"letterSpacing":"8px"}},"textColor":"white","fontFamily":"bebas"} -->
<h2 class="has-text-align-center has-white-color has-text-color has-bebas-font-family" style="letter-spacing:8px">ORDER NOW &amp; GET 20% OFF</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"textColor":"text-muted"} -->
<p class="has-text-align-center has-text-muted-color has-text-color" style="font-style:normal;font-weight:300">Use code BUNETTO20 on your first order via WhatsApp.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"gold","textColor":"dark","style":{"border":{"radius":"50px"},"typography":{"fontSize":"10px","letterSpacing":"3px","textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"top":"16px","bottom":"16px","left":"36px","right":"36px"}}}} -->
<div class="wp-block-button" style="font-size:10px;font-style:normal;font-weight:700;letter-spacing:3px;text-transform:uppercase"><a class="wp-block-button__link has-gold-background-color has-dark-color has-text-color has-background wp-element-button" style="border-radius:50px;padding-top:16px;padding-right:36px;padding-bottom:16px;padding-left:36px">Order via WhatsApp</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
    ) );

    /* ── CONTACT SECTION PATTERN ── */
    register_block_pattern( 'bunetto/contact-section', array(
        'title'       => 'Bunetto Contact Section',
        'description' => 'Dark footer-style contact section with columns.',
        'categories'  => array( 'bunetto' ),
        'content'     => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"80px","bottom":"40px","left":"28px","right":"28px"}},"border":{"top":{"color":"#1a1a1a","width":"1px"}}},"backgroundColor":"dark-3","layout":{"type":"constrained","contentSize":"1160px"}} -->
<div class="wp-block-group has-dark-3-background-color has-background" style="border-top-color:#1a1a1a;border-top-width:1px;padding-top:80px;padding-right:28px;padding-bottom:40px;padding-left:28px"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"60px"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:heading {"level":3,"style":{"typography":{"letterSpacing":"6px","fontSize":"38px"}},"textColor":"white","fontFamily":"bebas"} -->
<h3 class="has-white-color has-text-color has-bebas-font-family" style="font-size:38px;letter-spacing:6px">BUNETTO<span style="color:#c9a96e">.</span></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"textColor":"text-muted"} -->
<p class="has-text-muted-color has-text-color" style="font-style:normal;font-weight:300">Redefining fast food. Elevating the burger experience through uncompromising quality and luxury ingredients.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"10px","letterSpacing":"4px","textTransform":"uppercase","fontStyle":"normal","fontWeight":"600"}},"textColor":"gold"} -->
<h4 class="has-gold-color has-text-color" style="font-size:10px;font-style:normal;font-weight:600;letter-spacing:4px;text-transform:uppercase">Visit Us</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"textColor":"text-muted"} -->
<p class="has-text-muted-color has-text-color" style="font-style:normal;font-weight:300">Food District<br>Pakistan<br>Open Daily: 12 PM – 12 AM</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"10px","letterSpacing":"4px","textTransform":"uppercase","fontStyle":"normal","fontWeight":"600"}},"textColor":"gold"} -->
<h4 class="has-gold-color has-text-color" style="font-size:10px;font-style:normal;font-weight:600;letter-spacing:4px;text-transform:uppercase">Contact</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"textColor":"text-muted"} -->
<p class="has-text-muted-color has-text-color" style="font-style:normal;font-weight:300">Order via WhatsApp<br>+92 301 2343423</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
    ) );
}
add_action( 'init', 'bunetto_register_patterns' );
