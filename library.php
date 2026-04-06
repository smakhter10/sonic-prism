<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sonic Prism - Library</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/pages.css">
</head>
<body>
    <!-- Sidebar Navigation -->
    <?php include 'components/sidebar.php'; ?>
    
    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Navigation -->
        <?php include 'components/header.php'; ?>
        
        <!-- Page Content -->
        <div class="content-wrapper" id="app-content">
            <div class="library-header-wrapper">
                <div>
                    <h2 class="section-title">My Library</h2>
                    <p class="section-subtitle">Manage your playlists, artists, and favorite albums.</p>
                </div>
                <div class="library-actions">
                    <button class="lib-action-btn">
                        <span class="material-symbols-outlined">sort</span>
                        <span>Alphabetical</span>
                    </button>
                    <button class="lib-action-btn">
                        <span class="material-symbols-outlined">filter_list</span>
                        <span>Filter</span>
                    </button>
                </div>
            </div>
            
            <div class="library-tabs no-scrollbar">
                <button class="lib-tab active">Playlists</button>
                <button class="lib-tab">Podcasts</button>
                <button class="lib-tab">Artists</button>
                <button class="lib-tab">Albums</button>
            </div>
            
            <div class="library-grid flex-row-cols-5">
                <!-- Featured Playlist -->
                <div class="lib-featured-card glass-card">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDmJ8RTfNuiHvToRBV9Lp2wHOHa4ce8UWgRpClAwsgYpZITS3zbH2zQxqv8-vfIqS24twyZKXmDBuxHhD4P3h6xa31S3t27h198toSDiHMf5GXqVFVDBVlUq5RGIqC2GZehSl9im_p12ccVwpLg1jyfrKk8JVw5IzSdYgs-OtWmtRFy7QhkNCIpnwePxzs9z4NAPHqaMEE9AN4X8sQdxUfhTeCl0JhQRzvxz6ee5XgFVyrLI3IalhqqNZDZn8Mfk7YKO8Snh_cOcy4" alt="Lofi Beats">
                    <div class="lib-card-overlay bg-fade-up"></div>
                    <div class="lib-featured-content">
                        <div class="lib-featured-text">
                            <span class="badge">MOST PLAYED</span>
                            <h3>Late Night Sessions</h3>
                            <p>128 Tracks • 8 hrs 42 mins</p>
                        </div>
                        <button class="play-btn-large animate-hover-scale">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
                        </button>
                    </div>
                </div>
                
                <!-- Regular Cards -->
                <div class="playlist-card group-hover-play">
                    <div class="playlist-card-image">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBQLwwf4116nDCIfEY4S1zUYFBWLR8MsDITXundkW6a2Re9h_qPevPNQ5GOs70DMIDxYW4JFDBMSZqzeH_dZza79sZpxNRUzzAAdebD9I-NJ1A6FAJbvpGkTka4IXzzp_vN-OYm7KyxWRvrnDYyZuo77kxcZHa6GSvjLhUkwwkZ1KVOXIMj1PN89pJ823jwo3i28k29NbWWSwyLEzmHSzCAhrmX-nCHGbxfXXw532n0-aUhs8XTxe5BF0zqhVwiIleoaeCqj55Y6Xw" alt="Modern Jazz">
                        <div class="play-overlay"><span class="material-symbols-outlined">play_circle</span></div>
                    </div>
                    <div class="playlist-card-content">
                        <h4 class="playlist-title">Urban Jazz Explorations</h4>
                        <p class="playlist-description">By Sonic Prism</p>
                    </div>
                </div>
                
                <div class="playlist-card group-hover-play">
                    <div class="playlist-card-image">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDz-hRW8ZZMqaJ7l9HRlEoEn6vBmZSA7o-MY4PT9GUTgEkaGU2Lha74k6dDbyxFtomgC7Rgml_rPLKlaUKupg4lIDyM4fbLLkMoyhf3FeRU9KT0UEGiPpDExiomtafrXEfyat2h9VoAlHYxdL-1NF9mx_Jhgsx65c1e152pJshoY8QcKHE7BXFxJuH4VqLD9Cnqq7EiMYHcVhEuOojQu9tx0O5MGR6DmQAadWew7Sk2_NgBzugUBTmwgqnxZbQRNxJj2uggCrA8rWM" alt="Techno Core">
                        <div class="play-overlay"><span class="material-symbols-outlined">play_circle</span></div>
                    </div>
                    <div class="playlist-card-content">
                        <h4 class="playlist-title">Digital Pulse 2024</h4>
                        <p class="playlist-description">By Sarah Chen</p>
                    </div>
                </div>
                
                <div class="playlist-card group-hover-play">
                    <div class="playlist-card-image">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCEMCiDTTQwOl1LHukSpv3lS-NbQHEXRK0goOgiVp_heuBmbRDXQQBEns6BgVqGrLMOmnyi4KWm6ma18C6QTCMAZzKfdZ4nkFk9YsOG2zEKaKRdBThjK8dI0OWTUrvKPs7Q_HJFKuBMEMXsHhcBkyJk6HpWY5aCp46j9dbi90d-kPzHxzvjmQhMy5kweP-lTnArVSbvrhaNNa1yceHp6xwdwNQ5SAUbv2hg5nCbqzx8NRyPQmBaoTt49leo9jrCjOQius2oRQQUASU" alt="Indie Folk">
                        <div class="play-overlay"><span class="material-symbols-outlined">play_circle</span></div>
                    </div>
                    <div class="playlist-card-content">
                        <h4 class="playlist-title">Acoustic Mornings</h4>
                        <p class="playlist-description">By Marcus Thorne</p>
                    </div>
                </div>
                
                <!-- Liked Songs Banner -->
                <div class="lib-liked-songs-card">
                    <div class="liked-bg-blur"></div>
                    <div class="liked-bg-icon">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">favorite</span>
                    </div>
                    <div class="liked-content">
                        <div>
                            <h3 class="section-title">Liked Songs</h3>
                            <p class="liked-subtitle">1,432 tracks you love</p>
                        </div>
                        <div class="liked-users">
                            <div class="liked-avatars">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCPF2YFnMK35jMQruXGUMgTXd-VmmP2qUZ9D0KaWulAMim60cZ_bPyZJMXXBPA1CzrcCc79azDEGcm6b72yui7DHd19P0w-b5_SVxTawa60_E2y1iNdnxEyODWSZrgjXKJnpmXiLT-hxwNwu1pXHF2EkZFkYz9aC4GCQ3qOtAAf61j6wEc9Ot_jmkb-PNSuyfZ8A3ZPn7jGM2PUHe_vssms0vPzLipsJpBQEROfkcGyZorRoBOqmihEARactxTxagmSJFAvWED6RSE" alt="Artist">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAm4_GRhaK3ryX_mhz055VbO29fOl8y23Uo1gsYWmGUhcSn0mQvjy5dkS2HURWkPezT0pfJl2YG02yxC39JDGWRvm7dm03o5hw5NtjHLHnMzf17In50-Z-0-r8R_0RG-6xtjDOFqdgSdZVgtm7WTPhXndGhb3WSIEl7IWqa2lUNcOXZ-lPlfI7JW1YzwOxnBWIh21hMCVIjf4TPXZJdl6b7ig1Iq8JNqKOj7hi7MgwORguXeh8IBLBGxcgyqIrDAQq9mYYC__tWI98" alt="Artist">
                            </div>
                            <span class="added-text">+ 42 added</span>
                        </div>
                    </div>
                </div>
                
                <!-- Additional Card -->
                <div class="playlist-card group-hover-play">
                    <div class="playlist-card-image">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBhNJ2uaUiyV5t9IIVjAO99YHcsK-4Iy8M2N46yBn4wYzVbm_BkThEqNCuJHB4lSn7wgGbefqhFVUE-7NImb0kBRDEgw2cjrZQq77ug5iK7F6hIRv6elen6r1LBN0FkHbHONKK1FgkphJkKYpuTHVoOD9pFa97vNQu5_HAOKjdqPYGUefzovKMvH-yCAGZ85upDN1-36o_QrevK66ZHpbLZP46I5IKK6iXnTKVArKtvP1LJel1wxE1Jvn_xtWccB2tbR0EKZUObJoI" alt="Synthwave">
                        <div class="play-overlay"><span class="material-symbols-outlined">play_circle</span></div>
                    </div>
                    <div class="playlist-card-content">
                        <h4 class="playlist-title">Retro Futures</h4>
                        <p class="playlist-description">By Alex Rivers</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <!-- Music Player -->
    <?php include 'components/player.php'; ?>
    
    <!-- JavaScript -->
    <script src="assets/js/script.js"></script>
</body>
</html>
