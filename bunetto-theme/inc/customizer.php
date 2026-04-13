<?php
/**
 * Bunetto Customizer
 * Visual editing for all homepage sections
 *
 * @package Bunetto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Logo type: text or image.
 *
 * @param string $v Raw.
 */
function bunetto_sanitize_logo_type( $v ) {
	return in_array( $v, array( 'text', 'image' ), true ) ? $v : 'text';
}

/**
 * Register Customizer settings and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function bunetto_customizer( $wp_customize ) {

	$wp_customize->add_panel(
		'bunetto_homepage',
		array(
			'title'    => 'Homepage Sections',
			'priority' => 30,
		)
	);

	/* ── Splash ── */
	$wp_customize->add_section(
		'bunetto_splash',
		array(
			'title'    => 'Splash / Countdown',
			'panel'    => 'bunetto_homepage',
			'priority' => 10,
		)
	);

	bunetto_add_setting( $wp_customize, 'splash_enabled', '1', 'bunetto_splash', 'Enable Splash Screen', 'checkbox' );
	bunetto_add_setting( $wp_customize, 'splash_logo_text', 'BUNETTO', 'bunetto_splash', 'Logo Text' );
	bunetto_add_setting( $wp_customize, 'splash_subtitle', 'Premium Burgers · Pakistan', 'bunetto_splash', 'Subtitle' );
	bunetto_add_setting( $wp_customize, 'splash_eyebrow', 'Grand Opening', 'bunetto_splash', 'Eyebrow Text' );
	bunetto_add_setting( $wp_customize, 'splash_countdown_date', '2026-05-12', 'bunetto_splash', 'Countdown Target Date (YYYY-MM-DD)' );
	bunetto_add_setting( $wp_customize, 'splash_button_text', 'Sneak Peek', 'bunetto_splash', 'Button Text' );

	/* ── Logos (header & footer) ── */
	$wp_customize->add_section(
		'bunetto_logos',
		array(
			'title'       => __( 'Logos (header & footer)', 'bunetto' ),
			'description' => __( 'Use text or a single image per location. Image mode replaces text and accent dot.', 'bunetto' ),
			'panel'       => 'bunetto_homepage',
			'priority'    => 9,
		)
	);

	bunetto_add_select(
		$wp_customize,
		'header_logo_type',
		'text',
		'bunetto_logos',
		__( 'Header — logo type', 'bunetto' ),
		array(
			'text'  => __( 'Text', 'bunetto' ),
			'image' => __( 'Image', 'bunetto' ),
		),
		'bunetto_sanitize_logo_type'
	);
	bunetto_add_setting( $wp_customize, 'header_logo_text', 'BUNETTO', 'bunetto_logos', __( 'Header — text (if text logo)', 'bunetto' ) );
	bunetto_add_setting( $wp_customize, 'header_logo_accent', '.', 'bunetto_logos', __( 'Header — accent after text (e.g. dot)', 'bunetto' ) );
	bunetto_add_image( $wp_customize, 'header_logo_image', 'bunetto_logos', __( 'Header — image (if image logo)', 'bunetto' ) );
	bunetto_add_setting( $wp_customize, 'header_logo_img_max_h', '40', 'bunetto_logos', __( 'Header — image max height (px)', 'bunetto' ) );

	bunetto_add_select(
		$wp_customize,
		'footer_logo_type',
		'text',
		'bunetto_logos',
		__( 'Footer — logo type', 'bunetto' ),
		array(
			'text'  => __( 'Text', 'bunetto' ),
			'image' => __( 'Image', 'bunetto' ),
		),
		'bunetto_sanitize_logo_type'
	);
	bunetto_add_setting( $wp_customize, 'footer_logo_text', 'BUNETTO', 'bunetto_logos', __( 'Footer — text (if text logo)', 'bunetto' ) );
	bunetto_add_setting( $wp_customize, 'footer_logo_accent', '.', 'bunetto_logos', __( 'Footer — accent after text', 'bunetto' ) );
	bunetto_add_image( $wp_customize, 'footer_logo_image', 'bunetto_logos', __( 'Footer — image (if image logo)', 'bunetto' ) );
	bunetto_add_setting( $wp_customize, 'footer_logo_img_max_h', '48', 'bunetto_logos', __( 'Footer — image max height (px)', 'bunetto' ) );

	/* ── Site header (navbar) colors ── */
	$wp_customize->add_section(
		'bunetto_header_style',
		array(
			'title'       => 'Site header — colors',
			'description' => __( 'Sticky navigation bar. The background uses a color plus an opacity slider.', 'bunetto' ),
			'panel'       => 'bunetto_homepage',
			'priority'    => 12,
		)
	);

	bunetto_add_color_with_opacity( $wp_customize, 'nav_bg', '', 93, 'bunetto_header_style', __( 'Background', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'nav_border', '#1e1e1e', 'bunetto_header_style', __( 'Bottom border', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'nav_logo', '#ffffff', 'bunetto_header_style', __( 'Logo text', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'nav_logo_accent', '#c9a96e', 'bunetto_header_style', __( 'Logo dot (accent)', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'nav_link', '#888880', 'bunetto_header_style', __( 'Nav links', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'nav_link_hover', '#c9a96e', 'bunetto_header_style', __( 'Nav links (hover)', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'nav_cart_bg', '#1a1a1a', 'bunetto_header_style', __( 'Order button background', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'nav_cart_border', '#2a2a2a', 'bunetto_header_style', __( 'Order button border', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'nav_cart_text', '#f0ece4', 'bunetto_header_style', __( 'Order button text', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'nav_badge_bg', '#c9a96e', 'bunetto_header_style', __( 'Cart badge background', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'nav_badge_text', '#0a0a0a', 'bunetto_header_style', __( 'Cart badge text', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'nav_cart_hover_bg', '#1a1a1a', 'bunetto_header_style', __( 'Order button — hover background', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'nav_cart_hover_border', '#c9a96e', 'bunetto_header_style', __( 'Order button — hover border', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'nav_cart_hover_text', '#c9a96e', 'bunetto_header_style', __( 'Order button — hover text & icon', 'bunetto' ) );

	$menu_choices = bunetto_get_menu_item_choices();

	for ( $i = 1; $i <= BUNETTO_HERO_MAX_SLIDES; $i++ ) {
		$d = bunetto_hero_slide_defaults( $i );

		$wp_customize->add_section(
			'bunetto_hero_' . $i,
			array(
				'title'    => sprintf(
					/* translators: %d: slide number */
					__( 'Hero — Slide %d', 'bunetto' ),
					$i
				),
				'panel'    => 'bunetto_homepage',
				'priority' => 20 + $i,
			)
		);

		$sec = 'bunetto_hero_' . $i;

		bunetto_add_setting( $wp_customize, "hero{$i}_enabled", $d['enabled'], $sec, __( 'Enable this slide', 'bunetto' ), 'checkbox' );
		bunetto_add_setting( $wp_customize, "hero{$i}_eyebrow", $d['eyebrow'], $sec, __( 'Eyebrow text', 'bunetto' ) );
		bunetto_add_setting( $wp_customize, "hero{$i}_title", $d['title'], $sec, __( 'Heading', 'bunetto' ) );
		bunetto_add_setting( $wp_customize, "hero{$i}_desc", $d['desc'], $sec, __( 'Description', 'bunetto' ), 'textarea' );
		bunetto_add_image( $wp_customize, "hero{$i}_image", $sec, __( 'Background image', 'bunetto' ) );

		bunetto_add_setting( $wp_customize, "hero{$i}_btn1_text", $d['btn1_text'], $sec, __( 'Button 1 — label', 'bunetto' ) );
		bunetto_add_select(
			$wp_customize,
			"hero{$i}_btn1_action",
			$d['btn1_action'],
			$sec,
			__( 'Button 1 — action', 'bunetto' ),
			array(
				'none'            => __( 'Hidden', 'bunetto' ),
				'link'            => __( 'Link / anchor', 'bunetto' ),
				'open_menu_item' => __( 'Open menu item (product modal)', 'bunetto' ),
			),
			'bunetto_sanitize_hero_btn_action'
		);
		bunetto_add_setting( $wp_customize, "hero{$i}_btn1_link", isset( $d['btn1_link'] ) ? $d['btn1_link'] : '', $sec, __( 'Button 1 — URL or #section (if link)', 'bunetto' ) );
		bunetto_add_select(
			$wp_customize,
			"hero{$i}_btn1_product",
			$d['btn1_product'],
			$sec,
			__( 'Button 1 — menu item (if modal)', 'bunetto' ),
			$menu_choices,
			'bunetto_sanitize_menu_item_id'
		);
		bunetto_add_select(
			$wp_customize,
			"hero{$i}_btn1_style",
			$d['btn1_style'],
			$sec,
			__( 'Button 1 — style', 'bunetto' ),
			array(
				'primary' => __( 'Primary (filled)', 'bunetto' ),
				'ghost'   => __( 'Secondary (outline)', 'bunetto' ),
			),
			'bunetto_sanitize_hero_btn_style'
		);

		bunetto_add_setting( $wp_customize, "hero{$i}_btn2_text", $d['btn2_text'], $sec, __( 'Button 2 — label', 'bunetto' ) );
		bunetto_add_select(
			$wp_customize,
			"hero{$i}_btn2_action",
			$d['btn2_action'],
			$sec,
			__( 'Button 2 — action', 'bunetto' ),
			array(
				'none'            => __( 'Hidden', 'bunetto' ),
				'link'            => __( 'Link / anchor', 'bunetto' ),
				'open_menu_item' => __( 'Open menu item (product modal)', 'bunetto' ),
			),
			'bunetto_sanitize_hero_btn_action'
		);
		bunetto_add_setting( $wp_customize, "hero{$i}_btn2_link", isset( $d['btn2_link'] ) ? $d['btn2_link'] : '', $sec, __( 'Button 2 — URL or #section (if link)', 'bunetto' ) );
		bunetto_add_select(
			$wp_customize,
			"hero{$i}_btn2_product",
			$d['btn2_product'],
			$sec,
			__( 'Button 2 — menu item (if modal)', 'bunetto' ),
			$menu_choices,
			'bunetto_sanitize_menu_item_id'
		);
		bunetto_add_select(
			$wp_customize,
			"hero{$i}_btn2_style",
			$d['btn2_style'],
			$sec,
			__( 'Button 2 — style', 'bunetto' ),
			array(
				'primary' => __( 'Primary (filled)', 'bunetto' ),
				'ghost'   => __( 'Secondary (outline)', 'bunetto' ),
			),
			'bunetto_sanitize_hero_btn_style'
		);
	}

	$wp_customize->add_section(
		'bunetto_hero_style',
		array(
			'title'       => 'Hero — style & spacing',
			'description' => __( 'Overlay uses three gradient stops. Pick a color and set opacity (0–100%) for each stop.', 'bunetto' ),
			'panel'       => 'bunetto_homepage',
			'priority'    => 33,
		)
	);

	bunetto_add_setting( $wp_customize, 'hero_height', '92vh', 'bunetto_hero_style', __( 'Hero height (e.g. 92vh, 600px)', 'bunetto' ) );
	bunetto_add_color_with_opacity( $wp_customize, 'hero_overlay_left', '', 88, 'bunetto_hero_style', __( 'Overlay — left stop', 'bunetto' ) );
	bunetto_add_color_with_opacity( $wp_customize, 'hero_overlay_mid', '', 38, 'bunetto_hero_style', __( 'Overlay — middle (55%)', 'bunetto' ) );
	bunetto_add_color_with_opacity( $wp_customize, 'hero_overlay_right', '', 4, 'bunetto_hero_style', __( 'Overlay — right stop', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'hero_eyebrow_color', '#c9a96e', 'bunetto_hero_style', __( 'Eyebrow text color', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'hero_text_color', '#ffffff', 'bunetto_hero_style', __( 'Heading color', 'bunetto' ) );
	bunetto_add_color_with_opacity( $wp_customize, 'hero_desc', '', 72, 'bunetto_hero_style', __( 'Description text', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'hero_btn_primary_bg', '#c9a96e', 'bunetto_hero_style', __( 'Hero — primary button background', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'hero_btn_primary_text', '#0a0a0a', 'bunetto_hero_style', __( 'Hero — primary button text', 'bunetto' ) );
	bunetto_add_color_with_opacity( $wp_customize, 'hero_btn_secondary_bg', '', 8, 'bunetto_hero_style', __( 'Hero — secondary button background', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'hero_btn_secondary_text', '#ffffff', 'bunetto_hero_style', __( 'Hero — secondary button text', 'bunetto' ) );
	bunetto_add_color_with_opacity( $wp_customize, 'hero_btn_secondary_border', '', 20, 'bunetto_hero_style', __( 'Hero — secondary button border', 'bunetto' ) );

	$wp_customize->add_section(
		'bunetto_signature',
		array(
			'title'    => 'Signature Section',
			'panel'    => 'bunetto_homepage',
			'priority' => 40,
		)
	);

	bunetto_add_setting( $wp_customize, 'sig_enabled', '1', 'bunetto_signature', 'Enable Signature Section', 'checkbox' );
	bunetto_add_setting( $wp_customize, 'sig_eyebrow', 'Top Picks', 'bunetto_signature', 'Eyebrow Text' );
	bunetto_add_setting( $wp_customize, 'sig_title', 'BUNETTO SIGNATURE', 'bunetto_signature', 'Section Title' );
	bunetto_add_setting( $wp_customize, 'sig_padding_top', '90', 'bunetto_signature', 'Padding Top (px)' );
	bunetto_add_setting( $wp_customize, 'sig_padding_bottom', '90', 'bunetto_signature', 'Padding Bottom (px)' );

	$wp_customize->add_section(
		'bunetto_menu_sections',
		array(
			'title'    => 'Menu Sections',
			'panel'    => 'bunetto_homepage',
			'priority' => 50,
		)
	);

	bunetto_add_setting( $wp_customize, 'menu_enabled', '1', 'bunetto_menu_sections', 'Enable Menu Sections', 'checkbox' );
	bunetto_add_setting( $wp_customize, 'menu_all_title', 'Complete Collection', 'bunetto_menu_sections', '"All Items" Section Title' );
	bunetto_add_setting( $wp_customize, 'menu_padding', '72', 'bunetto_menu_sections', 'Section Padding (px)' );

	$wp_customize->add_section(
		'bunetto_footer',
		array(
			'title'    => 'Footer — content',
			'panel'    => 'bunetto_homepage',
			'priority' => 60,
		)
	);

	bunetto_add_setting( $wp_customize, 'footer_brand_text', 'Redefining fast food. Elevating the burger experience through uncompromising quality and luxury ingredients.', 'bunetto_footer', 'Brand Description', 'textarea' );
	bunetto_add_setting( $wp_customize, 'footer_address_1', 'Food District', 'bunetto_footer', 'Address Line 1' );
	bunetto_add_setting( $wp_customize, 'footer_address_2', 'Pakistan', 'bunetto_footer', 'Address Line 2' );
	bunetto_add_setting( $wp_customize, 'footer_hours', 'Open Daily: 12 PM – 12 AM', 'bunetto_footer', 'Business Hours' );
	bunetto_add_setting( $wp_customize, 'footer_contact_label', 'Order via WhatsApp', 'bunetto_footer', 'Contact Label' );
	bunetto_add_setting( $wp_customize, 'footer_copyright', '© {year} Bunetto Premium Burgers. All rights reserved.', 'bunetto_footer', 'Copyright Text ({year} = auto)' );

	$wp_customize->add_section(
		'bunetto_footer_style',
		array(
			'title'    => 'Footer — colors',
			'panel'    => 'bunetto_homepage',
			'priority' => 62,
		)
	);

	bunetto_add_color( $wp_customize, 'footer_bg', '#1a1a1a', 'bunetto_footer_style', __( 'Background', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'footer_border', '#1a1a1a', 'bunetto_footer_style', __( 'Top border', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'footer_logo', '#ffffff', 'bunetto_footer_style', __( 'Logo text', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'footer_logo_accent', '#c9a96e', 'bunetto_footer_style', __( 'Logo accent', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'footer_text', '#888880', 'bunetto_footer_style', __( 'Body text', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'footer_heading', '#c9a96e', 'bunetto_footer_style', __( 'Column headings', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'footer_link', '#888880', 'bunetto_footer_style', __( 'Links', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'footer_link_hover', '#c9a96e', 'bunetto_footer_style', __( 'Links (hover)', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'footer_bottom_text', '#444440', 'bunetto_footer_style', __( 'Copyright line', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'footer_bottom_border', '#1a1a1a', 'bunetto_footer_style', __( 'Copyright top border', 'bunetto' ) );

	/* ── Side cart ── */
	$wp_customize->add_section(
		'bunetto_side_cart',
		array(
			'title'       => __( 'Side cart', 'bunetto' ),
			'description' => __( 'Slide-out cart and checkout panel.', 'bunetto' ),
			'panel'       => 'bunetto_homepage',
			'priority'    => 64,
		)
	);

	bunetto_add_color_with_opacity( $wp_customize, 'cart_backdrop', '', 72, 'bunetto_side_cart', __( 'Screen overlay (behind panel)', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_inner_bg', '#111111', 'bunetto_side_cart', __( 'Panel background', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_inner_border', '#222222', 'bunetto_side_cart', __( 'Panel left border', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_header_title', '#ffffff', 'bunetto_side_cart', __( '“Your Order” title', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_header_border', '#222222', 'bunetto_side_cart', __( 'Header bottom border', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_close_bg', '#242424', 'bunetto_side_cart', __( 'Close button background', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_close_color', '#888880', 'bunetto_side_cart', __( 'Close button icon', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_close_hover', '#ffffff', 'bunetto_side_cart', __( 'Close button icon (hover)', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_empty_text', '#888880', 'bunetto_side_cart', __( 'Empty cart message', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_item_border', '#1a1a1a', 'bunetto_side_cart', __( 'Line between cart items', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_item_name', '#ffffff', 'bunetto_side_cart', __( 'Item name', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_item_meta', '#888880', 'bunetto_side_cart', __( 'Item extras / meta', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_item_price', '#c9a96e', 'bunetto_side_cart', __( 'Item price', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_remove', '#444440', 'bunetto_side_cart', __( 'Remove link', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_remove_hover', '#c0392b', 'bunetto_side_cart', __( 'Remove link (hover)', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_footer_bg', '#1a1a1a', 'bunetto_side_cart', __( 'Footer block background', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_footer_border', '#222222', 'bunetto_side_cart', __( 'Footer top border', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_order_lbl', '#888880', 'bunetto_side_cart', __( '“Order Type” label', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_summary_text', '#888880', 'bunetto_side_cart', __( 'Summary labels', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_summary_val', '#f0ece4', 'bunetto_side_cart', __( 'Summary values', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_total_label', '#ffffff', 'bunetto_side_cart', __( 'Total row label', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_total_amount', '#c9a96e', 'bunetto_side_cart', __( 'Total amount', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_toggle_bg', '#242424', 'bunetto_side_cart', __( 'Pickup / delivery bar background', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_toggle_border', '#222222', 'bunetto_side_cart', __( 'Pickup / delivery bar border', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_toggle_text', '#888880', 'bunetto_side_cart', __( 'Inactive option text', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_toggle_active_bg', '#c9a96e', 'bunetto_side_cart', __( 'Active option background', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_toggle_active_text', '#0a0a0a', 'bunetto_side_cart', __( 'Active option text', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_wa_bg', '#25d366', 'bunetto_side_cart', __( 'WhatsApp button background', 'bunetto' ) );
	bunetto_add_color( $wp_customize, 'cart_wa_text', '#ffffff', 'bunetto_side_cart', __( 'WhatsApp button text', 'bunetto' ) );

	/* ── Typography (Google Fonts) ── */
	$wp_customize->add_panel(
		'bunetto_typography_panel',
		array(
			'title'       => __( 'Typography', 'bunetto' ),
			'description' => __( 'Font families load from Google Fonts. Sizes: px, rem, or clamp(...).', 'bunetto' ),
			'priority'    => 27,
		)
	);
	$wp_customize->add_section(
		'bunetto_typography',
		array(
			'title' => __( 'Fonts & sizes', 'bunetto' ),
			'panel' => 'bunetto_typography_panel',
		)
	);

	$gf_choices = bunetto_google_font_choices();
	bunetto_add_select( $wp_customize, 'typo_body_font', 'montserrat', 'bunetto_typography', __( 'Body — font', 'bunetto' ), $gf_choices, 'bunetto_sanitize_google_font_slug' );
	bunetto_add_typo_size( $wp_customize, 'typo_body_size', '16px', 'bunetto_typography', __( 'Body — size', 'bunetto' ) );
	bunetto_add_select( $wp_customize, 'typo_heading_font', 'playfair', 'bunetto_typography', __( 'Headings — font', 'bunetto' ), $gf_choices, 'bunetto_sanitize_google_font_slug' );
	bunetto_add_typo_size( $wp_customize, 'typo_heading_size', 'clamp(38px, 6vw, 68px)', 'bunetto_typography', __( 'Large headings — size (hero / sections)', 'bunetto' ) );
	bunetto_add_typo_size( $wp_customize, 'typo_heading_small_size', '24px', 'bunetto_typography', __( 'Smaller headings — size (modal, cards)', 'bunetto' ) );
	bunetto_add_select( $wp_customize, 'typo_ui_font', 'montserrat', 'bunetto_typography', __( 'UI / nav — font', 'bunetto' ), $gf_choices, 'bunetto_sanitize_google_font_slug' );
	bunetto_add_typo_size( $wp_customize, 'typo_ui_size', '10px', 'bunetto_typography', __( 'UI / nav — size', 'bunetto' ) );
	bunetto_add_select( $wp_customize, 'typo_footer_font', 'montserrat', 'bunetto_typography', __( 'Footer — font', 'bunetto' ), $gf_choices, 'bunetto_sanitize_google_font_slug' );
	bunetto_add_typo_size( $wp_customize, 'typo_footer_size', '13px', 'bunetto_typography', __( 'Footer — size', 'bunetto' ) );

	$wp_customize->add_section(
		'bunetto_colors',
		array(
			'title'    => 'Bunetto Colors (global)',
			'priority' => 36,
		)
	);

	bunetto_add_color( $wp_customize, 'color_gold', '#c9a96e', 'bunetto_colors', 'Primary / Gold' );
	bunetto_add_color( $wp_customize, 'color_gold_light', '#e8d5a3', 'bunetto_colors', 'Gold Light (Hover)' );
	bunetto_add_color( $wp_customize, 'color_dark', '#0a0a0a', 'bunetto_colors', 'Background Dark' );
	bunetto_add_color( $wp_customize, 'color_dark_2', '#111111', 'bunetto_colors', 'Background Dark 2' );
	bunetto_add_color( $wp_customize, 'color_dark_3', '#1a1a1a', 'bunetto_colors', 'Background Dark 3' );
	bunetto_add_color( $wp_customize, 'color_text', '#f0ece4', 'bunetto_colors', 'Text Color' );
	bunetto_add_color( $wp_customize, 'color_text_muted', '#888880', 'bunetto_colors', 'Text Muted' );
	bunetto_add_color( $wp_customize, 'color_btn_bg', '#c9a96e', 'bunetto_colors', 'Button Background' );
	bunetto_add_color( $wp_customize, 'color_btn_text', '#0a0a0a', 'bunetto_colors', 'Button Text' );
}
add_action( 'customize_register', 'bunetto_customizer' );

/**
 * Text / textarea / checkbox setting.
 *
 * @param WP_Customize_Manager $wp_customize Customizer.
 * @param string               $id           Setting id without bunetto_ prefix.
 * @param string               $default      Default.
 * @param string               $section      Section id.
 * @param string               $label        Control label.
 * @param string               $type         Control type.
 */
function bunetto_add_setting( $wp_customize, $id, $default, $section, $label, $type = 'text' ) {
	if ( 'textarea' === $type ) {
		$wp_customize->add_setting(
			'bunetto_' . $id,
			array(
				'default'           => $default,
				'sanitize_callback' => 'sanitize_textarea_field',
				'transport'         => 'refresh',
			)
		);
	} else {
		$wp_customize->add_setting(
			'bunetto_' . $id,
			array(
				'default'           => $default,
				'sanitize_callback' => ( 'checkbox' === $type ) ? 'bunetto_sanitize_checkbox' : 'sanitize_text_field',
				'transport'         => 'refresh',
			)
		);
	}
	$wp_customize->add_control(
		'bunetto_' . $id,
		array(
			'label'   => $label,
			'section' => $section,
			'type'    => $type,
		)
	);
}

/**
 * Image control.
 *
 * @param WP_Customize_Manager $wp_customize Customizer.
 * @param string               $id           Setting id without prefix.
 * @param string               $section      Section id.
 * @param string               $label        Label.
 */
function bunetto_add_image( $wp_customize, $id, $section, $label ) {
	$wp_customize->add_setting(
		'bunetto_' . $id,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'bunetto_' . $id,
			array(
				'label'   => $label,
				'section' => $section,
			)
		)
	);
}

/**
 * Hex color control.
 *
 * @param WP_Customize_Manager $wp_customize Customizer.
 * @param string               $id           Setting id without prefix.
 * @param string               $default      Default hex.
 * @param string               $section      Section id.
 * @param string               $label        Label.
 */
function bunetto_add_color( $wp_customize, $id, $default, $section, $label ) {
	$wp_customize->add_setting(
		'bunetto_' . $id,
		array(
			'default'           => $default,
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bunetto_' . $id,
			array(
				'label'   => $label,
				'section' => $section,
			)
		)
	);
}

/**
 * Allow empty hex (falls back to legacy rgba in CSS output).
 *
 * @param mixed $color Raw.
 */
function bunetto_sanitize_hex_color_empty( $color ) {
	if ( null === $color ) {
		return '';
	}
	$color = trim( (string) $color );
	if ( '' === $color ) {
		return '';
	}
	$san = sanitize_hex_color( $color );
	return $san ? $san : '';
}

/**
 * Opacity 0–100 for paired color controls.
 *
 * @param mixed $val Raw.
 */
function bunetto_sanitize_opacity_percent( $val ) {
	if ( null === $val || '' === $val ) {
		return null;
	}
	return max( 0, min( 100, absint( $val ) ) );
}

/**
 * WordPress color picker + opacity range (for rgba in CSS).
 *
 * @param WP_Customize_Manager $wp_customize    Customizer.
 * @param string               $id_base         Setting id without bunetto_ (adds _hex / _opacity).
 * @param string               $default_hex     Empty string uses legacy / theme default in CSS.
 * @param int                  $default_opacity 0–100.
 * @param string               $section         Section id.
 * @param string               $label           Base label.
 */
function bunetto_add_color_with_opacity( $wp_customize, $id_base, $default_hex, $default_opacity, $section, $label ) {
	$wp_customize->add_setting(
		'bunetto_' . $id_base . '_hex',
		array(
			'default'           => $default_hex,
			'sanitize_callback' => 'bunetto_sanitize_hex_color_empty',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bunetto_' . $id_base . '_hex',
			array(
				'label'   => $label . ' — ' . __( 'Color', 'bunetto' ),
				'section' => $section,
			)
		)
	);
	$wp_customize->add_setting(
		'bunetto_' . $id_base . '_opacity',
		array(
			'default'           => $default_opacity,
			'sanitize_callback' => 'bunetto_sanitize_opacity_percent',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'bunetto_' . $id_base . '_opacity',
		array(
			'label'       => $label . ' — ' . __( 'Opacity (%)', 'bunetto' ),
			'description' => __( '0 = transparent, 100 = solid.', 'bunetto' ),
			'section'     => $section,
			'type'        => 'range',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		)
	);
}

/**
 * Typography size text field (px, rem, clamp).
 *
 * @param WP_Customize_Manager $wp_customize Customizer.
 * @param string               $id           Setting id without prefix.
 * @param string               $default      Default size string.
 * @param string               $section      Section id.
 * @param string               $label        Label.
 */
function bunetto_add_typo_size( $wp_customize, $id, $default, $section, $label ) {
	$wp_customize->add_setting(
		'bunetto_' . $id,
		array(
			'default'           => $default,
			'sanitize_callback' => 'bunetto_sanitize_typography_size',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'bunetto_' . $id,
		array(
			'label'       => $label,
			'description' => __( 'Examples: 14px, 1rem, clamp(12px, 2vw, 18px)', 'bunetto' ),
			'section'     => $section,
			'type'        => 'text',
		)
	);
}

/**
 * Select control.
 *
 * @param WP_Customize_Manager $wp_customize      Customizer.
 * @param string               $id                Setting id without prefix.
 * @param mixed                $default           Default value.
 * @param string               $section           Section id.
 * @param string               $label             Label.
 * @param array                $choices           Choices map.
 * @param callable|string      $sanitize_callback Sanitize callback.
 */
function bunetto_add_select( $wp_customize, $id, $default, $section, $label, $choices, $sanitize_callback ) {
	$wp_customize->add_setting(
		'bunetto_' . $id,
		array(
			'default'           => $default,
			'sanitize_callback' => $sanitize_callback,
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'bunetto_' . $id,
		array(
			'label'   => $label,
			'section' => $section,
			'type'    => 'select',
			'choices' => $choices,
		)
	);
}

/**
 * Checkbox sanitize.
 *
 * @param mixed $val Raw.
 */
function bunetto_sanitize_checkbox( $val ) {
	return ( $val ) ? '1' : '';
}

/**
 * Theme mod helper.
 *
 * @param string $id      Setting without bunetto_ prefix.
 * @param string $default Default.
 */
function bunetto_opt( $id, $default = '' ) {
	return get_theme_mod( 'bunetto_' . $id, $default );
}
