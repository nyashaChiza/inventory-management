<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\StockCategory;

class StockCategoryController extends Controller
{
    public function index(){
        return view('stockCategory/index',['categories'=> StockCategory::all()]);
    }

    public function create(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $stockCategory = new StockCategory;
        $stockCategory->name = $validatedData['name'];
        $stockCategory->description = $validatedData['description'];
        $stockCategory->save();

        return redirect(route('listCategories'))->with('message', 'Category created successfully.');


    }

    public function showCreateForm(){
        return view('stockCategory.create');
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $stockCategory = StockCategory::findOrFail($id);
        $stockCategory->name = $validatedData['name'];
        $stockCategory->description = $validatedData['description'];
        $stockCategory->save();

        return redirect(route('listCategories'))->with('message', $stockCategory->name.' category updated');
    }

    public function destroy(Request $request, $id){

        $stockCategory = StockCategory::findOrFail($id);
        $name = $stockCategory->name;
        $stockCategory->delete();

        return redirect(route('listCategories'))->with('message',$name.' category deleted successfully');
    }


    public function showUpdateForm($id)
    {
        // Retrieve the stock category by ID
        $stockCategory = StockCategory::findOrFail($id);

        // Return the view for updating the stock category
        return view('stockCategory.update',['category'=>$stockCategory] );
    }
}
