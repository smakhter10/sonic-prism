<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sonic Prism - Search</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="assets/css/style.css?v=2">
    <link rel="stylesheet" href="assets/css/pages.css?v=2">

</head>
<body class="bg-surface text-on-surface font-body overflow-x-hidden">
    <!-- Sidebar Navigation -->
    <?php include 'components/sidebar.php'; ?>
    
    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Navigation -->
        <?php include 'components/header.php'; ?>
        
        <div class="content-wrapper search-container" id="app-content">
            <!-- Search Bar -->
            <div class="search-input-wrapper">
                <span class="material-symbols-outlined search-input-icon">search</span>
                <input type="text" id="main-search-input" class="search-input-large" placeholder="What do you want to listen to?" autocomplete="off">
            </div>
            
            <div id="search-idle-state" class="search-idle-state active">
                <section class="mb-5">
                    <h2 class="section-title mb-4" style="font-family: 'Manrope', sans-serif; font-weight: 800; font-size: 1.5rem;">Browse all</h2>
                    <div class="browse-grid">
                        <div class="category-card" style="background-color: #E13300;">
                            <h3>Pop</h3>
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCYQeI_TJ4LnqxuTbSSy6GDE8rEA5SW2EbOVmRP3P6k6v0XVoKV5fHJvK9SJ1H2KPb-HMvUrL1vKOas9M98gRwQo36luY0f16QYlgc32S_-b_Kd9Dk5e0K7-aCiYu_OPoApgNrWHvuJFJlXpImOJcV5PXSXJNFEuIDmCJnTQMPC_31CWy9Z8sN2iU8hKd3CnaISgcrgS_lavqLkiOhwW2lPO7UiByt1JhzXEWvJwSZ_IFIFE2XzQ5ohGMnFnfK2oyjb3rmlcBEtgnw" alt="Pop">
                        </div>
                        <div class="category-card" style="background-color: #1E3264;">
                            <h3>Rock</h3>
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuD-j_rgVjTcQBv_LxOgYCuTh9cuqzsnkrzCQS-5BJV_bsIS2_HtYWS9HgEi_NFwRz9S-hoN0YwX71uCEM4Wld3qY1nITdAiCdk0UIlkByVtrAVZyC7ldeo9UV9Nt06yCA5V98PqXToXAp_I79-xK_xWecYBFM-FX5iArQYXLiGm5RS3HbsrruBi88vgB6rs5J9HKsdwRE5og6QkuK2838FZMv94yzqNu_s_VTds0nEh5O_ttO8_-XO4pSgsxLmxY5VZ-dv2201-t5E" alt="Rock">
                        </div>
                        <div class="category-card" style="background-color: #8D67AB;">
                            <h3>Chill</h3>
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDHrKJXDS1w2DHO-YuMlTn2IE4_kMeUPCr8aePF4_x1_zLUWJd7J6IFcql6JPRCmWqsraTsx7g3ZUS6HnYZ8BUZMD8XD5O-4sUmajCU436sXvCTr5X2FaMUOWbZjjTE7I3KG-T74PWI8FhWrpUXWeb7SzI99ySbVlz4fz6Ru_laGFsoaoIgcDiilfqzGjMUe9ZUXZdauLmkxTnk-EpUhXA3UKLa-Qt5illO-t6FuxWCl1IaMvmuxZ1hnvO3I4XqX4vzxLPMC7cikvY" alt="Chill">
                        </div>
                        <div class="category-card" style="background-color: #006450;">
                            <h3>Focus</h3>
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDgvRuzwvHFTF8O2-0GLmY8lUAECl2RMl4Wx7e87hFuRbTOIdcVv9XX0mjooc4gQGB1h3TS5VukwP1S5OyouLwnz3JEXWlKE70m0sUGtZCt5eKZvPSJeGQ4hYQYxCdzu5wwiL746_YkTke4XKgW07q1sgdqNrkzOjDrGO0OXvnX1_OS53jbOiYmJC33a4BP5hWpfh1jABeaZx80FBVqIQhz1GPLBmnnY7jCA1aTOIx9Noxr4ZSnOxtoTyWSD5Govi_iRY43oQC5PwU" alt="Focus">
                        </div>
                        <div class="category-card" style="background-color: #503750;">
                            <h3>Gaming</h3>
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCCGquVu1pzDVTKZ_3uUOS2Qn-seleDAyRJssnNtnPxec3FcP1PutGb1ccCT08MkSijiOsv-1pe43s2We7QOaL8KyUFlepV6GlRSN-O3DFSNDKs5FrkcUjjLS1nxoypfcJdwO3gyCNBo9p8rSpvL4CgHgL2I3ZN67Dqn1WkLGBGs6P_0B5wFZBG9IyZkjIFGF_66TWc60C5ybjGqvdH9uwHdROtUN6OL2CMVcB_qb3SVfQlPJr-w9RyOguY1HX8eHT2WxaJCPWAkyo" alt="Gaming">
                        </div>
                    </div>
                </section>
                
                <section style="margin-top: 3rem;">
                    <h2 class="section-title mb-4" style="font-family: 'Manrope', sans-serif; font-weight: 800; font-size: 1.25rem;">Recommended for you</h2>
                    <div class="recommended-grid">
                        <div class="recommended-card glass-hover-bg">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuARXxJy8pFonLywDDLxjt6YDroWCA88835hcq2c7LZ5vWX9rzDbx_aWYSLj_fy0HMHY8f_wqXri5aI_xVdcG0_2ggIV1u-VEUPY206Gz-wvg7rGS1-xp_92caKG3U3M5MFZ-uq272ZobG1vkJsnY3SJ06gmHiwsWCiIG8KkYjM2Lr6Pxdkp11raAHzC_4Wab1I_tRMvv2XhMy4p6ZqmmC04nU1M9qKDw-dgq8I-qldNSRLyDdnN9afV4cPr00UeWVQW5f6NZHdMj_s" alt="Midnight Pulse">
                            <div>
                                <h4 style="font-weight: 700; color: white;">Midnight Pulse</h4>
                                <p style="font-size: 0.8rem; color: var(--on-surface-variant); margin-top: 0.25rem;">Vibe Collectors • 2024</p>
                            </div>
                        </div>
                        <div class="recommended-card glass-hover-bg">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuChn9iIH-ZoDjCciN7aE6jqMIFANp4uJMy_dAe1ka_qOaw62oMFMy4pgLMLrKKlbhaTlfPWsCwb1MRdxCPzq6LkYUCRN9wL2wlC7gz2daAD4VfKOdxjxUwR_yiT_ppaZ_2oeak0OW3uIdsLzCrUeOt63U9mPUcuLXFVxLvmR0Y9Odvzw9IfgQkZr1bh7zxXw3PUUDhp2C47htASDIZh6G3prtw-MJGVp9KkZYXJx3ZNxaEBdK3XurDFFF8CU0BaG3h2c0ZEodLYAxE" alt="Synth Horizon">
                            <div>
                                <h4 style="font-weight: 700; color: white;">Synth Horizon</h4>
                                <p style="font-size: 0.8rem; color: var(--on-surface-variant); margin-top: 0.25rem;">Neon Dreams • 2023</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            
            <div id="search-results-container">
                <!-- Songs Results -->
                <section class="search-results-section" id="results-songs">
                    <h2 class="section-title mb-4">Songs</h2>
                    <div class="artist-track-list" id="songs-result-list">
                        <!-- Populated by JS -->
                    </div>
                </section>
                
                <!-- Artists Results -->
                <section class="search-results-section" id="results-artists">
                    <h2 class="section-title mb-4">Artists</h2>
                    <div class="results-grid" id="artists-result-list">
                        <!-- Populated by JS -->
                    </div>
                </section>
                
                <!-- Playlists Results -->
                <section class="search-results-section" id="results-playlists">
                    <h2 class="section-title mb-4">Playlists</h2>
                    <div class="results-grid" id="playlists-result-list">
                        <!-- Populated by JS -->
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
