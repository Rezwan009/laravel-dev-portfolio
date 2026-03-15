<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function index()
    {
        return ContactMessage::latest()->get();
    }

    public function show(string $id)
    {
        $message = ContactMessage::findOrFail($id);
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }
        return response()->json($message);
    }

    public function destroy(string $id)
    {
        ContactMessage::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
