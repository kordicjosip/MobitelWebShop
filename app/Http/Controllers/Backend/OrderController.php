<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;
use PDF;

class OrderController extends Controller
{
    
    public function PendingOrders(){
        $orders = Order::where('status', 'Pending')->orderBy('id', 'DESC')->get();
        return view('backend.orders.pending_orders', compact('orders'));
    }

    public function PendingOrderDetails($order_id){
        $order = Order::with('user')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('backend.orders.order_details', compact('order', 'orderItem'));
    }

    public function ConfirmedOrders(){
        $orders = Order::where('status', 'confirmed')->orderBy('id', 'DESC')->get();
        return view('backend.orders.confirmed_orders', compact('orders'));
    }

    public function ProcessingOrders(){
        $orders = Order::where('status', 'processing')->orderBy('id', 'DESC')->get();
        return view('backend.orders.processing_orders', compact('orders'));
    }

    public function ShippedOrders(){
        $orders = Order::where('status', 'shipped')->orderBy('id', 'DESC')->get();
        return view('backend.orders.shipped_orders', compact('orders'));
    }

    public function DeliveredOrders(){
        $orders = Order::where('status', 'delivered')->orderBy('id', 'DESC')->get();
        return view('backend.orders.delivered_orders', compact('orders'));
    }

    public function PendingToConfirm($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'confirmed',
        ]);
        
        $notification = array(
            'message' => 'Order Confirmed  successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('pending-orders')->with($notification);
    }

    public function ConfirmToProcessing($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'processing',
        ]);
        
        $notification = array(
            'message' => 'Order Processing  successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('confirmed-orders')->with($notification);
    }

    public function ProcessingToShipped($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'shipped',
        ]);
        
        $notification = array(
            'message' => 'Order Shipped successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('processing-orders')->with($notification);
    }

    public function ShippedToDelivered($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'delivered',
        ]);
        
        $notification = array(
            'message' => 'Order Delivered successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('shipped-orders')->with($notification);
    }

    public function AdminInvoice($order_id){
        $order = Order::with('user')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        //return view('frontend.user.order.order_invoice', compact('order', 'orderItem'));
        $pdf = PDF::loadView('backend.orders.admin_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('product_invoice.pdf');
    }

}
