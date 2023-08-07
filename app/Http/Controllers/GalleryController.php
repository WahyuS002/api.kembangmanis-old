<?php

namespace App\Http\Controllers;

use App\Http\Requests\Galleries\GalleryStoreRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "message" => "This is the index method"
        ]);
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
    public function show(string $id)
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
    public function destroy(string $id)
    {
        //
    }
}
