<article class="card border-0">
    <div class="card-body">
        <h3 class="card-title">{{ $book->title  }}</h3>
        <div>di {{ $book->author->name  }}</div>
        <div class="mt-2"><span class="badge text-bg-secondary">{{ $book->category->name  }}</span></div>
        <form action="{{ route('book.destroy', $book->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="btn-group mt-3 d-flex justify-content-center" role="group">
                <a href="{{ route('book.show', $book->id)  }}" class="btn btn-light"><i class="bi bi-eye"></i></a>
                <a href="{{ route('book.edit', $book->id)  }}" class="btn btn-light"><i class="bi bi-pencil"></i></a>
                    <button type="submit" onclick="return confirm('Sei Sicuro? Stai eliminando un Autore')" class="btn btn-light">
                        <i class="bi bi-trash3"></i>
                    </button>
            </div>
        </form>
    </div>
</article>
