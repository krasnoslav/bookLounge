<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(Request $request) {
        $id = $request->id;
        $book = DB::table('books')->join(
            'bookGenres',
            'bookGenres.id',
            '=',
            'books.bookGenreID'
        )->join(
            'bookCovers',
            'bookCovers.id',
            '=',
            'books.bookCoverID'
        )->where('books.id', $id)->first();
        if (!is_null($book)) {
            $book->id = intval($id);
            return view('book', ['book' => $book]);
        } else {
            return abort(404);
        }
    }

    public function getBooks(Request $request) {
        $books = DB::table('books')->join(
            'bookGenres',
            'bookGenres.id',
            '=',
            'books.bookGenreID'
        )->join(
            'bookCovers',
            'bookCovers.id',
            '=',
            'books.bookCoverID'
        )->select(
            'books.id as id',
            'books.*',
            'bookGenres.bookGenre as bookGenre'
        )->get();
        return view('admin.books', ['books' => $books]);
    }

    public function getBookById(Request $request) {
        $id = $request->id;
        $bookGenres = DB::table('bookGenres')->get();
        $bookCovers = DB::table('bookCovers')->get();
        $book = DB::table('books')->join(
            'bookGenres',
            'bookGenres.id',
            '=',
            'books.bookGenreID'
        )->join(
            'bookCovers',
            'bookCovers.id',
            '=',
            'books.bookCoverID'
        )->select(
            'books.id as id',
            'books.*',
            'bookGenres.bookGenre as bookGenre',
            'bookCovers.bookCover as bookCover'
        )->where('books.id', $id)->first();

        if (!is_null($book)) {
            return view('admin.bookEdit', ['bookGenres' => $bookGenres, 'bookCovers' => $bookCovers, 'book' => $book]);
        } else {
            return abort(404);
        }
    }

    public function editBook(Request $request) {
        $book = DB::table('books')->where('id', $request->id);
        $book->update([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'descr' => $request->input('descr'),
            'price' => $request->input('price'),
            'bookGenreID' => $request->input('bookGenre'),
            'bookCoverID' => $request->input('bookCover'),
            'pagesCount' => $request->input('pagesCount'),
            'weight' => $request->input('weight'),
            'publisher' => $request->input('publisher'),
            'series' => $request->input('series'),
            'ageLimit' => $request->input('ageLimit'),
            'ISBN' => $request->input('ISBN'),
            'qty' => $request->input('qty'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        return redirect()->route('admin.books');
    }

    public function createBookView() {
        $bookGenres = DB::table('bookGenres')->get();
        $bookCovers = DB::table('bookCovers')->get();
        return view('admin.bookCreate', ['bookGenres' => $bookGenres, 'bookCovers' => $bookCovers]);
    }

    public function createBook(Request $request) {
        DB::table('books')->insert([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'descr' => $request->input('descr'),
            'price' => $request->input('price'),
            'bookGenreID' => $request->input('bookGenre'),
            'bookCoverID' => $request->input('bookCover'),
            'pagesCount' => $request->input('pagesCount'),
            'weight' => $request->input('weight'),
            'publisher' => $request->input('publisher'),
            'series' => $request->input('series'),
            'ageLimit' => $request->input('ageLimit'),
            'ISBN' => $request->input('ISBN'),
            'qty' => $request->input('qty'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        return redirect()->route('admin.books');
    }

    public function deleteBook(Request $request) {
        $book = DB::table('books')->where('id', $request->id);
        $book->delete();
        return redirect()->route('admin.books');
    }
}
