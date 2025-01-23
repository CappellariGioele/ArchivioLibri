@extends('layout.main')

@section('title')
    Le categorie
@endsection

@section('content')
    <div class="col-md-12 my-4">
        @include('partial.navbar')
        <a href="{{ route('category.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi una
            Categoria</a>
        <h2 class="mt-5 mb-4">@yield('title')</h2>
    </div>
    <div class="col-md-6">
        @if($categories)
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col" class="w-auto">#</th>
                    <th scope="col" class="w-75">Categoria</th>
                    <th scope="col" class="w-auto text-end">Azioni</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td class="align-middle">{{ $category->id  }}</td>
                        <td class="align-middle">{{ $category->name  }}</td>
                        <td class="text-end">
                            <form action="{{route('category.destroy', $category->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('category.edit', $category->id)  }}" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                                    <button type="submit" onclick="return confirm('Sei Sicuro? Stai eliminando una categoria')" class="btn btn-secondary"><i class="bi bi-trash3"></i></button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            Non sono presenti categorie
        @endif
    </div>
@endsection
