<?php

namespace App\Http\Controllers;

use App\Http\Requests\Galleries\GalleryStoreRequest;
use App\Http\Resources\GalleryCollection;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = new GalleryCollection(Gallery::with('media')->latest()->paginate(8));
        return response()->json($galleries, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryStoreRequest $request)
    {
        $gallery = Gallery::create([
            'title' => $request->input('title'),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $gallery->addMedia($image)->preservingOriginal()->toMediaCollection("galleries");
            }
        }

        return response()->json([
            "message" => "Gallery created successfully",
            "gallery" => $gallery,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return response()->json($gallery->load('media'), 200);
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
    public function destroy(Gallery $gallery)
    {
        $gallery->clearMediaCollection('gallery_images');
        $gallery->delete();

        return response()->json(['message' => 'Gallery deleted successfully'], 200);
    }
}
