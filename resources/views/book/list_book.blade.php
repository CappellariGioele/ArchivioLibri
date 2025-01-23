@extends('layout.main')

@section('title')
    I miei libri
@endsection

@section('content')
    <div class="col-md-12 my-4">
        @include('partial.navbar')
        <a href="{{ route('book.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi un
            Libro</a>
        <h2 class="mt-5 mb-4">@yield('title')</h2>
    </div>
    <div class="col-md-12">
        <div class="list-book">
            @forelse($books as $book)
                @include('partial.card_book')
            @empty
                Non sono presenti libri
            @endforelse
        </div>
    </div>
@endsection
