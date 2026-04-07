// ======================================
// SONIC PRISM - MAIN JAVASCRIPT (SPA ENGINE)
// ======================================

const AppState = {
    songs: [],
    playlists: [],
    artists: [],
    currentQueue: [], // Array of song objects
    currentTrackIndex: 0,
    audio: new Audio(),
    isPlaying: false,
    isShuffled: false,
    isRepeating: false,
    volume: 1
};

// ======================================
// INITIALIZATION
// ======================================
document.addEventListener('DOMContentLoaded', async function() {
    await loadData();
    initGlobalScripts();
    initPageScripts();
    renderDynamicContent();
    setupSPARouting();
    
    console.log('🎵 Sonic Prism SPA initialized successfully!');
});

async function loadData() {
    try {
        const [songsRes, playlistsRes, artistsRes] = await Promise.all([
            fetch('data/songs.json'),
            fetch('data/playlists.json'),
            fetch('data/artists.json')
        ]);
        AppState.songs = await songsRes.json();
        AppState.playlists = await playlistsRes.json();
        AppState.artists = await artistsRes.json();
        
        // Handle audio errors gracefully
        AppState.audio.onerror = () => {
            console.warn("Audio file missing or failed to load. Simulating playback.");
        };
        AppState.audio.addEventListener('ended', playNext);
        AppState.audio.addEventListener('timeupdate', updateProgressBar);
    } catch (e) {
        console.error("Failed to load backend data", e);
    }
}

// ======================================
// SPA ROUTING Engine
// ======================================
function setupSPARouting() {
    document.body.addEventListener('click', async e => {
        const link = e.target.closest('a');
        if (!link) return;
        
        const url = link.getAttribute('href');
        // Ignore external or hash links
        if (!url || url.startsWith('http') || url.startsWith('#')) return;
        
        e.preventDefault();
        
        // Special case for routing query params from cards via custom dataset
        if (link.dataset.routeUrl) {
            await navigateTo(link.dataset.routeUrl);
            return;
        }
        
        await navigateTo(url);
        
        // Update active sidebar state
        document.querySelectorAll('.sidebar-nav .nav-link').forEach(el => el.classList.remove('active'));
        if (link.classList.contains('nav-link')) {
            link.classList.add('active');
        }
    });

    window.addEventListener('popstate', async () => {
        await navigateTo(window.location.pathname + window.location.search, false);
    });
}

async function navigateTo(url, pushState = true) {
    try {
        const response = await fetch(url);
        const html = await response.text();
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        
        const newContent = doc.getElementById('app-content');
        if (newContent) {
            const appContent = document.getElementById('app-content');
            appContent.innerHTML = newContent.innerHTML;
            appContent.className = newContent.className;
            if (pushState) history.pushState(null, '', url);
            
            // Re-bind page specific events and render content based on templates
            initPageScripts();
            renderDynamicContent();
            updateSidebarActive();
            window.scrollTo(0, 0);
        }
    } catch (e) {
        console.error('SPA Navigation failed', e);
        window.location.href = url; // Fallback
    }
}

// ======================================
// DYNAMIC CONTENT RENDERING
// ======================================
function renderDynamicContent() {
    const path = window.location.pathname;
    const params = new URLSearchParams(window.location.search);
    
    if (path.includes('playlist.html')) {
        renderPlaylistPage(params.get('id') || 'p1');
    } else if (path.includes('artist.html') || path.includes('artist-top.html')) {
        renderArtistPage(params.get('id') || 'a1');
    } else if (path.includes('search.html')) {
        setupSearchPage();
    } else if (path.includes('library.html')) {
        renderLibraryPage();
    } else {
        // Assume Home (index.html)
        renderHomePage();
    }
}

