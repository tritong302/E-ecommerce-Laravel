@extends('layouts.admin')
@section('content')
    <div class="row">
        @if(session('message'))
            <h4 class="alert alert-success mb-2">{{session('message')}}</h4>
        @endif
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">Edit Product</h4>
                    <p class="card-description">
                        Edit Product
                    </p>
                    <form action="{{url('/admin/product/'.$product->id)}}" enctype="multipart/form-data" class="forms-sample" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Name" name="name" value="{{$product->name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Slug" name="slug" value="{{$product->slug}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Short Description</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Short Description" name="short_desc" value="{{$product->short_desc}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Quantity</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Short Description" name="quantity" value="{{$product->quantity}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Regular Price</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Regular Price" name="regular_price" value="{{$product->regular_price}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Sale Price</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Sale Price" name="sale_price" value="{{$product->sale_price}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea type="text" class="form-control" id="exampleInputPassword1" placeholder="Description" name="description" >{{$product->description}}</textarea>
                        </div>
                        <div >
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" checked name="status" {{$product->status == '1'?'checked':''}}>
                                Status
                            </label>
                        </div>
                        <div >
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" checked  name="trending" {{$product->trending == '1'?'checked':''}}>
                                Trending
                            </label>
                        </div>
                        <div >
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" checked name="featured" {{$product->featured == '1'?'checked':''}}>
                                Featured
                            </label>
                        </div>
                        <div >
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" checked name="best_seller" {{$product->best_seller == '1'?'checked':''}}>
                                Best Seller
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" multiple name="image[]" class="form-control">
                            <div >
                                @if($product->productImages)
                                    <div class="row">
                                        @foreach($product->productImages as $image)
                                        <div class="col-md-2">
                                                <img src="{{asset($image->image_url)}}" style="width: 80px; height: auto" alt="image_product" class="me-4 border">
                                                <a href="{{url('admin/product-image/'.$image->id.'/delete')}}" class="d-block">Remove</a>
                                        </div>
                                        @endforeach
                                    </div>
                                @else
                                    <h5>
                                        No Image Found
                                    </h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <h4>Add Product Color</h4>
                                <label for="exampleFormControlSelect1">Select Color</label>
                                <div class="row">
                                    @forelse($color as $item)
                                        <div class="col-md-3">
                                            <div class="p-2 border mb-3">
                                                Color: <input type="checkbox" multiple name="color[{{$item->id}}]" value="{{$item->id}}">
                                                {{$item->name}}
                                                <br>
                                                Quantity: <input type="number" name="color_quantity[{{$item->id}}]" style="width: 50px; border: 1px solid">
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-md-12">
                                            <h3>No Color found</h3>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Color Name</th>
                                        <th>Quantity</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product->productColor as $item)
                                        <tr class="product-color-tr">
                                            <td>
                                                @if($item->color)
                                                    {{$item->color->name}}
                                                @else
                                                    No Color Found
                                                @endif
                                            </td>
                                            <td>
                                                <div class="input-group mb-3" style="width: 150px">
                                                    <input type="text" value="{{$item->quantity}}" class="productQuantity form-control form-control-sm">
                                                    <button type="button" value="{{$item->id}}" class="updateProductColorBtn btn btn-primary btn-sm text-white">Update</button>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" value="{{$item->id}}" class="deleteProductColorBtn btn btn-danger btn-sm text-white">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>

                            </div>

                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control form-control-lg" id="category_id" name="category_id">
                                    @foreach($category_product as $item)
                                <option value="{{$item->id}}" {{$item->id == $product->category_id ? 'selected':''}}>{{$item->cate_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Brand</label>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="manufacturers_id">
                                    @foreach($manufacturers as $item)
                                    <option value="{{$item->id}}" {{$item->id == $product->manufacturers_id ? 'selected':''}}>{{$item->name}}</option>
                                    @endforeach

                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function (){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click','.updateProductColorBtn', function (){
                var product_id ="{{$product->id}}"
                var product_color_id = $(this).val();
                var quantity = $(this).closest('.product-color-tr').find('.productQuantity').val();
                if(quantity <=0){
                    alert('Quantity is required')
                    return false
                }
                var data = {
                    'product_id':product_id,
                    'product_color_id':product_color_id,
                    'quantity':quantity
                };
                $.ajax({
                    type:'POST',
                    url:"/admin/product-color/"+product_color_id,
                    data:data,
                    success:function (response){
                        alert(response.message)
                    }
                })
                console.log('oke')
            })
            $(document).on('click','.deleteProductColorBtn', function (){
                var product_color_id = $(this).val();
                var thisClick = $(this);

                $.ajax({
                    type:'GET',
                    url:"/admin/product-color/"+product_color_id+"/delete",
                    success:function (response){
                        thisClick.closest('.product-color-tr').remove();
                        alert(response.message);
                    }
                })
            })
        });

    </script>
@endsection
