@extends('layouts.app')
@section('title','Cart TH21')

@section('content')

<div class="wishlist-page">
    <div class="container-fluid">
        <div class="wishlist-page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                       
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    
                                    <th>Address</th>
                                    <th>Note</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                @forelse($order as $order)
                                    @foreach($order->orderDetail as $orderDetail)
                                        <tr>
                                            <td>{{ $order->cus_address }}</td>
                                            <td>{{ $order->note }}</td>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="{{ $orderDetail->productOrderDetail->productImages[0]->image_url }}" alt="Image"></a>
                                                </div>
                                            </td>
                                            {{-- <td>{{ $orderDetail->productOrderDetail->name }}</td> <!-- Truy cập vào mối quan hệ để lấy thông tin sản phẩm --> --}}
                                            <td>{{ $orderDetail->quantity }}</td>
                                            <td>{{ $orderDetail->total }}</td>
                                            <td>
                                                <a href="{{ route('User_destroy_order', $order->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')">
                                                    <i class="fa fa-trash"></i> Hủy bỏ
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @empty
                                    <tr>
                                        <td colspan="6">Bạn không có đơn hàng nào</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection