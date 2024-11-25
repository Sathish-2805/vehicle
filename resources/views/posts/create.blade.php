<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Create a New Post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="border p-4 rounded shadow-sm">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category:</label>
                <select id="category_id" name="category_id" class="form-select" required>
                    <option value="">Select a Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description" rows="5" class="form-control" required>{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" id="image" name="image" accept="image/*" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>

        <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">Back to Posts</a>
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>