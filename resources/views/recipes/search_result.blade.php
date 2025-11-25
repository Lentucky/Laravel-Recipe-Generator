<!DOCTYPE html>
<html>

<head>
    <title>Recipe Results</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="max-w-3xl mx-auto mt-10">

        <div class="bg-white p-6 rounded-lg shadow mb-6">
            <h2 class="text-2xl font-bold mb-2">
                Results for:
                <span class="text-blue-600">{{ $query }}</span>
            </h2>

            <a href="/recipes/search" class="text-sm text-gray-600 hover:underline">
                ← Back to search
            </a>
        </div>

        @foreach ($results as $recipe)
            <div class="border rounded-lg p-5 mb-6 shadow-sm bg-white">
                <h3 class="text-xl font-semibold mb-2">{{ $recipe['name'] }}</h3>

                <h4 class="font-bold mt-3">Ingredients:</h4>
                <ul class="list-disc ml-6 text-gray-700">
                    @foreach ($recipe['ingredients'] as $ing)
                        <li>{{ $ing }}</li>
                    @endforeach
                </ul>

                <h4 class="font-bold mt-3">Steps:</h4>
                <ol class="list-decimal ml-6 text-gray-700">
                    @foreach ($recipe['steps'] as $step)
                        <li>{{ $step }}</li>
                    @endforeach
                </ol>
            </div>
        @endforeach

        <div class="mt-6">
            {{ $results->links() }}
        </div>
    </div>

</body>

</html>
