<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Details</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Category Details</h1>

        <!-- Category Details -->
        <div class="card shadow-sm p-4">
            <p><strong>Category Name:</strong> {{ $category->category_name }}</p>
            <p><strong>Created At:</strong> {{ $category->created_at->format('d-m-Y H:i') }}</p>
            <p><strong>Updated At:</strong> {{ $category->updated_at->format('d-m-Y H:i') }}</p>
        </div>

        <!-- Action Buttons -->
        <div class="mt-4 d-flex justify-content-between">
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
            <div>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning me-2">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this category?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
