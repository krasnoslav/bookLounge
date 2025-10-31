<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function getBooks() {
        $books = DB::table('books')->get();
        return view('catalog', ['books' => $books]);
    }
}
