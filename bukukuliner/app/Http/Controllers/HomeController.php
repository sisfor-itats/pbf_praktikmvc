<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class HomeController extends Controller
{
    public function index(Request $request)
{
    $query = Recipe::query();

    if ($request->has('search') && $request->search !== null) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    if ($request->has('category') && $request->category !== null) {
        $query->where('category', $request->category);
    }

    $recipes = $query->get();
    $categories = Recipe::select('category')->distinct()->get();

    return view('home', compact('recipes', 'categories'));
}

}
