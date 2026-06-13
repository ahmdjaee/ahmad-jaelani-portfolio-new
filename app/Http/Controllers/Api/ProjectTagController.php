<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectTagResource;
use App\Models\ProjectTag;
use Illuminate\Http\JsonResponse;

class ProjectTagController extends Controller
{
    /**
     * Display a listing of all tags with project count.
     */
    public function index(): JsonResponse
    {
        $tags = ProjectTag::withCount(['projects' => function ($query) {
            $query->where('is_published', true);
        }])
        ->orderBy('name')
        ->get();

        return response()->json([
            'success' => true,
            'data' => ProjectTagResource::collection($tags)->map(function ($tag) {
                return array_merge($tag->toArray(request()), [
                    'projectsCount' => $tag->projects_count ?? 0,
                ]);
            }),
        ]);
    }

    /**
     * Display the specified tag.
     */
    public function show(string $slug): JsonResponse
    {
        $tag = ProjectTag::where('slug', $slug)
            ->withCount(['projects' => function ($query) {
                $query->where('is_published', true);
            }])
            ->firstOrFail();

        return response()->json([
            'success' => true,
            'data' => array_merge(
                (new ProjectTagResource($tag))->toArray(request()),
                ['projectsCount' => $tag->projects_count ?? 0]
            ),
        ]);
    }
}