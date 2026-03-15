<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\VisitorLog;
use App\Http\Requests\VisitorLogRequest;

class VisitorLogController extends Controller
{
    public function index()
    {
        return VisitorLog::latest('visited_at')->get();
    }

    public function store(VisitorLogRequest $request)
    {
        $log = VisitorLog::create($request->validated());
        return response()->json($log, 201);
    }

    public function show(string $id)
    {
        return VisitorLog::findOrFail($id);
    }

    public function destroy(string $id)
    {
        VisitorLog::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
