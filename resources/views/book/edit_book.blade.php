@extends('layout.main')

@section('title')
    Modifica libro
@endsection

@section('content')
    <div class="col-md-12 my-4">
        @include('partial.navbar')
        <h2 class="mt-5 mb-4">@yield('title')</h2>
    </div>
    <div class="col-md-12">
        <article class="card border-0">
            <div class="card-body">
                <form action="{{ route('book.update', $book->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" placeholder="Example" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $book->title }}" required>
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Categoria</label>
                        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                            @if($categories)
                                <option value="" disabled selected>Seleziona una categoria</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($category->id == $book->category_id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            @else
                                <option value="" disabled selected>Non sono presenti categorie</option>
                            @endif
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="author_id" class="form-label">Autore</label>
                        <select class="form-select @error('author_id') is-invalid @enderror" id="author_id" name="author_id" required>
                            @if($authors)
                                <option value="" disabled selected>Seleziona un autore</option>
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}" @if($book->author_id == $author->id) selected @endif>{{ $author->name }}</option>
                                @endforeach
                            @else
                                <option value="" disabled selected>Non sono presenti autori</option>
                            @endif
                        </select>
                        @error('author_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione <span class="text-muted">(opzionale)</span></label>
                        <textarea placeholder="Description of the book..." rows="5" maxlength="800" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $book->description }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-sm-4">
                        <label for="pages" class="form-label">Pagine <span class="text-muted">(opzionale)</span></label>
                        <input type="number" min="1" class="form-control @error('pages') is-invalid @enderror" placeholder="123" id="pages" name="pages" value="{{ $book->pages }}">
                        @error('pages')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-sm-4">
                        <label for="image" class="form-label">Immagine <span class="text-muted">(opzionale)</span></label>
                        <input type="file" accept="image/*" class="form-control @error('cover_image') is-invalid @enderror" id="image" name="image" onchange="previewImage(event)">
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="mt-3">
                            <img id="image_preview" src="{{ is_null($book->image) ? asset('storage/images/book/no-cover.webp') : asset('storage/images/book/' . $book->image) }}"
                                 alt="Anteprima immagine" style="max-width: 200px; max-height: 260px; display: block;">
                            <script type="application/javascript" src="{{ asset('js/imagePreview.js') }}"></script>
                        </div>
                    </div>
                    <div class="mt-2 d-flex">
                        <button type="submit" class="btn btn-primary">Modifica libro</button>
                    </div>
                </form>
            </div>
        </article>
    </div>
@endsection
