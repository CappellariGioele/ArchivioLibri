@extends('layout.main')

@section('title')
    Dettagli libro
@endsection

@section('content')
    <div class="col-md-12 my-4">
        @include('partial.navbar')
        <h2 class="mt-5 mb-4">@yield('title')</h2>
    </div>
    <article class="detail-book row py-3 px-1 rounded-4">
        <div class="col-md-4">
            <figure>
                <img src="{{ is_null($book->image) ? asset('storage/images/book/no-cover.webp') : asset('storage/images/book/' . $book->image) }}" class="rounded" alt="Titolo Libro">
            </figure>
        </div>
        <div class="col-md-4">
            <h2 class="mb-3">{{ $book->title  }}</h2>
            <div>
                <p>{{ $book->description  }}</p>
            </div>
            <div class="border-top mt-2 pt-3">
                <span class="badge text-bg-secondary">{{ $book->author->name }}</span>
                <span class="badge text-bg-secondary">{{ $book->category->name }}</span>
                <span class="badge text-bg-secondary">{{ $book->pages }} pagine</span>
            </div>
        </div>
    </article>
@endsection