function updateSidebarActive() {
    const path = window.location.pathname;
    const links = document.querySelectorAll('.nav-link');
    links.forEach(link => {
        const href = link.getAttribute('href');
        if (href && path.includes(href.replace('.php', '.html'))) {
            link.classList.add('active');
            link.style.color = 'var(--primary)';
        } else {
            link.classList.remove('active');
            link.style.color = 'var(--on-surface-variant)';
        }
    });
}

function getSongById(id) {
    return AppState.songs.find(s => s.id === id);
}

function renderHomePage() {
    // Render Trending
    const trendingContainer = document.querySelector('.trending-grid, .section-trending');
    // Implement standard DOM mapping (Simplified for simulation: bindings handled in initPageScripts)
    
    // Bind Playlist Cards specifically
    document.querySelectorAll('.playlist-card').forEach((card, index) => {
        // Link arbitrarily for demo if no ID specified
        const pl = AppState.playlists[index % AppState.playlists.length];
        card.style.cursor = 'pointer';
        card.onclick = () => navigateTo(`playlist.html?id=${pl.id}`);
    });
}

function renderPlaylistPage(playlistId) {
    const playlist = AppState.playlists.find(p => p.id === playlistId);
    if (!playlist) return;

    // Update Hero
    const titleEl = document.querySelector('.playlist-large-title');
    const descEl = document.querySelector('.playlist-hero-desc');
    const imgEl = document.querySelector('.playlist-artwork img');
    
    if (titleEl) titleEl.textContent = playlist.name;
    if (descEl) descEl.textContent = playlist.description;
    if (imgEl) imgEl.src = playlist.cover;

    // Render track rows
    const tbody = document.querySelector('.track-list-body');
    if (!tbody) return;
    
    tbody.innerHTML = '';
    playlist.song_ids.forEach((sId, index) => {
        const song = getSongById(sId);
        if (!song) return;
        
        const row = document.createElement('div');
        row.className = 'track-row cursor-pointer';
        row.innerHTML = `
            <div class="col-num">
                <span class="num-text">${index + 1}</span>
                <span class="material-symbols-outlined play-icon">play_arrow</span>
            </div>
            <div class="col-title track-info-cell">
                <img src="${song.cover}" alt="Track Art">
                <div class="track-info-text">
                    <span class="track-name">${song.title}</span>
                    <span class="track-artist">${song.artist}</span>
                </div>
            </div>
            <div class="col-album hidden-mobile">${song.album || playlist.name}</div>
            <div class="col-date hidden-tablet">${song.date_added || 'Just now'}</div>
            <div class="col-time">
                <span>${song.duration}</span>
                <button class="more-options-btn"><span class="material-symbols-outlined">more_vert</span></button>
            </div>
        `;
        
        // Play song on click
        row.addEventListener('click', () => {
            const queue = playlist.song_ids.map(id => getSongById(id));
            playQueue(queue, index);
        });
        
        tbody.appendChild(row);
    });

    // Play action button
    const mainPlayBtn = document.querySelector('.btn-play-large');
    if(mainPlayBtn) {
        mainPlayBtn.onclick = () => {
            const queue = playlist.song_ids.map(id => getSongById(id));
            playQueue(queue, 0);
        };
    }
}

