<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\CategoryProduct;
use App\Models\Color;
use App\Models\Manufactures;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){
        $product = Product::paginate(10);
        return view('admin.product.index',compact('product'));
    }
    public function create(){
        $color  = Color::where('status','1')->get();
        $category_product = CategoryProduct::all();
        $manufacturers = Manufactures::all();
        return view('admin.product.create',compact('category_product','manufacturers','color'));
    }
    public function store (ProductFormRequest $request)
    {
        $validateData = $request->validated();
        $category_product = CategoryProduct::findOrFail($validateData['category_id']);
        $product =  $category_product->product()->create([
            'name'=>$validateData['name'],
            'slug'=>Str::slug($validateData['slug']),
            'short_desc'=>$validateData['short_desc'],
            'quantity'=>$validateData['quantity'],
            'regular_price'=>$validateData['regular_price'],
            'sale_price'=>$validateData['sale_price'],
            'description'=>$validateData['description'],
            'status'=>$request->status == true ? '1':'0',
            'trending'=>$request->trending == true ? '1':'0',
            'featured'=>$request->featured == true ? '1':'0',
            'best_seller'=>$request->best_seller == true ? '1':'0',
            'category_id'=>$validateData['category_id'],
            'manufacturers_id'=>$validateData['manufacturers_id'],
        ]);
       if($request->hasFile('image')){
           $uploadPath = 'uploads/products/';
           foreach ($request->file('image') as $imageFile){
               $extention = $imageFile->getClientOriginalExtension();
               $fileName = time().'.'.$extention;
               $imageFile->move($uploadPath,$fileName);
               $finalImagePathName = $uploadPath.$fileName;
               $product->productImages()->create([
                   'product_id'=>$product->id,
                   'image_url'=>$finalImagePathName,
               ]);
           }
       }
       if($request->color){
           foreach ($request->color as $key=> $color){
               $product->productColor()->create([
                   'product_id'=>$product->id,
                   'color_id'=>$color,
                   'quantity'=>$request->color_quantity[$key] ?? 0
               ]);
           }
       }
       return redirect('/admin/product')->with('message','Product Added Successfully');
    }
    public function edit(int $product_id)
    {
        $category_product = CategoryProduct::all();
        $manufacturers = Manufactures::all();
        $product = Product::findOrFail($product_id);
        $product_color = $product->productColor->pluck('color_id')->toArray();
        $color = Color::whereNotIn('id',$product_color)->get();
        return view('admin.product.edit',compact('product','category_product','manufacturers','color'));
    }
    public function update(int $product_id, ProductFormRequest $request)
    {
        $validateData = $request->validated();
        $product = Product::findOrFail($product_id);
        if($product) {
            $product->update([
                'name'=>$validateData['name'],
                'slug'=>Str::slug($validateData['slug']),
                'short_desc'=>$validateData['short_desc'],
                'quantity'=>$validateData['quantity'],
                'regular_price'=>$validateData['regular_price'],
                'sale_price'=>$validateData['sale_price'],
                'description'=>$validateData['description'],
                'status'=>$request->status == true ? '1':'0',
                'trending'=>$request->trending == true ? '1':'0',
                'featured'=>$request->featured == true ? '1':'0',
                'best_seller'=>$request->best_seller == true ? '1':'0',
                'category_id'=>$validateData['category_id'],
                'manufacturers_id'=>$validateData['manufacturers_id'],
            ]);
            if($request->hasFile('image')){
                $uploadPath = 'uploads/products/';
                foreach ($request->file('image') as $imageFile){
                    $extention = $imageFile->getClientOriginalExtension();
                    $fileName = time().'.'.$extention;
                    $imageFile->move($uploadPath,$fileName);
                    $finalImagePathName = $uploadPath.$fileName;
                    $product->productImages()->create([
                        'product_id'=>$product->id,
                        'image_url'=>$finalImagePathName,
                    ]);
                }
            }
            if($request->color){
                foreach ($request->color as $key=> $color){
                    $product->productColor()->create([
                        'product_id'=>$product->id,
                        'color_id'=>$color,
                        'quantity'=>$request->color_quantity[$key] ?? 0
                    ]);
                }
            }
            return redirect('/admin/product')->with('message','Product Updated Successfully');
        }
        else{
            return redirect('admin/product')->with('message','No Such Product Id Found');
        }
    }
    public function destroyImage(int $product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message','Product Image Deleted');
    }
    public  function destroy( int $product_id)
    { $product = Product::findOrFail($product_id);
        $product = Product::findOrFail($product_id);

        // Lấy danh sách các đường dẫn hình ảnh
        $imagePaths = $product->productImages->pluck('image_url')->toArray();
    
        // Xóa bản ghi hình ảnh trong cơ sở dữ liệu
        $product->productImages()->delete();
    
        // Xóa sản phẩm
        $product->delete();
    
        // Xóa các hình ảnh trong mã code
        // Không cần thực hiện bất kỳ thao tác nào ở đây
        
        return redirect()->back()->with('message', 'Product deleted with all images');
    }
    public function updateProductColorQuantity(Request $request, $product_color_id)
    {
        $productColorData = Product::findOrFail($request->product_id)
        ->productColor()->where('id',$product_color_id)->first();
        $productColorData->update([
            'quantity' =>$request->quantity
        ]);
        return response()->json(['message'=>'Product Color Quantity Updated']);
    }
    public  function deleteProductColor($product_color_id)
    {
        $productColor = ProductColor::findOrFail($product_color_id);
        $productColor->delete();
        return response()->json(['message'=>'Product Color Deleted']);
    }
}
