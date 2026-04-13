<?php
/**
 * Front Page Template
 * @package Bunetto
 */
get_header();

$hero_defaults = bunetto_default_hero_slide_images();

$enabled_slides = array();
for ( $s = 1; $s <= BUNETTO_HERO_MAX_SLIDES; $s++ ) {
    $slide_def = bunetto_hero_slide_defaults( $s );
    if ( bunetto_opt( "hero{$s}_enabled", $slide_def['enabled'] ) === '1' ) {
        $enabled_slides[] = $s;
    }
}
if ( empty( $enabled_slides ) ) {
    $enabled_slides = array( 1 );
}
$slide_count = count( $enabled_slides );
?>

  <!-- HERO SLIDER -->
  <section id="hero">
    <?php
    $slide_idx = 0;
    foreach ( $enabled_slides as $s ) :
        $hd      = bunetto_hero_slide_defaults( $s );
        $eyebrow = bunetto_opt( "hero{$s}_eyebrow", $hd['eyebrow'] );
        $title   = bunetto_opt( "hero{$s}_title", $hd['title'] );
        $desc    = bunetto_opt( "hero{$s}_desc", $hd['desc'] );
        $img     = bunetto_opt( "hero{$s}_image", '' );
        if ( ! $img ) {
            $img = isset( $hero_defaults[ $s ] ) ? $hero_defaults[ $s ] : $hero_defaults[1];
        }
    ?>
    <div class="slide<?php echo 0 === $slide_idx ? ' active' : ''; ?>">
      <img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( wp_strip_all_tags( $title ) ); ?>">
      <div class="slide-overlay"></div>
      <div class="slide-content">
        <span class="slide-eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
        <h1 class="slide-title"><?php echo esc_html( $title ); ?></h1>
        <p class="slide-desc"><?php echo esc_html( $desc ); ?></p>
        <div class="slide-cta">
          <?php bunetto_hero_render_button( $s, 1 ); ?>
          <?php bunetto_hero_render_button( $s, 2 ); ?>
        </div>
      </div>
    </div>
    <?php $slide_idx++; endforeach; ?>

    <?php if ( $slide_count > 1 ) : ?>
    <div class="slide-indicators">
      <?php for ( $i = 0; $i < $slide_count; $i++ ) : ?>
      <button class="indicator<?php echo 0 === $i ? ' active' : ''; ?>" onclick="goSlide(<?php echo $i; ?>)"></button>
      <?php endfor; ?>
    </div>
    <div class="slide-arrows">
      <button class="slide-arrow" onclick="changeSlide(-1)">&#8592;</button>
      <button class="slide-arrow" onclick="changeSlide(1)">&#8594;</button>
    </div>
    <?php endif; ?>
  </section>

  <!-- SIGNATURE -->
  <?php if ( bunetto_opt( 'sig_enabled', '1' ) ) : ?>
  <?php
  $sig_items = new WP_Query( array(
      'post_type'      => 'bunetto_menu',
      'posts_per_page' => 10,
      'meta_query'     => array(
          array( 'key' => '_bunetto_signature', 'value' => '1' ),
          array( 'key' => '_bunetto_available', 'value' => '1' ),
      ),
  ) );
  ?>
  <section id="bunetto-signature" class="section-wrap">
    <div class="container">
      <div class="section-header">
        <div class="section-eyebrow"><?php echo esc_html( bunetto_opt( 'sig_eyebrow', 'Top Picks' ) ); ?></div>
        <h2 class="section-title"><?php echo esc_html( bunetto_opt( 'sig_title', 'BUNETTO SIGNATURE' ) ); ?></h2>
      </div>
      <div class="slider-wrap">
        <div class="slider-track" id="sig-track">
          <?php if ( $sig_items->have_posts() ) : while ( $sig_items->have_posts() ) : $sig_items->the_post();
            $item_data = bunetto_item_json( get_the_ID() );
            $price     = get_post_meta( get_the_ID(), '_bunetto_price', true );
            $img       = bunetto_get_item_image( get_the_ID(), 'large' );
          ?>
          <div class="sig-card" onclick='openModal(<?php echo $item_data; ?>)'>
            <img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
            <div class="sig-overlay"></div>
            <div class="sig-info">
              <div class="sig-name"><?php echo esc_html( get_the_title() ); ?></div>
              <div class="sig-desc"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 12 ) ); ?></div>
              <div class="sig-footer"><span class="sig-price">Rs. <?php echo esc_html( number_format( (int) $price ) ); ?></span><button class="sig-add" onclick='event.stopPropagation();openModal(<?php echo $item_data; ?>)'>Add to Order</button></div>
            </div>
          </div>
          <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
      </div>
      <div class="slider-nav">
        <button class="s-arrow" onclick="ms('sig',-1)">&#8592;</button>
        <div class="s-dots" id="sig-dots"></div>
        <button class="s-arrow" onclick="ms('sig',1)">&#8594;</button>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- CATEGORY NAV & MENU SECTIONS -->
  <?php if ( bunetto_opt( 'menu_enabled', '1' ) ) : ?>
  <?php
  $categories = get_terms( array(
      'taxonomy'   => 'menu_category',
      'hide_empty' => true,
      'meta_key'   => 'category_order',
      'orderby'    => 'meta_value_num',
      'order'      => 'ASC',
  ) );
  ?>
  <div id="cat-nav">
    <div class="cat-nav-inner">
      <?php $first = true; foreach ( $categories as $cat ) : ?>
      <a class="cat-tab<?php echo $first ? ' active' : ''; ?>" href="#menu-<?php echo esc_attr( $cat->slug ); ?>" onclick="ss(event,'menu-<?php echo esc_attr( $cat->slug ); ?>');setTab(this)"><?php echo esc_html( $cat->name ); ?></a>
      <?php $first = false; endforeach; ?>
      <a class="cat-tab" href="#menu-all" onclick="ss(event,'menu-all');setTab(this)">All Items</a>
    </div>
  </div>

  <!-- MENU SECTIONS BY CATEGORY -->
  <?php
  $cat_slugs = array();
  foreach ( $categories as $cat ) :
      $cat_slugs[] = $cat->slug;
      $cat_items = new WP_Query( array(
          'post_type'      => 'bunetto_menu',
          'posts_per_page' => 20,
          'tax_query'      => array(
              array( 'taxonomy' => 'menu_category', 'field' => 'term_id', 'terms' => $cat->term_id ),
          ),
          'meta_query'     => array(
              array( 'key' => '_bunetto_available', 'value' => '1' ),
          ),
      ) );
  ?>
  <section class="menu-section" id="menu-<?php echo esc_attr( $cat->slug ); ?>">
    <div class="container">
      <div class="menu-section-title"><?php echo esc_html( $cat->name ); ?></div>
      <div class="slider-wrap"><div class="slider-track" id="<?php echo esc_attr( $cat->slug ); ?>-track">
        <?php if ( $cat_items->have_posts() ) : while ( $cat_items->have_posts() ) : $cat_items->the_post();
          $item_data = bunetto_item_json( get_the_ID() );
          $price     = get_post_meta( get_the_ID(), '_bunetto_price', true );
          $img       = bunetto_get_item_image( get_the_ID(), 'medium' );
        ?>
        <div class="menu-card" onclick='openModal(<?php echo $item_data; ?>)'><img class="menu-card-img" src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>"><div class="menu-card-body"><div class="menu-card-name"><?php echo esc_html( get_the_title() ); ?></div><div class="menu-card-desc"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 10 ) ); ?></div><div class="menu-card-footer"><span class="menu-card-price">Rs. <?php echo esc_html( number_format( (int) $price ) ); ?></span><button class="add-btn" onclick='event.stopPropagation();openModal(<?php echo $item_data; ?>)'>+</button></div></div></div>
        <?php endwhile; wp_reset_postdata(); endif; ?>
      </div></div>
      <div class="slider-nav"><button class="s-arrow" onclick="ms('<?php echo esc_attr( $cat->slug ); ?>',-1)">&#8592;</button><div class="s-dots" id="<?php echo esc_attr( $cat->slug ); ?>-dots"></div><button class="s-arrow" onclick="ms('<?php echo esc_attr( $cat->slug ); ?>',1)">&#8594;</button></div>
    </div>
  </section>
  <?php endforeach; ?>

  <!-- ALL ITEMS -->
  <?php
  $all_items = new WP_Query( array(
      'post_type'      => 'bunetto_menu',
      'posts_per_page' => 50,
      'meta_query'     => array(
          array( 'key' => '_bunetto_available', 'value' => '1' ),
      ),
  ) );
  ?>
  <section class="menu-section" id="menu-all">
    <div class="container">
      <div class="menu-section-title"><?php echo esc_html( bunetto_opt( 'menu_all_title', 'Complete Collection' ) ); ?></div>
      <div class="slider-wrap"><div class="slider-track" id="all-track">
        <?php if ( $all_items->have_posts() ) : while ( $all_items->have_posts() ) : $all_items->the_post();
          $item_data = bunetto_item_json( get_the_ID() );
          $price     = get_post_meta( get_the_ID(), '_bunetto_price', true );
          $img       = bunetto_get_item_image( get_the_ID(), 'medium' );
        ?>
        <div class="menu-card" onclick='openModal(<?php echo $item_data; ?>)'><img class="menu-card-img" src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>"><div class="menu-card-body"><div class="menu-card-name"><?php echo esc_html( get_the_title() ); ?></div><div class="menu-card-desc"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 8 ) ); ?></div><div class="menu-card-footer"><span class="menu-card-price">Rs. <?php echo esc_html( number_format( (int) $price ) ); ?></span><button class="add-btn" onclick='event.stopPropagation();openModal(<?php echo $item_data; ?>)'>+</button></div></div></div>
        <?php endwhile; wp_reset_postdata(); endif; ?>
      </div></div>
      <div class="slider-nav"><button class="s-arrow" onclick="ms('all',-1)">&#8592;</button><div class="s-dots" id="all-dots"></div><button class="s-arrow" onclick="ms('all',1)">&#8594;</button></div>
    </div>
  </section>
  <?php endif; ?>

  <!-- Pass category slugs to JS for slider init + scroll tracking -->
  <script>
  var bunettoCatSlugs = <?php echo wp_json_encode( isset( $cat_slugs ) ? $cat_slugs : array() ); ?>;
  </script>

<?php get_footer(); ?>
