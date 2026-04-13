<?php
/**
 * Bunetto Dynamic CSS from Customizer
 *
 * @package Bunetto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Typography size theme mod with fallback.
 *
 * @param string $id       Setting id without bunetto_ prefix.
 * @param string $fallback Default.
 */
function bunetto_typo_size_mod( $id, $fallback ) {
	$v = get_theme_mod( 'bunetto_' . $id, $fallback );
	$s = bunetto_sanitize_typography_size( $v );
	return '' !== $s ? $s : $fallback;
}

/**
 * Output inline CSS for Customizer values.
 */
function bunetto_customizer_css() {
	$gold       = get_theme_mod( 'bunetto_color_gold', '#c9a96e' );
	$gold_light = get_theme_mod( 'bunetto_color_gold_light', '#e8d5a3' );
	$dark       = get_theme_mod( 'bunetto_color_dark', '#0a0a0a' );
	$dark2      = get_theme_mod( 'bunetto_color_dark_2', '#111111' );
	$dark3      = get_theme_mod( 'bunetto_color_dark_3', '#1a1a1a' );
	$text       = get_theme_mod( 'bunetto_color_text', '#f0ece4' );
	$text_muted = get_theme_mod( 'bunetto_color_text_muted', '#888880' );
	$btn_bg     = get_theme_mod( 'bunetto_color_btn_bg', '#c9a96e' );
	$btn_text   = get_theme_mod( 'bunetto_color_btn_text', '#0a0a0a' );

	$nav_bg          = bunetto_rgba_from_picker_or_legacy( 'nav_bg', 'nav_bg', 'rgba(10,10,10,0.93)' );
	$nav_border      = bunetto_customizer_color_or( 'nav_border', '#1e1e1e' );
	$nav_logo        = bunetto_customizer_color_or( 'nav_logo', '#ffffff' );
	$nav_logo_accent = bunetto_customizer_color_or( 'nav_logo_accent', '#c9a96e' );
	$nav_link        = bunetto_customizer_color_or( 'nav_link', '#888880' );
	$nav_link_hover  = bunetto_customizer_color_or( 'nav_link_hover', '#c9a96e' );
	$nav_cart_bg     = bunetto_customizer_color_or( 'nav_cart_bg', '#1a1a1a' );
	$nav_cart_border = bunetto_customizer_color_or( 'nav_cart_border', '#2a2a2a' );
	$nav_cart_text   = bunetto_customizer_color_or( 'nav_cart_text', '#f0ece4' );
	$nav_badge_bg    = bunetto_customizer_color_or( 'nav_badge_bg', '#c9a96e' );
	$nav_badge_text  = bunetto_customizer_color_or( 'nav_badge_text', '#0a0a0a' );
	$nav_cart_hov_bg = bunetto_customizer_color_or( 'nav_cart_hover_bg', '#1a1a1a' );
	$nav_cart_hov_bd = bunetto_customizer_color_or( 'nav_cart_hover_border', '#c9a96e' );
	$nav_cart_hov_tx = bunetto_customizer_color_or( 'nav_cart_hover_text', '#c9a96e' );
	$header_logo_mx  = max( 16, min( 200, absint( get_theme_mod( 'bunetto_header_logo_img_max_h', 40 ) ) ) );
	$footer_logo_mx  = max( 20, min( 240, absint( get_theme_mod( 'bunetto_footer_logo_img_max_h', 48 ) ) ) );

	$footer_bg            = bunetto_customizer_color_or( 'footer_bg', '#1a1a1a' );
	$footer_border        = bunetto_customizer_color_or( 'footer_border', '#1a1a1a' );
	$footer_logo          = bunetto_customizer_color_or( 'footer_logo', '#ffffff' );
	$footer_logo_accent   = bunetto_customizer_color_or( 'footer_logo_accent', '#c9a96e' );
	$footer_text          = bunetto_customizer_color_or( 'footer_text', '#888880' );
	$footer_heading       = bunetto_customizer_color_or( 'footer_heading', '#c9a96e' );
	$footer_link          = bunetto_customizer_color_or( 'footer_link', '#888880' );
	$footer_link_hover    = bunetto_customizer_color_or( 'footer_link_hover', '#c9a96e' );
	$footer_bottom_text   = bunetto_customizer_color_or( 'footer_bottom_text', '#444440' );
	$footer_bottom_border = bunetto_customizer_color_or( 'footer_bottom_border', '#1a1a1a' );

	$ovl_l = bunetto_rgba_from_picker_or_legacy( 'hero_overlay_left', 'hero_overlay_left', 'rgba(0,0,0,0.88)' );
	$ovl_m = bunetto_rgba_from_picker_or_legacy( 'hero_overlay_mid', 'hero_overlay_mid', 'rgba(0,0,0,0.38)' );
	$ovl_r = bunetto_rgba_from_picker_or_legacy( 'hero_overlay_right', 'hero_overlay_right', 'rgba(0,0,0,0.04)' );

	$hero_h            = get_theme_mod( 'bunetto_hero_height', '92vh' );
	$hero_eyebrow      = get_theme_mod( 'bunetto_hero_eyebrow_color', '#c9a96e' );
	$hero_title        = get_theme_mod( 'bunetto_hero_text_color', '#ffffff' );
	$hero_desc         = bunetto_rgba_from_picker_or_legacy( 'hero_desc', 'hero_desc_color', 'rgba(240,236,228,0.72)' );
	$hero_btn_pri_bg   = get_theme_mod( 'bunetto_hero_btn_primary_bg', '#c9a96e' );
	$hero_btn_pri_text = get_theme_mod( 'bunetto_hero_btn_primary_text', '#0a0a0a' );
	$hero_btn_sec_bg   = bunetto_rgba_from_picker_or_legacy( 'hero_btn_secondary_bg', 'hero_btn_secondary_bg', 'rgba(255,255,255,0.08)' );
	$hero_btn_sec_text = get_theme_mod( 'bunetto_hero_btn_secondary_text', '#ffffff' );
	$hero_btn_sec_bd   = bunetto_rgba_from_picker_or_legacy( 'hero_btn_secondary_border', 'hero_btn_secondary_border', 'rgba(255,255,255,0.2)' );

	$sig_pt   = get_theme_mod( 'bunetto_sig_padding_top', '90' );
	$sig_pb   = get_theme_mod( 'bunetto_sig_padding_bottom', '90' );
	$menu_pad = get_theme_mod( 'bunetto_menu_padding', '72' );

	$cart_ov = bunetto_rgba_from_picker_or_legacy( 'cart_backdrop', 'cart_backdrop', 'rgba(0,0,0,0.72)' );
	$c_in_bg = bunetto_customizer_color_or( 'cart_inner_bg', '#111111' );
	$c_in_bd = bunetto_customizer_color_or( 'cart_inner_border', '#222222' );
	$c_hd    = bunetto_customizer_color_or( 'cart_header_title', '#ffffff' );
	$c_hd_br = bunetto_customizer_color_or( 'cart_header_border', '#222222' );
	$c_cl_bg = bunetto_customizer_color_or( 'cart_close_bg', '#242424' );
	$c_cl_fg = bunetto_customizer_color_or( 'cart_close_color', '#888880' );
	$c_cl_hv = bunetto_customizer_color_or( 'cart_close_hover', '#ffffff' );
	$c_em    = bunetto_customizer_color_or( 'cart_empty_text', '#888880' );
	$c_it_br = bunetto_customizer_color_or( 'cart_item_border', '#1a1a1a' );
	$c_it_nm = bunetto_customizer_color_or( 'cart_item_name', '#ffffff' );
	$c_it_mt = bunetto_customizer_color_or( 'cart_item_meta', '#888880' );
	$c_it_pr = bunetto_customizer_color_or( 'cart_item_price', '#c9a96e' );
	$c_rm    = bunetto_customizer_color_or( 'cart_remove', '#444440' );
	$c_rm_h  = bunetto_customizer_color_or( 'cart_remove_hover', '#c0392b' );
	$c_ft_bg = bunetto_customizer_color_or( 'cart_footer_bg', '#1a1a1a' );
	$c_ft_br = bunetto_customizer_color_or( 'cart_footer_border', '#222222' );
	$c_olbl  = bunetto_customizer_color_or( 'cart_order_lbl', '#888880' );
	$c_sum   = bunetto_customizer_color_or( 'cart_summary_text', '#888880' );
	$c_sval  = bunetto_customizer_color_or( 'cart_summary_val', '#f0ece4' );
	$c_totl  = bunetto_customizer_color_or( 'cart_total_label', '#ffffff' );
	$c_tota  = bunetto_customizer_color_or( 'cart_total_amount', '#c9a96e' );
	$c_tg_bg = bunetto_customizer_color_or( 'cart_toggle_bg', '#242424' );
	$c_tg_bd = bunetto_customizer_color_or( 'cart_toggle_border', '#222222' );
	$c_tg_tx = bunetto_customizer_color_or( 'cart_toggle_text', '#888880' );
	$c_tg_ab = bunetto_customizer_color_or( 'cart_toggle_active_bg', '#c9a96e' );
	$c_tg_at = bunetto_customizer_color_or( 'cart_toggle_active_text', '#0a0a0a' );
	$c_wa_bg = bunetto_customizer_color_or( 'cart_wa_bg', '#25d366' );
	$c_wa_tx = bunetto_customizer_color_or( 'cart_wa_text', '#ffffff' );

	$ff_body = bunetto_google_font_family_css( get_theme_mod( 'bunetto_typo_body_font', 'montserrat' ) );
	$ff_head = bunetto_google_font_family_css( get_theme_mod( 'bunetto_typo_heading_font', 'playfair' ) );
	$ff_ui   = bunetto_google_font_family_css( get_theme_mod( 'bunetto_typo_ui_font', 'montserrat' ) );
	$ff_foot = bunetto_google_font_family_css( get_theme_mod( 'bunetto_typo_footer_font', 'montserrat' ) );
	$fs_body = bunetto_typo_size_mod( 'typo_body_size', '16px' );
	$fs_head = bunetto_typo_size_mod( 'typo_heading_size', 'clamp(38px, 6vw, 68px)' );
	$fs_hsm  = bunetto_typo_size_mod( 'typo_heading_small_size', '24px' );
	$fs_ui_sz = bunetto_typo_size_mod( 'typo_ui_size', '10px' );
	$fs_foot  = bunetto_typo_size_mod( 'typo_footer_size', '13px' );

	$css = ':root {';
	$css .= '--gold:' . esc_attr( $gold ) . ';';
	$css .= '--gold-light:' . esc_attr( $gold_light ) . ';';
	$css .= '--dark:' . esc_attr( $dark ) . ';';
	$css .= '--dark-2:' . esc_attr( $dark2 ) . ';';
	$css .= '--dark-3:' . esc_attr( $dark3 ) . ';';
	$css .= '--text:' . esc_attr( $text ) . ';';
	$css .= '--text-muted:' . esc_attr( $text_muted ) . ';';
	$css .= '--nav-bg:' . esc_attr( $nav_bg ) . ';';
	$css .= '--nav-border:' . esc_attr( $nav_border ) . ';';
	$css .= '--nav-logo:' . esc_attr( $nav_logo ) . ';';
	$css .= '--nav-logo-accent:' . esc_attr( $nav_logo_accent ) . ';';
	$css .= '--nav-link:' . esc_attr( $nav_link ) . ';';
	$css .= '--nav-link-hover:' . esc_attr( $nav_link_hover ) . ';';
	$css .= '--nav-cart-bg:' . esc_attr( $nav_cart_bg ) . ';';
	$css .= '--nav-cart-border:' . esc_attr( $nav_cart_border ) . ';';
	$css .= '--nav-cart-text:' . esc_attr( $nav_cart_text ) . ';';
	$css .= '--nav-badge-bg:' . esc_attr( $nav_badge_bg ) . ';';
	$css .= '--nav-badge-text:' . esc_attr( $nav_badge_text ) . ';';
	$css .= '--footer-bg:' . esc_attr( $footer_bg ) . ';';
	$css .= '--footer-border:' . esc_attr( $footer_border ) . ';';
	$css .= '--footer-logo:' . esc_attr( $footer_logo ) . ';';
	$css .= '--footer-logo-accent:' . esc_attr( $footer_logo_accent ) . ';';
	$css .= '--footer-text:' . esc_attr( $footer_text ) . ';';
	$css .= '--footer-heading:' . esc_attr( $footer_heading ) . ';';
	$css .= '--footer-link:' . esc_attr( $footer_link ) . ';';
	$css .= '--footer-link-hover:' . esc_attr( $footer_link_hover ) . ';';
	$css .= '--footer-bottom-text:' . esc_attr( $footer_bottom_text ) . ';';
	$css .= '--footer-bottom-border:' . esc_attr( $footer_bottom_border ) . ';';
	$css .= '--hero-eyebrow-custom:' . esc_attr( $hero_eyebrow ) . ';';
	$css .= '--hero-title-custom:' . esc_attr( $hero_title ) . ';';
	$css .= '--hero-desc-custom:' . esc_attr( $hero_desc ) . ';';
	$css .= '--hero-btn-pri-bg:' . esc_attr( $hero_btn_pri_bg ) . ';';
	$css .= '--hero-btn-pri-text:' . esc_attr( $hero_btn_pri_text ) . ';';
	$css .= '--hero-btn-sec-bg:' . esc_attr( $hero_btn_sec_bg ) . ';';
	$css .= '--hero-btn-sec-text:' . esc_attr( $hero_btn_sec_text ) . ';';
	$css .= '--hero-btn-sec-border:' . esc_attr( $hero_btn_sec_bd ) . ';';
	$css .= '--nav-cart-hover-bg:' . esc_attr( $nav_cart_hov_bg ) . ';';
	$css .= '--nav-cart-hover-border:' . esc_attr( $nav_cart_hov_bd ) . ';';
	$css .= '--nav-cart-hover-text:' . esc_attr( $nav_cart_hov_tx ) . ';';
	$css .= '--header-logo-img-max:' . (int) $header_logo_mx . 'px;';
	$css .= '--footer-logo-img-max:' . (int) $footer_logo_mx . 'px;';
	$css .= '--font-body:' . $ff_body . ';';
	$css .= '--font-heading:' . $ff_head . ';';
	$css .= '--font-ui:' . $ff_ui . ';';
	$css .= '--font-footer:' . $ff_foot . ';';
	$css .= '--fs-body:' . $fs_body . ';';
	$css .= '--fs-heading:' . $fs_head . ';';
	$css .= '--fs-heading-sm:' . $fs_hsm . ';';
	$css .= '--fs-ui:' . $fs_ui_sz . ';';
	$css .= '--fs-footer:' . $fs_foot . ';';
	$css .= '}';

	$css .= '#navbar{background:' . esc_attr( $nav_bg ) . ';border-bottom-color:' . esc_attr( $nav_border ) . ';}';
	$css .= '#navbar .nav-logo{color:' . esc_attr( $nav_logo ) . ';}';
	$css .= '#navbar .nav-logo span{color:' . esc_attr( $nav_logo_accent ) . ';}';
	$css .= '#navbar .nav-links a{color:' . esc_attr( $nav_link ) . ';}';
	$css .= '#navbar .nav-links a:hover{color:' . esc_attr( $nav_link_hover ) . ';}';
	$css .= '#navbar .nav-cart{background:' . esc_attr( $nav_cart_bg ) . ';border-color:' . esc_attr( $nav_cart_border ) . ';color:' . esc_attr( $nav_cart_text ) . ';}';
	$css .= '#navbar .nav-cart:hover{background:' . esc_attr( $nav_cart_hov_bg ) . ';border-color:' . esc_attr( $nav_cart_hov_bd ) . ';color:' . esc_attr( $nav_cart_hov_tx ) . ';}';
	$css .= '#navbar .cart-badge{background:' . esc_attr( $nav_badge_bg ) . ';color:' . esc_attr( $nav_badge_text ) . ';}';
	$css .= '#navbar .nav-logo--image img{max-height:var(--header-logo-img-max);width:auto;height:auto;display:block;}';

	$css .= '#hero{height:' . esc_attr( $hero_h ) . ';min-height:560px;}';
	$css .= '#hero .slide-overlay{background:linear-gradient(to right,' . esc_attr( $ovl_l ) . ' 0%,' . esc_attr( $ovl_m ) . ' 55%,' . esc_attr( $ovl_r ) . ' 100%);}';
	$css .= '#hero .slide-eyebrow{color:' . esc_attr( $hero_eyebrow ) . ';}';
	$css .= '#hero .slide-title{color:' . esc_attr( $hero_title ) . ';}';
	$css .= '#hero .slide-desc{color:' . esc_attr( $hero_desc ) . ';}';
	$css .= '#hero .slide-cta .btn-primary{background:' . esc_attr( $hero_btn_pri_bg ) . ';color:' . esc_attr( $hero_btn_pri_text ) . ';box-shadow:0 4px 20px rgba(0,0,0,0.25);}';
	$css .= '#hero .slide-cta .btn-primary:hover{filter:brightness(1.08);}';
	$css .= '#hero .slide-cta .btn-ghost{background:' . esc_attr( $hero_btn_sec_bg ) . ';color:' . esc_attr( $hero_btn_sec_text ) . ';border-color:' . esc_attr( $hero_btn_sec_bd ) . ';}';
	$css .= '#hero .slide-cta .btn-ghost:hover{border-color:' . esc_attr( $hero_btn_pri_bg ) . ';color:' . esc_attr( $hero_btn_pri_bg ) . ';background:rgba(201,169,110,0.12);}';

	$css .= 'footer{background:' . esc_attr( $footer_bg ) . ';border-top-color:' . esc_attr( $footer_border ) . ';}';
	$css .= 'footer .footer-logo{color:' . esc_attr( $footer_logo ) . ';}';
	$css .= 'footer .footer-logo span{color:' . esc_attr( $footer_logo_accent ) . ';}';
	$css .= 'footer .footer-brand p,footer .footer-col p{color:' . esc_attr( $footer_text ) . ';}';
	$css .= 'footer .footer-col h4{color:' . esc_attr( $footer_heading ) . ';}';
	$css .= 'footer .footer-col a{color:' . esc_attr( $footer_link ) . ';}';
	$css .= 'footer .footer-col a:hover{color:' . esc_attr( $footer_link_hover ) . ';}';
	$css .= 'footer .footer-bottom{border-top-color:' . esc_attr( $footer_bottom_border ) . ';}';
	$css .= 'footer .footer-bottom p{color:' . esc_attr( $footer_bottom_text ) . ';}';
	$css .= 'footer .footer-logo--image img{max-height:var(--footer-logo-img-max);width:auto;height:auto;display:block;}';

	$css .= 'body{font-family:var(--font-body);font-size:var(--fs-body);}';
	$css .= '.slide-title,.section-title,.menu-section-title{font-family:var(--font-heading);font-size:var(--fs-heading);line-height:1;}';
	$css .= '.modal-title,.menu-card-name,.sig-name,.cart-header h3{font-family:var(--font-heading);font-size:var(--fs-heading-sm);}';
	$css .= '#navbar .nav-links a,#navbar .nav-cart,.cat-tab,.slide-eyebrow,.extras-title,.order-type-lbl,.qty-section-lbl{font-family:var(--font-ui);font-size:var(--fs-ui);}';
	$css .= '#navbar .nav-cart{font-size:11px;}';
	$css .= '.cat-tab{font-size:var(--fs-ui);}';
	$css .= 'footer,.footer-brand p,.footer-col p,.footer-col a,.footer-bottom p{font-family:var(--font-footer);font-size:var(--fs-footer);}';
	$css .= 'footer .footer-col h4{font-size:var(--fs-ui);}';

	$css .= '#cart-panel{background:' . esc_attr( $cart_ov ) . ';}';
	$css .= '#cart-inner{background:' . esc_attr( $c_in_bg ) . ';border-left-color:' . esc_attr( $c_in_bd ) . ';}';
	$css .= '.cart-header{border-bottom-color:' . esc_attr( $c_hd_br ) . ';}';
	$css .= '.cart-header h3{color:' . esc_attr( $c_hd ) . ';}';
	$css .= '.cart-close{background:' . esc_attr( $c_cl_bg ) . ';color:' . esc_attr( $c_cl_fg ) . ';border-color:' . esc_attr( $c_in_bd ) . ';}';
	$css .= '.cart-close:hover{color:' . esc_attr( $c_cl_hv ) . ';border-color:#444;}';
	$css .= '.cart-empty{color:' . esc_attr( $c_em ) . ';}';
	$css .= '.cart-item{border-bottom:1px solid ' . esc_attr( $c_it_br ) . ';}';
	$css .= '.cart-item-name{color:' . esc_attr( $c_it_nm ) . ';}';
	$css .= '.cart-item-extras{color:' . esc_attr( $c_it_mt ) . ';}';
	$css .= '.cart-item-price{color:' . esc_attr( $c_it_pr ) . ';}';
	$css .= '.cart-item-remove{color:' . esc_attr( $c_rm ) . ';}';
	$css .= '.cart-item-remove:hover{color:' . esc_attr( $c_rm_h ) . ';}';
	$css .= '.cart-footer{background:' . esc_attr( $c_ft_bg ) . ';border-top-color:' . esc_attr( $c_ft_br ) . ';}';
	$css .= '.order-type-lbl{color:' . esc_attr( $c_olbl ) . ';}';
	$css .= '.summary-row{color:' . esc_attr( $c_sum ) . ';}';
	$css .= '.summary-row .val{color:' . esc_attr( $c_sval ) . ';}';
	$css .= '.summary-row.total span:first-child{color:' . esc_attr( $c_totl ) . ';}';
	$css .= '.summary-row.total .val{color:' . esc_attr( $c_tota ) . ';}';
	$css .= '.order-toggle{background:' . esc_attr( $c_tg_bg ) . ';border-color:' . esc_attr( $c_tg_bd ) . ';}';
	$css .= '.order-opt{color:' . esc_attr( $c_tg_tx ) . ';}';
	$css .= '.order-opt.active{background:' . esc_attr( $c_tg_ab ) . ';color:' . esc_attr( $c_tg_at ) . ';}';
	$css .= '.whatsapp-btn{background:' . esc_attr( $c_wa_bg ) . ';color:' . esc_attr( $c_wa_tx ) . ';}';

	if ( $btn_bg !== '#c9a96e' || $btn_text !== '#0a0a0a' ) {
		$css .= '.sig-add,.add-btn,.sneak-btn,.add-to-order-btn{';
		$css .= 'background:' . esc_attr( $btn_bg ) . ';color:' . esc_attr( $btn_text ) . ';}';
	}

	if ( $sig_pt !== '90' || $sig_pb !== '90' ) {
		$css .= '#bunetto-signature.section-wrap{padding:' . absint( $sig_pt ) . 'px 0 ' . absint( $sig_pb ) . 'px;}';
	}

	if ( $menu_pad !== '72' ) {
		$css .= '.menu-section{padding:' . absint( $menu_pad ) . 'px 0;}';
	}

	echo '<style id="bunetto-customizer-css">' . $css . '</style>';
}

