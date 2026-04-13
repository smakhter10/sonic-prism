<?php
/**
 * Hero slider helpers (Customizer + front page)
 *
 * @package Bunetto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Default background image URLs for hero slides (first three match original theme).
 *
 * @return array<int,string>
 */
function bunetto_default_hero_slide_images() {
	return array(
		1 => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?q=80&w=1800&auto=format&fit=crop',
		2 => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?q=80&w=1800&auto=format&fit=crop',
		3 => 'https://images.unsplash.com/photo-1615719413546-198b25453f85?q=80&w=1800&auto=format&fit=crop',
		4 => 'https://images.unsplash.com/photo-1553979459-d2229ba7433b?q=80&w=1800&auto=format&fit=crop',
		5 => 'https://images.unsplash.com/photo-1606755962773-d324e0a13086?q=80&w=1800&auto=format&fit=crop',
		6 => 'https://images.unsplash.com/photo-1630384060421-cb20d0e0649d?q=80&w=1800&auto=format&fit=crop',
		7 => 'https://images.unsplash.com/photo-1581636625402-29b2a704ef13?q=80&w=1800&auto=format&fit=crop',
		8 => 'https://images.unsplash.com/photo-1572490122747-3968b75cc699?q=80&w=1800&auto=format&fit=crop',
		9 => 'https://images.unsplash.com/photo-1621263764928-df1444c5e859?q=80&w=1800&auto=format&fit=crop',
		10 => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=1800&auto=format&fit=crop',
	);
}

/**
 * Default field values for one hero slide (used by Customizer registration).
 *
 * @param int $index Slide number 1..BUNETTO_HERO_MAX_SLIDES.
 * @return array<string,mixed>
 */
function bunetto_hero_slide_defaults( $index ) {
	$defaults = array(
		'enabled'        => '',
		'eyebrow'        => '',
		'title'          => '',
		'desc'           => '',
		'image'          => '',
		'btn1_text'      => '',
		'btn1_action'    => 'none',
		'btn1_link'      => '',
		'btn1_product'   => 0,
		'btn1_style'     => 'primary',
		'btn2_text'      => '',
		'btn2_action'    => 'none',
		'btn2_link'      => '',
		'btn2_product'   => 0,
		'btn2_style'     => 'ghost',
	);

	$imgs = bunetto_default_hero_slide_images();

	switch ( $index ) {
		case 1:
			$defaults['enabled']      = '1';
			$defaults['eyebrow']      = 'Standard of Excellence';
			$defaults['title']        = 'Classic Beef.';
			$defaults['desc']         = 'Juicy grilled beef patty, fresh lettuce, tomatoes, onions, creamy mayo & signature house sauce.';
			$defaults['btn1_text']    = 'Explore Menu';
			$defaults['btn1_action']  = 'link';
			$defaults['btn1_link']    = '#bunetto-signature';
			$defaults['btn1_style']   = 'primary';
			$defaults['btn2_text']    = 'Order Now';
			$defaults['btn2_action'] = 'open_menu_item';
			$defaults['btn2_style']   = 'ghost';
			break;
		case 2:
			$defaults['enabled']      = '1';
			$defaults['eyebrow']      = 'The Ultimate Experience';
			$defaults['title']        = 'Bunetto Megaton.';
			$defaults['desc']         = 'Double patties, double cheese, crispy onions & fully loaded signature sauces.';
			$defaults['btn1_text']    = 'Order Now';
			$defaults['btn1_action']  = 'open_menu_item';
			$defaults['btn1_style']   = 'primary';
			$defaults['btn2_text']    = 'See Menu';
			$defaults['btn2_action'] = 'link';
			$defaults['btn2_link']    = '#bunetto-signature';
			$defaults['btn2_style']   = 'ghost';
			break;
		case 3:
			$defaults['enabled']      = '1';
			$defaults['eyebrow']      = 'Smoky & Crispy';
			$defaults['title']        = 'Smoky Zing.';
			$defaults['desc']         = 'Premium zing patty, smoky BBQ sauce, cheese & crispy lettuce.';
			$defaults['btn1_text']    = 'Order Now';
			$defaults['btn1_action']  = 'open_menu_item';
			$defaults['btn1_style']   = 'primary';
			$defaults['btn2_text']    = 'See Menu';
			$defaults['btn2_action'] = 'link';
			$defaults['btn2_link']    = '#bunetto-signature';
			$defaults['btn2_style']   = 'ghost';
			break;
		default:
			$defaults['eyebrow'] = sprintf( /* translators: slide number */ __( 'Slide %d', 'bunetto' ), $index );
			$defaults['title']   = __( 'Your headline.', 'bunetto' );
			$defaults['desc']    = __( 'Add a short description in the Customizer.', 'bunetto' );
			break;
	}

	if ( isset( $imgs[ $index ] ) ) {
		$defaults['default_image_url'] = $imgs[ $index ];
	}

	return $defaults;
}

