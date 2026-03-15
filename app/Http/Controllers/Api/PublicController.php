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
}