/**
 * Build rgba() from hex + 0–100 opacity.
 *
 * @param string $hex             Hex color.
 * @param int    $opacity_0_100 Opacity percent.
 */
function bunetto_hex_and_opacity_to_rgba( $hex, $opacity_0_100 ) {
	$hex = sanitize_hex_color( $hex );
	if ( ! $hex ) {
		return '';
	}
	$hex = ltrim( $hex, '#' );
	if ( 3 === strlen( $hex ) ) {
		$r = hexdec( str_repeat( substr( $hex, 0, 1 ), 2 ) );
		$g = hexdec( str_repeat( substr( $hex, 1, 1 ), 2 ) );
		$b = hexdec( str_repeat( substr( $hex, 2, 1 ), 2 ) );
	} else {
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );
	}
	$a = max( 0, min( 100, (int) $opacity_0_100 ) ) / 100;
	return sprintf( 'rgba(%d,%d,%d,%.3f)', $r, $g, $b, $a );
}

/**
 * Use color picker + opacity if hex is set; else legacy text rgba theme_mod; else default.
 *
 * @param string $id_base        Setting base (bunetto_{base}_hex).
 * @param string $legacy_mod_id  Legacy mod without bunetto_ prefix.
 * @param string $default_rgba   Default CSS color.
 */
