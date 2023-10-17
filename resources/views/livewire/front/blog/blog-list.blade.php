<div>
    @forelse ($blogs as $blog)
        <article class="article">
            <a href="{{ route('posts.show', $blog->slug  ) }}" target="_blank" rel="noopener noreferrer">
                <h2 class="title_article">{{ $blog->title }}</h2>
            </a>

            <p class="content_article">{{ substr(extHtml($blog->description), 0, 290) }}...</p>
            <p> por {{ $blog->author }} <span
                    class="date_article">{{ $blog->created_at->isoFormat(' d MMMM Y') }}</span> </p>

        </article>

    @empty

        <p class="text-center">No hay Articulos para mostrar</p>
    @endforelse



    {{ $blogs->links() }}
</div>
