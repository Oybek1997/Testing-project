<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::with('categories')->get();

        return view('catalogs.index', compact('catalogs'));
    }

    public function create()
    {
        $catalogs = Catalog::all();
        return view('catalogs.create', compact('catalogs'));
    }

    public function store(Request $request)
    {
        Catalog::create([
            'title' => $request->input('title'),
        ]);

        return redirect()->route('catalogs.index');
    }

    public function edit(Catalog $catalog)
    {
        $catalog->load('categories.products');

        return view('catalogs.edit', compact('catalog'));
    }

    public function update(Request $request, Catalog $catalog)
    {
        $catalog->update([
            'title' => $request->input('title'),
        ]);

        $categoryIds = $request->input('categories');
        $categories = Category::find($categoryIds);

        $catalog->categories()->sync($categories);

        foreach ($categories as $category) {
            $products = $category->products;

            $productCount = $request->input('product_count');

            if (count($products) < $productCount) {
                for ($i = count($products); $i < $productCount; $i++) {
                    $products[] = new Product([
                        'title' => 'Product ' . ($i + 1),
                    ]);
                }
            } elseif (count($products) > $productCount) {
                $products = array_slice($products, 0, $productCount);
            }

            $category->products()->saveMany($products);
        }

        return redirect()->route('catalogs.index');
    }

    public function destroy(Catalog $catalog)
    {
        $catalog->delete();

        return redirect()->route('catalogs.index');
    }
}
