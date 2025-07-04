@extends('posts.layout')

@section('meta-title', config('app.name') . ' | Traveling Post |' . $post->title)
@section('meta-description', $post->excerpt)



@section('content')
    <article class="post image-w-text container">
        <div class="content-post">
            <header class="container-flex space-between">
                <div class="date">
                    <span class="c-gris">{{ $post->published_at->format('M d') }}</span>
                </div>
                <div class="post-category">
                    <span class="category">{{ $post->category->name }}</span>
                </div>
            </header>
            {{-- <h1>{{ str_slug($post->title) }}</h1> --}}
            <h1>{{ $post->title }}</h1>
            <div class="divider"></div>
            <div class="image-w-text">
                {!! $post->body !!}
            </div>

            <footer class="container-flex space-between">
                <div class="buttons-social-media-share">
                    <div class="share-buttons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook"
                            target="_blank"><img alt="Share on Facebook" src="{{ asset('img/icons/facebook.png') }}"
                                class="icon-social"></a>

                        <a href="https://X.com/intent/tweet?source=&text=:%20" target="_blank" title="Post in X"><img
                                alt="Post in X" src="{{ asset('img/icons/X_icon.png') }}" class="icon-social"></a>
                        <a href="https://www.instagram.com/share?url=" target="_blank" title="Share on Instagram"><img
                                alt="Share on Instagram" src="{{ asset('img/icons/Instagram.png') }}"
                                class="icon-social"></a>
                        <a href="http://pinterest.com/pin/create/button/?url=&description=" target="_blank"
                            title="Pin it"><img alt="Pin it" src="{{ asset('img/icons/Pinterest.png') }}"
                                class="icon-social"></a>
                    </div>
                </div>
                <div class="tags container-flex">
                    @foreach ($post->tags as $tag)
                        <span class="tag c-gris text-capitalize">#{{ $tag->name }}</span>
                    @endforeach
                </div>
            </footer>
            <div class="comments">
                <div class="divider"></div>
                <div id="disqus_thread"></div>

                @include('posts.partials.disqus-script')

            </div><!-- .comments -->
        </div>
    </article>
@endsection
@push('scripts')
    <script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
@endpush
