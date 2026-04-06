# 🎵 Sonic Prism - Music Streaming UI

A pixel-perfect conversion of a Stitch AI design into a fully functional PHP-based music streaming homepage.

## 📁 Project Structure

```
sonic-prism/
│
├── index.php                 # Main homepage file
│
├── components/               # Reusable PHP components
│   ├── header.php           # Top navigation bar
│   ├── sidebar.php          # Collapsible sidebar navigation
│   ├── player.php           # Bottom music player
│   └── card.php             # Playlist card component
│
├── assets/                   # Static assets
│   ├── css/
│   │   └── style.css        # Main stylesheet (vanilla CSS)
│   ├── js/
│   │   └── script.js        # Interactive functionality (vanilla JS)
│   └── images/              # Image assets (currently using external URLs)
│
└── README.md                 # This file
```

## 🎨 Design Features

### Color Palette
- **Primary Accent**: #1DB954 (Spotify Green)
- **Primary**: #72fe8f
- **Background**: #0c0e12 (Dark)
- **Surface**: Multiple shades for depth
- **Glassmorphism**: Semi-transparent backgrounds with blur

### Typography
- **Headline Font**: Manrope (800, 700, 600, 500, 400)
- **Body Font**: Inter (600, 500, 400)
- **Label Font**: Inter

### Layout Sections
1. **Hero Carousel** - Featured recommendations with 3-card layout
2. **Made For You** - 5-column grid of personalized playlists
3. **Trending Now** - 2-column list of trending tracks
4. **Recommended Artists** - 6-column circular artist avatars

## 🛠️ Technologies Used

- **HTML5** - Semantic markup
- **CSS3** - Modern styling with:
  - CSS Variables
  - Flexbox
  - CSS Grid
  - Backdrop Filter (glassmorphism)
  - Custom animations
- **Vanilla JavaScript** - No frameworks
- **PHP** - Component-based structure
- **Google Fonts** - Manrope & Inter
- **Material Symbols** - Icon library

## 🚀 Installation

1. **Clone or download** the project files
2. **Place in web server directory** (e.g., htdocs, www, public_html)
3. **Ensure PHP is installed** (PHP 7.4+ recommended)
4. **Access via browser**: `http://localhost/sonic-prism/`

### Requirements
- PHP 7.4 or higher
- Web server (Apache, Nginx, or PHP built-in server)
- Modern web browser with CSS backdrop-filter support

### Quick Start (PHP Built-in Server)
```bash
cd sonic-prism
php -S localhost:8000
```
Then open `http://localhost:8000` in your browser.

## 📱 Responsive Breakpoints

- **Desktop Large**: 1920px and above (Full sidebar, 5-column grid)
- **Desktop**: 1280px - 1919px (Collapsed sidebar, 4-column grid)
- **Tablet Landscape**: 1024px - 1279px (3-column grid)
- **Tablet Portrait**: 768px - 1023px (2-column grid, hidden sidebar)
- **Mobile**: Below 768px (Mobile-optimized layout)

## 🎯 Key Features

### Sidebar
- **Collapsible**: Expands on desktop, collapses on tablet
- **Responsive**: Hidden on mobile with hamburger menu
- **Tooltip**: Hover tooltips in collapsed state
- **Glassmorphism**: Translucent background with blur

### Hero Carousel
- **3-Card Layout**: Side cards blurred, center card featured
- **Floating Animation**: Subtle up/down motion
- **Smooth Scroll**: Horizontal scroll with snap points
- **Navigation**: Previous/next buttons (hidden on mobile)

### Playlist Cards
- **Hover Effects**: Lift animation + play button reveal
- **Glassmorphism**: Semi-transparent card backgrounds
- **Responsive Grid**: 5 → 4 → 3 → 2 columns

### Music Player
- **Fixed Bottom**: Always visible
- **Full Controls**: Play, pause, skip, shuffle, repeat
- **Progress Bar**: Draggable with smooth animation
- **Volume Control**: Interactive slider
- **Responsive**: Simplified on mobile

### Interactions
- **Play Buttons**: Hover reveals on playlist cards
- **Favorite Toggle**: Click to like/unlike
- **Search**: Debounced search input
- **Keyboard Shortcuts**: Space (play/pause), Ctrl+Arrow (skip)

## 🎨 Glassmorphism Styling

The design heavily uses glassmorphism effects:
```css
background: rgba(35, 38, 44, 0.4);
backdrop-filter: blur(20px);
-webkit-backdrop-filter: blur(20px);
```

### Browser Compatibility
- ✅ Chrome 76+
- ✅ Edge 79+
- ✅ Safari 9+
- ✅ Firefox 103+ (with layout.css.backdrop-filter.enabled)
- ⚠️ Older browsers will show solid backgrounds (graceful degradation)

## 🔧 Customization

### Changing Colors
Edit CSS variables in `assets/css/style.css`:
```css
:root {
    --primary: #72fe8f;
    --accent: #1DB954;
    --background: #0c0e12;
    /* ... more variables */
}
```

### Adding Playlists
Edit the `$playlists` array in `index.php`:
```php
$playlists = [
    [
        'image' => 'path/to/image.jpg',
        'title' => 'Playlist Name',
        'description' => 'Playlist description'
    ],
    // ... more playlists
];
```

### Modifying Layout
- **Sidebar**: Edit `components/sidebar.php`
- **Header**: Edit `components/header.php`
- **Player**: Edit `components/player.php`
- **Cards**: Edit `components/card.php`

## 📝 Code Quality

### CSS Architecture
- **BEM-inspired naming**: `.section-title`, `.playlist-card`, etc.
- **CSS Variables**: Centralized color/spacing system
- **Mobile-first**: Base styles + media queries
- **No frameworks**: Pure vanilla CSS

### JavaScript Features
- **Event delegation**: Efficient event handling
- **Debouncing**: Search input optimization
- **Intersection Observer**: Scroll animations
- **Keyboard shortcuts**: Accessibility features

### PHP Structure
- **Component-based**: Reusable parts
- **Clean separation**: Logic separated from presentation
- **WordPress-ready**: Easy to convert to WP theme

## 🌐 WordPress Conversion

To convert this to a WordPress theme:

1. Rename `index.php` to `front-page.php`
2. Create `functions.php` for theme setup
3. Create `style.css` with theme headers
4. Move components to template parts
5. Replace hardcoded data with WordPress loops
6. Add `header.php` and `footer.php` includes

## 🐛 Known Issues

- External images may load slowly (consider local hosting)
- Glassmorphism not supported in Firefox < 103 without flag
- Some animations may be reduced on low-end devices

## 📄 License

This is a design conversion project. 
- Design: Based on Google Stitch AI output
- Code: Free to use and modify

## 🤝 Contributing

This is a standalone project, but feel free to:
- Report bugs
- Suggest improvements
- Fork and customize

## 📧 Support

For issues or questions:
1. Check browser console for errors
2. Verify PHP version compatibility
3. Ensure all files are properly uploaded
4. Clear browser cache

## 🎵 Credits

- **Design Source**: Google Stitch AI
- **Fonts**: Google Fonts (Manrope, Inter)
- **Icons**: Google Material Symbols
- **Images**: Googleusercontent (placeholder images)

---

**Version**: 1.0.0  
**Last Updated**: 2024  
**Built with**: ❤️ and vanilla code
