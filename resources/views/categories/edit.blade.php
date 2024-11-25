<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Category</h1>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Category Form -->
        <form action="{{ route('categories.update', $category->id) }}" method="POST" class="p-3 border rounded shadow-sm">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="category_name" class="form-label">Category Name:</label>
                <input 
                    type="text" 
                    id="category_name" 
                    name="category_name" 
                    class="form-control" 
                    value="{{ old('category_name', $category->category_name) }}" 
                    required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Update</button>
        </form>

        <!-- Back to Categories Link -->
        <div class="mt-3 text-center">
            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Back to Categories</a>
        </div>
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
