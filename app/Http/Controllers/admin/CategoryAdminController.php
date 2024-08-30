<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller ;
use App\Models\Category;
use DateTime;
use Illuminate\Http\Request;

class CategoryAdminController extends Controller 
{


    // Hiển thị danh sách danh mục
    public function index () {
        $data = [
            'categories' => Category::get()
        ] ; 
        return view('category/index')->with($data) ; 
    }






    // Thêm danh mục
    public function add () {

        return view('category/add') ; 
    }

    // Phương thức lưu danh mục mới
    public function save(Request $request)
    {
        try {
            $category = new Category;
            $category->name = $request->input('name');
            $category->description = $request->input('description');
            $category->created_at = now(); // Hoặc có thể dùng DateTime nếu cần định dạng cụ thể
            $category->updated_at = now(); // Tương tự như trên

            $category->save(); // Lưu vào database

            // Thông báo thành công
            $request->session()->flash('msg', 'Thêm danh mục thành công!');
            return redirect('clarins/category/index');
        } catch (Exception $ex) {
            // Thông báo thất bại
            $request->session()->flash('msg', 'Thêm danh mục thất bại: ' . $ex->getMessage());
            return redirect('clarins/category/add');
        }
    }




    // thực hiện xóa category
    public function delete($id, Request $request)
    {
        try {
            Category::where('id', $id)->delete();
            $request->session()->flash('msg', 'Deleted successfully');
        } catch (Exception $ex) {
            $request->session()->flash('msg', 'delete failure');
        }
        return redirect('product/index');
    }





    // thực hiện edit category 
    public function edit($id)
    {
        $category = Category::find($id); // Tìm danh mục theo ID
        return view('category/edit', ['categories' => $category]); // Đảm bảo 'edit' là tên file Blade
    }


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






?>