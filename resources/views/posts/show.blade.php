<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h1 class="mb-4">Post Details</h1>

        <div class="card">
            <div class="card-body">
                <p><strong>Title:</strong> {{ $post->title }}</p>
                <p><strong>Category:</strong> {{ $post->category->category_name }}</p>
                
                <p><strong>Description:</strong></p>
                <p>{{ $post->description }}</p>

                @if ($post->image)
                    <p><strong>Image:</strong></p>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid mb-3" width="400">
                @endif

                <p><strong>Created At:</strong> {{ $post->created_at->format('d-m-Y H:i') }}</p>
                <p><strong>Updated At:</strong> {{ $post->updated_at->format('d-m-Y H:i') }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>

            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
