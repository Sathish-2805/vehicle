<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
<body>
    
    <!-- Navigation  -->
    <div class="container mt-4">
    <ul class="nav nav-tabs mb-3 bg-light rounded shadow-sm p-2">
        <!-- Static Vehicles Tab -->
        <li class="nav-item">
            <a class="nav-link {{ !$categoryId ? 'active' : '' }} text-dark fw-bold" 
               href="{{ route('posts.index') }}">
                <i class="fas fa-car me-1"></i> Vehicles
            </a>
        </li>

        <!-- Categories Tab -->
        <li class="nav-item">
            <a class="nav-link {{ request()->is('categories*') ? 'active bg-primary text-white' : 'text-dark' }} fw-bold" 
               href="{{ route('categories.index') }}">
                <i class="fas fa-list-alt me-1"></i> Categories
            </a>
        </li>

        <!-- Dynamically Generated Category Tabs -->
        @foreach($categories as $category)
            <li class="nav-item">
                <a class="nav-link {{ $categoryId == $category->id ? 'active bg-primary text-white' : 'text-dark' }} fw-bold" 
                   href="{{ route('posts.index', ['category' => $category->id]) }}">
                    <i class="fas fa-tags me-1"></i> {{ $category->category_name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>



<!-- Main Content -->
<div class="container mt-5">
        <h1 class="mb-4">Posts</h1>

        <!-- Create Post Button -->
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create Post</a>


        <!-- Posts List -->
        <ul class="list-group">
            @foreach ($posts as $post)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $post->title }} ({{ $post->category->category_name }})</span>
                    
                    <div class="btn-group" role="group">

                       <!-- Display Post Image -->
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" 
                         class="img-thumbnail me-3" style="width: 150px; height: 80px; object-fit: cover;">
                        

                         <div class="d-flex align-items-center gap-2">
                         <!-- Edit Button -->
                     <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm flex-grow-1 text-white">
                     <i class="fas fa-edit me-1"></i> Edit
                     </a>
    
                   <!-- Delete Form -->
                  <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline flex-grow-1">
                  @csrf
                  @method('DELETE')
                 <button type="submit" class="btn btn-danger btn-sm w-100" 
                  onclick="return confirm('Are you sure you want to delete this post?')">
                 <i class="fas fa-trash-alt me-1"></i> Delete
            </button>
            </form>
        </div>

                    </div>
                </li>
            @endforeach
        </ul>
    </div>



    
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
