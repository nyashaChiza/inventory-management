<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\StockCategory;
use Illuminate\Support\Facades\Log;

class StockCategoryController extends Controller
{
    public function index()
    {
        $categories = Cache::remember('categories', 60, function () {
            return StockCategory::all();
        });

        // Log a message when retrieving items from the cache
        Log::info('Categories retrieved from cache');

        // Return view with categories
        return view('stockCategory.index', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $stockCategory = StockCategory::create($validatedData);

        return redirect(route('listCategories'))->with('message', 'Category created successfully.');
    }

    public function create()
    {
        return view('stockCategory.create');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $stockCategory = StockCategory::findOrFail($id);
        $stockCategory->update($validatedData);

        return redirect(route('listCategories'))->with('message', $stockCategory->name.' category updated');
    }

    public function destroy(Request $request, $id)
    {
        $stockCategory = StockCategory::findOrFail($id);
        $name = $stockCategory->name;
        $stockCategory->delete();

        return redirect(route('listCategories'))->with('message', $name.' category deleted successfully');
    }

    public function showUpdateForm($id)
    {
        // Retrieve the stock category by ID
        $stockCategory = StockCategory::findOrFail($id);

        // Return the view for updating the stock category
        return view('stockCategory.update', ['category' => $stockCategory]);
    }
}
