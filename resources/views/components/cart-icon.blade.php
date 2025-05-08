<a href="{{ route('cart.index') }}" class="text-white mx-4 relative">
    <i class="bi bi-cart-fill text-2xl"></i>
    @if(session()->has('cart') && count(session()->get('cart')) > 0)
        <span class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">
            {{ count(session()->get('cart')) }}
        </span>
    @endif
</a>
