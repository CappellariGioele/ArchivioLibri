@extends('layout.main')

@section('title')
    Gli autori
@endsection

@section('content')
    <div class="col-md-12 my-4">
        @include('partial.navbar')
        <a href="{{ route('author.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi un
            Autore</a>
        <h2 class="mt-5 mb-4">@yield('title')</h2>
    </div>
    <div class="col-md-6">
        @if($authors)
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col" class="w-auto">#</th>
                    <th scope="col" class="w-50">Autore</th>
                    <th scope="col" class="w-25">Data di nascita</th>
                    <th scope="col" class="w-auto text-end">Azioni</th>
                </tr>
                </thead>
                <tbody>
                @foreach($authors as $author)
                    @php
                        $bDate = Carbon\Carbon::parse($author->birthday);
                        $formattedDate = $bDate->format('d.m.Y');
                    @endphp
                    <tr>
                        <td class="align-middle">{{ $author->id  }}</td>
                        <td class="align-middle">{{$author->name}}</td>
                        <td class="align-middle">{{ $author->birthday ? $formattedDate : '' }}</td>
                        <td class="text-end">
                            <form action="{{ route('author.destroy', $author->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('author.edit', $author->id)  }}" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                                    <button type="submit" onclick="return confirm('Sei Sicuro? Stai eliminando un Autore')" class="btn btn-secondary"><i class="bi bi-trash3"></i></button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            Non sono presenti autori
        @endif
    </div>
@endsection