function renderArtistPage(artistId) {
    const artist = AppState.artists.find(a => a.id === artistId);
    if (!artist) return;
    
    // Update labels globally on page
    document.querySelectorAll('.artist-title, .artist-title-massive').forEach(el => el.textContent = artist.name);
    document.querySelectorAll('.artist-listeners').forEach(el => {
        if(el.querySelector('.highlight')) el.querySelector('.highlight').textContent = artist.listeners;
        else el.textContent = artist.listeners + " monthly listeners";
    });
    
    document.querySelectorAll('.artist-hero-bg img, .artist-large-bg img').forEach(el => el.src = artist.image);

    // Render popular tracks
    const tlist = document.querySelector('.artist-track-list, .track-list-body');
    if (!tlist) return;
    
    tlist.innerHTML = '';
    artist.song_ids.forEach((sId, index) => {
        const song = getSongById(sId);
        if (!song) return;
        
        const row = document.createElement('div');
        row.className = 'artist-track-row track-row glass-hover-bg';
        row.innerHTML = `
            <div class="col-num text-center">
                <span class="num-text">${index + 1}</span>
                <span class="material-symbols-outlined play-icon">play_arrow</span>
            </div>
            <div class="col-title track-info-cell">
                <img src="${song.cover}" alt="Track">
                <div class="track-info-text">
                    <span class="track-name font-bold">${song.title}</span>
                    <span class="track-artist">${song.artist}</span>
                </div>
            </div>
            <div class="col-streams hidden-mobile col-album">${song.streams || song.album || '1M+'}</div>
            <div class="col-actions col-date"><span class="material-symbols-outlined fav-icon">favorite</span></div>
            <div class="col-time">${song.duration}</div>
        `;
        
        row.addEventListener('click', () => {
            const queue = artist.song_ids.map(id => getSongById(id));
            playQueue(queue, index);
        });
        
        tlist.appendChild(row);
    });

    const mainPlayBtn = document.querySelector('.btn-play-large, .btn-play-large-gradient');
    if(mainPlayBtn) {
        mainPlayBtn.onclick = () => {
            const queue = artist.song_ids.map(id => getSongById(id));
            playQueue(queue, 0);
        };
    }
}

function renderLibraryPage() {
    // Populate library grid with playlists
    const grid = document.querySelector('.library-grid');
    if (!grid) return;
    
    // Clear regular cards (keep featured if needed)
    while (grid.children.length > 2) {
        grid.removeChild(grid.lastChild);
    }
    
    AppState.playlists.forEach(pl => {
        const card = document.createElement('div');
        card.className = 'playlist-card group-hover-play cursor-pointer';
        card.innerHTML = `
            <div class="playlist-card-image">
                <img src="${pl.cover}" alt="${pl.name}">
                <div class="play-overlay"><span class="material-symbols-outlined">play_circle</span></div>
            </div>
            <div class="playlist-card-content">
                <h4 class="playlist-title">${pl.name}</h4>
                <p class="playlist-description">By ${pl.creator}</p>
            </div>
        `;
        card.onclick = () => navigateTo(`playlist.html?id=${pl.id}`);
        grid.appendChild(card);
    });
}

function setupSearchPage() {
    const input = document.getElementById('main-search-input');
    const idleState = document.getElementById('search-idle-state');
    const sSongs = document.getElementById('results-songs');
    const sArtists = document.getElementById('results-artists');
    const sPlaylists = document.getElementById('results-playlists');
    
    if (!input) return;

    input.addEventListener('input', e => {
        const query = e.target.value.toLowerCase().trim();
        
        if (query.length === 0) {
            idleState.classList.add('active');
            [sSongs, sArtists, sPlaylists].forEach(el => el.classList.remove('active'));
            return;
        }
        
        idleState.classList.remove('active');
        [sSongs, sArtists, sPlaylists].forEach(el => el.classList.add('active'));
        
        // Filter songs
        const songsList = document.getElementById('songs-result-list');
        songsList.innerHTML = '';
        AppState.songs.filter(s => s.title.toLowerCase().includes(query) || s.artist.toLowerCase().includes(query)).forEach((song, i) => {
            // Re-use rendering logic for row
            const row = document.createElement('div');
            row.className = 'artist-track-row group-hover-bg';
            row.innerHTML = `
                 <div class="col-num"><span class="material-symbols-outlined play-icon">play_arrow</span></div>
                 <div class="col-title track-info-cell">
                     <img src="${song.cover}" alt="Track" style="width:40px;height:40px;border-radius:4px;">
                     <div class="track-info-text">
                         <span class="track-name font-bold">${song.title}</span>
                         <span class="track-artist">${song.artist}</span>
                     </div>
                 </div>
                 <div class="col-time">${song.duration}</div>
            `;
            row.onclick = () => playQueue([song], 0);
            songsList.appendChild(row);
        });
        
        // Filter Playlists
        const playListEl = document.getElementById('playlists-result-list');
        playListEl.innerHTML = '';
        AppState.playlists.filter(p => p.name.toLowerCase().includes(query)).forEach(pl => {
            const card = document.createElement('div');
            card.className = 'playlist-card group-hover-play cursor-pointer';
            card.innerHTML = `<img src="${pl.cover}" style="width:100%"><h4 class="mt-2">${pl.name}</h4>`;
            card.onclick = () => navigateTo(`playlist.html?id=${pl.id}`);
            playListEl.appendChild(card);
        });
        
        // Filter Artists
        const artistListEl = document.getElementById('artists-result-list');
        artistListEl.innerHTML = '';
        AppState.artists.filter(a => a.name.toLowerCase().includes(query)).forEach(ar => {
            const card = document.createElement('div');
            card.className = 'playlist-card group-hover-play cursor-pointer';
            card.innerHTML = `<img src="${ar.image}" style="width:100%; border-radius: 50%;"><h4 class="mt-2 text-center">${ar.name}</h4>`;
            card.onclick = () => navigateTo(`artist.html?id=${ar.id}`);
            artistListEl.appendChild(card);
        });
    });
}

