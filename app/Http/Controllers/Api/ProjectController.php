<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\FilamentProject;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    /**
     * Display a listing of published projects.
     */
    public function index(Request $request): JsonResponse
    {
        $query = FilamentProject::with(['tags', 'features', 'challenges', 'gallery'])
            ->where('is_published', true);

        // Filter by year
        if ($request->has('year')) {
            $query->where('year', $request->year);
        }

        // Filter by tag
        if ($request->has('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('slug', $request->tag);
            });
        }

        // Filter featured only
        if ($request->boolean('featured')) {
            $query->where('is_featured', true);
        }

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('role', 'like', "%{$search}%");
            });
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'order');
        $sortOrder = $request->get('sort_order', 'asc');
        
        if (in_array($sortBy, ['order', 'year', 'created_at', 'title'])) {
            $query->orderBy($sortBy, $sortOrder);
        }

        // Pagination
        $perPage = $request->get('per_page', 15);
        $perPage = min($perPage, 100); // Max 100 items per page

        $projects = $query->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => ProjectResource::collection($projects),
            'meta' => [
                'current_page' => $projects->currentPage(),
                'last_page' => $projects->lastPage(),
                'per_page' => $projects->perPage(),
                'total' => $projects->total(),
            ],
        ]);
    }

    /**
     * Display the specified project by slug or ID.
     */
    public function show(string $identifier): JsonResponse
    {
        $project = FilamentProject::with(['tags', 'features', 'challenges', 'gallery'])
            ->where('is_published', true)
            ->where(function ($query) use ($identifier) {
                $query->where('slug', $identifier)
                      ->orWhere('id', $identifier);
            })
            ->firstOrFail();

        return response()->json([
            'success' => true,
            'data' => new ProjectResource($project),
        ]);
    }

    /**
     * Get featured projects only.
     */
    public function featured(): JsonResponse
    {
        $projects = FilamentProject::with(['tags', 'features', 'challenges', 'gallery'])
            ->where('is_published', true)
            ->where('is_featured', true)
            ->orderBy('order')
            ->get();

        return response()->json([
            'success' => true,
            'data' => ProjectResource::collection($projects),
        ]);
    }

    /**
     * Get projects by year.
     */
    public function byYear(int $year): JsonResponse
    {
        $projects = FilamentProject::with(['tags', 'features', 'challenges', 'gallery'])
            ->where('is_published', true)
            ->where('year', $year)
            ->orderBy('order')
            ->get();

        return response()->json([
            'success' => true,
            'data' => ProjectResource::collection($projects),
            'meta' => [
                'year' => $year,
                'total' => $projects->count(),
            ],
        ]);
    }

    /**
     * Get projects by tag.
     */
    public function byTag(string $tagSlug): JsonResponse
    {
        $projects = FilamentProject::with(['tags', 'features', 'challenges', 'gallery'])
            ->where('is_published', true)
            ->whereHas('tags', function ($query) use ($tagSlug) {
                $query->where('slug', $tagSlug);
            })
            ->orderBy('order')
            ->get();

        return response()->json([
            'success' => true,
            'data' => ProjectResource::collection($projects),
            'meta' => [
                'tag' => $tagSlug,
                'total' => $projects->count(),
            ],
        ]);
    }
}