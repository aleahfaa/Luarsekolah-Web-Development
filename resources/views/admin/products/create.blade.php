<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-10">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('products.store', ['id' => 1]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="name">
                                Name
                            </label>
                            <input id="name" name="name" type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none focus:shadow-outline"
                                required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2"
                                for="description">
                                Description
                            </label>
                            <textarea id="description" name="description" rows="4"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none focus:shadow-outline"
                                required></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="image">
                                Image
                            </label>
                            <input id="image" name="image" type="file"
                                class="block w-full text-sm text-gray-500 dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="store">
                                Store
                            </label>
                            <input id="store" name="store" type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none focus:shadow-outline"
                                required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="category">
                                Category
                            </label>
                            <select id="category" name="category"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none focus:shadow-outline"
                                required>
                                <option value="">-- Select Category --</option>
                                <option value="Home Goods">Home Goods</option>
                                <option value="Fashion">Fashion</option>
                                <option value="Cleaning Products">Cleaning Products</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="price">
                                Price
                            </label>
                            <input id="price" name="price" type="number" step="0.01" min="0"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none focus:shadow-outline"
                                required>
                        </div>
                        <div class="flex items-center justify-end">
                            <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Save Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
