<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeAdminController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('admin.recipes.index', compact('recipes'));
    }

    public function create()
    {
        return view('admin.recipes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'ingredients' => 'required',
            'steps' => 'required',
        ]);

        Recipe::create($request->all());

        return redirect()->route('admin.recipes.index')->with('success', 'Resep berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('admin.recipes.edit', compact('recipe'));
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'ingredients' => 'required',
            'steps' => 'required',
        ]);

        $recipe->update($request->all());

        return redirect()->route('admin.recipes.index')->with('success', 'Resep berhasil diupdate.');
    }

    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect()->route('admin.recipes.index')->with('success', 'Resep berhasil dihapus.');
    }
}

