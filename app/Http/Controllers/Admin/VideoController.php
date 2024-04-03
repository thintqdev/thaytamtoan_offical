<?php

namespace App\Http\Controllers\Admin;

use Alaouy\Youtube\Facades\Youtube;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $videos = Video::query();
        $categories = Category::all();
        $request->flash();

        if ($request->filled('title')) {
            $title = $request->input('title');
            $videos->where('title', 'like', "%$title%");
        }

        if ($request->filled('category_id')) {
            $category_id = $request->input('category_id');
            $videos->where('category_id', $category_id);
        }

        $videos = $videos->get();
        return view('admin.videos.index', compact('videos', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.videos.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('thumbnail_path');
        if ($request->file('thumbnail_path')) {
            $fileName = Carbon::now()->format('Ymd_His') . '_' . Str::random(8) . '.' . $request->file('thumbnail_path')->extension();
            $filePath = $request->file('thumbnail_path')->storeAs('thumbnails', $fileName, 'public');

            $data['thumbnail_path'] = '/storage/' . $filePath;
        }

        $videos = Video::create($data);

        return redirect()->route('admin.videos.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        $categories = Category::all();

        return view('admin.videos.edit', compact('categories', 'video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $video = Video::find($id);

        $data = $request->except('thumbnail_path');

        if ($request->file('thumbnail_path')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($video->thumbnail_path) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $video->thumbnail_path));
            }

            // Tải lên ảnh mới
            $fileName = Carbon::now()->format('Ymd_His') . '_' . Str::random(8) . '.' . $request->file('thumbnail_path')->extension();
            $filePath = $request->file('thumbnail_path')->storeAs('thumbnails', $fileName, 'public');

            $data['thumbnail_path'] = '/storage/' . $filePath;
        }

        $video->update($data);

        return redirect()->route('admin.videos.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        $video->delete();

        return redirect()->route('admin.videos.index');
    }
}
