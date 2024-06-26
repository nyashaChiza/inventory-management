<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\StockCategory;

class StockController extends Controller
{
    // Show all stocks
    public function index()
    {
        $stocks = Stock::all();
        return view('stocks.index', compact('stocks'));
    }

    // Show the form for creating a new stock
    public function create()
{
    $categories = StockCategory::all();
    return view('stocks.create', compact('categories'));
}

    // Store a newly created stock in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'category_id' => 'nullable|exists:stock_category,id',
            'expiry_date' => 'nullable|date',
            'unit_price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
        ]);

        Stock::create($validatedData);

        return redirect()->route('stockIndex')->with('success', 'Stock created successfully.');
    }

    // Display the specified stock
    public function show(Stock $stock)
    {
        return view('stocks.show', compact('stock'));
    }


    public function showCreateForm()
    {
        return view('stocks.create');
    }

    public function showUpdateForm()
    {
        return view('stocks.update');
    }

    // Show the form for editing the specified stock
    public function edit(Stock $stock)
    {
        return view('stocks.edit', compact('stock'));
    }

    // Update the specified stock in storage
    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'category_id' => 'nullable|exists:stock_category,id',
            'expiry_date' => 'nullable|date',
            'unit_price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
        ]);

        $stock->update($request->all());

        return redirect()->route('stocks.index')->with('success', 'Stock updated successfully.');
    }

    // Remove the specified stock from storage
    public function destroy(Stock $stock)
    {
        $stock->delete();

        return redirect()->route('stocks.index')->with('success', 'Stock deleted successfully.');
    }
}
