<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use App\OrderItem;

class OrderController extends Controller
{
    public function store($id)
    {
        $product = Product::findOrFail($id);

        if ($product->stock <= 0) {
            return redirect()->route('products.index')
                ->with('success', 'สินค้าหมดสต็อก');
        }

        $order = Order::create([
            'total_price' => $product->price
        ]);

        OrderItem::create([
            'order_id'   => $order->id,
            'product_id' => $product->id,
            'quantity'   => 1,
            'price'      => $product->price
        ]);

        $product->stock = $product->stock - 1;
        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'ขายสินค้าเรียบร้อยแล้ว');
    }
}