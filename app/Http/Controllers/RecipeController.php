<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecipeController extends Controller
{
    public function index()
    {
        // If there are keywords in query, treat it as a search request
        if (request()->has('keywords')) {
            return $this->search(request());
        }
        
        return view('recipes.search');
    }

    public function search(Request $request)
    {
        // Get keywords from either POST input or query parameter (for pagination)
        $keywords = $request->input('keywords') ?? $request->query('keywords') ?? session('last_keywords');

        if (!$keywords) {
            return redirect('/recipes/search')->with('error', 'Please enter keywords.');
        }

        // Store keywords in session for pagination
        session(['last_keywords' => $keywords]);

        $fastApiUrl = 'http://127.0.0.1:8001/predict';

        $response = Http::post($fastApiUrl, [
            'keywords' => $keywords
        ]);

        if ($response->failed()) {
            return back()->with('error', 'FastAPI server error.');
        }

        $data = $response->json();

        // Remove score & format results
        $cleaned = collect($data['results'])->map(function ($item) {
            $ingredients = $item["ingredients"];
            $decodedIng = json_decode($ingredients, true);

            if ($decodedIng === null && is_string($ingredients)) {
                $ingredients_fixed = str_replace("'", '"', $ingredients);
                $decodedIng = json_decode($ingredients_fixed, true);
            }

            if ($decodedIng === null) {
                $decodedIng = is_array($ingredients) ? $ingredients : [];
            }

            $steps = $item["steps"];
            $decodedSteps = json_decode($steps, true);

            if ($decodedSteps === null && is_string($steps)) {
                $steps_fixed = str_replace("'", '"', $steps);
                $decodedSteps = json_decode($steps_fixed, true);
            }

            if ($decodedSteps === null) {
                $decodedSteps = is_array($steps) ? $steps : [];
            }

            return [
                "name" => $item["name"],
                "ingredients" => $decodedIng,
                "steps" => $decodedSteps,
            ];
        });

        // Convert to paginator (1 per page)
        $page = request('page', 1);
        $perPage = 1;
        $paginated = new \Illuminate\Pagination\LengthAwarePaginator(
            $cleaned->forPage($page, $perPage),
            $cleaned->count(),
            $perPage,
            $page,
            [
                'path' => url('/recipes/search'),
                'query' => ['keywords' => $keywords],
            ]
        );

        return view('recipes.search_result', [
            'query' => $keywords,
            'results' => $paginated
        ]);
    }
}