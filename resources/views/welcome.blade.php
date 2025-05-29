<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recursos TikTok</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom/welcome.css') }}">
    <style>
        .video-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .video-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .social-icon {
            transition: transform 0.2s ease;
        }
        .social-icon:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body class="bg-gray-50">
  
    <!-- Cambios en el index.blade.php -->
    <div class="videos-container">
        <!-- Header mejorado -->
        <header class="videos-header">
            <h1 class="videos-title">Recursos Exclusivos</h1>
            <p class="videos-subtitle">Contenido de valor para tu crecimiento</p>
            
            <div class="search-container">
                <input type="text" id="search-input" class="search-input" placeholder="Buscar videos...">
                <button class="search-button">
                    <svg class="search-icon" viewBox="0 0 24 24">
                        <path d="M15.5 14h-.79l-.28-.27a6.5 6.5 0 0 0 1.48-5.34c-.47-2.78-2.79-5-5.59-5.34a6.505 6.505 0 0 0-7.27 7.27c.34 2.8 2.56 5.12 5.34 5.59a6.5 6.5 0 0 0 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0 .41-.41.41-1.08 0-1.49L15.5 14zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                    </svg>
                </button>
            </div>
        </header>

        <!-- Grid de videos -->
        <div id="videos-grid" class="videos-grid">
            <div id="videos-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($videos as $video)
                {{ $video }}
                @include('partitial.video.cards', ['video' => $video])
            @endforeach
        </div>
        </div>
    </div>

    <!-- Script para TikTok Embed -->
    <script async src="https://www.tiktok.com/embed.js"></script>
    <script>
        // Función para cargar los videos de TikTok
function loadTikTokEmbeds() {
    // Verificar si el script de TikTok ya está cargado
    if (!window.tiktokEmbedLoader) {
        const script = document.createElement('script');
        script.src = 'https://www.tiktok.com/embed.js';
        script.async = true;
        script.onload = initTikTokEmbeds;
        document.body.appendChild(script);
        window.tiktokEmbedLoader = true;
    } else {
        initTikTokEmbeds();
    }
}

// Función para inicializar los embeds
function initTikTokEmbeds() {
    document.querySelectorAll('.video-card').forEach(card => {
        const videoId = card.dataset.videoId;
        const videoUrl = card.dataset.videoUrl; // Asegúrate de agregar data-video-url a la card
        
        // Solo inicializar si no se ha hecho antes
        if (!card.dataset.embedInitialized && window.tiktok) {
            window.tiktok.Embed.fromBlock(`tiktok-embed-${videoId}`, {
                videoId: extractTikTokVideoId(videoUrl),
                embedType: 'video'
            });
            card.dataset.embedInitialized = true;
        }
    });
}

// Función para extraer el ID del video de la URL
function extractTikTokVideoId(url) {
    const regExp = /\/video\/(\d+)/;
    const match = url.match(regExp);
    return match ? match[1] : null;
}

// Cargar los embeds cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', loadTikTokEmbeds);

// También cargar cuando se añadan nuevas cards (para búsqueda asíncrona)
const observer = new MutationObserver(loadTikTokEmbeds);
observer.observe(document.getElementById('videos-grid'), {
    childList: true,
    subtree: true
});
    </script>
</body>
</html>