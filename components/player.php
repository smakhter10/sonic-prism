<footer class="music-player">
    <!-- Currently Playing -->
    <div class="player-left">
        <div class="now-playing-thumbnail">
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuByes9g8Pr4SEk5AIegJWqwgUCAUMPOw3azms_Of3v0bG8fNpzPesXlR5KqGGaTlVAuRBTgK6r6VAPvZbyZn8l1q4njwXcQpudYrxHv7papSuHCsCRfnQB85AxIei_N28UoN0KM9-S9Vf_kuV7wG_p7Euhn9GwKNKS_8zL2iON9Vb7imaXou1JSGFDqsXeZFuqano2LfRagDWn1mPhr52A_Mg9Zs7exeDkvL8g1zjdOEJZzyVWLXS7CM_jRjQrUWkxUPSPWfHWU8zI" alt="Now Playing">
        </div>
        <div class="now-playing-info">
            <span class="now-playing-title">Solar Flare</span>
            <span class="now-playing-artist">Neon Pulse</span>
        </div>
        <button class="icon-btn player-heart">
            <span class="material-symbols-outlined">favorite</span>
        </button>
    </div>
    
    <!-- Playback Controls -->
    <div class="player-center">
        <div class="playback-controls">
            <button class="control-btn shuffle-btn">
                <span class="material-symbols-outlined">shuffle</span>
            </button>
            
            <button class="control-btn prev-btn">
                <span class="material-symbols-outlined">skip_previous</span>
            </button>
            
            <button class="control-btn play-btn-main">
                <span class="material-symbols-outlined">play_circle</span>
            </button>
            
            <button class="control-btn next-btn">
                <span class="material-symbols-outlined">skip_next</span>
            </button>
            
            <button class="control-btn repeat-btn">
                <span class="material-symbols-outlined">repeat</span>
            </button>
        </div>
        
        <!-- Progress Bar -->
        <div class="progress-container">
            <span class="progress-time">1:24</span>
            <div class="progress-bar">
                <div class="progress-fill"></div>
                <div class="progress-handle"></div>
            </div>
            <span class="progress-time">4:15</span>
        </div>
    </div>
    
    <!-- Secondary Controls -->
    <div class="player-right">
        <button class="icon-btn">
            <span class="material-symbols-outlined">lyrics</span>
        </button>
        
        <button class="icon-btn">
            <span class="material-symbols-outlined">queue_music</span>
        </button>
        
        <div class="volume-control">
            <span class="material-symbols-outlined">volume_up</span>
            <div class="volume-bar">
                <div class="volume-fill"></div>
            </div>
        </div>
        
        <button class="icon-btn">
            <span class="material-symbols-outlined">fullscreen</span>
        </button>
    </div>
</footer>