// ======================================
// MUSIC PLAYER ENGINE
// ======================================
function playQueue(queue, index = 0) {
    if (!queue || queue.length === 0) return;
    
    AppState.currentQueue = queue;
    AppState.currentTrackIndex = index;
    loadAndPlayTrack();
}

function loadAndPlayTrack() {
    const track = AppState.currentQueue[AppState.currentTrackIndex];
    if (!track) return;
    
    // Update global visual player
    document.querySelector('.player-song-title').textContent = track.title;
    document.querySelector('.player-song-artist').textContent = track.artist;
    document.querySelector('.player-track img').src = track.cover;
    
    AppState.audio.src = track.audio;
    AppState.audio.load();
    const playPromise = AppState.audio.play();

    // Catch DOMException if placeholder missing
    if (playPromise !== undefined) {
        playPromise.then(_ => {
            AppState.isPlaying = true;
            syncPlayPauseButton();
        }).catch(error => {
            console.error("Playback error. Simulating playing state due to placeholder...");
            // Simulate progression anyway for UI demonstration
            simulatePlayback();
        });
    } else {
        AppState.isPlaying = true;
        syncPlayPauseButton();
    }
}

function simulatePlayback() {
    AppState.isPlaying = true;
    syncPlayPauseButton();
    
    // Quick simulator if audio file errors out
    window.simTime = 0;
    const simDuration = 200; // 3 min 20 sec
    
    clearInterval(window.simInterval);
    window.simInterval = setInterval(() => {
        if(!AppState.isPlaying) return;
        window.simTime += 1;
        const perc = (window.simTime / simDuration) * 100;
        document.querySelector('.progress-fill').style.width = perc + '%';
        document.querySelector('.progress-handle').style.left = perc + '%';
        
        let m = Math.floor(window.simTime / 60);
        let s = Math.floor(window.simTime % 60);
        document.querySelector('.time-current').textContent = `${m}:${s.toString().padStart(2, '0')}`;
        
        if (perc >= 100) {
            clearInterval(window.simInterval);
            playNext();
        }
    }, 1000);
}

function togglePlay() {
    if (AppState.currentQueue.length === 0) return;
    
    if (AppState.isPlaying) {
        AppState.audio.pause();
        AppState.isPlaying = false;
    } else {
        const playPromise = AppState.audio.play();
        if (playPromise !== undefined) playPromise.catch(e => { /* simulator handles it */ });
        AppState.isPlaying = true;
    }
    syncPlayPauseButton();
}

