<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create Category</title>
</head>
<body>

<h2>Create Category</h2>

<a href="{{ route('categories.index') }}">Back</a>

<br><br>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <p>
        <label>Category Name</label><br>
        <input type="text" name="name">
    </p>

    <p>
        <label>Description</label><br>
        <textarea name="description"></textarea>
    </p>

    <p>
        <label>Image</label><br>
        <input type="text" name="image">
    </p>

    <button type="submit">Save</button>
</form>

</body>
</html>