/**
 * Whether a post ID is a published menu item.
 *
 * @param int $post_id Post ID.
 */
function bunetto_is_valid_menu_item_id( $post_id ) {
	$post_id = absint( $post_id );
	if ( ! $post_id ) {
		return false;
	}
	$p = get_post( $post_id );
	return $p && 'bunetto_menu' === $p->post_type && 'publish' === $p->post_status;
}

/**
 * Choices for menu item dropdown in Customizer.
 *
 * @return array<int,string>
 */
function bunetto_get_menu_item_choices() {
	$choices = array( 0 => __( '— Select menu item —', 'bunetto' ) );
	$posts   = get_posts(
		array(
			'post_type'      => 'bunetto_menu',
			'posts_per_page' => 200,
			'orderby'        => 'title',
			'order'          => 'ASC',
			'post_status'    => 'publish',
		)
	);
	foreach ( $posts as $p ) {
		$choices[ (int) $p->ID ] = $p->post_title;
	}
	return $choices;
}

/**
 * Sanitize CSS color (hex, rgb, rgba).
 *
 * @param string $color Raw value.
 */
function bunetto_sanitize_css_color( $color ) {
	$color = trim( (string) $color );
	if ( '' === $color ) {
		return '';
	}
	if ( preg_match( '/^rgba?\(\s*\d+\s*,\s*\d+\s*,\s*\d+(\s*,\s*[\d.]+\s*)?\)$/i', $color ) ) {
		return $color;
	}
	if ( preg_match( '/^rgb\(\s*\d+\s*,\s*\d+\s*,\s*\d+\s*\)$/i', $color ) ) {
		return $color;
	}
	$hex = sanitize_hex_color( $color );
	return $hex ? $hex : '';
}

/**
 * Sanitize hero button action.
 *
 * @param string $val Raw.
 */
function bunetto_sanitize_hero_btn_action( $val ) {
	$allowed = array( 'none', 'link', 'open_menu_item' );
	return in_array( $val, $allowed, true ) ? $val : 'none';
}

/**
 * Sanitize primary|ghost.
 *
 * @param string $val Raw.
 */
function bunetto_sanitize_hero_btn_style( $val ) {
	return 'ghost' === $val ? 'ghost' : 'primary';
}

/**
 * Sanitize menu item ID for hero buttons.
 *
 * @param int|string $val Raw.
 */
function bunetto_sanitize_menu_item_id( $val ) {
	$id = absint( $val );
	if ( ! $id ) {
		return 0;
	}
	return bunetto_is_valid_menu_item_id( $id ) ? $id : 0;
}

/**
 * Render one hero CTA button.
 *
 * @param int $slide Slide index 1..n.
 * @param int $btn   1 or 2.
 */
function bunetto_hero_render_button( $slide, $btn ) {
	$d      = bunetto_hero_slide_defaults( $slide );
	$prefix = "hero{$slide}_btn{$btn}_";
	$text   = bunetto_opt( $prefix . 'text', $d[ "btn{$btn}_text" ] );
	$action = bunetto_opt( $prefix . 'action', $d[ "btn{$btn}_action" ] );
	if ( '' === $action || false === $action ) {
		$action = $d[ "btn{$btn}_action" ];
	}
	$link = bunetto_opt( $prefix . 'link', isset( $d[ "btn{$btn}_link" ] ) ? $d[ "btn{$btn}_link" ] : '' );
	$pid    = absint( bunetto_opt( $prefix . 'product', $d[ "btn{$btn}_product" ] ) );
	$style  = bunetto_opt( $prefix . 'style', $d[ "btn{$btn}_style" ] );

	if ( '' === trim( (string) $text ) || 'none' === $action ) {
		return;
	}

	$class = 'ghost' === $style ? 'btn-ghost' : 'btn-primary';

	if ( 'open_menu_item' === $action ) {
		if ( ! bunetto_is_valid_menu_item_id( $pid ) ) {
			return;
		}
		$json_attr = bunetto_item_json( $pid );
		echo '<button type="button" class="' . esc_attr( $class ) . '" onclick=\'openModal(' . $json_attr . ')\'>';
		echo esc_html( $text );
		echo '</button>';
		return;
	}

	if ( 'link' !== $action ) {
		return;
	}

	$link = trim( (string) $link );
	if ( '' === $link ) {
		return;
	}

	$hash_onclick = '';
	if ( 0 === strpos( $link, '#' ) ) {
		$anchor       = substr( $link, 1 );
		$hash_onclick = sprintf( 'onclick="ss(event,\'%s\')"', esc_js( $anchor ) );
		$href         = esc_url( home_url( '/' ) . $link );
	} else {
		$href = esc_url( $link );
	}

	printf(
		'<a href="%1$s" class="%2$s" %3$s>%4$s</a>',
		$href,
		esc_attr( $class ),
		$hash_onclick,
		esc_html( $text )
	);
}
