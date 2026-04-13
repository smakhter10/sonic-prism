<?php
/**
 * Google Fonts catalog and helpers for Customizer typography.
 *
 * @package Bunetto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Font slug => label, CSS font-family stack, Google Fonts API family parameter.
 *
 * @return array<string,array{label:string,family:string,gf:string}>
 */
function bunetto_google_fonts_catalog() {
	return array(
		'montserrat'      => array(
			'label'  => 'Montserrat',
			'family' => "'Montserrat', sans-serif",
			'gf'     => 'Montserrat:wght@300;400;500;600;700',
		),
		'playfair'        => array(
			'label'  => 'Playfair Display',
			'family' => "'Playfair Display', serif",
			'gf'     => 'Playfair+Display:wght@400;700;900',
		),
		'bebas'           => array(
			'label'  => 'Bebas Neue',
			'family' => "'Bebas Neue', sans-serif",
			'gf'     => 'Bebas+Neue',
		),
		'open-sans'       => array(
			'label'  => 'Open Sans',
			'family' => "'Open Sans', sans-serif",
			'gf'     => 'Open+Sans:wght@300;400;500;600;700',
		),
		'lato'            => array(
			'label'  => 'Lato',
			'family' => "'Lato', sans-serif",
			'gf'     => 'Lato:wght@300;400;700;900',
		),
		'roboto'          => array(
			'label'  => 'Roboto',
			'family' => "'Roboto', sans-serif",
			'gf'     => 'Roboto:wght@300;400;500;700',
		),
		'source-sans'     => array(
			'label'  => 'Source Sans 3',
			'family' => "'Source Sans 3', sans-serif",
			'gf'     => 'Source+Sans+3:wght@300;400;600;700',
		),
		'raleway'         => array(
			'label'  => 'Raleway',
			'family' => "'Raleway', sans-serif",
			'gf'     => 'Raleway:wght@300;400;500;600;700',
		),
		'poppins'         => array(
			'label'  => 'Poppins',
			'family' => "'Poppins', sans-serif",
			'gf'     => 'Poppins:wght@300;400;500;600;700',
		),
		'inter'           => array(
			'label'  => 'Inter',
			'family' => "'Inter', sans-serif",
			'gf'     => 'Inter:wght@300;400;500;600;700',
		),
		'nunito'          => array(
			'label'  => 'Nunito',
			'family' => "'Nunito', sans-serif",
			'gf'     => 'Nunito:wght@300;400;600;700',
		),
		'merriweather'    => array(
			'label'  => 'Merriweather',
			'family' => "'Merriweather', serif",
			'gf'     => 'Merriweather:wght@300;400;700',
		),
		'libre-baskerville' => array(
			'label'  => 'Libre Baskerville',
			'family' => "'Libre Baskerville', serif",
			'gf'     => 'Libre+Baskerville:wght@400;700',
		),
		'oswald'          => array(
			'label'  => 'Oswald',
			'family' => "'Oswald', sans-serif",
			'gf'     => 'Oswald:wght@400;500;600;700',
		),
		'josefin-sans'    => array(
			'label'  => 'Josefin Sans',
			'family' => "'Josefin Sans', sans-serif",
			'gf'     => 'Josefin+Sans:wght@300;400;600;700',
		),
		'dm-sans'         => array(
			'label'  => 'DM Sans',
			'family' => "'DM Sans', sans-serif",
			'gf'     => 'DM+Sans:wght@400;500;700',
		),
		'work-sans'       => array(
			'label'  => 'Work Sans',
			'family' => "'Work Sans', sans-serif",
			'gf'     => 'Work+Sans:wght@300;400;500;600;700',
		),
		'crimson-pro'     => array(
			'label'  => 'Crimson Pro',
			'family' => "'Crimson Pro', serif",
			'gf'     => 'Crimson+Pro:wght@400;600;700',
		),
		'outfit'          => array(
			'label'  => 'Outfit',
			'family' => "'Outfit', sans-serif",
			'gf'     => 'Outfit:wght@300;400;500;600;700',
		),
	);
}

/**
 * Choices for Customizer select: slug => label.
 *
 * @return array<string,string>
 */
function bunetto_google_font_choices() {
	$out = array();
	foreach ( bunetto_google_fonts_catalog() as $slug => $row ) {
		$out[ $slug ] = $row['label'];
	}
	return $out;
}

/**
 * @param string $slug Font slug.
 */
function bunetto_google_font_family_css( $slug ) {
	$c = bunetto_google_fonts_catalog();
	if ( isset( $c[ $slug ] ) ) {
		return $c[ $slug ]['family'];
	}
	return $c['montserrat']['family'];
}

/**
 * Sanitize font slug against catalog.
 *
 * @param string $val Raw.
 */
function bunetto_sanitize_google_font_slug( $val ) {
	$val = sanitize_key( $val );
	return isset( bunetto_google_fonts_catalog()[ $val ] ) ? $val : 'montserrat';
}

/**
 * Build Google Fonts CSS URL for selected typography slugs (unique).
 *
 * @param array<int,string> $slugs Font slugs.
 */
function bunetto_google_fonts_css_url( $slugs ) {
	$catalog = bunetto_google_fonts_catalog();
	$parts   = array();
	foreach ( array_unique( array_filter( $slugs ) ) as $slug ) {
		if ( ! isset( $catalog[ $slug ] ) ) {
			continue;
		}
		$parts[] = $catalog[ $slug ]['gf'];
	}
	if ( empty( $parts ) ) {
		$parts[] = $catalog['montserrat']['gf'];
		$parts[] = $catalog['playfair']['gf'];
		$parts[] = $catalog['bebas']['gf'];
	}
	return 'https://fonts.googleapis.com/css2?family=' . implode( '&family=', $parts ) . '&display=swap';
}

/**
 * Sanitize font-size / clamp() string.
 *
 * @param string $val Raw.
 */
function bunetto_sanitize_typography_size( $val ) {
	$val = trim( (string) $val );
	if ( '' === $val ) {
		return '';
	}
	$val = wp_strip_all_tags( $val );
	if ( preg_match( '/^clamp\s*\(/i', $val ) && substr( $val, -1 ) === ')' ) {
		return $val;
	}
	if ( preg_match( '/^[0-9.]+(px|rem|em|%)$/i', $val ) ) {
		return $val;
	}
	return '';
}
