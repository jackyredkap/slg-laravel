@extends('layouts.app')

@section('content')

<h2>รายการสินค้า</h2>

<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">
    เพิ่มสินค้า
</a>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('products.index') }}" method="GET" class="mb-3">

    <div class="input-group">

        <input type="text"
               name="keyword"
               class="form-control"
               placeholder="ค้นหาชื่อสินค้า..."
               value="{{ $keyword }}">

        <button class="btn btn-primary">
            🔍 ค้นหา
        </button>

        <a href="{{ route('products.index') }}" class="btn btn-secondary">
            รีเซ็ต
        </a>

    </div>

</form>

<table class="table table-bordered">

    <tr>
        <th>ID</th>
<th>หมวดหมู่</th>
<th>รูป</th>
<th>ชื่อสินค้า</th>
<th>ราคา</th>
<th>Stock</th>
<th>Action</th>
    </tr>

    @foreach($products as $product)

    <tr>
        <td>{{ $product->id }}</td>

<td>
    {{ $product->category ? $product->category->name : '-' }}
</td>

<td>
    @if($product->image)
        <img src="{{ asset('storage/'.$product->image) }}"
             width="80"
             class="img-thumbnail">
    @else
        ไม่มีรูป
    @endif
</td>

<td>{{ $product->name }}</td>

<td>{{ number_format($product->price, 2) }}</td>

<td>{{ $product->stock }}</td>
      <td>
    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
        แก้ไข
    </a>

    <form action="{{ route('products.destroy', $product->id) }}"
          method="POST"
          style="display:inline;">
        @csrf
        @method('DELETE')

        <button class="btn btn-danger btn-sm"
            onclick="return confirm('ต้องการลบสินค้านี้หรือไม่ ?')">
            ลบ
        </button>
    </form>

    <form action="{{ route('orders.store', $product->id) }}"
          method="POST"
          style="display:inline;">
        @csrf

        <button class="btn btn-success btn-sm"
            onclick="return confirm('ยืนยันการขายสินค้านี้หรือไม่ ?')">
            ขาย
        </button>
    </form>
    </tr>

    @endforeach

</table>

<div class="mt-3">
    {{ $products->appends(request()->query())->links() }}
</div>

@endsection