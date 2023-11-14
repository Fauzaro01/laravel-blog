<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <h2>Category</h2>
    @if ($message = Session::get('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ $message  }}',
            showConfirmButton: false,
            timer: 1800
        });
    </script>
    @else
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Success!',
            text: '{{ $message  }}',
            showConfirmButton: false,
            timer: 1800
        });
    </script>
    @endif

    <button class="btn btn-outline-secondary" onclick="toggleForm()">Create Category</button>
    <br><br>
    <form id="toggle_form" action="{{ route('category.store') }}" method="post" style="display:none">
        @csrf
        <label for="category_name">Category Name: </label>
        <input type="text" name="category_name" id="category_name" required>
        <button class="btn btn-primary" type="submit">Kirim</button>
    </form>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->category_id }}</td>
                <td>{{ $category->category_name }}</td>
                <td>
                    <form action="{{ route('category.destroy') }}" method="POST" style="display:inline">
                        @csrf
                        <input type="hidden" name="category_id" value="{{$category->category_id}}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        var formId = document.getElementById("toggle_form");

        function toggleForm() {
            if (formId.style.display == "none") {
                formId.style.display = "block";
            } else {
                formId.style.display = "none";
            }
        }
    </script>
</body>

</html>