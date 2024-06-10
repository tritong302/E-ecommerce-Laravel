<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminConfirm;
use App\Mail\AdminCancel;
class UserOrderController extends Controller
{
    public function AllUserOrder()
    {
        $order = Order::all();
        $orderDetail = OderDetail::all();
        return view('admin.AllOrder', compact('order', 'orderDetail'));
    }
    public function AllUserDesTroy($id)
    {
          // Xóa đơn hàng
        $order = Order::findOrFail($id);
        $order->delete();

        Mail::to($order->cus_email)->send(new AdminConfirm());
        // Chuyển hướng về trang danh sách đơn hàng
        return redirect()->route('All_User_Order')->with('success', 'Đơn hàng đã được xóa thành công!');
    }
    public function AllUserCancel($id)
    {
          // Xóa đơn hàng
        $order = Order::findOrFail($id);
        $order->delete();

        Mail::to($order->cus_email)->send(new AdminCancel());
        // Chuyển hướng về trang danh sách đơn hàng
        return redirect()->route('All_User_Order')->with('success', 'Đơn hàng đã được xóa thành công!');
    }
}
