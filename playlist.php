<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sonic Prism - Emerald Echoes</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/pages.css">
</head>
<body class="bg-surface text-on-surface font-body overflow-x-hidden selection:bg-primary/30">
    <!-- Sidebar Navigation -->
    <?php include 'components/sidebar.php'; ?>
    
    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Navigation -->
        <?php include 'components/header.php'; ?>
        
        <!-- Page Content -->
        <div class="content-wrapper playlist-page" id="app-content">
            <!-- Hero Header -->
            <section class="playlist-hero">
                <div class="playlist-ambient-glow"></div>
                <div class="playlist-artwork">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuD4WAfOLfxBaQFCa-rVak3oL9tsz86OuyfALoJ9-alo45r90e_aIrhjFVLytWhBsfc43CvxhaXtHgKg0PpZSscDNP_FDl5L6Beq91_c8wAyO3V7jraln03CbYawoXGhRsKtd9dCih0XLSTKLvpil-GmQb7pKLLI3D7tH0zhLZrjy1bVLan8QZ0Czj_uTxJa2YxDasUykHMsxvbMg5iqrWUYDtRsDWSEeU8c8jLYjozZdoj0noQMPypsJ3h0WVHdNGkDvbZ6uHBIOP0" alt="Playlist Artwork">
                    <div class="playlist-artwork-overlay"></div>
                </div>
                <div class="playlist-hero-info">
                    <span class="playlist-badge">Public Playlist</span>
                    <h1 class="playlist-large-title">Emerald Echoes</h1>
                    <p class="playlist-hero-desc">Curated selection of progressive house and melodic techno. Perfect for deep focus and midnight drives.</p>
                    <div class="playlist-meta">
                        <span class="highlight">Sonic Prism</span>
                        <span class="dot"></span>
                        <span>42 songs, 3 hr 14 min</span>
                    </div>
                </div>
            </section>
            
            <!-- Action Controls -->
            <section class="playlist-actions">
                <button class="btn-play-large">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
                    Play
                </button>
                <button class="btn-shuffle-large">
                    <span class="material-symbols-outlined">shuffle</span>
                    Shuffle
                </button>
                <div class="playlist-icon-actions">
                    <button class="btn-icon-circle"><span class="material-symbols-outlined">favorite</span></button>
                    <button class="btn-icon-circle"><span class="material-symbols-outlined">more_horiz</span></button>
                </div>
            </section>
            
            <!-- Track List Table -->
            <section class="track-list-section">
                <!-- Table Header -->
                <div class="track-list-header">
                    <div class="col-num">#</div>
                    <div class="col-title">Title</div>
                    <div class="col-album hidden-mobile">Album</div>
                    <div class="col-date hidden-tablet">Date Added</div>
                    <div class="col-time"><span class="material-symbols-outlined text-sm">schedule</span></div>
                </div>
                
                <div class="track-list-body">
                    <!-- Track 1 -->
                    <div class="track-row">
                        <div class="col-num">1</div>
                        <div class="col-title track-info-cell">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCA4Oo80WZq7yaI2AJNHqplhE1Sjbft5HTIMg4bWkEvh-xCOyvujJ4KqeB0WnyNU0B11OuDD1BjuQ6bPiltBbQwOdTCyVYXubxCl15hSWFcgpJSSc1lp-6TQJ130ni8lvg6P05-FNvcMgcJjQFdDZQ4UXwBEBeYVQzgg0g5bQ2QS_jwmvxttK16iJoLcubvO4gt0y2fCgs7BsqnenW7aWKfGxPy_aivq0cfhfPFIzUWTwGVIlq6BejprlO6nyfw7s6J1uzyHYrrxVc" alt="Track Art">
                            <div class="track-info-text">
                                <span class="track-name">Neon Velocity</span>
                                <span class="track-artist">Etheric Stream</span>
                            </div>
                        </div>
                        <div class="col-album hidden-mobile">Prism Dynamics</div>
                        <div class="col-date hidden-tablet">2 days ago</div>
                        <div class="col-time">
                            <span>3:42</span>
                            <button class="icon-btn favorite-btn mr-2" data-id="s1">
                                <span class="material-symbols-outlined">favorite</span>
                            </button>
                            <button class="more-options-btn"><span class="material-symbols-outlined">more_vert</span></button>
                        </div>
                    </div>
                    
                    <!-- Track 2 -->
                    <div class="track-row">
                        <div class="col-num">2</div>
                        <div class="col-title track-info-cell">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuA1QGZKe3qEcYwsuZgu2TaDQ_25Qd1aXWeyifU7XQaratk5kkw7t3g5yv-s7D6eI4dv7RNJACn8JEcMRlCGLGljRWUdYnFiDHdupHJQPw8s4-8-BKOvq1t5vvTws1gulCpwIGERydjLDXs-N7bGp9-lMU2_X01UEDgIVXHh9qUnQzw8EABJotR9-Okrsqabgycw_KCZE_CNWCSFdlb4v6LoKWYyiB2_fJ5XgW9qMY0yqVUfKFm1_cOb7oc0W0PfOYHm3_c7AZuB57U" alt="Track Art">
                            <div class="track-info-text">
                                <span class="track-name">Subterranean Beats</span>
                                <span class="track-artist">The Foundation</span>
                            </div>
                        </div>
                        <div class="col-album hidden-mobile">The Foundation</div>
                        <div class="col-date hidden-tablet">Oct 12, 2023</div>
                        <div class="col-time">
                            <span>5:18</span>
                            <button class="icon-btn favorite-btn mr-2" data-id="s2">
                                <span class="material-symbols-outlined">favorite</span>
                            </button>
                            <button class="more-options-btn"><span class="material-symbols-outlined">more_vert</span></button>
                        </div>
                    </div>
                    
                    <!-- Track 3 -->
                    <div class="track-row">
                        <div class="col-num">3</div>
                        <div class="col-title track-info-cell">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCQis6dLXsTVweGpqyvkMtA6PRi6z_3mvcQtiZoNthgk7GC6JD7iTRkD-UA1gifBUglZcrgzGzOpryWDeupn7vbrt-FNhIZPtboSSj3_koJspnJ6CUgpKaZ5_eskRhkaotHldszZwJbUbp5sUHAAG9Hw4wuZ8u1ylSAg118EXGFx2sxDG5UruwSvqArxLUMpaFoga6kKWb1dM6utpi2QOSEdTGW2hcgICuX_JBP0bhbHA0Mbu9LRZ21hGjpDtbGvG9E7nrSQHRXpkk" alt="Track Art">
                            <div class="track-info-text">
                                <span class="track-name">Crystal Lattice</span>
                                <span class="track-artist">Vertex</span>
                            </div>
                        </div>
                        <div class="col-album hidden-mobile">Structural Sound</div>
                        <div class="col-date hidden-tablet">Oct 10, 2023</div>
                        <div class="col-time">
                            <span>4:05</span>
                            <button class="icon-btn favorite-btn mr-2" data-id="s3">
                                <span class="material-symbols-outlined">favorite</span>
                            </button>
                            <button class="more-options-btn"><span class="material-symbols-outlined">more_vert</span></button>
                        </div>
                    </div>
                    
                    <!-- Track 4 -->
                    <div class="track-row">
                        <div class="col-num">4</div>
                        <div class="col-title track-info-cell">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCJirJJFe2Lt-d4JWq-zFsNvr9RhvbbdKFFX2hZJur59djF6GY9vaoqcqPxTtoNu77QdHM-NMm8SCOqX187DER9OT73xxifWJrmFU0lLym6kSqEN3PGEdQcdZOP0sFmXsLOEniqraqRafh8VzZJHthV6JOfDtvJx_V5U6q52jZf-YLEBUcQ7zsrjVulWHrmXoOJnnEFsBTRPFbTM98-0tF7X2EOW6iM-n302BAvyvmN5t8VNJ0CC94bmSrtM7SN5b_uhPAFrYYlx0s" alt="Track Art">
                            <div class="track-info-text">
                                <span class="track-name">Midnight Synthesis</span>
                                <span class="track-artist">Alex Rivera</span>
                            </div>
                        </div>
                        <div class="col-album hidden-mobile">Obsidian EP</div>
                        <div class="col-date hidden-tablet">Oct 8, 2023</div>
                        <div class="col-time">
                            <span>6:22</span>
                            <button class="icon-btn favorite-btn mr-2" data-id="s4">
                                <span class="material-symbols-outlined">favorite</span>
                            </button>
                            <button class="more-options-btn"><span class="material-symbols-outlined">more_vert</span></button>
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
