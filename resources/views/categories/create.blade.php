@extends('layouts.app')

@section('content')

<div class="container">

    <h2>เพิ่มหมวดหมู่สินค้า</h2>

    <form action="{{ route('categories.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>ชื่อหมวดหมู่</label>

            <input type="text"
                   name="name"
                   class="form-control"
                   placeholder="กรอกชื่อหมวดหมู่"
                   required>

        </div>

        <button type="submit" class="btn btn-success">
            บันทึก
        </button>

        <a href="{{ route('categories.index') }}"
           class="btn btn-secondary">
            กลับ
        </a>

    </form>

</div>

@endsection