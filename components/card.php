<div class="playlist-card">
    <div class="playlist-card-image">
        <img src="<?php echo $playlist['image']; ?>" alt="<?php echo $playlist['title']; ?>">
        <button class="play-btn">
            <span class="material-symbols-outlined">play_arrow</span>
        </button>
    </div>
    <div class="playlist-card-content">
        <h4 class="playlist-title"><?php echo $playlist['title']; ?></h4>
        <p class="playlist-description"><?php echo $playlist['description']; ?></p>
    </div>
</div>
