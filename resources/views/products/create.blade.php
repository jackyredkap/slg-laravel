@extends('layouts.app')

@section('content')

<div class="container">

    <h2>เพิ่มสินค้า</h2>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>หมวดหมู่สินค้า</label>
            <select name="category_id" class="form-control" required>
                <option value="">-- เลือกหมวดหมู่ --</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label>ชื่อสินค้า</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>รายละเอียดสินค้า</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label>ราคา</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>จำนวนสินค้า</label>
            <input type="number" name="stock" class="form-control" required>
        </div>
		
		<div class="mb-3">
    <label>รูปสินค้า</label>
    <input type="file" name="image" class="form-control">
</div>
		
        <button type="submit" class="btn btn-success">บันทึก</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">กลับ</a>

    </form>

</div>

@endsection