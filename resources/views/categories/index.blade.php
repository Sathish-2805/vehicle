<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Vehicles</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
                    </li>
                   
                    <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('categories.index') }}">Categories</a>
                    </li>  -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Categories</h1>

        <!-- Create Category Button -->
        <div class="text-end mb-3">
            <a href="{{ route('categories.create') }}" class="btn btn-success">Create Category</a>
        </div>

        <!-- Categories List -->
<ul class="list-group">
    @foreach ($categories as $category)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>{{ $category->category_name }}</span>
            
            <div class="d-flex gap-2">
                <!-- Edit Button -->
                <a href="{{ route('categories.edit', $category) }}" 
                   class="btn btn-warning btn-sm text-center px-3">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>
                
                <!-- Delete Form -->
                <form action="{{ route('categories.destroy', $category) }}" 
                      method="POST" 
                      class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="btn btn-danger btn-sm text-center px-3" 
                            onclick="return confirm('Are you sure you want to delete this category?')">
                        <i class="fas fa-trash-alt me-1"></i> Delete
                    </button>
                </form>
            </div>
        </li>
    @endforeach
</ul>

    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>