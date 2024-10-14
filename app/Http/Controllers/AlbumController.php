<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function index(Band $band)
    {
        $albums = $band->albums;
        return view('albums.index', compact('albums', 'band'));
    }

    public function create(Band $band)
    {
        return view('albums.create', compact('band'));
    }

    public function store(Request $request, Band $band)
    {
        $validated = $request->validate([
            'title' => 'required',
            'release_date' => 'required',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('albums');
        }

        $band->albums()->create($validated);
        return redirect()->route('albums.index', $band);
    }

    public function edit(Band $band, Album $album)
    {
        return view('albums.edit', compact('band', 'album'));
    }

    public function update(Request $request, Band $band, Album $album)
    {
        $validated = $request->validate([
            'title' => 'required',
            'release_date' => 'required',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            if ($album->image) {
                Storage::delete($album->image);
            }
            $validated['image'] = $request->file('image')->store('albums');
        }

        $album->update($validated);
        return redirect()->route('albums.index', $band);
    }

    public function destroy(Band $band, Album $album)
    {
        if ($album->image) {
            Storage::delete($album->image);
        }

        $album->delete();
        return redirect()->route('albums.index', $band);
    }
}
