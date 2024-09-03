<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Exception;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{






    // Display a list of products

    public function index()
    {
        $products = Product::all();
        return view('product/index', compact('products'));
    }

    // Show a specific product
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $images = $product->images; // Get the product's images

        return view('product/details', compact('product', 'images'));
    }



    // Show products by category
    public function category($id)
    {
        $product = Product::with('category')->find($id); // Get the product with its category
        return view('product.index', compact('product'));
    }





    // Add a new product
    public function add()
    {
        $categories = Category::all(); // Get all categories for the dropdown

        return view('product/add', ['categories' => $categories]);
    }


    public function save(Request $request)
    {
        try {
            $product = new Product();
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->quantity = $request->input('quantity');
            $product->short_description = $request->input('short_description');
            $product->description = $request->input('description');
            $product->ingredients = $request->input('ingredients');
            $product->category_id = $request->input('category_id');
            $product->status = (int) $request->input('status');


            $product->save(); // Save to the database

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $photo = $this->generateFileName($file->getClientOriginalName());
                $file->move(public_path('user/images/product'), $photo);


                $product_image = new ProductImage;
                $product_image->product_id = $product->id;
                $product_image->path = $photo;
                $product_image->is_primary = 1;
                $product_image->save();
            }



            // Success message
            $request->session()->flash('msg', 'Added product successfully!');
            return redirect('clarins/product/index');
        } catch (Exception $ex) {
            // Failure message
            $request->session()->flash('msg', 'Added product failed!' . $ex->getMessage());
            return redirect('clarins/product/add');
        }
    }








    // Delete a product
    public function delete($id, Request $request)
    {
        try {
            $product = Product::find($id);
            if ($product) {
                // Delete related product images
                $product->images()->delete();
                // Delete the product itself
                $product->delete();
                $request->session()->flash('msg', 'Deleted successfully');
            } else {
                $request->session()->flash('msg', 'Product not found');
            }
        } catch (Exception $ex) {
            $request->session()->flash('msg', 'Delete failure');
        }
        return redirect('clarins/product/index');
    }












    // Update a product
    public function update(Request $request)
    {
        try {
            // Find the product by ID
            $product = Product::find($request->post('id'));


            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $photo = $this->generateFileName($file->getClientOriginalName());
                $file->move(public_path('user/images/product'), $photo);


                $product_image = new ProductImage;
                $product_image->product_id = $request->post('id');
                $product_image->path = $photo;
                $product_image->is_primary = 0;
                $product_image->save();
            }

            // Update product information
            $product->name = $request->post('name');
            $product->price = $request->post('price');
            $product->quantity = $request->post('quantity');
            $product->short_description = $request->post('short_description');
            $product->description = $request->post('description');
            $product->ingredients = $request->post('ingredients');
            $product->category_id = $request->post('category_id');
            $product->status = $request->post('status') == 1 ? 1 : 0;

            // Save changes
            $product->save();

            // Success message
            $request->session()->flash('msg', 'Product updated successfully');
            return redirect('clarins/product/index');
        } catch (Exception $ex) {
            // Failure message
            $request->session()->flash('msg', 'Product update failed');

            return redirect('clarins/product/edit/' . $request->post('id'));
        }
    }


    public function edit($id)
    {
        $product = Product::with('images')->find($id);
        $categories = Category::all();

        return view('product.edit', compact('product', 'categories'));
    }






    function generateFileName($fileName)
    {
        $name = uniqid();
        $lastIndex = strrpos($fileName, '.');
        $ext = substr($fileName, $lastIndex);
        return $name . $ext;
    }










    public function deleteImage(Request $request, $image_id)
    {
        try {
            $imageId = $image_id;
            $image = ProductImage::find($imageId);

            if ($image) {
                if (file_exists(public_path('user/images/product/' . $image->path))) {
                    unlink(public_path('user/images/product/' . $image->path));
                }
                $image->delete();
                $request->session()->flash('msg', 'Image has been successfully deleted');
            } else {
                $request->session()->flash('msg', 'Image not found');
            }
            return redirect()->back();
        } catch (Exception $ex) {
            $request->session()->flash('msg', 'Remove images failed');
            return redirect()->back();
        }
    }





    // Out Of Stock
    public function lowStockProducts()
    {
        $products = Product::with('image')
            ->where(function ($query) {
                $query->where('status', 0)
                    ->orWhere('quantity', '<', 30);
            })
            ->get();

        return view('product.low_stock', compact('products'));
    }
}
