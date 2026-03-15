<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\NewsletterSubscriber;

class NewsletterSubscriberController extends Controller
{
    public function index()
    {
        return NewsletterSubscriber::latest('subscribed_at')->get();
    }

    public function destroy(string $id)
    {
        NewsletterSubscriber::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
