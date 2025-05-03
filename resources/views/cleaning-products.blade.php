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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-gray-100">
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
        <nav id="navMenu" class="hidden absolute top-full right-0 bg-dark w-full flex flex-col items-center p-4 lg:flex lg:flex-row lg:static lg:w-auto lg:bg-transparent">
            <a href="/" class="text-white mx-4 hover:underline">Home</a>
            <a href="#services" class="text-white mx-4 hover:underline">Services</a>
            <a href="#about" class="text-white mx-4 hover:underline">About Us</a>
            <a href="#contact-form" class="text-white mx-4 hover:underline">Contact</a>
        </nav>
    </header>
    <section class="mt-10 mb-10 px-4">
        <h2 class="text-3xl font-bold text-center mb-6">Green Cleaning Supplies</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @if ($products->isEmpty())
                <p class="text-center">No products found.</p>
            @else
                @foreach ($products as $product)
                    <div class="bg-white border p-4 text-center">
                        <img src="{{ asset($product->image_path) }}" class="w-full h-auto" />
                        <h3 class="text-xl mt-4">{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
    <footer class="bg-dark text-white text-center p-4 mt-10">
        <p>&copy; 2025 Green Mart. All rights reserved.</p>
        <p>Contact us: support@greenmart.com [dummy]</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0uTebClL7ni2RAI/Jr59hbF3gq7pZRgsD5K7Q1dYq0gXi0+qz" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
