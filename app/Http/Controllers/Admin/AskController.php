<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ask;
use App\Models\User;
use App\Models\Category;


class AskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $asks = Ask::query();
        if ($request->filled('title')) {
            $title = $request->input('title');
            $asks->where('title', 'like', "%$title%");
        }

        if ($request->filled('category_id')) {
            $category_id = $request->input('category_id');
            $asks->where('category_id', $category_id);
        }
        $asks = $asks->get();
        return view('admin.asks.index', compact('asks', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ask $ask)
    {

        $categories = Category::all();
        return view('admin.asks.show', compact('ask', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ask $ask)
    {
        $ask->delete();
        return redirect()->route('admin.asks.index');
    }
}
