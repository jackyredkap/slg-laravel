@extends('layouts.app')

@section('content')

<div class="container">

    <h2>แก้ไขสินค้า</h2>

    <form action="{{ route('products.update', $product->id) }}"
      method="POST"
      enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>หมวดหมู่สินค้า</label>
            <select name="category_id" class="form-control" required>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label>ชื่อสินค้า</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ $product->name }}"
                   required>
        </div>

        <div class="mb-3">
            <label>รายละเอียดสินค้า</label>
            <textarea name="description"
                      class="form-control"
                      rows="3">{{ $product->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>ราคา</label>
            <input type="number"
                   name="price"
                   class="form-control"
                   value="{{ $product->price }}"
                   required>
        </div>

        <div class="mb-3">
            <label>จำนวนสินค้า</label>
            <input type="number"
                   name="stock"
                   class="form-control"
                   value="{{ $product->stock }}"
                   required>
        </div>
	
		<div class="mb-3">
    <label>รูปสินค้าเดิม</label><br>

    @if($product->image)
        <img src="{{ asset('storage/'.$product->image) }}"
             width="120"
             class="img-thumbnail">
    @else
        ไม่มีรูป
    @endif
</div>

<div class="mb-3">
    <label>เปลี่ยนรูปสินค้า</label>
    <input type="file" name="image" class="form-control">
</div>

        <button type="submit" class="btn btn-success">
            บันทึก
        </button>

        <a href="{{ route('products.index') }}" class="btn btn-secondary">
            กลับ
        </a>

    </form>

</div>

@endsection