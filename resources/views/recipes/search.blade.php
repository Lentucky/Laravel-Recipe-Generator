<!DOCTYPE html>
<html>

<head>
    <title>Recipe Search</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-4">Recipe Search</h2>

        @if (session('error'))
            <div class="bg-red-200 text-red-800 p-3 mb-3 rounded">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('recipes.search') }}" method="POST">
            @csrf
            <input type="text" name="keywords" class="w-full border p-2 rounded mb-4"
                placeholder="e.g. chicken tomato garlic">

            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Search
            </button>
        </form>
    </div>

</body>

</html>
