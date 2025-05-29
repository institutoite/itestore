<div class="video-card" data-video-id="{{ $video->id }}" data-video-url="{{ $video->url }}">
    <div id="tiktok-embed-{{ $video->id }}" class="video-embed-container">
        <div class="tiktok-embed-placeholder">
            <p>Cargando video de TikTok...</p>
        </div>
    </div>
    

    <!-- Contenido de la Card -->
    <div class="p-4">
        <!-- Nombre del Video -->
        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $video->nombre }}</h3>
        
        <!-- Botón de Recurso -->
        <div class="mb-4">
            <button onclick="trackClick({{ $video->id }}, 'resource')" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition duration-200 flex items-center justify-center">
                <i class="fas fa-download mr-2"></i>
                Descargar Recurso
                <span class="ml-2 bg-blue-800 text-xs px-2 py-1 rounded-full">{{ $video->click_count }}</span>
            </button>
            <div class="mt-1 text-xs text-gray-500 text-center">
                <a href="{{ $video->resource_url }}" target="_blank" class="hover:underline">{{ Str::limit($video->resource_url, 30) }}</a>
            </div>
        </div>

        <!-- Redes Sociales -->
        <div class="flex justify-center space-x-4">
            <button onclick="trackClick({{ $video->id }}, 'tiktok')" class="social-icon">
                <i class="fab fa-tiktok text-gray-700 hover:text-black text-xl"></i>
                <span class="text-xs block text-center mt-1">{{ $video->count_tiktok }}</span>
            </button>
            
            <button onclick="trackClick({{ $video->id }}, 'facebook')" class="social-icon">
                <i class="fab fa-facebook text-gray-700 hover:text-blue-600 text-xl"></i>
                <span class="text-xs block text-center mt-1">{{ $video->count_facebook }}</span>
            </button>
            
            <button onclick="trackClick({{ $video->id }}, 'instagram')" class="social-icon">
                <i class="fab fa-instagram text-gray-700 hover:text-pink-600 text-xl"></i>
                <span class="text-xs block text-center mt-1">{{ $video->count_instagram }}</span>
            </button>
            
            <button onclick="trackClick({{ $video->id }}, 'youtube')" class="social-icon">
                <i class="fab fa-youtube text-gray-700 hover:text-red-600 text-xl"></i>
                <span class="text-xs block text-center mt-1">{{ $video->count_youtube }}</span>
            </button>
            
            <button onclick="trackClick({{ $video->id }}, 'whatsapp')" class="social-icon">
                <i class="fab fa-whatsapp text-gray-700 hover:text-green-500 text-xl"></i>
                <span class="text-xs block text-center mt-1">{{ $video->count_whatsapp }}</span>
            </button>
        </div>
    </div>
</div>