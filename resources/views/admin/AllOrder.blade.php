@extends('layouts.admin')
@section('content')

<div class="col-md-12">
    <div class="table-responsive">
       
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>AccCount</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Note</th>
                    <th>Product Name</th>
                    <th>Color</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Confirm</th>
                    <th>Cancel</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                @forelse($order as $order)
                    @foreach($order->orderDetail as $orderDetail)
                        <tr>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->cus_name }}</td>
                            <td>{{ $order->cus_phone }}</td>
                            <td>{{ $order->cus_address }}</td>
                            <td>{{ $order->note }}</td>
                            {{-- <td>
                                <div class="img">
                                    <a href="#"><img src="{{ $orderDetail->productOrderDetail->productImages[0]->image_url }}" alt="Image"></a>
                                </div>
                            </td> --}}
                            <td>{{ $orderDetail->productOrderDetail->name }}</td> <!-- Truy cập vào mối quan hệ để lấy thông tin sản phẩm --> 
                            <th>
                                @if ($orderDetail->productColor)
                                    {{ $orderDetail->productColor->color->name }}
                                @else
                                    Không
                                @endif
                            </th>
                            <td>{{ $orderDetail->quantity }}</td>
                            <td>{{ $orderDetail->total }}</td>
                            <td>
                                <a href="{{ route('All_User_destroy_order', $order->id) }}" class="btn btn-info btn-sm" onclick="return confirm('Bạn xác nhận đơn hàng này cho khách!')">
                                    <i class="fa fa-trash"></i> Confirm
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('All_User_cancel_order', $order->id) }}" class="btn btn-warning btn-sm" onclick="return confirm('Bạn xác nhận đơn hàng này cho khách!')">
                                    <i class="fa fa-trash"></i> Cancel
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @empty
                    <tr>
                        <td colspan="6">Chưa có đơn hàng nào!!!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


@endsection