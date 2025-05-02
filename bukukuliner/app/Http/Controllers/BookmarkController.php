<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Bookmark;

class BookmarkController extends Controller
{
    public function store($id)
{
    Bookmark::firstOrCreate([
        'user_id' => auth()->id(),
        'recipe_id' => $id
    ]);
    return back()->with('success', 'Resep berhasil disimpan ke bookmark!');
}

public function remove($id)
{
    Bookmark::where('user_id', auth()->id())->where('recipe_id', $id)->delete();
    return back()->with('success', 'Resep berhasil dihapus dari bookmark!');
}

public function index()
{
    $bookmarks = Bookmark::where('user_id', auth()->id())->with('recipe')->get();
    return view('bookmarks', ['bookmarks' => $bookmarks]);
}
}