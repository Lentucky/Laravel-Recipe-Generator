<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Results for "{{ $keywords }}"</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 min-h-screen p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <a href="{{ route('recipes.search') }}" class="text-blue-600 hover:underline">&larr; New search</a>
        <h1 class="text-2xl font-bold mt-2 mb-4">Results for: "{{ $keywords }}"</h1>

        @if (empty($results))
            <p>No results found.</p>
        @else
            <div class="space-y-6">
                @foreach ($results as $r)
                    <div class="p-4 border rounded">
                        <div class="flex justify-between items-start">
                            <h2 class="text-xl font-semibold">{{ $r['name'] }}</h2>
                            <span class="text-sm text-gray-600">score: {{ number_format($r['score'], 3) }}</span>
                        </div>
                        <details class="mt-2">
                            <summary class="cursor-pointer text-blue-600">Ingredients</summary>
                            <pre class="whitespace-pre-wrap mt-2 bg-gray-100 p-2 rounded">{{ $r['ingredients'] }}</pre>
                        </details>

                        <details class="mt-2">
                            <summary class="cursor-pointer text-blue-600">Steps</summary>
                            <pre class="whitespace-pre-wrap mt-2 bg-gray-100 p-2 rounded">{{ $r['steps'] }}</pre>
                        </details>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>

</html>
