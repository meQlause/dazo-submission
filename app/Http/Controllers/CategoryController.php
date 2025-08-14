<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
public function get(Request $request)
{
    $search = $request->query('search');

    $categories = Category::when($search, function ($query, $search) {
            $query->where('fieldname', 'regexp', "/^" . preg_quote($search) . "/i");
        })
        ->paginate(10)
        ->withQueryString();


    return response()->json([
        'categories' => $categories,
        'filters' => [
            'search' => $search
        ]
    ]);
}
    public function create(Request $request)
    {
        $validated = $request->validate([
            'fieldname' => 'required|string|max:255'
        ]);

        Category::create($validated);

        return redirect()->route('home')->with('success', 'Kategori berhasil ditambahkan');
    }
}