function bunetto_rgba_from_picker_or_legacy( $id_base, $legacy_mod_id, $default_rgba ) {
	$hex = get_theme_mod( 'bunetto_' . $id_base . '_hex', '' );
	$hex = is_string( $hex ) ? trim( $hex ) : '';
	$op  = get_theme_mod( 'bunetto_' . $id_base . '_opacity', null );
	if ( '' !== $hex ) {
		$c = sanitize_hex_color( $hex );
		if ( $c ) {
			$pct = ( null !== $op && '' !== (string) $op ) ? max( 0, min( 100, (int) $op ) ) : 100;
			return bunetto_hex_and_opacity_to_rgba( $c, $pct );
		}
	}
	return bunetto_customizer_color_or( $legacy_mod_id, $default_rgba );
}

/**
 * Return theme mod color or fallback if empty / invalid.
 *
 * @param string $mod_id   Without bunetto_ prefix.
 * @param string $fallback Fallback CSS color.
 */
function bunetto_customizer_color_or( $mod_id, $fallback ) {
	$v = get_theme_mod( 'bunetto_' . $mod_id, $fallback );
	$v = is_string( $v ) ? trim( $v ) : '';
	if ( '' === $v ) {
		return $fallback;
	}
	$s = bunetto_sanitize_css_color( $v );
	return '' !== $s ? $s : $fallback;
}

add_action( 'wp_head', 'bunetto_customizer_css', 99 );
