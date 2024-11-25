<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h1>Edit Post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="form-group">
                <label for="category_id">Category:</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == $post->category_id) selected @endif>{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description', $post->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                @if ($post->image)
                    <p>Current Image:</p>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-thumbnail" width="100">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>

        <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">Back to Posts</a>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
