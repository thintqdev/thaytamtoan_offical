<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateDocumentRequest;
use App\Http\Requests\Admin\UpdateDocumentRequest;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $documents = Document::with('category');
        $request->flash();
        if ($request->filled('name')) {
            $name = $request->input('name');
            $documents->where('name', 'like', "%$name%");
        }

        if ($request->filled('category_id')) {
            $category_id = $request->input('category_id');
            $documents->where('category_id', $category_id);
        }

        $documents = $documents->get();

        return view('admin.documents.index', compact('categories', 'documents'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.documents.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateDocumentRequest $request)
    {
        $document = Document::create($request->all());
        session()->flash('message', 'Tạo thành công');

        return redirect()->route('admin.documents.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        $categories = Category::all();
        return view('admin.documents.edit', compact('document', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        $data = $request->all();

        if (!$request->status) {
            $data['status'] = 0;
        }
        $document->update($data);

        return redirect()->route('admin.documents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        $document->delete();

        return redirect()->route('admin.documents.index');
    }
}
