<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Cleaning Supplies - Green Mart</title>
    <link rel="icon" type="image/png" href="{{ asset('img/icon.png') }}?v=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJaoDL1T6pDUJWwJf6A5Y0wQJ7XbD6cP4Op4ynU1xtz5xYf2lt2qJ7O4+hp4" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.1/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="bg-gray-100 d-flex flex-column min-vh-100">
    <header class="bg-dark text-white p-4 d-flex justify-content-between align-items-center">
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="Green Mart Logo" class="h-10">
        </div>
        <div class="flex items-center">
            <button id="darkModeToggle" class="p-2 rounded bg-gray-800 text-white mr-3">
                <i id="darkModeIcon" class="bi bi-moon-fill"></i>
            </button>
            <button id="hamburgerBtn" class="text-white text-3xl md:hidden">
                ☰
            </button>
        </div>
        <nav id="navMenu" class="absolute top-full right-0 bg-dark w-full flex flex-col items-center p-4 lg:flex lg:flex-row lg:static lg:w-auto lg:bg-transparent">
            <a href="/" class="text-white mx-4 hover:underline">Home</a>
        </nav>
    </header>
    <main style="flex-grow: 1; min-height: calc(100vh - 140px);">
        <section class="mt-10 mb-10 px-4 flex-grow-1">
            <h2 class="text-3xl font-bold text-center mb-6">Green Cleaning Supplies</h2>
            <form action="{{ url('cleaning-products') }}" method="GET" class="search-form">
                <input type="text" name="search" class="form-control" placeholder="Find the product..."
                    value="{{ request('search') }}">
                <button type="submit" class="search-button">Search</button>
            </form>
            @if($products->isEmpty())
                <div class="alert alert-warning">
                    Cannot find the product!
                </div>
            @else
                <div class="grid md:grid-cols-3 grid-cols-1 mt-4 gap-6">
                    @foreach($products as $product)
                        <div class="col border rounded shadow-sm">
                            <div class="card h-100">
                                <img src="{{asset($product->image_path)}}" class="card-img-top" alt="{{ $product->name }}"
                                    style="height: 200px; object-fit: cover; width: 100%;">
                                <div class="my-2">
                                    <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <p class="text-muted">Store: {{ $product->store }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    </main>
    <footer class="bg-dark text-white text-center p-4 mt-10 absolute w-full">
        <p>&copy; 2025 Green Mart. All rights reserved.</p>
        <p>Contact us: support@greenmart.com [dummy]</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0uTebClL7ni2RAI/Jr59hbF3gq7pZRgsD5K7Q1dYq0gXi0+qz" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
</body>
</html>
