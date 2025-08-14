<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function get()
    {
        $products = Product::with('category')
            ->orderBy('created_at', 'desc')
            ->paginate(5)
            ->withQueryString();

        $categories = Category::all();

        return Inertia::render('views/MainView', [
            'categories' => $categories,
            'products'   => $products,
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'nama_produk'   => 'required|string|max:255',
            'kategori_id'   => 'required|string',
            'sku'           => 'required|string|max:100',
            'stok_produk'   => 'boolean',
            'stok'          => 'required|integer|min:0',
            'harga_modal'   => 'required|numeric|min:0',
            'harga_jual'    => 'required|numeric|min:0',
            'harga_spesial' => 'nullable|numeric|min:0',
        ]);
        $validated['image']    = 'https://images.unsplash.com/photo-1511376777868-611b54f68947?w=80&q=80&auto=format&fit=crop';
        $validated['variants'] = 1;
        $validated['type']     = 'Fisik';
        $validated['type']     = 'Fisik';


        $category = Category::where('fieldname', $validated['kategori_id'])->first();

        if (!$category) {
            $category = Category::create([
                'fieldname' => $validated['kategori_id']
            ]);
        }

        $validated['kategori_id'] = $category->_id;

        Product::create($validated);

        return redirect()->route('home')
            ->with('success', 'Produk berhasil disimpan');
    }
    public function delete($id)
        {
            $product = Product::findOrFail($id);
            $product->delete();

            return redirect()->route('home')
                ->with('success', 'Produk berhasil dihapus');
        }

    public function updateStockStatus(Request $request, $id)
        {
            $validated = $request->validate([
                'stok_produk' => 'required|boolean',
            ]);

            $product = Product::findOrFail($id);
            $product->stok_produk = $validated['stok_produk'];
            $product->save();

            return back()->with('success', 'Status stok produk berhasil diperbarui');
        }
}
