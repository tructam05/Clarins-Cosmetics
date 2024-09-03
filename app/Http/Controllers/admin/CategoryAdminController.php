<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class CategoryAdminController extends Controller
{


    // Display a list of categories
    public function index()
    {
        $data = [
            'categories' => Category::get()
        ];
        return view('category/index')->with($data);
    }






    // Show the category add form
    public function add()
    {

        return view('category/add');
    }

    // Save a new category
    public function save(Request $request)
    {
        try {
            $category = new Category;
            $category->name = $request->input('name');
            $category->description = $request->input('description');

            $category->save(); // Save to the database

            // Success message
            $request->session()->flash('msg', 'Added a category successfully!');
            return redirect('clarins/category/index');
        } catch (Exception $ex) {
            // Failure message
            $request->session()->flash('msg', 'Added a category failed!' . $ex->getMessage());
            return redirect('clarins/category/add');
        }
    }




    // Delete a category
    public function delete($id, Request $request)
    {
        try {
            if (!Product::where('category_id', $id)->exists()) {
                Category::where('id', $id)->delete();
                $request->session()->flash('msg', 'Deleted successfully');
            } else {
                $request->session()->flash('msg', 'Category that contain products cannot be deleted');
            }
        } catch (Exception $ex) {
            $request->session()->flash('msg', 'Deleted failed');
        }
        return redirect()->back();
    }





    // Show the category edit form 
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category/edit', ['categories' => $category]);
    }

    // Update a category
    public function update(Request $request)
    {
        try {
            $id = $request->input('id');
            $category = Category::find($id);

            $category->name = $request->input('name');
            $category->description = $request->input('description');

            $category->save();

            $request->session()->flash('msg', 'Category updated successfully!');
            return redirect('/clarins/category/index');
        } catch (Exception $ex) {
            $request->session()->flash('msg', 'Category updated failed! ' . $ex->getMessage());
            return redirect('/clarins/category/edit/' . $id);
        }
    }
}
