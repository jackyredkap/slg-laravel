@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">📈 รายงานยอดขาย</h2>
	
	<a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">
        ⬅ กลับ Dashboard
    </a>
	
    <div class="row mb-4">

        <div class="col-md-6">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>ยอดขายรวม</h5>
                    <h3>{{ number_format($totalSales,2) }} บาท</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>จำนวนออเดอร์</h5>
                    <h3>{{ $totalOrders }}</h3>
                </div>
            </div>
        </div>

    </div>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>
                <th width="70">Order</th>
                <th>วันที่ขาย</th>
                <th>สินค้า</th>
                <th class="text-center">จำนวน</th>
                <th class="text-end">ราคา</th>
                <th class="text-end">รวม</th>
            </tr>

        </thead>

        <tbody>

        @forelse($orders as $order)

            @foreach($order->items as $item)

            <tr>

                <td>#{{ $order->id }}</td>

                <td>
                    {{ $order->created_at->format('d/m/Y H:i') }}
                </td>

                <td>
                    {{ $item->product->name ?? '-' }}
                </td>

                <td class="text-center">
                    {{ $item->quantity }}
                </td>

                <td class="text-end">
                    {{ number_format($item->price,2) }}
                </td>

                <td class="text-end">
                    {{ number_format($item->price * $item->quantity,2) }}
                </td>

            </tr>

            @endforeach

        @empty

            <tr>
                <td colspan="6" class="text-center">
                    ยังไม่มีข้อมูลการขาย
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection