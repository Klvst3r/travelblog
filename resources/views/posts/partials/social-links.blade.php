<div class="buttons-social-media-share">
    <div class="share-buttons">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}&t={{ $description }}"
            title="Share on Facebook" target="_blank"><img alt="Share on Facebook"
                src="{{ asset('img/icons/facebook.png') }}" class="icon-social"></a>

        @php
            $url = request()->fullUrl();
        @endphp

        <a href="https://x.com/intent/tweet?url={{ urlencode($url) }}&text={{ urlencode($post->title) }}&via=MiUsuarioX&hashtags=Laravel,Blog"
            target="_blank" title="Compartir en X">
            <img alt="Post in X" src="{{ asset('img/icons/X_icon.png') }}" class="icon-social">
        </a>
        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($url) }}" target="_blank"
            title="Compartir en LinkedIn">
            <img alt="Share on LinkedIn" src="{{ asset('img/icons/linkedin.webp') }}" class="icon-social">
        </a>
        @php
            $url = request()->fullUrl();
            $description = $post->title;
        @endphp
        <a href="https://pinterest.com/pin/create/button/?url={{ urlencode($url) }}&description={{ urlencode($description) }}"
            target="_blank" title="Guardar en Pinterest">
            <img alt="Pin it" src="{{ asset('img/icons/Pinterest.png') }}" class="icon-social">
        </a>
    </div>
</div>
