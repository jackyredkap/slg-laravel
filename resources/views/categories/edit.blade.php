@extends('layouts.app')

@section('content')

<div class="container">

    <h2>แก้ไขหมวดหมู่สินค้า</h2>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>ชื่อหมวดหมู่</label>

            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ $category->name }}"
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