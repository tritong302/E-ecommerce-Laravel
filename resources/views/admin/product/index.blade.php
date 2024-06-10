@extends('layouts.admin')
@section('content')
    @if(session('message'))
        <h6 class="alert alert-success">{{session('message')}}</h6>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title">Product</h4>
                    <p class="card-description">
                        Product List
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="{{url('/admin/add-product')}}" class="btn btn-primary text-white">Add Product</a>
                </div>
            </div>

            <div class="table-responsive pt-3 ">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Product</th>

                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($product as $index => $item)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$item->id}}</td>
                            @if($item->category_product)
                            <td>{{$item->category_product->cate_name}}</td>
                            @else
                                No Category
                            @endif
                            <td>{{$item->name}}</td>

                            <td>{{$item->regular_price}}</td>
                            <td> {{$item->quantity}} </td>
                            <td>{{$item->status == '1' ? 'Hidden':'Visible'}}</td>
                            <td>
                                <a href="{{url('admin/product/'.$item->id.'/edit')}}" class="btn btn-success">Edit</a>
                                <a href="{{url('admin/product/'.$item->id.'/delete')}}" onclick="return confirm('Are you sure, you want to delete this data ?')" class="btn btn-danger" data-bs-target="#deleteModal">Delete</a>
                                <a href="{{url('admin/product/'.$item->id.'/edit')}}" class="btn btn-success">Details</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            No Product Found
                        </tr>
                    @endforelse
                    </tbody>
                    
                </table>
                {!! $product->links('pagination::bootstrap-4', ['prev_page' => '← Previous', 'next_page' => 'Next→'])
                    !!}

            </div>
        </div>
    </div>
@endsection
