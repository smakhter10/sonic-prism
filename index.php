<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sonic Prism - Home</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="assets/css/style.css?v=2">
    <link rel="stylesheet" href="assets/css/pages.css?v=2">
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
            <!-- Hero Carousel Section -->
            <section class="section-carousel">
                <div class="section-header">
                    <h2 class="section-title">Recommended for You</h2>
                    <div class="carousel-controls">
                        <button class="carousel-btn carousel-prev">
                            <span class="material-symbols-outlined">chevron_left</span>
                        </button>
                        <button class="carousel-btn carousel-next">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </button>
                    </div>
                </div>
                
                <div class="carousel-container">
                    <!-- Left Card -->
                    <div class="carousel-card carousel-card-side">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuARXxJy8pFonLywDDLxjt6YDroWCA88835hcq2c7LZ5vWX9rzDbx_aWYSLj_fy0HMHY8f_wqXri5aI_xVdcG0_2ggIV1u-VEUPY206Gz-wvg7rGS1-xp_92caKG3U3M5MFZ-uq272ZobG1vkJsnY3SJ06gmHiwsWCiIG8KkYjM2Lr6Pxdkp11raAHzC_4Wab1I_tRMvv2XhMy4p6ZqmmC04nU1M9qKDw-dgq8I-qldNSRLyDdnN9afV4cPr00UeWVQW5f6NZHdMj_s" alt="Cyber Resonance">
                        <div class="carousel-card-info">
                            <h4>Cyber Resonance</h4>
                            <p>Synthwave Mix</p>
                        </div>
                        <div class="carousel-card-overlay"></div>
                        <div class="carousel-card-content">
                            <div class="carousel-card-text">
                                <h3>Cyber Resonance</h3>
                                <p>Synthwave Mix</p>
                            </div>
                            <button class="play-btn play-btn-large">
                                <span class="material-symbols-outlined">play_arrow</span>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Center Card (Featured) -->
                    <div class="carousel-card carousel-card-featured">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAiNziwfoWBrnLP-3LgWb_PAtdovPwfdwtHhjsqEED9Z5g_kPiBVZP75SKgvHiB-_xUPNdFNMEhvRxqCRr1a4sM-FYUdh803HjFCYK0YR9i3tx8ovtRVx_PnCdbt220VI6gy4wHeHxf-B-BB4VFev391oGnGpz1Ja42TwjFC7DCl6m4MpDq3AXzks2GIqEM_2tgVri64eHujsHINUqdgmF-vRV1Q2BLpzRpWyGgdG-6gj-yzfdBIxXK4n_3GEjG606yKEjanEmktl0" alt="Echoes of Midnight">
                        <div class="carousel-card-info">
                            <h4>Echoes of Midnight</h4>
                            <p>Jon Hickman</p>
                        </div>
                        <div class="carousel-card-overlay"></div>
                        <div class="carousel-card-content">
                            <div class="carousel-card-text">
                                <h3>Echoes of Midnight</h3>
                                <p>Jon Hickman</p>
                            </div>
                            <button class="play-btn play-btn-large">
                                <span class="material-symbols-outlined">play_arrow</span>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Right Card -->
                    <div class="carousel-card carousel-card-side">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCCGquVu1pzDVTKZ_3uUOS2Qn-seleDAyRJssnNtnPxec3FcP1PutGb1ccCT08MkSijiOsv-1pe43s2We7QOaL8KyUFlepV6GlRSN-O3DFSNDKs5FrkcUjjLS1nxoypfcJdwO3gyCNBo9p8rSpvL4CgHgL2I3ZN67Dqn1WkLGBGs6P_0B5wFZBG9IyZkjIFGF_66TWc60C5ybjGqvdH9uwHdROtUN6OL2CMVcB_qb3SVfQlPJr-w9RyOguY1HX8eHT2WxaJCPWAkyo" alt="Live Energy">
                        <div class="carousel-card-info">
                            <h4>Live Energy</h4>
                            <p>Concert</p>
                        </div>
                        <div class="carousel-card-overlay"></div>
                        <div class="carousel-card-content">
                            <div class="carousel-card-text">
                                <h3>Live Energy</h3>
                                <p>Concert</p>
                            </div>
                            <button class="play-btn play-btn-large">
                                <span class="material-symbols-outlined">play_arrow</span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Made For You Section -->
            <section class="section-grid animate-content-row" style="animation-delay: 0.2s;">
                <div class="section-header">
                    <h2 class="section-title">Made For You</h2>
                    <a href="#" class="see-all-link">See All</a>
                </div>
                
                <div class="playlist-grid">
                    <?php 
                    $playlists = [
                        [
                            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAKiOBT9XVRAs6UzMwxxP-qYXm0Yt6uu6gAc_eUDgrYZjhjQUpcwpKwQsqYmfdI3pANuHE157RPCjDzr_i98egPjvMfOmORGKQdUasnOb0NkWm5iQiC3oflTclAW67W9yghUQUguk-8si0tbhanBtMvDE_8mJ9D6l4EMYxpyZtKoOTBcfMDNPjf-KfyRAchfHW_GSU8CQ-2FxEYputBbRiRUeBffuOGqiGpgKjFN637KS9KYoiCuZ9d01nHWehRcO902oKc4nJAbRc',
                            'title' => 'Focus Flow',
                            'description' => 'Lofi beats for deep work'
                        ],
                        [
                            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCCGquVu1pzDVTKZ_3uUOS2Qn-seleDAyRJssnNtnPxec3FcP1PutGb1ccCT08MkSijiOsv-1pe43s2We7QOaL8KyUFlepV6GlRSN-O3DFSNDKs5FrkcUjjLS1nxoypfcJdwO3gyCNBo9p8rSpvL4CgHgL2I3ZN67Dqn1WkLGBGs6P_0B5wFZBG9IyZkjIFGF_66TWc60C5ybjGqvdH9uwHdROtUN6OL2CMVcB_qb3SVfQlPJr-w9RyOguY1HX8eHT2WxaJCPWAkyo',
                            'title' => 'On Repeat',
                            'description' => 'Your top tracks from this week'
                        ],
                        [
                            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuChn9iIH-ZoDjCciN7aE6jqMIFANp4uJMy_dAe1ka_qOaw62oMFMy4pgLMLrKKlbhaTlfPWsCwb1MRdxCPzq6LkYUCRN9wL2wlC7gz2daAD4VfKOdxjxUwR_yiT_ppaZ_2oeak0OW3uIdsLzCrUeOt63U9mPUcuLXFVxLvmR0Y9Odvzw9IfgQkZr1bh7zxXw3PUUDhp2C47htASDIZh6G3prtw-MJGVp9KkZYXJx3ZNxaEBdK3XurDFFF8CU0BaG3h2c0ZEodLYAxE',
                            'title' => 'Discover Weekly',
                            'description' => 'New music tailored to you'
                        ],
                        [
                            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDwycoqEU9Dw-Tsdd5fNmoU-TywjZB11WeK5ZHCJyTm2MZk4rUz5CJxi5vX_PvlgqeHyDyqCXZmBMKJGe0vToAISMZFkDKjpnF9_EPlDUEPAqRSvBz3Mn5fLEO0AzBSDK716zMYcV3T1DFZJaNlMTkNO0gl_iQRpf07M_DlW9mr4Rfe3MACaXJZiG4XO1dR5gYg6p65Tg8y4LuvSNPVPjrQYfyKvVGKN_tKp2-zMkbiyNjUlBIpwLBX-afcJeedN6Fa2mszl2qUlK0',
                            'title' => 'Ambient Dreams',
                            'description' => 'Lose yourself in soundscapes'
                        ],
                        [
                            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuD-j_rgVjTcQBv_LxOgYCuTh9cuqzsnkrzCQS-5BJV_bsIS2_HtYWS9HgEi_NFwRz9S-hoN0YwX71uCEM4Wld3qY1nITdAiCdk0UIlkByVtrAVZyC7ldeo9UV9Nt06yCA5V98PqXToXAp_I79-xK_xWecYBFM-FX5iArQYXLiGm5RS3HbsrruBi88vgB6rs5J9HKsdwRE5og6QkuK2838FZMv94yzqNu_s_VTds0nEh5O_ttO8_-XO4pSgsxLmxY5VZ-dv2201-t5E',
                            'title' => 'Summit Path',
                            'description' => 'Echo Valley'
                        ]
                    ];
                    
                    foreach ($playlists as $playlist) {
                        include 'components/card.php';
                    }
                    ?>
                </div>
            </section>
            
            <!-- Trending Now Section -->
            <section class="section-trending animate-content-row" style="animation-delay: 0.4s;">
                <div class="section-header">
                    <h2 class="section-title">Trending Now</h2>
                </div>
                
                <div class="trending-grid">
                    <!-- Trending Item 1 -->
                    <div class="trending-item">
                        <div class="trending-item-info">
                            <span class="trending-number">1</span>
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAiNziwfoWBrnLP-3LgWb_PAtdovPwfdwtHhjsqEED9Z5g_kPiBVZP75SKgvHiB-_xUPNdFNMEhvRxqCRr1a4sM-FYUdh803HjFCYK0YR9i3tx8ovtRVx_PnCdbt220VI6gy4wHeHxf-B-BB4VFev391oGnGpz1Ja42TwjFC7DCl6m4MpDq3AXzks2GIqEM_2tgVri64eHujsHINUqdgmF-vRV1Q2BLpzRpWyGgdG-6gj-yzfdBIxXK4n_3GEjG606yKEjanEmktl0" alt="Midnight in Paris">
                            <div class="trending-text">
                                <h5>Midnight in Paris</h5>
                                <p>The Jazz Quintet</p>
                            </div>
                        </div>
                        <div class="trending-actions">
                            <span class="trending-duration">3:42</span>
                            <button class="icon-btn favorite-btn">
                                <span class="material-symbols-outlined">favorite</span>
                            </button>
                            <button class="icon-btn more-btn">
                                <span class="material-symbols-outlined">more_horiz</span>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Trending Item 2 -->
                    <div class="trending-item">
                        <div class="trending-item-info">
                            <span class="trending-number">2</span>
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuC_xjm7UICdvnHO_MifhkUIA6PaulzUxcQjXUQwIuxh_dexGaqb06CIl9tyoCVNiHulRuaRwHjn1Y06zk2ZPj6s6pXg6e_A11_JR0APbd32y4bmr2rwznneUqsxOX1zkffYUMbXGQZsGz9nDnDiOUmiAxkdgTmBmfnJis080gH-5Ut93BT_B5_BjT_TejrT3ilua_4F6TZ-n-sAoBdNl_icLDWNEpigxJLKh-HLL-GPLCs_qUMSeQOWXQa6ycleHf35-MZuEqAz-HE" alt="Solar Flare">
                            <div class="trending-text">
                                <h5>Solar Flare</h5>
                                <p>Neon Pulse</p>
                            </div>
                        </div>
                        <div class="trending-actions">
                            <span class="trending-duration">4:15</span>
                            <button class="icon-btn favorite-btn">
                                <span class="material-symbols-outlined">favorite</span>
                            </button>
                            <button class="icon-btn more-btn">
                                <span class="material-symbols-outlined">more_horiz</span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Recommended Artists Section -->
            <section class="section-artists animate-content-row" style="animation-delay: 0.6s;">
                <div class="section-header">
                    <h2 class="section-title">Recommended Artists</h2>
                </div>
                
                <div class="artists-grid">
                    <!-- Artist 1 -->
                    <div class="artist-card" onclick="navigateTo('artist.html?id=a1')">
                        <div class="artist-image">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCYQeI_TJ4LnqxuTbSSy6GDE8rEA5SW2EbOVmRP3P6k6v0XVoKV5fHJvK9SJ1H2KPb-HMvUrL1vKOas9M98gRwQo36luY0f16QYlgc32S_-b_Kd9Dk5e0K7-aCiYu_OPoApgNrWHvuJFJlXpImOJcV5PXSXJNFEuIDmCJnTQMPC_31CWy9Z8sN2iU8hKd3CnaISgcrgS_lavqLkiOhwW2lPO7UiByt1JhzXEWvJwSZ_IFIFE2XzQ5ohGMnFnfK2oyjb3rmlcBEtgnw" alt="Elena Gray">
                        </div>
                        <span class="artist-name">Elena Gray</span>
                    </div>
                    
                    <!-- Artist 2 -->
                    <div class="artist-card" onclick="navigateTo('artist.html?id=a2')">
                        <div class="artist-image">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDgvRuzwvHFTF8O2-0GLmY8lUAECl2RMl4Wx7e87hFuRbTOIdcVv9XX0mjooc4gQGB1h3TS5VukwP1S5OyouLwnz3JEXWlKE70m0sUGtZCt5eKZvPSJeGQ4hYQYxCdzu5wwiL746_YkTke4XKgW07q1sgdqNrkzOjDrGO0OXvnX1_OS53jbOiYmJC33a4BP5hWpfh1jABeaZx80FBVqIQhz1GPLBmnnY7jCA1aTOIx9Noxr4ZSnOxtoTyWSD5Govi_iRY43oQC5PwU" alt="The Architect">
                        </div>
                        <span class="artist-name">The Architect</span>
                    </div>
                    
                    <!-- Artist 3 -->
                    <div class="artist-card" onclick="navigateTo('artist.html?id=a3')">
                        <div class="artist-image">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBEdKHIKLeFVuuNhlKNWzWUzwsLRfYzCnQ6_7QAsf6-vmKHWjGf5SCLlS2UovTsBro1yYaZXnmmaEg573SrgE5YeiokmDMvYSZMXu-EXqnXR__iWJYSKeGwn5DylkoI5imUvfXckhv0TNyGjjn4r3V5Kz3kM20OsM9sRgIHeOwlEMg4mJzQiMDGp-BQYZrcUefiZDjzU_Lh9RiympWOT648C6UU6nX3RQ8Qc8KjlZyJzTWUTELDwKslbVQBFb_pGcTNDr-LAgyjy9s" alt="Sola">
                        </div>
                        <span class="artist-name">Sola</span>
                    </div>
                    
                    <!-- Artist 4 -->
                    <div class="artist-card" onclick="navigateTo('artist.html?id=a4')">
                        <div class="artist-image">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDHrKJXDS1w2DHO-YuMlTn2IE4_kMeUPCr8aePF4_x1_zLUWJd7J6IFcql6JPRCmWqsraTsx7g3ZUS6HnYZ8BUZMD8XD5O-4sUmajCU436sXvCTr5X2FaMUOWbZjjTE7I3KG-T74PWI8FhWrpUXWeb7SzI99ySbVlz4fz6Ru_laGFsoaoIgcDiilfqzGjMUe9ZUXZdauLmkxTnk-EpUhXA3UKLa-Qt5illO-t6FuxWCl1IaMvmuxZ1hnvO3I4XqX4vzxLPMC7cikvY" alt="Julian Knox">
                        </div>
                        <span class="artist-name">Julian Knox</span>
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
