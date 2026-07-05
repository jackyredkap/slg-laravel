<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>SLG Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="{{ url('/') }}">
            SLG Admin
        </a>

        <div class="navbar-nav">

            <a class="nav-link" href="{{ route('products.index') }}">
                📦 สินค้า
            </a>

            <a class="nav-link" href="{{ route('categories.index') }}">
                📂 หมวดหมู่
            </a>

        </div>

    </div>
</nav>

<div class="container mt-4">

    @yield('content')

</div>

</body>
</html>