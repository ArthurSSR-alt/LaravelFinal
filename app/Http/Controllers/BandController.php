<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BandController extends Controller
{
    public function index()
    {
        $bands = Band::all();
        return view('bands.index_bands', compact('bands'));
    }

    public function create()
    {
        return view('bands.bands_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'genre' => 'required',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('bands');
        }

        Band::create($validated);
        return redirect()->route('bands.index');
    }

    public function edit(Band $band)
    {
        return view('bands.bands_edit', compact('band'));
    }

    public function update(Request $request, Band $band)
    {
        $validated = $request->validate([
            'name' => 'required',
            'genre' => 'required',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            if ($band->image) {
                Storage::delete($band->image);
            }
            $validated['image'] = $request->file('image')->store('bands');
        }

        $band->update($validated);
        return redirect()->route('bands.index');
    }

    public function destroy(Band $band)
    {
        if ($band->image) {
            Storage::delete($band->image);
        }

        $band->delete();
        return redirect()->route('bands.index');
    }
}
