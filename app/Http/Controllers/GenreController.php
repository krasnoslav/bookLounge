<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    public function getGenres() {
        $bookGenres = DB::table('bookGenres')->get();
        return view('admin.genres', ['bookGenres' => $bookGenres]);
    }

    public function createGenreView() {
        $bookGenres = DB::table('bookGenres')->get();
        return view('admin.genreCreate', ['bookGenres' => $bookGenres]);
    }

    public function createGenre(Request $request) {
        DB::table('bookGenres')->insert([
            'bookGenre' => $request->input('title'),
        ]);
        return redirect()->route('admin.genres');
    }

    public function getGenreById(Request $request) {
        $bookGenre = DB::table('bookGenres')->where('id', $request->id)->first();

        if (!is_null($bookGenre)) {
            return view('admin.genreEdit', ['bookGenre' => $bookGenre]);
        } else {
            return abort(404);
        }
    }

    public function editGenre(Request $request) {
        $bookGenre = DB::table('bookGenres')->where('id', $request->id);

        $bookGenre->update([
            'bookGenres' => $request->input('title'),
        ]);
        return redirect()->route('admin.genres');
    }

    public function deleteGenre(Request $request) {
        $bookGenre = DB::table('bookGenres')->where('id', $request->id);
        $booksForDelete = DB::table('books')->where('bookGenreID', $request->id);
        foreach ($booksForDelete->select('id')->get() as $value) {
            DB::table('cart')->where('bid', $value->id)->delete();
            DB::table('orders')->where('bid', $value->id)->delete();
        }
        $booksForDelete->delete();
        $bookGenre->delete();

        return redirect()->route('admin.genres');
    }
}
