# Bunetto Premium Burgers — WordPress Theme v2.0

A luxury, high-performance WordPress theme for restaurant businesses, featuring a robust design system, advanced typography engine, and seamless WhatsApp integration.

---

## 🌟 New Features in v2.0

### 🎨 Complete Design System
The entire site is now editable via the **WordPress Customizer**. No code required to change the look and feel.
- **Global Colors**: Update Gold accents, background depths, and text levels globally.
- **Navbar Styling**: Full control over background opacity, logo colors, borders, and cart button aesthetics.
- **Footer Designer**: Customize column layouts, branding text, address lines, and copyright info.
- **Side Cart Customization**: Every element of the slide-out cart panel is now stylable.

### ✍️ Advanced Typography Engine
- **Curated Font Catalog**: Choose from 19 hand-picked Google Font families for Body, Headings, UI, and Footer.
- **Responsive Sizing**: Support for modern CSS `clamp()` functions, `rem`, and `px` units.
- **Local Enqueuing**: Smart loading of only the fonts currently in use.

### 🍔 Enhanced Menu Management
- **Modular Meta Boxes**: New administrative UI for managing prices, availability, and "Signature" status.
- **Repeatable Add-ons**: A interactive Javascript-powered interface to add custom extras (e.g., "Extra Cheese", "Sauce") with individual pricing.
- **Admin Visibility**: Custom dashboard columns to track inventory and featured items at a glance.

### 🎡 Pro Hero Slider
- **10 Editable Slides**: Increased from 3 to 10 possible slides.
- **Advanced CTA Logic**: Buttons can now be links, section anchors, or trigger the **Product Modal** for instant ordering.
- **Gradient Overlay Designer**: Fine-tune the atmosphere with three-stop color and opacity controls.

### 📱 Enterprise Integration
- **WhatsApp Settings**: A dedicated admin page to manage the ordering phone number.
- **Theme Seeding**: Automatically populates categories and example menu items on activation for a "Ready-to-Go" experience.

---

## 🛠️ Technical Overview
- **`theme.json`**: Bridges the gap between traditional WordPress and the Gutenberg Block Editor.
- **Modular Architecture**: Core logic split into `inc/google-fonts.php`, `inc/customizer.php`, and `inc/template-hero.php`.
- **Dynamic CSS**: Values from the Customizer are injected via CSS variables for real-time previewing.

---

## 🚀 Installation & Setup
1. Upload the `bunetto-theme.zip` via **Appearance > Themes**.
2. Activate the theme.
3. Visit **Appearance > Customize** to configure your branding.
4. Manage your menu items under the **Menu Manager** tab.
5. Set your WhatsApp number under **Settings > Bunetto Settings**.
