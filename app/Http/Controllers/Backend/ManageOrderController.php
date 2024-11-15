<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Notifications\OrderCancelNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ManageOrderController extends Controller
{
    public function manageOrder(){
        $orders = Order::all()->sortByDesc('created_at')->values();
        return view('admin.layouts.order.order_table',compact('orders'));
    }
    public function acceptOrder($id){
        $order = Order::find($id);
        $order->update([
            'order_status'=>'accepted',
        ]);
        return redirect()->back()->with('message','Order accepted');
    }
    public function rejectOrder($id){
        $order = Order::find($id);
        Notification::send($order, new OrderCancelNotification($order->model,$order->product_name,$order->price,$order->quantity));
        $order->update([
            'order_status'=>'canceled',
        ]);
        return redirect()->route('admin.manage.order')->with('error','Order Canceled');
    }
}
