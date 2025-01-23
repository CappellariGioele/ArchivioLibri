@extends('layout.main')

@section('title')
    Modifica categoria
@endsection

@section('content')
    <div class="col-md-12 my-4">
        @include('partial.navbar')
        <h2 class="mt-5 mb-4">@yield('title')</h2>
    </div>
    <div class="col-md-12">
        <article class="card border-0">
            <div class="card-body">
                <form action="{{ route('category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" placeholder="Example" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $category->name }}" required>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary">Modifica categoria</button>
                    </div>
                </form>
            </div>
        </article>
    </div>
@endsection
