<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller ;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductAdminController extends Controller 
{





        

    public function index()
    {
        $products = Product::all();
        return view('product/index',compact('products'));
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        $images = $product->images; 
    
        return view('product/details', compact('product', 'images'));
    }




    public function category($id)
    {
        $product = Product::with('category')->find($id); // Lấy mỹ phẩm cùng với danh mục của nó
        return view('product.index', compact('product'));
    }





    // thực hiện thêm sản phẩm 
    public function add()
    {
        $categories = Category::all(); // Lấy tất cả danh mục để hiển thị trong dropdown

        return view('product/add', ['categories' => $categories]); // Đảm bảo 'dash4' là tên file Blade
    }


    public function save(Request $request)
    {
        try {
            $products = new Product();
            $products->name = $request->input('name');
            $products->price = $request->input('price');
            $products->quantity = $request->input('quantity');
            $products->short_description = $request->input('short_description');
            $products->description = $request->input('description');
            $products->ingredients = $request->input('ingredients');
            $products->category_id = $request->input('category_id');
            $products->status = (int) $request->input('status'); // Chuyển đổi thành số nguyên
            // $products->created_at = now(); // Hoặc có thể dùng DateTime nếu cần định dạng cụ thể
            // $products->updated_at = now(); // Tương tự như trên


            

            $products->save(); // Lưu vào database

            // Thông báo thành công
            $request->session()->flash('msg', 'Thêm sản phẩm thành công!');
            return redirect('clarins/product/index');
        } catch (Exception $ex) {
            // Thông báo thất bại
            $request->session()->flash('msg', 'Thêm sản phẩm thất bại: ' . $ex->getMessage());
            return redirect('clarins/product/add');
        }
    }








    // thực hiện xóa sản phẩm 
    public function delete($id, Request $request)
    {
        try {
            Product::where('id', $id)->delete();
            $request->session()->flash('msg', 'Deleted successfully');
        } catch (Exception $ex) {
            $request->session()->flash('msg', 'delete failure');
        }
        return redirect('clarins/product/index');
    }




        // thực hiện edit sản phẩm 

        public function edit () {
            $data = [
                'products' => Product::get() ,
                'categories' => Category::get()
            ] ; 
            
    
            return view('product/edit')->with($data) ; 
        }

  





            //Out Of Stock
        public function lowStockProducts()
           {
               $products = Product::with('image')->where('quantity', '<', 30)->get();
               return view('product.low_stock', compact('products'));
           }




















}






?>