@extends('layout')

@section('content')

    informacion
    <section class="posts container">




        @foreach ($posts as $post)
            {{-- Recorre todos los post como un post --}}

            <article class="post no-image">
                <div class="content-post">
                    <header class="container-flex space-between">
                        <div class="date">
                            {{-- <span class="c-gris">{{ $post->published_at->format('M d') }}</span> --}}
                            <span class="c-gris">{{ $post->published_at->diffForHumans() }}</span>
                        </div>
                        <div class="post-category">
                            {{-- <span class="category text-capitalize">{{ var_dump()$post->category->name) }}</span> --}}
                            <span class="category text-capitalize">{{ $post->category->name }}</span>
                        </div>
                    </header>
                    <h1> {{ $post->title }} </h1>
                    <div class="divider"></div>
                    <p>{{ $post->excerpt }}</p>
                    <footer class="container-flex space-between">
                        <div class="read-more">
                            {{-- <a href="{{ route('posts.show', $post->url) }}" class="text-uppercase c-green">Leer más</a> --}}
                            {{-- por que no activa getRouteKeyname(), porque estás pasando un string (el slug), no el objeto $post. --}}
                            <a href="{{ route('posts.show', $post) }}" class="text-uppercase c-green">Leer más</a>

                        </div>
                        <div class="tags container-flex">
                            @foreach ($post->tags as $tag)
                                <span class="tag c-gris text-capitalize">#{{ $tag->name }}</span>
                            @endforeach

                        </div>
                    </footer>
                </div>
            </article>
        @endforeach


    </section><!-- fin del div.posts.container -->

    <div class="pagination">
        <ul class="list-unstyled container-flex space-center">
            <li><a href="#" class="pagination-active">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
        </ul>
    </div>

@stop
