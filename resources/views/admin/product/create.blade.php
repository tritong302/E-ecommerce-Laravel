@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">Add Product</h4>
                    <p class="card-description">
                        Add Product
                    </p>
                    <form action="{{url('/admin/product')}}" enctype="multipart/form-data" class="forms-sample" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Slug" name="slug">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Short Description</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Short Description" name="short_desc">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Quantity</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Quantity" name="quantity">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Regular Price</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Regular Price" name="regular_price">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Sale Price</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Sale Price" name="sale_price">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea type="text" class="form-control" id="exampleInputPassword1" placeholder="Description" name="description"></textarea>
                        </div>
                        <div class="form-check form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" checked name="status">
                                Status
                            </label>
                        </div>
                        <div class="form-check form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" checked  name="trending">
                                Trending
                            </label>
                        </div>
                        <div class="form-check form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" checked name="featured">
                                Featured
                            </label>
                        </div>
                        <div class="form-check form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" checked name="best_seller">
                                Best Seller
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" multiple name="image[]" class="form-control">

                        </div>
                        <div class="form-group">
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
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control form-control-lg" id="category_id" name="category_id">
                                    @foreach($category_product as $item)
                                <option value="{{$item->id}}">{{$item->cate_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Brand</label>
                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="manufacturers_id">
                                    @foreach($manufacturers as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
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
