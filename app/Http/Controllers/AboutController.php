<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index() {
        $books = DB::table('books')->select('id', 'title', 'img')->get()->sortByDesc('created_at')->take(5);
        return view('welcome', ['books' => $books]);
    }
}
