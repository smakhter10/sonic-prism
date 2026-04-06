const fs = require('fs');
['index.php', 'library.php', 'playlist.php', 'artist.php', 'artist-top.php', 'search.php'].forEach(f => {
    if (fs.existsSync(f)) {
        let text = fs.readFileSync(f, 'utf8');
        // Replace the first occurrence of <div class="content-wrapper..."> that doesn't already have an ID
        if (!text.includes('id="app-content"')) {
            text = text.replace(/<div class="content-wrapper([^"]*)">/, '<div class="content-wrapper$1" id="app-content">');
            fs.writeFileSync(f, text);
            console.log('Added app-content to ' + f);
        }
    }
});
