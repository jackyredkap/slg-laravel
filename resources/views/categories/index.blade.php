@extends('layouts.app')

@section('content')

<div class="container">

    <h2>รายการหมวดหมู่สินค้า</h2>

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
        เพิ่มหมวดหมู่
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">

        <thead>
            <tr>
                <th width="80">ID</th>
                <th>ชื่อหมวดหมู่</th>
                <th width="180">Action</th>
            </tr>
        </thead>

        <tbody>

        @forelse($categories as $category)

            <tr>

                <td>{{ $category->id }}</td>

                <td>{{ $category->name }}</td>

                <td>

                    <a href="{{ route('categories.edit', $category->id) }}"
                       class="btn btn-warning btn-sm">
                        แก้ไข
                    </a>

                    <form action="{{ route('categories.destroy', $category->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('ต้องการลบหมวดหมู่นี้หรือไม่ ?')">
                            ลบ
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="3" class="text-center">
                    ยังไม่มีข้อมูลหมวดหมู่
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection