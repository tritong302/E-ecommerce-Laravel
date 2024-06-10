<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use App\Mail\CancelOrder;

class OrderController extends Controller
{
    public function index(OrderRequest $request)
    {
        $validateData = $request->validated();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'cus_name' => $validateData['cus_name'],
            'cus_email' => $validateData['cus_email'],
            'cus_phone' => $validateData['cus_phone'],
            'cus_address' => $validateData['cus_address'],
            'note' => $validateData['note'],
        ]);

        //    $orderDetail = OderDetail::create([
        //     'order_id'=>$order->id,

        //    ]);

        // Các trường dữ liệu khác của đơn hàng

        $order->save();

        // Lấy sản phẩm, số lượng và tổng tiền từ request
        $products = $request->input('product');
        $quantities = $request->input('quantity');
        $total = $request->input('total');

        // Lưu thông tin sản phẩm, số lượng và tổng tiền vào cơ sở dữ liệu
        foreach ($products as $key => $productId) {
            // Lấy thông tin sản phẩm từ cơ sở dữ liệu
            $product = Product::find($productId);

            // Lưu thông tin sản phẩm vào đơn hàng
            $order->products()->attach($product, [
                'quantity' => $quantities[$key],
                'total' => $total[$key],
            ]);
        }

        // Thực hiện các hoạt động khác sau khi đã đặt hàng thành công
        return redirect()->route('home')->with('Đặt hàng thành công');
    }

    public function userOder()
    {
        $order = Order::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        $orderDetail = OderDetail::all();
        return view('users.order', compact('order', 'orderDetail'));
    }
    public function userDestroy($id)
{
    // Lấy thông tin đơn hàng
    $order = Order::findOrFail($id);

    // Gửi email xác nhận hủy đơn hàng cho khách hàng
    Mail::to($order->cus_email)->send(new CancelOrder());

    // Xóa đơn hàng
    $order->delete();

    // Chuyển hướng về trang danh sách đơn hàng
    return redirect()->route('User_list_order')->with('success', 'Đơn hàng đã được xóa thành công và email xác nhận đã được gửi đến khách hàng!');
}
}
