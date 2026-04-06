const fs = require('fs');

const sidebar = fs.readFileSync('components/sidebar.php', 'utf8');
const header = fs.readFileSync('components/header.php', 'utf8');
const player = fs.readFileSync('components/player.php', 'utf8');
const cardTemplate = fs.readFileSync('components/card.php', 'utf8');

function compileFile(filename) {
    if (!fs.existsSync(filename)) return;
    
    let content = fs.readFileSync(filename, 'utf8');
    
    content = content.replace("<?php include 'components/sidebar.php'; ?>", sidebar);
    content = content.replace("<?php include 'components/header.php'; ?>", header);
    content = content.replace("<?php include 'components/player.php'; ?>", player);
    
    if (filename === 'index.php') {
        const regex = /<\?php[\s\S]*?\$playlists = \[([\s\S]*?)\];[\s\S]*?foreach \(\$playlists as \$playlist\) \{[\s\S]*?include 'components\/card\.php';[\s\S]*?\}[\s\S]*?\?>/;
        const match = content.match(regex);
        if (match) {
            let inner = match[1];
            inner = inner.replace(/\[/g, "{");
            inner = inner.replace(/\]/g, "}");
            
            let playlistsStr = '[' + inner + ']';
            playlistsStr = playlistsStr.replace(/=>/g, ':');
            
            const getPlaylists = new Function('return ' + playlistsStr + ';');
            const playlists = getPlaylists();
            
            let cardsHtml = '';
            for (const p of playlists) {
                let cardStr = cardTemplate;
                cardStr = cardStr.replace(/<\?php echo \$playlist\['image'\]; \?>/g, p.image);
                cardStr = cardStr.replace(/<\?php echo \$playlist\['title'\]; \?>/g, p.title);
                cardStr = cardStr.replace(/<\?php echo \$playlist\['description'\]; \?>/g, p.description);
                cardsHtml += cardStr + '\n';
            }
            
            content = content.replace(match[0], cardsHtml);
        }
    }
    
    const outputName = filename.replace('.php', '.html');
    fs.writeFileSync(outputName, content);
    console.log(outputName + ' generated.');
}

const filesToCompile = ['index.php', 'library.php', 'playlist.php', 'artist.php', 'artist-top.php', 'search.php'];
for (const file of filesToCompile) {
    compileFile(file);
}
