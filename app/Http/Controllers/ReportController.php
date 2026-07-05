<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;

class ReportController extends Controller
{
    public function sales()
    {
        $orders = Order::with('items.product')
            ->orderBy('id', 'desc')
            ->get();

        $totalSales = $orders->sum('total_price');
        $totalOrders = $orders->count();

        return view('reports.sales', compact(
            'orders',
            'totalSales',
            'totalOrders'
        ));
    }
}