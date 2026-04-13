<?php
/**
 * Bunetto Theme Functions
 *
 * @package Bunetto
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'BUNETTO_VERSION', '1.0.0' );
if ( ! defined( 'BUNETTO_HERO_MAX_SLIDES' ) ) {
	define( 'BUNETTO_HERO_MAX_SLIDES', 10 );
}

/* ═══════════════════════════════════════
   THEME SETUP
   ═══════════════════════════════════════ */
function bunetto_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    set_post_thumbnail_size( 800, 600, true );
    add_image_size( 'bunetto-card', 500, 375, true );
    add_image_size( 'bunetto-sig', 700, 933, true );

    // Gutenberg support
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );
    add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'bunetto_setup' );

/* ═══════════════════════════════════════
   ENQUEUE STYLES & SCRIPTS
   ═══════════════════════════════════════ */
function bunetto_enqueue() {
    $font_slugs = array(
        get_theme_mod( 'bunetto_typo_body_font', 'montserrat' ),
        get_theme_mod( 'bunetto_typo_heading_font', 'playfair' ),
        get_theme_mod( 'bunetto_typo_ui_font', 'montserrat' ),
        get_theme_mod( 'bunetto_typo_footer_font', 'montserrat' ),
    );
    wp_enqueue_style( 'bunetto-fonts', bunetto_google_fonts_css_url( $font_slugs ), array(), null );
    wp_enqueue_style( 'bunetto-main', get_template_directory_uri() . '/assets/css/bunetto.css', array(), BUNETTO_VERSION );
    wp_enqueue_script( 'bunetto-main', get_template_directory_uri() . '/assets/js/bunetto.js', array(), BUNETTO_VERSION, true );

    $wa = get_option( 'bunetto_whatsapp_number', '923012343423' );
    wp_localize_script( 'bunetto-main', 'bunettoData', array(
        'whatsappNumber' => esc_js( $wa ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'bunetto_enqueue' );

/* ═══════════════════════════════════════
   CUSTOM POST TYPE: MENU ITEM
   ═══════════════════════════════════════ */
function bunetto_register_cpt() {
    register_post_type( 'bunetto_menu', array(
        'labels' => array(
            'name'               => 'Menu Items',
            'singular_name'      => 'Menu Item',
            'add_new'            => 'Add New Item',
            'add_new_item'       => 'Add New Menu Item',
            'edit_item'          => 'Edit Menu Item',
            'new_item'           => 'New Menu Item',
            'view_item'          => 'View Menu Item',
            'search_items'       => 'Search Menu Items',
            'not_found'          => 'No menu items found',
            'not_found_in_trash' => 'No menu items found in trash',
            'menu_name'          => 'Menu Manager',
        ),
        'public'       => true,
        'has_archive'  => false,
        'menu_position'=> 5,
        'menu_icon'    => 'dashicons-food',
        'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'bunetto_register_cpt' );

/* ═══════════════════════════════════════
   CUSTOM TAXONOMY: MENU CATEGORY
   ═══════════════════════════════════════ */
function bunetto_register_taxonomy() {
    register_taxonomy( 'menu_category', 'bunetto_menu', array(
        'labels' => array(
            'name'          => 'Menu Categories',
            'singular_name' => 'Category',
            'search_items'  => 'Search Categories',
            'all_items'     => 'All Categories',
            'edit_item'     => 'Edit Category',
            'update_item'   => 'Update Category',
            'add_new_item'  => 'Add New Category',
            'new_item_name' => 'New Category Name',
            'menu_name'     => 'Categories',
        ),
        'hierarchical'    => true,
        'show_admin_column'=> true,
        'show_in_rest'    => true,
        'rewrite'         => array( 'slug' => 'menu-category' ),
    ) );
}
add_action( 'init', 'bunetto_register_taxonomy' );

/* ═══════════════════════════════════════
   CATEGORY ORDER META
   ═══════════════════════════════════════ */
function bunetto_cat_add_order( $taxonomy ) {
    echo '<div class="form-field"><label for="category_order">Display Order</label>';
    echo '<input type="number" name="category_order" id="category_order" value="0" min="0">';
    echo '<p>Order in which this category appears on the front page.</p></div>';
}
add_action( 'menu_category_add_form_fields', 'bunetto_cat_add_order' );

function bunetto_cat_edit_order( $term ) {
    $order = get_term_meta( $term->term_id, 'category_order', true );
    echo '<tr class="form-field"><th><label for="category_order">Display Order</label></th>';
    echo '<td><input type="number" name="category_order" id="category_order" value="' . esc_attr( $order ) . '" min="0">';
    echo '<p class="description">Order in which this category appears on the front page.</p></td></tr>';
}
add_action( 'menu_category_edit_form_fields', 'bunetto_cat_edit_order' );

function bunetto_save_cat_order( $term_id ) {
    if ( isset( $_POST['category_order'] ) ) {
        update_term_meta( $term_id, 'category_order', absint( $_POST['category_order'] ) );
    }
}
add_action( 'created_menu_category', 'bunetto_save_cat_order' );
add_action( 'edited_menu_category', 'bunetto_save_cat_order' );

/* ═══════════════════════════════════════
   META BOXES
   ═══════════════════════════════════════ */
function bunetto_add_meta_boxes() {
    add_meta_box( 'bunetto_item_details', 'Menu Item Details', 'bunetto_meta_box_cb', 'bunetto_menu', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'bunetto_add_meta_boxes' );

function bunetto_meta_box_cb( $post ) {
    wp_nonce_field( 'bunetto_save_meta', 'bunetto_meta_nonce' );
    $price     = get_post_meta( $post->ID, '_bunetto_price', true );
    $badge     = get_post_meta( $post->ID, '_bunetto_badge', true );
    $available = get_post_meta( $post->ID, '_bunetto_available', true );
    $signature = get_post_meta( $post->ID, '_bunetto_signature', true );
    $addons    = get_post_meta( $post->ID, '_bunetto_addons', true );
    if ( '' === $available ) $available = '1';
    if ( empty( $addons ) ) $addons = '[]';
    ?>
    <style>
    .bm-field{margin-bottom:18px}.bm-field label{display:block;font-weight:600;margin-bottom:5px}
    .bm-field input[type=text],.bm-field input[type=number],.bm-field select{width:100%;max-width:400px;padding:8px}
    .bm-addon-row{display:flex;gap:10px;margin-bottom:8px;align-items:center}
    .bm-addon-row input{flex:1;padding:8px}.bm-addon-row .rm{background:#dc3545;color:#fff;border:none;padding:8px 12px;cursor:pointer;border-radius:4px}
    #add-addon-btn{background:#0073aa;color:#fff;border:none;padding:8px 16px;cursor:pointer;border-radius:4px;margin-top:8px}
    .bm-chk{display:flex;align-items:center;gap:8px}
    </style>
    <div class="bm-field"><label for="bunetto_price">Price (Rs.)</label>
    <input type="number" id="bunetto_price" name="bunetto_price" value="<?php echo esc_attr( $price ); ?>" min="0" step="1"></div>

    <div class="bm-field"><label for="bunetto_badge">Badge (optional)</label>
    <select id="bunetto_badge" name="bunetto_badge">
        <option value="">None</option>
        <option value="popular" <?php selected( $badge, 'popular' ); ?>>Popular</option>
        <option value="new" <?php selected( $badge, 'new' ); ?>>New</option>
        <option value="bestseller" <?php selected( $badge, 'bestseller' ); ?>>Best Seller</option>
    </select></div>

    <div class="bm-field"><div class="bm-chk">
        <input type="checkbox" id="bunetto_available" name="bunetto_available" value="1" <?php checked( $available, '1' ); ?>>
        <label for="bunetto_available">Available</label>
    </div></div>

    <div class="bm-field"><div class="bm-chk">
        <input type="checkbox" id="bunetto_signature" name="bunetto_signature" value="1" <?php checked( $signature, '1' ); ?>>
        <label for="bunetto_signature">Show in Signature Section</label>
    </div></div>

    <div class="bm-field"><label>Add-ons (Repeatable)</label>
    <div id="addons-container"></div>
    <button type="button" id="add-addon-btn">+ Add Add-on</button>
    <input type="hidden" id="bunetto_addons" name="bunetto_addons" value="<?php echo esc_attr( $addons ); ?>">
    </div>

    <script>
    (function(){
        var addons=[];
        try{addons=JSON.parse(document.getElementById('bunetto_addons').value)}catch(e){}
        function render(){
            var c=document.getElementById('addons-container');c.innerHTML='';
            addons.forEach(function(a,i){
                var r=document.createElement('div');r.className='bm-addon-row';
                r.innerHTML='<input type="text" placeholder="Add-on name" value="'+(a.name||'').replace(/"/g,'&quot;')+'" onchange="bUA('+i+',\'name\',this.value)">'
                +'<input type="number" placeholder="Price" value="'+(a.price||0)+'" min="0" style="max-width:120px" onchange="bUA('+i+',\'price\',parseInt(this.value)||0)">'
                +'<button type="button" class="rm" onclick="bRA('+i+')">×</button>';
                c.appendChild(r);
            });
            document.getElementById('bunetto_addons').value=JSON.stringify(addons);
        }
        window.bUA=function(i,k,v){addons[i][k]=v;document.getElementById('bunetto_addons').value=JSON.stringify(addons)};
        window.bRA=function(i){addons.splice(i,1);render()};
        document.getElementById('add-addon-btn').addEventListener('click',function(){addons.push({name:'',price:0});render()});
        render();
    })();
    </script>
    <?php
}

function bunetto_save_meta( $post_id ) {
    if ( ! isset( $_POST['bunetto_meta_nonce'] ) || ! wp_verify_nonce( $_POST['bunetto_meta_nonce'], 'bunetto_save_meta' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['bunetto_price'] ) )
        update_post_meta( $post_id, '_bunetto_price', sanitize_text_field( $_POST['bunetto_price'] ) );
    if ( isset( $_POST['bunetto_badge'] ) )
        update_post_meta( $post_id, '_bunetto_badge', sanitize_text_field( $_POST['bunetto_badge'] ) );

    update_post_meta( $post_id, '_bunetto_available', isset( $_POST['bunetto_available'] ) ? '1' : '0' );
    update_post_meta( $post_id, '_bunetto_signature', isset( $_POST['bunetto_signature'] ) ? '1' : '0' );

    if ( isset( $_POST['bunetto_addons'] ) ) {
        $decoded = json_decode( stripslashes( $_POST['bunetto_addons'] ), true );
        if ( is_array( $decoded ) ) {
            $clean = array();
            foreach ( $decoded as $addon ) {
                if ( ! empty( $addon['name'] ) ) {
                    $clean[] = array(
                        'name'  => sanitize_text_field( $addon['name'] ),
                        'price' => absint( $addon['price'] ),
                    );
                }
            }
            update_post_meta( $post_id, '_bunetto_addons', wp_json_encode( $clean ) );
        }
    }
}
add_action( 'save_post_bunetto_menu', 'bunetto_save_meta' );

/* ═══════════════════════════════════════
   ADMIN COLUMNS
   ═══════════════════════════════════════ */
function bunetto_menu_columns( $columns ) {
    $new = array();
    foreach ( $columns as $key => $val ) {
        $new[ $key ] = $val;
        if ( 'title' === $key ) {
            $new['menu_price']     = 'Price';
            $new['menu_available'] = 'Available';
            $new['menu_signature'] = 'Signature';
        }
    }
    return $new;
}
add_filter( 'manage_bunetto_menu_posts_columns', 'bunetto_menu_columns' );

function bunetto_menu_column_data( $column, $post_id ) {
    if ( 'menu_price' === $column )     echo 'Rs. ' . esc_html( get_post_meta( $post_id, '_bunetto_price', true ) );
    if ( 'menu_available' === $column ) echo get_post_meta( $post_id, '_bunetto_available', true ) === '1' ? '✅' : '❌';
    if ( 'menu_signature' === $column ) echo get_post_meta( $post_id, '_bunetto_signature', true ) === '1' ? '⭐' : '—';
}
add_action( 'manage_bunetto_menu_posts_custom_column', 'bunetto_menu_column_data', 10, 2 );

/* ═══════════════════════════════════════
   WHATSAPP SETTINGS PAGE
   ═══════════════════════════════════════ */
function bunetto_settings_menu() {
    add_options_page( 'Bunetto Settings', 'Bunetto Settings', 'manage_options', 'bunetto-settings', 'bunetto_settings_page' );
}
add_action( 'admin_menu', 'bunetto_settings_menu' );

function bunetto_settings_init() {
    register_setting( 'bunetto_settings_group', 'bunetto_whatsapp_number', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '923012343423',
    ) );
    add_settings_section( 'bunetto_wa_sec', 'WhatsApp Settings', function() {
        echo '<p>Configure WhatsApp integration for order buttons.</p>';
    }, 'bunetto-settings' );
    add_settings_field( 'bunetto_whatsapp_number', 'WhatsApp Phone Number', function() {
        $val = get_option( 'bunetto_whatsapp_number', '923012343423' );
        echo '<input type="text" name="bunetto_whatsapp_number" value="' . esc_attr( $val ) . '" class="regular-text" placeholder="923012343423">';
        echo '<p class="description">Enter with country code, no spaces or dashes. Example: 923012343423</p>';
    }, 'bunetto-settings', 'bunetto_wa_sec' );
}
add_action( 'admin_init', 'bunetto_settings_init' );

function bunetto_settings_page() {
    if ( ! current_user_can( 'manage_options' ) ) return;
    ?>
    <div class="wrap">
        <h1>Bunetto Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields( 'bunetto_settings_group' ); do_settings_sections( 'bunetto-settings' ); submit_button(); ?>
        </form>
    </div>
    <?php
}

/* ═══════════════════════════════════════
   HELPER: GET ITEM IMAGE
   ═══════════════════════════════════════ */
function bunetto_get_item_image( $post_id, $size = 'large' ) {
    $img = get_the_post_thumbnail_url( $post_id, $size );
    if ( ! $img ) $img = get_post_meta( $post_id, '_bunetto_image_url', true );
    return $img ? $img : '';
}

/* ═══════════════════════════════════════
   HELPER: ITEM DATA FOR JS MODAL
   ═══════════════════════════════════════ */
function bunetto_item_json( $post_id ) {
    $addons_raw = get_post_meta( $post_id, '_bunetto_addons', true );
    $addons     = $addons_raw ? json_decode( $addons_raw, true ) : array();
    if ( ! is_array( $addons ) ) $addons = array();

    $data = array(
        'name'   => get_the_title( $post_id ),
        'price'  => (int) get_post_meta( $post_id, '_bunetto_price', true ),
        'img'    => bunetto_get_item_image( $post_id ),
        'desc'   => wp_strip_all_tags( get_the_excerpt( $post_id ) ),
        'addons' => $addons,
    );
    return esc_attr( wp_json_encode( $data ) );
}

/* ═══════════════════════════════════════
   THEME ACTIVATION: SEED DEFAULT DATA
   ═══════════════════════════════════════ */
function bunetto_activate() {
    bunetto_register_cpt();
    bunetto_register_taxonomy();
    flush_rewrite_rules();

    if ( get_posts( array( 'post_type' => 'bunetto_menu', 'posts_per_page' => 1 ) ) ) return;

    $cats = array( 'Burgers' => 1, 'Sides' => 2, 'Drinks' => 3 );
    $cat_ids = array();
    foreach ( $cats as $name => $order ) {
        $term = wp_insert_term( $name, 'menu_category' );
        if ( ! is_wp_error( $term ) ) {
            $cat_ids[ $name ] = $term['term_id'];
            update_term_meta( $term['term_id'], 'category_order', $order );
        }
    }

    $default_addons = wp_json_encode( array(
        array( 'name' => 'Cheese Slice', 'price' => 70 ),
        array( 'name' => 'Extra Sauce', 'price' => 100 ),
    ) );

    $items = array(
        array( 'Classic Beef', 'Juicy grilled beef patty, fresh lettuce, tomatoes, onions, creamy mayo & signature house sauce.', 890, 'Burgers', 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?q=80&w=800&auto=format&fit=crop', '1' ),
        array( 'Bunetto Megaton', 'Double patties, double cheese, crispy onions & fully loaded signature sauces.', 1190, 'Burgers', 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?q=80&w=800&auto=format&fit=crop', '1' ),
        array( 'Smoky Zing', 'Premium zing patty, smoky BBQ sauce, cheese & crispy lettuce.', 990, 'Burgers', 'https://images.unsplash.com/photo-1615719413546-198b25453f85?q=80&w=800&auto=format&fit=crop', '1' ),
        array( 'Crispy Chicken', 'Crispy fried chicken fillet, coleslaw, pickles & smoky mayo.', 850, 'Burgers', 'https://images.unsplash.com/photo-1606755962773-d324e0a13086?q=80&w=800&auto=format&fit=crop', '1' ),
        array( 'BBQ Stack', 'Smoky BBQ beef, caramelised onions, aged cheddar & jalapeños.', 1050, 'Burgers', 'https://images.unsplash.com/photo-1553979459-d2229ba7433b?q=80&w=800&auto=format&fit=crop', '0' ),
        array( 'Loaded Fries', 'Golden crispy fries topped with cheese sauce, jalapeños & house seasoning.', 450, 'Sides', 'https://images.unsplash.com/photo-1630384060421-cb20d0e0649d?q=80&w=800&auto=format&fit=crop', '0' ),
        array( 'Onion Rings', 'Thick-cut crispy onion rings with signature dipping sauce.', 350, 'Sides', 'https://images.unsplash.com/photo-1639024471283-03518883512d?q=80&w=800&auto=format&fit=crop', '0' ),
        array( 'Coleslaw', 'Creamy house coleslaw with fresh herbs.', 200, 'Sides', 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=800&auto=format&fit=crop', '0' ),
        array( 'Classic Cola', 'Chilled classic cola served over ice.', 150, 'Drinks', 'https://images.unsplash.com/photo-1581636625402-29b2a704ef13?q=80&w=800&auto=format&fit=crop', '0' ),
        array( 'Signature Shake', 'Thick creamy milkshake — vanilla, chocolate or strawberry.', 490, 'Drinks', 'https://images.unsplash.com/photo-1572490122747-3968b75cc699?q=80&w=800&auto=format&fit=crop', '0' ),
        array( 'Fresh Lemonade', 'Freshly squeezed lemonade with a hint of mint.', 220, 'Drinks', 'https://images.unsplash.com/photo-1621263764928-df1444c5e859?q=80&w=800&auto=format&fit=crop', '0' ),
    );

    foreach ( $items as $item ) {
        $pid = wp_insert_post( array(
            'post_title'   => $item[0],
            'post_content' => $item[1],
            'post_excerpt' => $item[1],
            'post_status'  => 'publish',
            'post_type'    => 'bunetto_menu',
        ) );
        if ( ! is_wp_error( $pid ) ) {
            update_post_meta( $pid, '_bunetto_price', $item[2] );
            update_post_meta( $pid, '_bunetto_available', '1' );
            update_post_meta( $pid, '_bunetto_signature', $item[5] );
            update_post_meta( $pid, '_bunetto_addons', $default_addons );
            update_post_meta( $pid, '_bunetto_badge', '' );
            update_post_meta( $pid, '_bunetto_image_url', $item[4] );
            if ( isset( $cat_ids[ $item[3] ] ) )
                wp_set_object_terms( $pid, $cat_ids[ $item[3] ], 'menu_category' );
        }
    }
    if ( ! get_option( 'bunetto_whatsapp_number' ) )
        update_option( 'bunetto_whatsapp_number', '923012343423' );
}
add_action( 'after_switch_theme', 'bunetto_activate' );

/* ═══════════════════════════════════════
   INCLUDE: CUSTOMIZER & PATTERNS
   ═══════════════════════════════════════ */
require_once get_template_directory() . '/inc/google-fonts.php';
require_once get_template_directory() . '/inc/template-hero.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/customizer-css.php';
require_once get_template_directory() . '/inc/patterns.php';

/* ═══════════════════════════════════════
   ENQUEUE: EDITOR FONTS
   ═══════════════════════════════════════ */
function bunetto_editor_assets() {
    $font_slugs = array(
        get_theme_mod( 'bunetto_typo_body_font', 'montserrat' ),
        get_theme_mod( 'bunetto_typo_heading_font', 'playfair' ),
        get_theme_mod( 'bunetto_typo_ui_font', 'montserrat' ),
        get_theme_mod( 'bunetto_typo_footer_font', 'montserrat' ),
    );
    wp_enqueue_style( 'bunetto-editor-fonts', bunetto_google_fonts_css_url( $font_slugs ), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'bunetto_editor_assets' );
