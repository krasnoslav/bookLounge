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
}
