<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Green Mart</title>
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
            <a href="{{ route('cart.index') }}" class="text-white mx-4 relative">
                <i class="bi bi-cart-fill text-2xl"></i>
                @if(session()->has('cart') && count(session()->get('cart')) > 0)
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">
                        {{ count(session()->get('cart')) }}
                    </span>
                @endif
            </a>
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
            <h2 class="text-3xl font-bold text-center mb-6">Shopping Cart</h2>
            
            @if(session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @if(count($cartItems) > 0)
                <div class="bg-white p-4 rounded shadow">
                    <table class="w-full mb-4">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-2">Product</th>
                                <th class="text-center py-2">Price</th>
                                <th class="text-center py-2">Quantity</th>
                                <th class="text-center py-2">Subtotal</th>
                                <th class="text-center py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $id => $item)
                                <tr class="border-b">
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <img src="{{ asset($item['image_path']) }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover mr-4">
                                            <span>{{ $item['name'] }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center py-4">Rp{{ number_format($item['price'], 2) }}</td>
                                    <td class="text-center py-4">
                                        <form action="{{ route('cart.update') }}" method="POST" class="flex items-center justify-center">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $id }}">
                                            <button type="submit" name="quantity" value="{{ $item['quantity'] - 1 }}" class="px-2 py-1 bg-gray-200 rounded-l">-</button>
                                            <span class="px-4">{{ $item['quantity'] }}</span>
                                            <button type="submit" name="quantity" value="{{ $item['quantity'] + 1 }}" class="px-2 py-1 bg-gray-200 rounded-r">+</button>
                                        </form>
                                    </td>
                                    <td class="text-center py-4">Rp{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                    <td class="text-center py-4">
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $id }}">
                                            <button type="submit" class="text-red-500">
                                                <i class="bi bi-trash"></i> Remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <div class="flex justify-between items-center mt-6 border-t pt-4">
                        <div>
                            <h3 class="text-xl font-bold">Total: Rp{{ number_format($total, 2) }}</h3>
                        </div>
                        <div class="flex">
                            <form action="{{ route('cart.clear') }}" method="POST" class="mr-2">
                                @csrf
                                <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded">Clear Cart</button>
                            </form>
                            <form id="checkoutForm">
                                @csrf
                                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-8 bg-white rounded shadow">
                    <p class="text-xl mb-4">Your cart is empty</p>
                    <a href="/" class="bg-green-600 text-white px-4 py-2 rounded inline-block">Continue Shopping</a>
                </div>
            @endif
        </section>
    </main>
    <footer class="bg-dark text-white text-center p-4 mt-10 w-full">
        <p>&copy; 2025 Green Mart. All rights reserved.</p>
        <p>Contact us: support@greenmart.com [dummy]</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0uTebClL7ni2RAI/Jr59hbF3gq7pZRgsD5K7Q1dYq0gXi0+qz" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
</body>
</html>
