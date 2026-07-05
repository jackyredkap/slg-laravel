<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Category</title>
</head>
<body>

<h2>Edit Category</h2>

<a href="{{ route('categories.index') }}">Back</a>

<hr>

<form action="{{ route('categories.update', $category->id) }}" method="POST">

    @csrf
    @method('PUT')

    <p>
        <label>Category Name</label><br>
        <input type="text" name="name" value="{{ $category->name }}">
    </p>

    <p>
        <label>Description</label><br>
        <textarea name="description">{{ $category->description }}</textarea>
    </p>

    <p>
        <label>Image</label><br>
        <input type="text" name="image" value="{{ $category->image }}">
    </p>

    <button type="submit">Update Category</button>

</form>

</body>
</html>