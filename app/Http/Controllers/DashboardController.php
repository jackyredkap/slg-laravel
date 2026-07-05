<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Order;

class DashboardController extends Controller
{
    public function index()
    {
        // ข้อมูลสินค้า
        $totalProducts = Product::count();
        $totalCategories = Category::count();

        // สินค้าใกล้หมด (เหลือไม่เกิน 5 ชิ้น)
        $lowStock = Product::where('stock', '<=', 5)
                           ->where('stock', '>', 0)
                           ->count();

        // สินค้าหมด
        $outOfStock = Product::where('stock', 0)->count();

        // จำนวนสินค้าคงเหลือทั้งหมด
        $totalStock = Product::sum('stock');

        // มูลค่าสินค้าคงคลัง
        $totalValue = Product::selectRaw('SUM(price * stock) as total')
                             ->value('total');

        // ข้อมูลการขาย
        $totalOrders = Order::count();
        $totalSales = Order::sum('total_price');

        return view('dashboard', compact(
            'totalProducts',
            'totalCategories',
            'lowStock',
            'outOfStock',
            'totalStock',
            'totalValue',
            'totalOrders',
            'totalSales'
        ));
    }
}