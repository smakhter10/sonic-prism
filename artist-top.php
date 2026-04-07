<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sonic Prism - The Ethereals (Top Tracks)</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/pages.css">
</head>
<body class="bg-surface text-on-surface font-body overflow-x-hidden">
    <!-- Sidebar Navigation -->
    <?php include 'components/sidebar.php'; ?>
    
    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Navigation -->
        <?php include 'components/header.php'; ?>
        
        <!-- Page Content -->
        <div class="content-wrapper p-0" id="app-content">
            <!-- Hero Header -->
            <section class="artist-hero-large">
                <div class="artist-large-bg">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuC0vQnmNMWTr_XCw6ITNhNjwcHT3WGf7JsKgIkcS62823xrEpzLzQNtoNDvIpKiNMnl1Ig7zmdxElAEdrWKZ0MmLe8etUWa3FUMpV8Bt7lsGBa0A0uDyT54Rxg3ifeIzXYYQJxOLPHC_qGndhC7CtZ6xbNvl1Nw8TqFnx0tH9y651ROuzU2cruikLyL1J_Xun1O1RxsOq8XdDPHknx1g_Z6o-S39jE861gbh0DMmhpP09WGL3szQBb92odsVuSROOcHSbijZEqhYsk" alt="The Ethereals">
                    <div class="artist-bg-gradient-bottom"></div>
                    <div class="artist-bg-gradient-side-primary"></div>
                </div>
                
                <div class="artist-hero-content z-index-10">
                    <div class="badge-verified">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">verified</span>
                        <span>Verified Artist</span>
                    </div>
                    <h1 class="artist-title-massive">The Ethereals</h1>
                    <p class="artist-listeners">3,842,901 monthly listeners</p>
                </div>
            </section>
            
            <!-- Action Bar -->
            <div class="artist-action-bar">
                <button class="btn-play-large-gradient">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
                </button>
                <button class="btn-outline-uppercase">Follow</button>
                <button class="btn-icon-simple"><span class="material-symbols-outlined">more_horiz</span></button>
            </div>
            
            <!-- Song List Section -->
            <section class="track-list-section with-padding">
                <h2 class="section-title mb-6">Popular Tracks</h2>
                
                <div class="track-list-header text-uppercase">
                    <div class="col-num text-center">#</div>
                    <div class="col-title">Title</div>
                    <div class="col-album">Album</div>
                    <div class="col-date">Release Date</div>
                    <div class="col-time"><span class="material-symbols-outlined text-sm">schedule</span></div>
                </div>
                
                <div class="track-list-body">
                    <!-- Track 1 -->
                    <div class="track-row glass-hover-bg">
                        <div class="col-num text-center">
                            <span class="num-text">1</span>
                            <span class="material-symbols-outlined play-icon">play_arrow</span>
                        </div>
                        <div class="col-title track-info-cell">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCFl7xRlgRpU9vrV-5GfEENF8cRR2hDYiLQLWS16uWeiAbLR9p-mrft7JZwmtTWCJDUJPY-KrHHfOG03ozLkuiwHvjbzlz_Dpxs4Z_ZK3G5cZcTaxLZ1o3cujdXdA5gpt6TQXxfKPNvqA9hqkQWLrOdttWdDfotHCdEa-qiqswXkqLZp1xtEkAQ91NMRKjTWJbstN34vveCDnRWtY4ya2n4Fhya_iCOuSjUAUddFEEvAqnSxshRX6cF6-DsTNmdxbvAaE-X_k2WFmg" alt="Track Art">
                            <div class="track-info-text">
                                <span class="track-name font-bold">Midnight Echoes</span>
                                <span class="track-artist">Featuring Luna Vane</span>
                            </div>
                        </div>
                        <div class="col-album">Prism of Thought</div>
                        <div class="col-date">Oct 12, 2023</div>
                        <div class="col-time">
                            <span class="material-symbols-outlined fav-icon">favorite</span>
                            <span class="font-mono">3:42</span>
                        </div>
                    </div>
                    
                    <!-- Track 2 -->
                    <div class="track-row glass-hover-bg">
                        <div class="col-num text-center">
                            <span class="num-text">2</span>
                            <span class="material-symbols-outlined play-icon">play_arrow</span>
                        </div>
                        <div class="col-title track-info-cell">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBpZgbQ_j4l4AfA8XHf-YO2EMDXx2QfefYQ9DNxMtjejnckYpjGF51GV1mGPQ3U508M9ALrrvXdJGI-GLjYGsowjKHnO5dUQAP4uxbZoHjIZEWZ8BI5NHZBwe7diTuMPxiR3C2TayB4igaJAkunnifIpqwuRfpZVNo7NFEDaObPvw1insLLfOBgdmam8XBGsbytBgQkd-BW6RtJJFO5wXBB4_SRo0k4tegE4AVUtcLa0oi0imrXZvdzFyqe1KMpxT2ls8dgADZ3rz4" alt="Track Art">
                            <div class="track-info-text">
                                <span class="track-name font-bold">Vibrant Void</span>
                                <span class="track-artist">Original Motion Picture Score</span>
                            </div>
                        </div>
                        <div class="col-album">The Silent Storm</div>
                        <div class="col-date">Aug 29, 2023</div>
                        <div class="col-time">
                            <span class="material-symbols-outlined fav-icon">favorite</span>
                            <span class="font-mono">4:15</span>
                        </div>
                    </div>
                    
                    <!-- Track 3 -->
                    <div class="track-row glass-hover-bg">
                        <div class="col-num text-center">
                            <span class="num-text">3</span>
                            <span class="material-symbols-outlined play-icon">play_arrow</span>
                        </div>
                        <div class="col-title track-info-cell">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDgkW4qXMzhvdxxKDFrirBRQWSjYkrHVtWsofUFjcavjRnvaGjDygwNVcX0OPAIm6_xtBxcUHXjTmDHhNXGdsDyUFe3ee04kwhnohX20PE4O_pPjX5opCTuN9O1TvraxRHCmVKYOGmsxKY7erK5w9HVHX0GnlhRYnDzWEUlEAWtGf1zkkDbO3i8LA2xkufsufw8KreJXTO0eMILUJuUGPOmCsgER_nvj6mgBvCMQb8K91WEtUlaiQ02r2iGjHEO59Pcz0DRVe7cvyA" alt="Track Art">
                            <div class="track-info-text">
                                <span class="track-name font-bold">Velvet Horizon</span>
                                <span class="track-artist">The Ethereals</span>
                            </div>
                        </div>
                        <div class="col-album">Acoustic Sessions</div>
                        <div class="col-date">Feb 14, 2024</div>
                        <div class="col-time">
                            <span class="material-symbols-outlined fav-icon">favorite</span>
                            <span class="font-mono">2:58</span>
                        </div>
                    </div>
                    
                    <!-- Track 4 -->
                    <div class="track-row glass-hover-bg">
                        <div class="col-num text-center">
                            <span class="num-text">4</span>
                            <span class="material-symbols-outlined play-icon">play_arrow</span>
                        </div>
                        <div class="col-title track-info-cell">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCaw18kCrZJAQP4_r89tLneA92eeMr8kb5Zn9kAj_iSpNr-vcv3uHrnVVmhJf2QZWUE3010Lg8amohDfl4BFEVGuai3OSPfkFCypMTHRGh3HNrnRVkNPcjXgdFCarQrkfycL3a4LKgKZo6XsWCrbBLPRMpTJKPXOsGXtdeyyoTSK8o2TMJZ4VJ5IZvEYePqh5AD7MXvYsxoh9OxaOcQQLa44S6gpQ6lifhvsyZys8Sxf1Pm6cYKymuxDt4A5jSXRq_2wdZug4Sw13M" alt="Track Art">
                            <div class="track-info-text">
                                <span class="track-name font-bold">Shadow Pulse</span>
                                <span class="track-artist">Remix Collection</span>
                            </div>
                        </div>
                        <div class="col-album">Prism of Thought</div>
                        <div class="col-date">Oct 12, 2023</div>
                        <div class="col-time">
                            <span class="material-symbols-outlined fav-icon">favorite</span>
                            <span class="font-mono">5:21</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    
    <!-- Music Player -->
    <?php include 'components/player.php'; ?>
    
    <!-- JavaScript -->
    <script src="assets/js/script.js"></script>
</body>
</html>
