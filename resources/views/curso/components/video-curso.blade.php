<div class="video-view-curso">
    <div class="video-container">
        <div class="video-header">
            <h1 class="video-title">{{ $lesson->title }}</h1>
            <span class="experience-points">{{ $lesson->points_xp }} XP</span>
        </div>
        <video class="video-player" controls autoplay>
            <source src="{{ asset('video\Tabla_amortizacion.mp4') }}" type="video/mp4">
            Tu navegador no soporta la etiqueta de video.
        </video>
    </div>
</div>