function playNext() {
    if (AppState.currentQueue.length === 0) return;
    
    if (AppState.isShuffled) {
        AppState.currentTrackIndex = Math.floor(Math.random() * AppState.currentQueue.length);
    } else {
        AppState.currentTrackIndex++;
    }
    
    if (AppState.currentTrackIndex >= AppState.currentQueue.length) {
        if (AppState.isRepeating) AppState.currentTrackIndex = 0;
        else {
            AppState.currentTrackIndex = 0;
            AppState.isPlaying = false;
            syncPlayPauseButton();
            return;
        }
    }
    loadAndPlayTrack();
}

function playPrev() {
    if (AppState.currentQueue.length === 0) return;
    
    if (AppState.audio.currentTime > 3) {
        AppState.audio.currentTime = 0;
    } else {
        AppState.currentTrackIndex--;
        if (AppState.currentTrackIndex < 0) AppState.currentTrackIndex = AppState.currentQueue.length - 1;
        loadAndPlayTrack();
    }
}

function syncPlayPauseButton() {
    const playBtn = document.querySelector('.play-btn-main');
    if (!playBtn) return;
    const icon = playBtn.querySelector('.material-symbols-outlined');
    if (icon) {
        icon.textContent = AppState.isPlaying ? 'pause_circle' : 'play_circle';
    }
}

function updateProgressBar() {
    if (!AppState.audio.duration) return;
    const percentage = (AppState.audio.currentTime / AppState.audio.duration) * 100;
    
    const fill = document.querySelector('.progress-fill');
    const handle = document.querySelector('.progress-handle');
    const currentText = document.querySelector('.time-current');
    
    if(fill) fill.style.width = percentage + '%';
    if(handle) handle.style.left = percentage + '%';
    
    let m = Math.floor(AppState.audio.currentTime / 60);
    let s = Math.floor(AppState.audio.currentTime % 60);
    if(currentText) currentText.textContent = `${m}:${s.toString().padStart(2, '0')}`;
}

// ======================================
// GLOBAL SCRIPTS (Run Once)
// ======================================
function initGlobalScripts() {
    // Top Player Control Wiring
    const playBtn = document.querySelector('.play-btn-main');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    const shuffleBtn = document.querySelector('.shuffle-btn');
    const repeatBtn = document.querySelector('.repeat-btn');
    const progressBar = document.querySelector('.progress-bar');
    const volumeBar = document.querySelector('.volume-bar');

    if(playBtn) playBtn.addEventListener('click', togglePlay);
    if(nextBtn) nextBtn.addEventListener('click', playNext);
    if(prevBtn) prevBtn.addEventListener('click', playPrev);
    
    if(shuffleBtn) {
        shuffleBtn.addEventListener('click', () => {
            AppState.isShuffled = !AppState.isShuffled;
            shuffleBtn.style.color = AppState.isShuffled ? 'var(--primary)' : 'var(--on-surface-variant)';
        });
    }
    
    if(repeatBtn) {
        repeatBtn.addEventListener('click', () => {
            AppState.isRepeating = !AppState.isRepeating;
            repeatBtn.style.color = AppState.isRepeating ? 'var(--primary)' : 'var(--on-surface-variant)';
        });
    }
    
    if(progressBar) {
        progressBar.addEventListener('click', function(e) {
            const rect = progressBar.getBoundingClientRect();
            const clickX = e.clientX - rect.left;
            const percentage = clickX / rect.width;
            
            if (AppState.audio.duration && !isNaN(AppState.audio.duration)) {
                AppState.audio.currentTime = AppState.audio.duration * percentage;
            } else {
                // Handle for simulation
                const simDuration = 200; // matching simDuration in simulatePlayback
                window.simTime = simDuration * percentage;
            }
        });
    }
    
    if(volumeBar) {
        volumeBar.addEventListener('click', function(e) {
            const rect = volumeBar.getBoundingClientRect();
            const clickX = e.clientX - rect.left;
            let percentage = clickX / rect.width;
            percentage = Math.max(0, Math.min(1, percentage));
            
            AppState.volume = percentage;
            AppState.audio.volume = percentage;
            document.querySelector('.volume-fill').style.width = (percentage * 100) + '%';
        });
    }

    // Mobile Sidebar
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const sidebar = document.getElementById('sidebar');
    if (mobileMenuBtn && sidebar) {
        mobileMenuBtn.addEventListener('click', () => sidebar.classList.toggle('active'));
        document.addEventListener('click', (e) => {
            if (!sidebar.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                sidebar.classList.remove('active');
            }
        });
    }
}

