<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

use App\Models\Project;
use App\Models\BlogPost;
use App\Models\About;
use App\Models\Setting;
use App\Models\ContactMessage;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Education;
use App\Models\Experience;
use App\Models\SocialLink;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PublicController extends Controller
{
    public function projects()
    {
        return Project::with(['technologies', 'categories', 'images'])->where('status', 'published')->latest()->get();
    }

    public function projectDetails($slug)
    {
        return Project::with(['technologies', 'categories', 'images'])->where('slug', $slug)->firstOrFail();
    }

    public function blogPosts()
    {
        return BlogPost::with('tags')->where('status', 'published')->latest('published_at')->get();
    }

    public function blogPostDetails($slug)
    {
        return BlogPost::with('tags')->where('slug', $slug)->firstOrFail();
    }

    public function about()
    {
        return About::first();
    }

    public function settings()
    {
        return Setting::first();
    }

    public function submitContact(ContactRequest $request)
    {
        $validated = $request->validated();

        $message = ContactMessage::create($validated);

        return response()->json(['message' => 'Message sent successfully!', 'data' => $message]);
    }

    public function services()
    {
        return Service::where('is_active', true)->orderBy('sort_order')->get();
    }

    public function serviceDetails($slug)
    {
        return Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
    }

    public function testimonials()
    {
        return Testimonial::latest()->get();
    }

    public function education()
    {
        return Education::orderBy('start_date', 'desc')->get();
    }

    public function experience()
    {
        return Experience::orderBy('start_date', 'desc')->get();
    }

    public function socialLinks()
    {
        return SocialLink::orderBy('sort_order')->get();
    }

    public function getStats()
    {
        $config = config('services.github');
        $username = $config['username'];
        $token = $config['token'];

        if (!$username) {
            return response()->json(['error' => 'GitHub username not configured'], 500);
        }

        $stats = Cache::remember('github_stats', 86400, function () use ($username, $token) {
            try {
                // 1. Fetch repositories (up to 100) to get stars and forks
                $repoResponse = Http::withHeaders([
                    'Authorization' => $token ? "Bearer {$token}" : '',
                    'Accept' => 'application/vnd.github+json',
                ])->get("https://api.github.com/users/{$username}/repos", [
                    'per_page' => 100,
                    'type' => 'owner',
                    'sort' => 'updated'
                ]);

                if (!$repoResponse->successful()) {
                    throw new \Exception('Failed to fetch repositories: ' . $repoResponse->body());
                }

                $repos = $repoResponse->json();
                $totalStars = 0;
                $totalForks = 0;

                foreach ($repos as $repo) {
                    $totalStars += $repo['stargazers_count'] ?? 0;
                    $totalForks += $repo['forks_count'] ?? 0;
                }

                // 2. Fetch total commits using the Search API (much faster than N+1 requests)
                $commitSearchResponse = Http::withHeaders([
                    'Authorization' => $token ? "Bearer {$token}" : '',
                    'Accept' => 'application/vnd.github+json',
                ])->get("https://api.github.com/search/commits", [
                    'q' => "author:{$username}",
                    'per_page' => 1
                ]);

                $totalCommits = 0;
                if ($commitSearchResponse->successful()) {
                    $totalCommits = $commitSearchResponse->json()['total_count'] ?? 0;
                }

                return [
                    'repositories' => count($repos),
                    'stars' => $totalStars,
                    'forks' => $totalForks,
                    'commits' => $totalCommits,
                ];

            } catch (\Exception $e) {
                Log::error('GitHub API Error: ' . $e->getMessage());
                throw $e; // Rethrow to avoid caching error
            }
        });

        return response()->json($stats);
    }
}
