<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sonic Prism - Artist Profile</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    
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
        <div class="content-wrapper artist-page p-0" id="app-content">
            <!-- Artist Hero Section -->
            <section class="artist-hero">
                <div class="artist-hero-bg">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAWQkhQmy6UL6wFu8ECEBFnbpHvbCUNoRCVL9yWE8YxIPgmsMx51Ecz2j0yPftwMNUpMgQsNInOLSndKiw-CneS5QuFNMiXLe9yrbc6oRWU6kDMOhcFAOfLV13Z2Lz9JldqY8F3AqKSctyprgmcAbR3JLPJs-hV7Ep0sXVqGT5seP__sxoyIuiEWo8K76AeAr1Va4UpNPz2DKYPZrlSHBdC673cmC63e8B8hbaqD2A9cxqqPWNbnMh6utISrvRz3xuJ7DrrvPNqHpY" alt="Artist Background">
                    <div class="artist-bg-gradient-bottom"></div>
                    <div class="artist-bg-gradient-side"></div>
                </div>
                
                <div class="artist-hero-content">
                    <div class="badge-verified">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">verified</span>
                        <span>VERIFIED ARTIST</span>
                    </div>
                    <h1 class="artist-title text-glow">The Ethereals</h1>
                    <div class="artist-hero-actions">
                        <p class="artist-listeners"><span class="highlight">12,482,903</span> monthly listeners</p>
                        <div class="artist-btn-group">
                            <button class="btn-play-large">
                                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">play_arrow</span> Play
                            </button>
                            <button class="btn-outline-glass">Following</button>
                            <button class="btn-icon-circle-glass"><span class="material-symbols-outlined">more_horiz</span></button>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Content Grid -->
            <div class="artist-content-grid">
                <!-- Popular Section -->
                <section class="artist-popular">
                    <div class="section-header">
                        <h2>Popular</h2>
                        <button class="btn-link">Show all</button>
                    </div>
                    
                    <div class="artist-track-list">
                        <!-- Track 1 -->
                        <div class="artist-track-row group-hover-bg">
                            <div class="col-num">
                                <span class="num-text">1</span>
                                <span class="material-symbols-outlined play-icon">play_arrow</span>
                            </div>
                            <div class="col-title">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDnhUHVVYG8-OdjreDGetkq5Zn_2VllsSu8gPOTxJjVI9miOzmLP85U4CezrOuBkZVBtc_w6uuQt2gWzcaTywqdU7j2rjvGlUtsAfSI0kC0GHSSgNHPzlH1CjrWVpauhyrcePIbhowNwh518MNMywpNUlwEhQpCNC5ro2LZe4DrV9UTFwM0XG1NjosC_-BbbbC68h0FCY13xECIsz2aMiiGCGDdAQvreHTfXWnYnRWW5o28xcTAvka5p9XxeN7BUcsmr8lhcRzPd3g" alt="Track">
                                <span>Midnight Spectrum</span>
                            </div>
                            <div class="col-streams hidden-mobile">4,203,190</div>
                            <div class="col-actions"><span class="material-symbols-outlined fav-icon">favorite</span></div>
                            <div class="col-time">3:42</div>
                        </div>
                        
                        <!-- Track 2 -->
                        <div class="artist-track-row group-hover-bg">
                            <div class="col-num">
                                <span class="num-text">2</span>
                                <span class="material-symbols-outlined play-icon">play_arrow</span>
                            </div>
                            <div class="col-title">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuByeUmYT0qqN87J20SyQ37oy-NSHE9kXGy_B-2iRZoQyfDWe-FjTU4aFBQ6vimt_FuMWm5pVCJrz_SV3Beor-BOS15CgLSFCJTcT-khawGGlZNe7wKJrrdEcEqpeVGF5JMwjjymmDrYlxrUujtDfWC117-3lkv6sms4UWZba6se8hiVSyakKboz9nSNHCTxIWmBaQBiAyud_emzVaf2KDkNjnvztXquMd9H3JsnGLdneh1sOv4Z-Jhu6l5PCgHM3laj-VM5CUPp70I" alt="Track">
                                <span>Neon Horizon</span>
                            </div>
                            <div class="col-streams hidden-mobile">2,940,211</div>
                            <div class="col-actions"><span class="material-symbols-outlined fav-icon">favorite</span></div>
                            <div class="col-time">4:15</div>
                        </div>
                        
                        <!-- Track 3 -->
                        <div class="artist-track-row group-hover-bg">
                            <div class="col-num">
                                <span class="num-text">3</span>
                                <span class="material-symbols-outlined play-icon">play_arrow</span>
                            </div>
                            <div class="col-title">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBa-JuWn8YIU5wG3-wzdyCWDw3vx17Nhaczer7dsmoUn3nyzhtosE90-iO5U76HRnc6wq-4q6hWXin0-u2SFGX2vdwI5sCteXQrXcrphtq5yBWPEiE0mxifOR9WcBG-F_SlAAmynnoBiu_-yhMujnH-tGAueVCHoX6gObeArPkKT9aMzI_hpQLwRvMA-NdnzmVKdD6mOsiXW5qdB2AmVSB7iumb4LDe6BTU2ap36cvGMF-W7v4yirg_JMYKfaW4dFkVL0Av73ULQkg" alt="Track">
                                <span>Prism Drift</span>
                            </div>
                            <div class="col-streams hidden-mobile">1,502,334</div>
                            <div class="col-actions"><span class="material-symbols-outlined fav-icon">favorite</span></div>
                            <div class="col-time">3:18</div>
                        </div>
                    </div>
                </section>
                
                <!-- Discography Section -->
                <section class="artist-discography">
                    <div class="section-header">
                        <h2>Discography</h2>
                        <div class="discography-tabs">
                            <span class="active">Albums</span>
                            <span>Singles & EPs</span>
                        </div>
                    </div>
                    
                    <div class="playlist-grid flex-row-cols-5">
                        <!-- Album Card -->
                        <div class="playlist-card group-hover-play glass-card">
                            <div class="playlist-card-image">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDRvIYwi-2hq0oVY8NYgRPfFhnlJW54fz0oqVSiXR7h4ibcGy3wLc3trXGNw0DbI17Ve0WT_SXnctTPOw5s3vXrBnboR4AkUNCmjsSNjoEOlM28rvlzwFTaFVgq86jFYHDN0htn_whmBxs3rzkW8ZFSWw1n5ncxkkPg8nYvSmjwXjFuP3gcaYEoUHVBt-4eVqY1r985R0f45_xOsGuz7Md934I9CazcTHcV5YgHoECnIVjCbMsTKZQO163n40OgVmn4s7DkOpFx5bI" alt="Echoes of Silence">
                                <div class="play-overlay"><span class="material-symbols-outlined">play_circle</span></div>
                            </div>
                            <div class="playlist-card-content">
                                <h4 class="playlist-title">Echoes of Silence</h4>
                                <p class="playlist-description">2024 • Album</p>
                            </div>
                        </div>
                        
                        <!-- Album Card 2 -->
                        <div class="playlist-card group-hover-play glass-card">
                            <div class="playlist-card-image">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCkAzr1FaM2kkfw56Exztb_YNZH4oT1aqqwVMR-jmHD8NrLSm3t3QGZMoCi9C1TNNNc3zkq5O1ARY9XaS7Yu_lZhW0ccNMogXDU10QMqVJ_LcT9sH0z-jrCLmg9AbjwuMmyKvggbNOp5nCFEuJK2XYVbcVDahAKK2BNeLmYg0bP1Nc_5I5EmutB7pLBp2t8BuNjmDPYy92ju-zmqbIpVf-VyByamluuKUcUKKy_oJHZvYRNbE8bI9Wk-Q4wDmDDeM8Fw0QNSPhuSSU" alt="Digital Rain">
                                <div class="play-overlay"><span class="material-symbols-outlined">play_circle</span></div>
                            </div>
                            <div class="playlist-card-content">
                                <h4 class="playlist-title">Digital Rain</h4>
                                <p class="playlist-description">2023 • Album</p>
                            </div>
                        </div>
                        
                        <!-- Album Card 3 -->
                        <div class="playlist-card group-hover-play glass-card hidden-mobile">
                            <div class="playlist-card-image">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDqtsPqhhjZvoP2yX6heovnbzCzJpURZR86sZb3xX7XTAmgc67HsjaQ0OuDHQE4eLxJOaTDFZzc7X3dw4bjcZ14Z4Y-zkvxuiC3oepB2QaNrQ8SI370SLfje3v3WIDwkhuwcQ9EpR4HpT7DqE3cbl6YO4ubu1xyNUcubfzooX66N3rvgmiYnOA5YeruzZPhbWWr6QZ79sGgo3hHJclxc0Zh5ZXGh-MFaAv7swEC9tFa7P1wP3-uKaLCVmkeEpVXLFpM3IpY7SzGGG8" alt="Lunar Phase">
                                <div class="play-overlay"><span class="material-symbols-outlined">play_circle</span></div>
                            </div>
                            <div class="playlist-card-content">
                                <h4 class="playlist-title">Lunar Phase</h4>
                                <p class="playlist-description">2022 • Album</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
    
    <!-- Music Player -->
    <?php include 'components/player.php'; ?>
    
    <!-- JavaScript -->
    <script src="assets/js/script.js"></script>
</body>
</html>