// ======================================
// PAGE SCRIPTS (Re-run on SPA Nav)
// ======================================
function initPageScripts() {
    // Carousel setup
    const carouselContainer = document.querySelector('.carousel-container');
    const carouselPrevBtn = document.querySelector('.carousel-prev');
    const carouselNextBtn = document.querySelector('.carousel-next');
    
    if (carouselContainer && carouselPrevBtn && carouselNextBtn) {
        const cards = Array.from(carouselContainer.children);
        let currentIndex = 1; // Default featured card (the 2nd one in [0, 1, 2])
        let isDragging = false;
        let startX, currentTranslate = 0, prevTranslate = 0;
        let animationID;

        const updateUI = (index) => {
            currentIndex = Math.max(0, Math.min(index, cards.length - 1));
            cards.forEach((card, i) => {
                if (i === currentIndex) {
                    card.className = 'carousel-card carousel-card-featured animate-float';
                } else {
                    card.className = 'carousel-card carousel-card-side animate-float-delayed';
                }
            });

            // Calculate Translate: center the featured card
            // 256px is width+gap. Index 1 should be at 0 offset if container is centered.
            // Actually, we'll keep it simple: index 1 is translateX(0).
            const offset = -(currentIndex - 1) * 256;
            carouselContainer.style.transition = 'transform 0.6s cubic-bezier(0.23, 1, 0.32, 1)';
            carouselContainer.style.transform = `translateX(${offset}px)`;
            prevTranslate = offset;
        };

        // --- Dragging Logic ---
        carouselContainer.onmousedown = (e) => {
            isDragging = true;
            startX = e.pageX;
            carouselContainer.style.transition = 'none';
            carouselContainer.style.cursor = 'grabbing';
        };

        window.onmousemove = (e) => {
            if (!isDragging) return;
            const currentX = e.pageX;
            const diff = currentX - startX;
            currentTranslate = prevTranslate + diff;
            carouselContainer.style.transform = `translateX(${currentTranslate}px)`;
        };

        window.onmouseup = () => {
            if (!isDragging) return;
            isDragging = false;
            carouselContainer.style.cursor = 'grab';
            
            const movedBy = currentTranslate - prevTranslate;
            if (movedBy < -50 && currentIndex < cards.length - 1) currentIndex++;
            else if (movedBy > 50 && currentIndex > 0) currentIndex--;

            updateUI(currentIndex);
        };

        // --- Click-to-Focus ---
        cards.forEach((card, index) => {
            card.onclick = (e) => {
                // Prevent click during drag if moved significantly
                if (Math.abs(currentTranslate - prevTranslate) > 5) {
                    e.preventDefault();
                }
                updateUI(index);
            };
        });

        // --- Button Logic ---
        carouselPrevBtn.onclick = () => updateUI(currentIndex - 1);
        carouselNextBtn.onclick = () => updateUI(currentIndex + 1);

        // Initial Setup
        carouselContainer.style.cursor = 'grab';
        carouselContainer.style.display = 'flex';
        carouselContainer.style.justifyContent = 'flex-start';
        carouselContainer.style.transition = 'transform 0.6s cubic-bezier(0.23, 1, 0.32, 1)';
        updateUI(currentIndex);
    }
    
    // Smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.onclick = function(e) {
            e.preventDefault();
            const tgt = document.querySelector(this.getAttribute('href'));
            if(tgt) tgt.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
}
