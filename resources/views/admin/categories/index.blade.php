@if(session('success'))

    <p style="color:green;">
        {{ session('success') }}
    </p>

@endif

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Category List</title>
</head>
<body>

<h2>Category List</h2>

<p>
    <a href="{{ route('categories.create') }}">
        Add Category
    </a>
</p>

<table border="1" cellpadding="8" cellspacing="0">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Description</th>
        <th>Image</th>
        <th>Action</th>
    </tr>

    @foreach($categories as $category)

    <tr>

        <td>{{ $category->id }}</td>

        <td>{{ $category->name }}</td>

        <td>{{ $category->slug }}</td>

        <td>{{ $category->description }}</td>

        <td>{{ $category->image }}</td>

        <td>

            <a href="{{ route('categories.edit',$category->id) }}">
                Edit
            </a>

            |

            <form action="{{ route('categories.destroy',$category->id) }}"
                  method="POST"
                  style="display:inline;">

                @csrf
                @method('DELETE')

                <button type="submit">
                    Delete
                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>

</body>
</html>