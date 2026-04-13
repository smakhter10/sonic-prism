# Bunetto WordPress Theme: Implementation & Training Guide

This document serves as a comprehensive guide on the modernizations and customizations applied to the **Bunetto WordPress Theme**. It outlines the patterns used to convert a static or semi-static theme into a fully editable, Gutenberg-ready WordPress experience without breaking its original design integrity.

---

## 1. Project Objective
The goal was to add full visual editing capabilities using three primary mechanisms:
1.  **WordPress Customizer**: Real-time frontend editing (Text, Images, Colors, Toggles, and Opacity).
2.  **theme.json**: Global design tokens and block-based styling alignment.
3.  **Gutenberg Block Patterns**: Reusable layout templates for page creation.
4.  **Typography Engine**: Dynamic Google Fonts catalog integration.
5.  **Admin UI Extensions**: Repeatable meta boxes and custom dashboard columns.

---

## 2. Architecture for Customization

### A. The Customizer Engine
We avoided hardcoding values and instead replaced them with `get_theme_mod()` calls.
-   **Definitions**: `inc/customizer.php` defines the Sections, Settings, and Controls.
-   **Logic**: Added support for various field types like `text`, `textarea`, `checkbox`, `image`, and `date`.
-   **CSS Integration**: `inc/customizer-css.php` captures the Customizer values and outputs them as CSS variables (`--primary-gold`, `--hero-height`, etc.).

### B. Gutenberg & Global Styles
We implemented `theme.json` to bridge the gap between the Classic theme and the Block Editor.
-   **Color Palette**: Defined 11 colors that appear in the editor's color picker.
-   **Typography**: Enqueued Google Fonts (Playfair, Montserrat, Bebas Neue) for both the frontend and the editor.
-   **Spacing**: Created a standard scale for padding and margins.

### C. Typography Catalog
Instead of hardcoding fonts, use a catalog approach (see `inc/google-fonts.php`):
- **Catalog**: A central array maps slugs to font weights and API parameters.
- **Dynamic Enqueueing**: `functions.php` reads Customizer selections and builds a single Google Fonts API URL.
- **Sanitization**: typography sizes are validated against a regex allowing `px`, `rem`, and `clamp()`.

### D. Editor Matching
To ensure a true "What You See Is What You Get" (WYSIWYG) experience, we use `assets/css/editor-style.css`. This file overrides default block styles in the backend to match the theme's dark aesthetics and dynamic typography.

---

## 3. Key Implementation Patterns

### Pattern: Customizer Text & Image Replacement
Instead of static text, use the following pattern in template files:
```php
// In inc/customizer.php
$wp_customize->add_setting( 'hero_title', [ 'default' => 'Original Text' ] );

// In front-page.php
echo esc_html( get_theme_mod( 'hero_title', 'Original Text' ) );
```

### Pattern: Dynamic CSS Variables
To update colors in real-time, we output variables in the `<head>` via `wp_head`:
```php
:root {
    --primary-gold: <?php echo esc_attr( get_theme_mod( 'primary_color', '#c9a96e' ) ); ?>;
}
```

### Pattern: Repeatable Meta Boxes (JS + JSON)
For complex data like "Add-ons", we use a hidden field to store JSON and a Javascript interface in the admin (see `functions.php`). This allows users to add/remove rows dynamically without refreshing the page.

### Pattern: Theme Seeding on Activation
To provide a "ready-to-go" experience, we use the `after_switch_theme` hook to create default categories and menu items if they don't exist.

---

## 4. File-by-File Breakdown

| File Path | Role |
| :--- | :--- |
| `functions.php` | Main bridge; handles CPTs, Taxonomies, Meta Boxes, and activation seeding. |
| `theme.json` | Configures the Block Editor (colors, fonts, sizing). |
| `inc/google-fonts.php` | The typography catalog and helper functions. |
| `inc/customizer.php` | Defines the admin-side sections (Logos, Colors, Hero, Footers, Cart). |
| `inc/customizer-css.php` | Generates CSS variables based on Customizer choices. |
| `inc/template-hero.php` | Logic for rendering hero slides and buttons. |
| `inc/patterns.php` | Defines reusable Gutenberg layout patterns. |
| `assets/css/editor-style.css` | Styles the WordPress editor to match the dynamic design. |

---

## 5. Maintenance & Extensions
-   **Adding a New Setting**: Open `inc/customizer.php`, copy an existing setting block, change the ID, and then call it in your template using `get_theme_mod('your_id')`.
-   **Updating Colors**: Add new keys to the `settings` array in `theme.json` and map them in `inc/customizer-css.php` if you want them to be user-editable.
-   **Packaging**: Always ensure the `.zip` file includes the `inc/` directory and `theme.json`.

---

## 6. Training Tips for Other Projects
1.  **Preserve HTML Structure**: Never change IDs or Classes used by existing JS/CSS when dynamicizing content.
2.  **Graceful Fallbacks**: Always provide the original static content as the `default` value in `get_theme_mod()`.
3.  **Sanitize Everything**: Use `esc_html()`, `esc_attr()`, and `absint()` when outputting Customizer data.
4.  **Localize Scripts**: If a Javascript variable (like a countdown date) needs to be dynamic, use `wp_localize_script()` in `functions.php`.
