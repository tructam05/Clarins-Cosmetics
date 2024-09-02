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






    // Hiển thị danh sách sản phẩm

    public function index()
    {
        $products = Product::all();
        return view('product/index', compact('products'));
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        $images = $product->images; // Lấy danh sách hình ảnh của sản phẩm

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
    public function update(Request $request)
    {
        try {
            // Tìm sản phẩm theo id
            $product = Product::find($request->post('id'));

            // Kiểm tra nếu có file mới được upload
            // if ($request->hasFile('file')) {
            //     // Xóa file ảnh cũ nếu có
            //     if ($product->photo && file_exists(public_path('user/images/product/' . $product->photo))) {
            //         unlink(public_path('user/images/product/' . $product->photo));
            //     }

            //     // Lưu file ảnh mới
            //     $file = $request->file('file');
            //     $photo = $this->generateFileName($file->getClientOriginalName());
            //     $file->move(public_path('user/images/product'), $photo);

            //     // Cập nhật tên file ảnh mới vào product
            //     $product->photo = $photo;
            // }
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

            // Cập nhật các thông tin khác của sản phẩm
            $product->name = $request->post('name');
            $product->price = $request->post('price');
            $product->quantity = $request->post('quantity');
            $product->short_description = $request->post('short_description');
            $product->description = $request->post('description');
            $product->ingredients = $request->post('ingredients');
            $product->category_id = $request->post('category_id');
            $product->status = $request->post('status') == 1 ? 1 : 0;

            // Lưu các thay đổi
            $product->save();

            // Hiển thị thông báo thành công
            $request->session()->flash('msg', 'Product updated successfully');
            return redirect('clarins/product/index');
        } catch (Exception $ex) {
            // Hiển thị thông báo lỗi nếu có lỗi xảy ra
            $request->session()->flash('msg', 'Product update failed');
            dd($ex);
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
                $request->session()->flash('msg', 'Hình ảnh đã được xóa thành công');
            } else {
                $request->session()->flash('msg', 'Hình ảnh không tồn tại');
            }
            return redirect()->back();
        } catch (Exception $ex) {
            $request->session()->flash('msg', 'Xóa hình ảnh thất bại');
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
