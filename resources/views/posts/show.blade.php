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

                @include('posts.partials.social-links', ['description' => $post->title])

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
