<?php
/**
 * Footer template
 * @package Bunetto
 */
$wa_number   = get_option( 'bunetto_whatsapp_number', '923012343423' );
$copyright   = bunetto_opt( 'footer_copyright', '© {year} Bunetto Premium Burgers. All rights reserved.' );
$copyright   = str_replace( '{year}', date( 'Y' ), $copyright );
?>

<!-- FOOTER -->
<footer>
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <?php
        $f_logo_type = bunetto_opt( 'footer_logo_type', 'text' );
        $f_logo_img  = bunetto_opt( 'footer_logo_image', '' );
        $f_logo_mh   = max( 20, min( 240, absint( bunetto_opt( 'footer_logo_img_max_h', 48 ) ) ) );
        ?>
        <?php if ( 'image' === $f_logo_type && $f_logo_img ) : ?>
        <div class="footer-logo footer-logo--image"><img src="<?php echo esc_url( $f_logo_img ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" height="<?php echo (int) $f_logo_mh; ?>"></div>
        <?php else : ?>
        <div class="footer-logo"><?php echo esc_html( bunetto_opt( 'footer_logo_text', 'BUNETTO' ) ); ?><span><?php echo esc_html( bunetto_opt( 'footer_logo_accent', '.' ) ); ?></span></div>
        <?php endif; ?>
        <p><?php echo esc_html( bunetto_opt( 'footer_brand_text', 'Redefining fast food. Elevating the burger experience through uncompromising quality and luxury ingredients.' ) ); ?></p>
      </div>
      <div class="footer-col">
        <h4>Visit Us</h4>
        <p><?php echo esc_html( bunetto_opt( 'footer_address_1', 'Food District' ) ); ?></p>
        <p><?php echo esc_html( bunetto_opt( 'footer_address_2', 'Pakistan' ) ); ?></p>
        <p><?php echo esc_html( bunetto_opt( 'footer_hours', 'Open Daily: 12 PM – 12 AM' ) ); ?></p>
      </div>
      <div class="footer-col">
        <h4>Contact</h4>
        <p style="font-size:11px;color:#3a3a3a;margin-bottom:2px;"><?php echo esc_html( bunetto_opt( 'footer_contact_label', 'Order via WhatsApp' ) ); ?></p>
        <a href="https://wa.me/<?php echo esc_attr( $wa_number ); ?>">+<?php echo esc_html( substr( $wa_number, 0, 2 ) . ' ' . substr( $wa_number, 2, 3 ) . ' ' . substr( $wa_number, 5 ) ); ?></a>
      </div>
    </div>
    <div class="footer-bottom"><p><?php echo esc_html( $copyright ); ?></p></div>
  </div>
</footer>

<?php if ( is_front_page() && bunetto_opt( 'splash_enabled', '1' ) ) : ?>
</div><!-- #site -->
<?php endif; ?>

<!-- PRODUCT MODAL -->
<div id="modal-backdrop" onclick="if(event.target===this)closeModal()">
  <div id="product-modal">
    <button class="modal-close" onclick="closeModal()">&#215;</button>
    <img class="modal-img" id="modal-img" src="" alt="">
    <div class="modal-body">
      <div class="modal-title" id="modal-title"></div>
      <div class="modal-price" id="modal-price"></div>
      <hr class="modal-divider">
      <div class="extras-title">Add Extras</div>
      <div id="modal-extras"></div>
      <hr class="modal-divider">
      <div class="qty-section-lbl">Quantity</div>
      <div class="qty-ctrl" style="display:inline-flex;">
        <button class="qty-btn" onclick="chQ(-1)" style="width:34px;height:34px;">−</button>
        <span class="qty-num" id="modal-qty" style="padding:0 18px;font-size:16px;">1</span>
        <button class="qty-btn" onclick="chQ(1)" style="width:34px;height:34px;">+</button>
      </div>
    </div>
    <div class="modal-footer">
      <button class="add-to-order-btn" onclick="addToCart()"><span>Add to Order</span><span id="modal-total">Rs. 0</span></button>
    </div>
  </div>
</div>

<!-- CART -->
<div id="cart-panel" onclick="if(event.target===this)closeCart()">
  <div id="cart-inner">
    <div class="cart-header"><h3>Your Order</h3><button class="cart-close" onclick="closeCart()">&#215;</button></div>
    <div class="cart-items" id="cart-items">
      <div class="cart-empty" id="cart-empty"><span class="cart-empty-icon">&#128722;</span>Your order is empty.<br>Add items to get started.</div>
    </div>
    <div class="cart-footer">
      <div class="order-type-lbl">Order Type</div>
      <div class="order-toggle">
        <button class="order-opt active" id="opt-pickup" onclick="setOT('pickup')">Pickup (Free)</button>
        <button class="order-opt" id="opt-delivery" onclick="setOT('delivery')">Delivery (+Rs. 150)</button>
      </div>
      <div class="summary-row"><span>Delivery Fee</span><span class="val" id="delivery-fee">Rs. 0</span></div>
      <div class="summary-row total"><span>Total Amount</span><span class="val" id="cart-total">Rs. 0</span></div>
      <a class="whatsapp-btn" id="wa-btn" href="#" target="_blank">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="white"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.127.558 4.126 1.533 5.86L0 24l6.335-1.509A11.95 11.95 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.013-1.376l-.36-.214-3.728.977.994-3.63-.234-.373A9.818 9.818 0 1112 21.818z"/></svg>
        Order via WhatsApp
      </a>
    </div>
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
