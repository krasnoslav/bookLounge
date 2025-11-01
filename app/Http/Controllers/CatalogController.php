<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function getBooks(Request $request) {
        $books = DB::table('books')->get();
        $genres = DB::table('bookGenres')->get();

        /* Сортировка и фильтрация */
        $params = collect($request->query());
        if ($params->get('sort_by')) {
            $books = $books->sortBy($params->get('sort_by'));
        }
        if ($params->get('sort_by_desc')) {
            $books = $books->sortByDesc($params->get('sort_by_desc'));
        }
        if ($params->get('filter')) {
            $books = $books->where('bookGenreID', $params->get('filter'));
        }
        return view('catalog', ['books' => $books, 'genres' => $genres, 'params' => $params]);
    }
}
