@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">📊 Dashboard</h2>
	
	<p class="text-muted mb-4">
    สรุปรายการขายทั้งหมดของระบบ พร้อมยอดขายและจำนวนออเดอร์
</p>


    {{-- Cards สรุปข้อมูล --}}
    <div class="row mb-4">

        <div class="col-md-3">
            <div class="card bg-primary text-white mb-3">
                <div class="card-body">
                    <h5>📦 จำนวนสินค้า</h5>
                    <h3>{{ $totalProducts }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-info text-white mb-3">
                <div class="card-body">
                    <h5>🗂 หมวดหมู่</h5>
                    <h3>{{ $totalCategories }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-warning text-dark mb-3">
                <div class="card-body">
                    <h5>🛒 จำนวนออเดอร์</h5>
                    <h3>{{ $totalOrders }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-success text-white mb-3">
                <div class="card-body">
                    <h5>💰 ยอดขายรวม</h5>
                    <h3>{{ number_format($totalSales, 2) }}</h3>
                    <small>บาท</small>
                </div>
            </div>
        </div>

    </div>

    {{-- ปุ่มเมนูลัด --}}
    <div class="mb-4 d-flex gap-2 flex-wrap">

        <a href="{{ route('products.index') }}" class="btn btn-primary">
            📦 จัดการสินค้า
        </a>

        <a href="{{ route('categories.index') }}" class="btn btn-info text-white">
            🗂 จัดการหมวดหมู่
        </a>

        <a href="{{ route('reports.sales') }}" class="btn btn-success">
            📈 ดูรายงานยอดขาย
        </a>

    </div>

    <h4 class="mb-3">📦 สรุปสต็อกสินค้า</h4>

    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="card border-primary">
                <div class="card-body text-center">
                    <h5>สินค้าทั้งหมด</h5>
                    <h2>{{ $totalProducts }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card border-success">
                <div class="card-body text-center">
                    <h5>หมวดหมู่ทั้งหมด</h5>
                    <h2>{{ $totalCategories }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card border-warning">
                <div class="card-body text-center">
                    <h5>สินค้าใกล้หมด</h5>
                    <h2>{{ $lowStock }}</h2>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="card border-danger">
                <div class="card-body text-center">
                    <h5>สินค้าหมดสต็อก</h5>
                    <h2>{{ $outOfStock }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card border-info">
                <div class="card-body text-center">
                    <h5>จำนวนสต็อกทั้งหมด</h5>
                    <h2>{{ $totalStock }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card border-dark">
                <div class="card-body text-center">
                    <h5>มูลค่าสินค้าคงคลัง</h5>
                    <h2>{{ number_format($totalValue, 2) }} บาท</h2>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection