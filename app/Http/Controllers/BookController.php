<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;;

class BookController extends Controller
{
    /**
     * Funzione helper per gestire il caricamento dell'immagine.
     */
    private function handleUploadedImage(Request $request, Book $model): void
    {
        // se ha un file lo salvo con un nome piu sicuro
        // per evitare problemi allo storage per nomi doppioni
        if ($request->hasFile('image')) {
            $newFileName = Str::uuid() . '.' . $request->file('image')->getClientOriginalExtension();

            // salvataggio immagine
            $request->file('image')->move(public_path('storage/images/book'), $newFileName);

            // aggiorno il modello
            $model->image = $newFileName;
            $model->save();
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $books = Book::orderBy('title', 'asc')->get();

        return view('book.list_book', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $authors = Author::orderBy('name', 'asc')->get();

        return view('book.add_book', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request): RedirectResponse
    {
        $newBook = Book::create($request->validated());

        $this->handleUploadedImage($request, $newBook);

        return redirect()->route('book.index')
            ->with('success', 'Libro aggiunto correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book): View
    {
        return view('book.detail_book', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book): View
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $authors = Author::orderBy('name', 'asc')->get();

        return view('book.edit_book', compact('book', 'categories', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book): RedirectResponse
    {
        $book->update($request->validated());

        // problema con questa funzione!!!!!!
        $this->handleUploadedImage($request, $book);

        return redirect()->route('book.index')
            ->with('success', 'Libro aggiornato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()->route('book.index')
            ->with('success', 'Libro eliminato con successo');
    }
}
