<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CateforyFormRequest;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryProductController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(CateforyFormRequest $request)
    {
        $validatedData = $request->validated();
        $category = new CategoryProduct();
        $category->cate_name = $validatedData['cate_name'];
        $category->cate_slug = Str::slug($validatedData['cate_slug']);
        if ($request->hasFile('cate_banner')) {
            $file = $request->file('cate_banner');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('uploads/category/', $fileName);
            $category->cate_banner = $fileName;
        }
        $category->status = $request->status == true ? '1' : '0';
        $category->save();
        return redirect('admin/category')->with('message', 'Category Added Successfully');
    }
    public function edit(CategoryProduct $categoryProduct)
    {

        return view('admin.category.edit', compact('categoryProduct'));
    }
    public function update(CateforyFormRequest $request, $category_product)
    {
        $validatedData = $request->validated();
        $category_product = CategoryProduct::findOrFail($category_product);
        $category_product->cate_name = $validatedData['cate_name'];
        $category_product->cate_slug = Str::slug($validatedData['cate_slug']);
        if ($request->hasFile('cate_banner')) {
            $path = 'uploads/category/' . $category_product->cate_banner;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('cate_banner');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;

            $file->move('uploads/category/', $fileName);
            $category_product->cate_banner = $fileName;
        }
        $category_product->status = $request->status == true ? '1' : '0';

        $category_product->update();
        return redirect('admin/category')->with('message', 'Category Updated Successfully');
    }
}
